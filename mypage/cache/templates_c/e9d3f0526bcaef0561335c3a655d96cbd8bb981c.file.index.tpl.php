<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 15:38:13
         compiled from "/var/www/html/mypage/application/modules/staff/views/application/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1873685989556414d5323ef7-49454366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9d3f0526bcaef0561335c3a655d96cbd8bb981c' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/application/index.tpl',
      1 => 1432622218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1873685989556414d5323ef7-49454366',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'username' => 0,
    'status' => 0,
    'school' => 0,
    'status_name' => 0,
    'bum' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556414d549b9f8_29814313',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556414d549b9f8_29814313')) {function content_556414d549b9f8_29814313($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <ol class="breadcrumb">
        <li><a href="staff/client/clientindex">マイページトップ</a></li>
        <li>書類</li>
    </ol>

    <div class="col-xs-12 col-md-1"></div>
    <div class="panel panel-primary col-xs-12 col-md-5 kill-grid" id="apli-divine">
        <div class="panel-heading">
            <h4 class="panel-title"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
様にご準備頂く書類一覧</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid list-title-centering" >確認</span>
                    <span class="col-xs-4"><a href="application/getfile?file_no=6" target="_blank" class="btn btn-group-xs
                        <?php if ($_smarty_tpl->tpl_vars['status']->value['article_confirm']==1){?>btn-success
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['article_confirm']==2){?>btn-danger
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['article_flag']==1){?>btn-warning
                        <?php }else{ ?>btn-info<?php }?>"
                        style="width:92px; ">約款</a>
                    </span>
                    <span class="col-xs-3"><a href="application/agreement" target="_blank" class="btn btn-group-xs
                        <?php if ($_smarty_tpl->tpl_vars['status']->value['agreement_confirm']==1){?>btn-success
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['agreement_confirm']==2){?>btn-danger
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['agreement_flag']==1){?>btn-warning
                        <?php }else{ ?>btn-info<?php }?>">同意書</a>
                    </span>
                    <span class="col-xs-3"><button type="button" class="btn btn-group-xs
                        <?php if ($_smarty_tpl->tpl_vars['status']->value['deposit_finish_confirm']==1){?>btn-success
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['deposit_finish_confirm']==2){?>btn-danger
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['deposit_finish_flag']==1){?>btn-warning
                        <?php }else{ ?>btn-info<?php }?>"
                        id="deposit">支払日</button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid list-title-centering">請求</span>
                    <span class="col-xs-4"><button type="button" class="btn btn-group-xs
                        <?php if ($_smarty_tpl->tpl_vars['status']->value['deposit_confirm']==1){?>btn-success
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['deposit_confirm']==2){?>btn-danger
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['deposit_flag']==1){?>btn-warning
                        <?php }else{ ?>btn-info<?php }?>"
                        id="estimate" style="width:92px; ">見積</button>
                    </span>
                    <span class="col-xs-3"><button type="button" class="btn btn-group-xs
                        <?php if ($_smarty_tpl->tpl_vars['status']->value['bill_confirm']==1){?>btn-success
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['bill_confirm']==2){?>btn-danger
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['bill_flag']==1){?>btn-warning
                        <?php }else{ ?>btn-info<?php }?>"
                        id="bill">請求書</button>
                    </span>
                    <span class="col-xs-3"><button type="button" class="btn btn-group-xs
                        <?php if ($_smarty_tpl->tpl_vars['status']->value['receipt_confirm']==1){?>btn-success
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['receipt_confirm']==2){?>btn-danger
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['receipt_flag']==1){?>btn-warning
                        <?php }else{ ?>btn-info<?php }?>"
                        id="receipt">受領書</button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid list-title-centering">手続</span>
                    <span class="col-xs-4"><button type="button" class="btn btn-group-xs
                        <?php if ($_smarty_tpl->tpl_vars['status']->value['passport_confirm']==1){?>btn-success
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['passport_confirm']==2){?>btn-danger
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['passport_flag']==1){?>btn-warning
                        <?php }else{ ?>btn-info<?php }?>"
                        id="passport" style="width: 92px;">パスポート</button>
                    </span>
                    
                    <span class="col-xs-3">
                    <span class="col-xs-3">
                    </span>
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
            <span class="col-xs-3 grid-half"><button type="button" class="btn btn-xs btn-group btn-danger col-xs-12 kill-grid">赤</button></span></span>
        </div>
    </div>

    <div class="col-xs-12 col-md-12"></div>
    <div class="col-xs-12 col-md-1"></div>

    <div class="panel panel-primary col-xs-12 col-md-5" style="padding-left: 0px; padding-right: 0px;" >
        <div class="panel-heading">
            <h4 class="panel-title">留学情報</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <span class="col-md-4"><span class="glyphicon glyphicon-asterisk"></span>学校情報:</span>
                <span class="text-italic col-md-8"><?php if ($_smarty_tpl->tpl_vars['school']->value[0]!=''){?><a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school']->value[1], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><?php }?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['school']->value[1]!=''){?></a><?php }?></span>
            </li>
            <li class="list-group-item inc-btn">
                <span class="col-md-4"><span class="glyphicon glyphicon-asterisk"></span>申込み期限:</span>
                <span class="col-md-6">
                    <span class="input-group date" id="enroll_expiration_date">
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status']->value['enroll_expiration_date'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" name="enroll_expiration_date" />
                        <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </span>
                </span>
                <span class="col-md-2"><button id="save_enroll_expiration_date" class="btn btn-primary">保存</button></span>
            </li>
            <li class="list-group-item inc-btn">
                <span class="col-md-4"><span class="glyphicon glyphicon-asterisk"></span>申込内容:</span>
                <span class="text-italic col-md-8"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school']->value['item'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
(<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school']->value['weeks'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
Week<?php if ($_smarty_tpl->tpl_vars['school']->value['weeks']>1){?>s<?php }?>)</span>
            </li>
        </ul>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['school']->value[5]=='カナダ'){?>
        <div class="panel panel-primary col-xs-12 col-md-5" style="padding-left: 0px; padding-right: 0px;" >
            <div class="panel-heading">
                <h4 class="panel-title">カナダワーキングホリデー取得方法</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="application/canwhdl" target="_blank"><span class="glyphicon glyphicon-download-alt"></span>
                    申請方法をダウンロードする</a>
                </li>
            </ul>

        </div>
    <?php }?>

    <div class="col-xs-12"></div>
    <div class="col-md-1"></div>
    <div class="panel panel-primary col-xs-12 col-md-5 kill-grid" id="apli-divine">
        <div class="panel-heading">
            <h4 class="panel-title"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
様の書類確認</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid list-title-centering" >確認</span>
                    <span class="col-xs-4"><button type="button" id="article-check"
                    class="btn btn-group-xs btn-success" style="width:92px;">約款</button>
                    </span>
                    <span class="col-xs-3"><button type="button" id="agreement-check"
                    class="btn btn-group-xs btn-success">同意書</button>
                    </span>
                    <span class="col-xs-3"><button type="button" id="deposit_finish-check"
                    class="btn btn-group-xs btn-success">支払日</button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid list-title-centering">請求</span>
                    <span class="col-xs-4"><button type="button" id="deposit-check"
                    class="btn btn-group-xs btn-success" style="width:92px; ">見積</button>
                    </span>
                    <span class="col-xs-3"><button type="button" id="bill-check"
                    class="btn btn-group-xs btn-success">請求書</button>
                    </span>
                    <span class="col-xs-3"><button type="button" id="receipt-check"
                    class="btn btn-group-xs btn-success">受領書</button>
                    </span>
                </div>
            </li>

            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid list-title-centering">手続</span>
                    <span class="col-xs-4"><button type="button" id="passport-check"
                    class="btn btn-group-xs btn-success" style="width:92px; ">パスポート</button>
                    </span>
                    
                    <span class="col-xs-3">
                    <span class="col-xs-3">
                    </span>
                </div>
            </li>
        </ul>
    </div>

    <div class="panel panel-primary col-xs-12 col-md-5" style="padding-left: 0px; padding-right: 0px;" >
        <div class="panel-heading">
            <h4 class="panel-title">書類準備完了時</h4>
        </div>
        <div class="col-xs-12">
            <button id="application_complete" class="btn btn-warning" style="margin-top:10px;">書類完了</button>
            <div id="data-container" style="margin-top: 45px;"></div>
        </div>
    </div>

<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>

<script>
$(function () {
    
    var today = new Date();
    target_date = addDay(today, 1);
    $('#enroll_expiration_date').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd',
        pickTime: false,
        startDate: target_date,
        maxView: 3
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });
    
});
</script>
<script type="text/javascript" src="themes/data/bumdata.json"></script>
<script type="text/javascript" src="themes/data/bummessage.json"></script>
<script>
    stat = <?php echo $_smarty_tpl->tpl_vars['status_name']->value;?>
;
        var height = $('#apli-divine').height();
        $('#bum-divine').css('height', height);
    bum  = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['bum']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;
</script>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>