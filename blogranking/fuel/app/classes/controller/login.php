<?php
use Model\Blog;
use Model\Resetpassword;
use Fuel\Core\Utility;

\Package::load('email');

class Controller_Login extends Controller
{
    public function action_index(){
        if(Auth_Lazyauth::check_user() || Auth_Lazyauth::login_user()){
            return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/mypage/top');
        }else{
            return Response::forge(View::forge('login/index'));
        }
    }
    
    public function action_passwd() {
		$data = Input::post();
    	
        $blogs = Blog::get_by_mailaddress($data['email']);

        if($blogs) {
        	// sendmail
            
            $key = sha1(uniqid(mt_rand(), true));
            $passdata = Resetpassword::get($key);

            if (isset($passdata)) {
                $key = sha1(uniqid(mt_rand(), true));
                $passdata = Resetpassword::get($key);
                if (isset($passdata)) {
                    $key = sha1(uniqid(mt_rand(), true));
                    $passdata = Resetpassword::get($key);
                    if (isset($passdata)) {
                        $key = "";
                    }
                }
            }

            if ($key) {
                Resetpassword::add($key, $data["email"]);
                $data['key'] = $key;
                $email = Email::forge();
                $email->from(MILA_RESETPASSWORD_FROM, MILA_RESETPASSWORD_FROM_NAME);
                $email->to($data["email"]);
                $email->subject(View::forge('mail/resetpassword_subject', $data));
                $email->body(View::forge('mail/resetpassword_body', $data));
                $email->send();
            }
        }
		return Response::forge(View::forge('resetpassword/send_complete', $data));
    }

	public function action_reset() {
        $data = array();
        $key = Input::get('key');
        $isOk = Resetpassword::check($key);
        if ($isOk) {
            $passdata = Resetpassword::get($key);
            $pass = substr(sha1(uniqid(mt_rand(), true)), 0, 8);
            $data['pass'] = $pass;
            $data['email'] = $passdata['mailaddress'];

            $blogInfo = Blog::get_by_mailaddress($data['email']);
            $new = array();
            $new[DB_COLUMN_BLOG_PASSWORD] = md5($data["pass"]);
            $new[DB_COLUMN_BLOG_CATEGORY] = $blogInfo[0][DB_COLUMN_BLOG_CATEGORY];
            Blog::edit_blog($blogInfo[0][DB_COLUMN_BLOG_ID], $new);

            $email = Email::forge();
            $email->from(MILA_RESETPASSWORD_FROM, MILA_RESETPASSWORD_FROM_NAME);
            $email->to($data["email"]);
            $email->subject(View::forge('mail/resetpassword_complete_subject', $data));
            $email->body(View::forge('mail/resetpassword_complete_body', $data));
            $email->send();

            Resetpassword::delete($key);
        }
        return Response::forge(View::forge('resetpassword/reset_complete', $data));
	}
	
	public function action_passresetcomplete() {
	}
}
?>
