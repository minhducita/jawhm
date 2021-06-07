<?php

namespace Model;
use Fuel\Core\DB;
use Fuel\Core\Utility;

class Blog extends \Model {
    public static function add_blog($mailaddress, $password, $title, $url, $handle_name){
        try {
            $exist = Blog::get_by_mailaddress($mailaddress);
            if(count($exist) > 0){
            	// already exists, never add more
/*
            	DB::start_transaction();
                DB::update(DB_TABLE_BLOG)
                        ->set(array(
                            DB_COLUMN_BLOG_PASSWORD => md5($password),
                            DB_COLUMN_BLOG_TITLE => $title,
                            DB_COLUMN_BLOG_URL => $url,
                            DB_COLUMN_BLOG_PROFILE_HANDLE => $handle_name,
                            DB_COLUMN_BLOG_STATUS => BLOG_STATUS_IN,
                            DB_COLUMN_BLOG_INSERT_DATETIME => Utility::current_datetime(),
                            DB_COLUMN_BLOG_QUIT_FLAG => 0,
                            DB_COLUMN_BLOG_DELETE_FLAG => 0,

                            DB_COLUMN_BLOG_IN_DATETIME => NULL,
                            DB_COLUMN_BLOG_OK_DATETIME => NULL,
                            DB_COLUMN_BLOG_NG_DATETIME => NULL,
                            DB_COLUMN_BLOG_REVIEW_DATETIME => NULL,
                            DB_COLUMN_BLOG_INSERT_DATETIME => NULL,
                            DB_COLUMN_BLOG_UPDATE_DATETIME => NULL,
                        ))
                        ->where(DB_COLUMN_BLOG_MAILADDRESS, $mailaddress)
                        ->execute();
                $tmp = array(
                            DB_COLUMN_RANKING_CATEGORY_ID => "CA00000001",
                            DB_COLUMN_RANKING_INSERT_DATETIME => Utility::current_datetime(),
                            DB_COLUMN_RANKING_DELETE_FLAG => 0,
                            DB_COLUMN_RANKING_UPDATE_DATETIME => NULL,

                            DB_COLUMN_RANKING_SUM_IN => 0,
                            DB_COLUMN_RANKING_SUM_OUT => 0,
                        );

                for($i=1; $i<RANKING_OLDEST+1; $i++){
                    $tmp[DB_COLUMN_RANKING_IN_PREFIX.Utility::number_to_2letters($i)] = 0;
                    $tmp[DB_COLUMN_RANKING_OUT_PREFIX.Utility::number_to_2letters($i)] = 0;
                }

                DB::update(DB_TABLE_RANKING)
                        ->set($tmp)
                        ->where(DB_COLUMN_BLOG_ID, $exist[0][DB_COLUMN_BLOG_ID])
                        ->execute();

                DB::commit_transaction();
                return $exist[0][DB_COLUMN_BLOG_ID];
               	*/
            	return false;
            }else{
                DB::start_transaction();
                $res = DB::select(DB_COLUMN_BLOG_ID)
                        ->from(DB_TABLE_BLOG)
                        ->order_by(DB_COLUMN_BLOG_ID,'desc')
                        ->limit(1)
                        ->execute();
                $max = $res[0][DB_COLUMN_BLOG_ID];
                $count = Utility::id_to_integer($max, ID_PREFIX_BLOG);
                $count++;

                DB::insert(DB_TABLE_BLOG)
                        ->set(array(
                            DB_COLUMN_BLOG_ID => ID_PREFIX_BLOG.  Utility::number_to_8letters($count),
                            DB_COLUMN_BLOG_MAILADDRESS => $mailaddress,
                            DB_COLUMN_BLOG_PASSWORD => md5($password),
                            DB_COLUMN_BLOG_TITLE => $title,
                            DB_COLUMN_BLOG_URL => $url,
                            DB_COLUMN_BLOG_PROFILE_HANDLE => $handle_name,
                            DB_COLUMN_BLOG_STATUS => BLOG_STATUS_IN,
                            DB_COLUMN_BLOG_INSERT_DATETIME => Utility::current_datetime(),
                            DB_COLUMN_BLOG_QUIT_FLAG => 0,
                            DB_COLUMN_BLOG_DELETE_FLAG => 0,
                        ))
                        ->execute();
                // TODO category id is not in the m_blog table
                DB::insert(DB_TABLE_RANKING)
                        ->set(array(
                            DB_COLUMN_RANKING_ID => ID_PREFIX_RANKING . Utility::number_to_8letters($count),
                            DB_COLUMN_RANKING_BLOG_ID => ID_PREFIX_BLOG.  Utility::number_to_8letters($count),
                            DB_COLUMN_RANKING_CATEGORY_ID => "CA00000001",
                            DB_COLUMN_RANKING_INSERT_DATETIME => Utility::current_datetime(),
                            DB_COLUMN_RANKING_DELETE_FLAG => 0,
                        ))
                        ->execute();

                DB::commit_transaction();
                return ID_PREFIX_BLOG.Utility::number_to_8letters($count);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            DB::rollback_transaction();
        }

        return false;
    }

    public static function delete_blog($id){
        try {
            DB::start_transaction();
            DB::update(DB_TABLE_BLOG)
                    ->set(array(
                            DB_COLUMN_BLOG_DELETE_FLAG => 1,
                            DB_COLUMN_BLOG_STATUS => BLOG_STATUS_NG,
                            DB_COLUMN_BLOG_UPDATE_DATETIME => Utility::current_datetime()
                        ))
                    ->where(DB_COLUMN_BLOG_ID, $id)
                    ->execute();
            DB::update(DB_TABLE_RANKING)
                    ->set(array(
                            DB_COLUMN_RANKING_DELETE_FLAG => 1,
                            DB_COLUMN_RANKING_UPDATE_DATETIME => Utility::current_datetime()
                        ))
                    ->where(DB_COLUMN_BLOG_ID, $id)
                    ->execute();
            DB::commit_transaction();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function edit_blog($id,$data){
        $data[DB_COLUMN_BLOG_UPDATE_DATETIME] = Utility::current_datetime();
        $ctg = $data[DB_COLUMN_BLOG_CATEGORY];
        unset($data[DB_COLUMN_BLOG_CATEGORY]);
        try {
            DB::update(DB_TABLE_BLOG)
                    ->set($data)
                    ->where(DB_COLUMN_BLOG_ID, $id)
                    ->execute();
            DB::update(DB_TABLE_RANKING)
                    ->set(array(DB_COLUMN_RANKING_CATEGORY_ID => $ctg))
                    ->where(DB_COLUMN_RANKING_BLOG_ID, $id)
                    ->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function get_by_id($id){
        $res = DB::select()
                ->from(DB_TABLE_BLOG)
                ->join(DB_TABLE_RANKING)
                ->on(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, '=', DB_TABLE_RANKING.".".DB_COLUMN_RANKING_BLOG_ID)
                ->where(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, $id)
                ->and_where(DB_COLUMN_BLOG_QUIT_FLAG, 0)
                ->execute();
        return $res->as_array();
    }

    //TODO join
    public static function get_by_mailaddress($mailaddress){
        $res = DB::select()
                ->from(DB_TABLE_BLOG)
                ->join(DB_TABLE_RANKING)
                ->on(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, '=', DB_TABLE_RANKING.".".DB_COLUMN_RANKING_BLOG_ID)
                ->where(DB_COLUMN_BLOG_MAILADDRESS, $mailaddress)
                ->and_where(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_DELETE_FLAG, 0)
                ->execute();
        return $res->as_array();
    }

    public static function get_by_mailaddress_except_me($mailaddress,$meaddress){
    	$res = DB::select()
    	->from(DB_TABLE_BLOG)
    	->join(DB_TABLE_RANKING)
    	->on(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, '=', DB_TABLE_RANKING.".".DB_COLUMN_RANKING_BLOG_ID)
    	->where(DB_COLUMN_BLOG_MAILADDRESS, $mailaddress)
    	->where(DB_COLUMN_BLOG_MAILADDRESS,'!=',$meaddress)
    	->and_where(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_DELETE_FLAG, 0)
    	->execute();
    	return $res->as_array();
    }


    public static function get_by_mailaddress_password($mailaddress,$key) {
        $res = DB::select()
                ->from(DB_TABLE_BLOG)
                ->join(DB_TABLE_RANKING)
                ->on(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, '=', DB_TABLE_RANKING.".".DB_COLUMN_RANKING_BLOG_ID)
                ->where(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_MAILADDRESS, $mailaddress)
                ->and_where(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_PASSWORD, $key)
                ->and_where(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_DELETE_FLAG, 0)
                ->execute();
        return $res->as_array();
    }

    public static function is_quit($id){
        $res = DB::select(DB_COLUMN_BLOG_QUIT_FLAG)
                ->from(DB_TABLE_BLOG)
                ->where(DB_COLUMN_BLOG_ID, $id)
                ->execute();
        return $res->as_array();
    }

    public static function get_with_staus_ctg_title($status=0, $ctg="", $title="", $order = ""){

        $res = DB::select()
                ->from(DB_TABLE_BLOG)
                ->join(DB_TABLE_RANKING)
                ->on(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, '=', DB_TABLE_RANKING.".".DB_COLUMN_RANKING_BLOG_ID)
                ->where(array(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_DELETE_FLAG => "0"));

        if($status>0){
            $res->and_where(array(DB_COLUMN_BLOG_STATUS => $status));
        }
        if($ctg != ""){
            $res->and_where(array(DB_COLUMN_BLOG_CATEGORY => $ctg));
        }
        if($title != ""){
            $res->and_where(DB_COLUMN_BLOG_TITLE, "LIKE", "%".$title."%");
        }

        if($order != ""){
            if($order == DB_COLUMN_BLOG_CATEGORY){
                $res->order_by($order);
            }else if($order == DB_COLUMN_BLOG_INSERT_DATETIME || $order == DB_COLUMN_BLOG_IN_DATETIME){
                $res->order_by(DB_TABLE_BLOG.".".$order, "desc");
            }else{
                $res->order_by(DB_TABLE_BLOG.".".$order);
            }
        }else{
            $res->order_by(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID);
        }

        return $res->execute()->as_array();
    }

    //TODO join
    /*
    public static function get_by_status($status, $limit){
        $order = Blog::get_datetime_name_by_status($status);

        $res = DB::select()
                ->from(DB_TABLE_BLOG)
                ->join(DB_TABLE_RANKING)
                ->on(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, '=', DB_TABLE_RANKING.".".DB_COLUMN_RANKING_BLOG_ID)
                ->where(DB_COLUMN_BLOG_STATUS, $status)
                ->and_where(DB_COLUMN_BLOG_QUIT_FLAG, 0)
                ->order_by($order, 'asc')
                ->limit($limit)
                ->execute();
        return $res->as_array();
    }*/

    public static function change_status($id, $status){
        $colname = Blog::get_datetime_name_by_status($status);
        try {
            DB::update(DB_TABLE_BLOG)
                    ->set(array(
                            DB_COLUMN_BLOG_STATUS => $status,
                            $colname => Utility::current_datetime(),
                        ))
                    ->where(DB_COLUMN_BLOG_ID, $id)
                    ->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    private static function get_datetime_name_by_status($status){
        if($status == BLOG_STATUS_IN){
            return DB_COLUMN_BLOG_INSERT_DATETIME;
        }else if($status == BLOG_STATUS_FIRST_REVIEW){
            return DB_COLUMN_BLOG_IN_DATETIME;
        }else if($status == BLOG_STATUS_OK){
            return DB_COLUMN_BLOG_OK_DATETIME;
        }else if($status == BLOG_STATUS_NG){
            return DB_COLUMN_BLOG_NG_DATETIME;
        }else if($status == BLOG_STATUS_RE_REVIEW){
            return DB_COLUMN_BLOG_REVIEW_DATETIME;
        }
        return NULl;
    }

    public static function get_all_id_url(){
        $res = DB::select(DB_COLUMN_BLOG_ID,DB_COLUMN_BLOG_URL)
                ->from(DB_TABLE_BLOG)
                ->where(array(DB_COLUMN_BLOG_DELETE_FLAG => "0"))
                ->execute();
        return $res->as_array();
    }

    public static function get_by_url($url){
        $res = DB::select()
                ->from(DB_TABLE_BLOG)
                ->where(DB_COLUMN_BLOG_URL, $url)
                ->and_where(DB_COLUMN_BLOG_DELETE_FLAG, "0")
                ->execute();
        return $res->as_array();
    }
}
?>
