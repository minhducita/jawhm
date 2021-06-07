<?php

/**
 * num指定時のpopup用JS
 * @param $id
 * @return string
 */
function list_get_popup_js($uid)
{
	$str = '
		<script type="text/javascript">
			$(document).ready(function() {
				fnc_yoyaku($("input[uid=' . $uid . ']").get(0));
			});
		</script>
';
	return $str;
}

/**
 * セミナー用JSの取得
 * @return string
 */
function list_get_seminar_js()
{
	$checklogin  = !empty($_SESSION['mem_id'])?1:0;
	return '<script type="text/javascript" src="https://'.$_SERVER['SERVER_NAME'].'/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="https://'.$_SERVER['SERVER_NAME'].'/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript">
var checklogin = '.$checklogin.';
function fnc_next()	{
	$.ajax({
		type: "GET",
		url: "https://'.$_SERVER['SERVER_NAME'].'/seminar_module/seminar_yoyaku_input.php?acao='.$_GET['acao'].'",
		data: "",
		success: function(msg){
			first = true;
			$("#form_yoyaku table tr").each(function() {
				if (first == false) {
					$(this).remove();
				}
				first = false;
			});
			$("#form_yoyaku table tbody div").remove();
			$("#form_yoyaku table tr:last").after(msg);
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
	
	$id = $("input#txt_id").val();
	$.ajax({
		type: "POST",
		url: "https://'.$_SERVER["SERVER_NAME"].'/seminar_module/check_4beginer.php",
		data: {id:$id},
		success: function(is4beginer){
			if(is4beginer != 0){
				$("#msg_hajimete").css("display", "none");
			}
			else{
				$("#msg_hajimete").css("display", "flex");
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
	document.getElementById("form_title").innerHTML = obj.getAttribute("title");
	document.getElementById("txt_title").value = obj.getAttribute("title");
	document.getElementById("txt_id").value = obj.getAttribute("uid");
	$.blockUI({ message: $("#yoyakuform"),
	css: {
		top:  ($(window).height() - 500) /2 + "px",
		left: ($(window).width() - 600) /2 + "px",
		width: "600px"
	}
 });
}
function btn_cancel()	{
	$.unblockUI();
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

	document.getElementById("btn_soushin").value = "処理中...";
	document.getElementById("btn_soushin").disabled = true;

	$.ajax({
		type: "POST",
		url: "https://'.$_SERVER['SERVER_NAME'].'/yoyaku/yoyaku.php",
		data: $senddata,
		success: function(msg){
			document.getElementById("div_wait").style.display = "none";
			alert(msg);
			$.unblockUI();
		},
		error:function(){
			alert("通信エラーが発生しました。");
			$.unblockUI();
		}
	});
}
</script>
<script type="text/javascript">
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
jQuery(function($) {
	jQuery(".open").click(function(){
		jQuery(this).parent().children(".det").slideToggle("slow");
	});
});
$(window).resize(function () {
			if($("#form2").is(":visible"))
				resizeformseminar();
			setPositionPopup();
		});
/*
jQuery(document).ready(function() {
    jQuery(".open").live("click", function(){
        jQuery(this).next(".det").slideToggle("slow");
    });
	
});
*/
</script>
';
}

/**
 * セミナー用CSSの取得
 * @return string
 */
function list_get_seminar_css()
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
function list_get_seminar_style()
{
	return '
<style>
.open {
	font-size:9pt;
	font-weight:bold;
	color : orange;
	cursor:pointer;
	margin: 0 0 10px 0;
}
</style>
';
}
