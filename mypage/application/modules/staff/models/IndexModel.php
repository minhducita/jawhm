<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class IndexModel {
	private $table;
	private $bm;

	public function __construct() {
		$this->bm = new BaseModel();
	}

	public function index($table) {
		$select = array('id', 'namae', 'userid');
		$sort = 'id ASC';
		$result = $this->bm->getList($table, $select, $sort);

		return $result;
	}
/*
	public function LoginAuthentication($userid, $password) {
		$adapter = dbadapter ();
		$params = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $params );
		$authAdapter = new Zend_Auth_Adapter_DbTable ( $db );
		
		$authAdapter->setTableName('userlist')->setIdentityColumn ('userid')->setCredentialColumn ('userpwd')->setCredentialTreatment ('MD5(?) AND inuse = 1');
		
		$authAdapter->setIdentity($userid);
		$authAdapter->setCredential($password);
		
		// return result of login for controller
		$result = $authAdapter->authenticate ($authAdapter);
		if ($result->isValid ()) {
		
			// is login authentication OK, store session for authenticate information
			$storage = Zend_Auth::getInstance ()->getStorage ();
			$resultRow = $authAdapter->getResultRowObject ( array (
				'id',
				'name',
				'level'
			) );
			$storage->write($resultRow);
			
			// regenerate sessionID
			$ret = session_regenerate_id(true);
			
			$response = true;
		} else {
			$this->Logout(NULL);
			$response = false;
		}
		
		return $response;
	}
	
	public function Logout() {
		$auth = Zend_Auth::getInstance()->clearIdentity();
	}
	*/
	
}