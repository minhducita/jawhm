<?php /* Smarty version Smarty-3.1.13, created on 2015-05-15 14:02:18
         compiled from "/var/www/html/mypage/application/modules/default/views/plan/stepchart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192553546055557ddad318f2-11644132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85dc952aa85964a18263343bf93fb3e29cc8e5b1' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/plan/stepchart.tpl',
      1 => 1429255050,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192553546055557ddad318f2-11644132',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'item' => 0,
    'i' => 0,
    'n' => 0,
    'chart' => 0,
    'status' => 0,
    'is_send' => 0,
    'j' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55557ddb0cce40_08603852',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55557ddb0cce40_08603852')) {function content_55557ddb0cce40_08603852($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
<div class="panel-group" id="accordion">
        <ol class="list-group">
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?> <?php $_smarty_tpl->tpl_vars['j'] = new Smarty_variable(100, null, 0);?> <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable(0, null, 0);?> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?> <?php if ($_smarty_tpl->tpl_vars['item']->value['separate_flag']==0){?> <?php if ($_smarty_tpl->tpl_vars['item']->value['item_name']==='タイトル'){?>
                    <li class="list-group-item kill-padding">
                        <div class="panel panel-default">
                                <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                                href="#<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"
                                                class="list-group-item panel-heading <?php if ($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['n']->value]]==1){?>panel-complete-color<?php }else{ ?>panel-link-color<?php }?>">
                                                <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['step_sub_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
. <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['description'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                                                <?php if ($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['n']->value]]==1){?><span class="pull-right"><i class="glyphicon glyphicon-ok"></i></span><?php }?>
                                                <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
                                        </a>

                                </h4>
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['item_name']==='内容'||$_smarty_tpl->tpl_vars['item']->value['subtitle_flag']==1){?> <?php if ($_smarty_tpl->tpl_vars['item']->value['item_name']==='内容'){?>
                                <div id="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="panel-collapse collapse">
                                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                        <div class="panel-body">
                                                <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
 <?php if ($_smarty_tpl->tpl_vars['item']->value['detail_flag']==1){?> <br />
                                                <button type="button" id="separate_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['separate_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="btn btn-primary">詳しくみる</button>
                                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['flight_flag']==1){?>
                                                <button type="button" id="flight_inquiry"
                                                        class="btn btn-primary">見積依頼</button>
                                                <?php if ($_smarty_tpl->tpl_vars['is_send']->value['is_inquery']>0){?>
                                                <button type="button" id="inquiry_list"
                                                        class="btn btn-warning">見積確認</button>
                                                <?php }?> <?php }?>
                                        </div>
                                        <?php }?> <?php if ($_smarty_tpl->tpl_vars['item']->value['subtitle_flag']==1){?> <?php if ($_smarty_tpl->tpl_vars['item']->value['item_name']==='サブタイトル'){?>
                                        <div class="panel-body" style="padding: 0;">
                                                <div class="panel panel-default">
                                                        <h5 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                        href="#<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['j']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"
                                                                        class="list-group-item panel-heading panel-sublink-color">
                                                                        <span class="glyphicon glyphicon-chevron-right"
                                                                        style="padding-left: 15px;"></span><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['description'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                                                                </a>
                                                        </h5>
                                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['item_name']==='サブ内容'){?>
                                                        <div id="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['j']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="panel-collapse collapse">
                                                                <?php $_smarty_tpl->tpl_vars['j'] = new Smarty_variable($_smarty_tpl->tpl_vars['j']->value+1, null, 0);?>
                                                                <div class="panel-body">
                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
<br /> <?php if ($_smarty_tpl->tpl_vars['item']->value['detail_flag']==1){?>
                                                                        <button type="button" id="separate_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['separate_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"
                                                                                class="btn btn-primary">詳しくみる</button>

                                                                </div>
                                                                <?php }?>

                                                        </div>
                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['subtitle_flag']==0){?>
                                                </div>

                                        </div>
                                </div>

                        </div>
                </li> <?php }?> <?php }?><?php }?><?php }?> <?php }?> <?php } ?>
        </ol>
</div>
<?php }else{ ?> 現在ステップチャート準備中です。 <?php }?><?php }} ?>