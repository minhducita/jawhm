<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:34:31
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/product_filters/update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48136125956e67797ef4c05-66403338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ce2e99c4580e7130b3bb32765352c7aead5638a' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/product_filters/update.tpl',
      1 => 1457504397,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '48136125956e67797ef4c05-66403338',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'filter' => 0,
    'id' => 0,
    'allow_save' => 0,
    'filter_features' => 0,
    'feature' => 0,
    'subfeature' => 0,
    'filter_fields' => 0,
    'field' => 0,
    'field_type' => 0,
    'picker_selected_companies' => 0,
    'hide_first_button' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e67798374816_50205099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e67798374816_50205099')) {function content_56e67798374816_50205099($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_enum')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.enum.php';
if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
?><?php
fn_preload_lang_vars(array('general','categories','name','position_short','filter_by','features','product_fields','round_to','display_type','expanded','minimized','display_variants_count','text_all_categories_included'));
?>
<?php if ($_smarty_tpl->tpl_vars['filter']->value) {?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['filter_id'], null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(0, null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["allow_save"] = new Smarty_variable(true, null, 0);?>
<?php if (fn_allowed_for("ULTIMATE")) {?>
    <?php $_smarty_tpl->tpl_vars["allow_save"] = new Smarty_variable(fn_allow_save_object($_smarty_tpl->tpl_vars['filter']->value,"product_filters"), null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["filter_fields"] = new Smarty_variable(fn_get_product_filter_fields(''), null, 0);?>

<div id="content_group<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" name="update_filter_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" method="post" class="form-horizontal form-edit <?php if (fn_check_form_permissions('')||!$_smarty_tpl->tpl_vars['allow_save']->value) {?> cm-hide-inputs<?php }?>">

<input type="hidden" class="cm-no-hide-input" name="filter_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" class="cm-no-hide-input" name="redirect_url" value="<?php echo htmlspecialchars($_REQUEST['return_url'], ENT_QUOTES, 'UTF-8');?>
" />

<div class="tabs cm-j-tabs">
    <ul class="nav nav-tabs">
        <li id="tab_details_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-js active"><a><?php echo $_smarty_tpl->__("general");?>
</a></li>
        <li id="tab_categories_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-js"><a><?php echo $_smarty_tpl->__("categories");?>
</a></li>
    </ul>
</div>
<div class="cm-tabs-content" id="tabs_content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
    <div id="content_tab_details_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
    <fieldset>
        <div class="control-group">
            <label for="elm_filter_name_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label cm-required"><?php echo $_smarty_tpl->__("name");?>
</label>
            <div class="controls">
                <input type="text" id="elm_filter_name_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="filter_data[filter]" class="span9" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['filter'], ENT_QUOTES, 'UTF-8');?>
" />
            </div>
        </div>

        <?php if (fn_allowed_for("ULTIMATE")) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_field.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>"filter_data[company_id]",'id'=>"elm_filter_data_".((string)$_smarty_tpl->tpl_vars['id']->value),'selected'=>$_smarty_tpl->tpl_vars['filter']->value['company_id']), 0);?>

        <?php }?>

        <div class="control-group">
            <label class="control-label" for="elm_filter_position_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("position_short");?>
</label>
            <div class="controls">
            <input type="text" id="elm_filter_position_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="filter_data[position]" size="3" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['position'], ENT_QUOTES, 'UTF-8');
if (!$_smarty_tpl->tpl_vars['id']->value) {?>0<?php }?>"/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="elm_filter_filter_by_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("filter_by");?>
</label>
            <div class="controls">
            <?php if (!$_smarty_tpl->tpl_vars['id']->value) {?>
                
                <select name="filter_data[filter_type]" onchange="fn_check_product_filter_type(this.value, 'tab_variants_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
);" id="elm_filter_filter_by_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
                <?php if ($_smarty_tpl->tpl_vars['filter_features']->value) {?>
                    <optgroup label="<?php echo $_smarty_tpl->__("features");?>
">
                    <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter_features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
                        <option value="<?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']==smarty_modifier_enum("ProductFeatures::NUMBER_FIELD")||$_smarty_tpl->tpl_vars['feature']->value['feature_type']==smarty_modifier_enum("ProductFeatures::NUMBER_SELECTBOX")) {?>R<?php } elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type']==smarty_modifier_enum("ProductFeatures::DATE")) {?>D<?php } else { ?>F<?php }?>F-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['feature_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['description'], ENT_QUOTES, 'UTF-8');?>
</option>
                    <?php if ($_smarty_tpl->tpl_vars['feature']->value['subfeatures']) {?>
                    <?php  $_smarty_tpl->tpl_vars['subfeature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subfeature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feature']->value['subfeatures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subfeature']->key => $_smarty_tpl->tpl_vars['subfeature']->value) {
$_smarty_tpl->tpl_vars['subfeature']->_loop = true;
?>
                        <option value="<?php if ($_smarty_tpl->tpl_vars['feature']->value['feature_type']==smarty_modifier_enum("ProductFeatures::NUMBER_FIELD")||$_smarty_tpl->tpl_vars['feature']->value['feature_type']==smarty_modifier_enum("ProductFeatures::NUMBER_SELECTBOX")) {?>R<?php } elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type']==smarty_modifier_enum("ProductFeatures::DATE")) {?>D<?php } else { ?>F<?php }?>F-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subfeature']->value['feature_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subfeature']->value['description'], ENT_QUOTES, 'UTF-8');?>
</option>
                    <?php } ?>
                    <?php }?>
                    <?php } ?>
                    </optgroup>
                <?php }?>
                    <optgroup label="<?php echo $_smarty_tpl->__("product_fields");?>
">
                    <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_smarty_tpl->tpl_vars["field_type"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
 $_smarty_tpl->tpl_vars["field_type"]->value = $_smarty_tpl->tpl_vars["field"]->key;
?>
                        <?php if (!$_smarty_tpl->tpl_vars['field']->value['hidden']) {?>
                            <option value="<?php if ($_smarty_tpl->tpl_vars['field']->value['is_range']) {?>R<?php } else { ?>B<?php }?>-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field_type']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['field']->value['description']);?>
</option>
                        <?php }?>
                    <?php } ?>
                    </optgroup>
                </select>
            <?php } else { ?>
                <input type="hidden" name="filter_data[filter_type]" value="<?php if ($_smarty_tpl->tpl_vars['filter']->value['feature_id']) {?>FF-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['feature_id'], ENT_QUOTES, 'UTF-8');
} else {
if ($_smarty_tpl->tpl_vars['filter_fields']->value[$_smarty_tpl->tpl_vars['filter']->value['field_type']]['is_range']) {?>R<?php } else { ?>B<?php }?>-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['field_type'], ENT_QUOTES, 'UTF-8');
}?>">
                <span class="shift-input"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['feature'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['filter']->value['feature_group']) {?> (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter']->value['feature_group'], ENT_QUOTES, 'UTF-8');?>
)<?php }?></span>
            <?php }?>
            </div>
        </div>

        <div class="control-group<?php if (!$_smarty_tpl->tpl_vars['filter']->value['slider']) {?> hidden<?php }?>" id="round_to_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_container">
            <label class="control-label" for="elm_filter_round_to_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("round_to");?>
</label>
            <div class="controls">
            <select name="filter_data[round_to]" id="elm_filter_round_to_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
                <option value="1"  <?php if ($_smarty_tpl->tpl_vars['filter']->value['round_to']==1) {?>   selected="selected"<?php }?>>1</option>
                <option value="10" <?php if ($_smarty_tpl->tpl_vars['filter']->value['round_to']==10) {?>  selected="selected"<?php }?>>10</option>
                <option value="100"<?php if ($_smarty_tpl->tpl_vars['filter']->value['round_to']==100) {?> selected="selected"<?php }?>>100</option>
            </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="elm_filter_display_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("display_type");?>
</label>
            <div class="controls">
            <select name="filter_data[display]" id="elm_filter_display_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
                <option value="Y" <?php if ($_smarty_tpl->tpl_vars['filter']->value['display']=='Y') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->__("expanded");?>
</option>
                <option value="N" <?php if ($_smarty_tpl->tpl_vars['filter']->value['display']=='N') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->__("minimized");?>
</option>
            </select>
            </div>
        </div>

        <div class="control-group <?php if (!($_smarty_tpl->tpl_vars['filter']->value['feature_id']||$_smarty_tpl->tpl_vars['filter_fields']->value[$_smarty_tpl->tpl_vars['filter']->value['field_type']]['is_range']||$_smarty_tpl->tpl_vars['filter']->value['feature']=='Vendor')) {?> hidden<?php }?>" id="display_count_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_container">
            <label class="control-label" for="elm_filter_display_count_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("display_variants_count");?>
</label>
            <div class="controls">
            <input type="text" id="elm_filter_display_count_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="filter_data[display_count]" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['filter']->value['display_count'])===null||$tmp==='' ? "10" : $tmp), ENT_QUOTES, 'UTF-8');?>
" />
            </div>
        </div>
    </fieldset>
    </div>

    <div class="hidden" id="content_tab_categories_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php echo $_smarty_tpl->getSubTemplate ("pickers/categories/picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('company_ids'=>$_smarty_tpl->tpl_vars['picker_selected_companies']->value,'multiple'=>true,'input_name'=>"filter_data[categories_path]",'item_ids'=>$_smarty_tpl->tpl_vars['filter']->value['categories_path'],'data_id'=>"category_ids_".((string)$_smarty_tpl->tpl_vars['id']->value),'no_item_text'=>__("text_all_categories_included"),'use_keys'=>"N",'owner_company_id'=>$_smarty_tpl->tpl_vars['filter']->value['company_id'],'but_meta'=>"pull-right"), 0);?>

    </div>
</div>

<div class="buttons-container">
    <?php if (fn_allowed_for("ULTIMATE")&&!$_smarty_tpl->tpl_vars['allow_save']->value) {?>
        <?php $_smarty_tpl->tpl_vars["hide_first_button"] = new Smarty_variable(true, null, 0);?>
    <?php }?>
    <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[product_filters.update]",'cancel_action'=>"close",'hide_first_button'=>$_smarty_tpl->tpl_vars['hide_first_button']->value,'save'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

</div>

</form>
<!--content_group<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>

<?php if (!$_smarty_tpl->tpl_vars['id']->value) {?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    fn_check_product_filter_type(Tygh.$('#elm_filter_filter_by_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
').val(), 'tab_variants_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
', '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
');
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<?php }} ?>
