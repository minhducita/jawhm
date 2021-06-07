<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">個別カウンセリング予約送信完了</h4>
    </div>

    <div class="modal-body">
        <h1>お客様のご希望の日程を承りました。</h1><br />
        内容につきましては活動内容をご覧ください。<br />
        日程が確定しましたらマイページの次回ご来店予定が更新されますのでご確認をお願いします。<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">ページ更新</button>
    </div>
</div>

<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<script>
<!--
    mnt = 5;
    url = "{$base}/mypage/";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</script>