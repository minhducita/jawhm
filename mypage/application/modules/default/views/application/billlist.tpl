<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">請求書一覧</h4>
        お客様宛ての請求書の一覧です。
    </div>

    <div class="modal-body">
        <h3>請求書選択</h3>
        {if $items|@count >= 1}
            {$i = 1}
            <table class="table-center table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ファイル名</th>
                        <th>作成日時</th>
                        <th>閲覧</th>
                    </tr>
                <thead>
                <tbody>
                {foreach item=item from=$items}
                        <tr>
                            <td>{$i}</td>
                            <td>{$item.file_name}</td>
                            <td>{if $item.update_date != 'null'}{$item.update_date|date_format:"%m月%d日"}{/if}</td>
                            <td class="text-center"><a href="application/getfile?file_no=2&branch_no={$item.branch_no}" target="_blank"><span class="glyphicon glyphicon-list-alt clickable"></span></a></td>
                        </tr>
                    {$i = $i + 1}
                {/foreach}
                </tbody>
            </table>
        {else}
            お客様のお支払情報はありません。
        {/if}
    </div>
    `
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>