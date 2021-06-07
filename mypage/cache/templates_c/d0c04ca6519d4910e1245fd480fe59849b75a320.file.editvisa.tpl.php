<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:39:43
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/editvisa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44805515355669c0fd0a5d2-43848730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0c04ca6519d4910e1245fd480fe59849b75a320' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/editvisa.tpl',
      1 => 1419238837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44805515355669c0fd0a5d2-43848730',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55669c0fdb9fc7_82199293',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55669c0fdb9fc7_82199293')) {function content_55669c0fdb9fc7_82199293($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">ビザ情報変更完了</h4>
    </div>

    <div class="modal-body">
        <h1>ビザ情報の更新が完了しました。</h1><br />
        ご登録頂いた内容を保存しました。<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">ページ更新</button>
    </div>
</div>

<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<script>
<!--
    mnt = 5;
    url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/preparation/visalist";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</script><?php }} ?>