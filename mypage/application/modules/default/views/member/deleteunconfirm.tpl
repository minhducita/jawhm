<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">メールアドレス削除完了</h4>
    </div>

    <div class="modal-body">
        <h1>メールアドレスの削除が完了しました。</h1><br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">ページ更新</button>
    </div>
</div>

<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<SCRIPT language="JavaScript">
<!--
    mnt = 5;
    url = "{$base}/mypage/member/email";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT>