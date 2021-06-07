<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class PlanController extends Zend_Controller_Action {
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
        initPage($this, '/application/modules/', 'client');
        $withoutList = array();
        without_loginchk($this, $withoutList, $base);
    }

    public function indexAction() {
        if (isset($_SESSION['abroad'])) {
            $this->view->abroad = $_SESSION['abroad'];
        } else {
            $this->view->abroad = '';
        }

        $chart = new MypageConst();
        $stepChart = $chart::$STEP_CHART;

        $this->view->json = 0;
        $this->view->title = 'プラン画面';
    }

    public function stepchartAction() {
        $is_send = $this->model->checkInquiry('clientstatus', $_SESSION['mem_id']);
        $message = $this->model->getStepCharts('mypage_step_chart');
        $status = $this->model->getStepStatus('clientstatus', $_SESSION['mem_id']);

        $chart = new MypageConst();
        $stepChart = $chart::$STEP_CHART;

        $this->view->items = $message;
        $this->view->status = $status;
        $this->view->chart = $stepChart;
        $this->view->is_send = $is_send['inquiry_num'];
        $this->view->json = 0;
        $this->view->title = 'ステップチャート';
    }

    public function separateAction() {
        $params = $this->getRequest ()->getParams ();
        $message = $this->model->getStepChart('mypage_step_chart', $params['id']);
        switch($params['id']) {
            case 8:
                $start = 7;
                break;

            case 9:
                $start = 12;
                break;

            case 10:
                $start = 17;
                break;
        }
        $status = $this->model->getStepStatus('clientstatus', $_SESSION['mem_id']);

        $stat = new MypageConst();
        $stepChart = $stat::$STEP_CHART;

        $agree = $this->model->getStatus('clientstatus', $_SESSION['crm_id'], 'agreement');

        $this->view->items = $message;
        $this->view->status = $status;
        $this->view->chart = $stepChart;
        $this->view->n = $start;
        $this->view->agree = $agree[0]['agreement_confirm'];
        $this->view->json = 0;
        $this->view->title = 'ステップチャート別紙';
    }

    public function selectabroadAction() {
        $table = 'T_ENTRY';
        $select = "study_abroad_no";
        $where['client_no'] = array('column' => 'client_no',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');
        $where['close_flag'] = array('column' => 'close_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'and');

        $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->json = 1;
        $this->view->list = $list;
    }

    public function flightinquiryAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('inquiry');

        if (isset($_SESSION['flight_inquiry'])) {
            $item = $_SESSION['flight_inquiry'];
        } else if (isset($params['id'])) {
            $item = $this->model->getInquiry('mypage_flight_inquiry', $params['id']);
            $_SESSION['mypage_flight_inquiry_id'] = $params['id'];
        } else {
            $item = null;
        }

        $this->view->item = $item;
    }

    public function inquiryconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $_SESSION['flight_inquiry'] = $params;

        // inpout check
        if(!isset($params['name_jp']) || !isset($params['name_en']) || !isset($params['tel'])
            || !isset($params['email']) || !isset($params['departure_place']) || !isset($params['destination_place'])
            || !isset($params['age'])) {
            return $this->_forward('inputpageerror', 'index', 'error');
        }

        $alpha = ctype_alpha(preg_replace('/(\s|　)/','',$params['name_en']));
        if ($alpha == false) {
            $alphabet_only = '日本語入力は禁止です。お手数ですが、再度見積依頼の開き直しをお願いします。';
            return $this->_forward('modalmessage', 'index', 'error', array('message' => $alphabet_only));
        }

        if ($this->checkTel($params['tel']) == false) {
            $tel = '電話番号の形式が違います。お手数ですが、再度見積依頼の開き直しをお願いします。';
            return $this->_forward('modalmessage', 'index', 'error', array('message' => $tel));
        }

        $email_pattern = "/^.+@.+\..+$/";
        if (preg_match($email_pattern, $params['email']) == false) {
            $email = 'メールアドレスの書式が違います。お手数ですが、再度見積依頼の開き直しをお願いします。';
            return $this->_forward('modalmessage', 'index', 'error', array('message' => $email));
        }

        $date_check = dateCheck($params['flight_date'], false);
        if (is_null($date_check == false)) {
            return $this->_forward('modalmessage', 'index', 'error', array('message' => $date_check));
        }

        if (ctype_digit($params['age']) == false) {
            $age = '年齢の書式が違います。お手数ですが、再度見積依頼の開き直しをお願いします。';
            return $this->_forward('modalmessage', 'index', 'error', array('message' => $age));
        }

        $this->view->item = $params;
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('inquiry-complete');

    }

    public function sendinquiryAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $table = 'mypage_flight_inquiry';
        if (isset($_SESSION['mypage_flight_inquiry_id'])) {
            $result = $this->model->updateInquiry($table, $_SESSION['flight_inquiry']);
            $message = '編集';
        } else {
            $result = $this->model->insertInquiry($table, $_SESSION['flight_inquiry'], $_SESSION['mem_id']);
            $message = '新規';
        }

        $this->writeEmail($this, $_SESSION['flight_inquiry'], $_SESSION['crm_id'], $message);
        $this->model->addInquiry('clientstatus', $_SESSION['crm_id'], 'inquiry_num');

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'フライト見積依頼を送信しました。', $_SESSION['mem_id']);
        unset($_SESSION['flight_inquiry']);
    }

    public function inquirylistAction() {
        $items = $this->model->getInquirys('mypage_flight_inquiry', $_SESSION['mem_id']);
        $this->view->items = $items;
    }

    public function historyAction() {
        $plan = $this->model->getpastPlan('next_step', $_SESSION['mem_id']);

        $paginator = Zend_Paginator::factory($plan);
        $paginator->setItemCountPerPage(10);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $pages = $paginator->getPages();
        $pageArray = get_object_vars($pages);

        $this->view->pages = $pageArray;
        $this->view->plan = $paginator->getIterator();
    }

    public function nextstepAction() {
        $plan = $this->model->getnextPlan('next_step', $_SESSION['mem_id']);
        $this->view->plan = $plan;
    }

    public function suggestionAction() {
        $params = $this->getRequest ()->getParams ();

        $result = $this->model->keyword('take_off_place', $params['inp']);

        $return = '';
        $is_first = true;
        foreach($result as $array) {
            foreach($array as $key => $value){
                if(!$is_first) {
                    $return .= ',';
                }

                if ($is_first) {
                    $return .= "'候補:".$value."'";
                    $is_first = false;
                } else {
                    $return .= "'　　 ".$value."'";
                }
            }
        }

        echo "[$return]";
    }

    public function counselingAction() {
        $file_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
        $pdf_name = 'counseling.pdf';
        $image_name = 'counseling';
        $extension = '.png';

        $is_smp = smpcheck();
        if ($is_smp) {
            $this->view->issmp = 1;
            $im = new imagick();
            $im->setResolution(144,144);
            $im->readimage($file_path . '/' . $pdf_name);
            $im->setImageFormat('png');
            $im->writeimage($file_path.'/'.$image_name . $extension);
            $im->clear();
            $im->destroy();

            $this->view->title = 'カウンセリング予約時の注意点';

            $png = 'data:image/png;base64,' . base64_encode(file_get_contents($file_path . '/'  . $image_name . $extension));
            unlink($file_path.'/'.$image_name . $extension);
            $this->view->pngs = $png;

        } else {
            $this->view->issmp = 0;
            header('Content-Disposition: attachment; filename="'.$pdf_name.'"');
            $this->view->file_type = 'pdf';
            mb_convert_encoding(readfile($file_path. '/' . $pdf_name), "SJIS", "UTF-8");
        }
    }

    private function writeEmail($parent, $params, $crm_id, $message) {
        $name = $_SESSION['mem_name'];

        $table['base'] = array('table' => 'Q_顧客拠点', 'column' => null);
        $table['office_base'] = array('table' => 'M_拠点', 'column' => '拠点コード',
                'ontable' => 'Q_顧客拠点', 'oncolumn' => '担当拠点コード');

        $select = "M_拠点.拠点メールアドレス";
        $where['client_no'] = array('column' => 'Q_顧客拠点.お客様番号',
                'value' => $crm_id,
                'comp' => '=',
                'andor' => 'null');

        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);

        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $toMailAddress = $items[0][0];
        $subject = $name.'様からフライト見積依頼' . $message . 'が届きました['.$crm_id.']';
        $body = 'お名前: ' . $params['name_jp'];
        $body .= chr(10);
        $body .= '英語名: ' . $params['name_en'];
        $body .= chr(10);
        $body .= '電話番号: ' . $params['tel'];
        $body .= chr(10);
        $body .= 'PCメールアドレス: ' . $params['email'];
        $body .= chr(10);
        $body .= '渡航予定日: ' . $params['flight_date'];
        $body .= chr(10);
        $body .= '出発地情報: ' . $params['departure_place'];
        $body .= chr(10);
        $body .= '到着地情報: ' . $params['destination_place'];
        $body .= chr(10);
        if ($params['ticket_request'] == 1) {
            $ticket = '片道';
        } else {
            $ticket = '往復';
        }
        $body .= '片道・往復リクエスト:' . $ticket;
        $body .= chr(10);
        if ($params['plan_request'] == 1) {
            $plan = '安さ重視';
        } elseif ($params['plan_request'] == 2) {
            $plan = '直行便希望';
        } else {
            $plan = '両方';
        }
        $body .= 'プランリクエスト:' . $plan;
        $body .= chr(10);
        if ($params['visa_type'] == 1) {
            $visa = 'ワーキングホリデービザ';
        } elseif ($params['visa_type'] == 2) {
            $visa = '学生ビザ';
        } else {
            $visa = '観光ビザ';
        }
        $body .= chr(10);
        $body .= '渡航時の年齢: ' . $params['age'];

        writeEmail($name, $fromMailAddress, $toMailAddress, $subject, $body);
    }

    private function checkTel($str) {
        //全角を半角に
        $str = mb_convert_kana($str,"a", "UTF-8");
        //半角または全角のハイフンは取り除く
        $str = mb_ereg_replace("-", "", $str);
        $str = mb_ereg_replace("ー", "", $str);
        $str = mb_ereg_replace("－", "", $str);

        //数字であり、かつ10桁もしくは9桁かチェック
        if(ctype_digit($str) AND (strlen($str) == 10 OR strlen($str)== 11)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}