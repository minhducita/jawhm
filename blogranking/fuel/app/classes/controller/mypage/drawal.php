<?php

class Controller_Mypage_Drawal extends Controller{
    public function action_index(){
        return Response::forge(View::forge('mypage/drawal/index')); 
    }
}

?>
