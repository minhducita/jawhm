<html lang="ja">
<head>
  <base herf="{$base}">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/user.css" media="all" /> 
  <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/common.css" media="all" /> 
  <title>{$title}</title>
</head>

<body>
	<h1>{$name} 様のご渡航日程表</h1>
	{if $items|@count > 0}
		<table id="tbl" class="agreement table-center" border="1">
			<thead class="agreement">
				<tr>
					<th class="text-center agreement">No</th>
					<th class="text-center agreement">イベント</th>
					<th class="text-center japanese-date agreement">日時</th>
				</tr>
			<thead>
		
			{$i = 1}
			<tbody id="trno_{$i}"  class="list agreement">
				<tr class="agreement">
					<td class="text-right agreement">{$i}</td>
					<td class="agreement">日本出国日</td>
					<td class="text-right agreement">{$leave_date|date_format:"%m月%d日"}</td>
				</tr>
			</tbody>	
			{$i = $i + 1}
			
        	{foreach item=item from=$items}
			<tbody id="trno_{$i}"  class="list agreement">
				<tr class="agreement">
					<td class="text-right agreement" rowspan="3">{$i}</td>
					<td class="agreement" {if $item.entry_class == 3 || $item.entry_class == 2}rowspan="3"{/if}>
						{if $item.entry_class == 9}フライト情報{/if}
						{if $item.entry_class == 3}日本語空港送迎{/if}
						{if $item.entry_class == 2}ホームステイ開始{/if}
						{if $item.entry_class == 1}{$item.4}{/if}
					</td>
					<td class="text-right agreement" {if $item.entry_class == 3 || $item.entry_class == 2 || $item.entry_class == 1}rowspan="3"{else}rowspan="2"{/if}>
						{if $item.entry_class == 3 || $item.entry_class == 2 || $item.entry_class == 1}{$item.event_date|date_format:"%m月%d日"}{/if}
						{if $item.entry_class == 9}{$item.event_date|date_format:"%m月%d日"}<br />{$item.event_date|date_format:"%H時%M分"}{/if}
					</td>
				</tr>
				<tr class="agreement">
					{if $item.entry_class == 9 || $item.entry_class == 1}<td class="agreement"{if $item.entry_class == 1} rowspan="2"{/if}>{/if}
						{if $item.entry_class == 9}{$item.flight_number} 出発{/if}
						{if $item.entry_class == 1}入学日{/if}
					{if $item.entry_class == 9 || $item.erntry_class == 1}</td>{/if}
				</tr>
				<tr class="agreement">
					{if $item.entry_class == 9}
						<td class="agreement">
							{$item.flight_number} 到着
						</td>
					{/if}
					{if $item.entry_class == 9}
						<td class="text-right agreement">
							{$item.destination_time|date_format:"%m月%d日"}<br />{$item.destination_time|date_format:"%H時%M分"}
						</td>
					{/if}
				</tr>
			</tbody>
			
			{$i = $i + 1}
		{/foreach}
		</table>
	{else}
		現在、お客様のご渡航予定はありません
	{/if}
</body>
</html>