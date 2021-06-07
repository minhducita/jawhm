{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="{$base}/mypage/staff/index/index">スタップトップページ</a></li>
  <li><a href="{$base}/mypage/staff/index/manage">管理項目</a></li>
  <li>学校担当者編集一覧</li>
</ol>

<div class="contents-wrapper">
    <h2>学校担当者編集一覧</h2>

</div>
{if $schools|@count > 0}

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ログインID</th>
                <th>学校名(短縮)</th>
                <th>学校名</th>
                <th>担当者名</th>
                <th>メールアドレス</th>
                <th class="editable text-center">担当</th>
                <th class="editable text-center">編集</th>
                <th class="editable text-center">削除</th>
            </tr>
        <thead>{$i = 1}
        {foreach item=item from=$schools}
            <tbody class="table-custom-striped table-custom-hover">
                <tr>
                    <td>{$i}</td>
                    <td>{$item.school_id}</td>
                    <td>{$item.school_name}</td>
                    <td>{$item.school_full_name}</td>
                    <td>{$item.charge_name}</td>
                    <td>{$item.email}</td>
                    <td class="editable text-center"><span id="schoolcharge-{$item.mypage_school_memlist_id}-{$item.school_id}-{$item.school_name}" class="glyphicon glyphicon-user clickable"></span></td>
                    <td class="editable text-center"><span id="schooledit-{$item.mypage_school_memlist_id}" class="glyphicon glyphicon-edit clickable"></span></td>
                    <td class="editable text-center"><span id="schooldel-{$item.mypage_school_memlist_id}" class="glyphicon glyphicon-trash clickable"></span></td>
                </tr>
            </tbody>
            {$i = $i + 1}
        {/foreach}
    </table>
{else}
    現在登録されている学校担当者はいません。
{/if}

<button id="new_school" class="btn btn-primary">新規登録</button>

{include file=$footer}