<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:46:35
         compiled from "/var/www/html/mypage/application/modules/default/views/seminar/booking.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9111716345559b4430dd2e8-05874140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12e95d2f01af0d36be5e6dd125e05950715f839b' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/seminar/booking.tpl',
      1 => 1435656813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9111716345559b4430dd2e8-05874140',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5559b443332422_47771797',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'username' => 0,
    'reserve' => 0,
    'smp' => 0,
    'i' => 0,
    'item' => 0,
    'iphone' => 0,
    'n' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559b443332422_47771797')) {function content_5559b443332422_47771797($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>seminar/index">セミナー予約確認</a></li>
  <li>予約確認</li>
</ol>

<div class="contents-wrapper">
    <h1><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
様<br />
    ご予約セミナー情報</h1>
    お客様が現在予約されているセミナーの一覧情報です。
</div>

<?php if (count($_smarty_tpl->tpl_vars['reserve']->value)>0){?>
    <?php echo htmlspecialchars(htmlspecialchars(count($_smarty_tpl->tpl_vars['reserve']->value), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 件のセミナーがあります。<br />
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable(1, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reserve']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>id="seminar-size2_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"<?php }?> class="panel panel-primary panel-header-padding-kill col-xs-12 col-md-6" style="padding-left: 0px; padding-right: 0px;">
            <div class="panel-heading list-header">
                <div class="panel-title">
                    <span class="col-xs-3 kill-grid seminar-header">開始日時</span>
                    <span class="col-xs-9 seminar-header seminar-title">
                        <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['starttime'],"%G年%m月%d日 %H時%M分"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                    </span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid list-title-centering">会場</span>
                        <span class="col-xs-3 list-title-centering">
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['place']==='tokyo'){?>東京<?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='osaka'){?>大阪<?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='nagoya'){?>名古屋<?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='fukuoka'){?>福岡<?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='okinawa'){?>沖縄<?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='sendai'){?>仙台<?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='toyama'){?>富山<?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='kyoto'){?>京都<?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='omiya'){?>大宮}<?php }else{ ?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['place'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>
                        </span>
                        <span class="col-xs-3 kill-grid list-title-centering">
                            <a href="" id="seminar_detail<?php echo htmlspecialchars(htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['seminarid'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars(htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['seminarid'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">詳細</a>
                        </span>
                        <span class="col-xs-3 kill-grid list-title-centering">
                            <a href="http://www.jawhm.or.jp/yoyaku/disp/<?php echo htmlspecialchars(htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars(htmlspecialchars(md5(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['email'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank">キャンセル</a>
                        </span>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="col-xs-12 kill-padding inc-title">
                        <span class="col-xs-3 kill-padding">セミナー名</span>
                        <span class="col-xs-9 add-under-padding">
                            <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['k_title1'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                        </span>
                        <?php if ($_smarty_tpl->tpl_vars['iphone']->value==1){?>
                            <span class="inc-calendar pull-right"><a href="seminar/addcalendar?id=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['seminarid'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><i class="icon-calendar"></i>カレンダーに追加</a></span>
                        <?php }?>
                    </div>
                </li>
            </ul>
        </div>

        <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
    <?php } ?>

<?php }else{ ?>
    現在、お客様のご予約されているセミナー情報はありません。
<?php }?>
<a id="help-bookconfirm" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>