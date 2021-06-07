<?php /* Smarty version Smarty-3.1.13, created on 2015-06-01 14:18:42
         compiled from "/var/www/html/mypage/application/modules/default/views/application/estimatelist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14962304995563d4583f4dd2-90534455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '756522709e0a03b12298f81f81bd63373516ee7c' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/application/estimatelist.tpl',
      1 => 1433135905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14962304995563d4583f4dd2-90534455',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5563d45854dc89_49555857',
  'variables' => 
  array (
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5563d45854dc89_49555857')) {function content_5563d45854dc89_49555857($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">見積一覧</h4>
    </div>

    <div class="modal-body">
        <h3>見積情報選択</h3>
        <table class="table-center table table-striped table-hover">
            <thead>
                <tr>
                    <th>学校名</th>
                    <th>週数</th>
                    <th>お支払予定日</th>
                    <th class="text-center">閲覧</th>
                    <th class="text-center">予定日入力</th>
                </tr>
            <thead>
        <?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <tr>
                        <td><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                        <td><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[1], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['item']->value[3]!=''){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value[3],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?>未入力<?php }?></td>
                        <td class="text-center"><a href="application/getfile?file_no=5&estimate_no=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><span class="glyphicon glyphicon-list-alt clickable"></span></a></td>
                        <td class="text-center"><span id="changedeposit_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="glyphicon glyphicon-edit clickable"></span></td>
                    </tr>
                <?php } ?>
            </tbody>
        <?php }?>
        </table>
        <span class="help-block">支払日の入力は申し込み済みの見積に対してのみ行ってください。</span>
     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script><?php }} ?>