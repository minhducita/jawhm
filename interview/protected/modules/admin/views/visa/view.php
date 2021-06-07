<?php
/* @var $this VisaController */
/* @var $model Visa */

$this->breadcrumbs=array(
	'Visas'=>array('index'),
	$model->id_country,
);

$this->menu=array(
	array('label'=>'List Visa', 'url'=>array('index')),
	array('label'=>'Create Visa', 'url'=>array('create')),
	array('label'=>'Update Visa', 'url'=>array('update', 'id'=>$model->id_country)),
	array('label'=>'Delete Visa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_country),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Visa', 'url'=>array('admin')),
);
?>

<h1>View Visa #<?php echo $model->id_country; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_country',
		'introduce',
		'content',
		'note',
		'order_sort',
		'status',
		'slug',
	),
)); ?>
