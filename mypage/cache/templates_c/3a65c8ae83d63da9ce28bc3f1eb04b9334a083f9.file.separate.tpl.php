<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 12:15:32
         compiled from "/var/www/html/mypage/application/modules/default/views/plan/separate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7812771805563e554487fd3-84983867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a65c8ae83d63da9ce28bc3f1eb04b9334a083f9' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/plan/separate.tpl',
      1 => 1431424201,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7812771805563e554487fd3-84983867',
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
    'j' => 0,
    'agree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5563e554645ee2_43869230',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5563e554645ee2_43869230')) {function content_5563e554645ee2_43869230($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
<div class="panel-group" id="accordion">
        <ol class="list-group">
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?> <?php $_smarty_tpl->tpl_vars['j'] = new Smarty_variable(100, null, 0);?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['item_name']==='タイトル'){?>
                <li class="list-group-item kill-padding">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['step_sub_number']==0){?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['description'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                                </h4>
                            </div>
                    <?php }else{ ?>
                        <div class="panel panel-default">
                                <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                                href="#<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"
                                                class="list-group-item panel-heading <?php if ($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['n']->value]]==1){?>panel-complete-color<?php }else{ ?>panel-link-color<?php }?>">
                                                <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['step_sub_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
. <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

                                                <?php if ($_smarty_tpl->tpl_vars['n']->value<17){?><?php if ($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['n']->value]]==1){?><span class="pull-right"><i class="glyphicon glyphicon-ok"></i></span><?php }?><?php }?>
                                                <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
                                        </a>
                                </h4>
                    <?php }?>
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['item_name']==='内容'||$_smarty_tpl->tpl_vars['item']->value['subtitle_flag']==1){?> <?php if ($_smarty_tpl->tpl_vars['item']->value['item_name']==='内容'){?>
                                <div id="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['step_sub_number']!=0){?>class="panel-collapse collapse"<?php }?>>
                                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                        <div class="panel-body"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
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
                                                                        style="padding-left: 15px;"></span><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

                                                                </a>
                                                        </h5>
                                                        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['item_name']==='サブ内容'){?>
                                                        <div id="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['j']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="panel-collapse collapse">
                                                                <?php $_smarty_tpl->tpl_vars['j'] = new Smarty_variable($_smarty_tpl->tpl_vars['j']->value+1, null, 0);?>
                                                                <div class="panel-body">
                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
<br />
                                                                </div>

                                                        </div>
                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['subtitle_flag']==0){?>
                                                </div>

                                        </div>
                                </div>

                        </div>
                </li> <?php }?> <?php }?><?php }?><?php }?> <?php } ?>
        </ol>
</div>
<button type="button" id="stepchart" class="btn btn-primary">戻る</button>
<?php }else{ ?> 現在ステップチャート準備中です。 <?php }?>
<script>
var agree = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['agree']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
';
    
        $("#canwhdl").click(function() {
            if (agree === '1') {
                window.open('application/canwhdl', '_new');
            } else {
                alert('詳細情報は約款事項に同意が確認でき次第ご覧いただけます。');
            }
        });
    
</script><?php }} ?>