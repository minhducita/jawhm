<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 11:17:01
         compiled from "/var/www/html/mypage/application/modules/default/views/application/receiptlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12655865755563d79d8896a7-82194589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03db0ce9d01f6b6bc2a8e5c05114852522e711b7' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/application/receiptlist.tpl',
      1 => 1421735706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12655865755563d79d8896a7-82194589',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'i' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5563d79d95e006_49623383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5563d79d95e006_49623383')) {function content_5563d79d95e006_49623383($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">受領書一覧</h4>
        お客様宛ての受領書の一覧です。
    </div>

    <div class="modal-body">
        <h3>受領書選択</h3>
        <?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
            <table class="table-center table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ファイル名</th>
                        <th>作成日時</th>
                        <th>閲覧</th>
                    </tr>
                <thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                        <tr>
                            <td><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                            <td><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['file_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['item']->value['update_date']!='null'){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['update_date'],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></td>
                            <td class="text-center"><a href="application/getfile?file_no=1&branch_no=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><span class="glyphicon glyphicon-list-alt clickable"></span></a></td>
                        </tr>
                     <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                <?php } ?>
                </tbody>
            </table>
        <?php }else{ ?>
            お客様のお支払情報はありません。
        <?php }?>


     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script><?php }} ?>