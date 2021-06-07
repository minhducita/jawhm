jQuery(document).ready(function ($) {
	/*
	----------------------------------------------------------------------------
	mobile-step-btn
	----------------------------------------------------------------------------
	*/
	$(".step00lists").hide();
	$(".steps1").click(function(){
		
		var parent = $(this).parent().parent().find(".step00lists"); 
		var polygon = $(this).parent().parent().find(".polygon");
		parent.slideToggle(function(){
			if(parent.is(":visible")){
				polygon.show();
			}
			else{
				polygon.hide();
			}
        }); 

	});



	/*
	----------------------------------------------------------------------------
	mobile-step-btn
	----------------------------------------------------------------------------
	*/
	$("#hide-step").hide();
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
		var html = $(this).find("span").html();
		if(html.indexOf("href") == -1){
			$(this).next().slideToggle();
		}
		else 
		{
			var link = $(this).find("a").attr("href");
			//alert(link);
			window.location.href = link;
		}
	});


	/*
	----------------------------------------------------------------------------
	add class
	----------------------------------------------------------------------------
	*/

	$("#maincontent").addClass("mobile-maincontent");


	/*
	----------------------------------------------------------------------------
	scroll to target
	----------------------------------------------------------------------------
	*/

	$('a[href^=#]').click(function() {
		var speed = 400;

		var href= $(this).attr("href");
		
		if (href.indexOf("#ans") >= 0 || href.indexOf("#semians") >= 0) return;
		
		var target = $(href == "#" || href == "" ? 'html' : href);

		var position = target.offset().top;

		$('body,html').animate({scrollTop:position}, speed, 'swing');

		return false;
	});

	$("#step00box .item-box .step00box02 a").click(function(event){

			event.stopPropagation();
			
	});

	$("#step00box .item-box .step00box02 img").click(function(event){
			event.preventDefault();
	});
});
