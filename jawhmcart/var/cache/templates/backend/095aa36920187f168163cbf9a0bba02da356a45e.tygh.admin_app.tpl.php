<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:13:48
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/admin_app.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115354766756e68edc5e2777-97405446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '095aa36920187f168163cbf9a0bba02da356a45e' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/admin_app.tpl',
      1 => 1457504452,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '115354766756e68edc5e2777-97405446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hide_header' => 0,
    'images_dir' => 0,
    'img_lang' => 0,
    'is_on_saas' => 0,
    'connected_access_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e68edc6617e3_16034938',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e68edc6617e3_16034938')) {function content_56e68edc6617e3_16034938($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('twgadmin_mobile_admin_application','twgadmin_download_app','twgadmin_download_app_hint','twgadmin_connect_to_first_ult','twgadmin_qr_for_admin','twgadmin_qr_for_admin_comment'));
?>
<div id="twg_admin_app">

<?php echo $_smarty_tpl->getSubTemplate ("addons/twigmo/settings/components/contact_twigmo_support.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if (!$_smarty_tpl->tpl_vars['hide_header']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("twgadmin_mobile_admin_application")), 0);?>

<?php }?>

<fieldset>

<?php $_smarty_tpl->tpl_vars["img_lang"] = new Smarty_variable("en", null, 0);?>
<?php if (@constant('CART_LANGUAGE')=='ru') {?>
    <?php $_smarty_tpl->tpl_vars["img_lang"] = new Smarty_variable("ru", null, 0);?>
<?php }?>

<div class="control-group form-field">
    <label class="control-label"><?php echo $_smarty_tpl->__("twgadmin_download_app");?>
:</label>
    <div class="controls">
        <a target="_blank" href="//itunes.apple.com/us/app/twigmo-admin-2.0/id895364611">
            <span class="twg-app-store-btn float-left"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/addons/twigmo/images/buttons/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img_lang']->value, ENT_QUOTES, 'UTF-8');?>
/app-store.png"></span>
        </a>
        <a target="_blank" href="//play.google.com/store/apps/details?id=com.simtech.twigmoAdmin">
            <span class="twg-google-play-btn float-left"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/addons/twigmo/images/buttons/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img_lang']->value, ENT_QUOTES, 'UTF-8');?>
/google-play.png"></span>
        </a>
        <?php if (!$_smarty_tpl->tpl_vars['is_on_saas']->value) {?>
            <div class="twg-app-label"><?php echo $_smarty_tpl->__("twgadmin_download_app_hint");?>
</div>
        <?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['connected_access_id']->value) {?>
            <div class="twg-app-label"><?php echo $_smarty_tpl->__("twgadmin_connect_to_first_ult");?>
</div>
        <?php }?>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['connected_access_id']->value) {?>
    <div class="control-group form-field">
        <label class="control-label"><?php echo $_smarty_tpl->__("twgadmin_qr_for_admin");?>
:</label>
        <div class="controls">
            <img style="width: 200px" src="<?php echo htmlspecialchars(fn_url('twigmo_admin_app.show_qr'), ENT_QUOTES, 'UTF-8');?>
" />
            <div class="twg-app-label"><?php echo $_smarty_tpl->__("twgadmin_qr_for_admin_comment",array("[access_id]"=>$_smarty_tpl->tpl_vars['connected_access_id']->value));?>
</div>
        </div>
    </div>
<?php }?>

</fieldset>

<!--twg_admin_app--></div>
<?php }} ?>
