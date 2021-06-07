<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_PlanController extends Zend_Controller_Action {
    private $model;

    /**
     *
     */
    public function init() {
        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];
        $this->mailurl = $const::$CRM_MYSQL['URL'];
        $this->mailpass = $const::$CRM_MYSQL['PASSWORD'];
        $this->cipher = $const::$CRM_MYSQL['CIPHER'];

        if(empty($_SERVER['HTTPS'])) {
            $base = 'http://';
        } else {
            $base = 'https://';
        }
        $base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/PlanModel.php');
        $this->model = new PlanModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array();
        $is_client = true;
        without_stafflogin($this, $withoutList, $base, $is_client);
    }

    public function indexAction() {
        if (isset($_SESSION['abroad'])) {
            $this->view->abroad = $_SESSION['abroad'];
        } else {
            $this->view->abroad = '';
        }

        $nextStep = $this->model->getStepSel('mypage_next_step');

        $this->view->next_step = $nextStep;
        $this->view->json = 0;
        $this->view->title = 'プラン画面';
    }

    public function historyAction() {
        $plan = $this->model->getpastPlan('next_step', $_SESSION['mem_id']);
        $this->view->plan = $plan;
    }

    public function nextstepAction() {
        $plan = $this->model->getnextPlan('next_step', $_SESSION['mem_id']);
        $this->view->plan = $plan;
    }

    public function changehistoryAction() {
        $params = $this->getRequest ()->getParams ();

        $nextStep = $this->model->getStepSel('mypage_next_step');
        $item = $this->model->getNextStep('next_step', $params['id']);
        $_SESSION['next_step_id'] = $params['id'];

        $this->view->next_step = $nextStep;
        $this->view->item = $item;
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('next_step');

    }

    public function edithistoryAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['step_name']) || empty($params['step_exposition_short'])
                || empty($params['preparation'])) {
                    return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $this->model->editStep('next_step', $params);
    }

    public function stepcompAction() {
        $params = $this->getRequest ()->getParams ();

        switch($params['step_no']) {
            case 0:
                $step_name = 'seminar_beginner';
                $jp = '初心者向けセミナーのステップが完了しました。';
                break;

            case 1:
                $step_name = 'seminar_planning';
                $jp = '海外渡航プランニング法セミナーのステップが完了しました。';
                break;

            case 2:
                $step_name = 'seminar_info';
                $jp = '情報収集セミナーのステップが完了しました。';
                break;

            case 3:
                $step_name = 'seminar_discussion';
                $jp = '懇談カウンセリングのステップが完了しました。';
                break;

            case 4:
                $step_name = 'seminar_school';
                $jp = '語学学校セミナーのステップが完了しました。';
                break;

            case 5:
                $step_name = 'decide_country';
                $jp = '渡航国を決めようのステップが完了しました。';
                break;

            case 6:
                $step_name = 'decide_period';
                $jp = '渡航時期を決めようのステップが完了しました。';
                break;

            case 7:
                $step_name = 'decide_school';
                $jp = '語学学校を決めようのステップが完了しました。';
                break;

            case 8:
                $step_name = 'decide_accomodation';
                $jp = '海外での住まいを決めようのステップが完了しました。';
                break;

            case 9:
                $step_name = 'register_school';
                $jp = '入学手続きをしようのステップが完了しました。';
                break;

            case 10:
                $step_name = 'register_visa';
                $jp = 'ビザの申請をしようのステップが完了しました。';
                break;

            case 14:
                $step_name = 'reserve_flight';
                $jp = 'フライトの予約をしようのステップが完了しました。';
                break;

            case 17:
                $step_name = 'join_step1';
                $jp = '出発前セミナーステップ1に参加しようのステップが完了しました。';
                break;

            case 18:
                $step_name = 'join_step2';
                $jp = '出発前セミナーステップ2に参加しようのステップが完了しました。';
                break;

            case 19:
                $step_name = 'go_abroad';
                $jp = '海外へ渡航! のステップが完了しました。';
                break;

            default:
                $step_name = false;
                $jp = '各国ビザ申請、フライト見積・予約確認についてはチェックされません。';
                break;
        }

        if ($step_name != false) {
            $this->model->setStepStatus('clientstatus', $step_name);
            if ($params['step_no'] == 5 || $params['step_no'] == 6 || $params['step_no'] == 7
                        || $params['step_no'] == 8 || $params['step_no'] == 9) {
                            $this->model->counselingchk('clientstatus');
                        }
        }
        $this->view->jp = $jp;
    }

    public function completeAction() {
        $result = $this->model->planComplete('clientstatus', 2);
        $this->view->name = $_SESSION['mem_name'];
    }
}