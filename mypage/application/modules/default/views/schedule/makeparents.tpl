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
		<h2 class="text-center"><span class="text-bold text-under span-center">学校等連絡先シート(ご家庭用)</span><br /></h2>
		<table border="1" class="agreement table-center">
			<tbody>
				<tr>
					<td><span class="item-name">氏名: </span></td>
					<td colspan="3"><span class="item-value">{$basic_info.0}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">メールアドレス: </span></td>
					<td><span class="item-value">{$email_info.0}</span></td>
					<td><span class="item-name">{$school_info.4}電話連絡先: </span></td>
					<td><span class="item-value">{$addr_info.0}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">{$school_info.4}住所: </span></td>
					<td colspan="3"><span class="item-value">{$addr_info.1} {$addr_info.2} {$addr_info.3} {$addr_info.4}</span></td>
				</tr>
				<tr>
					<td colspan="4"><span class="text-bold text-under">学校情報</span></td>
				</tr>
				<tr>
					<td><span class="item-name">学校名: </span></td>
					<td><span class="item-value">{$school_info.3}</span></td>
					<td><span class="item-name">コース名: </span></td>
					<td><span class="item-value">{$school_info.memo}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">就学期間: </span></td>
					<td colspan="3"><span class="item-value">{$school_info.entrance_date|date_format:"%G年%m月%d日"} ～ {$school_info.graduate_date}</span></td>
				</tr>
				<tr>
					<td colspan="4"><span class="text-bold text-under">保険契約情報</span></td>
				</tr>
				<tr>
					<td><span class="item-name">保険会社名: </span></td>
					<td colspan="3"><span class="item-value">{$insurance_info.provider_name}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">契約証券番号: </span></td>
					<td colspan="3"><span class="item-value">{$insurance_info.policy_number}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">保険期間: </span></td>
					<td colspan="3"><span class="item-value">{$insurance_info.insured_date_st|date_format:"%G年%m月%d日"} ～ {$insurance_info.insured_date_ed|date_format:"%G年%m月%d日"}</span></td>
				</tr>
				<tr>
					<td colspan="4"><span class="text-bold text-under">ビザ情報</span></td>
				</tr>
				<tr>
					<td><span class="item-name">ビザの種類: </span></td>
					<td colspan="3"><span class="item-value">{$visa_info.visa_type}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">ビザナンバー: </span></td>
					<td colspan="3"><span class="item-value">{$visa_info.visa_number}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">入国日: </span></td>
					<td><span class="item-value">{$visa_info.arrival_date|date_format:"%G/%m/%d"}</span></td>
					<td><span class="item-name">有効期限: </span></td>
					<td><span class="item-value">{$visa_info.visa_expiry_date|date_format:"%G/%m/%d"}</span></td>
				</tr>
				<tr>
					<td><span class="item-name">緊急連絡先: </span></td>
					<td><span class="item-value">{$emergency_info.0}</span></td>
					<td><span class="item-name">パスポート番号: </span></td>
					<td><span class="item-value">{$visa_info.passport_number}</span></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html>