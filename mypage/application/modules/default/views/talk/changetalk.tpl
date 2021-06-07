<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">一言相談登録</h4>
    </div>

    <div class="modal-body">
        <form id="talk-edit" method="post">
            <fieldset>

                <div class="form-group">
                       <label for="talk_content" class="col-sm-4 control-label">相談内容</label>
                       <div class="col-sm-8">
                         <textarea class="form-control" name="talk_content">{$item.talk_content}</textarea>
                          <span class="help-block">300文字以内でご記入ください。</span>
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-3">
                           現在の文字数: <span class="count">0</count>
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>

                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="talk">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="talk_confirm" type="button" class="btn btn-primary">確認画面へ</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
    var thisValueLength = $('*[name=talk_content]').val().length;
    var remaining = 300 - thisValueLength;
    $('.count').html(remaining);
</script>