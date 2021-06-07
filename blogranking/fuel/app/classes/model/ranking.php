<?php

namespace Model;
use Fuel\Core\DB;
use Fuel\Core\Utility;


class Ranking extends \Model{
    //TODO add ranking id method (here or in blog class?)
    public static function get_by_id($id){
        try {
           $res = DB::select()
                    ->from(DB_TABLE_RANKING)
                    ->where(DB_COLUMN_BLOG_ID, $id)
                    ->execute();
            return $res->as_array();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function get_rank($order,$id){
        try {
           $res = DB::select(DB_TABLE_RANKING.".".DB_COLUMN_BLOG_ID)
                    ->from(DB_TABLE_RANKING)
                    ->join(DB_TABLE_BLOG)
                    ->on(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, '=', DB_TABLE_RANKING.".".DB_COLUMN_RANKING_BLOG_ID)
                    ->where(DB_COLUMN_BLOG_STATUS, BLOG_STATUS_OK)
                    ->and_where(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_DELETE_FLAG, "0")
                    ->and_where(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_QUIT_FLAG, "0")
                    ->order_by($order,"desc")
                    ->execute();
           $count = 0;
           foreach($res->as_array() as $val){
               $count++;
               if($val[DB_COLUMN_BLOG_ID] == $id) break;
           }
           return $count;

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function count($ctg){
        try {
           $res = DB::select(DB_TABLE_RANKING.".".DB_COLUMN_BLOG_ID)
                    ->from(DB_TABLE_RANKING)
                    ->join(DB_TABLE_BLOG)
                    ->on(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, '=', DB_TABLE_RANKING.".".DB_COLUMN_RANKING_BLOG_ID)
                    ->where(DB_COLUMN_BLOG_STATUS, BLOG_STATUS_OK)
                    ->where(DB_COLUMN_RANKING_CATEGORY_ID,$ctg)
                    ->execute();
           return count($res->as_array());

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //add in/out count
    public static function insert_newest($id, $type, $amount){
        $colname = $type . RANKING_NEWEST_SUFFIX;
        //TODO dont need transaction?(batch process)
        try {
            DB::update(DB_TABLE_RANKING)
                    ->set(array($colname => $amount, DB_COLUMN_RANKING_UPDATE_DATETIME => Utility::current_datetime()))
                    ->where(DB_COLUMN_RANKING_BLOG_ID, $id)
                    ->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //move the in/out count
    public static function move($id, $type){
        try {
            DB::start_transaction();
            for($i=RANKING_OLDEST-1; 0<$i; --$i){
                $colname = $type . Utility::number_to_2letters($i);
                $res = DB::select($colname)
                        ->from(DB_TABLE_RANKING)
                        ->where(DB_COLUMN_BLOG_ID, $id)
                        ->execute();
                $dst = $i + 1;
                DB::update(DB_TABLE_RANKING)
                        ->value($type . Utility::number_to_2letters($dst), $res[0][$colname])
                        ->where(DB_COLUMN_RANKING_BLOG_ID, $id)
                        ->execute();
            }
            DB::commit_transaction();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //sum in/out count
    //TODO exception
    public static function sum($id, $type){
        $part = '';
        if($type == DB_COLUMN_RANKING_SUM_IN){
            $part = DB_COLUMN_RANKING_IN_PREFIX;
        }else if($type == DB_COLUMN_RANKING_SUM_OUT){
            $part = DB_COLUMN_RANKING_OUT_PREFIX;
        }


        try {
            DB::start_transaction();
            $count = 0;
            for($i=1; $i<RANKING_SUM_SPAN+1; ++$i){
                $colname = $part . Utility::number_to_2letters($i);

                $res = DB::select($colname)
                        ->from(DB_TABLE_RANKING)
                        ->where(DB_COLUMN_RANKING_BLOG_ID,$id)
                        ->execute();
                //if($res[0][$colname]){
                    $count += $res[0][$colname];
                //}
            }
            DB::update(DB_TABLE_RANKING)
                    ->value($type, $count)
                    ->where(DB_COLUMN_RANKING_BLOG_ID,$id)
                    ->execute();
            DB::commit_transaction();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //change ranking category of target blog
    public static function change_category($blog_id, $category_id){
        try {
            DB::update(DB_TABLE_RANKING)
                    ->set(array(DB_COLUMN_RANKING_CATEGORY_ID => $category_id,DB_COLUMN_RANKING_UPDATE_DATETIME => Utility::current_datetime()))
                    ->where(DB_COLUMN_RANKING_BLOG_ID, $blog_id)
                    ->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //get ranking data
    //TODO currently only sum_in is reffred. need raw query to complete.
    //TODO exception
    public static function get_top($category, $limit){
        try {
            //TODO implement when no category
            $res = DB::select(DB_COLUMN_RANKING_BLOG_ID, DB_COLUMN_RANKING_SUM_IN)
                    ->from(DB_TABLE_RANKING)
                    ->where(DB_COLUMN_RANKING_CATEGORY_ID, $category)
                    ->limit($limit)
                    ->order_by(DB_COLUMN_RANKING_SUM_IN,'desc')
                    ->execute();
            return $res->as_array();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return NULL;
        }
    }

    public static function api($ctgs, $in = true, $desc = true, $limit = 10){
            $res = DB::select()
                    ->from(DB_TABLE_RANKING)
                    ->join(DB_TABLE_BLOG)
                    ->on(DB_TABLE_BLOG.".".DB_COLUMN_BLOG_ID, '=', DB_TABLE_RANKING.".".DB_COLUMN_RANKING_BLOG_ID)
                    ->where(DB_COLUMN_BLOG_STATUS, BLOG_STATUS_OK)
                    ->where(DB_TABLE_BLOG.".".DB_COLUMN_RANKING_DELETE_FLAG,0);

            foreach($ctgs as $val){
                $res->or_where(DB_COLUMN_RANKING_CATEGORY_ID,$val);
            }

            $prefix = ($in)? DB_COLUMN_RANKING_IN_PREFIX : DB_COLUMN_RANKING_OUT_PREFIX;

            if($desc){
                $res->order_by($prefix."01",'desc');
            }else{
                $res->order_by($prefix."01",'asc');
            }

            $res->limit($limit);
            return $res->execute()->as_array();
    }

    public static function out_count($id){
        try{
            DB::start_transaction();
            $res = DB::select(DB_COLUMN_RANKING_OUT_PREFIX."01")
                    ->from(DB_TABLE_RANKING)
                    ->where(DB_COLUMN_RANKING_BLOG_ID, $id)
                    ->execute();
            $data = $res->as_array();
            if(count($data) == 0) return false;
            DB::update(DB_TABLE_RANKING)
                    ->set(array(DB_COLUMN_RANKING_OUT_PREFIX."01" => $data[0][DB_COLUMN_RANKING_OUT_PREFIX."01"]+1,
                                DB_COLUMN_RANKING_UPDATE_DATETIME => Utility::current_datetime()))
                    ->where(DB_COLUMN_RANKING_BLOG_ID, $id)
                    ->execute();
            DB::commit_transaction();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return NULL;
        }
    }
}

?>
