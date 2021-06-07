<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">ホームステイ情報一覧</h4>
        お客様のホームステイ情報一覧です。
    </div>

    <div class="modal-body">
        <h3>ホームステイ選択</h3>
        {if $appitems|@count >= 1}
            {$i = 0}
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ファイル名</th>
                        <th class="text-center">{if isset($fillitems[$i].branch_no)}確認{else}送信{/if}</th>
                        <th class="text-center"><span class="alert alert-info" role="alert" style="padding: 1px;">資料</span></th>
                    </tr>
                <thead>

                <tbody>
                    {foreach item=item from=$appitems}
                        <tr>
                            <td>{$i+1}</td>
                            <td><a href="application/getfile?file_no=9&branch_no={$item.branch_no}" target="_blank">{$item.file_name}</a</td>
                            <td class="text-center">
                                {if isset($fillitems[$i].branch_no)}
                                    <a href="application/getfile?file_no=10&branch_no={$fillitems[$i].branch_no}" target="_blank"><span class="glyphicon glyphicon-list-alt clickable"></span></a>
                                {else}
                                    <a id="filled_homestay_{$item.branch_no}" class="clickable"><span class="glyphicon glyphicon-cloud-upload"></span></a>
                                {/if}
                            </td>
                            <td>
                                {if isset($materialitems[$i].branch_no)}
                                    <a href="application/getfile?file_no=11&branch_no={$materialitems[$i].branch_no}" target="_blank" class="btn btn-success">DL</a>
                                {else}
                                    <span class="glyphicon glyphicon-minus"></span>
                                {/if}
                            </td>
                        </tr>
                        {$i = $i + 1}
                    {/foreach}
                 </tbody>
            </table>
            <div class="help-block text-red">
                ホームステイ資料が表示されるのは出発1週間前頃になります。<br />
                それ以降に届かない場合は当協会までお問い合わせください。
            </div>
        {else}
            お客様のホームステイ情報はありません。
        {/if}


     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>