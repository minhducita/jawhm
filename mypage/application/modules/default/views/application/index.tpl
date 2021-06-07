{include file=$header}
    <ol class="breadcrumb">
        <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
        <li>書類</li>
    </ol>

    <div class="col-xs-12 col-md-1"></div>
    <div class="panel panel-primary col-xs-12 col-md-5 kill-grid" id="apli-divine">
        <div class="panel-heading">
            <h4 class="panel-title">{$username}様にご準備頂く書類一覧</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid list-title-centering" >確認</span>
                    <span class="col-xs-4"><a href="application/getfile?file_no=6" target="_blank" class="btn btn-group-xs
                        {if $status.article_confirm == 1}btn-success
                        {elseif $status.article_confirm == 2}btn-danger
                        {elseif $status.article_flag == 1}btn-warning
                        {else}btn-info{/if}"
                        style="width:92px; ">約款</a>
                    </span>
                    <span class="col-xs-3"><button type="button" class="btn btn-group-xs
                        {if $status.agreement_confirm == 1}btn-success
                        {elseif $status.agreement_confirm == 2}btn-danger
                        {elseif $status.agreement_flag == 1}btn-warning
                        {else}btn-info{/if}"
                        id="dob_check">同意書</button>
                    </span>
                    <span class="col-xs-3"><button type="button" class="btn btn-group-xs
                        {if $status.deposit_finish_confirm == 1}btn-success
                        {elseif $status.deposit_finish_confirm == 2}btn-danger
                        {elseif $status.deposit_finish_flag == 1}btn-warning
                        {else}btn-info{/if}"
                        id="deposit">支払日</button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid list-title-centering">請求</span>
                    <span class="col-xs-4"><button type="button" class="btn btn-group-xs
                        {if $status.deposit_confirm == 1}btn-success
                        {elseif $status.deposit_confirm == 2}btn-danger
                        {elseif $status.deposit_flag == 1}btn-warning
                        {else}btn-info{/if}"
                        id="estimate" style="width:92px; ">見積</button>
                    </span>
                    <span class="col-xs-3"><button type="button" class="btn btn-group-xs
                        {if $status.bill_confirm == 1}btn-success
                        {elseif $status.bill_confirm == 2}btn-danger
                        {elseif $status.bill_flag == 1}btn-warning
                        {else}btn-info{/if}"
                        id="bill">請求書</button>
                    </span>
                    <span class="col-xs-3"><button type="button" class="btn btn-group-xs
                        {if $status.receipt_confirm == 1}btn-success
                        {elseif $status.receipt_confirm == 2}btn-danger
                        {elseif $status.receipt_flag == 1}btn-warning
                        {else}btn-info{/if}"
                        id="receipt">受領書</button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid list-title-centering">手続</span>
                    <span class="col-xs-4"><button type="button" class="btn btn-group-xs
                        {if $status.passport_confirm == 1}btn-success
                        {elseif $status.passport_confirm == 2}btn-danger
                        {elseif $status.passport_flag == 1}btn-warning
                        {else}btn-info{/if}"
                        id="passport" style="width: 92px;">パスポート</button>
                    </span>
                    {*<span class="col-xs-3"><button id="application_form" type="button" class="btn btn-group-xs
                        {if $status.application_confirm == 1}btn-success
                        {elseif $status.application_confirm == 2}btn-danger
                        {elseif $status.application_flag == 1}btn-warning
                        {else}btn-info{/if}"
                        style="width: 67px;">願書</button>
                    </span>*}
                    <span class="col-xs-3">
                    <span class="col-xs-3">
                    </span>
                </div>
            </li>
        </ul>
    </div>

    <div class="panel panel-primary col-xs-12 col-md-5 kill-grid" id="bum-divine">
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
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-danger col-xs-12 kill-grid">赤</button></span></span>
        </div>
    </div>

    <div class="col-xs-12 col-md-12"></div>
    <div class="col-xs-12 col-md-1"></div>

    <div class="panel panel-primary col-xs-12 col-md-5" style="padding-left: 0px; padding-right: 0px;" >
        <div class="panel-heading">
            <h4 class="panel-title">留学情報</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <span class="glyphicon glyphicon-asterisk"></span>学校情報:
                <span class="text-italic">{if $school.0 != ''}<a href="{$school.1}" target="_blank">{/if}{$school.0}{if $school.1 != ''}</a>{/if}</span>
            </li>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-asterisk"></span>申込み期限:
                <span class="text-italic">{if isset($status.enroll_expiration_date)}{$status.enroll_expiration_date|date_format:"%G年%m月%d日"}{/if}</span>
            </li>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-asterisk"></span>申込内容:
                <span class="text-italic">{$school.item}({$school.weeks}Week{if $school.weeks > 1}s{/if})</span>
            </li>
        </ul>

    </div>

    {if $school.5 == 'カナダ'}
        <div class="panel panel-primary col-xs-12 col-md-5" style="padding-left: 0px; padding-right: 0px;" >
            <div class="panel-heading">
                <h4 class="panel-title">カナダワーキングホリデー取得方法</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <a id="canwhdl"><span class="glyphicon glyphicon-download-alt"></span>
                    申請方法をダウンロードする</a>
                </li>
            </ul>

        </div>
    {/if}
    <div class="col-xs-12"><a id="help-application" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a></div>

<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/data/bumdata.json"></script>
<script type="text/javascript" src="themes/data/bummessage.json"></script>
<script>

    var today = new Date();
    var dob = new Date(1970, 0, {$dob|date_format:"%d"});
    dob.setTime(today.getTime() - dob.getTime());
    var age = dob.getUTCFullYear() - {$dob|date_format:"%G"};
    var month = dob.getUTCMonth() - ({$dob|date_format:"%m"} - 1);
    if(month < 0){ //月がマイナスなので年から繰り下げ
        age --;
        month += 12;
       };
    var abroad = '{$abroad}';
    var agree = '{$agree}';

    {literal}
        $("#dob_check").click(function(){
            if (age >= 20) {
                window.open('application/agreement', '_new');
            } else {
                alert('未成年の方は保護者の方の同意が必要となります。詳細は当協会へお問い合わせください。');
            }
        });

        var height = $('#apli-divine').height();
        $('#bum-divine').css('height', height);

        $("#canwhdl").click(function() {
            if (agree === '1') {
                window.open('application/canwhdl', '_new');
            } else {
                alert('詳細情報は約款事項に同意が確認でき次第ご覧いただけます。');
            }
        });

    {/literal}
    bum  = {$bum};
</script>
{include file=$footer}