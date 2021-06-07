<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:15:32
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/imageupload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159571717555643963bb58f2-35801578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13280d5e15ba9d5fdcb907e49b21b11f5b786c92' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/imageupload.tpl',
      1 => 1432631723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159571717555643963bb58f2-35801578',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55643963c26033_41089836',
  'variables' => 
  array (
    'token' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55643963c26033_41089836')) {function content_55643963c26033_41089836($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">フライト画像アップロード</h4>
        お客様のフライト情報を確認できる画像のアップロードを行います。<br />
        プレビューは元のページで確認できるようになります。
    </div>
    <div class="modal-body">

        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="flight-upload">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="help-block">写真を撮る/アップロードする際に反射光が入っていないことを確認してください。</div>

                <div class="form-controller">
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    <input type="hidden" name="action_tag" value="flight-image">
                    <input id="flight_upload" type="button" class='btn btn-primary' name="_submit" value="送信" disabled="disabled">
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/common.js"></script>
<script type="text/javascript" src="themes/js/modal.js"></script>

<script>
    $("#survey-input").change(function(){
        inputCheck("survey_upload");
    });
</script><?php }} ?>