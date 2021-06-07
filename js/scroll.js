$(function () {

    $("a[href*='#']").click(function () {
        if (location.pathname.replace(/^\//, '') ==
            this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length && target;
            if (target.length) {
                var sclpos = 30;
                var scldurat = 2000;
                var targetOffset = target.offset().top - sclpos;
                $('html,body').animate({ scrollTop: targetOffset }, { duration: scldurat, easing: "easeOutExpo" });
                return false;
            }
        }
    });

    /* 2607 email regis START */
    $("#email_regis_2607 button").click(function () {
        var mycontext = $("#email_regis_2607 #mycontext").html();
        if (mycontext == 'card2947') {
            var thisform = $(this).parents("form");
            var txt_email = thisform.find("input[name='email']").val();

            if (txt_email == '') {
                alert('メールアドレスを入力してください');
                return;
            }
            if (!validateEmail(txt_email)) {
                alert('正しいメールアドレスを入力してください');
                return;
            }

            // thisform.attr('action', 'https://go.pardot.com/l/401302/2017-12-07/9d718t');
            // thisform.submit();
        }
        else {
            var txt_email = $("#email_regis_2607 input").val();
            if (txt_email == '') {
                alert('メールアドレスを入力してください');
                return;
            }
            if (!validateEmail(txt_email)) {
                alert('正しいメールアドレスを入力してください');
                return;
            }

            // $("#email_regis_2607 form").attr('action', 'https://go.pardot.com/l/401302/2017-12-07/9d718t');
            // $("#email_regis_2607 form").submit();
        }
    });

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
});
