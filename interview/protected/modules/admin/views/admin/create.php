<?php
$this->breadcrumbs = array('Admin' => array('admin/index'), 'Create',);
?>
<div class="site-login">
    <h1>Create user</h1>
    <p>Please fill out the following fields to login:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('id' => 'login-form'))); ?>
            <?php echo $form->label($model, 'username'); ?>        
            <?php echo $form->textField($model, 'username', array('autofocus' => true)) ?>
            <?php echo $form->label($model, 'password'); ?>  
            <?php echo $form->passwordField($model, 'password') ?>

            <div class="form-group">
                <?= CHtml::submitButton('Login', array('class' => 'btn btn-primary', 'name' => 'login-button')) ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>