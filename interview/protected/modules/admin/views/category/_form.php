<?php $form = $this->beginWidget('CActiveForm', array('action' => array('category/create'))); ?>

<?php // Html::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'float: right;']) ?>        

<div class="grid simple" style="background-color: #fff">      
    <div class="grid-body no-border jn_form">
                             
        <?php //= $form->field($model, 'title')->textarea(['rows' => 3, 'onchange' => '$("#slug").val($(this).val())']) ?>
        <?php
        echo $form->labelEx($model, 'title');
        echo $form->textArea($model, 'title', array('rows' => 3, 'onchange' => '$("#slug").val($(this).val())', 'class' => 'form-control'));
        echo $form->error($model, 'title');
        ?>
        
        <?php
        //$mapParent = ArrayHelper::map($parent, 'id', 'title');
        $mapParent = CHtml::listData($parent, 'id', 'title');
        $mapParent = array('0' => '------') + $mapParent;
        $status = array('0' => 'Pending Review', '1' => 'Published');
        ?>

        <?php //= $form->field($model, 'parent')->dropDownList($mapParents, []) ?>
        <?php 
        echo $form->labelEx($model, 'parent');
        echo $form->dropDownList($model, 'parent', $mapParent, array('class' => 'form-control'));
        echo $form->error($model, 'parent');
        ?>
        
        <?php //= $form->field($model, 'status')->dropDownList($status)->label("状態", ['class' => 'form_label_text']) ?> 
        <?php 
        echo $form->labelEx($model, 'status');
        echo $form->dropDownList($model, 'status', $status, array('class' => 'form-control'));
        echo $form->error($model, 'status');
        ?>
        
        <?php // $form->field($model, 'slug')->textInput(['maxlength' => true, 'id' => 'slug']) ?>
        <?php
        echo $form->labelEx($model, 'slug');
        echo $form->textField($model, 'slug', array('id' => 'slug', 'class' => 'form-control'));
        echo $form->error($model, 'slug');
        ?>
        
        <?php // $form->field($model, 'description')->textarea(['rows' => 6]) ?>    
        <?php 
        echo $form->labelEx($model, 'description');
        echo $form->textArea($model, 'description', array('rows' => 6, 'class' => 'form-control'));
        echo $form->error($model, 'description');
        ?>
        
        <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'float: right;margin-top: 10px;')) ?>
        </div>

    </div>
</div>

<?php $this->endWidget(); ?>