
$(document).click(function(event) {
    //if you click on anything except the modal itself or the "open modal" link, close the modal
    if (!$(event.target).closest("#popupBody").length) {
        $('.hover_bkgr_fricc').hide();
    }
});

$('.popupCloseButton').click(function() {
    $('.hover_bkgr_fricc').hide();
});
