<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:20:06
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/statuses/update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143499217156e67436ad6a91-11272636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b801f6c808f82eeb79a68ee2e92c6d69c1caa3e0' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/statuses/update.tpl',
      1 => 1457504415,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '143499217156e67436ad6a91-11272636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status_data' => 0,
    'runtime' => 0,
    'settings' => 0,
    'st' => 0,
    'type' => 0,
    'id' => 0,
    'disable_input' => 0,
    'show_update_for_all' => 0,
    'status_params' => 0,
    'name' => 0,
    'data' => 0,
    'param_value' => 0,
    'lbl' => 0,
    'v_name' => 0,
    'v_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e67437012243_87740056',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e67437012243_87740056')) {function content_56e67437012243_87740056($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('general','name','status','email_subject','email_header'));
?>
<?php if ($_smarty_tpl->tpl_vars['status_data']->value) {?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(mb_strtolower($_smarty_tpl->tpl_vars['status_data']->value['status'], 'UTF-8'), null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable("0", null, 0);?>
<?php }?>

<?php if (fn_allowed_for("ULTIMATE")&&!$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
    <?php $_smarty_tpl->tpl_vars["show_update_for_all"] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if (fn_allowed_for("ULTIMATE")&&$_smarty_tpl->tpl_vars['settings']->value['Stores']['default_state_update_for_all']=='not_active'&&!$_smarty_tpl->tpl_vars['runtime']->value['simple_ultimate']&&!$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
    <?php $_smarty_tpl->tpl_vars["disable_input"] = new Smarty_variable(true, null, 0);?>
<?php }?>

<div id="content_group<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['st']->value, ENT_QUOTES, 'UTF-8');?>
">

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="update_status_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['st']->value, ENT_QUOTES, 'UTF-8');?>
_form" class="form-horizontal">
<input type="hidden" name="type" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? "O" : $tmp), ENT_QUOTES, 'UTF-8');?>
">
<input type="hidden" name="status" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status_data']->value['status'], ENT_QUOTES, 'UTF-8');?>
">

<div class="tabs cm-j-tabs">
    <ul class="nav nav-tabs">
        <li class="cm-js active"><a><?php echo $_smarty_tpl->__("general");?>
</a></li>
    </ul>
</div>

<div class="cm-tabs-content">
<fieldset>
    <div class="control-group<?php if ($_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?> cm-hide-inputs<?php }?>">
        <label for="description_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-required control-label"><?php echo $_smarty_tpl->__("name");?>
:</label>
        <div class="controls">
            <input type="text" size="70" id="description_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="status_data[description]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status_data']->value['description'], ENT_QUOTES, 'UTF-8');?>
" class="input-large">
        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
        <div class="control-group">
            <label for="status_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-required control-label"><?php echo $_smarty_tpl->__("status");?>
:</label>
                <div class="controls">
                    <input type="hidden" name="status_data[status]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status_data']->value['status'], ENT_QUOTES, 'UTF-8');?>
">
                    <p class="shift-top"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status_data']->value['status'], ENT_QUOTES, 'UTF-8');?>
</p>
                </div>
        </div>
    <?php }?>

    <div class="control-group">
        <label for="email_subj_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label"><?php echo $_smarty_tpl->__("email_subject");?>
:</label>
        <div class="controls cm-no-hide-input" id="container_email_subj_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input type="text" size="40" name="status_data[email_subj]" id="email_subj_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status_data']->value['email_subj'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['disable_input']->value) {?>disabled="disabled"<?php }?>>
            <?php if (fn_allowed_for("ULTIMATE")) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/update_for_all.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('display'=>$_smarty_tpl->tpl_vars['show_update_for_all']->value,'object_id'=>((string)$_smarty_tpl->tpl_vars['id']->value)."_email_subj",'name'=>"update_all_vendors[email_subj]",'hide_element'=>"email_subj_".((string)$_smarty_tpl->tpl_vars['id']->value)), 0);?>

            <?php }?>
        </div>
    </div>

    <div class="control-group">
        <label for="email_header_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label"><?php echo $_smarty_tpl->__("email_header");?>
:</label>
        <div class="controls cm-no-hide-input" id="container_email_header_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <textarea id="email_header_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="status_data[email_header]" class="cm-wysiwyg input-textarea-long" <?php if ($_smarty_tpl->tpl_vars['disable_input']->value) {?>disabled="disabled"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status_data']->value['email_header'], ENT_QUOTES, 'UTF-8');?>
</textarea>
            <?php if (fn_allowed_for("ULTIMATE")) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/update_for_all.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('display'=>$_smarty_tpl->tpl_vars['show_update_for_all']->value,'object_id'=>((string)$_smarty_tpl->tpl_vars['id']->value)."_email_header",'name'=>"update_all_vendors[email_header]",'hide_element'=>"email_header_".((string)$_smarty_tpl->tpl_vars['id']->value)), 0);?>

            <?php }?>
        </div>
    </div>

    <?php  $_smarty_tpl->tpl_vars["data"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["data"]->_loop = false;
 $_smarty_tpl->tpl_vars["name"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['status_params']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["data"]->key => $_smarty_tpl->tpl_vars["data"]->value) {
$_smarty_tpl->tpl_vars["data"]->_loop = true;
 $_smarty_tpl->tpl_vars["name"]->value = $_smarty_tpl->tpl_vars["data"]->key;
?>
        <div class="control-group<?php if ($_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?> cm-hide-inputs<?php }?>">
            <label for="status_param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label<?php if ($_smarty_tpl->tpl_vars['data']->value['type']=="color") {?> cm-color<?php }?>"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['data']->value['label']);?>
</label>

            <div class="controls">
                <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
                    <?php $_smarty_tpl->tpl_vars["param_value"] = new Smarty_variable($_smarty_tpl->tpl_vars['status_data']->value['params'][$_smarty_tpl->tpl_vars['name']->value], null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["param_value"] = new Smarty_variable('', null, 0);?>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['data']->value['not_default']==true&&$_smarty_tpl->tpl_vars['status_data']->value['is_default']==="Y") {?>
                    <?php $_smarty_tpl->tpl_vars["lbl"] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value['variants'][$_smarty_tpl->tpl_vars['param_value']->value], null, 0);?>
                    <p class="shift-top"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['lbl']->value);?>
</p>
                
                <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['type']=="select") {?>
                    <select id="status_param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
" name="status_data[params][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
]">
                        <?php  $_smarty_tpl->tpl_vars["v_data"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v_data"]->_loop = false;
 $_smarty_tpl->tpl_vars["v_name"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v_data"]->key => $_smarty_tpl->tpl_vars["v_data"]->value) {
$_smarty_tpl->tpl_vars["v_data"]->_loop = true;
 $_smarty_tpl->tpl_vars["v_name"]->value = $_smarty_tpl->tpl_vars["v_data"]->key;
?>
                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v_name']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['param_value']->value==$_smarty_tpl->tpl_vars['v_name']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['v_data']->value);?>
</option>
                        <?php } ?>
                    </select>
                
                <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['type']=="checkbox") {?>
                    <input type="hidden" name="status_data[params][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
]" value="N">
                    <input type="checkbox" name="status_data[params][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
]" id="status_param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
" value="Y" <?php if (($_smarty_tpl->tpl_vars['status_data']->value&&$_smarty_tpl->tpl_vars['status_data']->value['params'][$_smarty_tpl->tpl_vars['name']->value]=="Y")||(!$_smarty_tpl->tpl_vars['status_data']->value&&$_smarty_tpl->tpl_vars['data']->value['default_value']=="Y")) {?> checked="checked"<?php }?> class="checkbox">

                <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['type']=="status") {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("common/status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('status'=>$_smarty_tpl->tpl_vars['param_value']->value,'display'=>"select",'name'=>"status_data[params][".((string)$_smarty_tpl->tpl_vars['name']->value)."]",'status_type'=>$_smarty_tpl->tpl_vars['data']->value['status_type'],'select_id'=>"status_param_".((string)$_smarty_tpl->tpl_vars['id']->value)."_".((string)$_smarty_tpl->tpl_vars['name']->value)), 0);?>


                <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['type']=="color") {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("common/colorpicker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('cp_name'=>"status_data[params][".((string)$_smarty_tpl->tpl_vars['name']->value)."]",'cp_id'=>"status_param_".((string)$_smarty_tpl->tpl_vars['id']->value)."_".((string)$_smarty_tpl->tpl_vars['name']->value),'cp_value'=>$_smarty_tpl->tpl_vars['param_value']->value), 0);?>

                <?php }?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"statuses:status_type")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"statuses:status_type"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"statuses:status_type"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


            </div>
        </div>
    <?php } ?>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"statuses:update")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"statuses:update"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"statuses:update"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</fieldset>
</div>


<div class="buttons-container">
    <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[statuses.update]",'cancel_action'=>"close",'save'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

</div>

</form>
<!--content_group<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }} ?>
