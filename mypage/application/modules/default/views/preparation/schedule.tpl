<html lang="ja">
<head>
  <base herf="{$base}">
  <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link href="{$base}/mypage/themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/user.css" media="all" /> 
  <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/common.css" media="all" /> 
  <link rel="icon" href="{$base}/mypage/themes/images/favicon.ico" type="image/x-icon" />
  <title>{$title}</title>
</head>

<body>
	<h1>{$username} 様のご渡航日程表</h1>
	{if $items|@count > 0}
		<table id="tbl" class="table-center">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">イベント</th>
					<th class="text-center japanese-date">日時</th>
				</tr>
			<thead>
		
			{$i = 1}
			<tbody id="trno_{$i}"  class="list">
				<tr>
					<td class="text-right">{$i}</td>
					<td>日本出国日</td>
					<td class="text-right">{$leave_date|date_format:"%m月%d日"}</td>
				</tr>
			</tbody>	
			{$i = $i + 1}
			
        	{foreach item=item from=$items}
			<tbody id="trno_{$i}"  class="list">
				<tr>
					<td class="text-right" rowspan="3">{$i}</td>
					<td {if $item.entry_class == 3 || $item.entry_class == 2}rowspan="3"{/if}>
						{if $item.entry_class == 9}フライト情報{/if}
						{if $item.entry_class == 3}日本語空港送迎{/if}
						{if $item.entry_class == 2}ホームステイ開始{/if}
						{if $item.entry_class == 1}{$item.4}{/if}
					</td>
					<td class="text-right" {if $item.entry_class == 3 || $item.entry_class == 2 || $item.entry_class == 1}rowspan="3"{else}rowspan="2"{/if}>
						{if $item.entry_class == 3 || $item.entry_class == 2 || $item.entry_class == 1}{$item.event_date|date_format:"%m月%d日"}{/if}
						{if $item.entry_class == 9}{$item.event_date|date_format:"%m月%d日"}<br />{$item.event_date|date_format:"%H時%M分"}{/if}
					</td>
				</tr>
				<tr>
					{if $item.entry_class == 9 || $item.entry_class == 1}<td {if $item.entry_class == 1} rowspan="2"{/if}>{/if}
						{if $item.entry_class == 9}{$item.flight_number} 出発{/if}
						{if $item.entry_class == 1}入学日{/if}
					{if $item.entry_class == 9 || $item.erntry_class == 1}</td>{/if}
				</tr>
				<tr>
					{if $item.entry_class == 9}
						<td>
							{$item.flight_number} 到着
						</td>
					{/if}
					{if $item.entry_class == 9}
						<td class="text-right">
							{$item.destination_time|date_format:"%m月%d日"}<br />{$item.destination_time|date_format:"%H時%M分"}
						</td>
					{/if}
				</tr>
			</tbody>
			
			{$i = $i + 1}
		{/foreach}
		</table>
		<p>
			<a href="schedulepdf?abroad={$abroad}&name={$username}" target="_blank">日程表をダウンロードする</a><br />
			お客様がPCでご覧になられている場合はPDFで、<br />
			スマートフォンでご覧になられている場合はJPEG形式でダウンロードされます。<br />
			ご渡航中でインターネット環境がない場所でも見れるようにしておくことをお勧めします。
		</p>
	{else}
		現在、お客様のご渡航予定はありません
	{/if}
<script type="text/javascript" src="{$base}/mypage/themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/common.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/user.js"></script>
</body>
</html>