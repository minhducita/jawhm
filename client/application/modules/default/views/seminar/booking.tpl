{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="http://www.jawhm.or.jp/">ワーキング・ホリデー(ワーホリ)協会</a></li>
  <li><a href="{$base}/">メンバー専用ページトップ</a></li>
  <li><a href="{$base}/client/seminar/index">セミナー予約確認</a></li>
  <li>予約確認</li>
</ol>

<div class="contents-wrapper">
	<h1>予約確認</h1>
	お客様が現在予約されているセミナーの一覧情報です。	
</div>

{if $reserve|@count > 0}
	{$reserve|@count} 件のセミナーがあります。<br />
    <table id="tbl">
        <thead>
            <tr>
            	<th class="text-center">開催日時</th>
            	<th class="text-center">会場</th>
                <th class="editable text-center">詳細</th>
                <th class="editable text-center">キャンセル</th>
            </tr>
            <tr>
                <th class="text-center" colspan="4">セミナー名</th>
            </tr>
        </thead>

		{$no = 1}
        {foreach item=item from=$reserve}
        	<tbody id="trno_{$no}"  class="list">
        	        <tr>
                    <td>{$item.starttime|escape}～</td>
                    <td>{if $item.place === 'tokyo'}東京{elseif $item.place === 'osaka'}大阪{elseif $item.place === 'nagoya'}名古屋{elseif $item.place === 'fukuoka'}福岡{elseif $item.place === 'okinawa'}沖縄{elseif $item.place === 'sendai'}仙台{elseif $item.place === 'toyama'}富山{elseif $item.place === 'kyoto'}京都{elseif $item.place === 'omiya'}大宮}{else}{$item.place|escape}{/if}</td>
                    <td class="editable text-center"><a href="" id="seminar_detail{$item.seminarid|escape}" name="{$item.seminarid|escape}"><span class="glyphicon glyphicon-list-alt"></span></a></td>
                    <td class="editable text-center"><a href="http://www.jawhm.or.jp/yoyaku/disp/{$item.id|escape}/{$item.email|escape|md5}" target="_blank"><span class="glyphicon glyphicon-remove"></span></td>
                </tr>
                <tr>
                    <td colspan="4">{$item.k_title1|escape}</td>
                </tr>
	        </tbody>
	        {$no = $no + 1}
		{/foreach}
    </table>
{else}
	現在、お客様が参加されたセミナー情報はありません。
{/if}
	
{include file=$footer}