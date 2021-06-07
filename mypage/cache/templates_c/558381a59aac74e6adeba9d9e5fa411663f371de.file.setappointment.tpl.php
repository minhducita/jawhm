<?php /* Smarty version Smarty-3.1.13, created on 2015-06-04 11:47:53
         compiled from "/var/www/html/mypage/application/modules/default/views/index/setappointment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6105527085566716a795c51-17126305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '558381a59aac74e6adeba9d9e5fa411663f371de' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/setappointment.tpl',
      1 => 1433386058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6105527085566716a795c51-17126305',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5566716a935c22_56653269',
  'variables' => 
  array (
    'smp' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5566716a935c22_56653269')) {function content_5566716a935c22_56653269($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">個別カウンセリング予約</h4>
    </div>

    <div class="modal-body">
        <form id="appointment-set" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="first_choice" class="col-sm-4 control-label input-append date">第一希望日</label>
                    <div class="col-sm-8">
                        <div <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>class="input-group date" id="first_choice"<?php }?>>
                            <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>datetime-local<?php }?>' class="form-control" name="first_choice" autofocus />
                            <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="second_choice" class="col-sm-4 control-label input-append date">第二希望日</label>
                    <div class="col-sm-8">
                        <div <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>class="input-group date" id="second_choice"<?php }?>>
                            <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>datetime-local<?php }?>' class="form-control" name="second_choice" />
                            <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="third_choice" class="col-sm-4 control-label input-append date">第三希望日</label>
                    <div class="col-sm-8">
                        <div <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>class="input-group date" id="third_choice"<?php }?>>
                            <input type='<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>datetime-local<?php }?>' class="form-control" name="third_choice" />
                            <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="consultation" class="col-sm-4 control-label">相談内容</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="consultation" />
                    </div>
                </div>

                <div class="form-group">
                       <label for="bisa_information" class="col-sm-4 control-label">ビザ情報</label>
                       <div class="col-sm-8">
                         <input class="form-control" type="text" name="visa_information" />
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
               <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
               <input type="hidden" name="action_tag" value="appointment">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="submit_appointment" type="button" class="btn btn-primary">送信</button>
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
    <script type="text/javascript" src="themes/js/jquery.timeValidate.js "></script>
    <script type="text/javascript" src="themes/js/modal.js"></script>
    <script>
    <!--
    $(function () {
        var today = new Date();
        target_date = addDay(today, 1);

        $('#first_choice').datetimepicker({
            language: 'ja',
            format: 'yyyy-mm-dd hh:ii',
            pickTime: true,
            startDate: target_date,
        }).on('changeDate', function(ev){
            $(this).datetimepicker('hide');
        });

        $('#second_choice').datetimepicker({
            language: 'ja',
            format: 'yyyy-mm-dd hh:ii',
            pickTime: true,
            startDate: target_date,
        }).on('changeDate', function(ev){
            $(this).datetimepicker('hide');
        });

        $('#third_choice').datetimepicker({
            language: 'ja',
            format: 'yyyy-mm-dd hh:ii',
            pickTime: true,
            startDate: target_date,
        }).on('changeDate', function(ev){
            $(this).datetimepicker('hide');
        });
    });
    -->
    </script>
<?php }?><?php }} ?>