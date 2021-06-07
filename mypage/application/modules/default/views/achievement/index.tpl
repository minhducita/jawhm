{include file=$header}
    <ol class="breadcrumb">
      <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
      <li>達成状況詳細</li>
    </ol>

    <div class="contents-wrapper">
        <h2>お客様達成状況詳細</h2>
        お客様のご渡航についての進捗状況です。<br />
        下記のボタンを押すと同じ色だけになります。<br />
        <div class="col-xs-12 col-md-6 list-group-item line-info" style="margin-top: 10px;">
            <div class="text-center"><button type="button" id="info-filter" class="btn btn-info-custom">未着手</button><button type="button" id="warning-filter" class="btn btn-warning-custom">実施済</button><button type="button" id="danger-filter" class="btn btn-danger-custom">期限切</button>{if $smp == 1}<br />{/if}<button type="button" id="success-filter" class="btn btn-success-custom">完了</button><button type="button" id="reload-filter" class="btn btn-primary-custom">更新</button><button type="button" id="reset-filter" class="btn btn-default-custom">リセット</button></div>
        </div>
    </div>

    {$i = 0}
    {foreach item=item from=$achievement}
        <div id="panel_{$i}" class="panel col-xs-12 panel-title
            {if ($status[$item.name|cat:_flag] == 1 && $status[$item.name|cat:_confirm] == 1)}panel-success
            {else if $status[$item.name|cat:_flag] == 1}panel-warning
            {else if isset($status[$item.name|cat:_expiration_date]) != ''}{if $status[$item.name|cat:_expiration_date] < $smarty.now|date_format:"%Y-%m-%d"}panel-danger
                {else}panel-info{/if}
            {else}panel-info
            {/if}
            ">
            <div class="panel-heading list-header righting">
                <div class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{$i}" id="accordion_{$i}" style="display: block;">
                    {$item.jpn_name}
                    <i class="pull-right glyphicon glyphicon-chevron-down"></i></a>
                </div>
            </div>
            <span id="collapse_{$i}" class="panel-collapse collapse">
                <ul class="list-group" {if $smp == 0} style="margin-bottom: 0px;"{/if}>
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-4 kill-grid">お客様確認</span>
                            <span class="col-xs-1 kill-grid">{if $status[$item.name|cat:_flag] == 1}<span class="glyphicon glyphicon-ok"></span>{else}<span class="glyphicon glyphicon-minus"></span>{/if}</span>
                            <span class="col-xs-3 kill-grid">{if $status[$item.name|cat:_flag] == 1}達成{else}期限{/if}日</span>
                            <span class="col-xs-4 kill-grid">{if $status[$item.name|cat:_flag] == 0 && isset($status[$item.name|cat:_expiration_date])}{$status[$item.name|cat:_expiration_date]|date_format:"%m月%d日"}{else if $status[$item.name|cat:_flag] == 1 && isset($status[$item.name|cat:_date])}{$status[$item.name|cat:_date]|date_format:"%m月%d日"}{else}<span class="glyphicon glyphicon-minus"></span>{/if}</span>
                        </div>
                    </li>
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-4 kill-grid">スタッフ確認</span>
                            <span class="col-xs-1 kill-grid">{if $status[$item.name|cat:_confirm] == 1}<span class="glyphicon glyphicon-ok"></span>{else}<span class="glyphicon glyphicon-minus"></span>{/if}</span>
                            <span class="col-xs-3 kill-grid">確認日</span>
                            <span class="col-xs-4 kill-grid">{if $status[$item.name|cat:_confirm] == 1}{$status[$item.name|cat:_confirm_date]|date_format:"%m月%d日"}{else}<span class="glyphicon glyphicon-minus"></span>{/if}</span>
                        </div>
                    </li>
                </ul>
            </span>
        </div>
        {$i = $i + 1}
    {/foreach}
<a id="help-achievement" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
{include file=$footer}