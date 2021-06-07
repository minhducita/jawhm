<?php

//?k=KT&n=KT1208-001
	$k = @$_GET['k'];
	$n = @$_GET['n'];
	
if (!$k || !$n) {
    	die();
}
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page='事前確認事項申告書';
$header_obj->description_page='の申告書は海外渡航、また渡航のお手続きがスムーズに進むよう、以下の内容を事前にご申告いただくための書類です';
$header_obj->full_link_tag=true;
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '事前確認事項申告書';

$header_obj->display_header();

$result = "";

if($_GET['result'] && $_GET['result'] == "yes")
{
	$result = $_GET['result'];
?>
	<script>
		alert("ご回答ありがとうございました。");
	</script>
<?php

}

?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		  $( function() {
			$( "input[type='radio']" ).checkboxradio();
		  } );
	</script>
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
		}

		table {
			font-size: 1em;
		}

		.ui-draggable, .ui-droppable {
			background-position: top;
		}
		.bd-fath {
			border: 3px solid #000;
			padding: 10px;
			margin: 20px 0;
			font-size: 11px;
		}
		ol{
			padding: 0 10px;
		}
		.bd-fath ol li{
			font-size: 12px;
			padding-bottom: 10px;
		}
		.bd-fath ol li input[type="text"] {
			width: 96%;
			padding: 5px 10px;
			margin: 10px 0 10px;
		}
		.bd-fath ol li input[type="radio"] {
			<
		}
		.bd-row2 {
			border: 1px solid #000;
			padding: 10px;
			margin: 20px 0;
			font-size: 11px;
		}
		.bd-row2 input {
			padding: 5px;
		}
		.bd-row2 select {
			padding:7px 5px;
		}
		.bd-row2 select option{
			
		}
		input[type="submit"] {
			float: right;
			border: 1px solid rgba(255,97,46,0.98);
			background: rgba(255,97,46,0.98);
			padding: 10px 40px;
			color: #fff;
			font-size: 14px;
			font-weight: 700;
			border-radius: 5px;
			cursor: pointer;
		}
		.area-accordion h3{
			font-weight: 700;
			font-size: 12px;
			padding-top: 10px;
		}
	</style>
	
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
<?php
	mb_language("Ja");
	mb_internal_encoding("utf8");

	$e = @$_GET['e'];
	$act = @$_POST['act'];
	$Year = date("Y");
	$Month = date("m");
	$Day   = date("d");
	
	for($i = $Year - 1; $i<= $Year+1; $i++)
	{
		$checkInYear .= "<option value=".$i.">".$i."</option>";
	};
	
	for($i = 1; $i<=12; $i++)
	{
		if( $i<10 && substr($Month, 0, 1) == 0 ){
			$checkInMonth .= "<option checked='checked' value='0".$i."'>0".$i."</option>";
		}
		else
		$checkInMonth .= "<option value=".$i.">".$i."</option>";
	}
	
	for($i = 1; $i<=31; $i++)
	{
		
			$checkInDay .= "<option value=".$i.">".$i."</option>";
		
		
	}
	
?>
			<form method="POST" action="./jizen_library.php">
				<h2 class="sec-title" style="text-align: center">事前確認事項申告書</h2>
				<div style="padding-left:20px; margin-bottom: 20px;">
				
					<p>この申告書は海外渡航、また渡航のお手続きがスムーズに進むよう、以下の内容を事前にご申告いただくための書類です。
手続きにあたり、大使館・移民局・手配先(語学学校、ホームステイ先、現地オフィス)等に事前申告が必要な事項もございますので、正確にご記入ください。また手続き、手配にあたり、関係機関への申告が必要な場合には、当協会よりいただいた情報を共有することがございますので、ご了承くださいませ。</p>

				</div>
				<div class="bd-fath">
					<ol>
						<li>
							現在治療中の病気、または心や身体の健康面で不安なことはありますか？　(はい　/　いいえ)</br>
							はいの場合：その詳細、また主治医からの診断結果があれば、それについてもご記入ください。</br></br>
								<label for="qt1_input_1">はい</label>
								<input type="radio" name="qt1_input" value="1" id="qt1_input_1" >
								<label for="qt1_input_2"> いいえ</label>
								<input type="radio" name="qt1_input" value="0" id="qt1_input_2">
								<span></span>
								<input type="text" name="qt1_text" style="display: none">
						</li>
						<li>
							今までに病気・手術・入院などの経験はありますか？　(はい　/　いいえ)</br>はいの場合：その詳細　(時期/病名/現在の症状等)
							</br></br>
							<label for="qt2_input_1">はい</label>
							<input type="radio" name="qt2_input" value="1" id="qt2_input_1">
							<label for="qt2_input_2"> いいえ</label>
							<input type="radio" name="qt2_input" value="0" id="qt2_input_2">
							<span></span>
							<input type="text" name="qt2_text" style="display: none">
						</li>
						<li>
							今までに犯罪歴または逮捕歴はありますか？　(はい　/　いいえ)</br>
							はいの場合：その詳細　(時期/内容等)</br></br>
							<label for="qt3_input_1">はい</label>
							<input type="radio" name="qt3_input" value="1" id="qt3_input_1" >
							<label for="qt3_input_2"> いいえ</label>
							<input type="radio" name="qt3_input" value="0" id="qt3_input_2">
							<span></span>
							<input type="text" name="qt3_text" style="display: none">
						</li>
						<li>
							今までに海外で3か月以上滞在されたことはありますか？　(はい　/　いいえ)</br>
							はいの場合：国と期間をご記入ください
							</br></br>
							<label for="qt4_input_1">はい</label>
							<input type="radio" name="qt4_input" value="1" id="qt4_input_1">
							<label for="qt4_input_2"> いいえ</label>
							<input type="radio" name="qt4_input" value="0" id="qt4_input_2">
							<span></span>
							<input type="text" name="qt4_text" style="display: none">
						</li>
						<li>
							今までにビザに問題があったこと(ビザ却下、入国拒否、強制送還等)はありますか？　(はい　/　いいえ) </br>はいの場合：その詳細</br></br>
							<label for="qt5_input_1">はい</label>
							<input type="radio" name="qt5_input" value="1" id="qt5_input_1">
							<label for="qt5_input_2"> いいえ</label>
							<input type="radio" name="qt5_input" value="0" id="qt5_input_2">
							<span></span>
							<input type="text" name="qt5_text" style="display: none">
						</li>
						<li>
							その他、気になることがありますか？  (はい　/　いいえ) </br></br>
							<label for="qt6_input_1">はい</label>
							<input type="radio" name="qt6_input" value="1" id="qt6_input_1">
							<label for="qt6_input_2"> いいえ</label>
							<input type="radio" name="qt6_input" value="0" id="qt6_input_2">
							<span></span>
							<input type="text" name="qt6_text" style="display: none">
						</li>
					</ol>
				</div>
				<div class="bd-row2">
					
					<p>(1)	上記の内容に相違ありません。</p>
					<p>(2)	以下の内容に同意します</p>
					<p>
					・必要がある場合には、当協会より関係機関に情報を提供します。</br>
					・虚無の申告があった際には手配をお断りすることがありますが、その際の返金はいたしかねます。</br>
					・今まで、反社会的勢力に該当しないこと、かつ、将来にあたっても該当しないことを確約し、違反した場合、当協会及びその他機関・団体・会社等との取引が無条件かつ一方的に解約されても異議を申しません。また、当協会や関係機関等に損害が生じた場合、いっさいを私の責任とします。</br>
					・ご申告いただきました内容により決定いたしました判断(ビザの発給、語学学校の受け入れ等)につきましては、
					当協会では一切の責任を負いかねます。
					</p>
					<div style="padding-top: 20px">
						<select name="check_in_year" style="width:80px;">
							<?php echo $checkInYear; ?>
						</select>年&nbsp;
						<select name="check_in_month" style="width:80px;">
							<?php echo $checkInMonth; ?>
						</select>月&nbsp;
						<select name="check_in_day" style="width:80px;">
							<?php echo $checkInDay; ?>
						</select>日&nbsp;
						<!--input type="text" name="check_in_month" value="<?php echo date('m') ?>" style="width: 30px">月&nbsp; -->
						<!--input type="text" name="check_in_day" value="<?php echo date('d') ?>" style="width: 30px">日 -->
						
						<div style="padding-top: 20px">
							お名前  
							<input type="text" name="check_in_ct" style="width:230px;">
						</div>
					</div>
				</div>
				<p>
					<input type="hidden" value="<?php echo $k;?>" name="short_name">
					<input type="hidden" value="<?php echo $n;?>" name="code_name">
					<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" name="self">
					<input type="submit" value="送信">
					<div style="width: 100%;clear:both;height:20px"></div>
				</p>
			</form>
				<div class="area-accordion" style="padding-bottom: 30px">
					<h2 class="sec-title">個人情報保護方針（プライバシーポリシー）</h2>
					<div style="clear: both; width: 100%; height: 1px"></div>
					<p>一般社団法人日本ワーキング・ホリデー協会（以下、当協会という）では、ワーキングホリデー制度の運営及び各種手続きを行うにあたり、様々な個人情報をお預かりしております。</br>
					当協会は、そのお預かりしている個人情報を、最も大切な資産の一つとし、その保護・管理を協会活動の最重要事項として大切に取り扱うこととしています。具体的には、下記の通り個人情報保護に関する方針を定め、職員全員に周知徹底し、皆さまの個人情報の適切な取扱い・管理をお約束します。
					</p>				
					<h3>１．個人情報の定義</h3>
					<p>個人情報とは個人に関する情報であり、住所、氏名、生年月日、メールアドレスまたはサイトへのアクセス記録により、その個人を識別できるものをさします。当該情報だけではなく、他の情報との照合によって判別できる情報も含まれます。</p>
					
					<h3>２．個人情報の利用目的</h3>
					<p>当協会では事業遂行上、必要な個人情報を適正かつ公正な手段で取得しますが、これらの個人情報は明確に使用目的を限定し、厳正に管理します。また、業務を円滑に進めるため業務の一部を委託し、この業務委託先に対して必要な個人情報を提供することがありますが、当協会はこれら業務委託先との間で取扱いに関する契約締結をはじめ、適切な監督を行います。当協会が取得する個人情報は以下の目的で利用します。</p>
					<p>（利用目的）</p>
					<p> セミナー・語学講座等のイベント案内、商品・サービスの情報や宣伝物等の提供</br>
						当協会提供のサービスやシステムの保守・サポート</br>
						各種事業に関するマーケティングや調査、お客様からのお問合せへの回答</br>
						職業紹介事業における求職者、求人企業への情報提供と付随する業務</br>
						その他、お客様との取引・契約を適切かつ円滑に履行するため</p>
						
					<h3>３．個人情報の利用に関する免責事項</h3>
					<p>当協会では、以下の場合を除き、本人の同意なく第三者に個人データを提供しません。</p>
					<p>法令に基づく場合</br>
						人の生命、身体又は財産を保護するにあたり、本人の同意を得ることが困難であるとき</br>
						当協会からお客様へ情報提供を行う際、郵送物の配達業務または情報の配信を委託する場合で、必要と思われる組織・団体に対して個人情報の提供を行うとき</p>
					<h3>４．個人情報の安全管理措置</h3>
					<p>当協会は、取扱う個人データの漏洩、滅失または毀損の防止その他の個人データの安全管理のため、十分なセキュリティ対策を講じるとともに、利用目的の達成に必要とされる正確性・最新性を確保するために適切な措置を講じています。</p>
					<h3>５．個人情報保護法に基づく保有個人データの開示、訂正等、利用停止など</h3>
					<p>個人情報保護法に基づく保有個人データに関する開示、訂正等または利用停止などに関するご請求については、ご本人であることを確認させていただいた上でご対応させていただきます。</p>
					<h3>６．法令等の遵守</h3>
					<p>当協会は、個人情報の保護に関する法律（個人情報保護法）その他の関連法令および関係官庁のガイドライン等を遵守します。</p>
					<h3>７．見直し・改善</h3>
					<p>当協会の個人情報の取扱いおよび安全管理に係る適切な措置については、適宜見直し、改善いたします。</p>
					<h3>８．お問い合わせ・ご相談・苦情へのご対応</h3>
					<p>当協会は、個人情報の取扱いに関する苦情・ご相談に迅速にご対応いたします。ご連絡先は下記のお問い合わせ窓口となります。なお、ご照会者がご本人であることを確認させていただいた上で、ご対応させていただきますので、あらかじめご了承願います。</p>
					
					<P>【団体名】 　〔 一般社団法人 日本ワーキング・ホリデー協会 〕</p>
					<p>【所在地】 　 〔 〒160-0023 東京都新宿区西新宿1-3-3 品川ステーションビル新宿5階507 〕</p>
					<p>【電話番号】 〔 03-6304-5858 〕</p>

				</div>
		</div>
	</div>
  </div>
  </div>
<?php fncMenuFooter($header_obj->footer_type); ?>
</body>
<script>
	$("input[type='radio']").click(function(){
		
		var val = $(this).val();
		
		if(val == "1") 
		{
			$(this).parent().find("input[type='text']").show();
			//var name = $(this).attr("name").substring(0, 3);
			//$("input[name='" + name + "_text']").prop('required', true);
			//$("input[name='" + name + "_text']").focus();
		}
		if(val == "0")
		{
			$(this).parent().find("input[type='text']").hide();
			//var name = $(this).attr("name").substring(0, 3);
			//$("input[name='" + name + "_text']").removeAttr('required');
		}
		
	});
	$("document").ready(function() {
		$("select[name='check_in_year']").val($("select[name='check_in_year'] option:eq(1)").val());
		$("select[name='check_in_month']").val("<?php echo $Month; ?>");
		$("select[name='check_in_day']").val(Number("<?php echo $Day; ?>"));
		
		$("form").submit(function() {
			var radio = ["qt1_input","qt2_input","qt3_input","qt4_input","qt5_input", "qt6_input"];
			for (var i = 0; i < radio.length; i++) {
				if (!$("input[name='" + radio[i] + "']").is(':checked')) {
				    alert("すべての項目の「はい」又は「いいえ」を選択してください");
				    return false;
				} else {
					if ($("input[name='" + radio[i] + "']:checked").val() == 1) {
						if($("input[name='" + radio[i].replace("input", "text") + "']").val() == "") {
							alert("詳細な内容を入力してください");
							$("input[name='" + radio[i].replace("input", "text") + "']").focus();
							return false;
						}
					}
				}
			}
			if ($("input[name='check_in_ct']").val() == "") {
				alert("お名前を入力してください！");
				$("input[name='check_in_ct']").focus();
				return false;
			}
			
			$("input[type='submit']").val("送信中..");
			$("input[type='submit']").attr("disabled", true);
			$("input[type='submit']").css("background","#3e3c3c");
			$("input[type='submit']").css("border","1px solid #000");
		});
	});
</script>
</html>



