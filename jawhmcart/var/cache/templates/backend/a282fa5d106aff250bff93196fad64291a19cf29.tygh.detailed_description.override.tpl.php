<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:35:13
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/blog/hooks/pages/detailed_description.override.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25139891456e677c1e71ac1-21548611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a282fa5d106aff250bff93196fad64291a19cf29' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/blog/hooks/pages/detailed_description.override.tpl',
      1 => 1457504516,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '25139891456e677c1e71ac1-21548611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_type' => 0,
    'page_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677c1ef3e00_03348214',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677c1ef3e00_03348214')) {function content_56e677c1ef3e00_03348214($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('post_description','ttc_post_description','description'));
?>
        <?php if ($_smarty_tpl->tpl_vars['page_type']->value!=@constant('PAGE_TYPE_LINK')) {?>
        <div class="control-group">
            <?php if ($_smarty_tpl->tpl_vars['page_type']->value==@constant('PAGE_TYPE_BLOG')) {?>
            <label class="control-label" for="elm_page_descr"><?php echo $_smarty_tpl->__("post_description");
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>__("ttc_post_description")), 0);?>
:</label>
            <?php } else { ?>
            <label class="control-label" for="elm_page_descr"><?php echo $_smarty_tpl->__("description");?>
:</label>
            <?php }?>
            <div class="controls">
                <textarea id="elm_page_descr" name="page_data[description]" cols="55" rows="8" class="cm-wysiwyg input-large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_data']->value['description'], ENT_QUOTES, 'UTF-8');?>
</textarea>
            </div>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['page_type']->value==@constant('PAGE_TYPE_LINK')) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("views/pages/components/pages_link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
<?php }} ?>
