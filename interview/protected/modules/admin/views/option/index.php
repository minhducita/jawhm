<?php
/* @var $this CountriesController */

$this->breadcrumbs=array(
	'Countries',
);

?>
<h1>Options</h1>	
<?php
    echo CHtml::link('Create Options', array('option/create'), array('class' => 'btn btn-success'));
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
                'name' => 'name_pages',
                //'filter' => 'CHtml::activeTextField($model, "name")',
                'header' => 'NAME PAGES',
                'value' => '$data->name_pages ? $data->name_pages : ""',
                'htmlOptions'=>array('width'=>'250px'),
            ),
            
            array(
                'type' => 'text',
                'name' => 'title',
                'value' => '$data->title ? $data->title : ""',
            ),
            array(
                'type' => 'text',
                'name' => 'link_title',
                'value' => '$data->link_title ? $data->link_title : ""',
                'htmlOptions'=>array('width'=>'250px'),
            ),
			 array(
                'type' => 'text',
                'name' => 'keyword',
                'value' => '$data->keyword ? $data->keyword : ""',
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
                        'url' => 'Yii::app()->createUrl("admin/option/update", array("id" => "$data->id"))',
                    ),
                    'delete' => array(
                        'url' => 'Yii::app()->createUrl("admin/option/delete", array("id" => "$data->id"))',
                    ),
                ),
            ),
        ),
        'htmlOptions' => array('class' => 'table table-striped table-hover table-condensed table-responsive'),
    ));
    ?>
</p>