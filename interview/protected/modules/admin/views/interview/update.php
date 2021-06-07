<?php
$this->breadcrumbs = array('Interview' => array('interview/index'), 'Update',);
?>

<div class="interview-update">

    <h1>スタッフの編集: <?php echo ' ' . $model->name ?></h1>   
    <?php
//    die($model->idOffice->name_transcription);
    $pattern = '/id="interview_block"/i';
    if(!preg_match($pattern, $model->content))
    {
        //die('tét');
        $model->content = '<div id="interview_block" class="interview '. strtolower($model->idOffice->name_transcription) .'">' . $model->content . '</div>';
    }
    
    
    echo $this->renderPartial('_form', array(
        'model' => $model, 'offices' => $offices,
    ))
    ?>

</div>
