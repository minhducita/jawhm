<?php
/* @var $this SystemController */

$this->breadcrumbs=array(
	'System',
);
?>

<style>
	div.simple .row {
		padding: 10px 0;

	}
</style>

<div class="system-update">
<h1>System</h1>


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
	</br>
	</br>
	<link rel="stylesheet" href="/yii1/web/css/jn.css" >
		<div class="jn_form col-md-12" style="background-color: #fff">
			<div class="grid simple">  
				
				<div class="row clearfix">
					<div class="col-md-3">
						<?php  echo $form->label($model, 'name');  ?>
					</div>
					<div class="col-md-9">
						<?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
					</div>
				</div>	

				<div class="row clearfix">
					<div class="col-md-3">
						<?php  echo $form->label($model, 'title');  ?>
					</div>	
					<div class="col-md-9">
						<?php  echo $form->textField($model, 'title', array('class' => 'form-control')); ?>
					</div>
				</div>

				<div class="row clearfix">
					<div class="col-md-3">
						<?php echo $form->label($model, 'keywords'); ?>
					</div>	
					<div class="col-md-9">
						<?php  echo $form->textarea($model, 'keywords', array('class' => 'form-control', 'style'=>'height:100px')); ?>
					</div>
				</div>
				
				<div class="row clearfix">
					<div class="col-md-3">
						<?php echo $form->label($model, 'descriptions'); ?>
					</div>	
					<div class="col-md-9">
						<?php  echo $form->textarea($model, 'descriptions', array('class' => 'form-control', 'style'=>'height:200px')); ?>
					</div>
				</div>
				
				<div class="row clearfix">
					<div class="col-md-3">
						<?php echo $form->label($model, 'timezone'); ?>
					</div>	
					<div class="col-md-9">
						<?php  echo $form->textField($model, 'timezone', array('class' => 'form-control')); ?>
					</div>
				</div>

				<div class="row clearfix">
					<div class="col-md-3">
						<?php echo $form->label($model, 'email_admin'); ?>
					</div>	
					<div class="col-md-9">
						<?php  echo $form->textField($model, 'email_admin', array('class' => 'form-control')); ?>
					</div>
				</div>

    		</div>


			<div class="form-group">
		        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'float: right')) ?>
		        <?php echo CHtml::link('バック', array('interview/index'), array('class' => 'btn btn-primary')) ?>
		    </div> 	

		</div>
	</div>





<?php $this->endWidget(); ?>


</div>
