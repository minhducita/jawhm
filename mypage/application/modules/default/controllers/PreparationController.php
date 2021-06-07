<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/mpdf/mpdf.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class PreparationController extends Zend_Controller_Action {
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
        require_once ($root_dir . 'models/PreparationModel.php');
        $this->model = new PreparationModel ();
        initPage($this, '/application/modules/', 'client');
        $withoutList = array('makepolicy');
        without_loginchk($this, $withoutList, $this->base);

    }

    public function indexAction() {
        $params = $this->getRequest ()->getParams ();

        if ($_SESSION['abroad'] == '') {
            $_SESSION['abroad'] = $params['abroad'];
            $this->view->rewrite = 0;
        } else {
            $_SESSION['abroad'] = $_SESSION['abroad'];
            $this->view->rewrite = 1;
        }

        $this->view->username = $_SESSION['mem_name'];
        $status_table = 'clientstatus';
        $status = $this->model->getConfirm($status_table, $_SESSION['mem_id']);
        if(smpcheck()) {
            $smp = 1;
        } else {
            $smp = 0;
        }

        $this->view->bum = 1;
        $this->view->index = 1;
        $this->view->json = 1;
        $this->view->smp = $smp;
        $this->view->status = $status;
        $this->view->title = 'ご出発前手続一覧';
    }

    public function flightlistAction() {
        $params = $this->getRequest ()->getParams ();

        $table = 'T_SC_customer_flight';
        $select = 'ID,flight_number,departure_place,departure_time,destination_place,destination_time';
        $where['contract_number'] = array('column' => 'contract_number',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->items = $items;
        $this->view->datepicker = 1;
        $this->view->abroad = $_SESSION['abroad'];
        $this->view->title = 'フライト情報一覧';
    }

    public function changeflightAction() {
        $params = $this->getRequest ()->getParams ();

        if (!isset($params['id'])) {
            return $this->_forward ( 'errorpageload', 'index', 'error' );
        }

        if ($params['id'] != 'new') {
            $table = 'T_SC_customer_flight';
            $select = "ID, flight_number, image_upload, departure_place, departure_time, destination_place, destination_time";
            $where['ID'] = array('column' => 'ID',
                    'value' => $params['id'],
                    'comp' => '=',
                    'andor' => 'null');

            $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);
            if ($items[0]['image_upload'] == 1) {
                $flight_table = 'T_ATTACH_FILE';
                $flight_select = "file_name";

                $flight_where['study_abroad_no'] = array('column' => 'study_abroad_no',
                        'value' => $_SESSION['abroad'],
                        'comp' => '=',
                        'andor' => 'null');
                $flight_where['file_class'] = array('column' => 'file_class',
                        'value' => 95,
                        'comp' => '=',
                        'andor' => 'AND');
                $flight_where['file_name'] = array('column' => 'file_name',
                        'value' => $_SESSION['abroad'] . '-flight'. $params['id'],
                        'comp' => 'like',
                        'andor' => 'AND');
                $flight_image = select_sqlserver($flight_table, $flight_select, $flight_where, $this->url, $this->pass);

                $file_name = $flight_image[0]['file_name'];
            } else {
                $file_image = null;
            }

            if(isset($flight_image[0]['file_name'])) {
                $image = getimage($_SESSION['abroad'], $file_name, $this->url, $this->pass);
                $img = 'data:image/png;base64,' . $image;
                $flight_id = $items[0]['id'];
            } else {
                $img = null;
                $flight_id = 'new';
            }

            $flight_id = $items[0]['ID'];
            $flight = $items[0];
        } else {
            $flight_id = null;
            $flight = array(
                    'flight_number' => null,
                    'departure_place' => null,
                    'depature_time' => null,
                    'destination_place' => null,
                    'destination_time' => null
            );
            $img = null;
            $flight_id = 'new';
        }

        $this->view->id = $flight_id;
        $this->view->item = $flight;
        $this->view->img = $img;
        $this->view->flight_id = $flight_id;
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('flight');
    }

    public function imageuploadAction() {
        $params = $this->getRequest ()->getParams ();

        if ($params['id'] != 'new') {
            $_SESSION['flight_id'] = $params['id'];
            $flight_table = 'T_SC_customer_flight';
            $flight_select = "image_upload";

            $flight_where[] = array('column' => 'ID',
                    'value' => $params['id'],
                    'comp' => '=',
                    'andor' => 'null');

            $flight = select_sqlserver($flight_table, $flight_select, $flight_where, $this->url, $this->pass);
            if ($flight[0]['image_upload'] == 1) {
                return $this->_forward ( 'alreadyupload', 'index', 'error' );
            }
        }

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('flight-image');
    }

    public function imageprocessAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/img';
        $table = 'clientstatus';
        $column = 'flightimage';
        $param = 1;

        $adapter = new Zend_File_Transfer_Adapter_Http ();
        $adapter->setDestination ( $uploadPath );

        if (! $adapter->receive ()) {
            $messages = $adapter->getMessages ();
            echo implode ( "\n", $messages );
        }

        $file = $adapter->getFileName (null, false);
        $extention = substr(strrchr($file, '.'), 1);
        $file_name = $_SESSION['abroad'] . '-flight'. $_SESSION['flight_id'] . '.' . $extention;
        rename($uploadPath . '/' . $file, $uploadPath . '/' . $file_name);

        $comment = 'フライト情報';
        $file_class = 95;
        $ret = setimage($_SESSION['abroad'], $file_name, $comment, $file_class, $this->url, $this->pass);

        $update_table = 'T_SC_customer_flight';
        $update_where['ID'] = array('column' => 'ID',
                'value' => $_SESSION['flight_id'],
                'comp' => '=',
                'andor' => 'null');

        $update = array('image_upload' => 1);
        $ret = update_sqlserver($update_table, $update, $update_where, $this->url, $this->pass);

        $this->model->setStatus($table, $_SESSION['mem_id'], $column, $param);
        unlink($uploadPath.'/'.$file_name);
        unset($_SESSION['flight_id']);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'フライト情報の画像をアップロードしました。', null);
        $this->writeEmail('フライト情報画像のアップロード');
    }

    public function imgdelconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('flightimagedelete');
        $_SESSION['flight_id'] = $params['id'];
    }

    public function deleteimageAction() {
        $params = $this->getRequest ()->getParams ();
        $class = 95;

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'errorcsrf', 'index', 'error' );
        }

        $flight_table = 'T_ATTACH_FILE';
        $flight_select = "file_name";

        $flight_where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $flight_where['file_class'] = array('column' => 'file_class',
                'value' => $class,
                'comp' => '=',
                'andor' => 'AND');
        $flight_where[] = array('column' => 'file_name',
                'value' => $_SESSION['abroad'] . '-flight' . $_SESSION['flight_id'],
                'comp' => 'like',
                'andor' => 'and');

        $flight_path = select_sqlserver($flight_table, $flight_select, $flight_where, $this->url, $this->pass);
        $file_name = $flight_path[0]['file_name'];
        $image = deleteimage($_SESSION['abroad'], $file_name, $class, $this->url, $this->pass);

        $delete_table = 'T_ATTACH_FILE';
        $delete_where[] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $delete_where[] = array('column' => 'file_class',
                'value' => $class,
                'comp' => '=',
                'andor' => 'and');
        $delete_where[] = array('column' => 'file_name',
                'value' => $file_name,
                'comp' => '=',
                'andor' => 'and');

        $ret = delete_sqlserver($delete_table, $delete_where,  $this->url, $this->pass);

        $update_table = 'T_SC_customer_flight';
        $update_where['ID'] = array('column' => 'ID',
                'value' => $_SESSION['flight_id'],
                'comp' => '=',
                'andor' => 'null');

        $update = array('image_upload' => 0);
        $ret = update_sqlserver($update_table, $update, $update_where, $this->url, $this->pass);
    }

    public function editflightAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'errorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['flight_number']) || empty($params['departure_place'])
                || empty($params['departure_time']) || empty($params['destination_place'])
                || empty($params['destination_time'])) {
            return $this->_forward ( 'inputpageerror', 'index', 'error' );
        }

        if (!preg_match("/^[a-zA-Z0-9]+$/", $params['flight_number']) || !preg_match("/^[a-zA-Z0-9]+$/", $params['departure_place'])
                || !preg_match("/^[a-zA-Z0-9]+$/", $params['destination_place'])) {
            return $this->_forward ( 'inputpageerror', 'index', 'error' );
        }

        $date_check_departure = dateCheck($params['departure_time'], true);
        if (!is_null($date_check_departure)) {
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$date_check_departure.'/prev/flightlist');
            throw new Exception($date_check_departure);
        }

        $date_check_destination = dateCheck($params['destination_time'], true);
        if (!is_null($date_check_destination)) {
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$date_check_destination.'/prev/flightlist');
            throw new Exception($date_check_destination);
        }

        $smp = smpcheck();
        if ($smp) {
            $departure_time = str_replace('T', ' ', $params['departure_time']);
            $destination_time = str_replace('T', ' ', $params['destination_time']);
        } else {
            $departure_time = $params['departure_time'] . ':00';
            $destination_time = $params['destination_time'] . ':00';
        }

        $table = 'T_SC_customer_flight';
        if(!empty($params['ID'])) {
            // update
            $select = "ID,contract_number";
            $where['ID'] = array('column' => 'ID',
                    'value' => $params['ID'],
                    'comp' => '=',
                    'andor' => 'null');

            $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

            if($_SESSION['abroad'] != $list[0]['contract_number']) {
                $message_update = '留学番号が一致しません。';
                header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$message_update.'/prev/flightlist');
                throw new Exception($message_update);
            }

            $where2['ID'] = array('column' => 'ID',
                    'value' => $list[0]['ID'],
                    'comp' => '=',
                    'andor' => 'null');


            $update = array('flight_number' => $params['flight_number'],
                    'departure_place' => $params['departure_place'],
                    'departure_time' => $departure_time,
                    'destination_place' => $params['destination_place'],
                    'destination_time' => $destination_time,
                    'update_date' => date('Y-m-d H:i:s')
            );

            $ret = update_sqlserver($table, $update, $where2, $this->url, $this->pass);
            $req = $this->getRequest();
            $actionName = $req->getActionName();
            action_log($actionName, 'フライト情報を変更しました。', null);
        } else {
            // insert
            $insert = array('contract_number' => $_SESSION['abroad'],
                    'flight_number' => $params['flight_number'],
                    'departure_place' =>$params['departure_place'],
                    'departure_time' => $departure_time,
                    'destination_place' => $params['destination_place'],
                    'destination_time' => $destination_time,
                    'create_date' => date('Y-m-d H:i:s'),
                    'update_date' => date('Y-m-d H:i:s')
            );
            $ret = insert_sqlserver($table, $insert, $this->url, $this->pass);
            $client_table = 'clientstatus';
            $status = 'flight';
            $data = 1;
            $this->model->setStatus($client_table, $_SESSION['abroad'], $status, $data);

            $req = $this->getRequest();
            $actionName = $req->getActionName();
            action_log($actionName, 'フライト情報を登録しました。', null);
        }
        $this->writeEmail('フライト情報の登録');
    }

    public function flightdelconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('flightdelete');
        $this->view->flight_number = $params['flight_number'];
        $this->view->id = $params['id'];
    }

    public function deleteflightAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $table = 'T_SC_customer_flight';
        $where['ID'] = array('column' => 'ID',
                'value' => $params['ID'],
                'comp' => '=',
                'andor' => 'null');

        $ret = delete_sqlserver($table, $where, $this->url, $this->pass);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'フライト情報を削除しました。', null);
    }

    public function insurancelistAction() {
        $params = $this->getRequest ()->getParams ();
        $table = 'memlist';

        $_SESSION['abroad'] = $_SESSION['abroad'];
        $crmid = $this->model->getCrmid($table, $_SESSION['mem_id']);

        $this->view->datepicker = 1;
        $this->common_insurance($this, $crmid, $this->url, $this->pass);
    }

    public function insenglistAction() {
        $params = $this->getRequest ()->getParams ();
        $table = 'memlist';
        $_SESSION['abroad'] = $_SESSION['abroad'];
        $crmid = $this->model->getCrmid($table, $_SESSION['mem_id']);

        $this->common_insurance($this, $crmid, $this->url, $this->pass);
    }


    public function changeinsuranceAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['abroad'] = $_SESSION['abroad'];

        $table = 'T_CLIENT_INSURANCE';
        $select = "branch_no, provider_name, insurance_type, policy_number, policy_owner,
                    line, insured_date_st, insured_date_ed, division, deposit_amount,
                    option_flag, option_name, option_amount";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['branch_no'] = array('column' => 'branch_no',
                'value' => $params['branch_no'],
                'comp' => '=',
                'andor' => 'AND');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->item = $items[0];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('insurance');
    }

    public function editinsuranceAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['abroad'] = $_SESSION['abroad'];
        $statustable = 'memlist';
        $crmid = $this->model->getCrmid($statustable, $_SESSION['mem_id']);

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['insurance_type']) || empty($params['policy_number'])
                || empty($params['policy_owner']) || empty($params['line'])
                || empty($params['insured_date_st']) || empty($params['insured_date_ed'])
                || empty($params['division']) || empty($params['deposit_amount'])
                || empty($params['provider_name'])
        ) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if ($params['option_flag'] == 1) {
            if (empty($params['option_name']) || empty($params['option_amount'])) {
                return $this->_forward ( 'inputerror', 'index', 'error' );
            }
        } else {
            if (!empty($params['option_name']) || !empty($params['option_amount'])) {
                return $this->_forward ( 'inputerror', 'index', 'error' );
            }
        }

        // set english name if provider name selected from form's select.

        switch($params['provider_name']) {
            case 'AIU':
                $provider_eng = 'AIU';
                break;

            case '三井住友海上':
                $provider_eng = 'Mitsui Sumitomo Insurance Company Limited';
                break;

            case '東京海上日動':
                $provider_eng = 'Tokio Marine & Nichido Fire Insurance Co., Ltd.';
                break;

            case 'ジェイアイ':
                $provider_eng =  'JI Accident & Fire insurance Co., Ltd.';
                break;

            case '損保ジャパン':
                $provider_eng = 'SOMPO JAPAN INSURANCE INC';
                break;

            case 'エイチ・エス':
                $provider_eng = 'H.S. Insurance Co., Ltd.';
                break;

            case '日本興亜損保':
                $provider_eng = 'NIPPONKOA INSUARANCE CO., LTD';
                break;

            default :
                $provider_eng = $params['provider_name'];
        }

        // set english name column
        switch($params['line']) {
            case '海外旅行':
                $line_eng = 'travel';
                break;

            case '留学':
                $line_eng = 'study';
                break;

            default:
                $line_eng = null;
        }

        switch($params['division']) {
            case '新規':
                $division_eng = 'new';
                break;

            case '延長':
                $division_eng = 'extension';
                break;

            default:
                $division_eng = null;
        }

        $date_check = dateCheck($params['insured_date_st'], false) . dateCheck($params['insured_date_ed'], false);
        if($date_check != '') {
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$date_check.'/prev/index');
            throw new Exception($date_check);
        }

        $deposit_amount = str_replace(',', '', $params['deposit_amount']);
        if (!is_numeric($deposit_amount)) {
            $amount_check = '入金額が数字ではありません。';
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$amount_check.'/prev/index');
            throw new Exception($amount_check);
        }

        $option_amount = str_replace(',', '', $params['option_amount']);
        if ($params['option_flag'] == 1 && !is_numeric($option_amount)) {
            $amount_check = 'オプション金額が数字ではありません。';
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$amount_check.'/prev/index');
            throw new Exception($amount_check);
        } else if (!is_numeric($option_amount)){
            $option_amount = 0;
        }

        $table = 'T_CLIENT_INSURANCE';
        if($params['branch_no'] !='') {
            // update target check
            $select = "client_no, study_abroad_no, branch_no";
            $where[] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');
            $where[] = array('column' => 'branch_no',
                    'value' => $params['branch_no'],
                    'comp' => '=',
                    'andor' => 'AND');

            $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

            if($crmid['crmid'] != $list[0]['client_no'] || $_SESSION['abroad'] != $list[0]['study_abroad_no'] || $params['branch_no'] != $list[0]['branch_no']) {
                $message_update = '契約情報が一致しません。';
                header('Location: '.$this->base.'/mypage/error/index/modalmessage?message='.$message_update.'&prev=achievement/insurancelist');
                throw new Exception($message_update);
            }

            $where2[] = array('column' => 'study_abroad_no',
                    'value' => $list[0]['study_abroad_no'],
                    'comp' => '=',
                    'andor' => 'null');
            $where2[] = array('column' => 'branch_no',
                    'value' => $list[0]['branch_no'],
                    'comp' => '=',
                    'andor' => 'AND');

            $update = array('provider_name' => $params['provider_name'],
                    'provider_name_english' => $provider_eng,
                    'insurance_type' => $params['insurance_type'],
                    'policy_number' => $params['policy_number'],
                    'policy_owner' => $params['policy_owner'],
                    'line' => $params['line'],
                    'line_english' => $line_eng,
                    'insured_date_st' => $params['insured_date_st'] . ' 00:00:00',
                    'insured_date_ed' => $params['insured_date_ed'] . ' 00:00:00',
                    'division' => $params['division'],
                    'division_english' => $division_eng,
                    'deposit_amount' => $deposit_amount,
                    'option_flag' => $params['option_flag'],
                    'option_name' => $params['option_name'],
                    'option_amount' => $option_amount,
                    'update_date' => date('Y-m-d H:i:s')
            );
            $ret = update_sqlserver($table, $update, $where2, $this->url, $this->pass);

            $req = $this->getRequest();
            $actionName = $req->getActionName();
            action_log($actionName, '保険契約情報を変更しました。', null);
        } else {
            // get branch no
            $select = "MAX([branch_no]) as max_number";
            $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');

            $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);
            if ($list[0][0] === 'null') {
                $branch_no = 1;
            } else {
                $branch_no = $list[0][0] + 1 ;
            }

            $insert = array('client_no' => $crmid['crmid'],
                    'study_abroad_no' => $_SESSION['abroad'],
                    'branch_no' =>$branch_no,
                    'provider_name' => $params['provider_name'],
                    'provider_name_english' => $provider_eng,
                    'insurance_type' => $params['insurance_type'],
                    'policy_number' => $params['policy_number'],
                    'policy_owner' => $params['policy_owner'],
                    'line' => $params['line'],
                    'line_english' => $line_eng,
                    'insured_date_st' => $params['insured_date_st'] . ' 00:00:00',
                    'insured_date_ed' => $params['insured_date_ed'] . ' 00:00:00',
                    'division' => $params['division'],
                    'division_english' => $division_eng,
                    'deposit_amount' => $deposit_amount,
                    'option_flag' => $params['option_flag'],
                    'option_name' => $params['option_name'],
                    'option_amount' => $option_amount,
                    'delete_flag' => 0,
                    'insert_date' => date('Y-m-d H:i:s'),
                    'update_date' => date('Y-m-d H:i:s')
            );
            $ret = insert_sqlserver($table, $insert, $this->url, $this->pass);

            $req = $this->getRequest();
            $actionName = $req->getActionName();
            action_log($actionName, '保険契約情報を登録しました。', null);
        }
        $clienttable = 'clientstatus';
        $column = 'insurance';
        $param = 1;
        $this->model->setStatus($clienttable, $_SESSION['abroad'], $column, $param);
        $this->writeEmail('保険契約情報の入力');
    }

    public function createpolicyAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['abroad'] = $_SESSION['abroad'];
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);

        $pass = self::PWD;
        $this->common_insurance($this, $crmid, $pass);
    }

    public function insurancedelconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('insurancedelete');
        $this->view->policy_number = $params['policy_number'];
        $this->view->insured_date_st = $params['insured_date_st'];
        $this->view->insured_date_ed = $params['insured_date_ed'];
        $this->view->branch_no = $params['branch_no'];
    }

    public function deleteinsuranceAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['abroad'] = $_SESSION['abroad'];

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $table = 'T_CLIENT_INSURANCE';
        $update = array('delete_flag' => '1',
                'update_date' => date('Y-m-d H:i:s'));
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['branch_no'] = array('column' => 'branch_no',

                'value' => $params['branch_no'],
                'comp' => '=',
                'andor' => 'AND');

        $ret = update_sqlserver($table, $update, $where, $this->url, $this->pass);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, '保険契約情報を削除しました。', null);
    }

    public function showpolicyAction() {
        $params = $this->getRequest()->getParams();
        $table = 'memlist';
        $_SESSION['abroad'] = $_SESSION['abroad'];
        $branch_no = $params['branch_no'];
        $crmid = $this->model->getCrmid($table, $_SESSION['mem_id']);

        // make pdf for keeping
        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
        $html = file_get_contents($this->base.'/mypage/preparation/makepolicy?crmid='.$crmid['crmid'].'&abroad='.$_SESSION['abroad'].'&branch_no='.$branch_no);
        $mpdf = new mPDF('ja', 'A4');
        $mpdf->WriteHTML($html);
        $mpdf->Output($write_path. '/' . $_SESSION['abroad'] . 'policy.pdf', 'F');

        $is_smp = smpcheck();
        if($is_smp == true) {
            $smp = 1;
        } else {
            $smp = 0;
        }
        $this->view->issmp = $smp;

        if ($is_smp) {
            $filename = $_SESSION['abroad'] . "policy.pdf";
            $imagename = $_SESSION['abroad'] . "policy.jpg";
            $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/pdf';
            $fp=fopen($write_path . '/' . $_SESSION['abroad'] . $filename,"w");
            fwrite($fp, $pdf);
            fclose($fp);

            $im = new imagick();
            $im->setResolution(144,144);
            $im->readimage($write_path. '/'  . $filename);
            $im->setImageFormat('png');
            $im->writeImage($write_path. '/' . $imagename);
            $im->clear();
            $im->destroy();

            $this->view->jpg = 'data:image/png;base64,' . base64_encode(file_get_contents($write_path. '/' . $imagename));
            unlink($write_path.'/'.$_SESSION['abroad'].'policy.jpg');
        } else {
            header('Content-Disposition: attachment; filename="insurance_information.pdf"');
            $this->view->file_type = 'pdf';
            mb_convert_encoding(readfile($write_path . '/' . $_SESSION['abroad'] . 'policy.pdf'), "SJIS", "UTF-8");
        }

        unlink($write_path.'/'.$_SESSION['abroad'].'policy.pdf');
    }

    public function makepolicyAction() {
        $params = $this->getRequest()->getParams();
        $_SESSION['abroad'] = $params['abroad'];
        $branch_no = $params['branch_no'];
        $crmid = $params['crmid'];
        $table = 'T_CLIENT_INSURANCE';
        $select = 'provider_name_english, insurance_type, policy_number, policy_owner, line_english, insured_date_st, insured_date_ed, division_english, deposit_amount, approval_date';
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value'=> $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');

        $where['branch_no'] = array('column' => 'branch_no',
                'value' => $branch_no,
                'comp' => '=',
                'andor' => 'AND');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $table2['base'] = array('table' => 'M_顧客基本情報', 'column' => null);
        $table2['addr_type'] = array('table' => 'M_顧客住所', 'column' => 'お客様番号',
                'ontable' => 'M_顧客基本情報', 'oncolumn' => 'お客様番号');
        $select2 = 'M_顧客基本情報.性別, M_顧客基本情報.生年月日, M_顧客住所.電話番号１';
        $where2['client_no'] = array('column' => 'M_顧客基本情報.お客様番号',
                'value' => $crmid,
                'comp' => '=',
                'andor' => 'null');
        $where2['addr_type'] = array('column' => 'M_顧客住所.住所種類',
                'value' => '留学先',
                'comp' => '=',
                'andor' => 'AND');
        $items2 = joinselect_sqlserver($table2, $select2, $where2, $this->url, $this->pass);
        $this->view->insurance_info = $items[0];
        $this->view->personal_info = $items2[0];
    }

    public function visalistAction() {
        $params = $this->getRequest()->getParams();
        $_SESSION['abroad'] = $_SESSION['abroad'];

        $table = 'T_VISA';
        $select = "branch_no, visa_type, visa_number, passport_number, expected_entrance_date, expected_return_date, arrival_date, visa_expiry_date";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['delete_flag'] = array('column' => 'delete_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'AND'
        );

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->items = $items;
        $this->view->datepicker = 1;
        $this->view->abroad = $_SESSION['abroad'];
    }

    public function changevisaAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['abroad'] = $_SESSION['abroad'];

        $table = 'T_VISA';
        $select = "branch_no, visa_type, visa_number, passport_number,
                    expected_entrance_date, expected_return_date, arrival_date,
                    visa_expiry_date, account_no, taxfilenumber, sin_number, national_number";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');

        $where['branch_no'] = array('column' => 'branch_no',
                'value' => $params['branch_no'],
                'comp' => '=',
                'andor' => 'AND');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $this->view->item = $items[0];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('visa');
    }

    public function editvisaAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['abroad'] = $_SESSION['abroad'];
        $table = 'memlist';
        $crmid = $this->model->getCrmid($table, $_SESSION['mem_id']);

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['visa_type']) || empty($params['visa_number'])
                || empty($params['passport_number']))
        {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        // set english name if provider name selected from form's select.

        switch($params['visa_type']) {
            case 'ワーキングホリデー':
                $visa_eng = 'Working Holiday';
                break;

            case '学生':
                $visa_eng = 'student';
                break;

            case '観光':
                $visa_eng = 'Visitor';
                break;

            case 'Co-op':
                $visa_eng =  'Co-op';
                break;

            default :
                $visa_eng = $params['visa_type'];
        }

        $date_check = dateCheck($params['expected_entrance_date'], false) . dateCheck($params['expected_return_date'], false)
        . dateCheck($params['arrival_date'], false) . dateCheck($params['visa_expiry_date'], false);
        if($date_check != '') {
            header('Location: '.$this->base.'/mypage/error/index/modalmessage/message/'.$date_check.'/prev/index');
            throw new Exception($date_check);
        }
        if (empty($params['expected_entrance_date']) || $params['expected_entrance_date'] == '') {
            $expected_entrance_date = 'null';
        }else {
            $expected_entrance_date = $params['expected_entrance_date'] . ' 00:00:00';
        }

        if (empty($params['expected_return_date']) || $params['expected_return_date'] == '') {
            $expected_return_date = 'null';
        } else {
            $expected_return_date = $params['expected_return_date'] . ' 00:00:00';
        }

        if (empty($params['arrival_date']) || $params['arrival_date'] == '') {
            $arrival_date = 'null';
        } else {
            $arrival_date = $params['arrival_date'] . ' 00:00:00';
        }

        if (empty($params['visa_expiry_date']) || $params['visa_expiry_date'] == '') {
            $visa_expiry_date = 'null';
        } else {
            $visa_expiry_date = $params['visa_expiry_date'] . ' 00:00:00';
        }

        $table = 'T_VISA';
        if($params['branch_no'] !='') {
            // update target check
            $select = "client_no, study_abroad_no, branch_no";
            $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');
            $where['branch_no'] = array('column' => 'branch_no',
                    'value' => $params['branch_no'],
                    'comp' => '=',
                    'andor' => 'AND');

            $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

            if($crmid['crmid'] != $list[0]['client_no'] || $_SESSION['abroad'] != $list[0]['study_abroad_no'] || $params['branch_no'] != $list[0]['branch_no']) {
                $message_update = '契約情報が一致しません。';
                header('Location: '.$this->base.'/mypage/error/index/modalmessage?message='.$message_update.'&prev=achievement/insurancelist');
                throw new Exception($message_update);
            }

            $where2['study_abroad_no'] = array('column' => 'study_abroad_no',
                    'value' => $list[0]['study_abroad_no'],
                    'comp' => '=',
                    'andor' => 'null');
            $where2['branch_no'] = array('column' => 'branch_no',
                    'value' => $list[0]['branch_no'],
                    'comp' => '=',
                    'andor' => 'AND');

            $update = array('visa_type' => $params['visa_type'],
                    'visa_type_english' => $visa_eng,
                    'visa_number' => $params['visa_number'],
                    'passport_number' => $params['passport_number'],
                    'expected_entrance_date' => $expected_entrance_date,
                    'expected_return_date' => $expected_return_date,
                    'arrival_date' => $arrival_date,
                    'visa_expiry_date' => $visa_expiry_date,
                    'account_no' => $params['account_no'],
                    'taxfilenumber' => $params['taxfilenumber'],
                    'sin_number' => $params['sin_number'],
                    'national_number' => $params['national_number'],
                    'update_date' => date('Y-m-d H:i:s')
            );
            $ret = update_sqlserver($table, $update, $where2, $this->url, $this->pass);

            $req = $this->getRequest();
            $actionName = $req->getActionName();
            action_log($actionName, 'ビザ情報を変更しました。', null);
        } else {
            // get branch no
            $select = "MAX([branch_no]) as max_number";
            $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');

            $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);
            if ($list[0][0] === 'null') {
                $branch_no = 1;
            } else {
                $branch_no = $list[0][0] + 1 ;
            }
            $insert = array('client_no' => $crmid['crmid'],
                    'study_abroad_no' => $_SESSION['abroad'],
                    'branch_no' =>$branch_no,
                    'visa_type' => $params['visa_type'],
                    'visa_type_english' => $visa_eng,
                    'visa_number' => $params['visa_number'],
                    'passport_number' => $params['passport_number'],
                    'expected_entrance_date' => $expected_entrance_date,
                    'expected_return_date' => $expected_return_date,
                    'arrival_date' => $arrival_date,
                    'visa_expiry_date' => $visa_expiry_date,
                    'account_no' => $params['account_no'],
                    'taxfilenumber' => $params['taxfilenumber'],
                    'sin_number' => $params['sin_number'],
                    'national_number' => $params['national_number'],
                    'delete_flag' => 0,
                    'insert_date' => date('Y-m-d H:i:s'),
                    'update_date' => date('Y-m-d H:i:s')
            );
            $ret = insert_sqlserver($table, $insert, $this->url, $this->pass);
            $req = $this->getRequest();
            $actionName = $req->getActionName();
            action_log($actionName, 'ビザ情報を登録しました。', null);
        }

        $table2 = 'clientstatus';
        $column = 'visa';
        $param = 1;
        $this->model->setStatus($table2, $_SESSION['abroad'], $column, $param);
        $this->writeEmail('ビザ情報登録');
    }

    public function visadelconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('visadelete');
        $this->view->visa_number = $params['visa_number'];
        $this->view->branch_no = $params['branch_no'];
    }

    public function deletevisaAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['abroad'] = $_SESSION['abroad'];

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $table = 'T_VISA';
        $update = array('delete_flag' => 1,
                'update_date' => date('Y-m-d H:i:s')
        );
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['branch_no'] = array('column' => 'branch_no',
                'value' => $params['branch_no'],
                'comp' => '=',
                'andor' => 'AND');

        $ret = update_sqlserver($table, $update, $where, $this->url, $this->pass);
        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'ビザ情報を削除しました。', null);
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

    public function loaAction() {
        $table = 'T_ATTACH_FILE';
        $select = "file_name";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['file_class'] = array('column' => 'file_class',
                'value' => 23,
                'comp' => '=',
                'andor' => 'AND');
        $where['client_perusal'] = array('column' => 'client_perusal',
                'value' => 1,
                'comp' => '=',
                'andor' => 'AND'
        );

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $file_name = $items[0]['file_name'];
        if(!isset($file_name)) {
            return $this->_forward ( 'nofile', 'index', 'error' );
        }

        $this->model->setStatus('clientstatus', $_SESSION['abroad'], 'loa', 1);
        $is_smp = smpcheck();

        if ($is_smp) {
            // client use smart phone
            $this->view->issmp = 1;
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
        } else {
            $this->view->issmp = 0;
            // file_type = pdf
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
        }
    }

    private function common_insurance($parent, &$crmid, &$url, &$pass) {
        $table = 'T_CLIENT_INSURANCE';
        $select = 'branch_no, insurance_type, policy_number, policy_owner, line, line_english, insured_date_st, insured_date_ed, division, division_english, deposit_amount';
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['delete_flag'] = array('column' => 'delete_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'AND');
        $items = select_sqlserver($table, $select, $where, $url, $pass);
        $parent->view->items = $items;
        $parent->view->abroad = $_SESSION['abroad'];
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