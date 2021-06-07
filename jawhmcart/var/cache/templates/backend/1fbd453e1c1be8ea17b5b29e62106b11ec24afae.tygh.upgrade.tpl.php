<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:13:48
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/upgrade.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146573767656e68edc6db7a1-83667077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fbd453e1c1be8ea17b5b29e62106b11ec24afae' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/upgrade.tpl',
      1 => 1457504453,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '146573767656e68edc6db7a1-83667077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_on_saas' => 0,
    'next_version_info' => 0,
    'twg_is_connected' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e68edc719cc0_26422428',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e68edc719cc0_26422428')) {function content_56e68edc719cc0_26422428($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
?><div id="addon_upgrade">
<?php if (!$_smarty_tpl->tpl_vars['is_on_saas']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("addons/twigmo/settings/components/contact_twigmo_support.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__('upgrade')), 0);?>


    <?php if ($_smarty_tpl->tpl_vars['next_version_info']->value['next_version']&&$_smarty_tpl->tpl_vars['next_version_info']->value['next_version']!=@constant('TWIGMO_VERSION')) {?>
        <p><?php echo $_smarty_tpl->tpl_vars['next_version_info']->value['description'];?>
</p>

        <input type="submit" name="dispatch[upgrade_center.upgrade_twigmo]" value="<?php echo $_smarty_tpl->__('upgrade');?>
" class="cm-skip-validation btn btn-primary">

        <?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
        //<![CDATA[
        
        $(document).ready(function () {
            var upgradeIndicator = ' *';
            var $link = $('#twigmo_addon a');
            var oldHtml = $link.html().replace(upgradeIndicator, '');
            $link.html(oldHtml + upgradeIndicator);
        });
        
        //]]>
        <?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php } else { ?>
        <p><?php echo $_smarty_tpl->__('text_no_upgrades_available');?>
</p>
        <div class="buttons-container">
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[twigmo_updates.check]",'but_text'=>__('twgadmin_check_for_updates'),'but_role'=>"submit",'but_meta'=>"cm-ajax cm-skip-avail-switch"), 0);?>

            <?php if ($_smarty_tpl->tpl_vars['twg_is_connected']->value) {?>
                <input type="hidden" name="result_ids" value="addon_upgrade" />
            <?php }?>
        </div>
    <?php }?>
<?php } else { ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    //<![CDATA[
    $(document).ready(function () {
        $('#twigmo_addon').hide();
    });
    //]]>
    <?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<!--addon_upgrade--></div>
<?php }} ?>
