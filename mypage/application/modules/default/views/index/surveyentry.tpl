{include file=$header}
<div id="surveyconfirm">
    <ol class="breadcrumb">
        <li><a href="./">マイページトップ</a></li>
        <li>体験談アンケート</li>
    </ol>

    <form id="input-survey" method="post" enctype="multipart/form-data">
        <div class="panel panel-info col-xs-12 col-md-6" style="padding-left: 0px; padding-right: 0px;">
            <div class="panel-heading">
                <h4 class="panel-title">{$username}様用体験談アンケート</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid list-title-centering" >お名前</span>
                        <span class="col-xs-8">{$username}</span>
                    </div>
                </li>
                <li class="list-group-item inc-btn" style="padding-bottom: 0px;">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid list-title-centering" >P.N.</span>
                        <span class="col-xs-8"><input type="text" class="form-control" name="pen_name" value="{$load_data.pen_name}" /></span>
                    </div>
                    <div class="help-block">体験内容を掲載させていただく場合、PNのご記入がない場合は下のお名前をローマ字で記載させていただきます。</div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid list-title-centering" >ご職業</span>
                        <div class="col-xs-8 combo_wrapper">
                            <button type="button" class="btn combo_arrow">▼</button>
                            <select class="form-control input-block-level combo_select" name="client_job_select">
                                <option>その他</option>
                                <option>高校生</option>
                                <option>大学生</option>
                                <option>会社員</option>
                                <option>看護師</option>
                                <option>保育士</option>
                                <option>公務員</option>
                                <option>美容師</option>
                                <option>アパレル</option>
                                <option>フリーター</option>
                            </select>
                            <div class="combo_div">
                                <input class="input-block-level combo_text form-control input-group" type="text" name="client_job" {if $job != 'null'}value="{$job}"{/if}>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid list-title-centering" >渡航期間</span>
                        <span class="col-xs-8">
                            <select name="travel_period" class="form-control">
                                <option value="1" {if $load_data.travel_period == 1}selected{/if}>1ヶ月</option>
                                <option value="3" {if $load_data.travel_period == 3}selected{/if}>3ヶ月</option>
                                <option value="6"  {if $load_data.travel_period == 6 || isset($load_data.travel_period)}selected{/if}>6ヶ月</option>
                                <option value="12" {if $load_data.travel_period == 12}selected{/if}>1年</option>
                                <option value="18" {if $load_data.travel_period == 18}selected{/if}>1年6ヶ月</option>
                                <option value="24" {if $load_data.travel_period == 24}selected{/if}>2年</option>
                            </select>
                        </span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid list-title-centering" >学校名</span>
                        <span class="col-xs-8"><input type="text" class="form-control" name="school" value="{$school}" readonly/></span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-md-6"></div>

        <div class="panel panel-success col-xs-12" style="padding-left: 0px; padding-right: 0px;">
            <div class="panel-heading">
                <h4 class="panel-title">アンケート本文</h4>
            </div>
            <ul class="list-group">
                <li class="list-group">
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-hand-right"></span>　<span class="text-bold">渡航を決めたきっかけ</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><textarea class="form-control" name="oppotunity" rows="3">{$load_data.oppotunity}</textarea></span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-hand-right"></span>　<span class="text-bold">現地での生活について教えてください</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><textarea class="form-control" name="life" rows="3">{$load_data.life}</textarea></span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-hand-right"></span>　<span class="text-bold">苦労した事、大変だった事、やばかった事、もう二度としたくない!　そんな経験を教えてください</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><textarea class="form-control" name="negative" rows="3">{$load_data.negative}</textarea></span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-hand-right"></span>　<span class="text-bold">渡航中「きっとこれは自分しか体験していない!」といった体験を教えてください</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><textarea class="form-control" name="only" rows="3">{$load_data.only}</textarea></span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-hand-right"></span>　<span class="text-bold">ワーホリ・留学での経験は、今のアナタにどのような影響を与えていますか?</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><textarea class="form-control" name="effect" rows="3">{$load_data.effect}</textarea></span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-hand-right"></span>　<span class="text-bold">これからはどんなことに挑戦していきたいですか?</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><textarea class="form-control" name="challenge" rows="3">{$load_data.challenge}</textarea></span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-hand-right"></span>　<span class="text-bold">これから渡航を考えている方へアドバイスをお願いします</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><textarea class="form-control" name="advice" rows="3">{$load_data.advice}</textarea></span>
                </li>
                <li class="list-group-item col-xs-12 list-title-centering">
                    <span>ワーホリ・留学で撮った写真をシェアしましょう!!</span>
                    <div class="form-group">

                        <p class="help-block col-xs-12" style="margin-top: 5px;">
                            <span class="item-name">画像のアップロード</span><br />
                            <span class="text-red">写真アップロードする場合、アンケートに記入している場合は途中保存をお願いします。</span><br />
                            2～3枚程度でアナタがワーホリ&留学中に撮った写真を共有してください。
                        </p>
                        <div class="col-xs-12">
                            {if isset($img[0])}
                                <div class="{if $iphone==0}col-xs-4{else}col-xs-6{/if}">
                                    <img src="{$img[0]}" alt="file"><br />
                                    <button type="button" id="delete_1" class="btn btn-danger" style="padding-left: 16px;">画像の削除</button>
                                </div>
                            {/if}
                            {if isset($img[1])}
                                <div class="{if $iphone==0}col-xs-4{else}col-xs-6{/if}">
                                    <img src="{$img[1]}" alt="file"><br />
                                    <button type="button" id="delete_2" class="btn btn-danger" style="padding-left: 16px;">画像の削除</button>
                                </div>
                            {/if}
                            {if isset($img[2])}
                                <div class="{if $iphone==0}col-xs-4{else}col-xs-6{/if}">
                                    <img src="{$img[2]}" alt="file"><br />
                                    <button type="button" id="delete_3" class="btn btn-danger" style="padding-left: 16px;">画像の削除</button>
                                </div>
                            {/if}
                        </div>
                        <div class="col-xs-12" style="margin-top: 5px;">
                            <button type="button" id="InputFile" class="btn btn-default">画像アップロード</button>
                        </div>
                    </div>
                </li>
                <li class="list-group-item col-xs-12 list-title-centering">
                    <span>ありがとうございました。</span><br />
                    <span>こちらの内容や写真をブログやFacebook紹介させていただいてもよろしいでしょうか?</span><br />
                    <label class="radio-inline">
                        <input type="radio" name="agreement" value="1" {if $load_data.agreement == 1}checked{/if}> はい
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="agreement" value="0" {if isset($load_data.agreement) == true && $load_data.agreement == 0}checked{/if}> いいえ
                    </label>
                </li>
                <li class="list-group-item col-xs-12 list-title-centering" style="margin-bottom:26px;">
                    <input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="survey">
                    <button type="button" id="submit_survey" class="btn btn-primary" style="padding: 10px;"><span class="text-bold">送信確認画面へ</span></button>
                </li>
            </ul>
        </div>
    </form>
    <div  style="margin-bottom: 60px;"></div>
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="container">
            <button type="button" id="save_survey" class="btn btn-default">途中保存</button>
        </div>
    </nav>

    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script>
        <!--
        auto_save = true;
        setInterval(function(){
            var $form = $('#input-survey');
            var data = $form.serializeArray();
            if(auto_save == true) {
                submit_action('index/tempsavesurvey', data, 'auto');
            }
        },30000);
        -->
    </script>
</div>
{include file=$footer}