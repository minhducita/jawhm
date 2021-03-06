<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class AchievementController extends Zend_Controller_Action {
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
        require_once ($root_dir . 'models/AchievementModel.php');
        $this->model = new AchievementModel ();
        initPage($this, '/achievement/modules/', 'client');
        $withoutList = array();
        without_loginchk($this, $withoutList, $this->base);
    }

    public function indexAction() {
        $params = $this->getRequest ()->getParams ();
        if ($_SESSION['abroad'] == '') {
            $_SESSION['abroad'] = $params['abroad'];
            $abroad = $params['abroad'];
            $this->view->rewrite = 0;
        } else {
            $abroad = $_SESSION['abroad'];
            $this->view->rewrite = 0;
        }

        $table['base'] = array('table' => 'T_STATUS_DETAILS', 'column' => null);
        $table['M_ENTRY_STATUS'] = array('table' => 'M_ENTRY_STATUS', 'column' => 'status_division',
                'ontable' => 'T_STATUS_DETAILS', 'oncolumn' => 'status_division');

        $select = "T_STATUS_DETAILS.client_no,T_STATUS_DETAILS.study_abroad_no,T_STATUS_DETAILS.status_division,T_STATUS_DETAILS.update_date,T_STATUS_DETAILS.status,T_STATUS_DETAILS.expiration_date, T_STATUS_DETAILS.update_date, M_ENTRY_STATUS.status_name_revision, M_ENTRY_STATUS.status_name_e";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');

        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);

        $table2 = 'M_??????????????????';
        $select2 = "????????????";
        $where2['client_no'] = array('column' => '???????????????',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $items2 = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);

        $table3['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => null);
        $table3['M_school'] = array('table' => 'M_??????', 'column' => '????????????',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');
        $select3 = "T_ENTRY_DETAILS.????????????";
        $where3['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');

        $items3 = joinselect_sqlserver($table3, $select3, $where3, $this->url, $this->pass);

        $mobile = $this->model->getMobile('clientstatus', $_SESSION['mem_id']);

        $is_aus = 0;
        $is_can = 0;
        foreach($items3 as $array) {
            foreach($array as $key => $value) {
                if($value === 'AUS') {
                    $is_aus = 1;
                } elseif ($value === 'CAN') {
                    $is_can = 1;
                }

                if ($is_aus == 1 && $is_can) {
                    break 2;
                }
            }
        }

        $smpchk = smpcheck();
        if ($smpchk) {
            $smp = 1;
        }  else {
            $smp = 0;
        }

        $achievement = array(
                array('step' => 'application', 'name' => 'article', 'jpn_name' => '??????'),
                array('step' => 'application', 'name' => 'agreement', 'jpn_name' => '?????????'),
                array('step' => 'application', 'name' => 'deposit', 'jpn_name' => '????????????'),
                array('step' => 'application', 'name' => 'deposit_finish', 'jpn_name' => '???????????????'),
                array('step' => 'application', 'name' => 'bill', 'jpn_name' => '???????????????'),
                array('step' => 'application', 'name' => 'receipt', 'jpn_name' => '???????????????'),
                array('step' => 'application', 'name' => 'application', 'jpn_name' => '??????(Application Form) ??????'),
                array('step' => 'application', 'name' => 'passport', 'jpn_name' => '?????????????????????'),
                array('step' => 'preparation', 'name' => 'flight', 'jpn_name' => '???????????????'),
                array('step' => 'preparation', 'name' => 'flightimage', 'jpn_name' => '?????????????????????'),
                array('step' => 'preparation', 'name' => 'insurance', 'jpn_name' => '??????????????????'),
                array('step' => 'preparation', 'name' => 'cash_passport', 'jpn_name' => '????????????????????????????????????'),
                array('step' => 'preparation', 'name' => 'loa', 'jpn_name' => '???????????????(Letter of Acceptance) ??????'),
                array('step' => 'preparation', 'name' => 'homestay', 'jpn_name' => '????????????????????????'),
                array('step' => 'preparation', 'name' => 'pickup', 'jpn_name' => '????????????'),
                array('step' => 'preparation', 'name' => 'visa', 'jpn_name' => '????????????')
        );

        if ($is_can == 1) {
            $achievement[] = array('step' => 'preparation', 'name' => 'visa2', 'jpn_name' => '???????????????');
        }

        if ($is_aus == 1) {
            $achievement[] = array('step' => 'preparation', 'name' => 'mobile', 'jpn_name' => '????????????');
            $achievement[] = array('step' => 'preparation', 'name' => 'bank', 'jpn_name' => '????????????');
        }

        $achievement[] = array('step' => 'preparation', 'name' => 'visa_print', 'jpn_name' => '??????????????????????????????');

        $rename = $this->model->getComment('staff_comment');
        $status = $this->model->getConfirm('clientstatus', $_SESSION['mem_id']);
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('staff');

        $this->view->items = $items;
        $this->view->abroad = $abroad;
        $this->view->status = $status;
        $this->view->is_aus = $is_aus;
        $this->view->is_can = $is_can;
        $this->view->mobile = $mobile;
        $this->view->rename = $rename;
        $this->view->smp = $smp;
        $this->view->achievement = $achievement;
        $this->view->title = '??????????????????';

    }

}