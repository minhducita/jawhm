<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:33:37
         compiled from "/var/www/html/mypage/application/modules/default/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1609518884555467131fa718-67377621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22615057664644b83399b20e3b351c63486dfa0e' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/index.tpl',
      1 => 1435656701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1609518884555467131fa718-67377621',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_555467134db722_71228473',
  'variables' => 
  array (
    'header' => 0,
    'name' => 0,
    'percent' => 0,
    'is_expiration' => 0,
    'next_status' => 0,
    'expiration_date' => 0,
    'smp' => 0,
    'plan' => 0,
    'survey' => 0,
    'next_step' => 0,
    'reserve' => 0,
    'next_seminar' => 0,
    'mem_id' => 0,
    'bum' => 0,
    'first' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555467134db722_71228473')) {function content_555467134db722_71228473($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-container">
    <div class="wrapper col-xs-12 col-md-12">
        <div class="col-xs-12 col-md-1"></div>
        <div class="welcome col-xs-12 col-md-4">
            <div class="text-center">
                <h1 style="margin-top: 10px;">
                    Welcome to <br /> <span class="text-under text-italic"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['name']->value[2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['name']->value[1], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                </h1>
                <h3 style="margin-top: 10px;"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['name']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 さまの達成度</h3>
                <div class="welcome-percent div-center col-xs-12"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['percent']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
%</div>
            </div>

            <div class="div-center col-xs-12 expiration-box expiration-wrapper" <?php if ($_smarty_tpl->tpl_vars['is_expiration']->value==0){?>style="background: #FFFFFF;"<?php }?>><?php if ($_smarty_tpl->tpl_vars['is_expiration']->value==1){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['next_status']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<br /><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['expiration_date']->value,"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></div>
            <div class="col-xs-3"></div>
            <div class="bum-wrapper col-xs-6" style="padding-left: 0px; margin-left: -30px;">
                <div id="bum_message" class="box box-wrapper" style="margin-left: 3px;"><span class="text-bold" id="bum-message"></span></div>
                <img src="themes/images/bumkun/blue/top/1.png" alt="ばむくん" id="bum_click" class="welcome-size div-bum">
            </div>
            <div class="col-xs-3"></div>
        </div>

        <div class="col-xs-12 col-md-1"></div>
<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
        <div class="process col-xs-12 col-md-6">
            <div class="list-group col-md-8">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" class="list-group-item active">渡航計画(目標)</a></h4>
                <span id="collapse_1" class="panel-collapse collapse in">
                    <ul class="list-group" style="margin-bottom: 0;">
                        <li class="list-group-item">出発日: <span style="padding-left: 24px;"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['plan']->value['scheduled_departure_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></li>
                        <li class="list-group-item">到着日: <span style="padding-left: 24px;"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['plan']->value['scheduled_arrival_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></li>
                        <li class="list-group-item">入学日: <span style="padding-left: 24px;"><?php if ($_smarty_tpl->tpl_vars['plan']->value['scheduled_enroll_date']){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['plan']->value['scheduled_enroll_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?>入学予定なし<?php }?></span></li>
                    </ul>
                </span>
            </div>
        </div>
<?php }?>
        <div class="col-xs-12 col-md-1"></div>

        <div class="col-xs-12 col-md-4" <?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?>style="margin-top: 40px;"<?php }?>>
            <div class="list-group">
                <h4 class="panel-title"><a <?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?> data-toggle="collapse" data-parent="#accordion" href="#collapse_1" id="accordion_1" <?php }?> class="list-group-item active">次のステップ<?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?><i class="pull-right glyphicon glyphicon-chevron-up"></i><?php }?></a></h4>
                <span id="collapse_1" class="panel-collapse collapse in">
                    <ul class="list-group" style="margin-bottom: 0;">
                        <?php if ($_smarty_tpl->tpl_vars['survey']->value==1){?>
                            <li class="list-group-item">
                                <span class="expression-strong"><span class="glyphicon glyphicon-asterisk"></span>体験談を書こう</span>
                            </li>
                        <?php }else{ ?>
                            <li class="list-group-item">
                                <span class="expression-strong"><span class="glyphicon glyphicon-asterisk"></span><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['next_step']->value['step_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>:
                                <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['next_step']->value['step_exposition_short'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                            </li>
                            <li class="list-group-item">
                                <span class="expression-strong"><span class="glyphicon glyphicon-asterisk"></span>必要なもの</span>:
                                <?php if ($_smarty_tpl->tpl_vars['next_step']->value['preparation']){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['next_step']->value['preparation'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?>特になし<?php }?>
                            </li>
                            <li class="list-group-item">
                                <span class="expression-strong">次回ご来店予定</span>:
                                <?php if ($_smarty_tpl->tpl_vars['reserve']->value[0]!=''&&smarty_modifier_date_format($_smarty_tpl->tpl_vars['reserve']->value[0],"%G年%m月%d日 %H:%M")>=smarty_modifier_date_format(time(),"%G年%m月%d日 %H:%M")){?>
                                    <br /><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['reserve']->value[0],"%G年%m月%d日 %H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
～<br />
                                <?php }else{ ?>
                                    <br />現在、次回のご予約はありません。<br />
                                <?php }?>
                            </li>
                        <?php }?>
                    </ul>
                </span>
            </div>
        </div>

        <div class="col-xs-12"></div>
        <div class="col-xs-1 col-md-1"></div>

            <div class="col-xs-12 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">出発までのステップ</h4>
                        ステップをクリックしてください。
                    </div>

                    <div class="panel-body" style="margin-bottom: 30px;">
                        <div class="col-xs-4">
                            <span onClick="location.href='plan/index'" class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']>=2){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="android0-divine">準備</span><span class="button-triangle" onClick="location.href='plan/index'" id="android0"></span>
                        </div>
                        <div class="col-xs-4">
                            <span <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']>=2){?> id="application" <?php }else{ ?> onClick="alert('プランが決まり次第閲覧可能です。');" <?php }?> class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']>=3){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="android1-divine">書類</span><span abbr="android1" class="button-triangle"<?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']>=2){?> id="application" <?php }else{ ?> onClick="alert('プランが決まり次第閲覧可能です。');" <?php }?>></span>
                        </div>
                        <div class="col-xs-4">
                            <span <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']>=3){?> id="preparation" <?php }else{ ?>onClick="alert('ビザが確定次第閲覧可能です。');"<?php }?> class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']>=4){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="android2-divine">出発</span><span abbr="android2" class="button-triangle" <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']>=3){?> id="preparation" <?php }else{ ?>onClick="alert('ビザが確定次第閲覧可能です。');"<?php }?>></span>
                        </div>
                    </div>

                    <div class="col-xs-12 kill-grid">
                        <div class="col-xs-4">
                            <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']==1){?><img src="themes/images/imakoko.png" alt="いまここ" class="imakoko"><img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click2" class="menu-bum" style="Z-index: 1; margin-top: -36px;"><?php }?>
                        </div>
                        <div class="col-xs-5" style="left: 10px;">
                            <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']==2){?><img src="themes/images/imakoko.png" alt="いまここ" class="imakoko" style="margin-left: 20px;"><img src="themes/images/bumkun/blue/top/1.png" alt="ばむくん" id="bum_click2" class="menu-bum" style="Z-index: 1; margin-top: -36px; margin-left: 10px; "><?php }?>
                        </div>
                        <div class="col-xs-2">
                            <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']==3){?><img src="themes/images/imakoko.png" alt="いまここ" class="imakoko"><img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click2" class="menu-bum" style="Z-index: 1; margin-top: -36px;"><?php }?>
                        </div>
                        <div class="col-xs-12 kill-grid" style="margin-top: 20px; margin-bottom: 20px;">
                            <a id="achievement" class="btn btn-success col-xs-12 font-bold text-bold">達成状況一覧</a>
                        </div>
<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                        <div class="col-xs-12" style="margin-top: 20px;">
                            <div class="bum-pos" style="margin-bottom:10px;">
                                <img src="themes/images/bumkun/blue/top/1.png" alt="ばむくん" id="bum_click3" class="intro-bum">
                            </div>
                            <div class="bum-intro padding-text">
                                ワーホリ協会サポートキャラクター<br >
                                ばむくん<span style="padding-left: 10px;"></span><a href="#" onClick="window.open('index/bamkun','','scrollbars=yes,Width=800,Height=700'); return false;">ばむくんとは</a>
                            </div>
                        </div>
<?php }?>
                    </div>
                </div>
            </div>
        <div class="col-xs-12 col-md-1"></div>

<?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?>
        <div class="col-xs-12 col-md-4">
            <div class="list-group">
                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse_2" class="list-group-item active" id="accordion_2">渡航計画(目標)<?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?><i class="pull-right glyphicon glyphicon-chevron-down"></i><?php }?></a></h4>
                <span id="collapse_2" class="panel-collapse collapse">
                    <ul class="list-group" style="margin-bottom: 0;">
                        <li class="list-group-item">出発日: <span style="padding-left: 24px;"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['plan']->value['scheduled_departure_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></li>
                        <li class="list-group-item">到着日: <span style="padding-left: 24px;"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['plan']->value['scheduled_arrival_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></li>
                        <li class="list-group-item">入学日: <span style="padding-left: 24px;"><?php if ($_smarty_tpl->tpl_vars['plan']->value['scheduled_enroll_date']){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['plan']->value['scheduled_enroll_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?>入学予定なし<?php }?></span></li>
                    </ul>
                </span>
            </div>
        </div>
<?php }?>

        <div class="col-xs-12 col-md-4">
            <div class="list-group">
                <h4 class="panel-title"><a <?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?> data-toggle="collapse" data-parent="#accordion" href="#collapse_3" id="accordion_3"<?php }?> class="list-group-item btn-info-custom" style="margin-left: 0; margin-right:0;"> マイページメニュー<?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?><i class="pull-right glyphicon glyphicon-chevron-down"></i><?php }?></a></h4>
                <span id="collapse_3" class="panel-collapse collapse <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>in<?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['survey']->value==1){?><a id="survey" class="list-group-item clickable">体験談アンケート</a><?php }?>
                    <a id="set-appointment" class="list-group-item">個別カウンセリング予約 </a>
                    <a href="seminar/index" class="list-group-item">セミナー <?php if (isset($_smarty_tpl->tpl_vars['next_seminar']->value)){?><span class="text-notice">次回予約: <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['next_seminar']->value['starttime'],"%m月%d日 %H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
～</span><?php }?></a>
                    <a href="member/index" class="list-group-item">会員情報変更 <span class="text-notice">会員番号: <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['mem_id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></a>
                    
                    <a href="manual/index" class="list-group-item">マイページヘルプ</a>
                    <a href="https://www.jawhm.or.jp/qa.html" class="list-group-item">よくある質問</a>
                    <a href="index/activitylog" class="list-group-item">活動内容</a>
                    <a href="index/logout" class="list-group-item">ログアウト</a>
                </span>
            </div>
<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?><a id="help-index" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a><?php }?>
        </div>

        <div class="col-xs-2"></div>
<?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?>
        <div class="col-xs-12">
            <img src="themes/images/bumkun/blue/top/1.png" alt="ばむくん" id="bum_click" class="intro-bum smp-bum" style="margin-bottom:10px;">

            <div class="smp-intro padding-text">
                ワーホリ協会サポートキャラクター<br >
                ばむくん<span style="padding-left: 10px;"></span><a href="#" onClick="window.open('http://www.jawhm.or.jp/2014autumnfair/bamukun.html','','Width=800,Height=700'); return false;">ばむくんとは</a><br />
                <a id="help-index" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
            </div>
        </div>
<?php }?>
    </div>

</div>
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="themes/data/bumdata.json"></script>
    <script type="text/javascript" src="themes/data/bummessage.json"></script>
    <script>
        bum  = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['bum']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;
        first_time = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['first']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;
        smp = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['smp']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;

        var width0 = $('*[abbr=android0-divine]').outerWidth();
        $('*[abbr=android0]').css('left', width0 + 15);
        var width1 = $('*[abbr=android1-divine]').outerWidth();
        $('*[abbr=android1]').css('left', width1 + 15);
        var width2 = $('*[abbr=android2-divine]').outerWidth();
        $('*[abbr=android2]').css('left', width2 + 15);

        progress = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['percent']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;
    </script>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>