{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="{$base}/mypage/staff/index/index">スタップトップページ</a></li>
  <li><a href="{$base}/mypage/staff/index/manage">管理項目</a></li>
  <li>次のステップ編集</li>
</ol>

<div class="contents-wrapper">
    <h2>次のステップ編集</h2>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>ステップ名</th>
            <th>次のステップ</th>
            <th>説明</th>
            <th class="editable text-center">編集</th>
            <th class="editable text-center">削除</th>
        </tr>
    <thead>

    <tbody>
    {$i = 1}
    {foreach item=item from=$items}
        <tr class="table-custom-striped table-custom-hover">
            <td>{$i}</td>
            <td>{$item_title[$item.major_step_number]}</td>
            <td>{$item.step_name}</td>
            <td class="description">{$item.description}</td>
            <td class="editable text-center"><span id="stepedit_{$item.mypage_next_step_id}" class="glyphicon glyphicon-edit clickable"></span></td>
            <td class="editable text-center"><span id="stepdelete_{$item.mypage_next_step_id}" class="clickable"><img src="themes/images/delete.png" /></span></td>
        </tr>
        {$i = $i + 1}
    {/foreach}
    </tbody>
</table>
<br />

<h2 id="stepcreate" class="clickable"><span class="glyphicon glyphicon-edit">新規項目追加</span></h2>

{include file=$footer}