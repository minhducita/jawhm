<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class PreparationModel {
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
        $select = array('homestay_flag',
                        'flight_flag',
                        'insurance_flag',
                        'visa_flag',
                        'loa_flag',
                        'homestay_confirm',
                        'flight_confirm',
                        'insurance_confirm',
                        'visa_confirm',
                        'loa_confirm'
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

    public function keyword($table, $keyword) {
        $select = array('english_name');
        $where = "(english_name like '" . $keyword . "%' and is_use = 1)
                or (japanese_name like '" . $keyword . "%' and is_use = 1)
                or (hiragana like '" . $keyword . "%' and is_use = 1)";

        $stmt = $this->bm->searchList($table, $where, $select, null);

        return $stmt;
    }

}