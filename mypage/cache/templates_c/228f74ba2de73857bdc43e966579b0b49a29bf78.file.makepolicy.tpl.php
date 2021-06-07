<?php /* Smarty version Smarty-3.1.13, created on 2015-06-04 11:39:05
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/makepolicy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:228180388556fba491b8033-14915686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '228f74ba2de73857bdc43e966579b0b49a29bf78' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/makepolicy.tpl',
      1 => 1419238838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '228180388556fba491b8033-14915686',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
    'title' => 0,
    'insurance_info' => 0,
    'personal_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556fba4927d448_99578352',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556fba4927d448_99578352')) {function content_556fba4927d448_99578352($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><!DOCTYPE HTML>
<html lang="ja">
<head>
  <base herf="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
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
		<h2 class="text-center"><span class="text-bold text-under span-center">OVERSEAS INSURANCE INFORMATION</span><br /></h2>
		<table border="1" class="agreement table-center">
			<tbody>
				<tr>
					<td><span class="item-name">CERT. NO.</span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['insurance_info']->value['policy_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td colspan="2"><span class="item-name">CONTRACTED DATE</span></td>
					<td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['insurance_info']->value['approval_date'],"%G.%m.%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name">NAME</span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['insurance_info']->value['policy_owner'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td><span class="item-name">PROVIDER NAME</span></td>
					<td colspan="4"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['insurance_info']->value['provider_name_english'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name">TEL. NO.</span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['personal_info']->value[2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td><span class="item-name">DATE OF BIRTH</span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['personal_info']->value[1],"%G.%m.%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td><span class="item-name">SEX</span></td>
					<td colspan="2"><span class="item-value"><?php if ($_smarty_tpl->tpl_vars['personal_info']->value[0]==1){?>Male<?php }elseif($_smarty_tpl->tpl_vars['personal_info']->value[0]==2){?>Female<?php }?></span></td>
				</tr>
				<tr>
					<td><span class="item-name">CONTRACT TYPE</span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['insurance_info']->value['insurance_type'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td><span class="item-name">PERIOD OF INSURANCE</span></td>
					<td colspan="4"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['insurance_info']->value['insured_date_st'],"%G.%m.%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 - <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['insurance_info']->value['insured_date_ed'],"%G.%m.%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
			</tbody>
		</table>
		<p class="insurance">N.B. This page is not as a certificate of insurance.<br />
		These information is a objected to inform for you the person who contracted as a policy owner.</p>
	</div>
</body>

</html><?php }} ?>