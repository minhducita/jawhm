<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:48:50
         compiled from "/var/www/html/mypage/application/modules/default/views/member/email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15047789665559b56c394200-49224935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b74963548a8e11477e2c439fbf5866975483c8dc' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/email.tpl',
      1 => 1435656734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15047789665559b56c394200-49224935',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5559b56c5cd395_05503923',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'temp' => 0,
    'list' => 0,
    'mail_num' => 0,
    'i' => 0,
    'item' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559b56c5cd395_05503923')) {function content_5559b56c5cd395_05503923($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>member/index">会員情報変更</a></li>
  <li>メールアドレス変更</li>
</ol>

<div class="contents-wrapper">
    <h4>メールアドレス変更</h4>
    お客様にご登録頂いたメールアドレスの一覧です。<br />
    種類より右側の項目はクリックすることで編集可能です。<br />
    該当アドレスに当協会から状況確認等送信しますので、最低1つお客様に届くメールアドレスを設定してください(3つまで)<br />

</div>

<?php if (count($_smarty_tpl->tpl_vars['temp']->value)<=0&&count($_smarty_tpl->tpl_vars['list']->value)<3){?>
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
        <button type="button" id="change_email_null" class="btn btn-primary">メールアドレス新規登録</button>
    </div>
<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['list']->value)>0){?>
    <?php echo htmlspecialchars(htmlspecialchars(count($_smarty_tpl->tpl_vars['list']->value), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 件の登録があります。<br />
    本登録済みのメールアドレス一覧<br />
<?php }else{ ?>
    現在、お客様にご登録頂いているメールアドレスはありません。
<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['list']->value)>3){?>
    <?php $_smarty_tpl->tpl_vars['mail_num'] = new Smarty_variable(3, null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['mail_num'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['list']->value), null, 0);?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mail_num']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration']-1, null, 0);?>
    <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
        <div class="panel-heading list-header righting">
            <div class="panel-title">
                <span class="col-xs-6 col-md-3 kill-grid seminar-header seminar-title">メールアドレス</span>
                <span class="col-xs-6 col-md-9 seminar-header seminar-title text-right"><span id="email_edit_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]['email_id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]['ID'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="clickable"><img src="themes/images/edit.png" />変更</span></span>
            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid">アドレス</span>
                    <span class="col-xs-9 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]['email'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid">ログイン</span>
                    <span class="col-xs-3 kill-grid"><?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]['key_flag']==1){?><button type="button" class="btn btn-default" style="font-size: 10px;">現在のID</button><?php }else{ ?><button id="change_key_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['email_id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" type="button" class="btn btn-primary" style="font-size: 10px;">IDに使用</button><?php }?></span>
                    <span class="col-xs-3 kill-grid">種類</span>
                    <span class="col-xs-3 kill-grid"><?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]['email_type']==0){?>ＰＣ<?php }else{ ?>携帯<?php }?></span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-2 kill-grid">出発前</span>
                    <span class="col-xs-1 kill-grid"><?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]['pre_departure']==1){?><span class="glyphicon glyphicon-ok"></span><?php }else{ ?><span id="_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['email_id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="glyphicon glyphicon-minus"></span><?php }?></span>
                    <span class="col-xs-2 kill-grid">出発後</span>
                    <span class="col-xs-1 kill-grid"><?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]['post_departure']==1){?><span class="glyphicon glyphicon-ok clickable"></span><?php }else{ ?><span class="glyphicon glyphicon-minus clickable"></span><?php }?></span>
                    <span class="col-xs-3 kill-grid">請求連絡</span>
                    <span class="col-xs-2 kill-grid"><?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]['bill']==1){?><span class="glyphicon glyphicon-ok clickable"></span><?php }else{ ?><span class="glyphicon glyphicon-minus clickable"></span><?php }?></span>
                </div>
            </li>
        </ul>
    </div>
<?php endfor; endif; ?>

<?php if (count($_smarty_tpl->tpl_vars['temp']->value)>0){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['temp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div class="col-xs-12" style="margin-top: 20px;"></div>
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading list-header righting">
                <div class="panel-title">
                    <span class="col-xs-7 col-md-6 kill-grid seminar-header seminar-title">仮登録中のメールアドレス</span>
                    <span class="col-xs-5 col-md-6 seminar-header seminar-title text-right"><span id="sendemail_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['email_id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="glyphicon glyphicon-share-alt clickable"></span>再送
                    <span id="delemail_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['email_id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="edit-del-controller clickable"><img src="themes/images/delete.png" />削除</span></span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 col-md-3 kill-grid">アドレス</span>
                        <span class="col-xs-8 col-xs-9 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['email'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 col-md-3 kill-grid">メールの種類</span>
                        <span class="col-xs-8 col-md-9 kill-grid"><?php if ($_smarty_tpl->tpl_vars['item']->value['email_type']==0){?>ＰＣ<?php }else{ ?>携帯<?php }?></span>
                    </div>
                </li>
            </ul>
        </div>
    <?php } ?>
<?php }?>
<a id="help-email" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>