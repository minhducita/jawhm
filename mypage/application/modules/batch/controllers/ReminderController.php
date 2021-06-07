<?php
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/Auth/TwitterOAuth.php');
require_once ('Zend/Json.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Batch_ReminderController extends Zend_Controller_Action {
    public $model;

    /**
     *
     */
    public function init() {
        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];

        if(empty($_SERVER['HTTPS'])) {
            $base = 'http://';
        } else {
            $base = 'https://';
        }
        $base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/ReminderModel.php');
        $this->model = new IndexModel ();
        initPage($this, '/application/modules/', 'staff');
    }

    /**
     * schedule reminder
     */
    public function statusAction() {
        set_time_limit(1800);

        $date = new Zend_Date();
        $target_date = $date->add(2, Zend_Date::WEEK)->toString('Y-MM-dd');
        $weeks2items = $this->model->getStatusExpiration('clientstatus', $target_date);

        $this->sendStatus($this, $target_date, $weeks2items);

        $date2 = new Zend_Date();
        $target_date2 = $date2->add(1, Zend_Date::WEEK)->toString('Y-MM-dd');
        $weeks1items = $this->model->getStatusExpiration('clientstatus', $target_date2);

        $this->sendStatus($this, $target_date2, $weeks1items);

        $date3 = new Zend_Date();
        $target_date3 = $date3->add(1, Zend_Date::DAY)->toString('Y-MM-dd');
        $tomorrowitems = $this->model->getStatusExpiration('clientstatus', $target_date3);

        $this->sendStatus($this, $target_date3, $tomorrowitems);

    }

    /**
     * he or she going to study abroad before 1 month check
     */

    public function predeparturemonthAction() {
        set_time_limit(1800);

        $date = new Zend_Date();
        $target_date = $date->add(1, Zend_Date::MONTH)->toString('Y-MM-dd');
        $items = $this->getTargetDate($target_date);

        foreach($items as $item) {
            $this->writeEntranceEmail($this, $item, 1);
        }

    }

    /**
     * he or she going to study abroad before 2month before
     */

    public function predepartureafewAction() {
        set_time_limit(1800);

        $date = new Zend_Date();
        $target_date = $date->add(2, Zend_Date::MONTH)->toString('Y-MM-dd');
        $items = $this->getTargetDate($target_date);

        foreach($items as $item) {
            $this->writeEntranceEmail($this, $item, 2);
        }

    }

    /**
     * if updated user's history yesterday, send email.
     */
    public function changehistoryAction() {
        set_time_limit(1800);

        $date = new Zend_Date();
        $target_date = $date->sub(1, Zend_Date::DAY)->toString('Y-MM-dd HH:mm:ss');
        $items = $this->model->getHistory(array('memlist', 'next_step'), $target_date);

        foreach($items as $item) {
            $this->writeHisotryEmail($this, $item);
        }
    }

    public function remindloginAction() {
        set_time_limit(1800);

        $periods = $this->model->getPeriod('staff_comment');
        $maxPeriod = 999;
        foreach($periods as $item) {
            if($item['comment_content'] < $maxPeriod) {
                $maxPeriod = $item['comment_content'];
            }
        }

        $date = new Zend_Date();
        $target_date = $date->sub(intval($maxPeriod), Zend_Date::MONTH)->toString('Y-MM-dd');

        $table['base'] = array('table' => 'M_顧客基本情報', 'column' => 'null');
        $table['mail_information'] = array('table' => 'M_顧客メール情報', 'column' => 'お客様番号',
                                            'ontable' => 'M_顧客基本情報', 'oncolumn' => 'お客様番号');

        $select = "DISTINCT M_顧客基本情報.お客様番号, M_顧客基本情報.氏名, M_顧客メール情報.メールアドレス, M_顧客メール情報.出発前連絡, M_顧客基本情報.最終ログイン日時";
        $where[] = array('column' => 'M_顧客基本情報.最終ログイン日時',
                'value' => $target_date,
                'comp' => '<=',
                'andor' => 'null');

        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);
        if (!isset($items[0][0])) {
            return false;
        }

        $tempCrmID = null;
        $sendMail = false;
        $office = getBase($items[0][0]);

        foreach ($periods as $item) {
            if ($item['base'] === $office) {
                $period = $item['comment_content'];
                break;
            }
        }

        $dateSend = new Zend_Date();
        $send_date = $dateSend->sub(intval($period), Zend_Date::MONTH)->toString('Y-MM-dd');

        $i = 0;
        foreach($items as $item) {
            if ($item[0] != $tempCrmID) {
                $tempCrmID = $item[0];

                if ($sendMail === false && $i != 0) {
                    $email = $this->model->getEmail('memlist', $items[$i-1][0], $email['email']);
                }
                $sendMail = false;
            }
            if (substr($item[4], 0,9) <= $send_date) {
                if ($item[3] == 1) {
                    $this->writeLoginEmail($this, $item, $item[2]);
                    $semdMail = true;
                }
            }
            $i++;
        }
    }

    public function emergencycontactAction() {
        set_time_limit(1800);

        $date = new Zend_Date();
        $target_date = $date->add(1, Zend_Date::MONTH)->toString('Y-MM-dd');

        $table['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'null');
        $table['customer_information'] = array('table' => 'M_顧客基本情報', 'column' => 'お客様番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'client_no');
        $table['address_information'] = array('table' => 'M_顧客住所', 'column' => 'お客様番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'client_no');

        $select = "DISTINCT T_ENTRY_DETAILS.client_no, M_顧客基本情報.氏名, M_顧客住所.住所種類";
        $where['entrance_date'] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                'value' => $target_date,
                'comp' => '=',
                'andor' => 'null');

        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);
        if (empty($items)) {
            return false;
        }

        $tempCrmID = null;
        $tempName = null;
        $is_first = true;
        $is_target = true;
        foreach($items as $item) {
            if ($item['client_no'] != $tempCrmID) {
                if ($is_target && $is_first === false) {
                    $this->writeEmergencyEmail($this, array($tempCrmID, $tempName) ,1);
                } else {
                    $is_first = false;
                }
                $is_target = true;
                $tempCrmID = $item['client_no'];
                $tempName = $item[1];
            }

            if ($item[2] === '実家') {
                $is_target = false;
            }
        }

        if ($is_target) {
            $this->writeEmergencyEmail($this, array($tempCrmID, $tempName) ,1);
        }

    }

    private function getTargetDate($target_date) {
        $table['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'null');
        $table['customer_information'] = array('table' => 'M_顧客基本情報', 'column' => 'お客様番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'client_no');

        $select = "DISTINCT T_ENTRY_DETAILS.client_no, M_顧客基本情報.氏名";
        $where['entrance_date'] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                'value' => $target_date,
                'comp' => '=',
                'andor' => 'null');

        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);
        return $items;
    }

    /**
     * send mail for schedule reminder
     */

    private function sendStatus($parents, $target_date, $items) {
        foreach($items as $item) {
            $is_mail = false;
            $expiration_item = array();
            if ($item['article_expiration_date'] == $target_date && $item['article_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '約款';
            }

            IF ($item['agreement_expiration_date'] == $target_date && $item['agreement_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '同意書';
            }

            if ($item['deposit_finish_expiration_date'] == $target_date && $item['deposit_finish_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '見積閲覧';
            }

            if ($item['deposit_expiration_date'] == $target_date && $item['deposit_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '支払日入力';
            }

            if ($item['bill_expiration_date'] == $target_date && $item['bill_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '請求書確認';
            }

            if ($item['receipt_expiration_date'] == $target_date && $item['receipt_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '受領書確認';
            }

            if ($item['passport_expiration_date'] == $target_date && $item['passport_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = 'パスポート提示';
            }

            if ($item['application_expiration_date'] == $target_date && $item['application_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '願書提出';
            }

            if ($item['homestay_expiration_date'] == $target_date && $item['homestay_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = 'ホームステイ詳細';
            }

            if ($item['flight_expiration_date'] == $target_date && $item['flight_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '航空券取得';
            }

            if ($item['insurance_expiration_date'] == $target_date && $item['insurance_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '海外保険加入';
            }

            if ($item['visa_expiration_date'] == $target_date && $item['visa_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = 'ビザ申請';
            }

            if ($item['visa2_expiration_date'] == $target_date && $item['visa2_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = 'ビザ申請2';
            }

            if ($item['mobile_expiration_date'] == $target_date && $item['mobile_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '携帯電話';
            }

            if ($item['cash_passport_expiration_date'] == $target_date && $item['cash_passport_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = 'キャッシュパスポート取得';
            }

            if ($item['loa_expiration_date'] == $target_date && $item['loa_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '入学許可書及び初日の案内催促メール';
            }

            if ($item['pickup_expiration_date'] == $target_date && $item['pickup_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '送迎案内';
            }

            if ($item['visa_print_expiration_date'] == $target_date && $item['visa_print_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = 'ビザのプリントアウト';
            }

            if ($item['bank_expiration_date'] == $target_date && $item['bank_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '銀行口座開設';
            }

            if ($item['flightimage_expiration_date'] == $target_date && $item['flightimage_flag'] == 0) {
                $is_mail = true;
                $expiration_item[] = '航空券画像';
            }

            if ($is_mail) {
                $table = 'M_顧客基本情報';
                $select = "お客様番号, 氏名";
                $where['client_no'] = array('column' => 'お客様番号',
                        'value' => $item['crm_id'],
                        'comp' => '=',
                        'andor' => 'null');

                $info = select_sqlserver($table, $select, $where, $this->url, $this->pass);
                $this->writeEmail($parents, $info[0], $expiration_item);
            }

        }
    }

    private function writeEmail($parent, $info, $expiration) {
        $use_keyemail = false;
        $email_list = getMailList($info[0]);
        // if pre_departure check is  off, use login email address
        if (empty($email_list)) {
            $use_keyemail = true;
            $email = $this->model->getEmail('memlist', $info[0]);
        } else {
            $email = null;
        }

        $office = getBase($info[0]);

        $items = getFromAddress($info[0]);
        foreach($expiration as $item) {
            $body_message = $this->model->getBody('staff_comment', $item.'催促メール', $office);
            $subject = $info[1].'様 '.$item.'のご確認です['.$info[0].']';
            $this->sendEmail($info, $items, $body_message[0], $use_keyemail, $email_list, $email, $subject);
        }
    }

    private function writeEntranceEmail($parent, $item, $month) {
        $use_keyemail = false;
        $email_list = getMailList($item['client_no']);
        // if pre_departure check is  off, use login email address
        if (empty($email_list)) {
            $use_keyemail = true;
            $email = $this->model->getEmail('memlist', $item['client_no']);
        } else {
            $email = null;
        }

        $office = getBase($item['client_no']);
        $items = getFromAddress($item['client_no']);
        $body_message = $this->model->getBody('staff_comment', '出発'.$month.'ヶ月前メール', $office);
        $subject = $item[1].'様 '.'ご出国'.$month.'ヶ月前のご確認です['.$item['client_no'].']';
        $this->sendEmail($item, $items, $body_message[0], $use_keyemail, $email_list, $email, $subject);
    }

    private function writeLoginEmail($parent, $item, $email) {
        $office = getBase($item[0]);
        $body_message = $this->model->getBody('staff_comment', 'ログイン催促メール', $office);

        $table['base'] = array('table' => 'Q_顧客拠点', 'column' => 'null');
        $table['office_base'] = array('table' => 'M_拠点', 'column' => '拠点コード',
                'ontable' => 'Q_顧客拠点', 'oncolumn' => '担当拠点コード');

        $select = "M_拠点.拠点メールアドレス";
        $where['client_no'] = array('column' => 'Q_顧客拠点.お客様番号',
                'value' => $item[0],
                'comp' => '=',
                'andor' => 'null');

        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);
        $subject = $item[1].'様 '.'ログイン状況の確認です。['.$item[0].']';
        $body = $item[1] . $body_message[0]['comment_content'];
        writeEmail($item[1], $items[0][0], $email, $subject, $body);
    }

    private function writeEmergencyEmail($parent, $item, $month) {
        $use_keyemail = false;
        $email_list = getMailList($item[0]);
        // if pre_departure check is  off, use login email address
        if (empty($email_list)) {
            $use_keyemail = true;
            $email = $this->model->getEmail('memlist', $item[0]);
        } else {
            $email = null;
        }

        $office = getBase($item[0]);
        $items = getFromAddress($item[0]);
        $body_message = $this->model->getBody('staff_comment', '緊急連絡先登録催促メール', $office);
        $subject = $item[1].'様 '.'緊急連絡先の確認です['.$item[0].']';
        $this->sendEmail($item, $items, $body_message[0], $use_keyemail, $email_list, $email, $subject);
    }

    private function writeHisotryEmail($parent, $info) {
        $use_keyemail = false;
        $email_list = getMailList($info['crmid']);
        // if pre_departure check is  off, use login email address
        if (empty($email_list)) {
            $use_keyemail = true;
            $email = $this->model->getEmail('memlist', $info['crmid']);
        } else {
            $email = null;
        }

        $office = getBase($info['crmid']);

        $items = getFromAddress($info['crmid']);
        $body_message = $this->model->getBody('staff_comment', '履歴変更メール', $office);
        $body = array('comment_content' => $body_message[0]['comment_content'].chr(10).chr(10).$info['step_name']);
        $subject = $info['namae'].'様履歴更新の連絡です['.$info['crmid'].']';
        $this->sendEmail(array($info['crmid'], $info['namae']), $items, $body, $use_keyemail, $email_list, $email, $subject);
    }

    // little bit diffent
    private function sendEmail($item, $items, $body_message, $use_keyemail, $email_list, $email, $subject) {
        $body = $item[1] . $body_message['comment_content'];

        if ($use_keyemail) {
            writeEmail($item[1], $items[0][0], $email['email'], $subject, $body);
        } else {
            $tmpName = null;
            foreach ($email_list as $email) {
                writeEmail($item[1], $items[0][0], $email[0], $subject, $body);
            }
        }
    }
}
?>
