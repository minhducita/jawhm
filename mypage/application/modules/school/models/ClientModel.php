<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class ClientModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getRange(&$table, $id) {
        $select = array('school_no');
        $where = "is_use = 1 and school_id = '" . $id . "'";
        $sort = 'school_no ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getContact(&$table, &$id, &$module) {
        $select = array('mypage_client_memo_id', 'mem_id', 'writer_from', 'memo');
        $where = "crm_id = '$id' and module = '$module' and delete_flag = 0";
        $sort = 'mypage_client_memo_id DESC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getMemo($table, $id) {
        $select = array('mypage_client_memo_id', 'memo');
        $where = array('mypage_client_memo_id', $id);

        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function insertMemo($table, $content, $mem_id) {
        $data = array(
                    'mem_id' => $mem_id,
                    'crm_id' => $_SESSION['crm_id'],
                    'school_id' => $_SESSION['school_id'],
                    'module' => 'client',
                    'writer_from' => 'school',
                    'memo' =>  $content['memo'],
                    'created_on' => null,
                    'updated_on' => null
            );

        $result = $this->bm->insert($table, $data);

        return $result;
    }

    public function updateMemo($table, $content) {
        $data = array(
                'mypage_client_memo_id' => $_SESSION['mypage_client_memo_id'],
                'memo' => $content['memo'],
                'updated_on' => null
        );

        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function deleteMemo($table, $id) {
        $data = array(
                'mypage_client_memo_id' => $id,
                'delete_flag' => 1,
                'updated_on' => null
        );

        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function getChargeName ($table, $id) {
        $select = array('charge_name');
        $where = array('school_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getMemID($table, $id) {
        $select = array('id');
        $where = array('crmid', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getClientInfo($table, $id) {
        $select = array('namae', 'crmid');
        $where = array('crmid', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getCurrentID($table, $column) {
        $result = $this->bm->getMaxID($table, $column);

        return $result;
    }

    public function getClassName(&$table, &$screen_id, &$language) {
        $select = array('message_screen_id', 'message', 'file_class');
        $where = "mypage_screen_id = $screen_id and language = '$language'";
        $sort = 'message_screen_id asc';
        $result = $this->bm->searchList($table, $where, $select, $sort);

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
}