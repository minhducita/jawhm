<?php

namespace Model;
use Fuel\Core\DB;
use Fuel\Core\Utility;

class Resetpassword extends \Model{

	public static function add($key, $mailaddress) {
		DB::insert(DB_TABLE_RESETPASSWORD)
			->set(array(
				DB_COLUMN_RESETPASSWORD_KEY => $key,
				DB_COLUMN_RESETPASSWORD_MAILADDRESS => $mailaddress,
				DB_COLUMN_RESETPASSWORD_CREATE_DATE => date('YmdHis'),
				))->execute();
	}

	public static function get($key) {
		$res = DB::select()->from(DB_TABLE_RESETPASSWORD)
				->where(DB_COLUMN_RESETPASSWORD_KEY, $key)
				->execute()->current();
		return $res;
	}

	public static function check($key) {
		$data = self::get($key);
		if (empty($data)) {
			return false;
		}
		$check_date = date( "YmdHis", strtotime("-24 hour"));
		// $dataの方が過去の場合は、無効とし、データを削除する
		// 20130610150000       20130610110000   有効
		// 20130610150000       20130617150000   無効
		if ($data[DB_COLUMN_RESETPASSWORD_CREATE_DATE] < $check_date) {
			// 無効
			self::delete($key);
			return false;
		}
		return true;
	}

	public static function delete($key) {
		DB::delete(DB_TABLE_RESETPASSWORD)->where(DB_COLUMN_RESETPASSWORD_KEY, $key)->execute();
	}
}