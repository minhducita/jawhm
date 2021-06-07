<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:48:28
         compiled from "/var/www/html/mypage/application/modules/default/views/seminar/online.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20461304525559b49a8809b7-80001631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae99591e834184ef6f0b61187090248d6a92ea10' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/seminar/online.tpl',
      1 => 1435657706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20461304525559b49a8809b7-80001631',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5559b49a9df447_56876393',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'status' => 0,
    'base' => 0,
    'seminar' => 0,
    'i' => 0,
    'item' => 0,
    'smp' => 0,
    'ust_url' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559b49a9df447_56876393')) {function content_5559b49a9df447_56876393($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>seminar/index">セミナー予約確認</a></li>
  <li>ワーホリセミナー</li>
</ol>

<div class="contents-wrapper">
    <h2>ワーホリセミナー</h2>
    <?php if ($_smarty_tpl->tpl_vars['status']->value==='live'){?><a id="ust_online"><img src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/images/onair.png" alt="放送中"></a><?php }else{ ?><img src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/images/offair.png" alt="オフライン"><?php }?><br />
    <?php if ($_smarty_tpl->tpl_vars['status']->value==='live'){?><a id="ust_camera"><?php }?><img src="https://www.jawhm.or.jp/css/images/camera.png" alt="カメラ"><?php if ($_smarty_tpl->tpl_vars['status']->value==='live'){?></a><?php }?>
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
        <div id="seminar-size2_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading list-header">
                <div class="panel-title">
                    <span class="col-xs-11 kill-grid seminar-header"><span class="text-bold text-italic">開催日時: <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['starttime'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
～</span></span>
                    <span class="col-xs-1 kill-grid pull-right clickable" id="seminar_detail<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['id'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><span class="glyphicon glyphicon-list-alt"></span></span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="col-xs-12 kill-grid inc-title">
                        <span class="col-xs-12 col-md-4 kill-grid list-title-centering"><?php if ($_smarty_tpl->tpl_vars['smp']->value==1){?>オンライン<?php }?>中継予定セミナー名:</span>
                        <span class="col-xs-12 col-md-8 kill-grid list-title-centering"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['k_title1'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
            </ul>
        </div>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
    <?php } ?>
    <a id="stopAlert" class="col-xs-12"><span class="glyphicon glyphicon-pause" style="font-size:20px;"></span>アラートを止める</a><br />
    <a id="stopMusic" class="col-xs-12"><span class="glyphicon glyphicon-pause" style="font-size:20px;"></span>音楽を止める</a>
<?php }else{ ?>
    本日、オンラインセミナー情報はありません。
<?php }?>

<a id="help-online" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>

<audio id="live" preload="auto">
    <source src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/sounds/seminar_onair.mp3" type="audio/mp3"></source>
    <p>※ご利用のブラウザでは再生することができません。</p>
</audio>

<audio id="time" preload="auto" loop>
    <source src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/sounds/time2seminar.wav" type="audio/wav"></source>
    <p>※ご利用のブラウザでは再生することができません。</p>
</audio>

<script>
    status = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
';
    start_time = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['starttime'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
';
    seminar = new Array();
    url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['ust_url']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
";
    var $i = 0;
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['seminar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        seminar[$i] = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['starttime'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
';
        $i++;
    <?php } ?>

    mnt = 60;
    function jumpPage() {
        location.reload();
    }
    setTimeout("jumpPage()",mnt*1000);

    $('#ust_online').click(function() {
        seminar_join();
    });

    $('#ust_camera').click(function() {
        seminar_join();
    });

    function seminar_join() {
        $.ajax({
            type : 'POST',
            url : 'seminar/seminarjoin',
            data : null,
            dataType : 'html',
            timeout : 360000,

        }).done(function(data, dataType) {
            window.open(url);
        });
    }
</script>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>