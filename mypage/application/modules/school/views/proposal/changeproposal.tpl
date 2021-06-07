<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{$msg[0].message}</h4>
    </div>

    <div class="modal-body">
        <form id="seminar-proposal-edit" method="post">
            <fieldset>
                <div class="form-group">
                   <label for="expected_seminar_datetime" class="col-sm-4 control-label input-append date">{$msg[1].message}</label>
                   <div class="col-sm-8">
                       <div{if $smp==0} class="input-group date" id="expected_seminar_datetime"{/if}>
                        <input type='{if $smp==0}text{else}datetime-local{/if}' class="form-control" name="expected_seminar_datetime" value="{$item.expected_seminar_datetime|date_format:"%G-%m-%d %H:%M"}" />
                        {if $smp==0}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        {/if}
                    </div>
                </div>

                <div class="form-group">
                   <label for="expected_require_time" class="col-sm-4 control-label">{$msg[2].message}</label>
                   <div class="col-sm-8">
                         <input class="form-control text-right" type="number" name="expected_require_time" value="{$item.expected_require_time}">
                    </div>
                </div>

                <div class="form-group">
                   <label for="speaker_name" class="col-sm-4 control-label">{$msg[3].message}</label>
                   <div class="col-sm-8">
                         <input class="form-control text-right" type="text" name="speaker_name" value="{$item.speaker_name}">
                    </div>
                </div>

                <div class="form-group">
                <label for="school_comment" class="col-sm-4 control-label">{$msg[4].message}</label>
                    <div class="col-sm-8">
                         <textarea class="form-control" name="school_comment" rows="5">{$item.school_comment}</textarea>
                    </div>
                </div>

                <div class="form-group pull-right">
                      <div class="col-sm-12">
                          <span>{$msg[8].message}: <span class="count">1000</span></span>
                          <input type="reset" class="btn btn-warning" value="{$msg[5].message}">
                      </div>
                </div>

                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="proposal">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="seminar_proposal_edit" type="button" class="btn btn-primary">{$msg[6].message}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">{$msg[7].message}</button>
    </div>
</div>
<script src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/moment.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
<script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
<script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
<script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
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
        word_count($('*[name=school_comment]').val().length);
    });

    $('*[name=school_comment]').on('keyup', function() {
        word_count($(this).val().length);
    });

    function word_count(thisValueLength) {
        var remind = 1000 - thisValueLength;
        $('.count').html(remind);
        return false;
    }

</script>