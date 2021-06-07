<?php
/**
 * This will tell the blog
 * what image will be used
 * if a post does not
 * contain any images.
 */
 
// Use default no-image image?
// 0 = No || 1 = Yes
$default = 0;

// 画像がない場合の各国、日本スタッフブログの表示画像は以下から変更することができます。
// 例: /wp-content/uploads/2014/12/no_image.jpg
// パスは 'wp-content'から開始してください。(blow / blogは不要です） 
// 値が空欄の場合は、初期表示の画像を表示します。
// $school_no_image='';の「'';」内に画像パスを指定して下さい。

$default_img = 'wp-content/uploads/2014/12/no_image.jpg';

if ($b_id == 2) { // Australia Blog
	if ($p_id == 2) { // 語学学校 セルク School (selc)
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/selc_s.jpg';
	}
	if ($p_id == 17) { // Browns School
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/browns_s.jpg';
	}
	if ($p_id == 15) { // 語学学校 インパクト School (Impact)
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/impact_s.jpg';
	}
	if ($p_id == 25) { // 語学学校 インフォーラム School (inforum)
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/inforum_s.jpg';
	}
	if ($p_id == 26) { // 語学学校 ILSC School
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/ilsc_s.jpg';
	}
	if ($p_id == 27) { // 語学学校 ナビタス School (navitas)
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/navitas_s.jpg';
	}
	if ($p_id == 28) { // 語学学校 ICQA School
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/icqa_s.jpg';
	}
	if ($p_id == 29) { // 語学学校 OHC オーストラリア School
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/ohc_s.jpg';
	}
	if ($p_id == 30) { // 語学学校 フュージョン・イングリッシュ School (fusion)
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/fusion_s.jpg';
	}
	if ($p_id == 31) { // 語学学校 グリニッジ・イングリッシュ・カレッジ School (greenwich)
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/greenwich_s.jpg';
	}
	if ($p_id == 32) { // IH Sydney School
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/ihsy_s.jpg';
	}
	if ($p_id == 33) { // 語学学校 ビバ・カレッジ School (viva)
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/viva_s.jpg';
	}
	if ($p_id == 200) { //現地サポートオフィスシドニー
		$school_no_img = '/wp-content/uploads/sites/7/2015/02/tokyo-s.png';
	}
	if ($p_id == 210) { //語学学校 ディスカバー School (discover)
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/discover_s.gif';
	}
	if ($p_id == 217) { //語学学校 IH Brisbane School
		$school_no_img = '/wp-content/uploads/sites/2/2015/02/ihbne_s.gif';
	}
}

if ($b_id == 3) { // Canada Blog
	if ($p_id == 64) { // 語学学校 PGIC School
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/pg_s.jpg';
	}
	if ($p_id == 6) { // 語学学校 CCEL School
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/ccel_s.jpg';
	}
	if ($p_id == 50) { // 語学学校 UMC School
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/umc_s.jpg';
	}
	if ($p_id == 60) { // 語学学校 CPPC(Cornerstone Pan Pacific College) School
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/cppc_s.jpg';
	}
	if ($p_id == 37) { // 語学学校 KGIC School
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/kgic_s.jpg';
	}
	if ($p_id == 27) { // 語学学校 Ih バンクーバー School (ihvancouver)
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/ihvan_s.jpg';
	}
	if ($p_id == 83) { // International Language Academy of Canada – ILAC School
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/ilac_s.jpg';
	}
	if ($p_id == 2) { // 語学学校 ユーロセンター・カナダ School (eurocentres)
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/eurocentres.jpg';
	}
	if ($p_id == 72) { // 語学学校 クエスト School (quest)
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/quest_s.jpg';
	}
	if ($p_id == 194) { // 現地サポートオフィスバンクーバー 
		$school_no_img = '/wp-content/uploads/sites/7/2015/02/tokyo-s.png';
	}
	if ($p_id == 204) { // 語学学校 タムウッド School (tamwood)
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/tamwood_s.jpg';
	}
	if ($p_id == 206) { // 語学学校 エス・イー・シー School (sec)
		$school_no_img = '/wp-content/uploads/sites/3/2015/02/sec_s.gif';
	}
	if ($p_id == 299) { // 語学学校 Van West School (vanwest)
		$school_no_img = '/wp-content/uploads/sites/3/2016/03/vanwest_s.jpg';
	}
}

if ($b_id == 4) { // New Zealand Blog
	if ($p_id == 2) { // 語学学校 NZLC School
		$school_no_img = '/wp-content/uploads/sites/4/2015/02/nzlc_s.jpg';
	}
	if ($p_id == 23) { // 語学学校 WWSE
		$school_no_img = '/wp-content/uploads/sites/4/2015/02/wwse_s.jpg';
	}
}

if ($b_id == 5) { // United Kingdom Blog
	if ($p_id == 2) { // 語学学校 ブルームズブリー School (bloomsbury)
		$school_no_img = '/wp-content/uploads/sites/5/2015/02/bloomsbury_s.jpg';
	}
}
if ($b_id == 6) { // World Wide Blog
	if ($p_id == 2) { // 語学学校 エンバシー School (embassy)
		$school_no_img = '/wp-content/uploads/sites/6/2015/02/embassy_s.jpg';
	}
	if ($p_id == 21) { // 語学学校 カプラン School (kaplan)
		$school_no_img = '/wp-content/uploads/sites/6/2015/02/kaplan_s.gif';
	}
	if ($p_id == 30) { // 語学学校 OHC Group School (ohc)
		$school_no_img = '/wp-content/uploads/sites/6/2015/03/ohc_s.jpg';
	}
}
if ($b_id == 7) { // 東京スタッフブログ
	$school_no_img = '/wp-content/uploads/sites/7/2015/02/tokyo_s.jpg';
}
if ($b_id == 8) { // 大阪スタッフブログ
	$school_no_img = '/wp-content/uploads/sites/8/2015/02/osaka_s.jpg';
}
if ($b_id == 9) { // 名古屋スタッフブログ
	$school_no_img = '/wp-content/uploads/sites/9/2015/02/nagoya_s.jpg';
}
if ($b_id == 10) { // 福岡スタッフブログ
	$school_no_img = '/wp-content/uploads/sites/10/2015/02/fukuoka_s.jpg';
}
if ($b_id == 11) { // 沖縄スタッフブログ
	$school_no_img = '/wp-content/uploads/sites/11/2015/02/okinawa_s.jpg';
}
if ($b_id == 12) { // ワーホリストーリー
	$school_no_img = '/whstory/wp-content/uploads/sites/12/2015/02/whstory_s.jpg';
}
if ($b_id == 19) { // アクセスプリペイド
	$school_no_img = '/wp-content/uploads/sites/7/2015/02/tokyo-s.png';
}
if ($b_id == 20) { // コタロ英会話
	$school_no_img = '/wp-content/uploads/sites/7/2015/02/tokyo-s.png';
}
if ($b_id == 21) { // 震災留学サポート
	$school_no_img = '/wp-content/uploads/sites/7/2015/02/tokyo-s.png';
}
if ($b_id == 22) { // テスト用(未使用）
	$school_no_img = '/wp-content/uploads/sites/7/2015/02/tokyo-s.png';
}


?>