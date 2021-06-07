{include file=$header}
    <ol class="breadcrumb">
        <li><a href="staff/client/clientindex">マイページトップ</a></li>
        <li>準備</li>
    </ol>
    <div id="window-contaner" class="contents-wrapper">
        <h1 class="text-under" style="margin-left: 10px;">プランニング</h1>
        <p>ボタンを押すと下記に内容が表示されます。</p>
        <div class="col-xs-12 col-md-12 span-center" style="padding-left: 0px; ">
            <div class="btn-group">
                <button type="button" id="stepchart" class="btn btn-group-xs btn-primary">ステップチャート</button>
            </div>
            <div class="btn-group">
                <button type="button" id="history" class="btn btn-group-xs btn-primary">履歴</button>
            </div>
            <div class="btn-group">
                <button type="button" id="next_step" class="btn btn-group-xs btn-primary">次回</button>
            </div>
            <div class="btn-group">
                <span class="col-xs-10">
                    <select class="form-control" name="step_name">
                        {$n = 0}
                        {foreach item=item from=$next_step}
                            <option value="{$n}">{$item.step_name}</option>
                            {$n = $n + 1}
                        {/foreach}
                    </select>
                </span>
                <div class="btn-group col-xs-2">
                    <button type="button" id="step_complete" class="btn btn-warning">完了</button>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" id="plan_complete" class="btn btn-group-xs btn-warning">手続完了</button>
            </div>
        </div>
        <div class="col-xs-12 col-md-9"></div>
        <div id="data-container" style="margin-top: 45px;"></div>
    </div>
    <script>
        abroad = '{$abroad}';
    </script>
{include file=$footer}