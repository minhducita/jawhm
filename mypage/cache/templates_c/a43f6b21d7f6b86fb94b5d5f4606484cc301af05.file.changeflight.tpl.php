<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 18:13:46
         compiled from "/var/www/html/mypage/application/modules/default/views/preparation/changeflight.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17998318525564394a9b5006-67238756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a43f6b21d7f6b86fb94b5d5f4606484cc301af05' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/preparation/changeflight.tpl',
      1 => 1422591103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17998318525564394a9b5006-67238756',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'item' => 0,
    'smp' => 0,
    'flight_id' => 0,
    'img' => 0,
    'token' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5564394ab0ac52_98851114',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5564394ab0ac52_98851114')) {function content_5564394ab0ac52_98851114($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="editflight" class="page-content">
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
        <a href="preparation/flightlist" class="btn btn-primary">前の画面に戻る</a>
    </div>

    <div class="page-header">
        <h1>
            フライト情報登録
            <small>
                <i class="icon-double-angle-right"></i>
                フライト情報のご入力とチケットの画像をご登録ください。
            </small>
        </h1>
    </div>
    <div class="col-xs-12 col-md-2"></div>
    <div class="col-xs-12 col-md-6">
        <form id="flight-edit" class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-xs-4" for="flight_number">便名</label>
                <div class="col-xs-8">
                    <input class="form-control ime-disabled" type="text" name="flight_number" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['flight_number'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" autofocus>
                    <div class="help-block">JQ123等</div>
                </div>
            </div>

            <div class="form-group">
                <label for="departure_place" class="col-xs-4"  for="departure_place">出発地</label>
                <div class="col-xs-8">
                    <input class="form-control ime-disabled" type="text" id="text1" name="departure_place" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['departure_place'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" size="20">
                    <div class="help-block">TOKYO等</div>
                    <div id="suggest1"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="departure_time" class="col-xs-4 input-append date" for="departure_time">出発日時</label>
                <div class="col-xs-8">
                    <div <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>class="input-group date" id="departure_time"<?php }?>>
                        <input type="<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>datetime-local<?php }?>" class="form-control" name="departure_time" value="<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['departure_time'],"%G-%m-%d %H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" />
                        <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        <?php }?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                   <label for="destination_place" class="col-xs-4" for="destination_place">到着地</label>
                   <div class="col-xs-8">
                       <input class="form-control ime-disabled" type="text" id="text2" name="destination_place" class="ime-disabled" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['destination_place'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" size="20">
                       <div class="help-block">Cairns等</div>
                       <div id="suggest2">
                   </div>
                </div>
            </div>

            <div class="form-group">
                <label for="destination_time" class="col-xs-4" for="destination_time">到着日時</label>
                <div class="col-xs-8">
                    <div <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>class="input-group date" id="destination_time"<?php }?>>
                    <input type="<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>text<?php }else{ ?>datetime-local<?php }?>" class="form-control" name="destination_time" value="<?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['destination_time'],"%G-%m-%d %H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" />
                        <?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        <?php }?>
                    </div>
                </div>
            </div>

            <div class="form-group">
            <span>航空券の情報が確認できる画像のアップロードをお願いします。</span>
                <p class="help-block col-xs-12" style="margin-top: 5px;">
                    <span class="item-name">画像のアップロード</span><br />
                    <span class="text-red">
                        フライト情報を登録後、フライト情報を確認できる画像のアップロードをこの画面からお願いします。
                    </span>
                </p>
                <?php if ($_smarty_tpl->tpl_vars['flight_id']->value!='new'){?>
                    <div class="col-xs-12">
                        <?php if (isset($_smarty_tpl->tpl_vars['img']->value)){?>
                            <div class="col-xs-6">
                                <img src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" alt="file"><br />
                                <button type="button" id="delete_flight_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['flight_id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="btn btn-danger" style="padding-left: 16px;">画像の削除</button>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-xs-12" style="margin-top: 5px;">
                        <button type="button" id="InputFile_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['flight_id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" class="btn btn-default">画像アップロード</button>
                    </div>
                <?php }?>
            </div>

            <div class="form-group">
                <div class="col-xs-5 col-md-7"></div>
                <div class="col-xs-7 col-md-5">
                    <button id="flight_edit" type="button" class="btn btn-primary">送信</button>
                    &nbsp;
                    <input type="reset" class="btn btn-warning" value="リセット">
                </div>
            </div>
            <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="action_tag" value="flight">
            <input type="hidden" name="ID" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['ID'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
        </form>
    </div>
    <div class="col-xs-12 col-md-4"></div>
</div>
<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/suggest.js"></script>
<script type="text/javascript" src="themes/js/append.js"></script>
<?php if ('smp'==0){?>
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="themes/js/moment.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
    <script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
    <script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
    <script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
    <script type="text/javascript" src="themes/js/modal.js"></script>
<?php }?>
<script>
<!--
loadingView(false);
<?php if ($_smarty_tpl->tpl_vars['smp']->value==0){?>
    $('#departure_time').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#destination_time').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });
<?php }?>

var base = '<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage';

    $(function(){
           new Suggest.Local(
              "text1",
              "suggest1",
              "候補:"+[],
              {
                highlight: true,
                hookBeforeSearch: function(text) {
                    var self = this;
                     $.post(base+"/preparation/suggestion",
                        {inp:text},
                        function(data, status){
                               if(status == 'success' && data){
                                  self.clearSuggestArea();
                                  self.candidateList = eval(data);
                                  var resultList = self._search(text);
                                  if (resultList.length != 0){
                                     self.createSuggestArea(resultList);
                                  }
                                  return false;
                               }
                        }
                     );
                }
              }
        );
    });

    $(function(){
        new Suggest.Local(
           "text2",
           "suggest2",
           [],
           {
             highlight: true,
             hookBeforeSearch: function(text) {
                 var self = this;
                  $.post(base+"/preparation/suggestion",
                     {inp:text},
                     function(data, status){
                            if(status == 'success' && data){
                               self.clearSuggestArea();
                               self.candidateList = eval(data);
                               var resultList = self._search(text);
                               if (resultList.length != 0){
                                  self.createSuggestArea(resultList);
                               }
                               return false;
                            }
                     }
                  );
             }
           }
     );
 });

-->
</script>

</body>
</html>
<?php }} ?>