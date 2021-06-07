{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}seminar/index">セミナー予約確認</a></li>
  <li>過去に参加したセミナー一覧</li>
</ol>

<div class="contents-wrapper">
    <h4>過去に参加したセミナー一覧</h4>
    お客様が過去に参加されたセミナーの一覧情報です。
</div>

{if $seminar|@count > 0}
    {$seminar|@count} 件のセミナーがあります。<br />
        {$i = 0}
        {foreach item=item from=$seminar}
            <div {if $smp==0}id="seminar-size2_{$i}"{/if} class="panel panel-primary panel-header-padding-kill col-xs-12 col-md-6"  style="padding-left: 0px; padding-right: 0px;">
                <div class="panel-heading list-header">
                    <div class="panel-title">
                        <span class="col-xs-12 kill-grid seminar-header"><span class="text-bold text-italic">開催日時: {$item.starttime}～</span></span>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid list-title-centering">会場</span>
                            <span class="col-xs-3 kill-grid list-title-centering">
                                {if $item.place === 'tokyo'}東京
                                {elseif $item.place === 'osaka'}大阪
                                {elseif $item.place === 'nagoya'}名古屋
                                {elseif $item.place === 'fukuoka'}福岡
                                {elseif $item.place === 'okinawa'}沖縄
                                {elseif $item.place === 'sendai'}仙台
                                {elseif $item.place === 'toyama'}富山
                                {elseif $item.place === 'kyoto'}京都
                                {elseif $item.place === 'omiya'}大宮}
                                {else}
                                    {$item.place}
                                {/if}
                            </span>
                            <span class="col-xs-3 kill-grid list-title-centering"><a href="" id="seminar_detail{$item.seminarid}" name="{$item.seminarid}">詳細</a></span>
                            <span class="col-xs-3 list-title-centering"></span>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 kill-grid inc-title">
                            <span class="col-xs-3 kill-grid">セミナー名</span>
                            <span class="col-xs-9 kill-grid">{$item.k_title1}</span>
                        </div>
                    </li>
                </ul>
            </div>
            {$i = $i + 1}
        {/foreach}
    {* pagination links *}
    <div class="col-xs-12 text-center">
            {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
            <ul class="pagination">
                {if $pages.current != $pages.first}
                    <li><a id="firstpage" href="{$base}/mypage/seminar/history?page={$pages.first}"> &lt;&lt; </a></li>
                {/if}

                {if isset($pages.previous)}
                    <li><a id="previouspage" href="{$base}/mypage/seminar/history?page={$pages.previous}">  &lt; </a></li>
                {/if}

                {foreach item=p from=$pages.pagesInRange}
                    {if $pages.current == $p}
                        <li><span>{$p}</span></li>
                    {else}
                        <li><a id="{$p}page" href="{$base}/mypage/seminar/history?page={$p}">  {$p} </a></li>
                    {/if}
                {/foreach}

                {if isset($pages.next)}
                    <li><a id="nextpage" href="{$base}/mypage/seminar/history?page={$pages.next}"> &gt; </a></li>
                {/if}

                {if $pages.current != $pages.last}
                    <li><a id="lastpage" href="{$base}/mypage/seminar/history?page={$pages.last}"> &gt;&gt; </a></li>
                {/if}
           </ul>
       </div>
        <br /><br /><br />
    {* pagination links *}
{else}
    現在、お客様が参加されたセミナー情報はありません。
{/if}
<a id="help-seminarhistory" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
{include file=$footer}