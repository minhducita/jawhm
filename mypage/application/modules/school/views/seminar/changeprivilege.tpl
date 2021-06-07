{*
<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">参加者特典入力</h4>
    </div>

    <div class="modal-body">
        <form id="privilege-edit-seminar" method="post">
            <fieldset>

                <div class="form-group">
                    <div class="col-sm-12">
                         <textarea class="form-control" name="privilege_seminar" rows="3">{$item.privilege}</textarea>
                    </div>
                </div>

                <div class="form-group pull-right">
                      <div class="col-sm-12">
                          <span class="">残りの文字数: <span class="count">300</span></span>
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>

                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="seminar_privilege">
                <input type="hidden" name="id" value="{$item.id}">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="privilege_edit_seminar" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
        var thisValueLength = $('*[name=privilege_seminar]').val().length;
        var remaining = 300 - thisValueLength;
        $('.count').html(remaining);
</script>
*}