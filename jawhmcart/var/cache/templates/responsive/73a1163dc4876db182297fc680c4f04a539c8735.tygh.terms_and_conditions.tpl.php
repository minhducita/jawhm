<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 07:43:13
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/terms_and_conditions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206552909556e0fb6185db85-95734938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73a1163dc4876db182297fc680c4f04a539c8735' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/terms_and_conditions.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '206552909556e0fb6185db85-95734938',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'cart_agreements' => 0,
    'settings' => 0,
    'iframe_mode' => 0,
    'suffix' => 0,
    'product_agreements' => 0,
    'agreement' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e0fb61aaa879_82744518',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0fb61aaa879_82744518')) {function content_56e0fb61aaa879_82744518($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('checkout_terms_n_conditions_alert','checkout_terms_n_conditions','checkout_edp_terms_n_conditions','license_agreement','checkout_terms_n_conditions_alert','checkout_terms_n_conditions','checkout_edp_terms_n_conditions','license_agreement'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if ($_smarty_tpl->tpl_vars['cart_agreements']->value||$_smarty_tpl->tpl_vars['settings']->value['Checkout']['agree_terms_conditions']=="Y") {?>
    <?php echo '<script'; ?>
 type="text/javascript">
        (function(_, $) {
            $.ceFormValidator('registerValidator', {
                class_name: 'cm-check-agreement',
                message: '<?php echo strtr($_smarty_tpl->__("checkout_terms_n_conditions_alert"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                func: function(id) {
                    return $('#' + id).prop('checked');
                }
            });     
            
            <?php if ($_smarty_tpl->tpl_vars['iframe_mode']->value) {?>
                function fn_check_agreements(suffix)
                {
                    var checked = $('form[name=payments_form_' + suffix + '] input[type=checkbox].cm-agreement').prop('checked');
                    $('#payment_method_iframe' + suffix).toggleClass('hidden', checked);
                }
            <?php }?>
        }(Tygh, Tygh.$));
    <?php echo '</script'; ?>
>
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['Checkout']['agree_terms_conditions']=="Y") {?>
        <div class="ty-control-group ty-checkout__terms">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:terms_and_conditions")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:terms_and_conditions"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="cm-field-container">
                <label for="id_accept_terms<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-check-agreement"><input type="checkbox" id="id_accept_terms<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" name="accept_terms" value="Y" class="cm-agreement checkbox" <?php if ($_smarty_tpl->tpl_vars['iframe_mode']->value) {?>onclick="fn_check_agreements('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
');"<?php }?> /><?php echo $_smarty_tpl->__("checkout_terms_n_conditions");?>
</label>
            </div>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:terms_and_conditions"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['cart_agreements']->value) {?>
        <div class="ty-control-group ty-license-agreement__checkbox">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:terms_and_conditions_downloadable")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:terms_and_conditions_downloadable"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="cm-field-container">
                <label for="product_agreements_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-check-agreement ty-license-agreement__checkbox__checkbox"><input type="checkbox" id="product_agreements_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" name="agreements[]" value="Y" class="cm-agreement checkbox"  <?php if ($_smarty_tpl->tpl_vars['iframe_mode']->value) {?>onclick="fn_check_agreements('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
');"<?php }?>/><span><?php echo $_smarty_tpl->__("checkout_edp_terms_n_conditions");?>
</span>&nbsp;<a id="sw_elm_agreements_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-combination ty-dashed-link"><?php echo $_smarty_tpl->__("license_agreement");?>
</a></label>
            </div>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:terms_and_conditions_downloadable"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <div class="hidden" id="elm_agreements_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php  $_smarty_tpl->tpl_vars["product_agreements"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product_agreements"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_agreements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product_agreements"]->key => $_smarty_tpl->tpl_vars["product_agreements"]->value) {
$_smarty_tpl->tpl_vars["product_agreements"]->_loop = true;
?>
                <?php  $_smarty_tpl->tpl_vars["agreement"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["agreement"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_agreements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["agreement"]->key => $_smarty_tpl->tpl_vars["agreement"]->value) {
$_smarty_tpl->tpl_vars["agreement"]->_loop = true;
?>
                <p><?php echo $_smarty_tpl->tpl_vars['agreement']->value['license'];?>
</p>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
        <?php }?>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/checkout/components/terms_and_conditions.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/checkout/components/terms_and_conditions.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if ($_smarty_tpl->tpl_vars['cart_agreements']->value||$_smarty_tpl->tpl_vars['settings']->value['Checkout']['agree_terms_conditions']=="Y") {?>
    <?php echo '<script'; ?>
 type="text/javascript">
        (function(_, $) {
            $.ceFormValidator('registerValidator', {
                class_name: 'cm-check-agreement',
                message: '<?php echo strtr($_smarty_tpl->__("checkout_terms_n_conditions_alert"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                func: function(id) {
                    return $('#' + id).prop('checked');
                }
            });     
            
            <?php if ($_smarty_tpl->tpl_vars['iframe_mode']->value) {?>
                function fn_check_agreements(suffix)
                {
                    var checked = $('form[name=payments_form_' + suffix + '] input[type=checkbox].cm-agreement').prop('checked');
                    $('#payment_method_iframe' + suffix).toggleClass('hidden', checked);
                }
            <?php }?>
        }(Tygh, Tygh.$));
    <?php echo '</script'; ?>
>
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['Checkout']['agree_terms_conditions']=="Y") {?>
        <div class="ty-control-group ty-checkout__terms">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:terms_and_conditions")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:terms_and_conditions"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="cm-field-container">
                <label for="id_accept_terms<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-check-agreement"><input type="checkbox" id="id_accept_terms<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" name="accept_terms" value="Y" class="cm-agreement checkbox" <?php if ($_smarty_tpl->tpl_vars['iframe_mode']->value) {?>onclick="fn_check_agreements('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
');"<?php }?> /><?php echo $_smarty_tpl->__("checkout_terms_n_conditions");?>
</label>
            </div>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:terms_and_conditions"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['cart_agreements']->value) {?>
        <div class="ty-control-group ty-license-agreement__checkbox">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:terms_and_conditions_downloadable")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:terms_and_conditions_downloadable"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="cm-field-container">
                <label for="product_agreements_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-check-agreement ty-license-agreement__checkbox__checkbox"><input type="checkbox" id="product_agreements_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" name="agreements[]" value="Y" class="cm-agreement checkbox"  <?php if ($_smarty_tpl->tpl_vars['iframe_mode']->value) {?>onclick="fn_check_agreements('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
');"<?php }?>/><span><?php echo $_smarty_tpl->__("checkout_edp_terms_n_conditions");?>
</span>&nbsp;<a id="sw_elm_agreements_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-combination ty-dashed-link"><?php echo $_smarty_tpl->__("license_agreement");?>
</a></label>
            </div>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:terms_and_conditions_downloadable"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <div class="hidden" id="elm_agreements_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php  $_smarty_tpl->tpl_vars["product_agreements"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product_agreements"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_agreements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product_agreements"]->key => $_smarty_tpl->tpl_vars["product_agreements"]->value) {
$_smarty_tpl->tpl_vars["product_agreements"]->_loop = true;
?>
                <?php  $_smarty_tpl->tpl_vars["agreement"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["agreement"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_agreements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["agreement"]->key => $_smarty_tpl->tpl_vars["agreement"]->value) {
$_smarty_tpl->tpl_vars["agreement"]->_loop = true;
?>
                <p><?php echo $_smarty_tpl->tpl_vars['agreement']->value['license'];?>
</p>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
        <?php }?>
<?php }?>
<?php }?><?php }} ?>
