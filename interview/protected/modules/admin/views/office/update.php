<?php
//$this->title = 'スタッフの編集: ' . $model->name; //Yii::t('app', 'Update {modelClass}: ', ['modelClass' => 'Interview',]) . $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'カウンセラー一覧'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'id_office' => $model->id_office]];
//$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>

<div class="countries-update">

    <h1>Update Office: <?php echo ' ' . $model->name ?></h1>   
    <?php
    echo $this->renderPartial('_form', array(
        'model' => $model,
    ))
    ?>

</div>
