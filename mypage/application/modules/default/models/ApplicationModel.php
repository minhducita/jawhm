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
        $select = array($column.'_flag', $column.'_date', $column.'_confirm');
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

    public function getApplication($table, $mem_id, $class) {
        $select = array('client_attach_file_id', 'file_name', 'update_date');
        $where = "member_id = '$mem_id' and file_class = $class";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }
}