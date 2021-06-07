<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/signature-to-image.php');

class SeminarModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getRange(&$table, $id) {
        $select = array('school_name');
        $where = "is_use = 1 and school_id = '" . $id . "'";
        $sort = 'school_no ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getSearchSeminar(&$base_table, &$join_table, &$where, $sortkey, &$command) {
        $select = array('id', 'starttime', 'k_title1');
        $result = $this->bm->getSearchSortJoin($base_table, $join_table, $select, $where, $sortkey, $command);

        return $result;

    }

    public function seminarJoin($table, $seminar) {
        $seminar_id = array();

        foreach($seminar as $array) {
            foreach($array as $key => $value) {
                if ($key === 'id') {
                    $seminar_id[] = $value;
                }
            }
        }
        $select = array('seminarid', 'count(namae) as number');

        $is_first = true;
        $where = '';
        if (count($seminar) > 0) {
            foreach($seminar as $array) {
                foreach($array as $key => $value) {
                    if ($key === 'id') {
                        if ($is_first) {
                            $is_first = false;
                        } else {
                            $where .= ' or ';
                        }
                        $where .= 'seminarid = ' . $value;
                    }
                }
            }
        } else {
            return 0;
        }

        $group = 'seminarid';
        $sort = 'seminarid DESC';
        $number = $this->bm->countNumber($table, $select, $where, $group, $sort);

        return $number;
    }

    public function seminarInfo($table, $id) {
        $select = array('id', 'starttime', 'place', 'k_title1');
        $where = array('id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function seminarMember($table, $id) {
        $select = array('id', 'namae', 'furigana', 'kyomi', 'jiki', 'customid');
        $where = "seminarid = $id";
        $result = $this->bm->searchList($table, $where, $select, null);

        return $result;
    }

    public function getMemos(&$table, &$id, &$module) {
        $select = array('mypage_client_memo_id', 'crm_id', 'writer_from', 'memo');
        $where = "module = '$module' and delete_flag = 0 and crm_id = '$id'";
        $sort = "mypage_client_memo_id DESC";

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
                    'module' => 'seminar',
                    'writer_from' => 'school',
                    'memo' =>  $content['memo_seminar'],
                    'created_on' => null,
                    'updated_on' => null
            );

        $result = $this->bm->insert($table, $data);

        return $result;
    }

    public function updateMemo($table, $content) {
        if (isset($_SESSION['mypage_client_memo_id'])) {
            $data = array(
                    'mypage_client_memo_id' => $_SESSION['mypage_client_memo_id'],
                    'memo' => $content['memo_seminar'],
                    'updated_on' => null
            );

            $result = $this->bm->update($table, $data);

            return $result;
        }
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

    public function getCrmid($table, $id) {
        $select = array('customid');
        $where = array('id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getMemID($table, $id) {
        $select = array('id');
        $where = array('crmid', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getCurrentID($table, $column) {
        $result = $this->bm->getMaxID($table, $column);

        return $result;
    }

    public function getChargeName ($table, $id) {
        $select = array('charge_name');
        $where = array('school_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getClientInfo($table, $id) {
        $select = array('namae', 'crmid');
        $where = array('crmid', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

}