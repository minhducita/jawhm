<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">次のステップ入力</h4>
    </div>

    <div class="modal-body">
        <form id="nextstep-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="step_name" class="col-sm-4 control-label">次のステップ</label>
                    <div class="col-sm-8 combo_wrapper">
                        <button type="button" class="btn combo_arrow">▼</button>
                        <select id="combo_select" class="form-control input-block-level combo_select" name="step_name_select">
                            <option>手動入力</option>
                            {foreach item=item from=$next_step}
                                <option>{$item.step_name}</option>
                            {/foreach}
                        </select>
                        <div class="combo_div">
                            <input class="input-block-level combo_text form-control input-group" type="text" name="step_name">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="step_exposition_short" class="col-sm-4 control-label">ステップ説明</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="step_exposition_short">
                    </div>
                </div>

                <div class="form-group">
                       <label for="preparation" class="col-sm-4 control-label">必要なもの</label>
                       <div class="col-sm-8">
                         <input class="form-control" type="text" name="preparation">
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
        <button id="nextstep_edit" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>

<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
    $('#combo_select').change(function(){
        $('*[name=step_name]').val($(".combo_select option:selected").val());
    });
</script>