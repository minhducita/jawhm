<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base herf="{$base}">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/user.css" media="all" /> 
  <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/common.css" media="all" /> 
  <title>{$title}</title>
</head>

<body>
	<div id="window-container">
		<h2 class="text-center"><span class="text-bold text-under span-center">OVERSEAS INSURANCE INFORMATION</span><br /></h2>
		<table border="1" class="agreement table-center">
			<tbody>
				<tr>
					<td><span class="item-name">CERT. NO.</span></td>
					<td><span class="item-value">{$insurance_info.policy_number}</span></td>
					<td colspan="2"><span class="item-name">CONTRACTED DATE</span></td>
					<td colspan="3"><span class="item-value">{$insurance_info.approval_date|date_format:"%G.%m.%d"}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">NAME</span></td>
					<td><span class="item-value">{$insurance_info.policy_owner}</span></td>
					<td><span class="item-name">PROVIDER NAME</span></td>
					<td colspan="4"><span class="item-value">{$insurance_info.provider_name_english}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">TEL. NO.</span></td>
					<td><span class="item-value">{$personal_info.2}</span></td>
					<td><span class="item-name">DATE OF BIRTH</span></td>
					<td><span class="item-value">{$personal_info.1|date_format:"%G.%m.%d"}</span></td>
					<td><span class="item-name">SEX</span></td>
					<td colspan="2"><span class="item-value">{if $personal_info.0 == 1}Male{else if $personal_info.0 == 2}Female{/if}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">CONTRACT TYPE</span></td>
					<td><span class="item-value">{$insurance_info.insurance_type}</span></td>
					<td><span class="item-name">PERIOD OF INSURANCE</span></td>
					<td colspan="4"><span class="item-value">{$insurance_info.insured_date_st|date_format:"%G.%m.%d"} - {$insurance_info.insured_date_ed|date_format:"%G.%m.%d"}</span></td>
			</tbody>
		</table>
		<p class="insurance">N.B. This page is not as a certificate of insurance.<br />
		These information is a objected to inform for you the person who contracted as a policy owner.</p>
	</div>
</body>

</html>