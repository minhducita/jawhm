<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:13:48
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/push.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3120617656e68edc66edc1-19489636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6fc148809732fa762e4a0f4caf7bf5aaca6af56' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/twigmo/settings/push.tpl',
      1 => 1457504453,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '3120617656e68edc66edc1-19489636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'platinum_stores' => 0,
    'store' => 0,
    'max_push_length' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e68edc6d00d9_39686407',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e68edc6d00d9_39686407')) {function content_56e68edc6d00d9_39686407($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
?><?php
fn_preload_lang_vars(array('twgadmin_send_push_notifications','twgadmin_select_store_short','twgadmin_push_notification_text','twgadmin_push_notification_comment','send'));
?>
<div id="twg_push">

<?php echo $_smarty_tpl->getSubTemplate ("addons/twigmo/settings/components/contact_twigmo_support.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("twgadmin_send_push_notifications")), 0);?>


<?php if ($_smarty_tpl->tpl_vars['platinum_stores']->value) {?>
<fieldset>

    <div class="control-group form-field">
        <label for="elm_tw_push_store" class="control-label"><?php echo $_smarty_tpl->__("twgadmin_select_store_short");?>
:</label>
        <div class="controls">
            <select id="elm_tw_push_store" name="push[access_id]">
                <?php  $_smarty_tpl->tpl_vars["store"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["store"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['platinum_stores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["store"]->key => $_smarty_tpl->tpl_vars["store"]->value) {
$_smarty_tpl->tpl_vars["store"]->_loop = true;
?>
                    <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['access_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['company'], ENT_QUOTES, 'UTF-8');?>
</option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="control-group form-field">
        <label for="elm_tw_push_text" id="elm_tw_push_text_label" class="control-label"><?php echo $_smarty_tpl->__("twgadmin_push_notification_text");?>
:</label>
        <div class="controls">
            <textarea name="push[message]" id="elm_tw_push_text" maxlength="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['max_push_length']->value, ENT_QUOTES, 'UTF-8');?>
"></textarea>
            <div class="twg-push-counter" id="twg_letters_remain"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['max_push_length']->value, ENT_QUOTES, 'UTF-8');?>
</div>
        </div>
    </div>

    <div class="control-group form-field">
        <div class="controls">
            <?php  $_smarty_tpl->tpl_vars["store"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["store"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['platinum_stores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["store"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["store"]->key => $_smarty_tpl->tpl_vars["store"]->value) {
$_smarty_tpl->tpl_vars["store"]->_loop = true;
 $_smarty_tpl->tpl_vars["store"]->index++;
 $_smarty_tpl->tpl_vars["store"]->first = $_smarty_tpl->tpl_vars["store"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['stores']['first'] = $_smarty_tpl->tpl_vars["store"]->first;
?>
                <div class="twg-app-label twg-push-comment" id="push_comment_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['store']->value['access_id'], ENT_QUOTES, 'UTF-8');?>
" <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['stores']['first']) {?>style="display: none"<?php }?>>
                    <?php echo $_smarty_tpl->tpl_vars['store']->value['push_comment'];?>

                </div>
            <?php } ?>
            <div class="twg-app-label"><?php echo $_smarty_tpl->__("twgadmin_push_notification_comment");?>
</div>
        </div>
    </div>

    <div class="control-group form-field">
        <div class="controls">
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_role'=>"submit",'but_meta'=>"btn-primary cm-ajax cm-confirm",'but_name'=>"dispatch[twigmo_push.send]",'but_text'=>__("send")), 0);?>

            
        </div>
    </div>

</fieldset>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    //<![CDATA[
    
    $(document).ready(function() {
        
        var max_push_length = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['max_push_length']->value, ENT_QUOTES, 'UTF-8');?>
;
        
        var onTextChange = function() {
            var limit = parseInt($(this).attr('maxlength'));
            var text = $(this).val();
            var chars = text.length;
            $("#twg_letters_remain").html(max_push_length - chars);
            if(chars > limit) {
                $(this).val(text.substr(0, limit));
            }
        };

        var onStoreChange = function() {
            $('div.twg-push-comment').hide();
            $('#push_comment_' + $(this).val()).show();
        };

        var onTabChange = function() {
            var pushMessageIsRequired = $(this).attr('id') == 'twigmo_twg_push';
            $('#elm_tw_push_text_label').toggleClass('cm-required', pushMessageIsRequired);
        };

        $('#elm_tw_push_text').keypress(onTextChange).keyup(onTextChange);
        $('#elm_tw_push_store').change(onStoreChange);
        $('li.cm-js').click(onTabChange);
    });
    
    //]]>
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php }?>

<!--twg_push--></div>
<?php }} ?>
