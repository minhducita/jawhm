<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:14:05
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/deleteimage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12340417635564395d9e7008-80919349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0dfd5256f8ba3207f67479be0da840c37d39a978' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/deleteimage.tpl',
      1 => 1419238837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12340417635564395d9e7008-80919349',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5564395daf4d29_72807317',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5564395daf4d29_72807317')) {function content_5564395daf4d29_72807317($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">削除完了</h4>
    </div>

    <div class="modal-body">
        <h1>画像の削除が完了しました。</h1><br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">フライト一覧へ戻る</button>
    </div>
</div>

<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<script>
<!--
    mnt = 5;
    url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/preparation/flightlist";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000);
//-->
</script><?php }} ?>