<?php 
	$domain = "http://".$_SERVER['SERVER_NAME'];
	$urlimg = "http://".$_SERVER['SERVER_NAME']."/api/seminar/img/";
?>
<link rel="stylesheet" href="<?php echo $domain?>/api/seminar/css/new-popup.css" type="text/css" media="all">
<div class="newpopup">
	<div class="popcontinue">
		<div class="flex">
			<img src="<?php echo $urlimg?>icon.png">
			<h3> セミナー　予約フォーム </h3>
			<div class="clear"></div>
		</div>
		<p class="title">
			セミナーのご予約に際し、以下の内容をご確認ください。
		</p>
		 <ul>
            <li>このフォームでは、仮予約の受付を行います。予約確認のメールをお送りしますので、メールの指示に従って予約を確定してください。ご予約が確定されない場合、２４時間で仮予約は自動的にキャンセルされセミナーにご参加頂けません。ご注意ください。</li>
            <li>携帯のメールアドレスをご使用の場合、info@jawhm.or.jp からのメール（ＰＣメール）が 受信できるできる状態にしておいてください。</li>
            <li>Ｈｏｔｍａｉｌ、Ｙａｈｏｏメールなどをご利用の場合、予約確認のメールが遅れて 到着する場合があります。時間をおいてから受信確認を行うようにしてください。</li>
            <li>予約確認メールが届かない場合、toiawase@jawhm.or.jp までご連絡ください。 なお、迷惑フォルダ等に分類される場合もありますので、併せてご確認ください。</li>
        </ul>
		<div style="margin-top:10px;">
			<button class="button_submit"  onclick="{{linknextjs}}"><span class="fa fa-check-circle"></span>次へ</button>
			<button style="background: #e74c3c;" class="button_cancel"  onclick="{{linkprevjs}}"><span class="fa fa-ban"></span>戻る</button>　　　　
		</div>
	</div>
</div>