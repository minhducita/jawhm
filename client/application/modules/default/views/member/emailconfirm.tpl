<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">メールアドレス仮登録完了</h4>
	</div>
	
	<div class="modal-body">
    	<h1>メールアドレスの仮登録が完了しました。</h1><br />
		ご登録頂いた内容のメールアドレス宛に確認メールを送信しました。<br />
		<span class="text-red">確認メールの承認URLにアクセスするまで変更内容は登録されません。</span><br />
		確認が取れ次第内容を登録致します。<br/ >
    	<a href="{$base}/client/member/index">トップページへ</a>
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">ページ更新</button>
	</div>
</div>

<script type="text/javascript" src="{$base}/client/themes/js/modal.js"></script>
<SCRIPT language="JavaScript">
<!--
	mnt = 60;
	url = "{$base|escape}/client/member/index";
	function jumpPage() {
	  location.href = url;
	}
	setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT>