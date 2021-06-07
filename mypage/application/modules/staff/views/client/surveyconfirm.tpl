<div id="sendsurvey">
    <ol class="breadcrumb">
        <li><a href="./">マイページトップ</a></li>
        <li>体験談アンケート(確認)</li>
    </ol>

    <form id="input-survey" method="post">
        <div class="panel panel-info col-xs-12 col-md-6" style="padding-left: 0px; padding-right: 0px;">
            <div class="panel-heading">
                <h4 class="panel-title">{$username}様用体験談アンケート(確認)</h4>
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
                        <span class="col-xs-8">{$load_data.pen_name}</span>
                    </div>
                    <div class="help-block">体験内容を掲載させていただく場合、PNのご記入がない場合は下のお名前をローマ字で記載させていただきます。</div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid list-title-centering" >ご職業</span>
                        <div class="col-xs-8">{$job}</div>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid list-title-centering" >渡航期間</span>
                        <span class="col-xs-8">
                            {if $load_data.travel_period == 1}1ヶ月{/if}
                            {if $load_data.travel_period == 3}3ヶ月{/if}
                            {if $load_data.travel_period == 6}6ヶ月{/if}
                            {if $load_data.travel_period == 12}1年{/if}
                            {if $load_data.travel_period == 18}1年6ヶ月{/if}
                            {if $load_data.travel_period == 24}2年{/if}
                        </span>
                    </div>
                </li>
                <li class="list-group-item inc-btn">
                    <div class="col-xs-12 kill-grid">
                        <span class="col-xs-4 kill-grid list-title-centering" >学校名</span>
                        <span class="col-xs-8">{$school}</span>
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
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-asterisk"></span><span class="text-bold">渡航を決めたきっかけ</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering indent" style="z-index: 2;">{$load_data.oppotunity}</span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-asterisk"></span><span class="text-bold">現地での生活について教えてください</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering indent" style="z-index: 2;">{$load_data.life}</span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-asterisk"></span><span class="text-bold">苦労した事、大変だった事、やばかった事、もう二度としたくない!　そんな経験を教えてください</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering indent" style="z-index: 2;">{$load_data.negative}</span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-asterisk"></span><span class="text-bold">渡航中「きっとこれは自分しか体験していない!」といった体験を教えてください</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering indent" style="z-index: 2;">{$load_data.only}</span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-asterisk"></span><span class="text-bold">ワーホリ・留学での経験は、今のアナタにどのような影響を与えていますか?</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering indent" style="z-index: 2;">{$load_data.effect}</span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-asterisk"></span><span class="text-bold">これからはどんなことに挑戦していきたいですか?</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering indent" style="z-index: 2;">{$load_data.challenge}</span>
                </li>
                <li>
                    <span class="list-group-item col-xs-12 list-title-centering" style="z-index: 2;"><span class="glyphicon glyphicon-asterisk"></span><span class="text-bold">これから渡航を考えている方へアドバイスをお願いします</span></span>
                    <span class="list-group-item col-xs-12 list-title-centering indent" style="z-index: 2;">{$load_data.advice}</span>
                </li>
                <li class="list-group-item col-xs-12 list-title-centering">
                    <span>ワーホリ・留学で撮った写真をシェアしましょう!!</span>
                    <div class="form-group">
                        <label for="upfile">アップロードされた画像</label>
                        <div class="col-xs-12">
                            {if isset($img[0])}
                                <div class="{if $iphone==0}col-xs-4{else}col-xs-6{/if}">
                                    <img src="{$img[0]}" alt="file"><br />
                                </div>
                            {/if}
                            {if isset($img[1])}
                                <div class="{if $iphone==0}col-xs-4{else}col-xs-6{/if}">
                                    <img src="{$img[1]}" alt="file"><br />
                                </div>
                            {/if}
                            {if isset($img[2])}
                                <div class="{if $iphone==0}col-xs-4{else}col-xs-6{/if}">
                                    <img src="{$img[2]}" alt="file"><br />
                                </div>
                            {/if}
                        </div>
                    </div>
                </li>
                <li class="list-group-item col-xs-12 list-title-centering">
                    <span>ありがとうございました。</span><br />
                    <span>こちらの内容や写真をブログやFacebook紹介させていただいてもよろしいでしょうか?</span><br />
                    {if $load_data.agreement == 1} はい{/if}
                    {if $load_data.agreement == 0} いいえ{/if}
                </li>
                <li class="list-group-item col-xs-12 list-title-centering" style="margin-bottom:26px;">
                    <span class="text-red">以上の内容で送信しますか?</span><br />
                    <input type="hidden" name="token" value="{$token}">
                    <input type="hidden" name="action_tag" value="complete">
                    <button type="button" id="submit_complete" class="btn btn-primary" style="padding: 10px;"><span class="text-bold">送信する</span></button>
                </li>
            </ul>
        </div>
    </form>
    <div  style="margin-bottom: 60px;"></div>
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="container">
            <button type="button" id="back_entry" class="btn btn-default">入力画面に戻る</button>
        </div>
    </nav>
</div>

<script>
    loadingView(false);
</script>