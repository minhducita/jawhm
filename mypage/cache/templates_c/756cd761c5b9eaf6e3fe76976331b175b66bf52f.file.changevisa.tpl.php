<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:39:40
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/changevisa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121996342955669c0cad7033-96222531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '756cd761c5b9eaf6e3fe76976331b175b66bf52f' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/changevisa.tpl',
      1 => 1420704168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121996342955669c0cad7033-96222531',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'smp' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55669c0cca2398_60201624',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55669c0cca2398_60201624')) {function content_55669c0cca2398_60201624($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">ビザ情報登録</h4>
    </div>

    <div class="modal-body">
        <form id="visa-edit" method="post">
            <fieldset>
                <div class="form-group">
                   <label for="visa_type" class="col-sm-4 control-label">ビザ種別(入力必須)</label>
                   <div class="col-sm-8 combo_wrapper">
                       <button type="button" class="btn combo_arrow">▼</button>
                       <select id="combo_select" class="form-control input-block-level combo_select" name="visa_type_select">
                            <option>手動入力</option>
                            <option>ワーキングホリデー</option>
                            <option>学生</option>
                            <option>観光</option>
                            <option>co-op</option>
                        </select>
                        <div class="combo_div">
                            <input class="input-block-level combo_text form-control input-group" type="text" name="visa_type" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['visa_type'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="visa_number" class="col-sm-4 control-label">ビザ発給番号(入力必須)</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="visa_number" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['visa_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" autofocus>
                    </div>
                </div>

                <div class="form-group">
                       <label for="passport_number" class="col-sm-4 control-label">パスポート番号(入力必須)</label>
                       <div class="col-sm-8">
                         <input class="form-control" type="text" name="passport_number" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['passport_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" size="20">
                    </div>
                </div>

                <div class="form-group">
                       <label for="expected_entrance_date" class="col-sm-4 control-label input-append date">入国予定日</label>
                       <div class="col-sm-8">
                           <div<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?> class="input-group date" id="expected_entrance_date"<?php }?>>
                            <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>date<?php }?>' class="form-control" name="expected_entrance_date" <?php if ($_smarty_tpl->tpl_vars['item']->value['expected_entrance_date']!='null'){?>value="<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['expected_entrance_date'],"%G-%m-%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
                            <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                       <label for="expected_return_date" class="col-sm-4 control-label input-append date">帰国予定日</label>
                       <div class="col-sm-8">
                           <div<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?> class="input-group date" id="expected_return_date"<?php }?>>
                            <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>date<?php }?>' class="form-control" name="expected_return_date" <?php if ($_smarty_tpl->tpl_vars['item']->value['expected_return_date']!='null'){?>value="<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['expected_return_date'],"%G-%m-%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
                            <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                       <label for="arrival_date" class="col-sm-4 control-label input-append date">入国日</label>
                       <div class="col-sm-8">
                           <div<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?> class="input-group date" id="arrival_date"<?php }?>>
                            <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>date<?php }?>' class="form-control" name="arrival_date" <?php if ($_smarty_tpl->tpl_vars['item']->value['arrival_date']!='null'){?>value="<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['arrival_date'],"%G-%m-%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
                            <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                       <label for="visa_expiry_date" class="col-sm-4 control-label input-append date">ビザ有効期限</label>
                       <div class="col-sm-8">
                           <div<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?> class="input-group date" id="visa_expiry_date"<?php }?>>
                            <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>date<?php }?>' class="form-control" name="visa_expiry_date" <?php if ($_smarty_tpl->tpl_vars['item']->value['visa_expiry_date']!='null'){?>value="<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['visa_expiry_date'],"%G-%m-%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
                            <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                       <label for="account_no" class="col-sm-4 control-label">口座番号</label>
                       <div class="col-sm-8">
                        <input class="form-control" type="text" name="account_no" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['account_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                        <span class="help-block">現地銀行の口座番号をご入力いただけます。ご取得されていない等の場合は空白のままでお願いします。</span>
                    </div>
                </div>

                <div class="form-group">
                       <label for="taxfilenumber" class="col-sm-4 control-label">タックスファイルナンバー</label>
                       <div class="col-sm-8">
                        <input class="form-control" type="text" name="taxfilenumber" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['taxfilenumber'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                        <span class="help-block">オーストラリアのみです。ご取得されていない等の場合は空白のままでお願いします。</span>
                    </div>
                </div>

                <div class="form-group">
                       <label for="sin_number" class="col-sm-4 control-label">SINナンバー</label>
                       <div class="col-sm-8">
                        <input class="form-control" type="text" name="sin_number" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['sin_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                        <span class="help-block">カナダのみです。ご取得されていない等の場合は空白のままでお願いします。</span>
                    </div>
                </div>

                <div class="form-group">
                       <label for="national_number" class="col-sm-4 control-label">Nationalナンバー</label>
                       <div class="col-sm-8">
                        <input class="form-control" type="text" name="national_number" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['national_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                        <span class="help-block">UKのみです。ご取得されていない等の場合は空白のままでお願いします。</span>
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                   <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="action_tag" value="visa">
                <input type="hidden" name="branch_no" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="visa_edit" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/moment.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
<script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
<script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script >
<!--
$(function () {
    $('#expected_entrance_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#expected_return_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#arrival_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#visa_expiry_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('*[name=deposit_amount]').val(addComma($('*[name=deposit_amount]').val(), false));

    $('*[name=deposit_amount]').blur(function() {
        $(this).val(addComma($(this).val(), false));
    });

    $('#combo_select').change(function(){
        $('[name=visa_type]').val($(".combo_select option:selected").val());
    });

});
-->
</script><?php }} ?>