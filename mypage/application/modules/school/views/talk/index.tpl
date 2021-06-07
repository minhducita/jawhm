{include file=$header}
    <div class="main-content">
        <div id="breadcrumbs" class="breadcrumbs breadcrumbs-fixed">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="school/index/index">{$brd_msg[0].message}</a>
                </li>
                <li class="active">
                    {$brd_msg[6].message}
                </li>
            </ul>
        </div>

        <div class="page-content">
            <div class="contents-wrapper">
                <h2>{$msg[0].message}</h2>
                {$msg[1].message}<br /><br />
                {$msg[2].message}<br /><br />
                {$msg[3].message}
            </div>
            <a id="talk_comment_new"><span class="glyphicon glyphicon-pencil">{$msg[4].message}</span></a>
            <h3>{$msg[5].message}</h3>
            {if $items|@count >= 1}
                {foreach item=item from=$items}
                    {if $item.sender_id != 'JAWHM'}
                        <div class="comment-wrapper">
                            <div class="client-image"><img class="client-size" src="{$logo}"></div>
                            <div class="comment client-comment">
                                <span class="msgspan-topleft">{$item.comment}</span><br />
                                <span class="msgspan-bottomright span-right">{$item.sender_id} {$item.updated_on|date_format:"%m/%d %H:%M"}<br />
                                    <a><span id="talk_comment_{$item.mypage_school_contact_id}" class="glyphicon glyphicon-edit clickable" style="margin-right: 10px;"></span></a>
                                    <a><span id="talk_delcomment_{$item.mypage_school_contact_id}_{$item.updated_on}" class="glyphicon glyphicon-trash clickable"></span></a>
                                </span>
                            </div>
                        </div>
                    {else}
                        <div class="comment-wrapper">
                            <div class="staff-image"><img src="themes/images/staff.png"></div>
                            <div class="comment staff-comment">
                                <span id="answer" class="msgspan-topleft">{$item.comment}</span><br />
                                <span id="ansdate" class="msgspan-bottomright span-right">Staff {$item.updated_on|date_format:"%m/%d %H:%M"}</span>
                            </div>
                        </div>
                    {/if}
                {/foreach}
            {else}
                {$msg[7].message}
            {/if}
        </div>
    </div>
{include file=$footer}