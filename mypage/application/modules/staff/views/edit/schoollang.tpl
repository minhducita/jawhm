{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="staff/index/index">スタップトップページ</a></li>
  <li><a href="staff/index/manage">管理項目</a></li>
  <li>言語修正</li>
</ol>

<div class="contents-wrapper">
    <h2>言語修正</h2>
</div>

<div id="data-container">
    <form id="lang-search" method="post">
        <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
                <select class="form-control" name="language">
                    {foreach item=item from=$langs}
                        <option {if isset($previous.language)}{if $previous.language==$item.language} selected{/if}{/if}>{$item.language}</option>
                    {/foreach}
                </select>
            </div>

            <div class="col-xs-5">
                <div class="form-group">
                    <div class="col-xs-12 combo_wrapper">
                        <button type="button" class="btn combo_arrow">▼</button>
                        <select id="combo_select" class="form-control input-block-level combo_select" name="mypage_screen_name_select">
                            {foreach item=item from=$screen}
                                <option>{$item.mypage_screen_name}</option>
                            {/foreach}
                        </select>
                        <div class="combo_div">
                            <input class="input-block-level combo_text form-control input-group" type="text" name="mypage_screen_name" placeholder="画面名選択(入力)" {if isset($previous.screen_name)}value="{$previous.screen_name}"{/if}>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-1">
                <button id="lang_search" class="btn btn-primary">検索</button>
            </div>

            <div class="col-xs-1">
                <button id="lang_reset" class="btn btn-warning">リセット</button>
            </div>

        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>画面名</th>
                <th>message</th>
                <th class="editable text-center">編集</th>
            </tr>
        <thead>

        <tbody>
        {$i = 1}
        {foreach item=item from=$items}
            <tr class="table-custom-striped table-custom-hover">
                <td>{$item.message_screen_id}</td>
                <td>{$item.mypage_screen_name}</td>
                <td>{$item.message}</td>
                <td class="editable text-center"><span id="langedit_{$item.mypage_message_id}" class="glyphicon glyphicon-edit clickable"></span></td>
            </tr>
            {$i = $i + 1}
        {/foreach}
        </tbody>
    </table>
</div>
<br />

<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script>
    $('#combo_select').change(function(){
        $('[name=mypage_screen_name]').val($(".combo_select option:selected").val());
    });
</script>
{include file=$footer}