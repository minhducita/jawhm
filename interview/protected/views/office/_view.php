<?php
/* @var $this OfficeController */
/* @var $data Office */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_transcription')); ?>:</b>
	<?php echo CHtml::encode($data->name_transcription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('style_pc')); ?>:</b>
	<?php echo CHtml::encode($data->style_pc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('style_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->style_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidden')); ?>:</b>
	<?php echo CHtml::encode($data->hidden); ?>
	<br />


</div>