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
        	if(document.URL.match(/..email/)) {
	        	$("[id^=change_email]").click(function() {
	        		 submit_action('changeemail', null, null);
	        		 $('#modal-window').modal();
	        		 return false;
		         });
	        	
	        	$("[id^=delete_email]").click(function() {
	        		 var mail_id = $(this).attr("id").split("_");
	        		 data = {'email_id': mail_id[2]};
	        		 submit_action('deleteemail', data, null);
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
	        	
	        	$("#delemail").click(function() {
	        		submit_action('delemail', null, null);
	        		$('#modal-window').modal();
	        		return false;
	        	});
	        	
	        	$("#sendemail").click(function() {
	        		submit_action('emailresend', null, null);
	        		$('#modal-window').modal();
	        		return false;
	        	});
        	}
        }
        
        if(document.URL.match(/..playerdetail/)) {
        	$("#update_comment").click(function() {
        		//event.preventDefault();
        		if(playername_check('writer_name', playerlist, 'お名前') != true) return false;
        		if(input_check('comment', 'コメント内容') != true) return false;
        		
        		var $form = $('#insert_comment');
        	    var data = $form.serializeArray();
        	    data[data.length] = {'name':'player_id', 'value': player_id};
        	    var url = null;
        	    if(document.URL.match(/..user/)) {
        	    	url = '../../../../../index/commentupdate';
        	    } else {
        	    	url = '../../../../../player/commentupdate';
        	    }
        		submit_action(url, data, 'insert');
                return false;
            });
        	
        	$(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', '../../../../../../user/player/comment', 'delete', id, 'コメント');
            });
        	        	
        }
        
        if(document.URL.match(/..about/)) {
        	$("#about").click(function() {
        		toggle_contents("about_div");
            });
        	
        	$("#macros").click(function() {
        		toggle_contents("macros_div");
            });
        	
        	$("#playerunknown").click(function() {
        		toggle_contents("playerunknown_div");
            });
        	
        	$("#advertisement").click(function() {
        		toggle_contents("advertisement_div");
            });
        }
        
        if(document.URL.match(/..user/)) {
        	if(document.URL.match(/..index/) && !document.URL.match(/..playerdetail/)) {
	        	$(function() {
	        		$('*[name=search_player_name]').val('');
	        		$('*[name=search_rate_up]').val('');
	        		$('*[name=search_rate_down]').val('');
	        		$('*[name=search_game_number]').val('');
	        		search_submit('index/editlist');
	        	});
	        	$("#search_reset").click(function() {
	        		$('*[name=search_player_name]').val('');
	        		$('*[name=search_rate_up]').val('');
	        		$('*[name=search_rate_down]').val('');
	        		$('*[name=search_game_number]').val('');
	                window.location = "index";
	            });

	        	$("#search_submit").click(function() {
	        		if(escape_check('search_player_name', 'プレイヤー名') != true) return false;
	        		if ($('*[name=search_rate_up]').val() != ''){
	        			if(numeric_check('search_rate_up', '最低レート') != true) return false;
	        		}
	        		if ($('*[name=search_rate_down]').val() != ''){
	        			if(numeric_check('search_rate_down', '最高レート') != true) return false;
	        		}
	        		if ($('*[name=search_game_number]').val() != ''){
	        			if(numeric_check('search_game_number', '最低ゲーム数') != true) return false;
	        		}
	                search_submit('index/editlist');
	                return false;
	            });	
        	}
        	
        	if(document.URL.match(/..gamemanage/)) {
	        	$("a#report").click(function(){
	        		submit_action('userreport', {'gamelog_id': $(this).attr('name')}, 'gatdata');
	        		$('#game-report').modal();
	        	});
        	}
        }
        
        if(document.URL.match(/..playerdeleted/)) {
        	$(function() {
        		$('*[name=search_player_name]').val('');
        		$('*[name=search_rate_up]').val('');
        		$('*[name=search_rate_down]').val('');
        		$('*[name=search_game_number]').val('');
        		search_submit('deletedlist');
        	});
        	$("#search_reset").click(function() {
        		$('*[name=search_player_name]').val('');
        		$('*[name=search_rate_up]').val('');
        		$('*[name=search_rate_down]').val('');
        		$('*[name=search_game_number]').val('');
                window.location = "playerdeleted";
            });
        	
        	$("#search_submit").click(function() {
	        if(escape_check('search_player_name', 'プレイヤー名') != true) return false;
	        if ($('*[name=search_rate_up]').val() != ''){
	        	if(numeric_check('search_rate_up', '最低レート') != true) return false;
	        }
	        if ($('*[name=search_rate_down]').val() != ''){
	        	if(numeric_check('search_rate_down', '最高レート') != true) return false;
	        }
	        if ($('*[name=search_game_number]').val() != ''){
	        	if(numeric_check('search_game_number', '最低ゲーム数') != true) return false;
	        }
                search_submit('deletedlist');
                return false;
            });	
        }
        
        if(document.URL.match(/..commentlist/)) {
            $(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', 'comment', 'delete', id, 'コメント');
            });
        }
        
        if(document.URL.match(/..commentdeleted/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'comment', 'revert', id, 'コメント');
            });
        }
        
        if(document.URL.match(/..userdeleted/)) {
        	$(function() {
        		search_submit('deletedlist');
        	});
        	
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'user', 'revert', id, 'ユーザー');
            });
        }
        
        if(document.URL.match(/..gamemanage/)) {
        	$('[id^=user_cancel]').click(function(){
        		id = $(this).attr('name');
        		usercancel_check('usercancel', id, 'gamemanage');
        	});
        	
        	function usercancel_check(action, id, option) {
        		jConfirm('ゲームをキャンセルしますか?', '確認', function(r) {
        	        if (r === true) {
        	        	var data = new Array;
        	        	data = {'game_id': id, 'option': option};
        	        	submit_action('usercancel', data, 'refresh');
        	        	return false;
        	        } else {
        	            jAlert('はい。', '結果');
        	        }
        	        
        	    });
        	}
        }
        
        if(document.URL.match(/..replaymanage/)) {
        	$(".delete").click(function() {
        		var gamelog_id = $(this).attr('id');
        		var replay_id = $(this).attr('abbr');
        		jConfirm('リプレイを削除しますか?', '確認', function(r) {
        	        if (r === true) {
        	        	var data = new Array;
        	        	data = {'gamelog_id': gamelog_id, 'replay_id': replay_id};
        	        	submit_action('replaydelete', data, 'delete');
        	        	return false;
        	        } else {
        	            jAlert('はい。', '結果');
        	        }
        	        
        	    });
        	});
        }
        
        if(document.URL.match(/..login/)) {
            $(".submit").click(function() {
                if ($("#login_username").val() === "") {
                    alert("ログインユーザー名が空白です。");
                    return false; 
                }
                
                if(login_escape_check('login_username') != true) {
                	return false;
                }
                   
                if ($("#login_password").val() === "") {
                    alert("ログインパスワードが空白です。");
                    return false;
                }
            });
                   
            $(".submit").keypress(function(e) {
                if (e.which == 13) {
                    if ($("#login_username").val() === "") {
                        alert("ログインユーザー名が空白です。");
                        return false;
                    }
                    
                    if(login_escape_check('login_username') != true) {
                    	return false;
                    }
                                      
                    if ($("#login_password").val() === "") {
                        alert("ログインパスワードが空白です。");
                        return false;
                    }
                }
            });
        }
         
        if(document.URL.match(/..userlist/)) {
            $("#search_reset").click(function() {
                window.location = "userlist";
            });
            
            $(".delete").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('削除', 'user', 'delete', id, 'ユーザー');
            });
        }
             
        if(document.URL.match(/..deleteduserlist/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'user', 'revert', id, 'ユーザー');
            });
        }
        
        if(document.URL.match(/..playerupload/)) {
	        $("#file-input").change(function(){
	        	inputCheck();
	        });
        }
        
        if(document.URL.match(/..updatelist/)) {
        	 $("a#update_edit").click(function(){
         		submit_action('updateedit', {'id': $(this).attr('name')}, 'gatdata');
         		$('#update-edit').modal();
         	});
        	 
        	 $(".delete").click(function() {
                 var id = $(this).parent('td').attr('id');
                 delrev_check('削除', 'update', 'delete', id, 'アップデート');
             });
        }
        
        if(document.URL.match(/..deletedupdatelist/)) {
            $(".revert").click(function() {
                var id = $(this).parent('td').attr('id');
                delrev_check('復元', 'update', 'revert', id, 'アップデート');
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

function name_check(member) {
	if(input_check('player_name1', 'プレイヤー1') != true) return false;
	if(input_check('player_name2', 'プレイヤー2') != true) return false;
	if(member >= 3 ) if(input_check('player_name3', 'プレイヤー3') != true) return false;
	if(member >= 4 ) if(input_check('player_name4', 'プレイヤー4') != true) return false;
	if(member >= 5 ) if(input_check('player_name5', 'プレイヤー5') != true) return false;
	if(member >= 6 ) if(input_check('player_name6', 'プレイヤー6') != true) return false;
	if(member >= 7 ) if(input_check('player_name7', 'プレイヤー7') != true) return false;
	if(member >= 8 ) if(input_check('player_name8', 'プレイヤー8') != true) return false;
	return true;
}

function rate_check(member) {
	if(input_check('rate1', 'プレイヤー1') != true) return false;
	if(input_check('rate2', 'プレイヤー2') != true) return false;
	if(member >= 3 ) if(input_check('rate3', 'プレイヤー3') != true) return false;
	if(member >= 4 ) if(input_check('rate4', 'プレイヤー4') != true) return false;
	if(member >= 5 ) if(input_check('rate5', 'プレイヤー5') != true) return false;
	if(member >= 6 ) if(input_check('rate6', 'プレイヤー6') != true) return false;
	if(member >= 7 ) if(input_check('rate7', 'プレイヤー7') != true) return false;
	if(member >= 8 ) if(input_check('rate8', 'プレイヤー8') != true) return false;
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