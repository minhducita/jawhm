<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class FileModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getClassName($table, $screen_id, $language) {
        $select = array('message_screen_id', 'message', 'file_class');
        $where = "mypage_screen_id = $screen_id and language = '$language'";
        $sort = 'message_screen_id asc';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getSchoolMail($table, $school_no) {
        $select = array('charge_name', 'email');
        $module = array(array('mypage_school_memlist', 'school_id'));
        $join_table = array(array('mypage_school_range', 'school_id', 'mypage_school_range_id'));
        $where = "school_no = '$school_no'";
        $sort = "mypage_school_memlist.mypage_school_memlist_id";

        $result = $this->bm->getSearchSortJoin($module, $join_table, $select, $where, $sort, null);
        return $result;
    }
}