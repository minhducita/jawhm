<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">フライト見積問合せ</h4>
    </div>

    <div class="modal-body">
        <form id="inquiry-complete" method="post">
            <fieldset>
                <h3>本人情報</h3>
                <div class="form-group col-xs-12">
                    <label for="name_jp" class="col-sm-4 control-label">お名前(日本語)</label>
                    <div class="col-sm-8">
                        {$item.name_jp}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                   <label for="name_en" class="col-sm-4 control-label">お名前(英語)</label>
                   <div class="col-sm-8">
                       {$item.name_en}
                       <div class="help-block">※パスポートのスペルとよく確認してください。</div>
                    </div>
                </div>

                <div class="form-group col-xs-12">
                   <label for="tel" class="col-sm-4 control-label">携帯電話番号</label>
                   <div class="col-sm-8">
                       {$item.tel}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="email" class="col-sm-4 control-label">PCメールアドレス</label>
                    <div class="col-sm-8">
                        {$item.email}
                    </div>
                </div>

                <h3>渡航先</h3>

                <div class="form-group col-xs-12">
                    <label for="email" class="col-xs-4 control-label">渡航予定日</label>
                    <div class="col-xs-8">
                        {$item.flight_date}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="departure_place" class="col-sm-4 control-label">出発地情報</label>
                    <div class="col-sm-8">
                       {$item.departure_place}
                    </div>
                </div>


                <div class="form-group col-xs-12">
                    <label for="destination_place" class="col-sm-4 control-label">到着地情報</label>
                    <div class="col-sm-8">
                       {$item.destination_place}
                    </div>
                </div>

                    <div class="form-group col-xs-12">
                    <label for="ticket_request" class="col-sm-4 control-label">片道・往復リクエスト</label>
                    <div class="col-sm-8">
                        {if $item.ticket_request == 1}片道{/if}
                        {if $item.ticket_request == 2}往復{/if}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="plan_request" class="col-sm-4 control-label">プランリクエスト</label>
                    <div class="col-sm-8">
                        {if $item.plan_request == 1 || !isset($item.plan_request)}安さ重視{/if}
                        {if $item.plan_request == 2}直行便希望{/if}
                        {if $item.plan_request == 3}両方{/if}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="visa_type" class="col-sm-4 control-label">ビザタイプ</label>
                    <div class="col-sm-8">
                        {if $item.visa_type == 1}ワーキングホリデービザ{/if}
                        {if $item.visa_type == 2}学生ビザ{/if}
                        {if $item.visa_type == 3}観光ビザ{/if}
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="age" class="col-sm-4 control-label">渡航時の年齢</label>
                    <div class="col-sm-8">
                        {$item.age}
                    </div>
                </div>

                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="inquiry-complete">

            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <span class="text-red">日付や到着地等お間違えやすいです<br />
        確認の上こちらの内容で送信願います</span><br />

        <button type="button" id="inquiry_amend" class="btn btn-danger" style="padding: 10px;"><span class="text-bold">修正</span></button>
        <button type="button" id="inquiry_complete" class="btn btn-primary" style="padding: 10px;"><span class="text-bold">送信する</span></button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>