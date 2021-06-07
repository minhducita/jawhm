<?php
Zend_Session::start();
require_once ('Zend/Json.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_ClientController extends Zend_Controller_Action {
    public $model;

    /**
     *
     */
    public function init() {
        if(empty($_SERVER['HTTPS'])) {
            $this->base = 'http://';
        } else {
            $this->base = 'https://';
        }

        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];
        $this->listurl = $const::$LIST_MYSQL['URL'];
        $this->staff = $const::$LIST_MYSQL['PASSWORD'];

        $this->base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/ClientModel.php');
        $this->model = new ClientModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array('login', 'index', 'noclient', 'stafflogin');
        $is_client = true;
        without_stafflogin($this, $withoutList, $this->base, $is_client);
    }

    /**
     * index
     */
    public function indexAction() {
        $params = $this->getRequest ()->getParams ();
        $this->view->item = $params;
    }

    public function staffloginAction() {
        $params = $this->getRequest ()->getParams ();
        $login_info = $this->model->clientGet('memlist', $params['client_no']);

        $table = 'm_staff';
        $select = 'OPE_AUTH';
        $where['kg_cd'] = array('column' => 'KG_CD',
                'value' => 'jawhm',
                'comp' => '=',
                'andor' => 'null');
        $where['staff_cd'] = array('column' => 'STAFF_CD',
                'value' => str_replace('mail', '', $params['staff_cd']),
                'comp' => '=',
                'andor' => 'AND');

        $context = stream_context_create(array(
                'http' => array(
                        'method' => 'POST',
                        'header' => implode('\r\n', array(
                                'Content-Type: application/x-www-form-urlencoded',
                        )),
                        'content' => http_build_query(array(
                                'pwd' => $this->staff,
                                'command' => 'select',
                                'table' => $table,
                                'select' => $select,
                                'where' => $where
                        )),
                )
        ));
        $content = file_get_contents($this->listurl, false, $context);
        $j_content = json_decode($content);
        $items = array();
        foreach($j_content as $row) {
            if(is_object($row)) {
                array_push($items, get_object_vars($row));
            }
        }

        $checkMem = $this->model->checkMember('clientlist', $login_info['id']);

        if (!$checkMem) {
            $result = $this->model->memberidRegistration('clientlist', $params['client_no'], $login_info['id'], $login_info['namae']);
            $crmid = getCrmid('memlist', $login_info['id']);
            $result2 = $this->model->statusRegistration('clientstatus', $login_info['id'], $crmid['crmid']);
        }

        $_SESSION['staff_cd'] = $params['staff_cd'];
        $_SESSION['office_cd'] = $params['office_cd'];
        $_SESSION['crm_id'] = $params['client_no'];
        $_SESSION['auth_cd'] = $items[0]['OPE_AUTH'];
        $_SESSION['mem_id'] = $login_info['id'];
        $_SESSION['mem_name'] = $login_info['namae'];
        $_SESSION['mem_ip'] = $_SERVER["REMOTE_ADDR"];
        $progress = $this->model->getProgress('clientstatus', $login_info['id']);
        $_SESSION['progress_level'] = $progress['progress_level'];
        $_SESSION['user'] = 'staff';

        return $this->_forward('clientindex');
    }

    public function clientindexAction() {
        // get client's name
        $front = Zend_Controller_Front::getInstance();
        $table1 = 'M_顧客基本情報';
        $select1 = "氏名, ラストネーム, ファーストネーム";
        $where1['crm_id'] = array('column' => 'お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $name = select_sqlserver($table1, $select1, $where1, $this->url, $this->pass);

        // get plan of passage
        $plan = $this->model->getPlan('clientstatus', $_SESSION['mem_id']);

        // get next step
        $next_step = $this->model->getNextStep('next_step', $_SESSION['mem_id']);

        // get next seminar's date
        $seminar = $this->model->getNextSeminar(array('entrylist', 'event_list'), $_SESSION['crm_id']);
        if (isset($seminar[0])) {
            $next_seminar = $seminar[0];
        } else {
            $next_seminar = null;
        }

        // reserve info
        $table3 = 'M_顧客基本情報';
        $select3 = "次回来店予定";
        $where3['crm_id'] = array('column' => 'お客様番号',
                'value' =>$_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $reserve = select_sqlserver($table3, $select3, $where3, $this->url, $this->pass);

        if(smpcheck()) {
            $smp = 1;
        } else {
            $smp = 0;
        }

        $first = $this->model->firstLogin('clientstatus', 'first_time', $_SESSION['mem_id']);

        // check client can fill questionnaire.
        $table = 'T_ENTRY_DETAILS';
        $select = "study_abroad_no, max(entrance_date) AS entrance_date";
        $where['crm_id'] = array('column' => 'client_no',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');
        $where['entrance_date'] = array('column' => 'entrance_date',
                'value' => 'null',
                'comp' => 'ni',
                'andor' => 'and');

        $group = 'study_abroad_no';

        $entrance_date = getmaxnumber_sqlserver($table, $select, $where, $group, $this->url, $this->pass);
        $survey_table = 'mypage_survey';
        $survey = $this->model->getSurvey($survey_table, $_SESSION['mem_id']);
        if (empty($survey)) {
            $no_survey = true;
        } else {
            $no_survey = false;
        }

        $min_date = new Datetime('9999-12-31 23:59:59');
        $finished_survey = false;
        $abroad = null;

        foreach($entrance_date as $array) {
            foreach($array as $key => $value) {
                switch($key) {
                    case 'study_abroad_no':
                        $abroad = $value;
                        break;

                    case 'entrance_date':
                        $entrance = new Datetime($value);
                        if($min_date > $entrance) {
                            if (!$no_survey) {
                                foreach($survey as $list) {
                                    if($abroad === $list['study_abroad_no'] && $list['temp'] == 1) {
                                        $min_date = $entrance;
                                        $abroad = null;
                                        break;
                                    } else if ($abroad === $list['study_abroad_no']) {
                                        $abroad = null;
                                        $finished_survey = true;
                                        break;
                                    }
                                }
                            } else {
                                $min_date = $entrance;
                            }

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        $today = new Datetime();
        if ($today > $min_date && !$finished_survey) {
            $is_survey = 1;
        } else {
            $is_survey = 0;
        }

        // show achievement status
        $items = $this->model->getStatus('clientstatus', $_SESSION['mem_id']);

        if (!empty($items['study_abroad'])) {
            $today = date("Y-m-d h:i:s");
            $table2['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'null');
            $table2['addr_type'] = array('table' => 'M_学校', 'column' => '学校番号',
                    'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');
            $select2 = 'M_学校.学校名, M_学校.国';
            $where2['abroad_no'] = array('column' => 'T_ENTRY_DETAILS.study_abroad_no',
                    'value' => $items['study_abroad_no'],
                    'comp' => '=',
                    'andor' => 'null');
            $where2['comm_division'] = array('column' => 'T_ENTRY_DETAILS.comm_division',
                    'value' => '1',
                    'comp' => '=',
                    'andor' => 'AND');
            $where2['entrance_date'] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                    'value' => $today,
                    'comp' => '>',
                    'andor' => 'AND');
            $items2 = joinselect_sqlserver($table2, $select2, $where2, $this->url, $this->pass);
        } else {
            $items2 = null;
        }

        $target_items = array();
        $next_status = null;
        $expiration_date = new Datetime('9999-12-31 23:59:59');
        $temp_date = null;
        $is_expiration = 0;

        foreach($items as $key => $value) {
            switch($key) {
                case 'article_expiration_date':
                    $temp_date = $value;
                    break;

                case 'article_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '約款';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'agreement_expiration_date':
                    $temp_date = $value;
                    break;

                case 'agreement_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '同意書';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'deposit_finish_expiration_date':
                    $temp_date = $value;
                    break;

                case 'deposit_finish_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '支払日入力';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'deposit_expiration_date':
                    $temp_date = $value;
                    break;

                case 'deposit_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '見積閲覧';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'bill_expiration_date':
                    $temp_date = $value;
                    break;

                case 'bill_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '請求書確認';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'receipt_expiration_date':
                    $temp_date = $value;
                    break;

                case 'receipt_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '受領書確認';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'passpprt_expiration_date':
                    $temp_date = $value;
                    break;

                case 'passport_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = 'パスポート提示';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'application_expiration_date':
                    $temp_date = $value;
                    break;

                case 'application_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '願書(Application Form';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'homestay_expiration_date':
                    $temp_date = $value;
                    break;

                case 'homestay_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = 'ホームステイ詳細';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'flight_expiration_date':
                    $temp_date = $value;
                    break;

                case 'flight_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '航空券取得';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'insurance_expiration_date':
                    $temp_date = $value;
                    break;

                case 'insurance_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '海外保険加入';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'visa_expiration_date':
                    $temp_date = $value;
                    break;

                case 'visa_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = 'ビザ申請';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'visa2_expiration_date':
                    $temp_date = $value;
                    break;

                case 'visa2_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = 'ビザ申請2';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'mobile_expiration_date':
                    $temp_date = $value;
                    break;

                case 'mobile_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '携帯電話';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'cash_passport_expiration_date':
                    $temp_date = $value;
                    break;

                case 'cssh_passport_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = 'キャッシュパスポート取得';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'loa_expiration_date':
                    $temp_date = $value;
                    break;

                case 'loa_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '入学許可書(Letter of Acceptance) 取得';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'pickup_expiration_date':
                    $temp_date = $value;
                    break;

                case 'pickup_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '送迎案内';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'visa_print_expiration_date':
                    $temp_date = $value;
                    break;

                case 'visa_print_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = 'ビザのプリントアウト';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'bank_expiration_date':
                    $temp_date = $value;
                    break;

                case 'bank_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '銀行開設';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'flightimage_expiration_date':
                    $temp_date = $value;
                    break;

                case 'flightimage_flag':
                    if (!is_null($temp_date)) {
                        $target_date = new Datetime($temp_date);
                        if($expiration_date > $target_date && $value == 0) {
                            $is_expiration = 1;
                            $next_status = '航空券証明画像';
                            $expiration_date = $target_date;
                        }
                    }
                    break;

                case 'article_confirm':
                case 'agreement_confirm':
                case 'deposit_finish_confirm':
                case 'deposit_confirm':
                case 'bill_confirm':
                case 'receipt_confirm':
                case 'passport_confirm':
                case 'application_confirm':
                case 'homestay_confirm':
                case 'flight_confirm':
                case 'insurance_confirm':
                case 'visa_confirm':
                case 'cash_passport_confirm':
                case 'loa_confirm':
                case 'pickup_confirm':
                case 'visa_print_confirm':
                case 'flightimage_confirm':
                case 'join_seminar':
                case 'counseling':
                case 'register_visa':
                case 'reserve_flight':
                case 'join_step1':
                case 'join_step2':
                case 'go_abroad':
                case 'seminar_beginner':
                case 'seminar_planning':
                case 'seminar_info':
                case 'seminar_discussion':
                case 'seminar_school':
                case 'decide_country':
                case 'decide_period':
                case 'decide_school':
                case 'decide_accomodation':
                case 'register_school':
                    $target_items[] = array($key=>$value);
                    break;

                case 'visa2_confirm':
                    if(!is_null($items2)) {
                        foreach($items2 as $item) {
                            if ($item[1] === 'カナダ') {
                                $target_items[] = array($key=>$value);
                                break;
                            }
                        }
                    }
                    break;

                case 'mobile_confirm':
                case 'bank_confirm':
                    if (!is_null($items2)) {
                        foreach($items2 as $item) {
                            if ($item[1] === 'オーストラリア') {
                                $target_items[] = array($key=>$value);
                                break;
                            }
                        }
                    }
                    break;

            }
        }
        if ($finished_survey) {
            $target_items[] = array('survey' => 1);
        } else {
            $target_items[] = array('survey' => 0);
        }

        $total_num = count($target_items);
        $closed_num = 0;
        foreach($target_items as $item){
            foreach($item as $key2 => $val2) {
                if ($val2 == 1) {
                    $closed_num++;
                }
            }
        }

        if ($closed_num == 0) {
            $percent = 0;
        } else {
            $percent = round(($closed_num / $total_num * 100), 0);
        }

        $expiration = get_object_vars($expiration_date);

        $this->view->json = 1;
        $this->view->bum = 1;
        $this->view->name = $name[0];
        $this->view->plan = $plan;
        $this->view->percent = $percent;
        $this->view->next_step = $next_step;
        $this->view->next_seminar = $next_seminar;
        $this->view->reserve = $reserve[0];
        $this->view->mem_id = $_SESSION['mem_id'];
        $this->view->first = $first['first_time'];
        $this->view->smp = $smp;
        $this->view->index = 1;
        $this->view->top = 1;
        $this->view->url = $this->base;
        $this->view->datetimepicker = 1;
        $this->view->survey = $is_survey;
        $this->view->next_status = $next_status;
        $this->view->expiration_date = $expiration['date'];
        $this->view->is_expiration = $is_expiration;
        $this->view->title = 'お客様マイページ';
    }

    public function loginAction() {
        //if (!isset($_SESSION['staff_cd'])) {
            $params = $this->getRequest ()->getParams ();
            $login_info = $this->model->clientGet('memlist', $params['crm_id']);
            $_SESSION['staff_cd'] = $params['staff_cd'];
            $_SESSION['office_cd'] = $params['office_cd'];
            $_SESSION['crm_id'] = $params['crm_id'];
            $_SESSION['office_cd'] = $params['office_cd'];
            $_SESSION['auth_cd'] = $params['auth_cd'];
            $_SESSION['mem_id'] = $login_info['id'];
            $_SESSION['mem_name'] = $login_info['namae'];
            $_SESSION['mem_ip'] = $_SERVER["REMOTE_ADDR"];
            $progress = $this->model->getProgress('clientstatus', $login_info['id']);
            $_SESSION['progress_level'] = $progress['progress_level'];
            $_SESSION['user'] = 'staff';
            return $this->_redirect('staff/client/clientindex');
        //}

    }

    public function noclientAction() {

    }

    public function selectabroadAction() {
        $table = 'T_ENTRY';
        $select = "study_abroad_no,leave_date,leave_country,close_flag";
        $where['crm_id'] = array('column' => 'client_no',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->json = 0;
        $this->view->list = $list;
    }

    public function selectabroadpreparationAction() {
        $table = 'T_ENTRY';
        $select = "study_abroad_no,leave_date,leave_country,close_flag";
        $where['crm_id'] = array('column' => 'client_no',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->json = 0;
        $this->view->list = $list;
    }

    public function selectachievementAction() {
        $table = 'T_ENTRY';
        $select = "study_abroad_no,leave_date,leave_country,close_flag";
        $where['crm_id'] = array('column' => 'client_no',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->json = 0;
        $this->view->list = $list;
    }

    public function selectsurveyAction() {
        $table = 'T_ENTRY';
        $select = "study_abroad_no,leave_date,leave_country,close_flag";
        $where['crm_id'] = array('column' => 'client_no',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->json = 0;
        $this->view->list = $list;
    }

    public function activitylogAction() {
        $activity_log = $this->model->activity('client_activity_log', 20, $_SESSION['mem_id']);

        $this->view->json = 0;
        $this->view->activity_log = $activity_log;
        $this->view->username = $_SESSION['mem_name'];
        $this->view->title = 'お客様活動内容';
    }

    public function bamkunAction() {
        $this->view->title = 'ばむくんとは';
    }

    public function scheduleAction() {
        $params = $this->getRequest ()->getParams ();
        $this->model->setSchedule('clientstatus', $params);
    }

    public function nextstepAction() {
        $nextStep = $this->model->getStepSel('mypage_next_step');
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('nextstep');
        $this->view->next_step = $nextStep;
    }

    public function nextstepeditAction() {
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

        $latest_id = $this->model->getStepID('next_step');

        $ret = $this->model->closeStep('next_step', $latest_id['next_step_id']);
        $this->model->insertStep('next_step', $params);

        // insert for access's history
        $insert = array('お客様番号' => $_SESSION['crm_id'],
                '日付' => date('Y-m-d 00:00:00'),
                '問合せ方法' => 'Mypage次回内容',
                '内容' => $params['step_name'].' '.$params['step_exposition_short'].' '.$params['preparation'],
                '担当者' => $_SESSION['staff_cd']
        );
        $ret = insert_sqlserver('T_顧客履歴', $insert, $this->url, $this->pass);
    }

    public function surveyentryAction() {
        $params = $this->getRequest ()->getParams ();
        $basePath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/survey/';
        $tempPath = $basePath . 'temp/';

        if (!isset($_SESSION['abroad'])) {
            $_SESSION['abroad'] = $params['abroad'];
        }

        $survey_table = 'mypage_survey';
        $temp = $this->model->getTempSurvey($survey_table, $_SESSION['mem_id']);

        if (!$temp) {
            $table['base'] = array('table' => 'M_顧客基本情報', 'column' => null);
            $table['entry'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'client_no',
                    'ontable' => 'M_顧客基本情報', 'oncolumn' => 'お客様番号');
            $table['school'] = array('table' => 'M_学校', 'column' => '学校番号',
                    'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');
            $select = 'DISTINCT M_顧客基本情報.お客様番号,M_顧客基本情報.氏名, M_顧客基本情報.職業, M_学校.日本語名';
            $where['abroad_no'] = array('column' => 'T_ENTRY_DETAILS.study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');

            $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);

            $username = $items[0][1];
            if ($items[0][2] != 'null') {
                $job = $items[0][2];
            } else {
                $job = null;
            }

            if ($items[0][3] != 'null') {
                $school = $items[0][3];
            } else {
                $school = null;
            }

            $load_data = null;
        } else if ($temp['temp'] == 0) {
            return $this->_helper->redirector('thankyousurvey');
        } else {
            $load_data = $temp;

            $username = $load_data['client_name'];
            $job = $load_data['client_job'];
            $school = $load_data['school_name'];
        }

        $is_img = false;
        $images = array();
        for ($n=1;$n<=3;$n++) {
            if (!empty($load_data['image_id'.$n])) {
                $is_img = true;
                $imgpath = $basePath . $load_data["image_id$n"];
                $extension = substr(strrchr($load_data["image_id$n"], '.'), 1);
                $image = new Imagick($imgpath);
                $image->setImageFormat($extension);
                $image->thumbnailImage(100, 100);
                $image->writeImage($tempPath.$n.'.'.$extension);
                $image->clear();
                $image->destroy();

                $images[] = 'data:image/png;base64,' . base64_encode(file_get_contents($tempPath.$n.'.'.$extension));
                unlink($tempPath.$n.'.'.$extension);
            }
        }

        if($is_img) {
            $this->view->img = $images;
        } else {
            $this->view->img = null;
        }

        $ua=$_SERVER['HTTP_USER_AGENT'];
        if((strpos($ua,'iPhone')==true)||(strpos($ua,'iPod')==true)) {
            $iphone = 1;
        } else {
            $iphone = 0;
        }

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('survey');

        $this->view->load_data = $load_data;
        $this->view->username = $username;
        $this->view->job = $job;
        $this->view->school = $school;
        $this->view->json = 1;
        $this->view->iphone = $iphone;
        $this->view->title = '体験談アンケート';

    }

    public function tempsavesurveyAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $survey_table = 'mypage_survey';
        $temp = $this->model->getTempSurvey($survey_table, $_SESSION['mem_id']);

        if (!$temp) {
            // create new record
            $this->model->createSurvey($survey_table, $_SESSION['mem_id'], $params);
        } else {
            // update
            $this->model->updateSurvey($survey_table, $_SESSION['mem_id'], $params);
        }

    }

    public function imageuploadAction() {
        $table = 'mypage_survey';
        $chknum = $this->model->getImgNum($table, $_SESSION['mem_id']);

        if (!empty($chknum['image_id3'])) {
            return $this->_forward ( 'alreadyupload', 'index', 'error' );
        }
    }

    public function imageprocessAction() {
        $params = $this->getRequest ()->getParams ();
        $survey_table = 'mypage_survey';
        $temp = $this->model->getTempSurvey($survey_table, $_SESSION['mem_id']);

        if (!$temp) {
            // create new record
            $insert = array(
                    'pen_name' => null,
                    'travel_period' => null,
                    'oppotunity' => null,
                    'life' => null,
                    'negative' => null,
                    'only' => null,
                    'effect' => null,
                    'challenge' => null,
                    'advice' => null
            );

            $this->model->createSurvey($survey_table, $_SESSION['mem_id'], $insert);
        }

        $basePath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/survey/';
        $uploadPath = $basePath . 'temp';

        $upload = new Zend_File_Transfer();
        $upload->setDestination($uploadPath);
        $upload->receive();
        $name = $upload->getFileName();

        $extension = substr(strrchr($name, '.'), 1);
        $count = sprintf('%010d', $this->count_file($basePath));
        $new_name = 'srv' . $count;
        rename($name, $basePath . $new_name . ".$extension");
        $image = $new_name . '.' . $extension;
        $this->model->setImages($survey_table, $_SESSION['mem_id'], $image);

        $temp = $this->model->getTempSurvey($survey_table, $_SESSION['mem_id']);
    }

    public function imgdelconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('imagedelete');
        $this->view->id = $params['id'];
    }

    public function deleteimageAction() {
        $params = $this->getRequest ()->getParams ();
        $table = 'mypage_survey';

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'errorcsrf', 'index', 'error' );
        }

        $result = $this->model->delImg($table, $_SESSION['mem_id'], $params);
    }

    public function surveyconfirmAction() {
        $params = $this->getRequest ()->getParams ();
        $basePath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/survey/';
        $tempPath = $basePath . 'temp/';

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'errorcsrf', 'index', 'error' );
        }

        $survey_table = 'mypage_survey';
        $temp = $this->model->getTempSurvey($survey_table, $_SESSION['mem_id']);

        if (!$temp) {
            // create new record
            $this->model->createSurvey($survey_table, $_SESSION['mem_id'], $params);
        } else {
            // update
            $this->model->updateSurvey($survey_table, $_SESSION['mem_id'], $params);
        }

        $output = $this->model->getTempSurvey($survey_table, $_SESSION['mem_id']);

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

                $images[] = 'data:image/png;base64,' . base64_encode(file_get_contents($tempPath.$n.'.'.$extension));
                unlink($tempPath.$n.'.'.$extension);
            }
        }

        if($is_img) {
            $this->view->img = $images;
        } else {
            $this->view->img = null;
        }

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('complete');

        $this->view->load_data = $output;
        $this->view->username = $output['client_name'];
        $this->view->job = $output['client_job'];
        $this->view->school = $output['school_name'];
        $this->view->title = 'アンケート送信確認';
    }

    public function sendsurveyAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'errorcsrf', 'index', 'error' );
        }

        $survey_table = 'mypage_survey';

        $this->model->sendSurvey($survey_table, $_SESSION['mem_id']);

        $this->view->title = 'アンケートご協力ありがとうございました。';

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'アンケートにご協力頂きました。', null);

        // get client's name
        $table1 = 'M_顧客基本情報';
        $select1 = "氏名, ラストネーム, ファーストネーム";
        $where1['client_no'] = array('column' => 'お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $name = select_sqlserver($table1, $select1, $where1, $this->url, $this->pass);
        $survey = $this->model->getSurveyID($survey_table, $_SESSION['mem_id']);

        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $toMailAddress = 'itweb@jawhm.or.jp';
        $subject = $name[0]['氏名'].'様から体験談アンケートが届きました['.$_SESSION['crm_id'].']';
        $body = $name[0]['氏名'] . '様より体験談アンケートが届きました。';
        $body .= chr(10);
        $body .= chr(10);
        $body .= 'https://www.jawhm.or.jp/mypage/kotaro/index/index?survey='. $survey[0]['mypage_survey_id'];
        $body .= chr(10);
        $body .= 'よりアンケート内容をご確認ください。';

        writeEmail($name[0]['氏名'], $fromMailAddress, $toMailAddress, $subject, $body);
    }

    public function thankyousurveyAction() {

    }

}
?>
