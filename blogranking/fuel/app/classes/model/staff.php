<?php

namespace Model;
use Fuel\Core\DB;
use Fuel\Core\Utility;

class Staff extends \Model{
    //add staff data
    //TODO exception
    public static function add_staff($name,$password){
        try {
            DB::start_transaction();
            $res = DB::select(DB_COLUMN_STAFF_ID)
                    ->from(DB_TABLE_STAFF)
                    ->order_by(DB_COLUMN_STAFF_ID,'desc')
                    ->limit(1)
                    ->execute();
            $max = $res[0][DB_COLUMN_STAFF_ID];
            $count = Utility::id_to_integer($max, ID_PREFIX_STAFF);
            $count++;
            
            DB::insert(DB_TABLE_STAFF)
                    ->set(array(
                        DB_COLUMN_STAFF_ID => ID_PREFIX_STAFF.Utility::number_to_8letters($count),
                        DB_COLUMN_STAFF_NAME => $name,
                        DB_COLUMN_STAFF_PASSWORD => md5($password),
                        DB_COLUMN_STAFF_INSERT_DATETIME => Utility::current_datetime(),
                        DB_COLUMN_STAFF_UPDATE_DATETIME => Utility::current_datetime(),
                        DB_COLUMN_STAFF_DELETE_FLAG => 0,
                    ))
                    ->execute();
            DB::commit_transaction();
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            DB::rollback_transaction();
        }
    }
    
    //logical deletion
    //TODO exception
    public static function delete_staff($id){
        try {
            DB::update(DB_TABLE_STAFF)
                    ->set(array(
                        DB_COLUMN_STAFF_DELETE_FLAG => 1,
                        DB_COLUMN_STAFF_UPDATE_DATETIME => Utility::current_datetime(),
                    ))
                    ->where(DB_COLUMN_STAFF_ID, $id)
                    ->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            
    }
    
    //change staff data
    //TODO exception
    public static function edit_staff($id, $name, $password){
        try {
            DB::update(DB_TABLE_STAFF)
                    ->set(array(
                        DB_COLUMN_STAFF_NAME => $name,
                        DB_COLUMN_STAFF_PASSWORD => md5($password),
                        DB_COLUMN_STAFF_UPDATE_DATETIME => Utility::current_datetime(),
                    ))
                    ->where(DB_COLUMN_STAFF_ID, $id)
                    ->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public static function get_all_staff(){
        $res = DB::select()
                ->from(DB_TABLE_STAFF)
                ->where(DB_COLUMN_STAFF_DELETE_FLAG, 0)
                ->execute();
        return $res->as_array();
    }
    
    /*
    public static function is_valid($username, $password){
        $res = DB::select()
                ->from(DB_TABLE_STAFF)
                ->where(DB_COLUMN_STAFF_NAME,$username)
                ->and_where(DB_COLUMN_STAFF_PASSWORD,md5($password))
                ->execute();
        if($res[0][DB_COLUMN_STAFF_ID]) return true;
        return false;
    }
     * 
     */
}

?>
