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
        $base_table = array(array($table[0], 'seminarid'), array($table[0], 'customid'));
        $join_table = array(array($table[1], 'id', array('starttime', 'place', 'k_title1')), array($table[2], 'crmid', 'crmid'));
        $sort = $table[1].'.starttime';
        $stmt = $this->bm->getSearchSortJoin($base_table, $join_table, $select, $where, $sort, null);
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
        $where = "memlist.crmid = '$id' and entrylist.stat = 2";	// stat 2: attended the seminar
        $base_table = array(array($table[0], 'seminarid'), array($table[0], 'customid'));
        $join_table = array(array($table[1], 'id', array('starttime', 'place', 'k_title1')), array($table[2], 'crmid', 'crmid'));
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
        $where = 'broadcasting = 1 and starttime >= ' . $sdate . ' and endtime <= ' . $edate . ' and k_use = 1';
        $sort = 'starttime ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getSeminar($table, $id) {
        $select = array('starttime', 'endtime', 'place', 'k_title1', 'k_desc1');
        $where = array('id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getCurrentSeminar($table, $now) {
        switch(substr($_SESSION['crm_id'], 0,2)) {
            case 'KT':
            case 'TR':
            case 'FP':
            case 'ZZ':
                $base = 'tokyo';
                break;

            case 'KO':
            case 'OR':
                $base = 'osaka';
                break;

            case 'KF':
            case 'FK':
                $base = 'fukuoka';
                break;

            case 'KN':
                $base = 'nagoya';
                break;

            case 'KY':
            case 'YA':
                $base = 'toyama';
                break;

            case 'KK':
            case 'OK':
                $base = 'okinawa';
                break;

            default:
                $base = 'tokyo';
                break;
        }

        $select = array('id', 'k_title1', 'k_desc2');
        $where = "place = '$base' and starttime <= '$now' and endtime >= '$now'";

        $result = $this->bm->searchList($table, $where, $select, null);

        return $result[0];
    }

    public function insertJoinSeminar($table, $seminar) {
        $id = $this->bm->getMaxID($table, 'id');
        $set_id = intval($id) + 1;
        $mem_select = array('email', 'namae', 'furigana', 'tel');
        $mem_where = array('id', $_SESSION['mem_id']);
        $member = $this->bm->getInfo('memlist', $mem_select, $mem_where, null);

        // insert check
        $chk_select = array('id');
        $chk_where = "namae = '".$member['namae']."' and seminarname = '".$seminar['k_title1']."' and furigana = '".$member['furigana']."' and tel = '".$member['tel']."' and email = '".$member['email']."'";
        $chk = $this->bm->searchList($table, $chk_where, $chk_select, null);
        if (!empty($chk)) {
            return true;
        }

        $insert = array('id' => $set_id,
                'seminarid' => $seminar['id'],
                'namae' => $member['namae'],
                'seminarname' => $seminar['k_title1'],
                'furigana' => $member['furigana'],
                'tel' => $member['tel'],
                'email' => $member['email'],
                'customid' => $_SESSION['crm_id'],
                'insdate' => date('c'),
                'upddate' => date('c')
        );

        $result = $this->bm->insert($table, $insert);

        return true;
    }
}