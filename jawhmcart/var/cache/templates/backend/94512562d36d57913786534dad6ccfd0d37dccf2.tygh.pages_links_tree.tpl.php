<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:35:14
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/pages/components/pages_links_tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62096734256e677c265d7a3-62025309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94512562d36d57913786534dad6ccfd0d37dccf2' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/pages/components/pages_links_tree.tpl',
      1 => 1457504477,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '62096734256e677c265d7a3-62025309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pages_tree' => 0,
    'page' => 0,
    'runtime' => 0,
    'search' => 0,
    'shift' => 0,
    'comb_id' => 0,
    'expanded' => 0,
    'come_from' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677c276fe38_28567452',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677c276fe38_28567452')) {function content_56e677c276fe38_28567452($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_in_array')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.in_array.php';
?><?php
fn_preload_lang_vars(array('expand_sublist_of_items','expand_sublist_of_items','collapse_sublist_of_items','collapse_sublist_of_items'));
?>
<ul>
<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages_tree']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
    <?php $_smarty_tpl->tpl_vars['shift'] = new Smarty_variable(14*(($tmp = @$_smarty_tpl->tpl_vars['page']->value['level'])===null||$tmp==='' ? 0 : $tmp), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['expanded'] = new Smarty_variable(smarty_modifier_in_array($_smarty_tpl->tpl_vars['page']->value['page_id'],$_smarty_tpl->tpl_vars['runtime']->value['active_page_ids']), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['comb_id'] = new Smarty_variable("page_".((string)$_smarty_tpl->tpl_vars['page']->value['page_id']), null, 0);?>
    <li <?php if ($_smarty_tpl->tpl_vars['page']->value['active']) {?>class="active"<?php }?> <?php if (!$_smarty_tpl->tpl_vars['search']->value['paginate']) {?>style="padding-left: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shift']->value, ENT_QUOTES, 'UTF-8');?>
px;"<?php }?>>
    <div class="link"><?php if ($_smarty_tpl->tpl_vars['page']->value['subpages']) {?><span alt="<?php echo $_smarty_tpl->__("expand_sublist_of_items");?>
" title="<?php echo $_smarty_tpl->__("expand_sublist_of_items");?>
" id="on_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comb_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-combination<?php if ($_smarty_tpl->tpl_vars['expanded']->value) {?> hidden<?php }?>" ><span class="exicon-expand"> </span></span><span alt="<?php echo $_smarty_tpl->__("collapse_sublist_of_items");?>
" title="<?php echo $_smarty_tpl->__("collapse_sublist_of_items");?>
" id="off_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comb_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-combination<?php if (!$_smarty_tpl->tpl_vars['expanded']->value) {?> hidden<?php }?>" ><span class="exicon-collapse"> </span></span><?php }?><a href="<?php echo htmlspecialchars(fn_url("pages.update?page_id=".((string)$_smarty_tpl->tpl_vars['page']->value['page_id'])."&come_from=".((string)$_smarty_tpl->tpl_vars['come_from']->value)), ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['page']->value['status']=="N") {?>class="manage-root-item-disabled"<?php }?> id="page_title_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_id'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
" <?php if (!$_smarty_tpl->tpl_vars['page']->value['subpages']) {?> style="padding-left: 14px;"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</a></div>
    </li>
<?php if ($_smarty_tpl->tpl_vars['page']->value['subpages']) {?>
    <li class="<?php if (!$_smarty_tpl->tpl_vars['expanded']->value) {?> hidden<?php }?>" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comb_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php echo $_smarty_tpl->getSubTemplate ("views/pages/components/pages_links_tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('pages_tree'=>$_smarty_tpl->tpl_vars['page']->value['subpages'],'parent_id'=>$_smarty_tpl->tpl_vars['page']->value['page_id']), 0);?>

    </li>
<?php }?>

<?php } ?>
</ul><?php }} ?>
