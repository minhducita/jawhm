<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:35:23
         compiled from "/var/www/html/mypage/application/modules/default/views/schedule/showcontact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81623108255546c5bb9a0a1-53960405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4e25effa1a58811fb64d43792cbd7f9584b7a73' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/schedule/showcontact.tpl',
      1 => 1419238850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81623108255546c5bb9a0a1-53960405',
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
  'unifunc' => 'content_55546c5bc30038_67353648',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546c5bc30038_67353648')) {function content_55546c5bc30038_67353648($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['issmp']->value==1){?>
    <html lang="ja">
    <head>
      <base href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
      <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
      <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/css/user.css" media="all" />
      <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/css/common.css" media="all" />
      <link rel="icon" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/images/favicon.ico" type="image/x-icon" />
      <title><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</title>
    </head>

    <body>
    <img src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['jpg']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" alt="file" class="image-view"><br />
    <div class="iphone-notice">
        スマートフォンをお使いで上記書類を保存する方は、<br />
        iPhoneの場合は、画像をロングタップ(一定時間タッチし続ける) すると表示される<br />
        「画像を保存」をタップするとカメラロールに保存されます。<br />
        Androidの場合は、画像をロングタップするとメニューが表示されるので<br />
        「画像を保存」を選択するとギャラリーの中の<br />
        Downloadというアルバムの中に画像が保存されます。
    </div>
    </body>
    </html>
<?php }?><?php }} ?>