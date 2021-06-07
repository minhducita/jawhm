{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="http://www.jawhm.or.jp/">ワーキング・ホリデー(ワーホリ)協会</a></li>
  <li><a href="{$base}/">メンバー専用ページトップ</a></li>
  <li><a href="{$base}/client/seminar/index">セミナー予約確認</a></li>
  <li>過去に参加したセミナー一覧</li>
</ol>

<div class="contents-wrapper">
	<h4>過去に参加したセミナー一覧</h4>
	お客様が過去に参加されたセミナーの一覧情報です。
</div>

{if $seminar|@count > 0}
	{$seminar|@count} 件のセミナーがあります。<br />
    <table id="tbl">
        <thead>
            <tr>
            	<th class="text-center">開催日時</th>
            	<th class="text-center">会場</th>
                <th class="editable text-center">詳細</th>
            </tr>
            <tr>
                <th class="text-center" colspan="4">セミナー名</th>
            </tr>
        </thead>

		{$no = 1}
        {foreach item=item from=$seminar}
        	<tbody id="trno_{$no}"  class="list">
        	    <tr>
                    <td>{$item.starttime|escape}～</td>
                    <td>{if $item.place === 'tokyo'}東京{elseif $item.place === 'osaka'}大阪{elseif $item.place === 'nagoya'}名古屋{elseif $item.place === 'fukuoka'}福岡{elseif $item.place === 'okinawa'}沖縄{elseif $item.place === 'sendai'}仙台{elseif $item.place === 'toyama'}富山{elseif $item.place === 'kyoto'}京都{elseif $item.place === 'omiya'}大宮}{else}{$item.place|escape}{/if}</td>
                    <td class="editable text-center"><a href="" id="seminar_detail{$item.seminarid|escape}" name="{$item.seminarid|escape}"><span class="glyphicon glyphicon-list-alt"></span></a></td>
                </tr>
                <tr>
                    <td colspan="4">{$item.k_title1|escape}</td>
                </tr>
	        </tbody>
	        {$no = $no + 1}
		{/foreach}
    </table>
    
    {* pagination links *}
    <div class="text-center">
            {$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape}<br />
			<ul class="pagination">		
                {if $pages.current != $pages.first}
                    <li><a id="firstpage" href="{$base}/client/seminar/history?page={$pages.first|escape}"> &lt;&lt; </a></li>
                {/if}

                {if isset($pages.previous)}
                    <li><a id="previouspage" href="{$base}/client/seminar/history?page={$pages.previous|escape}">  &lt; </a></li>
                {/if}

                {foreach item=p from=$pages.pagesInRange}
                    {if $pages.current == $p}
                        <li><span>{$p|escape}</span></li>
                    {else}
                        <li><a id="{$p}page" href="{$base}/client/seminar/history?page={$p|escape}">  {$p} </a></li>
                    {/if}
                {/foreach}

                {if isset($pages.next)}
                    <li><a id="nextpage" href="{$base}/client/seminar/history?page={$pages.next|escape}"> &gt; </a></li>
                {/if}

                {if $pages.current != $pages.last}
                    <li><a id="lastpage" href="{$base}/client/seminar/history?page={$pages.last|escape}"> &gt;&gt; </a></li>
                {/if}
           </ul>
       </div>
		<br /><br /><br />
    {* pagination links *}
{else}
	現在、お客様が参加されたセミナー情報はありません。
{/if}
	
{include file=$footer}