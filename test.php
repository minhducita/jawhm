<?php

$redirection='/m-index.php';

// If access with SSL(443) , Redirect Non-SSL page.
if( $_SERVER["SERVER_PORT"] == 443 ) {
    header( "location:" . "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] );
    exit;
}
require_once 'include/header.php';

$header_obj = new Header();

$header_obj->frontpage=true;
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。ワーホリなら日本ワーキングホリデー協会';
$header_obj->fncFacebookMeta_function= true;

$header_obj->mobileredirect=$redirection;

$header_obj->add_js_files = '<script src="/js/lightbox.js" type="text/javascript"></script>
<script src="/js/fbwall/jquery.neosmart.fb.wall.js" type="text/javascript"></script>
<script src="https://www.google.com/jsapi?key=ABQIAAAA1GaXyTxfx_EDrRX444NPQhQ3fj4XOcTTnvyZdGafpHojXl1fMRSD3wXKQgd9LOOX8nS2J9CjTLfu7A" type="text/javascript"></script>
<script src="/js/top.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery.timers.js"></script>
<script type="text/javascript" src="/feedback/incfb/fbcomment.js"></script>
';
$header_obj->add_css_files='<link href="/css/country-menu.css" rel="stylesheet" type="text/css" />
<link href="/js/fbwall/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css"/>';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />
<div style="position:absolute; top:154px; left:600px;">
    <a href="/seminar"><img src="/images/menu/seminar_top_off.png" alt="" /></a>
</div>';
$header_obj->fncMenuHead_h1text = '日本ワーキング・ホリデー協会　皆さんのワーホリと留学を応援します';
$header_obj->fncMenubar_msg = '<div style="background:navy; color:white; font-size:10pt; margin:55px 5px 0 12px; padding:5px 8px 5px 8px;">
                                協会からのお知らせ
                                </div>
                                <div style="border:1px #CCCCCC solid; margin:0 5px 0 12px; padding:10px 8px 10px 8px;">
                                <p>　一般社団法人日本ワーキング・ホリデー協会は政府のワーキングホリデー（ワーホリ）ビザ制度の政策に呼応してワーキング・ホリデー制度振興と利用促進により国際交 流の振興を図っています。<br />
                                相互理解の促進及び国際感覚豊かな勤労青少年の育成に資することを目的としています。</p>
                                <p>　その為、ワーキングホリデー（ワーホリ）ビザ制度を利用する方のサポートを積極的に行いマルチカルチュアルな海外での生活を通じて国際相互理解、地球環境の保全、男女共同参画社会、人種・性別等による差別や偏見の根絶、思想・信教・ 表現の自由の尊重等の理解を促進し、豊かな人間性を滋養していきます。</p>
                                <p>　また経験を生かした若者たちが帰国後に、よりよい未来を作ることができる国際人を育てていくと同時に、来日するワーキングホリデー（ワーホリ）外国人のサポートと来日外国人をもっと増やし日本の観光業の振興を目的に資するためのサポートを行っています。</p>
                                <p>　なお、当協会と旧社団法人日本ワーキング・ホリデー協会は異なる団体となります。</p>
                                </div>
                <!--  <p><a href="kyusyu.html"><img src="/images/sidebanner03.gif" alt="PickUp" /></a></p>-->
';

$header_obj->fncMenubar_advertisement=array(122,1,2,3,31);
$header_obj->display_header();

?>
</div>
</div>
<?php fncMenuFooter($header_obj->footer_type); ?>