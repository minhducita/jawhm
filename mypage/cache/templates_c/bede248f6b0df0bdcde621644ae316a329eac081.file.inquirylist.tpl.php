<?php /* Smarty version Smarty-3.1.13, created on 2015-05-15 16:19:25
         compiled from "/var/www/html/mypage/application/modules/default/views/plan/inquirylist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76531978855559dfd23a0c3-28411059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bede248f6b0df0bdcde621644ae316a329eac081' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/plan/inquirylist.tpl',
      1 => 1428641156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76531978855559dfd23a0c3-28411059',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55559dfd35d8c5_55024295',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55559dfd35d8c5_55024295')) {function content_55559dfd35d8c5_55024295($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div id="editflight" class="page-content">
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0; margin-left:50px;">
        <a href="plan/index" class="btn btn-primary">前の画面に戻る</a>
    </div>

    <div class="page-header">
        <h1>
            フライト情報見積依頼一覧
            <small>
                <i class="icon-double-angle-right"></i>
                お客様にご入力頂いたフライト情報見積依頼の履歴です。
            </small>
        </h1>
    </div>

    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
         <div class="panel panel-primary col-xs-12 col-md-6" style="padding-left: 0px; padding-right: 0px;">
            <div class="panel-heading list-header">
                <div class="panel-title">
                    <span class="col-xs-3 kill-grid seminar-header seminar-title">依頼日時</span>
                    <span class="col-xs-6 seminar-header seminar-title">
                        <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['updated_on'],"%G/%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                    </span>
                    <a id="edit_inquiry_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['mypage_flight_inquiry_id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><span class="pull-right"><i class="icon-pencil"></i><span class="white-space">編集</span></span></a>
                </div>
            </div>

            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">名前</span>
                        <span class="col-xs-9 list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name_jp'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">英語名</span>
                        <span class="col-xs-9 list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name_en'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">電話番号</span>
                        <span class="col-xs-9 list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tel'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">Email</span>
                        <span class="col-xs-9 list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['email'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">渡航予定日</span>
                        <span class="col-xs-9 list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['flight_date'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">出発地</span>
                        <span class="col-xs-9 list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['departure_place'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">到着地</span>
                        <span class="col-xs-9 list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['destination_place'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">片道往復</span>
                        <span class="col-xs-9 list-title-centering"><?php if ($_smarty_tpl->tpl_vars['item']->value['ticket_request']==1){?>片道<?php }else{ ?>往復<?php }?></span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">プラン</span>
                        <span class="col-xs-9 list-title-centering"><?php if ($_smarty_tpl->tpl_vars['item']->value['plan_request']==1){?>安さ重視<?php }elseif($_smarty_tpl->tpl_vars['item']->value['plan_request']==2){?>直行便希望<?php }else{ ?>両方<?php }?></span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">ビザ</span>
                        <span class="col-xs-9 list-title-centering"><?php if ($_smarty_tpl->tpl_vars['item']->value['visa_type']==1){?>ワーキングホリデー<?php }elseif($_smarty_tpl->tpl_vars['item']->value['visa_type']==2){?>学生<?php }else{ ?>観光<?php }?></span>
                    </li>
                    <li class="list-group-item inc-btn">
                        <span class="col-xs-3 kill-grid list-title-centering">渡航年齢</span>
                        <span class="col-xs-9 list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['age'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </li>
                </ul>
            </div>
        </div>
    <?php } ?>
</div><?php }} ?>