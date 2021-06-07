<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:10:41
         compiled from "/var/www/html/mypage/application/modules/default/views/application/passport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:880414416556438919bae18-46153958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd5aa485f061d85f86808ada8d7e4d61983e410d' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/application/passport.tpl',
      1 => 1432631324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '880414416556438919bae18-46153958',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'flag' => 0,
    'branch_no' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55643891a27d96_55924997',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55643891a27d96_55924997')) {function content_55643891a27d96_55924997($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">パスポート閲覧</h4>
        お客様のパスポートのアップロードと確認が行えます。
    </div>
    <div class="modal-body">
        <?php if ($_smarty_tpl->tpl_vars['flag']->value['passport_flag']==1){?>
            <h3><a href="application/getfile?file_no=4&branch_no=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['branch_no']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank">パスポート確認</a></h3>
        <?php }?>

        <div class="form-container">
            <form method="post" enctype="multipart/form-data" id="passport_upload">
                <div class="form-item">
                    <label>ファイル</label> <input id="file-input" type="file" name="_file"><br />
                </div>

                <div class="help-block">写真を撮る/アップロードする際に反射光が入っていないことを確認してください。</div>

                <div class="form-controller">
                    <button id="pass_upload" class="btn btn-primary">送信</button>
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
    $('#pass_upload').prop('disabled', true);
    $("#file-input").change(function(){
        inputCheck("pass_upload");
    });
</script><?php }} ?>