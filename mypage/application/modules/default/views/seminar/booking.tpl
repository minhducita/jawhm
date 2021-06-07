{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}seminar/index">セミナー予約確認</a></li>
  <li>予約確認</li>
</ol>

<div class="contents-wrapper">
    <h1>{$username}様<br />
    ご予約セミナー情報</h1>
    お客様が現在予約されているセミナーの一覧情報です。
</div>

{if $reserve|@count > 0}
    {$reserve|@count} 件のセミナーがあります。<br />
    {$i = 0}
    {$n = 1}
    {foreach item=item from=$reserve}
        <div {if $smp==0}id="seminar-size2_{$i}"{/if} class="panel panel-primary panel-header-padding-kill col-xs-12 col-md-6" style="padding-left: 0px; padding-right: 0px;">
            <div class="panel-heading list-header">
                <div class="panel-title">
                    <span class="col-xs-3 kill-grid seminar-header">開始日時</span>
                    <span class="col-xs-9 seminar-header seminar-title">
                        {$item.starttime|date_format:"%G年%m月%d日 %H時%M分"}
                    </span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid list-title-centering">会場</span>
                        <span class="col-xs-3 list-title-centering">
                            {if $item.place === 'tokyo'}東京{elseif $item.place === 'osaka'}大阪{elseif $item.place === 'nagoya'}名古屋{elseif $item.place === 'fukuoka'}福岡{elseif $item.place === 'okinawa'}沖縄{elseif $item.place === 'sendai'}仙台{elseif $item.place === 'toyama'}富山{elseif $item.place === 'kyoto'}京都{elseif $item.place === 'omiya'}大宮}{else}{$item.place}{/if}
                        </span>
                        <span class="col-xs-3 kill-grid list-title-centering">
                            <a href="" id="seminar_detail{$item.seminarid|escape}" name="{$item.seminarid|escape}">詳細</a>
                        </span>
                        <span class="col-xs-3 kill-grid list-title-centering">
                            <a href="http://www.jawhm.or.jp/yoyaku/disp/{$item.id|escape}/{$item.email|escape|md5}" target="_blank">キャンセル</a>
                        </span>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="col-xs-12 kill-padding inc-title">
                        <span class="col-xs-3 kill-padding">セミナー名</span>
                        <span class="col-xs-9 add-under-padding">
                            {$item.k_title1}
                        </span>
                        {if $iphone == 1}
                            <span class="inc-calendar pull-right"><a href="seminar/addcalendar?id={$item.seminarid}"><i class="icon-calendar"></i>カレンダーに追加</a></span>
                        {/if}
                    </div>
                </li>
            </ul>
        </div>

        {$n = $n + 1}
        {$i = $i + 1}
    {/foreach}

{else}
    現在、お客様のご予約されているセミナー情報はありません。
{/if}
<a id="help-bookconfirm" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
{include file=$footer}