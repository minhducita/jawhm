{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}preparation/index">出発前お手続き一覧</a></li>
  <li>フライト情報一覧</li>
</ol>

<div class="contents-wrapper">
    <h2>フライト情報一覧</h2>
    お客様のフライト予約情報の登録編集画面です。<br />
</div>

<div id="page-container">
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
        <button type="button" id="changeflight_new" class="btn btn-primary">フライト情報登録</button>
    </div>

    {if $items|@count >= 1}
        {foreach item=item from=$items}
            <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
                <div class="panel-heading list-header righting">
                    <div class="panel-title">
                        <span class="col-xs-4 kill-grid seminar-header seminar-title">便名: <span class="text-bold text-italic">{$item.flight_number}</span></span>
                        <span class="col-xs-8 seminar-header seminar-title text-right">
                            <span id="changeflight_{$item.ID}" class="col-xs-8 clickable"><img src="themes/images/edit.png" />変更</span>
                            <span id="deleteflight_{$item.ID}_{$item.flight_number}" class="edit-del-controller clickable"><img src="themes/images/delete.png" />削除</span>
                        </span>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid">出発地</span>
                            <span class="col-xs-3 kill-grid text-break">{$item.departure_place}</span>
                            <span class="col-xs-3 kill-grid">出発日時</span>
                            <span class="col-xs-3 kill-grid">
                                {$item.departure_time|date_format:"%m/%d"}<br />
                                {$item.departure_time|date_format:"%H:%M"}
                            </span>
                        </div>
                    </li>
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid">到着地</span>
                            <span class="col-xs-3 kill-grid text-break">{$item.destination_place}</span>
                            <span class="col-xs-3 kill-grid">到着時間</span>
                            <span class="col-xs-3 kill-grid">
                                {$item.destination_time|date_format:"%m/%d"}<br />
                                {$item.destination_time|date_format:"%H:%M"}
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        {/foreach}
    {else}
        現在、お客様のフライト情報は登録されていません。<br />
    {/if}
</div>
<a id="help-flight" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
{include file=$footer}