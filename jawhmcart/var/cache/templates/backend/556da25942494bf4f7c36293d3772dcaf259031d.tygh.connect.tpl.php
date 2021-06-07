<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:13:47
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/connect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145778996456e68edbe33563-90355384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '556da25942494bf4f7c36293d3772dcaf259031d' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/connect.tpl',
      1 => 1457504452,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '145778996456e68edbe33563-90355384',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_access_id' => 0,
    'tw_settings' => 0,
    'user_info' => 0,
    'tw_email' => 0,
    'reset_pass_link' => 0,
    'twg_all_stores_connected' => 0,
    'twg_is_connected' => 0,
    'is_on_saas' => 0,
    'is_disconnect_mode' => 0,
    'stores' => 0,
    'store' => 0,
    'images_dir' => 0,
    'platinum_stores' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e68edc17b271_98152134',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e68edc17b271_98152134')) {function content_56e68edc17b271_98152134($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/html/jawhmcart/app/lib/vendor/smarty/smarty/libs/plugins/modifier.escape.php';
if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
?><?php
fn_preload_lang_vars(array('twgadmin_manage_settings','twgadmin_connect_your_store','email','tt_addons_twigmo_settings_connect_email','password','tt_addons_twigmo_settings_connect_password','forgot_password_question','twgadmin_stores','tt_addons_twigmo_settings_connect_twgadmin_stores','check_uncheck_all','store','twgadmin_access_id','plan','status','twgadmin_disconnect','twgadmin_connected','twgadmin_disconnected','twgadmin_connect','twgadmin_disconnect_whole','twgadmin_disconnect','twgadmin_open_cp','twgadmin_about','twgadmin_addon_version','twgadmin_on_social'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("addons/twigmo/settings/components/contact_twigmo_support.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['admin_access_id']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("twgadmin_manage_settings")), 0);?>

<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("twgadmin_connect_your_store")), 0);?>

<?php }?>

<fieldset>

<div id="connect_settings">

    <input type="hidden" name="result_ids" value="connect_settings,storefront_settings,addon_upgrade,twg_admin_app"/>

    <?php $_smarty_tpl->tpl_vars["tw_email"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['tw_settings']->value['email'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user_info']->value['email'] : $tmp), null, 0);?>

    <div class="control-group">
        <label <?php if (!$_smarty_tpl->tpl_vars['admin_access_id']->value) {?>class="cm-required cm-email"<?php }?> for="elm_tw_email"><?php echo $_smarty_tpl->__("email");
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>__("tt_addons_twigmo_settings_connect_email")), 0);?>
:</label>
        <div class="controls">
            <?php if ($_smarty_tpl->tpl_vars['admin_access_id']->value) {?>
                <div class="twg-text-value"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tw_email']->value, ENT_QUOTES, 'UTF-8');?>
</div>
            <?php } else { ?>
                <input type="text" id="elm_tw_email" name="tw_register[email]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tw_email']->value, ENT_QUOTES, 'UTF-8');?>
" class="input-text-large" size="60" />
            <?php }?>
        </div>
    </div>

    <?php if (!$_smarty_tpl->tpl_vars['admin_access_id']->value) {?>
        <div class="control-group">
            <label for="elm_tw_password" class="cm-required"><?php echo $_smarty_tpl->__("password");
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>__("tt_addons_twigmo_settings_connect_password")), 0);?>
:</label>
            <div class="controls">
                <input type="password" id="elm_tw_password" name="tw_register[password]" class="input-text-large" size="32" maxlength="32" value="" autocomplete="off" />
                <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("forgot_password_question"),'but_href'=>$_smarty_tpl->tpl_vars['reset_pass_link']->value,'but_id'=>"elm_reset_tw_password",'but_role'=>"link",'but_target'=>"_blank"), 0);?>

            </div>
        </div>
    <?php }?>

    <div class="control-group">
        <label <?php if (!$_smarty_tpl->tpl_vars['twg_all_stores_connected']->value) {?>class="cm-required cm-multiple-checkboxes"<?php }?> for="stores_list"><?php echo $_smarty_tpl->__("twgadmin_stores");
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>__("tt_addons_twigmo_settings_connect_twgadmin_stores")), 0);?>
:</label>
        <div class="controls">
            <table class="table twg-stores" cellpadding="0" cellspacing="0" id="stores_list">
                <tr>
                    <?php if (!$_smarty_tpl->tpl_vars['twg_all_stores_connected']->value) {?>
                        <th>
                            <input type="checkbox" class="checkbox cm-check-items" id="check_all_twg_stores" name="check_all" checked="checked" title="<?php echo $_smarty_tpl->__("check_uncheck_all");?>
">
                        </th>
                    <?php }?>
                    <th>
                        <?php echo $_smarty_tpl->__("store");?>

                    </th>
                    <?php if ($_smarty_tpl->tpl_vars['twg_is_connected']->value) {?>
                        <th>
                            <?php echo $_smarty_tpl->__("twgadmin_access_id");?>

                        </th>
                        <?php if (!$_smarty_tpl->tpl_vars['is_on_saas']->value) {?>
                            <th>
                                <?php echo $_smarty_tpl->__("plan");?>

                            </th>
                        <?php }?>
                    <?php }?>
                    <th>
                        <?php echo $_smarty_tpl->__("status");?>

                    </th>
                    <?php if ($_smarty_tpl->tpl_vars['is_disconnect_mode']->value) {?>
                        <th>
                            <?php echo $_smarty_tpl->__("twgadmin_disconnect");?>

                        </th>
                    <?php }?>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['store'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['store']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['store']->key => $_smarty_tpl->tpl_vars['store']->value) {
$_smarty_tpl->tpl_vars['store']->_loop = true;
?>
                    <tr class="table-row">
                        <?php if (!$_smarty_tpl->tpl_vars['twg_all_stores_connected']->value) {?>
                            <td>
                                <?php if (!$_smarty_tpl->tpl_vars['store']->value['is_connected']) {?>
                                    <input type="checkbox" id="store_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
" checked="checked" class="checkbox cm-item cm-required form-checkbox" name="tw_register[stores][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
">
                                <?php }?>
                            </td>
                        <?php }?>
                        <td title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['clear_url'], ENT_QUOTES, 'UTF-8');?>
">
                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['company'], ENT_QUOTES, 'UTF-8');?>

                        </td>
                        <?php if ($_smarty_tpl->tpl_vars['twg_is_connected']->value) {?>
                            <td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['access_id'], ENT_QUOTES, 'UTF-8');?>

                            </td>
                            <?php if (!$_smarty_tpl->tpl_vars['is_on_saas']->value) {?>
                                <td>
                                    <?php echo htmlspecialchars(smarty_modifier_escape($_smarty_tpl->tpl_vars['store']->value['plan_display_name'], false), ENT_QUOTES, 'UTF-8');?>

                                </td>
                            <?php }?>
                        <?php }?>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['store']->value['is_connected']) {?>
                                <span class="twg-connected"><?php echo $_smarty_tpl->__("twgadmin_connected");?>
</span>
                            <?php } else { ?>
                                <span class="twg-disconnected"><?php echo $_smarty_tpl->__("twgadmin_disconnected");?>
</span>
                            <?php }?>
                        </td>
                        <?php if ($_smarty_tpl->tpl_vars['is_disconnect_mode']->value) {?>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['store']->value['is_connected']) {?>
                                    <input type="checkbox" class="checkbox" name="disconnect_stores[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
">
                                <?php }?>
                            </td>
                        <?php }?>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <?php if (!$_smarty_tpl->tpl_vars['admin_access_id']->value) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("addons/twigmo/settings/components/connect/license.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>


    <?php if (!$_smarty_tpl->tpl_vars['twg_all_stores_connected']->value) {?>
        <div class="control-group">
            <div class="controls">
                <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_role'=>"submit",'but_meta'=>"btn-primary cm-skip-avail-switch",'but_name'=>"dispatch[addons.tw_connect]",'but_text'=>__("twgadmin_connect"),'but_target_id'=>"connect_settings"), 0);?>

            </div>
        </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['is_disconnect_mode']->value) {?>
        <div class="control-group">
            <div class="controls">
                <label for="elm_tw_disconnect_admin"><?php echo $_smarty_tpl->__("twgadmin_disconnect_whole");?>
:</label>
                <input type="hidden" name="disconnect_admin" value="N" />
                <input type="checkbox" class="checkbox" id="elm_tw_disconnect_admin" name="disconnect_admin" value="Y" />
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_role'=>"submit",'but_meta'=>"cm-confirm cm-skip-avail-switch",'but_name'=>"dispatch[addons.tw_disconnect]",'but_text'=>__("twgadmin_disconnect"),'but_target_id'=>"connect_settings"), 0);?>

            </div>
        </div>
    <?php }?>


    <?php if ($_smarty_tpl->tpl_vars['admin_access_id']->value) {?>
        <div class="control-group">
            <div class="controls">
                <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_role'=>"submit",'but_meta'=>"btn-primary cm-new-window",'but_name'=>"dispatch[addons.tw_svc_auth_cp]",'but_text'=>__("twgadmin_open_cp")), 0);?>

            </div>
        </div>
    <?php }?>

    <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("twgadmin_about")), 0);?>


    <div class="control-group">
        <label for="version"><?php echo $_smarty_tpl->__("twgadmin_addon_version");?>
:</label>
        <div class="controls">
            <div class="twg-text-value" id="version"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['tw_settings']->value['version'])===null||$tmp==='' ? @constant('TWIGMO_VERSION') : $tmp), ENT_QUOTES, 'UTF-8');?>
</div>
        </div>
    </div>

    <div class="control-group">
        <label for="social_links"><?php echo $_smarty_tpl->__("twgadmin_on_social");?>
:</label>
        <div id="social_links" class="controls">
            <a target="_blank" href="//facebook.com/twigmo">
                <span class="facebook-btn"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/addons/twigmo/images/buttons/facebook.png"></span>
            </a>
            <a target="_blank" href="//twitter.com/twigmo">
                <span class="twitter-btn"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/addons/twigmo/images/buttons/twitter.png"></span>
            </a>
        </div>
    </div>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    //<![CDATA[
    var twg_is_connected = <?php if ($_smarty_tpl->tpl_vars['twg_is_connected']->value) {?>true<?php } else { ?>false<?php }?>;
    var has_platinum_stores = <?php if (count($_smarty_tpl->tpl_vars['platinum_stores']->value)) {?>true<?php } else { ?>false<?php }?>;
    
        $(document).ready(function () {
            $('#twigmo_storefront,#twigmo_admin_app').toggle(twg_is_connected);
            $('#twigmo_twg_push').toggle(twg_is_connected && has_platinum_stores);
            var $store_checkboxes = $('#stores_list input.form-checkbox');
            var $select_all_checkbox = $('#check_all_twg_stores');
            $store_checkboxes.on('click', function() {
                if (!$store_checkboxes.filter(':checked').size()) {
                    $select_all_checkbox.attr('checked', false);
                }
            });
        });
    
    //]]>
    <?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!--connect_settings--></div>

</fieldset>
<?php }} ?>
