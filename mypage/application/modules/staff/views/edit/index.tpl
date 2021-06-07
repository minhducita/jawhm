{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="{$base}/mypage/staff/index/index">スタップトップページ</a></li>
  <li><a href="{$base}/mypage/staff/index/manage">管理項目</a></li>
  <li>留学手続き状況・メールテンプレート編集</li>
</ol>

<div class="contents-wrapper">
    <h2>留学手続き状況・メールテンプレート編集</h2>

</div>
{*
<h2>お客様表示用達成状況一覧</h2>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>スタッフ用文言</th>
            <th>お客様用文言</th>
            <th class="editable text-center">編集</th>
        </tr>
    <thead>{$i = 1}
    {foreach item=item from=$item_title}
        <tbody class="table-custom-striped table-custom-hover">
            <tr>
                <td>{$i}</td>
                <td>{$item.content_title}</td>
                <td>{$item.comment_content}</td>
                <td class="editable text-center"><span id="edit_{$item.staff_comment_id}" class="glyphicon glyphicon-edit clickable"></span></td>
            </tr>
        </tbody>
        {$i = $i + 1}
    {/foreach}
</table>
*}
{if $office_cd === 'tokyo'}
    <h2>東京</h2>
    <table class="table">
        <thead>
            <tr>
                <th>スタッフ用文言</th>
                <th>メールテンプレート文言</th>
                <th class="editable text-center">編集</th>
            </tr>
        <thead>{$i = 1}
        {foreach item=item from=$tokyo}
            <tbody class="table-custom-striped table-custom-hover">
                <tr>
                    <td>{$item.content_title}</td>
                    <td>{$item.comment_content|truncate:80}</td>
                    <td class="editable text-center"><span id="edit_{$item.staff_comment_id}" class="glyphicon glyphicon-edit clickable"></span></td>
                </tr>
            </tbody>
            {$i = $i + 1}
        {/foreach}
    </table>

    <h2>富山</h2>
    <table class="table">
        <thead>
            <tr>
                <th>スタッフ用文言</th>
                <th>メールテンプレート文言</th>
                <th class="editable text-center">編集</th>
            </tr>
        <thead>{$i = 1}
        {foreach item=item from=$toyama}
            <tbody class="table-custom-striped table-custom-hover">
                <tr>
                    <td>{$item.content_title}</td>
                    <td>{$item.comment_content|truncate:80}</td>
                    <td class="editable text-center"><span id="edit_{$item.staff_comment_id}" class="glyphicon glyphicon-edit clickable"></span></td>
                </tr>
            </tbody>
            {$i = $i + 1}
        {/foreach}
    </table>

    <h2>沖縄</h2>
    <table class="table">
        <thead>
            <tr>
                <th>スタッフ用文言</th>
                <th>メールテンプレート文言</th>
                <th class="editable text-center">編集</th>
            </tr>
        <thead>{$i = 1}
        {foreach item=item from=$okinawa}
            <tbody class="table-custom-striped table-custom-hover">
                <tr>
                    <td>{$item.content_title}</td>
                    <td>{$item.comment_content|truncate:80}</td>
                    <td class="editable text-center"><span id="edit_{$item.staff_comment_id}" class="glyphicon glyphicon-edit clickable"></span></td>
                </tr>
            </tbody>
            {$i = $i + 1}
        {/foreach}
    </table>
{/if}

{if $office_cd === 'osaka'}
    <h2>大阪</h2>
    <table class="table">
        <thead>
            <tr>
                <th>スタッフ用文言</th>
                <th>メールテンプレート文言</th>
                <th class="editable text-center">編集</th>
            </tr>
        <thead>{$i = 1}
        {foreach item=item from=$osaka}
            <tbody class="table-custom-striped table-custom-hover">
                <tr>
                    <td>{$item.content_title}</td>
                    <td>{$item.comment_content|truncate:80}</td>
                    <td class="editable text-center"><span id="edit_{$item.staff_comment_id}" class="glyphicon glyphicon-edit clickable"></span></td>
                </tr>
            </tbody>
            {$i = $i + 1}
        {/foreach}
    </table>
{/if}

{if $office_cd === 'fukuoka'}
    <h2>福岡</h2>
    <table class="table">
        <thead>
            <tr>
                <th>スタッフ用文言</th>
                <th>メールテンプレート文言</th>
                <th class="editable text-center">編集</th>
            </tr>
        <thead>{$i = 1}
        {foreach item=item from=$fukuoka}
            <tbody class="table-custom-striped table-custom-hover">
                <tr>
                    <td>{$item.content_title}</td>
                    <td>{$item.comment_content|truncate:80}</td>
                    <td class="editable text-center"><span id="edit_{$item.staff_comment_id}" class="glyphicon glyphicon-edit clickable"></span></td>
                </tr>
            </tbody>
            {$i = $i + 1}
        {/foreach}
    </table>
{/if}

{if $office_cd === 'nagoya'}
    <h2>名古屋</h2>
    <table class="table">
        <thead>
            <tr>
                <th>スタッフ用文言</th>
                <th>メールテンプレート文言</th>
                <th class="editable text-center">編集</th>
            </tr>
        <thead>{$i = 1}
        {foreach item=item from=$nagoya}
            <tbody class="table-custom-striped table-custom-hover">
                <tr>
                    <td>{$item.content_title}</td>
                    <td>{$item.comment_content|truncate:80}</td>
                    <td class="editable text-center"><span id="edit_{$item.staff_comment_id}" class="glyphicon glyphicon-edit clickable"></span></td>
                </tr>
            </tbody>
            {$i = $i + 1}
        {/foreach}
    </table>
{/if}
<br /><br />
<br /><br />
{include file=$footer}