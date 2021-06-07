<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:23:55
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/issuer_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2935438656e6670b4a6db6-57366073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b67da4c4c43cf9eec5d75f91d5c1144338b6dfa5' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/issuer_info.tpl',
      1 => 1457504474,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2935438656e6670b4a6db6-57366073',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
    'user_full_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6670b5270f2_81858186',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6670b5270f2_81858186')) {function content_56e6670b5270f2_81858186($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('issuer_info'));
?>

<?php if ($_smarty_tpl->tpl_vars['user_data']->value) {?>
<div class="sidebar-row">
        <h6><?php echo $_smarty_tpl->__("issuer_info");?>
</h6>
        <div class="profile-info">
            <i class="icon-user"></i>

            <p class="strong">
                <?php $_smarty_tpl->tpl_vars['user_full_name'] = new Smarty_variable(trim(((string)$_smarty_tpl->tpl_vars['user_data']->value['firstname'])." ".((string)$_smarty_tpl->tpl_vars['user_data']->value['lastname'])), null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['user_full_name']->value) {?>
                    <?php if ($_smarty_tpl->tpl_vars['user_data']->value['user_id']) {?>
                        <a href="<?php echo htmlspecialchars(fn_url("profiles.update?user_id=".((string)$_smarty_tpl->tpl_vars['user_data']->value['user_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_full_name']->value, ENT_QUOTES, 'UTF-8');?>
</a>,
                    <?php } elseif ($_smarty_tpl->tpl_vars['user_full_name']->value) {?>
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_full_name']->value, ENT_QUOTES, 'UTF-8');?>
,
                    <?php }?>
                <?php }?>
                <a href="mailto:<?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['user_data']->value['email']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['email'], ENT_QUOTES, 'UTF-8');?>
</a>
            </p>
        </div>
</div>
<hr>
<?php }?>


<?php }} ?>
