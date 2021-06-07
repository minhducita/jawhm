<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">削除完了</h4>
    </div>

    <div class="modal-body">
        <h1>画像の削除が完了しました。</h1><br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">フライト一覧へ戻る</button>
    </div>
</div>

<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<script>
<!--
    mnt = 5;
    url = "{$base}/mypage/preparation/flightlist";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000);
//-->
</script>