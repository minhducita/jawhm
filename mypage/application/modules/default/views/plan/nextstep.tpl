{if $plan|@count >= 0}
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">次回内容</h4>
        </div>
        {$i = 1}
        <ul class="list-group">
            {foreach item=item from=$plan}
                <li class="list-group-item">{$i} 予定日: <span class="text-italic">{$item.start_date|date_format:"%G年%m月%d日"}</span> 【{$item.step_name}】 {$item.step_exposition_short}</li>
                {$i = $i + 1}
            {/foreach}
        </ul>
    </div>
{else}
    現在、お客様のプランはありません。
{/if}