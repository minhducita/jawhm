<?php
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/tools.php');
class School_ProposalController extends Zend_Controller_Action {
    private $model;

    public function init() {
        $const = new MypageConst ();
        $this->msg_tbl = 'mypage_message';

        if(empty($_SERVER['HTTPS'])) {
            $base = 'http://';
        } else {
            $base = 'https://';
        }
        $base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/ProposalModel.php');
        $this->model = new ProposalModel ();
        initPage($this, '/application/modules/', 'school');
        $withoutList = array();
        without_loginschool($this, $withoutList, $base);
        headerLang ( $this, $this->msg_tbl );
    }

    public function indexAction() {
        $proposals = $this->model->getProposals('mypage_seminar_proposal', $_SESSION['school_id']);

        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['セミナー日程提案'];
        $msg = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );

        $paginator = Zend_Paginator::factory($proposals);
        $paginator->setItemCountPerPage(5);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $pages = $paginator->getPages();
        $pageArray = get_object_vars($pages);

        $brd_id = $const::$MYPAGE_SCREEN_ID ['パンくずリスト'];
        $bread_message = getScreenMessage ( $this->msg_tbl, $brd_id, $_SESSION ['language'] );
        $this->view->brd_msg = $bread_message;

        $this->view->msg = $msg;
        $this->view->brd_msg = $bread_message;

        $this->view->pages = $pageArray;
        $this->view->items = $paginator->getIterator();
        $this->view->json = 0;
        $this->view->title = 'セミナー日程提案';
        $this->view->datetimepicker = 1;
    }

    public function changeproposalAction() {
        $params = $this->getRequest ()->getParams ();
        if ($params['id'] != 'new') {
            $content = $this->model->getProposal('mypage_seminar_proposal', $params['id']);

        } else {
            $content = null;
        }
        $_SESSION['mypage_seminar_proposal_id'] = $params['id'];
        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['セミナー日程登録'];
        $msg = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );
        $this->view->msg = $msg;

        $this->view->item = $content;
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('proposal');

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
        var_dump($date_check);
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
            $this->writeEmail($this, 'edit', $params['school_comment'], $_SESSION['mypage_seminar_proposal_id']);
        } else {
            $result = $this->model->insProposal('mypage_seminar_proposal', $params);
            $max_no = $this->model->getId('mypage_seminar_proposal', 'mypage_seminar_proposal_id');
            $this->writeEmail($this, 'new', $params['school_comment'], $max_no);
        }
        unset($_SESSION['mypage_seminar_proposal_id']);

        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['セミナー日程送信'];
        $msg = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );
        $this->view->msg = $msg;

    }

    public function talkdelconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('talkdelete');
        $this->view->id = $params['id'];
        $this->view->time = $params['time'];
    }

    public function deletetalkAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $result = $this->model->delMsg('talklist', $params);
        $this->writeEmail($this, 'delete', null, $params['ID']);
    }

    private function writeEmail($parent, $status, $message, $talk_id) {
        $info = $this->model->getSchoolInfo('mypage_school_memlist', $_SESSION['school_id']);;

        $charge_name = $info['charge_name'];

        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $toMailAddress = $info['email'];
        if ($status === 'new') {
            $subject = $charge_name.'様からセミナー日程提案が届きました[school]<'.$_SESSION['school_id'].'>';
        } else if ($status === 'edit') {
            $subject = $charge_name.'様がセミナー日程提案を編集しました[school]<'.$_SESSION['school_id'].'>';
        } else {
            $subject = $charge_name.'様がセミナー日程提案を削除しました[school]<'.$_SESSION['school_id'].'>';
        }
        $body = $message;

        writeEmail($charge_name, $fromMailAddress, $toMailAddress, $subject, $body);
    }
}