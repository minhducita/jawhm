<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class EditModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getContent($table) {
        $select = array('staff_comment_id', 'comment_id', 'base', 'content_subject', 'content_type', 'content_title',  'comment_content');
        $where = "edit_flag = 1";
        $sort = 'staff_comment_id ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function changecontent($table, $id) {
        $select = array('comment_content');
        $where = array('staff_comment_id', $id);
        $stmt = $this->bm->getInfo($table, $select, $where, null);
        if ($stmt) {
            $result = $stmt;
        } else {
            $result = null;
        }

        return $result;
    }

    public function editComment($table, $params, $staff) {
        $data = array(
                'staff_comment_id' => $params['comment_id'],
                'comment_content' => $params['comment_content'],
                'last_editor' => $staff,
                'updated_on' => null
                );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function getStepChart($table) {
        $select = array('mypage_step_chart_id', 'mypage_step_chart_id', 'step_number', 'step_sub_number', 'major_item', 'minor_item',
                        'item_name',  'description', 'separate_flag', 'subtitle_flag', 'detail_flag', 'flight_flag',
                        'separate_number');
        $where = "delete_flag = 0";
        $sort = 'mypage_step_chart_id ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getChartStatus($table, $id) {
        $select = array('step_number', 'step_sub_number', 'major_item', 'minor_item',
                'item_name',  'description', 'separate_flag', 'subtitle_flag', 'detail_flag', 'flight_flag',
                'separate_number');
        $where = array('mypage_step_chart_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function editChart($table, $params) {
        $data = array(
                'mypage_step_chart_id' => $_SESSION['mypage_step_chart_id'],
                'description' => $params['description'],
                'separate_flag' => $params['separate_flag'],
                'subtitle_flag' => $params['subtitle_flag'],
                'detail_flag' => $params['detail_flag'],
                'flight_flag' => $params['flight_flag'],
                'separate_number' => $params['separate_number'],
                'update_staff' => $_SESSION['staff_cd'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function deleteChart($table) {
        $data = array(
                'mypage_step_chart_id' => $_SESSION['mypage_step_chart_id'],
                'delete_flag' => 1,
                'update_staff' => $_SESSION['staff_cd'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function createChart($table, $params) {
        $select = array('step_number', 'step_sub_number', 'major_item');
        $where = "delete_flag = 0";
        $sort = 'step_number DESC';

        $items = $this->bm->searchList($table, $where, $select, $sort);

        $max_number = $items[0]['step_number'];
        $step_number = null;
        foreach($items as $item) {
            if ($params['major_item'] === $item['major_item']) {
                $step_number = $item['step_number'];
                $step_sub_number = $item['step_sub_number'];
                break;
            }
        }

        if (is_null($step_number)) {
            $step_number = $max_number + 1;
            $step_sub_number = 1;
        }

        $data = array(
                'step_number' => $step_number,
                'step_sub_number' => $step_sub_number,
                'major_item' => $params['major_item'],
                'minor_item' => $params['minor_item'],
                'item_name' => $params['item_name'],
                'description' => $params['description'],
                'separate_flag' => $params['separate_flag'],
                'subtitle_flag' => $params['subtitle_flag'],
                'detail_flag' => $params['detail_flag'],
                'flight_flag' => $params['flight_flag'],
                'separate_number' => $params['separate_number'],
                'update_staff' => $_SESSION['staff_cd'],
                'created_on' => date('c'),
                'updated_on' => null

        );
        $result = $this->bm->insert('mypage_step_chart', $data);

        return true;
    }

    public function getNextStep($table) {
        $select = array('mypage_next_step_id', 'major_step_number', 'step_name', 'description');
        $where = "delete_flag = 0";
        $sort = 'mypage_next_step_id ASC';

        $items = $this->bm->searchList($table, $where, $select, $sort);

        return $items;
    }

    public function getStep($table, $id) {
        $select = array('major_step_number', 'step_name', 'description');
        $where = array('mypage_next_step_id', $id);

        $result = $this->bm->getInfo($table, $select, $where, null);
        return $result;
    }

    public function updateStep($table, $params) {
        $data = array(
                'mypage_next_step_id' => $_SESSION['mypage_next_step_id'],
                'major_step_number' => $params['major_step_number'],
                'step_name' => $params['step_name'],
                'description' => $params['description'],
                'update_staff' => $_SESSION['staff_cd'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function insertStep($table, $params) {
        $data = array(
                'major_step_number' => $params['major_step_number'],
                'step_name' => $params['step_name'],
                'description' => $params['description'],
                'update_staff' => $_SESSION['staff_cd'],
                'created_on' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->insert($table, $data);

        return $result;
    }

    public function deleteStep($table) {
        $data = array(
                'mypage_next_step_id' => $_SESSION['mypage_next_step_id'],
                'delete_flag' => 1,
                'update_staff' => $_SESSION['staff_cd'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function getLang($table, $lang) {
        $select = array('mypage_message_id', 'message_screen_id', 'mypage_screen_name', 'message');
        $where = "language = '$lang'";
        $sort = 'mypage_message_id ASC';

        $items = $this->bm->searchList($table, $where, $select, $sort);

        return $items;
    }

    public function getLangs($table) {
        $select = array('language');
        $result = $this->bm->unique($table, $select);

        return $result;
    }

    public function getScr($table) {
        $select = array('mypage_screen_name');
        $result = $this->bm->unique($table, $select);

        return $result;
    }

    public function searchScr($table, $lang, $screen) {
        $select = array('mypage_message_id', 'message_screen_id', 'mypage_screen_name', 'message');
        $where = "language = '$lang'";
        if (!is_null($screen)) {
            $where .= " and mypage_screen_name like '%$screen%'";
        }

        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ($adapter, $params);
        $sql = new Zend_Db_Select ($db);
        $sql->from($table, $select);
        $sql->where($where);
        $rows = $db->fetchAll($sql);

        return $rows;
    }

    public function getMessage($table, $id) {
        $select = array('mypage_screen_name', 'language', 'message');
        $where = array('mypage_message_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function updateLang($table, $params) {
        $data = array(
                'mypage_message_id' => $_SESSION['mypage_message_id'],
                'message' => $params['message'],
                'update_staff' => $_SESSION['staff_cd'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function getSchool($table) {
        $select = array('mypage_school_memlist_id', 'school_id', 'school_name', 'school_full_name', 'charge_name', 'email');
        $where = "is_use = 1";

        $result = $this->bm->searchList($table, $where, $select, null);
        return $result;
    }

    public function getCharge($table, $id) {
        $select = array('school_id', 'school_name', 'school_full_name', 'charge_name', 'email');
        $where = array('mypage_school_memlist_id', $id);

        $result = $this->bm->getInfo($table, $select, $where, null);
        return $result;
    }

    public function getCharges($table, $id) {
        $select = array('mypage_school_range_id', 'school_no');
        $where = "school_id = '$id'";

        $result = $this->bm->searchList($table, $where, $select, null);
        return $result;
    }

    public function insertCharge($table, $params) {
        $data = array(
                'school_id' => $_SESSION['school_id'],
                'school_no' => $params['school_no'],
                'school_name' => $_SESSION['school_name'],
                'is_use' => 1,
                'created_on' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->insert($table, $data);

        return $result;
    }

    public function updateCharge($table, $params) {
        $data = array(
                'mypage_school_range_id' => $_SESSION['range_id'],
                'school_no' => $params['school_no'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function updateSchool($table, $params) {
        $data = array(
                'mypage_school_memlist_id' => $_SESSION['mypage_school_memlist_id'],
                'school_id' => $params['school_id'],
                'school_name' => $params['school_name'],
                'school_full_name' => $params['school_full_name'],
                'charge_name' => $params['charge_name'],
                'email' => $params['email'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function IDDuplicateCheck ($table, $name, $value) {
        $result = $this->bm->NameDuplicateCheck($table, $name, $value);

        return $result;
    }

    public function insertSchool($table, $params) {
        $data = array(
                'school_id' => $params['school_id'],
                'school_name' => $params['school_name'],
                'school_full_name' => $params['school_full_name'],
                'charge_name' => $params['charge_name'],
                'email' => $params['email'],
                'created_on' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->insert($table, $data);

        return $result;
    }

    public function getMaxID($table, $key) {
        $result = $this->bm->GetMaxID($table, $key);

        return $result;
    }

    public function resetPassword($table, $id) {
        $pwd = getRandomString(12);

        $update = array(
                'mypage_school_memlist_id' => $id,
                'password' => md5($pwd),
                'updated_on' => null
        );
        $result = $this->bm->update($table, $update);

        return $pwd;

    }

    public function deleteSchool($table) {
        $data = array(
                'mypage_school_memlist_id' => $_SESSION['mypage_school_memlist_id'],
                'is_use' => 0,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function getAirport($table) {
        $select = array('take_off_place_id', 'country_name', 'japanese_name', 'hiragana', 'english_name');
        $where = "is_use = 1";

        $items = $this->bm->searchList($table, $where, $select, null);
        return $items;
    }

    public function getAirportInfo($table, $id) {
        $select = array('country_name', 'japanese_name', 'hiragana', 'english_name');
        $where = array('take_off_place_id', $id);

        $items = $this->bm->getInfo($table, $select, $where, null);
        return $items;
    }

    public function updateAirport($table, $params) {
        $data = array(
                'take_off_place_id' => $_SESSION['take_off_place_id'],
                'country_name' => $params['country_name'],
                'japanese_name' => $params['japanese_name'],
                'hiragana' => $params['hiragana'],
                'english_name' => $params['english_name'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function insertAirport($table, $params) {
        $data = array(
                'country_name' => $params['country_name'],
                'japanese_name' => $params['japanese_name'],
                'hiragana' => $params['hiragana'],
                'english_name' => $params['english_name'],
                'is_use' => 1,
                'created_on' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->insert($table, $data);

        return $result;
    }

    public function deleteAirport($table) {
        $data = array(
                'take_off_place_id' => $_SESSION['take_off_place_id'],
                'is_use' => 0,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

}