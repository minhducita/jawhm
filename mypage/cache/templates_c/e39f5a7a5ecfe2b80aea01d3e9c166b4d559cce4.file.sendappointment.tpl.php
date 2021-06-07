<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 10:38:17
         compiled from "/var/www/html/mypage/application/modules/default/views/index/sendappointment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1864356193556671895be498-02439049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e39f5a7a5ecfe2b80aea01d3e9c166b4d559cce4' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/sendappointment.tpl',
      1 => 1432717378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1864356193556671895be498-02439049',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556671895eed64_85447769',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556671895eed64_85447769')) {function content_556671895eed64_85447769($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">個別カウンセリング予約送信完了</h4>
    </div>

    <div class="modal-body">
        <h1>お客様のご希望の日程を承りました。</h1><br />
        内容につきましては活動内容をご覧ください。<br />
        日程が確定しましたらマイページの次回ご来店予定が更新されますのでご確認をお願いします。<br />
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
/mypage/";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</script><?php }} ?>