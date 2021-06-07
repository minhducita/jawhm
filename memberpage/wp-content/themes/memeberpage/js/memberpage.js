var connectweb = window.location.protocol+"//"+window.location.host+"/memberpage";
var urlpath = window.location.protocol+"//"+window.location.host;
var urltheme   = connectweb+"/wp-content/themes/memeberpage/";
function menubar_change() {
	$.ajax({
		type: "GET",
		url: connectweb+"/calendar_module/mod_event_vertical.php",
		data: "menubar_place=" + $("#menubar_place option:selected").val(),
		success: function(msg){
			//jQuery("#vertical_module").parent().html(msg);
			var parent_obj = jQuery("#vertical_module").parent();
			jQuery("#vertical_module").remove();
			parent_obj.append(msg);
		},
		error:function(){
			alert("通信エラーが発生しました。");
		}
	});
}
function fnc_logout(){
	if(confirm("ログアウトしますか？")){
		location.href = urlpath+'/member/logout.php?wtype='+ $wtype;
	}
}
function resizewin(){
	var resize = jQuery(window).width();
	if(resize < 800){
		$('.office-box .flex').addClass('flex_m');
		$('.office-box .flex_m').removeClass('flex');
		
		$('.newmemberseminar').addClass('newmemberseminar_m');
		$('.newmemberseminar_m').removeClass('newmemberseminar');
		
		jQuery('.catology .tabcatology').removeClass('flex');
		// add mobile css
		jQuery('head').append('<link type="text/css" rel="stylesheet" href="'+urltheme+'css/style_mobile.css" >');
	}else{
		$('.office-box .flex_m').addClass('flex');
		$('.office-box .flex').removeClass('flex_m');
		
		$('.newmemberseminar_m').addClass('newmemberseminar');
		$('.newmemberseminar').removeClass('newmemberseminar_m');
		
		jQuery('.catology .tabcatology').addClass('flex');
		$('.office-box').find('.flex').css('class','flex');
		
		jQuery("LINK[href='"+urltheme+"css/style_mobile.css']").remove();
	}
}
function setMenuFooter(){
	var html = "";
	var i = 0;
	jQuery('#menu-menu-left li').each(function(){
		if(i == 0){
			html = '<dt><span style="color:#FFF">'+$(this).text()+'</span></dt><dd><ul>';
			i++;
		}else{
			html+= "<li>"+$(this).html()+"</li>";	
		}
	});
	html += "</ul></dd>";	
	jQuery("#footer-mobile-new #footer-mobile-new-menu").prepend(html);
}

jQuery(window).resize(function(){resizewin();})
jQuery(document).ready(function(){
	jQuery('.btn_menu').click(function(){
		jQuery('#menu-primary-menu-1').slideToggle('normal');
	});
	setMenuFooter();
	$("#footer-mobile-new-menu dt").click(function() {
		$(this).next("dd").slideToggle();
	});
	jQuery("#menu-primary-menu-1").prepend("<li class='login'> <a onclick='fnc_logout();'>  ログアウト  </a></li>");
	resizewin();
	jQuery("#footer-mobile-new-menu dt").eq(0).trigger("click");
	// remove tag a
	jQuery("#menu-menu-left li a").eq(0).removeAttr("href");
});
