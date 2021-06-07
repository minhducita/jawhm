{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}member/index">会員情報変更</a></li>
  <li>お客様住所一覧</li>
</ol>

<div class="contents-wrapper">
    <h5>お客様住所一覧</h5>
    お客様にご登録頂いた住所の一覧です。<br />
    現住所、実家住所、留学先住所の3種類をご登録いただけます。<br />

</div>

{if $list|@count >= 1}
{else}
    現在、お客様にご登録頂いている住所情報はありません。
{/if}

{if $list|@count < 3}
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
        <button type="button" id="change_address_null" class="btn btn-primary">住所新規登録</button>
    </div>
{/if}

{if $list|@count >= 3}
    {$address_num = 3}
{else}
    {$address_num = $list|@count}
{/if}

{section name=i start=0 loop=$address_num}
    {assign var=i value=$smarty.section.i.iteration - 1}
    <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
        <div class="panel-heading list-header righting">
            <div class="panel-title">
                <span class="col-xs-6 kill-grid seminar-header seminar-title">登録先: <span class="text-bold text-italic">{if $list[$i].6 === 'null'}現住所{else}{$list[$i].6}{/if}</span></span>
                <span class="col-xs-6 seminar-header seminar-title text-right"><span id="change_address_{if $list[$i].0 != 'null'}{$list[$i].0}{else}null{/if}" class="clickable"><img src="themes/images/edit.png" />変更</span></span>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">郵便番号</span>
                    <span class="col-xs-9 kill-grid list-title-centering">{$list[$i].1}</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">都道府県</span>
                    <span class="col-xs-9 kill-grid list-title-centering">{$list[$i].2}</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">市群区</span>
                    <span class="col-xs-9 kill-grid list-title-centering">{$list[$i].3}</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">町村</span>
                    <span class="col-xs-9 kill-grid list-title-centering">{$list[$i].4}</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">番地その他</span>
                    <span class="col-xs-9 kill-grid">{$list[$i].5}</span>
                </div>
            </li>
        </ul>
    </div>
{/section}
<div class="col-xs-12">"
    <a id="help-address" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
</div>
{include file=$footer}