<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:43:46
         compiled from "/var/www/html/mypage/application/modules/default/views/plan/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169232256555557d470a6840-74250866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e0f27b4f5a6b0c025ea7656f9c1ef91cb4eba86' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/plan/index.tpl',
      1 => 1435656752,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169232256555557d470a6840-74250866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55557d47153231_86069721',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'abroad' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55557d47153231_86069721')) {function content_55557d47153231_86069721($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <ol class="breadcrumb">
        <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">マイページトップ</a></li>
        <li>準備</li>
    </ol>
    <div id="window-contaner" class="contents-wrapper">
        <h1 class="text-under" style="margin-left: 10px;">プランニング</h1>
        <p>ボタンを押すと下記に内容が表示されます。</p>
        <div class="col-xs-12 col-md-4 span-center" style="padding-left: 0px; ">
            <div class="btn-group">
                <button type="button" id="stepchart" class="btn btn-group-xs btn-primary">ステップチャート</button><br />
            </div>
            <div class="btn-group">
                <button type="button" id="history" class="btn btn-group-xs btn-primary">履歴</button>
            </div>
            <div class="btn-group">
                <button type="button" id="next_step" class="btn btn-group-xs btn-primary">次回</button>
            </div>
        </div>
        <div class="col-xs-12 col-md-9"></div>
        <div id="data-container" style="margin-top: 45px;"></div>
    </div>
    <a id="help-plan" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
    <script>
        abroad = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['abroad']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
';
    </script>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>