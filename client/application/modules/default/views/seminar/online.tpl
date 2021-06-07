{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="http://www.jawhm.or.jp/">ワーキング・ホリデー(ワーホリ)協会</a></li>
  <li><a href="{$base}/">メンバー専用ページトップ</a></li>
  <li><a href="{$base}/client/seminar/index">セミナー予約確認</a></li>
  <li>ワーホリセミナー</li>
</ol>

<div class="contents-wrapper">
	<h2>ワーホリセミナー</h2>
	{if $status === 'live'}<a href="{$ust_url}" target="_blank"><img src="http://www.jawhm.or.jp/css/images/camera.png" alt="放送中"><span class="text-red">放送中</span></a>{else}オフライン{/if}
</div>

{if $seminar|@count > 0}
	{$seminar|@count} 件のセミナーがあります。<br />
    <table id="tbl">
        <thead>
            <tr>
            	<th class="text-center">開催日時</th>
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
              	   	<td class="editable text-center"><a href="" id="seminar_detail{$item.seminarid|escape}" name="{$item.id|escape}"><span class="glyphicon glyphicon-list-alt"></span></a></td>
                </tr>
              	<tr>
                    <td colspan="4">{$item.k_title1|escape}</td>
                </tr>
	        </tbody>
	        {$no = $no + 1}
		{/foreach}
    </table>
{else}
	現在、オンラインセミナー情報はありません。
{/if}
	
{include file=$footer}