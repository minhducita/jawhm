<?php

use Model\Blog;
use Model\Category;
use Fuel\Core\Utility;


class Controller_Welcome extends Controller
{
    public function action_index(){
        return Response::forge(View::forge('welcome/index'));
    }
}