<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 15:38:17
         compiled from "/var/www/html/mypage/application/modules/staff/views/preparation/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2099118199556414d95527f7-17374181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd76e62f6bee8c71c8e3a31ca4673eaeb7d86f8ad' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/preparation/index.tpl',
      1 => 1432622240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2099118199556414d95527f7-17374181',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'username' => 0,
    'status' => 0,
    'smp' => 0,
    'status_name' => 0,
    'bum' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556414d95e7eb9_79077800',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556414d95e7eb9_79077800')) {function content_556414d95e7eb9_79077800($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <ol class="breadcrumb">
        <li><a href="staff/client/clientindex">マイページトップ</a></li>
        <li>出発</li>
    </ol>

    <div class="panel panel-primary col-md-6 kill-grid"  id="apli-divine">
        <div class="panel-heading">
            <h4 class="panel-title"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
様出発前お手続き一覧</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; ">ご契約</span>
                    <span class="col-xs-3">
                        <button type="button" class="btn btn-group-xs
                            <?php if ($_smarty_tpl->tpl_vars['status']->value['flight_confirm']==1){?>btn-success
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['flight_confirm']==2){?>btn-danger
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['flight_flag']==1){?>btn-warning
                            <?php }else{ ?>btn-info<?php }?>"onClick="location.href='preparation/flightlist'" style="width: 75px; ">
                            フライト
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" class="btn btn-group-xs
                            <?php if ($_smarty_tpl->tpl_vars['status']->value['insurance_confirm']==1){?>btn-success
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['insurance_confirm']==2){?>btn-danger
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['insurance_flag']==1){?>btn-warning
                            <?php }else{ ?>btn-info<?php }?>"
                            onClick="location.href='preparation/insurancelist'" style="width: 75px;<?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?>margin-left: 5px; margin-right: 30px;<?php }?> ">保険
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" class="btn btn-group-xs
                            <?php if ($_smarty_tpl->tpl_vars['status']->value['visa_confirm']==1){?>btn-success
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['visa_confirm']==2){?>btn-danger
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['visa_flag']==1){?>btn-warning
                            <?php }else{ ?>btn-info<?php }?>"
                            onClick="location.href='preparation/visalist'" style="width: 75px; <?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?>margin-left: 10px;<?php }?> ">ビザ
                        </button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; "></span>
                    <span class="col-xs-5">
                        <a href="preparation/loa" target="_blank" class="btn btn-group-xs
                            <?php if ($_smarty_tpl->tpl_vars['status']->value['loa_confirm']==1){?>btn-success
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['loa_flag']==1){?>btn-warning
                            <?php }else{ ?>btn-info<?php }?>"
                            style="width: 110px;">入学許可書
                        </a>
                    </span>
                    
                    <span class="col-xs-3">
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; ">連絡用</span>
                    <span class="col-xs-5">
                        <button type="button" class="btn btn-group-xs
                            <?php if ($_smarty_tpl->tpl_vars['status']->value['schedule_confirm']==1){?>btn-success
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['schedule_flag']==1){?>btn-warning
                            <?php }else{ ?>btn-info<?php }?>"
                            onClick="location.href='schedule/index'">スケジュール
                        </button>
                    </span>
                    <span class="col-xs-4">
                        <button type="button" class="btn btn-group-xs
                            <?php if ($_smarty_tpl->tpl_vars['status']->value['_confirm']==1){?>btn-success
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['article_flag']==1){?>btn-warning
                            <?php }else{ ?>btn-info<?php }?>"
                            onClick="location.href='schedule/selectschool'"
                            style="width: 110px; ">
                            学校連絡
                        </button>
                    </span>
                    <span class="col-xs-1"></span>
                </div>
            </li>
        </ul>
    </div>

    <div class="panel panel-primary col-xs-12 col-md-6 kill-grid" id="bum-divine">
        <div class="panel-heading">
            <h4 class="panel-title">ばむくんによるボタン色の説明</h4>
        </div>
        <div id="bum_message" class="application-box application-box-wrapper col-xs-9">
            <div class="text-bold application-message" id="bum-message">
                水色は誰も確認していない状態。<br />
                オレンジはアナタが確認済み。<br />
                緑はスタッフも確認済みだよ。<br />
                赤だったらやり直しが必要!
            </div>
        </div>
        <span class="application-size application-bum col-xs-4"><img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click4" class="bum-size"></span><br />
        <div class="col-xs-9 kill-grid" style="padding-top: 19px; padding-left: 0; ">
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-info col-xs-12 kill-grid">水色</button></span>
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-warning col-xs-12 kill-grid">オレンジ</button></span>
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-success col-xs-12 kill-grid">緑</button></span>
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-danger col-xs-12 kill-grid">赤</button></span>
        </div>
    </div>

   <div class="col-xs-12"></div>
    <div class="panel panel-primary col-xs-12 col-md-6" style="padding-left: 0px; padding-right: 0px;" >
        <div class="panel-heading">
            <h4 class="panel-title">出発前お手続き確認</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; ">ご契約</span>
                    <span class="col-xs-3">
                        <button type="button" id="flight-check"
                        class="btn btn-group-xs btn-success" style="width: 75px; ">フライト
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" id="insurance-check"
                        class="btn btn-group-xs btn-success" style="width: 75px;">保険
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" id="visa-check"
                        class="btn btn-group-xs btn-success" style="width: 75px;">ビザ
                        </button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid" style="padding-top:6px; "></span>
                    <span class="col-xs-5">
                        <button type="button" id="loa-check"
                        class="btn btn-group-xs btn-success" style="width: 110px; ">入学許可書
                        </button>
                    </span>
                    
                    <span class="col-xs-5">

                </div>
            </li>

            <li>
                <div class="col-xs-12 kill-grid">
                    <button id="preparation_complete" class="btn btn-warning" style="margin-top:10px;">書類完了</button>
                    <div id="data-container" style="margin-top: 45px;"></div>
                </div>
            </li>
        </ul>
    </div>

    <div class="col-xs-12"></div>
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script src="themes/js/bootstrap.min.js"></script>
    <script src="themes/data/bumdata.json"></script>
    <script src="themes/data/bummessage.json"></script>
    <script>
        stat = <?php echo $_smarty_tpl->tpl_vars['status_name']->value;?>
;
        bum  = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['bum']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;

        var height = $('#apli-divine').height();
        $('#bum-divine').css('height', height);
    </script>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>