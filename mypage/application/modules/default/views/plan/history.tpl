{if $plan|@count >= 0}
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">手続履歴</h4>
        </div>
        {$i = 1}
        <ul class="list-group">
            {foreach item=item from=$plan}
                <li class="list-group-item">{$i} 予定日: <span class="text-italic">{$item.start_date|date_format:"%G年%m月%d日"}</span> 終了日: {if $item.completion_date}<span class="text-italic">{$item.completion_date|date_format:"%G年%m月%d日"}</span>{else} - {/if} 【{$item.step_name}】 {$item.step_exposition_short}</li>
                {$i = $i + 1}
            {/foreach}
        </ul>
    </div>

    {* pagination links *}
    <div class="text-center">
        {$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape} <br />
        <ul class="pagination">
            {if $pages.current != $pages.first}
                <li><a id="firstpage"> &lt;&lt; </a></li>
            {/if}

            {if isset($pages.previous)}
                <li><a id="previouspage""> &lt; </a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}
                {if $pages.current == $p}
                    <li><span>{$p}</span></li>
                {else}
                    <li><a id="{$p}_page"> {$p} </a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a id="nextpage""> &gt; </a></li>
            {/if}

            {if $pages.current < $pages.last}
                <li><a id="lastpage"> &gt;&gt; </a></li>
            {/if}
        </ul>
    </div>
    {* pagination links *}
{else}
    現在、お客様のプランはありません。
{/if}
<script>
    loadingView(false);
    var first = {$pages.first};
    {if isset($pages.previous)}
        var previous = {$pages.previous};
    {else}
        var previous = null;
    {/if}
    {if isset($pages.next)}
        var next = {$pages.next};
    {else}
        var next = null;
    {/if}
    var last = {$pages.last};

    {literal}
    $("#firstpage").click(function() {
        submit(first);
    });

    $("#previouspage").click(function() {
        submit(previous);
    });

    $("[id$=_page]").click(function() {
        var pages = $(this).attr('id').split('_')
        var page = pages[0];
        submit(page);
    });

    $("#nextpage").click(function() {
        submit(next);
    });

    $("#lastpage").click(function() {
        submit(last);
    });

    function submit(page) {
        var data = {'page': page};
        submit_action('plan/history', data, 'getdata');
    }
    {/literal}
</script>