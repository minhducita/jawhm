<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{$msg[0].message}</h4>
    </div>

    <div class="modal-body">
        <form id="password-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">{$msg[1].message}</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="password" name="password" size="20" autofocus />
                    </div>
                </div>

                <div class="form-group">
                       <label for="retype" class="col-sm-4">{$msg[2].message}</label>
                       <div class="col-sm-8">
                        <input type='password' class="form-control" name="retype" />
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="{$msg[3].message}">
                      </div>
                </div>
                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="password">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="edit_password_school" type="button" class="btn btn-primary">{$msg[4].message}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">{$msg[5].message}</button>
    </div>
</div>

<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>