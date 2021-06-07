<style>
    #Question_status label {
        display: initial;
    }

</style>

<?php

/* @var $this InterviewController */
$this->breadcrumbs=array(
	'Question',
);
?>

<?php

    if(Yii::app()->controller->action->id == "index"){

?>
        <h1>質問</h1>
        <?php
            echo CHtml::link('質問を作成', array('question/create'), array('class' => 'btn btn-success'));
        ?>
        <p>
            <?php 

            $listStatus = array('0' => 'Pending Review', '1' => 'Published');
            
            $this->widget(
                'zii.widgets.grid.CGridView', array(
                'dataProvider' => $model->search(),
                'filter' => $model,
                //'filter' => $model,
                'columns' => array(
                    array(
                        'type' => 'text',
                        'name' => 'id',
                        //'filter' => 'CHtml::activeTextField($model, "name")',
                        'header' => '#',
                        'value' => '$data->id ? $data->id : ""',
                    ),
                    //'name',
                    array(
                        'type' => 'html',
                        'name' => 'title',
                        //'filter' => 'CHtml::activeTextField($model, "name")',
                        'header' => 'タイトル',
                        'value' => '$data->title ? $data->title : ""',
                        'htmlOptions'=>array('width'=>'300px'),
                    ),
                    array(
                        'type' => 'html',
                        'name' => 'status',
                        'header' => '状態',
                        'value' => '$data->status == "1" ? "<span style=color:green>Published</span>" : "<span style=color:#f35958>Pending Review</span>"',
                        'filter'=> CHtml::activeRadioButtonList($model, 'status', $listStatus),
                        'htmlOptions'=>array('width'=>'200px', 'style'=>'text-align: center'),
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'updated_at',
                        'header' => '更新時間',
                        'value' => '$data->updated_at ? $data->updated_at : ""',
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{view}{update}{delete}',
                        'buttons' => array(
                            'update' => array(
                                'url' => 'Yii::app()->createUrl("admin/question/update", array("id" => "$data->id"))',
                            ),
                            'delete' => array(
                                'url' => 'Yii::app()->createUrl("admin/question/delete", array("id" => "$data->id"))',
                            ),
                        ),
                    ),
                    
                ),
                'htmlOptions' => array('class' => 'table table-striped table-hover table-condensed table-responsive'),
            ));
            ?>
        </p>

<?php

    }// end if
    else if(Yii::app()->controller->action->id == "view"){

?>
        <h1><?php echo $model->title; ?></h1>

        <p>
            <?php echo CHtml::link('Update', $this->createAbsoluteUrl('question/update',array('id'=>$model->id)), array('class' => 'btn btn-primary'));?>
            <?php echo CHtml::link('Delete', $this->createAbsoluteUrl('question/delete',array('id'=>$model->id)), array('class' => 'btn btn-danger'));?>    
            <?php //echo  CHtml::link('Delete','#', array('class' => 'btn btn-primary'), array('submit'=>array('question/delete','id'=>$model->id),'confirm' => 'Are you sure you want to delete '.$model->title)); ?>    
        </p>

        <table class="table table-striped table-bordered detail-view">
            <tbody>
                <tr>
                    <th width="20%">ID</th>
                    <td><?php echo $model->id; ?></td>
                </tr>

                <tr>
                    <th>タイトル</th>
                    <td><?php echo $model->title; ?></td>
                </tr>
                <tr>
                    <th>キーワード</th>
                    <td><?php echo $model->keyword !="" ? $model->keyword : "N/A"; ?></td>
                </tr>
                <tr>
                    <th>注意</th>
                    <td><?php echo $model->note != "" ? $model->note : "N/A"; ?></td>
                </tr>
                <tr>
                    <th>状態</th>
                    <td><?php echo $model->status == "1" ? "<span style=color:#008000>Published</span>" : "<span style=color:#f35958>Pending Review</span>"; ?></td>
                </tr>

                <tr>
                    <th>国</th>
                    <td><?php echo $country["name"] != "" ? $country["name"] : "N/A"; ?></td>
                </tr>

                <tr>
                    <th>カテゴリ</th>
                    <td><?php echo $category["title"]; ?></td>
                </tr>
                
                <tr>
                    <th>答え</th>
                    <td>
                        <?php $i = 1; foreach ($answer as $ans) { ?>
                        <?php echo "<span class=badge>#".$i.".</span>   "; echo $ans->content; $i++; ?>

                    <hr>
                    </br>
                        <?php }; ?>
                    </td>
                </tr>
                <tr>
                    <th>更新時間</th>
                    <td><?php echo "<span style='color:#f35958'>".$model->updated_at."</span>"; ?></td>
                </tr>

            </tbody>
            
        </table>

        <style>
            .badge {
                font-size: 12px;
                font-weight: 700;
                color: #fff;
                background-color: #999;
            }
        </style>

<?php
    }
 ?>
 