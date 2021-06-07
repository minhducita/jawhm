<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:35:41
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/newsletters/update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76023169256e677dd5d0269-45283182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5a3eb7ed47a3c60fa4c8b10429d0a6d7d021f1e' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/newsletters/update.tpl',
      1 => 1457504566,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '76023169256e677dd5d0269-45283182',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'newsletter' => 0,
    'id' => 0,
    'newsletter_type' => 0,
    'placeholders' => 0,
    'p_descr' => 0,
    'p' => 0,
    'newsletter_templates' => 0,
    'template' => 0,
    'newsletter_campaigns' => 0,
    'campaign' => 0,
    'mailing_lists' => 0,
    'list' => 0,
    'companies' => 0,
    'newsletter_links' => 0,
    'link' => 0,
    'object_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677ddad2529_09428532',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677ddad2529_09428532')) {function content_56e677ddad2529_09428532($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
if (!is_callable('smarty_block_notes')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.notes.php';
if (!is_callable('smarty_modifier_in_array')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.in_array.php';
?><?php
fn_preload_lang_vars(array('subject','more_subjects','tt_addons_newsletters_views_newsletters_update_more_subjects','body_html','preview','template','no_template','load','campaign','none','send_to','mailing_lists','users','tt_addons_newsletters_views_newsletters_update_users','add_recipients_from_users','customers_with_abandoned','cart','wishlist','cart_or_wishlist','for','which_is','days_old','clicks','url','campaign','clicks','send_to_test_email','send','save_and_send','newsletter','newsletter_template','newsletter_autoresponder','add_newsletter','add_template','add_autoresponder','menu','new','editing'));
?>
<?php if ($_smarty_tpl->tpl_vars['newsletter']->value['newsletter_id']) {?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable($_smarty_tpl->tpl_vars['newsletter']->value['newsletter_id'], null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(0, null, 0);?>
<?php }?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
(function(_, $) {
    $(document).ready(function() {
        $(_.doc).on('click', '#elm_newsletter_load_template', function() {
            if ($("#elm_newsletter_template").val() != '0') {
                $.ceAjax('request', 
                    '<?php echo fn_url("newsletters.render?template_id=");?>
' + $("#elm_newsletter_template").val(), {
                        callback: function(data) {
                            $("#elm_newsletter_descr_html").ceEditor("val", $("#elm_newsletter_descr_html").ceEditor("val") + data['template']);
                        }
                    }
                )
            }
        });
    });
}(Tygh, Tygh.$));
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="newsletters_form" class="form-horizontal form-edit ">
<input type="hidden" name="fake" value="1" />
<input type="hidden" name="newsletter_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="newsletter_data[type]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter_type']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="dispatch" value="" />

<?php $_smarty_tpl->smarty->_tag_stack[] = array('notes', array()); $_block_repeat=true; echo smarty_block_notes(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php  $_smarty_tpl->tpl_vars['p_descr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p_descr']->_loop = false;
 $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['placeholders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p_descr']->key => $_smarty_tpl->tpl_vars['p_descr']->value) {
$_smarty_tpl->tpl_vars['p_descr']->_loop = true;
 $_smarty_tpl->tpl_vars['p']->value = $_smarty_tpl->tpl_vars['p_descr']->key;
?>
        <div class="sidebar-note-item">
            <?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['p_descr']->value);?>
:
            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value, ENT_QUOTES, 'UTF-8');?>
</span>
        </div>
    <?php } ?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_notes(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="control-group">
    <label class="control-label cm-required" for="elm_newsletter_subject"><?php echo $_smarty_tpl->__("subject");?>
</label>
    <div class="controls">
        <input type="text" name="newsletter_data[newsletter]" id="elm_newsletter_subject" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['newsletter'], ENT_QUOTES, 'UTF-8');?>
" size="40" class="input-large" />
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_NEWSLETTER')) {?>
<div class="control-group">
    <label class="control-label" for="elm_newsletter_subject_multiple"><?php echo $_smarty_tpl->__("more_subjects");
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>__("tt_addons_newsletters_views_newsletters_update_more_subjects")), 0);?>
</label>
    <div class="controls">
        <textarea name="newsletter_data[newsletter_multiple]" id="elm_newsletter_subject_multiple" class="input-large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['newsletter_multiple'], ENT_QUOTES, 'UTF-8');?>
</textarea>
    </div>
</div>
<?php }?>

<div class="control-group">
    <label class="control-label" for="elm_newsletter_descr_html"><?php echo $_smarty_tpl->__("body_html");?>
</label>
    <div class="controls">
        <textarea id="elm_newsletter_descr_html" name="newsletter_data[body_html]" cols="35" rows="8" class="cm-wysiwyg input-large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['body_html'], ENT_QUOTES, 'UTF-8');?>
</textarea>
    <p><?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("preview"),'but_name'=>"dispatch[newsletters.preview_html]",'but_meta'=>"cm-new-window"), 0);?>
</p>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="elm_newsletter_template"><?php echo $_smarty_tpl->__("template");?>
</label>
    <div class="controls">
    <select name="newsletter_data[template]" id="elm_newsletter_template">
        <option value="0"><?php echo $_smarty_tpl->__("no_template");?>
</option>
        <?php  $_smarty_tpl->tpl_vars['template'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['template']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newsletter_templates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['template']->key => $_smarty_tpl->tpl_vars['template']->value) {
$_smarty_tpl->tpl_vars['template']->_loop = true;
?>
        <option <?php if ($_smarty_tpl->tpl_vars['newsletter']->value['template']==$_smarty_tpl->tpl_vars['template']->value['newsletter_id']) {?>selected="selected"<?php }?> value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['template']->value['newsletter_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['template']->value['newsletter'], ENT_QUOTES, 'UTF-8');?>
</option>
        <?php } ?>
    </select>
    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("load"),'but_name'=>"dispatch[newsletters.test_send]",'but_id'=>"elm_newsletter_load_template",'but_meta'=>"cm-no-submit"), 0);?>

    </div>
</div>


<?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_NEWSLETTER')) {?>
    <div class="control-group">
        <label class="control-label" for="elm_newsletter_campaigns"><?php echo $_smarty_tpl->__("campaign");?>
</label>
        <div class="controls">
        <select name="newsletter_data[campaign_id]" id="elm_newsletter_campaigns">
            <option value="0"><?php echo $_smarty_tpl->__("none");?>
</option>
            <?php  $_smarty_tpl->tpl_vars['campaign'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['campaign']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newsletter_campaigns']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['campaign']->key => $_smarty_tpl->tpl_vars['campaign']->value) {
$_smarty_tpl->tpl_vars['campaign']->_loop = true;
?>
                <option <?php if ($_smarty_tpl->tpl_vars['newsletter']->value['campaign_id']==$_smarty_tpl->tpl_vars['campaign']->value['campaign_id']) {?>selected="selected"<?php }?> value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['campaign']->value['campaign_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['campaign']->value['object'], ENT_QUOTES, 'UTF-8');?>
</option>
            <?php } ?>
        </select>
        </div>
    </div>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/select_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('input_name'=>"newsletter_data[status]",'id'=>"elm_newsletter_status",'obj'=>$_smarty_tpl->tpl_vars['newsletter']->value,'items_status'=>fn_get_predefined_statuses("newsletters")), 0);?>


<?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_NEWSLETTER')) {?>
<?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("send_to"),'target'=>"#acc_send"), 0);?>

<div id="acc_send" class="collapse in">
    <div class="control-group">
        <label class="control-label"><?php echo $_smarty_tpl->__("mailing_lists");?>
</label>
        <div class="controls">
        <?php  $_smarty_tpl->tpl_vars["list"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["list"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mailing_lists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["list"]->key => $_smarty_tpl->tpl_vars["list"]->value) {
$_smarty_tpl->tpl_vars["list"]->_loop = true;
?>
            <label class="checkbox">
                <input type="checkbox" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['list']->value['list_id'], ENT_QUOTES, 'UTF-8');?>
" name="newsletter_data[mailing_lists][]" <?php if (smarty_modifier_in_array($_smarty_tpl->tpl_vars['list']->value['list_id'],$_smarty_tpl->tpl_vars['newsletter']->value['mailing_lists'])) {?>checked="checked"<?php }?> />
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['list']->value['object'], ENT_QUOTES, 'UTF-8');?>

                    <?php if (fn_allowed_for("ULTIMATE")) {?>
                    <?php $_smarty_tpl->tpl_vars["companies"] = new Smarty_variable(implode("\n",$_smarty_tpl->tpl_vars['list']->value['shared_for_companies']), null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>$_smarty_tpl->tpl_vars['companies']->value), 0);?>

                    <?php }?>
            </label>
        <?php } ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo $_smarty_tpl->__("users");
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>__("tt_addons_newsletters_views_newsletters_update_users")), 0);?>
</label>
        <div class="controls">
            <?php echo $_smarty_tpl->getSubTemplate ("pickers/users/picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("add_recipients_from_users"),'data_id'=>"return_users",'but_meta'=>"btn",'input_name'=>"newsletter_data[users]",'item_ids'=>$_smarty_tpl->tpl_vars['newsletter']->value['users'],'placement'=>"right"), 0);?>

        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="elm_newsletter_abandoned_type"><?php echo $_smarty_tpl->__("customers_with_abandoned");?>
</label>
        <div class="controls">
        <select id="elm_newsletter_abandoned_type" name="newsletter_data[abandoned_type]">
            <option value="cart" <?php if ($_smarty_tpl->tpl_vars['newsletter']->value['abandoned_type']=="cart") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("cart");?>
</option>
            <option value="wishlist" <?php if ($_smarty_tpl->tpl_vars['newsletter']->value['abandoned_type']=="wishlist") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("wishlist");?>
</option>
            <option value="both" <?php if ($_smarty_tpl->tpl_vars['newsletter']->value['abandoned_type']=="both") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("cart_or_wishlist");?>
</option>
        </select>
        <?php if (fn_allowed_for("ULTIMATE")) {?>
        &nbsp;<?php echo $_smarty_tpl->__("for");?>
&nbsp;
            <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_field.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>"newsletter_data[abandoned_company_id]",'no_wrap'=>true,'meta'=>"droptop"), 0);?>

        <?php }?>
        &nbsp;<?php echo $_smarty_tpl->__("which_is");?>

        <input class="input-small" type="text" name="newsletter_data[abandoned_days]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['abandoned_days'], ENT_QUOTES, 'UTF-8');?>
" />
        <?php echo $_smarty_tpl->__("days_old");?>

        </div>
    </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['newsletter_links']->value) {?>
<div class="control-group">
    <label class="control-label"><?php echo $_smarty_tpl->__("clicks");?>
</label>
    <div class="controls">
    <table class="table">
        <tr>
            <th><?php echo $_smarty_tpl->__("url");?>
</th>
            <th><?php echo $_smarty_tpl->__("campaign");?>
</th>
            <th><?php echo $_smarty_tpl->__("clicks");?>
</th>
        </tr>
    <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newsletter_links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
        <tr>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['url'], ENT_QUOTES, 'UTF-8');?>
</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter_campaigns']->value[$_smarty_tpl->tpl_vars['link']->value['campaign_id']]['object'], ENT_QUOTES, 'UTF-8');?>
</td>
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['clicks'], ENT_QUOTES, 'UTF-8');?>
</td>
        </tr>
    <?php } ?>
    </table>
    </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value!=@constant('NEWSLETTER_TYPE_TEMPLATE')) {?>
    <div class="control-group">
        <label class="control-label" for="elm_newsletter_test_send"><?php echo $_smarty_tpl->__("send_to_test_email");?>
</label>
        <div class="controls">
            <div class="input-append">
                <input type="text" name="test_email" id="elm_newsletter_test_send" value="" class="input-medium" />
                <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("send"),'but_name'=>"dispatch[newsletters.test_send]",'but_id'=>"test_send_button",'but_meta'=>"cm-ajax"), 0);?>

            </div>
        </div>
    </div>
<?php }?>

</form>

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
<?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_NEWSLETTER')) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("save_and_send"),'but_name'=>"dispatch[newsletters.send]",'but_role'=>"submit-link",'but_target_form'=>"newsletters_form",'allow_href'=>true), 0);?>

<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("buttons/save.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[newsletters.update]",'but_role'=>"submit-link",'but_target_form'=>"newsletters_form"), 0);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_NEWSLETTER')) {?>
    <?php $_smarty_tpl->tpl_vars["object_name"] = new Smarty_variable(mb_strtolower($_smarty_tpl->__("newsletter"), 'UTF-8'), null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_TEMPLATE')) {?>
    <?php $_smarty_tpl->tpl_vars["object_name"] = new Smarty_variable(mb_strtolower($_smarty_tpl->__("newsletter_template"), 'UTF-8'), null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_AUTORESPONDER')) {?>
    <?php $_smarty_tpl->tpl_vars["object_name"] = new Smarty_variable(mb_strtolower($_smarty_tpl->__("newsletter_autoresponder"), 'UTF-8'), null, 0);?>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("sidebar", null, null); ob_start(); ?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("content_sidebar", null, null); ob_start(); ?>
        <ul class="nav nav-list">
            <li><a href="<?php echo htmlspecialchars(fn_url("newsletters.add?type=N"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("add_newsletter");?>
</a></li>
            <li><a href="<?php echo htmlspecialchars(fn_url("newsletters.add?type=T"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("add_template");?>
</a></li>
            <li><a href="<?php echo htmlspecialchars(fn_url("newsletters.add?type=A"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("add_autoresponder");?>
</a></li>
        </ul>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/sidebox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('content'=>Smarty::$_smarty_vars['capture']['content_sidebar'],'title'=>__("menu")), 0);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if (!$_smarty_tpl->tpl_vars['id']->value) {?>
    <?php ob_start();
echo $_smarty_tpl->__("new");
$_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_tmp1.": ".((string)$_smarty_tpl->tpl_vars['object_name']->value),'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'select_languages'=>true,'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'sidebar'=>Smarty::$_smarty_vars['capture']['sidebar']), 0);?>

<?php } else { ?>
    <?php ob_start();
echo $_smarty_tpl->__("editing");
$_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_tmp2." ".((string)$_smarty_tpl->tpl_vars['object_name']->value).":&nbsp;".((string)$_smarty_tpl->tpl_vars['newsletter']->value['newsletter']),'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'select_languages'=>true,'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'sidebar'=>Smarty::$_smarty_vars['capture']['sidebar']), 0);?>

<?php }?>
<?php }} ?>
