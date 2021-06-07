<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">一言相談確認</h4>
    </div>

    <div class="modal-body">
        <form id="talk-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="talk_content" class="col-sm-4 control-label">相談内容</label>
                    <div class="col-sm-8">
                        {$item.talk_content}
                    </div>
                </div>

                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="talk-confirm">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <span class="text-red">以上の内容で送信しますか?</span><br />
        <button id="talk_amend" type="button" class="btn btn-danger">修正</button>
        <button id="talk_complete" type="button" class="btn btn-primary">送信</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>