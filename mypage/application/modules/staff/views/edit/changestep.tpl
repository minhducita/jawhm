<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">次のステップ編集</h4>
    </div>

    <div class="modal-body">
        <form id="edit-step" method="post">
            <fieldset>

                <div class="form-group">
                    <label for="major_step_number" class="col-sm-4 control-label checkbox-inline">ステップチャート名</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="major_step_number">
                            <option value="1" {if $item.major_step_number == 1 || !isset($item.major_step_number)}selected{/if}>セミナーに参加しよう</option>
                            <option value="2" {if $item.major_step_number == 2}selected{/if}>カウンセリングを受けよう</option>
                            <option value="3" {if $item.major_step_number == 3}selected{/if}>ビザの申請をしよう</option>
                            <option value="4" {if $item.major_step_number == 4}selected{/if}>フライトの予約をしよう</option>
                            <option value="5" {if $item.major_step_number == 5}selected{/if}>出発前セミナーステップ1に参加しよう</option>
                            <option value="6" {if $item.major_step_number == 6}selected{/if}>出発前セミナーステップ2に参加しよう</option>
                            <option value="7" {if $item.major_step_number == 7}selected{/if}>海外へ渡航!</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="step_name" class="col-sm-4 control-label">次のステップ</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="step_name" size="20" value="{$item.step_name}" autofocus">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">説明</label>
                    <div class="col-sm-8">
                        <textarea id="step_description" class="form-control" name="description" rows="5">{$item.description}</textarea>
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-4">
                           残りの文字数: <span class="count">0</count>
                      </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="nextstep">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="edit_step" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>

<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
    loadingView(false);
    var thisValueLength = $('#step_description').val().length;
    var remaind = 300 - thisValueLength;
    $('.count').html(remaind);
</script>