<?php /* Smarty version Smarty-3.1.13, created on 2015-05-15 13:51:43
         compiled from "/var/www/html/mypage/application/modules/default/views/index/forgetpassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35346161355557b5f0caf48-39801456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd859272641d84634e4575f79c5f4a89366b9303' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/forgetpassword.tpl',
      1 => 1419238783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35346161355557b5f0caf48-39801456',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55557b5f1edc31_21878761',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55557b5f1edc31_21878761')) {function content_55557b5f1edc31_21878761($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">パスワード変更</h4>
    </div>

    <div class="modal-body">
        パスワードを忘れてしまった場合は、以下のフォームに、<br />
        登録時のメールアドレスと会員番号を入力してください。<br />
        ご登録頂いたメールアドレスに新しいパスワードをお送りいたします。<br />
         <br />
        協会オフィスにてメンバー登録された方で、パスワードが判らない場合も、<br />
        こちらから新しいパスワードを設定してください。<br />
        <form id="reset-password" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">メールアドレス</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="email" name="email_reset" size="20" value="" autofocus >
                    </div>
                </div>

                <div class="form-group">
                       <label for="id" class="col-sm-4 control-label">会員番号</label>
                       <div class="col-sm-8">
                       <input class="form-control" type="email" name="id" size="20">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>

                   <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="action_tag" value="forgetpassword">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="password_reset" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script><?php }} ?>