<?php /* Smarty version Smarty-3.1.13, created on 2016-07-01 15:55:49
         compiled from "/var/www/html/mypage/application/modules/default/views/member/editaddress.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1645986350577613f574c0c0-11799577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bead860c0842cce16a6b2c46bbc57cdc7a002949' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/editaddress.tpl',
      1 => 1419238798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1645986350577613f574c0c0-11799577',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_577613f5877ba5_24672819',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_577613f5877ba5_24672819')) {function content_577613f5877ba5_24672819($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">住所変更完了</h4>
    </div>

    <div class="modal-body">
        <h1>住所情報の更新が完了しました。</h1><br />
        ご登録頂いた内容を保存しました。<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="reload">ページ更新</button>
    </div>
</div>

<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<SCRIPT language="JavaScript">
<!--
    mnt = 5;
    function jumpPage() {
        location.reload();;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT><?php }} ?>