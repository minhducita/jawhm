<?php /* Smarty version Smarty-3.1.13, created on 2015-06-01 14:19:49
         compiled from "/var/www/html/mypage/application/modules/default/views/application/editdeposit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58880293556beb75b0eed7-41229187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9306bc55d4572c50d6bcac80f2c347fb82876bcd' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/application/editdeposit.tpl',
      1 => 1421644969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58880293556beb75b0eed7-41229187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556beb75b83bc5_10469581',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556beb75b83bc5_10469581')) {function content_556beb75b83bc5_10469581($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">お支払情報登録完了</h4>
    </div>

    <div class="modal-body">
        <h1>お支払い情報の更新が完了しました。</h1><br />
        ご登録頂いた内容を保存しました。<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="reload">ページ更新</button>
    </div>
</div>

<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<script>
<!--
    mnt = 5;
    function jumpPage() {
        location.reload();
    }
    setTimeout("jumpPage()",mnt*1000);
//-->
</script><?php }} ?>