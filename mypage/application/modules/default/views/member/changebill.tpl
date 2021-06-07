<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">請求連絡変更確認</h4>
	</div>
	
	<div class="modal-body">
		本当に請求連絡{$bill_jpn}よろしいですか?<br />
		<form id="edit-email" method="post">
			<fieldset>
		        <input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="changebill">
				<input type="hidden" name="id" value="{$id}">
				<input type="hidden" name="bill" value="{$bill}">
        	</fieldset>
	    </form>
	</div>
	
	<div class="modal-footer">
		<button id="change_bill_ok" type="button" class="btn btn-danger">はい</button> 
		<button type="button" class="btn btn-success" data-dismiss="modal">いいえ</button>
	</div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>