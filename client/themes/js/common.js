function input_check(name, input) {
	if ($('*[name='+name+']').val() === '') {
	    alert(input+'が空白です。');
	    return false;
	} else {
		return true;
	}
}

function email_check(name, input) {
	if(!$('*[name='+name+']').val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
		alert(input+'の形式が正しくありません。');
		return false;
	} else {
		return true;
	}

}

function change_check(name, name2, input) {
	if ($('*[name='+name+']').val() === $('*[name='+name2+']').val()) {
		alert(input+'が変更されていません。');
		return false;
	} else {
		return true;
	}

}

function equal_check(name1, name2, input) {
	if ($('*[name='+name1+']').val() != $('*[name='+name2+']').val()) {
		alert(input+'が一致しません。');
		return false;
	}
	return true;
} 

function textarea_check(name, input) {
	if ($('#'+name).val().length == 0) {
	    alert(input+'が空白です。');
	    return false;
	} else {
		return true;
	}
}

function numeric_check(name, input) {
	if ($.isNumeric($('*[name='+name+']').val().replace(/%/g, '')) === false) {
	    alert(input+'が数値ではありません。');
	    return false;
	}
	return true;
}

function escape_check(name, input) {
	for(var i = 0; i < $('*[name='+name+']').val().length; i++) {
		var len = escape($('*[name='+name+']').val().charAt(i)).length;
		if(len >= 4) {
			alert(input+'に日本語入力は禁止です。');
			return false;
		}
	}

	return true;
}

function load_player(json_raw) {
	// 要素数を取得
	var elementNum = 0;
	for (i in json_raw){
		elementNum++;
	}

	var row = elementNum;
    var player_name = new Array(row);
    var player_data = new Array();
    
    for (var i=0; i<row; i++){
       	player_name[i] = json_raw[i]['player_name'];
       	player_data[i] = [json_raw[i]['player_name'],
       					json_raw[i]['rate'],
       					json_raw[i]['player_id'],
       					json_raw[i]['warn_flag']];
    }
    
    player = new Array(player_name, player_data);
    return player;
}

function report_check(action, team, id, start_time, end_time, option, token, action_tag) {
	jConfirm('チーム'+team+'の勝利を報告します。', '確認', function(r) {
        if (r === true) {
        	var data = new Array;
        	data = {'game_id': id, 'win_team': team, 'created_on': start_time, 'end_time': end_time, 'option': option, 'token': token, 'action_tag': action_tag};
        	
        	submit_action('report', data, null);
        	return false;
        } else {
            jAlert('はい。', '結果');
        }
        
    });
}

function inputCheck(){
	fileCheck = $("#file-input").val().length;

	//値が無ければボタンを非表示
	if(fileCheck == 0){
		$("#fileCheck").attr("disabled","disabled");
	}else{
		$("#fileCheck").attr("disabled",false);
	}
}

function set_rate(row, player_data){
	$('*[name=rate'+row+']').val('');
	$('*[name=player_id'+row+']').val('');
	$('*[name=warn_flag'+row+']').val('');
	$.each(player_data, function(idx, obj){
		if($('*[name=player_name'+row+']').val() === player_data[idx][0]){
			$('*[name=rate'+row+']').val(player_data[idx][1]);
			$('*[name=player_id'+row+']').val(player_data[idx][2]);
			if(player_data[idx][3] == 1){
				$('*[name=player_name'+row+']').addClass("text-red");
			} else {
				$('*[name=player_name'+row+']').removeClass("text-red");
			}
			return false;
		}
	});
} 

function sum_rate(player_data){
	var team1_rate = 0;
	var team2_rate = 0;
	for (var i=9; i<=16; i++){
		if(i % 2 != 0){
			if($.isNumeric(parseInt($('*[name=rate'+i+']').val())) === true){
				team1_rate = team1_rate + parseInt($('*[name=rate'+i+']').val());
			}
		} else {
			if($.isNumeric(parseInt($('*[name=rate'+i+']').val())) === true){
				team2_rate = team2_rate + parseInt($('*[name=rate'+i+']').val());
			}
		}
	}

	$('*[name=team1_sum]').val(team1_rate);
	$('*[name=team2_sum]').val(team2_rate);
}

function htmlEscape(s){
    var obj = document.createElement('pre');
    if (typeof obj.textContent != 'undefined') {
        obj.textContent = s;
    } else {
        obj.innerText = s;
    }
    return obj.innerHTML;
}

function submit_action(url, data, mode) {
	$.ajax({
		type: 'POST',
		url: url,
		data: data,
		dataType: 'html',
		timeout: 10000,  // 単位はミリ秒

		// 送信前
		beforeSend: function(xhr, settings) {
			// ボタンを無効化し、二重送信を防止
			$("*[type=submit]").attr('disabled', true);
		},
		// 応答後
		complete: function(xhr, textStatus) {
			// ボタンを有効化し、再送信を許可
			$("*[type=submit]").attr('disabled', false);
		},

		success: function (data, dataType) {
			// separated from caller's argument
			switch (mode) {
				case 'delete':
					jAlert('削除されました。', '結果');
			        location.reload();
			        break;

				case 'revert':
					jAlert('復元されました。', '結果');
			        location.reload();
			        break;

				case 'rewrite':
					$("#"+url).html(data);
					break;

				case 'refresh':
					var target_url = null;
					if(url.indexOf('/') != -1){
						var temp_url = url.split('/');
						var is_controller = false;
						$.each( temp_url, function(){
							if(is_controller == true){
								target_url = this; 
							}
							if(this == 'index'){
								is_controller = true;
							}
						});
						if(target_url == null){
							target_url = temp_url[1];
						}
					} else {
						target_url = url;
					}
					$("#"+target_url).html(data);
					break;

				case 'gatdata':
					$("#data-container").html(data);
					break;

			    default:
			    	$("#window-container").html(data);
			       	break;
				}
		},
		error: function ( XMLHttpRequest, textStatus, errorThrown ) {
			this;
			alert('Error : ' + errorThrown);
	    }
	});
};