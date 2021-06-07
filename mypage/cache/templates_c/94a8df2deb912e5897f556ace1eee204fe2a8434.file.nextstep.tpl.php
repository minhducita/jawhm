<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 19:11:40
         compiled from "/var/www/html/mypage/application/modules/staff/views/client/nextstep.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1815246177556446dc25fd25-96130047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94a8df2deb912e5897f556ace1eee204fe2a8434' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/client/nextstep.tpl',
      1 => 1419238986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1815246177556446dc25fd25-96130047',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'next_step' => 0,
    'item' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556446dc300014_99804462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556446dc300014_99804462')) {function content_556446dc300014_99804462($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">次のステップ入力</h4>
    </div>

    <div class="modal-body">
        <form id="nextstep-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="step_name" class="col-sm-4 control-label">次のステップ</label>
                    <div class="col-sm-8 combo_wrapper">
                        <button type="button" class="btn combo_arrow">▼</button>
                        <select id="combo_select" class="form-control input-block-level combo_select" name="step_name_select">
                            <option>手動入力</option>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['next_step']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                <option><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['step_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</option>
                            <?php } ?>
                        </select>
                        <div class="combo_div">
                            <input class="input-block-level combo_text form-control input-group" type="text" name="step_name">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="step_exposition_short" class="col-sm-4 control-label">ステップ説明</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="step_exposition_short">
                    </div>
                </div>

                <div class="form-group">
                       <label for="preparation" class="col-sm-4 control-label">必要なもの</label>
                       <div class="col-sm-8">
                         <input class="form-control" type="text" name="preparation">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                   <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="action_tag" value="nextstep">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="nextstep_edit" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>

<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
    $('#combo_select').change(function(){
        $('*[name=step_name]').val($(".combo_select option:selected").val());
    });
</script><?php }} ?>