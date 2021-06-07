<?php /* Smarty version Smarty-3.1.13, created on 2015-05-15 13:51:48
         compiled from "/var/www/html/mypage/application/modules/default/views/index/forgetloginemail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8570503255557b64c504e8-84422146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea3cb096b562b984f52a1aa53bbdcd4a86521786' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/forgetloginemail.tpl',
      1 => 1419238782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8570503255557b64c504e8-84422146',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55557b64cbda26_70729994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55557b64cbda26_70729994')) {function content_55557b64cbda26_70729994($_smarty_tpl) {?><div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">ログイン時のメールアドレスをお忘れの方</h4>
    </div>

    <div class="modal-body">
        ご登録頂いたメールアドレスが解らない場合は、お手数ですが以下の内容を <a href="mailto:toiawase@jawhm.or.jp">toiawase@jawhm.or.jp</a> までご連絡ください。<br />
        <br />
        <ul>
            <li>件名：【ログインメールアドレス問い合わせ】</li><br />
            <li class="asta">お名前</li>
            <li class="asta">会員番号</li>
            <li class="asta">生年月日</li>
            <li class="asta">ご登録頂いた電話番号</li>
        </ul>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div><?php }} ?>