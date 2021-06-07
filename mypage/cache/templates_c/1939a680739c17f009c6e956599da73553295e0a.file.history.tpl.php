<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:46:51
         compiled from "/var/www/html/mypage/application/modules/default/views/seminar/history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14797677455559b47e65b8c3-63536116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1939a680739c17f009c6e956599da73553295e0a' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/seminar/history.tpl',
      1 => 1435656809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14797677455559b47e65b8c3-63536116',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5559b47e892675_47899497',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'seminar' => 0,
    'smp' => 0,
    'i' => 0,
    'item' => 0,
    'pages' => 0,
    'base' => 0,
    'p' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559b47e892675_47899497')) {function content_5559b47e892675_47899497($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>seminar/index">セミナー予約確認</a></li>
  <li>過去に参加したセミナー一覧</li>
</ol>

<div class="contents-wrapper">
    <h4>過去に参加したセミナー一覧</h4>
    お客様が過去に参加されたセミナーの一覧情報です。
</div>

<?php if (count($_smarty_tpl->tpl_vars['seminar']->value)>0){?>
    <?php echo htmlspecialchars(htmlspecialchars(count($_smarty_tpl->tpl_vars['seminar']->value), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 件のセミナーがあります。<br />
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['seminar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <div <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>id="seminar-size2_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"<?php }?> class="panel panel-primary panel-header-padding-kill col-xs-12 col-md-6"  style="padding-left: 0px; padding-right: 0px;">
                <div class="panel-heading list-header">
                    <div class="panel-title">
                        <span class="col-xs-12 kill-grid seminar-header"><span class="text-bold text-italic">開催日時: <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['starttime'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
～</span></span>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item inc-btn">
                        <div class="col-xs-12 kill-grid">
                            <span class="col-xs-3 kill-grid list-title-centering">会場</span>
                            <span class="col-xs-3 kill-grid list-title-centering">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['place']==='tokyo'){?>東京
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='osaka'){?>大阪
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='nagoya'){?>名古屋
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='fukuoka'){?>福岡
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='okinawa'){?>沖縄
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='sendai'){?>仙台
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='toyama'){?>富山
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='kyoto'){?>京都
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['place']==='omiya'){?>大宮}
                                <?php }else{ ?>
                                    <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['place'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                                <?php }?>
                            </span>
                            <span class="col-xs-3 kill-grid list-title-centering"><a href="" id="seminar_detail<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['seminarid'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['seminarid'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">詳細</a></span>
                            <span class="col-xs-3 list-title-centering"></span>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-xs-12 kill-grid inc-title">
                            <span class="col-xs-3 kill-grid">セミナー名</span>
                            <span class="col-xs-9 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['k_title1'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                        </div>
                    </li>
                </ul>
            </div>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
        <?php } ?>
    
    <div class="col-xs-12 text-center">
            <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['firstItemNumber'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 to <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['lastItemNumber'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 of <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['totalItemCount'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<br />
            <ul class="pagination">
                <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']!=$_smarty_tpl->tpl_vars['pages']->value['first']){?>
                    <li><a id="firstpage" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/seminar/history?page=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['first'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"> &lt;&lt; </a></li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['previous'])){?>
                    <li><a id="previouspage" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/seminar/history?page=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['previous'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">  &lt; </a></li>
                <?php }?>

                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value['pagesInRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']==$_smarty_tpl->tpl_vars['p']->value){?>
                        <li><span><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['p']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span></li>
                    <?php }else{ ?>
                        <li><a id="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['p']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
page" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/seminar/history?page=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['p']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">  <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['p']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 </a></li>
                    <?php }?>
                <?php } ?>

                <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['next'])){?>
                    <li><a id="nextpage" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/seminar/history?page=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['next'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"> &gt; </a></li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']!=$_smarty_tpl->tpl_vars['pages']->value['last']){?>
                    <li><a id="lastpage" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/seminar/history?page=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['last'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"> &gt;&gt; </a></li>
                <?php }?>
           </ul>
       </div>
        <br /><br /><br />
    
<?php }else{ ?>
    現在、お客様が参加されたセミナー情報はありません。
<?php }?>
<a id="help-seminarhistory" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>