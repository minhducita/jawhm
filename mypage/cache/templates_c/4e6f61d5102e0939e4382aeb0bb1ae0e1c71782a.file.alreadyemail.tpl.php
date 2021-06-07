<?php /* Smarty version Smarty-3.1.13, created on 2016-07-01 15:13:44
         compiled from "/var/www/html/mypage/application/modules/error/views/index/alreadyemail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178361634457760a1859e113-02142502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e6f61d5102e0939e4382aeb0bb1ae0e1c71782a' => 
    array (
      0 => '/var/www/html/mypage/application/modules/error/views/index/alreadyemail.tpl',
      1 => 1419238894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178361634457760a1859e113-02142502',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'base' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57760a18622969_14767435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57760a18622969_14767435')) {function content_57760a18622969_14767435($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="result-container">
  <h1>メール認証エラー</h1>  
    ご指定のメールアドレスは既に登録されています。<br />
  <a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/index/login">ログイン画面へ戻る</a>
</div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>