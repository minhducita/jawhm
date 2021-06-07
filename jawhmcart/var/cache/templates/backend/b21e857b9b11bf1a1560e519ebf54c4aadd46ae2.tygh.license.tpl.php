<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:13:48
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/components/connect/license.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208429520056e68edc236dc4-65875833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b21e857b9b11bf1a1560e519ebf54c4aadd46ae2' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/components/connect/license.tpl',
      1 => 1457504674,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '208429520056e68edc236dc4-65875833',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e68edc274e46_02096633',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e68edc274e46_02096633')) {function content_56e68edc274e46_02096633($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
?><?php
fn_preload_lang_vars(array('twgadmin_terms','twgadmin_accept_terms_n_conditions','checkout_terms_n_conditions_alert'));
?>
<div class="control-group">
    <label><?php echo $_smarty_tpl->__("twgadmin_terms");?>
:</label>
    <div class="controls">
        <input type="checkbox" id="id_accept_terms" name="accept_terms" value="Y" class="cm-agreement checkbox" />
        <label for="id_accept_terms" class="cm-check-agreement"><?php echo $_smarty_tpl->__("twgadmin_accept_terms_n_conditions");?>
</label>
    </div>
</div>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
>
//<![CDATA[
Tygh.lang.checkout_terms_n_conditions_alert = '<?php echo strtr($_smarty_tpl->__("checkout_terms_n_conditions_alert"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
';

Tygh.$.ceFormValidator('registerValidator', {
    class_name: 'cm-check-agreement',
    message: Tygh.lang.checkout_terms_n_conditions_alert,
    func: function(id) {
        return $('#' + id).prop('checked');
    }
});

//]]>
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>
