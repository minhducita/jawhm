<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:58:30
         compiled from "/var/www/html/jawhmcart/design/backend/templates/common/tooltip.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104681676156e66f266f0405-34180862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b2e1ef06c4c55f48cc98c911fbc9151c17d7b6f' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/common/tooltip.tpl',
      1 => 1457504315,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '104681676156e66f266f0405-34180862',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tooltip' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66f2673e641_47922449',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66f2673e641_47922449')) {function content_56e66f2673e641_47922449($_smarty_tpl) {?>&nbsp;<?php if ($_smarty_tpl->tpl_vars['tooltip']->value) {?><a class="cm-tooltip<?php if ($_smarty_tpl->tpl_vars['params']->value) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value, ENT_QUOTES, 'UTF-8');
}?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tooltip']->value, ENT_QUOTES, 'UTF-8');?>
"><i class="icon-question-sign"></i></a><?php }?><?php }} ?>
