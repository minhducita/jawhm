$(function(){

	/*
	********************************************************************************
	accordion
	********************************************************************************
	*/

	/*
	$(".accordionlink").click(function() {
		$(".area-accordion").next().each(function() {
			if ($(this).text() != '続きを読む▼') {
				$(this).trigger('click');
			}
		});
		id = $(this).attr('href');
		if ($(id).next().next().text() == '続きを読む▼') {
			$(id).next().next().trigger('click');
		}
	});



	//$('#areaStep1_1').readmore({
	$('.area-accordion').readmore({
		speed:200,
		collapsedHeight: 180,
		moreLink: '<div class="clearboth"><a href="#" class="truncate_more_link" style="display: inline-block;">続きを読む▼</a></div>',
		lessLink: '<div class="clearboth"><a href="#" class="truncate_more_link" style="display: inline-block;">閉じる▲</a></div>'
	});
	*/

	$('.area-accordion p.text01').not('.block01').replaceWith(function(){
		$(this).replaceWith($(this).html()+'<br><br>');
	});

//ここからSTEP 1 -----------------------------------------------------**

	$('div.stepPage.step01 #areaStep1_1').jTruncSubstr({
		length: 276,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});
	
	$('div.stepPage.step01 #areaStep1_2').jTruncSubstr({
		length: 317,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step01 #areaStep1_3').jTruncSubstr({
		length: 305,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step01 #areaStep1_4').jTruncSubstr({
		length: 278,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

//ここからSTEP 2 -----------------------------------------------------**

	$('div.stepPage.step02 #areaStep1_1').jTruncSubstr({
		length: 270,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step02 #areaStep1_2').jTruncSubstr({
		length: 305,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step02 #areaStep1_3').jTruncSubstr({
		length: 312,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step02 #areaStep1_4').jTruncSubstr({
		length: 300,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step02 #areaStep1_5').jTruncSubstr({
		length: 285,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

//ここからSTEP 3 -----------------------------------------------------**

	$('div.stepPage.step03 #areaStep1_1').jTruncSubstr({
		length: 285,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_2').jTruncSubstr({
		length: 310,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_3').jTruncSubstr({
		length: 300,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_4').jTruncSubstr({
		length: 295,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_5').jTruncSubstr({
		length: 310,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});
	
	$('div.stepPage.step03 #areaStep1_6').jTruncSubstr({
		length: 305,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_7').jTruncSubstr({
		length: 310,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_8').jTruncSubstr({
		length: 293,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_9').jTruncSubstr({
		length: 308,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_10').jTruncSubstr({
		length: 308,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_11').jTruncSubstr({
		length: 308,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step03 #areaStep1_12').jTruncSubstr({
		length: 307,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});
	
//ここからSTEP 4 -----------------------------------------------------**

	$('div.stepPage.step04 #areaStep1_1').jTruncSubstr({
		length: 425,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step04 #areaStep1_2').jTruncSubstr({
		length: 293,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step04 #areaStep1_3').jTruncSubstr({
		length: 295,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step04 #areaStep1_4').jTruncSubstr({
		length: 308,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('div.stepPage.step04 #areaStep1_5').jTruncSubstr({
		length: 295,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});
	
	$('div.stepPage.step04 #areaStep1_6').jTruncSubstr({
		length: 270,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});
	
	$('div.stepPage.step04 #areaStep1_7').jTruncSubstr({
		length: 292,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる▲",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

});
