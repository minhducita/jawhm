{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="staff/index/index">メンバー専用ページトップ</a></li>
  <li>学校毎つながり一覧</li>
</ol>

<div class="contents-wrapper">
    <h2>つながり一覧</h2>
    ここ1ヶ月の学校毎のつながりのやりとりです。<br />
    返信はメールからmypage_talk@jawhm.or.jpの該当メールにてお願いします。
</div>

{$i=0}
<h3>ご相談内容</h3>
{if $items|@count >= 1}
    {$previous_school = ''}
    {foreach item=item from=$items}
        {if $item.sender_id != 'JAWHM'}
            {$current_school = $item.sender_id}
        {else}
            {$current_school = $item.receiver_id}
        {/if}
        {if $previous_school|lower != $current_school|lower}
            <h2>{$current_school}とのつながり</h2>
            {$previous_school = $current_school}
        {/if}
        <div class="comment-wrapper">
            {if $item.sender_id != 'JAWHM'}
                <div class="client-image"><img class="client-size" src="themes/images/school/{if $item.sender_name != 'JAWHM'}{$item.sender_name}{else}{$item.receiver_name}{/if}.jpg"></div>
                <div class="comment client-comment">
                    <span class="msgspan-topleft">{$item.comment}</span><br />
                    <span class="msgspan-bottomright span-right">{if $item.sender_id != 'JAWHM'}{$item.sender_id}{else}{$item.receiver_id}{/if} {$item.updated_on|date_format:"%m/%d %H:%M"}<br />
                </div>
            {else}
                <div class="staff-image"><img src="themes/images/staff.png"></div>
                <div class="comment staff-comment">
                    <span id="answer_{$i}" class="msgspan-topleft">{$item.comment}</span><br />
                    <span id="ansdate_{$i}" class="msgspan-bottomright span-right">Staff {$item.updated_on|date_format:"%m/%d %H:%M"}</span>
                </div>
            {/if}
        </div>
        {$i = $i + 1}
    {/foreach}
{else}
    現在、学校からの質問はありません。
{/if}

{include file=$footer}