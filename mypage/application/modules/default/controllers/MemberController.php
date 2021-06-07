<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class MemberController extends Zend_Controller_Action {
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
            $protcol = 'http://';
        } else {
            $protcol = 'https://';
        }
        $this->base .= $protcol . $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/MemberModel.php');
        $this->model = new MemberModel ();
        initPage($this, '/application/modules/', 'client');
        $withoutList = array('mailauth');
        without_loginchk($this, $withoutList, $base);
    }

    public function indexAction() {
        $this->view->datepicker = 0;
        $this->view->title = '会員情報変更';
    }

    public function changepasswordAction() {
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('password');
    }

    public function editpasswordAction() {
        $params = $this->getRequest ()->getParams ();
        $id = $_SESSION['mem_id'];

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        if(empty($params['password'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if($params['password'] != $params['retype']) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if(strlen($params['password']) < 5) {
            header('Location: '.$this->base.'mypage/error/lengtherror/column/パスワード/length/5');
            throw new Exception($date_check_departure);
        }

        $change_password = $this->model->editPassword('memlist', $id, $params['password']);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, 'ログインパスワードを変更しました。', null);
    }

    public function emailAction() {
        $id = $_SESSION['mem_id'];
        $mysql = $this->model->myMail('emaillist', $id);

        // email address shown from SQLServer
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);

        $table = 'M_顧客メール情報';
        $select = "ID, メールアドレス, メール種類, 出発前連絡, 出発後連絡, 請求連絡";
        $where['client_no'] = array('column' => 'お客様番号',
                'value' => $crmid['crmid'],
                'comp' => '=',
                'andor' => 'null');

        $sqlserver = select_sqlserver($table, $select, $where, $this->url, $this->pass);
        $i = 0;
        $items = array();
        foreach($mysql as $myarray) {
            foreach($sqlserver as $msarray) {
                if ($myarray['email'] === $msarray[1]) {
                    $items[$i] = array(
                                    'email_id' => $myarray['email_id'],
                                    'email' => $myarray['email'],
                                    'key_flag' => $myarray['key_flag'],
                                    'use_flag' => $myarray['use_flag'],
                                    'ID' => $sqlserver[$i][0],
                                    'email_type' => $sqlserver[$i][2],
                                    'pre_departure' => $sqlserver[$i][3],
                                    'post_departure' => $sqlserver[$i][4],
                                    'bill' => $sqlserver[$i][5]
                    );
                    break;
                }
            }

            $i++;
        }

        $tempemail = $this->model->tempMail('emaillist', $id);

        $this->view->list = $items;
        $this->view->temp = $tempemail;
        $this->view->datepicker = 0;
        $this->view->title = 'メールアドレス変更';
    }

    public function changeemailAction() {
        $params = $this->getRequest ()->getParams ();

        if (!array_key_exists('email_id', $params)) {
            $email_addr = null;
        } else {
            // now, email address stored MySQL & SQLServer
            // because it is needed by login, but we'd like to manage email address from SQLServer
            $email_id = $this->model->getEmail('emaillist', $params['email_id']);
            $email_addr = $email['email'];
        }

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('editemail');
        $this->view->email = $email_addr;
    }

    public function deleteemailAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('deleteemail');
        $this->view->email_id = $params['email_id'];
        $this->view->id = $params['id'];
    }

    public function delcmpemailAction() {
        $params = $this->getRequest ()->getParams ();;

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $checkmail = $this->model->getEmail('emaillist', $params['email_id']);
        if ($checkmail['member_id'] != $_SESSION['mem_id']) {
            return $this->_forward ( 'emaildeleteerror', 'index', 'error' );
        }
        $email = $this->model->getEmail('emaillist', $params['email_id']);
        $this->model->delete('emaillist', $params['email_id']);

        $table = 'M_顧客メール情報';
        $where['ID'] = array('column' => 'ID',
                'value' => $params['id'],
                'comp' => '=',
                'andor' => 'null');

        $ret = delete_sqlserver($table, $where, $this->url, $this->pass);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, $email['email'].'メールアドレスを削除しました。', null);
    }

    public function emailconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        if(!isset($params['change_email'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $temp_registry = $this->model->tempRegist('emaillist', $params, $_SESSION['mem_id']);
        if(!$temp_registry) {
            return $this->_forward ( 'error', 'index', 'error' );
        }

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, $params['change_email'].'メールアドレスを仮登録しました。', null);

        $this->writeEmail($params, $this);
        $this->view->title = 'メールアドレス変更登録';
    }

    public function mailauthAction() {
        $params = $this->getRequest ()->getParams ();
        $duplicate_check = $this->model->duplicate('emaillist', $params);

        if ($duplicate_check['use_flag'] == 1) {
            return $this->_forward ( 'alreadyemail', 'index', 'error' );
        }

        $registry = $this->model->emailRegist('emaillist', $params);

        if(!$registry) {
            return $this->_forward ( 'noemail', 'index', 'error' );
        }

        $crmid = $this->model->getMailAuthcrmid(array('emaillist', 'memlist'), $params);
        $_SESSION['mem_id'] = $crmid['crmid'];
        $mail_type = $this->model->gettype('emaillist', $params);

        if($mail_type['email_type'] == 0) {
            $type = 'ＰＣ';
        } else {
            $type = '携帯';
        }

        $table = 'M_顧客メール情報';
        $insert = array('お客様番号' => $crmid['crmid'],
                'メールアドレス' => $params['email'],
                'メール種類' => $type,
                '出発前連絡' => 1,
                '出発後連絡' => 1,
                '請求連絡' => 1
        );
        $ret = insert_sqlserver($table, $insert, $this->url, $this->pass);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, $params['email'].'メールアドレスを本登録しました。', null);
        $this->view->title = 'メールアドレス承認完了';
        unset($_SESSION['mem_id']);

    }

    public function changekeyAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('changekey');
        $this->view->email_id = $params['email_id'];
    }

    public function changeemailstatusAction() {
        $params = $this->getRequest ()->getParams ();
        $id = $params['id'];
        $email_id = $params['email_id'];

        // email address shown from SQLServer
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);

        $table = 'M_顧客メール情報';
        $select = "メール種類, 出発前連絡, 出発後連絡, 請求連絡";
        $where['client_no'] = array('column' => 'ID',
                'value' => $id,
                'comp' => '=',
                'andor' => 'null');

        $sqlserver = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $is_smp = smpcheck();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('editemail');

        $this->view->sqlserver = $sqlserver[0];
        $this->view->email_id = $email_id;
        $this->view->id = $id;
        $this->view->smp = $is_smp;
    }

    public function chkcmpkeyAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }
        $email = $this->model->getEmail('emaillist', $params['email_id']);
        $result = $this->model->keychange('emaillist', $params['email_id'], $_SESSION['mem_id']);
        if(!$result) {
            return $this->_forward ( 'keychangeerror', 'index', 'error' );
        }

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, $email['email'].'をログイン用メールアドレスに変更しました。', null);
    }

    public function chkemailAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $table = 'M_顧客メール情報';
        $where['ID'] = array('column' => 'ID',
                'value' => $params['id'],
                'comp' => '=',
                'andor' => 'null');

        $update = array('メール種類' => $params['email_type'],
                        '出発前連絡' => $params['pre_departure'],
                        '出発後連絡' => $params['post_departure'],
                        '請求連絡' => $params['bill']);
        $ret = update_sqlserver($table, $update, $where, $this->url, $this->pass);

        $select = "メールアドレス";

        $sqlserver = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, $sqlserver[0][0].'のメールアドレスの情報を変更しました。', null);

    }

    public function changetypeAction() {
        $params = $this->getRequest ()->getParams ();
        if ($params['type'] == 1) {
            $type_jpn = 'ＰＣ';
            $type = 0;
        } else {
            $type_jpn = '携帯';
            $type = 1;
        }

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('changetype');
        $this->view->id = $params['id'];
        $this->view->type = $type;
        $this->view->type_jpn = $type_jpn;
    }

    public function chkcmptypeAction() {
        $params = $this->getRequest ()->getParams ();
        $registry = $this->model->emailType('emaillist', $params, $_SESSION['mem_id']);

        if(!$registry) {
            return $this->_forward ( 'noemail', 'index', 'error' );
        }
    }

    public function delemailAction() {
        $params = $this->getRequest ()->getParams ();
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('delemail');
        $this->view->email_id = $params['email_id'];
    }

    public function deleteunconfirmAction() {
        $params = $this->getRequest ()->getParams ();
        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }
        $email = $this->model->getEmail('emaillist', $params['id']);
        $result = $this->model->deleteunconfirm('emaillist', $params['id']);

        $req = $this->getRequest();
        $actionName = $req->getActionName();
        action_log($actionName, $email['email'].'メールアドレスを削除しました。', null);
    }

    public function emailresendAction() {
        $params = $this->getRequest ()->getParams ();
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('editemail');
        $this->view->email_id = $params['id'];
    }

    public function unconfirmcheckAction() {
        $params = $this->getRequest ()->getParams ();

        $result = $this->model->unconfirmcheck('emaillist', $params['id']);
        if(!isset($result['email'])) {
            return $this->_forward ( 'emailresenderror', 'index', 'error' );
        }

        $this->view->email = $result['email'];
        $this->view->token = $params['token'];
    }

    public function resendAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $this->writeEmail($params, $this);

    }

    public function addresslistAction() {
        $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);
        $table = 'M_顧客住所';
        $select = "ID,郵便番号,住所１,住所２,住所３,住所４,住所種類";
        $where['client_no'] = array('column' => 'お客様番号',
                                        'value' => $crmid['crmid'],
                                        'comp' => '=',
                                        'andor' => 'null');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        if(smpcheck()) {
            $smp = 1;
        } else {
            $smp = 0;
        }

        $this->view->list = $items;

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('present');
        $this->view->title = 'お客様住所一覧';
        $this->view->smp = $smp;
    }

    public function changeaddressAction() {
        $params = $this->getRequest ()->getParams ();

        if ($params['id'] != 'null') {
            $table = 'M_顧客住所';
            $select = "ID,電話番号１,郵便番号,住所１,住所２,住所３,住所４,住所種類";
            $where['id'] = array('column' => 'id',
                                    'value' => $params['id'],
                                    'comp' => '=',
                                    'andor' => 'null');

            $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

            $_SESSION['address'] = $items[0]['ID'];
            $this->view->address = $items[0];
        } else {
            $address = array(
                    '0' => null,
                    '1' => null,
                    '2' => null,
                    '3' => null,
                    '4' => null,
                    '5' => null,
                    '6' => null,
                    '7' => null,
            );
            $_SESSION['address'] = null;
            $this->view->address = $address;
        }
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('address');
    }

    public function editaddressAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['zip']) || empty($params['add1']) ||
            empty($params['add2']) || empty($params['add3'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if($params['devision'] == 0) {
            $result = $this->model->addressupdate('memlist', $params, $_SESSION['mem_id']);
        }

        if(!is_null($_SESSION['address'])) {
            // update
            switch($params['devision']) {
                case 0:
                    $type = '現住所';
                    break;

                case 1:
                    $type = '実家';
                    break;

                case 2:
                    $type = '留学先';
                    break;

                default:
                    $type = '現住所';
            }

            $table = 'M_顧客住所';
            $select = "ID,お客様番号,住所種類";
            $where['id'] = array('column' => 'id',
                                    'value' => $_SESSION['address'],
                                    'comp' => '=',
                                    'andor' => 'null');

            $list = select_sqlserver($table, $select, $where, $this->url, $this->pass);

            $where2['id'] = array('column' => 'id',
                                    'value' => $_SESSION['address'],
                                    'comp' => '=',
                                    'andor' => 'null'
                            );

            $update = array('電話番号１' =>$params['tel'],
                            '郵便番号' =>$params['zip'],
                            '住所１' => $params['add1'],
                            '住所２' => $params['add2'],
                            '住所３' => $params['add3'],
                            '住所４' => $params['add4'],
                            '住所種類' => $type
                        );
            $ret = update_sqlserver($table, $update, $where2, $this->url, $this->pass);

            $req = $this->getRequest();
            $actionName = $req->getActionName();
            action_log($actionName, $type.'の情報を変更しました。', null);
        } else {
            // insert
            $crmid = $this->model->getCrmid('memlist', $_SESSION['mem_id']);

            switch($params['devision']) {
                case 0:
                    $type = '現住所';
                    break;

                case 1:
                    $type = '実家';
                    break;

                case 2:
                    $type = '留学先';
                    break;

                default:
                    $type = '現住所';
            }

            $table = 'M_顧客住所';
            $insert = array('お客様番号' => $crmid['crmid'],
                            '電話番号１'  => $params['tel'],
                            '郵便番号' => $params['zip'],
                            '住所１' => $params['add1'],
                            '住所２' => $params['add2'],
                            '住所３' => $params['add3'],
                            '住所４' => $params['add4'],
                            '住所種類' =>$type
                    );

            $ret = insert_sqlserver($table, $insert, $this->url, $this->pass);

            $req = $this->getRequest();
            $actionName = $req->getActionName();
            action_log($actionName, $type.'の情報を登録しました。', null);
            unset($_SESSION['address']);
        }
    }

    private function writeEmail($params, $parent) {
        $client_info = $parent->model->getClient('memlist', $_SESSION['mem_id']);
        $name = $client_info['namae'];
        $email = $params['change_email'];
        $url = $this->base."/mypage/member/mailauth?email=$email";

        $fromMailAddress = 'info@jawhm.or.jp';
        $subject = 'メールアドレス変更確認です';
        $body = '日本ワーキングホリデー協会です。';
        $body .= chr(10);
        $body .= 'メールアドレス変更を承りました。';
        $body .= chr(10);
        $body .= 'メール認証を完了するために、以下のリンクからJAWHMにログインしてください。';
        $body .= chr(10);
        $body .= $url;
        $body .= chr(10);
        $body .= 'メール認証は、上記のリンクにてログインするまで完了しません。';
        $body .= chr(10);
        $body .= 'このメールにお心当たりのない方は、お手数ですが当メールの破棄をお願いします。';

        writeEmail($name, $fromMailAddress, $email, $subject, $body);
    }
}