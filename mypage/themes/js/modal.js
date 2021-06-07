$('#edit_password').click(function() {
    if (password_check() != true)
        return false;
    var $form = $('#password-edit');
    var data = $form.serializeArray();
    submit_action('member/editpassword', data, null);
});

$('#edit_password_school').click(function() {
    if (password_check() != true)
        return false;
    var $form = $('#password-edit');
    var data = $form.serializeArray();
    submit_action('school/index/editpassword', data, null);
});

$('#password_reset').click(function() {
    if (password_reset_check() != true)
        return false;
    var $form = $('#reset-password');
    var data = $form.serializeArray();
    submit_action('index/passwordreset', data, null);
});

$('#school_reset').click(function() {
    if (password_reset_check() != true)
        return false;
    var $form = $('#reset-password');
    var data = $form.serializeArray();
    submit_action('school/index/passwordreset', data, null);
});

$('#email_update').click(function() {
    if (change_email_check() != true)
        return false;
    var $form = $('#edit-email');
    var data = $form.serializeArray();
    submit_action('member/emailconfirm', data, null);
});

$("#delete_ok").click(function() {
    var $form = $('#edit-email');
    var data = $form.serializeArray();
    submit_action('member/deleteunconfirm', data, null);
});

$("#change_ok").click(function() {
    var $form = $('#edit-email');
    var data = $form.serializeArray();
    submit_action('member/chkcmpkey', data, null);
});

$("#email_status").click(function() {
    var $form = $('#edit-email');
    var data = $form.serializeArray();
    submit_action('member/chkemail', data, null);
});

$("#change_type_ok").click(function() {
    var $form = $('#edit-email');
    var data = $form.serializeArray();
    submit_action('member/chkcmptype', data, null);
});

$("[id^=delete_email]").click(function() {
    var mail_id = $(this).attr("id").split("_");
    data = {'email_id': mail_id[2],
            'id': mail_id[3]};
    submit_action('member/deleteemail', data, null);
    $('#modal-window').modal();
});

$("#reload").click(function() {
    reload();
});

$("#email_delete").click(function() {
    var $form = $('#delete-email');
    var data = $form.serializeArray();
    submit_action('member/delcmpemail', data, null);
});

$("#email_resend").click(function() {
    var $form = $('#edit-email');
    var data = $form.serializeArray();
    submit_action('member/unconfirmcheck', data, null);
});

$("#address_edit").click(function() {
    if (address_edit_check() != true)
        return false;
    var $form = $('#address-edit');
    var data = $form.serializeArray();
    submit_action('member/editaddress', data, null);
});

$("[id^=abroad]").click(function() {
    var abroad = $(this).attr("id").split("_");
    var url = abroad[2];
    var data = {'abroad': abroad[1],
                'url': abroad[2],
                'rewrite': true};
    history.pushState("", "", '#');
    submit_action(url, data, 'move');
});

$("[id^=staffabroad]").click(function() {
    var abroad = $(this).attr("id").split("_");
    var url = abroad[2];
    var data = {'abroad': abroad[1],
                'url': abroad[2],
                'rewrite': true};
    submit_action(url, data, 'move');
});

$("[id^=flight-abroad]").click(function() {
    var abroad = $(this).attr("id").split("_");
    var url = abroad[2];
    var data = {'abroad': abroad[1],
                'url': abroad[2]
                };
    submit_action(url, data, null);
    return false;
});

$("[id^=changedeposit]").click(function() {
    var deposit_id = $(this).attr("id").split("_");
    var data = {'id': deposit_id[1],
                'mypage': deposit_id[2]};
    submit_action('application/changedeposit', data, null);
    $('#modal-window').modal();
});

$("#deposit_edit").click(function() {
    if (deposit_check() != true)
        return false;
    var $form = $('#deposit-edit');
    var data = $form.serializeArray();
    submit_action('application/editdeposit', data, null);
});

$("#flight_delete").click(function() {
    var $form = $('#flight-delete');
    var data = $form.serializeArray();
    submit_action('preparation/deleteflight', data, null);
});

$("#help-top").click(function() {
    submit_action('manual/topmodal', null, null);
    $("#modal-window").modal();
});

$("#help-stepchart").click(function() {
    submit_action('manual/stepchartmodal', null, null);
    $("#modal-window").modal();
});

$("#help-history").click(function() {
    submit_action('manual/historymodal', null, null);
    $("#modal-window").modal();
});

$("#help-next").click(function() {
    submit_action('manual/nextmodal', null, null);
    $("#modal-window").modal();
});

$("#help-applicationtop").click(function() {
    submit_action('manual/applicationtopmodal', null, null);
    $("#modal-window").modal();
});

$("#help-article").click(function() {
    submit_action('manual/articlemodal', null, null);
    $("#modal-window").modal();
});

$("#help-estimate").click(function() {
    submit_action('manual/estimatemodal', null, null);
    $("#modal-window").modal();
});

$("#help-passport").click(function() {
    submit_action('manual/passportmodal', null, null);
    $("#modal-window").modal();
});

$("#help-counseling").click(function() {
    submit_action('manual/counselingmodal', null, null);
    $("#modal-window").modal();
});

$("#help-membertop").click(function() {
    submit_action('manual/membertopmodal', null, null);
    $("#modal-window").modal();
});

$("#help-password").click(function() {
    submit_action('manual/passwordmodal', null, null);
    $("#modal-window").modal();
});

$('*[name=talk_content]').on('keyup', function() {
    var thisValueLength = $(this).val().length;
    $('.count').html(thisValueLength);
});

$('*[name=modal-comment]').on('keyup', function() {
    var thisValueLength = $(this).val().length;
    var remaining = 300 - thisValueLength;
    $('.count').html(remaining);
});

$('*[name=comment_content]').on('keyup', function() {
    var thisValueLength = $(this).val().length;
    $('.count').html(thisValueLength);
});

$('*[name=memo]').on('keyup', function() {
    var thisValueLength = $(this).val().length;
    $('.count').html(thisValueLength);
});

$('*[name=memo_seminar]').on('keyup', function() {
    var thisValueLength = $(this).val().length;
    var remaining = 500 - thisValueLength;
    $('.count').html(remaining);
});

$('*[name=privilege_seminar]').on('keyup', function() {
    var thisValueLength = $(this).val().length;
    var remaining = 300 - thisValueLength;
    $('.count').html(remaining);
});

$('*[name=description]').on('keyup', function() {
    var thisValueLength = $(this).val().length;
    $('.count').html(thisValueLength);
});

$('#step_description').on('keyup', function() {
    var thisValueLength = $(this).val().length;
    var remind = 300 - thisValueLength;
    $('.count').html(remind);
});

$("#talk_confirm").click(function() {
    if (talk_check() != true)
        return false;
    var $form = $('#talk-edit');
    var data = $form.serializeArray();
    submit_action('talk/talkconfirm', data, null);
});

$("#talk_amend").click(function() {
    submit_action('talk/changetalk', null, null);
});

$("#talk_complete").click(function() {
    var $form = $('#talk-edit');
    var data = $form.serializeArray();
    submit_action('talk/edittalk', data, null);
});

$("#talk_delete").click(function() {
    var $form = $('#talk-delete');
    var data = $form.serializeArray();
    submit_action('talk/deletetalk', data, null);
});

$("#client_memo_delete").click(function() {
    var $form = $('#client-memo-delete');
    var data = $form.serializeArray();
    submit_action('school/client/deletememo', data, null);
});

$("#seminar_memo_delete").click(function() {
    var $form = $('#client-memo-delete');
    var data = $form.serializeArray();
    submit_action('school/seminar/deletememo', data, null);
});

$("#insurance_edit").click(function() {
    if (insurance_check() != true)
        return false;
    var $form = $('#insurance-edit');
    var data = $form.serializeArray();
    submit_action('preparation/editinsurance', data, null);
});

$("#insurance_delete").click(function() {
    var $form = $('#insurance-delete');
    var data = $form.serializeArray();
    submit_action('preparation/deleteinsurance', data, null);
});

$("#visa_edit").click(function() {
    if (visa_check() != true)
        return false;
    var $form = $('#visa-edit');
    var data = $form.serializeArray();
    submit_action('preparation/editvisa', data, null);
});

$("#visa_delete").click(function() {
    var $form = $('#visa-delete');
    var data = $form.serializeArray();
    submit_action('preparation/deletevisa', data, null);
});

$('#remind_ok').click(function() {
    var $form = $('#remind-email');
    var data = $form.serializeArray();
    submit_action('sendremind', data, null);
});

$('#comment_edit_modal').click(function() {
    if (comment_modal_check() != true)
        return false;
    var $form = $('#comment-edit-modal');
    var data = $form.serializeArray();
    submit_action('school/index/editcomment', data, null);
});

$('#contact_edit_client').click(function() {
    if (contract_edit_client_check() != true) return false;
    var $form = $('#contact-edit-client');
    var data = $form.serializeArray();
    submit_action('school/client/editcontact', data, null);
});

$('#comment_edit_staff').click(function() {
    if (comment_staff_check() != true)
        return false;
    var $form = $('#comment-edit');
    var data = $form.serializeArray();
    submit_action('staff/edit/editcomment', data, null);
});

$('#inquiry_confirm').click(function() {
    if (inquiry_check() != true)
        return false;
    var $form = $('#inquiry-confirm');
    var data = $form.serializeArray();
    submit_action('plan/inquiryconfirm', data, null);
});

$('#inquiry_complete').click(function() {
    var $form = $('#inquiry-complete');
    var data = $form.serializeArray();
    submit_action('plan/sendinquiry', data, null);
});

$('#inquiry_amend').click(function() {
    submit_action('plan/flightinquiry', null, null);
});

$('#memo_edit_seminar').click(function() {
    if (memo_seminar_check() != true)
        return false;
    var $form = $('#memo-edit-seminar');
    var data = $form.serializeArray();
    submit_action('school/seminar/editmemo', data, null);
});

$('#privilege_edit_seminar').click(function() {
    if (privilege_seminar_check() != true)
        return false;
    var $form = $('#privilege-edit-seminar');
    var data = $form.serializeArray();
    submit_action('school/seminar/editprivilege', data, null);
});

$('#pass_upload').click(function() {
    if (passport_check() != true)
        return false;
    var $form = $('#passport_upload');
    var data = new FormData($form[0]);
    submit_file('application/passprocess', data, null);
    return false;
});

$('#survey_upload').click(function() {
    var $form = $('#survey-upload');
    var data = new FormData($form[0]);
    submit_file('index/imageprocess', data, null);
    return false;
});

$('#flight_upload').click(function() {
    var $form = $('#flight-upload');
    var data = new FormData($form[0]);
    submit_file('preparation/imageprocess', data, null);
    return false;
});

$("#image_delete").click(function() {
    var $form = $('#image-delete');
    var data = $form.serializeArray();
    submit_action('index/deleteimage', data, null);
});

$("#flightimage_delete").click(function() {
    var $form = $('#flightimage-delete');
    var data = $form.serializeArray();
    submit_action('preparation/deleteimage', data, null);
});

$("#comment_delete").click(function() {
    var $form = $('#comment-delete');
    var data = $form.serializeArray();
    submit_action('school/index/deletecomment', data, null);
});

$('#submit_appointment').click(function() {
    if (appointment_check() != true) return false;

    var $form = $('#appointment-set');
    var data = $form.serializeArray();
    submit_action('index/sendappointment', data, null);
});

$("#upload_file").click(function() {
    if (upload_check() != true)
        return false;
    var $form = $('#fileinput');
    var data = new FormData($form[0]);
    submit_file('school/client/fileprocess', data, null);
    return false;
});

$("#upload_client").click(function() {
    if (upload_check() != true)
        return false;
    var $form = $('#fileinput');
    var data = new FormData($form[0]);
    submit_file('staff/file/clientprocess', data, null);
    return false;
});

$("#upload_school").click(function() {
    if (upload_check() != true)
        return false;
    var $form = $('#fileinput');
    var data = new FormData($form[0]);
    submit_file('staff/file/fileprocess', data, null);
    return false;
});

$('[id^=filled_form]').click(function() {
    var branch = $(this).attr('id').split('_');
    var branch_no = {'branch_no': branch[2]};
    submit_action('application/filledform', branch_no, null);
    $('#modal-window').modal();
    return false;
});

$('[id^=filled_homestay]').click(function() {
    var branch = $(this).attr('id').split('_');
    var branch_no = {'branch_no': branch[2]};
    submit_action('application/filledhomestay', branch_no, null);
    $('#modal-window').modal();
    return false;
});

$("#application_upload").click(function() {
    if (upload_check() != true)
        return false;
    var $form = $('#application-upload');
    var data = new FormData($form[0]);
    submit_file('application/filledformprocess', data, null);
    return false;
});

$("#homestay_upload").click(function() {
    if (upload_check() != true)
        return false;
    var $form = $('#homestay-upload');
    var data = new FormData($form[0]);
    submit_file('application/filledhomestayprocess', data, null);
    return false;
});

$('#edit_stepchart').click(function() {
    if (stepchart_check() != true) return false;

    var $form = $('#edit-stepchart');
    var data = $form.serializeArray();
    submit_action('staff/edit/editchart', data, null);
    return false;
});

$('#create_stepchart').click(function() {
    if (createstepchart_check() != true) return false;

    var $form = $('#create-stepchart');
    var data = $form.serializeArray();
    submit_action('staff/edit/newchartstatus', data, null);
    return false;
});

$("#chart_delete").click(function() {
    var $form = $('#chart-delete');
    var data = $form.serializeArray();
    submit_action('staff/edit/deletechart', data, null);
    $('#modal-window').modal();
    return false;
});

$('#edit_step').click(function() {
    if (stepchart_check() != true) return false;

    var $form = $('#edit-step');
    var data = $form.serializeArray();
    submit_action('staff/edit/editstep', data, null);
    return false;
});

$("#step_delete").click(function() {
    var $form = $('#step-delete');
    var data = $form.serializeArray();
    submit_action('staff/edit/deletestep', data, null);
    $('#modal-window').modal();
    return false;
});

$("#edit_lang").click(function() {
    if (language_check() != true) return false;
    var $form = $('#edit-lang');
    var data = $form.serializeArray();
    submit_action('staff/edit/editlang', data, null);
    $('#modal-window').modal();
    return false;
});

$('#apply_school').click(function() {
    var $form = $('#apply-school');
    var data = $form.serializeArray();
    submit_action('staff/file/applyed', data, null);
    $('#modal-window').modal();
    return false;
});

$('#staffcomment_edit').click(function() {
    if (staffcomment_check() != true) return false;
    var $form = $('#staffcomment-edit');
    var data = $form.serializeArray();
    submit_action('staff/school/editcomment', data, null);
    $('#modal-window').modal();
    return false;
});

$('#confirm_edit').click(function() {
    if (expiration_check() != true) return false;
    var $form = $('#confirm-edit');
    var data = $form.serializeArray();
    submit_action('staff/application/expiration', data, null);
    $('#modal-window').modal();
    return false;
});

$('#seminar_proposal_edit').click(function() {
    if (semiproposal_check() != true) return false;
    var $form = $('#seminar-proposal-edit');
    var data = $form.serializeArray();
    submit_action('school/proposal/editproposal', data, null);
    $('#modal-window').modal();
    return false;
});

$('#staff_proposal_edit').click(function() {
    if (staffproposal_check() != true) return false;
    var $form = $('#staff-proposal-edit');
    var data = $form.serializeArray();
    submit_action('staff/school/editproposal', data, null);
    $('#modal-window').modal();
    return false;
});

$('*[id$=-confirm]').click(function() {
    var status = $(this).attr("id").split("-");
    if (!confirm(stat[status[0]]+'を確認にします\nよろしいですか？')) {
        return false;
    }

    var data = {'name': status[0],
                'action_tag': $('*[name=action_tag]').val(),
                'token': $('*[name=token]').val()};
    submit_action('staff/application/confirmed', data, null);
    $('#modal-window').modal();
    return false;
});

$('*[id$=-redo]').click(function() {
    var status = $(this).attr("id").split("-");
    if (!confirm(stat[status[0]]+'をやり直しにします\nよろしいですか？')) {
        return false;
    }

    var data = {'name': status[0],
                'action_tag': $('*[name=action_tag]').val(),
                'token': $('*[name=token]').val()};
    submit_action('staff/application/redo', data, null);
    $('#modal-window').modal();
    return false;
});

$('*[id$=-back]').click(function() {
    var status = $(this).attr("id").split("-");
    if (!confirm(stat[status[0]]+'を確認中にします\nよろしいですか？')) {
        return false;
    }

    var data = {'name': status[0],
                'action_tag': $('*[name=action_tag]').val(),
                'token': $('*[name=token]').val()};
    submit_action('staff/application/back', data, null);
    $('#modal-window').modal();
    return false;
});

$('[id^=charge_change_]').click(function() {
    var array = $(this).attr('id').split('_');
    var data = {'range_id': array[2]};
submit_action('staff/edit/changecharge', data, null);
$('#modal-window').modal();
return false;
});

$('#preparation_confirm_edit').click(function() {
    if (expiration_check() != true) return false;
    var $form = $('#confirm-edit');
    var data = $form.serializeArray();
    submit_action('staff/preparation/expiration', data, null);
    $('#modal-window').modal();
    return false;
});

$('*[id$=-confirm-preparation]').click(function() {
    var status = $(this).attr("id").split("-");
    if (!confirm(stat[status[0]]+'を確認にします\nよろしいですか？')) {
        return false;
    }

    var data = {'name': status[0],
                'action_tag': $('*[name=action_tag]').val(),
                'token': $('*[name=token]').val()};
    submit_action('staff/preparation/confirmed', data, null);
    $('#modal-window').modal();
    return false;
});

$('*[id$=-redo-preparation]').click(function() {
    var status = $(this).attr("id").split("-");
    if (!confirm(stat[status[0]]+'をやり直しにします\nよろしいですか？')) {
        return false;
    }

    var data = {'name': status[0],
                'action_tag': $('*[name=action_tag]').val(),
                'token': $('*[name=token]').val()};
    submit_action('staff/preparation/redo', data, null);
    $('#modal-window').modal();
    return false;
});

$('*[id$=-back-preparation]').click(function() {
    var status = $(this).attr("id").split("-");
    if (!confirm(stat[status[0]]+'を確認待ちにします\nよろしいですか？')) {
        return false;
    }

    var data = {'name': status[0],
                'action_tag': $('*[name=action_tag]').val(),
                'token': $('*[name=token]').val()};
    submit_action('staff/preparation/back', data, null);
    $('#modal-window').modal();
    return false;
});

$('#nextstep_edit').click(function() {
    if (nextstep_check() != true) return false;
    var $form = $('#nextstep-edit');
    var data = $form.serializeArray();
    submit_action('staff/client/nextstepedit', data, null);
    $('#modal-window').modal();
    return false;
});

$('#nextstep_staff').click(function() {
    if (nextstep_check() != true) return false;
    var $form = $('#nextstep-edit');
    var data = $form.serializeArray();
    submit_action('staff/plan/edithistory', data, null);
    $('#modal-window').modal();
    return false;
});

$('#edit_school').click(function() {
    if (school_check() != true) return false;
    var $form = $('#edit-school');
    var data = $form.serializeArray();
    submit_action('staff/edit/editschool', data, null);
    $('#modal-window').modal();
    return false;
});

$('#delete_school').click(function() {
    var $form = $('#delete-school');
    var data = $form.serializeArray();
    submit_action('staff/edit/deleteschool', data, null);
    $('#modal-window').modal();
    return false;
});

$('#edit_airport').click(function() {
    if (airport_check() != true) return false;
    var $form = $('#edit-airport');
    var data = $form.serializeArray();
    submit_action('staff/edit/editairport', data, null);
    $('#modal-window').modal();
    return false;
});

$('#delete_airport').click(function() {
    var $form = $('#delete-airport');
    var data = $form.serializeArray();
    submit_action('staff/edit/deleteairport', data, null);
    $('#modal-window').modal();
    return false;
});

$('#edit_charge').click(function() {
    var $form = $('#edit-charge');
    var data = $form.serializeArray();
    submit_action('staff/edit/editcharge', data, null);
    $('#modal-window').modal();
    return false;
});

function password_check() {
    if (input_check('password', jsmsg[13]['message']) != true)
        return false;
    if (input_check('retype', jsmsg[14]['message']) != true)
        return false;
    if (equal_check('password', 'retype', jsmsg[13]['message']) != true)
        return false;
    if (length_check('password', jsmsg[13]['message'], 5) != true) return false;
    return true;
}

function password_reset_check() {
    if (input_check('email_reset', jsmsg[15]['message']) != true)
        return false;
    if (email_check('email_reset', jsmsg[15]['message']) != true)
        return false;
    if (input_check('id', jsmsg[17]['message']) != true)
        return false;
    return true;
}

function change_email_check() {
    if (input_check('change_email', jsmsg[15]['message']) != true)
        return false;
    if (change_check('change_email', 'originai_email', jsmsg[15]['message']) != true)
        return false;
    if (input_check('retype', jsmsg[16]['message']) != true)
        return false;
    if (email_check('change_email', jsmsg[15]['message']) != true)
        return false;
    if (equal_check('change_email', 'retype', jsmsg[15]['message']) != true)
        return false;
    return true;
}

function reload() {
    location.reload();
}

function resend_email_check() {
    if (input_check('resend_email', jsmsg[15]['message']) != true)
        return false;
    if (email_check('resend_email', jsmsg[15]['message']) != true)
        return false;
    return true;
}

function address_edit_check() {
    if (input_check('zip', jsmsg[18]['message']) != true)
        return false;
    if (input_check('add1', jsmsg[19]['message']) != true)
        return false;
    if (input_check('add2', jsmsg[20]['message']) != true)
        return false;
    if (input_check('add3', jsmsg[21]['message']) != true)
        return false;
    return true;
}

function deposit_check() {
    if (input_check('deposit_date', jsmsg[22]['message']) != true)
        return false;
    if (date_check('deposit_date', jsmsg[22]['message']) != true)
        return false;
    return true;
}

function talk_check() {
    if (textarea_check('talk_content', jsmsg[23]['message']) != true)
        return false;
    if (textarea_number('talk_content', jsmsg[23]['message'], 300) != true)
        return false;
    return true;
}

function insurance_check() {
    if (input_check('provider_name', jsmsg[24]['message']) != true)
        return false;
    if (other_check('provider_name',jsmsg[24]['message']) != true)
        return false;
    if (input_check('insurance_type', jsmsg[25]['message']) != true)
        return false;
    if (escape_check('insurance_type', jsmsg[25]['message']) != true)
        return false;
    if (input_check('policy_number', jsmsg[26]['message']) != true)
        return false;
    if (escape_check('policy_number', jsmsg[26]['message']) != true)
        return false;
    if (input_check('policy_owner', jsmsg[27]['message']) != true)
        return false;
    if (escape_check('policy_owner', jsmsg[27]['message']) != true)
        return false;
    if (input_check('insured_date_st', jsmsg[28]['message']) != true)
        return false;
    if (date_check('insured_date_st', jsmsg[28]['message']) != true)
        return false;
    if (input_check('insured_date_ed', jsmsg[29]['message']) != true)
        return false;
    if (date_check('insured_date_ed', jsmsg[29]['message']) != true)
        return false;
    if (input_check('deposit_amount', jsmsg[30]['message']) != true)
        return false;
    if (numeric_check('deposit_amount', jsmsg[30]['message']) != true)
        return false;
    if ($('[name=option_flag]:checked').val() == 1) {
        if ($('[name=option_name]').val() == '') {
            alert('オプション名を指定してください');
            return false;
        }

        if (input_check('option_amount', 'オプション金額') != true)
            return false;
        if (numeric_check('option_amount', 'オプション金額') != true)
            return false;
    } else {
        if ($('[name=option_name]').val() != '') {
            alert('オプション無しの場合はオプション名を入力しないでください');
            return false;
        }

        if ($('[name=option_amount]').val() != '') {
            alert('オプション無しの場合はオプション金額を入力しないでください');
            return false;
        }

    }
    return true;
}

function visa_check() {
    if (input_check('visa_type', jsmsg[31]['message']) != true)
        return false;
    if (other_visa_check('visa_type', jsmsg[31]['message']) != true)
        return false;
    if (input_check('visa_number', jsmsg[32]['message']) != true)
        return false;
    if (escape_check('visa_number', jsmsg[32]['message']) != true)
        return false;
    if (input_check('passport_number', jsmsg[33]['message']) != true)
        return false;
    if (escape_check('passport_number', jsmsg[33]['message']) != true)
        return false;
    if ($('*[name=expected_entrance_date]').val() != '') {
        if (date_check('expected_entrance_date', jsmsg[34]['message']) != true)
        return false;
    }
    if ($('*[name=expected_return_date]').val() != '') {
        if (date_check('expected_return_date', jsmsg[35]['message']) != true)
        return false;
    }
    if ($('*[name=arrival_date]').val() != '') {
        if (date_check('arrival_date', jsmsg[36]['message']) != true)
        return false;
    }
    if ($('*[name=visa_expiry_date]').val() != '') {
        if (date_check('visa_expiry_date', jsmsg[37]['message']) != true)
            return false;
    }
    if ($('*[name=account_no]').val() != '') {
        if (escape_check('account_no', jsmsg[38]['message']) != true)
        return false;
    }
    if ($('*[name=taxfilenumber_date]').val() != '') {
        if (escape_check('taxfilenumber', jsmsg[39]['message']) != true)
        return false;
    }
    return true;
}

function appointment_check() {
    if (input_check('first_choice', '第一希望日') != true)
        return false;
    if (date_check('first_choice', '第一希望日') != true)
        return false;
    if (input_check('second_choice', '第二希望日') != true)
        return false;
    if (date_check('second_choice', '第二希望日') != true)
        return false;
    if (input_check('third_choice', '第三希望日') != true)
        return false;
    if (date_check('third_choice', '第三希望日') != true)
        return false;
    if (input_check('consultation', '相談内容') != true)
        return false;
    return true;
}

function other_check(name, input) {
    var prov = $('*[name=' + name + ']').val();
    if (prov != 'AIU' && prov != jsmsg[40]['message']
        && prov != jsmsg[41]['message'] && prov != jsmsg[42]['message']
        && prov != jsmsg[43]['message'] && prov != jsmsg[44]['message']
        && prov != jsmsg[45]['message']) {
        if (escape_check(name, input) != true)
            return false;
    }
    return true;

}

function other_visa_check(name, input) {
    var prov = $('*[name=' + name + ']').val();
    if (prov != jsmsg[46]['message'] && prov != jsmsg[47]['message']
        && prov != jsmsg[48]['message'] && prov != 'Co-op') {
        if (escape_check(name, input) != true)
            return false;
    }
    return true;
}

function comment_modal_check() {
    if (textarea_check('modal-comment', jsmsg[49]['message']) != true)
        return false;
    if (textarea_number('modal-comment', jsmsg[49]['message'], 300) != true)
        return false;
    return true;
}

function comment_staff_check() {
    if (textarea_check('comment_content', '内容') != true) return false;
    return true;
}

function memo_seminar_check() {
    if (textarea_check('memo_seminar', jsmsg[50]['message']) != true)
        return false;
    if (textarea_number('memo_seminar', jsmsg[50]['message'], 500) != true)
        return false;
    return true;
}

function semiproposal_check() {
    if (input_check('expected_seminar_datetime', jsmsg[66]['message']) != true)
        return false;
    if (date_check('expected_seminar_datetime', jsmsg[66]['message']) != true)
        return false;
    if (time_check('expected_seminar_datetime', jsmsg[66]['message']) != true)
        return false;
    if (input_check('expected_require_time', jsmsg[67]['message']) != true)
        return false;
    if (numeric_check('expected_require_time', jsmsg[67]['message']) != true)
        return false;
    if (textarea_number('school_comment', jsmsg[68]['message'], 1000) != true)
        return false;
    return true;
}

function staffproposal_check() {
    if (input_check('expected_seminar_datetime', '提案日時') != true)
        return false;
    if (date_check('expected_seminar_datetime', '提案日時') != true)
        return false;
    if (time_check('expected_seminar_datetime', '提案日時') != true)
        return false;
    if (input_check('expected_require_time', '提案時間(分)') != true)
        return false;
    if (numeric_check('expected_require_time', '提案時間(分)') != true)
        return false;
    if (textarea_number('staff_comment', 'スタッフコメント', 1000) != true)
        return false;

    return true;
}

function privilege_seminar_check() {
    if (textarea_number('privilege_seminar', jsmsg[51]['message'], 300) != true)
        return false;
    return true;
}

function contract_edit_client_check() {
    if (textarea_number('memo', jsmsg[50]['message'], 500) != true)
        return false;
    return true;
}

function inquiry_check() {
    if (input_check('name_jp', jsmsg[59]['message']) != true)
        return false;
    if (input_check('name_en', jsmsg[60]['message']) != true)
        return false;
    if (escape_check('name_en', jsmsg[60]['message']) != true)
        return false;
    if (input_check('tel', jsmsg[61]['message']) != true)
        return false;
    if (telnum_check('tel', jsmsg[61]['message']) != true)
        return false;
    if (input_check('email', jsmsg[62]['message']) != true)
        return false;
    if (email_check('email', jsmsg[62]['message']) != true)
        return false;
    if (input_check('flight_date', '渡航予定日') != true)
        return false;
    if (date_check('flight_date', '渡航予定日') != true)
        return false;
    if (input_check('departure_place', jsmsg[63]['message']) != true)
        return false;
    if (input_check('destination_place', jsmsg[64]['message']) != true)
        return false;
    if (input_check('age', jsmsg[65]['message']) != true)
        return false;
    if (numeric_check('age', jsmsg[65]['message']) != true)
        return false;
    return true;
}

function passport_check() {
    fileCheck = $("#file-input").val().length;
    // 値が無ければボタンを非表示
    if (fileCheck <= 0) {
        alert(jsmsg[53]['message']);
        return false;
    }

    return true;
}

function upload_check() {
    fileCheck = $("#file-input").val().length;
    // 値が無ければボタンを非表示
    if (fileCheck <= 0) {
        alert(jsmsg[53]['message']);
        return false;
    }

    return true;
}

function stepchart_check() {
    if ($('[name=separate_flag]:checked').val() == 1 && ($('[name=detail_flag]:checked').val() == 1)) {
        alert('親ページになれるのは片方のコンテンツのみです。');
        return false;
    }

    if ($('[name=separate_flag]:checked').val() == 1 || ($('[name=detail_flag]:checked').val() == 1)) {
        if (input_check('separate_number', '詳細ページ番号') != true) return false;
        if (numeric_check('separate_number', '詳細ページ番号') != true) return false;
    }

    if (textarea_check('description', 'ステップチャート文言') != true) return false;

    return true;
}

function createstepchart_check() {
    if (input_check('major_item', '大項目名') != true) return false;
    if ($('[name=separate_flag]:checked').val() == 1 && ($('[name=detail_flag]:checked').val() == 1)) {
        alert('親ページになれるのは片方のコンテンツのみです。');
        return false;
    }

    if ($('[name=separate_flag]:checked').val() == 1 || ($('[name=detail_flag]:checked').val() == 1)) {
        if (input_check('separate_number', '詳細ページ番号') != true) return false;
        if (numeric_check('separate_number', '詳細ページ番号') != true) return false;
    }

    if (textarea_check('description', 'ステップチャート文言') != true) return false;

    return true;
}

function language_check() {
    if(input_check('message', 'message') != true) return false;
    return true;
}

function staffcomment_check() {
    if (textarea_check('memo', jsmsg[50]['message']) != true)
        return false;
    if (textarea_number('memo', jsmsg[50]['message'], 500) != true)
        return false;
    return true;
}

function expiration_check() {
    if (input_check('expiration_date', '作業期限日') != true)
        return false;

    if (date_check('expiration_date', '作業期限日') != true)
        return false;

    return true;
}

function nextstep_check() {
    if (input_check('step_name', '次のステップ') != true)
        return false;
    if (input_check('step_exposition_short', 'ステップ説明') != true)
        return false;
    if (input_check('preparation', '必要なもの') != true)
        return false;

    return true;
}

function school_check() {
    if (input_check('school_id', 'ログインID') != true) return false;
    if (input_check('school_name', '学校名(短縮)') != true) return false;
    if (input_check('school_full_name', '学校名') != true) return false;
    if (input_check('charge_name', '担当者名') != true) return false;
    if (input_check('email', 'email') != true) return false;
    if (email_check('email', 'email') != true) return false;

    return true;
}

function airport_check() {
    if (input_check('country_name', '国名') != true) return false;
    if (input_check('japanese_name', '日本語名') != true) return false;
    if (input_check('hiragana', 'ひらがな名') != true) return false;
    if (input_check('english_name', '英語名') != true) return false;

    return true;
}