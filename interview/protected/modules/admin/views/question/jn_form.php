<link rel="stylesheet" href="/interview/css/jn.css" >
<script type="text/javascript">
    //condition to checked category or country
    var num_select_category = 0;
    var num_select_country = 0;
    
    var question_categories = '';
    var question_countries = '';
    
//JN:start:get sort and checked in checkBox      
<?php

if (count($model->question_category) > 0) {
    $str1 = '[';
    foreach ($model->question_category as $qc) {
        $str1 .= "\"" . $qc['id_category'] . "\",";
    }
    $str1 .= ']';
    echo "question_categories = " . $str1 . ";\n"; 
}
if (count($model->question_country) > 0) {
    $str2 = '[';
    foreach ($model->question_country as $qco) {
        $str2 .= "\"" . $qco['id_country'] . "\",";
    }
    $str2 .= ']';
    echo "question_countries = " . $str2 . ";\n"; 
}

?>
//JN:end    
    
</script>
<script type="text/javascript">//this is script run in create and update    
    function createAnswer(index)
    {
        var token = Math.random();
        var div_context = document.createElement('div');
        div_context.id = 'JN';
        var lab = document.createElement('label');
        lab.innerHTML = '新しい回答';     
        var ans = document.createElement('textarea');
        ans.id = 'text-editor-' + token;
        ans.className = 'form-control textarea';
        ans.name = 'answers[new'+ (index + 1) +']';       
        ans.rows = 6;
        //ans.onclick = function() { $(this).wysihtml5(); }
        ans.placeholder = "Enter text ...";
        var btRemoveA = document.createElement('button');
            btRemoveA.id = 'btRemoveA';
            btRemoveA.className = 'bt-remove-answer';
            btRemoveA.innerHTML = '削除します';          
            btRemoveA.onclick = function () {
                 removeAnswer(0,ans,lab,this,div_context);
                 return false;
            }
        
        var ck = document.createElement('script');
        ck.innerHTML = "CKEDITOR.replace('text-editor-" + token +"',{"                              
                    + "contentsCss : '',"
                    + "allowedContent : true,"
                    + "enterMode : CKEDITOR.ENTER_BR,"
                    + "height : '200px'"
                + "})";
        div_context.appendChild(lab);
        div_context.appendChild(btRemoveA);
        div_context.appendChild(ans);
        div_context.appendChild(ck);
        document.getElementById('block-answer').appendChild(div_context);

    }
    function removeAnswer(id, textArea, label, button, div)
    {
        if(confirm('Are you sure'))
                 {
                     if(id > 0)
                    {
                        $.ajax({
                            url: '/interview/admin/question/DelAnswer',
                            type: 'post',
                            dataType: 'text',
                            data: {
                                id_answer: id                            
                            },
                            success: function (result) {   
                                alert(result);
                                return false;
                            }
                        });
                    }
                    div.remove();
                }
    }
</script>


<script type="text/javascript">//this is script run in update
    $(function () {

        for (var i = 0; i < question_categories.length; i++)
        {
            var id = '#check_category_' + question_categories[i];
            //alert(id);
			console.log(id);
            $(id).attr('checked', true);
            num_select_category++;
        }
        for (var i = 0; i < question_countries.length; i++)
        {
            var id = '#check_country_' + question_countries[i];
            //alert(id);
            $(id).attr('checked', true);
            num_select_country++;
        }
	});
</script>

<?php $form = $this->beginWidget('CActiveForm', array('action' => array())); ?>

<div class="form-group">
    <?= CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success question_bt_main' : 'btn btn-primary question_bt_main')) ?>
    <?php echo CHtml::link('バック' , array('question/index'), array('class' => 'btn btn-primary btn-md question_bt_main')); ?>  
</div>

<div class="row">
<div class="col-md-12">
<div class="grid simple">
<div class="grid-title no-border">

    <h3 class='form_title'>質問</h3><br />
    
    <?php $status = array('0' => 'Pending Review', '1' => 'Published'); ?> 
    
    <?php 
        echo CHtml::label("タイトル <span style='color:red'>必須</span>", 'Interview[name]'); 
        echo $form->textArea($model, 'title', array('rows' => 3, 'onclick' => "$(this).wysihtml5();", 'onchange' => '$("#slug").val($(this).val())', 'class' => 'form-control'));
        echo $form->error($model, 'title');
    ?>

    <div class="row column-seperation">
    <div class="col-md-6">
        
    <?php echo CHtml::label('カテゴリー', '') ?>
     
	<?php echo ConvertParent::ConvertHtmlCategories($category_parents); ?>
    
    </div>
    <div class="col-md-6">
    <div id="block-country">
    <?php echo CHtml::label('国', '') ?>
    <ul style='list-style: katakana'>
        <?php 
            foreach ($countries as $country)
            {
            ?>
                <li><div class="checkbox check-success checkbox-circle"><input type="checkbox" id="check_country_<?= $country['id'] ?>" name='question_countries[]' value="<?= $country['id'] ?>" onchange = "//addOrDelCountry(<?//= $country['id'] ?>,this)" /><label for="check_country_<?= $country['id'] ?>"><?php echo $country['name'] ?></label></div></li> 
            <?php
            }
        ?>
    </ul>
    </div>
    </div>
    </div> 
	<?php
    echo $form->labelEx($model, 'status');
    echo $form->dropDownList($model, 'status', $status, array('class' => 'form_label_text'));
    echo $form->error($model, 'status');
    ?>
    
    <?php //= $form->field($model, 'keyword')->textInput(['id' => 'keyword'])->label("キーワード") ?>
    <?php
    echo $form->labelEx($model, 'keyword');
    echo $form->textField($model, 'keyword', array('id' => 'keyword', 'class' => 'form-control'));
    echo $form->error($model, 'keyword');
    ?>
    
    <?php // $form->field($model, 'note')->textarea(['rows' => 4 , 'onclick' => "$(this).wysihtml5();"]) ?>
    <?php
    echo $form->labelEx($model, 'note');
    echo $form->textArea($model, 'note', array('rows' => 4, 'class' => 'form-control', 'onclick' => "$(this).wysihtml5();"));
    echo $form->error($model, 'note');
    ?>      
    
    
    <div id="block-answer">   
    <script type="text/javascript" src="/interview/js/ckeditor/ckeditor.js" ></script>    
            <h3 class='form_title'>回答</h3>
            
    <?php
    $answer_length = count($model->answers);
    echo "<script>var answer_length = {$answer_length};</script>";
    if(count($model->answers) > 0)
    {
        $i = 1;
        foreach ($model->answers as $answer) {
            ?>             
            <div id="answer_<?= $answer->id ?>">
            <label id="label_<?= $answer->id ?>">回答 <?= $i ?></label><?= CHtml::button('削除します', array('id' => 'btRemoveA', 'class' => 'bt-remove-answer', 'onclick' => "removeAnswer({$answer->id}, $('[name=\"answers[{$answer->id}]\"]'), $('#label_{$answer->id}'), this, $('#answer_{$answer->id}'))"))  ?>
                      
            <textarea id="content_answer_<?= $answer->id ?>" class="form-control" rows="10" name="answers[<?= $answer->id ?>]"><?= $answer->content ?></textarea> 
            
            
            <script>
                CKEDITOR.replace('content_answer_<?= $answer->id ?>',{                              
                    contentsCss : '', ///interview/css/interview.css
                    allowedContent : true,
                    enterMode : CKEDITOR.ENTER_BR,
                    height : '200px'
                });
            </script>
                                
            
            </div>
            <?php
            $i++;
        }
    }else
    { ?>
            <script type="text/javascript">
                createAnswer(window.answer_length);             
            </script>
    <?php } ?>
            
    </div>
     
    <?= CHtml::button('新しい答えを追加', array('onclick' => "createAnswer(window.answer_length)"))  ?>   
    
    <br />
    <span class="help">To show seminar use syntax: <span style="color:red">seminar_calendar[[seminar-title]]</span>, e.g: seminar_calendar[[オーストラリア]]</span>
     <br />
    <span class="help">To show seminar use syntax: <span style="color:red">seminar_calendar_keyword[[seminar-keyword]]</span>, e.g: seminar_calendar_keyword[[初心者]]</span>

    <div class="form-group">     
        <?= CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success question_bt_main' : 'btn btn-primary question_bt_main')) ?>     
        <?php echo CHtml::link('バック' , array('question/index'), array('class' => 'btn btn-primary btn-md question_bt_main')); ?> 
    </div>
    <div style="clear:both;"></div>
</div>
</div>
</div>
</div>
<?php $this->endWidget(); ?>
