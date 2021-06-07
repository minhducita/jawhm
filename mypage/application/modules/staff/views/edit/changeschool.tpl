<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">学校担当者情報編集</h4>
    </div>
    <div class="modal-body">
        <form id="edit-school">
            <fieldset>
                <div class="form-group">
                    <label for="school_id" class="col-sm-4 control-label">ログインID</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="school_id" value="{$item.school_id}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="school_name" class="col-sm-4 control-label">学校名(短縮)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="school_name" value="{$item.school_name}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="school_full_name" class="col-sm-4 control-label">学校名</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="school_full_name" value="{$item.school_full_name}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="charge_nname" class="col-sm-4 control-label">担当者名</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="charge_name" value="{$item.charge_name}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" value="{$item.email}">
                    </div>
                </div>
                <div class="form-inline">
                      <input type="reset" class="btn btn-warning pull-right" value="リセット">
                </div>

                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="schoolchange">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="edit_school" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>