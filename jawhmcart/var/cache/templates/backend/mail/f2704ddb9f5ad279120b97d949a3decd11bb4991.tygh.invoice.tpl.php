<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:41:12
         compiled from "/var/www/html/jawhmcart/design/backend/mail/templates/orders/invoice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118354119956e662f5d79cf1-26391160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2704ddb9f5ad279120b97d949a3decd11bb4991' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/mail/templates/orders/invoice.tpl',
      1 => 1457948470,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '118354119956e662f5d79cf1-26391160',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e662f656c314_07781293',
  'variables' => 
  array (
    'order_info' => 0,
    'status_settings' => 0,
    'order_status' => 0,
    'company_data' => 0,
    'doc_id_text' => 0,
    'settings' => 0,
    'payment_method' => 0,
    'shipping' => 0,
    'shipments' => 0,
    'tracking_number_exists' => 0,
    'use_shipments' => 0,
    'profile_fields' => 0,
    'profields_c' => 0,
    'profields_b' => 0,
    'profields_s' => 0,
    'oi' => 0,
    'key' => 0,
    'tax_data' => 0,
    'take_surcharge_from_vendor' => 0,
    'language_direction' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e662f656c314_07781293')) {function content_56e662f656c314_07781293($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_modifier_replace')) include '/var/www/html/jawhmcart/app/lib/vendor/smarty/smarty/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.date_format.php';
?><?php
fn_preload_lang_vars(array('invoice','invoice','credit_memo','credit_memo','order_details','phone1_label','phone2_label','fax','web_site','email','order','status','date','payment_method','shipping_method','tracking_number','customer','phone','fax','company','url','bill_to','ship_to','product','quantity','unit_price','discount','tax','subtotal','deleted_product','sku','free','free','subtotal','including_discount','order_discount','coupon','taxes','included','tax_exempt','payment_surcharge','shipping_cost','total_cost','customer_notes'));
?>
<?php if ($_smarty_tpl->tpl_vars['order_info']->value) {?>

<?php $_smarty_tpl->tpl_vars["order_header"] = new Smarty_variable($_smarty_tpl->__("invoice"), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']=="I"&&$_smarty_tpl->tpl_vars['order_info']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']]) {?>
    <?php ob_start();
echo $_smarty_tpl->__("invoice");
$_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["doc_id_text"] = new Smarty_variable($_tmp1." #".((string)$_smarty_tpl->tpl_vars['order_info']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']]), null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']=="C"&&$_smarty_tpl->tpl_vars['order_info']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']]) {?>
    <?php ob_start();
echo $_smarty_tpl->__("credit_memo");
$_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["doc_id_text"] = new Smarty_variable($_tmp2." #".((string)$_smarty_tpl->tpl_vars['order_info']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']]), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["order_header"] = new Smarty_variable($_smarty_tpl->__("credit_memo"), null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']=="O") {?>
    <?php $_smarty_tpl->tpl_vars["order_header"] = new Smarty_variable($_smarty_tpl->__("order_details"), null, 0);?>
<?php }?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="main-table" style="height: 100%; background-color: #f4f6f8; font-size: 12px; font-family: Arial;">
<tr>
    <td align="center" style="width: 100%; height: 100%;">
	<table cellpadding="0" cellspacing="0" border="0" style=" width: 602px; table-layout: fixed; margin: 24px 0 24px 0;">
    <tr>
        <td style="background-color: #ffffff; border: 1px solid #e6e6e6; margin: 0px auto 0px auto; padding: 0px 44px 0px 46px; text-align: left;">
            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding: 27px 0px 0px 0px; border-bottom: 1px solid #868686; margin-bottom: 8px;">
            <tr>
                <td align="left" style="padding-bottom: 3px;" valign="middle">
					<img style="width:150px"  src="https://www.jawhm.or.jp/jawhmcart/images/jawhm.jpg">
					
				</td>                
				<td width="100%" valign="bottom" style="text-align: right;  font: bold 26px Arial; text-transform: uppercase;  margin: 0px;">
					<?php if ($_smarty_tpl->tpl_vars['order_status']->value['status']=='A'||$_smarty_tpl->tpl_vars['order_status']->value['status']=='C') {?>
						PAYMENT STATEMENT
					<?php } else { ?>
						INVOICE
					<?php }?>
				</td>
            </tr>
            </table>

            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr valign="top">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:invoice_company_info")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:invoice_company_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <td style="width: 50%; padding: 14px 0px 0px 2px; font-size: 12px; font-family: Arial;">
                    <h2 style="font: bold 12px Arial; margin: 0px 0px 3px 0px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_name'], ENT_QUOTES, 'UTF-8');?>
</h2>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_address'], ENT_QUOTES, 'UTF-8');?>
<br />
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_city'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['company_data']->value['company_city']&&($_smarty_tpl->tpl_vars['company_data']->value['company_state_descr']||$_smarty_tpl->tpl_vars['company_data']->value['company_zipcode'])) {?>,<?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_state_descr'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_zipcode'], ENT_QUOTES, 'UTF-8');?>
<br />
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_country_descr'], ENT_QUOTES, 'UTF-8');?>

                    <table cellpadding="0" cellspacing="0" border="0">
                    <?php if ($_smarty_tpl->tpl_vars['company_data']->value['company_phone']) {?>
                    <tr valign="top">
                        <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px;    white-space: nowrap;"><?php echo $_smarty_tpl->__("phone1_label");?>
:</td>
                        <td width="100%" style="font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_phone'], ENT_QUOTES, 'UTF-8');?>
</td>
                    </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['company_data']->value['company_phone_2']) {?>
                    <tr valign="top">
                        <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px; white-space: nowrap;"><?php echo $_smarty_tpl->__("phone2_label");?>
:</td>
                        <td width="100%" style="font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_phone_2'], ENT_QUOTES, 'UTF-8');?>
</td>
                    </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['company_data']->value['company_fax']) {?>
                    <tr valign="top">
                        <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px; white-space: nowrap;"><?php echo $_smarty_tpl->__("fax");?>
:</td>
                        <td width="100%" style="font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_fax'], ENT_QUOTES, 'UTF-8');?>
</td>
                    </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['company_data']->value['company_website']) {?>
                    <tr valign="top">
                        <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px; white-space: nowrap;"><?php echo $_smarty_tpl->__("web_site");?>
:</td>
                        <td width="100%" style="font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_website'], ENT_QUOTES, 'UTF-8');?>
</td>
                    </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['company_data']->value['company_orders_department']) {?>
                    <tr valign="top">
                        <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px; white-space: nowrap;"><?php echo $_smarty_tpl->__("email");?>
:</td>
                        <td width="100%" style="font-size: 12px; font-family: Arial;"><a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_orders_department'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['company_data']->value['company_orders_department'],",","<br>")," ",''), ENT_QUOTES, 'UTF-8');?>
</a></td>
                    </tr>
                    <?php }?>
                    </table>
                </td>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:invoice_company_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:invoice_order_status_info")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:invoice_order_status_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <td style="padding-top: 14px;">
                    <h2 style="font: bold 17px Tahoma; margin: 0px;"><?php if ($_smarty_tpl->tpl_vars['doc_id_text']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['doc_id_text']->value, ENT_QUOTES, 'UTF-8');?>
 <br /><?php }
echo $_smarty_tpl->__("order");?>
&nbsp;#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
</h2>
                    <table cellpadding="0" cellspacing="0" border="0">
                    <tr valign="top">
                        <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px; white-space: nowrap;"><?php echo $_smarty_tpl->__("status");?>
:</td>
                        <td width="100%" style="font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_status']->value['description'], ENT_QUOTES, 'UTF-8');?>
</td>
                    </tr>
                    <tr valign="top">
                        <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px; white-space: nowrap;"><?php echo $_smarty_tpl->__("date");?>
:</td>
                        <td style="font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['order_info']->value['timestamp'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format']).", ".((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['time_format'])), ENT_QUOTES, 'UTF-8');?>
</td>
                    </tr>
                    <tr valign="top">
                        <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px; white-space: nowrap;"><?php echo $_smarty_tpl->__("payment_method");?>
:</td>
                        <td style="font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['payment_method']->value['payment'])===null||$tmp==='' ? " - " : $tmp), ENT_QUOTES, 'UTF-8');?>
</td>
                    </tr>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['shipping']) {?>
                    <tr valign="top">
                        <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px; white-space: nowrap;"><?php echo $_smarty_tpl->__("shipping_method");?>
:</td>
                        <td style="font-size: 12px; font-family: Arial;">
                            <?php  $_smarty_tpl->tpl_vars["shipping"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["shipping"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_info']->value['shipping']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["shipping"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["shipping"]->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars["shipping"]->key => $_smarty_tpl->tpl_vars["shipping"]->value) {
$_smarty_tpl->tpl_vars["shipping"]->_loop = true;
 $_smarty_tpl->tpl_vars["shipping"]->iteration++;
 $_smarty_tpl->tpl_vars["shipping"]->last = $_smarty_tpl->tpl_vars["shipping"]->iteration === $_smarty_tpl->tpl_vars["shipping"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["f_shipp"]['last'] = $_smarty_tpl->tpl_vars["shipping"]->last;
?>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['shipping'], ENT_QUOTES, 'UTF-8');
if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['f_shipp']['last']) {?>, <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['shipments']->value[$_smarty_tpl->tpl_vars['shipping']->value['group_key']]['tracking_number']) {
$_smarty_tpl->tpl_vars["tracking_number_exists"] = new Smarty_variable("Y", null, 0);
}?>
                            <?php } ?></td>
                    </tr>
                    <?php if ($_smarty_tpl->tpl_vars['tracking_number_exists']->value&&!$_smarty_tpl->tpl_vars['use_shipments']->value) {?>
                        <tr valign="top">
                            <td style="font-size: 12px; font-family: verdana, helvetica, arial, sans-serif; text-transform: uppercase; color: #000000; padding-right: 10px; white-space: nowrap;"><?php echo $_smarty_tpl->__("tracking_number");?>
:</td>
                            <td style="font-size: 12px; font-family: Arial;">
                                <?php  $_smarty_tpl->tpl_vars["shipping"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["shipping"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_info']->value['shipping']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["shipping"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["shipping"]->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars["shipping"]->key => $_smarty_tpl->tpl_vars["shipping"]->value) {
$_smarty_tpl->tpl_vars["shipping"]->_loop = true;
 $_smarty_tpl->tpl_vars["shipping"]->iteration++;
 $_smarty_tpl->tpl_vars["shipping"]->last = $_smarty_tpl->tpl_vars["shipping"]->iteration === $_smarty_tpl->tpl_vars["shipping"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["f_shipp"]['last'] = $_smarty_tpl->tpl_vars["shipping"]->last;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['shipments']->value[$_smarty_tpl->tpl_vars['shipping']->value['group_key']]['tracking_number']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['shipments']->value[$_smarty_tpl->tpl_vars['shipping']->value['group_key']]['tracking_number'], ENT_QUOTES, 'UTF-8');
if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['f_shipp']['last']) {?>,<?php }
}?>
                                <?php } ?></td>
                        </tr>
                    <?php }?>
                    <?php }?>
                    </table>
                </td>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:invoice_order_status_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </tr>
            </table>
        
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:invoice_customer_info")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:invoice_customer_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if (!$_smarty_tpl->tpl_vars['profile_fields']->value) {?>
            <?php $_smarty_tpl->tpl_vars["profile_fields"] = new Smarty_variable(fn_get_profile_fields('I'), null, 0);?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value) {?>
            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding: 32px 0px 24px 0px;">
            <tr valign="top">
                <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['C']) {?>
                <?php $_smarty_tpl->tpl_vars["profields_c"] = new Smarty_variable(fn_fields_from_multi_level($_smarty_tpl->tpl_vars['profile_fields']->value['C'],"field_name","field_id"), null, 0);?>
                <td width="33%" style="font-size: 12px; font-family: Arial;">
                    <h3 style="font: bold 17px Tahoma; padding: 0px 0px 3px 1px; margin: 0px;"><?php echo $_smarty_tpl->__("customer");?>
:</h3>
                    <p style="margin: 2px 0px 3px 0px;"><?php if ($_smarty_tpl->tpl_vars['profields_c']->value['firstname']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['firstname'], ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php }
if ($_smarty_tpl->tpl_vars['profields_c']->value['lastname']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['lastname'], ENT_QUOTES, 'UTF-8');
}?></p>
                    <?php if ($_smarty_tpl->tpl_vars['profields_c']->value['email']) {?><p style="margin: 2px 0px 3px 0px;"><a href="mailto:<?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['order_info']->value['email']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['email'], ENT_QUOTES, 'UTF-8');?>
</a></p><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profields_c']->value['phone']) {?><p style="margin: 2px 0px 3px 0px;"><span style="text-transform: uppercase;"><?php echo $_smarty_tpl->__("phone");?>
:</span>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['phone'], ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profields_c']->value['fax']&&$_smarty_tpl->tpl_vars['order_info']->value['fax']) {?><p style="margin: 2px 0px 3px 0px;"><span style="text-transform: uppercase;"><?php echo $_smarty_tpl->__("fax");?>
:</span>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['fax'], ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profields_c']->value['company']&&$_smarty_tpl->tpl_vars['order_info']->value['company']) {?><p style="margin: 2px 0px 3px 0px;"><span style="text-transform: uppercase;"><?php echo $_smarty_tpl->__("company");?>
:</span>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['company'], ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['profields_c']->value['url']&&$_smarty_tpl->tpl_vars['order_info']->value['url']) {?><p style="margin: 2px 0px 3px 0px;"><span style="text-transform: uppercase;"><?php echo $_smarty_tpl->__("url");?>
:</span>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['url'], ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("profiles/profiles_extra_fields.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['profile_fields']->value['C']), 0);?>

                </td>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['B']) {?>
                <?php $_smarty_tpl->tpl_vars["profields_b"] = new Smarty_variable(fn_fields_from_multi_level($_smarty_tpl->tpl_vars['profile_fields']->value['B'],"field_name","field_id"), null, 0);?>
                <td width="34%" style="font-size: 12px; font-family: Arial; <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['S']) {?>padding-right: 10px;<?php }?> <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['C']) {?>padding-left: 10px;<?php }?>">
                    <h3 style="font: bold 17px Tahoma; padding: 0px 0px 3px 1px; margin: 0px;"><?php echo $_smarty_tpl->__("bill_to");?>
:</h3>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['b_firstname']&&$_smarty_tpl->tpl_vars['profields_b']->value['b_firstname']||$_smarty_tpl->tpl_vars['order_info']->value['b_lastname']&&$_smarty_tpl->tpl_vars['profields_b']->value['b_lastname']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php if ($_smarty_tpl->tpl_vars['profields_b']->value['b_firstname']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['b_firstname'], ENT_QUOTES, 'UTF-8');?>
 <?php }
if ($_smarty_tpl->tpl_vars['profields_b']->value['b_lastname']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['b_lastname'], ENT_QUOTES, 'UTF-8');
}?>
                    </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['b_address']&&$_smarty_tpl->tpl_vars['profields_b']->value['b_address']||$_smarty_tpl->tpl_vars['order_info']->value['b_address_2']&&$_smarty_tpl->tpl_vars['profields_b']->value['b_address_2']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php if ($_smarty_tpl->tpl_vars['profields_b']->value['b_address']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['b_address'], ENT_QUOTES, 'UTF-8');?>
 <?php }
if ($_smarty_tpl->tpl_vars['profields_b']->value['b_address_2']) {?><br /><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['b_address_2'], ENT_QUOTES, 'UTF-8');
}?>
                    </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['b_city']&&$_smarty_tpl->tpl_vars['profields_b']->value['b_city']||$_smarty_tpl->tpl_vars['order_info']->value['b_state_descr']&&$_smarty_tpl->tpl_vars['profields_b']->value['b_state']||$_smarty_tpl->tpl_vars['order_info']->value['b_zipcode']&&$_smarty_tpl->tpl_vars['profields_b']->value['b_zipcode']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php if ($_smarty_tpl->tpl_vars['profields_b']->value['b_city']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['b_city'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['profields_b']->value['b_state']) {?>,<?php }?> <?php }
if ($_smarty_tpl->tpl_vars['profields_b']->value['b_state']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['b_state_descr'], ENT_QUOTES, 'UTF-8');?>
 <?php }
if ($_smarty_tpl->tpl_vars['profields_b']->value['b_zipcode']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['b_zipcode'], ENT_QUOTES, 'UTF-8');
}?>
                    </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['b_country_descr']&&$_smarty_tpl->tpl_vars['profields_b']->value['b_country']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['b_country_descr'], ENT_QUOTES, 'UTF-8');?>

                    </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['b_phone']&&$_smarty_tpl->tpl_vars['profields_b']->value['b_phone']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php if ($_smarty_tpl->tpl_vars['profields_b']->value['b_phone']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['b_phone'], ENT_QUOTES, 'UTF-8');?>
 <?php }?>
                    </p>
                    <?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("profiles/profiles_extra_fields.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['profile_fields']->value['B']), 0);?>

                </td>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['profile_fields']->value['S']) {?>
                <?php $_smarty_tpl->tpl_vars["profields_s"] = new Smarty_variable(fn_fields_from_multi_level($_smarty_tpl->tpl_vars['profile_fields']->value['S'],"field_name","field_id"), null, 0);?>
                <td width="33%" style="font-size: 12px; font-family: Arial;">
                    <h3 style="font: bold 17px Tahoma; padding: 0px 0px 3px 1px; margin: 0px;"><?php echo $_smarty_tpl->__("ship_to");?>
:</h3>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['s_firstname']&&$_smarty_tpl->tpl_vars['profields_s']->value['s_firstname']||$_smarty_tpl->tpl_vars['order_info']->value['s_lastname']&&$_smarty_tpl->tpl_vars['profields_s']->value['s_lastname']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php if ($_smarty_tpl->tpl_vars['profields_s']->value['s_firstname']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['s_firstname'], ENT_QUOTES, 'UTF-8');?>
 <?php }
if ($_smarty_tpl->tpl_vars['profields_s']->value['s_lastname']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['s_lastname'], ENT_QUOTES, 'UTF-8');
}?>
                    </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['s_address']&&$_smarty_tpl->tpl_vars['profields_s']->value['s_address']||$_smarty_tpl->tpl_vars['order_info']->value['s_address_2']&&$_smarty_tpl->tpl_vars['profields_s']->value['s_address_2']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php if ($_smarty_tpl->tpl_vars['profields_s']->value['s_address']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['s_address'], ENT_QUOTES, 'UTF-8');?>
 <?php }
if ($_smarty_tpl->tpl_vars['profields_s']->value['s_address_2']) {?><br /><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['s_address_2'], ENT_QUOTES, 'UTF-8');
}?>
                    </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['s_city']&&$_smarty_tpl->tpl_vars['profields_s']->value['s_city']||$_smarty_tpl->tpl_vars['order_info']->value['s_state_descr']&&$_smarty_tpl->tpl_vars['profields_s']->value['s_state']||$_smarty_tpl->tpl_vars['order_info']->value['s_zipcode']&&$_smarty_tpl->tpl_vars['profields_s']->value['s_zipcode']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php if ($_smarty_tpl->tpl_vars['profields_s']->value['s_city']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['s_city'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['profields_s']->value['s_state']) {?>,<?php }?> <?php }
if ($_smarty_tpl->tpl_vars['profields_s']->value['s_state']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['s_state_descr'], ENT_QUOTES, 'UTF-8');?>
 <?php }
if ($_smarty_tpl->tpl_vars['profields_s']->value['s_zipcode']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['s_zipcode'], ENT_QUOTES, 'UTF-8');
}?>
                    </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['s_country_descr']&&$_smarty_tpl->tpl_vars['profields_s']->value['s_country']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['s_country_descr'], ENT_QUOTES, 'UTF-8');?>

                    </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['s_phone']&&$_smarty_tpl->tpl_vars['profields_s']->value['s_phone']) {?>
                    <p style="margin: 2px 0px 3px 0px;">
                        <?php if ($_smarty_tpl->tpl_vars['profields_s']->value['s_phone']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['s_phone'], ENT_QUOTES, 'UTF-8');?>
 <?php }?>
                    </p>
                    <?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("profiles/profiles_extra_fields.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('fields'=>$_smarty_tpl->tpl_vars['profile_fields']->value['S']), 0);?>

                </td>
                <?php }?>
            </tr>
            </table>
            <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:invoice_customer_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            
        
        
            
            
            <table width="100%" cellpadding="0" cellspacing="1" style="background-color: #dddddd;">
            <tr>
                <th width="70%" style="background-color: #eeeeee; padding: 6px 10px; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->__("product");?>
</th>
                <th style="background-color: #eeeeee; padding: 6px 10px; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->__("quantity");?>
</th>
                <th style="background-color: #eeeeee; padding: 6px 10px; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->__("unit_price");?>
</th>
                <?php if ($_smarty_tpl->tpl_vars['order_info']->value['use_discount']) {?>
                    <th style="background-color: #eeeeee; padding: 6px 10px; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->__("discount");?>
</th>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['order_info']->value['taxes']&&$_smarty_tpl->tpl_vars['settings']->value['General']['tax_calculation']!="subtotal") {?>
                    <th style="background-color: #eeeeee; padding: 6px 10px; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->__("tax");?>
</th>
                <?php }?>
                <th style="background-color: #eeeeee; padding: 6px 10px; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->__("subtotal");?>
</th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars["oi"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["oi"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_info']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["oi"]->key => $_smarty_tpl->tpl_vars["oi"]->value) {
$_smarty_tpl->tpl_vars["oi"]->_loop = true;
?>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:items_list_row")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:items_list_row"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php if (!$_smarty_tpl->tpl_vars['oi']->value['extra']['parent']) {?>
                <tr>
                    <td style="padding: 5px 10px; background-color: #ffffff; font-size: 12px; font-family: Arial;">
                        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['oi']->value['product'])===null||$tmp==='' ? $_smarty_tpl->__("deleted_product") : $tmp);?>

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:product_info")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:product_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <?php if ($_smarty_tpl->tpl_vars['oi']->value['product_code']) {?><p style="margin: 2px 0px 3px 0px;"><?php echo $_smarty_tpl->__("sku");?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['oi']->value['product_code'], ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:product_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        <?php if ($_smarty_tpl->tpl_vars['oi']->value['product_options']) {?><br/><?php echo $_smarty_tpl->getSubTemplate ("common/options_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_options'=>$_smarty_tpl->tpl_vars['oi']->value['product_options']), 0);
}?>
                    </td>
                    <td style="padding: 5px 10px; background-color: #ffffff; text-align: center; font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['oi']->value['amount'], ENT_QUOTES, 'UTF-8');?>
</td>
                    <td style="padding: 5px 10px; background-color: #ffffff; text-align: right; font-size: 12px; font-family: Arial;"><?php if ($_smarty_tpl->tpl_vars['oi']->value['extra']['exclude_from_calculate']) {
echo $_smarty_tpl->__("free");
} else {
echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['oi']->value['original_price']), 0);
}?></td>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['use_discount']) {?>
                    <td style="padding: 5px 10px; background-color: #ffffff; text-align: right; font-size: 12px; font-family: Arial;"><?php if (floatval($_smarty_tpl->tpl_vars['oi']->value['extra']['discount'])) {
echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['oi']->value['extra']['discount']), 0);
} else { ?>&nbsp;-&nbsp;<?php }?></td>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order_info']->value['taxes']&&$_smarty_tpl->tpl_vars['settings']->value['General']['tax_calculation']!="subtotal") {?>
                        <td style="padding: 5px 10px; background-color: #ffffff; text-align: right; font-size: 12px; font-family: Arial;"><?php if ($_smarty_tpl->tpl_vars['oi']->value['tax_value']) {
echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['oi']->value['tax_value']), 0);
} else { ?>&nbsp;-&nbsp;<?php }?></td>
                    <?php }?>
        
                    <td style="padding: 5px 10px; background-color: #ffffff; text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><b><?php if ($_smarty_tpl->tpl_vars['oi']->value['extra']['exclude_from_calculate']) {
echo $_smarty_tpl->__("free");
} else {
echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['oi']->value['display_subtotal']), 0);
}?></b>&nbsp;</td>
                </tr>
                <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:items_list_row"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php } ?>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:extra_list")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:extra_list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:extra_list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </table>
        
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:ordered_products")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:ordered_products"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:ordered_products"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            
        
            
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td align="right">
                <table border="0" style="padding: 3px 0px 12px 0px;">
                <tr>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><b><?php echo $_smarty_tpl->__("subtotal");?>
:</b>&nbsp;</td>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['order_info']->value['display_subtotal']), 0);?>
</td>
                </tr>
                <?php if (floatval($_smarty_tpl->tpl_vars['order_info']->value['discount'])) {?>
                <tr>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><b><?php echo $_smarty_tpl->__("including_discount");?>
:</b>&nbsp;</td>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;">
                        <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['order_info']->value['discount']), 0);?>
</td>
                </tr>
                <?php }?>

            
                <?php if (floatval($_smarty_tpl->tpl_vars['order_info']->value['subtotal_discount'])) {?>
                <tr>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->__("order_discount");?>
:</td>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;">
                        <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['order_info']->value['subtotal_discount']), 0);?>
</td>
                </tr>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['order_info']->value['coupons']) {?>
                <?php  $_smarty_tpl->tpl_vars["coupon"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["coupon"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_info']->value['coupons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["coupon"]->key => $_smarty_tpl->tpl_vars["coupon"]->value) {
$_smarty_tpl->tpl_vars["coupon"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["coupon"]->key;
?>
                <tr>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><b><?php echo $_smarty_tpl->__("coupon");?>
:</b>&nbsp;</td>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
</td>
                </tr>
                <?php } ?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['order_info']->value['taxes']) {?>
                <tr>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><b><?php echo $_smarty_tpl->__("taxes");?>
:</b>&nbsp;</td>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;">&nbsp;</td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['tax_data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tax_data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_info']->value['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tax_data']->key => $_smarty_tpl->tpl_vars['tax_data']->value) {
$_smarty_tpl->tpl_vars['tax_data']->_loop = true;
?>
                <tr>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax_data']->value['description'], ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php echo $_smarty_tpl->getSubTemplate ("common/modifier.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('mod_value'=>$_smarty_tpl->tpl_vars['tax_data']->value['rate_value'],'mod_type'=>$_smarty_tpl->tpl_vars['tax_data']->value['rate_type']), 0);
if ($_smarty_tpl->tpl_vars['tax_data']->value['price_includes_tax']=="Y"&&($_smarty_tpl->tpl_vars['settings']->value['Appearance']['cart_prices_w_taxes']!="Y"||$_smarty_tpl->tpl_vars['settings']->value['General']['tax_calculation']=="subtotal")) {?>&nbsp;<?php echo $_smarty_tpl->__("included");
}
if ($_smarty_tpl->tpl_vars['tax_data']->value['regnumber']) {?>&nbsp;(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax_data']->value['regnumber'], ENT_QUOTES, 'UTF-8');?>
)<?php }?>:&nbsp;</td>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['tax_data']->value['tax_subtotal']), 0);?>
</td>
                </tr>
                <?php } ?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['order_info']->value['tax_exempt']=='Y') {?>
                <tr>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><b><?php echo $_smarty_tpl->__("tax_exempt");?>
</b></td>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;">&nbsp;</td>
                </tr>
                <?php }?>
            
                <?php if (floatval($_smarty_tpl->tpl_vars['order_info']->value['payment_surcharge'])&&!$_smarty_tpl->tpl_vars['take_surcharge_from_vendor']->value) {?>
                <tr>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['order_info']->value['payment_method']['surcharge_title'])===null||$tmp==='' ? $_smarty_tpl->__("payment_surcharge") : $tmp), ENT_QUOTES, 'UTF-8');?>
:&nbsp;</td>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><b><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['order_info']->value['payment_surcharge']), 0);?>
</b></td>
                </tr>
                <?php }?>
            
            
                <?php if ($_smarty_tpl->tpl_vars['order_info']->value['shipping']) {?>
                <tr>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><b><?php echo $_smarty_tpl->__("shipping_cost");?>
:</b>&nbsp;</td>
                    <td style="text-align: right; white-space: nowrap; font-size: 12px; font-family: Arial;"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['order_info']->value['display_shipping_cost']), 0);?>
</td>
                </tr>
                <?php }?>
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:totals")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:totals"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:totals"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                
                <tr>
                    <td colspan="2"><hr style="border: 0px solid #d5d5d5; border-top-width: 1px;" /></td>
                </tr>
                <tr>
                    <td style="text-align: right; white-space: nowrap; font: 15px Tahoma; text-align: right;"><?php echo $_smarty_tpl->__("total_cost");?>
:&nbsp;</td>
                    <td style="text-align: right; white-space: nowrap; font: 15px Tahoma; text-align: right;"><strong style="font: bold 17px Tahoma;"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['order_info']->value['total']), 0);?>
</strong></td>
                </tr>
                </table>
                </td>
            </tr>
            </table>
        
            
        
            <?php if ($_smarty_tpl->tpl_vars['order_info']->value['notes']) {?>
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr valign="top">
                <td style="font-size: 12px; font-family: Arial;"><strong><?php echo $_smarty_tpl->__("customer_notes");?>
:</strong></td>
            </tr>
            <tr valign="top">
                <td><div style="overflow-x: auto; clear: both; width: 510px; height: 100%; padding-bottom: 20px; overflow-y: hidden; font-size: 12px; font-family: Arial;"><?php echo nl2br($_smarty_tpl->tpl_vars['order_info']->value['notes']);?>
</div></td>
            </tr>
            </table>
            <?php }?>
        <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['order_status']->value['status']!='A'&&$_smarty_tpl->tpl_vars['order_status']->value['status']!='C') {?>
		<div style='border:1px solid #333;padding:10px;line-height:18px;'>
			<p style='padding-bottom: 10px;border-bottom:1px solid #333'> <b> Bank detail <b> </p>
			<p style='margin-bottom:10px;'> Bank Transfer Instructions </p>
			<p style='margin-bottom:10px;line-height:20px;'>
				BANK NAME：SUMITOMO MITSUI BANKING CORPORATION<br>
				（SWIFTコード：SMBC JP JT) <br>
				BANK BRANCH：　Shinjuku BRANCH <br>
				BANK ADDRESS：1-24-3 SHINJUKUSANCHOME　SHINJUKU-KU　TOKYO　JAPAN　160-0022 <br>
			</p>
			<p style='margin-bottom:10px;line-height:20px;'>
				受取人口座名義： 一般社団法人日本ワーキングホリデー協会 <br>
				BANEFICIARY NAME: JAPAN ASSOCIATION FOR WORKING HOLIDAY MAKERS <br>
				BRANCH NO. 221 ACCOUNT　NO．4246828 <br>
				ADDRESS FOR JAPAN ASSOCATION FOR WORKING HOLIDAY MAKERS: <br>
				507-1-3-3 NISHISHINJKU SHINJUKU-KU TOKYO JAPAN 160-0023 <br>
				Beneficiary'sTEL: 03-6304-5858 <br>
				海外の金融機関から日本国内へ送金される場合、AWB番号、Routing番号、ABA、IBAN、SORT等は特に必要ございません
			</p>
			<p> Your order will not be processed until we receive payment. </p>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['order_status']->value['status']=='C'||$_smarty_tpl->tpl_vars['order_status']->value['status']=='A') {?>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" style="direction: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_direction']->value, ENT_QUOTES, 'UTF-8');?>
;">
				<tr valign="top">
					<td style="text-align:right"><img style="width:100px"  src="https://www.jawhm.or.jp/jawhmcart/images/paid.jpg"> </td>
				</tr>
            </table>
		<?php }?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:invoice")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:invoice"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:invoice"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </td>
    </tr>
    </table>
    </td>
</tr>
</table><?php }} ?>
