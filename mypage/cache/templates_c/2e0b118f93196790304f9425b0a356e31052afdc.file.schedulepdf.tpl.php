<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:35:03
         compiled from "/var/www/html/mypage/application/modules/default/views/schedule/schedulepdf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18381349055546c47d88219-21694648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e0b118f93196790304f9425b0a356e31052afdc' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/schedule/schedulepdf.tpl',
      1 => 1419317651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18381349055546c47d88219-21694648',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'issmp' => 0,
    'base' => 0,
    'title' => 0,
    'jpg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546c47dfdd39_04958161',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546c47dfdd39_04958161')) {function content_55546c47dfdd39_04958161($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['issmp']->value==1){?>
    <html lang="ja">
    <head>
      <base href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
      <meta name="viewport" content="width=device-width, initial-scale=0.2, minimum-scale=0.1, maximum-scale=1, user-scalable=yes">
      <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
      <link rel="stylesheet" type="text/css" href="themes/css/user.css" media="all" />
      <link rel="stylesheet" type="text/css" href="themes/css/common.css" media="all" />
      <link rel="icon" href="themes/images/favicon.ico" type="image/x-icon" />
      <title><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</title>
    </head>

    <body>
    <img src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['jpg']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" alt="file" class="image-view"><br />
    </body>
    </html>
<?php }?><?php }} ?>