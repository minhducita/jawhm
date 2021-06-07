<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 11:18:36
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/loa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2488484115563d7fc954be3-71789297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '922d7152902dc88fa2436cef860a73efa18968a1' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/loa.tpl',
      1 => 1427708759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2488484115563d7fc954be3-71789297',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'issmp' => 0,
    'base' => 0,
    'title' => 0,
    'jpg' => 0,
    'img' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5563d7fc9f92f6_37227848',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5563d7fc9f92f6_37227848')) {function content_5563d7fc9f92f6_37227848($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['issmp']->value==1){?>
    <html lang="ja">
    <head>
      <base href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
      <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
      <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/css/mypage-user.css" media="all" />
      <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/css/common.css" media="all" />
      <link rel="icon" href="themes/images/favicon.ico" type="image/x-icon" />
      <title><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</title>
    </head>

    <body>
    <?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jpg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value){
$_smarty_tpl->tpl_vars['img']->_loop = true;
?>
        <img src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" alt="file" class="image-view"><br />
    <?php } ?>
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