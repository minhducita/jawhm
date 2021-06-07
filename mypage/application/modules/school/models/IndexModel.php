<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class School_IndexModel {
    const PWD = '303pittst';
    const URL = 'https://toratoracrm.com/crm/mypage/sqlserver/agent.php';
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getRange(&$table, $id) {
        $select = array('school_no');
        $where = "is_use = 1 and school_id = '" . $id . "'";
        $sort = 'school_no ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function getMsg(&$table, $id, $limit) {
        $select = array('mypage_school_contact_id', 'sender_id', 'sender_name', 'receiver_id', 'receiver_name', 'comment', 'updated_on');
        $where = "is_use = 1 and (sender_id = '" . $id . "' or receiver_id = '" . $id . "')";
        $sort = 'updated_on DESC';
        $result = $this->bm->searchLimitList($table, $where, $limit, $select, $sort);

        return $result;
    }

    public function editContact($table, $id, $comment) {
        $data = array(
                'mypage_school_contact_id' => $id,
                'comment' => $comment,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
    }

    public function insContact($table, $comment){
        $data = array(
                'sender_id' => $_SESSION['school_id'],
                'sender_name' => $_SESSION['school_name'],
                'receiver_id' => 'JAWHM',
                'receiver_name' => '日本ワーキングホリデー協会',
                'comment' => $comment,
                'is_use' => 1,
                'created_on' => null,
                'updated_on' => null
        );
        $result = $this->bm->insert($table, $data);

        return true;
    }

    public function getChargeName ($table, $id) {
        $select = array('charge_name');
        $where = array('school_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function getId($table, $primary) {
        $result = $this->bm->getMaxID($table, $primary);
        return $result;
    }

    public function getSchoolName($table, $school_id) {
        $select = array('school_name');
        $where = "is_use = 1 and school_id = '" . $school_id . "'";
        $sort = null;
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }

    public function seminarIntend($table, $school_name) {
        $is_first = true;
        $where = '';
        foreach($school_name as $array) {
            foreach($array as $key => $value) {
                if ($is_first) {
                    $where = '(';
                    $is_first = false;
                } else {
                    $where .= ' or ';
                }
                $where .= "k_title1 like '%$value%'";
            }
        }

        $today = '\'' . date("Y-m-d H:i:s") . '\'';
        $next_month = '\'' . $next_month = date("Y-m-d H:i:s",strtotime("+1 month")) . '\'';
        $where .= ") and (starttime >= $today and starttime <= $next_month)";
        $select = array('id', 'starttime', 'place', 'k_title1');
        $sort = 'starttime ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

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

        $select = array('count(namae) as number');

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
        $sort = 'seminarid ASC';
        $number = $this->bm->countNumber($table, $select, $where, $group, $sort);

        return $number;
    }

    public function getComment($table, $id) {
        $select = array('mypage_school_contact_id', 'comment');
        $where = array('mypage_school_contact_id', $id);
        $result = $this->bm->getInfo($table, $select, $where, null);

        return $result;
    }

    public function delMsg($table, $params) {
        $data = array(
                'mypage_school_contact_id' => $params['ID'],
                'is_use' => 0,
                'updated_on' => null
        );
        $result = $this->bm->update($table, $data);

        return $result;
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

    public function resetPassword($table, $email) {
        $pwd = getRandomString(12);

        $update = array(
                'email' => $email,
                'password' => md5($pwd),
                'updated_on' => date('Y-m-d H:i:s')
        );
        $result = $this->bm->update($table, $update);

        return $pwd;

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

    public function editPassword($table, $id, $password) {
        $update = array(
                'school_id' => $id,
                'password' => md5($password),
                'updated_on' => date('Y-m-d H:i:s')
        );
        $result = $this->bm->update($table, $update);

        return $result;

    }
}