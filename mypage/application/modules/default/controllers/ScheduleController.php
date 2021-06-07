<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/signature-to-image.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/mpdf/mpdf.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class ScheduleController extends Zend_Controller_Action {
    private $model;
    private $base;

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
        initPage($this, '/application/modules/', 'client');
        $withoutList = array('schedule2img', 'makecontact', 'makeparents');
        without_loginchk($this, $withoutList, $this->base);

    }

    public function indexAction() {
        $abroad = $_SESSION['abroad'];
        $this->schedulelist($this, $abroad);
        $this->view->username = $_SESSION['mem_name'];
        $this->view->abroad = $abroad;
    }

    public function schedulepdfAction() {
        $params = $this->getRequest ()->getParams ();
        $abroad = $params['abroad'];
        $name = $params['name'];
        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
        $file_name = $abroad . 'schedule.pdf';

        // create pdf
        $html = file_get_contents($this->base.'/mypage/schedule/schedule2img?abroad='.$abroad.'&name='.$name);
        $mpdf = new mPDF('ja', 'A4');
        $mpdf->WriteHTML($html);
        $mpdf->Output($write_path. '/' . $file_name , 'F');

        // if user browsing smartphone, convert to jpg
        $is_smp = smpcheck();

        if ($is_smp) {
            $image_name = $abroad . 'schedule.jpg';
            $im = new imagick();
            $im->setResolution(300,300);
            $im->readimage($write_path. '/'  . $file_name);
            $im->setImageFormat('jpeg');
            $im->writeImage($write_path. '/' . $image_name);
            $im->clear();
            $im->destroy();

            // separate disposal by smart_phone or PC
            $this->view->issmp = 1;
            $this->view->jpg = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path. '/' . $image_name));
            unlink($write_path.'/'.$image_name);

        } else {
            $this->view->issmp = 0;
            header('Content-type: application/octet-stream');
            header('Content-Disposition: attachment; filename="schedule.pdf"');
            readfile($write_path. '/' . $file_name);
        }
        $this->view->title = 'お客様ご渡航日程表';
        unlink($write_path.'/'.$file_name);
    }

    public function schedule2imgAction() {
        $params = $this->getRequest ()->getParams ();
        $abroad = $params['abroad'];
        $this->view->name = $params['name'];

        $this->schedulelist($this, $abroad);
    }

    public function makecontractAction() {
        $table1['base'] = array('table' => 'M_顧客基本情報', 'column' => 'null');
        $table1['addr_type'] = array('table' => 'M_顧客住所', 'column' => 'お客様番号',
                'ontable' => 'M_顧客基本情報', 'oncolumn' => 'お客様番号');
        $select1 = 'M_顧客基本情報.ラストネーム, M_顧客基本情報.ファーストネーム, M_顧客住所.電話番号１';
        $where1['client_no'] = array('column' => 'M_顧客基本情報.お客様番号',
                'value' => $crmid,
                'comp' => '=',
                'andor' => 'null');
        $where1['addr_type'] = array('column' => 'M_顧客住所.住所種類',
                'value' => '留学先',
                'comp' => '=',
                'andor' => 'AND');
        $items1 = joinselect_sqlserver($table2, $select2, $where2, $this->url, $this->pass);
    }

    private function schedulelist($parent, $abroad) {
        $table['base'] = array('table' => 'T_ENTRY', 'column' => 'null');
        $table['T_ENTRY_DETAILS'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'study_abroad_no',
                                        'ontable' => 'T_ENTRY', 'oncolumn' => 'study_abroad_no');
        $table['M_SCHOOL'] = array('table' => 'M_学校', 'column' => '学校番号',
                                    'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');

        $select = "T_ENTRY.leave_date, T_ENTRY.arrival_date, T_ENTRY_DETAILS.entry_class, T_ENTRY_DETAILS.entrance_date, M_学校.日本語名, M_学校.国";
        $where[] = array('column' => 'T_ENTRY.study_abroad_no',
                                            'value' => $abroad,
                                            'comp' => '=',
                                            'andor' => 'null');
        $where[] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                                            'value' => 'null',
                                            'comp' => 'ni',
                                            'andor' => 'AND');
        $list = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);
        $flight_table = 'T_SC_customer_flight';
        $flight_select = 'flight_number, departure_place, departure_time, destination_place, destination_time';
        $flight_where['contract_number'] = array('column' => 'contract_number',
                                                    'value' => $abroad,
                                                    'comp' => '=',
                                                    'andor' => 'null');
        $flight_items = select_sqlserver($flight_table, $flight_select, $flight_where, $this->url, $this->pass);

        // key rename event's date
        $key_rename = array();
        $n = 0;
        $leave_date = $list[0]['leave_date'];
        foreach($list as $array) {
            foreach($array as $key => $value) {
                switch($key) {
                    // set T_ENTRY information
                    case 'entrance_date':
                        $key_rename[$n]['event_date'] = str_replace('00:00:00.000', '23:59:59.999', $value);
                        break;

                        // other informartion
                    default:
                        $key_rename[$n][$key] = $value;
                }
            }
            $n++;
        }

        $m = 0;
        foreach($flight_items as $array) {
            $flights[$m]['entry_class'] = 9;
            foreach ($array as $key => $val) {
                switch($key) {
                    // set T_ENTRY information
                    case 'departure_time':
                        $flights[$m]['event_date'] = $val;
                        break;

                        // other informartion
                    default:
                        $flights[$m][$key] = $val;
                }
            }
            $m++;
        }

        $items = array_merge($key_rename, $flights);
        foreach ($items as $key => $value) {
            $class_sort[$key] = $value['entry_class'];
            $date_sort[$key] = $value['event_date'];
        }
        array_multisort($date_sort, SORT_ASC, $class_sort, SORT_DESC, $items);

        $parent->view->items = $items;
        $parent->view->leave_date = $leave_date;
        $parent->view->title = 'お客様ご渡航日程表';
    }

    public function selectschoolAction() {
        $params = $this->getRequest ()->getParams ();
        $abroad = $_SESSION['abroad'];

        $table['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'null');
        $table['M_SCHOOL'] = array('table' => 'M_学校', 'column' => '学校番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');

        $select = "T_ENTRY_DETAILS.branch_no, T_ENTRY_DETAILS.entrance_date, M_学校.日本語名, M_学校.短縮国名";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');
        $where['entry_class'] = array('column' => 'entry_class',
                'value' => 1,
                'comp' => '=',
                'andor' => 'AND');
        $where['comm_division'] = array('column' => 'comm_division',
                'value' => 0,
                'comp' => '!=',
                'andor' => 'AND');

        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);
        $this->view->items = $items;
        $this->view->abroad = $abroad;
        $this->view->json = 1;
        $this->view->title = '学校・ご実家用連絡先シート印字';
    }

    public function selectinsvisaAction() {
        $params = $this->getRequest ()->getParams ();
        $abroad = $_SESSION['abroad'];
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);
        $this->view->abroad = $abroad;
        $this->view->client_no = $crmid['crmid'];

        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);

        Zend_Session::start();
        $country = new Zend_Session_Namespace('country');
        $country->name = $params['country'];

        $table1 = 'T_CLIENT_INSURANCE';
        $select1 = 'branch_no, provider_name, insurance_type, policy_number, insured_date_st, insured_date_ed';
        $where1['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');
        $where1['delete_flag'] = array('column' => 'delete_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'AND');

        $insurance_info = select_sqlserver($table1, $select1, $where1, $this->url, $this->pass);

        $table2 = 'T_VISA';
        $select2 = 'branch_no, visa_type, visa_number';
        $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');
        $where2['delete_flag'] = array('column' => 'delete_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'AND');

        $visa_info = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);

        $this->view->insurance_info = $insurance_info;
        $this->view->visa_info = $visa_info;
    }

    public function showcontactAction() {
        $params = $this->getRequest()->getParams();
        $abroad = $_SESSION['abroad'];
        $branch_no = $params['branch_no'];
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);
        $insurance = $params['insurance'];
        $visa = $params['visa'];
        Zend_Session::start();
        $country = new Zend_Session_Namespace('country');
        $country_name = $country->name;

        // make pdf for keeping
        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
        $filename = $abroad . "contact.pdf";
        $html = file_get_contents($this->base.'/mypage/schedule/makecontact?crmid='.$crmid['crmid'].'&abroad='.$abroad.'&insurance='.$insurance.'&visa='.$visa.'&country='.$country_name);
        $mpdf = new mPDF('ja', 'A4');
        $mpdf->WriteHTML($html);
        $mpdf->Output($write_path. '/' . $filename, 'F');

        $is_smp = smpcheck();
        if($is_smp == true) {
            $smp = 1;
        } else {
            $smp = 0;
        }
        $this->view->issmp = $smp;

        if ($is_smp) {
            $imagename = $abroad . "contact.jpg";

            $im = new imagick();
            $im->setResolution(300,300);
            $im->readimage($write_path. '/' . $filename);
            $im->setImageFormat('jpeg');
            $im->writeImage($write_path. '/' . $imagename);
            $im->clear();
            $im->destroy();

            $this->view->jpg = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path. '/' . $imagename));
            unlink($write_path.'/'.$imagename);
        } else {
            header("Content-Disposition: attachment; filename=$filename");
            $this->view->file_type = 'pdf';
            mb_convert_encoding(readfile($write_path . '/' . $filename), "SJIS", "UTF-8");
        }

        unlink($write_path.'/'.$filename);
    }

    public function makecontactAction() {
        $params = $this->getRequest()->getParams();
        $crmid = $params['crmid'];
        $abroad = $params['abroad'];
        $insurance_branch = $params['insurance'];
        $visa_branch = $params['visa'];
        $this->view->country = $params['country'];

        $table1 = 'M_顧客基本情報';
        $select1 = 'ラストネーム, ファーストネーム';
        $where1['client_no'] = array('column' => 'お客様番号',
                'value'=> $crmid,
                'comp' => '=',
                'andor' => 'null');

        $basic_info = select_sqlserver($table1, $select1, $where1, $this->url, $this->pass);

        $table2 = 'T_CLIENT_INSURANCE';
        $select2 = 'provider_name_english, policy_number, insured_date_st, insured_date_ed';
        $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');
        $where2['branch_no'] = array('column' => 'branch_no',
                'value' => $insurance_branch,
                'comp' => '=',
                'andor' => 'AND');
        $insurance_info = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);


        $table3 = 'T_VISA';
        $select3 = 'visa_type_english, visa_number, passport_number, arrival_date, visa_expiry_date';
        $where3['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value'=> $abroad,
                'comp' => '=',
                'andor' => 'null');

        $where3['branch_no'] = array('column' => 'branch_no',
                'value' => $visa_branch,
                'comp' => '=',
                'andor' => 'AND');

        $visa_info = select_sqlserver($table3, $select3, $where3, $this->url, $this->pass);

        $table4 = 'M_顧客住所';
        $select4 = '電話番号１, 住所１, 住所２, 住所３, 住所４';
        $where4['client_no'] = array('column' => 'お客様番号',
                'value'=> $crmid,
                'comp' => '=',
                'andor' => 'null');
        $where4['addr_type'] = array('column' => '住所種類',
                'value' => '留学先',
                'comp' => '=',
                'andor' => 'AND');

        $addr_info = select_sqlserver($table4, $select4, $where4, $this->url, $this->pass);

        $table5 = 'M_顧客住所';
        $select5 = '電話番号１';
        $where5['client_no'] = array('column' => 'お客様番号',
                'value'=> $crmid,
                'comp' => '=',
                'andor' => 'null');
        $where5['addr_type'] = array('column' => '住所種類',
                'value' => '実家',
                'comp' => '=',
                'andor' => 'AND');

        $emergency_info = select_sqlserver($table5, $select5, $where5, $this->url, $this->pass);

        $table6 = 'M_顧客メール情報';
        $select6 = 'メールアドレス';
        $where6['client_no'] = array('column' => 'お客様番号',
                'value'=> $crmid,
                'comp' => '=',
                'andor' => 'null');
        $where6['email_type'] = array('column' => 'メール種類',
                'value' => 'ＰＣ',
                'comp' => '=',
                'andor' => 'AND');
        $where6['post_departure'] = array('column' => '出発後連絡',
                'value' => 1,
                'comp' => '=',
                'andor' => 'AND');

        $email_info = select_sqlserver($table6, $select6, $where6, $this->url, $this->pass);

        $this->view->basic_info = $basic_info[0];
        $this->view->insurance_info = $insurance_info[0];
        $this->view->visa_info = $visa_info[0];
        $this->view->addr_info = $addr_info[0];
        $this->view->emergency_info = $emergency_info[0];
        $this->view->email_info = $email_info[0];
    }

    public function forparentsAction() {
        $params = $this->getRequest ()->getParams ();
        $abroad = $_SESSION['abroad'];
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);
        $this->view->abroad = $abroad;
        $this->view->client_no = $crmid['crmid'];

        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);

        Zend_Session::start();
        $country = new Zend_Session_Namespace('country');
        $country->name = $params['country'];

        $table1 = 'T_CLIENT_INSURANCE';
        $select1 = 'branch_no, provider_name, insurance_type, policy_number, insured_date_st, insured_date_ed';
        $where1['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');
        $where1['delete_flag'] = array('column' => 'delete_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'AND');

        $insurance_info = select_sqlserver($table1, $select1, $where1, $this->url, $this->pass);

        $table2 = 'T_VISA';
        $select2 = 'branch_no, visa_type, visa_number';
        $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');
        $where2['delete_flag'] = array('column' => 'delete_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'AND');

        $visa_info = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);

        $this->view->insurance_info = $insurance_info;
        $this->view->visa_info = $visa_info;
    }

    public function showparentsAction() {
        $params = $this->getRequest()->getParams();
        $abroad = $_SESSION['abroad'];
        $branch_no = $params['branch_no'];
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);
        $insurance = $params['insurance'];
        $visa = $params['visa'];
        Zend_Session::start();
        $country = new Zend_Session_Namespace('country');
        $country_name = $country->name;

        // make pdf for keeping
        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
        $html = file_get_contents($this->base.'/mypage/schedule/makeparents?crmid='.$crmid['crmid'].'&abroad='.$abroad.'&insurance='.$insurance.'&visa='.$visa.'&country='.$country_name);
        $mpdf = new mPDF('ja', 'A4');
        $mpdf->WriteHTML($html);
        $mpdf->Output($write_path. '/' . $abroad . 'contact.pdf', 'F');
        $filename = $abroad . "contact.pdf";

        $is_smp = smpcheck();
        if($is_smp == true) {
            $smp = 1;
        } else {
            $smp = 0;
        }
        $this->view->issmp = $smp;

        if ($is_smp) {
            $imagename = $abroad . "contact.jpg";
            $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
            $fp=fopen($write_path . '/' . $abroad . $filename,"w");
            fwrite($fp, $pdf);
            fclose($fp);

            $im = new imagick();
            $im->setResolution(300,300);
            $im->readimage($write_path. '/'  . $filename);
            $im->setImageFormat('jpeg');
            $im->writeImage($write_path. '/' . $imagename);
            $im->clear();
            $im->destroy();

            $this->view->jpg = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path. '/' . $imagename));
            unlink($write_path.'/'.$imagename);
        } else {
            header('Content-Disposition: attachment; filename="ご実家用.pdf"');
            $this->view->file_type = 'pdf';
            mb_convert_encoding(readfile($write_path . '/' . $abroad . 'contact.pdf'), "SJIS", "UTF-8");
        }

        unlink($write_path.'/'.$filename);
    }

    public function makeparentsAction() {
        $params = $this->getRequest()->getParams();
        $crmid = $params['crmid'];
        $abroad = $params['abroad'];
        $insurance_branch = $params['insurance'];
        $visa_branch = $params['visa'];
        $this->view->country = $params['country'];

        $table1 = 'M_顧客基本情報';
        $select1 = '氏名';
        $where1['client_no'] = array('column' => 'お客様番号',
                'value'=> $crmid,
                'comp' => '=',
                'andor' => 'null');

        $basic_info = select_sqlserver($table1, $select1, $where1, $this->url, $this->pass);

        $table2 = 'T_CLIENT_INSURANCE';
        $select2 = 'provider_name, policy_number, insured_date_st, insured_date_ed';
        $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');
        $where2['branch_no'] = array('column' => 'branch_no',
                'value' => $insurance_branch,
                'comp' => '=',
                'andor' => 'AND');
        $insurance_info = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);


        $table3 = 'T_VISA';
        $select3 = 'visa_type, visa_number, passport_number, arrival_date, visa_expiry_date';
        $where3['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value'=> $abroad,
                'comp' => '=',
                'andor' => 'null');

        $where3['branch_no'] = array('column' => 'branch_no',
                'value' => $visa_branch,
                'comp' => '=',
                'andor' => 'AND');

        $visa_info = select_sqlserver($table3, $select3, $where3, $this->url, $this->pass);

        $table4 = 'M_顧客住所';
        $select4 = '電話番号１, 住所１, 住所２, 住所３, 住所４';
        $where4['client_no'] = array('column' => 'お客様番号',
                'value'=> $crmid,
                'comp' => '=',
                'andor' => 'null');
        $where4['addr_type'] = array('column' => '住所種類',
                'value' => '留学先',
                'comp' => '=',
                'andor' => 'AND');

        $addr_info = select_sqlserver($table4, $select4, $where4, $this->url, $this->pass);

        $table5 = 'M_顧客住所';
        $select5 = '電話番号１';
        $where5['client_no'] = array('column' => 'お客様番号',
                'value'=> $crmid,
                'comp' => '=',
                'andor' => 'null');
        $where5['addr_type'] = array('column' => '住所種類',
                'value' => '実家',
                'comp' => '=',
                'andor' => 'AND');

        $emergency_info = select_sqlserver($table5, $select5, $where5, $this->url, $this->pass);

        $table6 = 'M_顧客メール情報';
        $select6 = 'メールアドレス';
        $where6['client_no'] = array('column' => 'お客様番号',
                'value'=> $crmid,
                'comp' => '=',
                'andor' => 'null');
        $where6['email_type'] = array('column' => 'メール種類',
                'value' => 'ＰＣ',
                'comp' => '=',
                'andor' => 'AND');
        $where6['post_departure'] = array('column' => '出発後連絡',
                'value' => 1,
                'comp' => '=',
                'andor' => 'AND');

        $email_info = select_sqlserver($table6, $select6, $where6, $this->url, $this->pass);

        $table['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'null');
        $table['M_SCHOOL'] = array('table' => 'M_学校', 'column' => '学校番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');

        $select = "T_ENTRY_DETAILS.memo, T_ENTRY_DETAILS.entrance_date, T_ENTRY_DETAILS.weeks, M_学校.日本語名, M_学校.国";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');
        $where['entry_class'] = array('column' => 'entry_class',
                'value' => 1,
                'comp' => '=',
                'andor' => 'AND');
        $where['comm_division'] = array('column' => 'comm_division',
                'value' => 0,
                'comp' => '!=',
                'andor' => 'AND');

        $school_info = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);

        $date = new Zend_Date($school_info[0]['entrance_date'], Zend_Date::ISO_8601);
        $date->add($school_info[0]['weeks'], Zend_Date::WEEK);
        $school_info[0]['graduate_date'] = $date->toString('yyyy年MM月dd日');

        $this->view->base = $this->base;
        $this->view->basic_info = $basic_info[0];
        $this->view->insurance_info = $insurance_info[0];
        $this->view->visa_info = $visa_info[0];
        $this->view->addr_info = $addr_info[0];
        $this->view->emergency_info = $emergency_info[0];
        $this->view->email_info = $email_info[0];
        $this->view->school_info = $school_info[0];
    }

}
