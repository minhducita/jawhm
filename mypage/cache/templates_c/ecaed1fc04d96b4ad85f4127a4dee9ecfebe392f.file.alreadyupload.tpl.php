<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:14:37
         compiled from "/var/www/html/mypage/application/modules/error/views/index/alreadyupload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11036300255564397d8724c4-05849081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecaed1fc04d96b4ad85f4127a4dee9ecfebe392f' => 
    array (
      0 => '/var/www/html/mypage/application/modules/error/views/index/alreadyupload.tpl',
      1 => 1419238894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11036300255564397d8724c4-05849081',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5564397d8c90d1_14197756',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5564397d8c90d1_14197756')) {function content_5564397d8c90d1_14197756($_smarty_tpl) {?><div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">アップロードの上限に達しました</h4>
    </div>

    <div class="modal-body">
        <h1 class="text-red">投稿できる画像は1枚までです。</h1><br />
        <p>申し訳ありませんが、画像をアップロードしたい場合は<br />
        既存の画像を削除するか<br />
        スタッフまでご相談ください。</p><br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<?php }} ?>