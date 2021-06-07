{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li>一言相談一覧</li>
</ol>

<div class="contents-wrapper">
    <h2>一言相談一覧</h2>
    ご渡航にあたり気になったことがありましたらお気軽にお問い合わせください(300字以内)<br /><br />
    渡航先・ホームステイ先に到着した際もこちらでご一報頂けると助かります。<br /><br />
    また、スタッフより返信がありました際は、ログインに使用しているメールアドレス宛に返信が届いた旨送信させて頂きますのでご了承ください。
</div>
<a id="changetalk_new"><span class="glyphicon glyphicon-pencil">相談内容を入力する</span></a>
{$i=0}
<h3>ご相談・回答内容</h3>
{if $items|@count >= 1}
    {foreach item=item from=$items}
        <div class="comment-wrapper">
            <div class="client-image"><img src="{$base}/mypage/themes/images/client.png"></div>
            <div class="comment client-comment">
                <span class="msgspan-topleft">{$item.talk_content}</span><br />
                <span class="msgspan-bottomright span-right">{$name.client_name} {$item.commented_date|date_format:"%m/%d %H:%M"}<br />
                <span id="changetalk_{$item.talk_id}" class="glyphicon glyphicon-edit clickable" style="margin-right: 30px;"> </span><span id="deltalk_{$item.talk_id}_{$item.commented_date}" class="glyphicon glyphicon-trash"></span></span>
            </div>
            {if $item.ans_flag == 1}
                <div class="staff-image"><img src="{$base}/mypage/themes/images/staff.png"></div>
                <div class="comment staff-comment">
                    <span id="answer_{$i}" class="msgspan-topleft">{$item.ans_content}</span><br />
                    <span id="ansdate_{$i}" class="msgspan-bottomright span-right">Staff {$item.answerd_date|date_format:"%m/%d %H:%M"}</span>
                </div>
            {/if}
        </div>
    {/foreach}
{else}
    現在、お客様からの質問はありません。
{/if}

{include file=$footer}