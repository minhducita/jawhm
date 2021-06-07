{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}preparation/index">出発前お手続き一覧</a></li>
  <li>ビザ関連情報</li>
</ol>

<div class="contents-wrapper">
    <h2>ビザ関連情報入力</h2>
    お客様のビザ情報や、渡航先でご利用になられる情報の登録編集画面です。<br />
    学校に連絡先の提出を求められた場合は学校連絡ページよりPDFをダウンロードしたものをご利用ください。
</div>

<div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
    <button type="button" id="changevisa_new" class="btn btn-primary">ビザ情報登録</button>
</div>

{if $items|@count >= 1}
    {foreach item=item from=$items}
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading list-header righting">
                <div class="panel-title">
                    <span class="col-xs-6 kill-grid seminar-header seminar-title"><span class="text-bold text-italic">{$item.visa_type}</span></span>
                    <span class="col-xs-6 seminar-header seminar-title text-right righting">
                        <span id="changevisa_{$item.branch_no}" class="col-xs-7 clickable"><img src="themes/images/edit.png" />変更</span>
                        <span id="deletevisa_{$item.branch_no}_{$item.visa_number}" class="edit-del-controller clickable"><img src="themes/images/delete.png" />削除</span>
                    </span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">ビザ発給番号</span>
                        <span class="col-xs-7 kill-grid">{$item.visa_number}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">パスポート番号</span>
                        <span class="col-xs-7 kill-grid">{$item.passport_number}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">入国予定日</span>
                        <span class="col-xs-7 kill-grid">{if $item.expected_entrance_date != 'null'}{$item.expected_entrance_date|date_format:"%G年%m月%d日"}{/if}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">帰国予定日</span>
                        <span class="col-xs-7 kill-grid">{if $item.expected_return_date != 'null'}{$item.expected_return_date|date_format:"%G年%m月%d日"}{/if}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">入国日</span>
                        <span class="col-xs-7 kill-grid">{if $item.arrival_date != 'null'}{$item.arrival_date|date_format:"%G年%m月%d日"}{/if}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">VISA有効期限</span>
                        <span class="col-xs-7 kill-grid">{if $item.visa_expiry_date != 'null'}{$item.visa_expiry_date|date_format:"%G年%m月%d日"}{/if}</span>
                    </div>
                </li>
            </ul>
        </div>
    {/foreach}
{/if}
<span class="col-xs-12"><a id="help-visa" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a></span>
{include file=$footer}