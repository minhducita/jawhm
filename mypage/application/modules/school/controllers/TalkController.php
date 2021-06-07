<?php
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/tools.php');
class School_TalkController extends Zend_Controller_Action {
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
        require_once ($root_dir . 'models/TalkModel.php');
        $this->model = new TalkModel ();
        initPage($this, '/application/modules/', 'school');
        $withoutList = array();
        without_loginschool($this, $withoutList, $base);
        headerLang ( $this, $this->msg_tbl );
    }

    public function indexAction() {
        $message = $this->model->getMsg('mypage_school_contact', $_SESSION['school_id']);
        $image_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/themes/images/school/';

        $school_logo = 'data:image/jpg;base64,' . base64_encode(file_get_contents($image_path . $_SESSION['school_name'] . '.jpg'));

        $_SESSION['last_login_date'] = date('c');
        $this->model->setLoginDate('mypage_school_memlist', $_SESSION['school_id']);

        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['つながり履歴一覧'];
        $msg = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );

        $brd_id = $const::$MYPAGE_SCREEN_ID ['パンくずリスト'];
        $bread_message = getScreenMessage ( $this->msg_tbl, $brd_id, $_SESSION ['language'] );
        $this->view->brd_msg = $bread_message;

        $this->view->msg = $msg;
        $this->view->brd_msg = $bread_message;

        $this->view->items = $message;
        $this->view->logo = $school_logo;
        $this->view->json = 0;
        $this->view->title = 'つながり履歴リスト';
    }

    public function changetalkAction() {
        $params = $this->getRequest ()->getParams ();
        if ($params['id'] != 'new') {
            $talk_content = $this->model->getContent('talklist', $params['id']);

        } else {
            $talk_content = array('talk_content' => '', 'talk_id' => '');
        }

        $this->view->item = $talk_content;
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('talk');

    }

    public function edittalkAction() {
        $params = $this->getRequest ()->getParams ();
        $id = $_SESSION['mem_id'];
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);
        $base = substr($crmid['crmid'], 0, 2);

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['talk_content']) || mb_strlen($params['talk_content']) > 300) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if(!empty($params['id'])) {
            $result = $this->model->editMsg('talklist', $params, $base);
            $this->writeEmail($this, 'edit', $params['talk_content'], $params['id']);
        } else {
            $result = $this->model->insMsg('talklist', $params, $base);
            $max_no = $this->model->getId('talklist', 'talk_id');
            $this->writeEmail($this, 'new', $params['talk_content'], $max_no);
        }
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
        $name = $_SESSION['charge_name'];

        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $toMailAddress = $items[0][0];
        if ($status === 'new') {
            $subject = $name.'様から一言相談が届きました[school]<'.$_SESSION['school_id'].'>';
        } else if ($status === 'edit') {
            $subject = $name.'様が一言相談を編集しました[school]<'.$_SESSION['school_id'].'>';
        } else {
            $subject = $name.'様が一言相談を削除しました[school]<'.$_SESSION['school_id'].'>';
        }
        $body = $message;

        writeEmail($name, $fromMailAddress, $toMailAddress, $subject, $body);
    }
}