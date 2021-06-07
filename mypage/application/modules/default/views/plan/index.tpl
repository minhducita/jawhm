{include file=$header}
    <ol class="breadcrumb">
        <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">マイページトップ</a></li>
        <li>準備</li>
    </ol>
    <div id="window-contaner" class="contents-wrapper">
        <h1 class="text-under" style="margin-left: 10px;">プランニング</h1>
        <p>ボタンを押すと下記に内容が表示されます。</p>
        <div class="col-xs-12 col-md-4 span-center" style="padding-left: 0px; ">
            <div class="btn-group">
                <button type="button" id="stepchart" class="btn btn-group-xs btn-primary">ステップチャート</button><br />
            </div>
            <div class="btn-group">
                <button type="button" id="history" class="btn btn-group-xs btn-primary">履歴</button>
            </div>
            <div class="btn-group">
                <button type="button" id="next_step" class="btn btn-group-xs btn-primary">次回</button>
            </div>
        </div>
        <div class="col-xs-12 col-md-9"></div>
        <div id="data-container" style="margin-top: 45px;"></div>
    </div>
    <a id="help-plan" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
    <script>
        abroad = '{$abroad}';
    </script>
{include file=$footer}