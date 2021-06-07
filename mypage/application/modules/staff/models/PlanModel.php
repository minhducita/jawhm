<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class PlanModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function planComplete($table, $level) {
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'progress_level' => $level,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function getStepSel($table) {
        $select = array('step_name');
        $where = "delete_flag = 0";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function setStepStatus($table, $step_name) {
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                $step_name => 1,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function counselingchk($table) {
        $select = array('decide_country', 'decide_period', 'decide_school', 'decide_accomodation', 'register_school');
        $where = "member_id = '".$_SESSION['mem_id']."'";

        $result = $this->bm->searchList($table, $where, $select, null);

        $is_complete = true;
        foreach($result as $key => $value) {
            if ($value == 0) {
                $is_complete = false;
                return false;
            }
        }

        if ($is_complete) {
            $data = array(
                    'member_id' => $_SESSION['mem_id'],
                     'counseling' => 1,
                    'updated_on' => null
            );
            $result = $this->bm->update($table, $data);
            return $result;
        }
    }

    public function getpastPlan($table, $mem_id) {
        $select = array('next_step_id', 'step_name', 'start_date', 'step_exposition_short', 'step_exposition', 'preparation', 'completion_date', 'looking_back');
        $where = "member_id = '$mem_id' and completion_date is not null";
        $sort = 'next_step_id ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getNextStep($table, $id) {
        $select = array('step_name', 'step_exposition_short', 'preparation');
        $where = array('next_step_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getnextPlan($table, $mem_id) {
        $select = array('next_step_id', 'step_name', 'start_date', 'step_exposition_short', 'step_exposition', 'preparation', 'completion_date', 'looking_back');
        $where = "member_id = '$mem_id' and completion_date is null";
        $sort = 'next_step_id ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function editStep($table, $params) {
        $data = array(
                'next_step_id' => $_SESSION['next_step_id'],
                'step_name' => $params['step_name'],
                'step_exposition_short' => $params['step_exposition_short'],
                'preparation' => $params['preparation'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }
}