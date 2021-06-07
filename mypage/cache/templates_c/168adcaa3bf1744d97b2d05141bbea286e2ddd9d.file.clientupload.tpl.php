<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:28:49
         compiled from "/var/www/html/mypage/application/modules/staff/views/file/clientupload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95145634455643b570b2f57-13875559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '168adcaa3bf1744d97b2d05141bbea286e2ddd9d' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/file/clientupload.tpl',
      1 => 1432632526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95145634455643b570b2f57-13875559',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55643b57124fc9_74911757',
  'variables' => 
  array (
    'token' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55643b57124fc9_74911757')) {function content_55643b57124fc9_74911757($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">お客様宛てファイルアップロード</h4>
        アプリケーションフォームの送信はこちらからお願いします。<br />
        ファイル名の規則は以下の通りに従ってください。<br />
        PGIC Application form.pdf
    </div>
    <div class="modal-body">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="fileinput">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="form-item">
                    <select class="form-control" name="attach_class">
                        <option value="23">LoA</option>
                        <option value="24">CoE</option>
                        <option value="25">HS情報</option>
                        <option value="26">PIC情報</option>
                        <option value="96">願書</option>
                        <option value="98">ホームステイ申込書</option>
                    </select>
                </div>

                <div class="form-controller">
                    <button id="upload_client" type="button" class='btn btn-primary' name="_submit">送信</button>
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    <input type="hidden" name="action_tag" value="fileupload">
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/common.js"></script>
<script type="text/javascript" src="themes/js/modal.js"></script>

<script>
    $("#file-input").on('change', function(){
        inputCheck("upload_file");
    });
</script><?php }} ?>