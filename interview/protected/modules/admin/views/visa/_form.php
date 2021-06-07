<?php ?>
<script type="text/javascript" src="/yii1/web/js/ckeditor/ckeditor.js" ></script>    
<link rel="stylesheet" href="/yii1/web/css/jn.css" >
<div class="jn_form col-md-12" style="background-color: #fff">
    <div class="grid simple">  
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'visa-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>
        <?php
            $status = array('0' => 'Pending Review', '1' => 'Published');
            $countries = CHtml::listData($countries, 'id', 'name_transcription');
        ?>
        
        <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success category_bt_main' : 'btn btn-primary category_bt_main'))  ?>        
        <?php echo CHtml::link('バック' , array('visa/index'), array('class' => 'btn btn-primary btn-md category_bt_main')); ?>  
        </div>
        
        <br />
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        
        <?php echo $form->errorSummary($model); ?>
        
        <?php if($model->isNewRecord){ ?>
        <?php echo $form->labelEx($model, 'id_country'); ?>
        <?php echo $form->dropDownList($model, 'id_country', $countries, array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'id_country'); ?>
        <?php } ?>
        <?php echo $form->labelEx($model, 'introduce'); ?>
        <?php echo $form->textArea($model, 'introduce', array('id' => 'introduce_visa', 'class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'introduce'); ?>

        <script>
            CKEDITOR.replace('introduce_visa', {
                contentsCss: '/css/contents.css',
                allowedContent: true,
                enterMode: CKEDITOR.ENTER_BR,
            });
        </script>

        <?php echo $form->labelEx($model, 'content'); ?>
        <?php echo $form->textArea($model, 'content', array('id' => 'content_visa', 'class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'content'); ?>

        <script>
            CKEDITOR.replace('content_visa', {
                contentsCss: '/css/contents.css',
                allowedContent: true,
                enterMode: CKEDITOR.ENTER_BR,
            });
        </script>

        <?php echo $form->labelEx($model, 'note'); ?>
        <?php echo $form->textArea($model, 'note', array('id' => 'note_visa', 'class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'note'); ?>

        <script>
            CKEDITOR.replace('note_visa', {
                contentsCss: '/css/contents.css',
                allowedContent: true,
                enterMode: CKEDITOR.ENTER_BR,
            });
        </script>

        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', $status, array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'status'); ?>

        <?php echo $form->labelEx($model, 'slug'); ?>
        <?php echo $form->textField($model, 'slug', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'slug'); ?>
        
        <br />
        <div class="form-group">              
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success category_bt_main' : 'btn btn-primary category_bt_main')) ?>
            <?php echo CHtml::link('バック', array('visa/index'), array('class' => 'btn btn-primary btn-md category_bt_main')); ?>  
        </div>    

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->