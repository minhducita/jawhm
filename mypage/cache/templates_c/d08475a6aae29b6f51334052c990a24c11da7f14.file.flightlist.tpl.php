<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:45:18
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/flightlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5321816755555a087678535-66492157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd08475a6aae29b6f51334052c990a24c11da7f14' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/flightlist.tpl',
      1 => 1435656765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5321816755555a087678535-66492157',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5555a0877153f9_04486768',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'items' => 0,
    'item' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5555a0877153f9_04486768')) {function content_5555a0877153f9_04486768($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>preparation/index">出発前お手続き一覧</a></li>
  <li>フライト情報一覧</li>
</ol>

<div class="contents-wrapper">
    <h2>フライト情報一覧</h2>
    お客様のフライト予約情報の登録編集画面です。<br />
</div>

<div id="page-container">
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
        <button type="button" id="changeflight_new" class="btn btn-primary">フライト情報登録</button>
    </div>

    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
                <div class="panel-heading list-header righting">
                    <div class="panel-title">
                        <span class="col-xs-4 kill-grid seminar-header seminar-title">便名: <span class="text-bold text-italic"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['flight_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></span>
                        <span class="col-xs-8 seminar-header seminar-title text-right">
                            <span id="changeflight_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['ID'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="col-xs-8 clickable"><img src="themes/images/edit.png" />変更</span>
                            <span id="deleteflight_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['ID'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['flight_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="edit-del-controller clickable"><img src="themes/images/delete.png" />削除</span>
                        </span>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid">出発地</span>
                            <span class="col-xs-3 kill-grid text-break"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['departure_place'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                            <span class="col-xs-3 kill-grid">出発日時</span>
                            <span class="col-xs-3 kill-grid">
                                <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['departure_time'],"%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<br />
                                <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['departure_time'],"%H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                            </span>
                        </div>
                    </li>
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid">到着地</span>
                            <span class="col-xs-3 kill-grid text-break"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['destination_place'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                            <span class="col-xs-3 kill-grid">到着時間</span>
                            <span class="col-xs-3 kill-grid">
                                <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['destination_time'],"%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<br />
                                <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['destination_time'],"%H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        <?php } ?>
    <?php }else{ ?>
        現在、お客様のフライト情報は登録されていません。<br />
    <?php }?>
</div>
<a id="help-flight" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>