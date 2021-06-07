<?php
require_once ('Zend/Json.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_IndexController extends Zend_Controller_Action {
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
        require_once ($root_dir . 'models/IndexModel.php');
        $this->model = new IndexModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array('login', 'auth', 'logout');
        $is_client = false;
        without_stafflogin($this, $withoutList, $base, $is_client);
    }

    /**
     * index
     */
    public function indexAction() {
        $this->view->title = 'スタッフインデックス';
    }

    public function loginAction() {
        $this->view->title = 'ログイン画面';
    }

    public function logoutAction() {
        $_SESSION = array();
    }

    public function manageAction() {
        $this->view->title = '管理項目一覧';
    }

    public function selectabroadAction() {
        $table = 'T_ENTRY';
        $select = "study_abroad_no,leave_date,leave_country,close_flag";
        $where['client_no'] = array('column' => 'client_no',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->json = 0;
        $this->view->list = $list;
    }
}
?>
