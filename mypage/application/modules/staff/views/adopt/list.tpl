{$i=1}
{if $items|@count >= 1}
    <div id="fixinsurance">
        <form id="insurance-edit" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th id="sort_status_insurance0" abbr="policy_number" name="{$sortkey0}">証券番号<img id="status0" class="icon" src="{$order0}"></th>
                        <th id="sort_status_insurance1" abbr="agency_name" name="{$sortkey1}">代理店名<img id="status1" class="icon" src="{$order1}"></th>
                        <th id="sort_status_insurance2" abbr="policy_owner" name="{$sortkey2}">契約者名<img id="status2" class="icon" src="{$order2}"></th>
                        <th id="sort_status_insurance3" abbr="error_message" name="{$sortkey3}">エラーメッセージ<img id="status3" class="icon" src="{$order3}"></th>
                        <th>削除</th>
                    </tr>
                <thead>
            {foreach item=item from=$items}
                <tbody class="table-custom-striped table-custom-hover">
                    <tr>
                        <td class="text-middle" rowspan="2">{$i}</td>
                        <td>{$item.policy_number}</td>
                        <td>{if $item.agency_code == 'YD-186'}協会（東京）{else if $item.agency_code == 'YD-187'}協会（大阪）{else if $item.agency_code == 'YD-188'}協会（福岡）{else if $item.agency_code == 'YD-189'}協会（名古屋）{else if $item.agency_code == 'YD-18A'}協会（沖縄）{else}協会（東京）{/if}</td>
                        <td>{$item.policy_owner}</td>
                        <td>{$item.error_message}</td>
                        <td class="text-middle" rowspan="2"><input type="checkbox" name="delete_{$item.policy_number}"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="client_no_{$item.policy_number}" placeholder="お客様番号入力" {if $item.client_no != 'null'}value="{$item.client_no}"{/if}></td>
                        <td><input type="text" class="form-control" name="abroad_no_{$item.policy_number}" placeholder="留学番号入力" {if $item.study_abroad_no != 'null'}value="{$item.study_abroad_no}"{/if}></td>
                        <td colspan="2"><input type="text" class="form-control" name="error_comment_{$item.policy_number}" placeholder="コメント入力" {if $item.error_comment != 'null'}value="{$item.error_comment}"{/if}></td>
                    </tr>
                </tbody>
                {$i = $i + 1}
            {/foreach}
            </table>
            <button id="submit_insurance" type="button" class="btn btn-primary pull-right">送信</button>
        </form>
        <div style="margin-bottom: 120px;"></div>
    </div>
{else}
    現在、保険情報のエラーはありません。
{/if}

<script type="text/javascript" src="themes/js/append.js"></script>
<script>
loadingView(false);
</script>