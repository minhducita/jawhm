<script type="text/javascript" src="/yii1/web/js/ckeditor/ckeditor.js" ></script>
<?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>

<?php 
    //button back   
    echo CHtml::link('バック', array('interview/index'), array('class' => 'btn btn-primary btn-md')); 
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
        
        
        echo CHtml::label("Name", 'Countries[name]');   
        echo $form->textField($model, 'name', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("Name Transcription", 'Countries[name_transcription]');
        echo $form->textField($model, 'name_transcription', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("Abbr", 'Countries[abbr]');
        echo $form->textField($model, 'abbr', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("Image", 'Countries[image]');
        echo $form->textField($model, 'image', array('class' => 'form-control'));
        ?>
		
		 <?php
        echo CHtml::label("note", 'Countries[note]');
        echo $form->textarea($model, 'note', array('class' => 'form-control', 'id'=>'note'));
        ?>
		
		 <?php
        echo CHtml::label("Ads Number", 'Countries[ads_number]');
        echo $form->textField($model, 'ads_number', array('class' => 'form-control'));
        ?>
        
    </div>
    
    </div>

    <br />
    
    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Update') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')) ?>
        
    </div>   
    </div>
    
</div>
<script> 
	
CKEDITOR.replace('note',{                              
           contentsCss : '/yii1/web/css/interview.css',
           allowedContent : true,
           enterMode : CKEDITOR.ENTER_BR,
       });
</script>
<?php $this->endWidget(); ?>

