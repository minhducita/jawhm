<!DOCTYPE HTML>
<html lang="ja">
<head class="login">
    <base href="{$base}">
    <meta name="viewport" content="width=device-width, initial-scale=0.1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="mypage/themes/css/mypage-user.css" media="all" />
    <link href="mypage/themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" type="text/css" href="mypage/themes/css/common.css" media="all" />
    <title>{$title}</title>
</head>
<body>
    <div style="max-width: 360px; margin-left: auto; margin-right:auto">
        <div id="intro">
            <div style="padding:10px;">
                <div style="margin-top:50px; margin-bottom:50px; text-align: center;">
                    <img src="mypage/themes/images/JAWHMLogo.jpg" width="268" height="78" alt="JAWHMロゴ" />
                </div>
                <div>
                    <div id="jawhmbanner" style="margin-bottom:20px">メンバー専用ページにログインするためのサービスを選択してください。</div>
                    <a class="button-login button jawhm" href="{$base}/mypage/index/jawhmlogin">ワーホリ協会からログインする</a>
                    <a class="button-login button google" href="{$google nofilter}">Google IDでログインする</a>
                    <a class="button-login button facebook" href="{$facebook nofilter}">Facebook IDでログインする</a>
                    <a class="button-login button twitter" href="{$twitter nofilter}">Twitter IDでログインする</a>
                </div>
                <div class="expression-weak"></span><a href="http://www.jawhm.or.jp/">ワーホリ協会ページに戻る</a><br />
                メンバーではありませんか? <a href="http://www.jawhm.or.jp/mem/">会員登録を行う。</a></div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="{$base}/mypage/themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/common.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/mypage-user.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
</body>
</html>