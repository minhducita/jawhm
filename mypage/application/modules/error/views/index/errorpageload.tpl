{include file=$header}
<div class="result-container">
    <h1 class="text-red">不正な処理が行われました。</h1><br />
    <p>お手数ですが、前のページから再度操作をお願いします。</p><br />
</div>
<div class="page-footer">
    <button type="button" class="btn btn-default" onClick="page_back()">戻る</button>
</div>

<script>
<!--
    loadingView(false);
    function page_back() {
        window.history.back(-1);
        return false;
    }
//-->
</script>
{include file=$footer}