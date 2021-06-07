{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}preparation/index">出発前お手続き一覧</a></li>
  <li>学校・ご実家用連絡先シート印字</li>
</ol>

<div class="contents-wrapper">
    <h2>学校・ご実家用連絡先シート印字</h2>
    お客様のご入学される学校に提出するための連絡先シートを表示します。<br />
    学校ごとに出力いたしますので、対象となる学校をご選択ください。
</div>

<ul style="list-style-type:none; ">
    {if $items|@count > 0}
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2>学校提出用</h2>
                </div>
            </div>
            <ul class="list-group">
                {foreach item=item from=$items}
                    <li class="list-group-item"><a id="selinsvisa_{$item.3}">
                        {if $item.3 === 'IRE'}アイルランド
                         {elseif $item.3 === 'USA'}アメリカ
                         {elseif $item.3 === 'GBR'}イギリス
                         {elseif $item.3 === 'UK'}イギリス
                         {elseif $item.3 === 'IND'}インド
                         {elseif $item.3 === 'AUS'}オーストラリア
                         {elseif $item.3 === 'CAN'}カナダ
                         {elseif $item.3 === 'DEU'}ドイツ
                         {elseif $item.3 === 'NZ'}ニュージーランド
                         {elseif $item.3 === 'NZL'} ニュージーランド
                         {elseif $item.3 === 'FRA'}フランス
                         {elseif $item.3 === 'EUR'}ユーロ
                         {elseif $item.3 === 'KOR'}韓国
                         {elseif $item.3 === 'JPN'}日本
                     {/if}
                     {$item.entrance_date|date_format:"%G年%m月%d日"}入学{$item.2}</a></li>
                {/foreach}
            </ul>
        </div>

        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2>ご実家用</h2>
                </div>
            </div>
            <ul class="list-group">
               {foreach item=item from=$items}
                    <li class="list-group-item"><a id="forparents_{$item.3}">
                    {if $item.3 === 'IRE'}アイルランド
                         {elseif $item.3 === 'USA'}アメリカ
                         {elseif $item.3 === 'GBR'}イギリス
                         {elseif $item.3 === 'UK'}イギリス
                         {elseif $item.3 === 'IND'}インド
                         {elseif $item.3 === 'AUS'}オーストラリア
                         {elseif $item.3 === 'CAN'}カナダ
                         {elseif $item.3 === 'DEU'}ドイツ
                         {elseif $item.3 === 'NZ'}ニュージーランド
                         {elseif $item.3 === 'NZL'} ニュージーランド
                         {elseif $item.3 === 'FRA'}フランス
                         {elseif $item.3 === 'EUR'}ユーロ
                         {elseif $item.3 === 'KOR'}韓国
                         {elseif $item.3 === 'JPN'}日本
                     {/if}
                     {$item.entrance_date|date_format:"%G年%m月%d日"}入学{$item.2}</a></li>
                {/foreach}
            </ul>
        </div>

    {else}
        <li>現在印刷できる情報はありません。</li>
    {/if}
</ul>
<a id="help-schoolcontact" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
{include file=$footer}