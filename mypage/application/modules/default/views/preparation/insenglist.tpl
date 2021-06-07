{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}preparation/index">出発前お手続き一覧</a></li>
  <li>保険契約情報入力</li>
</ol>

<div class="contents-wrapper col-xs-12">
    <h2>Insurance Information</h2>
    This page will be shown about your insurance. <br />
</div>

{if $items|@count >= 1}
    {foreach item=item from=$items}
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading list-header">
                <div class="panel-title">
                    <span class="col-xs-10 kill-grid seminar-header seminar-title">Type: <span class="text-bold text-italic">{if $item.insurance_type != 'null'}{$item.insurance_type}{/if}</span></span>
                    <span class="col-xs-2 seminar-header seminar-title"><a href="{$base}/mypage/preparation/showpolicy?branch_no={$item.branch_no}" class="write-link" target="_blank"><span class="glyphicon glyphicon-download-alt clickable">DL</span></a></span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Cert No</span>
                        <span class="col-xs-8 kill-grid">{$item.policy_number}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Name</span>
                        <span class="col-xs-8 kill-grid">{$item.policy_owner|truncate:20}</span>
                    </div>
                </li><li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Premium</span>
                        <span class="col-xs-8 kill-grid">&#165; {$item.deposit_amount|number_format}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Line</span>
                        <span class="col-xs-3 kill-grid">{$item.line_english}</span>
                        <span class="col-xs-5 kill-grid">Division: {$item.division_english}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Commence Date</span>
                        <span class="col-xs-8 kill-grid">{$item.insured_date_st|date_format:"%G/%m/%d"}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Period Date</span>
                        <span class="col-xs-8 kill-grid">{$item.insured_date_ed|date_format:"%G/%m/%d"}</span>
                    </div>
                </li>
            </ul>
        </div>
    {/foreach}
{/if}

</table>
{if $items|@count >= 1}
    <div class="col-xs-12">
        When you click DL button, it will be able to download PDF or JPG file that contains more details.<br />
        <a href="preparation/insurancelist">Back to Japanese</a>
    </div>
{/if}
{include file=$footer}