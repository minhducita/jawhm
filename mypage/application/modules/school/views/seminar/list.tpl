{if $items|@count >= 1}
    {if $smp == 0} {* for pc view *}
        <table id="tbl" class="table-center table table-striped table-hover">
            <thead>
                <tr>
                    <th id="sort_status_seminar0" abbr="starttime" name="{$sortkey0}" class="text-center">{$msg[2].message}<img id="status0" class="icon" src="{$order0}"></th>
                    <th id="sort_status_seminar1" abbr="k_title1" name="{$sortkey1}" class="text-center">{$msg[3].message}<img id="status1" class="icon" src="{$order1}"></th>
                    <th id="sort_status_seminar2" abbr="number" name="{$sortkey2}" class="text-center">{$msg[4].message}<img id="status2" class="icon" src="{$order2}"></th>
                    <th class="editable text-center">{$msg[8].message}</th>
                </tr>
            </thead>

            <tbody>
                {$no = 1}
                {section name=i start=0 loop=$items|@count}
                    <tr>
                        <td class="datetime-jpn">{$items[i][0].starttime|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message} %H:%M"}</td>
                        <td class="">{$items[i][0].k_title1|strip_tags:false}</td>
                        <td class="join-number">{$items[i][1].number}</td>
                        <td class="text-center"><a id="seminardetails_{$items[i][0].id}"><span class="glyphicon glyphicon-list-alt"></span></a></td>
                    </tr>
                    {$no = $no + 1}
                {/section}
            </tbody>
        </table>
    {else} {* for smart phone view *}
        <div class="col-xs-12 kill-rlpadding">
            <div class="col-xs-12 panel panel-info kill-rlpadding">
                <div class="panel-heading">
                    <h3 class="panel-title">{$msg[5].message}</h3>
                </div>
                <div class="panel-body">
                    <span class="col-xs-7 kill-rlpadding">
                        <select id="sort_item_seminar" class="col-xs-12 kill-rlpadding">
                            <option value="starttime" {if $sortkey == "starttime"}selected{/if}>{$msg[2].message}</option>
                            <option value="k_title1" {if $sortkey == "k_title1"}selected{/if}>{$msg[3].message}</option>
                            <option value="number" {if $sortkey == "number"}selected{/if}>{$msg[4].message}</option>
                        </select>
                    </span>
                    <span class="col-xs-1 kill-rlpadding"></span>
                    <span class="col-xs-4 kill-rlpadding">
                        <select id="sort_order_seminar" class="col-xs-12 kill-rlpadding">
                            <option value="ASC" {if $orderkey === "ASC"}selected{/if}>{$msg[6].message}</option>
                            <option value="DESC" {if $orderkey === "DESC"}selected{/if}>{$msg[7].message}</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>
        {$m = 0}
        {$l = 0}
        {section name=i start=0 loop=$items|@count}
            <div id="client_{$m}" class="panel panel-success col-xs-12" style="padding-left:0; padding-right:0;">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        {$msg[10].message}: {$items[i][0].starttime|date_format:"%G/%m/%d %H:%M"}
                        <span class="pull-right"><a id="seminardetails_{$items[i][0].id}"><span class="glyphicon glyphicon-list-alt"></span></a></span>
                    </h4>
                </div>

                <div class="panel-body" style="margin-bottom: 30px;">
                    <ul class="list-group" style="margin-bottom: 0;">
                        <li id="inc-list{$l}" class="col-xs-12 list-group-item">
                            <span class="col-xs-4 kill-rlpadding">{$msg[3].message}</span>
                            <span id="list_{$l}" class="col-xs-8">{$items[i][0].k_title1|strip_tags:false}</span>
                        </li>
                        {$l = $l + 1}
                        <li id="inc-list{$l}" class="col-xs-12 list-group-item">
                            <span class="col-xs-4 kill-rlpadding">{$msg[4].message}</span>
                            <span id="list_{$m}" class="col-xs-8">{$items[i][1].number}</span>
                        </li>
                    </ul>
                </div>
            </div>
            {$m = $m + 1}
        {/section}
    {/if}

    {* pagination links *}
    {if $searchschool_name != ''}{$search_school_name = '/'|cat:$searchschool_name}{else}{$search_school_name = '/'|cat:'null'}{/if}
    {if $searchplace != ''}{$search_place = '/'|cat:$searchplace|replace:' ':','}{else}{$search_place='/'|cat:'null'}{/if}
    {if $searchstart_date != ''}{$search_start_date = '/'|cat:$searchstart_date}{else}{$search_start_date='/'|cat:'null'}{/if}
    {if $searchend_date != ''}{$search_end_date = '/'|cat:$searchend_date}{else}{$search_end_date='/'|cat:'null'}{/if}
    {if isset($sortkey)}{$sort = '/'|cat:$sortkey}{else}{$sort='/'|cat:'null'}{/if}
    {if isset($orderkey)}{$order = '/'|cat:$orderkey|cat:'/'}{else}{$order='/'|cat:'null'|cat:'/'}{/if}
    <div class="text-center">
        {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount} <br />
        <ul class="pagination">
            {if $pages.current != $pages.first}
                <li><a id="firstpage" href="{$pagename}?page={$pages.first}{$search_school_name}{$search_place}{$search_start_date}{$search_end_date}{$sort}{$order}"> &lt;&lt; </a></li>
            {/if}

            {if isset($pages.previous)}
                <li><a id="previouspage" href="{$pagename}?page={$pages.previous}{$search_school_name}{$search_place}{$search_start_date}{$search_end_date}{$sort}{$order}"> &lt; </a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}
                {if $pages.current == $p}
                    <li><span>{$p}</span></li>
                {else}
                    <li><a id="{$p}page" href="{$pagename}?page={$p}{$search_school_name}{$search_place}{$search_start_date}{$search_end_date}{$sort}{$order}"> {$p} </a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a id="nextpage" href="{$pagename}?page={$pages.next}{$search_school_name}{$search_place}{$search_start_date}{$search_end_date}{$sort}{$order}"> &gt; </a></li>
            {/if}

            {if $pages.current <= $pages.last}
                <li><a id="lastpage" href="{$pagename}?page={$pages.last}{$search_school_name}{$search_place}{$search_start_date}{$search_end_date}{$sort}{$order}"> &gt;&gt; </a></li>
            {/if}
        </ul>
    </div>
    {* pagination links *}

{else}
    {$msg[9].message}
{/if}

<script type="text/javascript" src="themes/js/append.js"></script>
<script>
loadingView(false);
</script>