{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}member/index">会員情報変更</a></li>
  <li>メールアドレス変更</li>
</ol>

<div class="contents-wrapper">
    <h4>メールアドレス変更</h4>
    お客様にご登録頂いたメールアドレスの一覧です。<br />
    種類より右側の項目はクリックすることで編集可能です。<br />
    該当アドレスに当協会から状況確認等送信しますので、最低1つお客様に届くメールアドレスを設定してください(3つまで)<br />

</div>

{if $temp|@count <= 0 && $list|@count < 3}
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
        <button type="button" id="change_email_null" class="btn btn-primary">メールアドレス新規登録</button>
    </div>
{/if}

{if $list|@count > 0}
    {$list|@count} 件の登録があります。<br />
    本登録済みのメールアドレス一覧<br />
{else}
    現在、お客様にご登録頂いているメールアドレスはありません。
{/if}

{if $list|@count > 3}
    {$mail_num = 3}
{else}
    {$mail_num = $list|@count}
{/if}

{section name=i start=0 loop=$mail_num}
    {assign var=i value=$smarty.section.i.iteration - 1}
    <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
        <div class="panel-heading list-header righting">
            <div class="panel-title">
                <span class="col-xs-6 col-md-3 kill-grid seminar-header seminar-title">メールアドレス</span>
                <span class="col-xs-6 col-md-9 seminar-header seminar-title text-right"><span id="email_edit_{$list[$i].email_id}_{$list[$i].ID}" class="clickable"><img src="themes/images/edit.png" />変更</span></span>
            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid">アドレス</span>
                    <span class="col-xs-9 kill-grid">{$list[$i].email}</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid">ログイン</span>
                    <span class="col-xs-3 kill-grid">{if $list[$i].key_flag == 1}<button type="button" class="btn btn-default" style="font-size: 10px;">現在のID</button>{else}<button id="change_key_{$list[i].email_id}" type="button" class="btn btn-primary" style="font-size: 10px;">IDに使用</button>{/if}</span>
                    <span class="col-xs-3 kill-grid">種類</span>
                    <span class="col-xs-3 kill-grid">{if $list[$i].email_type == 0}ＰＣ{else}携帯{/if}</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid">出発前</span>
                    <span class="col-xs-1 kill-grid">{if $list[$i].pre_departure == 1}<span class="glyphicon glyphicon-ok"></span>{else}<span id="_{$list[i].email_id}" class="glyphicon glyphicon-minus"></span>{/if}</span>
                    <span class="col-xs-2 kill-grid">出発後</span>
                    <span class="col-xs-1 kill-grid">{if $list[$i].post_departure == 1}<span class="glyphicon glyphicon-ok clickable"></span>{else}<span class="glyphicon glyphicon-minus clickable"></span>{/if}</span>
                    <span class="col-xs-3 kill-grid">請求連絡</span>
                    <span class="col-xs-2 kill-grid">{if $list[$i].bill == 1}<span class="glyphicon glyphicon-ok clickable"></span>{else}<span class="glyphicon glyphicon-minus clickable"></span>{/if}</span>
                </div>
            </li>
        </ul>
    </div>
{/section}

{if $temp|@count > 0}
    {foreach item=item from=$temp}
        <div class="col-xs-12" style="margin-top: 20px;"></div>
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading list-header righting">
                <div class="panel-title">
                    <span class="col-xs-7 col-md-6 kill-grid seminar-header seminar-title">仮登録中のメールアドレス</span>
                    <span class="col-xs-5 col-md-6 seminar-header seminar-title text-right"><span id="sendemail_{$item.email_id}" class="glyphicon glyphicon-share-alt clickable"></span>再送
                    <span id="delemail_{$item.email_id}" class="edit-del-controller clickable"><img src="themes/images/delete.png" />削除</span></span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 col-md-3 kill-grid">アドレス</span>
                        <span class="col-xs-8 col-xs-9 kill-grid">{$item.email}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 col-md-3 kill-grid">メールの種類</span>
                        <span class="col-xs-8 col-md-9 kill-grid">{if $item.email_type == 0}ＰＣ{else}携帯{/if}</span>
                    </div>
                </li>
            </ul>
        </div>
    {/foreach}
{/if}
<a id="help-email" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
{include file=$footer}