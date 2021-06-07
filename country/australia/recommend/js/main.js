
$('document').ready(function(){

	var countMel = $("#count-mel");

	$(".btn-format").click(function(){
		var num = $(this).find("span").text();

		if($(this).find("i").hasClass('color-red'))
		{
			return false;
		}

		num = parseInt(num) + 1;
		var country = $(this).attr("title");
		 $.ajax({
				url : "https://jawhm.or.jp/country/australia/recommend/request.php",
				type : "post",
				dataType:"text",
				data : {
					country:country,
					num:num
				},
				success : function (result){

				}
			});
		$(this).find("i").addClass('color-red');
		$(this).find("span").text( num );
		return false;
	});

});

function getpopup( id )
{
	var url = window.location.hostname;
	if(url.indexOf('www') != -1){
		url = "https://www.jawhm.or.jp/country/australia/recommend/popup.php?id="+id;
	}
	else {
		url = "https://jawhm.or.jp/country/australia/recommend/popup.php?id="+id;
	}
	
	$.get( url , function( data ) {

		$("#pop-bottom").html( data );

	});
}
