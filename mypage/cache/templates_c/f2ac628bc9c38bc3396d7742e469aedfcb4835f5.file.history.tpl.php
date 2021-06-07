<?php /* Smarty version Smarty-3.1.13, created on 2015-05-15 16:21:43
         compiled from "/var/www/html/mypage/application/modules/default/views/plan/history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175254338755559e87d71023-95485728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2ac628bc9c38bc3396d7742e469aedfcb4835f5' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/plan/history.tpl',
      1 => 1429500818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175254338755559e87d71023-95485728',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'plan' => 0,
    'i' => 0,
    'item' => 0,
    'pages' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55559e87eff503_15275711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55559e87eff503_15275711')) {function content_55559e87eff503_15275711($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php if (count($_smarty_tpl->tpl_vars['plan']->value)>=0){?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">手続履歴</h4>
        </div>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
        <ul class="list-group">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['plan']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <li class="list-group-item"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 予定日: <span class="text-italic"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['start_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span> 終了日: <?php if ($_smarty_tpl->tpl_vars['item']->value['completion_date']){?><span class="text-italic"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['completion_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span><?php }else{ ?> - <?php }?> 【<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['step_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
】 <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['step_exposition_short'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</li>
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
            <?php } ?>
        </ul>
    </div>

    
    <div class="text-center">
        <?php echo htmlspecialchars(htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['firstItemNumber'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 to <?php echo htmlspecialchars(htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['lastItemNumber'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 of <?php echo htmlspecialchars(htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['totalItemCount'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 <br />
        <ul class="pagination">
            <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']!=$_smarty_tpl->tpl_vars['pages']->value['first']){?>
                <li><a id="firstpage"> &lt;&lt; </a></li>
            <?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['previous'])){?>
                <li><a id="previouspage""> &lt; </a></li>
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
_page"> <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['p']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 </a></li>
                <?php }?>
            <?php } ?>

            <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['next'])){?>
                <li><a id="nextpage""> &gt; </a></li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['pages']->value['current']<$_smarty_tpl->tpl_vars['pages']->value['last']){?>
                <li><a id="lastpage"> &gt;&gt; </a></li>
            <?php }?>
        </ul>
    </div>
    
<?php }else{ ?>
    現在、お客様のプランはありません。
<?php }?>
<script>
    loadingView(false);
    var first = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['first'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;
    <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['previous'])){?>
        var previous = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['previous'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;
    <?php }else{ ?>
        var previous = null;
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['pages']->value['next'])){?>
        var next = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['next'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;
    <?php }else{ ?>
        var next = null;
    <?php }?>
    var last = <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['pages']->value['last'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
;

    
    $("#firstpage").click(function() {
        submit(first);
    });

    $("#previouspage").click(function() {
        submit(previous);
    });

    $("[id$=_page]").click(function() {
        var pages = $(this).attr('id').split('_')
        var page = pages[0];
        submit(page);
    });

    $("#nextpage").click(function() {
        submit(next);
    });

    $("#lastpage").click(function() {
        submit(last);
    });

    function submit(page) {
        var data = {'page': page};
        submit_action('plan/history', data, 'getdata');
    }
    
</script><?php }} ?>