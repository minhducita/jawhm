<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:35:14
         compiled from "/var/www/html/mypage/application/modules/default/views/schedule/selectinsvisa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68445720555546c52bbbd17-58260583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b3866647f7b11135f500045e1447a394ea2bf66' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/schedule/selectinsvisa.tpl',
      1 => 1419821786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68445720555546c52bbbd17-58260583',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'insurance_info' => 0,
    'item' => 0,
    'visa_info' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546c52d9cd13_30552290',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546c52d9cd13_30552290')) {function content_55546c52d9cd13_30552290($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">保険契約VISA情報選択</h4>
    </div>

    <div class="modal-body">
        <h3>保険契約情報選択</h3>
        <?php if (count($_smarty_tpl->tpl_vars['insurance_info']->value)>=1){?>
            <table id="tbl" class="table-center table table-bordered table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>契約種別</th>
                        <th>証券番号</th>
                        <th class="text-center" rowspan="2">選択</th>
                    </tr>
                    <tr>
                        <th>始期日</th>
                        <th>終期日</th>
                    </tr>
                <thead>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['insurance_info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <tbody>
                        <tr>
                            <td><?php if ($_smarty_tpl->tpl_vars['item']->value['insurance_type']!='null'){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['insurance_type'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></td>
                            <td><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['policy_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                            <td class="text-center" rowspan="2"><input type="radio" name="insurance" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"></td>
                        </tr>
                        <tr>
                            <td><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['insured_date_st'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                            <td><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['insured_date_ed'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php }else{ ?>
            保険契約情報はありません。<br />
        <?php }?>

        <h3>VISA情報選択</h3>
        <?php if (count($_smarty_tpl->tpl_vars['visa_info']->value)>=1){?>
            <table class="table-center table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>ビザ種別</th>
                        <th>ビザ発給番号</th>
                        <th class="text-center">選択</th>
                    </tr>
                <thead>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visa_info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['visa_type'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                            <td><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['visa_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                            <td class="text-center" rowspan="2"><input type="radio" name="visa" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php }else{ ?>
            ビザ情報はありません。<br />
        <?php }?>

    </div>

    <div class="modal-footer">
        <button id="make_contact" type="button" class="btn btn-primary">印字</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<script type="text/javascript">
$("#make_contact").click(function() {
    insurance = $('[name=insurance]:checked').val();
    visa = $('[name=visa]:checked').val();

    window.open('<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/schedule/showcontact?insurance='+insurance+'&visa='+visa,'_blank');

});
</script><?php }} ?>