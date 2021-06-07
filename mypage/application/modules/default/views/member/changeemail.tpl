<div class="modal-content window-container">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">メールアドレス登録</h4>
	</div>
		
	<div class="modal-body">
	    <form id="edit-email" method="post">
	        <fieldset>
				<div class="form-group">
                    <label for="email" class="col-sm-4 control-label">メールアドレス</label>
                    <div class="col-sm-8">
                    	<input class="form-control" type="email" name="change_email" size="20" value="{$email}" autofocus >
					</div>
				</div>
						
				<div class="form-group">
                   	<label for="retype" class="col-sm-4 control-label">確認用メールアドレス</label>
                   	<div class="col-sm-8">
             	      <input class="form-control" type="email" name="retype" size="20">
					</div>
				</div>
					
				<div class="form-group">
                   	<label for="email_type" class="col-sm-4 control-label">種類</label>
                   	<div class="col-sm-8">
	                   	<select class="form-control" name="email_type">
							<option value="0">PC</option>
							<option value="1">携帯</option>
						</select> 
					</div>
				</div>
				
				<div class="form-group">          	
                  	<div class="pull-right col-sm-2">
                  		<input type="reset" class="btn btn-warning" value="リセット">
                  	</div>
				</div>
				
               	<input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="editemail">
				<input type="hidden" name="originai_email" value="{$email}">
        	</fieldset>
	    </form>
    </div>
	    
	<div class="modal-footer">
		<button id="email_update" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>