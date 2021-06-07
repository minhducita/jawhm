<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">留学手続き状況・メールテンプレート編集</h4>
    </div>

    <div class="modal-body">
        <form id="comment-edit" method="post">
            <fieldset>

                <div class="form-group">
                       <label for="comment_content" class="col-sm-2 control-label">内容</label>
                       <div class="col-sm-10">
                         <textarea class="form-control" name="comment_content" rows="15">{$item}</textarea>
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-4">
                           現在の文字数: <span class="count">0</count>
                      </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10"></div>
                    <input type="reset" class="btn btn-warning" value="リセット">
                </div>
                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="staff_comment">
                <input type="hidden" name="comment_id" value="{$comment_id}">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="comment_edit_staff" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
    var thisValueLength = $('*[name=comment_content]').val().length;
    $('.count').html(thisValueLength);
</script>