<?php
require_once ('Zend/Json.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Kotaro_IndexController extends Zend_Controller_Action {
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
        $this->model = new Kotaro_IndexModel ();

        initPage($this, '/application/modules/', 'kotaro');

        $params = $this->getRequest ()->getParams ();
        if (!isset($_SESSION['survey']) && isset($params['survey'])) {
            $_SESSION['survey'] = $params['survey'];
        }

        $withoutList = array('login', 'auth', 'logput');
        $login = without_loginkotaro($this, $withoutList, $this->base);

        $brd_id = $const::$MYPAGE_SCREEN_ID['JavaScript'];
        $jq_msg = getScreenMessage($this->msg_tbl, $brd_id, 'ja');
        $this->view->jq_msg = $jq_msg;
    }

    /**
     * index
     */
    public function indexAction() {
        if (!isset($_SESSION['survey'])) {
            return $this->_forward ( 'surveyerror', 'index', 'error' );
        }

        $basePath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/survey/';
        $tempPath = $basePath . 'temp/';

        $survey_table = 'mypage_survey';
        $output = $this->model->getSurvey($survey_table, $_SESSION['survey']);

        if ($output === false || $output['temp'] == 1) {
            return $this->_forward ( 'surveyerror', 'index', 'error' );
        }

        $is_img = false;
        $images = array();
        for ($n=1;$n<=3;$n++) {
            if (!empty($output['image_id'.$n])) {
                $is_img = true;
                $imgpath = $basePath . $output["image_id$n"];
                $extension = substr(strrchr($output["image_id$n"], '.'), 1);
                $image = new Imagick($imgpath);
                $image->setImageFormat($extension);
                $image->thumbnailImage(100, 100);
                $image->writeImage($tempPath.$n.'.'.$extension);
                $image->clear();
                $image->destroy();

                $images[] = 'data:image/'.$extension.';base64,' . base64_encode(file_get_contents($tempPath.$n.'.'.$extension));
                unlink($tempPath.$n.'.'.$extension);
            }
        }

        if($is_img) {
            $this->view->img = $images;
        } else {
            $this->view->img = null;
        }

        $this->view->load_data = $output;
        $this->view->username = $output['client_name'];
        $this->view->job = $output['client_job'];
        $this->view->school = $output['school_name'];
        $this->view->title = 'アンケート閲覧';
    }

    public function loginAction() {
        $this->view->title = 'アンケート閲覧ログイン';
    }

    public function authAction() {
        $params = $this->getRequest ()->getParams ();
        $result = $this->model->loginAuthentication('mypage_school_memlist', $params['school_name'], $params['password']);
        if(!$result) {
            return $this->_forward ( 'kotarologinfailed', 'index', 'error' );
        }

        $member_info = $this->model->memberInfo('mypage_school_memlist', $params);
        $this->loginCommon($member_info);
        $this->model->setLoginDate('mypage_school_memlist', $member_info['school_id']);
    }

    public function logoutAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['ログアウト'];

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
}
