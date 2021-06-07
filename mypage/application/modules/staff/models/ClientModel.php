<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class ClientModel {
    private $table;
    private $bm;

    public function __construct() {
        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];
        $this->bm = new BaseModel();
    }

    public function index($table) {
        $select = array('id', 'namae', 'userid');
        $sort = 'id ASC';
        $result = $this->bm->getList($table, $select, $sort);

        return $result;
    }

    public function clientGet($table, $crmid) {
        $select = array('id', 'namae');
        $where = 'crmid';
        $stmt = $this->bm->getInfo($table, $select, array($where, $crmid), null);
        if ($stmt) {
            $result = $stmt;
        } else {
            $result = null;
        }

        return $result;
    }

    public function activity($table, $limit, $member_id) {
        $select = array('action_content', 'action_datetime');
        $where = "member_id = '$member_id'";
        $sort = 'client_activity_log_id DESC';

        $return = $this->bm->searchLimitList($table, $where, $limit, $select, $sort);
        return $return;
    }

    public function getProgress($table, $id) {
        $db_select = array('progress_level');
        $where = array('member_id', $id);
        $ret = $this->bm->getInfo($table, $db_select, $where, null);

        return $ret;
    }

    public function getPlan($table, $id) {
        $select = array('scheduled_departure_date', 'scheduled_arrival_date', 'scheduled_enroll_date', 'progress_level');
        $where = array('member_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;

    }

    public function getNextStep($table, $id) {
        $select = array('step_name', 'step_exposition_short', 'preparation');
        $where = array('member_id', $id);
        $order = 'next_step_id DESC';
        $result = $this->bm->getFirst($table, $select, $where, $order);

        return $result;
    }

    public function firstLogin($table, $column, $id) {
        $select = array($column);
        $where = array('member_id', $id);

        $result = $this->bm->getInfo($table, $select, $where, null);

        if($result['first_time'] == 1) {
            $update = array(
                    'member_id' => $id,
                    'first_time' => 0,
                    'updated_on' => null
            );
            $after = $this->bm->update($table, $update);
        }

        return $result;
    }

    public function getNextSeminar($table, $crm_id) {
        $today = date('Y-m-d');
        $select = array('event_list.starttime');
        $where = "entrylist.customid = '".$crm_id."'" . " and event_list.hiduke >= '$today'";
        $base_table = array(array($table[0], 'seminarid'), array($table[0], 'customid'));
        $join_table = array(array($table[1], 'id', array('hiduke')));
        $sort = 'event_list.starttime ASC';
        $result = $this->bm->getSearchSortJoin($base_table, $join_table, $select, $where, $sort, null);

        return $result;
    }

    public function getStatus($table, $mem_id) {
        $select = array('study_abroad_no',
                'article_expiration_date', 'article_flag','article_confirm',
                'agreement_expiration_date', 'agreement_flag','agreement_confirm',
                'deposit_finish_confirm', 'deposit_finish_flag', 'deposit_finish_date',
                'deposit_expiration_date', 'deposit_flag', 'deposit_confirm',
                'bill_expiration_date', 'bill_flag', 'bill_confirm',
                'receipt_expiration_date', 'receipt_flag', 'receipt_confirm',
                'passport_expiration_date', 'passport_flag', 'passport_confirm',
                'application_expiration_date', 'application_flag', 'application_confirm',
                'homestay_expiration_date', 'homestay_flag', 'homestay_confirm',
                'flight_expiration_date', 'flight_flag', 'flight_confirm',
                'insurance_expiration_date', 'insurance_flag', 'insurance_confirm',
                'visa_expiration_date', 'visa_flag', 'visa_confirm',
                'visa2_expiration_date', 'visa2_flag', 'visa2_confirm',
                'mobile_expiration_date', 'mobile_flag', 'mobile_confirm',
                'cash_passport_expiration_date', 'cash_passport_flag', 'cash_passport_confirm',
                'loa_expiration_date', 'loa_flag', 'loa_confirm',
                'pickup_expiration_date', 'pickup_flag', 'pickup_confirm',
                'visa_print_expiration_date', 'visa_print_flag', 'visa_print_confirm',
                'bank_expiration_date', 'bank_flag', 'bank_confirm',
                'flightimage_expiration_date', 'flightimage_flag', 'flightimage_confirm',
                'join_seminar', 'counseling',
                'register_visa', 'reserve_flight',
                'join_step1', 'join_step2',
                'go_abroad', 'seminar_beginner',
                'seminar_planning', 'seminar_info',
                'seminar_discussion', 'seminar_school',
                'decide_country', 'decide_period',
                'decide_school', 'decide_accomodation',
                'register_school');
        $where = "member_id = '$mem_id'";
        $sort = 'client_status_id desc';

        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result[0];
    }

    public function setSchedule($table, $params){
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'scheduled_departure_date' => $params['scheduled_departure_date'],
                'scheduled_arrival_date' => $params['scheduled_arrival_date'],
                'scheduled_enroll_date' => $params['scheduled_enroll_date'],
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

    public function getStepID($table) {
        $select = array('next_step_id');
        $where = "member_id = '".$_SESSION['mem_id']."'";
        $ret = $this->bm->searchList($table, $where, $select, null);

        return end($ret);
    }

    public function closeStep($table, $step_id) {
        $update = array(
                'next_step_id' => $step_id,
                'completion_date' => date('c'),
                'updated_on' => null
        );

        $result = $this->bm->update($table, $update);

        return $result;
    }

    public function insertStep($table, $params) {
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'step_name' => $params['step_name'],
                'start_date' => date('c'),
                'step_exposition_short' => $params['step_exposition_short'],
                'preparation' => $params['preparation'],
                'created_on' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->insert($table, $data);

        return true;
    }

    public function checkMember($table, $mem_id) {
        $select = ('client_id');
        $where = array('member_id', $mem_id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }

    public function memberidRegistration($table, $id, $member_id, $client_name) {
        $client = array(
                'client_id' => $id,
                'member_id' => $member_id,
                'client_name' => $client_name,
                'updated_date' => null
        );

        $result = $this->bm->insert($table, $client);
    }


    public function statusRegistration($table, $member_id, $client_id) {
        $select = 'client_status_id';
        $where = 'member_id';
        $client = $this->bm->getInfo($table, $select, array($where, $member_id), null);
        if($client) {
            return true;
        }

        $insert = array(
                'member_id' => $member_id,
                'crm_id' => $client_id,
                'created_on' => null
        );

        $result = $this->bm->insert($table, $insert);

        $select2 = array('next_step_id');
        $where2 = "member_id = '".$member_id."'";
        $ret = $this->bm->searchList('next_step', $where2, $select2, null);
        if (empty($ret)) {
            $data = array(
                    'member_id' => $member_id,
                    'step_name' => '初心者向けセミナーに参加しよう',
                    'step_exposition_short' => 'セミナーにご参加いただく',
                    'created_on' => date('c'),
                    'updated_on' => null
            );
            $result2 = $this->bm->insert('next_step', $data);
        }

        return $result;
    }

    public function getTempSurvey($table, $id) {
        $select = array('client_name', 'pen_name', 'client_job', 'travel_period', 'school_name',
                'oppotunity', 'life', 'negative', 'only', 'effect', 'challenge',
                'advice', 'image_id1', 'image_id2', 'image_id3', 'agreement', 'temp');
        $where = array('member_id', $id);
        $ret = $this->bm->getInfo($table, $select, $where, null);

        return $ret;
    }

    public function createSurvey($survey_table, $id, $params) {
        $url = self::URL;
        $pass = self::PWD;

        $table['base'] = array('table' => 'M_顧客基本情報', 'column' => 'null');
        $table['entry'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'client_no',
                'ontable' => 'M_顧客基本情報', 'oncolumn' => 'お客様番号');
        $table['school'] = array('table' => 'M_学校', 'column' => '学校番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');
        $select = 'DISTINCT M_顧客基本情報.お客様番号,M_顧客基本情報.氏名, M_顧客基本情報.職業, M_学校.日本語名';
        $where['abroad_no'] = array('column' => 'T_ENTRY_DETAILS.study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');

        $items = joinselect_sqlserver($table, $select, $where, $url, $pass);

        if (isset($params['agreement'])) {
            $agreement = $params['agreement'];
        } else {
            $agreement = null;
        }
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'crmid' => $items[0][0],
                'client_name' => $items[0][1],
                'study_abroad_no' => $_SESSION['abroad'],
                'pen_name' => $params['pen_name'],
                'client_job' => $items[0][2],
                'travel_period' => $params['travel_period'],
                'school_name' => $items[0][3],
                'oppotunity' => $params['oppotunity'],
                'life' => $params['life'],
                'negative' => $params['negative'],
                'only' => $params['only'],
                'effect' => $params['effect'],
                'challenge' => $params['challenge'],
                'advice' => $params['advice'],
                'agreement' => $agreement,
                'temp' => 1,
                'created_on' => null,
                'updated_on' => null
        );
        $result = $this->bm->insert($survey_table, $data);

        return true;
    }

    public function updateSurvey($table, $id, $params) {
        if (isset($params['agreement'])) {
            $agreement = $params['agreement'];
        } else {
            $agreement = null;
        }

        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'pen_name' => $params['pen_name'],
                'travel_period' => $params['travel_period'],
                'oppotunity' => $params['oppotunity'],
                'life' => $params['life'],
                'negative' => $params['negative'],
                'only' => $params['only'],
                'effect' => $params['effect'],
                'challenge' => $params['challenge'],
                'advice' => $params['advice'],
                'agreement' => $agreement,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return true;
    }

    public function sendSurvey($table, $id) {
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'temp' => 0,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return true;
    }

    public function setImages($table, $id, $image) {
        $select = array('image_id1', 'image_id2', 'image_id3');
        $where = array('member_id', $id);
        $ret = $this->bm->getInfo($table, $select, $where, null);

        $data = array('member_id' => $id);

        if (empty($ret['image_id1'])) {
            $data += array('image_id1' => $image);
        } else if (empty($ret['image_id2'])) {
            $data += array('image_id2' => $image);
        } else {
            $data += array('image_id3' => $image);
        }

        $data += array('updated_on' => null);
        $result = $this->bm->update($table, $data);

        return true;
    }

    public function getImgNum($table, $id) {
        $select = array('image_id3');
        $where = array('member_id', $id);
        $ret = $this->bm->getInfo($table, $select, $where, null);

        return $ret;
    }

    public function delImg($table, $id, $params) {
        if ($params['ID'] == 1 || $params['ID'] == 2) {
            $select = array('image_id1', 'image_id2','image_id3');
            $where = array('member_id', $id);
            $ret = $this->bm->getInfo($table, $select, $where, null);
        } else {
            return $result;
        }

        if ($params['ID'] == 1) {
            $data = array(
                    'member_id' => $_SESSION['mem_id'],
                    'image_id1' => $ret['image_id2'],
                    'image_id2' => $ret['image_id3'],
                    'image_id3' => null,
                    'updated_on' => null
            );
        } else if ($params['ID'] == 2) {
            $data = array(
                    'member_id' => $_SESSION['mem_id'],
                    'image_id2' => $ret['image_id3'],
                    'image_id3' => null,
                    'updated_on' => null
            );
        } else {
            $data = array(
                    'member_id' => $_SESSION['mem_id'],
                    'image_id3' => null,
                    'updated_on' => null
            );
        }
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function getSurvey($table, $mem_id) {
        $select = array('study_abroad_no', 'temp');
        $where = "member_id = '$mem_id'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

}