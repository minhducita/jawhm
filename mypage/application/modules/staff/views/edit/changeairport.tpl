<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">空港名編集</h4>
    </div>

    <div class="modal-body">
        <form id="edit-airport" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="country_name" class="col-sm-4 control-label">国名</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="country_name" value="{$item.country_name}" autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="japanese_name" class="col-sm-4 control-label">日本語名</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="japanese_name" value="{$item.japanese_name}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="hiragana" class="col-sm-4 control-label">ひらがな名</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="hiragana" value="{$item.hiragana}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="english_name" class="col-sm-4 control-label">英語名</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="english_name" value="{$item.english_name}">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="editairport">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="edit_airport" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>

<script type="text/javascript" src="themes/js/modal.js"></script>