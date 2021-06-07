<div class="modal-content window-container">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">メールアドレス情報編集</h4>
	</div>
	<div class="modal-body">
	    <form id="edit-email" method="post">
	        <fieldset>
				<div class="form-group">
                   	<label for="email_type" class="col-sm-5 control-label radio-inline">メール種類</label>
                   	<div class="col-sm-7">
	                   	<label class="radio-inline">
							<input type="radio" name="email_type" value="ＰＣ" {if $sqlserver.0 == 'ＰＣ'}checked{/if}>  ＰＣ　　
						</label>
						<label class="radio-inline">
							<input type="radio" name="email_type" value="携帯" {if $sqlserver.0 == '携帯'}checked{/if}> 携帯
						</label>
					</div>
				</div>
					
				<div class="form-group">
                   	<label for="email_type" class="col-sm-5 control-label radio-inline">出発前連絡</label>
                   	<div class="col-sm-7">
	                   	<label class="radio-inline">
							<input type="radio" name="pre_departure" value="1" {if $sqlserver.1 == 1}checked{/if}> 受け取る 
						</label>
						<label class="radio-inline">
							<input type="radio" name="pre_departure" value="0" {if $sqlserver.1 == 0}checked{/if}> 受け取らない
						</label>
					</div>
				</div>
				
				<div class="form-group">
                   	<label for="email_type" class="col-sm-5 control-label radio-inline">出発後連絡</label>
                   	<div class="col-sm-7">
	                   	<label class="radio-inline">
							<input type="radio" name="post_departure" value="1" {if $sqlserver.2 == 1}checked{/if}> 受け取る 
						</label>
						<label class="radio-inline">
							<input type="radio" name="post_departure" value="0" {if $sqlserver.2 == 0}checked{/if}> 受け取らない
						</label>
					</div>
				</div>
				
				<div class="form-group">
                   	<label for="email_type" class="col-sm-5 control-label radio-inline">請求書連絡</label>
                   	<div class="col-sm-7">
	                   	<label class="radio-inline">
							<input type="radio" name="bill" value="1" {if $sqlserver.3 == 1}checked{/if}> 受け取る 
						</label>
						<label class="radio-inline">
							<input type="radio" name="bill" value="0" {if $sqlserver.3 == 0}checked{/if}> 受け取らない
						</label>
					</div>
				</div>
				
				<div class="form-inline">
                	<button id="delete_email_{$email_id}_{$id}" type="button" class="btn btn-danger {if $smp == false}delbtn-centering{/if}">メールアドレス削除</button>
                  	<input type="reset" class="btn btn-warning pull-right {if $smp == false}rstbtn-toppad{/if}" value="リセット">
				</div>
				
               	<input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="editemail">
				<input type="hidden" name="id" value="{$id}">
        	</fieldset>
	    </form>
    </div>
	    
	<div class="modal-footer">
		<button id="email_status" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>