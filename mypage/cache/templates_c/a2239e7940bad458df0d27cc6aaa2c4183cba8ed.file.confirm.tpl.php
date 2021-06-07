<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:30:47
         compiled from "/var/www/html/mypage/application/modules/staff/views/preparation/confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181840335055643d470fd1d8-83721307%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2239e7940bad458df0d27cc6aaa2c4183cba8ed' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/preparation/confirm.tpl',
      1 => 1419239061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181840335055643d470fd1d8-83721307',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'status_name' => 0,
    'stat' => 0,
    'status' => 0,
    'date' => 0,
    'expiration' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55643d471fe377_15194891',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55643d471fe377_15194891')) {function content_55643d471fe377_15194891($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div class="modal-content window-container">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status_name']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
確認</h4>
    </div>

    <div class="modal-body">
        <form id="confirm-edit" method="post">
            <fieldset>
                <div class="form-group col-xs-12">
                    <label for="status_flag" class="col-xs-4 control-label">準備状態</label>
                    <div class="col-xs-8">
                        <?php $_smarty_tpl->tpl_vars['stat'] = new Smarty_variable(($_smarty_tpl->tpl_vars['name']->value).('_flag'), null, 0);?>
                        <?php if ($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['stat']->value]==0){?> お客様準備中<?php }else{ ?>準備完了<?php }?>
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="status_date" class="col-xs-4 control-label">作業日</label>
                    <div class="col-xs-8">
                        <?php $_smarty_tpl->tpl_vars['date'] = new Smarty_variable(($_smarty_tpl->tpl_vars['name']->value).('_date'), null, 0);?>
                        <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['date']->value],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="expiration_date" class="col-xs-4 control-label input-append date">作業期限日</label>
                    <div class="col-xs-8">
                        <div class="input-group date" id="expiration_date">
                            <?php $_smarty_tpl->tpl_vars['expiration'] = new Smarty_variable(($_smarty_tpl->tpl_vars['name']->value).('_expiration_date'), null, 0);?>
                            <input type='text' class="form-control" name="expiration_date" value="<?php if ($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['expiration']->value]!='null'){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['expiration']->value],"%G-%m-%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>" autofocus />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <label for="confirmed" class="col-xs-4 control-label">確認</label>
                    <div class="col-xs-8">
                        <button id="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
-confirm-preparation" class="btn btn-success">確認済</button>
                        <button id="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
-redo-preparation" class="btn btn-danger">やり直し</button>
                        <button id="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
-back-preparation" class="btn btn-warning">確認待ち</button>
                    </div>
                </div>

                <div class="form-group col-xs-12">
                    <div class="pull-right col-xs-2">
                        <input type="reset" class="btn btn-warning" value="リセット">
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="action_tag" value="confirm">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="preparation_confirm_edit" type="button" class="btn btn-primary">期限日送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
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
    $('#expiration_date').datetimepicker({
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
</script><?php }} ?>