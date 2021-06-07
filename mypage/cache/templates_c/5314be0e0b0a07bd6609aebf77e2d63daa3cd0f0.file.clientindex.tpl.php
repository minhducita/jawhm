<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 15:38:03
         compiled from "/var/www/html/mypage/application/modules/staff/views/client/clientindex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1502561696555d42f7467252-96642767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5314be0e0b0a07bd6609aebf77e2d63daa3cd0f0' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/client/clientindex.tpl',
      1 => 1432622230,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1502561696555d42f7467252-96642767',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_555d42f79a7632_74689673',
  'variables' => 
  array (
    'header' => 0,
    'name' => 0,
    'percent' => 0,
    'is_expiration' => 0,
    'next_status' => 0,
    'expiration_date' => 0,
    'plan' => 0,
    'survey' => 0,
    'next_step' => 0,
    'reserve' => 0,
    'smp' => 0,
    'next_seminar' => 0,
    'mem_id' => 0,
    'bum' => 0,
    'first' => 0,
    'url' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d42f79a7632_74689673')) {function content_555d42f79a7632_74689673($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
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

            <div class="col-xs-3"></div>
            <div class="div-center col-xs-12 expiration-box expiration-wrapper" <?php if ($_smarty_tpl->tpl_vars['is_expiration']->value==0){?>style="background: #FFFFFF;"<?php }?>><?php if ($_smarty_tpl->tpl_vars['is_expiration']->value==1){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['next_status']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<br /><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['expiration_date']->value,"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></div>
            <div class="bum-wrapper col-xs-6" style="padding-left: 0px; margin-left: -30px;">
                <div id="bum_message" class="box box-wrapper" style="margin-left: 3px;"><span class="text-bold" id="bum-message"></span></div>
                <img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click" class="welcome-size div-bum">
            </div>
            <div class="col-xs-3"></div>
        </div>

        <div class="col-xs-12 col-md-1"></div>

        <div class="process col-xs-12 col-md-6">
            <div class="list-group col-md-8">
                <h4 class="panel-title">
                    <span class="list-group-item btn-primary-custom" style="margin-left: 0; margin-right: 0">
                        渡航計画(目標)
                        <button id="save_schedule_date" class="btn btn-success pull-right" style="margin-top: -8px;">保存</button>
                    </span>
                </h4>
                <span id="collapse_1" class="panel-collapse collapse in">
                    <ul class="list-group" style="margin-bottom: 0;">
                        <li class="list-group-item inc-btn">
                            <span class="col-md-3 kill-grid">出発日:</span>
                            <span class="col-md-9">
                                <span class="input-group date" id="scheduled_departure_date">
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['plan']->value['scheduled_departure_date'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" name="scheduled_departure_date" />
                                    <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                   </span>
                                </span>
                            </span>
                        </li>
                        <li class="list-group-item inc-btn">
                            <span class="col-md-3 kill-grid">到着日:</span>
                            <span class="col-md-9">
                                <span class="input-group date" id="scheduled_arrival_date">
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['plan']->value['scheduled_arrival_date'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" name="scheduled_arrival_date" />
                                    <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                   </span>
                                </span>
                            </span>
                        </li>
                        <li class="list-group-item inc-btn">
                            <span class="col-md-3 kill-grid">入学日:</span>
                            <span class="col-md-9">
                                <span class="input-group date" id="scheduled_enroll_date">
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['plan']->value['scheduled_enroll_date'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" name="scheduled_enroll_date" />
                                    <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                   </span>
                                </span>
                            </span>
                        </li>
                    </ul>
                </span>
            </div>
        </div>

        <div class="col-xs-12 col-md-1"></div>

        <div class="col-xs-12 col-md-4">
            <div class="list-group">
                <h4 class="panel-title">
                    <span class="list-group-item btn-primary-custom" style="margin-left: 0; margin-right: 0">
                        次のステップ
                        <button id="next_step" class="btn btn-success pull-right" style="margin-top: -8px;">入力</button>
                    </span>
                </h4>
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
                                <?php if ($_smarty_tpl->tpl_vars['reserve']->value[0]!='null'&&smarty_modifier_date_format($_smarty_tpl->tpl_vars['reserve']->value[0],"%G年%m月%d日 %H:%M")>=smarty_modifier_date_format(time(),"%G年%m月%d日 %H:%M")){?>
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
                            <span onClick="location.href='staff/plan/index'" class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']>=2){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="android0-divine">準備</span><span class="button-triangle" onClick="location.href='staff/plan/index'" id="android0"></span>
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
                            <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']==2){?><img src="themes/images/imakoko.png" alt="いまここ" class="imakoko" style="margin-left: 20px;"><img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click2" class="menu-bum" style="Z-index: 1; margin-top: -36px; margin-left: 10px; "><?php }?>
                        </div>
                        <div class="col-xs-2">
                            <?php if ($_smarty_tpl->tpl_vars['plan']->value['progress_level']==3){?><img src="themes/images/imakoko.png" alt="いまここ" class="imakoko"><img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click2" class="menu-bum" style="Z-index: 1; margin-top: -36px;"><?php }?>
                        </div>
                        <div class="col-xs-12 kill-grid" style="margin-top: 20px; margin-bottom: 20px;">
                            <a id="achievement" class="btn btn-success col-xs-12 font-bold text-bold">達成状況一覧</a>
                        </div>
                        <div class="col-xs-12" style="margin-top: 20px;">
                            <div class="bum-pos" style="margin-bottom:10px;">
                                <img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click3" class="intro-bum">
                            </div>
                            <div class="bum-intro padding-text">
                                ワーホリ協会サポートキャラクター<br >
                                ばむくん<span style="padding-left: 10px;"></span><a href="#" onClick="window.open('index/bamkun','','scrollbars=yes,Width=800,Height=700'); return false;">ばむくんとは</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-xs-12 col-md-1"></div>

        <div class="col-xs-12 col-md-4">
            <div class="list-group">
                <h4 class="panel-title"><a <?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?> data-toggle="collapse" data-parent="#accordion" href="#collapse_3" id="accordion_3"<?php }?> class="list-group-item btn-info-custom" style="margin-left: 0; margin-right:0;"> マイページメニュー<?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?><i class="pull-right glyphicon glyphicon-chevron-down"></i><?php }?></a></h4>
                <span id="collapse_3" class="panel-collapse collapse <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>in<?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['survey']->value==1){?><a id="survey" class="list-group-item clickable">体験談アンケート</a><?php }?>
                    <a href="seminar/index" class="list-group-item">セミナー <?php if (isset($_smarty_tpl->tpl_vars['next_seminar']->value)){?><span class="text-notice">次回予約: <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['next_seminar']->value['starttime'],"%m月%d日 %H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
～</span><?php }?></a>
                    <a href="staff/member/index" class="list-group-item">会員情報変更 <span class="text-notice">会員番号: <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['mem_id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></a>
                    
                    <a href="https://www.jawhm.or.jp/qa.html" class="list-group-item">よくある質問</a>
                    <a href="staff/client/activitylog" class="list-group-item">活動内容</a>
                    <a href="staff/index/logout" class="list-group-item">ログアウト</a>
                </span>
            </div>
        </div>

        <div class="col-xs-2"></div>
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
        indexurl = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
';

        var width0 = $('*[abbr=android0-divine]').outerWidth();
        $('*[abbr=android0]').css('left', width0 + 15);
        var width1 = $('*[abbr=android1-divine]').outerWidth();
        $('*[abbr=android1]').css('left', width1 + 15);
        var width2 = $('*[abbr=android2-divine]').outerWidth();
        $('*[abbr=android2]').css('left', width2 + 15);

        progress = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['percent']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;

        $(function () {
            
            var today = new Date();
            target_date = addDay(today, 1);
            $('#scheduled_departure_date').datetimepicker({
                language: 'ja',
                format: 'yyyy-mm-dd',
                pickTime: false,
                startDate: target_date,
                maxView: 3
            }).on('changeDate', function(ev){
                $(this).datetimepicker('hide');
            });

            $('#scheduled_arrival_date').datetimepicker({
                language: 'ja',
                format: 'yyyy-mm-dd',
                pickTime: false,
                startDate: target_date,
                maxView: 3
            }).on('changeDate', function(ev){
                $(this).datetimepicker('hide');
            });

            $('#scheduled_enroll_date').datetimepicker({
                language: 'ja',
                format: 'yyyy-mm-dd',
                pickTime: false,
                startDate: target_date,
                maxView: 3
            }).on('changeDate', function(ev){
                $(this).datetimepicker('hide');
            });

            
        });
    </script>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>