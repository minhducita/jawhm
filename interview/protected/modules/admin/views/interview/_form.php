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

<br/><br/>
<link rel="stylesheet" href="/interview/css/jn.css" >
<div class="jn_form col-md-12" style="background-color: #fff">
    <div class="grid simple">      
    <div class="row">
    <div class="col-md-6">
        <?php
        //set data, array
        $dataOffice = CHtml::listData($offices, 'id', 'name_transcription');
        $sexs = array('0' => 'Female', '1' => 'Male');
        $status = array('0' => 'Pending Review', '1' => 'Published');
        ?>
        
        <?php
        //echo CHtml::label("オフィス <span style='color:red'>必須</span>", 'Interview[id_office]');
        echo $form->label($model, 'id_office');
        echo $form->dropDownList($model, 'id_office', $dataOffice, array('class' => 'form-control', 'id' => 'id_office', 'onchange' => 'changeOffice()'));
        ?>
        
        <?php
        echo CHtml::label("お名前 <span style='color:red'>必須</span>", 'Interview[name]');   
        echo $form->textField($model, 'name', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("アルファベットの名前 <span style='color:red'>必須</span>", 'Interview[name_transcription]');
        echo $form->textField($model, 'name_transcription', array('class' => 'form-control', 'onchange' => '$("#slug").val($(this).val())'));
        ?>
        
        <?php        
        echo CHtml::label("性別", 'Interview[sex]');
        echo $form->dropDownList($model, 'sex', $sexs, array('id' => 'sex', 'class' => 'form-control', 'onchange' => "changeImageWithSex($('#sex').val(),$('#name-image').val())"));
        ?>
        
        <?php
        echo CHtml::label("状態", 'Interview[status]');
        echo $form->dropDownList($model, 'status', $status, array('class' => 'form-control'));
        ?>
        
        <?php
        if (!$model->isNewRecord) {
            echo $form->hiddenField($model, 'image', array('id' => 'name-image'));
        }
        ?>
        
        <?php      
        echo $form->label($model, 'maxim');
        echo $form->textField($model, 'maxim', array('class' => 'form-control'));
        ?>
        
        <?php      
        echo $form->label($model, 'seminar_title');
        echo $form->textField($model, 'seminar_title', array('class' => 'form-control'));
        ?>
        
        <?php
        echo CHtml::label("Slug <span style='color:red'>必須</span>", 'Interview[slug]');
        echo $form->textField($model, 'slug', array('class' => 'form-control', 'id' => 'slug'));
        ?>
        
    </div>
    <div class="col-md-6">    
        <?php
        echo CHtml::label("アイキャッチ画像", '');
        $nameImage;
        $id;
        if ($model->image == null && $model->id == null) {
            $nameImage = 'default-female.png';
            $id = 0;
        } else {
            $nameImage = $model->image;
            $id = $model->id;
        }
        echo CHtml::button('セットのデフォルト', array('id' => 'delete', 'onclick' => "deleteImage('{$nameImage}', {$id})"));
        echo '<br />';
        if ($model->image) {
            $url_image = Yii::app()->homeUrl . 'images/files/' /* . strtolower($model['officeName'] . '/' */ . $model->image;
            echo CHtml::image($url_image, 'Error url', array('id' => 'image', 'width' => '195', 'height' => '150', 'onclick' => "$('#dialog').dialog('Open');"));
        } else {
            echo CHtml::image('', '', array('id' => 'image', 'width' => '195', 'height' => '150'));
        }
        ?>    

        <?php
        echo CHtml::label("画像変化", 'Interview[filePath]');
        echo $form->fileField($model, 'filePath', array('id' => 'image_file', 'onchange' => 'readURL(this)'));
        ?>
        
    </div>
    </div>

    <script type="text/javascript" src="/interview/js/ckeditor/ckeditor.js" ></script>    
    <?= CHtml::label("内容 <span style='color:red'>必須</span>", '') ?>
    <textarea type="text" name="Interview[content]" id="content_interview" required style="width: 100%" rows="7" ><?php echo $model->content ?></textarea>
    
    <script>
        CKEDITOR.replace('content_interview',{                              
            contentsCss : '/interview/css/interview.css',
            allowedContent : true,
            enterMode : CKEDITOR.ENTER_BR,
        });
    </script>
    <br />
    
    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'float: right')) ?>
        <?php echo CHtml::link('バック', array('interview/index'), array('class' => 'btn btn-primary')) ?>
    </div>   
    </div>
    
</div>

<?php $this->endWidget(); ?>

<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                            .attr('src', e.target.result)
                            .width(195);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function deleteImage(url = 'default-female.png', id = 1)
        {
            if (confirm('Are you sure!')) {
                if (url != 'default-female.png' && url != 'default-male.png')
                {
                    setImageDefault($('#sex').val());
                } else
                {
                    alert('This image is default');
                    setImageDefault($('#sex').val());
                }
            }
        }
        function changeImageWithSex(sex, name = 'default-female.png')
        {
            if(name == 'default-female.png' || name == 'default-male.png')
            {
                setImageDefault(sex);
            }
        }
        
        function setImageDefault(sex)
        {
            if (sex == 0)
            {
                $('#image').attr('src', '<?php echo Yii::app()->homeUrl . 'images/files/default-female.png' ?>').width(195);
                $('#name-image').attr('value', 'default-female.png');           
            } else {
                $('#image').attr('src', '<?php echo Yii::app()->homeUrl . 'images/files/default-male.png' ?>').width(195);
                $('#name-image').attr('value', 'default-male.png');            
            }
        }
        
        function changeOffice()
        {
            var name = $('#id_office option:selected').text().toLowerCase();
            //alert(name);
            $("#interview_block").addClass(name);
        }
        
        window.onload = function(){
            changeImageWithSex($('#sex').val(),'<?php echo $nameImage ?>');
        };
                
</script>
