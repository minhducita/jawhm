<div id="maincontent">
    <div id="topic-path"><div id="text-home"><a href="/" target="_self">ワーキング・ホリデー（ワーホリ）協会</a>&nbsp;&gt;&nbsp;ワーキングホリデー協定国別・よくある質問</div></div>      <h2 class="sec-title">協定国別 Q&amp;A</h2>
    <p class="text01">ワーキングホリデー協定国別に、よくあるご質問にお答えしています。</p>


      <!--  start flag -->
    <div class="mcontent-country-box">
        <ul class="country-box-01 clearfix">
            <li class="c-01">
                <a href="/yii1/web/qa/qa_aus.html">
                    <img src="/images/coBtn_aus.gif">
                </a>
            </li>
            <li class="c-02">
                <a href="/yii1/web/qa/qa_kor.html">
                    <img src="/images/coBtn_kor.gif">
                </a>
            </li>
            <li class="c-03">
                <a href="/yii1/web/qa/qa_uk.html">
                    <img src="/images/coBtn_uk.gif">
                </a>
            </li>
            <li class="c-04">
                <a href="/yii1/web/qa/qa_ywn.html">
                    <img src="/images/coBtn_ywn.gif">
                </a>
            </li>
            <li class="c-14">
                <a href="/yii1/web/qa/qa_pol.html">
                    <img src="/images/coBtn_pol.gif">
                </a>
            </li>
            <li class="c-05">
                <a href="/yii1/web/qa/qa_nz.html">
                    <img src="/images/coBtn_nz.gif">
                </a>
            </li>
            <li class="c-06">
                <a href="/yii1/web/qa/qa_fra.html">
                    <img src="/images/coBtn_fra.gif">
                </a>
            </li>
            <li class="c-07">
                <a href="/yii1/web/qa/qa_ire.html">
                    <img src="/images/coBtn_ire.gif">
                </a>
            </li>
            <li class="c-08">
                <a href="/yii1/web/qa/qa_hkg.html">
                    <img src="/images/coBtn_hkg.gif">
                </a>
            </li>
            <li class="c-15">
                <a href="/yii1/web/qa/qa_prt.html">
                    <img src="/images/coBtn_por.gif">
                </a>
            </li>
            <li class="c-09">
                <a href="/yii1/web/qa/qa_can.html">
                    <img src="/images/coBtn_can.gif">
                </a>
            </li>
            <li class="c-10">
                <a href="/yii1/web/qa/qa_deu.html">
                    <img src="/images/coBtn_deu.gif">
                </a>
            </li>
            <li class="c-11">
                <a href="/yii1/web/qa/qa_dnk.html">
                    <img src="/images/coBtn_dnk.gif">
                </a>
            </li>
            <li class="c-12">
                <a href="/yii1/web/qa/qa_nor.html">
                    <img src="/images/coBtn_nor.gif">
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
    $criteria->params = array(':parent'=>0, ':status'=>1);
    $criteria->order = 'sort ASC ,id DESC';
    $cateparent = Category::model()->findAll($criteria);
    foreach ($cateparent as $key => $cateparent):

        $linkcategoryparent = "/yii1/web/qa/category/" . $cateparent->slug;
        $title =$cateparent->title;
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
                $criteria->params = array(':parent'=>$cateparent->id, ':status'=>1);
                $criteria->order = 'sort ASC ,id DESC';
                $cateson = Category::model()->findAll($criteria);
                foreach ($cateson as $key => $cateson):

                $linkcategoryson = "/yii1/web/qa/categoryson/" . $cateson->slug;
                $title =$cateson->title;

                ?>   

                <li>    
                    <a href="<?php echo $linkcategoryson; ?>" title="<?php echo $title; ?>"> <?php echo $title; ?> </a>

                </li>

            <?php endforeach ?>

        </ul>
    </div>
</div>
<?php endforeach ?>


<!-- start advbox03 -->
<div class="advbox03">
    <!--xextl--><a href="http://jawhm.bluecloud.tokyo/ad/www/delivery/ck.php?oaparams=2__bannerid=441__zoneid=99__cb=c48afad380__oadest=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Fwhstory%2F" target="_blank"><img src="http://jawhm.bluecloud.tokyo/ad/www/images/e1fc936793f8ef34fddb404c77bdaa9a.png" width="468" height="60" alt="ワーホリ協会のブログ" title="ワーホリ協会のブログ"></a><div id="beacon_c48afad380" style="position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://jawhm.bluecloud.tokyo/ad/www/delivery/lg.php?bannerid=441&amp;campaignid=234&amp;zoneid=99&amp;loc=http%3A%2F%2Fjawhm.bluecloud.tokyo%2Fqa.html&amp;cb=c48afad380" width="0" height="0" alt="" style="width: 0px; height: 0px;"></div><!--xextl-->      
</div>
<!-- end advbox03 -->


</div>