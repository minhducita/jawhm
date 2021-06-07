<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">仮登録メールアドレス削除確認</h4>
	</div>
	
	<div class="modal-body">
		本当に仮登録中のメールアドレスを削除してよろしいですか?<br />
		<form id="edit-email" method="post">
			<fieldset>
		        <input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="delemail">
				<input type="hidden" name="id" value="{$email_id}">
        	</fieldset>
	    </form>
	</div>
	
	<div class="modal-footer">
		<button id="delete_ok" type="button" class="btn btn-danger">はい</button> 
		<button type="button" class="btn btn-success" data-dismiss="modal">いいえ</button>
	</div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>