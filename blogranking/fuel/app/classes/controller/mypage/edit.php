<?php

use Model\Blog;
use Model\Category;

class Controller_Mypage_Edit extends Controller
{
    public function action_index(){
        if(Auth_Lazyauth::check_user()){
            $session = Session::get("login_user");
            $user = $session["user"];
            $key = $session["key"];
            $blog = Blog::get_by_mailaddress_password($user,$key);
            $blogid = $blog[0][DB_COLUMN_BLOG_ID];
            $ctg = Category::get_all_category_name();
            $img_path = "/assets/img/uploaded/prof/";
            foreach (glob(PROF_IMG_DIR.$blogid."*") as $val){
                $img_path .= basename($val);
                break;
            }
            $data = array(
                "blog" => $blog[0],
                "ctg" => $ctg,
                "img_path" => $img_path
            );

            return Response::forge(View::forge('mypage/edit/index',$data));
        }else{
            return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/login');
        }
    }

    public function action_confirm(){
       $session = Session::get("login_user");
       $user = $session["user"];
       $key = $session["key"];

       $blog = Blog::get_by_mailaddress_password($user,$key);
       if(count($blog) !== 1) die; // fatal-error

       $data = Input::post();

       $maybeothers = Blog::get_by_mailaddress_except_me($data['email'],$user);
       if(count($maybeothers)) {
	       	 // 既に登録済み
	       	$blog = Blog::get_by_mailaddress_password($user,$key);
	       	$blogid = $blog[0][DB_COLUMN_BLOG_ID];
	       	$ctg = Category::get_all_category_name();
	       	$img_path = "/assets/img/uploaded/prof/";
	       	foreach (glob(PROF_IMG_DIR.$blogid."*") as $val){
	       		$img_path .= basename($val);
	       		break;
	       	}
	       	$data = array_merge($data,array(
	       			"blog" => $blog[0],
	       			"ctg" => $ctg,
	       			"img_path" => $img_path
	       	));

	       	return Response::forge(View::forge('mypage/edit/index',array_merge($data,array('emailerror' => ERROR_REGISTER_EMAIL))));
       }

       $blogid = $blog[0][DB_COLUMN_BLOG_ID];
       $isProf = Img_Img::profile_tmp($blogid);



       $data["blog"] = $blog[0];
       $data["ctgname"] = Category::get_category_name($data["category"]);
       $img_path = "/assets/img/uploaded/t_prof/";
       $img_name = "";
       foreach (glob(PROF_TEMP_IMG_DIR.$blogid."*") as $val){
                $img_name = $val;
                $img_path .= basename($val);
                break;
       }
       $data["img_path"] =  $img_path;

       if($isProf) {
       	$isFileError = false;
       	$size = getimagesize($img_name);
       	if (@$size[0] != '200' || @$size[1] != '200' || @$size[2] != IMG_JPG) {
       		$isFileError = true;
       	}
       	$fileSize = filesize($img_name);
       	if ($fileSize > 1024 * 1000) {
       		$isFileError = true;
       	}

       	if($isFileError) {
       		// プロフィール画像が不正の場合
       		$blog = Blog::get_by_mailaddress_password($user,$key);
       		$blogid = $blog[0][DB_COLUMN_BLOG_ID];
       		$ctg = Category::get_all_category_name();
       		$img_path = "/assets/img/uploaded/prof/";
       		foreach (glob(PROF_IMG_DIR.$blogid."*") as $val){
       			$img_path .= basename($val);
       			break;
       		}
       		$data = array_merge($data,array(
       				"blog" => $blog[0],
       				"ctg" => $ctg,
       				"img_path" => $img_path
       		));

       		return Response::forge(View::forge('mypage/edit/index',array_merge($data,array('proferror' => ERROR_EDIT_PROFILE))));
       	}
       }

       return Response::forge(View::forge('mypage/edit/confirm',$data));
    }

    public function action_update(){
        $data = Input::post();

        $new = array(
            DB_COLUMN_BLOG_MAILADDRESS => $data["email"],
            DB_COLUMN_BLOG_PROFILE_HANDLE => $data["handlename"],
            DB_COLUMN_BLOG_TITLE => $data["blogtitle"],
            DB_COLUMN_BLOG_URL => $data["blogurl"],
            DB_COLUMN_BLOG_PROFILE_RSS => $data["blogrss"],
            DB_COLUMN_BLOG_PROFILE_MESSAGE => $data["blogdesc"],
            DB_COLUMN_BLOG_CATEGORY => $data["category"],
        );
        if($data["pass"] != '') {
        	$new[DB_COLUMN_BLOG_PASSWORD] = md5($data["pass"]);
        }
        if($data["gender"] == "off"){
            $new[DB_COLUMN_BLOG_PROFILE_GENDER_FLAG] = 0;
        }else{
            $new[DB_COLUMN_BLOG_PROFILE_GENDER_FLAG] = 1;
            $new[DB_COLUMN_BLOG_PROFILE_GENDER] = $data["gender"];
        }

       $session = Session::get("login_user");
       $user = $session["user"];
       $key = $session["key"];
       //Img_Img::change_email($data["email"],$user);

       $blog = Blog::get_by_mailaddress_password($user,$key);
       if(count($blog) !== 1) die; // fatal-error

       $blogid = $blog[0][DB_COLUMN_BLOG_ID];
       Img_Img::commit_prof($blogid);

       Blog::edit_blog($blog[0][DB_COLUMN_BLOG_ID],$new);
        Auth_Lazyauth::logout_user();
        if(Auth_Lazyauth::validate($data["email"], ($data["pass"] == "" ? $key : md5($data["pass"])), DB_TABLE_BLOG)){
             Session::set("login_user", array(
                 "user" => $data["email"],
                 "key" => ($data["pass"] == "" ? $key : md5($data["pass"])),
             ));

        }
        return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/mypage/edit/completion');
    }

    public function action_completion(){
        return Response::forge(View::forge('mypage/edit/completion'));
    }

}
?>
