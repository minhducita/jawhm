<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:34:47
         compiled from "/var/www/html/mypage/application/modules/default/views/application/homestaylist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18564350655546c37457070-11474053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b723c0dbcada2b0b5b93664b6577e6c9991558c' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/application/homestaylist.tpl',
      1 => 1422355417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18564350655546c37457070-11474053',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appitems' => 0,
    'i' => 0,
    'fillitems' => 0,
    'item' => 0,
    'materialitems' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546c37574938_67244431',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546c37574938_67244431')) {function content_55546c37574938_67244431($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">ホームステイ情報一覧</h4>
        お客様のホームステイ情報一覧です。
    </div>

    <div class="modal-body">
        <h3>ホームステイ選択</h3>
        <?php if (count($_smarty_tpl->tpl_vars['appitems']->value)>=1){?>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ファイル名</th>
                        <th class="text-center"><?php if (isset($_smarty_tpl->tpl_vars['fillitems']->value[$_smarty_tpl->tpl_vars['i']->value]['branch_no'])){?>確認<?php }else{ ?>送信<?php }?></th>
                        <th class="text-center"><span class="alert alert-info" role="alert" style="padding: 1px;">資料</span></th>
                    </tr>
                <thead>

                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['appitems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                        <tr>
                            <td><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value+1, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                            <td><a href="application/getfile?file_no=9&branch_no=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['file_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</a</td>
                            <td class="text-center">
                                <?php if (isset($_smarty_tpl->tpl_vars['fillitems']->value[$_smarty_tpl->tpl_vars['i']->value]['branch_no'])){?>
                                    <a href="application/getfile?file_no=10&branch_no=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['fillitems']->value[$_smarty_tpl->tpl_vars['i']->value]['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><span class="glyphicon glyphicon-list-alt clickable"></span></a>
                                <?php }else{ ?>
                                    <a id="filled_homestay_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="clickable"><span class="glyphicon glyphicon-cloud-upload"></span></a>
                                <?php }?>
                            </td>
                            <td>
                                <?php if (isset($_smarty_tpl->tpl_vars['materialitems']->value[$_smarty_tpl->tpl_vars['i']->value]['branch_no'])){?>
                                    <a href="application/getfile?file_no=11&branch_no=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['materialitems']->value[$_smarty_tpl->tpl_vars['i']->value]['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank" class="btn btn-success">DL</a>
                                <?php }else{ ?>
                                    <span class="glyphicon glyphicon-minus"></span>
                                <?php }?>
                            </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <?php } ?>
                 </tbody>
            </table>
            <div class="help-block text-red">
                ホームステイ資料が表示されるのは出発1週間前頃になります。<br />
                それ以降に届かない場合は当協会までお問い合わせください。
            </div>
        <?php }else{ ?>
            お客様のホームステイ情報はありません。
        <?php }?>


     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script><?php }} ?>