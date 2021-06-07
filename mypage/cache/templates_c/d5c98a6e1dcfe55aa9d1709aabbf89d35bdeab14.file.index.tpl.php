<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:44:42
         compiled from "/var/www/html/mypage/application/modules/default/views/application/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68751212455546bae5e8b08-63564416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5c98a6e1dcfe55aa9d1709aabbf89d35bdeab14' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/application/index.tpl',
      1 => 1435656720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68751212455546bae5e8b08-63564416',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546bae8256b7_95376017',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'username' => 0,
    'status' => 0,
    'school' => 0,
    'dob' => 0,
    'abroad' => 0,
    'agree' => 0,
    'bum' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546bae8256b7_95376017')) {function content_55546bae8256b7_95376017($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?>﻿<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <ol class="breadcrumb">
        <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
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
                    <span class="col-xs-3"><button type="button" class="btn btn-group-xs
                        <?php if ($_smarty_tpl->tpl_vars['status']->value['agreement_confirm']==1){?>btn-success
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['agreement_confirm']==2){?>btn-danger
                        <?php }elseif($_smarty_tpl->tpl_vars['status']->value['agreement_flag']==1){?>btn-warning
                        <?php }else{ ?>btn-info<?php }?>"
                        id="dob_check">同意書</button>
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
            <li class="list-group-item">
                <span class="glyphicon glyphicon-asterisk"></span>学校情報:
                <span class="text-italic"><?php if ($_smarty_tpl->tpl_vars['school']->value[0]!=''){?><a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school']->value[1], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><?php }?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school']->value[0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['school']->value[1]!=''){?></a><?php }?></span>
            </li>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-asterisk"></span>申込み期限:
                <span class="text-italic"><?php if (isset($_smarty_tpl->tpl_vars['status']->value['enroll_expiration_date'])){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['status']->value['enroll_expiration_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></span>
            </li>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-asterisk"></span>申込内容:
                <span class="text-italic"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['school']->value['item'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
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
                    <a id="canwhdl"><span class="glyphicon glyphicon-download-alt"></span>
                    申請方法をダウンロードする</a>
                </li>
            </ul>

        </div>
    <?php }?>
    <div class="col-xs-12"><a id="help-application" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a></div>

<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/data/bumdata.json"></script>
<script type="text/javascript" src="themes/data/bummessage.json"></script>
<script>

    var today = new Date();
    var dob = new Date(1970, 0, <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['dob']->value,"%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
);
    dob.setTime(today.getTime() - dob.getTime());
    var age = dob.getUTCFullYear() - <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['dob']->value,"%G"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;
    var month = dob.getUTCMonth() - (<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['dob']->value,"%m"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 - 1);
    if(month < 0){ //月がマイナスなので年から繰り下げ
        age --;
        month += 12;
       };
    var abroad = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['abroad']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
';
    var agree = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['agree']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
';

    
        $("#dob_check").click(function(){
            if (age >= 20) {
                window.open('application/agreement', '_new');
            } else {
                alert('未成年の方は保護者の方の同意が必要となります。詳細は当協会へお問い合わせください。');
            }
        });

        var height = $('#apli-divine').height();
        $('#bum-divine').css('height', height);

        $("#canwhdl").click(function() {
            if (agree === '1') {
                window.open('application/canwhdl', '_new');
            } else {
                alert('詳細情報は約款事項に同意が確認でき次第ご覧いただけます。');
            }
        });

    
    bum  = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['bum']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;
</script>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>