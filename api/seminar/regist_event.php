<?php 
/* replace serid and btnprev*/
function get_select_countries(){
	$countries = array(
		'アメリカ',
		'オーストラリア',
		'ニュージーランド',
		'カナダ',
		'韓国',
		'フランス',
		'ドイツ',
		'イギリス',
		'アイルランド',
		'デンマーク',
		'ノルウェー',
		'台湾',
		'香港',
		'未定',
	);
	$output = "";
	$output_select = '<select class="form-control" id="countries_checkbox1" name="興味国[]" multiple="multiple">';
	$output .= '
	<div id="countries_checkbox">';
	$col[1]= $col[2] = $col[3] = $col[4] = "<ul>";
	$i=0;
	foreach ($countries as $one) {
		$i++; 
		if($i == 5){
			$i = 1;
		}
		$col[$i] .= '<li><label><input type="checkbox" name="興味国[]" value="' . $one . '">&nbsp;' . $one . '</label><li>';
		$output_select .= "<option value='".$one."'>".$one."</option>";
	}
	$output .= $col[1]."</ul>".$col[2]."</ul>".$col[3]."</ul>".$col[4]."</ul>".'</div>';
	$output_select .= "</select>";
	return $output.$output_select;
}
function get_select_yotei(){
	$yotei = array(
		'3ヶ月以内',
		'6ヶ月以内',
		'1年以内',
		'2年以内',
		'未定',
	);
	$output = "";
	$output .= '
<select class="timestart" name="出発時期">
	<option value="">選択してください</option>
';
	foreach ($yotei as $one) {
		$output .= '<option value="' . $one . '">' . $one . '</option>';
	}
	$output .= "</select>";
	return $output;
}
$domain = "http://".$_SERVER['SERVER_NAME'];
$urlimg = "http://".$_SERVER['SERVER_NAME']."/api/seminar/img/";

if(empty($_POST)){?>
	<link rel="stylesheet" href="<?php echo $domain?>/api/seminar/css/new_form_signin.css" type="text/css" media="all">
	<div style="color:red; font-weight:bold;"><span id="event-c_img"></span></div>
	<div class="content_content">
		<div class="flex flex_bg" style="background-image:url(<?php echo $urlimg?>icon.png)">
			<h3 id="form_title"><span id="event-place"></span> <span id="event-start"></span> <span id="event-title"></span></h3>
		</div>
		<div class="clear"></div>
		<form action="" id="form_yoyaku" class="newForm" method="post" onsubmit="return(fncyoyaku());">
			<input type="hidden" name="セミナー番号" id="seminarno" value="{{serid}}"> 
			<input type="hidden" name="セミナー名" id="seminarname" value="">
			<div class="tablecolumn">
				<p class="leftrow">お名前 (氏)</p>
				<div class="double">
					<input required name="お名前"  id="txt_name" type="text" name="" placeholder="姓 . 例）　山田" autofocus>
					<p>(名)</p>
					<input required name="お名前2" id="txt_name2" type="text" name = "namedk" placeholder="名 . 例）太郎">
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">ふりがな</p>
				<div class="double">
					<input required name="ふりがな"  id="txt_furigana" type="text" name="" placeholder="せい . 例） やまだ">
					<p>(名)</p>
					<input required name="ふりがな2" id="txt_furigana2" type="text" name="" placeholder="めい . 例）たろう">
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">メールアドレス</p>
				<div class="rightrow">
					<input id="txt_mail" type="email" required name="メール" placeholder="info@jawhm.or.jp">
					<p>※予約確認のメールをお送りします。必ず有効なアドレスを入力してください。</p>
					<div style="background-color:#FF9966; color:black; margin: 5px 5px 5px 5px;padding: 5px 8px 5px 8px; font-weight:none;">
						【重要：HOTMAIL等のメールをご利用の方へ】<br>
						hotmail、live.jp等のメアドをご利用の場合、確認メールが正しく届かない場合があります。<br>
						メンバー登録前に<a target="_blank" href="<?php echo $domain?>/blog/tokyoblog/%E4%BB%8A%E6%97%A5%E3%81%AE%E5%8D%94%E4%BC%9A%E3%82%AA%E3%83%95%E3%82%A3%E3%82%B9/2610/">こちらをご確認頂く</a>
						か、<u>他のメアドをご利用ください</u>。
					</div>				
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">当日連絡の付 く電話番号</p>
				<div class="rightrow">
					<input id="txt_tel" type="tel" name="電話番号" required  placeholder="09012345678">
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">興味のある国</p>
				<div class="rightrow">
					<?php echo  get_select_countries()?>
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">出発予定時期</p>
				<div class="rightrow">
					<?php echo get_select_yotei()?>
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">同伴者有無</p>
				<div class="rightrow margintop">
					<input id="dohan" type="checkbox" name = "同伴者">同伴者あり
					<ul class="list-style">
						<li>同伴者ありの場合、２人分の席を確保致します。</li>
						<li>３名以上でご参加の場合は、メールにてご連絡ください。</li>
					</ul>
				</div>
			</div>
			<div class="tablecolumn">
				<p class="leftrow">今後のご案内</p>
				<div class="rightrow margintop">
					<input id="txt_mailmem" type="checkbox" checked name = "メール会員">
					このメールアドレスをメール会員(無料)に登録する
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">今後のご案内</p>
				<div class="rightrow margintop">
					<input id="sonota" type="text" name="その他">
				</div>
			</div>
			<div class="tablecolumn">
				<p class="leftrow spacehidden">&nbsp;</p>
				<div class="rightrow">
					<p>このフォームでは仮予約を行います。<br>予約確認のメールをお送りしますので、メールの指示に従って予約を確定させてくだ さい。</p>
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow spacehidden">&nbsp;</p>
				<div class="rightrow textalignringt">
					<a class="cancel" id="btn_soushin" {{btnprev}} ><span class="fa fa-ban"></span>取消</a>
					<button id="yoyakubtn" value="予約する(無料)"  style="margin-left:5px;"><span class="fa fa-check-circle"></span>次へ</button>
				</div>
				<div class="clear"></div>
			</div>
		</form>
	</div>
<?php }else{ // login 
	$ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_mail_list.ini', FALSE);
	$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
	$email = $_POST['email'];
	$pwd   = $_POST['pwd'];
	$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
    $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->query('SET CHARACTER SET utf8');
	$stt = $db->prepare('SELECT id, email, namae, furigana, tel, country FROM memlist WHERE email = :email and state = "5" and password= :pwd');
	$stt->bindValue(':email', $email);
	$stt->bindValue(':pwd', $pwd);
	$stt->execute();
	$member_info = $stt->fetch();
	if(!empty($member_info)){
		require_once "../../seminar_module/seminar_db.php";
		$getdb = new SeminarDb();
		$id = $_GET['id'];
		$doujiInfo = $getdb->get_douji_info($id);
?>
	<link rel="stylesheet" href="<?php echo $domain?>/api/seminar/css/new_form_signin.css" type="text/css" media="all">
	<div style="color:red; font-weight:bold;"><span id="event-c_img"></span></div>
	<div class="content_content">
		<div class="flex">
			<img src="<?php echo $urlimg."icon.png"?>">
			<h3 id="form_title"><?php echo  $doujiInfo[0]['start']." ".$doujiInfo[0]['k_title1']?></h3>
		</div>
		<div class="clear"></div>
		<form action="" id="form_yoyaku" class="newForm" method="post" onsubmit="return(fncyoyaku());">
			<input type="hidden" name="セミナー番号" id="seminarno" value="{{serid}}"> 
			<input type="hidden" name="セミナー名" id="seminarname" value="<?php echo $doujiInfo[0]['k_title1']?>">
			<input name="お名前" value="<?php echo $member_info['namae']?>"  id="txt_name" type="hidden">
			<input name="お名前2" id="txt_name2" value="" type="hidden">
			<input name="ふりがな" value="<?php echo $member_info['furigana']?>"  id="txt_furigana" type="hidden">
			<input name="ふりがな2" id="txt_furigana2" value="" type="hidden">
			<input id="txt_mail" name="メール" value="<?php echo $member_info['email']?>" type="hidden">
			<input id="txt_tel" name="電話番号" value="<?php echo $member_info['tel']?>" type="hidden">
			<div class="tablecolumn">
				<p class="leftrow">お名前</p>
				<div class="double">
					<?php echo $member_info['namae']; ?>　様				
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">興味のある国</p>
				<div class="rightrow">
					<div class="margintop">
						<?php echo  get_select_countries()?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">出発予定時期</p>
				<div class="rightrow">
					<div class="margintop">
						<?php echo get_select_yotei()?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">同伴者有無</p>
				<div class="rightrow margintop">
					<input id="dohan" type="checkbox" name = "同伴者">同伴者あり
					<ul class="list-style">
						<li>同伴者ありの場合、２人分の席を確保致します。</li>
						<li>３名以上でご参加の場合は、メールにてご連絡ください。</li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">今後のご案内</p>
				<div class="rightrow margintop">
					<input id="txt_mailmem" type="checkbox" checked name = "メール会員">
					このメールアドレスをメール会員(無料)に登録する
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow">その他</p>
				<div class="rightrow ">
					<input id="sonota" type="text" name="その他">
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow spacehidden">&nbsp;</p>
				<div class="rightrow">
					<p>このフォームでは仮予約を行います。<br>予約確認のメールをお送りしますので、メールの指示に従って予約を確定させてくだ さい。</p>
				</div>
			</div>
			<div class="clear"></div>
			<div class="tablecolumn">
				<p class="leftrow spacehidden">&nbsp;</p>
				<div class="rightrow textalignringt">
					<a class="cancel" id="btn_soushin" {{btnprev}}><span class="fa fa-ban"></span>取消</a>
					<button id="yoyakubtn" value="予約する(無料)"  style="margin-left:5px;"><span class="fa fa-check-circle"></span>次へ</button>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</form>
	<?php }else{
		echo json_encode(array("error"=>1,"msg"=>'入力されたメールアドレスかパスワードに誤りがあります。'));exit;
	}
}?>
