<?php

use Fuel\Core\DB;
use Fuel\Core\Input;
use Fuel\Core\Session;

class Auth_Lazyauth{
    public static function receiver(){
        return array(
            "username" => Input::post("email"),
            "password" => Input::post("pwd"),
        );
    }

    public static function login_staff(){
        $post = Auth_Lazyauth::receiver();
        if(Auth_Lazyauth::validate($post["username"], md5($post["password"]), DB_TABLE_STAFF)){
             Session::set("login_staff", array(
                 "user" => $post["username"],
                 "key" => md5($post["password"]),
             ));
             return true;
        }
        return false;
    }

    public static function login_user(){
        $post = Auth_Lazyauth::receiver();
        if(Auth_Lazyauth::validate($post["username"], md5($post["password"]), DB_TABLE_BLOG)){
             Session::set("login_user", array(
                 "user" => $post["username"],
                 "key" => md5($post["password"]),
             ));
             return true;
        }
        return false;
    }

    public static function logout_staff(){
        Session::delete("login_staff");
    }

    public static function logout_user(){
        Session::delete("login_user");
    }

    public static function check_staff(){
        $session = Session::get("login_staff");
        return Auth_Lazyauth::validate($session["user"], $session["key"], DB_TABLE_STAFF);
    }

    public static function check_user(){
        $session = Session::get("login_user");
        return Auth_Lazyauth::validate($session["user"], $session["key"], DB_TABLE_BLOG);
    }

    public static function validate($username, $password, $table_name){
        if(!is_null($username) && !is_null($password)){
            $username_col = "";
            $password_col = "";
            $id_col = "";
            if($table_name == DB_TABLE_STAFF){
                $username_col = DB_COLUMN_STAFF_NAME;
                $password_col = DB_COLUMN_STAFF_PASSWORD;
                $id_col = DB_COLUMN_STAFF_ID;
            }else if($table_name == DB_TABLE_BLOG){
                $username_col = DB_COLUMN_BLOG_MAILADDRESS;
                $password_col = DB_COLUMN_BLOG_PASSWORD;
                $id_col = DB_COLUMN_BLOG_ID;
            }

            $res = DB::select()
            		->from($table_name)
            		->where($username_col, $username)
            		->and_where(DB_COLUMN_BLOG_DELETE_FLAG, 0)
            		->execute();
            if(count($res) > 1) {
            	return false;
            }

            $res = DB::select()
                    ->from($table_name)
                    ->where($username_col, $username)
                    ->and_where($password_col, $password)
                    ->and_where(DB_COLUMN_BLOG_DELETE_FLAG, 0)
                    ->execute();
            if($res[0][$id_col]){
                return true;
            }
        }
        return false;
    }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
