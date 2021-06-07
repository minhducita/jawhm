var connectweb = window.location.protocol+"//"+window.location.host;
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
		location.href = connectweb+'/member/logout.php';
	}
}
function resizewin(){
	var resize = jQuery(window).width();
	alert(resize);
	if(resize < 800){
		$('.office-box .flex').addClass('flex_m');
		$('.office-box .flex_m').removeClass('flex');
		
		$('.newmemberseminar').addClass('newmemberseminar_m');
		$('.newmemberseminar_m').removeClass('newmemberseminar');
		
		jQuery('.catology .tabcatology').removeClass('flex');
	}else{
		$('.office-box .flex_m').addClass('flex');
		$('.office-box .flex').removeClass('flex_m');
		
		$('.newmemberseminar_m').addClass('newmemberseminar');
		$('.newmemberseminar').removeClass('newmemberseminar_m');
		
		jQuery('.catology .tabcatology').addClass('flex');
		$('.office-box').find('.flex').css('class','flex');
	}
}
function setMenuFooter(){
	var html = "<dt><span> メンバー専用ページ </span></dt><dd><ul>";
	jQuery('#menu-menu-left li').each(function(){
	
		html+= "<li>"+$(this).html()+"</li>";	
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
	jQuery("#menu-primary-menu-1").append("<li> <img class='btnlogin' src='/images/mobile/mobile-globalmenu-logout.jpg' class='responsive-img' onclick='fnc_logout();'> </li>");
	resizewin();
});