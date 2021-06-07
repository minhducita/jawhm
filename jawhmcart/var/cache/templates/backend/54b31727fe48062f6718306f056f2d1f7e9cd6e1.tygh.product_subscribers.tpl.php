<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 12:16:38
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/products/components/product_subscribers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92034776256e6817682cda7-28707089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54b31727fe48062f6718306f056f2d1f7e9cd6e1' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/products/components/product_subscribers.tpl',
      1 => 1457504483,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '92034776256e6817682cda7-28707089',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_subscribers' => 0,
    'runtime' => 0,
    'product_data' => 0,
    'product_subscribers_search' => 0,
    'product_id' => 0,
    's' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e681769e8f02_19001122',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e681769e8f02_19001122')) {function content_56e681769e8f02_19001122($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('email','new_subscribers','add_subscriber','add_subscribers_from_users','email','no_data'));
?>
<div class="btn-toolbar clearfix">
    <?php if ($_smarty_tpl->tpl_vars['product_subscribers']->value) {?>
        <div class="pull-left">
            <?php if (!$_smarty_tpl->tpl_vars['runtime']->value['company_id']||$_smarty_tpl->tpl_vars['runtime']->value['company_id']&&$_smarty_tpl->tpl_vars['product_data']->value['company_id']==$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
                <?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'icon'=>"icon-trash",'dispatch'=>"dispatch[products.update]",'form'=>"subscribers_form"));?>

            <?php }?>
        </div>
    <?php }?>
        <div class="pull-left">
            <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/search_product_subscribers.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"products.update",'search'=>$_smarty_tpl->tpl_vars['product_subscribers_search']->value), 0);?>

        </div>
    <?php if (!$_smarty_tpl->tpl_vars['runtime']->value['company_id']||$_smarty_tpl->tpl_vars['runtime']->value['company_id']&&$_smarty_tpl->tpl_vars['product_data']->value['company_id']==$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>        
        <div class="pull-right">
            <?php $_smarty_tpl->_capture_stack[0][] = array("new_email_picker", null, null); ob_start(); ?>
                <form action="<?php echo htmlspecialchars(fn_url("products.update?product_id=".((string)$_smarty_tpl->tpl_vars['product_id']->value)."&selected_section=subscribers"), ENT_QUOTES, 'UTF-8');?>
" method="post" name="subscribers_form_0" class=" ">
                    <div class="form-horizontal form-edit cm-tabs-content" id="content_tab_user_details">
                        <div class="control-group">
                            <label for="users_email" class="control-label cm-required cm-email"><?php echo $_smarty_tpl->__("email");?>
</label>
                            <div class="controls">
                                <input type="text" name="add_users_email" id="users_email" value="" class="span8" />
                                <input type="hidden" name="add_users[0]" id="users_id" value="0"/>
                            </div>
                        </div>
                    </div>
                <div class="buttons-container">
                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[products.update]",'cancel_action'=>"close"), 0);?>

                </div>
                </form>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <span class="shift-right">
                <?php echo $_smarty_tpl->getSubTemplate ("common/popupbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"add_new_subscribers",'text'=>__("new_subscribers"),'content'=>Smarty::$_smarty_vars['capture']['new_email_picker'],'link_text'=>__("add_subscriber"),'act'=>"general",'icon'=>"icon-plus"), 0);?>

            </span>

            <?php echo $_smarty_tpl->getSubTemplate ("pickers/users/picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('no_container'=>true,'data_id'=>"subscr_user",'picker_for'=>"subscribers",'extra_var'=>"products.update?product_id=".((string)$_smarty_tpl->tpl_vars['product_id']->value)."&selected_section=subscribers",'but_text'=>__("add_subscribers_from_users"),'view_mode'=>"button",'but_meta'=>"btn"), 0);?>


        </div>
    <?php }?>
</div>
<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="subscribers_form" class="<?php if (fn_check_form_permissions('')||($_smarty_tpl->tpl_vars['runtime']->value['company_id']&&$_smarty_tpl->tpl_vars['product_data']->value['shared_product']=="Y"&&$_smarty_tpl->tpl_vars['product_data']->value['company_id']!=$_smarty_tpl->tpl_vars['runtime']->value['company_id'])) {?> cm-hide-inputs<?php }?>">

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('save_current_page'=>true,'div_id'=>"product_subscribers",'search'=>$_smarty_tpl->tpl_vars['product_subscribers_search']->value), 0);?>


<?php if ($_smarty_tpl->tpl_vars['product_subscribers']->value) {?>
<table width="100%" class="table table-middle">
<thead>
    <tr>
    <th class="center" width="1%">
        <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</th>
    <th width="50%"><?php echo $_smarty_tpl->__("email");?>
</th>
    <th>&nbsp;</th>
</tr>
</thead>
<tbody>
    <?php  $_smarty_tpl->tpl_vars["s"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["s"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_subscribers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["s"]->key => $_smarty_tpl->tpl_vars["s"]->value) {
$_smarty_tpl->tpl_vars["s"]->_loop = true;
?>
    <tr>
        <td class="center">
               <input type="checkbox" name="subscriber_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-item" /></td>
        <td><input type="hidden" name="subscribers[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
][email]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['email'], ENT_QUOTES, 'UTF-8');?>
" />
            <a href="mailto:<?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['s']->value['email']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['email'], ENT_QUOTES, 'UTF-8');?>
</a></td>
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_id']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <td class="nowrap right" width="5%">
            <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
                <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete",'href'=>"products.update?product_id=".((string)$_smarty_tpl->tpl_vars['product_id']->value)."&selected_section=subscribers&deleted_subscription_id=".((string)$_smarty_tpl->tpl_vars['s']->value['subscriber_id'])));?>
</li>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <div class="hidden-tools">
            <?php if (!$_smarty_tpl->tpl_vars['runtime']->value['company_id']||$_smarty_tpl->tpl_vars['runtime']->value['company_id']&&$_smarty_tpl->tpl_vars['product_data']->value['company_id']==$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
                <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

            <?php }?>
            </div>
        </td>
    </tr>
    <?php } ?>
</tbody>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('div_id'=>"product_subscribers",'search'=>$_smarty_tpl->tpl_vars['product_subscribers_search']->value), 0);?>


</form>
<?php }} ?>
