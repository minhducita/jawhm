<?php
//use yii\helpers\Html;
//use common\models\Interview;
//use frontend\assets\AppAsset;
//AppAsset::register($this);

require_once __DIR__ . '/../../../../include/header.php';

$header_obj = new Header();
$header_obj->title_page = 'カウンセラー一覧';
//echo $header_obj->breadcrumbs();
//echo Yii::getAlias('@webroot');
//$this->title = Yii::t('app', 'カウンセラー一覧');
$this->breadcrumbs = array_merge(array('ワーキング・ホリデー（ワーホリ）協会 ' => '/'), $this->breadcrumbs, array('カウンセラー一覧')); //array('カウンセラー一覧' => array('/interview'))

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h2 class="sec-title">オフィスから選ぶ</h2>
<?php //die(print_r($offices)) ?>
<section class="clear">
    <?php
    if ($header_obj->computer_use() || $_SESSION['pc'] == 'on') {
        //PCの場合
        
        ?>
            <?php foreach ($offices as $office) { ?>  
            <a href="#<? echo $office['name_transcription'] ?>"><span
                    class="<? echo $office['style_pc'] ?>"><?php echo CHtml::encode($office['name_transcription']) ?></span></a>
            <?php } ?>
            <?php
        } else {
            //SPの場合
            ?>
            <?php foreach ($offices as $office) { ?>
            <a href="#<? echo $office['name_transcription'] ?>"><span
                    class="<? echo $office['style_mobile'] ?>"><?php echo CHtml::encode($office['name_transcription']) ?></span></a>
            <?php } ?>
            <?php
        }
        ?>
</section>
<br/>
<br/>
<h2 class="sec-title">カウンセラー一覧</h2>
<?php
foreach ($offices as $office) {
    ?>
    <h2 id="<? echo $office['name_transcription'] ?>" class="counselor-<? echo strtolower($office['name_transcription']) ?>">
        <span class="<? echo strtolower($office['name_transcription']) ?>"><? echo $office['name_transcription'] ?></span>
        <?= $office['name'] ?></h2>

    <ul class="mobile_center">
        <?php
        //$interviews = Interview::find()->where(['id_office' => $office['id']])->andWhere(['=', 'status', 1])->orderBy('order')->all();
        //$query = "select * from `interview` where `id_office` ={$office['id']} and `status` = 1 order by `order`";
        //$params = array(':id_office' => $office['id']);
        //$interviews = Interview::model()->findAllBySql($query);
        //$interviews = Interview::model()->findAll('id_office=:id and status=:status', array(':id' => $office['id'], ':status' => 1));
        $interviews = Interview::model()->findAll(array(
            'condition' => 'id_office=:id and status=:status',
            'order' => '`order`',
            'params' => array(':id' => $office['id'], ':status' => 1),          
        ));
        //die(print_r($interviews));
        
        foreach ($interviews as $interview) {
            ?>
            <li class="ichiran <? echo strtolower($office['name_transcription']) ?>">
                <?php
                $urll = '' . strtolower($office['name_transcription']) . '/' . strtolower($interview->slug) . '.php';
                ?>
                <a href="<?= $urll//$interview['id']  ?>" class="trans">
                    <p class="name"><? echo $interview['name'] ?></p>
                    <span class="english"><? echo $interview['name_transcription'] ?></span>
                    <img width="195" height="150" src="<?php echo Yii::app()->homeUrl . 'images/files/'/* . strtolower($office['name_transcription']) .'/' */ . $interview['image'] ?>" alt="翁長幸三郎"/>
                    <!--<img width="195" height="150" src="/advanced/backend/images/interviews/<?php //strtolower($office['name_transcription']) . '/' . $interview['image']  ?>" alt="翁長幸三郎"/>-->
                    <p class="midashi  <? echo strtolower($office['name_transcription']) ?>">座右の銘</p>
                    <span class="motto"><p><? echo $interview['maxim'] ?></p></span>
                </a>
            </li>
    <?php } ?>
    </ul>
    <div class="top-move">
        <p><a href="#header">▲ページのＴＯＰへ</a></p>
    </div>
    <?php
    
}
?>