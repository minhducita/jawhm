/*
 * /js/scroll.jsとの競合をさけてスクロールを実装している
 * そのため、hrefには#を含まないIDの指定がなされる必要がある
 * edited by k-kawai@plate
 */
$(function(){

        $('.panel-sub').hide();
	$('a.panel-a').click(function(){

		$('.panel-sub').hide();

		$("#"+$(this).attr('href')).show();
	        
                var i = $(".btn_sample").index(this)
                var p = $("#"+$(this).attr('href')).eq(i).offset().top;
                $('html,body').animate({ scrollTop: p }, 'fast');
                
                return false;

	});
});
