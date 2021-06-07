{include file=$header}

<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}preparation/index">出発前お手続き一覧</a></li>
  <li>ご渡航日程表</li>
</ol>

<div class="contents-wrapper">
    <h2>ご渡航日程表</h2>
    お客様のご渡航スケジュールです。<br />
</div>

    <h1>{$username} 様のご渡航日程表</h1>
    {if $items|@count > 0}
        {$i = 1}
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading schedule-header">
                <div class="panel-title">
                    <span class="col-xs-3 kill-grid schedule-header seminar-title">イベント{$i}</span>
                    <span class="col-xs-9 schedule-header seminar-title"><span class="text-bold text-italic">日本出国日</span></span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item sch-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid date-filling">日時</span>
                        <span class="col-xs-9 kill-grid date-filling">{$leave_date|date_format:"%m月%d日"}</span>
                    </div>
                </li>
                <li class="list-group-item sch-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid"></span>
                        <span class="col-xs-9 kill-grid"></span>
                    </div>
                </li>
            </ul>
        </div>
        {$i = $i + 1}

        {foreach item=item from=$items}
            <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
                <div class="panel-heading schedule-header">
                    <div class="panel-title">
                        <span class="col-xs-3 kill-grid schedule-header seminar-title">イベント{$i}</span>
                        <span class="col-xs-9 schedule-header seminar-title">
                            <span class="text-bold text-italic">
                                {if $item.entry_class == 9}フライト情報: {$item.flight_number}{/if}
                                {if $item.entry_class == 3}日本語空港送迎{/if}
                                {if $item.entry_class == 2}ホームステイ開始{/if}
                                {if $item.entry_class == 1}学校 入学{/if}
                            </span>
                        </span>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item sch-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid date-filling">
                                {if $item.entry_class == 9}出発
                                {else if $item.entry_class == 1}学校名
                                {else}日時
                                {/if}
                            </span>
                            <span class="col-xs-9 kill-grid{if $item.entry_class != 1} date-filling{/if}">
                                {if $item.entry_class == 3 || $item.entry_class == 2}{$item.event_date|date_format:"%m月%d日"}{/if}
                                {if $item.entry_class == 1}{$item.4}{/if}
                                {if $item.entry_class == 9}{$item.event_date|date_format:"%m月%d日 %H時%M分"}{/if}
                            </span>
                        </div>
                    </li>
                    {if $item.entry_class == 9 || $item.entry_class == 1}
                        <li class="list-group-item sch-btn">
                            <div class="col-xs-12 kill-grid">
                                <span class="col-xs-3 kill-grid date-filling">到着</span>
                                <span class="col-xs-9 kill-grid date-filling">
                                    {if $item.entry_class == 9}
                                        {$item.destination_time|date_format:"%m月%d日 %H時%M分"}
                                    {else if $item.entry_class == 1}
                                        {$item.event_date|date_format:"%m月%d日"}
                                    {/if}
                                </span>
                            </div>
                        </li>
                    {else}
                        <li class="list-group-item sch-btn">
                            <div class="col-xs-12 kill-grid">
                                <span class="col-xs-3 kill-grid"></span>
                                <span class="col-xs-9 kill-grid"></span>
                            </div>
                        </li>
                    {/if}
                </ul>
            </div>
            {$i = $i + 1}
        {/foreach}
        <p class="col-xs-12">
            <a href="schedule/schedulepdf?abroad={$abroad}&name={$username}" target="_blank">日程表をダウンロードする</a><br />
            お客様がPCでご覧になられている場合はPDFで、<br />
            スマートフォンでご覧になられている場合はJPEG形式でダウンロードされます。<br />
            ご渡航中でインターネット環境がない場所でも見れるようにしておくことをお勧めします。<br />
            <br />
            スマートフォンをお使いで上記書類を保存する方は<br />
            iPhoneの場合は、画像をロングタップ(一定時間タッチし続ける) すると表示される「画像を保存」をタップするとカメラロールに保存されます。<br />
            Androidの場合は、画像をロングタップするとメニューが表示されるので「画像を保存」を選択するとギャラリーの中のDownloadというアルバムの中に画像が保存されます。
        </p>
    {else}
        現在、お客様のご渡航予定はありません
    {/if}
<a id="help-schedule" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
{include file=$footer}