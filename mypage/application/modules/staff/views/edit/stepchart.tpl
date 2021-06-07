{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="{$base}/mypage/staff/index/index">スタップトップページ</a></li>
  <li><a href="{$base}/mypage/staff/index/manage">管理項目</a></li>
  <li>ステップチャート編集</li>
</ol>

<div class="contents-wrapper">
    <h2>ステップチャート編集</h2>
</div>
{$pre_item = ''}
{foreach item=item from=$items}
    {if $pre_item != $item.major_item}
        </tbody>
    </table>
    {$pre_item = $item.major_item}
    {$i = 1}
    <h2>
        {$item.step_number}. {$item.major_item}
        {if isset($item.separate_number)}
            {if $item.step_number < $item.separate_number}
                (詳細ページ名: {$item_title[$item.separate_number]})
            {else}
                (遷移元ページ名: {$item_title[$item.step_number]})
            {/if}
        {/if}
    </h2>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>項目</th>
                <th>文章</th>
                <th>詳細フラグ</th>
                <th>副題フラグ</th>
                <th>航空券見積ボタン可視</th>
                <th>詳細ボタン可視</th>
                <th class="editable text-center">編集</th>
            </tr>
        <thead>

        <tbody>
            <tr class="table-custom-striped table-custom-hover">
                <td>{$i}</td>
                <td>{$item.item_name}</td>
                <td class="description">{$item.description nofilter}</td>
                <td class="text-center">{if $item.separate_flag == 0}<span class="glyphicon glyphicon-minus"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</td>
                <td class="text-center">{if $item.subtitle_flag == 0}<span class="glyphicon glyphicon-minus"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</td>
                <td class="text-center">{if $item.flight_flag == 0}<span class="glyphicon glyphicon-minus"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</td>
                <td class="text-center">{if $item.detail_flag == 0}<span class="glyphicon glyphicon-minus"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</td>
                <td class="editable text-center"><span id="chartedit_{$item.mypage_step_chart_id}" class="glyphicon glyphicon-edit clickable"></span></td>
                <td class="editable text-center"><span id="chartdelete_{$item.mypage_step_chart_id}" class="clickable"><img src="themes/images/delete.png" /></span></td>
            </tr>
        {$i = $i + 1}
    {else}
        <tr class="table-custom-striped table-custom-hover">
            <td>{$i}</td>
            <td>{$item.item_name}</td>
            <td class="description">{$item.description nofilter}</td>
            <td class="text-center">{if $item.separate_flag == 0}<span class="glyphicon glyphicon-minus"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</td>
            <td class="text-center">{if $item.subtitle_flag == 0}<span class="glyphicon glyphicon-minus"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</td>
            <td class="text-center">{if $item.flight_flag == 0}<span class="glyphicon glyphicon-minus"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</td>
            <td class="text-center">{if $item.detail_flag == 0}<span class="glyphicon glyphicon-minus"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</td>
            <td class="editable text-center"><span id="chartedit_{$item.mypage_step_chart_id}" class="glyphicon glyphicon-edit clickable"></span></td>
            <td class="editable text-center"><span id="chartdelete_{$item.mypage_step_chart_id}" class="clickable"><img src="themes/images/delete.png" /></span></td>
        </tr>
        {$i = $i + 1}
    {/if}
{/foreach}
</tbody>
</table>
<br />

<h2 id="chartcreate" class="clickable"><span class="glyphicon glyphicon-edit">新規項目追加</span></h2>

{include file=$footer}