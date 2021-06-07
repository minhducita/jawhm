<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:39:12
         compiled from "/var/www/html/mypage/application/modules/default/views/schedule/makeparents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202980847555546d40bed859-38544854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a5eccd426ae82a5e6348aa45969d163b20ff73c' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/schedule/makeparents.tpl',
      1 => 1419238849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202980847555546d40bed859-38544854',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
    'title' => 0,
    'basic_info' => 0,
    'email_info' => 0,
    'school_info' => 0,
    'addr_info' => 0,
    'insurance_info' => 0,
    'visa_info' => 0,
    'emergency_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546d40c83f94_27523062',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546d40c83f94_27523062')) {function content_55546d40c83f94_27523062($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
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
		<h2 class="text-center"><span class="text-bold text-under span-center">学校等連絡先シート(ご家庭用)</span><br /></h2>
		<table border="1" class="agreement table-center">
			<tbody>
				<tr>
					<td><span class="item-name">氏名: </span></td>
					<td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['basic_info']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name">メールアドレス: </span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['email_info']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td><span class="item-name"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school_info']->value[4], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
電話連絡先: </span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school_info']->value[4], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
住所: </span></td>
					<td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[1], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[3], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['addr_info']->value[4], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td colspan="4"><span class="text-bold text-under">学校情報</span></td>
				</tr>
				<tr>
					<td><span class="item-name">学校名: </span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school_info']->value[3], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td><span class="item-name">コース名: </span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school_info']->value['memo'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name">就学期間: </span></td>
					<td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['school_info']->value['entrance_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 ～ <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school_info']->value['graduate_date'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td colspan="4"><span class="text-bold text-under">保険契約情報</span></td>
				</tr>
				<tr>
					<td><span class="item-name">保険会社名: </span></td>
					<td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['insurance_info']->value['provider_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name">契約証券番号: </span></td>
					<td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['insurance_info']->value['policy_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name">保険期間: </span></td>
					<td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['insurance_info']->value['insured_date_st'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 ～ <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['insurance_info']->value['insured_date_ed'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td colspan="4"><span class="text-bold text-under">ビザ情報</span></td>
				</tr>
				<tr>
					<td><span class="item-name">ビザの種類: </span></td>
					<td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['visa_info']->value['visa_type'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name">ビザナンバー: </span></td>
					<td colspan="3"><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['visa_info']->value['visa_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name">入国日: </span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['visa_info']->value['arrival_date'],"%G/%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td><span class="item-name">有効期限: </span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['visa_info']->value['visa_expiry_date'],"%G/%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
				<tr>
					<td><span class="item-name">緊急連絡先: </span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['emergency_info']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td><span class="item-name">パスポート番号: </span></td>
					<td><span class="item-value"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['visa_info']->value['passport_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html><?php }} ?>