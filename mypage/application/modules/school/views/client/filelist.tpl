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

                <li>
                    <a href="school/client/detail">{$brd_msg[2].message}</a>
                </li>
                <li class="active">
                    {$msg[0].message}
                </li>
            </ul>
        </div>

        <div class="wrapper col-xs-12" style="margin-bottom: 50px;">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">{$msg[0].message}</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group col-xs-12">
                            {if $items|@count >= 1}
                                {$n = 0}
                                {foreach item=item from=$items}
                                    {if $item.class!=97 || ($item.class==97 && $item.comment|regex_replace:"/\d+/":"" === $school_name)}
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    {$msg[1].message}:
                                                    <span class="text-bold text-italic">
                                                        {$i = 0}
                                                        {foreach item=m from=$msg}
                                                            {if $item.class == $m.file_class}
                                                                {break}
                                                            {else}
                                                                {$i = $i + 1}
                                                            {/if}
                                                        {/foreach}
                                                        {$msg[$i].message}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <ul class="list-group col-xs-12">
                                                    <li id="inc-memo{$n}" class="list-group-item">
                                                        <span class="col-xs-4 kill-rlpadding">{$msg[22].message}</span>
                                                        <span id="memo_{$n}" class="col-xs-8 kill-rlpadding"><a id="getfile_{$item.branch_no}_{$item.file_name}" target="_blank">{$item.file_name}</a></span>
                                                    </li>
                                                    {$n = $n + 1}
                                                    <li id="inc-memo{$n}" class="list-group-item">
                                                        <span class="col-xs-4 kill-rlpadding">{$msg[23].message}</span>
                                                        <span id="memo_{$n}" class="col-xs-8 kill-rlpadding">{$item.insert_date|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message}%H:%M:%S"}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    {/if}
                                    {$n = $n + 1}
                                {/foreach}
                            {else}
                                {$msg[24].message}
                            {/if}
                        </ul>
                    </div>

                </div>
            </div>
        </div>
{include file=$footer}