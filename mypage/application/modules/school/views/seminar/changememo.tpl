<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{$msg[0].message}</h4>
    </div>

    <div class="modal-body">
        <form id="memo-edit-seminar" method="post">
            <fieldset>

                <div class="form-group">
                    <div class="col-sm-12">
                         <textarea class="form-control" name="memo_seminar" rows="3">{$memo}</textarea>
                    </div>
                </div>

                <div class="form-group pull-right">
                      <div class="col-sm-12">
                          <span class="">{$msg[1].message}: <span class="count">500</span></span>
                          <input type="reset" class="btn btn-warning" value="{$msg[2].message}">
                      </div>
                </div>

                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="seminar_memo">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="memo_edit_seminar" type="button" class="btn btn-primary">{$msg[3].message}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">{$msg[4].message}</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
    loadingView(false);
    var thisValueLength = $('*[name=memo_seminar]').val().length;
    var remaining = 500 - thisValueLength;
    $('.count').html(remaining);
</script>