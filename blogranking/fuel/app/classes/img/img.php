<?php

class Img_Img{
    public static function profile_tmp($email){
        foreach(glob(PROF_TEMP_IMG_DIR.$email."*") as $val){
            unlink($val);
        }
        if(!$_FILES) return false;
        
        $info = $_FILES["img"];
        $is_image = preg_match("|image*|", $info["type"]);
        if(!$is_image) return false;
        
        preg_match("|image/(.*)|",$info["type"],$match);
        $ext = $match[1];
        $dst = PROF_TEMP_IMG_DIR.$email. "." .$ext;
        
        if( move_uploaded_file( $info["tmp_name"], $dst) === TRUE){
            return true;
        }else{
            return false;
        }
    }
    
    public static function commit_prof($email){
        foreach(glob(PROF_TEMP_IMG_DIR.$email."*") as $val){
            $img = file_get_contents($val);
            file_put_contents(PROF_IMG_DIR.basename($val), $img, FILE_BINARY);
        }
    }
    
    public static function change_email($new_email, $old_email){
        if($new_email == $old_email) return false;
        foreach(glob(PROF_IMG_DIR.$old_email."*") as $val){
            $info = pathinfo($val);
            $img = file_get_contents($val);
            file_put_contents(PROF_IMG_DIR.$new_email.".".$info["extension"], $img, FILE_BINARY);
            unlink($val);
        }
    }
    
    public static function banner($id){
        if(!$_FILES) return false;
        
        $info = $_FILES["img"];
        $is_image = preg_match("|image*|", $info["type"]);
        if(!$is_image) return false;
        
        preg_match("|image/(.*)|",$info["type"],$match);
        $ext = $match[1];
        $dst = CATEGORY_BANNER_IMG_DIR.$id. "." .$ext;
        
        if( move_uploaded_file( $info["tmp_name"], $dst) === TRUE){
            return true;
        }else{
            return false;
        }
    }
}

?>
