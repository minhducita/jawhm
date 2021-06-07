<?php
/* Header Image & Footer Color
 * 
 * スキンの設定の変更につきまして
 *
 * ======  1. ヘッダ画像の変更方法 =======
 * 対象の学校、日本スタッフブログ、または国の以下のコードの 「'';」部分に画像パスを入れることにより
 * ヘッダ部の画像を変更する事ができます。
 * $header_bg = ''; (空欄の場合は、初期表示の青＋雲の画像が表示されます。）
 * ↓
 * 例： $header_bg = 'wp-content/uploads/sites/2/2015/01/newssydney_header.jpg';
 * 
 * 
 * ====== 2. フッターの色の変更方法 =======
 * 対象の学校、日本スタッフブログ、または国の以下のコードの 「'';」部分に色の値を入れることにより
 * フッター部の色を変更することができます。
 * $footer_color = ''; (空欄の場合は、初期表示の紺色のフッター色となります。）
 * ↓
 * 例： $footer-color = '#FF0000';
 * （色の値は、１６進数 (#FF0000)、または色名 (red)を使用することができます。）
 *
 *
 * ======= 3. 初期表示の変更方法 ========
 * ヘッダ画像、フッターの色の値に何も指定しない場合（空欄）の表示を変こすることができます。
 * このページの最下部にあります以下のコードが初期表示の画像、フッター色の設定となっておりますので、
 * こちらを変更することにより、初期表示のヘッダ画像、フッター色を設定することができます。
 *
 * 初期表示用の設定（値に空欄を設定した場合の表示です。
 *	if ($header_bg == '') {
 *		$header_bg = 'wp-content/uploads/2014/10/post_header.jpg';
 *	}
 *	if ($footer_color == '') {
 *		$footer_color = '#000033';
 *  }
 *
 */


	if ($blog_id == 2) { // Australia Blog // オーストラリアブログの各学校の設定は以下から変更できます。
		if ($p_id == 2) { // 語学学校 セルク School (selc)
			$header_bg = '/wp-content/uploads/sites/2/2015/02/selc_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 17) { // Browns School
			$header_bg = '/wp-content/uploads/sites/2/2015/02/browns_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}

		if ($p_id == 217) { // IH Brisbane
			$header_bg = '/wp-content/uploads/sites/2/2016/02/ihbne_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 15) { // 語学学校 インパクト School (Impact)　※非掲載
			$header_bg = 'wp-content/uploads/sites/7/2015/02/tokyo_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 210) { // 語学学校 Discover
			$header_bg = '/wp-content/uploads/sites/2/2015/02/discover_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 25) { // 語学学校 インフォーラム School (inforum)
			$header_bg = '/wp-content/uploads/sites/2/2015/02/inforum_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 26) { // 語学学校 ILSC School
			$header_bg = '/wp-content/uploads/sites/2/2015/02/ilsc_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 27) { // 語学学校 ナビタス School (navitas)
			$header_bg = '/wp-content/uploads/sites/2/2015/02/navitas_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 28) { // 語学学校 ICQA School
			$header_bg = '/wp-content/uploads/sites/2/2015/02/icqa_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 29) { // 語学学校 OHC オーストラリア School
			$header_bg = '/wp-content/uploads/sites/2/2015/02/ohcaus_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 30) { // 語学学校 フュージョン・イングリッシュ School (fusion)
			$header_bg = '/wp-content/uploads/sites/2/2015/02/fusion_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 31) { // 語学学校 グリニッジ・イングリッシュ・カレッジ School (greenwich)
			$header_bg = '/wp-content/uploads/sites/2/2015/02/greenwich_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 32) { // IH Sydney School
			$header_bg = '/wp-content/uploads/sites/2/2015/02/ihsy_header.gif';
			$header_name = '語学学校 In シドニー';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 33) { // 語学学校 ビバ・カレッジ School (viva)
			$header_bg = '/wp-content/uploads/sites/2/2015/02/viva_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 200) { //newssydney //現地オフィス　オーストラリアの設定は以下から変更できます。
			$header_bg = 'wp-content/uploads/sites/2/2015/01/newssydney_header.jpg';
			$header_name = '現地サポートオフィス　－オーストラリア　シドニー－';
			$header_font_color = '';
			$footer_color = '';
		}
	}
	if ($blog_id == 3) { // Canada Blog // カナダブログの各学校の設定は以下から変更できます。
		if ($p_id == 64) { // 語学学校 PGIC School
			$header_bg = '/wp-content/uploads/sites/3/2015/02/pgic_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 6) { // 語学学校 CCEL School
			$header_bg = '/wp-content/uploads/sites/3/2015/02/ccel_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 50) { // 語学学校 UMC School
			$header_bg = '/wp-content/uploads/sites/3/2015/02/umc_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 60) { // 語学学校 CPPC(Cornerstone Pan Pacific College) School ※非掲載
			$header_bg = 'wp-content/uploads/sites/7/2015/02/tokyo_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 37) { // 語学学校 KGIC School
			$header_bg = '/wp-content/uploads/sites/3/2015/02/kgic_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 27) { // 語学学校 Ih バンクーバー School (ihvancouver)
			$header_bg = '/wp-content/uploads/sites/3/2015/02/ihvan_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 83) { // International Language Academy of Canada – ILAC School
			$header_bg = '/wp-content/uploads/sites/3/2015/02/ilac_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 2) { // 語学学校 ユーロセンター・カナダ School (eurocentres)
			$header_bg = '/wp-content/uploads/sites/3/2015/02/eurocentres_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 72) { // 語学学校 クエスト School (quest)
			$header_bg = '/wp-content/uploads/sites/3/2015/02/quest_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 204) { // Tamwood
			$header_bg = '/wp-content/uploads/sites/3/2015/02/tamwood_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 206) { // SEC
			$header_bg = '/wp-content/uploads/sites/3/2015/02/sec_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 299) { // 語学学校 VanWest
			$header_bg = '/wp-content/uploads/sites/3/2016/03/vanwest_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}

		if ($p_id == 194) { // newsvancouver //現地オフィス　カナダの設定は以下から変更できます。
			$header_bg = 'wp-content/uploads/sites/3/2015/01/header_newsvancouver.jpg';
			$header_name = '現地サポートオフィス　－カナダ　バンクーバー－';
			$header_font_color = '';
			$footer_color = '';
		}
	}
	if ($blog_id == 4) { // New Zealand Blog // ニュージーランドブログの学校の設定は以下から変更できます。
		if ($p_id == 2) { // 語学学校 NZLC School
			$header_bg = 'wp-content/uploads/sites/4/2015/02/nzlc_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 23) { // 語学学校 WWSE
			$header_bg = '/wp-content/uploads/sites/4/2015/02/wwse_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
	}
	if ($blog_id == 5) { // United Kingdom Blog // イギリスブログの学校の設定は以下から変更できます。
		if ($p_id == 2) { // 語学学校 ブルームズブリー School (bloomsbury)
			$header_bg = 'wp-content/uploads/sites/5/2015/02/blooms_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
	}
	if ($blog_id == 6) { // World Wide Blog // ワールドブログの学校の設定は以下から変更できます。
		if ($p_id == 2) { // 語学学校 エンバシー School (embassy)
			$header_bg = 'wp-content/uploads/sites/6/2015/02/embassy_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 21) { // 語学学校 Kaplan
			$header_bg = '/wp-content/uploads/sites/6/2015/02/kaplan_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
		if ($p_id == 30) { // 語学学校 OHC
			$header_bg = '/wp-content/uploads/sites/6/2015/03/ohc_header.gif';
			$header_name = '';
			$header_font_color = '';
			$footer_color = '';
		}
	}
	if ($blog_id == 7) { // Tokyo Blog // 東京スタッフブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = 'wp-content/uploads/sites/7/2015/02/tokyo_header.gif';
			$header_name = '日本ワーキングホリデー協会　東京オフィス';
			$header_font_color = '';
			$footer_color = '';
		//}
	}
	if ($blog_id == 8) { // Osaka Blog // 大阪スタッフブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = 'wp-content/uploads/sites/8/2015/02/osaka_header.gif';
			$header_name = '日本ワーキングホリデー協会　大阪オフィス';
			$header_font_color = '';
			$footer_color = '';
		//}
	}
	if ($blog_id == 9) { // Nagoya Blog // 名古屋スタッフブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = '/wp-content/uploads/sites/9/2015/02/nagoya_header.gif';
			$header_name = '日本ワーキング・ホリデー協会 名古屋オフィス';
			$header_font_color = '';
			$footer_color = '#3e522a';
		//}
	}
	if ($blog_id == 10) { // Fukuoka Blog // 福岡スタッフブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = '/wp-content/uploads/sites/10/2015/02/fukuoka_header.gif';
			$header_name = '日本ワーキング・ホリデー協会 福岡オフィス';
			$header_font_color = '';
			$footer_color = '';
		//}
	}
	if ($blog_id == 11) { // Okinawa Blog // 沖縄スタッフブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = '/wp-content/uploads/sites/11/2015/02/okinawa_header.gif';
			$header_name = '日本ワーキング・ホリデー協会　沖縄オフィス';
			$header_font_color = '';
			$footer_color = '';
		//}
	}
	if ($blog_id == 12) { // WH Story Blog // ワーホリストーリーブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = '/wp-content/uploads/sites/12/2015/02/whst_header.gif';
			$header_name = 'WORKING HOLIDAY STORY';
			$header_font_color = '';
			$footer_color = '';
		//}
	}
	if ($blog_id == 19) { // Access Prepaid Blog // アクセスプリペイドブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = '';
			$header_name = '情報発信ブログ　－アクセスプリペイド－';
			$header_font_color = '';
			$footer_color = '';
		//}
	}
	if ($blog_id == 20) { // kotanglish Blog // コタロ英会話ブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = '';
			$header_name = 'コタローのフレーズ英会話';
			$header_font_color = '';
			$footer_color = '';
		//}
	}
	if ($blog_id == 21) { // srs Blog // 震災レポートブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = '';
			$header_name = '震災留学サポート';
			$header_font_color = '';
			$footer_color = '';
		//}
	}
	if ($blog_id == 22) { // jawhm Blog // テスト用ブログの設定は以下から変更できます。
		//if ($p_id == ) {
			$header_bg = '';
			$header_name = 'テスト用';
			$header_font_color = '';
			$footer_color = '';
		//}
	}
	
	//if ($blog_id == ) { //予備用です。（現在は使用されていません。）
		//if ($p_id == ) { 
			//$header_bg = '';
			//$header_name = '';
			//$header_font_color = '';
			//$footer_color = '';
		//}
	//}
	
	/* 初期表示用の設定（値に空欄を設定した場合の表示です。 */
	if ($header_bg == '') {
		$header_bg = 'wp-content/uploads/2014/10/post_header.jpg';
	}
	if ($footer_color == '') {
		$footer_color = '#000033';
	}
	if ($header_font_color == '') {
		$header_font_color = 'white';
	}
	
?>