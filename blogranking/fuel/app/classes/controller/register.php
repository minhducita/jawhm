<?php

use Model\Blog;
use Model\Category;
use Fuel\Core\Utility;

\Package::load('email');

class Controller_Register extends Controller
{
    public function action_index()
    {
        $ctg = Category::get_all_category_name();
        $data = array("ctg" => $ctg);
		return Response::forge(View::forge('register/index',$data));
    }

    public function action_confirm()
    {
        $data = Input::post();
        $data["ctg"] = Category::get_all_category_name();

        // validation
        $blogs = Blog::get_by_mailaddress($data['email']);
        if(count($blogs)) {
        	if(!isset($data['errors'])) $data['errors'] = array();
        	$data['errors'][] = ERROR_REGISTER_EMAIL;
        }
        $urls = Blog::get_by_url($data['blogurl']);
        if(count($urls)) {
        	if(!isset($data['errors'])) $data['errors'] = array();
        	$data['errors'][] = ERROR_REGISTER_URL;
        }
        if($data['blogurl'][strlen($data['blogurl'])-1] != '/') {
	        $urls = Blog::get_by_url($data['blogurl'].'/');
	        if(count($urls)) {
	        	if(!isset($data['errors'])) $data['errors'] = array();
	        	$data['errors'][] = ERROR_REGISTER_URL;
	        }
        } else {
        	$urls = Blog::get_by_url(substr($data['blogurl'],0,strlen($data['blogurl'])-1));
        	if(count($urls)) {
        		if(!isset($data['errors'])) $data['errors'] = array();
        		$data['errors'][] = ERROR_REGISTER_URL;
        	}
        }


        if(isset($data['errors']) && is_array($data['errors']) && count($data['errors']))
        	return Response::forge(View::forge('register/index',$data));
        else
			return Response::forge(View::forge('register/confirm', $data));
    }

    public function action_completion()
    {
	return Response::forge(View::forge('register/completion'));
    }

    public function action_register()
    {
        $data = Input::post();
        $id = Blog::add_blog($data["email"],
                        $data["password"],
                        $data["blogtitle"],
                        $data["blogurl"],
                        $data["handlename"]);
        if(!$id) die; // fatal error

        $bday_flag = ($data["bday_publication"] == "false")? 0 : 1;
        $bday = "";
        if($bday_flag == 1){
            $bday = $data["year"].Utility::number_to_2letters($data["month"]).Utility::number_to_2letters($data["day"]);
        }
        $additional = array(
            DB_COLUMN_BLOG_PROFILE_RSS => $data["blogrss"],
            DB_COLUMN_BLOG_PROFILE_MESSAGE => $data["blogdesc"],
            DB_COLUMN_BLOG_PROFILE_BIRTHDAY_FLAG => $bday_flag,
            DB_COLUMN_BLOG_PROFILE_BIRTHDAY => $bday,
            DB_COLUMN_BLOG_CATEGORY => $data["category"]
        );

        if($data["gender_flg"] == "no"){
            $additional[DB_COLUMN_BLOG_PROFILE_GENDER_FLAG] = 0;
        }else{
            $additional[DB_COLUMN_BLOG_PROFILE_GENDER_FLAG] = 1;
        }
        $additional[DB_COLUMN_BLOG_PROFILE_GENDER] = ($data["gender"] == "m")? 0 :1;

        Blog::edit_blog($id, $additional);

        $email = Email::forge();
		$email->from( MAIL_REGISTER_THANKYOU_FROM, MAIL_REGISTER_THANKYOU_FROM_NAME );
		$email->to( $data["email"] );
		$email->bcc(MAIL_BCC);
		$email->subject(  View::forge('mail/register_thankyou_subject', $data) );
		$email->body(  View::forge('mail/register_thankyou_body', $data) );
		$email->send();

        $email = Email::forge();
		$email->from( MAIL_REGISTER_JOURNAL_FROM, MAIL_REGISTER_JOURNAL_FROM_NAME );
		$email->to( MAIL_REGISTER_JOURNAL_TO );
		$email->bcc(MAIL_BCC);
		$email->subject(  View::forge('mail/register_journal_subject', $data) );
		$email->body(  View::forge('mail/register_journal_body', $data) );
		$email->send();

        return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/register/completion');
    }

}
?>
