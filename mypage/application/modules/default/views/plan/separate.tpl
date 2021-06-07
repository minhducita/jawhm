{if $items|@count >= 1}
<div class="panel-group" id="accordion">
        <ol class="list-group">
                {$i = 0} {$j = 100}{foreach item=item from=$items}
                {if $item.item_name==='タイトル'}
                <li class="list-group-item kill-padding">
                    {if $item.step_sub_number==0}
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    {$item.description}
                                </h4>
                            </div>
                    {else}
                        <div class="panel panel-default">
                                <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                                href="#{$i}"
                                                class="list-group-item panel-heading {if $status[$chart.$n]==1}panel-complete-color{else}panel-link-color{/if}">
                                                {$item.step_sub_number}. {$item.description nofilter}
                                                {if $n < 17}{if $status[$chart.$n]==1}<span class="pull-right"><i class="glyphicon glyphicon-ok"></i></span>{/if}{/if}
                                                {$n = $n + 1}
                                        </a>
                                </h4>
                    {/if}
                                {else if $item.item_name==='内容' || $item.subtitle_flag==1} {if
                                $item.item_name==='内容'}
                                <div id="{$i}" {if $item.step_sub_number!=0}class="panel-collapse collapse"{/if}>
                                        {$i = $i + 1}
                                        <div class="panel-body">{$item.description nofilter}</div>
                                        {/if} {if $item.subtitle_flag==1} {if
                                        $item.item_name==='サブタイトル'}
                                        <div class="panel-body" style="padding: 0;">
                                                <div class="panel panel-default">
                                                        <h5 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                        href="#{$j}"
                                                                        class="list-group-item panel-heading panel-sublink-color">
                                                                        <span class="glyphicon glyphicon-chevron-right"
                                                                        style="padding-left: 15px;"></span>{$item.description nofilter}
                                                                </a>
                                                        </h5>
                                                        {else if $item.item_name==='サブ内容'}
                                                        <div id="{$j}" class="panel-collapse collapse">
                                                                {$j = $j + 1}
                                                                <div class="panel-body">
                                                                        {$item.description nofilter}<br />
                                                                </div>

                                                        </div>
                                                        {if $item.subtitle_flag==0}
                                                </div>

                                        </div>
                                </div>

                        </div>
                </li> {/if} {/if}{/if}{/if} {/foreach}
        </ol>
</div>
<button type="button" id="stepchart" class="btn btn-primary">戻る</button>
{else} 現在ステップチャート準備中です。 {/if}
<script>
var agree = '{$agree}';
    {literal}
        $("#canwhdl").click(function() {
            if (agree === '1') {
                window.open('application/canwhdl', '_new');
            } else {
                alert('詳細情報は約款事項に同意が確認でき次第ご覧いただけます。');
            }
        });
    {/literal}
</script>