<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 07:43:13
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/payments/payments_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57094876156e0fb61bd0139-89126707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52c4913df027e24f8ec2da05d915894b18e087f7' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/payments/payments_list.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '57094876156e0fb61bd0139-89126707',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'payments' => 0,
    'payment_id' => 0,
    'payment' => 0,
    'url' => 0,
    'result_ids' => 0,
    'instructions' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e0fb61db19c8_44384168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0fb61db19c8_44384168')) {function content_56e0fb61db19c8_44384168($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="ty-other-pay clearfix">
    <ul class="ty-payments-list">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:payment_method")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:payment_method"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php  $_smarty_tpl->tpl_vars["payment"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["payment"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["payment"]->key => $_smarty_tpl->tpl_vars["payment"]->value) {
$_smarty_tpl->tpl_vars["payment"]->_loop = true;
?>

                <?php if ($_smarty_tpl->tpl_vars['payment_id']->value==$_smarty_tpl->tpl_vars['payment']->value['payment_id']) {?>
                    <?php $_smarty_tpl->tpl_vars['instructions'] = new Smarty_variable($_smarty_tpl->tpl_vars['payment']->value['instructions'], null, 0);?>
                <?php }?>

                <li class="ty-payments-list__item">
                    <input id="payment_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment_id'], ENT_QUOTES, 'UTF-8');?>
" class="ty-payments-list__checkbox cm-select-payment" type="radio" name="payment_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment_id'], ENT_QUOTES, 'UTF-8');?>
" data-ca-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8');?>
" data-ca-result-ids="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result_ids']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['payment_id']->value==$_smarty_tpl->tpl_vars['payment']->value['payment_id']) {?>checked="checked"<?php }?> <?php if ($_smarty_tpl->tpl_vars['payment']->value['disabled']) {?>disabled<?php }?> />

                    <div class="ty-payments-list__item-group">
                        <label for="payment_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment_id'], ENT_QUOTES, 'UTF-8');?>
" class="ty-payments-list__item-title">
                            <?php if ($_smarty_tpl->tpl_vars['payment']->value['image']) {?>
                                <div class="ty-payments-list__image">
                                <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('obj_id'=>$_smarty_tpl->tpl_vars['payment']->value['payment_id'],'images'=>$_smarty_tpl->tpl_vars['payment']->value['image'],'class'=>"ty-payments-list__image"), 0);?>

                                </div>
                            <?php }?>

                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment'], ENT_QUOTES, 'UTF-8');?>

                        </label>
                        <div class="ty-payments-list__description">
                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['description'], ENT_QUOTES, 'UTF-8');?>

                        </div>
                    </div>
                </li>

                <?php if ($_smarty_tpl->tpl_vars['payment_id']->value==$_smarty_tpl->tpl_vars['payment']->value['payment_id']) {?>
                    <?php if ($_smarty_tpl->tpl_vars['payment']->value['template']&&$_smarty_tpl->tpl_vars['payment']->value['template']!="cc_outside.tpl") {?>
                        <div>
                            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['payment']->value['template'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                    <?php }?>
                <?php }?>

            <?php } ?>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:payment_method"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </ul>
    <div class="ty-payments-list__instruction">
        <?php echo $_smarty_tpl->tpl_vars['instructions']->value;?>

    </div>
</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/checkout/components/payments/payments_list.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/checkout/components/payments/payments_list.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="ty-other-pay clearfix">
    <ul class="ty-payments-list">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:payment_method")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:payment_method"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php  $_smarty_tpl->tpl_vars["payment"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["payment"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["payment"]->key => $_smarty_tpl->tpl_vars["payment"]->value) {
$_smarty_tpl->tpl_vars["payment"]->_loop = true;
?>

                <?php if ($_smarty_tpl->tpl_vars['payment_id']->value==$_smarty_tpl->tpl_vars['payment']->value['payment_id']) {?>
                    <?php $_smarty_tpl->tpl_vars['instructions'] = new Smarty_variable($_smarty_tpl->tpl_vars['payment']->value['instructions'], null, 0);?>
                <?php }?>

                <li class="ty-payments-list__item">
                    <input id="payment_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment_id'], ENT_QUOTES, 'UTF-8');?>
" class="ty-payments-list__checkbox cm-select-payment" type="radio" name="payment_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment_id'], ENT_QUOTES, 'UTF-8');?>
" data-ca-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8');?>
" data-ca-result-ids="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result_ids']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['payment_id']->value==$_smarty_tpl->tpl_vars['payment']->value['payment_id']) {?>checked="checked"<?php }?> <?php if ($_smarty_tpl->tpl_vars['payment']->value['disabled']) {?>disabled<?php }?> />

                    <div class="ty-payments-list__item-group">
                        <label for="payment_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment_id'], ENT_QUOTES, 'UTF-8');?>
" class="ty-payments-list__item-title">
                            <?php if ($_smarty_tpl->tpl_vars['payment']->value['image']) {?>
                                <div class="ty-payments-list__image">
                                <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('obj_id'=>$_smarty_tpl->tpl_vars['payment']->value['payment_id'],'images'=>$_smarty_tpl->tpl_vars['payment']->value['image'],'class'=>"ty-payments-list__image"), 0);?>

                                </div>
                            <?php }?>

                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment'], ENT_QUOTES, 'UTF-8');?>

                        </label>
                        <div class="ty-payments-list__description">
                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['description'], ENT_QUOTES, 'UTF-8');?>

                        </div>
                    </div>
                </li>

                <?php if ($_smarty_tpl->tpl_vars['payment_id']->value==$_smarty_tpl->tpl_vars['payment']->value['payment_id']) {?>
                    <?php if ($_smarty_tpl->tpl_vars['payment']->value['template']&&$_smarty_tpl->tpl_vars['payment']->value['template']!="cc_outside.tpl") {?>
                        <div>
                            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['payment']->value['template'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                    <?php }?>
                <?php }?>

            <?php } ?>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:payment_method"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </ul>
    <div class="ty-payments-list__instruction">
        <?php echo $_smarty_tpl->tpl_vars['instructions']->value;?>

    </div>
</div>
<?php }?><?php }} ?>
