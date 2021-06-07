<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:37:02
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/cart/cart_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206965847556e6782edc40d3-48808188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9421820194d58c063f7d61910e2ae0b53eca09e6' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/cart/cart_list.tpl',
      1 => 1457504374,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '206965847556e6782edc40d3-48808188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'carts_list' => 0,
    'search' => 0,
    'c_url' => 0,
    'customer' => 0,
    'ldelim' => 0,
    'rdelim' => 0,
    'settings' => 0,
    'user_js_id' => 0,
    'cart_products_js_id' => 0,
    'sl_user_id' => 0,
    'cart_products' => 0,
    'product' => 0,
    'user_info_js_id' => 0,
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6782f468ac4_09901499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6782f468ac4_09901499')) {function content_56e6782f468ac4_09901499($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.date_format.php';
?><?php
fn_preload_lang_vars(array('expand_collapse_list','expand_collapse_list','expand_collapse_list','expand_collapse_list','customer','date','cart_content','ip','expand_sublist_of_items','expand_sublist_of_items','collapse_sublist_of_items','collapse_sublist_of_items','expand_sublist_of_items','expand_sublist_of_items','collapse_sublist_of_items','collapse_sublist_of_items','unregistered_customer','product_s','product','quantity','price','deleted_product','total','user_info','email','first_name','last_name','billing_address','first_name','last_name','address','address_2','city','state','country','zip_postal_code','shipping_address','first_name','last_name','address','address_2','city','state','country','zip_postal_code','no_data','delete_all_found','users_carts'));
?>
<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" target="" name="carts_list_form">

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('save_current_url'=>true), 0);?>


<?php $_smarty_tpl->tpl_vars["c_url"] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['config']->value['current_url'],"sort_by","sort_order"), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['carts_list']->value) {?>
<table class="table table-sort table-middle">
<thead>
<tr>
    <th width="1%">
        <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</th>
    <th width="20%">
        <span id="off_carts" alt="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" title="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" class="hidden hand cm-combinations-carts"/><span class="exicon-collapse"></span></span>
        <span id="on_carts" alt="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" title="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" class="cm-combinations-carts"><span class="exicon-expand"></span></span>
        <a class="cm-ajax<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="customer") {?> sort-link-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['sort_order_rev'], ENT_QUOTES, 'UTF-8');
}?>" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=customer&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("customer");?>
</a>
    </th>
    <th width="10%"><a class="cm-ajax<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="date") {?> sort-link-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['sort_order_rev'], ENT_QUOTES, 'UTF-8');
}?>" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=date&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("date");?>
</a></th>
    <th width="10%"><?php echo $_smarty_tpl->__("cart_content");?>
</th>
    <th width="10%"><?php echo $_smarty_tpl->__("ip");?>
</th>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"cart:items_list_header")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"cart:items_list_header"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"cart:items_list_header"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</tr>
</thead>
<?php  $_smarty_tpl->tpl_vars["customer"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["customer"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carts_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["customer"]->key => $_smarty_tpl->tpl_vars["customer"]->value) {
$_smarty_tpl->tpl_vars["customer"]->_loop = true;
?>
<tr>
    <td>
        <?php if (fn_allowed_for("ULTIMATE")) {?>
            <input type="checkbox" name="user_ids[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-item" /></td>
        <?php }?>
        <?php if (!fn_allowed_for("ULTIMATE")) {?>
            <input type="checkbox" name="user_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-item" /></td>
        <?php }?>
    <td>
        <?php if (fn_allowed_for("ULTIMATE")) {?>
            <span alt="<?php echo $_smarty_tpl->__("expand_sublist_of_items");?>
" title="<?php echo $_smarty_tpl->__("expand_sublist_of_items");?>
" id="on_user_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-combination-carts" onclick="Tygh.$.ceAjax('request', '<?php echo fn_url("cart.cart_list?user_id=".((string)$_smarty_tpl->tpl_vars['customer']->value['user_id'])."&c_company_id=".((string)$_smarty_tpl->tpl_vars['customer']->value['company_id']));?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>
result_ids: 'cart_products_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
,wishlist_products_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
', caching: true<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);"><span class="exicon-expand"></span></span>
            <span alt="<?php echo $_smarty_tpl->__("collapse_sublist_of_items");?>
" title="<?php echo $_smarty_tpl->__("collapse_sublist_of_items");?>
" id="off_user_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
" class="hidden cm-combination-carts"><span class="exicon-collapse"></span></span>
        <?php }?>

        <?php if (!fn_allowed_for("ULTIMATE")) {?>
            <span alt="<?php echo $_smarty_tpl->__("expand_sublist_of_items");?>
" title="<?php echo $_smarty_tpl->__("expand_sublist_of_items");?>
" id="on_user_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-combination-carts" onclick="Tygh.$.ceAjax('request', '<?php echo fn_url("cart.cart_list?user_id=".((string)$_smarty_tpl->tpl_vars['customer']->value['user_id']));?>
', <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ldelim']->value, ENT_QUOTES, 'UTF-8');?>
result_ids: 'cart_products_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
,wishlist_products_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
', caching: true<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rdelim']->value, ENT_QUOTES, 'UTF-8');?>
);"><span class="exicon-expand"></span></span>
            <span alt="<?php echo $_smarty_tpl->__("collapse_sublist_of_items");?>
" title="<?php echo $_smarty_tpl->__("collapse_sublist_of_items");?>
" id="off_user_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
" class="hidden cm-combination-carts"><span class="exicon-collapse"></span></span>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['customer']->value['user_data']['email']) {?><a href="<?php echo htmlspecialchars(fn_url("profiles.update?user_id=".((string)$_smarty_tpl->tpl_vars['customer']->value['user_id'])), ENT_QUOTES, 'UTF-8');?>
" class="underlined"><?php if ($_smarty_tpl->tpl_vars['customer']->value['firstname']||$_smarty_tpl->tpl_vars['customer']->value['lastname']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['lastname'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['firstname'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['user_data']['email'], ENT_QUOTES, 'UTF-8');
}?></a><?php } else {
echo $_smarty_tpl->__("unregistered_customer");
}?>
        <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_name.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object'=>$_smarty_tpl->tpl_vars['customer']->value), 0);?>

    </td>
    <td>
        <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['customer']->value['date'],$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format']), ENT_QUOTES, 'UTF-8');?>

    </td>
    <td><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['customer']->value['cart_products'])===null||$tmp==='' ? "0" : $tmp), ENT_QUOTES, 'UTF-8');?>
 <?php echo $_smarty_tpl->__("product_s");?>
</td>
    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['ip_address'], ENT_QUOTES, 'UTF-8');?>
</td>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"cart:items_list")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"cart:items_list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"cart:items_list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</tr>
<?php $_smarty_tpl->tpl_vars["user_js_id"] = new Smarty_variable("user_".((string)$_smarty_tpl->tpl_vars['customer']->value['user_id']), null, 0);?>
<?php if (fn_allowed_for("ULTIMATE")) {?>
    <?php $_smarty_tpl->tpl_vars["user_js_id"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['user_js_id']->value)."_".((string)$_smarty_tpl->tpl_vars['customer']->value['company_id']), null, 0);?>
<?php }?>
<tbody id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_js_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="hidden row-more">
<tr class="no-border">
    <td>&nbsp;</td>
    <td colspan="3" class="row-more-body top row-gray">
        <?php $_smarty_tpl->tpl_vars["cart_products_js_id"] = new Smarty_variable("cart_products_".((string)$_smarty_tpl->tpl_vars['customer']->value['user_id']), null, 0);?>
        <?php if (fn_allowed_for("ULTIMATE")) {?>
            <?php $_smarty_tpl->tpl_vars["cart_products_js_id"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['cart_products_js_id']->value)."_".((string)$_smarty_tpl->tpl_vars['customer']->value['company_id']), null, 0);?>
        <?php }?>
        <span id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_products_js_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php if ($_smarty_tpl->tpl_vars['customer']->value['user_id']==$_smarty_tpl->tpl_vars['sl_user_id']->value) {?>
            <?php $_smarty_tpl->tpl_vars["products"] = new Smarty_variable($_smarty_tpl->tpl_vars['cart_products']->value, null, 0);?>
            <?php $_smarty_tpl->tpl_vars["show_price"] = new Smarty_variable(true, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['cart_products']->value) {?>
            <table class="table table-condensed">
            <thead>
            <tr class="no-hover">
                <th><?php echo $_smarty_tpl->__("product");?>
</th>
                <th class="center"><?php echo $_smarty_tpl->__("quantity");?>
</th>
                <th class="right"><?php echo $_smarty_tpl->__("price");?>
</th>
            </tr>
            </thead>
            <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"cart:product_row")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"cart:product_row"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if (!$_smarty_tpl->tpl_vars['product']->value['extra']['extra']['parent']) {?>
            <tr>
                <td>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['item_type']=="P") {?>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['product']) {?>
                    <a href="<?php echo htmlspecialchars(fn_url("products.update?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['product'];?>
</a>
                    <?php } else { ?>
                    <?php echo $_smarty_tpl->__("deleted_product");?>

                    <?php }?>
                <?php }?>
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"cart:products_list")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"cart:products_list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"cart:products_list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </td>
                <td class="center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['amount'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td class="right"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'span_id'=>"c_".((string)$_smarty_tpl->tpl_vars['customer']->value['user_id'])."_".((string)$_smarty_tpl->tpl_vars['product']->value).".item_id"), 0);?>
</td>
            </tr>
            <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"cart:product_row"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php } ?>
            <tr>
                <td class="right"><span><?php echo $_smarty_tpl->__("total");?>
:</span></td>
                <td class="center"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value['cart_all_products'], ENT_QUOTES, 'UTF-8');?>
</span></td>
                <td class="right"><span><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['customer']->value['total'],'span_id'=>"u_".((string)$_smarty_tpl->tpl_vars['customer']->value).".user_id"), 0);?>
</span></td>
            </tr>
            </table>
            <?php }?>
        <?php }?>
        <!--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_products_js_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
        <?php if ($_smarty_tpl->tpl_vars['customer']->value['user_data']) {?>
            <?php $_smarty_tpl->tpl_vars["user_data"] = new Smarty_variable($_smarty_tpl->tpl_vars['customer']->value['user_data'], null, 0);?>
            <?php $_smarty_tpl->tpl_vars["user_info_js_id"] = new Smarty_variable("user_info_".((string)$_smarty_tpl->tpl_vars['customer']->value['user_id']), null, 0);?>
            <?php if (fn_allowed_for("ULTIMATE")) {?>
                <?php $_smarty_tpl->tpl_vars["user_info_js_id"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['user_info_js_id']->value)."_".((string)$_smarty_tpl->tpl_vars['customer']->value['company_id']), null, 0);?>
            <?php }?>
            <div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_info_js_id']->value, ENT_QUOTES, 'UTF-8');?>
">

                <h4><?php echo $_smarty_tpl->__("user_info");?>
</h4>
                <dl>
                    <dt><?php echo $_smarty_tpl->__("email");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['email'], ENT_QUOTES, 'UTF-8');?>
</dd>            
                    <dt><?php echo $_smarty_tpl->__("first_name");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['firstname'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("last_name");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['lastname'], ENT_QUOTES, 'UTF-8');?>
</dd>
                </dl>

                <h4><?php echo $_smarty_tpl->__("billing_address");?>
</h4>
                <dl>
                    <dt><?php echo $_smarty_tpl->__("first_name");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['b_firstname'], ENT_QUOTES, 'UTF-8');?>
</dd>            
                    <dt><?php echo $_smarty_tpl->__("last_name");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['b_lastname'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("address");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['b_address'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("address_2");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['b_address_2'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("city");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['b_city'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("state");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['b_state_descr'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("country");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['b_country_descr'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("zip_postal_code");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['b_zipcode'], ENT_QUOTES, 'UTF-8');?>
</dd>
                </dl>

                <h4><?php echo $_smarty_tpl->__("shipping_address");?>
</h4>
                <dl>
                    <dt><?php echo $_smarty_tpl->__("first_name");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['s_firstname'], ENT_QUOTES, 'UTF-8');?>
</dd>            
                    <dt><?php echo $_smarty_tpl->__("last_name");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['s_lastname'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("address");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['s_address'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("address_2");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['s_address_2'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("city");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['s_city'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("state");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['s_state_descr'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("country");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['s_country_descr'], ENT_QUOTES, 'UTF-8');?>
</dd>
                    <dt><?php echo $_smarty_tpl->__("zip_postal_code");?>
</dt>
                    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['s_zipcode'], ENT_QUOTES, 'UTF-8');?>
</dd>
                </dl>

            <!--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_info_js_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
        <?php }?>
    </td>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"cart:items_list_row")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"cart:items_list_row"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"cart:items_list_row"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</tr>
</tbody>
<?php } ?>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</form>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("sidebar", null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/saved_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"cart.cart_list",'view_type'=>"carts"), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("views/cart/components/carts_search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"cart.cart_list"), 0);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['carts_list']->value) {?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete",'text'=>__("delete_all_found"),'dispatch'=>"dispatch[cart.m_delete_all]",'form'=>"carts_list_form",'class'=>"cm-confirm cm-submit"));?>
</li>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[cart.m_delete]",'form'=>"carts_list_form"));?>
</li>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("users_carts"),'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'sidebar'=>Smarty::$_smarty_vars['capture']['sidebar']), 0);?>

<?php }} ?>
