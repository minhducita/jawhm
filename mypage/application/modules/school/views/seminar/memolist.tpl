{if $items|@count > 0}
    {foreach item=item from=$items}
        <li class="list-group-item inc-memo2">
            <span class="col-xs-12 col-md-2 kill-rlpadding list-group-item-info seminar-comment">
                <span class="col-xs-7 col-md-12">{$msg[17].message}</span>
                <span class="col-md-8">
                    {if $item.writer_from === 'school'}
                        <i id="edit_seminar_memo{$item.crm_id}" abbr="{$item.crm_id}_{$item.mypage_client_memo_id}" class="icon-edit clickable col-xs-1 kill-rlpadding edit_seminar_memo"></i>
                        <i id="delseminarmemo" abbr="{$item.crm_id}_{$item.mypage_client_memo_id}_{$item.memo}" class="icon-trash clickable col-xs-1 kill-rlpadding delseminarmemo"></i>
                    {/if}
                </span>
            </span>

            <span class="col-xs-12 col-md-9 {if $smp == 1}kill-rlpadding{/if} seminar-memo">
                【{if $item.writer_from === 'school'}{$school_name} {$msg[18].message}{else}{$msg[19].message}{/if}】<br />
                {$item.memo|nl2br nofilter}
            </span>
        </li>
        <script>
            $('#edit_seminar_memo'+{$item.crm_id}).click(function() {
                {literal}
                var comment_id = $(this).attr("abbr").split("_");
                var data = {'crm_id': comment_id[0],
                            'id' : comment_id[1]};
                {/literal}
                submit_action('school/seminar/changememo', data, null);
                $("#modal-window").modal();
            });
        </script>
    {/foreach}
{/if}
<a id="edit_seminar_memo{$crm_id}" abbr="{$crm_id}_new" class="edit_seminar_memo list-group-item list-group-item-info kill-rlpadding clickable text-center seminar-new-memo">
    <span class="col-xs-12 kill-rlpadding">
        {$msg[20].message}
        <i class="icon-edit"></i>
    </span>
</a>
<script>
    $('#edit_seminar_memo{$crm_id}').click(function() {
        {literal}
        var comment_id = $(this).attr("abbr").split("_");
        var data = {'crm_id': comment_id[0],
                    'id' : comment_id[1]};
        {/literal}
        submit_action('school/seminar/changememo', data, null);
        $("#modal-window").modal();
    });
</script>
{if $items|@count > 0}
    <li class="list-group-item">
        {* pagination links *}
        <div class="text-center">
            {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
            <ul class="pagination kill-tbmargin">
                {if $pages.current != $pages.first}
                    <li><a id="page_{$pages.first}_{$crm_id}"> &lt;&lt; </a>
                {/if}

                {if isset($pages.previous)}
                    <li><a id="page_{$pages.previous}_{$crm_id}"> &lt; </a></li>
                {/if}

                {foreach item=p from=$pages.pagesInRange}

                    {if $pages.current == $p}
                        <li><span>{$p|escape}</span></li>
                    {else}
                        <li><a id="page_{$p}_{$crm_id}"> {$p} </a></li>
                    {/if}
                {/foreach}

                {if isset($pages.next)}
                    <li><a id="page_{$pages.next}_{$crm_id}"> &gt; </a></li>
                {/if}

                {if $pages.current != $pages.last}
                    <li><a id="page_{$pages.last}_{$crm_id}"> &gt;&gt; </a></li>
                {/if}
            </ul>
        </div>
        {* pagination links *}
    </li>
{/if}