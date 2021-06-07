<?php
/**
 * =============== サムネイルの三角表示の色、表示テキスト色の変更方法 ========================
 * 変更したい国、日本スタッフブログの$triangle_color[] = ''; の「'';」内に１６進数(#FFF000)、または色名 (red)を入れます。
 * 三角部の表示テキスト色の変更は対象の$font_color[] = ''; の「'';」内に１６進数(#FFF000)、または色名 (red)を入れます。
 * 例： $triangle_color[] = 'blue';
 * 例： $font_color[] = 'black';
 * 上記は三角部が青で、表示フォントが黒の場合です。
 */
 
/* 0 = 初期設定　- 値を空欄にした場合はこちらの設定が反映されます。 */
$triangle_color[] = '#000033';
$font_color[] = 'white';
 
/* 1 = Blank - こちらは編集しないでください。 */
$triangle_color[] = '';
$font_color[] = '';
 
/* 2 = オーストラリアブログの三角表示、テキスト色の変更はこちらを変更してください。 */
$triangle_color[] = 'orange';
$font_color[] = 'white';
$australia_school = array(
/* 
 * ========= 三角内のテキスト変更 (学校） ================
 * オーストラリアの各学校の三角表示のテキスト値は以下の数字の隣の「'',」内に表示したい値を入れて下さい。
 * (数字は各学校のIDです。）
 * 値の途中にスペースを追加(例： IH Sydney)しますと、表示が崩れる恐れがありますので、空白を値の中に挟まないようにしてください。
 * 例： '28', 'ICQA', // 語学学校ICQA
 */
	'32', 'IHSydney', // インターナショナルハウスシドニー (IH Sydney)
	'17', 'BROWNS', // ブラウンズ (Browns)
	'28', 'ICQA', // 語学学校ICQA
	'26', 'ILSC', // 語学学校ILSC
	'29', 'OHC', // 語学学校OHC オーストラリア (Holmes)
	'15', 'Impact', // 語学学校インパクト(Impact)
	'25', 'Inforum', // 語学学校インフォーラム (inforum)
	'31', 'Greenwich', // 語学学校グリニッジ・イングリッシュ・カレッジ (greenwich)
	'2', 'SELC', // 語学学校 セルク (selc)
	'27', 'Navitas', // 語学学校 ナビタス (navitas)
	'33', 'Viva', // 語学学校 ビバ・カレッジ (viva)
	'30', 'Fusion', // 語学学校 フュージョン・イングリッシュ (fusion)
	'210', 'Discover', // 語学学校 ディスカバー (discover)
	'217', 'IH Brisbane', // 語学学校 インターナショナルハウスブリスベン (IH Sydney)
);
 
/* 3 = カナダブログの三角表示、テキスト色の変更はこちらを変更してください。 */
$triangle_color[] = 'red';
$font_color[] = 'white';
$canada_school = array(
/* 
 * ==== カナダの各学校の三角表示のテキストは以下から変更することができます。 ======
 */
	'83', 'ILAC', // International Language Academy of Canada – ILAC
	'6', 'CCEL', // 語学学校 CCEL
	'60', 'CAC', // 語学学校 CAC(Cornerstone Academic College)
	'27', 'IHvancouver', // インターナショナルハウスバンクーバー (IH vancouver)
	'37', 'KGIC', // 語学学校 KGIC
	'64', 'PGIC', // 語学学校 PGIC
	'50', 'UMC', // 語学学校 UMC
	'72', 'Quest', // 語学学校 クエスト(quest)
	'2', 'Eurocentres', // 語学学校 ユーロセンター・カナダ(eurocentres)
	'204', 'Tamwood', // 語学学校 タムウッド(tamwood)
	'206', 'SEC', // 語学学校 エス・イー・シー(sec)

);
 
/* 4 = ニュージーランドブログの三角表示、テキスト色の変更はこちらを変更してください。 */
$triangle_color[] = 'green';
$font_color[] = 'white';
$new_zealand_school = array(
/* 
 * ==== ニュージーランドの学校の三角表示のテキストは以下から変更することができます。 ======
 */
	'2', 'NZLC', // 語学学校 NZLC School
	'23', 'WWSE', // 語学学校 WWSE

);
 
/* 5 = イギリスブログの三角表示、テキスト色の変更はこちらを変更してください。 */
$triangle_color[] = 'purple';
$font_color[] = 'white';
$united_kingdom_school = array(
/* 
 * ==== イギリスの学校の三角表示のテキストは以下から変更することができます。 ======
 */
	'2', 'Bloomsbury', // 語学学校 ブルームズブリー School (bloomsbury)
);
 
/* 6 = ワールドブログの三角表示、テキスト色の変更はこちらを変更してください。 */
$triangle_color[] = 'blue';
$font_color[] = 'white';
$world_school = array(
/* 
 * ==== ワールドの学校の三角表示のテキストは以下から変更することができます。 ======
 */
	'2', 'Embassy', // 語学学校 エンバシー School (embassy)
	'21', 'Kaplan', // 語学学校 カプラン School (kaplan)
	'30', 'OHC', // 語学学校 OHC Group School (ohc)
);

/* 
 *
 * ============ここから日本スタッフブログ================
 * 日本スタッフブログやコタロ英会話用の三角表示の色、テキスト色、テキストの値は以下から変更できます。
 * 日本スタッフブログの場合は、値の変更方式が少々異なります。
 * 三角表示の色、表示テキストの色は各国と同じように以下の部分を変更してください。
 * $triangle_color[] = '#0363B3';
 * $font_color[] = 'white';
 * 
 * テキストの値の変更は$triangle_name[] = ''; の「'';」内に表示したいテキスト値を入力してください。
 * 例： $triangle_name[] = 'TOKYO';
 * 学校を持たない日本スタッフブログ、コタロ英会話の場合は、もし値を$triangle_name[] = ''; のように、空欄にした場合は、
 * ブログ名を代わりに表示します。
*/ 

/* 7 = 東京スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */
$triangle_color[] = '#0363B3';
$font_color[] = 'white';
$triangle_name[] = 'TOKYO';
 
/* 8 = 大阪スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */
$triangle_color[] = '#F67294';
$font_color[] = 'white';
$triangle_name[] = 'OSAKA';
 
/* 9 = 名古屋スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */
$triangle_color[] = '#00B38C';
$font_color[] = 'white';
$triangle_name[] = 'NAGOYA';
 
/* 10 = 福岡スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */
$triangle_color[] = '#FFBB39';
$font_color[] = 'white';
$triangle_name[] = 'FUKUOKA';
 
/* 11 = 沖縄スタッフブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */
$triangle_color[] = '#37BAFF';
$font_color[] = 'white';
$triangle_name[] = 'OKINAWA';
 
/* 12 = ワーホリストーリーブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。*/
$triangle_color[] = '';
$font_color[] = 'white';
$triangle_name[] = 'WHStory';
 
/* 13 = Blank - こちらは編集しないでください。 */
$triangle_color[] = '';
$font_color[] = '';
$triangle_name[] = '';
 
/* 14 = Blank - こちらは編集しないでください。 */
$triangle_color[] = '';
$font_color[] = '';
$triangle_name[] = '';
 
/* 15 = Blank - こちらは編集しないでください。 */
$triangle_color[] = '';
$font_color[] = '';
$triangle_name[] = '';
 
/* 16 = Blank - こちらは編集しないでください。 */
$triangle_color[] = '';
$font_color[] = '';
$triangle_name[] = '';
 
/* 17 = Blank - こちらは編集しないでください。 */
$triangle_color[] = '';
$font_color[] = '';
$triangle_name[] = '';
 
/* 18 = Blank - こちらは編集しないでください。 */
$triangle_color[] = '';
$font_color[] = '';
$triangle_name[] = '';
 
/* 19 = アクセスプリペイドブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */
$triangle_color[] = '';
$font_color[] = 'white';
$triangle_name[] = 'AccessPrepaid';
 
/* 20 = コタロ英会話 (kotanglish)ブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。*/
$triangle_color[] = '#00b8d2';
$font_color[] = 'white';
$triangle_name[] = 'Kotanglish';
 
/* 21 = 震災留学サポートブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。 */
$triangle_color[] = '';
$font_color[] = 'white';
$triangle_name[] = 'SRS';
 
/* 22 = テスト用ブログの三角表示の色、テキスト色、テキストの値はこちらから変更します。*/
$triangle_color[] = '';
$font_color[] = 'white';
$triangle_name[] = 'Test';

?>