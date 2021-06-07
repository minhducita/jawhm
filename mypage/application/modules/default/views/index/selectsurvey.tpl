<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modal_close">&times;</button>
        <h4 class="modal-title">留学情報選択</h4>
    </div>

    <div class="modal-body">
        <h3>留学情報選択</h3>
        {if $list|@count >= 1}
            {foreach item=item from=$list}
                {if $item.leave_country != '' && $item.leave_date !=''}
                    <li><a id="abroad_{$item.study_abroad_no}_index/surveyentry">{$item.leave_date|date_format:"%G年%m月%d日"} のご渡航
                     {if $item.leave_country === 'IRE'}アイルランド
                     {elseif $item.leave_country === 'USA'}アメリカ
                     {elseif $item.leave_country === 'GBR'}イギリス
                     {elseif $item.leave_country === 'UK'}イギリス
                     {elseif $item.leave_country === 'IND'}インド
                     {elseif $item.leave_country === 'AUS'}オーストラリア
                     {elseif $item.leave_country === 'CAN'}カナダ
                     {elseif $item.leave_country === 'DEU'}ドイツ
                     {elseif $item.leave_country === 'NZ'}ニュージーランド
                     {elseif $item.leave_country === 'NZL'} ニュージーランド
                     {elseif $item.leave_country === 'FRA'}フランス
                     {elseif $item.leave_country === 'EUR'}ユーロ
                     {elseif $item.leave_country === 'KOR'}韓国
                     {elseif $item.leave_country === 'JPN'}日本{/if}
                     {if $item.close_flag == 1}(手配完了){/if}</a></li>
                {else}
                    <li><a id="abroad_{$item.study_abroad_no}_index/surveyentry"> 今回のご渡航</a></li>
                {/if}
            {/foreach}

        {else}
            留学情報はありません。<br />
        {/if}

     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="modal_close">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>