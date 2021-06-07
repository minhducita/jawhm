<?php

namespace Model;
use Fuel\Core\DB;
use Fuel\Core\Utility;

class Category extends \Model{
    //add category
    //TODO exception
    public static function add_category($name, $banner_url, $out_url, $sort_order = -1){
        try {
            DB::start_transaction();
            if($sort_order == -1){
                $max = DB::query('SELECT MAX('.DB_COLUMN_CATEGORY_SORT_ORDER.') from '. DB_TABLE_CATEGORY)
                                    ->execute();
                $sort_order = $max[0]["MAX(".DB_COLUMN_CATEGORY_SORT_ORDER.")"] + 1;
            }
            
            $res = DB::select(DB_COLUMN_CATEGORY_ID)
                    ->from(DB_TABLE_CATEGORY)
                    ->order_by(DB_COLUMN_CATEGORY_ID,'desc')
                    ->limit(1)
                    ->execute();
            $max = $res[0][DB_COLUMN_CATEGORY_ID];
            $count = Utility::id_to_integer($max, ID_PREFIX_CATEGORY);
            $count++;
            
            DB::insert(DB_TABLE_CATEGORY)
                    ->set(array(
                        DB_COLUMN_CATEGORY_ID => ID_PREFIX_CATEGORY . Utility::number_to_8letters($count),
                        DB_COLUMN_CATEGORY_NAME => $name,
                        DB_COLUMN_CATEGORY_BANNER_URL => $banner_url,
                        DB_COLUMN_CATEGORY_OUT_URL => $out_url,
                        DB_COLUMN_CATEGORY_SORT_ORDER => $sort_order,
                        DB_COLUMN_CATEGORY_INSERT_DATETIME => Utility::current_datetime(),
                        DB_COLUMN_CATEGORY_UPDATE_DATETIME => Utility::current_datetime(),
                        DB_COLUMN_CATEGORY_DELETE_FLAG => 0,
                    ))
                    ->execute();
            DB::commit_transaction();
            return ID_PREFIX_CATEGORY . Utility::number_to_8letters($count);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            DB::rollback_transaction();
        }
    }

    //edit category info
    //TODO exception
    public static function edit_category($id, $name, $banner_url, $out_url, $sort_oder){
        try {
            DB::update(DB_TABLE_CATEGORY)
                    ->set(array(
                        DB_COLUMN_CATEGORY_NAME => $name,
                        DB_COLUMN_CATEGORY_BANNER_URL => $banner_url,
                        DB_COLUMN_CATEGORY_OUT_URL => $out_url,
                        DB_COLUMN_CATEGORY_SORT_ORDER => $sort_oder,
                        DB_COLUMN_CATEGORY_UPDATE_DATETIME => Utility::current_datetime(),
                    ))
                    ->where(DB_COLUMN_CATEGORY_ID, $id)
                    ->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    //logical deletion of category
    //TODO exception
    public static function delete_category($id){
        try {
            DB::update(DB_TABLE_CATEGORY)
                    ->set(array(
                            DB_COLUMN_CATEGORY_DELETE_FLAG => 1,
                            DB_COLUMN_CATEGORY_UPDATE_DATETIME => Utility::current_datetime(),
                        ))
                    ->where(DB_COLUMN_CATEGORY_ID, $id)
                    ->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //get the category name by id
    public static function get_category_name($id){
        $res = DB::select(DB_COLUMN_CATEGORY_NAME)
                ->from(DB_TABLE_CATEGORY)
                ->where(DB_COLUMN_CATEGORY_ID, $id)
                ->and_where(DB_COLUMN_CATEGORY_DELETE_FLAG, 0)
                ->execute();
        $arr = $res->as_array();
        return $arr[0]["name"];
    }

    //get all info of target category
    //TODO need NULL mode?
    public static function get_category_info($id = NULL){
        if($id){
            $res = DB::select()
                    ->from(DB_TABLE_CATEGORY)
                    ->where(DB_COLUMN_CATEGORY_ID, $id)
                    ->and_where(DB_COLUMN_CATEGORY_DELETE_FLAG, 0)
                    ->execute();
            return $res->as_array();
        }else{
            $res = DB::select()
                    ->from(DB_TABLE_CATEGORY)
                    ->where(DB_COLUMN_CATEGORY_DELETE_FLAG, 0)
                    ->order_by(DB_COLUMN_CATEGORY_SORT_ORDER,'asc')
                    ->execute();
            return $res->as_array();
        }
    }
    
    //list the category name
    public static function get_all_category_name(){
        $res = db::select(DB_COLUMN_CATEGORY_ID,DB_COLUMN_CATEGORY_NAME)
                ->from(DB_TABLE_CATEGORY)
                ->where(DB_COLUMN_CATEGORY_DELETE_FLAG, 0)
                ->order_by(DB_COLUMN_CATEGORY_SORT_ORDER,'asc')
                ->execute();
        return $res->as_array();
    }
}
?>
