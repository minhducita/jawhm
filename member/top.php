<?php
require_once 'reqcheck.php';
require_once '../include/top/header_top.php';
	
$header_obj = new Header();

$header_obj->title_page='メンバー専用ページ';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->add_js_files='<script type="text/javascript" src="/js/jquery.corner.js"></script>

<script>
function fnc_logout()	{
	if (confirm("ログアウトしますか？"))	{
		location.href = "/member/logout.php";
	}
}
window.onload = function () {
document.getElementById("utility-nav").style.visibility = "hidden";
}
</script>
';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../images/mainimg/member_top.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'メンバー専用ページ';
$header_obj->full_link_tag = true;

$header_obj->display_header();
if($header_obj->mobilepage != false) {
	echo "<link href='/css/top/top_mobile.css' rel='stylesheet' type='text/css'>";
} 
?>
<div id="maincontent" class="member_top">
  <?php echo $header_obj->breadcrumbs(); ?>
	<div class="clear-box"></div>
	<div class="body-content">
	<?php 
		$content 	= file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/memberpage/api/get_posts/?post_type=post_api');
		$posts 		= json_decode($content, true);
		if($_SERVER['REMOTE_ADDR'] == '27.74.247.0'){
			//print_r($posts); exit;
		}
		
		
		$postthree 	= file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/memberpage/api/post_top.php?perpage=3');
		$postthree 	= json_decode($postthree,true);
		
		$categories	  = file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/memberpage/api/get_category_index/');
		$categories   = json_decode($categories,true);
		$categories   = $categories['categories'];
		
		$menu		  = file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/memberpage/api/menu.php?locationMenu=menu-left');
	?>
	<a href="/memberpage/memberservice" class="btn_link_a">
		<div class="btn-link">
			<span>メンバーサービスのご案内</span>
			<p>初めての方は、まずこちらをご確認ください</p>
		</div>
	</a>
	<?php if(!empty($postthree['success']) && $postthree['success'] == 'ok'){?>
	<div class="memberpagepost">
		<div class="<?php echo ($_SESSION['pc'] !='on')?"img-title-box":"title-box"?>">
			<?php $img_title = ($_SESSION['pc']!='on')?'../images/top/title-top-mobile.png':'../images/top/title-top.png'?>
			<img src="<?php echo $img_title?>">
		</div>
		<div class="content-section">
			<?php 
				date_default_timezone_set('Asia/Tokyo');
				foreach($postthree['data'] as $k => $item){
					$html_showmore = '<a class="show-more" href="'.$item['url'].'">
								<span>続き</span>
								<img src="../images/top/arrow-more.png">
							</a>';
					if(!empty($item['excerpt'])){ //excerpt is content
						
						$excerpt = ($_SESSION['pc']=='on')?mb_substr($item['excerpt'],0,100):mb_substr($item['excerpt'],0,80);
						$excerpt = html_entity_decode($excerpt);
						if(!strpos($excerpt,"</"))
							$excerpt .= "...".$html_showmore;
						else
							$excerpt = str_replace('</','...'.$html_showmore."</",$excerpt);
						$excerpt = str_replace('<p>','<p class="member_des">',$excerpt);
					}else{ // excerpt is post excerpt
						$excerpt = html_entity_decode($item['post_excerpt'])."<p style='text-align:right'>".$html_showmore."</p>";
					}
					$timepost = @strtotime($item['post_date']);
					$timepost = date("Y",$timepost)."年".date("m",$timepost).'月'.date("d",$timepost).'日';
				?>
				<div class="cont01">
					<?php if(!empty($item['url_image'])){ echo $item['url_image'] ;}?>
					<div class='cont01-info <?php echo (!empty($item['url_image']) && $_SESSION['pc'] == 'on')?"":"cont01-info-full"?>'>
						<a href="<?php echo $item['url']?>"><h5><img class="top_pen" src='../images/top/title-ico.png'><?php echo $item['post_title'] ?></h5></a>
						<p class='time-post'>
							<img src='../images/top/calendar-ico.png'>
							<span><?php echo $timepost?></span>
						</p>
						<div class="excerpt">
							<?php echo $excerpt ?>
							<div class='clear'></div>
						</div>						
					</div>
					<div class="clear"></div>
				</div>
			<?php }?>
		</div>
	</div>
	<div class="clear"></div>
	<?php // if($_SERVER['REMOTE_ADDR'] == "27.74.247.0"){ ?>

		<h2 class="sec-newtitle">ビザに関するご質問に、オンラインチャットで24時間いつでもお答えします！</h2>
		<div class="country-content">
			<div> <a target="_blank" href="http://www.jawhm.or.jp/memberpage/2019/12/16/%e3%82%ab%e3%83%8a%e3%83%80%e3%80%80%e3%83%af%e3%83%bc%e3%82%ad%e3%83%b3%e3%82%b0%e3%83%9b%e3%83%aa%e3%83%87%e3%83%bc%e3%83%93%e3%82%b6%e7%94%b3%e8%ab%8b%e3%83%9e%e3%83%8b%e3%83%a5%e3%82%a2%e3%83%ab-2/"><img src="../images/top/flag_02.png"> </a> </div>
			<div> <a target="_blank" href="http://www.jawhm.or.jp/memberpage/2019/09/01/2019%e5%b9%b4%e5%ba%a6yms-visa%e7%94%b3%e8%ab%8b%e3%81%ae%e6%b5%81%e3%82%8c/"><img src="../images/top/flag_04.png"> </a> </div>
		</div>
	<?php // } ?>

	<h2 class="sec-newtitle">過去の情報はこちら</h2>
	<?php if($categories) {?>
	<div class='tagcloud'>
		<?php  foreach($categories as $item){?>
			<a class="tag-link-12" href="<?php echo "http://".$_SERVER['SERVER_NAME']."/memberpage/category/".$item['slug']?>" <?php echo strpos($item['title'],'（旧）') === FALSE ? "" : 'style="display:none"'  ?> >
                <p> <?php echo $item['title']?> </p>
            </a>
		<?php }?>
		<a href="<?php echo "http://".$_SERVER['SERVER_NAME']."/memberpage/member_info/"?>" class="tag-link-12 btn-tag" style="font-size: 8pt;"><p>全て表示</p></a>
	</div>
	<?php }}?>
	
	<?php	

		$list = array(
			"/seminar/seminar.php?place_name=&checked_countryname=0&checked_know=8",
			"/member/onlineseminar.php",
			"/member/memreg.php"
			);
			foreach ($list as $key => $value){
				$row[] = $value;
				//$url_list[] = "<a href = '". $value ."'></a>";
				
		}
	?>
	
	
	<?php
		$post_temp = array();
		$post_temp = $posts['posts'];
		$img = "<img class='imgarrow' src='/images/index/arrow.png'>";
		
		if($posts['status'] == 'ok' &&   count($posts['posts']) > 0 ){
			
				for($i = 0; $i  < count($posts['posts']) ; $i++) {
					
 			?>	
					<div class="title-box">
						<!-- <div class="title <?php echo $i > 2 ? "fixed-box" : "fix-box" ?>"> -->
						<a style="text-decoration:none" href="<?php if($i <= 2){echo $row[$i];}?>">
							<div class="title <?php  echo $posts['posts'][$i]['id'] == 154 || $posts['posts'][$i]['id'] == 153 || $posts['posts'][$i]['id'] == 152 ? "fixed-box" : "fix-box" ?>">
								<img src="../images/item<?php echo ($i%5 + 1) ?>.png"><span style="margin-left:5px"><?php echo $posts['posts'][$i]['title']?></span><?php if ($i <=2) { echo $img;} ?>
										
							</div> 	
						</a>
					</div>
					<div class="artical-box">					
						<?php echo $posts['posts'][$i]['content']; ?>
					</div>
					
				<?php 
				}
			     } 
	?>
	<!--Member Top add flag 23-06-2016-->
<!--div class="title-box">
 <div class="title fixed-boxed">
   <img src="../images/top/icon_info_country.png"><span>ワーキングホリデー協定国情報</span>
 </div>
</div>
<div class="mobile_none" style="text-align: center; margin-bottom:10px;">
<table cellpadding="10px">
 <tr>
  <td>
    <a href="/country/#li-aus" alt="オランド"><img src="../images/top/flag_01.png"></a><br>
    <a href="/visa/v-aus.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-can" alt="カナダ"><img src="../images/top/flag_02.png"></a><br>
    <a href="/visa/v-can.html">(ビザ情報)</a>
   </td>
   <td>
     <a href="/country/#li-nz" alt="ニューーストラリア"><img src="../images/top/flag_03.png"></a><br>
     <a href="/visa/v-nz.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-uk" alt="イギリス"><img src="../images/top/flag_04.png"></a><br>
    <a href="/visa/v-uk.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-ire" alt="アイルジーランド"><img src="../images/top/flag_05.png"></a><br>
    <a href="/visa/v-ire.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-fra" alt="フランス"><img src="../images/top/flag_06.png"></a><br>
    <a href="/visa/v-fra.html">(ビザ情報)</a>
  </td>
 </tr>
 <tr>
  <td>
    <a href="/country/#li-deu" alt="ドイツ"><img src="../images/top/flag_07.png"></a><br>
    <a href="/visa/v-deu.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-dnk" alt="デンマーク"><img src="../images/top/flag_08.png"></a><br>
    <a href="/visa/v-dnk.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-nor" alt="ノルウェー"><img src="../images/top/flag_09.png"></a><br>
    <a href="/visa/v-nor.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-kor" alt="韓国"><img src="../images/top/flag_10.png"></a><br>
    <a href="/visa/v-kor.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-ywn" alt="台湾"><img src="../images/top/flag_11.png"></a><br>
    <a href="/visa/v-ywn.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-hkg" alt="香港"><img src="../images/top/flag_12.png"></a><br>
  <a href="/visa/v-hkg.html">(ビザ情報)</a>
  </td>
 </tr>
 <tr>
  <td>
  </td>
  <td>
    <a href="/country/#li-pol" alt="ポーランド"><img src="../images/top/flag_13.png"></a><br>
    <a href="/visa/v-pol.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-por" alt="ポルトガル"><img src="../images/top/flag_14.png"></a><br>
    <a href="/visa/v-prt.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-svk" alt="スロバキア"><img src="../images/top/flag_15.png"></a><br>
    <a href=""></a>
  </td>
  <td>
    <a href="/country/#li-aut" alt="オーストリア"><img src="../images/top/flag_16.png"></a><br>
    <a href=""></a>
  </td>
  <td>
  </td>
 </tr>
</table>
</div-->
<!--div id="area-map-sp" class="pc_none">
  <ul class="clearfix">
    <li><a href="/country/#li-aus" alt="オランド"><img src="../country/images/btn-aus.jpg"></a></li>
    <li><a href="/country/#li-can" alt="カナダ"><img src="../country/images/btn-can.jpg"></a></li>
    <li><a href="/country/#li-fra" alt="フランス"><img src="../country/images/btn-fra.jpg"></a></li>
    <li><a href="/country/#li-deu" alt="ドイツ"><img src="../country/images/btn-deu.jpg"></a></li>
    <li><a href="/country/#li-ire" alt="アイルジーランド"><img src="../country/images/btn-ire.jpg"></a></li>
    <li><a href="/country/#li-kor" alt="韓国"><img src="../country/images/btn-kor.jpg"></a></li>
    <li><a href="/country/#li-nz" alt="ニューーストラリア"><img src="../country/images/btn-nz.jpg"></a></li>
    <li><a href="/country/#li-uk" alt="イギリス"><img src="../country/images/btn-uk.jpg"></a></li>
    <li><a href="/country/#li-dnk" alt="デンマーク"><img src="../country/images/btn-dnk.jpg"></a></li>
    <li><a href="/country/#li-nor" alt="ノルウェー"><img src="../country/images/btn-nor.jpg"></a></li>
    <li><a href="/country/#li-hkg" alt="香港"><img src="../country/images/btn-hkg.jpg"></a></li>
    <li><a href="/country/#li-ywn" alt="台湾"><img src="../country/images/btn-ywn.jpg"></a></li>
    <li><a href="/country/#li-pol" alt="ポーランド"><img src="../country/images/btn-pol.jpg"></a></li>
    <li><a href="/country/#li-por" alt="ポルトガル"><img src="../country/images/btn-por.jpg"></a></li>
    <li><a href="/country/#li-svk" alt="スロバキア"><img src="../country/images/btn-svk.jpg"></a></li>
    <li><a href="/country/#li-aut" alt="オーストリア"><img src="../country/images/btn-aut.jpg"></a></li>
  </ul>
</div-->
<!--End Member Top add flag 23-06-2016-->
</div></div></div></div>
<?php fncMenuFooter($header_obj->footer_type); ?>
<script> 
	var menu = '<?php echo $menu?>';
	menu = jQuery.parseJSON(menu);	
	$html = '';
	jQuery.each(menu.data,function(i,v){
		if(i == 0){
			$html = '<dt class="starmenufooter footer-member-top"><span>'+v.post_title+'</span></dt><dd class="footer-member-top" style="display:block"><ul>';
		}else{
			$html += "<li><a href='"+v.perlink+"'>"+v.post_title+"</a></li>";
		}
	});
	$html += "</ul></dd>";
	jQuery('#footer-mobile-new-menu').prepend($html);
	jQuery(document).ready(function(){jQuery(".starmenufooter").trigger("click")});
</script>
</body>
</html>

