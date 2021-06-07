<div id="editflight" class="page-content">
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0; margin-left:50px;">
        <a href="plan/index" class="btn btn-primary">前の画面に戻る</a>
    </div>

    <div class="page-header">
        <h1>
            フライト情報見積依頼一覧
            <small>
                <i class="icon-double-angle-right"></i>
                お客様にご入力頂いたフライト情報見積依頼の履歴です。
            </small>
        </h1>
    </div>

    {foreach item=item from=$items}
         <div class="panel panel-primary col-xs-12 col-md-6" style="padding-left: 0px; padding-right: 0px;">
            <div class="panel-heading list-header">
                <div class="panel-title">
                    <span class="col-xs-3 kill-grid seminar-header seminar-title">依頼日時</span>
                    <span class="col-xs-6 seminar-header seminar-title">
                        {$item.updated_on|date_format:"%G/%m/%d"}
                    </span>
                    <a id="edit_inquiry_{$item.mypage_flight_inquiry_id}"><span class="pull-right"><i class="icon-pencil"></i><span class="white-space">編集</span></span></a>
                </div>
            </div>

            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">名前</span>
                        <span class="col-xs-9 list-title-centering">{$item.name_jp}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">英語名</span>
                        <span class="col-xs-9 list-title-centering">{$item.name_en}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">電話番号</span>
                        <span class="col-xs-9 list-title-centering">{$item.tel}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">Email</span>
                        <span class="col-xs-9 list-title-centering">{$item.email}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">渡航予定日</span>
                        <span class="col-xs-9 list-title-centering">{$item.flight_date}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">出発地</span>
                        <span class="col-xs-9 list-title-centering">{$item.departure_place}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">到着地</span>
                        <span class="col-xs-9 list-title-centering">{$item.destination_place}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">片道往復</span>
                        <span class="col-xs-9 list-title-centering">{if $item.ticket_request == 1}片道{else}往復{/if}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">プラン</span>
                        <span class="col-xs-9 list-title-centering">{if $item.plan_request == 1}安さ重視{else if $item.plan_request == 2}直行便希望{else}両方{/if}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">ビザ</span>
                        <span class="col-xs-9 list-title-centering">{if $item.visa_type == 1}ワーキングホリデー{else if $item.visa_type == 2}学生{else}観光{/if}</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">渡航年齢</span>
                        <span class="col-xs-9 list-title-centering">{$item.age}</span>
                    </li>
                </ul>
            </div>
        </div>
    {/foreach}
</div>