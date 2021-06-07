<div class="modal-content window-container">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">仮登録メールアドレス削除</h4>
	</div>
		
	<div class="modal-body">
	    <form id="delete-email" method="post">
	        <fieldset>
				<div class="form-group">
                    <label for="email" class="col-sm-4 control-label">メールアドレス</label>
                    <div class="col-sm-8">
                    	<input id="text" class="form-control" type="email" name="target_email" size="20" autofocus >
                    	<div id="suggest"></div>
					</div>
				</div>
						
				<div class="form-group">
                  	<div class="pull-right col-sm-2">
                  		<input type="reset" class="btn btn-warning" value="リセット">
                  	</div>
				</div>
               	<input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="delemail">
        	</fieldset>
	    </form>
    </div>
	    
	<div class="modal-footer">
		<button id="email_delete" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="{$base}/client/themes/js/modal.js"></script>
<script type="text/javascript" src="{$base}/client/themes/js/suggest.js"></script>
<script type="text/javascript" language="javascript">

{literal}
    <!--
	$(function(){
   		new Suggest.Local(
      		"text",
      		"suggest",
      		[],
      		{
	        	highlight: true,
	        	hookBeforeSearch: function(text) {
	        		var self = this;
	         		$.post("http://192.168.11.137/client/member/suggestion",
	            		{inp:text},
	            		function(data, status){
	               			if(status == 'success' && data){
	                  			self.clearSuggestArea();
	                  			self.candidateList = eval(data);
	                  			var resultList = self._search(text);
	                  			if (resultList.length != 0){
	                    	 		self.createSuggestArea(resultList);
	                  			}  
	                  			return false;
	               			}
	            		}
	         		);
        		}
      		}
		);
	});
    //-->
{/literal}
</script>