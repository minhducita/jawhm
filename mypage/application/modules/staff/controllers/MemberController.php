<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_MemberController extends Zend_Controller_Action {
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
            $protcol = 'http://';
        } else {
            $protcol = 'https://';
        }
        $this->base .= $protcol . $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/MemberModel.php');
        $this->model = new MemberModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array('mailauth');
        $is_client = true;
        without_stafflogin($this, $withoutList, $base, $is_client);
    }

    public function indexAction() {
        $this->view->datepicker = 0;
        $this->view->title = '会員情報変更';
    }
}