<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:13:48
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25796082956e68edc2878f4-21422595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8cb339f665187b17158bf25b94a53f08be1c3ad' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/settings.tpl',
      1 => 1457504453,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '25796082956e68edc2878f4-21422595',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'tw_settings' => 0,
    'is_one_store_mode' => 0,
    'current_store_is_connected' => 0,
    'stores' => 0,
    'cat' => 0,
    'locations_info' => 0,
    'default_layout_id' => 0,
    'logo_object_id' => 0,
    'id' => 0,
    'default_logo' => 0,
    'favicon_object_id' => 0,
    'favicon' => 0,
    'store' => 0,
    'twg_is_connected' => 0,
    'store_is_selected' => 0,
    'select_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e68edc5d0214_03648319',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e68edc5d0214_03648319')) {function content_56e68edc5d0214_03648319($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
?><?php
fn_preload_lang_vars(array('twgadmin_manage_storefront_settings','twgadmin_use_mobile_frontend_for','twgadmin_phones','twgadmin_tablets','twgadmin_home_page_content','tt_addons_twigmo_settings_settings_twgadmin_home_page_content','twgadmin_home_page_blocks','twgadmin_tw_home_page_blocks','twgadmin_edit_these_blocks','twgadmin_edit_these_blocks','design','twgadmin_open_te','twgadmin_mobile_logo','twgadmin_mobile_favicon','twgadmin_enable_geolocation','tt_addons_twigmo_settings_settings_twgadmin_enable_geolocation','twgadmin_only_req_profile_fields','twgadmin_show_product_code','twgadmin_send_push','twgadmin_url_for_facebook','twgadmin_url_for_twitter','twgadmin_url_on_appstore','twgadmin_url_on_googleplay','twgadmin_connect_to_first_ult','twgadmin_select_store','select','twgadmin_connect_to_first_ult'));
?>
<div id="storefront_settings">

<?php echo $_smarty_tpl->getSubTemplate ("addons/twigmo/settings/components/contact_twigmo_support.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("twgadmin_manage_storefront_settings")), 0);?>


<?php if ($_smarty_tpl->tpl_vars['runtime']->value['forced_company_id']) {?>
    <?php $_smarty_tpl->tpl_vars["is_one_store_mode"] = new Smarty_variable(true, null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['customer_connections']&&($_smarty_tpl->tpl_vars['tw_settings']->value['customer_connections'][$_smarty_tpl->tpl_vars['runtime']->value['company_id']]['access_id']||$_smarty_tpl->tpl_vars['tw_settings']->value['customer_connections'][$_smarty_tpl->tpl_vars['runtime']->value['forced_company_id']]['access_id'])) {?>
    <?php $_smarty_tpl->tpl_vars["current_store_is_connected"] = new Smarty_variable(true, null, 0);?>
<?php }?>
<?php if (fn_allowed_for("ULTIMATE")&&($_smarty_tpl->tpl_vars['runtime']->value['company_id']||$_smarty_tpl->tpl_vars['is_one_store_mode']->value)) {?>
    <?php $_smarty_tpl->tpl_vars["store_is_selected"] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['current_store_is_connected']->value) {?>

<?php $_smarty_tpl->tpl_vars['store'] = new Smarty_variable(reset($_smarty_tpl->tpl_vars['stores']->value), null, 0);?>

<input type="hidden" name="result_ids" value="connect_settings,storefront_settings,addon_upgrade" />

<fieldset>
    
    <div class="control-group form-field">
        <label class="control-label"><?php echo $_smarty_tpl->__("twgadmin_use_mobile_frontend_for");?>
:</label>
        <div  class="controls">
            <label class="checkbox inline">
                <input type="hidden" name="tw_settings[use_for_phones]" value="N">
                <input type="checkbox" name="tw_settings[use_for_phones]" <?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['use_for_phones']=='Y') {?>checked="checked"<?php }?> value="Y">
                <?php echo $_smarty_tpl->__("twgadmin_phones");?>

            </label>
            <label class="checkbox inline">
                <input type="hidden" name="tw_settings[use_for_tablets]" value="N">
                <input type="checkbox" name="tw_settings[use_for_tablets]" <?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['use_for_tablets']=='Y') {?>checked="checked"<?php }?> value="Y">
                <?php echo $_smarty_tpl->__("twgadmin_tablets");?>

            </label>
        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label" for="elm_tw_home_page_content"><?php echo $_smarty_tpl->__("twgadmin_home_page_content");
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>__("tt_addons_twigmo_settings_settings_twgadmin_home_page_content")), 0);?>
:</label>
        <div class="controls">
                <select id="elm_tw_home_page_content" name="tw_settings[home_page_content]">
                        <option value="home_page_blocks" <?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['home_page_content']=="home_page_blocks") {?>selected="selected"<?php }?>>- <?php echo $_smarty_tpl->__("twgadmin_home_page_blocks");?>
 -</option>
                        <option value="tw_home_page_blocks" <?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['home_page_content']=="tw_home_page_blocks") {?>selected="selected"<?php }?>>- <?php echo $_smarty_tpl->__("twgadmin_tw_home_page_blocks");?>
 -</option>
                        <?php  $_smarty_tpl->tpl_vars["cat"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cat"]->_loop = false;
 $_from = fn_get_plain_categories_tree(0,false); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["cat"]->key => $_smarty_tpl->tpl_vars["cat"]->value) {
$_smarty_tpl->tpl_vars["cat"]->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['cat']->value['status']=="A") {?>
                                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value['category_id'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['home_page_content']==$_smarty_tpl->tpl_vars['cat']->value['category_id']) {?>selected="selected"<?php }?>><?php echo preg_replace('!^!m',str_repeat("&#166;&nbsp;&nbsp;&nbsp;&nbsp;",$_smarty_tpl->tpl_vars['cat']->value['level']),htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value['category'], ENT_QUOTES, 'UTF-8', true));?>
</option>
                                <?php }?>
                        <?php } ?>
                </select>
                <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("twgadmin_edit_these_blocks"),'but_href'=>"block_manager.manage&selected_location=".((string)$_smarty_tpl->tpl_vars['locations_info']->value['index'])."&s_layout=".((string)$_smarty_tpl->tpl_vars['default_layout_id']->value),'but_id'=>"elm_edit_home_page_blocks",'but_role'=>"link",'but_meta'=>"hidden",'but_target'=>"_blank"), 0);?>

                <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("twgadmin_edit_these_blocks"),'but_href'=>"block_manager.manage&selected_location=".((string)$_smarty_tpl->tpl_vars['locations_info']->value['twigmo'])."&s_layout=".((string)$_smarty_tpl->tpl_vars['default_layout_id']->value),'but_id'=>"elm_edit_tw_home_page_blocks",'but_role'=>"link",'but_meta'=>"hidden",'but_target'=>"_blank"), 0);?>

        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label"><?php echo $_smarty_tpl->__("design");?>
:</label>
        <div  class="controls">
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_role'=>"submit",'but_meta'=>"btn-primary cm-new-window",'but_name'=>"dispatch[addons.tw_svc_auth_te]",'but_text'=>__("twgadmin_open_te")), 0);?>

        </div>
    </div>

    
    <div class="form-field control-group">
        <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['logo_object_id']->value, null, 0);?>
        <input type="text" class="hidden" name="logo_image_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][type]" value="M">
        <input type="text" class="hidden" name="logo_image_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][object_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">

        <label class="control-label"><?php echo $_smarty_tpl->__("twgadmin_mobile_logo");?>
:</label>
        <div class="controls">
            <div class="float-left">
                <?php echo $_smarty_tpl->getSubTemplate ("common/fileuploader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('var_name'=>"logo_image_icon[".((string)$_smarty_tpl->tpl_vars['id']->value)."]",'image'=>true), 0);?>

            </div>
            <div class="float-left attach-images-alt logo-image">
                <img class="solid-border" src="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['tw_settings']->value['logo_url'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['default_logo']->value : $tmp), ENT_QUOTES, 'UTF-8');?>
" />
            </div>
        </div>
    </div>

    
    <div class="form-field control-group">
        <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['favicon_object_id']->value, null, 0);?>
        <input type="text" class="hidden" name="favicon_image_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][type]" value="M">
        <input type="text" class="hidden" name="favicon_image_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
][object_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">

        <label class="control-label"><?php echo $_smarty_tpl->__("twgadmin_mobile_favicon");?>
:</label>
        <div class="controls">
            <div class="float-left">
                <?php echo $_smarty_tpl->getSubTemplate ("common/fileuploader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('var_name'=>"favicon_image_icon[".((string)$_smarty_tpl->tpl_vars['id']->value)."]",'image'=>true), 0);?>

            </div>
            <div class="float-left attach-images-alt logo-image">
                <img class="solid-border" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['favicon']->value, ENT_QUOTES, 'UTF-8');?>
" />
            </div>
        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label" for="elm_tw_geolocation"><?php echo $_smarty_tpl->__("twgadmin_enable_geolocation");
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>__("tt_addons_twigmo_settings_settings_twgadmin_enable_geolocation")), 0);?>
:</label>
        <div  class="controls">
                <input type="hidden" name="tw_settings[geolocation]" value="N" />
                <span class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox" id="elm_tw_geolocation" name="tw_settings[geolocation]" value="Y" <?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['geolocation']!="N") {?>checked="checked"<?php }?> />
                </span>

        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label" for="elm_tw_only_req_profile_fields"><?php echo $_smarty_tpl->__("twgadmin_only_req_profile_fields");?>
:</label>
        <div  class="controls">
                <input type="hidden" name="tw_settings[only_req_profile_fields]" value="N" />
                <span class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox" id="elm_tw_only_req_profile_fields" name="tw_settings[only_req_profile_fields]" value="Y" <?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['only_req_profile_fields']=="Y") {?>checked="checked"<?php }?> />
                </span>
        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label" for="elm_tw_show_product_code"><?php echo $_smarty_tpl->__("twgadmin_show_product_code");?>
:</label>
        <div  class="controls">
            <input type="hidden" name="tw_settings[show_product_code]" value="N" />
            <span class="checkbox-wrapper">
                <input type="checkbox" class="checkbox" id="elm_tw_show_product_code" name="tw_settings[show_product_code]" value="Y" <?php if ($_smarty_tpl->tpl_vars['tw_settings']->value['show_product_code']=="Y") {?>checked="checked"<?php }?> />
            </span>
        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label" for="elm_tw_send_order_status_push"><?php echo $_smarty_tpl->__("twgadmin_send_push");?>
:</label>
        <div  class="controls">
            <?php if ($_smarty_tpl->tpl_vars['store']->value['is_connected']&&$_smarty_tpl->tpl_vars['store']->value['is_platinum']) {?>
                <input type="hidden" name="tw_settings[send_order_status_push]" value="N" />
            <?php }?>

            <span class="checkbox-wrapper">
                <input type="checkbox" class="checkbox" id="elm_tw_send_order_status_push" name="tw_settings[send_order_status_push]" value="Y" <?php if ($_smarty_tpl->tpl_vars['store']->value['send_order_status_push']=="Y") {?>checked="checked"<?php }?> <?php if (!$_smarty_tpl->tpl_vars['store']->value['is_connected']||!$_smarty_tpl->tpl_vars['store']->value['is_platinum']) {?>disabled="disabled"<?php }?> />
            </span>
        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label" for="elm_tw_url_for_facebook"><?php echo $_smarty_tpl->__("twgadmin_url_for_facebook");?>
:</label>
        <div  class="controls">
            <input id="elm_tw_url_for_facebook" type="text" name="tw_settings[url_for_facebook]" size="30" value="<?php echo $_smarty_tpl->tpl_vars['tw_settings']->value['url_for_facebook'];?>
" class="input-text" />
        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label" for="elm_tw_url_for_twitter"><?php echo $_smarty_tpl->__("twgadmin_url_for_twitter");?>
:</label>
        <div  class="controls">
            <input id="elm_tw_url_for_twitter" type="text" name="tw_settings[url_for_twitter]" size="30" value="<?php echo $_smarty_tpl->tpl_vars['tw_settings']->value['url_for_twitter'];?>
" class="input-text" />
        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label" for="elm_tw_url_for_appstore"><?php echo $_smarty_tpl->__("twgadmin_url_on_appstore");?>
:</label>
        <div  class="controls">
            <input id="elm_tw_url_on_appstore" type="text" name="tw_settings[url_on_appstore]" size="30" value="<?php echo $_smarty_tpl->tpl_vars['tw_settings']->value['url_on_appstore'];?>
" class="input-text" />
        </div>
    </div>

    
    <div class="form-field control-group">
        <label class="control-label" for="elm_tw_url_on_googleplay"><?php echo $_smarty_tpl->__("twgadmin_url_on_googleplay");?>
:</label>
        <div  class="controls">
            <input id="elm_tw_url_on_googleplay" type="text" name="tw_settings[url_on_googleplay]" size="30" value="<?php echo $_smarty_tpl->tpl_vars['tw_settings']->value['url_on_googleplay'];?>
" class="input-text" />
        </div>
    </div>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
>
    //<![CDATA[
    
    Tygh.$((function (_) {
        _('.form-field a.text-button-link').css({'margin': '0 0 0 10px'});
        _("#elm_tw_home_page_content").bind('change', function(){fn_tw_show_block_link();}).change();
        function fn_tw_show_block_link(){
            var value = _('#elm_tw_home_page_content option:selected').val();
            if ((value == 'home_page_blocks') || (value == 'tw_home_page_blocks')) {
                if (value == 'home_page_blocks') {
                    _('#elm_edit_home_page_blocks').show();
                    _('#elm_edit_tw_home_page_blocks').hide();
                } else {
                    _('#elm_edit_tw_home_page_blocks').show();
                    _('#elm_edit_home_page_blocks').hide();
                }
            } else {
                _('#elm_edit_home_page_blocks').hide();
                _('#elm_edit_tw_home_page_blocks').hide();
            }

            return true;
        }
    })(Tygh.$));
    
    //]]>
    <?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


</fieldset>

<?php } elseif (!$_smarty_tpl->tpl_vars['twg_is_connected']->value) {?>
    <?php echo $_smarty_tpl->__("twgadmin_connect_to_first_ult");?>

<?php } elseif (!$_smarty_tpl->tpl_vars['store_is_selected']->value&&fn_allowed_for("ULTIMATE")) {?>
    <?php echo $_smarty_tpl->__("twgadmin_select_store");?>
 - <?php echo $_smarty_tpl->getSubTemplate ("common/ajax_select_object.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data_url'=>"companies.get_companies_list?show_all=Y&action=href",'text'=>__("select"),'id'=>(($tmp = @$_smarty_tpl->tpl_vars['select_id']->value)===null||$tmp==='' ? "twg_top_company_id" : $tmp)), 0);?>

<?php } elseif (!$_smarty_tpl->tpl_vars['current_store_is_connected']->value) {?>
    <?php echo $_smarty_tpl->__("twgadmin_connect_to_first_ult");?>

<?php }?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    //<![CDATA[
    var current_store_is_connected = <?php if ($_smarty_tpl->tpl_vars['twg_is_connected']->value) {?>true<?php } else { ?>false<?php }?>;
    
    $(document).ready(function () {
        $('#twigmo_admin_app').toggle(current_store_is_connected);
    });
    
    //]]>
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<!--storefront_settings--></div>
<?php }} ?>
