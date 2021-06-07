<div class="modal-content window-container">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">お支払い予定日登録</h4>
    </div>

    <div class="modal-body">
        <form id="deposit-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="estimate_no" class="col-sm-4 control-label">見積番号</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="estimate_no" size="20" value="{$estimate_number}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deposit_date" class="col-sm-4 control-label input-append date">お支払い予定日</label>
                    <div class="col-sm-8">
                        <div {if $smp==0}class="input-group date" id="deposit_date"{/if}>
                            <input type='{if $smp==0}text{else}date{/if}' class="form-control" name="deposit_date"value="{if $item[0][2] != 'null'}{$item[0][2]|date_format:"%G-%m-%d"}{/if}" autofocus />
                            {if $smp==0}
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            {/if}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="pull-right col-sm-2">
                        <input type="reset" class="btn btn-warning" value="リセット">
                    </div>
                </div>
                <input type="hidden" name="token" value="{$token}"> <input type="hidden" name="action_tag" value="deposit">
                <input type="hidden" name="id" value="{$item[0][0]}"> <input type="hidden" name="client" value="{$client}">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="deposit_edit" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
{if smp==0}
<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/moment.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
<script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
<script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
<script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
$(function () {
    var today = new Date();
    target_date = addDay(today, 1);
    $('#deposit_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false,
        daysOfWeekDisabled: [0,6],
        startDate: target_date,
        maxView: 3
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

});
</script>
{/if}