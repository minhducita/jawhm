<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class PreparationModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getConfirm($table, $id) {
        $select = array('loa_flag',
                        'flight_flag',
                        'insurance_flag',
                        'visa_flag',
                        'homestay_flag',
                        'loa_confirm',
                        'flight_confirm',
                        'insurance_confirm',
                        'visa_confirm',
                        'homestay_confirm'
                );
        $where = array('member_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getItemStatus($table, $name) {
        $select = array($name.'_flag', $name.'_expiration_date', $name.'_date');
        $where = array('study_abroad_no', $_SESSION['abroad']);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function setExpiration($table, $params, $item) {
        $data = array(
                'study_abroad_no' => $_SESSION['abroad'],
                $item.'_expiration_date' => $params['expiration_date'],
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function setConfirming($table, $item, $status) {
        $data = array(
                'study_abroad_no' => $_SESSION['abroad'],
                $item.'_confirm' => $status,
                $item.'_confirm_date' => date('c'),
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }

    public function applicationComplete($table, $level) {
        $data = array(
                'member_id' => $_SESSION['mem_id'],
                'progress_level' => $level,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);
        return $result;
    }
}