<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:58:55
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/call_requests/views/call_requests/components/requests_search_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145180236156e66f3f0b5373-04504190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efdb209cd9ba8d9e47edef5f41635a8da2f227a7' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/call_requests/views/call_requests/components/requests_search_form.tpl',
      1 => 1457504650,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '145180236156e66f3f0b5373-04504190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_part' => 0,
    '_page_part' => 0,
    'product_search_form_prefix' => 0,
    'form_meta' => 0,
    'search_type' => 0,
    'selected_section' => 0,
    'put_request_vars' => 0,
    'extra' => 0,
    'search' => 0,
    'call_request_statuses' => 0,
    'key' => 0,
    'status' => 0,
    'order_statuses' => 0,
    'responsibles' => 0,
    'user_id' => 0,
    'name' => 0,
    'dispatch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66f3f3333c0_34457760',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66f3f3333c0_34457760')) {function content_56e66f3f3333c0_34457760($_smarty_tpl) {?><?php if (!is_callable('smarty_function_array_to_fields')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.array_to_fields.php';
?><?php
fn_preload_lang_vars(array('search','id','person_name','phone','status','call_requests.order_exists','yes','no','order_status','call_requests.responsible'));
?>
<div class="sidebar-row">
<h6><?php echo $_smarty_tpl->__("search");?>
</h6>

<?php if ($_smarty_tpl->tpl_vars['page_part']->value) {?>
    <?php $_smarty_tpl->tpl_vars["_page_part"] = new Smarty_variable("#".((string)$_smarty_tpl->tpl_vars['page_part']->value), null, 0);?>
<?php }?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['_page_part']->value, ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_search_form_prefix']->value, ENT_QUOTES, 'UTF-8');?>
search_form" method="get" class="cm-disable-empty <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_meta']->value, ENT_QUOTES, 'UTF-8');?>
">
<input type="hidden" name="type" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['search_type']->value)===null||$tmp==='' ? "simple" : $tmp), ENT_QUOTES, 'UTF-8');?>
" />
<?php if ($_REQUEST['redirect_url']) {?>
    <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_REQUEST['redirect_url'], ENT_QUOTES, 'UTF-8');?>
" />
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['selected_section']->value!='') {?>
    <input type="hidden" id="selected_section" name="selected_section" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_section']->value, ENT_QUOTES, 'UTF-8');?>
" />
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['put_request_vars']->value) {?>
    <?php echo smarty_function_array_to_fields(array('data'=>$_REQUEST,'skip'=>array("callback")),$_smarty_tpl);?>

<?php }?>

<?php echo $_smarty_tpl->tpl_vars['extra']->value;?>


<?php $_smarty_tpl->_capture_stack[0][] = array("simple_search", null, null); ob_start(); ?>
    <div class="sidebar-field">
        <label><?php echo $_smarty_tpl->__("id");?>
</label>
        <input type="text" name="id" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['id'], ENT_QUOTES, 'UTF-8');?>
" />
    </div>

    <div class="sidebar-field">
        <label><?php echo $_smarty_tpl->__("person_name");?>
</label>
        <input type="text" name="name" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
    </div>

    <div class="sidebar-field">
        <label><?php echo $_smarty_tpl->__("phone");?>
</label>
        <input type="text" name="phone" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['phone'], ENT_QUOTES, 'UTF-8');?>
" />
    </div>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("advanced_search", null, null); ob_start(); ?>

<div class="row-fluid">
    <div class="group span6 form-horizontal">

        <div class="control-group">
            <label for="status" class="control-label"><?php echo $_smarty_tpl->__("status");?>
</label>
            <div class="controls">
                <select name="status" id="status">
                    <option value="">--</option>
                    <?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['call_request_statuses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['status']->key;
?>
                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['search']->value['status']==$_smarty_tpl->tpl_vars['key']->value) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label for="order_exists" class="control-label"><?php echo $_smarty_tpl->__("call_requests.order_exists");?>
</label>
            <div class="controls">
                <select name="order_exists" id="order_exists">
                    <option value="">--</option>
                    <option value="Y" <?php if ($_smarty_tpl->tpl_vars['search']->value['order_exists']=="Y") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("yes");?>
</option>
                    <option value="N" <?php if ($_smarty_tpl->tpl_vars['search']->value['order_exists']=="N") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("no");?>
</option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label for="order_status" class="control-label"><?php echo $_smarty_tpl->__("order_status");?>
</label>
            <div class="controls">
                <select name="order_status" id="order_status">
                    <option value="">--</option>
                    <?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_statuses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['status']->key;
?>
                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['search']->value['order_status']==$_smarty_tpl->tpl_vars['key']->value) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value['description'], ENT_QUOTES, 'UTF-8');?>
</option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label for="user_id" class="control-label"><?php echo $_smarty_tpl->__("call_requests.responsible");?>
</label>
            <div class="controls">
                <select name="user_id" id="user_id">
                    <option value="">--</option>
                    <?php  $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['name']->_loop = false;
 $_smarty_tpl->tpl_vars['user_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['responsibles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['name']->key => $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->_loop = true;
 $_smarty_tpl->tpl_vars['user_id']->value = $_smarty_tpl->tpl_vars['name']->key;
?>
                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_id']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['search']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                    <?php } ?>
                </select>
            </div>
        </div>

    </div>

</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/advanced_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('simple_search'=>Smarty::$_smarty_vars['capture']['simple_search'],'advanced_search'=>Smarty::$_smarty_vars['capture']['advanced_search'],'dispatch'=>$_smarty_tpl->tpl_vars['dispatch']->value,'view_type'=>"products"), 0);?>


</form>

</div><hr>
<?php }} ?>
