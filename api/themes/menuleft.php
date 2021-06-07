<?php 
	require_once('../../calendar_module/event.class.php');
	$domain = "http://".$_SERVER["SERVER_NAME"];
	$urlCalendar = $domain."/calendar_module/mod_event_vertical.php?menubar_place=";
	$menuleft['places']=array(
		'tokyo' => array("name"=>'東京',"url"=>$urlCalendar."tokyo"),
		'osaka' => array("name"=>'大阪',"url"=>$urlCalendar."osaka"),
		'nagoya' => array("name"=>'名古屋',"url"=>$urlCalendar."nagoya"),
		'fukuoka' => array("name"=>'福岡',"url"=>$urlCalendar."fukuoka"),
		'okinawa' => array("name"=>'沖縄',"url"=>$urlCalendar."okinawa")
	);
	/*event_places*/
	$menuleft['event_places'] = array() ;
	function sort_data_by_date(array $original_array, $english_date) {
		$result = array();
		$values = array();
		foreach ($original_array as $id => $value) {
			$values[$id] = isset($value[$english_date]) ? $value[$english_date] : '';
		}
		asort($values);
		$i=0;
		foreach ($values as $key => $value) {
			if(!empty($original_array[$key])){
				$result[$i] = $original_array[$key];
				$i++;
			}
		}
		return $result;
	}
	$event_data = new Event;
	$list_data = $event_data->getData($region,'',3,'', true);
	$menuleft['event_places'] = sort_data_by_date($list_data, 'english_date');
	for ($i=0; $i<=(count($menuleft['event_places'])-1);$i++) {
		$text = $menuleft['event_places'][$i]['seminar_name'];
        $menuleft['event_places'][$i]['url'] = $domain.'/seminar/seminar.php?num='.$menuleft['event_places'][$j]['id'].'#calendar_start';
	}

	/*end event_places*/
	/* Free Working Holiday Seminar */
	$menuleft['seminar'] = array(
		"title"=>"無料ワーホリセミナー（説明会）",
		"serdata"=>array(
			array("title"=>"東京のセミナー","url"=>$domain."/seminavi.php?p=tokyo"),
			array("title"=>"大阪のセミナー","url"=>$domain."/seminavi.php?p=osaka"),
			array("title"=>"名古屋のセミナー","url"=>$domain."/seminavi.php?p=nagoya"),
			array("title"=>"福岡のセミナー","url"=>$domain."/seminavi.php?p=fukuoka"),
			array("title"=>"他都市のセミナー（イベントカレンダー）","url"=>$domain."/event.html"),
			array("title"=>"ワーホリ交流会（パーティー）","url"=>$domain."/party/")
		)
	);
	$menuleft['jawhm_about'] = array(
		"title"=> "ワーキング・ホリデーについて知りたい",
		'data'=>array(
			array("title"=>'ワーキング・ホリデー制度について','url'=>$domain."/system.html"),
			array("title"=>'はじめてのワーキング・ホリデー','url'=>$domain."/start.html"),
			array("title"=>'ワーキング・ホリデー協定国（ビザ情報）','url'=>$domain."/country")
		)
	);
	$menuleft['jawhm_about1'] =array(
		"title"=> "協会について知りたい",
		'data'=>array(
			array("title"=>'日本ワーキング・ホリデー協会活用ガイド','url'=>$domain."/katsuyou.html",'class'=>'border-pink'),
			array("title"=>'一般社団法人 日本ワーキング・ホリデー協会について','url'=>$domain."/about.html"),
			array("title"=>'協会のカウンセラー紹介','url'=>$domain."/interview/"),
			array("title"=>'メディア掲載','url'=>$domain."/ja/category/%E3%83%A1%E3%83%87%E3%82%A3%E3%82%A2%E6%8E%B2%E8%BC%89")
		)
	);
	$menuleft['jawhm_about2'] =array(
		"title"=> "協会のサポートを受けたい",
		'data'=>array(
			array("title"=>'成功のためのフルサポート≪協会サポートのご案内≫','url'=>$domain."/katsuyou.html",'class'=>'orange-menu'),
			array("title"=>'留学のサポートについて','url'=>$domain."/ryugakusupport/"),
			array("title"=>'帰国後のサポート','url'=>$domain."/return.html"),
			array("title"=>'よくある質問','url'=>$domain."/qa.html"),
			array("title"=>'講師派遣','url'=>$domain."/profile.html")
		)
	);
	$menuleft['information'] =array(
		"title" => "お役立ち情報",
		'data'  => array(
			array("title"=>'お役立ちリンク集','url'=>$domain.'/info.html'),
			array("title"=>'語学学校（海外・国内）','url'=>$domain.'/school/'),
			array("title"=>'サービス（保険・アコモデーション等）','url'=>$domain.'/service.html'),
			array("title"=>'ワーキング・ホリデー協会公式ブログ','url'=>$domain.'/blog/'),
			array("title"=>'外国人ワーキング・ホリデー青年','url'=>$domain.'/attention.html'),
			array("title"=>'Job Board （求人掲示板）','url'=>'http://www.job-board.info/'),
			array("title"=>'求人情報の掲載について','url'=>$domain.'/jobboard.html'),
			array("title"=>'アクセス（東京/大阪/名古屋/福岡）','url'=>$domain.'/office/'),
		)
	);
	$menuleft['sponsor'] = array(
		'title'=>'協賛企業を求めています',
		'data' => array(
			array('title'=>'企業会員について<br>（会員制度ご紹介・意義・メリット）','url'=>$domain."/mem-com.html"),
			array('title'=>'広告掲載のご案内','url'=>$domain."/adv.html"),
			array('title'=>'ボランティア・インターン募集','url'=>$domain.'/volunteer.html'),
			array('title'=>'個人情報の取扱','url'=>$domain.'/privacy.html'),
			array('title'=>'特定商取引に関する表記','url'=>$domain.'/about.html#deal'),
			array('title'=>'サイトマップ','url'=>$domain.'/sitemap.html'),
		)
	);
	/* end Free Working Holiday Seminar */
	echo json_encode($menuleft);exit;
?>