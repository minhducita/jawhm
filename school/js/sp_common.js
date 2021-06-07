
$(function(){
    // Toggle
    $("dl.programList dt").each(function() {
        $(this).next().hide();
    });
    
    $("dl.programList dt").bind("touchend", function() {
        $(this).next().slideToggle();
        $(this).toggleClass("active");
    });

    $("dl.programList.active dt").each(function() {
        $(this).next().slideToggle();
        $(this).toggleClass("active");
    });

    $("div.moreMenu").hide();
    
    $("div.conditions > h3").bind("touchend", function() {
        $("div.moreMenu").slideToggle();
        $(this).toggleClass("close");
    });

    $(".check_clear").bind("touchend", function() {
        $("input:checkbox").each(function() {
            $(this).prop({"checked":false});
        });
    });

    $("#search_submit").bind('touchend',function(){
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

    /** @Minhquyen -- slide voice sponsors ****/
    $("#voice-search-slide").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false
            
    });

    $(".photo-main").each(function(){
        if( typeof $(this).parent().find(".photo-element:first-child").find("img").attr('src') !== typeof undefined ){
            $photoAdd = $(this).parent().find(".photo-element:first-child").find("img").attr('src');
            $(this).html("<img src='"+$photoAdd+"' >");
        }
        
    });

});

function push_to_main( obj ){
    var this_photo = $(obj).find("img").attr('src');
    //console.log(this_photo);
    $(obj).parent().parent().find('.photo-main').html("<img src='"+this_photo+"' >");
}
