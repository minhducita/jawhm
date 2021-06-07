<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">ビザ情報登録</h4>
    </div>

    <div class="modal-body">
        <form id="visa-edit" method="post">
            <fieldset>
                <div class="form-group">
                   <label for="visa_type" class="col-sm-4 control-label">ビザ種別(入力必須)</label>
                   <div class="col-sm-8 combo_wrapper">
                       <button type="button" class="btn combo_arrow">▼</button>
                       <select id="combo_select" class="form-control input-block-level combo_select" name="visa_type_select">
                            <option>手動入力</option>
                            <option>ワーキングホリデー</option>
                            <option>学生</option>
                            <option>観光</option>
                            <option>co-op</option>
                        </select>
                        <div class="combo_div">
                            <input class="input-block-level combo_text form-control input-group" type="text" name="visa_type" value="{$item.visa_type}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="visa_number" class="col-sm-4 control-label">ビザ発給番号(入力必須)</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="visa_number" size="20" value="{$item.visa_number}" autofocus>
                    </div>
                </div>

                <div class="form-group">
                       <label for="passport_number" class="col-sm-4 control-label">パスポート番号(入力必須)</label>
                       <div class="col-sm-8">
                         <input class="form-control" type="text" name="passport_number" value="{$item.passport_number}" size="20">
                    </div>
                </div>

                <div class="form-group">
                       <label for="expected_entrance_date" class="col-sm-4 control-label input-append date">入国予定日</label>
                       <div class="col-sm-8">
                           <div{if $smp==0} class="input-group date" id="expected_entrance_date"{/if}>
                            <input type='{if $smp==0}text{else}date{/if}' class="form-control" name="expected_entrance_date" {if $item.expected_entrance_date != 'null'}value="{$item.expected_entrance_date|date_format:"%G-%m-%d"}"{/if} />
                            {if $smp==0}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            {/if}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                       <label for="expected_return_date" class="col-sm-4 control-label input-append date">帰国予定日</label>
                       <div class="col-sm-8">
                           <div{if $smp==0} class="input-group date" id="expected_return_date"{/if}>
                            <input type='{if $smp==0}text{else}date{/if}' class="form-control" name="expected_return_date" {if $item.expected_return_date != 'null'}value="{$item.expected_return_date|date_format:"%G-%m-%d"}"{/if} />
                            {if $smp==0}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            {/if}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                       <label for="arrival_date" class="col-sm-4 control-label input-append date">入国日</label>
                       <div class="col-sm-8">
                           <div{if $smp==0} class="input-group date" id="arrival_date"{/if}>
                            <input type='{if $smp==0}text{else}date{/if}' class="form-control" name="arrival_date" {if $item.arrival_date != 'null'}value="{$item.arrival_date|date_format:"%G-%m-%d"}"{/if} />
                            {if $smp==0}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            {/if}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                       <label for="visa_expiry_date" class="col-sm-4 control-label input-append date">ビザ有効期限</label>
                       <div class="col-sm-8">
                           <div{if $smp==0} class="input-group date" id="visa_expiry_date"{/if}>
                            <input type='{if $smp==0}text{else}date{/if}' class="form-control" name="visa_expiry_date" {if $item.visa_expiry_date != 'null'}value="{$item.visa_expiry_date|date_format:"%G-%m-%d"}"{/if} />
                            {if $smp==0}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            {/if}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                       <label for="account_no" class="col-sm-4 control-label">口座番号</label>
                       <div class="col-sm-8">
                        <input class="form-control" type="text" name="account_no" value="{$item.account_no}">
                        <span class="help-block">現地銀行の口座番号をご入力いただけます。ご取得されていない等の場合は空白のままでお願いします。</span>
                    </div>
                </div>

                <div class="form-group">
                       <label for="taxfilenumber" class="col-sm-4 control-label">タックスファイルナンバー</label>
                       <div class="col-sm-8">
                        <input class="form-control" type="text" name="taxfilenumber" value="{$item.taxfilenumber}">
                        <span class="help-block">オーストラリアのみです。ご取得されていない等の場合は空白のままでお願いします。</span>
                    </div>
                </div>

                <div class="form-group">
                       <label for="sin_number" class="col-sm-4 control-label">SINナンバー</label>
                       <div class="col-sm-8">
                        <input class="form-control" type="text" name="sin_number" value="{$item.sin_number}">
                        <span class="help-block">カナダのみです。ご取得されていない等の場合は空白のままでお願いします。</span>
                    </div>
                </div>

                <div class="form-group">
                       <label for="national_number" class="col-sm-4 control-label">Nationalナンバー</label>
                       <div class="col-sm-8">
                        <input class="form-control" type="text" name="national_number" value="{$item.national_number}">
                        <span class="help-block">UKのみです。ご取得されていない等の場合は空白のままでお願いします。</span>
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="visa">
                <input type="hidden" name="branch_no" value="{$item.branch_no}">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="visa_edit" type="button" class="btn btn-primary">送信</button>
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
<script type="text/javascript" src="themes/js/modal.js"></script>
<script >
<!--
$(function () {
    $('#expected_entrance_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#expected_return_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#arrival_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#visa_expiry_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('*[name=deposit_amount]').val(addComma($('*[name=deposit_amount]').val(), false));

    $('*[name=deposit_amount]').blur(function() {
        $(this).val(addComma($(this).val(), false));
    });

    $('#combo_select').change(function(){
        $('[name=visa_type]').val($(".combo_select option:selected").val());
    });

});
-->
</script>