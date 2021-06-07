<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">担当学校登録</h4>
    </div>

    <div class="modal-body">
        <form id="edit-charge" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="school_no" class="col-sm-4 control-label checkbox-inline">担当学校名</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="school_no">
                            {foreach item=item from=$items}
                                <option value="{$item.0}">{$item.0}{$item.1}{$item.2}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="charge">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="edit_charge" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>

<script type="text/javascript" src="themes/js/modal.js"></script>