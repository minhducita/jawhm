<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base href="{$base}/mypage/">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="Content-Type" content="application/json" charset=utf-8>
  <meta name="format-detection" content="telephone=no">
  <link href="themes/css/reset.css" rel="stylesheet" type="text/css" media="screen" />
  {if isset($datetimepicker)} <link rel="stylesheet" type="text/css" href="themes/css/bootstrap-datetimepicker.min.css" media="all" />{/if}
  <link href="themes/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="themes/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="themes/css/ace.min.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="themes/css/mypage-school.css" rel="stylesheet" type="text/css"  media="all" />
  <style type="text/css">
    .jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
  </style>
  <link rel="icon" href="themes/images/favicon.ico" type="image/x-icon" />
  <title>{$title}</title>
  <script>
    year_unit = '{$head_msg[1].message}';
    month_unit = '{$head_msg[2].message}';
    day_unit = '{$head_msg[3].message}';
    hour_unit = '{$head_msg[4].message}';
    min_unit = '{$head_msg[5].message}';
    sec_unit = '{$head_msg[6].message}';
    jsmsg = {$jsmsg nofilter};
  </script>
</head>

<body class="navbar-fixed breadcrumbs-fixed">
    <div id="navbar" class="navbar navbar-default navbar-fixed-top" style="height: 45px;" >
        <div id="navbar-container" class="navbar-container">
            <div class="navbar-header pull-left" style="height: 45px;">
                <a class="navbar-brand" href="school/index" style="padding-top: 14px;"><img src="themes/images/h1-logo.png" alt="jawhm" /></a>
            </div>
            <div class="navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    {if $smp == 0}<li class="font-time"><i class="glyphicon glyphicon-time time"></i>{$head_msg[0].message}：<span id="currentTime"></span></li>{/if}
                    <li class="indianred">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="icon-envelope {if $rows > 0}icon-animated-vertical{/if}"></i>
                            {if $rows > 0}<span class="badge badge-success">{$rows}</span>{/if}
                        </a>

                        <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                            <i class="icon-envelope-alt"></i>
                                {$rows} {$head_msg[7].message}
                            </li>
                            <li>
                                <a href="school/talk/index">
                                    {$head_msg[8].message}
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="light-blue">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <span class="user-info">
                                <small>{$head_msg[9].message},</small>
                                {$school_name}
                            </span>
                            <i class="icon-caret-down"></i>
                        </a>
                        <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a id="change_password">
                                    <i class="icon-key"></i>
                                    {$head_msg[10].message}
                                </a>
                            </li>
                            <li>
                                <a href="school/index/logout">
                                    <i class="icon-off"></i>
                                    {$head_msg[11].message}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="main-container" class="main-container">
        <div class="main-container-inner">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text">
                </span>
            </a>

            <div id="sidebar" class="sidebar sidebar-fixed">
                <ul class="nav nav-list">
                    <li {if $controller === 'index'}class="active"{/if}>
                        <a href="school/index/index">
                            <i class="icon-home"></i>
                            <span class="menu-text"> {$side_msg[0].message} </span>
                        </a>
                    </li>

                    <li {if $controller === 'client'}class="active"{/if}>
                        <a href="school/client/index">
                            <i class="icon-desktop"></i>
                            <span class="menu-text"> {$side_msg[1].message} </span>
                        </a>
                    </li>

                    <li {if $controller === 'seminar'}class="active"{/if}>
                        <a href="school/seminar/index">
                            <i class="icon-list"></i>
                            <span class="menu-text"> {$side_msg[2].message} </span>
                        </a>
                    </li>

                    <li {if $controller === 'talk'}class="active"{/if}>
                        <a href="school/talk/index">
                            <i class="icon-edit"></i>
                            <span class="menu-text"> {$side_msg[3].message} </span>
                        </a>
                    </li>

                    <li {if $controller === 'proposal'}class="active"{/if}>
                        <a href="school/proposal/index">
                            <i class="icon-comment"></i>
                            <span class="menu-text"> {$side_msg[5].message} </span>
                        </a>
                    </li>

                    <li>
                        <a id="sidebar-collapse-menu">
                            <i id="collapse-menu"class="glyphicon glyphicon-chevron-left"></i>
                            <span class="menu-text">{$side_msg[4].message}</span>
                        </a>
                        <div id="sidebar-collapse-icon" class="sidebar-collapse">
                            <i id="collapse-icon" class="icon-double-angle-left"></i>
                        </div>
                    </li>
                </ul>
            </div>