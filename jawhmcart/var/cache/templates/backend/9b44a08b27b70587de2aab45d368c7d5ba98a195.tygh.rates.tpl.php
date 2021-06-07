<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:37:59
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/shippings/components/rates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158726505156e694873cc1a3-70442957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b44a08b27b70587de2aab45d368c7d5ba98a195' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/shippings/components/rates.tpl',
      1 => 1457504496,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '158726505156e694873cc1a3-70442957',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'shipping' => 0,
    'rate' => 0,
    'rate_data' => 0,
    'destination_id' => 0,
    'k' => 0,
    'primary_currency' => 0,
    'currencies' => 0,
    'hide_for_vendor' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e69487a913d4_27335484',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e69487a913d4_27335484')) {function content_56e69487a913d4_27335484($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('show_rate_for_destination','cost_dependences','products_cost','rate_value','type','more_than','absolute','percent','no_items','more_than','absolute','percent','weight_dependences','products_weight','rate_value','type','per','more_than','absolute','percent','no_items','more_than','absolute','percent','items_dependences','products_amount','rate_value','type','per_item','more_than','items','items','absolute','percent','no_items','more_than','items','absolute','percent'));
?>
<input type="hidden" name="shipping_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="selected_section" value="shipping_charges" />

<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    (function(_, $) {
        $(function() {
            var tab = $('#dashboard-shipping');
            $('a[data-toggle="tab"]', tab).on('shown', function(e) {
            localStorage.setItem('tab-active', $(e.target).attr('href'));
          });

          var lastTab = localStorage.getItem('tab-active');
          if (lastTab) {
              $('a[href='+ lastTab +']', tab).click();
          }
      });
    }(Tygh, Tygh.$));
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="dashboard-shipping tabs cm-j-tabs" id="dashboard-shipping">
    <?php if ($_smarty_tpl->tpl_vars['shipping']->value['rate_calculation']=="M") {?>
    <p><?php echo $_smarty_tpl->__("show_rate_for_destination");?>
:</p>
    <ul class="nav nav-pills" id="dashboard-shipping-tab-menu">
        <?php  $_smarty_tpl->tpl_vars["rate"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["rate"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shipping']->value['rates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["rate"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["rate"]->key => $_smarty_tpl->tpl_vars["rate"]->value) {
$_smarty_tpl->tpl_vars["rate"]->_loop = true;
 $_smarty_tpl->tpl_vars["rate"]->index++;
 $_smarty_tpl->tpl_vars["rate"]->first = $_smarty_tpl->tpl_vars["rate"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["rates"]['first'] = $_smarty_tpl->tpl_vars["rate"]->first;
?>
            <li class="cm-js <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rates']['first']) {?> active<?php }?>">
                <a href="#destination_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rate']->value['destination_id'], ENT_QUOTES, 'UTF-8');?>
" data-toggle="tab"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rate']->value['destination'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['rate']->value['rate_defined']) {?>(+)<?php }?></a>
            </li>
        <?php } ?>
    </ul>
    <?php }?>
    <div class="tab-content">

        <?php  $_smarty_tpl->tpl_vars["rate_data"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["rate_data"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shipping']->value['rates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["rate_data"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["rate_data"]->key => $_smarty_tpl->tpl_vars["rate_data"]->value) {
$_smarty_tpl->tpl_vars["rate_data"]->_loop = true;
 $_smarty_tpl->tpl_vars["rate_data"]->index++;
 $_smarty_tpl->tpl_vars["rate_data"]->first = $_smarty_tpl->tpl_vars["rate_data"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["rates"]['first'] = $_smarty_tpl->tpl_vars["rate_data"]->first;
?>

        <?php if ($_smarty_tpl->tpl_vars['shipping']->value['rate_calculation']=="M") {?>
            <?php $_smarty_tpl->tpl_vars["destination_id"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['rate_data']->value['destination_id']), null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["destination_id"] = new Smarty_variable("0", null, 0);?>
        <?php }?>

        <div class="tab-pane<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rates']['first']) {?> active<?php }?>" id="destination_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("cost_dependences"),'meta'=>"clear"), 0);?>


            <table class="table table-middle">
                <thead>
                <tr class="cm-first-sibling">
                    <th width="1%"><?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('check_target'=>"cost-".((string)$_smarty_tpl->tpl_vars['destination_id']->value)), 0);?>
</th>
                    <th width="30%"><?php echo $_smarty_tpl->__("products_cost");?>
</th>
                    <th width="15%"><?php echo $_smarty_tpl->__("rate_value");?>
</th>
                    <th width="15%"><?php echo $_smarty_tpl->__("type");?>
</th>
                    <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:cost_dependences_head")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:cost_dependences_head"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:cost_dependences_head"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <?php  $_smarty_tpl->tpl_vars["rate"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["rate"]->_loop = false;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rate_data']->value['rate_value']['C']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["rate"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["rate"]->key => $_smarty_tpl->tpl_vars["rate"]->value) {
$_smarty_tpl->tpl_vars["rate"]->_loop = true;
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["rate"]->key;
 $_smarty_tpl->tpl_vars["rate"]->index++;
 $_smarty_tpl->tpl_vars["rate"]->first = $_smarty_tpl->tpl_vars["rate"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["rdf"]['first'] = $_smarty_tpl->tpl_vars["rate"]->first;
?>
                    <tr>
                        <td>
                            <input type="checkbox" name="delete_rate_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][C][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
]" value="Y" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>disabled="disabled"<?php }?> class="checkbox cm-item-cost-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
 cm-item" /></td>
                        <td class="nowrap">
                            <?php echo $_smarty_tpl->__("more_than");?>
&nbsp;
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>
                                <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][C][0][amount]" value="0" />
                                &nbsp;<?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>"0",'secondary_currency'=>$_smarty_tpl->tpl_vars['primary_currency']->value), 0);?>

                            <?php } else { ?>
                                <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>((string)$_smarty_tpl->tpl_vars['k']->value),'view'=>"input",'input_name'=>"shipping_data[rates][".((string)$_smarty_tpl->tpl_vars['destination_id']->value)."][rate_value][C][".((string)$_smarty_tpl->tpl_vars['k']->value)."][amount]",'class'=>"input-small input-hidden"), 0);?>

                            <?php }?>
                        </td>
                        <td>
                            <input type="text" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][C][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][value]" size="5" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['rate']->value['value'])===null||$tmp==='' ? "0" : $tmp), ENT_QUOTES, 'UTF-8');?>
" class="input-small input-hidden" /></td>
                        <td>
                            <select class="input-medium" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][C][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][type]">
                                <option value="F" <?php if ($_smarty_tpl->tpl_vars['rate']->value['type']=="F") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("absolute");?>
 (<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol'];?>
)</option>
                                <option value="P" <?php if ($_smarty_tpl->tpl_vars['rate']->value['type']=="P") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("percent");?>
 (%)</option>
                            </select></td>
                        <td><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:cost_dependences_body")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:cost_dependences_body"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:cost_dependences_body"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
                        <td class="nowrap right">
                            <div class="hidden-tools">
                                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>
                                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/remove_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_class'=>"cm-delete-row"), 0);?>

                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/remove_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('only_delete'=>'Y','but_class'=>"cm-delete-row"), 0);?>

                                <?php }?>

                            </div>
                        </td>
                    </tr>
                    <?php }
if (!$_smarty_tpl->tpl_vars["rate"]->_loop) {
?>
                    <tr class="no-items">
                        <td colspan="6">
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][C][0][amount]" value="0" />
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][C][0][value]" value="0" />
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][C][0][type]" value="F" />
                            <p><?php echo $_smarty_tpl->__("no_items");?>
</p></td>
                    </tr>
                <?php } ?>

                <?php if (!$_smarty_tpl->tpl_vars['hide_for_vendor']->value) {?>
                    <tr id="box_add_rate_celm_cost_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                        <td>
                            <input type="checkbox" disabled="disabled" value="Y" class="checkbox cm-item-cost cm-item" /></td>
                        <td>
                            <?php echo $_smarty_tpl->__("more_than");?>
&nbsp;<?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>'','view'=>"input",'input_name'=>"shipping_data[add_rates][".((string)$_smarty_tpl->tpl_vars['destination_id']->value)."][rate_value][C][0][amount]",'class'=>"input-small input-hidden"), 0);?>
</td>
                        <td>
                            <input type="text" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][C][0][value]" size="5" value="" class="input-small input-hidden" /></td>
                        <td>
                            <select class="input-medium" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][C][0][type]">
                                <option value="F"><?php echo $_smarty_tpl->__("absolute");?>
 (<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol'];?>
)</option>
                                <option value="P"><?php echo $_smarty_tpl->__("percent");?>
 (%)</option>
                            </select></td>
                        <td>
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:cost_dependences_new")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:cost_dependences_new"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:cost_dependences_new"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
                        <td class="right"> <div class="hidden-tools"><?php echo $_smarty_tpl->getSubTemplate ("buttons/multiple_buttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('item_id'=>"add_rate_celm_cost_".((string)$_smarty_tpl->tpl_vars['destination_id']->value),'tag_level'=>3), 0);?>
</div></td>
                    </tr>
                <?php }?>

            </table>


            <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("weight_dependences"),'meta'=>"clear"), 0);?>


            <table class="table table-middle">
                <thead>
                <tr class="cm-first-sibling">
                    <th width="1%"><?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('check_target'=>"weight-".((string)$_smarty_tpl->tpl_vars['destination_id']->value)), 0);?>
</th>
                    <th width="30%"><?php echo $_smarty_tpl->__("products_weight");?>
</th>
                    <th width="15%"><?php echo $_smarty_tpl->__("rate_value");?>
</th>
                    <th width="15%"><?php echo $_smarty_tpl->__("type");?>
</th>
                    <th width="10%"><?php echo $_smarty_tpl->__("per",array("[object]"=>$_smarty_tpl->tpl_vars['settings']->value['General']['weight_symbol']));?>
</th>
                    <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:weight_dependences_head")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:weight_dependences_head"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:weight_dependences_head"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <?php  $_smarty_tpl->tpl_vars["rate"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["rate"]->_loop = false;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rate_data']->value['rate_value']['W']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["rate"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["rate"]->key => $_smarty_tpl->tpl_vars["rate"]->value) {
$_smarty_tpl->tpl_vars["rate"]->_loop = true;
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["rate"]->key;
 $_smarty_tpl->tpl_vars["rate"]->index++;
 $_smarty_tpl->tpl_vars["rate"]->first = $_smarty_tpl->tpl_vars["rate"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["rdf"]['first'] = $_smarty_tpl->tpl_vars["rate"]->first;
?>
                    <tr>
                        <td>
                            <input type="checkbox" name="delete_rate_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][W][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
]" value="Y" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>disabled="disabled"<?php }?> class="checkbox cm-item-weight-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
 cm-item" /></td>
                        <td class="nowrap">
                            <?php echo $_smarty_tpl->__("more_than");?>
&nbsp;
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>
                                <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][0][amount]" value="0" />&nbsp;&nbsp;0 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['General']['weight_symbol'], ENT_QUOTES, 'UTF-8');?>

                            <?php } else { ?>
                                <input type="text" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" data-p-sign="s" data-a-sign=" <?php echo $_smarty_tpl->tpl_vars['settings']->value['General']['weight_symbol'];?>
" size="5" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-numeric input-small input-hidden" />
                            <?php }?>

                        </td>
                        <td>
                            <input type="text" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][value]" size="5" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['rate']->value['value'])===null||$tmp==='' ? "0" : $tmp), ENT_QUOTES, 'UTF-8');?>
" class="input-small input-hidden" /></td>
                        <td>
                            <select class="input-medium" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][type]">
                                <option value="F" <?php if ($_smarty_tpl->tpl_vars['rate']->value['type']=="F") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("absolute");?>
 (<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol'];?>
)</option>
                                <option value="P" <?php if ($_smarty_tpl->tpl_vars['rate']->value['type']=="P") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("percent");?>
 (%)</option>
                            </select></td>
                        <td>
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][per_unit]" value="N" />
                            <input type="checkbox" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][per_unit]" value="Y" <?php if ($_smarty_tpl->tpl_vars['rate']->value['per_unit']=="Y") {?>checked="checked"<?php }?> class="checkbox" />
                        </td>
                        <td><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:weight_dependences_body")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:weight_dependences_body"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:weight_dependences_body"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
                        <td class="nowrap right">
                            <div class="hidden-tools">
                                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>
                                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/remove_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_class'=>"cm-delete-row"), 0);?>

                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/remove_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('only_delete'=>'Y','but_class'=>"cm-delete-row"), 0);?>

                                <?php }?>

                            </div>
                        </td>
                    </tr>
                    <?php }
if (!$_smarty_tpl->tpl_vars["rate"]->_loop) {
?>
                    <tr class="no-items">
                        <td colspan="6">
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][0][amount]" value="0" />
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][0][value]" value="0" />
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][0][type]" value="F" />
                            <p><?php echo $_smarty_tpl->__("no_items");?>
</p></td>
                    </tr>
                <?php } ?>

                <?php if (!$_smarty_tpl->tpl_vars['hide_for_vendor']->value) {?>
                    <tr id="box_add_rate_celm_weight_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                        <td>
                            <input type="checkbox" disabled="disabled" value="Y" class="checkbox cm-item-weight cm-item" /></td>
                        <td>
                            <?php echo $_smarty_tpl->__("more_than");?>
&nbsp; <input type="text" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][0][amount]" data-p-sign="s" data-a-sign=" <?php echo $_smarty_tpl->tpl_vars['settings']->value['General']['weight_symbol'];?>
" size="5" value="" class="cm-numeric input-small input-hidden" /></td>
                        <td>
                            <input type="text" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][0][value]" size="5" value="" class="input-small input-hidden" /></td>
                        <td>
                            <select class="input-medium" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][0][type]">
                                <option value="F"><?php echo $_smarty_tpl->__("absolute");?>
 (<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol'];?>
)</option>
                                <option value="P"><?php echo $_smarty_tpl->__("percent");?>
 (%)</option>
                            </select></td>
                        <td>
                            <input type="hidden" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][0][per_unit]" value="N" />
                            <input type="checkbox" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][W][0][per_unit]" value="Y" class="checkbox" />
                        </td>
                        <td>
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:weight_dependences_new")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:weight_dependences_new"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:weight_dependences_new"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
                        <td class="right"> <div class="hidden-tools"><?php echo $_smarty_tpl->getSubTemplate ("buttons/multiple_buttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('item_id'=>"add_rate_celm_weight_".((string)$_smarty_tpl->tpl_vars['destination_id']->value),'tag_level'=>3), 0);?>
</div></td>
                    </tr>
                <?php }?>

            </table>


            <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("items_dependences"),'meta'=>"clear"), 0);?>

            <table class="table table-middle">
                <thead>
                <tr class="cm-first-sibling">
                    <th width="1%"><?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('check_target'=>"items-".((string)$_smarty_tpl->tpl_vars['destination_id']->value)), 0);?>
</th>
                    <th width="30%"><?php echo $_smarty_tpl->__("products_amount");?>
</th>
                    <th width="15%"><?php echo $_smarty_tpl->__("rate_value");?>
</th>
                    <th width="15%"><?php echo $_smarty_tpl->__("type");?>
</th>
                    <th width="10%"><?php echo $_smarty_tpl->__("per_item");?>
</th>
                    <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:items_dependences_head")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:items_dependences_head"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:items_dependences_head"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <?php  $_smarty_tpl->tpl_vars["rate"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["rate"]->_loop = false;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rate_data']->value['rate_value']['I']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["rate"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["rate"]->key => $_smarty_tpl->tpl_vars["rate"]->value) {
$_smarty_tpl->tpl_vars["rate"]->_loop = true;
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["rate"]->key;
 $_smarty_tpl->tpl_vars["rate"]->index++;
 $_smarty_tpl->tpl_vars["rate"]->first = $_smarty_tpl->tpl_vars["rate"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["rdf"]['first'] = $_smarty_tpl->tpl_vars["rate"]->first;
?>
                    <tr>
                        <td>
                            <input type="checkbox" name="delete_rate_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][I][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
]" value="Y" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>disabled="disabled"<?php }?> class="checkbox cm-item-items-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
 cm-item" /></td>
                        <td class="nowrap">
                            <?php echo $_smarty_tpl->__("more_than");?>
&nbsp;
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>
                                <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][0][amount]" value="0" />&nbsp;&nbsp;0 <?php echo $_smarty_tpl->__("items");?>

                            <?php } else { ?>
                                <input type="text" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" data-v-min="0" data-v-max="999999" data-p-sign="s" data-a-sign=" <?php echo $_smarty_tpl->__("items");?>
" size="5" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-numeric input-small input-hidden" />
                            <?php }?>
                        </td>
                        <td>
                            <input type="text" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][value]" size="5" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['rate']->value['value'])===null||$tmp==='' ? "0" : $tmp), ENT_QUOTES, 'UTF-8');?>
" class="input-small input-hidden" /></td>
                        <td>
                            <select class="input-medium" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][type]">
                                <option value="F" <?php if ($_smarty_tpl->tpl_vars['rate']->value['type']=="F") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("absolute");?>
 (<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol'];?>
)</option>
                                <option value="P" <?php if ($_smarty_tpl->tpl_vars['rate']->value['type']=="P") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("percent");?>
 (%)</option>
                            </select></td>
                        <td>
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][per_unit]" value="N" />
                            <input type="checkbox" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>0<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');
}?>][per_unit]" value="Y" class="checkbox" <?php if ($_smarty_tpl->tpl_vars['rate']->value['per_unit']=="Y") {?>checked="checked"<?php }?> />
                        </td>
                        <td><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:items_dependences_body")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:items_dependences_body"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:items_dependences_body"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
                        <td class="nowrap right">
                            <div class="hidden-tools">
                                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rdf']['first']) {?>
                                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/remove_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_class'=>"cm-delete-row"), 0);?>

                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/remove_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('only_delete'=>'Y','but_class'=>"cm-delete-row"), 0);?>

                                <?php }?>

                            </div>
                        </td>
                    </tr>
                    <?php }
if (!$_smarty_tpl->tpl_vars["rate"]->_loop) {
?>
                    <tr class="no-items">
                        <td colspan="6">
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][0][amount]" value="0" />
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][0][value]" value="0" />
                            <input type="hidden" name="shipping_data[rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][0][type]" value="F" />
                            <p><?php echo $_smarty_tpl->__("no_items");?>
</p></td>
                    </tr>
                <?php } ?>

                <?php if (!$_smarty_tpl->tpl_vars['hide_for_vendor']->value) {?>
                    <tr id="box_add_rate_celm_items_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                        <td>
                            <input type="checkbox" disabled="disabled" value="Y" class="checkbox cm-item-items cm-item" /></td>
                        <td>
                            <?php echo $_smarty_tpl->__("more_than");?>
&nbsp; <input type="text" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][0][amount]" data-v-min="0" data-v-max="999999" data-p-sign="s" data-a-sign=" <?php echo $_smarty_tpl->__("items");?>
" size="5" value="" class="cm-numeric input-small input-hidden" /></td>
                        <td>
                            <input type="text" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][0][value]" size="5" value="" class="input-small input-hidden" /></td>
                        <td>
                            <select class="input-medium" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][0][type]">
                                <option value="F"><?php echo $_smarty_tpl->__("absolute");?>
 (<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol'];?>
)</option>
                                <option value="P"><?php echo $_smarty_tpl->__("percent");?>
 (%)</option>
                            </select></td>
                        <td>
                            <input type="hidden" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][0][per_unit]" value="N" />
                            <input type="checkbox" name="shipping_data[add_rates][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['destination_id']->value, ENT_QUOTES, 'UTF-8');?>
][rate_value][I][0][per_unit]" value="Y" class="checkbox" />
                        </td>
                        <td>
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:items_dependences_new")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:items_dependences_new"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:items_dependences_new"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
                        <td class="right">
                            <div class="hidden-tools">
                                <?php echo $_smarty_tpl->getSubTemplate ("buttons/multiple_buttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('item_id'=>"add_rate_celm_items_".((string)$_smarty_tpl->tpl_vars['destination_id']->value),'tag_level'=>3), 0);?>

                            </div>
                        </td>
                    </tr>
                <?php }?>

            </table>

        </div>

        <?php } ?>
    </div>
</div>


<?php }} ?>
