{include file=$header}
<ol class="breadcrumb">
  <li><a href="{if $client==0}staff/client/clientindex{else}index/index{/if}">メンバー専用ページトップ</a></li>
  <li><a href="{if $client==0}staff/{/if}seminar/index">セミナー予約確認</a></li>
  <li>ワーホリセミナー</li>
</ol>

<div class="contents-wrapper">
    <h2>ワーホリセミナー</h2>
    {if $status === 'live'}<a href="{$ust_url}" target="_blank"><img src="{$base}/mypage/themes/images/onair.png" alt="放送中"></a>{else}<img src="{$base}/mypage/themes/images/offair.png" alt="オフライン">{/if}<br />
    {if $status === 'live'}<a href="{$ust_url}" target="_blank">{/if}<img src="https://www.jawhm.or.jp/css/images/camera.png" alt="カメラ">{if $status === 'live'}</a>{/if}
</div>

{if $seminar|@count > 0}
    {$seminar|@count} 件のセミナーがあります。<br />
    {$i = 0}
    {foreach item=item from=$seminar}
        <div id="seminar-size2_{$i}" class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading list-header">
                <div class="panel-title">
                    <span class="col-xs-11 kill-grid seminar-header"><span class="text-bold text-italic">開催日時: {$item.starttime}～</span></span>
                    <span class="col-xs-1 kill-grid pull-right clickable" id="seminar_detail{$item.id}" name="{$item.id}"><span class="glyphicon glyphicon-list-alt"></span></span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="col-xs-12 kill-grid inc-title">
                        <span class="col-xs-12 col-md-4 kill-grid list-title-centering">{if $smp == 1}オンライン{/if}中継予定セミナー名:</span>
                        <span class="col-xs-12 col-md-8 kill-grid list-title-centering">{$item.k_title1}</span>
                    </div>
                </li>
            </ul>
        </div>
        {$i = $i + 1}
    {/foreach}
    <a id="stopAlert" class="col-xs-12"><span class="glyphicon glyphicon-pause" style="font-size:20px;"></span>アラートを止める</a><br />
    <a id="stopMusic" class="col-xs-12"><span class="glyphicon glyphicon-pause" style="font-size:20px;"></span>音楽を止める</a>
{else}
    現在、オンラインセミナー情報はありません。
{/if}
<audio id="live" preload="auto">
    <source src="{$base}/mypage/themes/sounds/seminar_onair.mp3" type="audio/mp3"></source>
    <p>※ご利用のブラウザでは再生することができません。</p>
</audio>

<audio id="time" preload="auto" loop>
    <source src="{$base}/mypage/themes/sounds/time2seminar.wav" type="audio/wav"></source>
    <p>※ご利用のブラウザでは再生することができません。</p>
</audio>

<script>
    status = '{$status}';
    start_time = '{$item.starttime}';
    seminar = new Array();
    var $i = 0;
    {foreach item=item from=$seminar}
        seminar[$i] = '{$item.starttime}';
        $i++;
    {/foreach}

    mnt = 60;
    function jumpPage() {
        location.reload();
    }
    setTimeout("jumpPage()",mnt*1000);
</script>

{include file=$footer}