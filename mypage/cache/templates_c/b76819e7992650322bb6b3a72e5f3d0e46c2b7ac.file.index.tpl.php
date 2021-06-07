<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:33:53
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13685358725592628191ad86-85978779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b76819e7992650322bb6b3a72e5f3d0e46c2b7ac' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/index.tpl',
      1 => 1435656570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13685358725592628191ad86-85978779',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559262819931e6_90584724',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559262819931e6_90584724')) {function content_559262819931e6_90584724($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <ol class="breadcrumb">
        <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">マイページトップ</a></li>
        <li>マイページヘルプ</li>
    </ol>
    <div id="window-contaner" class="contents-wrapper">
        <h1 class="text-under" style="margin-left: 10px;">ヘルプメニュー</h1>
        <p>ボタンを押すと下記に内容が表示されます。</p>
        <div class="panel-group" id="accordion">
            <ol class="list-group">
                <li class="list-group-item kill-padding">
                    <div class="panel list-group-item-success">
                        <h4 class="panel-title">
                            <a href="#manual-top" data-toggle="collapse" data-parent="#accordion" id="manual_top" class="list-group-item panel-heading list-group-item-success">
                                1. トップページ
                                <i class="pull-right glyphicon glyphicon-chevron-down"></i>
                            </a>
                        </h4>
                        <div id="manual-top" class="panel-collapse collapse">
                            <div class="panel-body">
                                <a id="get-top" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>トップページ</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="list-group-item kill-padding">
                    <div class="panel list-group-item-success">
                        <h4 class="panel-title">
                            <a href="#manual-plan" data-toggle="collapse" data-parent="#accordion" id="manual_plan" class="list-group-item panel-heading list-group-item-success">
                                2. 準備
                                <i class="pull-right glyphicon glyphicon-chevron-down"></i>
                            </a>
                        </h4>
                        <div id="manual-plan" class="panel-collapse collapse">
                            <div class="panel-body">
                                <a id="get-stepchart" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>ステップチャート</a>
                                <a id="get-history" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>履歴</a>
                                <a id="get-next" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>次回</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="list-group-item kill-padding">
                    <div class="panel list-group-item-success">
                        <h4 class="panel-title">
                            <a href="#manual-application" data-toggle="collapse" data-parent="#accordion" id="manual_application" class="list-group-item panel-heading list-group-item-success">
                                3. 書類
                                <i class="pull-right glyphicon glyphicon-chevron-down"></i>
                            </a>
                        </h4>
                        <div id="manual-application" class="panel-collapse collapse">
                            <div class="panel-body">
                                <a id="get-applicationtop" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>書類トップ</a>
                                <a id="get-agreement" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>約款および同意書</a>
                                <a id="get-estimate" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>見積書</a>
                                <a id="get-passport" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>パスポート</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="list-group-item kill-padding">
                    <div class="panel list-group-item-success">
                        <h4 class="panel-title">
                            <a href="#manual-preparation" data-toggle="collapse" data-parent="#accordion" id="manual_preparation" class="list-group-item panel-heading list-group-item-success">
                                4. 出発
                                <i class="pull-right glyphicon glyphicon-chevron-down"></i>
                            </a>
                        </h4>
                        <div id="manual-preparation" class="panel-collapse collapse">
                            <div class="panel-body">
                                <a id="get-preparationtop" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>出発トップ</a>
                                <a id="get-flight" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>フライト情報</a>
                                <a id="get-insurance" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>保険情報</a>
                                <a id="get-visa" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>ビザ情報</a>
                                <a id="get-schedule" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>スケジュール</a>
                                <a id="get-schoolcontact" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>学校連絡</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="list-group-item kill-padding">
                    <div class="panel list-group-item-success">
                        <h4 class="panel-title">
                        <a href="#manual-achievement" data-toggle="collapse" data-parent="#accordion" id="manual_achievement" class="list-group-item panel-heading list-group-item-success">
                                5. 達成状況一覧
                                <i class="pull-right glyphicon glyphicon-chevron-down"></i>
                            </a>
                        </h4>
                        <div id="manual-achievement" class="panel-collapse collapse">
                            <div class="panel-body">
                                <a id="get-achievement" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>達成状況一覧</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="list-group-item kill-padding">
                    <div class="panel list-group-item-success">
                        <h4 class="panel-title">
                        <a href="#manual-counseling" data-toggle="collapse" data-parent="#accordion" id="manual_counseling" class="list-group-item panel-heading list-group-item-success">
                                6. カウンセリング予約
                                <i class="pull-right glyphicon glyphicon-chevron-down"></i>
                            </a>
                        </h4>
                        <div id="manual-counseling" class="panel-collapse collapse">
                            <div class="panel-body">
                                <a id="get-counseling" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>カウンセリング予約方法</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="list-group-item kill-padding">
                    <div class="panel list-group-item-success">
                        <h4 class="panel-title">
                            <a href="#manual-seminar" data-toggle="collapse" data-parent="#accordion" id="manual_seminar" 	class="list-group-item panel-heading list-group-item-success">
                                7. セミナー
                                <i class="pull-right glyphicon glyphicon-chevron-down"></i>
                            </a>
                        </h4>
                        <div id="manual-seminar" class="panel-collapse collapse">
                            <div class="panel-body">
                                <a id="get-seminartop" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>セミナートップ</a>
                                <a id="get-bookconfirm" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>セミナー予約確認</a>
                                <a id="get-seminarhistory" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>過去に参加したセミナー一覧</a>
                                <a id="get-online" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>オンラインセミナー一覧</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="list-group-item kill-padding">
                    <div class="panel list-group-item-success">
                        <h4 class="panel-title">
                            <a href="#manual-member" data-toggle="collapse" data-parent="#accordion" id="manual_member" class="list-group-item panel-heading list-group-item-success">
                                8. 会員情報変更
                                <i class="pull-right glyphicon glyphicon-chevron-down"></i>
                            </a>
                        </h4>
                        <div id="manual-member" class="panel-collapse collapse">
                            <div class="panel-body">
                                <a id="get-membertop" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>会員情報変更トップ</a>
                                <a id="get-password" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>パスワード変更</a>
                                <a id="get-email" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>メールアドレス変更</a>
                                <a id="get-address" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>住所・電話番号変更</a>
                                <a id="get-extend" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>メンバー延長</a>
                                <a id="get-lostcard" class="list-group-item list-group-item-info"><i class="glyphicon glyphicon-book"></i>カード紛失</a>

                            </div>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    </div>
    <div class="panel panel-success col-xs-12 kill-padding">
        <div class="panel-heading">
            <h4	 class="panel-title">画面表示</h4>
        </div>

        <div class="panel-body">
            <div id="data-container">選択した画面がここに表示されます。</div>
        </div>
    </div>
<a href="index">マイページトップへ戻る</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>