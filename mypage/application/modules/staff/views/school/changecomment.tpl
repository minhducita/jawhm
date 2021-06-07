<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">お客様コメント(学校)</h4>
    </div>

    <div class="modal-body">
        <form id="staffcomment-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="module" class="col-sm-4 control-label checkbox-inline">コメントページ</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="modules" {if isset($module)}readonly{/if}>
                            <option value="client" {if $module == 'client' || !isset($module)}selected{/if}>お客様詳細</option>
                            <option value="seminar" {if $module == 'seminar'}selected{/if}>セミナー詳細</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="module" class="col-sm-4 control-label checkbox-inline">コメント</label>
                    <div class="col-sm-8">
                         <textarea class="form-control" name="memo" rows="3">{$comment.memo}</textarea>
                    </div>
                </div>

                <div class="form-group pull-right">
                      <div class="col-sm-12">
                          <span class="">入力可能文字数: <span class="count">500</span></span>
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>

                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="staffcomment">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="staffcomment_edit" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
    loadingView(false);
    var thisValueLength = $('*[name=memo]').val().length;
    var remaining = 500 - thisValueLength;
    $('.count').html(remaining);
</script>