<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base herf="{$base}">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{$base}/client/themes/css/user.css" media="all" /> 
  <link href="{$base}/client/themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" type="text/css" href="{$base}/client/themes/css/common.css" media="all" /> 
  <link rel="icon" href="{$base}/client/themes/images/favicon.ico" type="image/x-icon" />
  <title>{$title}</title>
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top">
    	<div class="navbar-header">
            <a class="navbar-brand" href="{$base}/client/index/index">JAWHM</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse-target">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
               	<span class="icon-bar"></span>
                <span class="icon-bar"></span>
  			</button>
      		
        </div>
        
        <div class="collapse navbar-collapse collapse-target">
        	<ul class="nav navbar-nav">
                <li><a href="{$base}/client/seminar/index">セミナー予約確認</a><li>
                <li><a href="{$base}/client/member/index">会員情報変更</a></li>
                <li><a href="{$base}/index/about">達成状況一覧</a></li>
                <li><a href="{$base}/client/index/logout">ログアウト</a></li>
            </ul>
        </div>
    </div>