<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:45:54
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/visalist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106836631455546ba35b7e53-33704576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aba0a032ccf5f877f1dfceae0ae4d2aa3224a1ae' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/visalist.tpl',
      1 => 1435656776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106836631455546ba35b7e53-33704576',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546ba369b129_50404564',
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
<?php if ($_valid && !is_callable('content_55546ba369b129_50404564')) {function content_55546ba369b129_50404564($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>preparation/index">出発前お手続き一覧</a></li>
  <li>ビザ関連情報</li>
</ol>

<div class="contents-wrapper">
    <h2>ビザ関連情報入力</h2>
    お客様のビザ情報や、渡航先でご利用になられる情報の登録編集画面です。<br />
    学校に連絡先の提出を求められた場合は学校連絡ページよりPDFをダウンロードしたものをご利用ください。
</div>

<div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
    <button type="button" id="changevisa_new" class="btn btn-primary">ビザ情報登録</button>
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
                    <span class="col-xs-6 kill-grid seminar-header seminar-title"><span class="text-bold text-italic"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['visa_type'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></span>
                    <span class="col-xs-6 seminar-header seminar-title text-right righting">
                        <span id="changevisa_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="col-xs-7 clickable"><img src="themes/images/edit.png" />変更</span>
                        <span id="deletevisa_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['visa_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="edit-del-controller clickable"><img src="themes/images/delete.png" />削除</span>
                    </span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">ビザ発給番号</span>
                        <span class="col-xs-7 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['visa_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">パスポート番号</span>
                        <span class="col-xs-7 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['passport_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">入国予定日</span>
                        <span class="col-xs-7 kill-grid"><?php if ($_smarty_tpl->tpl_vars['item']->value['expected_entrance_date']!='null'){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['expected_entrance_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">帰国予定日</span>
                        <span class="col-xs-7 kill-grid"><?php if ($_smarty_tpl->tpl_vars['item']->value['expected_return_date']!='null'){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['expected_return_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">入国日</span>
                        <span class="col-xs-7 kill-grid"><?php if ($_smarty_tpl->tpl_vars['item']->value['arrival_date']!='null'){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['arrival_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-5 kill-grid">VISA有効期限</span>
                        <span class="col-xs-7 kill-grid"><?php if ($_smarty_tpl->tpl_vars['item']->value['visa_expiry_date']!='null'){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['visa_expiry_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></span>
                    </div>
                </li>
            </ul>
        </div>
    <?php } ?>
<?php }?>
<span class="col-xs-12"><a id="help-visa" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a></span>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>