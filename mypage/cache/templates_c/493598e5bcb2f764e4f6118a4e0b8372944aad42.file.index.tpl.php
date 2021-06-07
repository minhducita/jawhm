<?php /* Smarty version Smarty-3.1.13, created on 2016-06-30 15:30:57
         compiled from "/var/www/html/mypage/application/modules/default/views/talk/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8246741765774bca1a63b04-22225162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '493598e5bcb2f764e4f6118a4e0b8372944aad42' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/talk/index.tpl',
      1 => 1419822617,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8246741765774bca1a63b04-22225162',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'items' => 0,
    'base' => 0,
    'item' => 0,
    'name' => 0,
    'i' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5774bca1bc84c4_25781673',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5774bca1bc84c4_25781673')) {function content_5774bca1bc84c4_25781673($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li>一言相談一覧</li>
</ol>

<div class="contents-wrapper">
    <h2>一言相談一覧</h2>
    ご渡航にあたり気になったことがありましたらお気軽にお問い合わせください(300字以内)<br /><br />
    渡航先・ホームステイ先に到着した際もこちらでご一報頂けると助かります。<br /><br />
    また、スタッフより返信がありました際は、ログインに使用しているメールアドレス宛に返信が届いた旨送信させて頂きますのでご了承ください。
</div>
<a id="changetalk_new"><span class="glyphicon glyphicon-pencil">相談内容を入力する</span></a>
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
<h3>ご相談・回答内容</h3>
<?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div class="comment-wrapper">
            <div class="client-image"><img src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/images/client.png"></div>
            <div class="comment client-comment">
                <span class="msgspan-topleft"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['talk_content'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span><br />
                <span class="msgspan-bottomright span-right"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['name']->value['client_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['commented_date'],"%m/%d %H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<br />
                <span id="changetalk_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['talk_id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="glyphicon glyphicon-edit clickable" style="margin-right: 30px;"> </span><span id="deltalk_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['talk_id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['commented_date'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="glyphicon glyphicon-trash"></span></span>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ans_flag']==1){?>
                <div class="staff-image"><img src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/images/staff.png"></div>
                <div class="comment staff-comment">
                    <span id="answer_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="msgspan-topleft"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['ans_content'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span><br />
                    <span id="ansdate_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="msgspan-bottomright span-right">Staff <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['answerd_date'],"%m/%d %H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                </div>
            <?php }?>
        </div>
    <?php } ?>
<?php }else{ ?>
    現在、お客様からの質問はありません。
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>