{include file=$header}
    <div class="main-content">
        <div id="breadcrumbs" class="breadcrumbs breadcrumbs-fixed">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="school/index/index">{$brd_msg[0].message}</a>
                </li>
                <li>
                    <a href="school/client/index">{$brd_msg[1].message}</a>
                </li>
                <li class="active">
                    {$brd_msg[2].message}
                </li>
            </ul>
        </div>

        <div class="page-content">
            <div class="wrapper col-xs-12" style="margin-bottom: 50px;">
                <div class="col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">{$base_info.9}{$msg[0].message}</h4>
                        </div>

                        <div class="panel-body">
                            <button type="button" id="print_info_{$base_info.client_no}_{$base_info.8}" class="btn btn-primary client-button btn-margin-top">{$msg[1].message}</button>
                            <button type="button" id="file_upload" class="btn btn-primary btn-margin-top client-button">{$msg[2].message}</button>
                            <span class="btn-margin-top"><a href="school/client/filelist" class="btn btn-primary client-button" role="button">{$msg[3].message}</a></span>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">{$msg[4].message}</h4>
                        </div>

                        <div class="panel-body">
                            <ul class="list-group col-xs-12 kill-ul-padding">
                                <li class="list-group-item inc-multi">
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[5].message}</span>
                                    <span class="col-xs-8 col-md-4 kill-rlpadding">{$base_info.9} {if $smp==0}{$base_info.10} {$base_info.11}{/if}</span>
                                    {if $smp==1}<span class="col-xs-12 kill-rlpadding"></span><span class="col-xs-4 kill-rlpadding"></span><span class="col-xs-8 kill-rlpadding">{$base_info.10} {$base_info.11}</span>{/if}
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[6].message}</span>
                                    <span class="col-xs-8 col-md-2 kill-rlpadding">{if $base_info.12 == 1}{$msg[7].message}{else}{$msg[8].message}{/if}</span>
                                </li>
                                <li class="list-group-item inc-multi">
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[9].message}</span>
                                    <span class="col-xs-8 col-md-4 kill-rlpadding">{$base_info.memo}</span>
                                    <span class="col-xs-4 col-md-1 kill-rlpadding">{$msg[10].message}</span>
                                    <span class="col-xs-8 col-md-3 kill-rlpadding">{$base_info.entrance_date|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message}"}</span>
                                    <span class="col-xs-4 col-md-1 kill-rlpadding">{$msg[11].message}</span>
                                    <span class="col-xs-8 col-md-1 kill-rlpadding">{$base_info.weeks}{$msg[47].message}</span>
                                </li>
                                <li class="list-group-item inc-multi">
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[12].message}</span>
                                    <span class="col-xs-8 col-md-6 kill-rlpadding">{$email.0}</span>
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[13].message}</span>
                                    <span class="col-xs-8 col-md-2 kill-rlpadding">{$address.0}</span>
                                </li>
                                <li class="list-group-item inc-btn">
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[14].message}</span>
                                    <span class="col-xs-8 col-md-10 kill-rlpadding">{$address.1}{$address.2}{$address.3}{$address.4}</span>
                                </li>
                                <li class="list-group-item inc-btn">
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[15].message}</span>
                                    <span class="col-xs-8 col-md-4 kill-rlpadding">{$insurance.provider_name}</span>
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[16].message}</span>
                                    <span class="col-xs-8 col-md-4 kill-rlpadding">{$insurance.policy_number}</span>
                                </li>
                                <li class="list-group-item inc-multi">
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[17].message}</span>
                                    <span class="col-xs-8 col-md-4 kill-rlpadding">{$insurance.insured_date_st|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message}"}</span>
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[18].message}</span>
                                    <span class="col-xs-8 col-md-4 kill-rlpadding">{$insurance.insured_date_ed|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message}"}</span>
                                </li>
                                <li class="list-group-item inc-multi">
                                    <span class="col-xs-3 col-md-2 kill-rlpadding">{$msg[19].message}</span>
                                    <span class="col-xs-9 col-md-4 kill-rlpadding">{$visa.visa_type}</span>
                                    <span class="col-xs-3 col-md-2 kill-rlpadding">{$msg[20].message}</span>
                                    <span class="col-xs-9 col-md-4 kill-rlpadding">{$visa.visa_number}</span>
                                </li>
                                <li class="list-group-item inc-multi">
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[21].message}</span>
                                    <span class="col-xs-8 col-md-4 kill-rlpadding">{$visa.expected_entrance_date|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message}"}</span>
                                    <span class="col-xs-4 col-md-2 kill-rlpadding">{$msg[22].message}</span>
                                    <span class="col-xs-8 col-md-4 kill-rlpadding">{$visa.visa_expiry_date|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message}"}</span>
                                </li>
                                <li class="list-group-item inc-btn">
                                    <span class="col-xs-5 col-md-2 kill-rlpadding">{$msg[23].message}</span>
                                    <span class="col-xs-7 col-md-4 kill-rlpadding">{$family.0}</span>
                                    <span class="col-xs-5 col-md-2 kill-rlpadding">{$msg[24].message}</span>
                                    <span class="col-xs-7 col-md-4 kill-rlpadding">{$visa.passport_number}</span>
                                </li>

                                {foreach item=item from=$contact_school}
                                    <li class="list-group-item inc-memo">
                                        <span class="col-xs-12 col-md-2 kill-rlpadding list-group-item-info client-memo-title">
                                            <span class="col-xs-7 col-md-12">{$msg[25].message}</span>
                                            <span class="col-md-8">
                                               {if $item.writer_from === 'school'}
                                                   <i id="edit_client_memo_{$item.mypage_client_memo_id}" class="icon-edit clickable col-xs-1 kill-rlpadding"></i>
                                                   <i id="delmemo_{$item.mypage_client_memo_id}_{$item.memo}" class="icon-trash clickable col-xs-1 kill-rlpadding"></i>
                                               {/if}
                                            </span>
                                        </span>

                                        <span class="col-xs-12 col-md-9 {if $smp == 1}kill-rlpadding{/if} client-memo">
                                            【{if $item.writer_from === 'school'}{$school_name} {$msg[48].message}{else}{$msg[49].message}{/if}】<br />
                                            {$item.memo|nl2br nofilter}
                                        </span>
                                    </li>
                                {/foreach}

                                <a id="edit_client_memo_new" class="list-group-item list-group-item-info kill-rlpadding clickable text-center client-new-memo">
                                    <span class="col-xs-12 kill-rlpadding">
                                        {$msg[26].message}
                                       <i class="icon-edit"></i>
                                    </span>
                                </a>
                                <li class="list-group-item">
                                    {* pagination links *}
                                    <div class="text-center">
                                        {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
                                        <ul class="pagination kill-tbmargin">
                                            {if $pages.current != $pages.first}
                                                <li><a href="school/client/detail?page={$pages.first}"> &lt;&lt; </a>
                                            {/if}

                                            {if isset($pages.previous)}
                                                <li><a href="school/client/detail?page={$pages.previous}"> &lt; </a></li>
                                            {/if}

                                            {foreach item=p from=$pages.pagesInRange}

                                                {if $pages.current == $p}
                                                    <li><span>{$p|escape}</span></li>
                                                {else}
                                                    <li><a href="school/client/detail?page={$p}"> {$p} </a></li>
                                                {/if}
                                            {/foreach}

                                            {if isset($pages.next)}
                                                <li><a href="school/client/detail?page={$pages.next}"> &gt; </a></li>
                                            {/if}

                                            {if $pages.current != $pages.last}
                                                <li><a href="school/client/detail?page={$pages.last}"> &gt;&gt; </a></li>
                                            {/if}
                                        </ul>
                                    </div>
                                    {* pagination links *}
                                </li>
                            </ul>
                        </div>
                    </div>

                    {if !is_null($passport)}
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">{$msg[27].message}</h4>
                            </div>

                            <div class="panel-body">
                                <ul class="list-group col-xs-12 passport">
                                    <li class="list-group-item kill-allpadding">
                                        <img id="face" src="{$passport}" class="passport-resize">
                                        {if $smp == 1} <a href="school/client/getpassport" target="_blank">{$msg[28].message}</a>{/if}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    {/if}
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">{$msg[29].message}</h4>
                        </div>

                        <div class="panel-body">
                            <ul class="list-group" style="margin-bottom: 0;">
                                {if $flight|@count >= 1}
                                    {foreach item=item from=$flight}
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    {$msg[30].message}: <span class="text-bold text-italic">{$item.flight_number}</span>
                                                </div>
                                            </div>

                                            <div class="panel-body" style="margin-bottom: 30px;">
                                                <ul class="list-group col-xs-12 kill-ul-padding">
                                                    <li class="list-group-item inc-btn">
                                                        <span class="col-xs-12 col-md-3 kill-rlpadding">{$msg[31].message}</span>
                                                        <span class="col-xs-12 col-md-9 kill-rlpadding">{$item.departure_place}</span>
                                                    </li>
                                                    <li class="list-group-item inc-btn">
                                                        <span class="col-xs-12 col-md-3 kill-rlpadding">{$msg[32].message}</span>
                                                        <span class="col-xs-12 col-md-9 kill-rlpadding">{$item.departure_time|date_format:"%m{$head_msg[2].message}%d{$head_msg[3].message} %H{$head_msg[4].message}%M{if $lang === 'ja'}{$head_msg[5].message}{/if}"}</span>
                                                    </li>

                                                    <li class="list-group-item inc-btn">
                                                        <span class="col-xs-12 col-md-3 kill-rlpadding">{$msg[33].message}</span>
                                                        <span class="col-xs-12 col-md-9 kill-rlpadding">{$item.destination_place}</span>
                                                    </li>
                                                    <li class="list-group-item inc-btn">
                                                        <span class="col-xs-12 col-md-3 kill-rlpadding">{$msg[34].message}</span>
                                                        <span class="col-xs-12 col-md-9 kill-rlpadding">{$item.destination_time|date_format:"%m{$head_msg[2].message}%d{$head_msg[3].message} %H{$head_msg[4].message}%M{if $lang === 'ja'}{$head_msg[5].message}{/if}"}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    {/foreach}
                                {else}
                                    {$msg[35].message}<br />
                                {/if}
                            </ul>
                        </div>
                    </div>
                </div>

                {$i = 1}
                {$j = 0}
                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">{$msg[36].message}</h4>
                        </div>

                        <div class="panel-body">
                            {if $items|@count > 0}
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            {$msg[37].message}{$i}: {$msg[38].message}
                                        </h4>
                                    </div>
                                    <div class="panel-body">
                                        <ul class="list-group col-xs-12 kill-ul-padding">
                                            <li class="list-group-item inc-btn">
                                                <span class="col-xs-12 col-md-3 kill-rlpadding">{$msg[43].message}</span>
                                                <span class="col-xs-12 col-md-9 kill-rlpadding">{$base_info.leave_date|date_format:"%m{$head_msg[2].message}%d{$head_msg[3].message}"}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                {$i = $i + 1}
                                {foreach item=item from=$items}
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                {$msg[37].message}{$i}
                                                {if $item.entry_class == 9}{$msg[39].message}: {$item.flight_number}{/if}
                                                {if $item.entry_class == 3}{$msg[40].message}{/if}
                                                {if $item.entry_class == 2}{$msg[41].message}{/if}
                                                {if $item.entry_class == 1}{$msg[42].message}{/if}
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="list-group col-xs-12 kill-ul-padding">
                                                <li id="inc-subject_{$j}" class="list-group-item">
                                                    <span class="col-xs-12 col-md-3 kill-rlpadding">
                                                        {if $item.entry_class == 9}{$msg[44].message}
                                                        {else if $item.entry_class == 1}{$msg[50].message}
                                                        {else}{$msg[43].message}
                                                        {/if}
                                                    </span>
                                                    <span id="school_{$j}" class="col-xs-12 col-md-9 kill-rlpadding">
                                                        {if $item.entry_class == 3 || $item.entry_class == 2}{$item.event_date|date_format:"%m{$head_msg[2].message}%d{$head_msg[3].message}"}{/if}
                                                        {if $item.entry_class == 1}{$item.7}{/if}
                                                        {if $item.entry_class == 9}{$item.event_date|date_format:"%m{$head_msg[2].message}%d{$head_msg[3].message} %H{$head_msg[4].message}%M{if $lang === 'ja'}{$head_msg[5].message}{/if}"}{/if}
                                                    </span>
                                                </li>
                                                {if $item.entry_class == 9 || $item.entry_class == 1}
                                                    <ul class="list-group col-xs-12 kill-ul-padding">
                                                        <li class="list-group-item inc-btn">
                                                            <span class="col-xs-12 col-md-3 kill-rlpadding">{$msg[45].message}</span>
                                                            <span class="col-xs-12 col-md-9 kill-rlpadding">
                                                                {if $item.entry_class == 9}
                                                                    {$item.destination_time|date_format:"%m{$head_msg[2].message}%d{$head_msg[3].message} %H{$head_msg[4].message}%M{if $lang === 'ja'}{$head_msg[5].message}{/if}"}
                                                                {else if $item.entry_class == 1}
                                                                    {$item.event_date|date_format:"%m{$head_msg[2].message}%d{$head_msg[3].message}"}
                                                                {/if}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                {/if}
                                            </ul>
                                        </div>
                                    </div>
                                    {$i = $i + 1}
                                    {$j = $j + 1}
                                {/foreach}
                            {else}
                                {$msg[46].message}
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    document.title="お客様詳細情報";
</script>
{include file=$footer}