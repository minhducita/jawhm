{include file=$header}
    <ol class="breadcrumb">
        <li><a href="./">マイページトップ</a></li>
        <li>活動内容</li>
    </ol>

    {if $activity_log|@count >= 1}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">{$username} 様の最近の活動内容</h4>
            </div>
            {$i = 1}
            <ul class="list-group">
                {foreach item=item from=$activity_log}
                    <li class="list-group-item">
                        {$i}
                        ({$item.action_datetime|date_format:"%G年%m月%d日"}
                        {$item.action_datetime|date_format:"%H時%M分%S秒"})
                        [{$item.action_content}]
                   </li>
               {$i = $i + 1}
                {/foreach}
            </ul>
        </div>
    {else}
        {$username} 様の活動履歴はありません。
    {/if}

{include file=$footer}