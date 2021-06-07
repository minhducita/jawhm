<?php

namespace Fuel\Core;

class Utility{
    public static function current_datetime(){
        return date('YmdHis');
    }
    
    public static function number_to_2letters($i){
        if($i<10) return '0'.$i;
        return "$i";
    }
    
    public static function number_to_8letters($i){
        if($i<10) return "0000000$i";
        if($i<100) return "000000$i";
        if($i<1000) return "00000$i";
        if($i<10000) return "0000$i";
        if($i<100000) return "000$i";
        if($i<1000000) return "00$i";
        if($i<10000000) return "0$i";
        return "$i";
    }
    
    public static function id_to_integer($id, $prefix){
        return str_replace($prefix, "", $id);
    }
    
    public static function check_sameness($str1, $str2){
        if($str1 == $str2) return true;
        return false;
    }
}

?>
