<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base herf="{$base|escape}">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link href="{$base|escape}/client/themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" type="text/css" href="{$base|escape}/client/themes/css/user.css" media="all" /> 
  <link rel="stylesheet" type="text/css" href="{$base|escape}/client/themes/css/common.css" media="all" /> 
  <title>{$title|escape}</title>
</head>
<body>
	<div id="window-container">
	    <h4 class="modal-title">メンバー情報更新</h4>
   		<div>お客様の情報をご入力ください</div>
		<form id="insert_client" class="form-inline" method="post">
   			<fieldset>
   	     		<div class="form-group">
            		<label class="sr-only" for="email">Email address</label>
                	<input type="text" class="form-control" name="email" sytle="width: 300px;"  placeholder="メールアドレス">
                	<input type="hidden" name="client_id" value="{$client_id}">
                	<input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="firstonly">
                    <button id="client_insert" type="button" class="btn btn-primary">送信</button>
            	</div>
        	</fieldset>
    	</form>
	<div id="emailcheck"></div>
	</div>
<script type="text/javascript" src="{$base}/client/themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{$base}/client/themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{$base}/client/themes/js/common.js"></script>
<script type="text/javascript" src="{$base}/client/themes/js/user.js"></script>
<script type="text/javascript" src="{$base}/client/themes/js/modal.js"></script>
</body>
</html>