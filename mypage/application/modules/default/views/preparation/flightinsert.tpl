<div class="modal-content window-container">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">フライト情報登録</h4>
	</div>
		
	<div class="modal-body">
	    <form id="flight-insert" method="post">
	        <fieldset>
				<div class="form-group">
                    <label for="flight_number" class="col-sm-4 control-label">フライト番号</label>
                    <div class="col-sm-8">
                    	<input class="form-control" type="text" name="flight_number" size="20" autofocus>
					</div>
				</div>
						
				<div class="form-group">
                   	<label for="departure_place" class="col-sm-4 control-label">出発地</label>
                   	<div class="col-sm-8">
             	      <input class="form-control" type="text" name="departure_place" size="20">
					</div>
				</div>
				
				<div class="form-group">
                   	<label for="departure_time" class="col-sm-4 control-label input-append date">出発日時</label>
                   	<div class="col-sm-8">
             	    <input id="departure_time" class="form-control input-append date" type="text" name="departure_time" size="20" data-format="MM/dd/yyyy HH:mm:ss">
	             	    <span class="add-on">
	        				<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
	      				</span>
					</div>
				</div>
				
				<div class="form-group">
                   	<label for="destination_place" class="col-sm-4 control-label">到着地</label>
                   	<div class="col-sm-8">
             	      <input class="form-control" type="text" name="destination_place" size="20">
					</div>
				</div>
				
				<div class="form-group">
                   	<label for="destination_time" class="col-sm-4 control-label">到着日時</label>
                   	<div class="col-sm-8">
             	    	<input id="destination_time" class="form-control datepicker" type="text" name="destination_time" size="20" data-format="MM/dd/yyyy HH:mm:ss">
             	    	<span class="add-on">
	        				<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
	      				</span>
					</div>
				</div>
				
				<div class="form-group">
                  	<div class="pull-right col-sm-2">
                  		<input type="reset" class="btn btn-warning" value="リセット">
                  	</div>
				</div>
               	<input type="hidden" name="token" value="{$token}">
				<input type="hidden" name="action_tag" value="flightinsert">
        	</fieldset>
	    </form>
    </div>
	    
	<div class="modal-footer">
		<button id="flight_insert" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/bootstrap-datetimepicker.ja.js"></script>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<script language="JavaScript">
<!--
	$("#departure_time").datetimepicker({
		language: 'ja',
		format: 'yyyy/MM/dd hh:mm:ss',
		pickTime: true
	});
	
	$("#destination_time").datetimepicker({
		language: 'ja',
		format: 'yyyy/MM/dd hh:mm:ss',
		pickTime: false
	});