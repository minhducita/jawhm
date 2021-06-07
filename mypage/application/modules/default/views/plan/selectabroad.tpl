<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modal_close">&times;</button>
        <h4 class="modal-title">留学情報選択</h4>
    </div>

    <div class="modal-body">
        <h3>留学情報選択</h3>
        {if $list|@count >= 1}
            {foreach item=item from=$list}
                <li><a id="flight-abroad_{$item.study_abroad_no}_plan/flightinquiry"> 今回のご渡航</a></li>
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