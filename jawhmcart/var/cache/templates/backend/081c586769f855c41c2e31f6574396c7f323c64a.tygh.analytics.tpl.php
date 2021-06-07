<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:22:58
         compiled from "/var/www/html/jawhmcart/design/backend/templates/common/analytics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61038907356e666d2a1fd41-66030866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '081c586769f855c41c2e31f6574396c7f323c64a' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/common/analytics.tpl',
      1 => 1457504303,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '61038907356e666d2a1fd41-66030866',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e666d2a4e511_06299945',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e666d2a4e511_06299945')) {function content_56e666d2a4e511_06299945($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
?><!-- GA code -->
<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-40339423-1']);
    _gaq.push(['_setDomainName', '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['current_host'], ENT_QUOTES, 'UTF-8');?>
']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!-- GA code end -->
<?php }} ?>
