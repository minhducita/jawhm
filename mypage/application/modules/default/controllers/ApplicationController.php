<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/signature-to-image.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/mpdf/mpdf.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class ApplicationController extends Zend_Controller_Action {
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
        require_once ($root_dir . 'models/ApplicationModel.php');
        $this->model = new ApplicationModel ();
        initPage($this, '/application/modules/', 'client');
        $withoutList = array('savesignature', 'agreement');
        without_loginchk($this, $withoutList, $this->base);
    }

    public function indexAction() {
        $params = $this->getRequest ()->getParams ();
        if ($_SESSION['abroad'] == '') {
            $_SESSION['abroad'] = $params['abroad'];
            $this->view->rewrite = 0;
        } else {
            $_SESSION['abroad'] == $params['abroad'];
            $this->view->rewrite = 1;
        }

        $table = 'T_ENTRY';
        $select = "study_abroad_no,leave_date,leave_country,close_flag";
        $where['client_no'] = array('column' => 'client_no',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $table2 = 'M_顧客基本情報';
        $select2 = "次回来店予定";
        $where2['client_no'] = array('column' => 'お客様番号',
                'value' =>$_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $reserve = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);

        $table3 = '[toratora_base].[dbo].M_顧客基本情報';
        $select3 = "生年月日";
        $where3['client_no'] = array('column' => 'お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $items3 = select_sqlserver($table3, $select3, $where3, $this->url, $this->pass);

        $today = date("Y-m-d h:i:s");
        $table4['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'null');
        $table4['addr_type'] = array('table' => 'M_学校', 'column' => '学校番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');
        $select4 = 'M_学校.学校名, M_学校.紹介ページ, T_ENTRY_DETAILS.item, T_ENTRY_DETAILS.entrance_date, T_ENTRY_DETAILS.weeks, M_学校.国';
        $where4['abroad_no'] = array('column' => 'T_ENTRY_DETAILS.study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where4['comm_division'] = array('column' => 'T_ENTRY_DETAILS.comm_division',
                'value' => '1',
                'comp' => '=',
                'andor' => 'AND');
        $where4['entrance_date'] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                'value' => $today,
                'comp' => '>',
                'andor' => 'AND');
        $items4 = joinselect_sqlserver($table4, $select4, $where4, $this->url, $this->pass);

        $status_table = 'clientstatus';
        $status = $this->model->getConfirm($status_table, $_SESSION['mem_id']);

        // all payment is finished?
        $table5 = 'T_顧客見積状態';
        $select5 = '見積番号';
        $where5['client_no'] = array('column' => 'お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');
        $where5['estimate_no'] = array('column' => '閲覧可否フラグ',
                'value' => 1,
                'comp' => '=',
                'andor' => 'AND');
        $where5['approval_date'] = array('column' => '見積承認日',
                'value' => 1,
                'comp' => 'ni',
                'andor' => 'AND');
        $where5['payment_date'] = array('column' => '入金日',
                'value' => 1,
                'comp' => 'is',
                'andor' => 'AND');

        $items5 = select_sqlserver($table5, $select5, $where5, $this->url, $this->pass);

        if(!isset($items5[0])) {
            $mytable = 'clientstatus';
            $column = 'deposit_finish';
            $param = 1;

            $deposit_finish = $this->model->getStatus($mytable, $_SESSION['abroad'], $column);
            if ($deposit_finish[0]['deposit_finish_flag'] == 0) {
                $this->model->setStatus($mytable, $_SESSION['abroad'], $column, $param);
            }
        }

        if(smpcheck()) {
            $smp = 1;
        } else {
            $smp = 0;
        }

        $agree = $this->model->getStatus($status_table, $_SESSION['abroad'], 'agreement');

        $this->view->datepicker = 1;
        $this->view->dob = $items3[0][0];
        $this->view->list = $list;
        $this->view->reserve = $reserve;
        $this->view->json = 1;
        $this->view->school = $items4[0];
        $this->view->status = $status;
        $this->view->smp = $smp;
        $this->view->bum = 1;
        $this->view->index = 1;
        $this->view->agree = $agree[0]['agreement_confirm'];
        $this->view->username = $_SESSION['mem_name'];
        $this->view->title = 'お客様手続き一覧';
    }

    public function canwhdlAction() {
        $file_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
        $pdf_name = 'Canada_Working_Holiday_Visa.pdf';
        $image_name = 'visa';
        $extension = '.png';

        $is_smp = smpcheck();
        if ($is_smp) {
            $this->view->issmp = 1;
            $im = new imagick();
            $im->setResolution(144,144);
            $im->readimage($file_path . '/' . $pdf_name);
            $page_count = $im->getImageScene();

            for($i = 0; $i <= $page_count; $i++) {
                $im->setImageIndex($i);
                $im->setImageFormat('png');
                $im->writeimage($file_path.'/'.$image_name . $i . $extension);
            }

            $im->destroy();

            $this->view->title = 'ワーキングホリデー申請方法';

            $png = array();
            for($i = 0; $i <= $page_count; $i++) {
                $png[] = 'data:image/png;base64,' . base64_encode(file_get_contents($file_path . '/'  . $image_name . $i . $extension));
                unlink($file_path.'/'.$image_name . $i . $extension);
            }
            $this->view->pngs = $png;

        } else {
            $this->view->issmp = 0;
            header('Content-Disposition: attachment; filename="'.$pdf_name.'"');
            $this->view->file_type = 'pdf';
            mb_convert_encoding(readfile($file_path. '/' . $pdf_name), "SJIS", "UTF-8");
        }
    }

    public function estimatelistAction() {
        $table['base'] = array('table' => 'T_顧客見積状態', 'column' => null);
        $table['school_name'] = array('table' => 'M_学校', 'column' => '学校番号',
                'ontable' => 'T_顧客見積状態', 'oncolumn' => '見積基本コード');
        $table['weeks'] = array('table' => 'M_顧客学校', 'column' => '連結キー7',
                'ontable' => 'T_顧客見積状態', 'oncolumn' => '見積番号');
        $select = 'M_学校.学校名, M_顧客学校.連結キー4,  T_顧客見積状態.見積番号, T_顧客見積状態.入金予定日';
        $where['client_no'] = array('column' => 'T_顧客見積状態.お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');
        $where['estimate_no'] = array('column' => 'T_顧客見積状態.閲覧可否フラグ',
                'value' => 1,
                'comp' => '=',
                'andor' => 'AND');
        $where['notz1'] = array('column' => 'M_顧客学校.連結キー1',
                'value' => 'ZZZZZZ',
                'comp' => '<>',
                'andor' => 'AND');
        $where['notz2'] = array('column' => 'M_顧客学校.連結キー2',
                'value' => 'ZZZ',
                'comp' => '<>',
                'andor' => 'AND');
        $where['notfee'] = array('column' => 'M_顧客学校.連結キー3',
                'value' => 'FEE',
                'comp' => '<>',
                'andor' => 'AND');
        $where['notcard'] = array('column' => 'M_顧客学校.連結キー3',
                'value' => 'CARD',
                'comp' => '<>',
                'andor' => 'AND');
        $where['notzblank'] = array('column' => 'M_顧客学校.連結キー3',
                'value' => '',
                'comp' => '<>',
                'andor' => 'AND');
        $where['notznull'] = array('column' => 'M_顧客学校.連結キー3',
                'value' => 1,
                'comp' => 'ni',
                'andor' => 'AND');
        $where['school_fee'] = array('column' => 'M_顧客学校.連結キー5',
                'value' => '1',
                'comp' => '=',
                'andor' => 'AND');

        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);
        $this->view->items = $items;

    }

    public function editdepositAction() {
        $params = $this->getRequest ()->getParams ();

        $mytable = 'clientstatus';
        $deposit = 'deposit';
        $deposit_finish = 'deposit_finish';
        $param = 1;

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['deposit_date'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $date_check_deposit = dateCheck($params['deposit_date'], false);
        if (!is_null($date_check_deposit)) {
            return $this->forward('modalmessage', 'index', 'error' , array('message/'.$date_check_deposit));
        }

        // crate common val for date check
        $date = new Zend_Date();
        $start_date = $date->add(1, Zend_Date::DAY)->toString('Y-MM-dd');
        $end_date = $date->sub(1, Zend_Date::DAY)->add(1, Zend_Date::MONTH)->toString('Y-MM-dd');
        $check_date = $date->add(1, Zend_Date::MONTH);
        $input = explode('-', $params['deposit_date']);
        $input_date = new Zend_Date(array('year' => $input[0], 'month' => $input[1], 'day' => $input[2]));

        $today = new Zend_Date();
        // is date within 1 month
        if ($check_date->compare($input_date) == -1 || $today->compare($input_date) == 1) {
            $date_check_deposit = '日付は本日以後より1ヶ月以内で選択してください。';
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$date_check_deposit.'/prev/index');
            throw new Exception($date_check_deposit);
        }

        $weekendCheck = new Zend_Date($params['deposit_date']);
        $judgeWeekday = $weekendCheck->get('e');
        if ($judgeWeekday === '0' || $judgeWeekday === '6') {
            $date_check_deposit = '支払日は平日を選択してください。';
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$date_check_deposit.'/prev/index');
            throw new Exception($date_check_deposit);
        }

        // holiday check
        $start = date('Y-m-d');
        $end = date('Y-m-t', strtotime('1 month'));

        $calendar_id = urlencode('japanese__ja@holiday.calendar.google.com');
        $holidays_url = "https://www.google.com/calendar/feeds/{$calendar_id}/public/basic?start-min={$start}&start-max={$end}&max-results=30&alt=json";

        if($results=file_get_contents($holidays_url)) {
            $results = json_decode($results, true);
            if(array_key_exists('entry', $results)) {
                $holidays = array();
                foreach($results['feed']['entry'] as $val) {
                    $date = $val['gd$when'][0]['startTime']; // get date
                    $title = $val['title']['$t']; // get information the day what date
                    $holidays[$date] = $title; // set holydays by date(key)
                }
                ksort($holidays); // sorted by date
            }
        }

        $table = 'T_顧客見積状態';
        $select = "見積番号";
        $where['ID'] = array('column' => 'ID',
                'value' => $params['id'],
                'comp' => '=',
                'andor' => 'null');

        $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        if($params['estimate_no'] != $list[0]['0']) {
            $message_update = '見積番号が一致しません。';
            header('Location: '.$this->base.'/mypage/error/index/modalmessage?message='.$message_update.'&prev=achievement/index');
            throw new Exception($message_update);
        }
        // update
        $where2['estimate_no'] = array('column' => '見積番号',
                'value' => $list[0]['0'],
                'comp' => '=',
                'andor' => 'null');

        $update = array('入金予定日' => $params['deposit_date']);
        $ret = update_sqlserver($table, $update, $where2, $this->url, $this->pass);

        // check all approvaled estimate are filled prearranged date
        $table3 = 'T_顧客見積状態';
        $select3 = '見積番号';
        $where3[] = array('column' => 'お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');
        $where3[] = array('column' => '閲覧可否フラグ',
                'value' => 1,
                'comp' => 'ni',
                'andor' => 'AND');
        $where3[] = array('column' => '見積承認日',
                'value' => 1,
                'comp' => 'ni',
                'andor' => 'AND');
        $where3[] = array('column' => '入金予定日',
                'value' => 'null',
                'comp' => 'is',
                'andor' => 'AND');

        $items3 = select_sqlserver($table3, $select3, $where3, $this->url, $this->pass);
        if(!isset($items3[0])) {
            $this->model->setStatus($mytable, $_SESSION['abroad'], $deposit, $param);
        }

        $this->view->client = $params['client'];

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'お支払予定日を入力しました。', null);
    }

    public function changedepositAction() {
        $params = $this->getRequest ()->getParams ();

        $table = 'T_顧客見積状態';
        $select = "ID, 見積番号, 入金予定日";
        $where['id'] = array('column' => '見積番号',
                'value' => $params['id'],
                'comp' => '=',
                'andor' => 'null');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->item = $items;
        $this->view->estimate_number = $params['id'];
        $this->view->client = $params['client'];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('deposit');
    }

    public function depositlistAction() {
        $params = $this->getRequest ()->getParams ();

        $table = 'T_顧客見積状態';
        $select = '見積番号, 入金日, 入金予定日';
        $where['client_no'] = array('column' => 'お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');
        $where['deposit_date']= array('column' => '入金日',
                'value' => 'null',
                'comp' => 'ni',
                'andor' => 'AND');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->items = $items;
    }

    public function billlistAction() {
        $params = $this->getRequest ()->getParams ();

        $table = 'T_ATTACH_FILE';
        $select = "branch_no,file_name,update_date";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['file_class'] = array('column' => 'file_class',
                'value' => 11,
                'comp' => '=',
                'andor' => 'AND');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->items = $items;
        $this->view->abroad = $_SESSION['abroad'];
        $this->view->title = '御請求書一覧';
    }

    public function receiptlistAction() {
        $table = 'T_ATTACH_FILE';
        $select = "branch_no,file_name,update_date";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['file_class'] = array('column' => 'file_class',
                'value' => 12,
                'comp' => '=',
                'andor' => 'AND');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->items = $items;
        $this->view->client = $_SESSION['crm_id'];
        $this->view->abroad = $_SESSION['abroad'];
        $this->view->title = '受領書一覧';
    }

    public function applicationlistAction() {
        $params = $this->getRequest ()->getParams ();

        $appClass = 96;
        $fillClass = 97;

        $table = 'T_ATTACH_FILE';
        $select = "branch_no, file_name, comment, update_date";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['file_class'] = array('column' => 'file_class',
                'value' => $appClass,
                'comp' => '=',
                'andor' => 'AND');

        $items1 = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where2['file_class'] = array('column' => 'file_class',
                'value' => $fillClass,
                'comp' => '=',
                'andor' => 'AND');

        $items2 = select_sqlserver($table, $select, $where2, $this->url, $this->pass);

        $this->view->appitems = $items1;
        $this->view->fillitems = $items2;
        $this->view->title = '願書一覧';
    }

    public function homestaylistAction() {
        $params = $this->getRequest ()->getParams ();

        $appClass = 98;
        $fillClass = 99;
        $materialClass = 100;

        $table = 'T_ATTACH_FILE';
        $select = "branch_no, file_name, comment, update_date";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['file_class'] = array('column' => 'file_class',
                'value' => $appClass,
                'comp' => '=',
                'andor' => 'AND');

        $items1 = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where2['file_class'] = array('column' => 'file_class',
                'value' => $fillClass,
                'comp' => '=',
                'andor' => 'AND');

        $items2 = select_sqlserver($table, $select, $where2, $this->url, $this->pass);

        $where3['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where3['file_class'] = array('column' => 'file_class',
                'value' => $materialClass,
                'comp' => '=',
                'andor' => 'AND');

        $items3 = select_sqlserver($table, $select, $where3, $this->url, $this->pass);

        $this->view->appitems = $items1;
        $this->view->fillitems = $items2;
        $this->view->materialitems = $items3;
        $this->view->title = 'ホームステイ情報一覧';
    }

    public function agreementAction() {
        $table = 'clientstatus';
        $param = 'agreement';

        if ($_SESSION['abroad'] <> '') {
            $_SESSION['abroad'] = $_SESSION['abroad'];
        } else {
            $params = $this->getRequest ()->getParams ();
            $_SESSION['abroad'] = $params['abroad'];
        }

        $member_id = $_SESSION['mem_id'];
        $this->abroadCheck($member_id, $_SESSION['abroad']);
        $agreement = $this->model->getStatus($table, $_SESSION['abroad'], $param);
        $this->view->agreement = $agreement[0]['agreement_flag'];
        $is_smp = smpcheck();
        if($is_smp == true) {
            $smp = 1;
        } else {
            $smp = 0;
        }

        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/csv';

        if($agreement[0]['agreement_flag'] == 1) {
            // pdf exist check
            $table = 'T_ATTACH_FILE';
            $select = "file_name";
            $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');
            $where['file_class'] = array('column' => 'file_class',
                    'value' => 92,
                    'comp' => '=',
                    'andor' => 'AND');

            $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);
            $file_name = $items[0]['file_name'];
            if(!is_null($file_name)) {
                // if pdf exist, print pdf
                $this->view->ispdf = 2;

                $context2 = stream_context_create(array(
                        'http' => array(
                                'method' => 'POST',
                                'header' => implode('\r\n', array(
                                        'Content-Type: application/x-www-form-urlencoded',
                                )),
                                'content' => http_build_query(array(
                                        'pwd' => $this->pass,
                                        'command' => 'getpdf',
                                        'abroad_no' => $_SESSION['abroad'],
                                        'file_name' => $file_name
                                )),
                        )
                ));

                $pdf = file_get_contents($this->url, false, $context2);
                $filename = $_SESSION['abroad'] . "agreement.pdf";
                $imagename = $_SESSION['abroad'] . "agreement.png";
                $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
                $fp=fopen($write_path . '/' . $filename, "w");
                fwrite($fp, $pdf);
                fclose($fp);

                $im = new imagick();
                $im->setResolution(144,144);
                $im->readimage($write_path. '/'  . $filename);
                $im->setImageFormat('png');
                $im->writeImage($write_path. '/' . $imagename);
                $im->clear();
                $im->destroy();

                // separate disposal by smart_phone or PC
                if ($is_smp) {
                    $this->view->issmp = $smp;
                    $this->view->jpg = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path. '/' . $imagename));
                } else {
                    header('Content-Disposition: attachment; filename="'.$file_name.'"');
                    $this->view->file_type = 'pdf';
                    mb_convert_encoding(readfile($this->url, false, $context2), "SJIS", "UTF-8");
                }
                $this->view->title = '書類表示';

                unlink($write_path.'/'.$filename);
                unlink($write_path.'/'.$imagename);

            } else {
                // if pdf does not exist, print signature
                $signature = $_SESSION['abroad'].'signature.png';
                $image = getimage($_SESSION['abroad'], $signature, $this->url, $this->pass);

                $this->view->signature = 'data:image/png;base64,' . $image;
                $this->view->agreement_date = $agreement[0]['agreement_date'];
                $this->view->ispdf = 1;
            }

        } else {
            $this->view->signature = null;
            $this->view->agreement_date = null;
            $this->view->ispdf = 0;
            $tokenHandler = new Custom_Auth_Token;
            $this->view->token = $tokenHandler->getToken('agreement');
        }

        $this->view->title = '同意書表示';
        $this->view->issmp = $smp;
        $this->view->agreement = $agreement[0]['agreement_flag'];
    }

    public function savesignatureAction() {
        $params = $this->getRequest ()->getParams ();

        $table = 'clientstatus';
        $agreement = 'agreement';
        $param = 1;
        $article = 'article';

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'errorcsrf', 'index', 'error' );
        }

        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/img';
        $json = $params['output'];
        $img = sigJsonToImage($json);
        $comment = 'お客様署名';

        imagepng($img, $write_path.'/'.$_SESSION['abroad'].'signature.png');
        imagedestroy($img);

        $signature = $_SESSION['abroad'].'signature.png';
        $comment = 'お客様署名';
        $file_class = 91;
        $ret = setimage($_SESSION['abroad'], $signature, $comment, $file_class, $this->url, $this->pass);
        $this->model->setStatus($table, $_SESSION['abroad'], $article, $param);
        $this->model->setStatus($table, $_SESSION['abroad'], $agreement, $param);
        $agreement = $this->model->getStatus($table, $_SESSION['abroad'], $agreement);

        // make pdf for keeping
        $html = file_get_contents($this->base.'/mypage/application/agreement?abroad='.$_SESSION['abroad']);
        $mpdf = new mPDF('ja', 'A4');
        $mpdf->WriteHTML($html);
        $mpdf->Output($write_path. '/' . $_SESSION['abroad'] . 'agreement.pdf', 'F');

        $agreement = $_SESSION['abroad'].'agreement.pdf';
        $comment2 = '同意書内容';
        $file_class2 = 92;
        $ret2 = setimage($_SESSION['abroad'], $agreement, $comment, $file_class2, $this->url, $this->pass);

        unlink($write_path.'/'.$_SESSION['abroad'].'signature.png');
        unlink($write_path.'/'.$_SESSION['abroad'].'agreement.pdf');


        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, '同意書に署名を頂きました。', null);
        $this->writeEmail('同意書に署名');
    }

    public function passportAction() {
        $params = $this->getRequest ()->getParams ();
        $table = 'clientstatus';
        $column = 'passport';

        $this->abroadCheck($_SESSION['mem_id'], $_SESSION['abroad']);
        $passport = $this->model->getStatus($table, $_SESSION['abroad'], $column);

        $this->view->flag = $passport[0];
    }

    public function passprocessAction() {
        $params = $this->getRequest ()->getParams ();
        $uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/img';
        $table = 'clientstatus';
        $column = 'passport';
        $param = 1;

        $adapter = new Zend_File_Transfer_Adapter_Http ();
        $adapter->setDestination ( $uploadPath );

        if (! $adapter->receive ()) {
            $messages = $adapter->getMessages ();
            echo implode ( "\n", $messages );
        }

        $file = $adapter->getFileName (null, false);
        $extention = substr(strrchr($file, '.'), 1);
        $file_name = $_SESSION['abroad'] . '-pass.' . $extention;
        rename($uploadPath . '/' . $file, $uploadPath . '/' . $file_name);

        $comment = 'パスポート';
        $file_class = 94;
        $ret = setimage($_SESSION['abroad'], $file_name, $comment, $file_class, $this->url, $this->pass);

        $this->model->setStatus($table, $_SESSION['abroad'], $column, $param);
        unlink($uploadPath.'/'.$file_name);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'パスポートの画像をアップロードしました。', null);
        $this->writeEmail('パスポート画像アップロード');
    }

    public function filledformAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['branch_no'] = $params['branch_no'];
    }

    public function filledhomestayAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['branch_no'] = $params['branch_no'];
    }

    public function filledformprocessAction() {
        $params = $this->getRequest ()->getParams ();
        $uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/img';
        $table = 'clientstatus';
        $column = 'application';
        $param = 1;
        $appClass = 96;
        $fillClass = 97;

        $adapter = new Zend_File_Transfer_Adapter_Http ();
        $adapter->setDestination ($uploadPath);

        if (! $adapter->receive ()) {
            $messages = $adapter->getMessages ();
            echo implode ("\n", $messages);
        }

        $file_name = $adapter->getFileName (null, false);

        $table2 = 'T_ATTACH_FILE';
        $select2 = "branch_no, file_name, comment";
        $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where2['branch_no'] = array('column' => 'branch_no',
                'value' => $_SESSION['branch_no'],
                'comp' => '=',
                'andor' => 'AND');

        $items1 = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);

        $comment = $items1[0]['comment'];
        $file_class = 97;
        $ret = setimage($_SESSION['abroad'], $file_name, $comment, $file_class, $this->url, $this->pass);
        unlink($uploadPath.'/'.$file_name);
        unset ($_SESSION['branch_no']);

        // check all application are submit?
        $where3['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where3['file_class'] = array('column' => 'file_class',
                'value' => $appClass,
                'comp' => '=',
                'andor' => 'AND');

        $items2 = select_sqlserver($table2, $select2, $where3, $this->url, $this->pass);

        $where4['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where4['file_class'] = array('column' => 'file_class',
                'value' => $fillClass,
                'comp' => '=',
                'andor' => 'AND');

        $items3 = select_sqlserver($table2, $select2, $where4, $this->url, $this->pass);

        foreach($items3 as $key => $value) {
            $id[$key] = $value['comment'];
        }
        array_multisort($id, SORT_ASC, $items3);

        $j = 0;
        $complete = false;

        for ($i=0; $i<count($items2);$i++) {
            if (isset($items3[$j]['branch_no'])) {
                if ($items2[$i]['comment'] === $items3[$j]['comment']) {
                    $complete = true;
                    $j++;
                } else {
                    $conplete = false;
                }

            } else {
                $complete = false;
            }


        }

        if ($complete) {
            $this->model->setStatus($table, $_SESSION['abroad'], $column, $param);
        }

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, '学校願書をアップロードしました。', null);
    }

    public function filledhomestayprocessAction() {
        $params = $this->getRequest ()->getParams ();
        $uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/';
        $statusTable = 'clientstatus';
        $column = 'homestay';
        $param = 1;
        $appClass = 98;
        $fillClass = 99;

        $adapter = new Zend_File_Transfer_Adapter_Http ();
        $adapter->setDestination ($uploadPath);

        if (! $adapter->receive ()) {
            $messages = $adapter->getMessages ();
            echo implode ("\n", $messages);
        }

        $file_name = $adapter->getFileName (null, false);
        rename($uploadPath.$file_name, $uploadPath.$_SESSION['abroad']);
        $comment = '入力済ホームステイ申込書';
        $ret = setfile($_SESSION['abroad'], $file_name, $comment, $fillClass, $this->url, $this->pass);
        //unlink($uploadPath.'/'.$file_name);
        unset ($_SESSION['branch_no']);

        // check all application are submit?
        $table = 'T_ATTACH_FILE';
        $select = "branch_no, file_name, comment";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['file_class'] = array('column' => 'file_class',
                'value' => $appClass,
                'comp' => '=',
                'andor' => 'AND');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where2['file_class'] = array('column' => 'file_class',
                'value' => $fillClass,
                'comp' => '=',
                'andor' => 'AND');

        $items2 = select_sqlserver($table, $select, $where2, $this->url, $this->pass);

        $j = 0;
        $complete = false;
        for ($i=0; $i<count($items2);$i++) {
            if (isset($items2[$j]['branch_no'])) {
                if (isset($items2[$j]['branch_no'])) {
                    $complete = true;
                    $j++;
                } else {
                    $conplete = false;
                }

            } else {
                $complete = false;
            }


        }

        if ($complete) {
            $this->model->setStatus($statusTable, $_SESSION['abroad'], $column, $param);
        }

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'ホームステイ申込書をアップロードしました。', null);
    }

    public function getfileAction() {
        $params = $this->getRequest ()->getParams ();

        $table = 'T_ATTACH_FILE';
        $status_table = 'clientstatus';
        $select = "file_name";
        $file_no = $params['file_no'];
        $param = 1;

        switch($file_no){
            case '1':		// receipt
                $file_type = 12;
                $column = 'receipt';
                $this->model->setStatus($status_table, $_SESSION['abroad'], $column, $param);
                break;

            case '2':		// bill
                $file_type = 11;
                $column = 'bill';
                $this->model->setStatus($status_table, $_SESSION['abroad'], $column, $param);
                break;

            case '3': 	// identification
                $file_type = 93;
                break;

            case '4': 	// passport
                $file_type = 94;
                break;

            case '5':	// estimate
                $file_type = 0;
                break;

            case '6':   // clause
                $file_type = 1;
                break;

            case '7': 	// school application form
                $file_type = 96;
                break;

            case '8': 	// filled application form
                $file_type = 97;
                break;

            case '9': 	// homestay application form
                $file_type = 98;
                break;

            case '10': 	// filled homestay application form
                $file_type = 99;
                break;

            case '11': // homestay material
                $file_type = 100;
                break;

            default:
                return $this->_forward ( 'nofile', 'index', 'error' );
        }

        if ($file_type != 0 && $file_type != 1 && $file_type != 93 && $file_type != 94) {
            $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');
            $where['file_class'] = array('column' => 'file_class',
                    'value' => $file_type,
                    'comp' => '=',
                    'andor' => 'AND');
            $where['branch_no'] = array('column' => 'branch_no',
                    'value' => $params['branch_no'],
                    'comp' => '=',
                    'andor' => 'AND');

            $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

            $file_name = $items[0]['file_name'];
            if(!isset($file_name) && $file_type != 0) {
                return $this->_forward ( 'nofile', 'index', 'error' );
            }

        } else if ($file_type == 93 || $file_type == 94) {
            $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');
            $where['file_class'] = array('column' => 'file_class',
                    'value' => $file_type,
                    'comp' => '=',
                    'andor' => 'AND');

            $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

            $file_name = $items[0]['file_name'];
            if(!isset($file_name) && $file_type != 0) {
                return $this->_forward ( 'nofile', 'index', 'error' );
            }
        }

        $is_smp = smpcheck();

        if ($is_smp) {
            // client use smart phone
            $this->view->issmp = 1;
            if ($file_type == 12|| $file_type == 11 || $file_type == 97 || $file_type == 98) {
                $context2 = stream_context_create(array(
                        'http' => array(
                                'method' => 'POST',
                                'header' => implode('\r\n', array(
                                        'Content-Type: application/x-www-form-urlencoded',
                                )),
                                'content' => http_build_query(array(
                                        'pwd' => $this->pass,
                                        'command' => 'getpdf',
                                        'abroad_no' => $_SESSION['abroad'],
                                        'file_name' => $file_name
                                )),
                        )
                ));

                $pdf = file_get_contents($this->url, false, $context2);
                $filename = $_SESSION['abroad'] . "file.pdf";
                $imagename = $_SESSION['abroad'] . "file.png";
                $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
                $fp=fopen($write_path . '/' . $filename, "w");
                fwrite($fp, $pdf);
                fclose($fp);

                $im = new imagick();
                $im->setResolution(144,144);
                $im->readimage($write_path. '/' . $filename);
                $im->setImageFormat('png');
                $im->writeImage($write_path. '/'  . $imagename);
                $im->clear();
                $im->destroy();

                $this->view->jpg = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path. '/' . $imagename));
                $this->view->title = '書類表示';

                unlink($write_path.'/'.$filename);
                unlink($write_path.'/'.$imagename);
            } else if ($file_type == 96) {
                $context2 = stream_context_create(array(
                        'http' => array(
                                'method' => 'POST',
                                'header' => implode('\r\n', array(
                                        'Content-Type: application/x-www-form-urlencoded',
                                )),
                                'content' => http_build_query(array(
                                        'pwd' => $this->pass,
                                        'command' => 'getpdf',
                                        'abroad_no' => $_SESSION['abroad'],
                                        'file_name' => $file_name
                                )),
                        )
                ));

                $pdf = file_get_contents($this->url, false, $context2);
                $filename = $_SESSION['abroad'] . "file.pdf";
                $imagename = $_SESSION['abroad'] . "file";
                $extension = '.png';
                $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
                $fp=fopen($write_path . '/' . $filename, "w");
                fwrite($fp, $pdf);
                fclose($fp);

                $im = new imagick();
                $im->setResolution(144,144);
                $im->readimage($write_path . '/' . $filename);
                $page_count = $im->getImageScene();

                for($i = 0; $i <= $page_count; $i++) {
                    $im->setImageIndex($i);
                    $im->setImageFormat('png');
                    $im->writeimage($write_path.'/'.$imagename . $i . $extension);
                }

                $im->destroy();

                for($j = 0; $j <= $page_count; $j++) {
                    $png[] = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path . '/'  . $imagename . $j . $extension));
                    unlink($write_path.'/'.$imagename . $j . $extension);
                }
                unlink($write_path.'/'.$filename);
                $this->view->jpg = $png;
            } else if ($file_type == 93 || $file_type == 94 || $file_type == 99) {
                $type = explode('.', $file_name);
                if($type[1] === 'jpg') {
                    $ext = 'jpeg';
                } else {
                    $ext = $type[1];
                }

                $image = getimage($_SESSION['abroad'], $file_name, $this->url, $this->pass);

                $this->view->jpg = 'data:image/'.$ext.';base64,' . $image;
            } else if ($file_type == 0) {
                $context2 = stream_context_create(array(
                        'http' => array(
                                'method' => 'POST',
                                'header' => implode('\r\n', array(
                                        'Content-Type: application/x-www-form-urlencoded',
                                )),
                                'content' => http_build_query(array(
                                        'pwd' => $this->pass,
                                        'command' => 'getestimate',
                                        'client_no' => $_SESSION['crm_id'],
                                        'estimate_no' => $params['estimate_no']
                                )),
                        )
                ));

                $pdf = file_get_contents($this->url, false, $context2);
                $filename = $params['estimate_no'] . "file.pdf";
                $imagename = $params['estimate_no'] . "file.png";
                $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
                $fp=fopen($write_path . '/' . $filename, "w");
                fwrite($fp, $pdf);
                fclose($fp);

                $im = new imagick();
                $im->setResolution(144,144);
                $im->readimage($write_path. '/' . $filename);
                $im->setImageFormat('png');
                $im->writeImage($write_path. '/'  . $imagename);
                $im->clear();
                $im->destroy();

                $this->view->jpg = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path. '/' . $imagename));
                $this->view->title = '書類表示';

                unlink($write_path.'/'.$filename);
                unlink($write_path.'/'.$imagename);
            } else if ($file_type == 1) {
                $file_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
                $pdf_name = 'base_clause.pdf';
                $image_name = '基本約款';
                $extension = '.png';

                $im = new imagick();
                $im->setResolution(144,144);
                $im->readimage($file_path . '/' . $pdf_name);
                $page_count = $im->getImageScene();

                for($i = 0; $i <= $page_count; $i++) {
                    $im->setImageIndex($i);
                    $im->setImageFormat('png');
                    $im->writeimage($file_path.'/'.$image_name . $i . $extension);
                }

                $im->destroy();

                for($i = 0; $i <= $page_count; $i++) {
                    $png[] = 'data:image/png;base64,' . base64_encode(file_get_contents($file_path . '/'  . $image_name . $i . $extension));
                    unlink($file_path.'/'.$image_name . $i . $extension);
                }
                $this->view->jpg = $png;

            } else if ($file_type == 100) {
                $context2 = stream_context_create(array(
                    'http' => array(
                            'method' => 'POST',
                            'header' => implode('\r\n', array(
                                    'Content-Type: application/x-www-form-urlencoded',
                            )),
                            'content' => http_build_query(array(
                                    'pwd' => $this->pass,
                                    'command' => 'getpdf',
                                    'abroad_no' => $_SESSION['abroad'],
                                    'file_name' => $file_name
                            )),
                    )
                ));

                $pdf = file_get_contents($this->url, false, $context2);
                $filename = $_SESSION['abroad'] . "file.pdf";
                $imagename = $_SESSION['abroad'] . "file.png";
                $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
                $fp=fopen($write_path . '/' . $filename, "w");
                fwrite($fp, $pdf);
                fclose($fp);

                $im = new imagick();
                $im->setResolution(144,144);
                $im->readimage($write_path . '/' . $filename);
                $page_count = $im->getImageScene();

                for($i = 0; $i <= $page_count; $i++) {
                    $im->setImageIndex($i);
                    $im->setImageFormat('png');
                    $im->writeimage($write_path.'/'.$imagename . $i . $extension);
                }

                $im->destroy();

                for($i = 0; $i <= $page_count; $i++) {
                    $png[] = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path . '/'  . $imagename . $i . $extension));
                    unlink($write_path.'/'.$imagename . $i . $extension);
                }
                $this->view->jpg = $png;
                unlink($write_path.'/'.$filename);
            }

        } else {
            $this->view->issmp = 0;
            // file_type = pdf
            if ($file_type == 12|| $file_type == 11 || $file_type == 96 || $file_type == 98) {
                $context2 = stream_context_create(array(
                        'http' => array(
                                'method' => 'POST',
                                'header' => implode('\r\n', array(
                                        'Content-Type: application/x-www-form-urlencoded',
                                )),
                                'content' => http_build_query(array(
                                        'pwd' => $this->pass,
                                        'command' => 'getpdf',
                                        'abroad_no' => $_SESSION['abroad'],
                                        'file_name' => $file_name
                                )),
                        )
                ));

                header('Content-Disposition: attachment; filename="'.$file_name.'"');
                $this->view->file_type = 'pdf';
                mb_convert_encoding(readfile($this->url, false, $context2), "SJIS", "UTF-8");

                //file_type = image
            } else if ($file_type == 93 || $file_type == 94) {
                $type = explode('.', $file_name);
                if($type[1] === 'jpg') {
                    $ext = 'jpeg';
                } else {
                    $ext = $type[0];
                }

                $image = getimage($_SESSION['abroad'], $file_name, $this->url, $this->pass);
                header('Content-Type: application/force-download');
                header('Content-disposition: attachment; filename="'.$file_name.'"');
                echo base64_decode($image);
            } elseif ($file_type == 0) {
                $file_name = '御見積書_' . $params['estimate_no'] . '.pdf';
                $context2 = stream_context_create(array(
                        'http' => array(
                                'method' => 'POST',
                                'header' => implode('\r\n', array(
                                        'Content-Type: application/x-www-form-urlencoded',
                                )),
                                'content' => http_build_query(array(
                                        'pwd' => $this->pass,
                                        'command' => 'getestimate',
                                        'client_no' => $_SESSION['crm_id'],
                                        'estimate_no' => $params['estimate_no']
                                )
                                ))
                ));

                header('Content-Disposition: attachment; filename="'.$file_name.'"');
                $this->view->file_type = 'pdf';
                mb_convert_encoding(readfile($this->url, false, $context2), "SJIS", "UTF-8");
            } else if ($file_type == 1) {
                $file_name = 'base_clause.pdf';
                $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';

                header('Content-Disposition: attachment; filename="'.$file_name.'"');
                $this->view->file_type = 'pdf';
                readfile($write_path.'/'.$file_name);
            } else if ($file_type == 97 || $file_type == 99 || $file_type == 100) {
                $context2 = stream_context_create(array(
                        'http' => array(
                                'method' => 'POST',
                                'header' => implode('\r\n', array(
                                        'Content-Type: application/x-www-form-urlencoded',
                                )),
                                'content' => http_build_query(array(
                                        'pwd' => $this->pass,
                                        'command' => 'getfile',
                                        'abroad_no' => $_SESSION['abroad'],
                                        'file_name' => $file_name
                                )),
                        )
                ));
                $content = file_get_contents($this->url, false, $context2);
                $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/';
                $fp=fopen($write_path . $_SESSION['abroad'].$file_name, "w");
                fwrite($fp, $content);
                fclose($fp);

                header('Content-Length: ' . filesize ( $write_path.$_SESSION['abroad'].$file_name));
                header('Content-Type: application/octet-stream');
                header('Content-disposition: attachment; filename="' . $_SESSION['abroad'].$file_name. '"');
                readfile($write_path.$_SESSION['abroad'].$file_name);
                unlink($write_path.$_SESSION['abroad'].$file_name);
            }
        }
        $this->view->title = $file_name;
    }

    private function abroadCheck($member_id) {
        $table = 'clientstatus';
        $id = array('client_status_id', 'study_abroad_no');
        // is study abroad no exist?
        $abroad = $this->model->getAbroad($table, $member_id, $id);

        if(in_array($_SESSION['abroad'], $abroad)) {
            return true;
        }

        foreach($abroad as $list) {
            // check already set other study abroad no
            if($list['study_abroad_no'] == '') {
                $this->model->setAbroad($table, $list['client_status_id'], $_SESSION['abroad']);
                return true;
            }
        }
    }

    private function writeEmail($function) {
        $client_no = getCrmid('memlist', $_SESSION['mem_id']);
        $name = '('.$client_no['crmid'].')  '.$_SESSION['mem_name'];

        $items = getFromAddress($_SESSION['crm_id']);

        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $toMailAddress = $items[0][0];
        $subject = $name.'様から'.$function.'がありました['.$client_no['crmid'].']';
        $body = '以下のリンクより'.$function.'の確認をお願いします。';
        $body .= chr(10);
        $body .= chr(10);
        $body .= 'http://192.168.11.118/login/staff/index_p.php?p=MYPAGE&cn='.$_SESSION['crm_id'];

        writeEmail($name, $fromMailAddress, $toMailAddress, $subject, $body);
    }
}