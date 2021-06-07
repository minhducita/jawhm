<?php
/* @var $this CountriesController */

$this->breadcrumbs=array(
	'Countries',
);

?>
<h1>Office</h1>	
<?php
    echo CHtml::link('Create Countries', array('countries/create'), array('class' => 'btn btn-success'));
?>
<p>
    <?php 
    
    $this->widget(
        'zii.widgets.grid.CGridView', array(
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'type' => 'text',
                'name' => 'id',
                'value' => '$data->id',
                //'filter' => false,
                'htmlOptions'=>array('width'=>'40px'),
            ),
            //'name',
            array(
                'type' => 'html',
                'name' => 'name',
                //'filter' => 'CHtml::activeTextField($model, "name")',
                'header' => 'Name',
                'value' => '$data->name ? $data->name : ""',
                'htmlOptions'=>array('width'=>'250px'),
            ),
            
            array(
                'type' => 'text',
                'name' => 'name_transcription',
                'value' => '$data->name_transcription ? $data->name_transcription : ""',
            ),
            array(
                'type' => 'text',
                'name' => 'style_pc',
			    'header' =>  'STYLE FOR PC',
                'value' => '$data->style_pc ? $data->style_pc : ""',
                'htmlOptions'=>array('width'=>'250px'),
            ),
			array(
                'type' => 'text',
				'name' => 'style_mobile',
                'header' => 'STYPE FOR MOBILE',
                'value' => '$data->style_mobile ? $data->style_mobile : ""',
                'htmlOptions'=>array('width'=>'250px'),
            ),
            /*
            array(
                'type' => 'html',
                'name' => 'image',
                'value' => 'CHtml::image("/yii1/web/images/files/{$data->image}", "Error url", array("width" => 100, "class" => "img-thumbnail img-responsive"))',
                //'filter' => false,
            ),
            */
           array(
                'class' => 'CButtonColumn',
                'template' => '{update}{delete}',
                'buttons' => array(
                    'update' => array(
                        'url' => 'Yii::app()->createUrl("admin/office/update", array("id" => "$data->id"))',
                    ),
                    'delete' => array(
                        'url' => 'Yii::app()->createUrl("admin/office/delete", array("id" => "$data->id"))',
                    ),
                ),
            ),
        ),
        'htmlOptions' => array('class' => 'table table-striped table-hover table-condensed table-responsive'),
    ));
    ?>
</p>