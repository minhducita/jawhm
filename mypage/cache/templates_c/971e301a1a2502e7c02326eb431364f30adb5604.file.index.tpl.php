<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:28:12
         compiled from "/var/www/html/mypage/application/modules/staff/views/plan/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1548995485566995cb68d89-47564112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '971e301a1a2502e7c02326eb431364f30adb5604' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/plan/index.tpl',
      1 => 1429259470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1548995485566995cb68d89-47564112',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'next_step' => 0,
    'n' => 0,
    'item' => 0,
    'abroad' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5566995cc44ef3_47523884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5566995cc44ef3_47523884')) {function content_5566995cc44ef3_47523884($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <ol class="breadcrumb">
        <li><a href="staff/client/clientindex">マイページトップ</a></li>
        <li>準備</li>
    </ol>
    <div id="window-contaner" class="contents-wrapper">
        <h1 class="text-under" style="margin-left: 10px;">プランニング</h1>
        <p>ボタンを押すと下記に内容が表示されます。</p>
        <div class="col-xs-12 col-md-12 span-center" style="padding-left: 0px; ">
            <div class="btn-group">
                <button type="button" id="stepchart" class="btn btn-group-xs btn-primary">ステップチャート</button>
            </div>
            <div class="btn-group">
                <button type="button" id="history" class="btn btn-group-xs btn-primary">履歴</button>
            </div>
            <div class="btn-group">
                <button type="button" id="next_step" class="btn btn-group-xs btn-primary">次回</button>
            </div>
            <div class="btn-group">
                <span class="col-xs-10">
                    <select class="form-control" name="step_name">
                        <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable(0, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['next_step']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <option value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['n']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['step_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</option>
                            <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
                        <?php } ?>
                    </select>
                </span>
                <div class="btn-group col-xs-2">
                    <button type="button" id="step_complete" class="btn btn-warning">完了</button>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" id="plan_complete" class="btn btn-group-xs btn-warning">手続完了</button>
            </div>
        </div>
        <div class="col-xs-12 col-md-9"></div>
        <div id="data-container" style="margin-top: 45px;"></div>
    </div>
    <script>
        abroad = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['abroad']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
';
    </script>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>