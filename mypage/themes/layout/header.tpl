<!DOCTYPE HTML>
<html lang="ja">
<head>
<base href="{$base}/mypage/">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="application/json" charset=utf-8>
<meta name="format-detection" content="telephone=no">
<link href="themes/css/reset.css" rel="stylesheet" type="text/css" media="screen" />
<link href="themes/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen" />
{if isset($datepicker)}<link href="themes/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen" />{/if}
{if isset($top)}<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">{/if}
{if isset($child)}<link href="themes/css/bum.css" rel="stylesheet">{/if}
<link href="themes/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
{if isset($child)}{else}<link href="themes/css/mypage-user.css" rel="stylesheet" type="text/css" media="all" />{/if}
<title>{$title}</title>
<script>
    jsmsg = {$jsmsg nofilter};
</script>
</head>
<body {if isset($child)}style="background-color: #acacac; "{/if}>
{if !isset($top) && $smp == 0 && !isset($child)}
        <div class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                        <a class="navbar-brand" href="{$base}">JAWHM</a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".collapse-target">
                                <span class="sr-only">Toggle navigation</span> <span
                                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                                        class="icon-bar"></span>
                        </button>

                </div>

                <div class="collapse navbar-collapse collapse-target">
                        <ul class="nav navbar-nav">
                                <li><a href="">トップページ</a>
                                <li class="arrow-top"><span onClick="location.href='plan/index'" class="button-step clickable {if $progress >= 2}success-color{else}danger-color{/if}" abbr="android0-divine">準備</span><span class="button-triangle" onClick="location.href='plan/index'" id="android0"></span></li>
                                {if $progress >= 2}{if $abroad_flag == '1'}<li class="arrow-top arrow-left"><span onClick="location.href='application/index'" class="button-step clickable {if $progress >= 3}success-color{else}danger-color{/if}" abbr="android1-divine">書類</span><span abbr="android1" class="button-triangle" onClick="location.href='application/index'"></span></li>{/if}{/if}
                                {if $progress >= 3}{if $abroad_flag == '1'}<li class="arrow-top arrow-left"><span onClick="location.href='preparation/index'" class="button-step clickable {if $progress >= 4}success-color{else}danger-color{/if}" abbr="android2-divine">出発</span><span abbr="android2" class="button-triangle" onClick="location.href='preparation/index'"></span></li>{/if}{/if}
                                <li class="arrow-left"><a href="seminar/index">セミナー予約情報</a></li>
                                <li><a href="member/index">会員情報変更</a></li>
                                <li><a href="talk/index">一言相談</a></li>
                                <li><a href="index/logout">ログアウト</a></li>
                        </ul>
                </div>
        </div>
        <div style="margin-bottom: 50px;"></div>
        <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
        <script>
            {literal}
                var width0 = $('*[abbr=android0-divine]').outerWidth();
                $('*[abbr=android0]').css('left', width0);
                var width1 = $('*[abbr=android1-divine]').outerWidth();
                $('*[abbr=android1]').css('left', width1);
                var width2 = $('*[abbr=android2-divine]').outerWidth();
                $('*[abbr=android2]').css('left', width2);
            {/literal}
        </script>
{/if}