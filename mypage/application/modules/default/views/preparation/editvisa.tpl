<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">ビザ情報変更完了</h4>
    </div>

    <div class="modal-body">
        <h1>ビザ情報の更新が完了しました。</h1><br />
        ご登録頂いた内容を保存しました。<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">ページ更新</button>
    </div>
</div>

<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<script>
<!--
    mnt = 5;
    url = "{$base}/mypage/preparation/visalist";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</script>