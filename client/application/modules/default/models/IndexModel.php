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

	public function clientGet($table, $user_info, $login_id) {
		$select = array('member_id', 'client_name');
		$where = 'login_id';
		$stmt = $this->bm->getInfo($table, $select, array($where, $login_id), null);
		if ($stmt) {
			$result = $stmt;
		} else {
			$result = null;
		}

		return $result;
	}

	public function clientInsert($table, $user_info, $login_type){
		$data = array (
				'login_type' => $login_type,
				'created_date' => null
		);

		$data += $this->setData($user_info, $login_type, $data);
		$result = $this->bm->insert($table, $data);
	}

	public function clientUpdate($table, $user_info, $login_type){
		$init_data = array();
		$data = $this->setData($user_info, $login_type, $init_data);
		$result = $this->bm->update($table, $data);
	}

	public function getid($table) {
		$primal = 'client_id';
		$result = $this->bm->getMaxID($table, $primal);

		return $result;
	}

	public function emailCheck($table, $email) {
		$select = array('id', 'email', 'namae');
		$stmt = $this->bm->getInfo($table, $select, array('email', $email), null);
		if ($stmt) {
			$result = 1;
		} else {
			$result = 0;
		}

		return $stmt;
	}

	private function setData($user_info, $login_type, $data) {
		switch ($login_type) {
			case 'facebook':
				if($user_info['verified']) {
					$verified = 1;
				} else {
					$verified = 0;
				}

				$data += array(
						'login_id' => $user_info['id'],
						'verified_email' => $verified,
						'first_name' => $user_info['first_name'],
						'last_name' => $user_info['last_name'],
						'full_name' => $user_info['name'],
						'gender' => $user_info['gender'],
						'url' => $user_info['link'],
						'locale' => $user_info['locale'],
						'timezone' => $user_info['timezone'],
						'updated_time' => $user_info['updated_time']
				);
				break;

			case 'google':
				if($user_info['verified_email']) {
					$verified = 1;
				} else {
					$verified = 0;
				}

				$data += array(
						'login_id' => $user_info['id'],
						'email' => $user_info['email'],
						'verified_email' => $verified,
						'first_name' => $user_info['given_name'],
						'last_name' => $user_info['family_name'],
						'full_name' => $user_info['name'],
						'url' => $user_info['picture'],
						'locale' => $user_info['locale']
				);

				break;
			case twitter:
				$data += array(
				'login_id' => $user_info['user_id'],
				'full_name' => $user_info['screen_name']
				);
				break;
			default:
				$data = null;
		}

		return $data;
	}

	public function memberidRegistration($table, $id, $member_id, $client_name) {
		$adapter = dbadapter ();
		$param = dbconnect ();
		$db = Zend_Db::factory ( $adapter, $param );
		$db->beginTransaction();

		try {
			$client = array(
					'client_id' => $id,
					'member_id' => $member_id,
					'client_name' => $client_name,
					'updated_date' => null
			);
			 
			$result1 = $this->bm->update('clientlist', $client);

			$mail_address = $this->bm->getInfo('memlist', array('email'), array('id', $member_id), null);
			$is_registed = DuplicateCheck('emaillist', 'email', $mail_address['email']);
			
			if($is_registed) {
				$email = array(
						'member_id' => $member_id,
						'email' => $mail_address['email'],
						'key_flag' => 1,
						'use_flag' => 1,
						'created_date' => null
				);
				$result2 = $this->bm->insert('emaillist', $email);
			}

			$db->commit();
			 
		} catch (Exception $e) {
			$db->rollBack();
			echo $e->getMessage();
		}

		return $result1;
	}

}