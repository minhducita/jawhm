<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class AchievementModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getStatus($table, $abroad, $flag) {
        $select = array($flag.'_flag', $flag.'_date');
        $where = "study_abroad_no = '$abroad'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function getCrmid($table, $member_id) {
        $select = array('crmid');
        $where = array('id', $member_id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function setStatus($table, $member_id, $column, $flag) {
        $data = array(
                'member_id' => $member_id,
                $column.'_flag' => $flag,
                $column.'_date' => date("Y-m-d"),
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function getAbroad($table, $member_id, $column) {
        $select = array();
        foreach($column as $list) {
            array_push($select, $list);
        }
        $where = "member_id = '$member_id'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function setAbroad($table, $id, $abroad) {
        $data = array(
                'client_status_id' => $id,
                'study_abroad_no' => $abroad,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function getConfirm($table, $id) {
        $select = array('article_flag',
                        'agreement_flag',
                        'deposit_finish_flag',
                        'deposit_flag',
                        'bill_flag',
                        'receipt_flag',
                        'passport_flag',
                        'application_flag',
                        'homestay_flag',
                        'flight_flag',
                        'insurance_flag',
                        'visa_flag',
                        'visa2_flag',
                        'visa_print_flag',
                        'mobile_flag',
                        'cash_passport_flag',
                        'loa_flag',
                        'pickup_flag',
                        'bank_flag',
                        'mobile_flag',
                        'flightimage_flag',
                        'article_expiration_date',
                        'agreement_expiration_date',
                        'deposit_finish_expiration_date',
                        'deposit_expiration_date',
                        'bill_expiration_date',
                        'receipt_expiration_date',
                        'passport_expiration_date',
                        'application_expiration_date',
                        'homestay_expiration_date',
                        'flight_expiration_date',
                        'insurance_expiration_date',
                        'visa_expiration_date',
                        'visa2_expiration_date',
                        'visa_print_expiration_date',
                        'mobile_expiration_date',
                        'cash_passport_expiration_date',
                        'loa_expiration_date',
                        'pickup_expiration_date',
                        'bank_expiration_date',
                        'flightimage_expiration_date',
                        'article_confirm',
                        'agreement_confirm',
                        'deposit_finish_confirm',
                        'deposit_confirm',
                        'bill_confirm',
                        'receipt_confirm',
                        'passport_confirm',
                        'application_confirm',
                        'homestay_confirm',
                        'flight_confirm',
                        'insurance_confirm',
                        'visa_confirm',
                        'visa2_confirm',
                        'visa_print_confirm',
                        'cash_passport_confirm',
                        'loa_confirm',
                        'pickup_confirm',
                        'bank_confirm',
                        'mobile_confirm',
                        'flightimage_confirm',
                        'article_date',
                        'agreement_date',
                        'deposit_finish_date',
                        'deposit_date',
                        'bill_date',
                        'receipt_date',
                        'passport_date',
                        'application_date',
                        'homestay_date',
                        'flight_date',
                        'insurance_date',
                        'visa_date',
                        'visa2_date',
                        'visa_print_date',
                        'cash_passport_date',
                        'loa_date',
                        'pickup_date',
                        'bank_date',
                        'mobile_date',
                        'flightimage_date',
                        'article_confirm_date',
                        'agreement_confirm_date',
                        'deposit_finish_confirm_date',
                        'deposit_confirm_date',
                        'bill_confirm_date',
                        'receipt_confirm_date',
                        'passport_confirm_date',
                        'application_confirm_date',
                        'homestay_confirm_date',
                        'flight_confirm_date',
                        'insurance_confirm_date',
                        'visa_confirm_date',
                        'visa2_confirm_date',
                        'visa_print_confirm_date',
                        'cash_passport_confirm_date',
                        'loa_confirm_date',
                        'pickup_confirm_date',
                        'bank_confirm_date',
                        'mobile_confirm_date',
                        'flightimage_confirm_date'
                );
        $where = array('member_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getMobile($table, $member_id) {
        $select = array('mobile_flag', 'mobile_date', 'mobile_expiration_date');
        $where = array('member_id', $member_id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getComment($table) {
        $select = array('comment_content');
        $where = "content_subject = '一覧'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }
}