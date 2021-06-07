<?php /* Smarty version Smarty-3.1.13, created on 2015-06-04 11:52:52
         compiled from "/var/www/html/mypage/application/modules/default/views/member/changeaddress.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1412935476556fbd847feac1-23207976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ee444c91a287dfe15551bff7fcacc58e7169cdf' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/changeaddress.tpl',
      1 => 1427878400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1412935476556fbd847feac1-23207976',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'address' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556fbd8489e0f3_04808214',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556fbd8489e0f3_04808214')) {function content_556fbd8489e0f3_04808214($_smarty_tpl) {?><div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">住所情報登録</h4>
    </div>

    <div class="modal-body">
        <form id="address-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="zip" class="col-sm-4 control-label">郵便番号</label>
                    <div class="col-sm-8">
                        <input id="zip" class="form-control" type="text" name="zip" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['address']->value[2], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" autofocus onkeyup="AjaxZip2.zip2addr(this,'add1','add2',null,'add2');">
                    </div>
                </div>

                <div class="form-group">
                       <label for="add1" class="col-sm-4 control-label">都道府県</label>
                       <div class="col-sm-8">
                       <input id="add1" class="form-control" type="text" name="add1" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['address']->value[3], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    </div>
                </div>

                <div class="form-group">
                       <label for="add2" class="col-sm-4 control-label">市群区</label>
                       <div class="col-sm-8">
                       <input id="add2" class="form-control" type="text" name="add2" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['address']->value[4], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    </div>
                </div>

                <div class="form-group">
                       <label for="add3" class="col-sm-4 control-label">町村</label>
                       <div class="col-sm-8">
                       <input id="add3" class="form-control" type="text" name="add3" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['address']->value[5], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    </div>
                </div>

                <div class="form-group">
                       <label for="add4" class="col-sm-4 control-label">番地その他</label>
                       <div class="col-sm-8">
                       <input id="add4" class="form-control" type="text" name="add4" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['address']->value[6], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    </div>
                </div>

                <div class="form-group">
                       <label for="devision" class="col-sm-4 control-label">登録先</label>
                       <div class="col-sm-8">
                           <select class="form-control" name="devision">
                            <option value="0">現住所</option>
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['address']->value[7]==='実家'){?>selected<?php }?>>実家</option>
                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['address']->value[7]==='留学先'){?>selected<?php }?>>留学先</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                       <label for="tel" class="col-sm-4 control-label">電話番号</label>
                       <div class="col-sm-8">
                       <input class="form-control" type="tel" name="tel" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['address']->value[1], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                   <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="action_tag" value="address">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="address_edit" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script charset="UTF-8" src="themes/js/ajaxzip2/ajaxzip2.js"></script><?php }} ?>