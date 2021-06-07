<?php /* Smarty version Smarty-3.1.13, created on 2015-06-04 11:39:07
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/showpolicy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1249099717556fba4b11d027-56979327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9206e05c5efe2d2e075bae999711eb772e1054d' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/showpolicy.tpl',
      1 => 1419238839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1249099717556fba4b11d027-56979327',
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
  'unifunc' => 'content_556fba4b1826e7_19876025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556fba4b1826e7_19876025')) {function content_556fba4b1826e7_19876025($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['issmp']->value==1){?>
    <html lang="ja">
    <head>
      <base href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/">
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