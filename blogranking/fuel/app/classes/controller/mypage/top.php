<?php

use Model\Blog;
use Model\Ranking;
use Model\Category;
use Fuel\Core\Input;

class Controller_Mypage_Top extends Controller
{
    public function action_index(){
        if(Auth_Lazyauth::check_user()){
            $session = Session::get("login_user");
            $user = $session["user"];
            $blog = Blog::get_by_mailaddress($user);
            if(count($blog) < 1){
                Session::delete("login_user");
                return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/login');
            }
            $rank = Ranking::get_by_id($blog[0][DB_COLUMN_BLOG_ID]);

            $in_out = (Input::get("out_sort") == "true")? DB_COLUMN_RANKING_OUT_PREFIX : DB_COLUMN_RANKING_IN_PREFIX;
            for($i=1; $i<8; ++$i){
                $self_rank[] = Ranking::get_rank($in_out."0".$i, $blog[0][DB_COLUMN_BLOG_ID]);
            }
            
            $all_blogs = Ranking::count($blog[0][DB_COLUMN_RANKING_CATEGORY_ID]);
            $ctg_info = Category::get_category_info($blog[0][DB_COLUMN_RANKING_CATEGORY_ID]);
            $data = array(
                "blog" => $blog[0],
                "rank" => $rank[0],
                "self_rank" => $self_rank,
                "sort" => (Input::get("out_sort") == "true")? "out" : "in",
                "all_blogs" => $all_blogs,
                "ctg_info" => $ctg_info[0]
            );
            return Response::forge(View::forge('mypage/top/index',$data)); 
        }else{
            return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/login');
        }
    }
    
    public function action_logout(){
        Auth_Lazyauth::logout_user();
        return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/login');
    }
    
    public function action_retry(){
        $session = Session::get("login_user");
        $user = $session["user"];
        $blog = Blog::get_by_mailaddress($user);
        Blog::change_status($blog[0][DB_COLUMN_BLOG_ID],5);
        return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/mypage/top/index');
    }
}
?>
