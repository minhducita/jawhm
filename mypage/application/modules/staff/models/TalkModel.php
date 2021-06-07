<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class TalkModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getUnanswered($table) {
        $select = array('talklist.talk_id', 'talklist.base_code', 'talklist.ans_flag', 'talklist.talk_content', 'talklist.commented_date');
        $where = "talklist.ans_flag = 0";
        $sort = 'talklist.commented_date DESC';
        $base_table = array(array('talklist', 'member_id'));
        $join_table = array(array('memlist', 'id', 'memlist.namae'));
        $result = $this->bm->getSearchSortJoin($base_table, $join_table, $select, $where, $sort, null);

        return $result;
    }

    public function editMsg($table, $params, $ans_content) {
        $data = array(
                'talk_id' => str_replace('mail', '', $params['talk_id']),
                'ans_flag' => 1,
                'ans_content' => $ans_content,
                'answerd_date' => null,
                'update_date' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function getID($table, $crmid) {
        $select = array('id');
        $where = array('crmid', $crmid);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function editContact($table, $id, $ans_content) {
        $select = array('contact_school');
        $where = array('id', $id);
        $contact = $this->bm->getInfo($table, $select, $where, null);

        $contact_school = $contact['contact_school'] . PHP_EOL . $ans_content;
        $data = array(
                'id' => $id['id'],
                'contact_school' => $contact_school,
                'upddate' => date('c')
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function getOriginalMsg($table, $member_id) {
        $select = array('talk_id', 'ans_flag', 'talk_content', 'commented_date',
                'ans_content', 'answerd_date');
        $where = "member_id = '" . $member_id . "' and deleted_flag = 0";
        $sort = 'commented_date DESC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getMsg($table, $params){
        $select = array('ans_content');
        $where = array('talk_id', str_replace('mail', '', $params['talk_id']));
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getName($table, $crmid){
        $select = array('namae', 'id');
        $where = array('crmid', $crmid);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getEmail($table, $member_id){
        $select = array('email', 'key_flag');
        $where = "member_id = '" .  $member_id . "'";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function insTunagari($table, $comment, $school_id){
        $select = array('charge_name');
        $where = array('school_id', $school_id);
        $name = $this->bm->getInfo($table[0], $select, $where, null);

        $data = array(
                'sender_id' => 'JAWHM',
                'sender_name' => '日本ワーキングホリデー協会',
                'receiver_id' => $school_id,
                'receiver_name' => $name['charge_name'],
                'comment' => $comment,
                'is_use' => 1,
                'created_on' => null,
                'updated_on' => null
        );
        $result = $this->bm->insert($table[1], $data);

        return true;
    }

    public function getSchoolMail($table, $id) {
        $select = array('charge_name', 'email');
        $where = array('school_id', $id);

        $result = $this->bm->getInfo($table, $select, $where, null);
        return $result;
    }

}