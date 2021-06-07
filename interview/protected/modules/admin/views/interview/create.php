<?php
$this->breadcrumbs = array('Interview' => array('interview/index'), 'Create',);
?>

<div class="interview-create">

    <h1>インタビューを作成</h1>
    <?php
    if($interview->content == '')
    {       
        $interview->content = '<div id="interview_block" class="interview tokyo">'
            . '<h2>カウンセラー紹介 NAME1</h2>'
            . '<br /><br /><br /> '
            . '<a href="/interview/"><span>&lt;</span>一覧へ戻る</a> '
            . '<section>'
            . '<h2><span>NAME2</span>OFFICE オフィス</h2> '
            . '<img width="280" src="/yii1/web/images/files/default.png" alt=""/> '
            . '<h3>NAME1</h3> '
            . '<span>NAME2</span> '
            . '<table> '
            . '<tbody> '
            . '<tr><th>名前</th><th>NAME</th></tr> '
            . '<tr><th>渡航した国</th><th>COUNTRY TOURISM</th></tr> '
            . '<tr><th>出身</th><th>GRADUATE</th></tr> '
            . '<tr><th>使用したビザ</th><th>VISA WAS USED</th></tr> '
            . '<tr><th>座右の銘</th><th>MARIN OR MOTTO</th></tr>  '
            . '</tbody> '
            . '</table> '
            . '<div>  '
            . '<ul> '
            . '<li>NAMEの海外経験<span>An experience abroad...</span></li> '
            . '<li><span>1</span>experience 1</li> '
            . '<li><span>2</span>experience 2</li> '
            . '<li><span>3</span>experience 3</li> '
            . '<li><span>4</span>experience 4</li> '
            . '<li><span>5</span>experience 5</li> '
            . '<li><span>6</span>experience 6</li> '
            . '<li><span>7</span>experience 7</li> '
            . '<li><span>8</span>experience 8</li> '
            . '<li><span>9</span>experience 9</li> '
            . '<li><span>10</span>experience 10</li> '
            . '<li><span>11</span>experience 11</li> '
            . '</ul> '
            . '</div> '
            . '<div> '
            . '<h3><font><b>This is title</font></b></h3> '
            . '<img width="260" src="/yii1/web/images/files/default.png" alt=""/> '
            . '<p>This is content...</p> '
            . '</div> '
            . '<div> '
            . '<h3><font><b>This is title...</font></b></h3> '
            . '<img width="260" src="/yii1/web/images/files/default.png" alt=""/> '
            . '<p>This is content...</p> '
            . '</div>'
            . '<div> '
            . '<h3><font><b>This is title...</font></b></h3> '
            . '<img width="260" src="/yii1/web/images/files/default.png" alt=""/> '
            . '<p>This is content...</p> '
            . '</div> '
            . '<div> '
            . '<h3><font><b>This is title...</font></b></h3> '
            . '<img width="260" src="/yii1/web/images/files/default.png" alt=""/> '
            . '<p>This is content...</p> '
            . '</div>'
            . '<div> '
            . '<h3><font><b>This is title</font></b></h3> '
            . '<img width="260" src="/yii1/web/images/files/default.png" alt=""/> '
            . '<p>This is content...</p> '
            . '</div>'
            . '<div> '
            . '<h3><font><b>This is title...</font></b></h3> '
            . '<img width="270" src="/yii1/web/images/files/default.png" alt=""/>'
            . '<p>This is content...</p> '
            . '</div>'
            . '<div>'
            . '<h3><font><b>This is title...</font></b></h3> '
            . '<p>This is content...</p> '
            . '</div> '
            . '<a href="/interview/"><span>&lt;</span>一覧へ戻る</a> '
            . '<center><a href="http://www.jawhm.or.jp/blog/search/tag/?tag=" target="blank"><span>カウンセラーが書いたブログ記事はこちらから！</span></a></center> '
            . '</section>'
            . '</div>';              
        
//        $interview->content = '<div id="interview_block" class="interview">' .
//        '<h2>カウンセラー紹介 INTERVIEW_NAME</h2>' .
//        '<a href="/advanced/frontend/interview/interview/"><span>&lt;</span>一覧へ戻る</a>' .
//        '<section>' .
//        '<h2><span>INTERVIEW_NAME_TRANSCRIPTION</span>OFFICE_NAMEオフィス</h2>' .
//        '<img width="280" src="" alt=""/>' .
//        '<h3>INTERVIEW_NAME</h3>' .
//        '<span>INTERVIEW_NAME_TRANSCRIPTION</span>' .
//        '<table>' .
//        '<tbody>' .
//        '<tr><th>渡航した国</th><th>COUNTRY TOURISM</th></tr>' .
//        '<tr><th>出身</th><th>GRADUATE</th></tr>' +
//        '<tr><th>使用したビザ</th><th>VISA WAS USED</th></tr>' .
//        '<tr><th>座右の銘</th><th>MARIN OR MOTTO</th></tr>' .
//        ' </tbody>' .
//        '</table>' .
//        '<div>' .
//        ' <ul>' .
//        '<li>アイコさんの海外経験<span>An experience abroad...</span></li>' .
//        '<li><span>1</span>experience 1</li>' .
//        '<li><span>2</span>experience 2</li>' .
//        '<li><span>3</span>experience 3</li>' .
//        '<li><span>4</span>experience 4</li>' .
//        '<li><span>5</span>experience 5</li>' .
//        '<li><span>6</span>experience 6</li>' .
//        '<li><span>7</span>experience 7</li>' .
//        '<li><span>8</span>experience 8</li>' .
//        '<li><span>9</span>experience 9</li>' .
//        '<li><span>10</span>experience 10</li>' .
//        '<li><span>11</span>experience 11</li>' .
//        '</ul>' .
//        '</div>' .
//        '<div>' .
//        '<h3><font><b>アナタが渡航を決めたきっかけを教えてください。</font></b></h3>' .
//        '<img width="260" src="" alt=""/>' .
//        '<p>DATA____________________!</p>' .
//        '</div>' .
//        '<div>' .
//        '<h3><font><b>海外ではどんな生活をしていましたか？</font></b></h3>' .
//        '<p>DATA____________________!</p>' .
//        '</div>' .
//        '<div>' .
//        '<h3><font><b>苦労した事、大変だった事、やばかった事、もう二度としたくない事を教えてください！</font></b></h3>' .
//        '<p>DATA____________________!</p>' .
//        '</div>' .
//        '<div>' .
//        '<h3><font><b>「きっとこれは自分しか験していない！」といった体験はありましたか？</font></b></h3>' .
//        '<p>DATA____________________!</p>' .
//        '</div><div>' .
//        '<h3><font><b>海外でのオススメを教えてください。</font></b></h3>' .
//        '<p>DATA____________________!</p>' .
//        '</div><div>' .
//        '<h3><font><b>海外での経験は、今のアナタにどのような影響を与えていますか？</font></b></h3>' .
//        '<img width="270" src="" alt=""/>' .
//        '<p>DATA____________________!</p>' .
//        '<h3><font><b>留学・ワーホリを悩んでいるあなたに、カウンセラーから一言！</font></b></h3>' .
//        '<p>DATA____________________!</p>' .
//        '</div>' .
//        '<a href="/advanced/frontend/interview/interview/"><span>&lt;</span>一覧へ戻る</a>' .
//        '<center><a href="http://www.jawhm.or.jp/blog/search/tag/?tag="' .
//        'target="blank"><span>カウンセラーが書いたブログ記事はこちらから！</span></a></center>' .
//        '</section>' .
//        '</div>';     
    }

    ?>
    <?php echo $this->renderPartial('_form', array(
        'model' => $interview, 'offices' => $offices,
    )) ?>

</div>
