<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">言語編集</h4>
    </div>

    <div class="modal-body">
        <form id="edit-lang" method="post">
            <fieldset>
                <div class="form-group col-xs-12">
                    <label for="mypage_screen_name" class="col-xs-3 control-label">画面名</label>
                    <div class="col-sm-9">
                        {$item.mypage_screen_name}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="language" class="col-xs-3 control-label">言語(略称)</label>
                    <div class="col-xs-9">
                        {$item.language}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="message" class="col-xs-3 control-label">message</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="message" value="{$item.message}">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="language">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="edit_lang" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>

<script type="text/javascript" src="themes/js/modal.js"></script>