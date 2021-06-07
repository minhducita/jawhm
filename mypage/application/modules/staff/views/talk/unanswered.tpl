{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="{$base}/mypage/staff/index/index">メンバー専用ページトップ</a></li>
  <li>一言相談一覧</li>
</ol>

<div class="contents-wrapper">
    <h2>未返信一言相談一覧</h2>
    お客様から頂いた質問で、スタッフが未返信の一覧です。<br />
    返信はメールからmypage_talk@jawhm.or.jpの該当メールにてお願いします。
</div>

{$i=0}
<h3>ご相談内容</h3>
{if $items|@count >= 1}
    {foreach item=item from=$items}
        <div class="comment-wrapper">
            <div class="client-image"><img src="{$base}/mypage/themes/images/client.png"></div>
            <div class="comment client-comment">
                <span class="msgspan-topleft">{$item.talk_content}</span><br />
                <span class="msgspan-bottomright span-right">{$item.namae} {$item.commented_date|date_format:"%m/%d %H:%M"}<br />
            </div>
        </div>
    {/foreach}
{else}
    現在、お客様からの質問はありません。
{/if}

{include file=$footer}