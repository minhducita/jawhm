{include file=$header}
    <ol class="breadcrumb">
        <li><a href="staff/client/clientindex">マイページトップ</a></li>
        <li>出発</li>
    </ol>

    <div class="panel panel-primary col-md-6 kill-grid"  id="apli-divine">
        <div class="panel-heading">
            <h4 class="panel-title">{$username}様出発前お手続き一覧</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; ">ご契約</span>
                    <span class="col-xs-3">
                        <button type="button" class="btn btn-group-xs
                            {if $status.flight_confirm == 1}btn-success
                            {elseif $status.flight_confirm == 2}btn-danger
                            {elseif $status.flight_flag == 1}btn-warning
                            {else}btn-info{/if}"onClick="location.href='preparation/flightlist'" style="width: 75px; ">
                            フライト
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" class="btn btn-group-xs
                            {if $status.insurance_confirm == 1}btn-success
                            {elseif $status.insurance_confirm == 2}btn-danger
                            {elseif $status.insurance_flag == 1}btn-warning
                            {else}btn-info{/if}"
                            onClick="location.href='preparation/insurancelist'" style="width: 75px;{if $smp == 1}margin-left: 5px; margin-right: 30px;{/if} ">保険
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" class="btn btn-group-xs
                            {if $status.visa_confirm == 1}btn-success
                            {elseif $status.visa_confirm == 2}btn-danger
                            {elseif $status.visa_flag == 1}btn-warning
                            {else}btn-info{/if}"
                            onClick="location.href='preparation/visalist'" style="width: 75px; {if $smp == 1}margin-left: 10px;{/if} ">ビザ
                        </button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; "></span>
                    <span class="col-xs-5">
                        <a href="preparation/loa" target="_blank" class="btn btn-group-xs
                            {if $status.loa_confirm == 1}btn-success
                            {elseif $status.loa_flag == 1}btn-warning
                            {else}btn-info{/if}"
                            style="width: 110px;">入学許可書
                        </a>
                    </span>
                    {*<span class="col-xs-4">
                        <button type="button" id="homestay_form" class="btn btn-group-xs
                            {if $status.homestay_confirm == 1}btn-success
                            {elseif $status.homestay_flag == 1}btn-warning
                            {else}btn-info{/if}">
                            ホームステイ
                        </button>
                    </span>*}
                    <span class="col-xs-3">
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; ">連絡用</span>
                    <span class="col-xs-5">
                        <button type="button" class="btn btn-group-xs
                            {if $status.schedule_confirm == 1}btn-success
                            {elseif $status.schedule_flag == 1}btn-warning
                            {else}btn-info{/if}"
                            onClick="location.href='schedule/index'">スケジュール
                        </button>
                    </span>
                    <span class="col-xs-4">
                        <button type="button" class="btn btn-group-xs
                            {if $status._confirm == 1}btn-success
                            {elseif $status.article_flag == 1}btn-warning
                            {else}btn-info{/if}"
                            onClick="location.href='schedule/selectschool'"
                            style="width: 110px; ">
                            学校連絡
                        </button>
                    </span>
                    <span class="col-xs-1"></span>
                </div>
            </li>
        </ul>
    </div>

    <div class="panel panel-primary col-xs-12 col-md-6 kill-grid" id="bum-divine">
        <div class="panel-heading">
            <h4 class="panel-title">ばむくんによるボタン色の説明</h4>
        </div>
        <div id="bum_message" class="application-box application-box-wrapper col-xs-9">
            <div class="text-bold application-message" id="bum-message">
                水色は誰も確認していない状態。<br />
                オレンジはアナタが確認済み。<br />
                緑はスタッフも確認済みだよ。<br />
                赤だったらやり直しが必要!
            </div>
        </div>
        <span class="application-size application-bum col-xs-4"><img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click4" class="bum-size"></span><br />
        <div class="col-xs-9 kill-grid" style="padding-top: 19px; padding-left: 0; ">
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-info col-xs-12 kill-grid">水色</button></span>
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-warning col-xs-12 kill-grid">オレンジ</button></span>
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-success col-xs-12 kill-grid">緑</button></span>
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-danger col-xs-12 kill-grid">赤</button></span>
        </div>
    </div>

   <div class="col-xs-12"></div>
    <div class="panel panel-primary col-xs-12 col-md-6" style="padding-left: 0px; padding-right: 0px;" >
        <div class="panel-heading">
            <h4 class="panel-title">出発前お手続き確認</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; ">ご契約</span>
                    <span class="col-xs-3">
                        <button type="button" id="flight-check"
                        class="btn btn-group-xs btn-success" style="width: 75px; ">フライト
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" id="insurance-check"
                        class="btn btn-group-xs btn-success" style="width: 75px;">保険
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" id="visa-check"
                        class="btn btn-group-xs btn-success" style="width: 75px;">ビザ
                        </button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; "></span>
                    <span class="col-xs-5">
                        <button type="button" id="loa-check"
                        class="btn btn-group-xs btn-success" style="width: 110px; ">入学許可書
                        </button>
                    </span>
                    {*<span class="col-xs-5">
                        <button type="button" id="homestay-check"
                        class="btn btn-group-xs btn-success" style="width: 110px;">ホームステイ
                        </button>
                    </span>
                    *}
                    <span class="col-xs-5">

                </div>
            </li>

            <li>
                <div class="col-xs-12 kill-grid">
                    <button id="preparation_complete" class="btn btn-warning" style="margin-top:10px;">書類完了</button>
                    <div id="data-container" style="margin-top: 45px;"></div>
                </div>
            </li>
        </ul>
    </div>

    <div class="col-xs-12"></div>
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script src="themes/js/bootstrap.min.js"></script>
    <script src="themes/data/bumdata.json"></script>
    <script src="themes/data/bummessage.json"></script>
    <script>
        stat = {$status_name nofilter};
        bum  = {$bum};

        var height = $('#apli-divine').height();
        $('#bum-divine').css('height', height);
    </script>
{include file=$footer}