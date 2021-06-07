{include file=$header}
<div id="page-container">
    <div class="wrapper col-xs-12 col-md-12">
        <div class="col-xs-12 col-md-1"></div>
        <div class="welcome col-xs-12 col-md-4">
            <div class="text-center">
                <h1 style="margin-top: 10px;">
                    Welcome to <br /> <span class="text-under text-italic">{$name.2} {$name.1}</span>
                </h1>
                <h3 style="margin-top: 10px;">{$name.0} さまの達成度</h3>
                <div class="welcome-percent div-center col-xs-12">{$percent}%</div>
            </div>

            <div class="col-xs-3"></div>
            <div class="div-center col-xs-12 expiration-box expiration-wrapper" {if $is_expiration==0}style="background: #FFFFFF;"{/if}>{if $is_expiration==1}{$next_status}<br />{$expiration_date|date_format:"%m月%d日"}{/if}</div>
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
                                    <input type="text" class="form-control" value="{$plan.scheduled_departure_date}" name="scheduled_departure_date" />
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
                                    <input type="text" class="form-control" value="{$plan.scheduled_arrival_date}" name="scheduled_arrival_date" />
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
                                    <input type="text" class="form-control" value="{$plan.scheduled_enroll_date}" name="scheduled_enroll_date" />
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
                        {if $survey == 1}
                            <li class="list-group-item">
                                <span class="expression-strong"><span class="glyphicon glyphicon-asterisk"></span>体験談を書こう</span>
                            </li>
                        {else}
                            <li class="list-group-item">
                                <span class="expression-strong"><span class="glyphicon glyphicon-asterisk"></span>{$next_step.step_name}</span>:
                                {$next_step.step_exposition_short}
                            </li>
                            <li class="list-group-item">
                                <span class="expression-strong"><span class="glyphicon glyphicon-asterisk"></span>必要なもの</span>:
                                {if $next_step.preparation}{$next_step.preparation}{else}特になし{/if}
                            </li>
                            <li class="list-group-item">
                                <span class="expression-strong">次回ご来店予定</span>:
                                {if $reserve.0 != 'null' and $reserve.0|date_format:"%G年%m月%d日 %H:%M" >= $smarty.now|date_format:"%G年%m月%d日 %H:%M"}
                                    <br />{$reserve.0|date_format:"%G年%m月%d日 %H:%M"}～<br />
                                {else}
                                    <br />現在、次回のご予約はありません。<br />
                                {/if}
                            </li>
                        {/if}
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
                            <span onClick="location.href='staff/plan/index'" class="button-step clickable {if $plan.progress_level >= 2}success-color{else}danger-color{/if}" abbr="android0-divine">準備</span><span class="button-triangle" onClick="location.href='staff/plan/index'" id="android0"></span>
                        </div>
                        <div class="col-xs-4">
                            <span {if $plan.progress_level >= 2} id="application" {else} onClick="alert('プランが決まり次第閲覧可能です。');" {/if} class="button-step clickable {if $plan.progress_level >= 3}success-color{else}danger-color{/if}" abbr="android1-divine">書類</span><span abbr="android1" class="button-triangle"{if $plan.progress_level >= 2} id="application" {else} onClick="alert('プランが決まり次第閲覧可能です。');" {/if}></span>
                        </div>
                        <div class="col-xs-4">
                            <span {if $plan.progress_level >= 3} id="preparation" {else}onClick="alert('ビザが確定次第閲覧可能です。');"{/if} class="button-step clickable {if $plan.progress_level >= 4}success-color{else}danger-color{/if}" abbr="android2-divine">出発</span><span abbr="android2" class="button-triangle" {if $plan.progress_level >= 3} id="preparation" {else}onClick="alert('ビザが確定次第閲覧可能です。');"{/if}></span>
                        </div>
                    </div>

                    <div class="col-xs-12 kill-grid">
                        <div class="col-xs-4">
                            {if $plan.progress_level == 1}<img src="themes/images/imakoko.png" alt="いまここ" class="imakoko"><img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click2" class="menu-bum" style="Z-index: 1; margin-top: -36px;">{/if}
                        </div>
                        <div class="col-xs-5" style="left: 10px;">
                            {if $plan.progress_level == 2}<img src="themes/images/imakoko.png" alt="いまここ" class="imakoko" style="margin-left: 20px;"><img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click2" class="menu-bum" style="Z-index: 1; margin-top: -36px; margin-left: 10px; ">{/if}
                        </div>
                        <div class="col-xs-2">
                            {if $plan.progress_level == 3}<img src="themes/images/imakoko.png" alt="いまここ" class="imakoko"><img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click2" class="menu-bum" style="Z-index: 1; margin-top: -36px;">{/if}
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
                <h4 class="panel-title"><a {if $smp == 1} data-toggle="collapse" data-parent="#accordion" href="#collapse_3" id="accordion_3"{/if} class="list-group-item btn-info-custom" style="margin-left: 0; margin-right:0;"> マイページメニュー{if $smp == 1}<i class="pull-right glyphicon glyphicon-chevron-down"></i>{/if}</a></h4>
                <span id="collapse_3" class="panel-collapse collapse {if $smp == 0}in{/if}">
                    {if $survey == 1}<a id="survey" class="list-group-item clickable">体験談アンケート</a>{/if}
                    <a href="seminar/index" class="list-group-item">セミナー {if isset($next_seminar)}<span class="text-notice">次回予約: {$next_seminar.starttime|date_format:"%m月%d日 %H:%M" }～</span>{/if}</a>
                    <a href="staff/member/index" class="list-group-item">会員情報変更 <span class="text-notice">会員番号: {$mem_id}</span></a>
                    {*<a href="staff/talk/index" class="list-group-item">一言相談</a>*}
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
        bum  = {$bum};
        first_time = {$first};
        smp = {$smp};
        indexurl = '{$url}';

        var width0 = $('*[abbr=android0-divine]').outerWidth();
        $('*[abbr=android0]').css('left', width0 + 15);
        var width1 = $('*[abbr=android1-divine]').outerWidth();
        $('*[abbr=android1]').css('left', width1 + 15);
        var width2 = $('*[abbr=android2-divine]').outerWidth();
        $('*[abbr=android2]').css('left', width2 + 15);

        progress = {$percent};

        $(function () {
            {literal}
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

            {/literal}
        });
    </script>

{include file=$footer}