<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 15:38:10
         compiled from "/var/www/html/mypage/application/modules/staff/views/client/selectabroad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1311964500556414d2d541c1-40821599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eee6f136a66b4fe190dce7e530a33747bd27c0ae' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/client/selectabroad.tpl',
      1 => 1420532009,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1311964500556414d2d541c1-40821599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556414d2ea1982_51832933',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556414d2ea1982_51832933')) {function content_556414d2ea1982_51832933($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modal_close">&times;</button>
        <h4 class="modal-title">留学情報選択</h4>
    </div>

    <div class="modal-body">
        <h3>留学情報選択</h3>
        <?php if (count($_smarty_tpl->tpl_vars['list']->value)>=1){?>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['leave_country']!=''&&$_smarty_tpl->tpl_vars['item']->value['leave_date']!=''){?>
                    <li><a id="staffabroad_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['study_abroad_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_staff/application/index"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['leave_date'],"%G年%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 のご渡航
                     <?php if ($_smarty_tpl->tpl_vars['item']->value['leave_country']==='IRE'){?>アイルランド
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='USA'){?>アメリカ
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='GBR'){?>イギリス
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='UK'){?>イギリス
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='IND'){?>インド
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='AUS'){?>オーストラリア
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='CAN'){?>カナダ
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='DEU'){?>ドイツ
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='NZ'){?>ニュージーランド
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='NZL'){?> ニュージーランド
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='FRA'){?>フランス
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='EUR'){?>ユーロ
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='KOR'){?>韓国
                     <?php }elseif($_smarty_tpl->tpl_vars['item']->value['leave_country']==='JPN'){?>日本<?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['item']->value['close_flag']==1){?>(手配完了)<?php }?></a></li>
                <?php }else{ ?>
                    <li><a id="staffabroad_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['study_abroad_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_staff/application/index"> 今回のご渡航</a></li>
                <?php }?>
            <?php } ?>

        <?php }else{ ?>
            留学情報はありません。<br />
        <?php }?>

     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="modal_close">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script><?php }} ?>