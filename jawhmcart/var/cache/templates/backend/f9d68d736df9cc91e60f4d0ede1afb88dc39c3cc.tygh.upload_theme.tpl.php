<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:22:55
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/themes/components/upload_theme.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200554338656e666cfc2f065-87006818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9d68d736df9cc91e60f4d0ede1afb88dc39c3cc' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/themes/components/upload_theme.tpl',
      1 => 1457504499,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '200554338656e666cfc2f065-87006818',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'images_dir' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e666cfc7e795_59310759',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e666cfc7e795_59310759')) {function content_56e666cfc7e795_59310759($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('install_theme_text','marketplace_find_more','upload'));
?>
<div class="install-addon" id="theme_upload_container">
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="addon_upload_form" class="form-horizontal cm-ajax" enctype="multipart/form-data">
        <input type="hidden" name="result_ids" value="theme_upload_container" />
        <div class="install-addon-wrapper">
            <img class="install-addon-banner" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/addon_box.png" width="151px" height="141px" />

            <p class="install-addon-text"><?php echo $_smarty_tpl->__("install_theme_text",array('[exts]'=>implode(',',$_smarty_tpl->tpl_vars['config']->value['allowed_pack_exts'])));?>
</p>
            <?php echo $_smarty_tpl->getSubTemplate ("common/fileuploader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('var_name'=>"theme_pack[0]"), 0);?>


            <div class="marketplace">
                <p class="marketplace-link"> <?php echo $_smarty_tpl->__("marketplace_find_more",array("[href]"=>$_smarty_tpl->tpl_vars['config']->value['resources']['marketplace_url']));?>
 </p>
            </div>

        </div>

        <div class="buttons-container">
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[themes.upload]",'cancel_action'=>"close",'but_text'=>__("upload")), 0);?>

        </div>
    </form>
<!--theme_upload_container--></div>
<?php }} ?>
