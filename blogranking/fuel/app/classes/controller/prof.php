<?php

use Model\Blog;
use Model\Category;

class Controller_Prof extends Controller
{
	public function action_index($blog_id)
	{
		$blogInfo = Blog::get_by_id($blog_id);

		$ctg = Category::get_all_category_name();
		$img_path = "/assets/img/uploaded/prof/";

		foreach (glob(PROF_IMG_DIR.$blog_id."*") as $val){
		    $img_path .= basename($val);
		    break;
		}

		if(basename($img_path) == "prof"){
			$img_path = "/assets/img/uploaded/prof/noimage.jpeg";
		}

		$blogInfo[0]['img_path'] = $img_path;


		if (empty($blogInfo)) {
			return Response::forge(View::forge('404'), 404);
		} else {
			return Response::forge(View::forge('prof/index', $blogInfo[0]));
		}
	}
}
