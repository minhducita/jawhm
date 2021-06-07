<?php /* Smarty version Smarty-3.1.21, created on 2016-03-09 13:15:16
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/blocks/our_brands.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130888087856dff7b4057889-90228144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1a3803204125d21f3c943adf6994439ab06224c' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/blocks/our_brands.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '130888087856dff7b4057889-90228144',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'block' => 0,
    'delim_width' => 0,
    'obj_prefix' => 0,
    'image_h' => 0,
    'text_h' => 0,
    'item_qty' => 0,
    'brands' => 0,
    'brand' => 0,
    'object_img' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56dff7b42e34a7_95755053',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dff7b42e34a7_95755053')) {function content_56dff7b42e34a7_95755053($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/html/jawhmcart/app/lib/vendor/smarty/smarty/libs/plugins/function.math.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
$_smarty_tpl->tpl_vars["obj_prefix"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000", null, 0);?>

<?php $_smarty_tpl->tpl_vars["delim_width"] = new Smarty_variable("50", null, 0);?>
<?php echo smarty_function_math(array('equation'=>"delim_w + image_w",'assign'=>"item_width",'image_w'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'delim_w'=>$_smarty_tpl->tpl_vars['delim_width']->value),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars["item_qty"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'], null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['outside_navigation']=="Y") {?>
    <div class="owl-theme ty-owl-controls">
        <div class="owl-controls clickable owl-controls-outside" id="owl_outside_nav_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
">
            <div class="owl-buttons">
                <div id="owl_prev_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
" class="owl-prev"><i class="ty-icon-left-open-thin"></i></div>
                <div id="owl_next_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
" class="owl-next"><i class="ty-icon-right-open-thin"></i></div>
            </div>
        </div>
    </div>
<?php }?>

<div id="scroll_list_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
" class="owl-carousel">
    <?php $_smarty_tpl->tpl_vars["image_h"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars["text_h"] = new Smarty_variable("65", null, 0);?>

    <?php echo smarty_function_math(array('equation'=>"item_qty + image_h + text_h",'assign'=>"item_height",'image_h'=>$_smarty_tpl->tpl_vars['image_h']->value,'text_h'=>$_smarty_tpl->tpl_vars['text_h']->value,'item_qty'=>$_smarty_tpl->tpl_vars['item_qty']->value),$_smarty_tpl);?>


    <?php  $_smarty_tpl->tpl_vars["brand"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["brand"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["brand"]->key => $_smarty_tpl->tpl_vars["brand"]->value) {
$_smarty_tpl->tpl_vars["brand"]->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable("scr_".((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000".((string)$_smarty_tpl->tpl_vars['brand']->value['variant_id']), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["object_img"] = new Smarty_variable($_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('class'=>"ty-grayscale",'image_width'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'images'=>$_smarty_tpl->tpl_vars['brand']->value['image_pair'],'no_ids'=>true,'lazy_load'=>true), 0));?>

            <div class="ty-center">
                <a href="<?php echo htmlspecialchars(fn_url("product_features.view?variant_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['variant_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['object_img']->value;?>
</a>
            </div>
    <?php } ?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("common/scroller_init.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('items'=>$_smarty_tpl->tpl_vars['brands']->value,'prev_selector'=>"#owl_prev_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value),'next_selector'=>"#owl_next_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value)), 0);
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/our_brands.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/our_brands.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
$_smarty_tpl->tpl_vars["obj_prefix"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000", null, 0);?>

<?php $_smarty_tpl->tpl_vars["delim_width"] = new Smarty_variable("50", null, 0);?>
<?php echo smarty_function_math(array('equation'=>"delim_w + image_w",'assign'=>"item_width",'image_w'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'delim_w'=>$_smarty_tpl->tpl_vars['delim_width']->value),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars["item_qty"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['item_quantity'], null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['block']->value['properties']['outside_navigation']=="Y") {?>
    <div class="owl-theme ty-owl-controls">
        <div class="owl-controls clickable owl-controls-outside" id="owl_outside_nav_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
">
            <div class="owl-buttons">
                <div id="owl_prev_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
" class="owl-prev"><i class="ty-icon-left-open-thin"></i></div>
                <div id="owl_next_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');?>
" class="owl-next"><i class="ty-icon-right-open-thin"></i></div>
            </div>
        </div>
    </div>
<?php }?>

<div id="scroll_list_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
" class="owl-carousel">
    <?php $_smarty_tpl->tpl_vars["image_h"] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars["text_h"] = new Smarty_variable("65", null, 0);?>

    <?php echo smarty_function_math(array('equation'=>"item_qty + image_h + text_h",'assign'=>"item_height",'image_h'=>$_smarty_tpl->tpl_vars['image_h']->value,'text_h'=>$_smarty_tpl->tpl_vars['text_h']->value,'item_qty'=>$_smarty_tpl->tpl_vars['item_qty']->value),$_smarty_tpl);?>


    <?php  $_smarty_tpl->tpl_vars["brand"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["brand"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["brand"]->key => $_smarty_tpl->tpl_vars["brand"]->value) {
$_smarty_tpl->tpl_vars["brand"]->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable("scr_".((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000".((string)$_smarty_tpl->tpl_vars['brand']->value['variant_id']), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["object_img"] = new Smarty_variable($_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('class'=>"ty-grayscale",'image_width'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'image_height'=>$_smarty_tpl->tpl_vars['block']->value['properties']['thumbnail_width'],'images'=>$_smarty_tpl->tpl_vars['brand']->value['image_pair'],'no_ids'=>true,'lazy_load'=>true), 0));?>

            <div class="ty-center">
                <a href="<?php echo htmlspecialchars(fn_url("product_features.view?variant_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['variant_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['object_img']->value;?>
</a>
            </div>
    <?php } ?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("common/scroller_init.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('items'=>$_smarty_tpl->tpl_vars['brands']->value,'prev_selector'=>"#owl_prev_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value),'next_selector'=>"#owl_next_".((string)$_smarty_tpl->tpl_vars['obj_prefix']->value)), 0);
}?><?php }} ?>
