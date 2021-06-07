<?php
require_once __DIR__ . '/../../../../calendar_module/mod_event_horizontal.php';

$sessionName = (isset($_SESSION['name'])) ? $_SESSION['name'] : "";
?>
<div id="maincontent">
<!--JN:disable.code    <div id="topic-path"><div id="text-home"><a href="/" target="_self">ワーキング・ホリデー（ワーホリ）協会</a>&nbsp;&gt;&nbsp;ワーキングホリデー協定国別・よくある質問</div></div>     -->

    <!-- <h2 class="sec-title">協定国別 Q&amp;A</h2> -->




<script>
    $(function() {
        function getURLParams() {
            var url = window.location.href;
            let params = {};
            new URLSearchParams(url.replace(/^.*?\?/, '?')).forEach(function(value, key) {
                params[key] = value
            });
            return params;
        }
        var params = getURLParams();
        if (params['name_question']) {
            $('.main_module_content').hide();
        }
        $('#maincontent a[href^="#ans"]').click(function() {
            var str = ($(this).attr('href'));
            var res = str.substring(4, 7);
            $('.qa-ans' + res).slideToggle("slow");
            $('.main_module_content.seminar_calendar' + res).slideToggle("slow");
        });
        $('#maincontent a[href^="#semians"]').click(function() {
            var str = ($(this).attr('href'));
            var res = str.substring(8, 10);
            $('.qa-seminar-ans' + res).slideToggle("slow");
        });
        var iptext = $("input[name='name_question']").val();
        var sessName = '<?php echo $sessionName?>';
        if (sessName || !params['name_question']){
            $("#qtn").hide();
        }
    });
</script>

<div class="qa-new">
    <div class="qa-nbox1"> 

        <h3 class="qa-ntitle">
           キーワードから検索
       </h3>

       <div class="frame-qa">
        <form action="/qa.html" method="GET" accept-charset="utf-8">
            <input  type="text" name="name_question" value="<?php if(!isset($session['input_keyword'])): {} echo Yii::app()->session['input_keyword']; unset($_SESSION['input_keyword']);endif ?>" placeholder="ここに質問を入力してください...">
            <input type="submit" name="" value="検索">
        </form>

        <b>複数語で検索を行う場合は、単語と単語の間をスペースで区切ってください。</b>

        <?php if(!isset($session['input_keyword'])): {} echo Yii::app()->session['input_keyword']; unset($_SESSION['input_keyword']);endif ?>


        <br>

        <?php 
        if(!isset($session['name'])):
        {




        }



        ?>

        <i style="color: red;"> <?php echo Yii::app()->session['name']; ?> </i>


        <?php

        unset($_SESSION['name']);
        endif


        ?>



        <br>
        <br>





    </div>




<!--JN:fix-->
<div id= "qtn">
    <?php if(count($question) > 0): ?>
    <h3 class="qa-ntitle">
       QA検索結果
    </h3>
    <?php endif; ?>
    
    <div class="frame-qa">

        <ul>

            <?php foreach ($question as $key => $qs): ?>
            <li>

                <a  class="img_q" href="<?php echo "#ans".$qs->id; ?>"><img class="qa-drop1" src="/../../../../images/golink-drop-black.png"> 
                    <?php echo '<span style="display: inline-table; width: 85%;">     
                    '.$qs->title.'
                    </span>';

                    $answer =$qs->answers;
                    $absolute_cond = '';
                    
                    ?> 

                </a>

                <?php foreach ($answer as $key => $answer): ?>
                <p class="text-answer <?php echo "qa-ans".$qs->id; ?>" style="display: none;">
                    <?php
                        $arr_str1 = explode('seminar_calendar', $answer->content);
                        foreach ($arr_str1 as $str1) {
                            $arr_str2 = explode(']]', $str1);
                            foreach ($arr_str2 as $str2) {
                                $str_code = strstr($str2, '[[');
                                if (strlen($str_code) > 0) {
                                    $str_code = substr($str_code, 2, strlen($str_code));
                                    $arr = explode('|', $str_code);
                                    if ($arr[0] != '') {
                                        display_horizontal_calendar("該当なし", 4, 0, "", "$arr[0]", "seminar_calendar" . $qs->id);
                                        $absolute_cond = $arr[0];
                                    }
                                } else {
                                    echo $str2;
                                }
                            }
                        }
                    ?>
                </p> <?php endforeach ?>



            </li>
            <?php endforeach ?>

        </ul>

    </div>
</div>
<?php if(isset($blogs) && !empty($blogs)) : ?>
    <h3 class="qa-ntitle">
        ブログ検索結果
    </h3>
    <div class="frame-qa">
        <div class="jn_blog">
            <ul>
            <?php
                $thumbnail = new BlogFunction();
                foreach($blogs as $blog)
                {
            ?>
                <li>
                    <a href="<?php echo $blog->url ?>" target="_blank">
                        <div class="imgContainer">
                            <div class="bgtag" style="background-color: <?php echo $blog->s_color; ?>">
                                <p style="font-size: 17px; top: 37px; color: white;">
                                    <?php echo $blog->category; ?>
                                </p>
                            </div>
                            <img src="<?php if($blog->thump_images){echo $blog->thump_images;} ?>" <?php if($blog->thump_images) {echo $thumbnail->image_thumbnail($blog->thump_images, '100', '214', 'px');} ?>></div>
                        <p class="n_title"> <?php echo $blog->post_title ?>
                            <!--<img class="emoji" draggable="false" alt="🎵" src="http://s.w.org/images/core/emoji/72x72/1f3b5.png">-->
                        </p>
                    </a>
                    <p class="n_content"><?php echo $blog->post_content ?>
                        <!--<img class="emoji" draggable="false" alt="🎵" src="http://s.w.org/images/core/emoji/72x72/1f3b5.png">--> 
                    </p>
                    <p class="n_date"><?php echo $blog->post_date ?></p>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
</div>
</div>

















    <div class="qa-new">
        <div class="qa-nbox">    
            <h3 class="qa-ntitle"  >
                協定国別 Q&amp;A
            </h3>
        </div>
    </div>
    <div class="qa-new">

    </div>

    <p class="text01"  style=" margin-top: -10px;">ワーキングホリデー協定国別に、よくあるご質問にお答えしています。</p>

    <!--  start flag -->
    <div class="mcontent-country-box">
        <ul class="country-box-01 clearfix">
            <li class="c-01">
                <a href="/qa_aus.html">
                    <img src="/images/coBtn_aus.gif">
                </a>
            </li>
            <li class="c-02">
                <a href="/qa_kor.html">
                    <img src="/images/coBtn_kor.gif">
                </a>
            </li>
            <li class="c-03">
                <a href="/qa_uk.html">
                    <img src="/images/coBtn_uk.gif">
                </a>
            </li>
            <li class="c-04">
                <a href="/qa_ywn.html">
                    <img src="/images/coBtn_twn.gif">
                </a>
            </li>
            <li class="c-14">
                <a href="/qa_pol.html">
                    <img src="/images/coBtn_pol.gif">
                </a>
            </li>
            <li class="c-05">
                <a href="/qa_nz.html">
                    <img src="/images/coBtn_nz.gif">
                </a>
            </li>
            <li class="c-06">
                <a href="/qa_fra.html">
                    <img src="/images/coBtn_fra.gif">
                </a>
            </li>
            <li class="c-07">
                <a href="/qa_ire.html">
                    <img src="/images/coBtn_ire.gif">
                </a>
            </li>
            <li class="c-08">
                <a href="/qa_hkg.html">
                    <img src="/images/coBtn_hkg.gif">
                </a>
            </li>
            <li class="c-15">
                <a href="/qa_prt.html">
                    <img src="/images/coBtn_por.gif">
                </a>
            </li>
            <li class="c-09">
                <a href="/qa_can.html">
                    <img src="/images/coBtn_can.gif">
                </a>
            </li>
            <li class="c-10">
                <a href="/qa_deu.html">
                    <img src="/images/coBtn_deu.gif">
                </a>
            </li>
            <li class="c-11">
                <a href="/qa_dnk.html">
                    <img src="/images/coBtn_dnk.gif">
                </a>
            </li>
            <li class="c-12">
                <a href="/qa_nor.html">
                    <img src="/images/coBtn_nor.gif">
                </a>
            </li>
            <li class="c-11">
                <a href="/qa_svk.html">
                    <img src="/images/coBtn_svk.gif">
                </a>
            </li>


            <li class="c-15">
                <a href="/qa_aut.html">
                    <img src="/images/coBtn_aut.gif">
                </a>
            </li>


        </ul>
        <div class="clear"></div>
    </div>
    <!--  end flag -->

    <p>&nbsp;<br></p>

    <div>
    </div>
    <div class="clear"></div>

    <?php
    $criteria = new CDbCriteria();
    $criteria->condition = 'parent=:parent AND status=:status';
    $criteria->params = array(':parent' => 0, ':status' => 1);
    $criteria->order = 'sort ASC ,id DESC';
    $cateparent = Category::model()->findAll($criteria);
    foreach ($cateparent as $key => $cateparent):

        $linkcategoryparent = "/qa/categories/".$cateparent->slug;
        $title = $cateparent->title;
        ?>
        <div class="qa-new">
            <div class="qa-nbox">    
                <h3 class="qa-ntitle">
                    <a href="<?php echo $linkcategoryparent; ?>" title="<?php echo $title; ?>"> <?php echo $title; ?> </a>
                </h3>
                <ul> 

                    <?php
                    $criteria = new CDbCriteria();
                    $criteria->condition = 'parent=:parent AND status=:status';
                    $criteria->params = array(':parent' => $cateparent->id, ':status' => 1);
                    $criteria->order = 'sort ASC ,id DESC';
                    $cateson = Category::model()->findAll($criteria);
                    foreach ($cateson as $key => $cateson):

                        $linkcategoryson = "/qa/category/" . $cateson->slug;
                        $title = $cateson->title;
                        ?>   

                        <li>    
                            <a href="<?php echo $linkcategoryson; ?>" title="<?php echo $title; ?>"> <?php echo $title; ?> </a>

                        </li>

    <?php endforeach ?>

                </ul>
            </div>
        </div>
<?php endforeach ?>

    <div style="float: left; margin-bottom:30px; width: 100%;"> <!--float: left;background-color: #FFE4B5;margin: 0 15px;width: 650px;-->

        <div class="advbox03">
           <?php
            // 122
            define('MAX_PATH', '/var/www/html/ad');
            if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
                if (!isset($phpAds_context)) {
                    $phpAds_context = array();
                }
                // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                $phpAds_raw = view_local('', 100, 0, 0, '', '', '0', $phpAds_context, '');
            }
            echo $phpAds_raw['html'];
            ?>
        </div>

    </div>
    
    <br />
    <br />
    
</div>

