{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="{$base}/mypage/staff/index/index">スタップトップページ</a></li>
  <li><a href="{$base}/mypage/staff/index/manage">管理項目</a></li>
  <li>空港名編集</li>
</ol>

<div class="contents-wrapper">
    <h2>空港名編集</h2>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>国名</th>
            <th>日本語名</th>
            <th>ひらがな名</th>
            <th>英語名</th>
            <th class="editable text-center">編集</th>
            <th class="editable text-center">削除</th>
        </tr>
    <thead>

    <tbody>
    {$i = 1}
    {foreach item=item from=$items}
        <tr class="table-custom-striped table-custom-hover">
            <td>{$i}</td>
            <td>{$item.country_name}</td>
            <td>{$item.japanese_name}</td>
            <td>{$item.hiragana}</td>
            <td>{$item.english_name}</td>
            <td class="editable text-center"><span id="airportedit_{$item.take_off_place_id}" class="glyphicon glyphicon-edit clickable"></span></td>
            <td class="editable text-center"><span id="airportdelete_{$item.take_off_place_id}" class="clickable"><img src="themes/images/delete.png" /></span></td>
        </tr>
        {$i = $i + 1}
    {/foreach}
    </tbody>
</table>
<br />

<h2 id="airportcreate" class="clickable"><span class="glyphicon glyphicon-edit">新規項目追加</span></h2>

{include file=$footer}