<?php
//use yii\widgets\Breadcrumbs;
//$this->breadcrumbs = array('ワーキング・ホリデー（ワーホリ）協会 ' => '/');
?>
<?php

//connect Database


require_once __DIR__ . '/../../../../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function = true;

//$header_obj->meta_title_name = $this->params['interview_name'];
//$header_obj->title_page = $this->params['page_title'];

//$header_obj->description_page = 'ワーキングホリデー（ワーホリ）協会の各オフィスのご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/counselor-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '日本ワーキング・ホリデー協会カウンセラー一覧';

//code old
//$header_obj->add_js_files = '<script type="text/javascript" src="jquery-ui.min.js"></script>
//<script type="text/javascript" src="jquery.flip.min.js"></script>
//<script type="text/javascript" src="script.js"></script>';
//$header_obj->add_css_files = '<link href="/css/interview.css" rel="stylesheet" type="text/css" />';
//$header_obj->add_js_files = '<script type="text/javascript" src="jquery.js"></script>';

$header_obj->display_header();

?>

<?php
if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') {
    ?>
    <link href="/css/interview_mobile.css" rel="stylesheet" type="text/css" />
    <?php
} else {
    ?>
    <link href="/css/interview.css" rel="stylesheet" type="text/css" />
    <?php
}
?>

<div id="maincontent">
    <div id="topic-path">
        <div id="text-home">
            <?php //echo $this->params['interview_name']; ?>
            <?php
//            Breadcrumbs::widget([
//                'itemTemplate' => '<span>{link}</span> >',
//                'homeLink' => [
//                    'label' => Yii::t('app', 'ワーキング・ホリデー（ワーホリ）協会 '),
//                    'url' => '/',
//                ],
//                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//                'tag' => 'span'
//            ])
               if(isset($this->breadcrumbs)){
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'homeLink' => false,
                        'links' => $this->breadcrumbs,
                        'tagName' => 'span',
                        'separator' => '>',
                        'inactiveLinkTemplate' => '<span>{label}</span>',
                        'activeLinkTemplate' => '<span><a href="{url}">{label}</a></span>',
                    ));
                }
            ?>
        </div>
    </div>
    <?php echo $content; ?>
</div>

</div>
</div>
</div>

<?php fncMenuFooter($header_obj->footer_type); ?>
<?php
//JN:start:add js 1609061454
//$header_obj->display_js();
//JN:end
?>

</body>
</html>