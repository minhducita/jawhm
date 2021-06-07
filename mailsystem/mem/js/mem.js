function allowsDisplayInput(e) {
    var value = jQuery(e).val();
    if (value == 'other') {
        var html = '';
        html += '<div class="form-group" id="order">'
            +     '<label for="">&nbsp;</label>'
            +     '<input type="text" id="cat_other" name="cat_other">'
            + '</div>';
        jQuery('form .cat_list').after(html);
    } else {
        jQuery('form div#order').remove();
    }
}
function resetValueForm(form) {
    jQuery(form).find('.messages').html('');
    jQuery(form).find('select').val('');
    jQuery(form).find('input[name="cat_order"]').val('');
    jQuery(form).find('input[name="onShow"][value="1"]').attr('checked', true);
    jQuery(form).find('textarea[name="comment"]').val('');
}
function reloadFeedbackRow(id)
{
    jQuery.post('', {act:'find_by_id',id: id}, function(data){
        var json = JSON.parse(data);
        var row = jQuery('tr[id="id-'+id+'"]');
        if (json) {
            jQuery(row).find('td').eq(0).find('a').attr('onclick', 'editPopup('+id+','+data+')');
            jQuery(row).find('td').eq(1).html(json.comment.substr(0,30)+'...');
            if (json.onShow == 1) {
                jQuery(row).find('td').eq(2).html('<img src="'+base_url+'images/button_submit.png" style="padding: 0 6px">');
            } else {
                jQuery(row).find('td').eq(2).html('<img src="'+base_url+'images/button_cancel.png" style="padding: 0 6px">');
            }
            jQuery(row).find('td').eq(3).text(json.category_name);
        }

    });
}

function editPopup(id, item) {
    var html ='';
    html += '<div id="feed_item_'+id+'" class="white_content">'
        + '<a class="btnClose" href="javascript:void(0)" onclick ="document.getElementById(\'feed_item_'+id+'\').style.display=\'none\';document.getElementById(\'fade\').style.display=\'none\'">X</a>'
        + '<form class="PPsearch" action="'+base_url+'main/feedback" method="post" id="feedback_form_'+id+'">'
        + '<div class="form-group messages"></div>'
        + '<div class="form-group cat_list">'
        + '<label for="">分類</label>'
        + '<input id="category_name" type="text" name="category_name" size="20" value="'+item.category_name+'">'
        + '</div>'
        + '<div class="form-group">'
        + '<label for="">表示</label>'
        + '<input class="radio" type="radio" name="onShow" value="1" '+(item.onShow == 1 ? 'checked' : '')+'> Yes'
        + '<input class="radio" type="radio" name="onShow" value="0" '+(item.onShow == 0 ? 'checked' : '')+'> No'
        + '</div>'
        + '<div class="form-group">'
        + '<label for="">フィードバック</label>'
        + '<textarea name="comment" id="comment">'+item.comment.replace(/<br\/>/gi, "\r\n")+'</textarea>'
        + '</div>'
        + '<hr class="mt20">'
        + '<div class="form-group mt20" style="text-align: right;">'
        + '<input type="hidden" name="id" value="'+id+'">'
        + '<input type="hidden" name="old_category_name" value="'+item.category_name+'">'
        + '<input type="hidden" name="act" value="update">'
        + '<button type="button" class="btn btnReset" onclick ="document.getElementById(\'feed_item_'+id+'\').style.display=\'none\';document.getElementById(\'fade\').style.display=\'none\'"><span class="btnDel"></span><span class="text">やめる<span></button> '
        + '<button type="submit" class="btn"><span class="btnCheck"></span><span class="text">登録<span></button>'
        + '</div>'
        + '</form>'

        + '</div>';
    jQuery('body #include-editPopup').html(html);
    document.getElementById("feed_item_"+id).style.display="block";document.getElementById("fade").style.display="block";
    jQuery(document).ready(function(){
        formValidation('form#feedback_form_'+id);
    });
}


function formValidation(form) {
    have_error = true;
    jQuery(form).validate({
        rules: {
            category_name: {
                required: true
            },
            cat_other : {
                required: true,
                checkExitsCategory: true
            },
            comment   : "required"
        },
        messages: {
            category_name: {
                required: "Category can not be blank."
            },
            cat_other: {
                required: "Category Other can not be blank."
            },
            comment   : "Comment can not be blank."
        },
        submitHandler: function(f) {
            jQuery.ajax({
                url: "",
                type : "post",
                data : f.serialize(),
                success: function(data) {
                    var json = JSON.parse(data);
                    var html = '';
                    if (json.status) {
                        if (json.act == 'create') {
                            html = '<div class="alert alert-success">Create success.</div>';
                        } else if(json.act == 'update') {
                            html = '<div class="alert alert-success">Update success.</div>';
                            //repacle row value search on update
                            var id = jQuery(f).find('input[name="id"]').val();
                            reloadFeedbackRow(id);
        }
                    } else {
                        if (json.act == 'create') {
                            html = '<div class="alert alert-error">Create error!Please try again.</div>';
                        } else if(json.act == 'update') {
                            html = '<div class="alert alert-error">Update error!Please try again.</div>';

                        }
                    }
                    jQuery(f).find('.messages').html(html);
                    setTimeout(function(){
                        jQuery(f).parent().find('.btnClose').trigger('click');
                        resetValueForm(f);
                    },1000);

                },
                error: function() {
                    var html = '<div class="alert alert-error">Have error!Please try again.</div>';
                    form.find('.messages').html(html);
                    form.find('.btnClose').trigger('click');
                }
    });
           return false;
        }

    });
    jQuery.validator.addMethod("checkExitsCategory", function(value, element) {
        jQuery.ajax({
            url: "",
            type: "post",
            data: {cat_other: value, act:'check-category'},
            success: function(data) {
                if (data == 1) {
                    have_error =  false;
                } else {
                    have_error =  true;
                }
            },
            error: function(data) {
                have_error = true;
            }
        });
        window.setTimeout("", 1500);
        return have_error;
    }, 'Category already exists.');
}
