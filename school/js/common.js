$(function(){
	$("#search_submit").live('click touchend',function(){
		var countries = [];
		var courses = [];
		var licences = [];
		var points = [];
		$("input[name='country']:checked").each(function(){
			countries.push($(this).val());
		});
		$("input[name='course']:checked").each(function(){
			courses.push($(this).val());
		});
		$("input[name='licence']:checked").each(function(){
			licences.push($(this).val());
		});
		$("input[name='point']:checked").each(function(){
			points.push($(this).val());
		});
		var str_countries = countries.join();
		var str_courses = courses.join();
		var str_licences = licences.join();
		var str_points = points.join();
		$("input[name='countries']").val(str_countries);
		$("input[name='courses']").val(str_courses);
		$("input[name='licences']").val(str_licences);
		$("input[name='points']").val(str_points);
		console.log(str_countries);
		console.log(str_courses);
		console.log(str_licences);
		console.log(str_points);
		$("#school_search").submit();
	});

       $(".check_clear").live("click", function(){
              $("input:checkbox").each(function(){
                     $(this).prop({"checked":false});
              });
       })
});
