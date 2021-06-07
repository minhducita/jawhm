<!DOCTYPE HTML>
<html lang="ja">
<head>
<base href="{$base}/mypage/">
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link href="themes/css/reset.css" rel="stylesheet" type="text/css" media="screen" />
<link href="themes/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
{if isset($child)}{else}<link href="themes/css/mypage-user.css" rel="stylesheet" type="text/css" media="all" />{/if}
<title>{$title}</title>
<script>
jsmsg = {$jsmsg nofilter};
</script>
</head>
<body {if isset($child)}style="background-color: #acacac; "{/if}>
    <div style="max-width: 360px; margin-left: auto; margin-right:auto">
        <div id="login">
            <div style="padding:10px;">
                <div style="margin-top:50px; margin-bottom:50px; text-align: center;">
                    <img src="themes/images/JAWHMLogo.jpg" width="268" height="78" alt="JAWHMロゴ" />
                </div>
                <div id="auth">
                    <form id="login_info"  method="post">
                        <fieldset>
                            <div id="jawhmbanner" style="margin-bottom:20px">
                                アンケート閲覧ページにログインします。<br />
                                ログインIDとパスワードを入力してください。
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="school_name">ログインID</label>
                                <input class="form-control" type="input" name="school_name" placeholder="ログインID">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="password">パスワード</label>
                                <input type="password" class="form-control" name="password" placeholder="パスワード">
                            </div>
                            <button type="button" id="login-button" class="btn btn-default col-xs-3 pull-right">ログイン</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="themes/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="themes/js/jquery.pjax.js"></script>
    <script type="text/javascript" src="themes/js/common.js"></script>
    <script type="text/javascript" src="themes/js/mypage-kotaro.js"></script>
    </body>
</html>