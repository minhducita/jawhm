<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:14:02
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/imgdelconfirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16182424745564395adf7b82-39490076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f9b0828af4ebbc7c680199dafc95862adca1e81' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/imgdelconfirm.tpl',
      1 => 1419238838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16182424745564395adf7b82-39490076',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5564395ae79788_68812364',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5564395ae79788_68812364')) {function content_5564395ae79788_68812364($_smarty_tpl) {?><div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">削除確認</h4>
    </div>

    <div class="modal-body">
        <h3>本当に画像を削除しますか?</h3>
            <form id="flightimage-delete" method="post">
            <fieldset>
                <div class="form-group">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4">
                          <button type="button" id="flightimage_delete" class="btn btn-danger">削除</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                      </div>
                </div>
                <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="action_tag" value="flightimagedelete">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
            </fieldset>
            </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script><?php }} ?>