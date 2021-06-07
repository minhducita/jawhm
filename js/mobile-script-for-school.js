jQuery(document).ready(function ($) {

	/*
	----------------------------------------------------------------------------
	mobile-globalmenu-btn
	----------------------------------------------------------------------------
	*/
	$("#mobile-globalmenu-list").hide();

	$("#mobile-globalmenu-btn").click(function(){
		$("#mobile-globalmenu-list").slideToggle(function(){
                    if($("#mobile-globalmenu-list").css("display") == "none"){
                        //閉じた時-- Google Analytics
                        _gaq.push(['_trackEvent', 'button', 'click', 'menu-closed']);
                    }else{
                        //開いた時-- Google Analytics
                        _gaq.push(['_trackEvent', 'button', 'click', 'menu-opened']);
                    }
                }); 
	});
        /*
	----------------------------------------------------------------------------
	mobile-globalmenu-list
	----------------------------------------------------------------------------
	*/
        $("#mobile-globalmenu-list ul li a").click(function(){
            //メニュー項目のクリック時-- Google Analytics
            var href = $(this).attr('href');
            _gaq.push(['_trackEvent', 'link', 'click', href]);
        });
	/*
	----------------------------------------------------------------------------
	footer-mobile-new-menu
	----------------------------------------------------------------------------
	*/
	$("#footer-mobile-new-menu dd").hide();

	$("#footer-mobile-new-menu dt").click(function(){
		$(this).next().slideToggle();
	});
	/*
	----------------------------------------------------------------------------
	add class
	----------------------------------------------------------------------------
	*/
	$("#maincontent").addClass("mobile-maincontent");

});
