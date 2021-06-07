<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:58:31
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/products/components/select_product_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137151467856e66f271afc99-49598095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bc60d7d49b0aba5a2a5358e2d209b3358c30c6b' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/products/components/select_product_options.tpl',
      1 => 1457504483,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '137151467856e66f271afc99-49598095',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_options' => 0,
    'id' => 0,
    'name' => 0,
    'product' => 0,
    'po' => 0,
    'additional_class' => 0,
    'cp' => 0,
    'vr' => 0,
    'settings' => 0,
    'c_obj' => 0,
    'show_aoc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66f27621059_65036535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66f27621059_65036535')) {function content_56e66f27621059_65036535($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('select_option_above','please_select_one','na','please_select_one','na','any_option_combinations'));
?>
<?php if ($_smarty_tpl->tpl_vars['product_options']->value) {?>
<div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" id="product_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
<input type="hidden" name="appearance[id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="appearance[name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
" />

<?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['product']->value['object_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['id']->value : $tmp), null, 0);?>


<?php if ($_smarty_tpl->tpl_vars['name']->value=="cart_products") {?>
    <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][object_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" />
    <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" />
<?php }?>

<div id="option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_AOC" class="cm-picker-product-options form-horizontal product-options">
<?php  $_smarty_tpl->tpl_vars["po"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["po"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["po"]->key => $_smarty_tpl->tpl_vars["po"]->value) {
$_smarty_tpl->tpl_vars["po"]->_loop = true;
?>
<div id="opt_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" class="control-group <?php if ($_smarty_tpl->tpl_vars['additional_class']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['additional_class']->value, ENT_QUOTES, 'UTF-8');
}?>">
    <label for="option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" id="option_description_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" class="control-label <?php if ($_smarty_tpl->tpl_vars['po']->value['required']=="Y") {?>cm-required<?php }?> <?php if ($_smarty_tpl->tpl_vars['po']->value['regexp']) {?>cm-regexp<?php }?>" <?php if ($_smarty_tpl->tpl_vars['po']->value['regexp']) {?>data-ca-regexp="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['regexp'], ENT_QUOTES, 'UTF-8');?>
" data-ca-message="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['incorrect_message'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_name'], ENT_QUOTES, 'UTF-8');?>
:</label>
<div class="controls">
    <?php if ($_smarty_tpl->tpl_vars['po']->value['option_type']=="S") {?> 
        <?php if ($_smarty_tpl->tpl_vars['po']->value['variants']) {?>
            <select id="option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
]" <?php if ($_smarty_tpl->tpl_vars['product']->value['options_update']) {?>onchange="fn_change_options('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
, '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
');"<?php }?> <?php if ($_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']&&!$_smarty_tpl->tpl_vars['product']->value['aoc']||$_smarty_tpl->tpl_vars['po']->value['disabled']) {?>disabled="disabled"<?php }?> <?php if ($_smarty_tpl->tpl_vars['po']->value['disabled']) {?>class="cm-skip-avail-switch"<?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['options_type']=="S") {?><option value=""><?php if ($_smarty_tpl->tpl_vars['po']->value['disabled']) {
echo $_smarty_tpl->__("select_option_above");
} else {
echo $_smarty_tpl->__("please_select_one");
}?></option><?php }?>
            <?php  $_smarty_tpl->tpl_vars["vr"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["vr"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['po']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["vr"]->key => $_smarty_tpl->tpl_vars["vr"]->value) {
$_smarty_tpl->tpl_vars["vr"]->_loop = true;
?>
                <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vr']->value['variant_id'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['po']->value['value']==$_smarty_tpl->tpl_vars['vr']->value['variant_id']) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vr']->value['variant_name'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['settings']->value['General']['display_options_modifiers']=="Y") {
if (floatval($_smarty_tpl->tpl_vars['vr']->value['modifier'])) {?> (<?php echo $_smarty_tpl->getSubTemplate ("common/modifier.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('mod_type'=>$_smarty_tpl->tpl_vars['vr']->value['modifier_type'],'mod_value'=>$_smarty_tpl->tpl_vars['vr']->value['modifier'],'display_sign'=>true), 0);?>
)<?php }
$_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:select_options")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:select_options"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:select_options"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);
}?></option>
            <?php } ?>
            </select>
        <?php } else { ?>
            <?php echo $_smarty_tpl->__("na");?>

            <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['value'], ENT_QUOTES, 'UTF-8');?>
" id="option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" />
        <?php }?>

    <?php } elseif ($_smarty_tpl->tpl_vars['po']->value['option_type']=="R") {?> 
        <?php if ($_smarty_tpl->tpl_vars['po']->value['variants']) {?>
            <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['value'], ENT_QUOTES, 'UTF-8');?>
" id="option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" />
            <?php  $_smarty_tpl->tpl_vars["vr"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["vr"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['po']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["vr"]->key => $_smarty_tpl->tpl_vars["vr"]->value) {
$_smarty_tpl->tpl_vars["vr"]->_loop = true;
?>
                <label id="option_description_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vr']->value['variant_id'], ENT_QUOTES, 'UTF-8');?>
" class="radio">
                <input id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_variant_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vr']->value['variant_id'], ENT_QUOTES, 'UTF-8');?>
" type="radio" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vr']->value['variant_id'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['po']->value['value']==$_smarty_tpl->tpl_vars['vr']->value['variant_id']) {?>checked="checked"<?php }?> <?php if ($_smarty_tpl->tpl_vars['product']->value['options_update']) {?>onclick="fn_change_options('<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['c_obj']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['id']->value : $tmp), ENT_QUOTES, 'UTF-8');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
, '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
');"<?php }?> <?php if ($_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']&&!$_smarty_tpl->tpl_vars['product']->value['aoc']||$_smarty_tpl->tpl_vars['po']->value['disabled']) {?>disabled="disabled"<?php }?> <?php if ($_smarty_tpl->tpl_vars['po']->value['disabled']) {?>class="cm-skip-avail-switch"<?php }?> />
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vr']->value['variant_name'], ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['display_options_modifiers']=="Y") {
if (floatval($_smarty_tpl->tpl_vars['vr']->value['modifier'])) {?>(<?php echo $_smarty_tpl->getSubTemplate ("common/modifier.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('mod_type'=>$_smarty_tpl->tpl_vars['vr']->value['modifier_type'],'mod_value'=>$_smarty_tpl->tpl_vars['vr']->value['modifier'],'display_sign'=>true), 0);?>
)<?php }
$_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:select_options")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:select_options"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:select_options"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);
}?></label>
            <?php } ?>
            <?php if (!$_smarty_tpl->tpl_vars['po']->value['value']&&$_smarty_tpl->tpl_vars['product']->value['options_type']=="S"&&!$_smarty_tpl->tpl_vars['po']->value['disabled']) {?><p class="description clear-both"><?php echo $_smarty_tpl->__("please_select_one");?>
</p><?php }?>
        <?php } else { ?>
            <?php echo $_smarty_tpl->__("na");?>

            <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['value'], ENT_QUOTES, 'UTF-8');?>
" id="option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" />
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['po']->value['option_type']=="C") {?> 

        <?php  $_smarty_tpl->tpl_vars["vr"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["vr"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['po']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["vr"]->key => $_smarty_tpl->tpl_vars["vr"]->value) {
$_smarty_tpl->tpl_vars["vr"]->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['vr']->value['position']==0) {?>
            <input id="unchecked_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vr']->value['variant_id'], ENT_QUOTES, 'UTF-8');?>
" />
        <?php } else { ?>
            <div class="cm-field-container">
                <label>
            <input id="option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" type="checkbox" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vr']->value['variant_id'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['po']->value['value']==$_smarty_tpl->tpl_vars['vr']->value['variant_id']) {?>checked="checked"<?php }?> <?php if ($_smarty_tpl->tpl_vars['product']->value['options_update']) {?>onclick="fn_change_options('<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['c_obj']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['id']->value : $tmp), ENT_QUOTES, 'UTF-8');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
, '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
');"<?php }?> <?php if ($_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']&&!$_smarty_tpl->tpl_vars['product']->value['aoc']||$_smarty_tpl->tpl_vars['po']->value['disabled']) {?>disabled="disabled"<?php }?> class="checkbox<?php if ($_smarty_tpl->tpl_vars['po']->value['disabled']) {?> cm-skip-avail-switch<?php }?>" />

            <?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['display_options_modifiers']=="Y") {
if (floatval($_smarty_tpl->tpl_vars['vr']->value['modifier'])) {?>&nbsp;(<?php echo $_smarty_tpl->getSubTemplate ("common/modifier.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('mod_type'=>$_smarty_tpl->tpl_vars['vr']->value['modifier_type'],'mod_value'=>$_smarty_tpl->tpl_vars['vr']->value['modifier'],'display_sign'=>true), 0);?>
)<?php }
$_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:select_options")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:select_options"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:select_options"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);
}?>
                </label>
            </div>
        <?php }?>
        <?php } ?>

    <?php } elseif ($_smarty_tpl->tpl_vars['po']->value['option_type']=="I") {?> 
        <input id="option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" type="text" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['po']->value['value'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['po']->value['inner_hint'] : $tmp), ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']&&!$_smarty_tpl->tpl_vars['product']->value['aoc']) {?>disabled="disabled"<?php }?> class="input-text <?php if ($_smarty_tpl->tpl_vars['po']->value['inner_hint']) {?>cm-hint<?php }?>" <?php if ($_smarty_tpl->tpl_vars['po']->value['inner_hint']) {?>title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['inner_hint'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
    <?php } elseif ($_smarty_tpl->tpl_vars['po']->value['option_type']=="T") {?> 
        <textarea id="option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['option_id'], ENT_QUOTES, 'UTF-8');?>
]" <?php if ($_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']) {?>disabled="disabled"<?php }?> class="input-textarea-long <?php if ($_smarty_tpl->tpl_vars['po']->value['inner_hint']&&$_smarty_tpl->tpl_vars['po']->value['value']=='') {?>cm-hint<?php }?>" <?php if ($_smarty_tpl->tpl_vars['po']->value['inner_hint']) {?>title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['po']->value['inner_hint'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['po']->value['value'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['po']->value['inner_hint'] : $tmp), ENT_QUOTES, 'UTF-8');?>
</textarea>
    <?php } elseif ($_smarty_tpl->tpl_vars['po']->value['option_type']=="F") {?> 
        <div class="clearfix">
            <?php echo $_smarty_tpl->getSubTemplate ("common/fileuploader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('images'=>$_smarty_tpl->tpl_vars['product']->value['extra']['custom_files'][$_smarty_tpl->tpl_vars['po']->value['option_id']],'var_name'=>((string)$_smarty_tpl->tpl_vars['name']->value)."[".((string)$_smarty_tpl->tpl_vars['po']->value['option_id']).((string)$_smarty_tpl->tpl_vars['id']->value)."]",'multiupload'=>$_smarty_tpl->tpl_vars['po']->value['multiupload'],'hidden_name'=>((string)$_smarty_tpl->tpl_vars['name']->value)."[custom_files][".((string)$_smarty_tpl->tpl_vars['po']->value['option_id']).((string)$_smarty_tpl->tpl_vars['id']->value)."]",'hidden_value'=>((string)$_smarty_tpl->tpl_vars['id']->value)."_".((string)$_smarty_tpl->tpl_vars['po']->value['option_id']),'label_id'=>"option_".((string)$_smarty_tpl->tpl_vars['id']->value)."_".((string)$_smarty_tpl->tpl_vars['po']->value['option_id']),'hide_server'=>true), 0);?>

        </div>
    <?php }?>
</div>
</div>
<?php } ?>
</div>
<?php if ($_smarty_tpl->tpl_vars['show_aoc']->value) {?>
<input type="hidden" name="appearance[show_aoc]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_aoc']->value, ENT_QUOTES, 'UTF-8');?>
" />
<div class="control-group cm-picker-product-options">
    <label for="sw_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_AOC" class="checkbox">
    <input class="cm-switch-availability cm-switch-inverse cm-option-aoc" id="sw_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_AOC" type="checkbox" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][product_options][AOC]" value="N" /><?php echo $_smarty_tpl->__("any_option_combinations");?>
</label>
</div>
<?php }?>
<!--product_options_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }?>
<?php }} ?>
