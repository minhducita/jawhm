{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="{$base}/mypage/staff/index/index">スタップトップページ</a></li>
  <li>お客様コメント(学校)</li>
</ol>

<div class="contents-wrapper">
    <h2>{$name}様コメント一覧</h2>
</div>

{if $items|@count > 0}
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>発言者</th>
                <th>コメントページ</th>
                <th>メモ</th>
                <th class="editable text-center">返信</th>
                <th class="editable text-center">編集</th>
            </tr>
        </thead>

        <tbody>
        {$i = 1}
        {foreach item=item from=$items}
            <tr class="table-custom-striped table-custom-hover">
                <td>{$i}{if $item.writer_from === 'school'}{if $item.updated_on > $yesterday}<span class="badge">new</span>{/if}{/if}</td>
                <td>{if $item.writer_from === 'school'}{$item.school_id}{else}staff{/if}</td>
                <td>{if $item.module === 'client'}お客様詳細{else}セミナー詳細{/if}</td>
                <td class="description">{$item.memo}</td>
                <td class="editable text-center"><span id="staff-comment_{$item.module}" class="glyphicon glyphicon-share-alt clickable"></span></td>
                <td class="editable text-center">{if $item.writer_from != 'school'}<span id="comment-edit_{$item.mypage_client_memo_id}_{$item.module}" class="glyphicon glyphicon-edit clickable"></span>{/if}</td>
            </tr>
            {$i = $i + 1}
        {/foreach}
        </tbody>
    </table>

    {* pagination links *}
    <div class="text-center col-xs-12">
        {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
        <ul class="pagination">
            {if $pages.current != $pages.first}
                <li><a href="staff/school/index?page={$pages.first}"> &lt;&lt; </a>
            {/if}

            {if isset($pages.previous)}
                <li><a href="staff/school/index?page={$pages.previous}"> &lt; </a></li>
            {/if}

            {foreach item=p from=$pages.pagesInRange}
                {if $pages.current == $p}
                    <li><span>{$p|escape}</span></li>
                {else}
                    <li><a href="staff/school/index?page={$p}"> {$p} </a></li>
                {/if}
            {/foreach}

            {if isset($pages.next)}
                <li><a href="staff/school/index?page={$pages.next}"> &gt; </a></li>
            {/if}

            {if $pages.current != $pages.last}
                <li><a href="staff/school/index?page={$pages.last}"> &gt;&gt; </a></li>
            {/if}
        </ul>
    </div>
    {* pagination links *}
{else}
    お客様コメントはありません。
{/if}
<br />

<h2 id="commentcreate" class="clickable"><span class="glyphicon glyphicon-edit">お客様メモ追加</span></h2>

{include file=$footer}