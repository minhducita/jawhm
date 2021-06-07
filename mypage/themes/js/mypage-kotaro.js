$(document).ready(function(){
    document.body.scrollTop  =  document.documentElement.scrollTop  = 0;

    read = false;
    previous_location = location.href;
    // handlling popState event
    $(window).on('popstate', function(e){
        loadingView(false);
        if (read == false && previous_location != location.href) {
            if (location.href != location.pathname) {
                loadingView(true);
                loadContents(location.pathname);
            }
            read = true;
            if(document.URL.match(/..detail/)) {
                $.cookie("is_detail", 1);
            }
        }

    });

    $(window).bind("load", function(){
        $(".autolink").each(function(){
            $(this).html( $(this).html().replace(/((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g, '<a href="$1">$1</a> ') );
        });

        if(document.URL.match(/..login/)) {
            $('#login').on('click', 'button#login-button', function(){
                if (kotaro_login_check() != true) return false;
                var $form = $('#login_info');
                var data = $form.serializeArray();
                submit_action('kotaro/index/auth', data, 'refresh');
            });

            $('#login').on('keypress', '#login_info', function(e) {
                if (e.which == 13) {
                    if (kotaro_login_check() != true)
                    return false;
                    if (kotaro_login_check() != true)
                    return false;

                    var $form = $('#login_info');
                    var data = $form.serializeArray();
                    submit_action('kotaro/index/auth', data, 'refresh');
                }
            });
        }
    });

    function kotaro_login_check() {
        if (input_check('school_name', $('[name=school_name]').attr('placeholder')) != true)
            return false;
        if (input_check('password', $('[name=password]').attr('placeholder')) != true)
            return false;
        return true;
    }
});