<?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>

<?php 
    //button back   
    echo CHtml::link('バック', array('office/index'), array('class' => 'btn btn-primary btn-md')); 
?>

<?php
echo CHtml::submitButton(
    $model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
    'style' => 'float: right'));
?>

<br/><br/>

<div class="col-md-12" style="background-color: #fff">
    <div class="grid simple">      
    <div class="row">
    <div class="col-md-12">
        <?php
        //set data, array
        echo CHtml::label("Name", 'office[name]');   
        echo $form->textField($model, 'name', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("Name Transcription", 'office[name_transcription]');
        echo $form->textField($model, 'name_transcription', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("Style for PC", 'office[style_pc]');
        echo $form->textField($model, 'style_pc', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("Style For Mobile", 'office[style_mobile]');
        echo $form->textField($model, 'style_mobile', array('class' => 'form-control'));
        ?>
		
		<?php
        echo CHtml::label("Hidden", 'office[hidden]');
        echo $form->textField($model, 'hidden', array('class' => 'form-control'));
        ?>
        
    </div>
    
    </div>

    <br />
    
    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Update') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')) ?>
        
    </div>   
    </div>
    
</div>

<?php $this->endWidget(); ?>

