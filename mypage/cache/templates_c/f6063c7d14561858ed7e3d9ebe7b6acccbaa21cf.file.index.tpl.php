<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:22:27
         compiled from "/var/www/html/mypage/application/modules/staff/views/file/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129368722855643b531234e6-70559185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6063c7d14561858ed7e3d9ebe7b6acccbaa21cf' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/file/index.tpl',
      1 => 1428563216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129368722855643b531234e6-70559185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'base' => 0,
    'items' => 0,
    'msg' => 0,
    'item' => 0,
    'm' => 0,
    'i' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55643b53272240_32243035',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55643b53272240_32243035')) {function content_55643b53272240_32243035($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?>﻿<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ul class="breadcrumb">
    <li><a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/staff/index/index">スタッフ用トップページ</a></li>
    <li>お客様ファイル管理</li>
</ul>


<div class="wrapper col-xs-12">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">ファイル操作</h4>
            </div>

            <div class="panel-body">
                <button id="client_upload" class="btn btn-warning">お客様にファイルを送る</button>
                <button id="file_upload" class="btn btn-info">学校にファイルを送る</button>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">お客様関連ファイル</h4>
            </div>
            <div class="panel-body">
                <ul class="list-group col-xs-12" style="margin-bottom:0; padding-right:0;">
                    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        種別:
                                        <span class="text-bold text-italic">
                                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['class']==$_smarty_tpl->tpl_vars['m']->value['file_class']){?>
                                                    <?php break 1?>
                                                <?php }else{ ?>
                                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                                                <?php }?>
                                            <?php } ?>
                                            <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value[$_smarty_tpl->tpl_vars['i']->value]['message'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['client_perusal']==1){?>
                                                <span class="alert-info-custom space-left">お客様閲覧可</span>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['school_perusal']==1){?>
                                                <span class="alert-warning-custom space-left">学校覧可</span>
                                            <?php }elseif($_smarty_tpl->tpl_vars['item']->value['class']==94){?>
                                                <button id="applyschool_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['file_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="btn btn-success space-left">学校閲覧可能にする</button>
                                            <?php }?>
                                        </span>
                                    </div>
                                </div>
                                <div class="panel-body" style="padding-bottom:0;">
                                    <ul class="list-group col-xs-12">
                                        <li class="list-group-item inc-line">
                                            <span class="col-xs-4">ファイル名</span>
                                            <span class="col-xs-8"><a id="getfile_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['file_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['file_name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</a></span>
                                        </li>
                                        <li class="list-group-item inc-line">
                                            <span class="col-xs-4">アップロード日時</span>
                                            <span class="col-xs-8"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['insert_date'],"%G-%m-%d %H:%M:%S"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    <?php }else{ ?>
                        現在、お客様関連ファイルはありません。
                    <?php }?>
                </ul>
            </div>

        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>