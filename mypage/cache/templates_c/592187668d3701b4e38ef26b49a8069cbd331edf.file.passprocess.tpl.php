<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:25:30
         compiled from "/var/www/html/mypage/application/modules/default/views/application/passprocess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1880710948556698bad66520-80374355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '592187668d3701b4e38ef26b49a8069cbd331edf' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/application/passprocess.tpl',
      1 => 1418719396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1880710948556698bad66520-80374355',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556698badd1899_98127673',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556698badd1899_98127673')) {function content_556698badd1899_98127673($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">パスポート成功</h4>
    </div>

    <div class="modal-body">
        <h1>ファイルのアップロードに成功しました</h1>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" onClick="jumpPage()">閉じる</button>
    </div>

</div>

<script>
<!--
    mnt = 5;
    function jumpPage() {
        location.reload();
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</script><?php }} ?>