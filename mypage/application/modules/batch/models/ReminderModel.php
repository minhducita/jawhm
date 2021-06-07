<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class IndexModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getStatusExpiration($table, $target_date) {
        $select = array('crm_id', 'article_expiration_date', 'article_flag', 'agreement_expiration_date', 'agreement_flag',
                        'deposit_finish_expiration_date', 'deposit_finish_flag', 'deposit_expiration_date', 'deposit_flag',
                        'bill_expiration_date', 'bill_flag', 'receipt_expiration_date', 'receipt_flag', 'passport_expiration_date', 'passport_flag',
                        'application_expiration_date', 'application_flag', 'homestay_expiration_date', 'homestay_flag', 'flight_expiration_date', 'flight_flag',
                        'insurance_expiration_date', 'insurance_flag', 'visa_expiration_date', 'visa_flag', 'visa2_expiration_date', 'visa2_flag',
                        'mobile_expiration_date', 'mobile_flag', 'cash_passport_expiration_date', 'cash_passport_flag', 'loa_expiration_date', 'loa_flag',
                        'pickup_expiration_date', 'pickup_flag', 'visa_print_expiration_date', 'visa_print_flag', 'bank_expiration_date', 'bank_flag',
                        'flightimage_expiration_date', 'flightimage_flag');

        $where = "(article_expiration_date = '$target_date' and article_flag = 0) or
                  (agreement_expiration_date = '$target_date' and agreement_flag = 0) or
                  (deposit_finish_expiration_date = '$target_date' and deposit_finish_flag = 0) or
                  (deposit_expiration_date = '$target_date' and deposit_flag = 0) or
                  (bill_expiration_date = '$target_date' and bill_flag = 0) or
                  (receipt_expiration_date = '$target_date' and receipt_flag = 0) or
                  (passport_expiration_date = '$target_date' and passport_flag = 0) or
                  (application_expiration_date = '$target_date' and application_flag = 0) or
                  (homestay_expiration_date = '$target_date' and homestay_flag = 0) or
                  (flight_expiration_date = '$target_date' and flight_flag = 0) or
                  (insurance_expiration_date = '$target_date' and insurance_flag = 0) or
                  (visa_expiration_date = '$target_date' and visa_flag = 0) or
                  (visa2_expiration_date = '$target_date' and visa2_flag = 0) or
                  (mobile_expiration_date = '$target_date' and mobile_flag = 0) or
                  (cash_passport_expiration_date = '$target_date' and cash_passport_flag = 0) or
                  (loa_expiration_date = '$target_date' and loa_flag = 0) or
                  (pickup_expiration_date = '$target_date' and pickup_flag = 0) or
                  (visa_print_expiration_date = '$target_date' and visa_print_flag = 0) or
                  (bank_expiration_date = '$target_date' and bank_flag = 0) or
                  (flightimage_expiration_date = '$target_date' and flightimage_flag = 0)
                  ";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function getPeriod($table) {
        $select = array('base', 'comment_content');
        $where = "content_subject = 'ログイン催促メール間隔'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function getEmail($table, $crmid) {
        $select = array('email');
        $where = array('crmid', $crmid);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getbody($table, $title, $base) {
        $select = array('comment_content');
        $where = "content_title = '$title' and base = '$base'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function getHistory($table, $target_date) {
        $select = array('crmid', 'namae');
        $where = "$table[1].updated_on >= '$target_date'";
        $result = $this->bm->getSearchSortJoin(array(array($table[0], 'id')) , array(array($table[1], 'member_id', 'step_name')), $select, $where, null, null);

        return $result;
    }
}