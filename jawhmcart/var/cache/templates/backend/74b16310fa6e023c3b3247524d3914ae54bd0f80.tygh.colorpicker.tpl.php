<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:20:07
         compiled from "/var/www/html/jawhmcart/design/backend/templates/common/colorpicker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182056358656e6743717a7e4-96103200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74b16310fa6e023c3b3247524d3914ae54bd0f80' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/common/colorpicker.tpl',
      1 => 1457504305,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '182056358656e6743717a7e4-96103200',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cp_name' => 0,
    'cp_id' => 0,
    'cp_value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6743719e8c4_92026749',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6743719e8c4_92026749')) {function content_56e6743719e8c4_92026749($_smarty_tpl) {?><div class="colorpicker">
    <input type="text" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp_name']->value, ENT_QUOTES, 'UTF-8');?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp_id']->value, ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp_value']->value, ENT_QUOTES, 'UTF-8');?>
" data-ca-view="palette" class="cm-colorpicker">
</div><?php }} ?>
