<?php /* Smarty version Smarty-3.1.13, created on 2015-06-01 14:18:59
         compiled from "/var/www/html/mypage/application/modules/default/views/application/changedeposit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1869701447556beb43d32ed4-26982765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4379a9ce77050803216c3213e7cc6c1057fc61b7' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/application/changedeposit.tpl',
      1 => 1418881422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1869701447556beb43d32ed4-26982765',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'estimate_number' => 0,
    'smp' => 0,
    'item' => 0,
    'token' => 0,
    'client' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556beb43db2452_19849735',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556beb43db2452_19849735')) {function content_556beb43db2452_19849735($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div class="modal-content window-container">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">お支払い予定日登録</h4>
    </div>

    <div class="modal-body">
        <form id="deposit-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="estimate_no" class="col-sm-4 control-label">見積番号</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="estimate_no" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['estimate_number']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deposit_date" class="col-sm-4 control-label input-append date">お支払い予定日</label>
                    <div class="col-sm-8">
                        <div <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>class="input-group date" id="deposit_date"<?php }?>>
                            <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>date<?php }?>' class="form-control" name="deposit_date"value="<?php if ($_smarty_tpl->tpl_vars['item']->value[0][2]!='null'){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value[0][2],"%G-%m-%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>" autofocus />
                            <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="pull-right col-sm-2">
                        <input type="reset" class="btn btn-warning" value="リセット">
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"> <input type="hidden" name="action_tag" value="deposit">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[0][0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"> <input type="hidden" name="client" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['client']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="deposit_edit" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<?php if ('smp'==0){?>
<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/moment.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
<script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
<script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
<script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
$(function () {
    var today = new Date();
    target_date = addDay(today, 1);
    $('#deposit_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false,
        daysOfWeekDisabled: [0,6],
        startDate: target_date,
        maxView: 3
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

});
</script>
<?php }?><?php }} ?>