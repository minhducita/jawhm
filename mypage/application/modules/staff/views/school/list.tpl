{if $items|@count > 0}
    {$no = $pages.firstItemNumber}
    {$i = 0}
    {foreach item=item from=$items}
        <div class="panel panel-success" style="padding-left:0; padding-right:0;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    No: {$no} [決定状態] {if $item.decision_flag==0}取消{else if $item.decision_flag==1}未決{else if $item.decision_flag==2}決定{/if}
                    <span class="pull-right"><span id="proposal_seminar_{$item.mypage_seminar_proposal_id}" class="clickable"><span class="glyphicon glyphicon-list-alt"></span><span class="white-space">返信</span><spana>
                </h4>
            </div>

            <div class="panel-body">
                <ul class="list-group col-xs-12 kill-ul-padding">
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-5 col-md-2 kill-rlpadding">提案日時</span>
                        <span class="col-xs-7 col-md-4 kill-rlpadding">{$item.expected_seminar_datetime|date_format:"%G/%m/%d %H:%M"}</span>
                        <span class="col-xs-5 col-md-2 kill-rlpadding">提案時間(分)</span>
                        <span class="col-xs-7 col-md-4 kill-rlpadding">{$item.expected_require_time}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-5 col-md-2 kill-rlpadding">ご担当者様</span>
                        <span class="col-xs-7 col-md-10 kill-rlpadding">{$item.speaker_name}</span>
                    </li>
                    <li class="list-group-item inc-memo">
                        <span class="col-xs-5 col-md-2 kill-rlpadding">学校様コメント</span>
                        <span class="col-xs-7 col-md-10 kill-rlpadding memo{$i}">{$item.school_comment}</span>
                    </li>
                    {$i =$i + 1}
                    <li class="list-group-item inc-memo">
                        <span class="col-xs-5 col-md-2 kill-rlpadding">スタッフコメント</span>
                        <span class="col-xs-7 col-md-10 kill-rlpadding memo{$i}">{$item.staff_comment}</span>
                    </li>
                    {$i =$i + 1}
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-5 col-md-2 kill-rlpadding">登録日時</span>
                        <span class="col-xs-7 col-md-4 kill-rlpadding">{$item.created_on|date_format:"%G/%m/%d %H:%M"}</span>
                        <span class="col-xs-5 col-md-2 kill-rlpadding">更新日時</span>
                        <span class="col-xs-7 col-md-4 kill-rlpadding">{$item.updated_on|date_format:"%G/%m/%d %H:%M"}</span>
                    </li>
                </ul>
            </div>
        </div>
        {$no = $no + 1}
    {/foreach}

    {* pagination links *}
    {if $searchdecision_flag != ''}{$search_decision_flag = '/'|cat:$searchdecision_flag}{else}{$search_decision_flag = '/'|cat:'null'}{/if}
    {if $searchschool_id != ''}{$search_school_id = '/'|cat:$searchschool_id|replace:' ':','}{else}{$search_school_id='/'|cat:'null'}{/if}
    <div class="text-center">
        {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount} <br />
        <ul class="pagination">
            {if $pages.current != $pages.first}
                <li><a id="firstpage" href="{$pagename}?page={$pages.first}{$search_decision_flag}{$search_school_id}"> &lt;&lt; </a></li>
            {/if}

            {if isset($pages.previous)}
                <li><a id="previouspage" href="{$pagename}?page={$pages.previous}{$search_decision_flag}{$search_school_id}"> &lt; </a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}
                {if $pages.current == $p}
                    <li><span>{$p}</span></li>
                {else}
                    <li><a id="{$p}page" href="{$pagename}?page={$p}{$search_decision_flag}{$search_school_id}"> {$p} </a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a id="nextpage" href="{$pagename}?page={$pages.next}{$search_decision_flag}{$search_school_id}"> &gt; </a></li>
            {/if}

            {if $pages.current < $pages.last}
                <li><a id="lastpage" href="{$pagename}?page={$pages.last}{$search_decision_flag}{$search_school_id}"> &gt;&gt; </a></li>
            {/if}
        </ul>
    </div>
    {* pagination links *}

{else}
    その条件に当てはまる日程提案はありませんでした。
{/if}

<script type="text/javascript" src="themes/js/append.js"></script>
<script>
loadingView(false);

{literal}
    $('.inc-memo').each(function(i) {
        var height = $('.memo'+i).outerHeight() + 20;
        if (height == 21) {
            height = 40;
        }
        $(this).css({'padding-top': '10px', 'padding-bottom': height});
    });

    $('[id^=proposal_seminar]').click(function() {
        var ids = $(this).attr('id').split('_');
        var data = {id: ids[2]};
        submit_action('staff/school/changeproposal', data, null);
        $('#modal-window').modal();
        return false;
    });
    {/literal}
</script>