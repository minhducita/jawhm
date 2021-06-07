<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/signature-to-image.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/mpdf/mpdf.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');
class School_ScheduleController extends Zend_Controller_Action {
    private $model;
    private $base;

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
        require_once ($root_dir . 'models/ScheduleModel.php');
        $this->model = new ScheduleModel ();
        initPage($this, '/application/modules/', 'school');
        $withoutList = array('schedule2img', 'makecontact', 'makeparents');
        without_loginschool($this, $withoutList, $this->base);
        headerLang($this, $this->msg_tbl);

    }
    public function selectinsvisaAction() {
        $params = $this->getRequest ()->getParams ();

        $abroad = $_SESSION['abroad'];
        $crmid = $params['client_no'];
        $this->view->abroad = $abroad;
        $this->view->client_no = $crmid;

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

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['保険契約VISA情報選択'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->msg = $message;

        $this->view->insurance_info = $insurance_info;
        $this->view->visa_info = $visa_info;
        $this->view->country = $params['country'];
    }

    public function showcontactAction() {
        $params = $this->getRequest()->getParams();
        $abroad = $_SESSION['abroad'];
        $branch_no = $params['branch_no'];
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);
        $insurance = $params['insurance'];
        $visa = $params['visa'];
        $country_name = $params['country'];

        $table = 'T_ENTRY_DETAILS';
        $select = 'client_no';
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $abroad,
                'comp' => '=',
                'andor' => 'null');
        $where['branch_no'] = array('column' => 'branch_no',
                'value' => 1,
                'comp' => '=',
                'andor' => 'AND');

        $crm_info = select_sqlserver($table, $select, $where, $this->url, $this->pass);
        $crmid = $crm_info[0]['client_no'];

        // make pdf for keeping
        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
        $html = file_get_contents($this->base.'/mypage/school/schedule/makecontact?crmid='.$crmid.'&abroad='.$abroad.'&insurance='.$insurance.'&visa='.$visa.'&country='.$country_name);
        $mpdf = new mPDF('ja', 'A4');
        $mpdf->WriteHTML($html);
        $mpdf->Output($write_path. '/' . $abroad . 'contact.pdf', 'F');

        $is_smp = smpcheck();
        if($is_smp == true) {
            $smp = 1;
        } else {
            $smp = 0;
        }
        $this->view->issmp = $smp;

        if ($is_smp) {
            $filename = $abroad . "contact.pdf";
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
            unlink($write_path.'/'.$abroad.'contact.jpg');
        } else {
            header('Content-Disposition: attachment; filename="contact_sheet.pdf"');
            $this->view->file_type = 'pdf';
            mb_convert_encoding(readfile($write_path . '/' . $abroad . 'contact.pdf'), "SJIS", "UTF-8");
        }

        unlink($write_path.'/'.$abroad.'contact.pdf');

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['連絡先閲覧'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;
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

}
