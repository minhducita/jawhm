<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">学校担当情報</h4>
    </div>

    <div class="modal-body">
        <h3>担当情報編集</h3>
        {if $items|@count >= 1}
            <table class="table-center table table-hover table-striped">
                <thead>
                    <tr>
                        <th>学校番号</th>
                        <th>国</th>
                        <th>地域</th>
                        <th class="text-center">編集</th>
                    </tr>
                <thead>
                <tbody class="">
                {foreach item=item from=$items}
                        <tr>
                            <td>{$item.0}</td>
                            <td>{$item.1}</td>
                            <td>{$item.2}</td>
                            <td class="text-center"><span id="charge_change_{$item.mypage_school_range_id}" class="glyphicon glyphicon-edit clickable"></span></td>
                        </tr>
                {/foreach}
                </tbody>
            </table>
        {else}
            学校担当情報はありません。<br />
        {/if}
        <span id="charge_change_new" class="glyphicon glyphicon-pencil">新規登録</span>

     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default clickable" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>