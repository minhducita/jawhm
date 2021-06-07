<!DOCTYPE HTML>
<html lang="ja">
<head class="login">
  <base herf="{$base|escape}">
  <meta http-equiv="Content-Type" content="application/json" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{$base|escape}/client/themes/css/user.css" media="all" /> 
  <link href="{$base|escape}/client/themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" type="text/css" href="{$base|escape}/client/themes/css/common.css" media="all" /> 
  <title>{$title|escape}</title>
</head>
<body>
    <div style="max-width: 360px; margin-left: auto; margin-right:auto">
        <div id="intro">
            <div style="padding:10px;">
                <div style="margin-top:50px; margin-bottom:50px; text-align: center;">
                    <img src="{$base|escape}/client/themes/images/JAWHMLogo.jpg" width="268" height="78" alt="JAWHMロゴ" />
                </div>
                <div>
                    <div id="jawhmbanner" style="margin-bottom:20px">メンバー専用ページにログインするためのサービスを選択してください。</div>
                    <a class="button-login button jawhm" href="http://www.jawhm.or.jp/member/">ワーホリ協会からログインする</a>
                    <a class="button-login button google" href="{$google}">Google IDでログインする</a>
                    <a class="button-login button facebook" href="{$facebook}">Facebook IDでログインする</a>
                    <a class="button-login button twitter" href="{$twitter}">Twitter IDでログインする</a>
                    {*<a class="button-login button microsoft" href="https://login.live.com/oauth20_authorize.srf?client_id=000000004410892B&scope=wl.basic%20wl.emails%20wl.offline_access%20wl.signin%20Office.OneNote_create&response_type=code&redirect_uri=https%3A%2F%2Ffeedly.com%2Fv3%2Fauth%2Fcallback&state=AjBe1sd7ImkiOiJmZWVkbHkiLCJyIjoiaHR0cDovL2ZlZWRseS5jb20vZmVlZGx5Lmh0bWwiLCJwIjoiV2luZG93c0xpdmUiLCJjIjoiZmVlZGx5LmRlc2t0b3AgMjAuMi43NjAifQ">Sign in with Microsoft</a>*}
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="{$base}/client/themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{$base}/client/themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{$base}/client/themes/js/common.js"></script>
<script type="text/javascript" src="{$base}/client/themes/js/user.js"></script>
<script type="text/javascript" src="{$base}/client/themes/js/modal.js"></script>
</body>
</html>