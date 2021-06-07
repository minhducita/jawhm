<?php
	function getRanking($catIds,$rankingType = 0,$sort = 'desc',$limit = 10){
        //root url
        $url = "http://www.jawhm.or.jp/blogranking";

        //validation
        if(!is_array($catIds) || !$catIds) return NULL;
        if($rankingType != 0 && $rankingType != 1) return NULL;
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