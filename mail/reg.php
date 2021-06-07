<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page='メール会員';
$header_obj->description_page='語学学校（海外・国内）：オーストラリア・ニュージーランド・カナダを初めとしたワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。';
$header_obj->keywords_page='オーストラリア,ニュージーランド,カナダ,カナダ,韓国,フランス,ドイツ,イギリス,アイルランド,デンマーク,台湾,香港,ビザ,取得,方法,申請,手続き,渡航,外務省,厚生労働省,最新,ニュース,大使館';
$header_obj->add_js_files='<script type="text/javascript" src="/js/jquery.corner.js"></script>
<script type="text/javascript">
$(function () {
	$("#div_mail").corner();
});</script>';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'メール会員募集中';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>

	  <h2 class="sec-title">メール会員</h2>
	  <div id="sitemapbox">

<?php

//ini_set( "display_errors", "On");

	mb_language("Ja");
	mb_internal_encoding("utf8");

	$act = @$_POST['act'];
	$vcheck = @$_GET['u'];
	if ($vcheck == '')	
	{
		$vcheck = @$_POST['vcheck'];
	}
	$chkmail = @$_GET['m'];
	if ($chkmail == '')	
	{
		$chkmail = @$_POST['chkmail'];
	}

	$msg = '';
	if ($act == 'upd')	
	{
		$vname1 = @$_POST['vname1'];
		
		if ($vname1 == '')	
		{
			$vname1 = 'ワーホリ';
		}
		
		$vsend = @$_POST['vsend'];
		if (mb_strlen($vname1) > 50)	
		{
			$msg = 'エラー：お名前は２０文字以内で入力してください。';
		}
		else
		{
			try {
				$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
				$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->query('SET CHARACTER SET utf8');
				$sql = 'UPDATE maillist SET haihai = 1, vname1 = :vname1 , vsend = :vsend , vstat = :vstat , udate = :udate WHERE vcheck = :vcheck';
				$stt2 = $db->prepare($sql);
				$stt2->bindValue(':vcheck', $vcheck);
				$stt2->bindValue(':vname1', $vname1);
				$stt2->bindValue(':vsend', $vsend);
				$stt2->bindValue(':vstat', '登録');
				$stt2->bindValue(':udate', date('Y/m/d'));
				$stt2->execute();

				// メアドでの一括更新
				$sql = 'UPDATE maillist SET haihai = 1, vsend = :vsend , vstat = :vstat , udate = :udate WHERE vmail = :vmail';
				$stt2 = $db->prepare($sql);
				$stt2->bindValue(':vsend', $vsend);
				$stt2->bindValue(':vstat', '登録');
				$stt2->bindValue(':udate', date('Y/m/d'));
				$stt2->bindValue(':vmail', $chkmail);
				$stt2->execute();

				$db = NULL;
			} catch (PDOException $e) {
				die($e->getMessage());
			}
			$msg = '登録内容を変更しました。';
		}
	}

	if ($msg != '')	
	{
?>
		<div id="msg" class="short-msg">
			<?php print $msg; ?>
		</div>
<script>
var tim = null;
var wid = 500;
tim = setTimeout('fnc_msg()',3000);
function fnc_msg() {
	clearTimeout(tim);
	tim = setTimeout('fnc_msg_2()',20);
}
function fnc_msg_2()	{
	clearTimeout(tim);
	wid = wid - 30;
	if (wid <= 0)	{
		document.getElementById('msg').style.display = 'none';
	}else {
		document.getElementById('msg').innerHTML = '';
		document.getElementById('msg').style.width = wid + 'px';
		tim = setTimeout('fnc_msg_2()',20);
	}
}
</script>

<?php
	}

	try 
	{
		$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
		$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query('SET CHARACTER SET utf8');
		$stt = $db->prepare('SELECT vmail, vname1, vsend, vstat FROM maillist WHERE vcheck = :vcheck');
		$stt->bindValue(':vcheck', $vcheck);
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC))
		{
			$idx++;
			if (md5($row['vmail']) == @$_GET['m'])	
			{
				$chkmail = $row['vmail'];
			}
		}
		$db = NULL;
	}
	catch (PDOException $e) 
	{
		die($e->getMessage());
	}

	try 
	{
		$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
		$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query('SET CHARACTER SET utf8');
		$stt = $db->prepare('SELECT vmail, vname1, vsend, vstat FROM maillist WHERE vcheck = :vcheck AND vmail = :chkmail');
		$stt->bindValue(':chkmail', $chkmail);
		$stt->bindValue(':vcheck', $vcheck);
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC))
		{
			$idx++;

			if ($row['vstat'] == '仮登録')	
			{
	?>
				<p>&nbsp;<br/>現在、仮登録の状態です。メルマガの配信はされません。</p>
				<p>お名前を入力して、登録ボタンを押して下さい。</p>
	<?php
			}else{
	?>
				<p>登録内容を修正して、登録ボタンを押してください。</p>
	<?php
			}
	?>

            <p>&nbsp;</p>
            <form action="./reg.php" method="POST">
            <table class="mailtable">
                <tr>
                    <td class="mailtable-label">ご登録のメールアドレス</td>
                    <td class="mailtable-data">
                        <?php print $row['vmail']; ?></td>
                </tr>
                <tr>
                    <td class="mailtable-label">お名前（ニックネーム可）</td>
                    <td class="mailtable-data">
                        <input id="onamae" name="vname1" type="text" size="20" maxlength="20" value="<?php print $row['vname1']; ?>"> さん</td>
                </tr>
                <tr>
                    <td class="mailtable-label">配信状態</td>
                    <td class="mailtable-data">
    <?php
                    if ($row['vstat'] == '登録')	{
                        if ($row['vsend'] == '1')	{
                            print '<input type="radio" name="vsend" value="1" checked>配信　';
//                            print '<input type="radio" name="vsend" value="0">配信停止';
                        }else{
                            print '<input type="radio" name="vsend" value="1">配信　';
                            print '<input type="radio" name="vsend" value="0" checked>配信停止';
                        }
                    }else{
                        print '仮登録';
                        print '<input type="hidden" name="vsend" value="1">';
                    }
    ?>
                    </td>
                </tr>
                <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="hidden" name="act" value="upd">
                    <input type="hidden" name="vstat" value="<?php print $row['vstat']; ?>">
                    <input type="hidden" name="chkmail" value="<?php print htmlspecialchars($row['vmail']); ?>">
                    <input type="hidden" name="vcheck" value="<?php print $vcheck; ?>">
                    <input type="reset" value="リセット" style="width:80px; height:30px;">　　&nbsp;
                    <input type="submit" value="登録" style="width:80px; height:30px;">
                </td>
                </tr>
            </table>
            </form>
    
            <p>&nbsp;</p>
            <p></p>
            <p></p>
<?php
		}

		$db = NULL;

	} 
	catch (PDOException $e) 
	{
		die($e->getMessage());
	}

	if ($idx == 0)	{
?>
		<p>メール会員になりませんか？</p>
		<p>&nbsp;</p>
		<p>各国のビザ情報、現地情報、セミナー情報、その他ワーキングホリデーに役立つ情報をメールで配信します。<br /><br /></p>
		
        <p>登録料・年会費等は一切不要です。<img src="../images/qr-reg.gif" style="float:right;"></p>
        <p>登録方法は簡単です</p>
        <p>　　１． reg@jawhm.or.jp に空メールを送信してください。</p>
        <p>　　２． 登録用のＵＲＬが送られてくるので、お名前を登録してください。</p>
        <p>　　　　 以上で完了です。</p>

		<p>
        <br />
		【ご注意：携帯で登録される方へ】<br/>
		　　ＵＲＬが記載されたメールをお送りしますので、<br/>
		　　ＰＣメールの拒否設定等を行っている場合は、解除してから空メールをお送りください。<br/>
		　　また、ドメイン規制を行っている場合は、 jawhm.or.jp のドメインを許可してください。<br/>
		</p>

<?php
	}
?>

	<div style="height:10px;">&nbsp;</div>
	</div>

	  <div class="top-move">
	    <p><a href="#header">▲ページのＴＯＰへ</a></p>
	  </div>
      <div class="advbox03"><p>108</p></div>	  
      <div class="advbox03"><p>109</p></div>	  
	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>
