<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:37:33
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/subscribers/components/subscribers_search_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127144317156e6784d40a755-14164235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a709f1d04cdb1b1e3bb57b6062a0e2b80e0ab3a3' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/subscribers/components/subscribers_search_form.tpl',
      1 => 1457504664,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '127144317156e6784d40a755-14164235',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search' => 0,
    'mailing_lists' => 0,
    'm_id' => 0,
    'm' => 0,
    'languages' => 0,
    'lng' => 0,
    'dispatch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6784d536a56_07289963',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6784d536a56_07289963')) {function content_56e6784d536a56_07289963($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('search','email','mailing_list','confirmed','yes','no','language','period'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("common/saved_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"subscribers.manage",'view_type'=>"subscribers"), 0);?>


<div class="sidebar-row">

<h6><?php echo $_smarty_tpl->__("search");?>
</h6>
<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" name="subscribers_search_form" method="get">

<?php $_smarty_tpl->_capture_stack[0][] = array("simple_search", null, null); ob_start(); ?>

<div class="sidebar-field">
    <label><?php echo $_smarty_tpl->__("email");?>
</label>
    <input type="text" name="email" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['email'], ENT_QUOTES, 'UTF-8');?>
" />
</div>

<div class="sidebar-field">
    <label><?php echo $_smarty_tpl->__("mailing_list");?>
</label>
    <select    name="list_id">
        <option    value="">--</option>
        <?php  $_smarty_tpl->tpl_vars["m"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["m"]->_loop = false;
 $_smarty_tpl->tpl_vars["m_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mailing_lists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["m"]->key => $_smarty_tpl->tpl_vars["m"]->value) {
$_smarty_tpl->tpl_vars["m"]->_loop = true;
 $_smarty_tpl->tpl_vars["m_id"]->value = $_smarty_tpl->tpl_vars["m"]->key;
?>
            <option    value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m_id']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['search']->value['list_id']==$_smarty_tpl->tpl_vars['m_id']->value) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value['object'], ENT_QUOTES, 'UTF-8');?>
</option>
        <?php } ?>
    </select>
</div>

<div class="sidebar-field">
    <label><?php echo $_smarty_tpl->__("confirmed");?>
</label>
    <select    name="confirmed">
        <option    value="">--</option>
        <option    value="Y" <?php if ($_smarty_tpl->tpl_vars['search']->value['confirmed']=="Y") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("yes");?>
</option>
        <option    value="N" <?php if ($_smarty_tpl->tpl_vars['search']->value['confirmed']=="N") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("no");?>
</option>
    </select>
</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("advanced_search", null, null); ob_start(); ?>
<div class="search-field">
    <label for="elm_search_language"><?php echo $_smarty_tpl->__("language");?>
:</label>
    <select id="elm_search_language" name="language">
        <option value="">--</option>
        <?php  $_smarty_tpl->tpl_vars["lng"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["lng"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["lng"]->key => $_smarty_tpl->tpl_vars["lng"]->value) {
$_smarty_tpl->tpl_vars["lng"]->_loop = true;
?>
        <option <?php if ($_smarty_tpl->tpl_vars['search']->value['language']==$_smarty_tpl->tpl_vars['lng']->value['lang_code']) {?>selected="selected"<?php }?> value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lng']->value['lang_code'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lng']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>
        <?php } ?>
    </select>
</div>

<div class="search-field">
    <label><?php echo $_smarty_tpl->__("period");?>
:</label>
    <?php echo $_smarty_tpl->getSubTemplate ("common/period_selector.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('period'=>$_smarty_tpl->tpl_vars['search']->value['period'],'form_name'=>"subscribers_search_form"), 0);?>

</div>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/advanced_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('simple_search'=>Smarty::$_smarty_vars['capture']['simple_search'],'content'=>Smarty::$_smarty_vars['capture']['advanced_search'],'dispatch'=>$_smarty_tpl->tpl_vars['dispatch']->value,'view_type'=>"subscribers"), 0);?>


</form>

</div>
<?php }} ?>
