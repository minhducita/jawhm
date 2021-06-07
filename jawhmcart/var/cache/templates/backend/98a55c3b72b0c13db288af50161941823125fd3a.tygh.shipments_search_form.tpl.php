<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 14:07:09
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/shipments/components/shipments_search_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8707826856e69b5dbdaa73-32523772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98a55c3b72b0c13db288af50161941823125fd3a' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/shipments/components/shipments_search_form.tpl',
      1 => 1457504494,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '8707826856e69b5dbdaa73-32523772',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected_section' => 0,
    'extra' => 0,
    'search' => 0,
    'dispatch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e69b5dcf39c6_28014383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e69b5dcf39c6_28014383')) {function content_56e69b5dcf39c6_28014383($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('search','customer','order_id','shipment_date','order_date','shipped_products'));
?>
<div class="sidebar-row">
    <h6><?php echo $_smarty_tpl->__("search");?>
</h6>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" name="shipments_search_form" method="get">

<?php if ($_REQUEST['redirect_url']) {?>
<input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_REQUEST['redirect_url'], ENT_QUOTES, 'UTF-8');?>
" />
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['selected_section']->value!='') {?>
<input type="hidden" id="selected_section" name="selected_section" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_section']->value, ENT_QUOTES, 'UTF-8');?>
" />
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['extra']->value;?>


<?php $_smarty_tpl->_capture_stack[0][] = array('simple_search', null, null); ob_start(); ?>
<div class="sidebar-field">
    <label for="cname"><?php echo $_smarty_tpl->__("customer");?>
:</label>
    <div class="break">
        <input type="text" name="cname" id="cname" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['cname'], ENT_QUOTES, 'UTF-8');?>
" size="30"/>
    </div>
</div>

<div class="sidebar-field">
    <label for="order_id"><?php echo $_smarty_tpl->__("order_id");?>
:</label>
    <input type="text" name="order_id" id="order_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
" size="15"/>
</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("advanced_search", null, null); ob_start(); ?>

<div class="group form-horizontal">
    <div class="control-group">
        <label class="control-label"><?php echo $_smarty_tpl->__("shipment_date");?>
:</label>
        <div class="controls">
            <?php echo $_smarty_tpl->getSubTemplate ("common/period_selector.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('period'=>$_smarty_tpl->tpl_vars['search']->value['shipment_period'],'form_name'=>"shipments_search_form",'prefix'=>"shipment_"), 0);?>

        </div>
    </div>

    <div class="control-group form-horizontal">
        <label class="control-label"><?php echo $_smarty_tpl->__("order_date");?>
:</label>
        <div class="controls">
            <?php echo $_smarty_tpl->getSubTemplate ("common/period_selector.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('period'=>$_smarty_tpl->tpl_vars['search']->value['order_period'],'form_name'=>"shipments_search_form",'prefix'=>"order_"), 0);?>

        </div>
    </div>
</div>

<div class="group form-horizontal">
<div class="control-group">
    <label class="control-label"><?php echo $_smarty_tpl->__("shipped_products");?>
:</label>
    <div class="controls">
        <?php echo $_smarty_tpl->getSubTemplate ("common/products_to_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</div>
</div>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shipments:search_form")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shipments:search_form"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shipments:search_form"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/advanced_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('advanced_search'=>Smarty::$_smarty_vars['capture']['advanced_search'],'simple_search'=>Smarty::$_smarty_vars['capture']['simple_search'],'dispatch'=>$_smarty_tpl->tpl_vars['dispatch']->value,'view_type'=>"shipments"), 0);?>

</form>

</div>
<?php }} ?>
