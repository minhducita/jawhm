<?php

/*
 * 以下からスマホサイトの各学校、および日本スタッフブログのヘッダー画像の入れ替えをすることができます。
 * $header_bg =''; 部に画像のURLを指定してください。
 *
*/

/* 値が空の場合の初期表示画像 */
$default_header_bg = 'wp-content/uploads/2014/12/tokyo-blog-banner3.png';
/* End of Default Settings */

if ($b_id == 1) { // Index Top Page
	$header_bg = 'wp-content/uploads/2015/01/sub_content_title2.png';
}
if ($b_id == 2) { // Australia Blog
	$header_bg = 'wp-content/uploads/2015/01/new-au-banner2.png'; // Australia Top
/* ========================= オーストラリアの学校 =================== */	
	if ($p_id == 2) { // 語学学校 セルク (selc)
		$header_bg = 'wp-content/uploads/sites/2/2015/02/selc_sp.jpg';
	}
	if ($p_id == 206) { // SEC
		$header_bg = '/wp-content/uploads/sites/3/2015/02/sec_sp.gif';
	}
	if ($p_id == 204) { // Tamwood
		$header_bg = '/wp-content/uploads/sites/3/2015/02/tamwood_sp.gif';
	}
	if ($p_id == 217) { // IH BRISBANE
		$header_bg = '/wp-content/uploads/sites/2/2015/02/ibri_sp.gif';
	}
	if ($p_id == 17) { // Browns School
		$header_bg = 'wp-content/uploads/sites/2/2015/02/browns_sp.jpg';
	}
	if ($p_id == 15) { // 語学学校 インパクト(Impact)
		$header_bg = 'wp-content/uploads/sites/2/2015/02/impact_sp.jpg';
	}
	if ($p_id == 25) { // 語学学校 インフォーラム (inforum)
		$header_bg = 'wp-content/uploads/sites/2/2015/02/inforum_sp.jpg';
	}
	if ($p_id == 26) { // 語学学校 ILSC School
		$header_bg = 'wp-content/uploads/sites/2/2015/02/ilsc_sp.jpg';
	}
	if ($p_id == 27) { // 語学学校 ナビタス (navitas)
		$header_bg = 'wp-content/uploads/sites/2/2015/02/navitas_sp.jpg';
	}
	if ($p_id == 28) { // 語学学校 ICQA
		$header_bg = 'wp-content/uploads/sites/2/2015/02/icqa_sp.jpg';
	}
	if ($p_id == 29) { // 語学学校 OHC オーストラリア
		$header_bg = 'wp-content/uploads/sites/2/2015/02/ohc_sp.jpg';
	}
	if ($p_id == 30) { // 語学学校 フュージョン・イングリッシュ (fusion)
		$header_bg = 'wp-content/uploads/sites/2/2015/02/fusion_sp.jpg';
	}
	if ($p_id == 31) { // 語学学校 グリニッジ・イングリッシュ・カレッジ (greenwich)
		$header_bg = 'wp-content/uploads/sites/2/2015/02/greenwich_sp.jpg';
	}
	if ($p_id == 32) { // IH Sydney School
		$header_bg = 'wp-content/uploads/sites/2/2015/02/ih_sp.jpg';
	}
	if ($p_id == 33) { // 語学学校 ビバ・カレッジ School (viva)
		$header_bg = 'wp-content/uploads/sites/2/2015/02/viva_sp.jpg';
	}
	if ($p_id == 210) { // 語学学校 Discover
		$header_bg = '/wp-content/uploads/sites/2/2015/02/discover_sp.gif';
	}
	if ($p_id == 200) { //newssydney
		$header_bg = '';
	}
} 
if ($b_id == 3) { // Canada Blog
	$header_bg = 'wp-content/uploads/2015/01/new-ca-banner2.png'; // Canada Top
/* ========================= カナダの学校 =================== */	
	if ($p_id == 64) { // 語学学校 PGIC
		$header_bg = '/wp-content/uploads/sites/3/2015/02/pg_sp.jpg';
	}
	if ($p_id == 6) { // 語学学校 CCEL
		$header_bg = '/wp-content/uploads/sites/3/2015/02/ccel_sp.jpg';
	}
	if ($p_id == 50) { // 語学学校 UMC
		$header_bg = '/wp-content/uploads/sites/3/2015/02/umc_sp.jpg';
	}
	if ($p_id == 60) { // 語学学校 CAC
		$header_bg = '/wp-content/uploads/sites/3/2015/06/cac.gif';
	}
	if ($p_id == 37) { // 語学学校 KGIC
		$header_bg = '/wp-content/uploads/sites/3/2015/02/kg_sp.jpg';
	}
	if ($p_id == 27) { // 語学学校 Ih バンクーバー  (ihvancouver)
		$header_bg = '/wp-content/uploads/sites/3/2015/02/ihvan_sp.jpg';
	}
	if ($p_id == 83) { // International Language Academy of Canada – ILAC
		$header_bg = '/wp-content/uploads/sites/3/2015/02/ilac_sp.jpg';
	}
	if ($p_id == 2) { // 語学学校 ユーロセンター・カナダ (eurocentres)
		$header_bg = '/wp-content/uploads/sites/3/2015/02/eurocentres_sp.jpg';
	}
	if ($p_id == 72) { // 語学学校 クエスト(quest)
		$header_bg = '/wp-content/uploads/sites/3/2015/02/quest_sp.jpg';
	}
	if ($p_id == 206) { // 語学学校 sec
		$header_bg = '/wp-content/uploads/sites/3/2015/02/sec_sp.gif';
	}
	if ($p_id == 204) { // 語学学校 Tamwood
		$header_bg = '/wp-content/uploads/sites/3/2015/02/tamwood_sp.gif';
	}
	if ($p_id == 194) { // newsvancouver
		$header_bg = '';
	}
}
if ($b_id == 4) { // New Zealand Blog
	$header_bg = 'wp-content/uploads/2015/01/new-nz-banner2.png'; // New Zealand Top
/* ========================= ニュージーランドの学校 =================== */	
	if ($p_id == 2) { // 語学学校 NZLC School
		$header_bg = '/wp-content/uploads/sites/4/2015/02/nzlc_sp.jpg';
	}
	if ($p_id == 23) { // WWSE
		$header_bg = '/wp-content/uploads/sites/4/2015/02/wws_sp.gif';
	}
}
if ($b_id == 5) { // United Kingdom Blog
	$header_bg = 'wp-content/uploads/2015/01/uk-choice-banner2.png'; // United Kingdom Top
/* ========================= イギリスの学校 =================== */	
	if ($p_id == 2) { // 語学学校 ブルームズブリー School (bloomsbury)
		$header_bg = '/wp-content/uploads/sites/5/2015/02/blooms_sp.jpg';
	}
}
if ($b_id == 6) { // World Wide Blog
	$header_bg = 'wp-content/uploads/2015/01/new-worldwide-banner.png'; // World Wide Top
/* ========================= ワールドの学校 =================== */	
	if ($p_id == 2) { // 語学学校 エンバシー School (embassy)
		$header_bg = '/wp-content/uploads/sites/6/2015/02/embassy_sp.jpg';
	}
	if ($p_id == 21) { // 語学学校 KAPLAN
		$header_bg = '/wp-content/uploads/sites/6/2015/02/kaplan_sp.gif';
	}
	if ($p_id == 30) { // 語学学校 OHCGroup
		$header_bg = '/wp-content/uploads/sites/6/2015/03/ohc_sp.jpg';
	}


}
if ($b_id == 7) { // 東京スタッフブログ
	$header_bg = '/wp-content/uploads/sites/7/2015/02/tokyo_sp.jpg';
}
if ($b_id == 8) { // 大阪スタッフブログ
	$header_bg = '/wp-content/uploads/sites/8/2015/02/osaka_sp.jpg';
}
if ($b_id == 9) { // 名古屋スタッフブログ
	$header_bg = '/wp-content/uploads/sites/9/2015/02/nagoya_sp.jpg';
}
if ($b_id == 10) { // 福岡スタッフブログ
	$header_bg = 'wp-content/uploads/sites/10/2015/02/fukuoka_sp.jpg';
}
if ($b_id == 11) { // 沖縄スタッフブログ
	$header_bg = '/wp-content/uploads/sites/11/2015/02/okinawa_sp.jpg';
}
if ($b_id == 12) { // ワーホリストーリー
	$header_bg = '/wp-content/uploads/sites/12/2015/02/whst_sp.jpg';
}
if ($b_id == 19) { // アクセスプリペイド
	$header_bg = '';
}
if ($b_id == 20) { // コタロ英会話
	$header_bg = '';
}
if ($b_id == 21) { // 震災留学サポート
	$header_bg = '';
}
if ($b_id == 22) { // テスト用
	$header_bg = '';
}

?>