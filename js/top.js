

// ＦａｃｅＢｏｏｋウォール読み込み

$(function(){

	$('#facebookwall').fbWall({ id:'257122891001724',accessToken:'158074594262625|uB3Xinq5YJPu2UurVFfo9dT28vw',showGuestEntries:false});

});

google.load("feeds", "1");


// SCRIPT CHECK STATUS MEM-BANNER TOPpage -- by Minh Quyen - 28/10/2016

  	function hide_banner(){
  		var banner = $("#mem-banner");
  		//alert("nfjgfjg");
    	banner.hide();

    	if (typeof(Storage) !== "undefined")
    	{
    		localStorage.memBanner = "hide";
    		localStorage.memBannerTime = new Date().getTime() / 1000;
		}
		else
			console.log ( '#Browser does not support localStore' );

  	}
	  	

	$("document").ready(function(){

		// check click "CLOSE bUTTON" or not!
		//checkCookieClick();
		var banner = $('.banner-rdirect');

		//localStorage.removeItem("memBanner");

		if (typeof(Storage) !== "undefined") {

			if(!localStorage.memBanner || localStorage.memBanner == "")
			{
				localStorage.memBanner = "begin";
			}
			else if(localStorage.memBanner && localStorage.memBanner == "begin")
			{
				localStorage.memBanner = "clicked";
			}
				
			
			if( (localStorage.memBanner && localStorage.memBanner == "hide") )
			{
				var timeNow = "";
				timeNow = new Date().getTime() / 1000;
				memBannerTime = localStorage.memBannerTime;

				if(timeNow - 24*60*60 < memBannerTime) // set 24h
				//if(timeNow - 30 < memBannerTime) // set 30s to testing
				{
					banner.hide();
				}

			}
			else if( (localStorage.memBanner && localStorage.memBanner == "begin") )
			{
				banner.hide();
			}
			

			//console.log ( localStorage.memBanner );
			//console.log (localStorage.memBannerTime);
			//console.log (new Date().getTime() / 1000);
		}
		else
		{
			console.log ( '#Browser does not support localStore' );
		}

		/*
		$("#email_regis_2607 button").click(function(){
	       // var txt_email = $("#email_regis_2607 input[name='email']").val();
	       var txt_email = $(this).parent().parent().find("input[name='email']").val();
			if(txt_email == '') {
				alert('メールアドレスを入力してください');
				return false;
			}
			if(!validateEmail(txt_email)) {
				alert('正しいメールアドレスを入力してください');
				return false;
			}
			
			
			$(this).parent().parent().attr('action', 'https://go.pardot.com/l/401302/2017-12-07/9d718t');
			$(this).parent().parent().submit();
			
		});
		*/
});
function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}