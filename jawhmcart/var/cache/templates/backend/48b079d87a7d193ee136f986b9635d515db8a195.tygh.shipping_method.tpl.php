<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:58:09
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/shipping_method.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136922787656e66f11318159-73676781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48b079d87a7d193ee136f986b9635d515db8a195' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/shipping_method.tpl',
      1 => 1457504475,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '136922787656e66f11318159-73676781',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_groups' => 0,
    'group' => 0,
    'group_key' => 0,
    'shipping' => 0,
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66f113f0f49_74984854',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66f113f0f49_74984854')) {function content_56e66f113f0f49_74984854($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('shipping_method','none','no_shipping_required','text_no_shipping_methods','text_no_shipping_methods'));
?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"order_management:shipping_method")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"order_management:shipping_method"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<div class="control-group">
    <div class="control-label">
        <h4 class="subheader"><?php echo $_smarty_tpl->__("shipping_method");?>
</h4>
    </div>
</div>
    <?php if ($_smarty_tpl->tpl_vars['product_groups']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_smarty_tpl->tpl_vars['group_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['group_key']->value = $_smarty_tpl->tpl_vars['group']->key;
?>
            <div class="control-group">
            <label class="control-label"> <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['group']->value['name'])===null||$tmp==='' ? $_smarty_tpl->__("none") : $tmp), ENT_QUOTES, 'UTF-8');?>
</label>
            <?php if ($_smarty_tpl->tpl_vars['group']->value['shippings']&&!$_smarty_tpl->tpl_vars['group']->value['shipping_no_required']) {?>
                <div class="controls">
                    <select name="shipping_ids[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_key']->value, ENT_QUOTES, 'UTF-8');?>
]" class="cm-submit cm-ajax cm-skip-validation" data-ca-dispatch="dispatch[order_management.update_shipping]">
                    <?php  $_smarty_tpl->tpl_vars['shipping'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shipping']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group']->value['shippings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shipping']->key => $_smarty_tpl->tpl_vars['shipping']->value) {
$_smarty_tpl->tpl_vars['shipping']->_loop = true;
?>
                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['shipping_id'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['cart']->value['chosen_shipping'][$_smarty_tpl->tpl_vars['group_key']->value]==$_smarty_tpl->tpl_vars['shipping']->value['shipping_id']) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['shipping'], ENT_QUOTES, 'UTF-8');?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['delivery_time'], ENT_QUOTES, 'UTF-8');?>
) - <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['shipping']->value['rate']), 0);?>
</option>
                    <?php } ?>
                    </select>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['group']->value['shipping_no_required']) {?>
                <?php echo $_smarty_tpl->__("no_shipping_required");?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->__("text_no_shipping_methods");?>

                <?php $_smarty_tpl->tpl_vars["is_empty_rates"] = new Smarty_variable("Y", null, 0);?>
            <?php }?>
            </div>
        <?php } ?>
    <?php } else { ?>
        <span class="error-text"><?php echo $_smarty_tpl->__("text_no_shipping_methods");?>
</span>
    <?php }?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"order_management:shipping_method"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
