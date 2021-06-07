{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}preparation/index">出発前お手続き一覧</a></li>
  <li>保険契約情報入力</li>
</ol>

<div class="contents-wrapper">
    <h2>保険契約情報入力</h2>
    お客様の保険契約情報の登録編集画面です。<br />
</div>

<div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
    <button type="button" id="changeinsurance_new" class="btn btn-primary">保険契約情報登録</button>
</div>

{if $items|@count >= 1}
    {foreach item=item from=$items}
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading list-header righting">
                <div class="panel-title">
                    <span class="col-xs-4 kill-grid seminar-header seminar-title">契約種別: <span class="text-bold text-italic">{if $item.insurance_type != 'null'}{$item.insurance_type}{/if}</span></span>
                    <span class="col-xs-8 seminar-header seminar-titie text-right">
                        <span id="changeinsurance_{$item.branch_no}" class="col-xs-8 clickable"><img src="themes/images/edit.png" />変更</span>
                        <span id="deleteinsurance_{$item.branch_no}_{$item.policy_number}_{$item.insured_date_st}_{$item.insured_date_ed}" class="clickable"><img src="themes/images/delete.png" />削除</span>
                    </span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">証券番号</span>
                        <span class="col-xs-9 kill-grid">{$item.policy_number}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">契約者名</span>
                        <span class="col-xs-9 kill-grid">{$item.policy_owner|truncate:20}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">入金額</span>
                        <span class="col-xs-9 kill-grid">{$item.deposit_amount|number_format} 円</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">ライン</span>
                        <span class="col-xs-3 kill-grid">{$item.line}</span>
                        <span class="col-xs-6 kill-grid">区分: {$item.division}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">始期日</span>
                        <span class="col-xs-9 kill-grid">{$item.insured_date_st|date_format:"%G年%m月%d日"}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">周期日</span>
                        <span class="col-xs-9 kill-grid">{$item.insured_date_ed|date_format:"%G年%m月%d日"}</span>
                    </div>
                </li>
            </ul>
        </div>
    {/foreach}
{/if}

{if $items|@count >= 1}
<div class="panel panel-primary panel-title col-xs-12">
    <div class="panel-heading">実際に医療機関に提示する際には以下のリンクから英語版の表示をダウンロードしてお使いください。</div>
    <div class="panel-body">
        <a href="preparation/insenglist">英語表記にする</a>
    </div>
</div>

{/if}
<a id="help-insurance" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
{include file=$footer}