<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class TalkModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getMsg($table, $member_id) {
        $select = array('talk_id', 'ans_flag', 'talk_content', 'commented_date',
                        'ans_content', 'answerd_date');
        $where = "member_id = '" . $member_id . "' and deleted_flag = 0";
        $sort = 'commented_date DESC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getCrmid($table, $member_id) {
        $select = array('crmid');
        $where = array('id', $member_id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getName($table, $member_id){
        $select = array('client_name');
        $where = array('member_id', $member_id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getContent($table, $id){
        $select = array('talk_id', 'talk_content');
        $where = array('talk_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function editMsg($table, $params, $base) {
        $data = array(
                'talk_id' => $_SESSION['talk_id'],
                'base_code' => $base,
                'talk_content' => $params['talk_content'],
                'commented_date' => null,
                'update_date' => null
                );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function insMsg($table, $params, $base){
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'base_code' => $base,
                'ans_flag' => 0,
                'talk_content' => $params['talk_content'],
                'commented_date' => null,
                'deleted_flag' => 0,
                'created_date' => null,
                'update_date' => null
        );
        $result = $this->bm->insert($table, $data);

        return true;
    }

    public function delMsg($table, $params) {
        $data = array(
                'talk_id' => $params['ID'],
                'deleted_flag' => 1,
                'update_date' => null
                );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function getId($table, $primary) {
        $result = $this->bm->getMaxID($table, $primary);
        return $result;
    }
}