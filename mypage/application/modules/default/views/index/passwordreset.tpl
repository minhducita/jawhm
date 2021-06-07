<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">パスワードリセット完了</h4>
	</div>
	
	<div class="modal-body">
    	<h1>パスワードのリセットが完了しました。</h1><br />
		ご登録頂いているメールアドレス宛に新しいパスワードを送信しました。<br />
		送信したメールを確認頂き、パスワードの再設定をお願いします。<br/ >
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal" id="reload">ページ更新</button>
	</div>
</div>

<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<SCRIPT language="JavaScript">
<!--
	mnt = 60;
	url = "{$base}/mypage/index/jawhmlogin";
	function jumpPage() {
	  location.href = url;
	}
	setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT>