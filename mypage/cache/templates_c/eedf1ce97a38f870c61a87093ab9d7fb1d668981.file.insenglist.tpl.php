<?php /* Smarty version Smarty-3.1.13, created on 2015-06-04 11:38:54
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/insenglist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1255314967556fba3ebc38e5-83781305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eedf1ce97a38f870c61a87093ab9d7fb1d668981' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/insenglist.tpl',
      1 => 1419821248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1255314967556fba3ebc38e5-83781305',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'items' => 0,
    'item' => 0,
    'base' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556fba3ee57cd2_53232789',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556fba3ee57cd2_53232789')) {function content_556fba3ee57cd2_53232789($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/<?php }?>preparation/index">出発前お手続き一覧</a></li>
  <li>保険契約情報入力</li>
</ol>

<div class="contents-wrapper col-xs-12">
    <h2>Insurance Information</h2>
    This page will be shown about your insurance. <br />
</div>

<?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div class="panel panel-primary col-xs-12 col-md-6 panel-title">
            <div class="panel-heading list-header">
                <div class="panel-title">
                    <span class="col-xs-10 kill-grid seminar-header seminar-title">Type: <span class="text-bold text-italic"><?php if ($_smarty_tpl->tpl_vars['item']->value['insurance_type']!='null'){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['insurance_type'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?></span></span>
                    <span class="col-xs-2 seminar-header seminar-title"><a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/preparation/showpolicy?branch_no=<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['branch_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="write-link" target="_blank"><span class="glyphicon glyphicon-download-alt clickable">DL</span></a></span>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Cert No</span>
                        <span class="col-xs-8 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['policy_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Name</span>
                        <span class="col-xs-8 kill-grid"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['policy_owner'],20), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li><li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Premium</span>
                        <span class="col-xs-8 kill-grid">&#165; <?php echo htmlspecialchars(htmlspecialchars(number_format($_smarty_tpl->tpl_vars['item']->value['deposit_amount']), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Line</span>
                        <span class="col-xs-3 kill-grid"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['line_english'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                        <span class="col-xs-5 kill-grid">Division: <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['division_english'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Commence Date</span>
                        <span class="col-xs-8 kill-grid"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['insured_date_st'],"%G/%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid">Period Date</span>
                        <span class="col-xs-8 kill-grid"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['insured_date_ed'],"%G/%m/%d"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                </li>
            </ul>
        </div>
    <?php } ?>
<?php }?>

</table>
<?php if (count($_smarty_tpl->tpl_vars['items']->value)>=1){?>
    <div class="col-xs-12">
        When you click DL button, it will be able to download PDF or JPG file that contains more details.<br />
        <a href="preparation/insurancelist">Back to Japanese</a>
    </div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>