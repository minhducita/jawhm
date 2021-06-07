<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:39:31
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/changeinsurance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67992964055669c033da156-68084476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2943f92ef169e81b4d72368459f679b9242b0e61' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/changeinsurance.tpl',
      1 => 1421649917,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67992964055669c033da156-68084476',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'smp' => 0,
    'token' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55669c036e6273_54563684',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55669c036e6273_54563684')) {function content_55669c036e6273_54563684($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">保険情報登録</h4>
    </div>

    <div class="modal-body">
        <form id="insurance-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="provider_name" class="col-sm-4 control-label">保険会社名</label>
                    <div class="col-sm-8 combo_wrapper">
                        <button type="button" class="btn combo_arrow">▼</button>
                        <select id="combo_select" class="form-control input-block-level combo_select" name="provider_name_select">
                            <option>手動入力</option>
                            <option>AIU</option>
                            <option>三井住友海上</option>
                            <option>東京海上日動</option>
                            <option>ジェイアイ</option>
                            <option>損保ジャパン</option>
                            <option>エイチ・エス</option>
                            <option>日本興亜損保</option>
                        </select>
                        <div class="combo_div">
                            <input class="input-block-level combo_text form-control input-group" type="text" name="provider_name" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['provider_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="insurance_type" class="col-sm-4 control-label">契約種別</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="insurance_type" <?php if ($_smarty_tpl->tpl_vars['item']->value['insurance_type']!='null'){?> value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['insurance_type'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"<?php }?> autofocus>
                        <span class="help-block">契約タイプをご入力ください。</span>
                    </div>
                </div>

                <div class="form-group">
                       <label for="policy_number" class="col-sm-4 control-label">証券番号</label>
                       <div class="col-sm-8">
                         <input class="form-control" type="text" name="policy_number" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['policy_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    </div>
                </div>

                <div class="form-group">
                       <label for="policy_owner" class="col-sm-4 control-label">契約者(英語)</label>
                       <div class="col-sm-8">
                         <input class="form-control" type="text" name="policy_owner" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['policy_owner'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                        <span class="help-block">海外の病院で提示できるよう英語名でご入力ください。</span>
                    </div>
                </div>

                <div class="form-group">
                       <label for="line" class="col-sm-4 control-label">ライン</label>
                       <div class="col-sm-8">
                        <select class="form-control" name="line">
                            <option <?php if ($_smarty_tpl->tpl_vars['item']->value['line']=='海外旅行'){?>selected<?php }?> value="海外旅行">海外旅行</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['item']->value['line']=='留学'){?>selected<?php }?> value="留学">留学</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                       <label for="insured_date_st" class="col-sm-4 control-label input-append date">始期日</label>
                       <div class="col-sm-8">
                           <div <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>class="input-group date" id="insured_date_st"<?php }?>>
                        <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>date<?php }?>' class="form-control" name="insured_date_st" value="<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['insured_date_st'],"%G-%m-%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" />
                        <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                       <label for="insured_date_ed" class="col-sm-4 control-label input-append date">終期日</label>
                       <div class="col-sm-8">
                           <div<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?> class="input-group date" id="insured_date_ed"<?php }?>>
                        <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>date<?php }?>' class="form-control" name="insured_date_ed" value="<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['insured_date_ed'],"%G-%m-%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" />
                        <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                       <label for="division" class="col-sm-4 control-label">区分</label>
                       <div class="col-sm-8">
                        <select class="form-control" name="division">
                            <option <?php if ($_smarty_tpl->tpl_vars['item']->value['division']=='新規'){?>selected<?php }?> value="新規">新規</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['item']->value['division']=='延長'){?>selected<?php }?> value="延長">延長</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                       <label for="deposit_amount" class="col-sm-4 control-label">入金額</label>
                       <div class="col-sm-8">
                         <input class="form-control text-right" type="text" name="deposit_amount" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['deposit_amount'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    </div>
                </div>

                <div class="form-group">
                   <label for="option_flag" class="col-sm-4 control-label">オプション有無</label>
                   <div class="col-sm-8">
                       <div class="radio col-xs-6">
                           <label>
                                <input type="radio" name="option_flag" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['option_flag']==1){?>checked<?php }?>>
                                有
                           </label>
                       </div>

                       <div class="radio col-xs-6" style="margin-top: 10px;">
                           <label>
                                <input type="radio" name="option_flag" value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['option_flag']!=1){?>checked<?php }?>>
                                無
                           </label>
                       </div>
                    </div>
                </div>

                <div class="form-group">
                   <label for="option_name" class="col-sm-4 control-label">オプション名</label>
                   <div class="col-sm-8">
                       <select class="form-control" name="option_name">
                           <option <?php if ($_smarty_tpl->tpl_vars['item']->value['option_name']==''){?>selected<?php }?> value="">オプションなし</option>
                           <option <?php if ($_smarty_tpl->tpl_vars['item']->value['option_name']=='緊急一時帰国費用'){?>selected<?php }?> value="緊急一時帰国費用">緊急一時帰国費用</option>
                       </select>
                    </div>
                </div>

                <div class="form-group">
                   <label for="option_amount" class="col-sm-4 control-label">オプション金額</label>
                   <div class="col-sm-8">
                         <input class="form-control text-right" type="text" name="option_amount" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['option_amount'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                   <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="action_tag" value="insurance">
                <input type="hidden" name="branch_no" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="insurance_edit" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/moment.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/bootstrap-datetimepicker.ja.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/jquery.browser.sp.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/jquery.dateValidate.js "></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/jquery.timeValidate.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<script>
<!--
$(function () {
    $('#insured_date_st').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#insured_date_ed').datetimepicker({
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

    $('*[name=option_amount]').val(addComma($('*[name=option_amount]').val(), false));

    $('*[name=option_amount]').blur(function() {
        $(this).val(addComma($(this).val(), false));
    });

    $('#combo_select').change(function(){
        $('[name=provider_name]').val($(".combo_select option:selected").val());
    });
});
-->
</script><?php }} ?>