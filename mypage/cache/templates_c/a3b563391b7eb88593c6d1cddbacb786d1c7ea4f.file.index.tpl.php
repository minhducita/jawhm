<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:46:09
         compiled from "/var/www/html/mypage/application/modules/default/views/schedule/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175248886555546c42c849c3-34762458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3b563391b7eb88593c6d1cddbacb786d1c7ea4f' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/schedule/index.tpl',
      1 => 1435656787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175248886555546c42c849c3-34762458',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546c42e517c7_52345022',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'username' => 0,
    'items' => 0,
    'i' => 0,
    'leave_date' => 0,
    'item' => 0,
    'abroad' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546c42e517c7_52345022')) {function content_55546c42e517c7_52345022($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>preparation/index">出発前お手続き一覧</a></li>
  <li>ご渡航日程表</li>
</ol>

<div class="contents-wrapper">
    <h2>ご渡航日程表</h2>
    お客様のご渡航スケジュールです。<br />
</div>

    <h1><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 様のご渡航日程表</h1>
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading schedule-header">
                <div class="panel-title">
                    <span class="col-xs-3 kill-grid schedule-header seminar-title">イベント<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    <span class="col-xs-9 schedule-header seminar-title"><span class="text-bold text-italic">日本出国日</span></span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item sch-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid date-filling">日時</span>
                        <span class="col-xs-9 kill-grid date-filling"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['leave_date']->value,"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item sch-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-3 kill-grid"></span>
                        <span class="col-xs-9 kill-grid"></span>
                    </div>
                </li>
            </ul>
        </div>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
                <div class="panel-heading schedule-header">
                    <div class="panel-title">
                        <span class="col-xs-3 kill-grid schedule-header seminar-title">イベント<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                        <span class="col-xs-9 schedule-header seminar-title">
                            <span class="text-bold text-italic">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9){?>フライト情報: <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['flight_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==3){?>日本語空港送迎<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==2){?>ホームステイ開始<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?>学校 入学<?php }?>
                            </span>
                        </span>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item sch-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid date-filling">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9){?>出発
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?>学校名
                                <?php }else{ ?>日時
                                <?php }?>
                            </span>
                            <span class="col-xs-9 kill-grid<?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']!=1){?> date-filling<?php }?>">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==3||$_smarty_tpl->tpl_vars['item']->value['entry_class']==2){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['event_date'],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[4], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['event_date'],"%m月%d日 %H時%M分"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>
                            </span>
                        </div>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9||$_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?>
                        <li class="list-group-item sch-btn">
                            <div class="col-xs-12 kill-grid">
                                <span class="col-xs-3 kill-grid date-filling">到着</span>
                                <span class="col-xs-9 kill-grid date-filling">
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9){?>
                                        <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['destination_time'],"%m月%d日 %H時%M分"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                                    <?php }elseif($_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?>
                                        <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['event_date'],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                                    <?php }?>
                                </span>
                            </div>
                        </li>
                    <?php }else{ ?>
                        <li class="list-group-item sch-btn">
                            <div class="col-xs-12 kill-grid">
                                <span class="col-xs-3 kill-grid"></span>
                                <span class="col-xs-9 kill-grid"></span>
                            </div>
                        </li>
                    <?php }?>
                </ul>
            </div>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
        <?php } ?>
        <p class="col-xs-12">
            <a href="schedule/schedulepdf?abroad=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['abroad']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
&name=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank">日程表をダウンロードする</a><br />
            お客様がPCでご覧になられている場合はPDFで、<br />
            スマートフォンでご覧になられている場合はJPEG形式でダウンロードされます。<br />
            ご渡航中でインターネット環境がない場所でも見れるようにしておくことをお勧めします。<br />
            <br />
            スマートフォンをお使いで上記書類を保存する方は<br />
            iPhoneの場合は、画像をロングタップ(一定時間タッチし続ける) すると表示される「画像を保存」をタップするとカメラロールに保存されます。<br />
            Androidの場合は、画像をロングタップするとメニューが表示されるので「画像を保存」を選択するとギャラリーの中のDownloadというアルバムの中に画像が保存されます。
        </p>
    <?php }else{ ?>
        現在、お客様のご渡航予定はありません
    <?php }?>
<a id="help-schedule" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>