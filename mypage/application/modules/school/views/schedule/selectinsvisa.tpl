<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{$msg[0].message}</h4>
    </div>

    <div class="modal-body">
        <h3>{$msg[1].message}</h3>
        {if $insurance_info|@count >= 1}
            <table id="tbl" class="table-center table table-bordered table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>{$msg[2].message}</th>
                        <th>{$msg[3].message}</th>
                        <th class="text-center" rowspan="2">{$msg[6].message}</th>
                    </tr>
                    <tr>
                        <th>{$msg[4].message}</th>
                        <th>{$msg[5].message}</th>
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
                            <td>{$item.insured_date_st|date_format:"%G{$head_msg[0].meassage}%m{$head_msg[1].meassage}%d{$head_msg[2].meassage}"}</td>
                            <td>{$item.insured_date_ed|date_format:"%G{$head_msg[0].meassage}%m{$head_msg[1].meassage}%d{$head_msg[2].meassage}"}</td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>
        {else}
            {$msg[14].message}<br />
        {/if}

        <h3>{$msg[7].message}</h3>
        {if $visa_info|@count >= 1}
            <table class="table-center table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>{$msg[8].message}</th>
                        <th>{$msg[9].message}</th>
                        <th class="text-center">{$msg[10].message}</th>
                    </tr>
                <thead>
                {foreach item=item from=$visa_info}
                    <tbody>
                        <tr>
                            <td>{$item.visa_type}</td>
                            <td>{$item.visa_number}</td>
                            <td class="text-center" rowspan="2"><input type="radio" name="visa" value="{$item.branch_no}"></td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>
        {else}
            {$msg[15].message}<br />
        {/if}

    </div>

    <div class="modal-footer">
        <button id="make_contact" type="button" class="btn btn-primary">{$msg[11].message}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">{$msg[12].message}</button>
    </div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<script type="text/javascript">
var country = '{$country}';
$("#make_contact").click(function() {
    insurance = $('[name=insurance]:checked').val();
    visa = $('[name=visa]:checked').val();

    window.open('{$base}/mypage/school/schedule/showcontact?insurance='+insurance+'&visa='+visa+'&country='+country,'_blank');

});
</script>