<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">ログイン用メールアドレス変更確認</h4>
	</div>
	
	<div class="modal-body">
		本当に変更してよろしいですか?<br />
		次回ログイン時以降、このアドレスがログイン用のメールアドレスとなります。<br />
		<form id="edit-email" method="post">
			<fieldset>
		        <input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="changekey">
				<input type="hidden" name="email_id" value="{$email_id}">
        	</fieldset>
	    </form>
	</div>
	
	<div class="modal-footer">
		<button id="change_ok" type="button" class="btn btn-danger">はい</button> 
		<button type="button" class="btn btn-success" data-dismiss="modal">いいえ</button>
	</div>
</div>
<script type="text/javascript" src="{$base}/client/themes/js/modal.js"></script>