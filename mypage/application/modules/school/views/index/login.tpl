<!DOCTYPE HTML>
<html lang="ja">
<head>
<base href="{$base}/mypage/">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
{if isset($json)}<meta http-equiv="Content-Type" content="application/json" charset=utf-8>
{else}<meta http-equiv="Content-Type" content="text/html" charset="utf-8">{/if}
<meta name="format-detection" content="telephone=no">
<link href="themes/css/reset.css" rel="stylesheet" type="text/css" media="screen" />
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
                                {$message[0].message}<br />
                                {$message[1].message}
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="school_name">{$message[2].message}</label>
                                <input class="form-control" type="input" name="school_name" placeholder="{$message[2].message}">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="password">{$message[3].message}</label>
                                <input type="password" class="form-control" name="password" placeholder="{$message[3].message}">
                            </div>
                            <input type="hidden" name="url" value="auth">
                            <div class="col-xs-9 kill-rlpadding">
                                <select id="language" class="form-control">
                                    <option value="ja" {if $locale == 'ja'}selected{/if}>日本語</option>
                                    <option value="en" {if $locale == 'en'}selected{/if}>English</option>
                                </select>
                            </div>
                            <button type="button" id="login-button" class="btn btn-default col-xs-3 pull-right">{$message[4].message}</button>
                        </fieldset>
                    </form>
                    <div class="div-padding">
                        <a data-toggle="collapse" data-parent="#accordion" href="#forget">{$message[5].message}</a>
                        <div id="forget" class="panel-collapse collapse">
                            <div class="panel-body">
                                <button id="forget_password" type="button" class="btn btn-warning" style="width:150px; ">{$disable[0].message}</button><br />
                                <button id="forget_school" type="button" class="btn btn-warning" style="width:150px; ">{$disable[1].message}</button><br />
                                <button id="forget_other" type="button" class="btn btn-warning" style="width:150px; ">{$disable[2].message}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {include file=$modal}
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="themes/js/jquery.cookie.js"></script>
    {if isset($index)}
        <script type="text/javascript" src="themes/js/jquery.yurayura.js"></script>
    {/if}
    <script type="text/javascript" src="themes/js/jquery.pjax.js"></script>
    <script type="text/javascript" src="themes/js/common.js"></script>
    <script type="text/javascript" src="themes/js/mypage-school.js"></script>
    <script>
        loadingView(false);
    </script>
    </body>
</html>