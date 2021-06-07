<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:35:41
         compiled from "/var/www/html/jawhmcart/design/backend/templates/common/sidebox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180782833656e677ddb66fa0-56556442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2e487892de180a124107151373ccc93f1b191d9' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/common/sidebox.tpl',
      1 => 1457504313,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '180782833656e677ddb66fa0-56556442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677ddbf3bd8_54595337',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677ddbf3bd8_54595337')) {function content_56e677ddbf3bd8_54595337($_smarty_tpl) {?><?php if (trim($_smarty_tpl->tpl_vars['content']->value)) {?>
    <div class="sidebar-row">
        <h6><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>
</h6>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['content']->value)===null||$tmp==='' ? "&nbsp;" : $tmp);?>

    </div>
    <hr />
<?php }?><?php }} ?>
