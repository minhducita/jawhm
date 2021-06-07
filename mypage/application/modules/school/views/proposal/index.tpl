{include file=$header}
<div class="main-content">
    <div id="breadcrumbs" class="breadcrumbs breadcrumbs-fixed">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="school/index/index">{$brd_msg[0].message}</a>
            </li>
            <li class="active">
                {$brd_msg[7].message}
            </li>
        </ul>
    </div>

    <div class="page-content">
        <div class="contents-wrapper">
            <h2>{$msg[0].message}</h2>
            {$msg[1].message}<br />
            {$msg[2].message}<br />
            {$msg[3].message}
        </div>
        <a id="proposal_seminar_new"><span class="glyphicon glyphicon-pencil">{$msg[4].message}</span></a>
        {if $items|@count >= 1}
            {$no = $pages.firstItemNumber}
            {$i = 0}
            {foreach item=item from=$items}
                <div class="panel panel-primary" style="padding-left:0; padding-right:0;">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            No: {$no} [{$msg[5].message}] {if $item.decision_flag==0}{$msg[15].message}{else if $item.decision_flag==1}{$msg[16].message}{else if $item.decision_flag==2}{$msg[17].message}{/if}
                            <span class="pull-right"><span id="proposal_seminar_{$item.mypage_seminar_proposal_id}" class="clickable"><span class="glyphicon glyphicon-list-alt"></span><span class="white-space">{$msg[13].message}</span><spana>
                        </h4>
                    </div>

                    <div class="panel-body">
                        <ul class="list-group col-xs-12 kill-ul-padding">
                            <li class="list-group-item inc-multi">
                                <span class="col-xs-5 col-md-2 kill-rlpadding">{$msg[6].message}</span>
                                <span class="col-xs-7 col-md-4 kill-rlpadding">{$item.expected_seminar_datetime|date_format:"%G/%m/%d %H:%M"}</span>
                                <span class="col-xs-5 col-md-2 kill-rlpadding">{$msg[7].message}</span>
                                <span class="col-xs-7 col-md-4 kill-rlpadding">{$item.expected_require_time}</span>
                            </li>
                            <li class="list-group-item inc-btn">
                                <span class="col-xs-5 col-md-2 kill-rlpadding">{$msg[8].message}</span>
                                <span class="col-xs-7 col-md-10 kill-rlpadding">{$item.speaker_name}</span>
                            </li>
                            <li class="list-group-item inc-memo">
                                <span class="col-xs-5 col-md-2 kill-rlpadding">{$msg[9].message}</span>
                                <span class="col-xs-7 col-md-10 kill-rlpadding memo{$i}">{$item.school_comment}</span>
                            </li>
                            {$i =$i + 1}
                            <li class="list-group-item inc-memo">
                                <span class="col-xs-5 col-md-2 kill-rlpadding">{$msg[10].message}</span>
                                <span class="col-xs-7 col-md-10 kill-rlpadding memo{$i}">{$item.staff_comment}</span>
                            </li>
                            {$i =$i + 1}
                            <li class="list-group-item inc-btn">
                                <span class="col-xs-5 col-md-2 kill-rlpadding">{$msg[11].message}</span>
                                <span class="col-xs-7 col-md-4 kill-rlpadding">{$item.created_on|date_format:"%G/%m/%d %H:%M"}</span>
                                <span class="col-xs-5 col-md-2 kill-rlpadding">{$msg[12].message}</span>
                                <span class="col-xs-7 col-md-4 kill-rlpadding">{$item.updated_on|date_format:"%G/%m/%d %H:%M"}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                {$no = $no + 1}
            {/foreach}
            {* pagination links *}
            <div class="text-center col-xs-12">
                {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
                <ul class="pagination">
                    {if $pages.current != $pages.first}
                        <li><a href="school/proposal/index?page={$pages.first}"> &lt;&lt; </a>
                    {/if}

                    {if isset($pages.previous)}
                        <li><a href="school/proposal/index?page={$pages.previous}"> &lt; </a></li>
                    {/if}

                    {foreach item=p from=$pages.pagesInRange}

                        {if $pages.current == $p}
                            <li><span>{$p|escape}</span></li>
                        {else}
                            <li><a href="school/proposal/index?page={$p}"> {$p} </a></li>
                        {/if}
                    {/foreach}

                    {if isset($pages.next)}
                        <li><a href="school/proposal/index?page={$pages.next}"> &gt; </a></li>
                    {/if}

                    {if $pages.current != $pages.last}
                        <li><a href="school/proposal/index?page={$pages.last}"> &gt;&gt; </a></li>
                    {/if}
                </ul>
            </div>
            {* pagination links *}
        {else}
            <p>
                {$msg[14].message}
            </p>
        {/if}
    </div>
</div>
{include file=$footer}