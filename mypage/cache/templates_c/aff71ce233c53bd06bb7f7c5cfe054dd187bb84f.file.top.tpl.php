<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:34:00
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97602336755926288dc83c5-11999870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aff71ce233c53bd06bb7f7c5cfe054dd187bb84f' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/top.tpl',
      1 => 1435656572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97602336755926288dc83c5-11999870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
    'img3' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926288e1cd58_67781919',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926288e1cd58_67781919')) {function content_55926288e1cd58_67781919($_smarty_tpl) {?><div class="text-center">
    <h1>トップページ</h1>
    <hr style="border-color:lightblue;">
    <img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
    <br />
    日本ワーキングホリデー協会のマイページにようこそ!!<br />
    ここではマイページの使い方について説明します。<br />
    ログイン直後は画像のようにばむくんが出迎えてくれます。<br />
    今後、ステップが進むにあたってお客様にいつまでに、何かをしてほしい場合が出てくると以下の様にアラートが表示されます。<br />
    <br />
    <img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
    <br />
    下に進むと次のステップとして、カウンセラーからお客様に次回ご来店の時、何をするかが表示されます。<br />
    その下の出発までのステップがお客様が留学までに行うことになります。<br />
    <br />
    <img class="manual-img" src="data:image/jpg;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
    <br />
    全ての矢印が緑色になるまで一緒に頑張りましょう。<br />
    その下の達成状況一覧が、上記ステップを1つのページでお客様の状況が一覧で分かる様になっています。<br />
    渡航計画(目標) にはカウンセラーがこの日に渡航しようという提案をしてくれますので、その日に渡航できる様頑張りましょう。<br />
    <br /> 
    <a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>