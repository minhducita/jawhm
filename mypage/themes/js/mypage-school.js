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

        // header function
        var collapse = $.cookie("bum_school");
        if (collapse == 'undefined') {
            collapse = 1;
        }

        $("#menu-toggler").click(function(){
            ("a#sidebar").toggleClass("display");
        });

        $("#change_password").click(function() {
            submit_action('school/index/changepassword', null, null);
            $("#modal-window").modal();
        });

        if (collapse == 1) {
            $('#sidebar').removeClass('menu-min');
            $('#collapse-menu').removeClass('glyphicon-chevron-right');
            $('#collapse-menu').addClass('glyphicon-chevron-left');
            $('#collapse-icon').removeClass('icon-double-angle-right');
            $('#collapse-icon').addClass('icon-double-angle-left');
        } else {
            $('#sidebar').addClass('menu-min');
            $('.hidding').css('visibility', 'visible');
            $('#collapse-menu').removeClass('glyphicon-chevron-left');
            $('#collapse-menu').addClass('glyphicon-chevron-right');
            $('#collapse-icon').removeClass('icon-double-angle-left');
            $('#collapse-icon').addClass('icon-double-angle-right');

        }

        $('[id^=sidebar-collapse]').click(function() {
            if($('#sidebar').hasClass('menu-min')) {
                $('#sidebar').removeClass('menu-min');
                $('#collapse-menu').removeClass('glyphicon-chevron-right');
                $('#collapse-menu').addClass('glyphicon-chevron-left');
                $('#collapse-icon').removeClass('icon-double-angle-right');
                $('#collapse-icon').addClass('icon-double-angle-left');
                collapse = 1;

            } else {
                $('#sidebar').addClass('menu-min');
                $('.hidding').css('visibility', 'visible');
                $('#collapse-menu').removeClass('glyphicon-chevron-left');
                $('#collapse-menu').addClass('glyphicon-chevron-right');
                $('#collapse-icon').removeClass('icon-double-angle-left');
                $('#collapse-icon').addClass('icon-double-angle-right');
                collapse = 0;
            }
            $.cookie("bum_school", collapse, { expires: 1826, path: "/mypage/school"});

        });

        $('[id^=showdetails]').click(function() {
            var abroad_no = $(this).attr("id").split("_");
            var data = {'abroad': abroad_no[1],
                        'school_no': abroad_no[2]};
            submit_action('school/client/detail', data, 'move');
        });

        $('[id^=showseminar]').click(function() {
            var seminar_id = $(this).attr("id").split("_");
            var data = {'seminar': seminar_id[1]};
            submit_action('school/seminar/detail', data, 'move');
        });

        // index function
        if(typeof bum != 'undefined') {
            var bum_num = 0;
            var bum_cookie = $.cookie('bum_color');
            var bum_arr = ['blue', 'red', 'orange', 'pink', 'purple', 'yell-green', 'yellow'];
            var bum_face = null;
            var bum_color = null;
            var thisColor = bum_arr[bum_num];

            /* decide to today's bum face(based on progress) */
            if (bum_cookie != undefined){
                bum_color = bum_arr[bum_cookie];
            } else {
                bum_color = 'blue';
            }

            var arr_face = new Array();
            var face_max_num = 0;

            // collect target's bum face
            $(bum_data).each(function(index, data){
                if (data['color'] === bum_color) {
                    arr_face.push(data['bum']);
                    face_max_num = face_max_num + 1;
                }
            });

            var rand_num = Math.round( Math.random() * (face_max_num - 1 ));

            bum_face = arr_face[rand_num];
            $('[id^=bum_click]').attr('src', 'themes/images/bumkun/' + bum_color + '/1.png');
            $('#bum_click').attr('src', 'themes/images/' + bum_face);

            $('[class^=button-step]').each(function(i) {
                if ($('[abbr=android'+i+'-divine]').hasClass('success-color')) {
                    $('[abbr=android'+i+'-divine]').next().css('border-left-color', '#5cb85c');
                } else {
                    $('[abbr=android'+i+'-divine]').next().css('border-left-color', '#5bc0de');
                }
            });

            $('[id^=bum_click]').click(function(){
                if (bum_num >= 6) {
                    bum_num = 0;
                } else {
                    bum_num++;
                }

                var newBum = null;
                var targetFace_arr = bum_face.split('/');
                var targetFace = targetFace_arr[2];
                thisColor = bum_arr[bum_num];
                newBum = 'bumkun/' + thisColor + '/' + targetFace;

                $('[id^=bum_click]').attr('src', 'themes/images/bumkun/' + bum_arr[bum_num] + '/1.png');
                if(!document.URL.match(/..application/)) {
                    $('#bum_click').attr('src', 'themes/images/'+newBum);
                }

                $.cookie("bum_color", bum_num, { expires: 1826});
            });
        }

        $("[id^=changecomment]").click(function() {
            if (!$(this).hasClass('create')) {
                var collapse = $(this).parents('a').attr('id').split('_');
                var target_collapse = collapse[1];
                $('#collapse_'+target_collapse).addClass('in');
            }

            var comment_id = $(this).attr("id").split("_");
            var data = {'id': comment_id[1]};
            if (comment_id[1] === 'new') {
                mode = 'new';
            } else {
                mode = 'change';
                var target = $(this).attr('id').split('_');
                var id = target[1];
            }

            submit_action('school/index/changecomment', data, null);
            $("#modal-window").modal();
        });

        $('*[name=comment]').on('keyup', function() {
            var thisValueLength = $(this).val().length;
            var remaining = 300 - thisValueLength;
            $('.count').html(remaining);
        });

        $("[id^=deletecomment]").click(function() {
            var collapse = $(this).parents('a').attr('id').split('_');
            var target_collapse = collapse[1];
            $('#collapse_'+target_collapse).addClass('in');

            var target = $(this).attr('id').split('_');
            var id = target[1];
            $('#collapse_'+id).addClass("in");

            var comment_id = $(this).attr('id').split('_');
            var data = {'id': comment_id[1],
                        'time': comment_id[2]};
            mode = 'delete';

            submit_action('school/index/commentdelconfirm', data, null);
            $("#modal-window").modal();
        });

        $('[id^=inc-contact]').each(function(i) {
            var height = $('[id=comment'+i+']').outerHeight() + 30;
            $(this).css({'padding-top': '20px', 'padding-bottom': height});
            var icon_height = Math.max(0, ($('*[id=height_'+i+']').outerHeight() / 4 ) - $('[id=icon_'+i+']').children('img').height());
            $('*[id=icon_'+i+']').css({'position': 'absolute', 'top': 0, 'left': 0, 'right': 0, 'bottom': 0, 'margin-top': icon_height+'px'});
        });

        $('[id^=inc-course]').each(function(i) {
            var height = $('[id=course_'+i+']').outerHeight() + 30;
            $(this).css({'padding-top': '10px', 'padding-bottom': height});
        });

        $('[id^=inc-list]').each(function(i) {
            var height = $('[id=list_'+i+']').outerHeight() + 30;
            $(this).css({'padding-top': '10px', 'padding-bottom': height});
        });

        var left, id_no;
        $('[id^=client]').each(function(i) {
            var height = $('[id=client_'+i+']').height();
            if(i % 2 == 0) {
                left = height;
                id_no = i;
            } else {
                if (left > height) {
                    $(this).css({'height': left + 1});
                } else if(height > left) {
                    $('#client_'+id_no).css({'height': height + 1});
                }
            }

        });

        $('[id^=inc-contact]').click(function() {
            var i = $(this).attr("id").split("_");
            var no = i[1];

            var data = {'id': 'new',
                        'append': 'contact_comment',
                        'no': no};

            mode = 'new';

            submit_action('school/index/appendcomment', data, 'append');
        });

        if(!document.URL.match(/..login/)) {
            if (smp == 0) {
                myClock.time();
                setInterval("myClock.time()", 1000);
            }

        }

        if(document.URL.match(/..login/)) {
            $('#login').on('change', 'select#language', function() {
                var lang = $("#language option:selected").val();
                var data = {'language': lang};
                submit_action('school/index/login', data, 'refresh');
                return false;
            });

            $('#login').on('click', 'button#login-button', function(){
                if (school_login_check() != true) return false;
                var $form = $('#login_info');
                var data = $form.serializeArray();
                submit_action('school/index/auth', data, 'refresh');
            });

            $('#login').on('keypress', '#login_info', function(e) {
                if (e.which == 13) {
                    if (school_login_check() != true)
                    return false;
                    if (school_login_check() != true)
                    return false;

                    var $form = $('#login_info');
                    var data = $form.serializeArray();
                    submit_action('school/index/auth', data, 'refresh');
                }
            });

            $('#login').on('click', 'button#forget_password', function(){
                submit_action('school/index/forgetpassword', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#login').on('click', 'button#forget_school', function(){
                submit_action('school/index/forgetloginschool', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#login').on('click', 'button#forget_other', function(){
                submit_action('school/index/forgetother', null, null);
                $('#modal-window').modal();
                return false;
            });
        }

        if(document.URL.match(/..client/)) {
            if(document.URL.match(/..index/)) {
                if ($.cookie("client_detail") != null) {
                    $.removeCookie("client_detail");
                    submit_action('school/client/clientsearch', null, 'refresh');
                }

                $('#client_search_reset').click(function() {
                    $('[name=search_school_name]').val(0);
                    $('[name=search_course]').val(0);
                    $('[name=search_name]').val('');
                    $('[name=search_entry_status]').val(0);
                    $('[name=search_entrance_date]').val('');
                    $('[name=search_entrance_timing]').val(0);
                    $('[name=search_week]').val('');
                    submit_action('school/client/reset', null, 'none');
                });
                $('#client_search').click(function() {
                    if ($('[name=search_entrance_date]').val() != '') {
                        if (date_check('search_entrance_date', jsmsg[69]['message']) != true) return false;
                    }
                    if ($('[name=search_week]').val() != '') {
                        if (numeric_check('search_week', jsmsg[70]['message']) != true) return false;
                    }

                    submit_action('school/client/clientsearch', null, 'refresh');
                });
            }

            if(document.URL.match(/..detail/)) {
                $.cookie("client_detail", 1, { expires: 1});

                if (smp == 1) {
                    $('.inc-multi').each(function(i) {
                        var height = 0;
                        $(this).find('.kill-rlpadding').each(function(i) {
                            height = height + $(this).outerHeight() ;
                        });
                        $(this).css({'padding-top': '10px', 'height': height });
                    });
                }

                $('.inc-memo').each(function(i) {
                    var height, title, memo;
                    if (smp == 1) {
                        title = $(this).find('.client-memo-title').outerHeight();
                        memo = $(this).find('.client-memo').outerHeight();
                        height = parseInt(title) + parseInt(memo) + parseInt(30);
                        $(this).css({'padding-top': '5px', 'padding-bottom': height});
                    } else {
                        height = $(this).find('.client-memo').outerHeight() + 10;
                       $(this).find('.client-memo-title').css({'margin-top': '-10px',
                                                            'margin-left': '-15px'});
                       $(this).find('.client-memo-title').css({'padding-top': '10px', 'height': height + 10});
                       $(this).css({'padding-top': '10px', 'height': height + 10});
                    }

                });

                $("[id^=delmemo]").click(function() {
                    var memo_id = $(this).attr("id").split("_");
                    var data = {'id': memo_id[1],
                                'memo': memo_id[2]};
                    submit_action('school/client/memodelconfirm', data, null);
                    $("#modal-window").modal();
                });

                $(function() {
                    if (smp == 0) {
                        var pass_height = $('#face').height();
                        $('.passport').css('height', pass_height);
                    }
                });
            }

            $('[id^=inc-memo]').each(function(i) {
                var height = $('#memo_'+i).outerHeight() + 20;
                $(this).css({'padding-top': '10px', 'padding-bottom': height});
            });

            $('[id^=inc-subject]').each(function(i) {
                var height = $('#school_'+i).outerHeight() + 20;
                $(this).css({'padding-top': '10px', 'padding-bottom': height});
            });

            $("[id^=print_info]").click(function() {
                var client_no = $(this).attr("id").split("_");
                var data = {'client_no': client_no[2],
                            'country': client_no[3]};
                submit_action('school/schedule/selectinsvisa', data, null);
                $('#modal-window').modal();
            });

            $("#file_upload").click(function() {
                submit_action('school/client/fileupload', null, null);
                $('#modal-window').modal();
            });

            $("*[id^=getfile]").click(function() {
                var branch_no = $(this).attr("id").split("_");
                var data = {'branch_no': branch_no[1]};
                if (smp == 1) {
                    alert(jsmsg[73]['message']);
                    return false;
                }

                var childWindow = window.open('about:blank');
                $.ajax({
                  type: 'POST',
                  url: 'school/client/getfile',
                  data: data
                }).done(function(jqXHR) {
                  childWindow.location.href = 'school/client/showfile';
                  childWindow = null;
                }).fail(function(jqXHR) {
                  childWindow.close();
                  childWindow = null;
                });
            });

            $('[id^=edit_client_memo]').click(function() {
                var comment_id = $(this).attr("id").split("_");
                var data = {'id': comment_id[3]};
                submit_action('school/client/changecontact', data, null);
                $("#modal-window").modal();
            });
        }

        if(document.URL.match(/..seminar/)) {
            if(document.URL.match(/..index/)) {
                $(function () {
                    if ($.cookie("seminar_detail") != null) {
                        $.removeCookie("seminar_detail");
                        submit_action('school/seminar/seminarsearch', null, 'refresh');
                    }
                });

                $('#search_start_date').removeClass('input-group', 'date');
                $('#search_end_date').removeClass('input-group', 'date');

                $('#seminar_search_reset').click(function() {
                    $('select').val(0);
                    $('[name=search_school_name]').val(school_name);
                    $('[name=search_place]').val('tokyo');
                    $('[name=search_start_date]').val('');
                    $('[name=search_end_date]').val('');
                    submit_action('school/seminar/reset', null, 'none');
                });
                $('#seminar_search').click(function() {
                    if ($('[name=search_start_date]').val() != '') {
                        if (date_check('search_start_date', jsmsg[71]['message']) != true) return false;
                    }
                    if ($('[name=search_end_date]').val() != '') {
                        if (date_check('search_end_date', jsmsg[72]['message']) != true) return false;
                    }

                    submit_action('school/seminar/seminarsearch', null, 'refresh');
                });
            }

            if(document.URL.match(/..detail/)) {
                $(function () {
                    $.cookie("seminar_detail", 1, { expires: 1});
                });

                $('.inc-memo').each(function(i) {
                    var height = $(this).find('.detail-int').outerHeight() + 10;
                    if (height <= 11) {
                        height = 29;
                    }
                    $(this).css({'padding-top': '10px', 'padding-bottom': height});
                });

                $('.inc-memo3').each(function(i) {
                    var height = $(this).find('.detail-dep').outerHeight() + 20;
                    if (height <= 11) {
                        height = 29;
                    }
                    $(this).css({'padding-top': '10px', 'padding-bottom': height});
                });

                $('.inc-memo4').each(function(i) {
                    var height = $(this).find('.detail-dep').outerHeight() + 10;
                    if (height <= 11) {
                        height = 29;
                    }
                    $(this).css({'padding-top': '10px', 'padding-bottom': height});
                });

            }

            $("[id^=seminar_detail]").click(function() {
                var id = {'seminar': $(this).attr("name")};
                submit_action('seminar/seminardetail', id, null);
                $('#modal-window').modal();
                return false;
            });
        }

        if(document.URL.match(/..talk/)) {
            $("[id^=talk_comment]").click(function() {
                var comment_id = $(this).attr("id").split("_");
                var data = {'id': comment_id[2]};
                mode = 'change';

                submit_action('school/index/changecomment', data, null);
                $("#modal-window").modal();
            });

            $("[id^=talk_delcomment]").click(function() {
                var comment_id = $(this).attr('id').split('_');
                var data = {'id': comment_id[2],
                            'time': comment_id[3]};
                mode = 'delete';

                submit_action('school/index/commentdelconfirm', data, null);
                $("#modal-window").modal();
            });

        }

        if(document.URL.match(/..proposal/)) {
            $('.inc-memo').each(function(i) {
                var height = $('.memo'+i).outerHeight() + 20;
                if (height == 21) {
                    height = 40;
                }
                $(this).css({'padding-top': '10px', 'padding-bottom': height});
            });

            $('[id^=proposal_seminar]').click(function() {
                var ids = $(this).attr('id').split('_');
                var id = {'id': ids[2]};

                submit_action('school/proposal/changeproposal', id, null);
                $("#modal-window").modal();
            });
        }
    });
});

// common

function loadContents(url) {
    $.get(url, { push_state: 'true' }).then(function(content) {
        location.reload();
    });
}

function addCSSRule(selector, css) {
    var sheets = document.styleSheets,
     sheet = sheets[sheets.length - 1];

    if(sheet.insertRule) {
     sheet.insertRule(selector + '{' +  css + '}', sheet.cssRules.length);
    }else if(sheet.addRule) {
     sheet.addRule(selector, css, -1);
    }
}

function search_submit(tpl) {
    var tpls = tpl.split('/');
    var module = tpls[1];
    var $form = $('#'+module+'-search');
    var data = $form.serializeArray();

    submit_action(tpl, data, 'refresh');
}

function toggle_contents(class_value) {
    if($('#'+class_value).attr('class') === 'hidden'){
        $('*[id='+class_value+']').removeClass("hidden").addClass("apper");
    } else {
        $('*[id='+class_value+']').removeClass("apper").addClass("hidden");
    }
}

function school_login_check() {
    if (input_check('school_name', $('[name=school_name]').attr('placeholder')) != true)
        return false;
    if (input_check('password', $('[name=password]').attr('placeholder')) != true)
        return false;
    return true;
}

var myClock = {
        time : function(){
            var dateObj = new Date();
            var y = dateObj.getFullYear();
            var m = dateObj.getMonth() + 1;
            var d = dateObj.getDate();
            var h = dateObj.getHours();
            var min = dateObj.getMinutes();
            var s = dateObj.getSeconds();
            document.getElementById("currentTime").innerHTML = y + year_unit + m + month_unit + d + day_unit + h + hour_unit + min + min_unit + s + sec_unit;
        }
};