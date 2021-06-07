<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:35:03
         compiled from "/var/www/html/mypage/application/modules/default/views/schedule/schedule2img.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8144471455546c47268e61-18847798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e23361645e377545340d66f5ccd1cef4cedb220' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/schedule/schedule2img.tpl',
      1 => 1419317521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8144471455546c47268e61-18847798',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
    'title' => 0,
    'name' => 0,
    'items' => 0,
    'i' => 0,
    'leave_date' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546c4746b797_80313189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546c4746b797_80313189')) {function content_55546c4746b797_80313189($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><html lang="ja">
<head>
  <base href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="themes/css/user.css" media="all" />
  <link rel="stylesheet" type="text/css" href="themes/css/common.css" media="all" />
  <title><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</title>
</head>

<body>
    <h1 style="margin-left:70px;"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 様のご渡航日程表</h1>
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)>0){?>
        <table id="tbl" class="agreement table-center" border="1">
            <thead class="agreement">
                <tr>
                    <th class="text-center agreement">No</th>
                    <th class="text-center agreement">イベント</th>
                    <th class="text-center japanese-date agreement">日時</th>
                </tr>
            <thead>

            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
            <tbody id="trno_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"  class="list agreement">
                <tr class="agreement">
                    <td class="text-right agreement"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                    <td class="agreement">日本出国日</td>
                    <td class="text-right agreement"><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['leave_date']->value,"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                </tr>
            </tbody>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <tbody id="trno_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"  class="list agreement">
                <tr class="agreement">
                    <td class="text-right agreement" rowspan="3"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
                    <td class="agreement" <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==3||$_smarty_tpl->tpl_vars['item']->value['entry_class']==2){?>rowspan="3"<?php }?>>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9){?>フライト情報<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==3){?>日本語空港送迎<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==2){?>ホームステイ開始<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value[4], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>
                    </td>
                    <td class="text-right agreement" <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==3||$_smarty_tpl->tpl_vars['item']->value['entry_class']==2||$_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?>rowspan="3"<?php }else{ ?>rowspan="2"<?php }?>>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==3||$_smarty_tpl->tpl_vars['item']->value['entry_class']==2||$_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['event_date'],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9){?><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['event_date'],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<br /><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['event_date'],"%H時%M分"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<?php }?>
                    </td>
                </tr>
                <tr class="agreement">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9||$_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?><td class="agreement"<?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?> rowspan="2"<?php }?>><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9){?><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['flight_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 出発<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==1){?>入学日<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9||$_smarty_tpl->tpl_vars['item']->value['erntry_class']==1){?></td><?php }?>
                </tr>
                <tr class="agreement">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9){?>
                        <td class="agreement">
                            <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['flight_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 到着
                        </td>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['entry_class']==9){?>
                        <td class="text-right agreement">
                            <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['destination_time'],"%m月%d日"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
<br /><?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['destination_time'],"%H時%M分"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

                        </td>
                    <?php }?>
                </tr>
            </tbody>

            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
        <?php } ?>
        </table>
    <?php }else{ ?>
        現在、お客様のご渡航予定はありません
    <?php }?>
</body>
</html><?php }} ?>