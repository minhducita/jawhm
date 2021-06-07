$(document).ready(function(){

    $(window).bind("load", function(){
        $(function(){
            $("tbody:odd").addClass("even");
        });
        // initial function(common method)
        var len = $("#tbl tbody").children().length;

        for (var i=1; i<len+1; i++) {
            eval("var trno_" + i +" = false;");
        }

        $(".list").click(function(){
            var tr_no = $(this).attr("id").split("_")[1];

            if (eval("trno_" + tr_no) == false) {
                $(this).css("background-color","#A0C8FF");
                eval("trno_" + tr_no + " = true;");

            } else {
                eval("trno_" + tr_no + " = false;");
                $(this).css('background-color', '');

            }
        });


        $(".autolink").each(function(){
            $(this).html( $(this).html().replace(/((http|https|ftp):\/\/[\w?=&.\/-;#~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g, '<a href="$1">$1</a> ') );
        });

        if(document.URL.match(/..adopt/)) {
            if(document.URL.match(/..insuranceerrorlist/)) {
                $(function() {
                     sendfirst('list');
                     return false;
                });

                $('#submit_insurance').click(function(){
                    var $form = $('#insurance-edit');
                    var data = $form.serializeArray();
                    submit_action('fixinsurance', data, 'refresh');
                     return false;
                });
            }
        }

        //if(document.URL.match(/..achievement/)) {
            $("[id^=abroad]").click(function() {
                var abroad = $(this).attr("id").split("_");
                   var data = {'abroad': abroad[1],
                               'url': abroad[2],
                               'rewrite': true};
                submit_action('status', data, 'gatdata');
                return false;
            });




            $('[id^=reminder]').click(function() {
                var command = $(this).attr("id").split("-");
                data = {'command': command[1],
                        'index': parseInt(command[2]) + 1};
                submit_action('emailremind', data, null);
                $('#modal-window').modal();
                return false;
            });
        //}

        if(document.URL.match(/..edit/)) {
            $("[id^=edit]").click(function() {
                var id = $(this).attr("id").split("_");
                   var data = {'id': id[1]};
                submit_action('changecomment', data, null);
                $('#modal-window').modal();
                return false;
            });
        }

    });
});

// common

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

function toggle_contents(class_value) {
    if($('#'+class_value).attr('class') === 'hidden'){
        $('*[id='+class_value+']').removeClass("hidden").addClass("apper");
    } else {
        $('*[id='+class_value+']').removeClass("apper").addClass("hidden");
    }
}

function login_check() {
    if (input_check('user_id', 'ユーザーID') != true)
        return false;
    if (input_check('password', 'パスワード') != true)
        return false;
    return true;
}

function sendfirst(module) {
    var sortkey = null;
    var order = null;
    var data = [];

    data.push(sortkey);
    data.push(order);

    submit_action(module, data, 'rewrite');

}