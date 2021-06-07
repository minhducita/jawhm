<?php
$k = @$_GET['k'];
$n = @$_GET['n'];
if (!$k || !$n){
	die();
}
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page='フランスビザ申請確認事項';
$header_obj->description_page='の申告書は海外渡航、また渡航のお手続きがスムーズに進むよう、以下の内容を事前にご申告いただくための書類です';
$header_obj->full_link_tag=true;
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'フランスビザ申請確認事項';

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
			<form method="POST" action="./fr_library.php">
				<h2 class="sec-title" style="text-align: center">フランスワーキングホリデービザ申請 確認事項</h2>
				<div style="padding-left:20px; margin-bottom: 20px;">
					<p>フランスワーキングホリデービザ申請添削サポートに関する確認事項となります。</br>
					ビザの規定に違反する、また虚偽の申請があった場合、メンバーサポートの対象外となります。</br>
					尚、ビザの発給に関して申請の却下など大きなリスクが伴う可能性があります。
					</p>

				</div>
				<div class="bd-fath">
					<ol>
						<li>
							フランスのワーキングホリデービザは<span style="border-bottom: 1px solid">就労目的のビザではない</span>ことを十分に理解していますか？</br>
							</br>
								<label for="qt1_input_1">はい</label>
								<input type="radio" name="qt1_input" value="1" id="qt1_input_1" >
								<label for="qt1_input_2"> いいえ</label>
								<input type="radio" name="qt1_input" value="0" id="qt1_input_2">
								<span></span>
							
						</li>
						<li>
							フランスワーキングホリデー渡航前に現地の<span style="border-bottom: 1px solid">仕事を確定（内定）</span>していますか？</br>注意）仕事を事前に確定されている方のビザサポートは規定に反するため原則お受けしておりません
							</br></br>
							<label for="qt2_input_1">はい</label>
							<input type="radio" name="qt2_input" value="1" id="qt2_input_1">
							<label for="qt2_input_2"> いいえ</label>
							<input type="radio" name="qt2_input" value="0" id="qt2_input_2">
							<span></span>
					
							<span id="sptext" style="display: none" >
							<p>渡航前に就労先が確定している方へ</p></br>
							<p>日本ワーキング・ホリデー協会では、政府、大使館により取り決められた、ワーキング・ホリデー制度の規定に準じた渡航サポートを行います。</p></br>
							<p>ワーキング・ホリデー制度とは，二国・地域間の取決め等に基づき，各々が，相手国・地域の青少年に対し，休暇目的の入国及び滞在期間中における旅行・滞在資金を補うための付随的な就労を認める制度です。</p></br>
							<a style="text-decoration: none !important;">参照：外務省HP</a><a style="text-decoration: none !important; color: #3f3afd; " href="https://www.mofa.go.jp/mofaj/toko/visa/working_h.html" target="_blank">　https://www.mofa.go.jp/mofaj/toko/visa/working_h.html</a></br>
							<p>渡航前、或いは申請前に渡航先の国にて就労先が決まっている場合、ビザの目的にそぐわないという理由により、ビザ申請の却下並びに入国拒否となるケースがございます。</p></br>
							<p>仕事が確定していることが要因により、ビザ申請却下や入国拒否などのケースとなった場合のサポート、再申請のサポート、また申請に関する交通費や書類の取得費用等の諸経費負担に関して、当協会では一切責任を負いかねます。</p></br>
							<p>以上を十分にご理解の上、サポートの依頼をお願い致します。</p></br>
							<p>【起こりうるリスク】</p>
								<p>・ビザ申請、入国審査時、ビザ審査官より就労先、滞在先に仕事が決まっているかなどの連絡が入ることがあります</p>
								<p>・追加書類の提出が求められる場合があります</p>
								<p>・最終的にビザ申請却下、入国拒否になる可能性があります</p></br>
								<p>【注意点】</p>
								<p>・仕事先の住所、仕事先から紹介された住所での申請はできません</p>
								<p>・申請書内にて仕事が目的の文章を書くことはできません</p>
								<p>・専門職の仕事はビザ却下のリスクが高まります。（フランスの場合）</p></br>
								<p>以上を十分に理解した上で、協会のサポートを受けることに同意いたします。</p></br>
								<label for="qt18_input_1">はい</label>
								<input type="radio" name="qt18_input" value="1" id="qt18_input_1">
								<label for="qt18_input_2"> いいえ</label>
								<input type="radio" name="qt18_input" value="0" id="qt18_input_2">
							</span>
						</li>
						<li>
							フランスにて<span style="border-bottom: 1px solid">専門職</span>のお仕事を探す予定はありますか？</br>
						　注意）専門職のお仕事を希望される場合、ビザの審査が厳しくなる傾向があります。</br></br>
							<label for="qt3_input_1">はい</label>
							<input type="radio" name="qt3_input" value="1" id="qt3_input_1" >
							<label for="qt3_input_2"> いいえ</label>
							<input type="radio" name="qt3_input" value="0" id="qt3_input_2"></br></br>
							<span>どのような仕事ですか？</span>
							<input type="text" name="qt3_text" style="display: none">
						</li>
						<li>
							フランスワーキングホリデービザ申請（予約）日から渡航予定日の期間は、</br>
							<span style="border-bottom: 1px solid">１か月以上、３か月以内</span>ですか？</br>
							注意）渡航１か月を切った申請の場合、渡航までにビザの発給が間に合わないリスクが高まります。
							</br></br>
							<label for="qt4_input_1">はい</label>
							<input type="radio" name="qt4_input" value="1" id="qt4_input_1">
							<label for="qt4_input_2"> いいえ</label>
							<input type="radio" name="qt4_input" value="0" id="qt4_input_2"></br>
							<div id="div_12" style="padding-top: 20px; display:none;">
								<span>申請日（予約日）をご入力ください</span></br></br>
								<select name="check_in_year4" style="width:80px;">
									<?php echo $checkInYear; ?>
								</select>年&nbsp;
								<select name="check_in_month4" style="width:80px;">
									<?php echo $checkInMonth; ?>
								</select>月&nbsp;
								<select name="check_in_day4" style="width:80px;">
									<?php echo $checkInDay; ?>
								</select>日&nbsp;
						
							</div>
						</li>
											
					</ol>
				</div>
			<div class="bd-fath">
			<p>【申請提出書類関連】</p><br>
				<ol start="5">
						<li>
							今までにビザに問題があったこと(ビザ却下、入国拒否、強制送還等)はありますか？　</br>はいの場合：その詳細</br></br>
							<label for="qt5_input_1">はい</label>
							<input type="radio" name="qt5_input" value="1" id="qt5_input_1">
							<label for="qt5_input_2"> いいえ</label>
							<input type="radio" name="qt5_input" value="0" id="qt5_input_2">
							<span></span>
							<input type="text" name="qt5_text" style="display: none">
						</li>
						<li>
						<span style="border-bottom: 1px solid">フランス入国日</span>から<span style="border-bottom: 1px solid">１年間有効な海外留学保険</span>に加入済（予定）ですか？</br>※クレジット付帯保険は不可</br></br>
							<label for="qt6_input_1">はい</label>
							<input type="radio" name="qt6_input" value="1" id="qt6_input_1">
							<label for="qt6_input_2"> いいえ</label>
							<input type="radio" name="qt6_input" value="0" id="qt6_input_2">
							<span></span>
							
						</li>
						<li>
						<span style="border-bottom: 1px solid">ビザ申請日</span>から<span style="border-bottom: 1px solid">１か月以内に発行</span>された自身名義の《残高証明書》を取得（予定）していますか？ </br></br>
							<label for="qt7_input_1">はい</label>
							<input type="radio" name="qt7_input" value="1" id="qt7_input_1">
							<label for="qt7_input_2"> いいえ</label>
							<input type="radio" name="qt7_input" value="0" id="qt7_input_2">
							<span></span>
							
						</li>
						<li>
							ビザ<span style="border-bottom: 1px solid">申請日</span>から<span style="border-bottom: 1px solid">１か月以内に発行</span>され、かつ《健康である/渡航に関して健康に支障がない》と一筆記載がある《健康診断書》を取得（予定）していますか？
</br></br>
							<label for="qt8_input_1">はい</label>
							<input type="radio" name="qt8_input" value="1" id="qt8_input_1">
							<label for="qt8_input_2"> いいえ</label>
							<input type="radio" name="qt8_input" value="0" id="qt8_input_2">
							<span></span>
							
						</li>
				</ol>
						</div>
						<div class="bd-fath">
					<p>【申請書関連：長期ビザ申請書】</p><br>
				<ol start="9">
						<li>
							ビザ申請日から<span style="border-bottom: 1px solid">３か月以内</span>の日程で<span style="border-bottom: 1px solid">フランス渡航日</span>を確定していますか？
　　							</br>例）9月１５日渡航の場合、６月１６日以降の申請日を指定できます。</br></br>
							<label for="qt9_input_1">はい</label>
							<input type="radio" name="qt9_input" value="1" id="qt9_input_1">
							<label for="qt9_input_2">いいえ</label>
							<input type="radio" name="qt9_input" value="0" id="qt9_input_2">
								<div id="div_12" style="padding-top: 20px; display:none;">
								<span>渡航予定日をご入力ください</span></br></br>
								<select name="check_in_year9" style="width:80px;">
									<?php echo $checkInYear; ?>
								</select>年&nbsp;
								<select name="check_in_month9" style="width:80px;">
									<?php echo $checkInMonth; ?>
								</select>月&nbsp;
								<select name="check_in_day9" style="width:80px;">
									<?php echo $checkInDay; ?>
								</select>日&nbsp;
								</div>
						</li>
						<li>
							 フランスの<span style="border-bottom: 1px solid">滞在先の住所</span>を確定していますか？（短期間でも可能）</br>
							 注意）ホームステイ先、ホテルの住所など。ご友人宅の住所や実際に滞在しない住所は推奨しません。
						</br></br>
							<label for="qt10_input_1">はい</label>
							<input type="radio" name="qt10_input" value="1" id="qt10_input_1">
							<label for="qt10_input_2"> いいえ</label>
							<input type="radio" name="qt10_input" value="0" id="qt10_input_2"></br>
							<span>滞在先をどのようにするか詳細をご入力ください</span>
							<input type="text" name="qt10_text" style="display: none">
						</li>
						<li>
							 フランスに滞在しているご家族はいらっしゃいますか？ </br></br>
							<label for="qt11_input_1">はい</label>
							<input type="radio" name="qt11_input" value="1" id="qt11_input_1">
							<label for="qt11_input_2"> いいえ</label>
							<input type="radio" name="qt11_input" value="0" id="qt11_input_2"></br>
							<span>続柄をご入力ください。</span>
							<input type="text" name="qt11_text" style="display: none">
						</li>
						<li>
							過去にフランスに３か月以上滞在したことはありますか？もしくは２回以上の渡航歴がありますか？
							</br></br>
							<label for="qt12_input_1">はい</label>
							<input type="radio" name="qt12_input" value="1" id="qt12_input_1">
							<label for="qt12_input_2"> いいえ</label>
							<input type="radio" name="qt12_input" value="0" id="qt12_input_2"></br>
							
							<div id="div_12" style="display:none;">
							<div>
							<ul ><li style="display:inline-block; width:30%;"><label>ビザの種類：</label><input type="text" name="qt12_text1" style="width:40%;"></li>
							<li style="display:inline-block"><label>期間：</label>
								<select name="check_in_year12" style="width:50px;">
								<?php echo $checkInYear; ?>
								</select>年&nbsp;
								<select name="check_in_month12" style="width:40px;">
									<?php echo $checkInMonth; ?>
								</select>月&nbsp;
								<select name="check_in_day12" style="width:40px;">
									<?php echo $checkInDay; ?>
								</select>日&nbsp;
							</li>
								<li style="display:inline-block"><label>~</label>&nbsp;
									<select name="check_in_year121" style="width:50px;">
										<?php echo $checkInYear; ?>
									</select>年&nbsp;
									<select name="check_in_month121" style="width:40px;">
										<?php echo $checkInMonth; ?>
									</select>月&nbsp;
									<select name="check_in_day121" style="width:40px;">
										<?php echo $checkInDay; ?>
									</select>日&nbsp;
								</li>
																
								</ul> </div>
								<div>
							<ul><li style="display:inline-block"><label>回数： </label><input type="text" name="qt12_text2" style="width:60%;"></li>
							<li style="display:inline-block"><label>滞在理由： </label><input type="text" name="qt12_text3" style="width:60%;"></li></ul>
							</div>
							</div>
							</li>
				</ol>
						</div>
						<div class="bd-fath">
						<ol start="13">
							<p>【申請書関連：動機書作文】</p><br>
							<li>
							滞在目的が<span style="border-bottom: 1px solid">《就労》以外となる内容</span>で記入しましたか？</br>　また、ワーキングホリデービザは<span style="border-bottom: 1px solid">就労目的のビザでない</span>ことを理解していますか？
							</br></br>
							<label for="qt13_input_1">はい</label>
							<input type="radio" name="qt13_input" value="1" id="qt13_input_1">
							<label for="qt13_input_2"> いいえ</label>
							<input type="radio" name="qt13_input" value="0" id="qt13_input_2">
							<span></span>

							</li>
						</ol>
							</div>
							<div class="bd-fath">
						<ol start="14">
							<p>【協会メンバーサポートに関して】</p><br>
							<li>
							協会のビザ添削サポートは<span style="border-bottom: 1px solid">ビザの発給を保証するものでない</span>ことを理解していますか？
							</br></br>
							<label for="qt14_input_1">はい</label>
							<input type="radio" name="qt14_input" value="1" id="qt14_input_1">
							<label for="qt14_input_2"> いいえ</label>
							<input type="radio" name="qt14_input" value="0" id="qt14_input_2">
							<span></span>
							
							</li>
							<li>
							ビザ申請書の提出は東京の在日フランス大使館に<span style="border-bottom: 1px solid">オンライン予約</span>後、</br>
							ご<span style="border-bottom: 1px solid">自身で直接大使館に赴く必要がある</span>ことを理解していますか？（代理申請不可/早め予約推奨）
							</br></br>
							<label for="qt15_input_1">はい</label>
							<input type="radio" name="qt15_input" value="1" id="qt15_input_1">
							<label for="qt15_input_2"> いいえ</label>
							<input type="radio" name="qt15_input" value="0" id="qt15_input_2">
							<span></span>
							<input type="text" name="qt15_text" style="display: none">
							</li>
							
						</ol>
							</div>
							<div class="bd-fath">
							<p>【最終確認】</p><br>
							<ol start="16">
							<li>
							フランスワーキングホリデービザ申請のために必要な書類・申請書を過不足なく揃え、<span style="border-bottom: 1px solid">申請用/ご自身保管用にA4サイズのコピー</span>をとっていますか？（必要性を理解していますか？）</br></br>
							<label for="qt16_input_1">はい</label>
							<input type="radio" name="qt16_input" value="1" id="qt16_input_1">
							<label for="qt16_input_2"> いいえ</label>
							<input type="radio" name="qt16_input" value="0" id="qt16_input_2">
							<span></span>
							<input type="text" name="qt16_text" style="display: none">
							</li>
							<li>
							以上の確認事項に関して不適当な内容、もしくは虚偽の申請があった場合、<span style="border-bottom: 1px solid">ビザの発給に関してリスクが発生する可能性がある</span>ことを理解していますか？
							</br></br>
							<label for="qt17_input_1">はい</label>
							<input type="radio" name="qt17_input" value="1" id="qt17_input_1">
							<label for="qt17_input_2"> いいえ</label>
							<input type="radio" name="qt17_input" value="0" id="qt17_input_2">
							<span></span>
							<input type="text" name="qt17_text" style="display: none">
							</li>
							</div>
				<div class="bd-row2">
					
					<p>(1)	上記の内容に相違ありません。</p>
					<p>(2)	以下の内容に同意します</p>
					<p>
					・必要がある場合には、当協会より関係機関に情報を提供します。 </br>
					・虚無の申告があった際には手配をお断りすることがありますが、その際の返金はいたしかねます。</br>
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
			$(this).parent().find("#sptext").addClass("sptext").show();
			$(this).parent().find("#div_12").show();
				
		
			//var name = $(this).attr("name").substring(0, 3);
			//$("input[name='" + name + "_text']").prop('required', true);
			//$("input[name='" + name + "_text']").focus();
		}
		if(val == "0")
		{
			$(this).parent().find("input[type='text']").hide();
			$(this).parent().find("#sptext").hide();
			$(this).parent().find("#div_12").hide();
			
			//var name = $(this).attr("name").substring(0, 3);
			//$("input[name='" + name + "_text']").removeAttr('required');
		}
		
	});
	function getvaldt(){
		var year = $("select[name='check_in_year']").val();
		var month = $("select[name='check_in_month']").val();
		var date = $("select[name='check_in_day']").val();
		
	}

	
	$("document").ready(function() {
		$("select[name='check_in_year']").val($("select[name='check_in_year'] option:eq(1)").val());
		$("select[name='check_in_month']").val("<?php echo $Month; ?>");
		$("select[name='check_in_day']").val(Number("<?php echo $Day; ?>"));
		
		$("form").submit(function() {
			var radio = ["qt1_input","qt2_input","qt3_input","qt4_input","qt5_input","qt6_input","qt7_input","qt8_input","qt9_input","qt10_input","qt11_input","qt12_input","qt13_input","qt14_input","qt15_input","qt16_input","qt17_input"];
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



