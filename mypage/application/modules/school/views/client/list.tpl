{if $items|@count > 0}
    {if $smp == 0} {* for pc view *}
        <table id="tbl" class="table-center table table-striped table-hover">
            <thead>
                <tr>
                    <th id="sort_status_client0" abbr="短縮学校名" name="{$sortkey0}" class="text-center">{$msg[2].message}<img id="status0" class="icon" src="{$order0}"></th>
                    <th id="sort_status_client1" abbr="フリガナ" name="{$sortkey1}" class="text-center">{$msg[3].message}<img id="status1" class="icon" src="{$order1}"></th>
                    <th id="sort_status_client2" abbr="item" name="{$sortkey2}" class="text-center">{$msg[5].message}<img id="status2" class="icon" src="{$order2}"></th>
                    <th id="sort_status_client3" abbr="weeks" name="{$sortkey3}" class="text-center">{$msg[6].message}<img id="status3" class="icon" src="{$order3}"></th>
                    <th id="sort_status_client4" abbr="entrance_date" name="{$sortkey4}" class="text-center">{$msg[7].message}<img id="status4" class="icon" src="{$order4}"></th>
                    <th class="editable text-center">{$msg[8].message}</th>
                </tr>
            </thead>

            <tbody>
                {$no = 1}
                {foreach item=item from=$items}
                    <tr>
                        <td class="">{$item.9}</td>
                        <td class="">
                            {$item.6}<br >
                            {$item.7} {$item.8}
                        </td>
                        {*<td class="">
                            {$item.memo}<br />
                            {$item.item}
                        </td>*}
                        <td class="">
                            {$item.item}<br />
                            {$item.memo}
                        </td>
                        <td class="">{$item.weeks}</td>
                        <td class="">{$item.entrance_date|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message}"}</td>
                        <td class="text-center"><a id="showdetails_{$item.study_abroad_no}_{$item.school_no}"><span class="glyphicon glyphicon-list-alt"></span></a></td>
                    </tr>
                    {$no = $no + 1}
                {/foreach}
            </tbody>
        </table>
    {else} {* for smart phone view *}
        <div class="col-xs-12 kill-rlpadding">
            <div class="col-xs-12 panel panel-info kill-rlpadding">
                <div class="panel-heading">
                    <h3 class="panel-title">{$msg[8].message}</h3>
                </div>
                <div class="panel-body">
                    <span class="col-xs-7 kill-rlpadding">
                        <select id="sort_item_client" class="col-xs-12 kill-rlpadding">
                            <option value="短縮学校名" {if $sortkey == "短縮学校名"}selected{/if}>{$msg[2].message}</option>
                            <option value="フリガナ" {if $sortkey == "フリガナ"}selected{/if}>{$msg[3].message}</option>
                            <option value="item" {if $sortkey == "item"}selected{/if}>{$msg[5].message}</option>
                            <option value="weeks" {if $sortkey == "weeks"}selected{/if}>{$msg[6].message}</option>
                            <option value="entrance_date" {if $sortkey == "entrance_date"}selected{/if}>{$msg[7].message}</option>
                        </select>
                    </span>
                    <span class="col-xs-1 kill-rlpadding"></span>
                    <span class="col-xs-4 kill-rlpadding">
                        <select id="sort_order_client" class="col-xs-12 kill-rlpadding">
                            <option value="ASC" {if $orderkey === "ASC"}selected{/if}>{$msg[10].message}</option>
                            <option value="DESC" {if $orderkey === "DESC"}selected{/if}>{$msg[11].message}</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>
        {$m = 0}
        {$l = 0}
        {foreach item=item from=$items}
            <div id="client_{$m}" class="panel panel-success col-xs-12" style="padding-left:0; padding-right:0;">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        {$msg[3].message}: {$item.6}
                        <span class="pull-right"><a id="showdetails_{$item.study_abroad_no}_{$item.school_no}"><span class="glyphicon glyphicon-list-alt"></span></a></span>
                    </h4>
                </div>

                <div class="panel-body" style="margin-bottom: 30px;">
                    <ul class="list-group" style="margin-bottom: 0;">
                        <li id="inc-list{$l}" class="col-xs-12 list-group-item">
                            <span class="col-xs-3 kill-rlpadding">{$msg[4].message}</span>
                            <span id="list_{$l}" class="col-xs-9">{$item.7} {$item.8}</span>
                        </li>
                        {$l = $l + 1}
                        <li id="inc-list{$l}" class="col-xs-12 list-group-item">
                            <span class="col-xs-3 kill-rlpadding">{$msg[2].message}</span>
                            <span id="list_{$l}" class="col-xs-9">{$item.9}</span>
                        </li>
                        {$l = $l + 1}
                        <li id="inc-list{$l}" class="col-xs-12 list-group-item">
                            <span class="col-xs-3 kill-rlpadding">{$msg[5].message}</span>
                            <span id="list_{$m}" class="col-xs-9">
                                {$item.memo}<br />
                                {$item.item}
                            </span>
                        </li>
                        {$l = $l + 1}
                        <li id="inc-list{$l}" class="col-xs-12 list-group-item">
                            <span class="col-xs-3 kill-rlpadding">{$msg[6].message}</span>
                            <span id="list_{$l}" class="col-xs-9">{$item.weeks}</span>
                        </li>
                        {$l = $l + 1}
                        <li id="inc-list{$l}" class="col-xs-12 list-group-item">
                            <span class="col-xs-3 kill-rlpadding">{$msg[7].message}</span>
                            <span id="list_{$l}" class="col-xs-9">{$item.entrance_date|date_format:"%G/%m/%d"}</span>
                        </li>
                    </ul>
                </div>
            </div>
            {$m = $m + 1}
        {/foreach}
    {/if}

    {* pagination links *}
    {if $searchschool_name != ''}{$search_school_name = '/'|cat:$searchschool_name}{else}{$search_school_name = '/'|cat:'null'}{/if}
    {if $searchitem != ''}{$search_item = '/'|cat:$searchitem|replace:' ':','}{else}{$search_item='/'|cat:'null'}{/if}
    {if $searchname != ''}{$search_name = '/'|cat:$searchname}{else}{$search_name='/'|cat:'null'}{/if}
    {if $searchentry_status != 0}{$search_entry_status = '/'|cat:$searchentry_status}{else}{$search_entry_status='/'|cat:0}{/if}
    {if $searchentrance_date != ''}{$search_entrance_date = '/'|cat:$searchentrance_date}{else}{$search_entrance_date='/'|cat:'null'}{/if}
    {if $searchentrance_timing != 0}{$search_entrance_timing = '/'|cat:$searchentrance_timing}{else}{$search_entrance_timing='/'|cat:0}{/if}
    {if $searchweek != ''}{$search_week = '/'|cat:$searchweek}{else}{$search_week='/'|cat:'null'}{/if}
    {if isset($sortkey)}{$sort = '/'|cat:$sortkey}{else}{$sort='/'|cat:'null'}{/if}
    {if isset($orderkey)}{$order = '/'|cat:$orderkey|cat:'/'}{else}{$order='/'|cat:'null'|cat:'/'}{/if}
    <div class="text-center">
        {$pages.firstItemNumber|escape} to {$pages.lastItemNumber|escape} of {$pages.totalItemCount|escape} <br />
        <ul class="pagination">
            {if $pages.current != $pages.first}
                <li><a id="firstpage" href="{$pagename}?page={$pages.first}{$search_school_name}{$search_item}{$search_name}{$search_entry_status}{$search_entrance_date}{$search_entrance_timing}{$search_week}{$sort}{$order}"> &lt;&lt; </a></li>
            {/if}

            {if isset($pages.previous)}
                <li><a id="previouspage" href="{$pagename}?page={$pages.previous}{$search_school_name}{$search_item}{$search_name}{$search_entry_status}{$search_entrance_date}{$search_entrance_timing}{$search_week}{$sort}{$order}"> &lt; </a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}
                {if $pages.current == $p}
                    <li><span>{$p}</span></li>
                {else}
                    <li><a id="{$p}page" href="{$pagename}?page={$p}{$search_school_name}{$search_item}{$search_name}{$search_entry_status}{$search_entrance_date}{$search_entrance_timing}{$search_week}{$sort}{$order}"> {$p} </a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a id="nextpage" href="{$pagename}?page={$pages.next}{$search_school_name}{$search_item}{$search_name}{$search_entry_status}{$search_entrance_date}{$search_entrance_timing}{$search_week}{$sort}{$order}"> &gt; </a></li>
            {/if}

            {if $pages.current < $pages.last}
                <li><a id="lastpage" href="{$pagename}?page={$pages.last}{$search_school_name}{$search_item}{$search_name}{$search_entry_status}{$search_entrance_date}{$search_entrance_timing}{$search_week}{$sort}{$order}"> &gt;&gt; </a></li>
            {/if}
        </ul>
    </div>
    {* pagination links *}

{else}
    {$msg[12].message}
{/if}

<script type="text/javascript" src="themes/js/append.js"></script>
<script>
loadingView(false);
</script>