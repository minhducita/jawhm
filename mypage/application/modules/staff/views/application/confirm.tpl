<div class="modal-content window-container">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">{$status_name[$name]}確認</h4>
    </div>

    <div class="modal-body">
        <form id="confirm-edit" method="post">
            <fieldset>
                <div class="form-group col-xs-12">
                    <label for="status_flag" class="col-xs-4 control-label">準備状態</label>
                    <div class="col-xs-8">
                        {$stat = $name|cat:_flag}
                        {if $status.$stat == 0} お客様準備中{else}準備完了{/if}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="status_date" class="col-xs-4 control-label">作業日</label>
                    <div class="col-xs-8">
                        {$date = $name|cat:'_date'}
                        {$status.$date|date_format:"%G年%m月%d日"}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="expiration_date" class="col-xs-4 control-label input-append date">作業期限日</label>
                    <div class="col-xs-8">
                        <div class="input-group date" id="expiration_date">
                            {$expiration = $name|cat:_expiration_date}
                            <input type='text' class="form-control" name="expiration_date" value="{if $status.$expiration != 'null'}{$status.$expiration|date_format:"%G-%m-%d"}{/if}" autofocus />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="confirmed" class="col-xs-4 control-label">確認</label>
                    <div class="col-xs-8">
                        <button id="{$name}-confirm" class="btn btn-success">確認済</button>
                        <button id="{$name}-redo" class="btn btn-danger">やり直し</button>
                        <button id="{$name}-back" class="btn btn-warning">確認待ち</button>
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <div class="pull-right col-xs-2">
                        <input type="reset" class="btn btn-warning" value="リセット">
                    </div>
                </div>
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="confirm">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="confirm_edit" type="button" class="btn btn-primary">期限日送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
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
    $('#expiration_date').datetimepicker({
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