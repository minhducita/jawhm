<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:44:48
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/applicationtopmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36074216055926510270f07-45246005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11726e7c7921ab85ddf4397d31dbdf72ce45be7e' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/applicationtopmodal.tpl',
      1 => 1435656569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36074216055926510270f07-45246005',
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
  'unifunc' => 'content_559265102d0367_21718668',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559265102d0367_21718668')) {function content_559265102d0367_21718668($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">書類トップヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
書類ページや、出発、達成状況一覧ページに移動するには留学情報を選択する必要があります。<br />
初めてのご渡航であれば、「今回のご渡航」を選択すると次の画面へと進めます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
書類の画面はこのような感じです。<br />
お客様の書類の準備状況によってボタンの色が変わります。詳しくはばむくんの説明を参照ください。<br />
<br />
<img class="manual-img" src="data:image/jpg;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
その下に留学情報をカウンセラーが入力します。<br />
学校情報と申込内容は学校等が確定次第入力されます。申込期限については都度カウンセラーが入力しますので、その日までに申し込みできるようにしてください。
<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>