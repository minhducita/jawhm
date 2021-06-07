<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class SeminarModel {
	private $table;
	private $bm;
	
	public function __construct() {
		$this->bm = new BaseModel();
	}
	
	public function reserveCheck($table, $member_id) {
		$today = '\'' . date("Y-m-d H:i:s") . '\'';
		$select = array('entrylist.id', 'entrylist.seminarid');
		$where = "memlist.id = '$member_id' and  starttime >= $today"; 
		$base_table = array(array($table[0], 'seminarid'), array($table[0], 'email'));
		$join_table = array(array($table[1], 'id', array('starttime', 'place', 'k_title1')), array($table[2], 'email', 'email'));
		$stmt = $this->bm->getSearchSortJoin($base_table, $join_table, $select, $where, null, null);
		if ($stmt) {
			$result = $stmt;
		} else {
			$result = null;
		}
		
		return $result;
	}
	
	public function detail($table, $id){
		$select = array('k_title1', 'k_desc1');
		$where = array('id', $id);
		$result = $this->bm->getInfo($table, $select, $where, null);
		
		return $result;
	}
	
	public function history($table, $id){
		$select = array('entrylist.id', 'entrylist.seminarid');
		$where = "memlist.id = '$id' and entrylist.stat = 2";	// stat 2: attended the seminar 
		$base_table = array(array($table[0], 'seminarid'), array($table[0], 'email'));
		$join_table = array(array($table[1], 'id', array('starttime', 'place', 'k_title1')), array($table[2], 'email', 'email'));
		$stmt = $this->bm->getSearchSortJoin($base_table, $join_table, $select, $where, null, null);
		if ($stmt) {
			$result = $stmt;
		} else {
			$result = null;
		}
		
		return $result;
	}
	
	public function online($table) {
		$sdate = '\'' . date("Y-m-d") . ' 00:00:00' . '\'';
		$edate = '\'' . date("Y-m-d") . ' 23:59:59' . '\'';
		$select = array('id', 'starttime', 'place', 'seminar_name', 'k_title1');
		$where = 'broadcasting = 1 and starttime >= ' . $sdate . ' and endtime <= ' . $edate;
		$sort = 'starttime ASC';
		$result = $this->bm->searchList($table, $where, $select, $sort);
		
		return $result;
	}
}