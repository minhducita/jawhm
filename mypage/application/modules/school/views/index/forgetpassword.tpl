<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{$msg[0].message}</h4>
    </div>

    <div class="modal-body">
        {$msg[1].message}<br />
        {$msg[2].message}<br />
         <br />
        {$msg[3].message}<br /><br />
        <form id="reset-password" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">{$msg[4].message}</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="email" name="email_reset" size="20" value="" autofocus >
                    </div>
                </div>

                <div class="form-group">
                       <label for="id" class="col-sm-4 control-label">{$msg[5].message}</label>
                       <div class="col-sm-8">
                       <input class="form-control" type="text" name="school_id" size="20">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="{$msg[6].message}">
                      </div>
                </div>

                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="forgetpassword">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="school_reset" type="button" class="btn btn-primary">{$msg[7].message}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">{$msg[8].message}</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>