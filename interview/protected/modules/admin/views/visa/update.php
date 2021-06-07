<?php
/* @var $this VisaController */
/* @var $model Visa */

$this->breadcrumbs=array(
	'Visas'=>array('index'),
	$model->id_country=>array('view','id'=>$model->id_country),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List Visa', 'url'=>array('index')),
//	array('label'=>'Create Visa', 'url'=>array('create')),
//	array('label'=>'View Visa', 'url'=>array('view', 'id'=>$model->id_country)),
//	array('label'=>'Manage Visa', 'url'=>array('admin')),
//);
?>

<h1>Update Visa <?php echo $model->country->name_transcription; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model, 'countries' => $countries)); ?>