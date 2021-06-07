<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base href="{$base}/mypage/">
  {if isset($json)}
    <meta http-equiv="Content-Type" content="application/json" charset=utf-8>
  {else}
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  {/if}
  <meta name="format-detection" content="telephone=no">
  <link href="themes/css/reset.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="themes/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen" />

  {if isset($datetimepicker)}<link href="themes/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen" />{/if}
  {if isset($top)}<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">{/if}
  {if isset($child)}<link href="themes/css/bum.css" rel="stylesheet">{/if}
  <link href="themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  {if isset($datepicker)}<link rel="stylesheet" type="text/css" href="themes/css/bootstrap-datetimepicker.min.css" media="all" />{/if}
  <link rel="stylesheet" type="text/css" href="themes/css/mypage-staff.css" media="all" />
  <title>{$title}</title>
  <script>
    jsmsg = {$jsmsg nofilter};
  </script>
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="{$base}/mypage/staff/index">STAFF</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse-target">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

        </div>

        <div class="collapse navbar-collapse collapse-target">
            <ul class="nav navbar-nav">
                    <li><a href="staff/client/clientindex">トップページ</a>
                    <li class="arrow-top"><span onClick="location.href='staff/plan/index'" class="button-step clickable {if $progress >= 2}success-color{else}danger-color{/if}" abbr="staff-android0-divine">準備</span><span class="button-triangle" onClick="location.href='staff/plan/index'" id="staff-android0"></span>
                    {if isset($progress)}
                        {if $progress >= 2}{if $abroad_flag == '1'}<li class="arrow-top arrow-left"><span onClick="location.href='staff/application/index'" class="button-step clickable {if $progress >= 3}success-color{else}danger-color{/if}" abbr="staff-android1-divine">書類</span><span abbr="staff-android1" class="button-triangle" onClick="location.href='staff/application/index'"></span>{/if}{/if}
                        {if $progress >= 3}{if $abroad_flag == '1'}<li class="arrow-top arrow-left"><span onClick="location.href='staff/preparation/index'" class="button-step clickable {if $progress >= 4}success-color{else}danger-color{/if}" abbr="staff-android2-divine">出発</span><span abbr="staff-android2" class="button-triangle" onClick="location.href='staff/preparation/index'"></span>{/if}{/if}
                    {/if}
                    <li class="arrow-left"><a href="staff/seminar/index">セミナー予約情報</a></li>
                    <li><a href="staff/member/index">会員情報変更</a></li>
                    <li><a href="staff/talk/index">一言相談</a></li>
                    <li><a href="staff/index/index">スタッフ専用</a></li>
                    {if isset($auth_cd) && $auth_cd >= 130}
                        <li><a href="staff/index/manage">管理項目</a></li>
                    {else}
                    {/if}
                    <li><a href="staff/index/logout">ログアウト</a></li>
            </ul>
        </div>
    </div>

    <div style="margin-bottom: 50px;"></div>
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script>
        {if $top == 1}
            var is_top = 1;
        {else}
            var is_top = 0;
        {/if}
        {literal}
            var width0 = $('*[abbr=staff-android0-divine]').outerWidth();
            $('*[abbr=staff-android0]').css('left', width0);
            if (is_top == 0) {
                var width1 = $('*[abbr=staff-android1-divine]').outerWidth();
                $('*[abbr=staff-android1]').css('left', width1);
            }

            if (is_top == 0) {
                var width2 = $('*[abbr=staff-android2-divine]').outerWidth();
                $('*[abbr=android2]').css('left', width2);
            }
            //
        {/literal}
    </script>