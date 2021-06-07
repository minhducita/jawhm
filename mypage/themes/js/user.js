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
        
        if(document.URL.match(/..jawhmlogin/)) {
        	$('#jawhm_login').click(function(){
        	    if (jawhm_login_check() != true) return false;
        	    
        	    var $form = $('#login-jawhm');
        		var data = $form.serializeArray();
        		submit_action('jawhmauth', data, 'refresh');
        	});
        	
        	$('#login-jawhm').keypress(function(e) {
        		if (e.which == 13) {
	        	    if (jawhm_login_check() != true)
	        	    return false;
	        	    
	        	    var $form = $('#login-jawhm');
	        		var data = $form.serializeArray();
	        		submit_action('jawhmauth', data, 'refresh');
        		}
        	});
        	
        	$('#forget_password').click(function(){
        	    submit_action('forgetpassword', null, null);
        	    $('#modal-window').modal();
        	    return false;
        	});
        	
        	$('#forget_email').click(function(){
        	    submit_action('forgetloginemail', null, null);
        	    $('#modal-window').modal();
        	    return false;
        	});
        }
        
        if(document.URL.match(/..firstonly/)) {
        	$('#client_insert').click(function(){
        		if (client_check() != true) return false;
        		
        		var $form = $('#insert_client');
        	    var data = $form.serializeArray();
        	    submit_action('emailcheck', data, 'rewrite');
        	});
        	
        }
        
        if(document.URL.match(/..seminar/)) {
        	 $("[id^=seminar_detail]").click(function() {
        		 var id = {'id': $(this).attr("name")};
        		 submit_action('seminardetail', id, null);
        		 $('#modal-window').modal();
        		 return false;
	         });
        }
        
        if(document.URL.match(/..member/)) {
        	if(document.URL.match(/..index/)) {
        		$("#password_edit").click(function() {
	        		 submit_action('changepassword', null, null);
	        		 $('#modal-window').modal();
	        		 return false;
		         });
        	}
        	if(document.URL.match(/..email/)) {
	        	$("[id^=change_email]").click(function() {
	        		 submit_action('changeemail', null, null);
	        		 $('#modal-window').modal();
	        		 return false;
		         });
	        	
	        	$("[id^=delemail]").click(function() {
	        		 var mail_id = $(this).attr("id").split("_");
	        		 data = {'email_id': mail_id[1]};
	        		 submit_action('delemail', data, null);
	        		 $('#modal-window').modal();
	        		 return false;
		         });
	        	
	        	$("[id^=change_key]").click(function() {
	        		 var mail_id = $(this).attr("id").split("_");
	        		 data = {'email_id': mail_id[2]};
	        		 submit_action('changekey', data, null);
	        		 $('#modal-window').modal();
	        		 return false;
		         });
	        	
	        	$("[id^=sendemail]").click(function() {
	        		var mail_id = $(this).attr("id").split("_");
	        		data = {'id': mail_id[1]};
	        		submit_action('emailresend', data, null);
	        		$('#modal-window').modal();
	        		return false;
	        	});
	        	
	        	$("[id^=email_edit]").click(function() {
	        		var mail_id = $(this).attr("id").split("_");
	        		data = {'email_id': mail_id[2],
	        				'id': mail_id[3]};
	        		submit_action('changeemailstatus', data, null);
	        		$('#modal-window').modal();
	        		return false;
	        	});
	        	
        	}
        	
        	if(document.URL.match(/..addresslist/)) {
	        	$("[id^=change_address]").click(function() {
	        		 var address_id = $(this).attr("id").split("_");
	        		 data = {'id': address_id[2]};
	        		 submit_action('changeaddress', data, null);
	        		 $('#modal-window').modal();
	        		 return false;
		         });
        	}
        }
        
        if(document.URL.match(/..agreement/)) {
        	$("#agree-submit").click(function() {
        		if(agree_check() != true) return false;
        		if(sign_check() != true) return false;
        		var $form = $('#agree');
        	   	var data = $form.serializeArray();
        		submit_action('savesignature', data, null);
            });
        }
        
        if(document.URL.match(/..achievement/)) {
    		$("[id^=abroad]").click(function() {
        		var abroad = $(this).attr("id").split("_");
           		var data = {'abroad': abroad[1],
           					'url': abroad[2],
           					'rewrite': true};
        		submit_action('status', data, 'move');
    		});
        }
        
        if(document.URL.match(/..depositlist/)) {
        	$("[id^=changedeposit]").click(function() {
        		var deposit_id = $(this).attr("id").split("_");
           		var data = {'id': deposit_id[1],
           					'client': deposit_id[2]};
        		submit_action('changedeposit', data, null);
        		$('#modal-window').modal();
            });
        }
        
        if(document.URL.match(/..flightlist/)) {
        	$("[id^=changeflight]").click(function() {
       		var flight_id = $(this).attr("id").split("_");
       		var data = {'id': flight_id[1]};
        		submit_action('changeflight', data, null);
        		$('#modal-window').modal();
            });
        	
        	$("[id^=deleteflight]").click(function() {
        		var flight_id = $(this).attr("id").split("_");
           		var data = {'id': flight_id[1],
           					'flight_number': flight_id[2]};
            		submit_action('flightdelconfirm', data, null);
            		$('#modal-window').modal();
            });
        }
        
        if(document.URL.match(/..insurancelist/)) {
        	$("[id^=changeinsurance]").click(function() {
        		var insurance_id = $(this).attr("id").split("_");
        		var data = {'branch_no': insurance_id[1]};
        		submit_action('changeinsurance', data, null);
        		$('#modal-window').modal();
            });
        	
        	$("[id^=deleteinsurance]").click(function() {
        		var insurance_id = $(this).attr("id").split("_");
           		var data = {'branch_no': insurance_id[1],
           					'policy_number': insurance_id[2],
           					'insured_date_st': insurance_id[3],
           					'insured_date_ed': insurance_id[4]};
           		
        		submit_action('insurancedelconfirm', data, null);
        		$('#modal-window').modal();
            });
        }
        
        if(document.URL.match(/..insenglist/)) {
        	$("[id^=showinsurance]").click(function() {
        		var insurance_id = $(this).attr("id").split("_");
        		var data = {'branch_no': insurance_id[1]};
        		submit_action('makepolicy', data, null);
            });
        }
        
        
        if(document.URL.match(/..visalist/)) {
        	$("[id^=changevisa]").click(function() {
        		var abroad = $(this).attr("id").split("_");
           		var data = {'branch_no': abroad[1]};
        		submit_action('changevisa', data, null);
        		$('#modal-window').modal();
        	});
        	
        	$("[id^=deletevisa]").click(function() {
        		var visa_id = $(this).attr("id").split("_");
           		var data = {'branch_no': visa_id[1],
           					'visa_number': visa_id[2]};
           		
        		submit_action('visadelconfirm', data, null);
        		$('#modal-window').modal();
            });
        	
        	$("[id^=selins]").click(function() {
        		var visa_id = $(this).attr("id").split("_");
        		var data = {'branch_no': visa_id[1]};
        		submit_action('selectinsurance', data, null);
        		$('#modal-window').modal();
            });
        }
        
        if(document.URL.match(/..selectschool/)) {
        	$("[id^=selins]").click(function() {
	        	var country = $(this).attr("id").split("_");
	    		var data = {'country': country[1]};
	    		submit_action('selectinsvisa', data, null);
	    		$('#modal-window').modal();
        	});
        	
        	$("[id^=forparents]").click(function() {
	        	var country = $(this).attr("id").split("_");
	    		var data = {'country': country[1]};
	    		submit_action('forparents', data, null);
	    		$('#modal-window').modal();
        	});
        }
        
        	
        if(document.URL.match(/..talk/)) {
        	if(document.URL.match(/..index/)) {
	        	$("[id^=changetalk]").click(function() {
	        		var talk_id = $(this).attr("id").split("_");
	           		var data = {'id': talk_id[1]};
	           		mode = 'change';
	        		submit_action('changetalk', data, null);
	        		$("#modal-window").modal();
	        	});
	        	
	        	$("[id^=deltalk]").click(function() {
	        		var talk_id = $(this).attr("id").split("_");
	           		var data = {'id': talk_id[1],
	           					'time': talk_id[2]};
	           		mode = 'delete';
	        		submit_action('talkdelconfirm', data, null);
	        		$("#modal-window").modal();
	        	});
        	
        	}
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