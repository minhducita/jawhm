<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
//?k=KT&n=KT1807-076
	$k = @$_GET['k'];
	$n = @$_GET['n'];
	
if (!$k || !$n) {
    	die();
}
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page='お振込み連絡';
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
	
		alert("「送信しました。お手続きありがとうございました。」");
	</script>
<?php

}
 ?>


	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		
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
		.inputfile{
			border: 1px solid rgba(115, 136, 193);
    background: rgba(115, 136, 193);
    padding: 10px 40px;
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    border-radius: 5px;
    cursor: pointer;
		}
	.image-upload{
		left: 35%;
		position: relative;	
		}
		input[type='radio']{
			float:left;
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
			<form method="POST" action="./furikomi-library.php" enctype="multipart/form-data" >
				<h2 class="sec-title" style="text-align: center">お振込み連絡</h2>
				<div style="padding-left:20px; margin-bottom: 20px;">
				<p>お振込み手続きが完了しましたら、以下のフォームからご連絡頂けますようお願い致します。</p>
				</div>
				<div class="bd-fath">
				<ol>
				<li>
						<span>お振込み時のお名前は、留学者ご本人のお名前で手続きいただけましたか？</span></br></br>
								<label for="qt1_input_1">はい （留学者本人の名前）</label>
							<input type="radio" name="qt1_input" value="1" id="qt1_input_1" ></br>
								<div id="popup" style="display:none">
								<a style="text-decoration: none; color: #000">お手元に振込時のレシート（振込依頼書やご利用明細表など）があれば、写真撮影の上、添付してください。
								   （レシートがお手元にない場合や、写真撮影ができない場合は不要です）</a></br></br>
								<div class="image-upload">
								<label class="inputfile" for="file-input">
									写真を添付する
									<span><input type="file" id="file-input" name="imgfile2"  style="display:none" ></span>
									</label>
										</div></br>
								<img id="blah" width="130" height="200" name="imgname" style="display:none; border:none"/>
								</div> </br>
								<label for="qt1_input_2">いいえ （ご両親など、留学者本人以外からの振り込み）</label>
								<input type="radio" name="qt1_input" value="0" id="qt1_input_2"></br></br>
								<span></span>
								<div id="option_2" style="display:none">
								<span>お振込み時のお名前をご記入ください</span>
								<input type="text" name="qt2_text"></br>
								<div>
								お手元に振込時のレシート（振込依頼書やご利用明細表など）があれば、写真撮影の上、添付してください。
								（レシートがお手元にない場合や、写真撮影ができない場合は不要です）
								</div></br>
								<div class="image-upload">
								<label class="inputfile" for="file-input-2">
									写真を添付する
									<span><input type="file" name="imgfile" id="file-input-2" style="display:none"></span>
									</label>
										</div></br>
										<img id="blah-2" width="130" height="200" style="display:none; border:none"/>
								</div>
								</li>
						</ol>
					</div>
				<p>
					<input type="hidden" value="<?php echo $k;?>" name="short_name">
					<input type="hidden" value="<?php echo $n;?>" name="code_name">
					<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" name="self">
					<input type="submit" value="送信">
					<div style="width: 100%;clear:both;height:20px"></div>
				</p>
			</form>
				
		</div>
	</div>
  </div>
  </div>
<?php fncMenuFooter($header_obj->footer_type); ?>
</body>
<script>


	$("input[type='radio']").click(function(){
		var val = $(this).val();
		
		if(val == "0") 
		{
			//$(this).parent().find("input[type='text']").show();
			$("#option_2").show();
			$("#blah").hide();
			$("#blah").attr("src","");
			$("#popup").hide();
			//var name = $(this).attr("name").substring(0, 3);
			//$("input[name='" + name + "_text']").prop('required', true);
			//$("input[name='" + name + "_text']").focus();
		}
		if(val == "1")
		{
			//$(this).parent().find("input[type='text']").hide();
			$("#option_2").hide();
			$("#popup").show();
			$("#blah-2").hide();
			$("#blah-2").attr("src","");
			$("input[type='text']").val("");
			//var name = $(this).attr("name").substring(0, 3);
			//$("input[name='" + name + "_text']").removeAttr('required');
		}
		
	});
	function explode(){
		  alert("詳細な内容を入力してください");
		}
	function readURL(input) {

	  if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
		  $('#blah').attr('src', e.target.result);
		  $('#blah-2').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	  }
	}
	$("#file-input").change(function() {
		$("#blah").show();
  readURL(this);
});
	$("#file-input-2").change(function() {
		$("#blah-2").show();
	readURL(this);
});

	$("document").ready(function() {
	
		$("select[name='check_in_year']").val($("select[name='check_in_year'] option:eq(1)").val());
		$("select[name='check_in_month']").val("<?php echo $Month; ?>");
		$("select[name='check_in_day']").val(Number("<?php echo $Day; ?>"));
		
		$("form").submit(function() {
			var radio = ["qt1_input"];
			for (var i = 0; i < radio.length; i++) {
			
				if (!$("input[name='" + radio[i] + "']").is(':checked') ) {
				    alert("すべての項目の「はい」又は「いいえ」を選択してください");
				    return false;
					}
					else {
						if ($("input[name='" + radio[i] + "']:checked").val() == 0) {
							if ($("input[type='text']").val() == ""){
								setTimeout(explode, 1000);
									return false;
							}
						}
					}
				}
			$("input[type='submit']").val("送信中..");
			$("input[type='submit']").attr("disabled", true);
			$("input[type='submit']").css("background","#3e3c3c");
			$("input[type='submit']").css("border","1px solid #000");
		});
		});
</script>
</html>



