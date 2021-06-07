<?php /* Smarty version Smarty-3.1.13, created on 2016-07-01 14:50:00
         compiled from "/var/www/html/mypage/application/modules/default/views/member/editpassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1416646240577604885d9bf9-21365910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c028dbfe08c8970e995aba8ca7e7dff3ac4e69be' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/editpassword.tpl',
      1 => 1419238798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1416646240577604885d9bf9-21365910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_577604886d46f7_34288786',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_577604886d46f7_34288786')) {function content_577604886d46f7_34288786($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">パスワード変更完了</h4>
    </div>

    <div class="modal-body">
        <h1>パスワードの更新が完了しました。</h1><br />
        ご登録頂いた内容を保存しました。<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">ページ更新</button>
    </div>
</div>

<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<SCRIPT>
<!--
    mnt = 5;
    function jumpPage() {
        location.reload();
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT><?php }} ?>