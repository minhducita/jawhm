<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class SchoolModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getMessages($table) {
        $select = array('mypage_client_memo_id', 'school_id', 'module', 'writer_from', 'memo', 'updated_on');
        $where = "mypage_client_memo.crm_id = '" . $_SESSION['crm_id'] . "' and delete_flag = 0";
        $sort = 'updated_on DESC';
        $result = $this->bm->SearchList($table, $where, $select, $sort);

        return $result;
    }

    public function getComment($table, $id) {
        $select = array('memo');
        $where = array('mypage_client_memo_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function updateComment($table, $params) {
        $data = array(
                'mypage_client_memo_id' => $_SESSION['mypage_client_memo_id'],
                'memo' => $params['memo'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function insertComment($table, $params) {
        $data = array(
                'mem_id' => $_SESSION['mem_id'],
                'crm_id' => $_SESSION['crm_id'],
                'module' => $params['modules'],
                'writer_from' => 'staff',
                'memo' => $params['memo'],
                'delete_flag' => 0,
                'created_on' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->insert($table, $data);

        return $result;
    }

    public function getTalklist($table) {
        $date = new DateTime();
        $lastmonth = $date->modify('-3 months')->format('Y-m-d H:i:s');

        $select = array('sender_id', 'sender_name', 'receiver_id', 'receiver_name', 'comment', 'updated_on');
        $where = "is_use = 1 and updated_on >= '$lastmonth'";
        $sort = 'updated_on DESC';

        $result = $this->bm->SearchList($table, $where, $select, $sort);
        return $result;
    }

    public function getSearchProposal($table, $where, $sortkey) {
        $select = array('mypage_seminar_proposal_id', 'decision_flag', 'school_id', 'expected_seminar_datetime',
                        'expected_require_time', 'speaker_name', 'school_comment', 'staff_comment', 'created_on', 'updated_on');
        $result = $this->bm->SearchList($table, $where, $select, $sortkey);

        return $result;
    }

    public function getSchoolIDs($table) {
        $select = array('school_id');
        $sort = 'school_id ASC';
        $result = $this->bm->getList($table, $select, $sort);

        return $result;
    }

    public function getProposal($table, $id) {
        $select = array('school_id', 'decision_flag', 'expected_seminar_datetime', 'expected_require_time',
                        'speaker_name', 'staff_comment');
        $where = array('mypage_seminar_proposal_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function editProposal($table, $params) {
        $data = array(
                'mypage_seminar_proposal_id' => $_SESSION['mypage_seminar_proposal_id'],
                'school_id' => $params['school_id'],
                'decision_flag' => $params['decision_flag'],
                'expected_seminar_datetime' => $params['expected_seminar_datetime'],
                'expected_require_time' => $params['expected_require_time'],
                'speaker_name' => $params['speaker_name'],
                'staff_comment' => $params['staff_comment'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function insProposal($table, $params){
        $data = array(
                'school_id' => $params['school_id'],
                'decision_flag' => $params['decision_flag'],
                'expected_seminar_datetime' => $params['expected_seminar_datetime'],
                'expected_require_time' => $params['expected_require_time'],
                'speaker_name' => $params['speaker_name'],
                'staff_comment' => $params['staff_comment'],
                'created_on' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->insert($table, $data);

        return true;
    }

    public function getId($table, $primary) {
        $result = $this->bm->getMaxID($table, $primary);
        return $result;
    }

    public function getSchoolInfo ($table, $id) {
        $select = array('charge_name', 'email');
        $where = array('school_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

}