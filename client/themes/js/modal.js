$('#email_update').click(function(){
	if (change_email_check() != true) return false;
	var $form = $('#edit-email');
   	var data = $form.serializeArray();
   	submit_action('emailconfirm', data, null);
});

$("#delete_ok").click(function(){
	var $form = $('#edit-email');
   	var data = $form.serializeArray();
	submit_action('delcmpemail', data, null);
});

$("#change_ok").click(function(){
	var $form = $('#edit-email');
   	var data = $form.serializeArray();
	submit_action('chkcmpkey', data, null);
});

$("#reload").click(function(){
	reload();
});

$("#email_delete").click(function(){
	if (delete_email_check() != true) return false;
	var $form = $('#delete-email');
   	var data = $form.serializeArray();
   	submit_action('deleteunconfirm', data, null);
});

$("#email_resend").click(function(){
	if (resend_email_check() != true) return false;
	var $form = $('#resend-email');
   	var data = $form.serializeArray();
   	submit_action('unconfirmcheck', data, null);
});

function change_email_check(member){
	if(input_check('change_email', 'メールアドレス') != true) return false;
	if(change_check('change_email', 'originai_email', 'メールアドレス') != true) return false;
	if(input_check('retype', '確認用メールアドレス') != true) return false;
	if(email_check('change_email', 'メールアドレス') != true) return false;
	if(equal_check('change_email', 'retype', 'メールアドレス') != true) return false;
	return true;
}

function reload(){
	location.reload();
}

function delete_email_check(member){
	if(input_check('target_email', 'メールアドレス') != true) return false;
	if(email_check('target_email', 'メールアドレス') != true) return false;
	return true;
}

function resend_email_check(member){
	if(input_check('resend_email', 'メールアドレス') != true) return false;
	if(email_check('resend_email', 'メールアドレス') != true) return false;
	return true;
}