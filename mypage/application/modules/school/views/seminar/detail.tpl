{include file=$header}
    <div class="main-content">
        <div id="breadcrumbs" class="breadcrumbs breadcrumbs-fixed">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="school/index/index">{$brd_msg[0].message}</a>
                </li>
                <li>
                    <a href="school/seminar/index">{$brd_msg[4].message}</a>
                </li>
                <li class="active">
                    {$brd_msg[5].message}
                </li>
            </ul>
        </div>

        <div class="page-content">
            <div class="wrapper seminar-wrapper">
                <div class="col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">{$seminar_info.k_title1|strip_tags:false}{$msg[0].message}</h4>
                        </div>

                        <div class="panel-body">
                            <ul class="list-group kill-margin-bottom">
                                <li class="list-group-item inc-btn">
                                    <span class="col-xs-4 col-md-2 {if $smp == 1}kill-rlpadding{/if}">{$msg[1].message}</span>
                                    <span class="col-xs-8 col-md-4">{if $smp == 0}{$seminar_info.starttime|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message} %H:%M"}{else}{$seminar_info.starttime|date_format:"%G/%m/%d %H:%M"}{/if}～</span>
                                {if $smp == 1}
                                </li>
                                <li class="list-group-item inc-btn">
                                {/if}
                                    <span class="col-xs-4 col-md-2 {if $smp == 1}kill-rlpadding{/if}">{$msg[2].message}</span>
                                    <span class="col-xs-8 col-md-4">{if $seminar_info.place === 'tokyo'}{$msg[3].message}
                                                           {elseif $seminar_info.place === 'osaka'}{$msg[4].message}
                                                           {elseif $seminar_info.place === 'nagoya'}{$msg[5].message}
                                                           {elseif $seminar_info.place === 'fukuoka'}{$msg[6].message}
                                                           {elseif $seminar_info.place === 'okinawa'}{$msg[7].message}
                                                           {elseif $seminar_info.place === 'kyoto'}{$msg[8].message}
                                                           {elseif $seminar_info.place === 'oomiya'}{$msg[9].message}{/if}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">{$msg[10].message}{$msg[11].message}{$number}{$msg[12].message}</h4>
                        </div>

                        <div class="panel-body">
                            <ul class="list-group kill-margin-bottom">
                            {$num = $members|@count}
                                {if $num > 0}
                                    {foreach item=item from=$members}
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    {$msg[13].message}: <span class="text-bold text-italic">{$item.namae}{if $smp==0} {$item.roma}{/if}</span>
                                                    {*{if isset($item.abroad)}<span class="pull-right"><span id="showdetails_{$item.abroad}_{$item.school_no}" class="clickable"><span class="glyphicon glyphicon-list-alt"></span><span class="white-space">詳細</span></span>{/if}*}
                                                </div>
                                            </div>

                                            <div class="panel-body search-detail-body">
                                                <ul class="list-group kill-margin-bottom">
                                                    <li class="list-group-item {if $smp == 0}inc-btn{else}inc-memo{/if}">
                                                        {if $smp == 0}
                                                            <span class="col-md-2 kill-rlpadding">{$msg[15].message}</span>
                                                            <span class="col-md-3 kill-rlpadding">{$item.kyomi}</span>
                                                            <span class="col-md-2 kill-rlpadding">{$msg[16].message}</span>
                                                            <span class="col-md-5 kill-rlpadding">{$item.jiki}</span>
                                                        {else}
                                                                <span class="col-xs-6 kill-rlpadding">{$msg[14].message}</span>
                                                                <span class="col-xs-6 kill-rlpadding detail-int">{$item.roma}</span>
                                                            </li>
                                                            <li class="list-group-item inc-memo">
                                                                <span class="col-xs-6 kill-rlpadding">{$msg[15].message}</span>
                                                                <span class="col-xs-6 kill-rlpadding detail-int">{$item.kyomi}</span>
                                                            </li>
                                                            <li class="list-group-item inc-memo4">
                                                                <span class="col-xs-6 kill-rlpadding">{$msg[16].message}</span>
                                                                <span class="col-xs-6 kill-rlpadding detail-dep word-break">{$item.jiki}</span>
                                                        {/if}
                                                    </li>
                                                    <div id="{$item.customid}"></div>
                                                </ul>
                                            </div>
                                        </div>
                                    {/foreach}
                                    {* pagination links *}
                                        <div class="text-center col-xs-12">
                                            {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
                                            <ul class="pagination">
                                                {if $pages.current != $pages.first}
                                                    <li><a href="school/seminar/detail?page={$pages.first}"> &lt;&lt; </a>
                                                {/if}

                                                {if isset($pages.previous)}
                                                    <li><a href="school/seminar/detail?page={$pages.previous}"> &lt; </a></li>
                                                {/if}

                                                {foreach item=p from=$pages.pagesInRange}

                                                    {if $pages.current == $p}
                                                        <li><span>{$p|escape}</span></li>
                                                    {else}
                                                        <li><a href="school/seminar/detail?page={$p}"> {$p} </a></li>
                                                    {/if}
                                                {/foreach}

                                                {if isset($pages.next)}
                                                    <li><a href="school/seminar/detail?page={$pages.next}"> &gt; </a></li>
                                                {/if}

                                                {if $pages.current != $pages.last}
                                                    <li><a href="school/seminar/detail?page={$pages.last}"> &gt;&gt; </a></li>
                                                {/if}
                                            </ul>
                                        </div>
                                        {* pagination links *}
                                {else}
                                    {$msg[21].message}<br />
                                {/if}
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/common.js"></script>
<script>
    document.title="セミナー詳細情報";
    var crm_id, data;
    smp = {$smp};

    {foreach item=item from=$lists}
        crm_id = '{$item.customid}';
        {literal}
            data = {'crm_id': crm_id, 'append': crm_id};
            submit_action('school/seminar/memolist', data, 'append_memo');
        {/literal}
    {/foreach}
</script>

{include file=$footer}