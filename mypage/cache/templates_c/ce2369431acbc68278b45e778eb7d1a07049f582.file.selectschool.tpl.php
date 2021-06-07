<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:46:22
         compiled from "/var/www/html/mypage/application/modules/default/views/schedule/selectschool.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44214042955546c509b4b58-99533062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce2369431acbc68278b45e778eb7d1a07049f582' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/schedule/selectschool.tpl',
      1 => 1435656791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44214042955546c509b4b58-99533062',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546c50bb3334_83566089',
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
<?php if ($_valid && !is_callable('content_55546c50bb3334_83566089')) {function content_55546c50bb3334_83566089($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>preparation/index">出発前お手続き一覧</a></li>
  <li>学校・ご実家用連絡先シート印字</li>
</ol>

<div class="contents-wrapper">
    <h2>学校・ご実家用連絡先シート印字</h2>
    お客様のご入学される学校に提出するための連絡先シートを表示します。<br />
    学校ごとに出力いたしますので、対象となる学校をご選択ください。
</div>

<ul style="list-style-type:none; ">
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2>学校提出用</h2>
                </div>
            </div>
            <ul class="list-group">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <li class="list-group-item"><a id="selinsvisa_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[3], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                        <?php if ($_smarty_tpl->tpl_vars['item']->value[3]==='IRE'){?>アイルランド
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='USA'){?>アメリカ
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='GBR'){?>イギリス
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='UK'){?>イギリス
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='IND'){?>インド
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='AUS'){?>オーストラリア
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='CAN'){?>カナダ
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='DEU'){?>ドイツ
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='NZ'){?>ニュージーランド
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='NZL'){?> ニュージーランド
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='FRA'){?>フランス
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='EUR'){?>ユーロ
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='KOR'){?>韓国
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='JPN'){?>日本
                     <?php }?>
                     <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['entrance_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
入学<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2>ご実家用</h2>
                </div>
            </div>
            <ul class="list-group">
               <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <li class="list-group-item"><a id="forparents_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[3], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value[3]==='IRE'){?>アイルランド
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='USA'){?>アメリカ
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='GBR'){?>イギリス
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='UK'){?>イギリス
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='IND'){?>インド
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='AUS'){?>オーストラリア
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='CAN'){?>カナダ
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='DEU'){?>ドイツ
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='NZ'){?>ニュージーランド
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='NZL'){?> ニュージーランド
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='FRA'){?>フランス
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='EUR'){?>ユーロ
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='KOR'){?>韓国
                         <?php }elseif($_smarty_tpl->tpl_vars['item']->value[3]==='JPN'){?>日本
                     <?php }?>
                     <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['entrance_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
入学<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</a></li>
                <?php } ?>
            </ul>
        </div>

    <?php }else{ ?>
        <li>現在印刷できる情報はありません。</li>
    <?php }?>
</ul>
<a id="help-schoolcontact" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>