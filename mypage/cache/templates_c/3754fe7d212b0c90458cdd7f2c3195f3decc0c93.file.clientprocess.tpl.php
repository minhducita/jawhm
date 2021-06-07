<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:30:33
         compiled from "/var/www/html/mypage/application/modules/staff/views/file/clientprocess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178930993555643d394b7d08-38737235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3754fe7d212b0c90458cdd7f2c3195f3decc0c93' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/file/clientprocess.tpl',
      1 => 1419239011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178930993555643d394b7d08-38737235',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55643d3951eeb3_63638600',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55643d3951eeb3_63638600')) {function content_55643d3951eeb3_63638600($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">ファイルアップロード成功</h4>
    </div>

    <div class="modal-body">
        <h1>ファイルのアップロードに成功しました。</h1>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" onClick="jumpPage()">ページを更新する</button>
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