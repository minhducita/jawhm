<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class PlanModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getpastPlan($table, $mem_id) {
        $select = array('step_name', 'start_date', 'step_exposition_short', 'step_exposition', 'preparation', 'completion_date', 'looking_back');
        $where = "member_id = '$mem_id' and completion_date is not null";
        $sort = 'next_step_id DESC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getnextPlan($table, $mem_id) {
        $select = array('step_name', 'start_date', 'step_exposition_short', 'step_exposition', 'preparation', 'completion_date', 'looking_back');
        $where = "member_id = '$mem_id' and completion_date is null";
        $sort = 'next_step_id ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function checkInquiry($table, $mem_id) {
        $select = array('inquiry_num');
        $where = array('member_id', $mem_id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getInquiry($table, $id) {
        $select = array('mypage_flight_inquiry_id', 'name_jp', 'name_en', 'tel', 'email', 'flight_date','departure_place', 'destination_place',
                        'ticket_request', 'plan_request', 'visa_type', 'age');
        $where = array('mypage_flight_inquiry_id', $id);

        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function insertInquiry($table, $params, $mem_id) {
        $data = array(
                'member_id' => $mem_id,
                'name_jp' => $params['name_jp'],
                'name_en' => $params['name_en'],
                'tel' => $params['tel'],
                'email' => $params['email'],
                'flight_date' => $params['flight_date'],
                'departure_place' => $params['departure_place'],
                'destination_place' => $params['destination_place'],
                'ticket_request' => $params['ticket_request'],
                'plan_request' => $params['plan_request'],
                'visa_type' => $params['visa_type'],
                'age' => $params['age'],
                'created_on' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->insert($table, $data);

        return $result;
    }

    public function updateInquiry($table, $params) {
        $data = array(
                'mypage_flight_inquiry_id' => $params['id'],
                'name_jp' => $params['name_jp'],
                'name_en' => $params['name_en'],
                'tel' => $params['tel'],
                'email' => $params['email'],
                'flight_date' => $params['flight_date'],
                'departure_place' => $params['departure_place'],
                'destination_place' => $params['destination_place'],
                'ticket_request' => $params['ticket_request'],
                'plan_request' => $params['plan_request'],
                'visa_type' => $params['visa_type'],
                'age' => $params['age'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function keyword($table, $keyword) {
        $select = array('japanese_name');
        $where = "(english_name like '" . $keyword . "%' and is_use = 1)
                or (japanese_name like '" . $keyword . "%' and is_use = 1)
                or (hiragana like '" . $keyword . "%' and is_use = 1)";

        $stmt = $this->bm->searchList($table, $where, $select, null);

        return $stmt;
    }

    public function addInquiry($table, $crmid, $column) {
        $select = array($column);
        $where = array('crm_id', $crmid);

        $info = $this->bm->getInfo($table, $select, $where, null);

        $new_num = $info[$column] + 1;

        $data = array (
                'crm_id' => $crmid,
                $column => $new_num
        );

        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function getInquirys($table, $mem_id) {
        $select = array('mypage_flight_inquiry_id', 'name_jp', 'name_en', 'tel', 'email', 'flight_date','departure_place', 'destination_place',
                        'ticket_request', 'plan_request', 'visa_type', 'age', 'updated_on');
        $where = "member_id = '$mem_id' and flight_flag = 1";

        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function getStepCharts($table) {
        $select = array('step_number', 'step_sub_number', 'item_name', 'description', 'separate_flag', 'subtitle_flag', 'detail_flag', 'flight_flag', 'separate_number');
        $where = "delete_flag = 0";
        $sort = 'mypage_step_chart_id ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getStepChart($table, $id) {
        $select = array('step_number', 'step_sub_number', 'item_name', 'description', 'subtitle_flag');
        $where = "step_number = $id and delete_flag = 0";
        $sort = 'mypage_step_chart_id ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getStepStatus($table, $mem_id) {
        $select = array('join_seminar', 'counseling', 'register_visa','reserve_flight',
                        'join_step1', 'join_step2', 'go_abroad','seminar_beginner', 'seminar_planning',
                        'seminar_info', 'seminar_discussion', 'seminar_school', 'decide_country',
                        'decide_period', 'decide_school', 'decide_accomodation', 'register_school',
        );
        $where = array('member_id', $mem_id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getStatus($table, $crm_id, $column) {
        $select = array($column.'_flag', $column.'_date', $column.'_confirm');
        $where = "crm_id = '$crm_id'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

}