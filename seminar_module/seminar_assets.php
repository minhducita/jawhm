<?php
/**
 * num指定時のpopup用JS
 * @param $id
 * @param $num
 * @return string
 */
function get_popup_js($id, $num)
{
	$goto_view = "";
	if (!empty($_GET['view'])) {
		$goto_view = 'fnc_yoyaku($("input[uid=' . $num . ']").get(0));';
	};
	
	
	$str = '
		<script type="text/javascript">
			$(document).ready(function() {
				if ($("#'.$id.'").size()) {
					$.blockUI({
						message: $("#'.$id.'"),
						css: { 	left: ($(window).width()-800)/2 +"px",
								overflow: "auto",
								cursor:"default",
								width: "auto",
								height: "auto"
						}
					});
					$(".blockMsg").css("max-height", 90 +"%");
					$(".blockMsg").css("min-height",200 +"px");
					$(".blockMsg").css("max-width",800+"px");
					$(".blockMsg").css("top", ($(window).height()-$(".blockMsg").height())/2 +"px");
					' . $goto_view . '
				}
			});
                        
		</script>
';
	return $str;
}

/**
 * 同時開催チェック用JS
 * @return string
 */
function get_douji_popup_js()
{
	return '
		<script type="text/javascript">
			$(document).ready(function() {
				$.blockUI({ message: $("#checkdoujiform"),
					css: { 	//left: ($(window).width()-800)/2 +"px",
								overflow: "auto",
								cursor:"default",
								width: "auto",
								height: "auto",
						//overflow: "auto",
						////top:  ($(window).height() - 500) /2 + "px",
						top:  "50px",
						left: ($(window).width() - 600) /2 + "px"
						//width: "600px"
					}
				});
				$(".blockMsg").css("max-height", 90 +"%");
				$(".blockMsg").css("min-height",200 +"px");
				$(".blockMsg").css("max-width",800+"px");
				//$(".blockMsg").css("top", ($(window).height()-$(".blockMsg").height())/2 +"px");
			});
		</script>';
}

/**
 * セミナー用JSの取得
 * @param $popup_js
 * @return string
 */
function get_seminar_js($popup_js)
{
	$checklogin  = !empty($_SESSION['mem_id'])?1:0;
	return '
<script type="text/javascript" src="/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="/js/fixedui/fixedUI.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript">
var checklogin = '.$checklogin.';
jQuery(function($) {
	$(".feedshow").click(function() {
	  $.fixedUI("#feedbox");
	});
	$("#feedhide").click(function() {
	  $.unfixedUI();
	});
	$("#feedform").submit(function() {
		$senddata = $("#feedform").serialize();
		$.ajax({
			type: "POST",
			url: "https://'.$_SERVER['SERVER_NAME'].'/feedback/sendmail.php",
			data: $senddata + "&subject=Seminar Request",
			success: function(msg){
				alert("リクエストありがとうございました。");
				$.unfixedUI();
			},
			error:function(){
				alert("通信エラーが発生しました。");
				$.unfixedUI();
			}
		});
	  return false;
	});

	jQuery( "input:checkbox", "#shiborikomi" ).button();
	jQuery( "input:radio", "#shiborikomi" ).button();

});

function cplacesel()	{
	jQuery("#place-tokyo").button("destroy");
	jQuery("#place-tokyo").removeAttr("checked");
	jQuery("#place-tokyo").button();
	fncsemiser();
}
function fncplacesel(obj)	{
	fncsemiser();
}
function fnccountrysel()	{
	jQuery("#country-all").button("destroy");
	jQuery("#country-all").removeAttr("checked");
	jQuery("#country-all").button();
	fncsemiser();
}
function fnccountryall()	{
	if (jQuery("#country-all").attr("checked"))	{
		jQuery("input:checkbox", "#shiborikomi" ).button("destroy");
		jQuery(":checkbox[id^=country-]").removeAttr("checked");
		jQuery("#country-all").attr("checked", "checked");
		jQuery( "input:checkbox", "#shiborikomi" ).button();
	}
	fncsemiser();
}
function fncknowsel()	{
	jQuery("#know-all").button("destroy");
	jQuery("#know-all").removeAttr("checked");
	jQuery("#know-all").button();
	fncsemiser();
}
function fncknowall()	{
	if (jQuery("#know-all").attr("checked"))	{
		jQuery("input:checkbox", "#shiborikomi" ).button("destroy");
		jQuery(":checkbox[id^=know-]").removeAttr("checked");
		jQuery("#know-all").attr("checked", "checked");
		jQuery( "input:checkbox", "#shiborikomi" ).button();
	}
	fncsemiser();
}
function fncsemiser()	{
	jQuery("#semi_show").html("<div style=\"vertical-align:middle; text-align:center; margin:30px 0 30px 0; font-size:20pt;\"><img src=\"https://'.$_SERVER['SERVER_NAME'].'/images/ajax-loader.gif\">セミナーを探しています...</div>");
	$senddata = jQuery("#kensakuform").serialize();
        /*alert($senddata);*/
	$.ajax({
		type: "POST",
		url: "https://'.$_SERVER['SERVER_NAME'].'/seminar_module/search.php",
		data: $senddata,
		success: function(msg){
			jQuery("#semi_show").html(msg);
		},
		error:function(){
			alert("通信エラーが発生しました。");
			$.unblockUI();
			defaultvalue();
			resizeformseminar();
		}
	});
}

</script>

<script>

function check_mailkaiin(obj) {
	
	if($(obj).is(":checked")){
		$("form#form_yoyaku").find("input[name=\'mailkaiin\']").val("on");
	}
	else 
	{
		$("form#form_yoyaku").find("input[name=\'mailkaiin\']").val("off");
	}
	
}

function fnc_next()	{
	$.ajax({
		type: "GET",
		url: "https://'.$_SERVER['SERVER_NAME'].'/seminar_module/seminar_yoyaku_input.php?acao='.(!empty($_GET['acao'])?$_GET['acao']:"").'",
		data: "",
                xhrFields: {
                    withCredentials: true
                },
		success: function(msg){
			first = true;
			$("#form_yoyaku table div").each(function() {
				if (first == false) {
					$(this).remove();
				}
				first = false;
			});
			$("#form_yoyaku table tr:last").after(msg);
			var $top = $(".blockUI.blockMsg.blockPage").css("top");
			$top = $top.replace("px","");
			$top = parseInt($top);
			$(".blockUI.blockMsg.blockPage").css("top",$top-80);
			resizeformseminar();
		},
		error:function(){
			alert("通信エラーが発生しました。");
		}
	});
	document.getElementById("form_area").style.display = "none";
	document.getElementById("form0").style.display = "none";
	document.getElementById("form1").style.display = "none";
	document.getElementById("form2").style.display = "";
				
        /*初心者向けセミナーでは誘導メッセージを表示*/
        $id = $("input#txt_id").val();
        $.ajax({
            type: "POST",
            url: "https://'.$_SERVER["SERVER_NAME"].'/seminar_module/check_4beginer.php",
            data: {id:$id},
            success: function(is4beginer){
                if(is4beginer != 0){
                    $("#msg_hajimete").css("display", "none");
					
                }else{
                    $("#msg_hajimete").css("display", "flex");
                }
				if(checklogin == 1){
					$("#seminarbtn").removeClass("seminar_btn");
				}
				if( $("#msg_hajimete").css("display") == "none" && checklogin == 1){
					$("#form2").css("height","430px");
					$("form.form-jawhm").css("height","71%");
					$("#btn_soushin").css("margin-top","10px");
					$("form.form-jawhm").css("overflow","hidden");
					setPositionPopup("form2");
				}
				else if(checklogin == 1){
					$("#form2").css("height","500px");
					$("form.form-jawhm").css("height","72%");
					$("form.form-jawhm").css("overflow","hidden");
					setPositionPopup("form2");
				}else{
					$("#form2").css("max-height","");
					resizeformseminar();
				}
            }
        });
}

function fnc_area(obj) {
	document.getElementById("form_area").style.display = "";
	document.getElementById("form0").style.display = "none";
	document.getElementById("form1").style.display = "none";
	document.getElementById("form2").style.display = "none";

	document.getElementById("btn_soushin").disabled = false;
	document.getElementById("btn_soushin").value = "送信";
	document.getElementById("div_wait_login").style.display = "none";
	document.getElementById("div_wait").style.display = "none";

	document.getElementById("area_name").innerHTML = obj.getAttribute("area");

	var alertplace = obj.getAttribute("alertplace");
	if (alertplace) {
		document.getElementById("alert_place").innerHTML = "このセミナーは<span style=\"font-size: 24px;\">「" + alertplace + "」</span>の会場にて開催されます。<br><br>";
	}

	document.getElementById("form_title").innerHTML = obj.getAttribute("name");
	document.getElementById("txt_title").value = obj.getAttribute("name");
	document.getElementById("txt_id").value = obj.getAttribute("uid");
	$.blockUI({ message: $("#yoyakuform"),
		css: {
			top:  ($(window).height() - 500) /2 + "px",
			left: ($(window).width() - 600) /2 + "px",
			width: "600px"
		}
	});
}


function fnc_login(obj)	{
	document.getElementById("form_area").style.display = "none";
	document.getElementById("form0").style.display = "";
	document.getElementById("form1").style.display = "none";
	document.getElementById("form2").style.display = "none";

	document.getElementById("btn_soushin").disabled = false;
	document.getElementById("btn_soushin").value = "送信";
	document.getElementById("div_wait_login").style.display = "none";
	document.getElementById("div_wait").style.display = "none";

	document.getElementById("form_title").innerHTML = obj.getAttribute("name");
	document.getElementById("txt_title").value = obj.getAttribute("name");
	document.getElementById("txt_id").value = obj.getAttribute("uid");
	$.blockUI({ message: $("#yoyakuform"),
		css: {
			top:  ($(window).height() - 500) /2 + "px",
			left: ($(window).width() - 600) /2 + "px",
			width: "600px"
		}
	});
}

function fnc_do_login(){

	obj = document.getElementById("login_email");
	if (obj.value == "")	{
		alert("メールアドレスを入力してください。");
		obj.focus();
		return false;
	}
	obj = document.getElementById("login_pwd");
	if (obj.value == "")	{
		alert("パスワードを入力してください。");
		obj.focus();
		return false;
	}

	document.getElementById("div_wait_login").style.display = "";
	document.getElementById("btn_login").value = "処理中...";
	document.getElementById("btn_login").disabled = true;

	$senddata = $("#yoyaku_login").serialize();
	$.ajax({
		type: "POST",
		url: "https://'.$_SERVER['SERVER_NAME'].'/seminar_module/login.php",
		data: $senddata,
		success: function(msg){
			document.getElementById("div_wait_login").style.display = "none";
			document.getElementById("btn_login").value = "ログイン";
			document.getElementById("btn_login").disabled = false;
			if (msg == true) {
				document.getElementById("login_email").value = "";
				document.getElementById("login_pwd").value = "";
				fnc_yoyaku2();
				checklogin = 1;
			} else {
				alert(msg);
			}
		},
		error:function(){
			alert("通信エラーが発生しました。");
		}
	});
}

function fnc_yoyaku2() {
	document.getElementById("form_area").style.display = "none";
	document.getElementById("form0").style.display = "none";
	document.getElementById("form1").style.display = "";
	document.getElementById("form2").style.display = "none";
}

function fnc_yoyaku(obj)	{
	document.getElementById("form_area").style.display = "none";
	document.getElementById("form0").style.display = "none";
	document.getElementById("form1").style.display = "";
	document.getElementById("form2").style.display = "none";

	document.getElementById("btn_soushin").disabled = false;
	document.getElementById("btn_soushin").value = "送信";
	document.getElementById("div_wait").style.display = "none";

	document.getElementById("form_title").innerHTML = obj.getAttribute("name");
	document.getElementById("txt_title").value = obj.getAttribute("name");
	document.getElementById("txt_id").value = obj.getAttribute("uid");

	$.blockUI({ message: $("#yoyakuform"),
		css: {
			top:  ($(window).height() - 350) /2 + "px",
			left: ($(window).width() - 600) /2 + "px",
			width: "610px"
		}
	});
	setPositionPopup("form1");
	
}
function btn_cancel()	{
	$.unblockUI();
	$("#form2").hide();
	$("#form2").removeAttr("style");
	$("form.form-jawhm").removeAttr("style");
}
function zentohan(inst){
	var han= "1234567890abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz@-.";
	var zen= "１２３４５６７８９０ａｂｃｄｅｆｇｈｉｊｋｌｍｎｏｐｑｒｓｔｕｖｗｘｙｚＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺ＠－．";
	var word = inst;
	for(i=0;i<zen.length;i++){
		var regex = new RegExp(zen[i],"gm");
		word = word.replace(regex,han[i]);
	}
	return word;
}
function btn_submit()	{
	obj = document.getElementById("txt_name");
	if (obj.value == "")	{
		alert("お名前（氏）を入力してください。");
		obj.focus();
		return false;
	}
	obj = document.getElementById("txt_name2");
	if (obj)	{
		if (obj.value == "")	{
			alert("お名前（名）を入力してください。");
			obj.focus();
			return false;
		}
	}
	obj = document.getElementById("txt_furigana");
	if (obj.value == "")	{
		alert("フリガナ（氏）を入力してください。");
		obj.focus();
		return false;
	}
	obj = document.getElementById("txt_furigana2");
	if (obj)	{
		if (obj.value == "")	{
			alert("フリガナ（名）を入力してください。");
			obj.focus();
			return false;
		}
	}
	obj = document.getElementById("txt_mail");
	if (obj.value == "")	{
		alert("メールアドレスを入力してください。");
		obj.focus();
		return false;
	}
	jQuery("#txt_mail").val(zentohan(jQuery("#txt_mail").val()));
	var strMail = jQuery("#txt_mail").val();
	if (!strMail.match(/.+@.+\..+/)){
		alert("メールアドレスを確認してください。");
		jQuery("#txt_mail").focus();
		return false;
	}
	obj = document.getElementById("txt_tel");
	if (obj.value == "")	{
		alert("電話番号を入力してください。");
		obj.focus();
		return false;
	}
	/*if (obj.value[0] != "0")	{
		alert("電話番号は正しく入力してください。");
		obj.focus();
		return false;
	}*/
        
	if (!confirm("ご入力頂いた内容を送信します。よろしいですか？"))	{
		return false;
	}

	$senddata = $("#form_yoyaku").serialize();

	document.getElementById("div_wait").style.display = "";
	document.getElementById("btn_soushin").style.display = "none";
	document.getElementById("btn_soushin").value = "処理中...";
	document.getElementById("btn_soushin").disabled = true;

	$.ajax({
		type: "POST",
		url: "https://'.$_SERVER['SERVER_NAME'].'/yoyaku/yoyaku.php",
		data: $senddata,
		success: function(msg){
			document.getElementById("div_wait").style.display = "none";
			alert(msg);
			document.getElementById("btn_soushin").style.display = "block";
			// POST DATA to PARDOT -- minhquyen
			// $("#form_yoyaku").attr("action","https://go.pardot.com/l/401302/2017-08-16/8hhb9d");
			// $("#form_yoyaku").attr("method","POST");
			// $("#form_yoyaku").submit();
			$.unblockUI();
		},
		error:function(){
			alert("通信エラーが発生しました。");
			$.unblockUI();
		}
	});
}
</script>' . $popup_js .
'<script type="text/javascript">
	function resizeformseminar(){
		if(checklogin != 1){
			//default	
			defaultvalue();			
			var $width_formjawhm  = $("#form2").width();
			$("#seminarbtn").width($width_formjawhm);
			$("#seminarbtn").addClass("seminar_btn");
			
			var $max_form2_heigth = 740;
			var $min_form2_height = 700;
			
			var postionpoup = $(window).height();
			
			var form2_height_auto = $("#form2").height();
			
			var $height_header = $(".form-jawhm").height();
			var $height_btn    = $("#seminarbtn").height();
			
			var $height_msg    = ($("#msg_hajimete").is(":visible"))?0:57; // height msg
			if((postionpoup  >= $max_form2_heigth) || (form2_height_auto >= $min_form2_height && $height_msg != 0) ){
				if((form2_height_auto >= $min_form2_height && $height_msg != 0 && form2_height_auto < $max_form2_heigth)){
					$("#form2").css("height",form2_height_auto - $height_msg);
					var $form_jawhm = form2_height_auto - $height_header - $height_btn - $height_msg;
				}else{
					$full_form = $("#form_yoyaku").height();
					$("#form2").css("height",$full_form + $height_header + $height_btn);
					var $form_jawhm = $full_form;
				}
				$("form.form-jawhm").height($form_jawhm);
				$("form.form-jawhm").css("overflow","hidden");
			}else{
				$("form.form-jawhm").height(form2_height_auto - $height_header - $height_btn);
				$("form.form-jawhm").css("overflow","");
			}
			setPositionPopup("form2");
		}
	}
	function defaultvalue(){
		$("form.form-jawhm,#form2").removeAttr("style");
	}
	function setPositionPopup($form){
		/*popup height form*/
		var height_window 	= $(window).height();
		if($form == "form2"){
			var height_form 	= $("#form2").height();	
			var margin_top		= height_window - height_form;
			if( margin_top > 0){
				margin_top = margin_top/2;
				$("#form2").css("margin-top",margin_top-12);
			}
			/* hide blockui*/
			$(".blockUI.blockMsg.blockPage").css({"height":0,"border":"none"});
		}
		else if($form == "form1"){
			var height_form 	= $("#form1").height();	
			var margin_top		= height_window - height_form;
			if( margin_top > 0){
				margin_top = margin_top/2;
				$(".blockUI.blockMsg.blockPage").css("top",margin_top-12);
			}
		}
		/* popup width */
		var width_form 	= $("#form2").width();	
		var width_window 	= $(window).width();
		var $blockui_left = (width_window - width_form)/2;
		$(".blockUI.blockMsg.blockPage").css("left",$blockui_left);
			
	}
	$(document).ready(function() {
		$(".day_information").bind("mouseenter", function() {
			this.position = setInterval(function (){
				if($(".day_information .det").is(":animated")){
                                    $(".blockMsg").css("top", ($(window).height()-$(".blockMsg").height())/2 +"px");
                                }

			},1);
		}).bind("mouseleave", function() {
		});
		$(window).resize(function () {
			if($("#form2").is(":visible"))
				resizeformseminar();
			setPositionPopup();
		});
	});
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(".open open_only").live("click", function(){
            jQuery(this).next(".det").slideToggle("slow");
        });
    });
</script>

<script type="text/javascript" src="/seminar/js/script-form.js"></script>

';
}

/**
 * セミナー用CSSの取得
 * @return string
 */
function get_seminar_css()
{
	return '
<!--[if lte IE 8 ]>
    <link rel="stylesheet" href="/css/style_ie.css" />
<![endif]-->

<link type="text/css" href="https://'.$_SERVER['SERVER_NAME'].'/css/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<link type="text/css" href="/seminar/css/style-p.css" rel="stylesheet" />
<link type="text/css" href="/seminar/css/style-fonts.css" rel="stylesheet" />
<link type="text/css" href="/css/jawhm-form.css" rel="stylesheet" />
';
}

/**
 * セミナー用STYLE属性の取得
 * @return string
 */
function get_seminar_style()
{
	return '
<style>
.selected_day_in_list{
	background-color:#FFFFAA;
}
</style>
';
}
