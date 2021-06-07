
<?php
require_once __DIR__ . '/../../../../../include/header.php';
require __DIR__ . '/../../../../../include/links.php';
require_once __DIR__ . '/../../../../../calendar_module/mod_event_horizontal.php';
?>


<div id="maincontent">
    <!-- <div id="topic-path">
    <div id="text-home"><a href="/" target="_self">ワーキング・ホリデー（ワーホリ）協会</a>&nbsp;&gt;&nbsp;ワーキングホリデー協定国別・よくある質問</div>
</div> -->
<div id="topic-path">
    <div id="text-home"><a href="/">ワーキング・ホリデー（ワーホリ）協会</a>&nbsp;&gt;&nbsp;<a href="/qa.html" title="">ワーキングホリデー協定国別・よくある質/問</a>&nbsp;&gt;&nbsp;<?php echo $slug; ?></div>
</div>





<h2 class="sec-title">協定国別 Q&amp;A</h2>


<p class="text01">ワーキングホリデー協定国別に、よくあるご質問にお答えしています。</p>


<!--  start lá cờ -->
<div class="mcontent-country-box">
    <ul class="country-box-01 clearfix">
        <li class="c-01">
            <a href="/yii1/web/qa/qa_aus.html">
                <img src="/../images/coBtn_aus.gif">
            </a>
        </li>
        <li class="c-02">
            <a href="/yii1/web/qa/qa_kor.html">
                <img src="/../images/coBtn_kor.gif">
            </a>
        </li>
        <li class="c-03">
            <a href="/yii1/web/qa/qa_uk.html">
                <img src="/../images/coBtn_uk.gif">
            </a>
        </li>
        <li class="c-04">
            <a href="/yii1/web/qa/qa_ywn.html">
                <img src="/../images/coBtn_ywn.gif">
            </a>
        </li>
        <li class="c-14">
            <a href="/yii1/web/qa/qa_pol.html">
                <img src="/../images/coBtn_pol.gif">
            </a>
        </li>
        <li class="c-05">
            <a href="/yii1/web/qa/qa_nz.html">
                <img src="/../images/coBtn_nz.gif">
            </a>
        </li>
        <li class="c-06">
            <a href="/yii1/web/qa/qa_fra.html">
                <img src="/../images/coBtn_fra.gif">
            </a>
        </li>
        <li class="c-07">
            <a href="/yii1/web/qa/qa_ire.html">
                <img src="/../images/coBtn_ire.gif">
            </a>
        </li>
        <li class="c-08">
            <a href="/yii1/web/qa/qa_hkg.html">
                <img src="/../images/coBtn_hkg.gif">
            </a>
        </li>
        <li class="c-15">
            <a href="/yii1/web/qa/qa_prt.html">
                <img src="/../images/coBtn_por.gif">
            </a>
        </li>
        <li class="c-09">
            <a href="/yii1/web/qa/qa_can.html">
                <img src="/../images/coBtn_can.gif">
            </a>
        </li>
        <li class="c-10">
            <a href="/yii1/web/qa/qa_deu.html">
                <img src="/../images/coBtn_deu.gif">
            </a>
        </li>
        <li class="c-11">
            <a href="/yii1/web/qa/qa_dnk.html">
                <img src="/../images/coBtn_dnk.gif">
            </a>
        </li>
        <li class="c-12">
            <a href="/yii1/web/qa/qa_nor.html">
                <img src="/../images/coBtn_nor.gif">
            </a>
        </li>
    </ul>
    <div class="clear"></div>
</div>
<!--  end lá cờ -->

<p>&nbsp;<br></p>

<div>
</div>
<div class="clear"></div>
<?php
// $bien = Category::find()->where(['id' => $id, 'status' => 1])->one();


        // $id =22;
$criteria = new CDbCriteria();
$criteria->condition = 'id=:id AND status=:status';
$criteria->params = array(':id'=>$id, ':status'=>1);
$criteria->order = 'sort ASC ,id DESC';
$bien = Category::model()->find($criteria);

    if (!empty($bien)):// if 1
    $title = $bien->title;
    nl2br($title);
    ?>
    <!--   Phần 1-->      
    <h2 id="<?php echo "question_seminar"; ?>" class="sec-title"><?= $bien->title ?></h2>


    <?php if (!empty($bien->description)): ?>
        <!-- phần 1 title-->  
        <p class="text01">
            <?php 

            echo nl2br($bien->description);


            ?>
        </p>
    <?php endif ?>




    <?php
    // $parent = $id;

    // $bien = Category::find()->where(['parent' => $parent, 'status' => 1])->orderBy(['sort' => SORT_ASC, 'id' => SORT_DESC])->all();

            // $id =$cateparent->id;
    $id = $id;
    $criteria = new CDbCriteria();
    $criteria->condition = 'parent=:parent AND status=:status';
    $criteria->params = array(':parent'=>$id, ':status'=>1);
    $criteria->order = 'sort ASC ,id DESC';
    $bien = Category::model()->findAll($criteria);




        if (!empty($bien)): // if 2
            foreach ($bien as $bien): // for 1
            $parent = $bien['id'];
            ?>


            <!--     Phần 2-->    
            <div class="qa-qbox">
                <!--        tiêu đề question -->
                <h3 id="question01" class="qa-qtitle"><?= $bien['title'] ?></h3>

                <?php
                $question =$bien->questions;
                        foreach ($question as $question): //for 3
                        ?>


                        <ul>

                            <li>
                                <a href="<?php echo "#semians" . $question->id; ?>">

                                    <?= $question->title ?>

                                </a>
                                <?php
                                $answer = $question->answers;
                                $absolute_cond = '';
                                foreach ($answer as $v5):
                                    ?>
                                <p class="text-answer <?php echo "qa-seminar-ans" . $question->id; ?>" ">
                                    <?php // $v5['content'] ?>

                                    <!-- JN:start -->

                                    <?php
                                    $arr_str1 = explode('seminar_calendar', $v5['content']);
                                            //echo Yii::$app->request->baseUrl . '<br />';
                                    foreach ($arr_str1 as $str1) {
                                        $arr_str2 = explode(']]', $str1);
                                        foreach ($arr_str2 as $str2) {
                                                    //echo 'Jack Nguyen 2';
                                            $str_code = strstr($str2, '[[');
                                            if (strlen($str_code) > 0) {
                                                        //$exe = trim(substr($str_code,3, strlen($str_code)));
                                                $str_code = substr($str_code, 2, strlen($str_code));
                                                $arr = explode('|', $str_code);
                                                        //print_r($arr);
                                                        //handle
                                                        //echo $arr[0];
                                                if ($arr[0] != '') {
                                                            //display_horizontal_calendar("該当なし",2,0,"","$arr[0]");
                                                    $absolute_cond = $arr[0];
                                                }
                                            } else {
                                                        //echo __DIR__;
                                                echo $str2;
                                            }
                                        }
                                    }

                                    ?>

                                    <!-- JN:end -->


                                </p>
                            <?php endforeach ?>         
                        </li>
                        <!-- JN:start -->
                        <?php
                        // display_horizontal_calendar("該当なし", 2, 0, "", $absolute_cond);
                        // $absolute_cond = '';
                        ?>
                        <!-- JN:end -->
                    </ul>


                    
                <?php endforeach ?>

                <?php 
                        // endforeach
                ?>



            </div>

        <?php endforeach ?>

    <?php endif; ?>
<?php endif; ?>




<div class="top-move">
    <p><a href="<?php echo "#question_seminar"; ?>">▲&amp;A TOPへ</a></p>
</div>




<!-- start advbox03 -->
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
<!-- end advbox03 -->


</div>
<!-- end containt--> 

<!-- desgin by :Phạm Minh Ánh -->