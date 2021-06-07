<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:42:00
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76592810155926468b74341-02182802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cfc6ddbe613f1c63f3a547025ebd2971da50f8a' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/email.tpl',
      1 => 1435656569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76592810155926468b74341-02182802',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
    'img3' => 0,
    'img4' => 0,
    'img5' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926468bde1f0_01189534',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926468bde1f0_01189534')) {function content_55926468bde1f0_01189534($_smarty_tpl) {?><div class="text-center">
<h1>メールアドレス変更</h1>
<hr style="border-color:lightblue;">
メールアドレス変更画面でできる事は、メールアドレス新規登録・変更・削除です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
最初にメールアドレスの新規登録は3件まで行え、メールアドレス新規登録をクリックすると以下の画面になります。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
メールアドレスと確認用メールアドレスは同じものを入力してください。<br />
種類については、PCもしくは携帯のアドレスかを選択してください。<<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
送信完了後、入力されたメールアドレスは仮登録状態として上記のような状態になっています<br />
入力されたアドレスに対して本登録確認メールが届きますので、メール本文の登録URLをクリックしていただきますとメールアドレスが本登録されます。<br/>
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img4']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
本登録後は上記の様な表示に変わります。<br />
次に変更のアイコンをクリックすると以下の様な画面が出てきます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img5']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
メール種類、出発前の連絡受け取り、出発後の連絡受け取り、請求書の連絡先として使用するのオプションが選択できますので、<br />
ご自身のメールアドレスの用途に従った内容の登録をお願いします(請求書の連絡先はPC用のアドレスでお願いします)<br />
また、メールアドレスを間違って登録したなどの理由でメールアドレスを削除することもできます(赤いボタン)<br />
リセットは、メールアドレスのオプションの状態をポップアップを開いた時の状態に戻す機能です。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>