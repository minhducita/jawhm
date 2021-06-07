<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">パスワード変更</h4>
    </div>

    <div class="modal-body">
        パスワードを忘れてしまった場合は、以下のフォームに、<br />
        登録時のメールアドレスと会員番号を入力してください。<br />
        ご登録頂いたメールアドレスに新しいパスワードをお送りいたします。<br />
         <br />
        協会オフィスにてメンバー登録された方で、パスワードが判らない場合も、<br />
        こちらから新しいパスワードを設定してください。<br />
        <form id="reset-password" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">メールアドレス</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="email" name="email_reset" size="20" value="" autofocus >
                    </div>
                </div>

                <div class="form-group">
                       <label for="id" class="col-sm-4 control-label">会員番号</label>
                       <div class="col-sm-8">
                       <input class="form-control" type="email" name="id" size="20">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>

                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="forgetpassword">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="password_reset" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>