<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:45:35
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/insurancelist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5506660755555a0838ab159-82381814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87dd42da0deaf0ee4a99d51b26366ae91ebe49ba' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/insurancelist.tpl',
      1 => 1435656772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5506660755555a0838ab159-82381814',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5555a0839dff03_58728062',
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
<?php if ($_valid && !is_callable('content_5555a0839dff03_58728062')) {function content_5555a0839dff03_58728062($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>preparation/index">出発前お手続き一覧</a></li>
  <li>保険契約情報入力</li>
</ol>

<div class="contents-wrapper">
    <h2>保険契約情報入力</h2>
    お客様の保険契約情報の登録編集画面です。<br />
</div>

<div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
    <button type="button" id="changeinsurance_new" class="btn btn-primary">保険契約情報登録</button>
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
                    <span class="col-xs-4 kill-grid seminar-header seminar-title">契約種別: <span class="text-bold text-italic"><?php if ($_smarty_tpl->tpl_vars['item']->value['insurance_type']!='null'){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['insurance_type'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></span></span>
                    <span class="col-xs-8 seminar-header seminar-titie text-right">
                        <span id="changeinsurance_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="col-xs-8 clickable"><img src="themes/images/edit.png" />変更</span>
                        <span id="deleteinsurance_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['policy_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['insured_date_st'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['insured_date_ed'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="clickable"><img src="themes/images/delete.png" />削除</span>
                    </span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">証券番号</span>
                        <span class="col-xs-9 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['policy_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">契約者名</span>
                        <span class="col-xs-9 kill-grid"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['policy_owner'],20), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">入金額</span>
                        <span class="col-xs-9 kill-grid"><?php echo htmlspecialchars(htmlspecialchars(number_format($_smarty_tpl->tpl_vars['item']->value['deposit_amount']), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 円</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">ライン</span>
                        <span class="col-xs-3 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['line'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                        <span class="col-xs-6 kill-grid">区分: <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['division'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">始期日</span>
                        <span class="col-xs-9 kill-grid"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['insured_date_st'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid">周期日</span>
                        <span class="col-xs-9 kill-grid"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['insured_date_ed'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
            </ul>
        </div>
    <?php } ?>
<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
<div class="panel panel-primary panel-title col-xs-12">
    <div class="panel-heading">実際に医療機関に提示する際には以下のリンクから英語版の表示をダウンロードしてお使いください。</div>
    <div class="panel-body">
        <a href="preparation/insenglist">英語表記にする</a>
    </div>
</div>

<?php }?>
<a id="help-insurance" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>