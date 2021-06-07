<?php /* Smarty version Smarty-3.1.21, created on 2016-03-09 13:15:02
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/views/block_manager/render/container.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54371557256dff7a6aca278-88337634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df57f8eee762bf5f25d3a3a4a237fde944c82b7d' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/views/block_manager/render/container.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '54371557256dff7a6aca278-88337634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout_data' => 0,
    'container' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56dff7a6ae9e88_23659352',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dff7a6ae9e88_23659352')) {function content_56dff7a6ae9e88_23659352($_smarty_tpl) {?><div class="<?php if ($_smarty_tpl->tpl_vars['layout_data']->value['layout_width']!="fixed") {?>container-fluid <?php } else { ?>container<?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['container']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

</div><?php }} ?>
