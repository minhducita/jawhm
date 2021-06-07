<?php
require_once ('Zend/Json.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_SchoolController extends Zend_Controller_Action {
    public $model;

    /**
     *
     */
    public function init() {
        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];

        if(empty($_SERVER['HTTPS'])) {
            $base = 'http://';
        } else {
            $base = 'https://';
        }

        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];

        $base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/SchoolModel.php');
        $this->model = new SchoolModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array('login', 'auth', 'logout');
        $is_client = false;
        without_stafflogin($this, $withoutList, $base, $is_client);
    }

    /**
     * index
     */
    public function indexAction() {
        $items = $this->model->getMessages('mypage_client_memo');

        $paginator = Zend_Paginator::factory($items);
        $paginator->setItemCountPerPage(20);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $pages = $paginator->getPages();
        $pageArray = get_object_vars($pages);

        $date = new DateTime();
        $yesterday = $date->modify('-1 days')->format('Y-m-d H:i:s');
        $this->view->yesterday = $yesterday;

        $this->view->pages = $pageArray;
        $this->view->items = $paginator->getIterator();

        $this->view->name = $_SESSION['mem_name'];
        $this->view->title = 'お客様コメント(学校)';

    }

    public function changecommentAction() {
        $params = $this->getRequest ()->getParams ();

        switch($params['type']) {
            case 'reply':
                $this->view->module = $params['modules'];
                $this->view->comment = null;
                break;

            case 'edit':
                $comment = $this->model->getComment('mypage_client_memo', $params['id']);
                $this->view->module = $params['modules'];
                $this->view->comment = $comment;
                $_SESSION['mypage_client_memo_id'] = $params['id'];
                break;

            case 'new':
            default:
                $this->view->module = null;
                $this->view->comment = null;
                break;
        }

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('staffcomment');
    }

    public function editcommentAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if ($params['memo'] == '') {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if (isset($_SESSION['mypage_client_memo_id'])) {
            $result = $this->model->updateComment('mypage_client_memo', $params);
            unset($_SESSION['mypage_client_memo_id']);
        } else {
            $result = $this->model->insertComment('mypage_client_memo', $params);
        }

        $memo_table = 'T_顧客履歴';
        $memo_insert = array (
                'お客様番号' => $_SESSION ['crm_id'],
                '日付' => date ( 'Y-m-d G:i:s' ),
                '問合せ方法' => '学校連絡',
                '内容' => $params ['memo']
        );

        $ret = insert_sqlserver ( $memo_table, $memo_insert, $this->url, $this->pass );

    }

    public function talkAction() {
        $items = $this->model->getTalklist('mypage_school_contact');
        if (!empty($items)) {
            if ($items[0]['sender_id'] != 'JAWHM') {
                $previous_school = $items[0]['sender_id'];
            } else {
                $previous_school = $items[0]['receiver_id'];
            }
        }

        $school_list = array();
        $i = 0;
        $j = 0;
        $array{$i} = array();

        // sort by school name
        foreach($items as $item) {
            if ($item['sender_id'] != 'JAWHM') {
                $current_school = $item['sender_id'];
            } else {
                $current_school = $item['receiver_id'];
            }

            if (strcasecmp($current_school, $previous_school) == 0) {
                $array{$i}[] = $item;
            } else {
                $k = 0;
                $search = false;
                foreach($school_list as $list) {
                    if (strcasecmp($current_school, $list) == 0) {
                        $search = $k;
                        break;
                    } else {
                        $k++;
                    }
                }

                if ($search === false) {
                    if ($j != 0) {
                        $i = $j + 1;
                        $j = 0;
                    } else {
                        $i++;
                    }

                    $array{$i}[] = $item;
                    $school_list[] = $previous_school;
                } else {
                    $array{$search}[] = $item;
                    $j = $i;
                    $i = $search;
                }

            }

            $previous_school = $current_school;
        }

        $sorted = array();
        for($n=0; $n<=$i; $n++) {
            foreach ($array{$n} as $arr) {
                $sorted[] = $arr;
            }
        }

        $this->view->items = $sorted;
        $this->view->title = '学校つながり';
    }

    public function proposalAction() {
        if (isset($_SESSION['search_decision_flag'])) {
            $this->view->search_decision_flag= $_SESSION['search_decision_flag'];
        } else {
            $this->view->search_decision_flag = null;
        }

        if (isset($_SESSION['search_school_id'])) {
            $this->view->search_school_id = $_SESSION['search_school_id'];
        } else {
            $this->view->search_school_id = null;
        }

        $this->view->title = 'セミナー日程提案一覧';
        $this->view->datetimepicker = 1;
    }

    public function proposalsearchAction() {
        $params = $this->getRequest ()->getParams ();

        $this->view->params = $params;
    }

    public function listAction() {
        $params = $this->getRequest ()->getParams ();

        $searchKey = array(
                array(
                        'key' => 'search_decision_flag',
                        'type' => 'seminar_equal',
                        'column' => 'decision_flag',
                        'page' => 'searchdecision_flag',
                        'etc' => null
                ),
                array(
                        'key' => 'search_school_id',
                        'type' => 'seminar_like',
                        'column' => 'school_id',
                        'page' => 'searchschool_id',
                         'etc' => null
                ),
        );

        $sortKey = array();
        $pagename = 'staff/school/list';

        showList($params, $searchKey, $sortKey, $pagename, $this);
    }

    public function resetAction() {
        unset($_SESSION['search_decision_flag']);
        unset($_SESSION['search_school_id']);
    }

    public function changeproposalAction() {
        $params = $this->getRequest ()->getParams ();

        $school_ids = $this->model->getSchoolIDs('mypage_school_memlist');
        if ($params['id'] != 'new') {
            $item = $this->model->getProposal('mypage_seminar_proposal', $params['id']);
        } else {
            $item = null;
        }

        $_SESSION['mypage_seminar_proposal_id'] = $params['id'];

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('proposal');
        $this->view->school_ids = $school_ids;
        $this->view->item = $item;
    }

    public function editproposalAction() {
        $params = $this->getRequest ()->getParams ();
        $id = $_SESSION['mypage_seminar_proposal_id'];

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['expected_seminar_datetime']) || empty($params['expected_require_time'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $date_check = dateCheck($params['expected_seminar_datetime'], true);
        if (!is_null($date_check)) {
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$date_check_departure.'/prev/flightlist');
            throw new Exception($date_check);
        }

        $minute = str_replace(',', '', $params['expected_require_time']);
        if (!is_numeric($minute)) {
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$date_check_departure.'/prev/flightlist');
            throw new Exception($date_check);
        }

        if($_SESSION['mypage_seminar_proposal_id'] != 'new') {
            $result = $this->model->editProposal('mypage_seminar_proposal', $params);
            $this->writeEmail($this, 'edit', $params['staff_comment'], $params['school_id']);
        } else {
            $result = $this->model->insProposal('mypage_seminar_proposal', $params);
            $this->writeEmail($this, 'new', $params['staff_comment'], $params['school_id']);
        }
        unset($_SESSION['mypage_seminar_proposal_id']);
    }

    private function writeEmail($parent, $status, $message, $school_id) {
        $info = $this->model->getSchoolInfo('mypage_school_memlist', $school_id);

        $charge_name = $info['charge_name'];

        $fromMailAddress = 'school@jawhm.or.jp';
        $toMailAddress = $info['email'];
        if ($status === 'new') {
            $subject = 'セミナー日程の提案について';
        } else if ($status === 'edit') {
            $subject = 'セミナー日程提案を編集しました';
        } else {
            $subject = 'セミナー日程提案を取消しました';
        }
        $body = $message;

        writeEmail($charge_name, $fromMailAddress, $toMailAddress, $subject, $body);
    }
}
?>
