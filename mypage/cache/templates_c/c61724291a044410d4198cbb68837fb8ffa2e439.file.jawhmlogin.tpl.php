<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:13:00
         compiled from "/var/www/html/mypage/application/modules/default/views/index/jawhmlogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5694484715554671c8fea08-40538147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c61724291a044410d4198cbb68837fb8ffa2e439' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/jawhmlogin.tpl',
      1 => 1419238783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5694484715554671c8fea08-40538147',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'base' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5554671c96f806_98959948',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554671c96f806_98959948')) {function content_5554671c96f806_98959948($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div style="max-width: 360px; margin-left: auto; margin-right:auto">
        <div id="intro">
            <div style="padding:10px;">
                <div style="margin-top:50px; margin-bottom:50px; text-align: center;">
                    <img src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/images/JAWHMLogo.jpg" width="268" height="78" alt="JAWHMロゴ" />
                </div>
                <div id="jawhmauth">
                    <form id="login-jawhm" method="post">
                        <fieldset>
                            <div id="jawhmbanner" style="margin-bottom:20px">
                                メンバー専用ページにログインします。<br />
                                ご登録頂いた、メールアドレスとパスワードでログインしてください。
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">メールアドレス</label>
                                <input class="form-control" type="email" name="email" placeholder="メールアドレス">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="password">パスワード</label>
                                <input type="password" class="form-control" name="password" placeholder="パスワード">
                            </div>
                            <input type="hidden" name="url" value="jawhmauth">
                            <button type="button" id="jawhm_login" class="btn btn-default pull-right">ログイン</button>
                        </fieldset>
                    </form>
                    <div class="div-padding">
                        <a data-toggle="collapse" data-parent="#accordion" href="#forget">ログインできない方</a>
                        <div id="forget" class="panel-collapse collapse">
                            <div class="panel-body">
                                <button id="forget_password" type="button" class="btn btn-warning" style="width:150px; ">パスワード忘れ</button><br />
                                <button id="forget_email" type="button" class="btn btn-warning" style="width:150px; ">メールアドレス忘れ</button><br />
                                <button id="forget_payment" type="button" class="btn btn-warning" style="width:150px; ">登録料未払</button><br />
                                <button id="forget_other" type="button" class="btn btn-warning" style="width:150px; ">その他</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>