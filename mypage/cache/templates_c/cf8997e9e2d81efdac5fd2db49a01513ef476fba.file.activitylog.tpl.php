<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 11:27:02
         compiled from "/var/www/html/mypage/application/modules/default/views/index/activitylog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15393900465563d9f66e3cd4-62756693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf8997e9e2d81efdac5fd2db49a01513ef476fba' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/activitylog.tpl',
      1 => 1419238782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15393900465563d9f66e3cd4-62756693',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'activity_log' => 0,
    'username' => 0,
    'i' => 0,
    'item' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5563d9f67c3197_20003181',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5563d9f67c3197_20003181')) {function content_5563d9f67c3197_20003181($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <ol class="breadcrumb">
        <li><a href="./">マイページトップ</a></li>
        <li>活動内容</li>
    </ol>

    <?php if (count($_smarty_tpl->tpl_vars['activity_log']->value)>=1){?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 様の最近の活動内容</h4>
            </div>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
            <ul class="list-group">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activity_log']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <li class="list-group-item">
                        <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                        (<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['action_datetime'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                        <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['action_datetime'],"%H時%M分%S秒"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
)
                        [<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['action_content'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
]
                   </li>
               <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                <?php } ?>
            </ul>
        </div>
    <?php }else{ ?>
        <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 様の活動履歴はありません。
    <?php }?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>