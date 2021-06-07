<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class MemberModel {
	private $table;
	private $bm;

	public function __construct() {
		$this->bm = new BaseModel();
	}

	public function myMail($table, $member_id) {
		$select = array('email_id', 'email', 'key_flag', 'use_flag');
		$where = "member_id = '$member_id' and use_flag = 1";
		$result = $this->bm->searchList($table, $where, $select, null);

		return $result;
	}

	public function getEmail($table, $id){
		$select = array('member_id', 'email');
		$where = array('email_id', $id);
		$result = $this->bm->getInfo($table, $select, $where, null);

		return $result;
	}

	public function tempRegist($table, $data, $member_id){
		$is_registed = DuplicateCheck('emaillist', 'email', $data['change_email']);
		if(!$is_registed) {
			return false;
		}

		$email = array(
				'member_id' => $member_id,
				'email' => $data['change_email'],
				'key_flag' => 0,
				'use_flag' => 0,
				'created_date' => null
		);
		$result = $this->bm->insert('emaillist', $email);

		return true;
	}

	public function getClient($table, $member_id) {
		$select = 'namae';
		$where = array('id', $member_id);
		$result = $this->bm->getInfo($table, $select, $where, null);

		return $result;
	}

	public function emailRegist($table, $data, $member_id){
		$select = array('email_id', 'member_id');
		$where = array('email', $data['email']);
		$is_exist = $this->bm->getInfo($table, $select, $where,  null);
		if(!isset($is_exist['email_id'])) {
			return false;
		}

		$email = array(
				'email_id' => $is_exist['email_id'],
				'member_id' => $member_id,
				'email' => $data['email'],
				'key_flag' => 0,
				'use_flag' => 1,
				'updated_date' => null
		);
		$result = $this->bm->update('emaillist', $email);

		return true;
	}

	public function delete($table, $mail_id, $member_id) {
		$email = array('email_id', $mail_id);
		$result = $this->bm->delete($table, $email);

		return result;
	}

	public function keychange($table, $mail_id, $member_id) {
		$select = array('email_id', 'email');
		$where = array('email_id', $mail_id);
		$is_exist = $this->bm->getInfo($table, $select, $where,  null);
		if(!isset($is_exist['email_id'])) {
			return false;
		}

		$select2 = array('email_id');
		$where2 = "member_id = '" . $member_id . "' ";
		$where2 .= 'and key_flag = 1';
		
		$current_key = $this->bm->searchList($table, $where2, $select2, null);

		$adapter = dbadapter ();
		$param = dbconnect ();
		$db = Zend_Db::factory ( $adapter, $param );
		$db->beginTransaction();

		try {
			$new_key = array(
					'email_id' => $mail_id,
					'key_flag' => 1,
					'updated_date' => null
			);
				
			$result1 = $this->bm->update('emaillist', $new_key);
				
			$old_key = array(
					'email_id' => $current_key[0]['email_id'],
					'key_flag' => 0,
					'updated_date' => null
			);
			$result2 = $this->bm->update('emaillist', $old_key);
			
			$memlist = array(
					'id' => $member_id,
					'email' => $is_exist['email'],
					'upddate' => null
			);
			$result3 = $this->bm->update('memlist', $memlist);
			
			$db->commit();
				
		} catch (Exception $e) {
			$db->rollBack();
			echo $e->getMessage();
			return false;
		}
		
		return true;
	}

	public function keyword($table, $keyword) {
		$select = array('email');
		$where = "email like '" . $keyword . "%' and use_flag = 0";
		
		$stmt = $this->bm->searchList($table, $where, $select, null);
		
		return $stmt;
	}
	
	public function deleteunconfirm($table, $email) {
		$where = array('email', "'".$email."'");
		
		$result = $this->bm->delete($table, $where);
	}
	
	public function unconfirmcheck($table, $email){
		$select = array('member_id', 'email');
		$where = array('email', $email);
		$result = $this->bm->getInfo($table, $select, $where, null);
	
		return $result;
	}
}