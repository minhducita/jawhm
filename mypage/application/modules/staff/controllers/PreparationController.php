<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/mpdf/mpdf.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_PreparationController extends Zend_Controller_Action {
    private $model;
    private $base;

    /**
     *
     */
    public function init() {
        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];

        if(empty($_SERVER['HTTPS'])) {
            $this->base = 'http://';
        } else {
            $this->base = 'https://';
        }
        $this->base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/PreparationModel.php');
        $this->model = new PreparationModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array();
        $is_client = true;
        without_stafflogin($this, $withoutList, $this->base, $is_client);

    }

    public function indexAction() {
        $params = $this->getRequest ()->getParams ();

        if ($_SESSION['abroad'] == '') {
            $_SESSION['abroad'] = $params['abroad'];
            $this->view->rewrite = 0;
        } else {
            $_SESSION['abroad'] = $_SESSION['abroad'];
            $this->view->rewrite = 1;
        }

        $this->view->username = $_SESSION['mem_name'];
        $status_table = 'clientstatus';
        $status = $this->model->getConfirm($status_table, $_SESSION['mem_id']);
        if(smpcheck()) {
            $smp = 1;
        } else {
            $smp = 0;
        }

        $stat = new MypageConst();
        $client_status = $stat::$CLIENT_STATUS;
        $this->view->status_name = Zend_Json::encode($client_status);

        $this->view->bum = 1;
        $this->view->index = 1;
        $this->view->json = 1;
        $this->view->smp = $smp;
        $this->view->status = $status;
        $this->view->title = 'ご出発前手続一覧';
    }

    public function confirmAction() {
        $params = $this->getRequest ()->getParams ();

        $status_name = $params['item'];
        $status_item = $this->model->getItemStatus('clientstatus', $status_name);

        $_SESSION['confirm'] = $status_name;

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('confirm');

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;

        $this->view->name = $status_name;
        $this->view->status = $status_item;
    }

    public function expirationAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $this->model->setExpiration('clientstatus', $params, $_SESSION['confirm']);

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;
        $this->view->name = $_SESSION['confirm'];
        unset ($_SESSION['confirm']);
    }

    public function confirmedAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $this->model->setConfirming('clientstatus', $_SESSION['confirm'], 1);
        if ($_SESSION['confirm'] === 'flight')
        $this->model->setConfirming('clientstatus', 'flightimage', 1);
        $this->view->name = $_SESSION['confirm'];

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;
        unset ($_SESSION['confirm']);
    }

    public function redoAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $this->model->setConfirming('clientstatus', $_SESSION['confirm'], 2);
        if ($_SESSION['confirm'] === 'flight')
            $this->model->setConfirming('clientstatus', 'flightimage', 2);
        $this->view->name = $_SESSION['confirm'];

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;
        unset ($_SESSION['confirm']);
    }

    public function backAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $this->model->setConfirming('clientstatus', $_SESSION['confirm'], 0);
        if ($_SESSION['confirm'] === 'flight')
            $this->model->setConfirming('clientstatus', 'flightimage', 0);
        $this->view->name = $_SESSION['confirm'];

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;
        unset ($_SESSION['confirm']);
    }

    public function completeAction() {
        $result = $this->model->applicationComplete('clientstatus', 4);
        $this->view->name = $_SESSION['mem_name'];
    }
}