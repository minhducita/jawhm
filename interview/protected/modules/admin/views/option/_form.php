<?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>

<?php 
    //button back   
    echo CHtml::link('バック', array('option/index'), array('class' => 'btn btn-primary btn-md')); 
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
        
        
        echo CHtml::label("Name page", 'options[name_pages]');   
        echo $form->textField($model, 'name_pages', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("Title", 'options[title]');
        echo $form->textField($model, 'title', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("keyword", 'options[keyword]');
        echo $form->textField($model, 'keyword', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("Description", 'options[description]');
        echo $form->textarea($model, 'description', array('class' => 'form-control', 'style'=>'height:120px'));
        ?>
		
		<?php
        echo CHtml::label("Author", 'options[author]');
        echo $form->textField($model, 'author', array('class' => 'form-control'));
        ?>
		
		<?php
        echo CHtml::label("Dcterm", 'options[dcterm]');
        echo $form->textField($model, 'dcterm', array('class' => 'form-control'));
        ?>
		
		<?php
        echo CHtml::label("Link title", 'options[link_title]');
        echo $form->textField($model, 'link_title', array('class' => 'form-control'));
        ?>
		
		<?php
        echo CHtml::label("H1text", 'options[h1text]');
        echo $form->textField($model, 'h1text', array('class' => 'form-control'));
        ?>
		
		<?php
        echo CHtml::label("Robots", 'options[robots]');
        echo $form->textField($model, 'robots', array('class' => 'form-control'));
        ?>
		
		<?php
        echo CHtml::label("Image", 'options[imghtml]');
        echo $form->textField($model, 'imghtml', array('class' => 'form-control'));
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

