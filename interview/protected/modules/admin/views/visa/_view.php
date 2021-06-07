<?php
/* @var $this VisaController */
/* @var $data Visa */
die('Hello');
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_country')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_country), array('view', 'id'=>$data->id_country)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('introduce')); ?>:</b>
	<?php echo CHtml::encode($data->introduce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_sort')); ?>:</b>
	<?php echo CHtml::encode($data->order_sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
	<?php echo CHtml::encode($data->slug); ?>
	<br />


</div>