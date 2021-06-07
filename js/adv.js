
var rules = {
    company_name: {
        required: true
    },
    type_company: {
        required: true
    },
    surname: {
        required: true
    },
    firstname: {
        required: true
    },
    first_number_phone: {
        required: true
    },
    midle_number_phone: {
        required: true
    },
    last_number_phone: {
        required: true
    },
    mail: {
        required: true
    },
    type_contact: {
        required: true
    },
    txt_inquiry: {
        required: true
    },
};

$("#inquiry .bn-submit").on("click", function (){
    $("#inquiry").validate({
        rules: rules,
        showErrors: function() {
            hasErrors();
        },
        submitHandler: function(form) {
            clearErrors();
            $.ajax({
                type: "POST",
                url: "../mail/adv.php",
                data: $('#inquiry').serialize(),
                success: function(msg){
                    window.location.href = "https://www.jawhm.or.jp/complet.html";
                },
                error:function(){
                    alert('通信エラーが発生しました。');
                }
            });
        }
    });
});

function hasErrors() {
    $(".has-errors").css("display", "block");
}

function clearErrors() {
    $(".has-errors").css("display", "none");
}
