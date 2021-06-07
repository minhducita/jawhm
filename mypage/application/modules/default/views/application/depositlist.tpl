<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">お支払い情報</h4>
        お客様の入金予定日とそれに対する実績です。
    </div>

    <div class="modal-body">
        <h3>お支払い情報選択</h3>
        {if $items|@count >= 1}
            {$i = 1}
            <table class="table-center table table-striped table-hover">
                <thead>
                    <tr>
                        <th>見積番号</th>
                        <th>支払予定日</th>
                        <th>お支払日</th>
                        <th class="text-center">閲覧</th>
                    </tr>
                <thead>
                <tbody>
                    {foreach item=item from=$items}
                        <tr>
                            <td>{$item.0}</td>
                            <td>{if $item.2 != 'null'}{$item.2|date_format:"%m月%d日"}{/if}</td>
                            <td>{$item.1|date_format:"%m月%d日"}</td>
                            <td class="text-center"><a href="application/getfile?file_no=5&estimate_no={$item.0}" target="_blank"><span class="glyphicon glyphicon-list-alt clickable"></span></a></td>
                        </tr>
                     {$i = $i + 1}
                    {/foreach}
                </tbody>
            </table>
        {else}
            お客様のお支払情報はありません。
        {/if}


     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>