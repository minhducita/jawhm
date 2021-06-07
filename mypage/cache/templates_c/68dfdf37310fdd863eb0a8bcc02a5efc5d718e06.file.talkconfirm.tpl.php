<?php /* Smarty version Smarty-3.1.13, created on 2016-07-04 18:21:49
         compiled from "/var/www/html/mypage/application/modules/default/views/talk/talkconfirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1349300149577a2aad6879e9-44871609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68dfdf37310fdd863eb0a8bcc02a5efc5d718e06' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/talk/talkconfirm.tpl',
      1 => 1419238870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1349300149577a2aad6879e9-44871609',
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
  'unifunc' => 'content_577a2aad7c3b37_05927844',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_577a2aad7c3b37_05927844')) {function content_577a2aad7c3b37_05927844($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">一言相談確認</h4>
    </div>

    <div class="modal-body">
        <form id="talk-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="talk_content" class="col-sm-4 control-label">相談内容</label>
                    <div class="col-sm-8">
                        <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['talk_content'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                    </div>
                </div>

                   <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="action_tag" value="talk-confirm">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <span class="text-red">以上の内容で送信しますか?</span><br />
        <button id="talk_amend" type="button" class="btn btn-danger">修正</button>
        <button id="talk_complete" type="button" class="btn btn-primary">送信</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script><?php }} ?>