$(document).ready(function(){
    read = false;
    previous_location = location.href;
    // handlling popState event
    $(window).on('popstate', function(e){
        if (read == false && previous_location != location.href) {
            if(location.href != location.pathname && !document.URL.match(/..talk/)) {
                loadContents(location.pathname);
            }
            read = true;
        }

    });

    $(window).bind("load", function(){
        $(".autolink").each(function(){
            $(this).html( $(this).html().replace(/((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g, '<a href="$1">$1</a> ') );
        });

        $('a[id^=accordion]').click(function(){
            var acc_no = $(this).attr('id').split('_')[1];
            if($('#collapse_'+acc_no).hasClass('in')) {
                $(this).find('i').eq(0).attr('class', 'pull-right glyphicon glyphicon-chevron-down');
            } else {
                $(this).find('i').eq(0).attr('class', 'pull-right glyphicon glyphicon-chevron-up');
            };
        });

        $('[class^=button-step]').each(function(i) {
            if ($('[abbr=android'+i+'-divine]').hasClass('success-color')) {
                $('[abbr=android'+i+'-divine]').next().css('border-left-color', '#5cb85c');
            } else {
                $('[abbr=android'+i+'-divine]').next().css('border-left-color', '#d9534f');
            }
        });

        // index function
        if(typeof bum != 'undefined') {
            var bum_num = 0;
            var bum_cookie = $.cookie('bum_color');
            var bum_arr = ['blue', 'red', 'orange', 'pink', 'purple', 'yell-green', 'yellow'];
            var bum_face = null;
            var bum_color = null;
            var thisColor = bum_arr[bum_num];
            var thisColorCode = null;

            /* decide to today's bum face(based on progress) */
            if (bum_cookie != undefined){
                bum_color = bum_arr[bum_cookie];
            } else {
                bum_color = 'blue';
            }

            // get progress for select bum_data
            if(!document.URL.match(/..application/) && !document.URL.match(/..preparation/)) {
                var tmp_progress;
                if(progress >= 80) {
                    tmp_progress = 80;
                } else if (progress >= 70) {
                    tmp_progress = 70;
                } else {
                    tmp_progress = 50;
                }

                var arr_face = new Array();
                var face_max_num = 0;
                var msg_color = null;

                // collect target's bum face
                $(bum_data).each(function(index, data){
                    if (data['color'] === bum_color) {
                        if (data['progress'] == tmp_progress) {
                            msg_color = data['msgcolor'];
                            arr_face.push(data['bum']);
                            face_max_num = face_max_num + 1;
                        }
                    }
                });

                var rand_num = Math.round( Math.random() * (face_max_num - 1 ));

                bum_face = arr_face[rand_num];
                $('[id^=bum_click]').attr('src', 'themes/images/bumkun/' + bum_color + '/1.png');
                $('#bum_click').attr('src', 'themes/images/' + bum_face);
                $('#bum_message').css('background-color', msg_color);
                addCSSRule('#bum_message:before', 'background-color:' + msg_color);
            } else {
                $(bum_data).each(function(index, data){
                    if (data['color'] === bum_color) {
                        thisColorCode = data['msgcolor'];
                        return false;
                    }
                });
                $('[id^=bum_click]').attr('src', 'themes/images/bumkun/' + bum_color + '/1.png');
                $('#bum_message').css('background-color', thisColorCode);
                addCSSRule('#bum_message:before', 'background-color:' + thisColorCode);
            }

            $('[id^=bum_click]').click(function(){
                if (bum_num >= 6) {
                    bum_num = 0;
                } else {
                    bum_num++;
                }

                var newBum = null;
                if(!document.URL.match(/..application/) && !document.URL.match(/..preparation/)) {
                    var targetFace_arr = bum_face.split('/');
                    var targetFace = targetFace_arr[2];
                    thisColor = bum_arr[bum_num];
                    newBum = 'bumkun/' + thisColor + '/' + targetFace;
                } else {
                    thisColor = bum_arr[bum_num];
                }

                // get message color code
                $(bum_data).each(function(index, data){
                    if (data['color'] === thisColor) {
                        thisColorCode = data['msgcolor'];
                        return false;
                    }
                });

                $('[id^=bum_click]').attr('src', 'themes/images/bumkun/' + bum_arr[bum_num] + '/1.png');
                if(!document.URL.match(/..application/)) {
                    $('#bum_click').attr('src', 'themes/images/'+newBum);
                }

                $('#bum_message').css('background-color', thisColorCode);
                addCSSRule('#bum_message:before', 'background-color: ' + thisColorCode);
                $.cookie("bum_color", bum_num, { expires: 1826});
            });

            if(!document.URL.match(/..application/) && !document.URL.match(/..preparation/)) {
                 $(function(){
                     $('*[class=menu-bum]').yurayura( {
                            'move' : 5,
                            'delay' : 100,
                            'duration' : 1000
                     } );
                 });

                 $(function(){
                     $('*[class=imakoko]').yurayura( {
                            'move' : 5,
                            'delay' : 100,
                            'duration' : 1000
                     } );
                 });

                $(function(){
                    if (first_time != 1) {
                        var mes_len = Object.keys(bum_message).length - 1;
                        var mes_num = Math.round( Math.random() * mes_len );
                        $("#bum-message").text(bum_message[mes_num].mes);
                    } else {
                        $("#bum_message").css({'padding': '13px', 'padding-left': '32px'});
                        $("#bum-message").text('はじめまして！　　これからよろしくね');
                    }
                });
            }

            $('*[id=application]').click(function(){
                submit_action('index/selectabroad', null, null);
                $("#modal-window").modal();
            });

            $('*[id=preparation]').click(function(){
                submit_action('index/selectabroadpreparation', null, null);
                $("#modal-window").modal();
            });

            $('*[id=achievement]').click(function(){
                submit_action('index/selectachievement', null, null);
                $("#modal-window").modal();
            });

            $('*[id=survey]').click(function(){
                submit_action('index/selectsurvey', null, null);
                $("#modal-window").modal();
            });

            $('.button-step').mouseover(function(){
                $(this).css('background-color', '#dedddf');
                $(this).next().css('border-left-color', '#dedddf');
            });

            $('.button-step').mouseout(function(){
                if($(this).hasClass('success-color')) {
                    $(this).css('background-color', '#5cb85c');
                    $(this).next().css('border-left-color', '#5cb85c');
                } else {
                    $(this).css('background-color', '#d9534f');
                    $(this).next().css('border-left-color', '#d9534f');
                }
            });

            $('.button-triangle').mouseover(function(){
                $(this).css('border-left-color', '#dedddf');
                $(this).prev().css('background-color', '#dedddf');
            });

            $('.button-triangle').mouseout(function(){
                if($(this).prev().hasClass('success-color')) {
                    $(this).css('border-left-color', '#5cb85c');
                    $(this).prev().css('background-color', '#5cb85c');
                } else {
                    $(this).css('border-left-color', '#d9534f');
                    $(this).prev().css('background-color', '#d9534f');
                }
            });

            $('#set-appointment').click(function() {
                submit_action('index/setappointment', null, null);
                $("#modal-window").modal();
            });
                                                                                             
            $("#help-index").click(function() {
                submit_action('manual/topindex', null, null);
                $("#modal-window").modal();
            });

        }

        if(document.URL.match(/..jawhmlogin/)) {
            $('#jawhm_login').click(function(){
                if (jawhm_login_check() != true) return false;

                var $form = $('#login-jawhm');
                var data = $form.serializeArray();
                submit_action('index/jawhmauth', data, 'refresh');
            });

            $('#login-jawhm').keypress(function(e) {
                if (e.which == 13) {
                    if (jawhm_login_check() != true)
                    return false;

                    var $form = $('#login-jawhm');
                    var data = $form.serializeArray();
                    submit_action('index/jawhmauth', data, 'refresh');
                }
            });

            $('#forget_password').click(function(){
                submit_action('index/forgetpassword', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#forget_email').click(function(){
                submit_action('index/forgetloginemail', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#forget_payment').click(function(){
                submit_action('index/forgetpayment', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#forget_other').click(function(){
                submit_action('index/forgetother', null, null);
                $('#modal-window').modal();
                return false;
            });
        }

        if(document.URL.match(/..firstonly/)) {
            $('#client_insert').click(function(){
                if (client_check() != true) return false;

                var $form = $('#insert_client');
                var data = $form.serializeArray();
                submit_action('index/emailcheck', data, 'rewrite');
            });

        }

        if(document.URL.match(/..plan/)) {
            $("#stepchart").click(function() {
                submit_action('plan/stepchart', null, 'getdata');
                return false;
            });

            $("#history").click(function() {
                submit_action('plan/history', null, 'getdata');
                return false;
            });

            $("#next_step").click(function() {
                submit_action('plan/nextstep', null, 'getdata');
                return false;
            });

            $("#data-container").on('click', 'button[id^=separate_]', function() {
                var id = $(this).attr("id").split("_");
                var data = {'id': id[1]};
                submit_action('plan/separate', data, 'getdata');
                return false;
            });

            $("#data-container").on('click', 'button#stepchart', function() {
                submit_action('plan/stepchart', null, 'getdata');
                return false;
            });

            $("#data-container").on('click', 'button#flight_inquiry', function() {
                submit_action('plan/selectabroad', null, null);
                $("#modal-window").modal();
                return false;
            });

            $("#data-container").on('click', 'button#inquiry_list', function() {
                submit_action('plan/inquirylist', null, 'getdata');
                return false;
            });

            $("#data-container").on('click', 'a[id^=edit_inquiry]', function() {
                var inquiry_id = $(this).attr("id").split("_");
                var data = {'id': inquiry_id[2]};

                submit_action('plan/flightinquiry', data, null);
                $('#modal-window').modal();
                return false;
            });
                                                                                             
            $("#help-plan").click(function() {
                submit_action('manual/plan', null, null);
                $("#modal-window").modal();
            });
       }

        if(document.URL.match(/..seminar/)) {
            var odd_height;
            var even_height;
            $('*[id^=seminar-size_]').each(function(i){
                var height = $(this).outerHeight();
                if (i % 2 == 0){
                    even_height = height;
                } else {
                    odd_height = height;
                    var row;
                    if (even_height > odd_height) {
                        row = i;
                        $('div[id=seminar-size_'+i+']').css('height', even_height);
                    } else {
                        row = i - 1;
                        $('div[id=seminar-size_'+row+']').css('height', odd_height);
                    }
                }

            });

            $('*[id^=seminar-size2_]').each(function(i){
                var height = $(this).outerHeight();
                if (i % 2 == 0){
                    even_height = height;
                } else {
                    odd_height = height;
                    var row;
                    if (even_height > odd_height) {
                        row = i;
                        $('div[id=seminar-size2_'+i+']').css('height', even_height - 1);
                    } else {
                        row = i - 1;
                        $('div[id=seminar-size2_'+row+']').css('height', odd_height - 1);
                    }
                }
            });
                                                                                             
            $("#help-seminartop").click(function() {
                submit_action('manual/seminartopmodal', null, null);
                $("#modal-window").modal();
            });
                                                                                             
            $("#help-bookconfirm").click(function() {
                submit_action('manual/bookconfirmmodal', null, null);
                $("#modal-window").modal();
            });
                                                                                             
            $("#help-seminarhistory").click(function() {
                submit_action('manual/seminarhistorymodal', null, null);
                $("#modal-window").modal();
            });
                                                                                             
            $("#help-online").click(function() {
                submit_action('manual/onlinemodal', null, null);
                $("#modal-window").modal();
            });

             $("[id^=seminar_detail]").click(function() {
                 var id = {'id': $(this).attr("name")};
                 submit_action('seminar/seminardetail', id, null);
                 $('#modal-window').modal();
                 return false;
             });

             if(document.URL.match(/..online/)) {
                 var alerted, musiced;
                 var control = $.cookie("status");
                 if (typeof control != 'undefined') {
                     var array = control.split(',');
                     alerted = array[0];
                     musiced = array[1];
                 }

                 if (typeof alerted == 'undefined') {
                     alerted = 0;
                 }

                 if (typeof musiced == 'undefined') {
                     musiced = 0;
                 }

                 var date = new Date();
                 date.setTime(date.getTime() + (60*60*1000));

                 if (status == 'live' && alerted == 0) {
                     document.getElementById("time").play();
                     alerted = 1;
                 };

                 var length = seminar.length;
                 var now = new Date();
                 var end = new Date();

                 for(var i=0; i<length; i++) {
                     start = new Date(seminar[i].replace(/-/g,'/'));
                     end.setHours(start.getHours()+1);
                     if (Date.parse(now) >= Date.parse(start) && end >= Date.parse(now) && musiced == 0){
                         document.getElementById("live").play();
                         musiced = 1;
                         break;
                     };
                 };

                 control = alerted + ',' + musiced;
                 $.cookie("status", control, {expires: date});

                 $('#stopAlert').click(function(){
                     document.getElementById("time").pause();
                     alerted = 1;
                     control = alerted + ',' + musiced;
                     $.cookie("status", control, {expires: date});
                 });

                 $('#stopMusic').click(function(){
                     document.getElementById("live").pause();
                     musiced = 1;
                     control = alerted + ',' + musiced;
                     $.cookie("status", control, {expires: date});
                 });
             }

             $('[id^=inc-list]').each(function(i) {
                 var height = $('[id=list_'+i+']').outerHeight() + 20;
                 $(this).css({'padding-top': '10px', 'padding-bottom': height});
             });

             $('[id^=addCalendar]').click(function() {
                 var seminar_id = $(this).attr('id').split('_');
                 var data = {'id': seminar_id[1]};

                 submit_action('seminar/addcalendar', data, null);
                 $('#modal-window').modal();
             });

        }

        if(document.URL.match(/..member/)) {
            if(document.URL.match(/..index/)) {
                $("#password_edit").click(function() {
                     submit_action('member/changepassword', null, null);
                     $('#modal-window').modal();
                     return false;
                 });
                                                                                             
                $("#help-member").click(function() {
                    submit_action('manual/member', null, null);
                    $("#modal-window").modal();
                });
                
            }
                                                                                             
            if(document.URL.match(/..email/)) {
                $("[id^=change_email]").click(function() {
                     submit_action('member/changeemail', null, null);
                     $('#modal-window').modal();
                     return false;
                 });

                $("[id^=delemail]").click(function() {
                     var mail_id = $(this).attr("id").split("_");
                     data = {'email_id': mail_id[1]};
                     submit_action('member/delemail', data, null);
                     $('#modal-window').modal();
                     return false;
                 });

                $("[id^=change_key]").click(function() {
                     var mail_id = $(this).attr("id").split("_");
                     data = {'email_id': mail_id[2]};
                     submit_action('member/changekey', data, null);
                     $('#modal-window').modal();
                     return false;
                 });

                $("[id^=sendemail]").click(function() {
                    var mail_id = $(this).attr("id").split("_");
                    data = {'id': mail_id[1]};
                    submit_action('member/emailresend', data, null);
                    $('#modal-window').modal();
                    return false;
                });

                $("[id^=email_edit]").click(function() {
                    var mail_id = $(this).attr("id").split("_");
                    data = {'email_id': mail_id[2],
                            'id': mail_id[3]};
                    submit_action('member/changeemailstatus', data, null);
                    $('#modal-window').modal();
                    return false;
                });
                                                                                             
                $("#help-email").click(function() {
                    submit_action('manual/emailmodal', null, null);
                    $("#modal-window").modal();
                });

            }

            if(document.URL.match(/..addresslist/)) {
                $("[id^=change_address]").click(function() {
                     var address_id = $(this).attr("id").split("_");
                     data = {'id': address_id[2]};
                     submit_action('member/changeaddress', data, null);
                     $('#modal-window').modal();
                     return false;
                 });
                                                                                             
                $("#help-address").click(function() {
                    submit_action('manual/addressmodal', null, null);
                    $("#modal-window").modal();
                });

            }
        }

        if(document.URL.match(/..application/)) {
            $('#deposit').click(function() {
                submit_action('application/depositlist', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#estimate').click(function() {
                submit_action('application/estimatelist', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#bill').click(function() {
                submit_action('application/billlist', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#receipt').click(function() {
                submit_action('application/receiptlist', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#passport').click(function() {
                submit_action('application/passport', null, null);
                $('#modal-window').modal();
                return false;
            });

            $('#application_form').click(function() {
                 submit_action('application/applicationlist', null, null);
                 $('#modal-window').modal();
                 return false;
            });
                                                                                             
            $('#help-application').click(function() {
                submit_action('manual/application', null, null);
                $('#modal-window').modal();
                return false;
            });
        }

        if(document.URL.match(/..agreement/)) {
            $("#agree-submit").click(function() {
                if(agree_check() != true) return false;
                if(sign_check() != true) return false;
                var $form = $('#agree');
                var data = $form.serializeArray();
                submit_action('application/savesignature', data, null);
            });
        }

        if(document.URL.match(/..preparation/)) {
            $('#homestay_form').click(function() {
                submit_action('application/homestaylist', null, null);
                $('#modal-window').modal();
                return false;
           });
                                                                                             
            $('#help-preparation').click(function() {
                submit_action('manual/preparationtopmodal', null, null);
                $('#modal-window').modal();
                return false;
            });
        }

        if(document.URL.match(/..flightlist/)) {
            $("[id^=changeflight]").click(function() {
               var flight_id = $(this).attr("id").split("_");
               var data = {'id': flight_id[1]};
                submit_action('preparation/changeflight', data, 'transition');
            });

            $("[id^=deleteflight]").click(function() {
                var flight_id = $(this).attr("id").split("_");
                var data = {'id': flight_id[1],
                            'flight_number': flight_id[2]};
                    submit_action('preparation/flightdelconfirm', data, null);
                    $('#modal-window').modal();
            });
                                                                                             
            $('#help-flight').click(function() {
                submit_action('manual/flightmodal', null, null);
                $('#modal-window').modal();
                return false;
            });
        }

        if(document.URL.match(/..insurancelist/)) {
            $("[id^=changeinsurance]").click(function() {
                var insurance_id = $(this).attr("id").split("_");
                var data = {'branch_no': insurance_id[1]};
                submit_action('preparation/changeinsurance', data, null);
                $('#modal-window').modal();
            });

            $("[id^=deleteinsurance]").click(function() {
                var insurance_id = $(this).attr("id").split("_");
                var data = {'branch_no': insurance_id[1],
                            'policy_number': insurance_id[2],
                            'insured_date_st': insurance_id[3],
                            'insured_date_ed': insurance_id[4]};
                submit_action('preparation/insurancedelconfirm', data, null);
                $('#modal-window').modal();
            });
                                                                                             
            $('#help-insurance').click(function() {
                submit_action('manual/insurancemodal', null, null);
                $('#modal-window').modal();
                return false;
            });

        }

        if(document.URL.match(/..insenglist/)) {
            $("[id^=showinsurance]").click(function() {
                var insurance_id = $(this).attr("id").split("_");
                var data = {'branch_no': insurance_id[1]};
                submit_action('preparation/makepolicy', data, null);
            });
        }


        if(document.URL.match(/..visalist/)) {
            $("[id^=changevisa]").click(function() {
                var abroad = $(this).attr("id").split("_");
                var data = {'branch_no': abroad[1]};
                submit_action('preparation/changevisa', data, null);
                $('#modal-window').modal();
            });

            $("[id^=deletevisa]").click(function() {
                var visa_id = $(this).attr("id").split("_");
                var data = {'branch_no': visa_id[1],
                            'visa_number': visa_id[2]};
                submit_action('preparation/visadelconfirm', data, null);
                $('#modal-window').modal();
            });

            $("[id^=selins]").click(function() {
                var visa_id = $(this).attr("id").split("_");
                var data = {'branch_no': visa_id[1]};
                submit_action('preparation/selectinsurance', data, null);
                $('#modal-window').modal();
            });
                                                                                             
            $('#help-visa').click(function() {
                submit_action('manual/visamodal', null, null);
                $('#modal-window').modal();
                return false;
            });
        }
                                                                                             
        $('#help-schedule').click(function() {
            submit_action('manual/schedulemodal', null, null);
            $('#modal-window').modal();
            return false;
        });

        if(document.URL.match(/..selectschool/)) {
            $("[id^=selins]").click(function() {
                var country = $(this).attr("id").split("_");
                var data = {'country': country[1]};
                submit_action('schedule/selectinsvisa', data, null);
                $('#modal-window').modal();
            });

            $("[id^=forparents]").click(function() {
                var country = $(this).attr("id").split("_");
                var data = {'country': country[1]};
                submit_action('schedule/forparents', data, null);
                $('#modal-window').modal();
            });
                                                                                             
            $('#help-schoolcontact').click(function() {
                submit_action('manual/schoolcontactmodal', null, null);
                $('#modal-window').modal();
                return false;
            });
        }


        if(document.URL.match(/..achievement/)) {
            $('[id$=filter]').click(function() {
                $('[id^=panel]').removeClass('collapse');
            });

            $('#info-filter').click(function() {
                $('[id^=panel]').each(function(i) {
                    if(!$('#panel_'+i).hasClass('panel-info')) {
                        $('#panel_'+i).addClass('collapse');
                    }
                });
            });

            $('#warning-filter').click(function() {
                $('[id^=panel]').each(function(i) {
                    if(!$('#panel_'+i).hasClass('panel-warning')) {
                        $('#panel_'+i).addClass('collapse');
                    }
                });
            });

            $('#danger-filter').click(function() {
                $('[id^=panel]').each(function(i) {
                    if(!$('#panel_'+i).hasClass('panel-danger')) {
                        $('#panel_'+i).addClass('collapse');
                    }
                });
            });

            $('#success-filter').click(function() {
                $('[id^=panel]').each(function(i) {
                    if(!$('#panel_'+i).hasClass('panel-success')) {
                        $('#panel_'+i).addClass('collapse');
                    }
                });
            });

            $('#reset-filter').click(function() {
                $('[id^=panel]').each(function(i) {
                    $('#panel_'+i).removeClass('collapse');
                });
            });

            $('#reload-filter').click(function() {
                location.reload();
            });
                                                                                             
            $('#help-achievement').click(function() {
                submit_action('manual/achievementmodal', null, null);
                $('#modal-window').modal();
                return false;
            });
                                                                                             
            $('#help-counseling').click(function() {
                submit_action('manual/counselingmodal', null, null);
                $('#modal-window').modal();
                return false;
            });
        }

        if(document.URL.match(/..talk/)) {
            if(document.URL.match(/..index/)) {
                $("[id^=changetalk]").click(function() {
                    var talk_id = $(this).attr("id").split("_");
                    var data = {'id': talk_id[1]};
                    if (talk_id[1] === 'new') {
                        mode = 'new';
                    } else {
                        mode = 'change';
                    }

                    submit_action('talk/changetalk', data, null);
                    $("#modal-window").modal();
                });

                $("[id^=deltalk]").click(function() {
                    var talk_id = $(this).attr("id").split("_");
                    var data = {'id': talk_id[1],
                                'time': talk_id[2]};
                    mode = 'delete';
                    submit_action('talk/talkdelconfirm', data, null);
                    $("#modal-window").modal();
                });

            }
        }

        if(document.URL.match(/..surveyentry/)) {
            $('#InputFile').click(function() {
                submit_action('index/imageupload', null, null);
                $('#modal-window').modal();
                return false;
            });

            $("[id^=delete]").click(function() {
                var image_id = $(this).attr("id").split("_");
                var data = {'id': image_id[1]};
                submit_action('index/imgdelconfirm', data, null);
                $("#modal-window").modal();
            });

            $('#save_survey').click(function() {
                var $form = $('#input-survey');
                var data = $form.serializeArray();
                submit_action('index/tempsavesurvey', data, 'save');
            });

            $('#submit_survey').click(function() {
                var opp = $('*[name=oppotunity]').val().length;
                var life = $('*[name=life]').val().length;
                var neg = $('*[name=negative]').val().length;
                var only = $('*[name=only]').val().length;
                var eff = $('*[name=effect]').val().length;
                var chall = $('*[name=challenge]').val().length;
                var adv = $('*[name=advice]').val().length;

                if(opp == 0 && life == 0 && neg == 0
                    && only == 0 && eff == 0 && chall == 0
                    && adv == 0) {
                    alert('アンケート本文は最低1つご入力ください');
                    return false;
                }

                if (!$('*[name=agreement]:checked').val() == 1) {
                    alert('ブログやFacebook紹介の可否を選択してください。');
                    return false;
                }
                auto_save = false;

                var $form = $('#input-survey');
                var data = $form.serializeArray();
                submit_action('index/surveyconfirm', data, 'refresh');
            });

            $('#surveyconfirm').on('click', 'button#back_entry', function() {
                location.reload();
            });

            $('#surveyconfirm').on('click', 'button#submit_complete', function() {
                var $form = $('#input-survey');
                var data = $form.serializeArray();
                submit_action('index/sendsurvey', data, 'refresh');
            });
        }

        if(document.URL.match(/..manual/)) {
            $('a[id^=manual_]').click(function(){
                var acc_no = $(this).attr('id').split('_')[1];
                if($('#manual-'+acc_no).hasClass('in')) {
                    $(this).find('i').eq(0).attr('class', 'pull-right glyphicon glyphicon-chevron-down');
                } else {
                    $(this).find('i').eq(0).attr('class', 'pull-right glyphicon glyphicon-chevron-up');
                }
            });
                                                                                             
            $("#get-top").click(function() {
                submit_action('manual/top', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-stepchart").click(function() {
                submit_action('manual/stepchart', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                   
                                                                                             
            $("#get-history").click(function() {
                submit_action('manual/history', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-next").click(function() {
                submit_action('manual/next', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-applicationtop").click(function() {
                submit_action('manual/applicationtop', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-agreement").click(function() {
                submit_action('manual/article', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                    return false;
            });
                                                                                             
            $("#get-estimate").click(function() {
                submit_action('manual/estimate', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-passport").click(function() {
                submit_action('manual/passport', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-preparationtop").click(function() {
                submit_action('manual/preparationtop', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-flight").click(function() {
                submit_action('manual/flight', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                    return false;
            });
                                                                                             
            $("#get-insurance").click(function() {
                submit_action('manual/insurance', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-visa").click(function() {
                submit_action('manual/visa', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-schedule").click(function() {
                submit_action('manual/schedule', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-schoolcontact").click(function() {
                submit_action('manual/schoolcontact', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                    return false;
            });
                                                                                             
            $("#get-achievement").click(function() {
                submit_action('manual/achievement', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-counseling").click(function() {
                submit_action('manual/counseling', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });

                                                                                             
            $("#get-seminartop").click(function() {
                submit_action('manual/seminartop', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-bookconfirm").click(function() {
                submit_action('manual/bookconfirm', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-seminarhistory").click(function() {
                submit_action('manual/seminarhistory', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                    return false;
            });
                                                                                             
            $("#get-online").click(function() {
                submit_action('manual/online', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-membertop").click(function() {
                submit_action('manual/membertop', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                    return false;
            });
                                                                                             
            $("#get-password").click(function() {
                submit_action('manual/password', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-email").click(function() {
                submit_action('manual/email', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                    return false;
            });
                                                                                             
            $("#get-address").click(function() {
                submit_action('manual/address', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-address").click(function() {
                submit_action('manual/address', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-extend").click(function() {
                submit_action('manual/extend', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
                                                                                             
            $("#get-lostcard").click(function() {
                submit_action('manual/lostcard', null, 'getdata');
                var position = $('#data-container').offset().top;
                $('html,body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
                return false;
            });
        }
    });
});

// common

function loadContents(url) {
    $.get(url, { push_state: 'true' }).then(function(content) {
        if(document.URL.match(/..#/)) {
            var url = 'index/index';
            history.pushState("", "", url);
            location.reload();
        } else {
            $('html').html(content);
            location.reload();
        }
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

function close_window() {
    setTimeout(function(){
        tb_remove();
        location.reload();
        return false;
    }, 500000);
}

function delrev_check(mode, module, action, id, object) {
    jConfirm('本当にID: '+id+'の'+object+'を'+mode+'しますか?', mode+'確認', function(r) {
        if (r === true) {
            submit_action(module+action, 'id='+id, action);

        } else {
            jAlert('キャンセルされました。', '結果');
        }

    });
}

function client_check(member){
    if(input_check('email', 'メールアドレス') != true) return false;
    if(email_check('email', 'メールアドレス') != true) return false;
    return true;
}

function agree_check(){
    var n = 1;
    var ret = true;
    $('#container tr').each(function(i){
        if($('*[name=check'+n+']:checked').prop('checked') != true){
            alert('すべての項目に同意いただく必要があります。');
            ret = false;
            return false;
        }
        n = n + 1;
    });
        if(ret == false) {
            return false;
        }
    return true;

}

function sign_check() {
    if($('*[name=output]').val() == ''){
        alert('署名がありません。');
        return false;
    }
    return true;
}

function login_escape_check(name) {
    for(var i = 0; i < $('#'+name).val().length; i++) {
        var len = escape($('#'+name).val().charAt(i)).length;
        if(len >= 4) {
            alert('日本語入力は禁止です。');
            return false;
        }
    }
    return true;
}

function search_submit(tpl) {
    var $form = $('#search');
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

function jawhm_login_check() {
    if (input_check('email', 'メールアドレス') != true)
        return false;
    if (email_check('email', 'メールアドレス') != true)
        return false;
    if (input_check('password', 'パスワード') != true)
        return false;
    return true;
}