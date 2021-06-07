<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">セミナー日程提案(スタッフ)</h4>
    </div>

    <div class="modal-body">
        <form id="staff-proposal-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label class="col-xs-4" for="school_id">学校担当者ID</label>
                    <div class="col-xs-8">
                        <select class="form-control" name="school_id">
                            {if $school_ids|@count >= 1}
                                {foreach item=id from=$school_ids}
                                    <option {if $item.school_id == $id.school_id}selected{/if}>{$id.school_id}</option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4" for="decision_flag">決定状態</label>
                    <div class="col-xs-8">
                        <select class="form-control" name="decision_flag">
                            <option value="1" {if $item.decision_flag === 1}selected{/if}>未決</option>
                            <option value="2" {if $item.decision_flag === 2}selected{/if}>決定</option>
                            <option value="0" {if $item.decision_flag === 0}selected{/if}>取消</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                   <label for="expected_seminar_datetime" class="col-sm-4 control-label input-append date">提案日時</label>
                   <div class="col-sm-8">
                       <div class="input-group date" id="expected_seminar_datetime">
                        <input type='date' class="form-control" name="expected_seminar_datetime" value="{$item.expected_seminar_datetime|date_format:"%G-%m-%d %H:%M"}" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                   <label for="expected_require_time" class="col-sm-4 control-label">提案時間(分)</label>
                   <div class="col-sm-8">
                         <input class="form-control text-right" type="number" name="expected_require_time" value="{$item.expected_require_time}">
                    </div>
                </div>

                <div class="form-group">
                   <label for="speaker_name" class="col-sm-4 control-label">ご担当者様</label>
                   <div class="col-sm-8">
                         <input class="form-control text-right" type="text" name="speaker_name" value="{$item.speaker_name}">
                    </div>
                </div>

                <div class="form-group">
                <label for="staff_comment" class="col-sm-4 control-label">スタッフコメント</label>
                    <div class="col-sm-8">
                         <textarea class="form-control" name="staff_comment" rows="5">{$item.staff_comment}</textarea>
                    </div>
                </div>

                <div class="form-group pull-right">
                      <div class="col-sm-12">
                          <span>残り字数: <span class="count">1000</span></span>
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>

                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="proposal">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="staff_proposal_edit" type="button" class="btn btn-primary">登録</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script src="themes/js/modal.js"></script>
<script>
    loadingView(false);
    $('#expected_seminar_datetime').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $(function() {
        word_count($('*[name=staff_comment]').val().length);
    });

    $('*[name=staff_comment]').on('keyup', function() {
        word_count($(this).val().length);
    });

    function word_count(thisValueLength) {
        var remind = 1000 - thisValueLength;
        $('.count').html(remind);
        return false;
    }

</script>