<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">願書一覧</h4>
        お客様が入学希望の学校願書一覧です。
    </div>

    <div class="modal-body">
        <h3>願書選択</h3>
        {if $appitems|@count >= 1}
            {$i = 0}
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ファイル名</th>
                        <th class="text-center">作成日時</th>
                        <th class="text-center">閲覧</th>
                        <th class="text-center">送信/確認</th>
                    </tr>
                <thead>

                <tbody>
                {foreach item=item from=$appitems}
                        <tr>
                            <td>{$i+1}</td>
                            <td>{$item.file_name}</td>
                            <td>{if $item.update_date != 'null'}{$item.update_date|date_format:"%m月%d日"}{/if}</td>
                            <td class="text-center"><a href="application/getfile?file_no=7&branch_no={$item.branch_no}" target="_blank"><span class="glyphicon glyphicon-list-alt clickable"></span></a></td>
                            <td class="text-center">
                                {if isset($fillitems[$i].branch_no)}
                                    <a href="application/getfile?file_no=8&branch_no={$fillitems[$i].branch_no}" target="_blank"><span class="glyphicon glyphicon-list-alt clickable"></span></a>
                                {else}
                                    <a id="filled_form_{$item.branch_no}" class="clickable"><span class="glyphicon glyphicon-cloud-upload"></span></a>
                                {/if}
                            </td>
                        </tr>
                     {$i = $i + 1}
                 {/foreach}
                 </tbody>
            </table>
        {else}
            お客様の願書情報はありません。
        {/if}


     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>