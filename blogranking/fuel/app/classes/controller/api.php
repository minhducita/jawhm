<?php

use Model\Ranking;
use Model\Blog;

class Controller_Api extends Controller{
    public function action_index(){
        $json = Input::get("param");
        $data = json_decode($json);

        $ctgs = $data->ctgs;
        $in = ($data->rankingType == 0)? true : false;
        $desc = ($data->sort == "desc")? true : false;
        $limit = $data->limit;

        return json_encode(Ranking::api($ctgs, $in, $desc, $limit));
    }

    public function action_force_first_in(){
        $blog = Blog::get_by_id(Input::get("id"));
        if($blog[0][DB_COLUMN_BLOG_STATUS] == BLOG_STATUS_IN){
            Blog::change_status($id,BLOG_STATUS_FIRST_REVIEW);
        }
        echo "done";
    }

    public function action_out(){
        $id = Input::get("id");
        $res = Ranking::out_count($id);
        if(!$res){
            if(Input::server('HTTP_REFERER') ){
                return Response::redirect(Input::server('HTTP_REFERER') );
            }else{
                return Response::redirect(ROOT_URL);
            }
        }
        $blog = Blog::get_by_id($id);
        return Response::redirect($blog[0][DB_COLUMN_BLOG_URL]);
    }

    public function action_dummy(){
        var_dump($this->getRanking(array("CA00000005")));
    }

    private function getRanking($catIds,$rankingType = 0,$sort = 'desc',$limit = 10){
        //root url
        $url = ROOT_URL.SYSTEM_ROOT_PATH;

        //validation
        if(!is_array($catIds) || !$catIds) return NULL;
        if($rankingType != 0 && $rankingType != 1) return NULL;
        if($sort != "desc" && $sort != "asc") return NULL;
        if($sort != "desc" && $sort != "asc") return NULL;
        if(is_array($limit)) return NULL;

        //build json
        $pack = array(
            "ctgs" => $catIds,
            "rankingType" => $rankingType,
            "sort" => $sort,
            "limit" => $limit
        );
        $json = json_encode($pack);

        //request
        $url .= '/api/?param='.$json;
        $objs = json_decode(file_get_contents($url));

        $res = array();
        foreach ($objs as $obj){
            $arr = array();
            foreach($obj as $key => $val){
                $arr[$key] = $val;
            }
            $res[] = $arr;
        }
        return $res;
    }
}

?>
