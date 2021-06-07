<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:49:04
         compiled from "/var/www/html/mypage/application/modules/default/views/member/addresslist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19048938075559b58bbf8849-31129174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '078c20d75f0e1aba406bcb75c97cfb2a497a9e02' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/addresslist.tpl',
      1 => 1435656737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19048938075559b58bbf8849-31129174',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5559b58bd5efb1_97319532',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'list' => 0,
    'address_num' => 0,
    'i' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559b58bd5efb1_97319532')) {function content_5559b58bd5efb1_97319532($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>member/index">会員情報変更</a></li>
  <li>お客様住所一覧</li>
</ol>

<div class="contents-wrapper">
    <h5>お客様住所一覧</h5>
    お客様にご登録頂いた住所の一覧です。<br />
    現住所、実家住所、留学先住所の3種類をご登録いただけます。<br />

</div>

<?php if (count($_smarty_tpl->tpl_vars['list']->value)>=1){?>
<?php }else{ ?>
    現在、お客様にご登録頂いている住所情報はありません。
<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['list']->value)<3){?>
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
        <button type="button" id="change_address_null" class="btn btn-primary">住所新規登録</button>
    </div>
<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['list']->value)>=3){?>
    <?php $_smarty_tpl->tpl_vars['address_num'] = new Smarty_variable(3, null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['address_num'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['list']->value), null, 0);?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['address_num']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <span class="col-xs-6 kill-grid seminar-header seminar-title">登録先: <span class="text-bold text-italic"><?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value][6]==='null'){?>現住所<?php }else{ ?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value][6], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></span></span>
                <span class="col-xs-6 seminar-header seminar-title text-right"><span id="change_address_<?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value][0]!='null'){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value][0], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }else{ ?>null<?php }?>" class="clickable"><img src="themes/images/edit.png" />変更</span></span>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">郵便番号</span>
                    <span class="col-xs-9 kill-grid list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value][1], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">都道府県</span>
                    <span class="col-xs-9 kill-grid list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value][2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">市群区</span>
                    <span class="col-xs-9 kill-grid list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value][3], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">町村</span>
                    <span class="col-xs-9 kill-grid list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value][4], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                </div>
            </li>
            <li class="list-group-item inc-btn">
                <div class="col-xs-12 kill-grid">
                    <span class="col-xs-3 kill-grid list-title-centering">番地その他</span>
                    <span class="col-xs-9 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value][5], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                </div>
            </li>
        </ul>
    </div>
<?php endfor; endif; ?>
<div class="col-xs-12">"
    <a id="help-address" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
</div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>