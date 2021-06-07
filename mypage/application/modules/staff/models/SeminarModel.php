<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class SeminarModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function online($table) {
        $sdate = '\'' . date("Y-m-d") . ' 00:00:00' . '\'';
        $edate = '\'' . date("Y-m-d") . ' 23:59:59' . '\'';
        $select = array('id', 'starttime', 'place', 'seminar_name', 'k_title1');
        $where = 'broadcasting = 1 and starttime >= ' . $sdate . ' and endtime <= ' . $edate . ' and k_use = 1';
        $sort = 'starttime ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

}