<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class TalkModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getMsg($table, $id) {
        $select = array('mypage_school_contact_id', 'sender_id', 'sender_name', 'receiver_id', 'receiver_name', 'comment', 'updated_on');
        $where = "is_use = 1 and  (sender_id = '" . $id . "' or receiver_id = '" . $id . "')";
        $sort = 'updated_on DESC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function setLoginDate($table, $id) {
        $data = array('school_id' => $id,
                'last_log_on' => date('c')
        );

        $result = $this->bm->update($table, $data);

        return $result;
    }

}