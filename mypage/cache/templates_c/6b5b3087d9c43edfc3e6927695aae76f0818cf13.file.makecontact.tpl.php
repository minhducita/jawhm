<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:35:23
         compiled from "/var/www/html/mypage/application/modules/default/views/schedule/makecontact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57244672355546c5b3ace94-45274178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b5b3087d9c43edfc3e6927695aae76f0818cf13' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/schedule/makecontact.tpl',
      1 => 1419238849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57244672355546c5b3ace94-45274178',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
    'title' => 0,
    'basic_info' => 0,
    'email_info' => 0,
    'country' => 0,
    'addr_info' => 0,
    'insurance_info' => 0,
    'visa_info' => 0,
    'emergency_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546c5b4ba798_77429453',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546c5b4ba798_77429453')) {function content_55546c5b4ba798_77429453($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><!DOCTYPE HTML>
<html lang="ja">
<head>
  <base href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/css/user.css" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/css/common.css" media="all" />
  <title><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</title>
</head>

<body>
    <div id="window-container">
        <h2 class="text-center"><span class="text-bold text-under span-center">CLIENT CONTACT SHEET</span><br /></h2>
        <table border="1" class="agreement table-center">
            <tbody>
                <tr>
                    <td><span class="item-name">First Name: </span></td>
                    <td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['basic_info']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                    <td><span class="item-name">Last Name: </span></td>
                    <td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['basic_info']->value[1], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Email Address: </span></td>
                    <td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['email_info']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                    <td><span class="item-name">Call Phone # <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['country']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
: </span></td>
                    <td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Home Address: </span></td>
                    <td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[1], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[3], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[4], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
                <tr>
                    <td colspan="4"><span class="text-bold text-under">INSURANCE</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">provider Name: </span></td>
                    <td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['insurance_info']->value['provider_name_english'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Policy No.: </span></td>
                    <td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['insurance_info']->value['policy_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Policy Period: </span></td>
                    <td colspan="3"><span class="item-value">From <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['insurance_info']->value['insured_date_st'],"%G/%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 To <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['insurance_info']->value['insured_date_ed'],"%G/%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
                <tr>
                    <td colspan="4"><span class="text-bold text-under">VISA</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Visa Type: </span></td>
                    <td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['visa_info']->value['visa_type_english'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Visa No.: </span></td>
                    <td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['visa_info']->value['visa_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Arrival Date: </span></td>
                    <td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['visa_info']->value['arrival_date'],"%G/%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                    <td><span class="item-name">Visa Expiry Date: </span></td>
                    <td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['visa_info']->value['visa_expiry_date'],"%G/%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Emergency Contact: </span></td>
                    <td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['emergency_info']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                    <td><span class="item-name">Passport No.: </span></td>
                    <td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['visa_info']->value['passport_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html><?php }} ?>