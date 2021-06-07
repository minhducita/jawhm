<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class TalkController extends Zend_Controller_Action {
    private $model;

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
           $base =  'https://';
        }
        $base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/TalkModel.php');
        $this->model = new TalkModel ();
        initPage($this, '/application/modules/', 'client');
        $withoutList = array();
        without_loginchk($this, $withoutList, $base);
    }

    public function indexAction() {
        $message = $this->model->getMsg('talklist', $_SESSION['mem_id']);
        $name = $this->model->getName('clientlist', $_SESSION['mem_id']);

        $this->view->items = $message;
        $this->view->name = $name;
        $this->view->json = 0;
        $this->view->title = '一言相談リスト';
    }

    public function changetalkAction() {
        $params = $this->getRequest ()->getParams ();

        if (isset($_SESSION['talk'])) {
            $talk_content = $_SESSION['talk'];
        } elseif ($params['id'] != 'new') {
            $talk_content = $this->model->getContent('talklist', $params['id']);
            $_SESSION['talk_id'] = $params['id'];
        } else {
            $talk_content = array('talk_content' => '', 'talk_id' => '');
            $_SESSION['talk_id'] = null;
        }

        $this->view->item = $talk_content;
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('talk');

    }

    public function talkconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $_SESSION['talk'] = $params;

        // input check
        if(empty($params['talk_content']) || mb_strlen($params['talk_content']) > 300) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('talk-confirm');
        $this->view->item = $params;
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

        if(!is_null($_SESSION['talk_id'])) {
            $result = $this->model->editMsg('talklist', $_SESSION['talk'], $base);
            $this->writeEmail($this, 'edit', $_SESSION['talk']['talk_content'], $_SESSION['talk_id']);
        } else {
            $result = $this->model->insMsg('talklist', $_SESSION['talk'], $base);
            $max_no = $this->model->getId('talklist', 'talk_id');
            $this->writeEmail($this, 'new', $_SESSION['talk']['talk_content'], $max_no);
        }
        unset($_SESSION['talk']);
        unset($_SESSION['talk_id']);
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
        $client_no = getCrmid('memlist', $_SESSION['mem_id']);
        $name = '('.$client_no['crmid'].')  '.$_SESSION['mem_name'];

        $items = getFromAddress($_SESSION['crm_id']);

        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $toMailAddress = $items[0][0];
        if ($status === 'new') {
            $subject = $name.'様から一言相談が届きました['.$client_no['crmid'].'] <mail'.$talk_id.'>';
        } else if ($status === 'edit') {
            $subject = $name.'様が一言相談を編集しました['.$client_no['crmid'].'] <mail'.$talk_id.'>';
        } else {
            $subject = $name.'様が一言相談を削除しました['.$client_no['crmid'].'] <mail'.$talk_id.'>';
        }
        $body = $message;

        writeEmail($name, $fromMailAddress, $toMailAddress, $subject, $body);
    }
}