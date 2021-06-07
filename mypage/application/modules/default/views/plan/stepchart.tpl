{if $items|@count >= 1}
<div class="panel-group" id="accordion">
        <ol class="list-group">
                {$i = 0} {$j = 100} {$n = 0} {foreach item=item from=$items} {if
                $item.separate_flag==0} {if $item.item_name==='タイトル'}
                    <li class="list-group-item kill-padding">
                        <div class="panel panel-default">
                                <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                                href="#{$i}"
                                                class="list-group-item panel-heading {if $status[$chart.$n]==1}panel-complete-color{else}panel-link-color{/if}">
                                                {$item.step_sub_number}. {$item.description}
                                                {if $status[$chart.$n]==1}<span class="pull-right"><i class="glyphicon glyphicon-ok"></i></span>{/if}
                                                {$n = $n + 1}
                                        </a>

                                </h4>
                                {else if $item.item_name==='内容' || $item.subtitle_flag==1} {if
                                $item.item_name==='内容'}
                                <div id="{$i}" class="panel-collapse collapse">
                                        {$i = $i + 1}
                                        <div class="panel-body">
                                                {$item.description nofilter} {if $item.detail_flag==1} <br />
                                                <button type="button" id="separate_{$item.separate_number}" class="btn btn-primary">詳しくみる</button>
                                                {else if $item.flight_flag==1}
                                                <button type="button" id="flight_inquiry"
                                                        class="btn btn-primary">見積依頼</button>
                                                {if $is_send.is_inquery > 0}
                                                <button type="button" id="inquiry_list"
                                                        class="btn btn-warning">見積確認</button>
                                                {/if} {/if}
                                        </div>
                                        {/if} {if $item.subtitle_flag==1} {if
                                        $item.item_name==='サブタイトル'}
                                        <div class="panel-body" style="padding: 0;">
                                                <div class="panel panel-default">
                                                        <h5 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                        href="#{$j}"
                                                                        class="list-group-item panel-heading panel-sublink-color">
                                                                        <span class="glyphicon glyphicon-chevron-right"
                                                                        style="padding-left: 15px;"></span>{$item.description}
                                                                </a>
                                                        </h5>
                                                        {else if $item.item_name==='サブ内容'}
                                                        <div id="{$j}" class="panel-collapse collapse">
                                                                {$j = $j + 1}
                                                                <div class="panel-body">
                                                                        {$item.description nofilter}<br /> {if $item.detail_flag==1}
                                                                        <button type="button" id="separate_{$item.separate_number}"
                                                                                class="btn btn-primary">詳しくみる</button>

                                                                </div>
                                                                {/if}

                                                        </div>
                                                        {if $item.subtitle_flag==0}
                                                </div>

                                        </div>
                                </div>

                        </div>
                </li> {/if} {/if}{/if}{/if} {/if} {/foreach}
        </ol>
</div>
{else} 現在ステップチャート準備中です。 {/if}