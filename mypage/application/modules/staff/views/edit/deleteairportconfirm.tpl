<div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">空港名削除確認</h4>
    </div>

    <div class="modal-body">
        <h3>本当に空港名: {$item.japanese_name} の情報を削除しますか?</h3>
            <form id="delete-airport" method="post">
            <fieldset>
                <div class="form-group">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4">
                          <button type="button" id="delete_airport" class="btn btn-danger">削除</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                      </div>
                </div>
                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="deleteairport">
            </fieldset>
            </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>