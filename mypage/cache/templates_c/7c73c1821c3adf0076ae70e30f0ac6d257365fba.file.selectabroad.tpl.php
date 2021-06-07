<?php /* Smarty version Smarty-3.1.13, created on 2016-06-30 15:29:45
         compiled from "/var/www/html/mypage/application/modules/default/views/plan/selectabroad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5974915015774bc59007bb2-30380390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c73c1821c3adf0076ae70e30f0ac6d257365fba' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/plan/selectabroad.tpl',
      1 => 1419238827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5974915015774bc59007bb2-30380390',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5774bc590eef38_63663825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5774bc590eef38_63663825')) {function content_5774bc590eef38_63663825($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modal_close">&times;</button>
        <h4 class="modal-title">留学情報選択</h4>
    </div>

    <div class="modal-body">
        <h3>留学情報選択</h3>
        <?php if (count($_smarty_tpl->tpl_vars['list']->value)>=1){?>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <li><a id="flight-abroad_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['study_abroad_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_plan/flightinquiry"> 今回のご渡航</a></li>
            <?php } ?>

        <?php }else{ ?>
            留学情報はありません。<br />
        <?php }?>

     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="modal_close">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script><?php }} ?>