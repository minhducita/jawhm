<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:22:58
         compiled from "/var/www/html/jawhmcart/design/backend/templates/common/comet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5260511456e666d23e8ae9-90818931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83ba90578f7106f1e1314906ed470a55c987856e' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/common/comet.tpl',
      1 => 1457504305,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '5260511456e666d23e8ae9-90818931',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e666d2403a91_95966889',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e666d2403a91_95966889')) {function content_56e666d2403a91_95966889($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('processing'));
?>
<a id="comet_container_controller" data-backdrop="static" data-keyboard="false" href="#comet_control" data-toggle="modal" class="hide"></a>

<div class="modal hide fade" id="comet_control" tabindex="-1" role="dialog" aria-labelledby="comet_title" aria-hidden="true">
    <div class="modal-header">
        <h3 id="comet_title"><?php echo $_smarty_tpl->__("processing");?>
</h3>
    </div>
    <div class="modal-body">
        <p></p>
        <div class="progress progress-striped active">
            
            <div class="bar" style="width: 0%;"></div>
        </div>
    </div>
</div><?php }} ?>
