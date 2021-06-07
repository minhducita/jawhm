$(function(){

	/*
	********************************************************************************
	accordion
	********************************************************************************
	*/

	$('.area-accordion p.text01').not('.block01').replaceWith(function(){
		$(this).replaceWith($(this).html());
	});

	$('#area-accordion-canada-01, #area-accordion-canada-02').jTruncSubstr({
		length: 95,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});


	$('#area-accordion-canada-03').jTruncSubstr({
		length: 72,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});


	$('#area-accordion-canada-04').jTruncSubstr({
		length: 99,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('#area-accordion-canada-05').jTruncSubstr({
		length: 97,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('#area-accordion-canada-06').jTruncSubstr({
		length: 93,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('#area-accordion-australia-01').jTruncSubstr({
		length: 50,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('#area-accordion-australia-02').jTruncSubstr({
		length: 67,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('#area-accordion-australia-03').jTruncSubstr({
		length: 91,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});

	$('#area-accordion-australia-04').jTruncSubstr({
		length: 78,
		minTrail: 0,
		moreText: "続きを読む ▼",
		lessText: "閉じる",
		ellipsisText: " ...",
		moreAni: "fast",
		lessAni: "fast"
	});


	/*
	********************************************************************************
	オーストラリア：ワーキングホリデーの楽しみ方
	********************************************************************************
	*/

	$('td.nittei_span').append('<span>▼</span>');

	$('td.nittei_span span').css({
	'display':'block',
	'position':'absolute',
	'top':'50%',
	'right':'5px',
	'margin-top':'-10px',
	'width':'21px',
	'height':'0',
	'padding-top':'21px',
	'overflow':'hidden'
	});

	var chBlock = $('table.nittei,table.nittei tbody,table.nittei tr,table.nittei td.nittei_span,table.nittei td.nittei_naiyou');
	$(chBlock).css({
	'display':'block',
	'width':'auto'
	});
	$('table.nittei tr').css({
	'margin-bottom':'15px'
	});
	$('table.nittei td.nittei_span').css({
	'padding':'10px',
	'border-bottom':'none',
	'position':'relative'
	});
	$('table.nittei td.nittei_naiyou').css({
	'border':'1px solid orange',
	'padding-bottom':'15px',
	'display':'none'
	});
	$('div.nittei_setumei').css({
	'margin-bottom':'15px'
	});

	$('table.nittei td.nittei_span').click(function(){
	    $(this).children('span').toggleClass('open');
	    $(this).next('table.nittei td.nittei_naiyou').slideToggle('fast');
	});



	/*
	********************************************************************************
	カナダ：カナダワーキングホリデーの費用
	********************************************************************************
	*/

	$('#area-accordion-canada-06 p.block01').append('<span class="bl-icon">▼</span>');


	$('#area-accordion-canada-06 p.block01').click(function(){
	    $(this).children('span.bl-icon').toggleClass('bl-open');
	    $(this).next('#area-accordion-canada-06 .area-sub-accordion').slideToggle('fast');
	});





});
