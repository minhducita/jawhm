<div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">{$msg[0].message}</h4>
    </div>

    <div class="modal-body">
        <h3>{$msg[1].message}{$memo}{$msg[2].message}</h3>
            <form id="client-memo-delete" method="post">
            <fieldset>
                <div class="form-group">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-5">
                          <button type="button" id="seminar_memo_delete" class="btn btn-danger">{$msg[3].message}</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">{$msg[4].message}</button>
                      </div>
                </div>
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="clientmemodelete">
                <input type="hidden" name="memo" value="{$memo}">
            </fieldset>
            </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{$msg[5].message}</button>
    </div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>