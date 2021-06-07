<?php
require_once ('Zend/Json.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class School_IndexController extends Zend_Controller_Action {
    public $model;
    private $msg_tbl;

    public function init() {
        $const = new MypageConst();

        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];
        $this->msg_tbl = 'mypage_message';

        if(empty($_SERVER['HTTPS'])) {
            $this->base = 'http://';
        } else {
            $this->base = 'https://';
        }
        $this->base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/IndexModel.php');
        $this->model = new School_IndexModel ();
        initPage($this, '/application/modules/', 'school');
        $withoutList = array('login', 'auth', 'logput', 'forgetpassword', 'forgetloginschool',
                'forgetother', 'passwordreset');
        $login = without_loginschool($this, $withoutList, $this->base);
        headerLang($this, 'mypage_message');

        $brd_id = $const::$MYPAGE_SCREEN_ID['JavaScript'];
        $jq_msg = getScreenMessage($this->msg_tbl, $brd_id, $_SESSION['language']);
        $this->view->jq_msg = $jq_msg;
    }

    /**
     * index
     */
    public function indexAction() {
        $contact_table = 'mypage_school_contact';
        $range_table = 'mypage_school_range';

        // get contact
        $getMessage = $this->model->getMsg($contact_table, $_SESSION['school_id'], 3);
        $image_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/images/school/';
        $school_logo = 'data:image/jpg;base64,' . base64_encode(file_get_contents($image_path . $_SESSION['school_name'] . '.jpg'));

        // get person in charge school number
        $school_numbers = $this->model->getRange($range_table, $_SESSION['school_id']);

        // get this month's entrance member
        $today = date("Y-m-d H:i:s");
        $next_month = date("Y-m-d H:i:s",strtotime("+1 month"));

        $table['base'] = array('table' => 'M_顧客基本情報', 'column' => null);
        $table['T_ENTRY_ENTRY'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'client_no',
                                            'ontable' => 'M_顧客基本情報', 'oncolumn' => 'お客様番号');
        $select = "T_ENTRY_DETAILS.client_no, T_ENTRY_DETAILS.study_abroad_no, T_ENTRY_DETAILS.entrance_date,
                T_ENTRY_DETAILS.weeks, T_ENTRY_DETAILS.memo, M_顧客基本情報.氏名, M_顧客基本情報.ラストネーム,
                M_顧客基本情報.ファーストネーム, T_ENTRY_DETAILS.school_no";

        $where[] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                'value' => $today,
                'comp' => '>=',
                'andor' => 'null'
        );

        $where[] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                'value' => $next_month,
                'comp' => '<=',
                'andor' => 'and'
        );

        $i = 0;
        $is_first = true;
        foreach($school_numbers as $no) {
            if($is_first) {
                $andor = 'and';
                $is_first = false;
            } else {
                $andor = 'or';
            }
            $where[] = array('column' => 'T_ENTRY_DETAILS.school_no',
                    'value' => $no['school_no'],
                    'comp' => '=',
                    'andor' => $andor
            );
            $i++;
        }

        $where[] = array('column' => 'T_ENTRY_DETAILS.comm_division',
                'value' => 0,
                'comp' => '<>',
                'andor' => 'and'
        );
        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);
        $paginator = Zend_Paginator::factory($items);
        $paginator->setItemCountPerPage(6);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $pages = $paginator->getPages();
        $pageArray = get_object_vars($pages);

        $total_number = 0;
        $finish_number = 0;
        foreach($items as $index => $array) {
            foreach($array as $key => $value) {
                switch($key) {
                    case 'client_no':
                        break;

                    case 'check_date':
                        $total_number++;
                        if ($value != 'null') {
                            $finish_number++;
                        }
                        break;

                    default:
                        break;
                }
            }
        }

        // get target school's seminar
        $school_name = $this->model->getSchoolName(array('mypage_school_range'), $_SESSION['school_id']);
        $seminar = $this->model->seminarIntend(array('event_list'), $school_name);
        $join_number = $this->model->seminarJoin(array('entrylist'), $seminar);

        $paginator2 = Zend_Paginator::factory($seminar);
        $paginator2->setItemCountPerPage(2);
        $paginator2->setCurrentPageNumber($this->_getParam('page2'));
        $pages2 = $paginator2->getPages();
        $pageArray2 = get_object_vars($pages2);

        if(smpcheck()) {
            $smp = 1;
        } else {
            $smp = 0;
        }

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['ダッシュボード'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;

        $const = new MypageConst();
        $brd_id = $const::$MYPAGE_SCREEN_ID['パンくずリスト'];
        $bread_message = getScreenMessage($this->msg_tbl, $brd_id, $_SESSION['language']);
        $this->view->brd_msg = $bread_message;

        $this->view->message = $getMessage;
        $this->view->logo = $school_logo;
        $this->view->pages = $pageArray;
        $this->view->student = $paginator->getIterator();
        $this->view->json = 1;
        $this->view->bum = 1;
        $this->view->school_full_name = $_SESSION['school_full_name'];
        $this->view->school_name = $_SESSION['school_name'];
        $this->view->school_id = $_SESSION['school_id'];
        $this->view->pages2 = $pageArray2;
        $this->view->seminar = $paginator2->getIterator();
        $this->view->join_number = $join_number;
        $this->view->smp = $smp;
        $this->view->index = 1;
        $this->view->top = 1;
        $this->view->last_login = $_SESSION['last_login_date'];
        $this->view->title = '学校様ダッシュボード';
    }

    public function appendcommentAction() {
        $params = $this->getRequest ()->getParams ();
        if ($params['id'] != 'new') {
            $contact = $this->model->getComment('mypage_school_contact', $params['id']);

        } else {
            $contact = array('comment' => '', 'mypage_school_contact_id' => '');
        }

        $this->view->item = $contact;
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('append_comment');
        $this->view->no = $params['no'];

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['つながり返信'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;
    }

    public function changecommentAction() {
        $params = $this->getRequest ()->getParams ();
        if ($params['id'] != 'new') {
            $contact = $this->model->getComment('mypage_school_contact', $params['id']);
            $_SESSION['school_contact'] = $params['id'];
        } else {
            $contact = array('comment' => '', 'mypage_school_contact_id' => '');
            $_SESSION['school_contact'] = null;
        }

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['つながり入力'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;

        $this->view->item = $contact;
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('modal_comment');
    }

    public function editcommentAction() {
        $params = $this->getRequest ()->getParams ();
        $table = 'mypage_school_contact';
        $id = $_SESSION['school_id'];

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['modal-comment']) || mb_strlen($params['modal-comment']) > 300) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $comment = $params['modal-comment'];

        if(!is_null($_SESSION['school_contact'])) {
            $result = $this->model->editContact($table, $_SESSION['school_contact'], $comment);
            $this->writeEmailReceiveContact($this, 'edit', $comment, $_SESSION['school_contact']);
        } else {
            $result = $this->model->insContact($table, $comment);
            $max_no = $this->model->getId($table, 'mypage_school_contact_id');
            $this->writeEmailReceiveContact($this, 'new', $comment, $max_no);
        }

        $_SESSION['last_login_date'] = date('c');
        $this->model->setLoginDate('mypage_school_memlist', $_SESSION['school_id']);

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['つながり入力完了'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;
    }

    public function appendeditcommentAction() {
        $params = $this->getRequest ()->getParams ();
        $table = 'mypage_school_contact';
        $id = $_SESSION['school_id'];

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $comment = null;
        foreach($params as $key => $value) {
            if (preg_match('/comment_[0-9]/', $key)) {
                $comment = $value;
                break;
            }
        }

        // input check
        if (is_null($comment) || mb_strlen($comment > 300)) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $result = $this->model->insContact($table, $comment);
        $max_no = $this->model->getId($table, 'mypage_school_contact_id');
        $this->writeEmailReceiveContact($this, 'new', $comment, $max_no);

        $_SESSION['last_login_date'] = date('c');
        $this->model->setLoginDate('mypage_school_memlist', $_SESSION['school_id']);
        $this->view->no = $params['no'];

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['つながり返信完了'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;
    }

    public function commentdelconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('commentdelete');
        $this->view->id = $params['id'];
        $this->view->time = $params['time'];

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['つながり削除確認'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;
    }

    public function deletecommentAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $result = $this->model->delMsg('mypage_school_contact', $params);
        $this->writeEmailReceiveContact($this, 'delete', null, $params['ID']);

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['つながり削除完了'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;
    }

    public function contactreloadAction() {
        // get contact
        $contact_table = 'mypage_school_contact';
        $getMessage = $this->model->getMsg($contact_table, $_SESSION['school_id'], 3);
        $image_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/images/school/';
        $school_logo = 'data:image/jpg;base64,' . base64_encode(file_get_contents($image_path . $_SESSION['school_name'] . '.jpg'));

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['ダッシュボード'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;

        $this->view->message = $getMessage;
        $this->view->logo = $school_logo;
        $this->view->last_login = $_SESSION['last_login_date'];
        $this->view->school_id = $_SESSION['school_id'];
    }

    public function changepasswordAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['パスワード変更'];
        $msg_tbl = 'mypage_message';
        $message = getScreenMessage($msg_tbl, $scr_id, $_SESSION['language']);

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('password');
        $this->view->msg = $message;
    }

    public function editpasswordAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['パスワード変更完了'];
        $msg_tbl = 'mypage_message';
        $message = getScreenMessage($msg_tbl, $scr_id, $_SESSION['language']);

        if(empty($params['password'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if($params['password'] != $params['retype']) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if(strlen($params['password']) < 5) {
            header('Location: '.$this->base.'mypage/error/lengtherror/column/'.$message[7]['message'].'/length/5');
            throw new Exception($date_check_departure);
        }

        $change_password = $this->model->editPassword('mypage_school_memlist', $_SESSION['school_id'], $params['password']);
        $this->view->msg = $message;
    }

    public function loginAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['ログイン'];
        $dis_id = $const::$MYPAGE_SCREEN_ID['ログインできない方'];

        $params = $this->getRequest ()->getParams ();
        if (!isset($_SESSION['language'])) {
            $_SESSION['language'] = 'ja';
        }

        if(isset($params['language'])) {
            $_SESSION['language'] = $params['language'];
        }

        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $disable = getScreenMessage($this->msg_tbl, $dis_id, $_SESSION['language']);

        $this->view->message = $message;
        $this->view->disable = $disable;
        $this->view->locale = $_SESSION['language'];
        $this->view->smp = 1;
        $this->view->title = '学校様ログイン';
    }

    public function forgetpasswordAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['パスワード忘れ'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('forgetpassword');
        $this->view->msg = $message;
    }

    public function forgetloginschoolAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['ログインID忘れ'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->msg = $message;
    }

    public function forgetotherAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['その他'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->msg = $message;
    }

    public function passwordresetAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $email_check = $this->model->loginSchoolCheck('mypage_school_memlist', $params);

        if (!$email_check) {
            return $this->_forward ( 'erroremail', 'index', 'error' );
        }

        $change_password = $this->model->resetPassword('mypage_school_memlist', $params['email_reset']);
        $fromMailAddress = 'info@jawhm.or.jp';
        $toName = $email_check['charge_name'];
        $toMailAddress = $params['email_reset'];
        $subject = '新しいパスワードをお送りします';
        $body = '日本ワーキングホリデー協会です。';
        $body .= chr(10);
        $body .= chr(10);
        $body .= 'メンバー専用ページへのログインに必要なパスワードの再発行を承りました。';
        $body .= chr(10);
        $body .= '新しいパスワード（１２桁）は、以下の通りとなります。';
        $body .= chr(10);
        $body .= chr(10);
        $body .= 'パスワード [ '.$change_password.' ]';
        $body .= chr(10);
        $body .= chr(10);
        $body .= 'なお、ログイン後、新しいパスワードに変更することをお勧めいたします。';

        writeEmail($toName, $fromMailAddress, $toMailAddress, $subject, $body);

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['パスワードリセット完了'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;
    }

    public function authAction() {
        $params = $this->getRequest ()->getParams ();
        $result = $this->model->loginAuthentication('mypage_school_memlist', $params['school_name'], $params['password']);
        if(!$result) {
            return $this->_forward ( 'schoolloginfailed', 'index', 'error' );
        }

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['ログイン成功'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $member_info = $this->model->memberInfo('mypage_school_memlist', $params);
        $req = $this->getRequest();
        $actionName = $req->getActionName();
        $this->loginCommon($member_info);
        $this->model->setLoginDate('mypage_school_memlist', $member_info['school_id']);
        $this->view->msg = $message;
    }

    public function logoutAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['ログアウト'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;

        $_SESSION = array();

    }

    private function loginCommon(&$login_info) {
        $_SESSION['school_id'] = $login_info['school_id'];
        $_SESSION['school_name'] = $login_info['school_name'];
        $_SESSION['school_full_name'] = $login_info['school_full_name'];
        $_SESSION['mem_ip'] = $_SERVER["REMOTE_ADDR"];
        $_SESSION['last_login_date'] = $login_info['last_log_on'];
        $req = $this->getRequest();
        $actionName = $req->getActionName();
        $this->model->setLoginDate('mypage_school_memlist', $login_info['school_id']);
    }

    private function writeEmailReceiveContact($parent, $status, $message, $id) {
        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $charge_name = $this->model->getChargeName('mypage_school_memlist', $_SESSION['school_id']);
        $toName = $charge_name['charge_name'];
        $toMailAddress = 'school@jawhm.or.jp';
        if ($status === 'new') {
            $subject = $charge_name['charge_name'].'様からつながりメッセージが届きました[school]<'.$_SESSION['school_id'].'>';
        } else if ($status === 'edit') {
            $subject = $charge_name['charge_name'].'様がつながりメッセージを編集しました[school]<'.$_SESSION['school_id'].'>';
        } else {
            $subject = $charge_name['charge_name'].'様がつながりメッセージを削除しました[school]<'.$_SESSION['school_id'].'>';
        }
        $body = $message;

        writeEmail($toName, $fromMailAddress, $toMailAddress, $subject, $body);
    }
}
