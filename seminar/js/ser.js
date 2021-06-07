function openCollapse() {
    if ($("#typeSeminar").hasClass("show")) {
        $("#typeSeminar").removeClass("show");
        $("#typeSeminar").addClass("hide");
        $("#btnPlusMinus").html('<i id="plus-minus" class="fa fa-plus-circle"></i>');
    } else {
        $("#typeSeminar").removeClass("hide");
        $("#typeSeminar").addClass("show");
        $("#btnPlusMinus").html('<i id="plus-minus" class="fa fa-minus-circle"></i>');
    }
}

$(function() {
    var memberTitle = $(".ui-btn-inner").find(".member-title").parent().parent();
    memberTitle.each(function(index, value){
        value.style.backgroundColor = "#e8afaa";
    });
});

