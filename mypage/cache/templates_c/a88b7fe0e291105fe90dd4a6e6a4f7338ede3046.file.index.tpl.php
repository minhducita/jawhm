<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:46:28
         compiled from "/var/www/html/mypage/application/modules/default/views/seminar/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171660104355596025410530-26272280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a88b7fe0e291105fe90dd4a6e6a4f7338ede3046' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/seminar/index.tpl',
      1 => 1435656804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171660104355596025410530-26272280',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55596025519be7_49294179',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55596025519be7_49294179')) {function content_55596025519be7_49294179($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li>セミナー予約</li>
</ol>

<div class="contents-wrapper">
    <h2>セミナー予約確認</h2>
    セミナーの予約・確認・キャンセル及び過去に参加したセミナーを確認できます。<br />
    以下よりご希望のメニューを選択してください。
</div>

<div class="panel panel-primary col-xs-12" style="padding-left: 0px; padding-right: 0px;" >
    <div class="panel-heading">
        <h4 class="panel-title">セミナーメニュー</h4>
    </div>
    <ul class="list-group">
        <li class="list-group-item"><a href="https://www.jawhm.or.jp/seminar/seminar.php"><span class="text-bold glyphicon glyphicon-bookmark" style="font-size: 14px; "></span> セミナー予約</a></li>
        <li class="list-group-item"><a href="seminar/booking"><span class="text-bold glyphicon glyphicon-bookmark" style="font-size: 14px; "></span> セミナー予約確認</a></li>
        <li class="list-group-item"><a href="seminar/history"><span class="text-bold glyphicon glyphicon-check" style="font-size: 14px; "></span> 過去に参加したセミナー一覧</a></li>
        <li class="list-group-item"><a href="seminar/online"><span class="text-bold glyphicon glyphicon-expand" style="font-size: 14px; "></span> オンラインセミナー一覧</a></li>
    </ul>
</div>
<a id="help-seminartop" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>