<?php /* Smarty version Smarty-3.1.13, created on 2015-05-15 16:22:18
         compiled from "/var/www/html/mypage/application/modules/default/views/plan/nextstep.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178259104955559eaaa1f823-11778638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abbfb790abc247cb7258fbabc5514883ebece96c' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/plan/nextstep.tpl',
      1 => 1419238827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178259104955559eaaa1f823-11778638',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'plan' => 0,
    'i' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55559eaaae01a7_75006475',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55559eaaae01a7_75006475')) {function content_55559eaaae01a7_75006475($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php if (count($_smarty_tpl->tpl_vars['plan']->value)>=0){?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">次回内容</h4>
        </div>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
        <ul class="list-group">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['plan']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <li class="list-group-item"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 予定日: <span class="text-italic"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['start_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span> 【<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['step_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
】 <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['step_exposition_short'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</li>
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
            <?php } ?>
        </ul>
    </div>
<?php }else{ ?>
    現在、お客様のプランはありません。
<?php }?><?php }} ?>