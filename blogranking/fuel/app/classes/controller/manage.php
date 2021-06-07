<?php
use Model\Blog;
use Model\Category;
use Model\Ranking;

\Package::load('email');

class Controller_Manage extends Controller
{
    public function action_index(){
        if(Auth_Lazyauth::check_staff()){
            $data = $this->getViewData();
            return Response::forge(View::forge('manage/index',$data));
        }else{
            return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/manage/login');
        }
    }

    public function action_csvdl() {
        if(Auth_Lazyauth::check_staff()){
            $data = $this->getViewData();

            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=" . date('YmdHis') . "_jawhm_download.csv");

            $output = "";
            $isHeader = true;
            $header_list = array();
            $rank_list = array();
            foreach ($data['blog'] as $one) {

                if ($isHeader) {
                    $isHeader = false;
                    foreach ($one as $key => $value) {
                        $header_list[] = $key;
                    }
                    for ($i = 1; $i <= 30; $i++) {
                        $rank_list[] = 'rank' . sprintf("%02d", $i);
                    }
                    $output .= '"' . implode('","', $header_list) . '"';
                    $output .= ',"' . implode('","', $rank_list) . '"';
                    $output .= "\n";
                }
                $arr = array();
                foreach ($header_list as $kl) {
                   $arr[] = $one[$kl];
                }
                $rank = Ranking::get_by_id($one[DB_COLUMN_BLOG_ID]);

                //$in_out = (Input::get("out_sort") == "true")? DB_COLUMN_RANKING_OUT_PREFIX : DB_COLUMN_RANKING_IN_PREFIX;
                $in_out = DB_COLUMN_RANKING_IN_PREFIX;
                for ($i = 1; $i <= 30; ++$i) {
                    $arr[] = Ranking::get_rank($in_out . sprintf("%02d", $i), $one[DB_COLUMN_BLOG_ID]);
                }

                $output .= '"' . implode('","', $arr) . '"';
                $output .= "\n";
            }

            echo mb_convert_encoding($output, "SJIS-win", "UTF-8");

        }else{
            return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/manage/login');
        }
    }

    private function getViewData() {
        $start_year = Input::get('start_year');
        $start_month = Input::get('start_month');
        $start_day = Input::get('start_day');
        $start_date = "";
        if (!empty($start_year) && !empty($start_month) && !empty($start_day)) {
            $start_date = $start_year . sprintf("%02d", $start_month) . sprintf("%02d", $start_day) . '000000';
        }
        
        $end_year = Input::get('end_year');
        $end_month = Input::get('end_month');
        $end_day = Input::get('end_day');
        $end_date = "";
        if (!empty($end_year) && !empty($end_month) && !empty($end_day)) {
            $end_date = $end_year . sprintf("%02d", $end_month) . sprintf("%02d", $end_day) . '999999';
        }

        $data = array(
            "status" => Input::get("status"),
            "selected_ctg" => Input::get("ctg"),
            "title" => Input::get("title"),
            "order" => Input::get("order"),
            "ctg" => Category::get_all_category_name(),
            "start_year" => $start_year,
            "start_month" => $start_month,
            "start_day" => $start_day,
            "start_date" => $start_date,
            "end_year" => $end_year,
            "end_month" => $end_month,
            "end_day" => $end_day,
            "end_date" => $end_date,
        );
        
        $data["blog"] = Blog::get_with_staus_ctg_title(Input::get("status"),
                                                       Input::get("ctg"),
                                                       Input::get("title"),
                                                       Input::get("order"),
                                                       $start_date,
                                                       $end_date);

        return $data;
    }
    
    public function action_category(){
        if(Auth_Lazyauth::check_staff()){
            $data = array(
                "ctg" => Category::get_category_info(),
            );

            $banner_url = array();
            foreach($data["ctg"] as &$val){
                $val["num"] = count(Blog::get_with_staus_ctg_title(0, $val[DB_COLUMN_CATEGORY_ID]));
                $banner_url[$val[DB_COLUMN_CATEGORY_ID]] = "";
                foreach(glob(CATEGORY_BANNER_IMG_DIR.$val[DB_COLUMN_CATEGORY_ID]."*") as $path){
                    $banner_url[$val[DB_COLUMN_CATEGORY_ID]] = "/assets/img/uploaded/banner/".basename($path);
                }
            }
            $data["banner_url"] = $banner_url;
            
            return Response::forge(View::forge('manage/category',$data));
        }else{
            return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/manage/login');
        }
    }
    
    public function action_update(){
        if(Input::get("status") == -1){
            Blog::delete_blog(Input::get("id"));
        }else{
            Blog::change_status(Input::get("id"), Input::get("status"));
            
            if(Input::get("status") == 3) {
        		$data = Blog::get_by_id(Input::get("id"));
        		if(count($data)) {
	        		$data = $data[0];
			        $email = Email::forge();
					$email->from( MAIL_MANAGE_OK_FROM, MAIL_MANAGE_OK_FROM_NAME );
					$email->to( $data["mailaddress"] );
					$email->subject(  View::forge('mail/manage_ok_subject', $data) );
					$email->body(  View::forge('mail/manage_ok_body', $data) );
					$email->send();
				}
            }
        }
        $param = urldecode(Input::get("redirect"));
        $param = preg_replace("/\.|'/", "", $param);
        return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/manage/index'.$param);
    }
    
    public function action_update_ctg(){
        if(Input::get("delete") == 1){
            Category::delete_category(Input::get("id"));
        }else if(Input::get("new") == 1){
            $id = Category::add_category(Input::post("name"), "banner_url", Input::post("out_url"));
            Img_Img::banner($id);
        }else{
            Img_Img::banner(Input::post("id"));
            Category::edit_category(Input::post("id"),
                                    Input::post("name"),
                                    "banner_url",
                                    Input::post("out_url"),
                                    Input::post("sort"));
        }
            return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/manage/category');
    }
    
    public function action_login(){
        if(Auth_Lazyauth::check_staff() || Auth_Lazyauth::login_staff()){
            return Response::redirect(ROOT_URL.SYSTEM_ROOT_PATH.'/manage/index');
        }else{
            return Response::forge(View::forge('manage/login'));
        }
    }
}
?>
