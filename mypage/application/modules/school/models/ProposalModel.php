<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class ProposalModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getProposals($table, $id) {
        $select = array('mypage_seminar_proposal_id', 'decision_flag', 'expected_seminar_datetime', 'expected_require_time', 'speaker_name', 'school_comment', 'staff_comment', 'created_on', 'updated_on');
        $where = "school_id = '" . $_SESSION['school_id'] . "' and (decision_flag = 1 or decision_flag = 2)";
        $sort = 'created_on DESC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getProposal($table, $id) {
        $select = array('decision_flag', 'expected_seminar_datetime', 'expected_require_time', 'speaker_name', 'school_comment', 'staff_comment', 'updated_on');
        $where = array('mypage_seminar_proposal_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function editProposal($table, $params) {
        $data = array(
                'mypage_seminar_proposal_id' => $_SESSION['mypage_seminar_proposal_id'],
                'decision_flag' => 1,
                'expected_seminar_datetime' => $params['expected_seminar_datetime'],
                'expected_require_time' => $params['expected_require_time'],
                'speaker_name' => $params['speaker_name'],
                'school_comment' => $params['school_comment'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function insProposal($table, $params){
        $data = array(
                'school_id' => $_SESSION['school_id'],
                'decision_flag' => 1,
                'expected_seminar_datetime' => $params['expected_seminar_datetime'],
                'expected_require_time' => $params['expected_require_time'],
                'speaker_name' => $params['speaker_name'],
                'school_comment' => $params['school_comment'],
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