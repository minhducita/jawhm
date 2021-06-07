<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">見積一覧</h4>
    </div>

    <div class="modal-body">
        <h3>見積情報選択</h3>
        <table class="table-center table table-striped table-hover">
            <thead>
                <tr>
                    <th>学校名</th>
                    <th>週数</th>
                    <th>お支払予定日</th>
                    <th class="text-center">閲覧</th>
                    <th class="text-center">予定日入力</th>
                </tr>
            <thead>
        {if $items|@count >= 1}
            <tbody>
                {foreach item=item from=$items}
                    <tr>
                        <td>{$item.0}</td>
                        <td>{$item.1}</td>
                        <td>{if $item.3 != ''}{$item.3|date_format:"%m月%d日"}{else}未入力{/if}</td>
                        <td class="text-center"><a href="application/getfile?file_no=5&estimate_no={$item.2}" target="_blank"><span class="glyphicon glyphicon-list-alt clickable"></span></a></td>
                        <td class="text-center"><span id="changedeposit_{$item.2}" class="glyphicon glyphicon-edit clickable"></span></td>
                    </tr>
                {/foreach}
            </tbody>
        {/if}
        </table>
        <span class="help-block">支払日の入力は申し込み済みの見積に対してのみ行ってください。</span>
     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>