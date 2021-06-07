{include file=$header}
    <div style="max-width: 360px; margin-left: auto; margin-right:auto">
        <div id="intro">
            <div style="padding:10px;">
                <div style="margin-top:50px; margin-bottom:50px; text-align: center;">
                    <img src="{$base}/mypage/themes/images/JAWHMLogo.jpg" width="268" height="78" alt="JAWHMロゴ" />
                </div>
                <div id="jawhmauth">
                    <form id="login-jawhm" method="post">
                        <fieldset>
                            <div id="jawhmbanner" style="margin-bottom:20px">
                                メンバー専用ページにログインします。<br />
                                ご登録頂いた、メールアドレスとパスワードでログインしてください。
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">メールアドレス</label>
                                <input class="form-control" type="email" name="email" placeholder="メールアドレス">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="password">パスワード</label>
                                <input type="password" class="form-control" name="password" placeholder="パスワード">
                            </div>
                            <input type="hidden" name="url" value="jawhmauth">
                            <button type="button" id="jawhm_login" class="btn btn-default pull-right">ログイン</button>
                        </fieldset>
                    </form>
                    <div class="div-padding">
                        <a data-toggle="collapse" data-parent="#accordion" href="#forget">ログインできない方</a>
                        <div id="forget" class="panel-collapse collapse">
                            <div class="panel-body">
                                <button id="forget_password" type="button" class="btn btn-warning" style="width:150px; ">パスワード忘れ</button><br />
                                <button id="forget_email" type="button" class="btn btn-warning" style="width:150px; ">メールアドレス忘れ</button><br />
                                <button id="forget_payment" type="button" class="btn btn-warning" style="width:150px; ">登録料未払</button><br />
                                <button id="forget_other" type="button" class="btn btn-warning" style="width:150px; ">その他</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{include file=$footer}