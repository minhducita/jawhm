<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:45:16
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214654982855546a067938a6-73641259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59141005880924f125c11002aacd4654947dd7e7' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/index.tpl',
      1 => 1435656768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214654982855546a067938a6-73641259',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546a068f2c06_75574628',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'username' => 0,
    'status' => 0,
    'smp' => 0,
    'bum' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546a068f2c06_75574628')) {function content_55546a068f2c06_75574628($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <ol class="breadcrumb">
        <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
        <li>出発前お手続き一覧</li>
    </ol>

    <div class="col-xs-12 col-md-1"></div>
    <div class="panel panel-primary col-xs-12 col-md-5 kill-grid" id="apli-divine">
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
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['flight_flag']==1){?>btn-warning
                            <?php }else{ ?>btn-info<?php }?>"onClick="location.href='preparation/flightlist'" style="width: 75px; ">
                            フライト
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" class="btn btn-group-xs
                            <?php if ($_smarty_tpl->tpl_vars['status']->value['insurance_confirm']==1){?>btn-success
                            <?php }elseif($_smarty_tpl->tpl_vars['status']->value['insurance_flag']==1){?>btn-warning
                            <?php }else{ ?>btn-info<?php }?>"
                            onClick="location.href='preparation/insurancelist'" style="width: 75px;<?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?>margin-left: 5px; margin-right: 30px;<?php }?> ">保険
                        </button>
                    </span>
                    <span class="col-xs-3">
                        <button type="button" class="btn btn-group-xs
                            <?php if ($_smarty_tpl->tpl_vars['status']->value['visa_confirm']==1){?>btn-success
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

    <div class="panel panel-primary col-xs-12 col-md-5 kill-grid" id="bum-divine">
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
    <div class="col-xs-12 col-md-1"></div>
    <div class="col-xs-12"><a id="help-preparation" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a></div>
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script src="themes/data/bumdata.json"></script>
    <script src="themes/data/bummessage.json"></script>
    <script>
        bum  = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['bum']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;

        var height = $('#apli-divine').height();
        $('#bum-divine').css('height', height);
    </script>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>