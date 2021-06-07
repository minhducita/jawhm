<?php /* Smarty version Smarty-3.1.13, created on 2016-07-01 16:38:55
         compiled from "/var/www/html/mypage/application/modules/default/views/talk/changetalk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116673466857761e0f08f8f6-53573524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a7560a2b049a40b964de702add7c36235ba40b5' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/talk/changetalk.tpl',
      1 => 1422499358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116673466857761e0f08f8f6-53573524',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57761e0f24ceb0_62484697',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57761e0f24ceb0_62484697')) {function content_57761e0f24ceb0_62484697($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">一言相談登録</h4>
    </div>

    <div class="modal-body">
        <form id="talk-edit" method="post">
            <fieldset>

                <div class="form-group">
                       <label for="talk_content" class="col-sm-4 control-label">相談内容</label>
                       <div class="col-sm-8">
                         <textarea class="form-control" name="talk_content"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['talk_content'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</textarea>
                          <span class="help-block">300文字以内でご記入ください。</span>
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-3">
                           現在の文字数: <span class="count">0</count>
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>

                   <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="action_tag" value="talk">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="talk_confirm" type="button" class="btn btn-primary">確認画面へ</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
    var thisValueLength = $('*[name=talk_content]').val().length;
    var remaining = 300 - thisValueLength;
    $('.count').html(remaining);
</script><?php }} ?>