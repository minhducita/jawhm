<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">保険契約VISA情報選択(ご実家用)</h4>
    </div>

    <div class="modal-body">
        <h3>保険契約情報選択(ご実家用)</h3>
        {if $insurance_info|@count >= 1}
            <table id="tbl" class="table-center table table-bordered table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>契約種別</th>
                        <th>証券番号</th>
                        <th class="text-center" rowspan="2">選択</th>
                    </tr>
                    <tr>
                        <th>始期日</th>
                        <th>終期日</th>
                    </tr>
                <thead>
                {foreach item=item from=$insurance_info}
                    <tbody>
                        <tr>
                            <td>{if $item.insurance_type != 'null'}{$item.insurance_type}{/if}</td>
                            <td>{$item.policy_number}</td>
                            <td class="text-center" rowspan="2"><input type="radio" name="insurance" value="{$item.branch_no}"></td>
                        </tr>
                        <tr>
                            <td>{$item.insured_date_st|date_format:"%G年%m月%d日"}</td>
                            <td>{$item.insured_date_ed|date_format:"%G年%m月%d日"}</td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>
        {else}
            保険契約情報はありません。<br />
        {/if}

        <h3>VISA情報選択(ご実家用)</h3>
        {if $visa_info|@count >= 1}
            <table class="table-center table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>ビザ種別</th>
                        <th>ビザ発給番号</th>
                        <th class="text-center">選択</th>
                    </tr>
                <thead>
                {foreach item=item from=$visa_info}
                    <tbody id="trno_{$i}"  class="list">
                        <tr>
                            <td>{$item.visa_type}</td>
                            <td>{$item.visa_number}</td>
                            <td class="text-center" rowspan="2"><input type="radio" name="visa" value="{$item.branch_no}"></td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>
        {else}
            ビザ情報はありません。<br />
        {/if}

    </div>

    <div class="modal-footer">
        <button id="make_contact" type="button" class="btn btn-primary">印字</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<script type="text/javascript">
$("#make_contact").click(function() {
    insurance = $('[name=insurance]:checked').val();
    visa = $('[name=visa]:checked').val();

    window.open('{$base}/mypage/schedule/showparents?insurance='+insurance+'&visa='+visa,'_blank');

});
</script>