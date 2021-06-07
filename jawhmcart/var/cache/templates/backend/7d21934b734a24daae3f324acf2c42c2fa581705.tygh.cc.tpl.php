<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:58:23
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/orders/components/payments/cc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84146096456e66f1f4e58e5-90569176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d21934b734a24daae3f324acf2c42c2fa581705' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/orders/components/payments/cc.tpl',
      1 => 1457504617,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '84146096456e66f1f4e58e5-90569176',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'id_suffix' => 0,
    'card_item' => 0,
    'images_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66f1f6920e4_89765827',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66f1f6920e4_89765827')) {function content_56e66f1f6920e4_89765827($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
?><?php
fn_preload_lang_vars(array('card_number','valid_thru','cardholder_name','cvv2','what_is_cvv2','what_is_cvv2','visa_card_discover','credit_card_info','american_express','american_express_info','error_validator_ccv'));
?>
<?php echo smarty_function_script(array('src'=>"js/lib/inputmask/jquery.inputmask.min.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/lib/creditcardvalidator/jquery.creditCardValidator.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars["card_item"] = new Smarty_variable(fn_filter_card_data($_smarty_tpl->tpl_vars['cart']->value['payment_info']), null, 0);?>

<div class="clearfix">
    <div class="credit-card">
            <div class="control-group">
                <label for="cc_number<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label cm-cc-number cm-required cm-autocomplete-off"><?php echo $_smarty_tpl->__("card_number");?>
</label>
                <div class="controls">
                    <input id="cc_number<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
" size="35" type="text" name="payment_info[card_number]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['card_item']->value['card_number'], ENT_QUOTES, 'UTF-8');?>
" class="input-big" />
                </div>
                <ul class="cc-icons-wrap cc-icons unstyled" id="cc_icons<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
">
                    <li class="cc-icon cm-cc-default"><span class="default">&nbsp;</span></li>
                    <li class="cc-icon cm-cc-visa"><span class="visa">&nbsp;</span></li>
                    <li class="cc-icon cm-cc-visa_electron"><span class="visa-electron">&nbsp;</span></li>
                    <li class="cc-icon cm-cc-mastercard"><span class="mastercard">&nbsp;</span></li>
                    <li class="cc-icon cm-cc-maestro"><span class="maestro">&nbsp;</span></li>
                    <li class="cc-icon cm-cc-amex"><span class="american-express">&nbsp;</span></li>
                    <li class="cc-icon cm-cc-discover"><span class="discover">&nbsp;</span></li>
                </ul>

            </div>
    
            <div class="control-group">
                <label for="cc_exp_month<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label cm-cc-date cm-required"><?php echo $_smarty_tpl->__("valid_thru");?>
</label>
                <div class="controls clear">
                    <div class="cm-field-container nowrap">
                        <input type="text" id="cc_exp_month<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
" name="payment_info[expiry_month]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['card_item']->value['expiry_month'], ENT_QUOTES, 'UTF-8');?>
" size="2" maxlength="2" class="input-small" />&nbsp;/&nbsp;<input type="text" id="cc_exp_year<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
" name="payment_info[expiry_year]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['card_item']->value['expiry_year'], ENT_QUOTES, 'UTF-8');?>
" size="2" maxlength="2" class="input-small" />
                    </div>
                </div>
            </div>
    
            <div class="control-group">
                <label for="cc_name<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label cm-required"><?php echo $_smarty_tpl->__("cardholder_name");?>
</label>
                <div class="controls">
                    <input id="cc_name<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
" size="35" type="text" name="payment_info[cardholder_name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['card_item']->value['cardholder_name'], ENT_QUOTES, 'UTF-8');?>
" class="input-text uppercase" />
                </div>
            </div>
    </div>
    
    <div class="control-group cvv-field">
        <label for="cc_cvv2<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label cm-required cm-cc-cvv2 cm-integer cm-autocomplete-off"><?php echo $_smarty_tpl->__("cvv2");?>
</label>
        <div class="controls">
        <input id="cc_cvv2<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
" type="text" name="payment_info[cvv2]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['card_item']->value['cvv2'], ENT_QUOTES, 'UTF-8');?>
" size="4" maxlength="4"/>

        <div class="cvv2">
            <a><?php echo $_smarty_tpl->__("what_is_cvv2");?>
</a>
            <div class="popover fade bottom in">
                <div class="arrow"></div>
                <h3 class="popover-title"><?php echo $_smarty_tpl->__("what_is_cvv2");?>
</h3>
                <div class="popover-content">
                    <div class="cvv2-note">
                            <div class="card-info clearfix">
                                <div class="cards-images">
                                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/visa_cvv.png" border="0" alt="" />
                                </div>
                                <div class="cards-description">
                                    <strong><?php echo $_smarty_tpl->__("visa_card_discover");?>
</strong>
                                    <p><?php echo $_smarty_tpl->__("credit_card_info");?>
</p>
                                </div>
                            </div>
                            <div class="card-info ax clearfix">
                                <div class="cards-images">
                                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/express_cvv.png" border="0" alt="" />
                                </div>
                                <div class="cards-description">
                                    <strong><?php echo $_smarty_tpl->__("american_express");?>
</strong>
                                    <p><?php echo $_smarty_tpl->__("american_express_info");?>
</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
(function(_, $) {
    $(document).ready(function() {
       
        var icons = $('#cc_icons<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
 li');
        var ccNumberInput = $("#cc_number<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
");
        var ccCv2 = $('label[for=cc_cvv2<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
]');
        var ccCv2Input = $("#cc_cvv2<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
");
        var ccMonthInput = $("#cc_exp_month<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
");
        var ccYearInput = $("#cc_exp_year<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_suffix']->value, ENT_QUOTES, 'UTF-8');?>
");

        if(_.isTouch === false && jQuery.isEmptyObject(ccNumberInput.data("_inputmask")) == true) {
            
            ccNumberInput.inputmask("9999 9999 9999 9[99][9]", {
                placeholder: ' '
            });

            $.ceFormValidator('registerValidator', {
                class_name: 'cm-cc-number',
                message: '',
                func: function(id) {
                    return ccNumberInput.inputmask("isComplete");
                }
            });

            ccCv2Input.inputmask("999[9]", {
                placeholder: ''
            });

            $.ceFormValidator('registerValidator', {
                class_name: 'cm-cc-cvv2',
                message: "<?php echo $_smarty_tpl->__("error_validator_ccv");?>
",
                func: function(id) {
                    return ccCv2Input.inputmask("isComplete");
                }
            });

            ccMonthInput.inputmask("99", {
                placeholder: ''
            });

            ccYearInput.inputmask("99", {
                placeholder: ''
            });

            $.ceFormValidator('registerValidator', {
                class_name: 'cm-cc-date',
                message: '',
                func: function(id) {
                    return (ccYearInput.inputmask("isComplete") && ccMonthInput.inputmask("isComplete"));
                }
            });
        }

        ccNumberInput.validateCreditCard(function(result) {
            icons.removeClass('active');
            if (result.card_type) {
                icons.filter('.cm-cc-' + result.card_type.name).addClass('active');
                if (['visa_electron', 'maestro', 'laser'].indexOf(result.card_type.name) != -1) {
                    ccCv2.removeClass("cm-required");
                } else {
                    ccCv2.addClass("cm-required");
                }
            }
        });


    });
})(Tygh, Tygh.$);
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
