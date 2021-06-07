{include file=$header}
    <ol class="breadcrumb">
      <li><a href="staff/client/clientindex">メンバー専用ページトップ</a></li>
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

<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
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
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid">お客様確認編集</span>
                            <span class="col-xs-2 kill-grid"><input type="radio" name="{$item.name|cat:_flag}" value="1" {if $status[$item.name|cat:_flag] == 1}checked{/if}>確認済<input type="radio" name="{$item.name|cat:_flag}" value="0" {if $status[$item.name|cat:_flag] == 0}checked{/if}>未確認</span>
                            <span class="col-xs-2 kill-grid">{if $status[$item.name|cat:_flag] == 1}達成{else}期限{/if}日</span>
                            <input type="hidden" name="{$item.name}_date_type" value="{if $status[$item.name|cat:_flag] == 1}date{else}expiration{/if}">
                            <span class="col-xs-4 kill-grid">
                                <span class="input-group date" id="clientdate_{$i}">
                                    <input type="text" class="form-control" value="{if $status[$item.name|cat:_flag] == 1}{$status[$item.name|cat:_date]}{else}{$status[$item.name|cat:_expiration_date]}{/if}" name="{if $status[$item.name|cat:_flag] == 1}{$item.name|cat:_date}{else}{$item.name|cat:_expiration_date}{/if}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </li>
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid">スタッフ確認編集</span>
                            <span class="col-xs-2 kill-grid"><input type="radio" name="{$item.name|cat:_confirm}" value="1" {if $status[$item.name|cat:_confirm] == 1}checked{/if}>確認済<input type="radio" name="{$item.name|cat:_confirm}" value="0" {if $status[$item.name|cat:_confirm] == 0}checked{/if}>未確認</span>
                            <span class="col-xs-2 kill-grid">確認日</span>
                            <span class="col-xs-4 kill-grid">
                                <span class="input-group date" id="staffdate_{$i}">
                                    <input type="text" class="form-control" value="{$status[$item.name|cat:_confirm_date]}" name="{$item.name|cat:_confirm_date}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </span>
                            </span>
                            <span class="col-xs-1 kill-grid">
                                <button id="edit-{$item.name}" class="btn btn-primary" >保存</button>
                            </span>
                        </div>
                    </li>
                </ul>
            </span>
        </div>

        {$i = $i + 1}
    {/foreach}
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="themes/js/moment.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
    <script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
    <script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
    <script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
<script>
    var today = new Date();

    $('[id^=clientdate_]').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false,
        startDate: today,
        maxView: 3
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('[id^=staffdate_]').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false,
        startDate: today,
        maxView: 3
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });
</script>
{include file=$footer}