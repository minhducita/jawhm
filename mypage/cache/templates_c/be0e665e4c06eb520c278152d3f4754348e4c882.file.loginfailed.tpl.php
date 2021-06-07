<?php /* Smarty version Smarty-3.1.13, created on 2015-06-02 16:09:14
         compiled from "/var/www/html/mypage/application/modules/error/views/index/loginfailed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1420176607556d569a96d2d4-32344407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be0e665e4c06eb520c278152d3f4754348e4c882' => 
    array (
      0 => '/var/www/html/mypage/application/modules/error/views/index/loginfailed.tpl',
      1 => 1419238895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1420176607556d569a96d2d4-32344407',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556d569aa979e6_34063941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556d569aa979e6_34063941')) {function content_556d569aa979e6_34063941($_smarty_tpl) {?>    <div class="result-container">
        <span class="text-red"><h3>ログインに失敗しました。</h3></span><br />
        入力されたメールアドレスかパスワードに誤りがあります。<br />
        <a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/index/jawhmlogin">ログイン画面へ戻る</a>
    </div>

<script>
loadingView(false);
</script>
<?php }} ?>