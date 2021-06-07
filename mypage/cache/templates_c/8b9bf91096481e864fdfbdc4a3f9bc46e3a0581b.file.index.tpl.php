<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 14:35:18
         compiled from "/var/www/html/mypage/application/modules/staff/views/achievement/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11915095295566a916d16174-65273215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b9bf91096481e864fdfbdc4a3f9bc46e3a0581b' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/achievement/index.tpl',
      1 => 1419238935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11915095295566a916d16174-65273215',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'smp' => 0,
    'achievement' => 0,
    'i' => 0,
    'item' => 0,
    'status' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5566a916ebf576_04171381',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5566a916ebf576_04171381')) {function content_5566a916ebf576_04171381($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <ol class="breadcrumb">
      <li><a href="staff/client/clientindex">メンバー専用ページトップ</a></li>
      <li>達成状況詳細</li>
    </ol>

    <div class="contents-wrapper">
        <h2>お客様達成状況詳細</h2>
        お客様のご渡航についての進捗状況です。<br />
        下記のボタンを押すと同じ色だけになります。<br />
        <div class="col-xs-12 col-md-6 list-group-item line-info" style="margin-top: 10px;">
            <div class="text-center"><button type="button" id="info-filter" class="btn btn-info-custom">未着手</button><button type="button" id="warning-filter" class="btn btn-warning-custom">実施済</button><button type="button" id="danger-filter" class="btn btn-danger-custom">期限切</button><?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?><br /><?php }?><button type="button" id="success-filter" class="btn btn-success-custom">完了</button><button type="button" id="reload-filter" class="btn btn-primary-custom">更新</button><button type="button" id="reset-filter" class="btn btn-default-custom">リセット</button></div>
        </div>
    </div>

<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['achievement']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div id="panel_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="panel col-xs-12 panel-title
            <?php if (($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1&&$_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm')]==1)){?>panel-success
            <?php }elseif($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1){?>panel-warning
            <?php }elseif(isset($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_expiration_date')])!=''){?><?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_expiration_date')]<smarty_modifier_date_format(time(),"%Y-%m-%d")){?>panel-danger
                <?php }else{ ?>panel-info<?php }?>
            <?php }else{ ?>panel-info
            <?php }?>
            ">
            <div class="panel-heading list-header righting">
                <div class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" id="accordion_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" style="display: block;">
                    <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['jpn_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                    <i class="pull-right glyphicon glyphicon-chevron-down"></i></a>
                </div>
            </div>
            <span id="collapse_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="panel-collapse collapse">
                <ul class="list-group" <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?> style="margin-bottom: 0px;"<?php }?>>
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-4 kill-grid">お客様確認</span>
                            <span class="col-xs-1 kill-grid"><?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1){?><span class="glyphicon glyphicon-ok"></span><?php }else{ ?><span class="glyphicon glyphicon-minus"></span><?php }?></span>
                            <span class="col-xs-3 kill-grid"><?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1){?>達成<?php }else{ ?>期限<?php }?>日</span>
                            <span class="col-xs-4 kill-grid"><?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==0&&isset($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_expiration_date')])){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_expiration_date')],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }elseif($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1&&isset($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_date')])){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_date')],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><span class="glyphicon glyphicon-minus"></span><?php }?></span>
                        </div>
                    </li>
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-4 kill-grid">スタッフ確認</span>
                            <span class="col-xs-1 kill-grid"><?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm')]==1){?><span class="glyphicon glyphicon-ok"></span><?php }else{ ?><span class="glyphicon glyphicon-minus"></span><?php }?></span>
                            <span class="col-xs-3 kill-grid">確認日</span>
                            <span class="col-xs-4 kill-grid"><?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm')]==1){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm_date')],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><span class="glyphicon glyphicon-minus"></span><?php }?></span>
                        </div>
                    </li>
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid">お客様確認編集</span>
                            <span class="col-xs-2 kill-grid"><input type="radio" name="<?php echo htmlspecialchars(htmlspecialchars(($_smarty_tpl->tpl_vars['item']->value['name']).('_flag'), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1){?>checked<?php }?>>確認済<input type="radio" name="<?php echo htmlspecialchars(htmlspecialchars(($_smarty_tpl->tpl_vars['item']->value['name']).('_flag'), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" value="0" <?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==0){?>checked<?php }?>>未確認</span>
                            <span class="col-xs-2 kill-grid"><?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1){?>達成<?php }else{ ?>期限<?php }?>日</span>
                            <input type="hidden" name="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_date_type" value="<?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1){?>date<?php }else{ ?>expiration<?php }?>">
                            <span class="col-xs-4 kill-grid">
                                <span class="input-group date" id="clientdate_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                                    <input type="text" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_date')], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_expiration_date')], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>" name="<?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_flag')]==1){?><?php echo htmlspecialchars(htmlspecialchars(($_smarty_tpl->tpl_vars['item']->value['name']).('_date'), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?><?php echo htmlspecialchars(htmlspecialchars(($_smarty_tpl->tpl_vars['item']->value['name']).('_expiration_date'), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </li>
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid">スタッフ確認編集</span>
                            <span class="col-xs-2 kill-grid"><input type="radio" name="<?php echo htmlspecialchars(htmlspecialchars(($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm'), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm')]==1){?>checked<?php }?>>確認済<input type="radio" name="<?php echo htmlspecialchars(htmlspecialchars(($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm'), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" value="0" <?php if ($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm')]==0){?>checked<?php }?>>未確認</span>
                            <span class="col-xs-2 kill-grid">確認日</span>
                            <span class="col-xs-4 kill-grid">
                                <span class="input-group date" id="staffdate_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status']->value[($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm_date')], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars(htmlspecialchars(($_smarty_tpl->tpl_vars['item']->value['name']).('_confirm_date'), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </span>
                            </span>
                            <span class="col-xs-1 kill-grid">
                                <button id="edit-<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="btn btn-primary" >保存</button>
                            </span>
                        </div>
                    </li>
                </ul>
            </span>
        </div>

        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
    <?php } ?>
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="themes/js/moment.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
    <script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
    <script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
    <script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
<script>
    var today = new Date();

    $('[id^=clientdate_]').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false,
        startDate: today,
        maxView: 3
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('[id^=staffdate_]').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false,
        startDate: today,
        maxView: 3
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>