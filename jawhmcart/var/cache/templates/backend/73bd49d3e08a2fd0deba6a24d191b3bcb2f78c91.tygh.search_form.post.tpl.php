<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:45:28
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/tags/hooks/pages/search_form.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23782529656e67a28909269-42492257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73bd49d3e08a2fd0deba6a24d191b3bcb2f78c91' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/tags/hooks/pages/search_form.post.tpl',
      1 => 1457504607,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '23782529656e67a28909269-42492257',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e67a28948641_65665297',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e67a28948641_65665297')) {function content_56e67a28948641_65665297($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('tag'));
?>
<div class="control-group">
    <label class="control-label" for="elm_tag"><?php echo $_smarty_tpl->__("tag");?>
</label>
    <div class="controls">
    <input id="elm_tag" type="text" name="tag" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['tag'], ENT_QUOTES, 'UTF-8');?>
" onfocus="this.select();"/>
    </div>
</div><?php }} ?>
