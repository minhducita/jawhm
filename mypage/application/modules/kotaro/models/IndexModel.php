<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class Kotaro_IndexModel {
    const PWD = '303pittst';
    const URL = 'https://toratoracrm.com/crm/mypage/sqlserver/agent.php';
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getSurvey($table, $id) {
        $select = array('client_name', 'pen_name', 'client_job', 'travel_period', 'school_name',
                'oppotunity', 'life', 'negative', 'only', 'effect', 'challenge',
                'advice', 'image_id1', 'image_id2', 'image_id3', 'agreement', 'temp');
        $where = array('mypage_survey_id', $id);
        $ret = $this->bm->getInfo($table, $select, $where, null);

        return $ret;
    }

    public function loginSchoolCheck($table, $email) {
        $select = array('mypage_school_memlist_id', 'school_id', 'charge_name');
        $where = "email = '" . $email['email_reset'] . "'";
        $client = $this->bm->searchList($table, $where, $select,  null);

        if (count($client) <= 0) {
            return false;
        }

        foreach($client as $array) {
             if ($array['school_id'] === $email['school_id']) {
                return $array;
            } else {
                $result = false;
            }
        }

        return $result;
    }

    public function loginAuthentication($table, $school_id, $password) {
        // connect DB
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        $authAdapter = new Zend_Auth_Adapter_DbTable ( $db );

        $authAdapter->setTableName ($table)->setIdentityColumn ('school_id')->setCredentialColumn ('password')->setCredentialTreatment ('MD5(?)  AND is_use = 1 ');

        $authAdapter->setIdentity ($school_id);
        $authAdapter->setCredential ($password);

        // return result login authenticate
        $result = $authAdapter->authenticate ($authAdapter);
        if ($result->isValid ()) {
            $response = true;
        } else {
            $response = false;
        }

        return $response;

    }

    public function memberInfo($table, $params) {
        $select = array('school_id', 'school_name', 'school_full_name', 'last_log_on');
        $where = 'school_id';
        $client = $this->bm->getInfo($table, $select, array($where, $params['school_name']), null);

        return $client;
    }

    public function setLoginDate($table, $id) {
        $data = array('school_id' => $id,
                'last_log_on' => date('c')
        );

        $result = $this->bm->update($table, $data);

        return $result;
    }

}