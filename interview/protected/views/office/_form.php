<?php
/* @var $this OfficeController */
/* @var $model Office */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'office-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_transcription'); ?>
		<?php echo $form->textField($model,'name_transcription',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name_transcription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'style_pc'); ?>
		<?php echo $form->textField($model,'style_pc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'style_pc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'style_mobile'); ?>
		<?php echo $form->textField($model,'style_mobile',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'style_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidden'); ?>
		<?php echo $form->textField($model,'hidden'); ?>
		<?php echo $form->error($model,'hidden'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->