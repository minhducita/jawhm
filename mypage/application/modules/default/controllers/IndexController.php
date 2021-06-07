<?php
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/Auth/TwitterOAuth.php');
require_once ('Zend/Json.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class IndexController extends Zend_Controller_Action {
    private $model;
    private $clinet_id;
    private $client_secret;
    private $Gcallback_url;
    private $app_id;
    private $app_secret;
    private $Fcallback_url;
    private $consumer_key;
    private $consumer_secret;
    private $Tcallback_url;
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
        require_once ($root_dir . 'models/IndexModel.php');
        $this->model = new IndexModel ();
        initPage($this, '/application/modules/', 'mypage');
        $withoutList = array('login', 'auth', 'jawhmlogin', 'googleauth', 'facebookauth', 'twitterauth',
                'firstonly', 'emailcheck', 'clientinsert', 'logout', 'forgetpassword', 'forgetloginemail',
                'forgetpayment', 'forgetother', 'passwordreset', 'jawhmauth', 'bumstory');
        without_loginchk($this, $withoutList, $this->base);

        // oauth settings
        $this->client_id = '182149785228-rablaq2c5gti1di4cboh3v50iltf967b.apps.googleusercontent.com';
        $this->client_secret = '1MOfNANIYXi1_1AHTw2FNTZL';
        $this->Gcallback_url = 'https://www.jawhm.or.jp/mypage/index/googleauth';
        $this->app_id = '336197919869623';
        $this->app_secret = 'a5ca7430a48f029eb5b820be6d418d36';
        $this->Fcallback_url = $this->base.'/mypage/index/facebookauth';
        $this->consumer_key = 'UDv79uqGdGqt21QZoA05EdC02';
        $this->consumer_secret = 'ezkXHbUSgeyN9fG4Qo8G44ZGtQAjzglbc2kHClWGElr1aEnpmr';
        $this->Tcallback_url = $this->base.'/mypage/index/twitterauth';
    }

    /**
     * index
     */
    public function indexAction() {
        // get client's name
        $table1 = 'M_顧客基本情報';
        $select1 = "氏名, ラストネーム, ファーストネーム";
        $where1['client_no'] = array('column' => 'お客様番号',
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
        $where3['client_no'] = array('column' => 'お客様番号',
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

        $table = 'T_ENTRY_DETAILS';
        $select = "study_abroad_no, max(entrance_date) AS entrance_date";
        $where['client_no'] = array('column' => 'client_no',
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
            $percent = 100;
        }

        // show achievement status
        $items = $this->model->getStatus('clientstatus', $_SESSION['mem_id']);
        if (!empty($items['study_abroad'])) {
            $today = date("Y-m-d h:i:s");
            $table2['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => null);
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

        // calculate users progress(percent)
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
                            $next_status = '願書(Application Form) 提出';
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
                        $is_expiration = 1;
                        if($expiration_date > $target_date && $value == 0) {
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
                    if (!is_null($items2)){
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
        $this->view->datepicker = 1;
        $this->view->survey = $is_survey;
        $this->view->next_status = $next_status;
        $this->view->expiration_date = $expiration['date'];
        $this->view->is_expiration = $is_expiration;
        $this->view->title = 'お客様マイページ';

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

    public function selectabroadpreparationAction() {
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

    public function selectachievementAction() {
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

    public function selectsurveyAction() {
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
            return $this->_forward ( 'overupload', 'index', 'error' );
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

    public function setappointmentAction() {
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('appointment');
    }

    public function sendappointmentAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['first_choice']) || empty($params['second_choice'])
                 || empty($params['third_choice']) || empty($params['consultation'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $date_check_deposit1 = dateCheck($params['first_choice'], true);
        if (!is_null($date_check_deposit1)) {
            return $this->forward('modalmessage', 'index', 'error' , array('message/'.$date_check_deposit1));
        }

        $date_check_deposit2 = dateCheck($params['second_choice'], true);
        if (!is_null($date_check_deposit2)) {
            return $this->forward('modalmessage', 'index', 'error' , array('message/'.$date_check_deposit2));
        }

        $date_check_deposit3 = dateCheck($params['third_choice'], true);
        if (!is_null($date_check_deposit3)) {
            return $this->forward('modalmessage', 'index', 'error' , array('message/'.$date_check_deposit3));
        }

        $date = new Zend_Date();
        $input1 = explode('-', $params['first_choice']);
        $input_date1 = new Zend_Date(array('year' => $input1[0], 'month' => $input1[1], 'day' => $input1[2]));
        $input2 = explode('-', $params['second_choice']);
        $input_date2 = new Zend_Date(array('year' => $input2[0], 'month' => $input2[1], 'day' => $input2[2]));
        $input3 = explode('-', $params['third_choice']);
        $input_date3 = new Zend_Date(array('year' => $input3[0], 'month' => $input3[1], 'day' => $input3[2]));
        $today = new Zend_Date();
        // is date after today
        if ($today->compare($input_date1) != -1 || $today->compare($input_date2) != -1 ||$today->compare($input_date3) != -1) {
            $date_check_appointment = '日付は本日以後で選択してください。';
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$date_check_appointment.'/prev/index');
            throw new Exception($date_check_appointment);
        }

        $this->model->setActivity('client_activity_log', $params);
        $this->writeEmail($this, $params);
    }

    public function loginAction() {
        // google configuration
        $baseURL = 'https://accounts.google.com/o/oauth2/auth?';
        $scope = array(
                'https://www.googleapis.com/auth/userinfo.profile', // 基本情報(名前とか画像とか)
                'https://www.googleapis.com/auth/userinfo.email',   // メールアドレス
        );

        $authURL = $baseURL . 'scope=' . urlencode(implode(' ', $scope)) .
        '&redirect_uri=' . urlencode($this->Gcallback_url) .
        '&response_type=code' .
        '&client_id=' . $this->client_id;

        $this->view->google = $authURL;

        // facebook configuration
        $Fauth_url = 'http://www.facebook.com/dialog/oauth?client_id=' .
                $this->app_id . '&redirect_uri=' . urlencode($this->Fcallback_url);

        $this->view->facebook = $Fauth_url;

        // twitter configuration
        $connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
        $request_token = $connection->getRequestToken($this->Tcallback_url);
        // save to session (use after authenticate)
        $_SESSION['request_token']=$token= $request_token ['oauth_token'];
        $_SESSION['request_token_secret'] =  $request_token ['oauth_token_secret'];

        $url = $connection->getAuthorizeURL($token);

        $this->view->twitter = $url;
        $this->view->title = 'ログイン画面';
    }

    public function authAction() {
        $result = Auth($this);
        $this->view->title = 'ログイン';
        $this->view->result = $result;
    }

    public function jawhmloginAction() {
        $this->view->smp = 1;
        $this->view->title = 'メンバーログイン';
    }

    public function forgetpasswordAction() {
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('forgetpassword');
    }

    public function forgetloginemailAction() {

    }

    public function forgetpaymentAction() {

    }

    public function forgetotherAction() {

    }

    public function passwordresetAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $email_check = $this->model->loginEmailCheck('memlist', $params);

        if (!$email_check) {
            return $this->_forward ( 'erroremail', 'index', 'error' );
        }

        $change_password = $this->model->resetPassword('memlist', $params['email_reset']);

        $fromName = '一般社団法人日本ワーキングホリデー協会';
        $fromMailAddress = 'info@jawhm.or.jp';
        $toName = $email_check['namae'];
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
    }

    public function jawhmauthAction() {
        $params = $this->getRequest ()->getParams ();
        $login_info = array();
        $result = $this->model->loginAuthentication('memlist', $params['email'], $params['password']);
        if(!$result) {
            $req = $this->getRequest();
            $actionName = $req->getActionName();
            $member_info = $this->model->memberInfo('memlist', $params);
            if($member_info['id'] != '') {
                $login_info['member_id'] = $member_info['id'];
                $login_info['client_name'] = $member_info['namae'];
                action_log_failed($actionName, 'JAWHMアカウントでのログインに失敗しました。', $member_info['id']);
            }
            return $this->_forward ( 'loginfailed', 'index', 'error' );
        }

        $member_info = $this->model->memberInfo('memlist', $params);

        // is first login?
        $clientstatus = $this->model->checkModel('clientstatus', $member_info['id']);
        if(empty($clientstatus)) {
            $crmid = getCrmid('memlist', $member_info['id']);
            $result = $this->model->statusRegistration('clientstatus', $member_info['id'], $crmid['crmid']);
        }

        $login_info['member_id'] = $member_info['id'];
        $login_info['client_name'] = $member_info['namae'];
        $req = $this->getRequest();
        $actionName = $req->getActionName();
        $this->loginCommon($login_info, $actionName, 'JAWHM');
    }

    public function googleauthAction() {
        $params = $this->getRequest ()->getParams ();

        // is authrized?
        if (isset($params['code'])){
            $base_url = 'https://accounts.google.com/o/oauth2/token';

            $gparams = array(
                    'code' => $params['code'],
                    'client_id' => $this->client_id,
                    'client_secret' => $this->client_secret,
                    'redirect_uri' => $this->Gcallback_url,
                    'grant_type'    => 'authorization_code'
            );

            $ci = curl_init();
            curl_setopt($ci, CURLOPT_USERAGENT, 'GoogleOAuth');
            curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($ci, CURLOPT_TIMEOUT, 30);
            curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ci, CURLOPT_HTTPHEADER, array('Expect:'));
            curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ci, CURLOPT_HEADER, FALSE);

            curl_setopt($ci, CURLOPT_POST, TRUE);
            curl_setopt($ci, CURLOPT_POSTFIELDS, $gparams);

            curl_setopt($ci, CURLOPT_URL, $base_url);
            $responsej = curl_exec($ci);
            curl_close ($ci);
            $response = Zend_Json::decode($responsej);

            if(array_key_exists('error', $response)){
                return $this->_forward ( 'errorlogin', 'index', 'error' );
            }

            $access_token = $response['access_token'];

            $user_info = Zend_Json::decode(
                    file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?'.
                            'access_token=' . $access_token)
            );

            $login_id = $user_info['id'];
            $login_info = $this->model->clientGet('clientlist', $user_info, $login_id);
            if(is_null($login_info)){
                $result = $this->model->clientInsert('clientlist', $user_info, 'google');
                $client_maxid = $this->model->getid ('clientlist', 'client_id');

                return header("Location: firstonly?client_id=$client_maxid&login_type=google");
            } else {
                $this->model->clientUpdate('clientlist', $user_info, 'google');
                $req = $this->getRequest();
                $actionName = $req->getActionName();
                $this->loginCommon($login_info, $actionName, 'Google');

                return $this->_helper->redirector('index');
            }
        } else {
            exit('ログインしてください。');
        }

    }

    public function facebookauthAction() {
        $params = $this->getRequest ()->getParams ();

        // is authrized?
        if (isset($params['code'])){
            $token_url = 'https://graph.facebook.com/oauth/access_token?client_id='.
                    $this->app_id . '&redirect_uri=' . urlencode($this->Fcallback_url) . '&client_secret='.
                    $this->app_secret . '&code=' . $params['code'];

            $access_token = file_get_contents($token_url);

            $user_json = file_get_contents('https://graph.facebook.com/me?' . $access_token);
            $user_info = Zend_Json::decode($user_json);

            $login_id = $user_info['id'];
            $login_info = $this->model->clientGet('clientlist', $user_info, $login_id);
            if(is_null($login_info['member_id'])){
                $result = $this->model->clientInsert('clientlist', $user_info, 'facebook');
                $client_maxid = $this->model->getid ('clientlist', 'client_id');

                return header("Location: firstonly?client_id=$client_maxid&login_type=facebook");
            } else {
                $this->model->clientUpdate('clientlist', $user_info, 'facebook');
                $req = $this->getRequest();
                $actionName = $req->getActionName();
                $this->loginCommon($login_info, $actionName, 'Facebook');
                return $this->_helper->redirector('index');
            }
        }else{
            exit('ログインしてください。');
        }

    }

    public function twitterauthAction() {
        $params = $this->getRequest ()->getParams ();

        // is authrized?
        if (isset($params['oauth_verifier'])){
            $auth = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $_SESSION['request_token'], $_SESSION['request_token_secret']);

            $access_token = $auth->getAccessToken($params['oauth_verifier']);
            $login_id = $access_token['user_id'];
            $login_info = $this->model->clientGet('clientlist', $access_token, $login_id);
            if(is_null($login_info)){
                $result = $this->model->clientInsert('clientlist', $access_token, 'twitter');
                $client_maxid = $this->model->getid ('clientlist', 'client_id');
                return header("Location: firstonly?client_id=$client_maxid&login_type=twitter");
            } else {
                $this->model->clientUpdate('clientlist', $access_token, 'twitter');
                $req = $this->getRequest();
                $actionName = $req->getActionName();
                $this->loginCommon($login_info, $actionName, 'Twitter');

                return $this->_helper->redirector('index');
            }
        }else{
            exit('ログインしてください。');
        }

    }

    public function firstonlyAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('firstonly');
        $this->view->client_id = $params['client_id'];
        $this->view->title = 'メンバー情報更新';
    }

    public function emailcheckAction() {
        $params = $this->getRequest()->getParams();

        $token = $params['token'];
        $tag = $params['action_tag'];

        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'errorcsrf', 'index', 'error' );
        }
        $client = $this->model->emailCheck('memlist', $params['email']);
        if($client) {
            $result = 1;
        } else {
            $result = 0;
        }

        $this->view->member_id = $client['id'];
        $this->view->client_name = $client['namae'];
        $this->view->result = $result;
    }

    public function clientinsertAction() {
        $params = $this->getRequest()->getParams();

        $result = $this->model->memberidRegistration('clientlist', $params['client_id'], $params['member_id'], $params['client_name']);
        $crmid = getCrmid('memlist', $params['member_id']);
        $result2 = $this->model->statusRegistration('clientstatus', $params['member_id'], $crmid['crmid']);
        $_SESSION['mem_id'] = $params['member_id'];
        $_SESSION['mem_name'] = $params['client_name'];
        $_SESSION['mem_ip'] = $_SERVER["REMOTE_ADDR"];
        $_SESSION['crm_id'] = $crmid['crmid'];

        $progress = $this->model->getProgress('clientstatus', $params['member_id']);
        $_SESSION['progress_level'] = $progress['progress_level'];

        $table = 'M_顧客基本情報';
        $update = array('最終ログイン日時' => date('Y-m-d H:i:s'));
        $where['client_no'] = array('column' => 'お客様番号',
                'value' => $crmid['crmid'],
                'comp' => '=',
                'andor' => 'null');

        $ret = update_sqlserver($table, $update, $where, $this->url, $this->pass);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'ログイン情報を登録しました。', null);

        $this->view->result = $result;
        $this->view->base = $this->base;
    }

    public function logoutAction() {
        $_SESSION = array();
    }

    private function loginCommon(&$login_info, &$actionName, $sns) {
        $chkmem = $this->model->isMem('memlist', $login_info['member_id']);
        if(!$chkmem) {
            header('location: '.$this->base.'/mypage/error/index/loginstatuserror');
            exit();
        }

        $_SESSION['mem_id'] = $login_info['member_id'];
        $_SESSION['mem_name'] = $login_info['client_name'];
        $_SESSION['mem_ip'] = $_SERVER["REMOTE_ADDR"];

        $crmid = getCrmid('memlist', $_SESSION['mem_id']);
        $_SESSION['crm_id'] = $crmid['crmid'];

        $progress = $this->model->getProgress('clientstatus', $login_info['member_id']);
        $_SESSION['progress_level'] = $progress['progress_level'];
        $_SESSION['user'] = 'client';

        action_log($actionName, $sns.'アカウントでログインしました。', $login_info['member_id']);

        $table = 'M_顧客基本情報';
        $update = array('最終ログイン日時' => date('Y-m-d H:i:s'));
        $where['client_no'] = array('column' => 'お客様番号',
                'value' => $crmid['crmid'],
                'comp' => '=',
                'andor' => 'null');

        $ret = update_sqlserver($table, $update, $where, $this->url, $this->pass);

        $table_base['base'] = array('table' => 'M_顧客基本情報', 'column' => 'null');
        $table_base['M_mail'] = array('table' => 'M_顧客メール情報', 'column' => 'お客様番号',
                'ontable' => 'M_顧客基本情報', 'oncolumn' => 'お客様番号');

        $select_base = 'M_顧客基本情報.登録日, M_顧客メール情報.メールアドレス';
        $where_base[] = array('column' =>'M_顧客基本情報.お客様番号',
                'value' => $crmid['crmid'],
                'comp' => '=',
                'andor' => 'null');

        $emails = joinselect_sqlserver($table_base, $select_base, $where_base, $this->url, $this->pass);

        if ($progress['join_seminar'] == 0) {
            if ($progress['seminar_beginner'] == 0) {
                $keywords = array('初心者');
                $semList = $this->model->getAtendSeminar(array('entrylist', 'event_list'), $emails, $keywords);

                if (count($semList) >= 1) {
                    $this->model->attendSeminar('clientstatus', 'seminar_beginner');
                    $this->model->setNextStep('next_step', $semList , '初心者向けセミナーに参加しよう', '海外渡航プランニング法セミナーに参加しよう');
                    $beginner = true;
                } else {
                    $beginner = false;
                }
            } else {
                $beginner = true;
            }

            if ($progress['seminar_planning'] == 0) {
                $keywords = array('プランニング');
                $semList = $this->model->getAtendSeminar(array('entrylist', 'event_list'), $emails, $keywords);
                if (count($semList) >= 1) {
                    $this->model->attendSeminar('clientstatus', 'seminar_planning');
                    $this->model->setNextStep('next_step', $semList , '海外渡航プランニング法セミナーに参加しよう', '情報収集セミナーで情報を集めよう');
                    $planning = true;
                } else {
                    $planning = false;
                }
            } else {
                $planning = true;
            }

            if ($progress['seminar_info'] == 0) {
                $keywords = array('学校比較', '看護師', '休学', '住まい仕事',
                        '学習法', 'トラブル', '資格', 'セカンド', '学生限定', '年比較');
                $semList = $this->model->getAtendSeminar(array('entrylist', 'event_list'), $emails, $keywords);
                if (count($semList) >= 1) {
                    $this->model->attendSeminar('clientstatus', 'seminar_info');
                    $this->model->setNextStep('next_step', $semList,  '情報収集セミナーで情報を集めよう', '懇談カウンセリングを受けよう');
                    $info = true;
                } else {
                    $info = false;
                }
            } else {
                $info = true;
            }

            if ($progress['seminar_discussion'] == 0) {
                $keywords = array('渡航相談会', '女性限定', '休職');
                $semList = $this->model->getAtendSeminar(array('entrylist', 'event_list'), $emails, $keywords);
                if (count($semList) >= 1) {
                    $this->model->attendSeminar('clientstatus', 'seminar_discussion');
                    $this->model->setNextStep('next_step', $semList, '懇談カウンセリングを受けよう', '語学学校セミナーに参加しよう');
                    $discussion = true;
                } else{
                    $discussion = false;
                }
            } else {
                $discussion = true;
            }

            if ($progress['seminar_school'] == 0) {
                $keywords = array('学校セミナー', '学校懇談');
                $semList = $this->model->getAtendSeminar(array('entrylist', 'event_list'), $emails, $keywords);
                if (count($semList) >= 1) {
                    $this->model->attendSeminar('clientstatus', 'seminar_school');
                    $this->model->setNextStep('next_step', $semList , '語学学校セミナーに参加しよう', 'カウンセリングを受けよう');
                    $school = true;
                } else {
                    $school = false;
                }
            } else {
                $school = true;
            }

            if ($beginner && $planning && $info && $discussion && $school) {
                $this->model->attendSeminar('clientstatus', 'join_seminar');
            }
        }

    }

    private function count_file($path) {
        $files = scandir($path);
        $count = 0;
        foreach($files as $file) {
            if (is_file($path.$file)){
                $count++;
            }
        }

        return $count;
    }

    private function writeEmail($parent, $params) {
        $client_no = getCrmid('memlist', $_SESSION['mem_id']);
        $name = '('.$client_no['crmid'].')  '.$_SESSION['mem_name'];

        $items = getFromAddress($_SESSION['crm_id']);

        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $toMailAddress = $items[0][0];
        $subject = $name.'様から個別カウンセリングの予約がありました['.$client_no['crmid'].'] ';
        $body = '第一希望日: ' . $params['first_choice'];
        $body .= chr(10);
        $body .= '第二希望日: ' . $params['second_choice'];
        $body .= chr(10);
        $body .= '第三希望日: ' . $params['third_choice'];
        $body .= chr(10);
        $body .= '相談内容: ' . $params['consultation'];
        $body .= chr(10);
        $body .= 'ビザ情報: ' . $params['visa_information'];

        writeEmail($name, $fromMailAddress, $toMailAddress, $subject, $body);
    }
}
?>
