<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 14:02:00
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/mail/templates/profiles/profiles_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40641857956e69a28d9ecf0-34031612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4411b1b1dc4b94b7ba8f78fec5e5951567d6fabe' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/mail/templates/profiles/profiles_info.tpl',
      1 => 1457518431,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '40641857956e69a28d9ecf0-34031612',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'user_data' => 0,
    'password' => 0,
    'settings' => 0,
    'user_usergroup' => 0,
    'profile_fields' => 0,
    'contact_fields' => 0,
    'created' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e69a291f06a1_49224266',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e69a291f06a1_49224266')) {function content_56e69a291f06a1_49224266($_smarty_tpl) {?><?php if (!is_callable('smarty_function_split')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.split.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('user_account_info','email','password','login','url','usergroups','pending','active','profile_name','tax_exempt','yes','contact_information','contact_information','billing_address','shipping_address','user_account_info','email','password','login','url','usergroups','pending','active','profile_name','tax_exempt','yes','contact_information','contact_information','billing_address','shipping_address'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><table cellpadding="0" cellspacing="0" border="0">
<tr>
    <td valign="top">
        <table cellpadding="1" cellspacing="1" border="0" width="100%">
        <tr>
            <td colspan="2" class="form-title"><?php echo $_smarty_tpl->__("user_account_info");?>
<hr size="1" noshade></td>
        </tr>
        <tr>
            <td class="form-field-caption" nowrap><?php echo $_smarty_tpl->__("email");?>
:&nbsp;</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['email'], ENT_QUOTES, 'UTF-8');?>
</td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['password']->value) {?>
        <tr>
            <td class="form-field-caption" nowrap><?php echo $_smarty_tpl->__("password");?>
:&nbsp;</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['password']->value, ENT_QUOTES, 'UTF-8');?>
</td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['quick_registration']=="Y") {?>
            <tr>
                <td class="form-field-caption" nowrap><?php echo $_smarty_tpl->__("login");?>
 <?php echo $_smarty_tpl->__("url");?>
:&nbsp;</td>
                <td><?php if ($_smarty_tpl->tpl_vars['user_data']->value['company_id']) {
echo htmlspecialchars(fn_url("?company_id=".((string)$_smarty_tpl->tpl_vars['user_data']->value['company_id']),'C','http'), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(fn_url('','C','http'), ENT_QUOTES, 'UTF-8');
}?></td>
            </tr>
        <?php }?>
        <?php if (!fn_allowed_for("ULTIMATE:FREE")) {?>
            <?php if ($_smarty_tpl->tpl_vars['user_data']->value['usergroups']) {?>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" class="form-title"><?php echo $_smarty_tpl->__("usergroups");?>
<hr size="1" noshade></td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars["user_usergroup"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["user_usergroup"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_data']->value['usergroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["user_usergroup"]->key => $_smarty_tpl->tpl_vars["user_usergroup"]->value) {
$_smarty_tpl->tpl_vars["user_usergroup"]->_loop = true;
?>
                    <tr>
                        <td class="form-field-caption" nowrap><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_usergroup']->value['usergroup'], ENT_QUOTES, 'UTF-8');?>
:&nbsp;</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['user_usergroup']->value['status']=='P') {
echo $_smarty_tpl->__("pending");
} else {
echo $_smarty_tpl->__("active");
}?></td>
                    </tr>
                <?php } ?>
            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['user_multiple_profiles']=='Y') {?>
        <tr>
            <td class="form-title"><?php echo $_smarty_tpl->__("profile_name");?>
:&nbsp;</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['profile_name'], ENT_QUOTES, 'UTF-8');?>
</td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user_data']->value['tax_exempt']=='Y') {?>
        <tr>
            <td class="form-title"><?php echo $_smarty_tpl->__("tax_exempt");?>
:&nbsp;</td>
            <td><?php echo $_smarty_tpl->__("yes");?>
</td>
        </tr>
        <?php }?>
        </table>
    </td>    
    <td colspan="2">&nbsp;</td>
</tr>
<tr>
    <td colspan="3">&nbsp;</td>
</tr>
</table>

<?php $_smarty_tpl->tpl_vars["profile_fields"] = new Smarty_variable(fn_get_profile_fields($_smarty_tpl->tpl_vars['user_data']->value['user_type']), null, 0);?>
<?php echo smarty_function_split(array('data'=>$_smarty_tpl->tpl_vars['profile_fields']->value['C'],'size'=>2,'assign'=>"contact_fields",'simple'=>true,'size_is_horizontal'=>true),$_smarty_tpl);?>

<table cellpadding="4" cellspacing="0" border="0" width="100%">
<?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['C']) {?>
    <tr>
        <td valign="top" width="50%">
            <table>
                <?php echo $_smarty_tpl->getSubTemplate ("profiles/profile_fields_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['contact_fields']->value[0],'title'=>__("contact_information")), 0);?>

            </table>
        </td>
        <td width="1%">&nbsp;</td>
        <td valign="top" width="49%">
            <?php if ($_smarty_tpl->tpl_vars['contact_fields']->value[1]) {?>
            <table>
                <?php echo $_smarty_tpl->getSubTemplate ("profiles/profile_fields_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['contact_fields']->value[1],'title'=>__("contact_information")), 0);?>

            </table>
            <?php }?>
        </td>
    </tr>
<?php }?>
<?php if (($_smarty_tpl->tpl_vars['profile_fields']->value['B']||$_smarty_tpl->tpl_vars['profile_fields']->value['S'])&&$_smarty_tpl->tpl_vars['user_data']->value['register_at_checkout']!="Y"&&!($_smarty_tpl->tpl_vars['created']->value&&$_smarty_tpl->tpl_vars['settings']->value['General']['quick_registration']=="Y")) {?>
<tr>
    <td valign="top">
    <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['B']) {?>
        <p></p>
        <table>
            <?php echo $_smarty_tpl->getSubTemplate ("profiles/profile_fields_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['profile_fields']->value['B'],'title'=>__("billing_address")), 0);?>

        </table>
    <?php } else { ?>
        &nbsp;
    <?php }?>
    </td>
    <td>&nbsp;</td>
    <td valign="top">
    <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['S']) {?>
        <p></p>
        <table>
            <?php echo $_smarty_tpl->getSubTemplate ("profiles/profile_fields_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['profile_fields']->value['S'],'title'=>__("shipping_address")), 0);?>

        </table>
    <?php } else { ?>
        &nbsp;
    <?php }?>
    </td>
</tr>
<?php }?>
</table>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="profiles/profiles_info.tpl" id="<?php echo smarty_function_set_id(array('name'=>"profiles/profiles_info.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><table cellpadding="0" cellspacing="0" border="0">
<tr>
    <td valign="top">
        <table cellpadding="1" cellspacing="1" border="0" width="100%">
        <tr>
            <td colspan="2" class="form-title"><?php echo $_smarty_tpl->__("user_account_info");?>
<hr size="1" noshade></td>
        </tr>
        <tr>
            <td class="form-field-caption" nowrap><?php echo $_smarty_tpl->__("email");?>
:&nbsp;</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['email'], ENT_QUOTES, 'UTF-8');?>
</td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['password']->value) {?>
        <tr>
            <td class="form-field-caption" nowrap><?php echo $_smarty_tpl->__("password");?>
:&nbsp;</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['password']->value, ENT_QUOTES, 'UTF-8');?>
</td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['quick_registration']=="Y") {?>
            <tr>
                <td class="form-field-caption" nowrap><?php echo $_smarty_tpl->__("login");?>
 <?php echo $_smarty_tpl->__("url");?>
:&nbsp;</td>
                <td><?php if ($_smarty_tpl->tpl_vars['user_data']->value['company_id']) {
echo htmlspecialchars(fn_url("?company_id=".((string)$_smarty_tpl->tpl_vars['user_data']->value['company_id']),'C','http'), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(fn_url('','C','http'), ENT_QUOTES, 'UTF-8');
}?></td>
            </tr>
        <?php }?>
        <?php if (!fn_allowed_for("ULTIMATE:FREE")) {?>
            <?php if ($_smarty_tpl->tpl_vars['user_data']->value['usergroups']) {?>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" class="form-title"><?php echo $_smarty_tpl->__("usergroups");?>
<hr size="1" noshade></td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars["user_usergroup"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["user_usergroup"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_data']->value['usergroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["user_usergroup"]->key => $_smarty_tpl->tpl_vars["user_usergroup"]->value) {
$_smarty_tpl->tpl_vars["user_usergroup"]->_loop = true;
?>
                    <tr>
                        <td class="form-field-caption" nowrap><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_usergroup']->value['usergroup'], ENT_QUOTES, 'UTF-8');?>
:&nbsp;</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['user_usergroup']->value['status']=='P') {
echo $_smarty_tpl->__("pending");
} else {
echo $_smarty_tpl->__("active");
}?></td>
                    </tr>
                <?php } ?>
            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['user_multiple_profiles']=='Y') {?>
        <tr>
            <td class="form-title"><?php echo $_smarty_tpl->__("profile_name");?>
:&nbsp;</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['profile_name'], ENT_QUOTES, 'UTF-8');?>
</td>
        </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user_data']->value['tax_exempt']=='Y') {?>
        <tr>
            <td class="form-title"><?php echo $_smarty_tpl->__("tax_exempt");?>
:&nbsp;</td>
            <td><?php echo $_smarty_tpl->__("yes");?>
</td>
        </tr>
        <?php }?>
        </table>
    </td>    
    <td colspan="2">&nbsp;</td>
</tr>
<tr>
    <td colspan="3">&nbsp;</td>
</tr>
</table>

<?php $_smarty_tpl->tpl_vars["profile_fields"] = new Smarty_variable(fn_get_profile_fields($_smarty_tpl->tpl_vars['user_data']->value['user_type']), null, 0);?>
<?php echo smarty_function_split(array('data'=>$_smarty_tpl->tpl_vars['profile_fields']->value['C'],'size'=>2,'assign'=>"contact_fields",'simple'=>true,'size_is_horizontal'=>true),$_smarty_tpl);?>

<table cellpadding="4" cellspacing="0" border="0" width="100%">
<?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['C']) {?>
    <tr>
        <td valign="top" width="50%">
            <table>
                <?php echo $_smarty_tpl->getSubTemplate ("profiles/profile_fields_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['contact_fields']->value[0],'title'=>__("contact_information")), 0);?>

            </table>
        </td>
        <td width="1%">&nbsp;</td>
        <td valign="top" width="49%">
            <?php if ($_smarty_tpl->tpl_vars['contact_fields']->value[1]) {?>
            <table>
                <?php echo $_smarty_tpl->getSubTemplate ("profiles/profile_fields_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['contact_fields']->value[1],'title'=>__("contact_information")), 0);?>

            </table>
            <?php }?>
        </td>
    </tr>
<?php }?>
<?php if (($_smarty_tpl->tpl_vars['profile_fields']->value['B']||$_smarty_tpl->tpl_vars['profile_fields']->value['S'])&&$_smarty_tpl->tpl_vars['user_data']->value['register_at_checkout']!="Y"&&!($_smarty_tpl->tpl_vars['created']->value&&$_smarty_tpl->tpl_vars['settings']->value['General']['quick_registration']=="Y")) {?>
<tr>
    <td valign="top">
    <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['B']) {?>
        <p></p>
        <table>
            <?php echo $_smarty_tpl->getSubTemplate ("profiles/profile_fields_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['profile_fields']->value['B'],'title'=>__("billing_address")), 0);?>

        </table>
    <?php } else { ?>
        &nbsp;
    <?php }?>
    </td>
    <td>&nbsp;</td>
    <td valign="top">
    <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['S']) {?>
        <p></p>
        <table>
            <?php echo $_smarty_tpl->getSubTemplate ("profiles/profile_fields_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['profile_fields']->value['S'],'title'=>__("shipping_address")), 0);?>

        </table>
    <?php } else { ?>
        &nbsp;
    <?php }?>
    </td>
</tr>
<?php }?>
</table>
<?php }?><?php }} ?>
