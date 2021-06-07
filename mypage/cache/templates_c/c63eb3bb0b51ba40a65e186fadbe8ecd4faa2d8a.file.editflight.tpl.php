<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:39:20
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/editflight.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211236408855669bf8c2b5c3-78811351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c63eb3bb0b51ba40a65e186fadbe8ecd4faa2d8a' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/editflight.tpl',
      1 => 1419238837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211236408855669bf8c2b5c3-78811351',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55669bf8c9e155_17153977',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55669bf8c9e155_17153977')) {function content_55669bf8c9e155_17153977($_smarty_tpl) {?><div class="page-header">
    <h1>
        フライト情報登録完了
    </h1>
</div>

<div class="page-body">
    フライト情報の更新が完了しました。<br />
    ご登録頂いた内容を保存しました。<br />
</div>

<div class="modal-footer">
    <a href="preparation/flightlist" class="btn btn-default">ページ更新</a>
</div>

<script>
<!--
    loadingView(false);
    mnt = 5;
    url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/preparation/flightlist";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</script><?php }} ?>