<?php /* Smarty version Smarty-3.1.13, created on 2016-07-04 18:22:48
         compiled from "/var/www/html/mypage/application/modules/default/views/talk/edittalk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:542815988577a2ae83d09f1-66351360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a70ae141900e45292f459669003b211be251974a' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/talk/edittalk.tpl',
      1 => 1419238869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '542815988577a2ae83d09f1-66351360',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_577a2ae84484b0_02538472',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_577a2ae84484b0_02538472')) {function content_577a2ae84484b0_02538472($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">一言相談登録完了</h4>
    </div>

    <div class="modal-body">
        <h1>相談内容の登録が完了しました。</h1><br />
        スタッフより回答があるまでしばらくお待ち下さい。<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">ページ更新</button>
    </div>
</div>

<script>
<!--
    mnt = 5;
    url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/talk/index";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</script><?php }} ?>