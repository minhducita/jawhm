<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='アクセス';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協会の各オフィスのご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/access-mainimg.gif" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '日本ワーキング・ホリデー協会オフィスへのアクセス';

$header_obj->add_css_files='<link href="/school/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />';
$header_obj->add_js_files='<script src="/school/lib/jquery.js" type="text/javascript"></script>
<script src="/school/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$("a[rel*=facebox]").facebox({
loadingImage : "/office/src/loading.gif",
closeImage   : "/office/src/closelabel.png"
})
})
</script>';

$header_obj->display_header();

?>

	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
	  <h2 class="sec-title">日本ワーキングホリデー協会　各オフィスへのご案内</h2>

	<?php if($header_obj->mobilepage)	{ ?>
		<link rel="stylesheet" href="css/map-sp.css">
		<div class="main-content container">
			<div class="main-content-left nopadding col-md-9 cl-sm-9 col-xs-12">
				<!-- office-map -->
				<div class="office-map">
					<div class="map-content">
						<h2><img class="icon" src="images/place-round.png">日本ワーキングホリデー協会</h2>
						<img id="Image-Maps-Com-image-maps-2018-02-08-221220" src="http://www.image-maps.com/m/private/0/b1b7o14suflvcjh75dg5k9p0c6_map-moblie.png" border="0" width="320" height="601" orgWidth="320" orgHeight="601" usemap="#image-maps-2018-02-08-221220" alt="" />
						<map name="image-maps-2018-02-08-221220" id="ImageMapsCom-image-maps-2018-02-08-221220">
							<area  alt="大阪オフィス" title="大阪オフィス" href="https://www.jawhm.or.jp/office/osaka/" shape="rect" coords="26,292,136,319" style="outline:none;" target="_self"     />
							<area  alt="東京オフィス" title="東京オフィス" href="https://www.jawhm.or.jp/office/tokyo/" shape="rect" coords="99,256,209,283" style="outline:none;" target="_self"     />
							<area  alt="福岡オフィス" title="福岡オフィス" href="https://www.jawhm.or.jp/office/fukuoka/" shape="rect" coords="102,405,212,432" style="outline:none;" target="_self"     />
							<area  alt="沖縄オフィス" title="沖縄オフィス" href="https://www.jawhm.or.jp/office/okinawa/" shape="rect" coords="92,507,202,534" style="outline:none;" target="_self"     />
							<area  alt="名古屋オフィス" title="名古屋オフィス" href="https://www.jawhm.or.jp/office/nagoya/" shape="rect" coords="205,357,315,384" style="outline:none;" target="_self"     />
							<area shape="rect" coords="318,599,320,601" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
						</map>
					</div>
					<div class="map-bottom">
						<ul class="list-office">
							<li><a href="/office/tokyo/">東京オフィス（新宿本店）</a></li>
							<li><a href="/office/osaka/">大阪オフィス</a></li>
							<li><a href="/office/nagoya/">名古屋オフィス</a></li>
							<li><a href="/office/okinawa/">沖縄オフィス</a></li>
							<li><a href="/office/fukuoka/">福岡オフィス</a></li>
						</ul>
					</div>
				</div><!-- office-map -->
			</div><!-- main-content-left -->
			<div class="nopadding col-md-3 sidebar"></div>
		</div><!-- main content -->
	<?php }else{	?>
		
		<!--	<div style="margin:30px 0 0 80px; padding-top:20px;">
			<img src="/office/japan.png" usemap="#japan">
			<map name="japan">
				<area shape="rect" coords="323,238,462,303" href="/office/tokyo/" alt="東京オフィス">
				<area shape="rect" coords="141,263,278,307" href="/office/osaka/" alt="大阪オフィス">
				<area shape="rect" coords="215,326,383,383" href="/office/nagoya/" alt="名古屋オフィス">
				<area shape="rect" coords="0,258,123,315" href="/office/fukuoka/" alt="福岡オフィス">
				<area shape="rect" coords="11,371,160,420" href="/office/okinawa/" alt="沖縄オフィス">
			</map>
		</div> -->
		<link rel="stylesheet" href="css/style.css">
		<div class="main-content container">
		<div class="main-content-left nopadding col-md-9 cl-sm-9 col-xs-12">
			<!-- office-map -->
			<div class="office-map">
				<div class="map-content">
					<div class="img"><img src="images/place-round.png">日本ワーキングホリデー協会</div>
					<img id="Image-Maps-Com-image-maps-2018-01-22-212913" src="images/map.png" border="0" width="680" height="540" orgWidth="680" orgHeight="540" usemap="#image-maps-2018-01-22-212913" alt="" />
					<!-- <map name="image-maps-2018-01-22-212913" id="ImageMapsCom-image-maps-2018-01-22-212913">
					<area  alt="福岡オフィス" title="" href="https://www.jawhm.or.jp/office/fukuoka/" shape="rect" coords="29,213,159,248" style="outline:none;" target="_self"     />
					<area  alt="大阪オフィス" title="" href="https://www.jawhm.or.jp/office/osaka/" shape="rect" coords="200,214,330,249" style="outline:none;" target="_self"     />
					<area  alt="名古屋オフィス" title="" href="https://www.jawhm.or.jp/office/nagoya/m/" shape="rect" coords="198,346,328,381" style="outline:none;" target="_self"     />
					<area  alt="沖縄オフィス" title="" href="https://www.jawhm.or.jp/office/okinawa/" shape="rect" coords="140,440,270,475" style="outline:none;" target="_self"     />
					<area  alt="東京オフィス" title="" href="https://www.jawhm.or.jp/office/tokyo/" shape="rect" coords="518,351,648,386" style="outline:none;" target="_self"     />
					<area shape="rect" coords="678,538,680,540" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
					</map> -->
					<map name="image-maps-2018-03-13-225615" id="ImageMapsCom-image-maps-2018-03-13-225615">
                        <area  alt="福岡オフィス" title="" href="https://www.jawhm.or.jp/office/fukuoka/" shape="rect" coords="19,199,151,235" style="outline:none;" target="_self"     />
                        <area  alt="大阪オフィス" title="" href="https://www.jawhm.or.jp/office/osaka/" shape="rect" coords="180,215,312,251" style="outline:none;" target="_self"     />
                        <area  alt="名古屋オフィス" title="" href="https://www.jawhm.or.jp/office/nagoya/" shape="rect" coords="168,354,300,390" style="outline:none;" target="_self"     />
                        <area  alt="東京オフィス" title="" href="https://www.jawhm.or.jp/office/tokyo/" shape="rect" coords="519,360,651,396" style="outline:none;" target="_self"     />
                        <area  alt="沖縄オフィス" title="" href="https://www.jawhm.or.jp/office/okinawa/" shape="rect" coords="124,454,256,490" style="outline:none;" target="_self"     />
                        <area shape="rect" coords="678,538,680,540" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
                    </map>
				</div>
				<div class="map-bottom">
					<ul class="list-office">
						<li><a href="/office/tokyo/">東京オフィス <br>
						（新宿本店）</a></li>
						<li><a href="/office/osaka/">大阪オフィス</a></li>
						<li><a href="/office/nagoya/">名古屋オフィス</a></li>
						<li><a href="/office/okinawa/">沖縄オフィス</a></li>
						<li><a href="/office/fukuoka/">福岡オフィス</a></li>
					</ul>
				</div>
			</div><!-- office-map -->
		</div><!-- main-content-left -->
		<div class="nopadding col-md-3 sidebar"></div>
	</div><!-- main content -->
		
	<?php } ?>



	<!--a href="/office/tokyo/"><h3 class="table-base-title" style="font-size:13pt;" id="tokyo-office">東京オフィス（新宿本店）</h3></a>
	<a href="/office/osaka/"><h3 class="table-base-title" style="font-size:13pt;" id="tokyo-office">大阪オフィス</h3></a>
	<a href="/office/nagoya/"><h3 class="table-base-title" style="font-size:13pt;" id="tokyo-office">名古屋オフィス</h3></a>
	<a href="/office/fukuoka/"><h3 class="table-base-title" style="font-size:13pt;" id="tokyo-office">福岡オフィス</h3></a>
	<a href="/office/okinawa/"><h3 class="table-base-title" style="font-size:13pt;" id="tokyo-office">沖縄オフィス</h3></a-->

	  <h2 class="sec-title">オフィスの様子</h2>
	<div align="center">
	<SCRIPT type="text/javascript" SRC="./image.json"></SCRIPT>
	<SCRIPT language="JavaScript">
		<!--
		// ランダムに画像を表示する(3 * 3)、重複なし
		var used_num = [];
		var number;
		var counter = 0;
		var writeable;
		writeable = "<div class='office-images'>"
		for (var i=0; i<3; i++) {
			for(var j=0; j<3; j++) {
				number = Math.floor(Math.random() * Object.keys(image).length);
				while ($.inArray(number, used_num) >= 0) {
					number = Math.floor(Math.random() * Object.keys(image).length);
				}
				used_num[counter] = number;
				counter++;
				writeable += "<img src='" + image[number].photo + "' border='0'>"+ "  ";

			}
		}
		writeable += "</div>";
		document.write(writeable);
		//-->
	</SCRIPT>
		<br />
		<br />


<!--		<table>
		<td bgcolor="#1e90ff" colspan="5"><center><font color="#ffffff" size="3">TOKYO OFFICE</font></center></td>
		<tr>
			<td><a href="/office/images/tk_01_lrg.jpg" rel="facebox"><img src="/office/images/tk_01_sml.jpg"></a></td>
			<td width="30px">&nbsp;</td>
			<td><a href="/office/images/tk_02_lrg.jpg" rel="facebox"><img src="/office/images/tk_02_sml.jpg"></a></td>
			<td width="30px">&nbsp;</td>
			<td><a href="/office/images/tk_03_lrg.jpg" rel="facebox"><img src="/office/images/tk_03_sml.jpg"></a></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<td bgcolor="#ffc0cb" colspan="5"><center><font color="#ffffff" size="3">OSAKA OFFICE</font></center></td>
		<tr>
			<td><a href="/office/images/ok_01_lrg.jpg" rel="facebox"><img src="/office/images/ok_01_sml.jpg"></a></td>
			<td width="30px">&nbsp;</td>
			<td><a href="/office/images/ok_02_lrg.jpg" rel="facebox"><img src="/office/images/ok_02_sml.jpg"></a></td>
			<td width="30px">&nbsp;</td>
			<td><a href="/office/images/ok_03_lrg.jpg" rel="facebox"><img src="/office/images/ok_03_sml.jpg"></a></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<td bgcolor="#90ee90" colspan="5"><center><font color="#ffffff" size="3">NAGOYA OFFICE</font></center></td>
		<tr>
			<td><a href="/office/images/ng_01_lrg.jpg" rel="facebox"><img src="/office/images/ng_01_sml.jpg"></a></td>
			<td width="30px">&nbsp;</td>
			<td><a href="/office/images/ng_02_lrg.jpg" rel="facebox"><img src="/office/images/ng_02_sml.jpg"></a></td>
			<td width="30px">&nbsp;</td>
			<td><a href="/office/images/ng_03_lrg.jpg" rel="facebox"><img src="/office/images/ng_03_sml.jpg"></a></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<td bgcolor="#ffa500" colspan="5"><center><font color="#ffffff" size="3">FUKUOKA OFFICE</font></center></td>
		<tr>
			<td><a href="/office/images/fk_01_lrg.jpg" rel="facebox"><img src="/office/images/fk_01_sml.jpg"></a></td>
			<td width="30px">&nbsp;</td>
			<td><a href="/office/images/fk_02_lrg.jpg" rel="facebox"><img src="/office/images/fk_02_sml.jpg"></a></td>
			<td width="30px">&nbsp;</td>
			<td><a href="/office/images/fk_03_lrg.jpg" rel="facebox"><img src="/office/images/fk_03_sml.jpg"></a></td>
		</tr>
		</table>
-->
	  </div>



<!--	  <h2 class="sec-title">ワーホリや留学の様子</h2>



<php
$sponsors = array(
	array('01','世界中を飛び回れ！！',''),
	array('02','ホームステイは触れ合いがいっぱい',''),
	array('03','外国の方の砂遊びはピラミッド！？',''),
	array('04','ワーホリで世界中の友達を作ろう！！',''),
	array('05','友達は多い方がよし',''),
	array('06','ズッキーニ美味しく頂きました',''),
	array('07','休日の基本はバーベーキュー',''),
	array('08','冬のカナダはスノボし放題だね',''),
	array('09','大人っぽいですが高校の卒業式です',''),
	array('10','週末はパーティーが多いかな',''),
	array('11','友達１００人できるかな',''),
	array('12','学校で勉強しようね',''),
);
shuffle($sponsors);
?>
-->
	<div class="sponsorListHolder">
        <?php
		$idx=0;
		foreach($sponsors as $company)
		{
			$idx++;
			echo'
			<div class="sponsor" title="'.$company[0].'">
				<div class="sponsorFlip">
					<img src="/office/filpimage/'.$company[0].'-a.png" alt="'.$company[1].'" />
					'.$company[2].'
				</div>
				<div class="sponsorData">
					<div class="sponsorDescription">
						<img src="/office/filpimage/'.sprintf("%02d",$idx).'-b.png" alt="'.$company[1].'" />
					</div>
				</div>
			</div>
			
			';
		}
	?>
    	<div class="clear"></div>
	</div>

	  <div class="top-move">
	    <p><a href="#header">▲ページのＴＯＰへ</a></p>
	  </div>
	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>
