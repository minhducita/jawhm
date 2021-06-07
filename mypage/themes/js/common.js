function input_check(name, input) {
    if ($('*[name=' + name + ']').val() === '') {
        alert(input + jsmsg[0]['message']);
        return false;
    } else {
        return true;
    }
}

function email_check(name, input) {
    if (!$('*[name=' + name + ']').val().match(/.+@.+\..+/g)) {
        alert(input + jsmsg[1]['message']);
        return false;
    } else {
        return true;
    }

}

function zip_check(name, input) {
    if (!$('*[name=' + name + ']').val().match(/^\d{3}(\s*|-)\d{4}$/)) {
        alert(input + jsmsg[1]['message']);
        return false;
    } else {
        return true;
    }
}

function date_check(datetime, message) {
    var tmp_date = $('*[name=' + datetime + ']').val();
    var date = tmp_date.replace(/T/g," ").split(' ')[0];

    if (date != null) {
        if (dateValidate(date) != true) {
            alert(message + jsmsg[2]['message']);
            return false;
        }

    } else {
        alert(message + jsmsg[2]['message']);
        return false;
    }

    return true;
}

function time_check(datetime, message) {
    var tmp_time = $('*[name=' + datetime + ']').val();
    var tmp2_time = tmp_time.replace(/T/g," ").split(' ')[1];
    var tmp3_time = tmp2_time.split('.')[0];
    var tmp4_time = tmp3_time.split(':');
    var time = tmp4_time[0]+':'+tmp4_time[1];

    if (time === undefined) {
        alert(jsmsg[3]['message']);
        return false;
    }

    if (timeValidate(time) != true) {
        alert(message + jsmsg[4]['message']);
        return false;
    }
    return true;
}

function change_check(name, name2, input) {
    if ($('*[name=' + name + ']').val() === $('*[name=' + name2 + ']').val()) {
        alert(input + jsmsg[5]['message']);
        return false;
    } else {
        return true;
    }

}

function equal_check(name1, name2, input) {
    if ($('*[name=' + name1 + ']').val() != $('*[name=' + name2 + ']').val()) {
        alert(input + jsmsg[6]['message']);
        return false;
    }
    return true;
}

function length_check(name, input, len) {
    if ($('*[name='+name+']').val().length < len) {
    alert(input+jsmsg[7]['message']+len+jsmsg[8]['message']);
    return false;
    }
    return true;
    }


function textarea_check(name, input) {;
    if ($('*[name=' + name + ']').val().length == 0) {
        alert(input + jsmsg[0]['message']);
        return false;
    } else {
        return true;
    }
}

function textarea_number(name, input, number) {
    var thisValueLength = $('*[name=' + name + ']').val().length;
    if (thisValueLength > number) {
        alert(input + jsmsg[7]['message'] + number + jsmsg[9]['message']);
        return false;
    } else {
        return true;
    }
}

function numeric_check(name, input) {
    if ($.isNumeric($('*[name=' + name + ']').val().split(',').join('').replace(/%/g, '')) === false) {
        alert(input + jsmsg[10]['message']);
        return false;
    }
    return true;
}

function escape_check(name, input) {
    for (var i = 0; i < $('*[name=' + name + ']').val().length; i++) {
        var len = escape($('*[name=' + name + ']').val().charAt(i)).length;
        if (len >= 4) {
            alert(input + jsmsg[11]['message']);
            return false;
        }
    }

    return true;
}

function telnum_check(name, input) {
    if (!$('*[name='+ name + ']').val().match(/^[0-9\-]+$/)) {
        alert(input + jsmsg[1]['message']);
        return false;
    }

    return true;
};



function inputCheck(input) {
    var fileCheck = $("#file-input").val().length;
    // 値が無ければボタンを非表示
    if (fileCheck <= 0) {
        $('#'+input).prop('disabled', true);
    } else {
        $('#'+input).prop("disabled", false);

    }

    return true;
}

function search_submit(tpl, module) {
    var $form = $('#'+module+'-search');
    var data = $form.serializeArray();

    submit_action(tpl, data, 'refresh');
}

function addComma(str, is_decimal) {
    var temp = String(str).split(".");
    var integer = temp[0];
    var decimal = "00";
    if (temp.length >= 2) {
        decimal = temp[1];
    }

    var comma = integer.toString().replace(/(\d)(?=(\d\d\d)+$)/g ,"$1,");
    var num;
    if (is_decimal) {
        num = comma+"."+decimal;
    } else {
        num = comma;
    }
    return num;
}

function addDay(dt, day) {
    var dateOffset = (24 * 60 * 60 * 1000) * day;
    var dtNew = new Date();
    dtNew.setTime(dt.getTime() + dateOffset);
    return dtNew;
}

function faceDetect(id, smp) {
    var coords = null;
    if (smp == 1) {
        coords = $('#'+id).faceDetection({
            complete: function(face) {
                console.log(face);
            },
            error: function(img, code, message) {
                alert('Error: '+message);
            }
        });

    } else {
        $('#'+id).faceDetection({
            complete: function(face) {
                coords = face;
            },
            error: function(img, code, message) {
                alert('Error: '+message);
                coords = null;
            }
        });
    }

    return coords;
}

function htmlEscape(s) {
    var obj = document.createElement('pre');
    if (typeof obj.textContent != 'undefined') {
        obj.textContent = s;
    } else {
        obj.innerText = s;
    }
    return obj.innerHTML;
}

$('.combo_select').change(function() {
    currentCombo = $(this).parents('.combo_wrapper');
    $('.combo_text', currentCombo).val($('.combo_select', currentCombo).val());
    $('.combo_select', currentCombo).blur();
});

function submit_action(url, input_data, mode) {
    jQuery.support.cors = true;
    loadingView(true);
    if (mode === 'new') {
        var w = window.open('', '_blank'); // ← ここでウィンドウ開いていおく
    }

    $.ajax({
        type : 'POST',
        url : url,
        data : input_data,
        dataType : 'html',
        timeout : 360000, // 単位はミリ秒

        // 送信前
        beforeSend : function(xhr, settings) {
            // ボタンを無効化し、二重送信を防止
            $("*[type=button]").attr('disabled', true);
        },
        // 応答後
        complete : function(xhr, textStatus) {
            // ボタンを有効化し、再送信を許可
            $("*[type=button]").attr('disabled', false);
        }
    }).done(function(data, dataType) {
            // separated from caller's argument
            switch (mode) {
            case 'save':
                alert(jsmsg[12]['message']);
                loadingView(false);
                break;

            case 'rewrite':
                var target_url = null;
                if(url.indexOf('/') != -1){
                    var temp_url = url.split('/');
                    target_url = temp_url[temp_url.length-1];
                } else {
                    target_url = url;
                }
                $("#" + target_url).html(data);
                loadingView(false);
                break;

            case 'refresh':
                loadingView(true);
                var target_url = null;
                if(url.indexOf('/') != -1){
                    var temp_url = url.split('/');
                    target_url = temp_url[temp_url.length-1];
                } else {
                    target_url = url;
                }
                $("#" + target_url).html(data);

                break;

            case 'getdata':
                $("#data-container").html(data);
                loadingView(false);
                break;

            case 'move':
                if (window.history && window.history.pushState){
                    state = document.title;
                    history.pushState(state, "", url);
                    location.reload();
                }
                $("#page-container").html(data);
                break;

            case 'transition':
                loadingView(false);
                if (window.history && window.history.pushState){
                    state = document.title;
                    history.pushState(state, "", url);
                }
                $("#page-container").html(data);
                break;

            case 'temp':
            case 'auto':
                loadingView(false);
                break;

            case 'new':
                loadingView(false);
                w.prepend(data);
                break;

            case 'append':
                loadingView(false);
                $('*[id='+input_data['append']+'_'+input_data['no']+']').html(data);
                break;

            case 'append_memo':
                loadingView(false);
                $('*[id='+input_data['append']+']').html(data);
                break;

            case 'none':
                loadingView(false);
                break;

            default:
                $("#window-container").html(data);
                loadingView(false);
                break;
            }
        }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
            //console.log( textStatus  + errorThrown);
        });
};

function submit_file(url, input_data, mode) {
    loadingView(true);
    $.ajax({
        type : 'POST',
        processData: false,
        contentType: false,
        url: url,
        data : input_data,
        dataType : 'html',
        timeout : 360000, // 単位はミリ秒

        // 送信前
        beforeSend : function() {
            // ボタンを無効化し、二重送信を防止
            $("*[type=button]").attr('disabled', true);
        },
        // 応答後
        complete : function() {
            // ボタンを有効化し、再送信を許可
            $("*[type=button]").attr('disabled', false);
            loadingView(false);
        },
        success : function(data) {
            $("#window-container").html(data);
            return false;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)  {
            alert( "ERROR" );
            alert( textStatus );
            alert( errorThrown );
        }
    });
    return false;
};

function loadingView(flag) {
      $('#loading-view').remove();
      if(!flag) return;
      $('<div id="loading-view" />').appendTo('body');
      }