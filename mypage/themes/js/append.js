/**
 *
 */

document.body.scrollTop = document.documentElement.scrollTop = 0;

if (document.URL.match(/..agreement/)) {
    if ($('#type').val() === 'new') {
        $('.sigPad').signaturePad({
            drawOnly : true,
            lineTop : 75
        });
    } else {

    }
}

if (document.URL.match(/..changeflight/)) {
    $("#flight_edit").click(function() {
        if (flight_check() != true)
            return false;
        var $form = $('#flight-edit');
        var data = $form.serializeArray();
        submit_action('preparation/editflight', data, 'refresh');
    });

    $('[id^=InputFile]').click(function() {
        var image_id = $(this).attr("id").split("_");
        var data = {'id': image_id[1]};
        submit_action('preparation/imageupload', data, null);
        $('#modal-window').modal();
        return false;
    });

    $("[id^=delete]").click(function() {
        var image_id = $(this).attr("id").split("_");
        var data = {'id': image_id[2]};
        submit_action('preparation/imgdelconfirm', data, null);
        $("#modal-window").modal();
    });
}

if (document.URL.match(/..seminar/)) {
    if (document.URL.match(/..detail/)) {
        $('.inc-memo2').each(function(i) {
            var height, title, memo;
            if (smp == 1) {
                title = $(this).find('.seminar-comment').outerHeight();
                memo = $(this).find('.seminar-memo').outerHeight();
                height = parseInt(title) + parseInt(memo) + parseInt(30);
                $(this).css({'padding-top': '5px', 'padding-bottom': height});
            } else {
                height = $(this).find('.seminar-memo').outerHeight() + 10;
               $(this).find('.seminar-comment').css({'margin-top': '-10px',
                                                    'margin-left': '-15px'});
               $(this).find('.seminar-comment').css({'padding-top': '10px', 'height': height + 10});
               $(this).css({'padding-top': '10px', 'height': height + 10});
            }

        });

        $('.edit_seminar_memo').click(function() {
            alert('a');
            var comment_id = $(this).attr("abbr").split("_");
            var data = {'crm_id': comment_id[0],
                        'id' : comment_id[1]};
            submit_action('school/seminar/changememo', data, null);
            $("#modal-window").modal();
        });

        $(".delseminarmemo").click(function() {
            var memo_id = $(this).attr("abbr").split("_");
            var data = {'crm_id': memo_id[0],
                        'id': memo_id[1],
                        'memo': memo_id[2]};
            submit_action('school/seminar/memodelconfirm', data, null);
            $("#modal-window").modal();
        });

        $("[id^=page_]").click(function() {
            var pages = $(this).attr("id").split("_");
            var data = {'crm_id': pages[2], 'append': pages[2], 'page': pages[1]};
            submit_action('school/seminar/memolist', data, 'append_memo');
        });
    }
}

if (document.URL.match(/..manual/)) {
    $("#manual-back").click(function() {
        $("html,body").animate({
            scrollTop:0
        });
    });
}

if (document.URL.match(/..school/)) {
    $("[id^=changecomment]").click(function() {
        var collapse = $(this).parents('a').attr('id').split('_');
        var target_collapse = collapse[1];
        $('#collapse_'+target_collapse).addClass('in');

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

}

if (document.URL.match(/..staff/)) {
    if (document.URL.match(/..plan/)) {
        $('[id^=edithistory_]').click(function() {
            var step_id = $(this).attr('id').split('_');
            var data = {'id': step_id[1]};

            submit_action('staff/plan/changehistory', data, null);
            $("#modal-window").modal();
        });

    }
}

$('[id^=sort_status_client]').click(function() {
    sort_function($(this), 'school/client/list');
});

$('#sort_item_client').change(function() {
    sort_mobile($(this), 'school/client/list');
});

$('#sort_order_client').change(function() {
    sort_mobile($(this), 'school/client/list');
});

$('[id^=sort_status_seminar]').click(function() {
    sort_function($(this), 'school/seminar/list');
});

$('[id^=sort_status_insurance]').click(function() {
    sort_function($(this), 'staff/adopt/list');
});

$('#sort_item_seminar').change(function() {
    sort_mobile($(this), 'school/seminar/list');
});

$('#sort_order_seminar').change(function() {
    sort_mobile($(this), 'school/seminar/list');
});

$('*[name^=comment]').on('keyup', function() {
    var i = $(this).attr("name").split("_");
    var no = i[1];
    var thisValueLength = $(this).val().length;
    var remaining = 300 - thisValueLength;
    $('.count_'+no).html(remaining);
});

$('[id^=comment_edit]').click(function() {
    var i = $(this).attr("id").split("_");
    var no = i[2];
    var $form = $('[id=comment-edit_'+no+']');
    if (comment_append_check(no) != true)
        return false;
    var data = $form.serializeArray();

    data['append'] = 'contact_comment';
    data['no'] = no;
    submit_action('school/index/appendeditcomment', data, 'append');
});

function comment_append_check(no) {
    if (textarea_check('comment_'+no, jsmsg[49]['message']) != true)
        return false;
    if (textarea_number('comment_'+no, jsmsg[49]['message'], 300) != true)
        return false;
    return true;
}

function sort_function(parent, module) {
    var idx = parent.attr("id").replace("sort_status", "");
    var mod = module.split('/');
    var target = mod[1];

    switch (parent.attr("name")) {
    case 'unsorted':
        $('[id^=status]').attr('name', "unsorted");
        $('[id^=status]').attr('src', 'themes/images/unsorted.png');
        parent.attr('name', "down");
        $('#status' + idx).attr('src', 'themes/images/down.png');

        sendrequest(parent.attr('abbr'), 'ASC', module, target);
        break;

    case 'up':
        $('[id^=status]').attr('name', "unsorted");
        $('[id^=status]').attr('src', 'themes/images/unsorted.png');
        parent.attr('name', "down");
        $('#status' + idx).attr('src', 'themes/images/down.png');

        sendrequest(parent.attr('abbr'), 'DESC', module, target);
        break;

    case 'down':
        $('[id^=status]').attr('name', "unsorted");
        $('[id^=status]').attr('src', 'themes/images/unsorted.png');
        parent.attr('name', "up");
        $('#status' + idx).attr('src', 'themes/images/up.png');

        sendrequest(parent.attr('abbr'), 'ASC', module, target);
        break;

    default:
        parent.attr('name', "unsorted");
        $('#status' + idx).attr('src', 'themes/images/unsorted.png');
        break;
    }
}

function sort_mobile(parent, module) {
    var mod = module.split('/');
    var target = mod[1];
    var item = $("#sort_item_" + target + " option:selected").val();
    var order = $("#sort_order_" + target + " option:selected").val();

    sendrequest(item, order, module, target);
}

function sendrequest(sortkey, order, module, target) {
    var $sortkey = {
        name : 'sortkey',
        value : sortkey
    };
    var $order = {
        name : 'order',
        value : order
    };

    var $form = $('#'+target+'-search');
    var data = $form.serializeArray();

    data.push($sortkey);
    data.push($order);

    submit_action(module, data, 'rewrite');
}

function flight_check() {
    if (input_check('flight_number', jsmsg[54]['message']) != true)
        return false;
    if (escape_check('flight_number', jsmsg[54]['message']) != true)
        return false;
    if (input_check('departure_place', jsmsg[55]['message']) != true)
        return false;
    if (escape_check('departure_place', jsmsg[55]['message']) != true)
        return false;
    if (input_check('departure_time', jsmsg[56]['message']) != true)
        return false;
    if (date_check('departure_time', jsmsg[56]['message']) != true)
        return false;
    if (time_check('departure_time', jsmsg[56]['message']) != true)
        return false;
    if (input_check('destination_place', jsmsg[57]['message']) != true)
        return false;
    if (escape_check('destination_place', jsmsg[57]['message']) != true)
        return false;
    if (input_check('destination_time', jsmsg[58]['message']) != true)
        return false;
    if (date_check('destination_time', jsmsg[58]['message']) != true)
        return false;
    if (time_check('destination_time', jsmsg[58]['message']) != true)
        return false;
    return true;
}

$('#staff_confirm').click(function() {
    var $form = $('#staff-confirm');
    var data = $form.serializeArray();
    submit_action('staffconfirm', data, null);
    $('#modal-window').modal();
    return false;
});

$('[id^=showdetails]').click(function() {
    var abroad_no = $(this).attr("id").split("_");
    var data = {'abroad': abroad_no[1],
                'school_no': abroad_no[2]};
    submit_action('school/client/detail', data, 'move');
});

$('[id^=seminardetails]').click(function() {
    var seminar = $(this).attr("id").split("_");
    var data = {'seminar': seminar[1]};
    submit_action('school/seminar/detail', data, 'move');
});

$('[id$=page]').click(function() {
    $("#list").load($(this).attr('href'));
    return false;
});

$('#submit_insurance').click(function(){
    var $form = $('#insurance-edit');
    var data = $form.serializeArray();
    submit_action('staff/adopt/fixinsurance', data, 'refresh');
     return false;
});