<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/signature-to-image.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/mpdf/mpdf.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_ApplicationController extends Zend_Controller_Action {
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
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array();
        $is_client = true;
        without_stafflogin($this, $withoutList, $this->base, $is_client);
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
        $where['crm_id'] = array('column' => 'crm_id',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $table2 = 'M_顧客基本情報';
        $select2 = "次回来店予定";
        $where2['crm_id'] = array('column' => 'お客様番号',
                'value' =>$_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $reserve = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);

        $today = date("Y-m-d h:i:s");
        $table4['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => null);
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
        $where5['crm_id'] = array('column' => 'お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');
        $where5['estimate_no'] = array('column' => '閲覧可否フラグ',
                'value' => 1,
                'comp' => 'ni',
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

        $stat = new MypageConst();
        $client_status = $stat::$CLIENT_STATUS;
        $this->view->status_name = Zend_Json::encode($client_status);
        $this->view->datetimepicker = 1;
        $this->view->list = $list;
        $this->view->reserve = $reserve;
        $this->view->json = 1;
        $this->view->school = $items4[0];
        $this->view->status = $status;
        $this->view->smp = $smp;
        $this->view->bum = 1;
        $this->view->index = 1;
        $this->view->username = $_SESSION['mem_name'];
        $this->view->title = 'お客様手続き一覧';
    }

    public function confirmAction() {
        $params = $this->getRequest ()->getParams ();

        $status_name = $params['item'];
        $status_item = $this->model->getItemStatus('clientstatus', $status_name);

        $_SESSION['confirm'] = $status_name;

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('confirm');

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;

        $this->view->name = $status_name;
        $this->view->status = $status_item;
    }

    public function enrollAction() {
        $params = $this->getRequest ()->getParams ();
        $this->model->setEnroll('clientstatus', $params);
    }

    public function expirationAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $this->model->setExpiration('clientstatus', $params, $_SESSION['confirm']);

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;
        $this->view->name = $_SESSION['confirm'];
        $this->alertMail($_SESSION['confirm'], $params['expiration_date']);
        unset ($_SESSION['confirm']);
    }

    public function confirmedAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $this->model->setConfirming('clientstatus', $_SESSION['confirm'], 1);
        $this->view->name = $_SESSION['confirm'];

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;
        $this->writeEmail($_SESSION['confirm'], '確認済');
        unset ($_SESSION['confirm']);
    }

    public function redoAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $table = 'T_ATTACH_FILE';
        if ($_SESSION['confirm'] === 'agreement') {
            $where[] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');
            $where[] = array('column' => 'file_class',
                    'value' => '91',
                    'comp' => '=',
                    'andor' => 'and');

            delete_sqlserver($table, $where, $this->url, $this->pass);

            $where2[] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');
            $where2[] = array('column' => 'file_class',
                    'value' => '92',
                    'comp' => '=',
                    'andor' => 'and');
            delete_sqlserver($table, $where2, $this->url, $this->pass);

            $this->model->deleteSignature('clientstatus');
        } else if ($_SESSION['confirm'] === 'passport') {
            $select = 'file_name';
            $where3[] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');
            $where3[] = array('column' => 'file_class',
                    'value' => '94',
                    'comp' => '=',
                    'andor' => 'and');
            $passport_data = select_sqlserver($table, $select, $where3, $this->url, $this->pass);
            var_dump($passport_data);
            deleteimage($_SESSION['abroad'], $passport_data[0][0], 94, $this->url, $this->pass);
            $where4[] = array('column' => 'study_abroad_no',
                    'value' => $_SESSION['abroad'],
                    'comp' => '=',
                    'andor' => 'null');
            $where4[] = array('column' => 'file_class',
                    'value' => '94',
                    'comp' => '=',
                    'andor' => 'and');
            delete_sqlserver($table, $where4, $this->url, $this->pass);

            $this->model->deletePassport('clientstatus');
        }
        $this->model->setConfirming('clientstatus', $_SESSION['confirm'], 2);
        $this->view->name = $_SESSION['confirm'];

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;
        $this->writeEmail($_SESSION['confirm'], 'やり直し');
        unset ($_SESSION['confirm']);
    }

    public function backAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $this->model->setConfirming('clientstatus', $_SESSION['confirm'], 0);
        $this->view->name = $_SESSION['confirm'];

        $stat = new MypageConst();
        $status = $stat::$CLIENT_STATUS;
        $this->view->status_name = $status;
        $this->writeEmail($_SESSION['confirm'], '確認待ち');
        unset ($_SESSION['confirm']);
    }

    public function completeAction() {
        $result = $this->model->applicationComplete('clientstatus', 3);
        $this->view->name = $_SESSION['mem_name'];
    }

    private function writeEmail($title, $status) {
        $use_keyemail = false;

        $japanese = $this->getTitle($title);
        if (is_null($japanese)) {
            return false;
        }

        $info = $this->getInfo();

        $email_list = getMailList($info[0][0]);
        // if pre_departure check is  off, use login email address
        if (empty($email_list)) {
            $use_keyemail = true;
            $email = $this->model->getEmail('memlist', $info[0][0]);
        } else {
            $email = null;
        }

        $office = getBase($info[0][0]);

        $items = getFromAddress($info[0][0]);
        $body_message = $info[0][1].'様';
        $body_message .= chr(10);
        $body_message .= $japanese . 'がスタッフにより'.$status.'にされました。';
        $body_message .= chr(10);
        $body_message .= 'マイページよりご確認をお願いします。';
        $body_message .= chr(10);
        $body_message .= 'https://www.jawhm.or.jp/mypage/';
        $subject = $info[0][1].'様'. $japanese . 'が'.$status.'になりました['.$info[0][0].']';

        sendEmail($info, $items, $body_message, $use_keyemail, $email_list, $email, $subject);
    }

    private function alertMail($title, $set_date) {
        $use_keyemail = false;

        $japanese = $this->getTitle($title);
        if (is_null($japanese)) {
            return false;
        }

        $info = $this->getInfo();

        $email_list = getMailList($info[0][0]);
        // if pre_departure check is  off, use login email address
        if (empty($email_list)) {
            $use_keyemail = true;
            $email = $this->model->getEmail('memlist', $info[0][0]);
        } else {
            $email = null;
        }

        $office = getBase($info[0][0]);

        $items = getFromAddress($info[0][0]);
        $body_message = $info[0][1].'様';
        $body_message .= chr(10);
        $body_message .= $japanese . 'がスタッフにより'.$set_date.'にされました。';
        $body_message .= chr(10);
        $body_message .= 'マイページよりご確認をお願いします。';
        $body_message .= chr(10);
        $body_message .= 'https://www.jawhm.or.jp/mypage/';
        $subject = $info[0][1].'様'. $japanese . 'の期限日が'.$set_date.'に設定されました['.$info[0][0].']';

        sendEmail($info, $items, $body_message, $use_keyemail, $email_list, $email, $subject);
    }

    private function getTitle($title) {
        switch($title) {
            case 'article':
                $japanese = '約款';
                break;

            case 'agreement':
                $japanese = '同意書';
                break;

            case 'deposit_finish':
                $japanese = '支払日確認';
                break;

            case 'deposit':
                $japanese = '見積確認';
                break;

            case 'bill':
                $japanese = '請求書';
                break;

            case 'receipt':
                $japanese = '受領書';
                break;

            case 'passport':
                $japanese = 'パスポート';
                break;

            default:
                return null;
        }

        return $japanese;
    }

    private function getInfo() {
        $table = 'M_顧客基本情報';
        $select = "お客様番号, 氏名";
        $where['client_no'] = array('column' => 'お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $info = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        return $info;
    }

}