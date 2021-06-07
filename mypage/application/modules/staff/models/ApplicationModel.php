<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class ApplicationModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getStatus($table, $abroad, $column) {
        $select = array($column.'_flag', $column.'_date');
        $where = "study_abroad_no = '$abroad'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function setStatus($table, $abroad, $column, $flag) {
        $data = array(
                'study_abroad_no' => $abroad,
                $column.'_flag' => $flag,
                $column.'_date' => date("Y-m-d"),
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function getConfirm($table, $id) {
        $select = array('enroll_expiration_date',
                        'article_flag',
                        'agreement_flag',
                        'deposit_finish_flag',
                        'deposit_flag',
                        'bill_flag',
                        'receipt_flag',
                        'passport_flag',
                        'application_flag',
                        'homestay_flag',
                        'article_confirm',
                        'agreement_confirm',
                        'deposit_finish_confirm',
                        'deposit_confirm',
                        'bill_confirm',
                        'receipt_confirm',
                        'passport_confirm',
                        'application_confirm',
                        'homestay_confirm'
                );
        $where = array('member_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getComment($table) {
        $select = array('comment_content');
        $where = "content_subject = '一覧'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function getItemStatus($table, $name) {
        $select = array($name.'_flag', $name.'_expiration_date', $name.'_date');
        $where = array('study_abroad_no', $_SESSION['abroad']);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function setEnroll($table, $params){
        $data = array(
                'study_abroad_no' => $_SESSION['abroad'],
                'enroll_expiration_date' => $params['enroll_expiration_date'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function setExpiration($table, $params, $item) {
        $data = array(
                'study_abroad_no' => $_SESSION['abroad'],
                $item.'_expiration_date' => $params['expiration_date'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function setConfirming($table, $item, $status) {
        $data = array(
                'study_abroad_no' => $_SESSION['abroad'],
                $item.'_confirm' => $status,
                $item.'_confirm_date' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function applicationComplete($table, $level) {
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'progress_level' => $level,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function deleteSignature($table) {
        $data = array(
            'member_id' => $_SESSION['mem_id'],
            'agreement_flag' => 0,
            'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function deletePassport($table) {
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'passport_flag' => 0,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }
}