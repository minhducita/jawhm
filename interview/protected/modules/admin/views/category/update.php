<?php
$this->breadcrumbs = array('Category' => array('category/index'), '更新',);
?>

<div class="jn_form_block">

    <h1>Update</h1>

<?php $form = $this->beginWidget('CActiveForm', array()); ?>

<div class="form-group">
<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success category_bt_main' : 'btn btn-primary category_bt_main'))  ?>        
<?php echo CHtml::link('バック' , array('category/IndexSize?size=10'), array('class' => 'btn btn-primary btn-md category_bt_main')); ?>  
</div>
    <link rel="stylesheet" href="/interview/css/jn.css" >
    <div class="grid simple jn_form" style="background-color: #fff">      
        <div class="grid-body no-border">

            <?php
            echo $form->labelEx($model, 'title');
            echo $form->textArea($model, 'title', array('rows' => 3, 'onchange' => '$("#slug").val($(this).val())', 'class' => 'form-control'));
            echo $form->error($model, 'title');
            ?>
            
            <?php
            $mapParent = CHtml::listData($parent, 'id', 'title');
            $mapParent = array('0' => '------') + $mapParent;
            $status = array('0' => 'Pending Review', '1' => 'Published');
            ?>

            <?php 
            echo $form->labelEx($model, 'parent');
            echo $form->dropDownList($model, 'parent', $mapParent, array('class' => 'form-control'));
            echo $form->error($model, 'parent');
            ?>

            <?php 
            echo $form->labelEx($model, 'status');
            echo $form->dropDownList($model, 'status', $status, array('class' => 'form-control'));
            echo $form->error($model, 'status');
            ?>
            
            <?php
            echo $form->labelEx($model, 'slug');
            echo $form->textField($model, 'slug', array('id' => 'slug', 'class' => 'form-control'));
            echo $form->error($model, 'slug');
            ?>
            
            <?php 
            echo $form->labelEx($model, 'description');
            echo $form->textArea($model, 'description', array('rows' => 6, 'class' => 'form-control'));
            echo $form->error($model, 'description');
            ?>
            <br />
                        
            <div>
                <?php echo CHtml::label('このカテゴリに表示される質問', '') ?>
                <ul>
                    <?php
                    foreach ($questions as $q) {
                    ?>
                    <li>
                        <?php echo $q->title ?>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            
            <br />
            <div class="form-group">
                <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success category_bt_main' : 'btn btn-primary category_bt_main')) ?>
                <?php echo CHtml::link('バック' , array('category/IndexSize?size=10'), array('class' => 'btn btn-primary btn-md category_bt_main')); ?>
            </div>



        </div>
    </div>

<?php $this->endWidget(); ?>

</div>
