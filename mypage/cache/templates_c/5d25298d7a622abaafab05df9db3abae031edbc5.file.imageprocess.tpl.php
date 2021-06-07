<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:39:03
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/imageprocess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80112944955669be7659fc4-59461328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d25298d7a622abaafab05df9db3abae031edbc5' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/imageprocess.tpl',
      1 => 1419238838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80112944955669be7659fc4-59461328',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55669be76d3709_99701569',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55669be76d3709_99701569')) {function content_55669be76d3709_99701569($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">アップロード成功</h4>
    </div>

    <div class="modal-body">
        <h1>ファイルのアップロードに成功しました</h1>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">閉じる</button>
    </div>

</div>
<script>
<!--
    mnt = 60;
    url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/preparation/flightlist";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</script><?php }} ?>