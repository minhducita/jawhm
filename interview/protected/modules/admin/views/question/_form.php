<?php
    $baseUrl = Yii::app()->baseUrl;
?>
<script type="text/javascript">//this is script run in create and update
    
    var num_select_category = 0;
    var num_select_country = 0;
    
    var question_categories = '';
    var question_countries = '';

    $(function(){
        var arr_cate = document.getElementsByName('question_categories');
        for(i = 0; i < arr_cate.length; i++)
        {
            arr_cate[i].addEventListener('click', function(){
                if(this.checked) num_select_category++;
                else num_select_category--;
                var arr_coun = document.getElementsByName('question_countries');
                if(num_select_category > 0)
                {                   
                    for(ii = 0; ii < arr_coun.length; ii++)
                    {
                        arr_coun[ii].setAttribute("disabled","true");
                        arr_coun[ii].checked = false;
                    }
                }
                if(num_select_category <= 0)
                {                  
                    for(ii = 0; ii < arr_coun.length; ii++)
                    {
                        arr_coun[ii].removeAttribute("disabled");
                    }
                }               
            });
        }
        
        var arr_coun = document.getElementsByName('question_countries');         
        for(i = 0; i < arr_coun.length; i++)
        {
            arr_coun[i].addEventListener('click', function(){
                if(this.checked) num_select_country++;
                else num_select_country--;
                var arr_cate = document.getElementsByName('question_categories');
                if(num_select_country > 0)
                {                   
                    for(ii = 0; ii < arr_cate.length; ii++)
                    {
                        arr_cate[ii].setAttribute("disabled","true");
                        arr_cate[ii].checked = false;
                    }
                }
                if(num_select_country <= 0)
                {                  
                    for(ii = 0; ii < arr_cate.length; ii++)
                    {
                        arr_cate[ii].removeAttribute("disabled");
                    }
                }               
            });
        }
    });
    
    function createAnswer()
    {
        var div_context = document.createElement('div');
        div_context.id = 'JN';
        var lab = document.createElement('label');
        lab.innerHTML = '新しい回答';
        var ans = document.createElement('textarea');
        ans.id = 'text-editor';
        ans.className = 'form-control textarea';
        ans.name = 'answers[]';       
        ans.rows = 6;
        ans.onclick = function() { $(this).wysihtml5(); }
        ans.placeholder = "Enter text ...";
        var btRemoveA = document.createElement('button');
            btRemoveA.id = 'btRemoveA';
            btRemoveA.className = 'bt-remove-answer';
            btRemoveA.innerHTML = '削除します';          
            btRemoveA.onclick = function () {
                 removeAnswer(0,ans,lab,this,div_context);
                 return false;
            }
        div_context.appendChild(lab);
        div_context.appendChild(btRemoveA);
        div_context.appendChild(ans);
        document.getElementById('block-answer').appendChild(div_context);
    }
    function removeAnswer(id, textArea, label, button, div)
    {
        if(confirm('Are you sure'))
        {
            if(id > 0)
            {
                $.ajax({
                    url: "<? echo $baseUrl?>/admin/question/del_answer/id/"+id,
                    type: 'get',
                    dataType: 'text',
                    success: function (result) {   
                        alert(result);
                        return false;
                    }
                });
            }                
           div.remove();
           return false;
        }
    }
</script>


<script type="text/javascript">//this is script run in update
    $(function () {   
        for (var i = 0; i < question_categories.length; i++)
        {
            var id = '#check_category_' + question_categories[i];
            $(id).attr('checked', true);
            num_select_category++;
        }
        for (var i = 0; i < question_countries.length; i++)
        {
            var id = '#check_country_' + question_countries[i];
            $(id).attr('checked', true);
            num_select_country++;
        }

            //check category disabled
            var arr_cate = document.getElementsByName('question_categories');
            var arr_coun = document.getElementsByName('question_countries');

            if (num_select_category > 0)
            {
                for (ii = 0; ii < arr_coun.length; ii++)
                {
                    arr_coun[ii].setAttribute("disabled", "true");
                }
            }
            if (num_select_category <= 0)
            {
                for (ii = 0; ii < arr_coun.length; ii++)
                {
                    arr_coun[ii].removeAttribute("disabled");
                }
            }
            if (num_select_country > 0)
            {
                for (ii = 0; ii < arr_cate.length; ii++)
                {
                    arr_cate[ii].setAttribute("disabled", "true");
                }
            }
            if (num_select_country <= 0)
            {
                for (ii = 0; ii < arr_cate.length; ii++)
                {
                    arr_cate[ii].removeAttribute("disabled");
                }
            }


        });
    
    //function not use //waiting remove
    function createButtonRemoveCountry(id_question, id_country)
    {
        var dropDownC = document.getElementsByName('country')[0];
        if(dropDownC.value > 0 && id_question > 0 && id_country > 0)
        {
            var btRemoveC = document.createElement('button');
            btRemoveC.id = 'btRemoveC';
            btRemoveC.innerHTML = 'Remove country';          
            btRemoveC.onclick = function () {
                 if(confirm('Are you sure'))
                 {
                     $.ajax({
                         url : '/advanced/backend/qa/question/del-question-country',
                         type : 'post',
                         dataType : 'text',
                         data : {
                             id_question : id_question,
                             id_country : id_country
                         },
                         success : function (result){
                             $('#country').val(0);
                             $('#ads').val(0);
                             $('#btRemoveC').remove();
                             return false;
                         }
                     });
                 }
                 return false;
            }
            document.getElementById('block-country').appendChild(btRemoveC);
        }
    }
    
    
    function addOrDelCategory(id){
        
        if(num_select_country <= 0)
        {

            $("input[name='question_categories']").attr("checked", false);
            document.getElementById("check_category_"+id).checked = true;

        }
    }
    
    function addOrDelCountry(id){
        if(num_select_category <= 0)
        {
            $("input[name='question_countries']").attr("checked", false);
            document.getElementById("check_country_"+id).checked = true;
        }
    }
</script>


<?php $form = $this->beginWidget('CActiveForm'); ?>

<?php 
    //button back   
    echo CHtml::link('バック', array('question/IndexSize?size=10'), array('class' => 'btn btn-primary btn-md')); 
?>

<?php
echo CHtml::submitButton(
    $model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
    'style' => 'float: right'));
?>

<br/><br/>

<div class="row">
    <div class="col-md-12" style="background-color: #fff">
        <div class="grid simple">
        <div class="row" style="padding: 20px">
        <div class="col-md-12" style="padding-bottom: 20px">
            <?php
                echo CHtml::label("タイトル <span style='color:red'>必須</span>", 'Question[title]');   
                echo $form->textField($model, 'title', array('class' => 'form-control'));
            ?>
        </div>

        <div class="col-md-6">
           
            <label for="Category">カテゴリー</label>

            <ul style='list-style: none'>
                <?php
                foreach ($category as $category_parent) {
                    ?>
                <li><div class="checkbox check-info">
                    <?php
                        echo "<input type='checkbox' id='check_category_".$category_parent['id']."'  name='question_categories' value='".$category_parent['id']."' onchange ='addOrDelCategory(".$category_parent['id'].")'  /> <label for='check_category_".$category_parent['id']."' >".$category_parent['title']."</label>";
                    ?>
                </div></li>       
                    
                    <ul style='list-style:none'>
                    <?php
                    $category_parent_id = $category_parent['id'];
                    $category_childs = Category::model()->findAllBySql("select * from category where parent = '$category_parent_id'");
                    foreach ($category_childs as $category_child)
                    {
                        echo "<li><div class='checkbox check-success'><input type='checkbox' id='check_category_".$category_child['id']."' name='question_categories' value='".$category_child['id']."' onchange='addOrDelCategory(".$category_child['id'].")' ><label for='check_category_".$category_child['id']."' >".$category_child['title']."</label></div></li>";
                                 
                        
                    }
                    ?>
                    </ul>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="col-md-6">
            <div id="block-country">
                <? echo CHtml::label('国', '') ?>
                <ul style='list-style: katakana'>
                    <?php 
                        foreach ($countries as $country)
                        {
                            echo "<li><div class='checkbox check-success checkbox-circle'><input type='checkbox' id='check_country_".$country['id']."' name='question_countries' value='".$country['id']."' onchange='addOrDelCountry(".$country['id'].")'  ><label for='check_country_".$country['id']."'>".$country['name']."</label></div></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>

        <div class="col-md-12">

            <?php
                echo CHtml::label("注意", 'Question[note]');   
                echo $form->textField($model, 'note', array('class' => 'form-control'));
            ?>
            <?php
                echo CHtml::label("キーワード", 'Question[keyword]');   
                echo $form->textField($model, 'keyword', array('class' => 'form-control'));
            ?>

            <?php
                $status = array('0' => 'Pending Review', '1' => 'Published');

                echo CHtml::label("状態", 'Question[status]');
                echo $form->dropDownList($model, 'status', $status);
            ?>
            <div id="block-answer">
                <script type="text/javascript" src="/yii1/web/js/ckeditor/ckeditor.js" ></script>    
                <?= CHtml::label("内容 <span style='color:red'>必須</span>", '') ?>
                <?php
                        if(count($answer) > 0)
                        {
                            $i = 1;
                            foreach ($answer as $answers) {
                                ?>             
                                <div id="answer_<?= $answers->id ?>">
                                <label id="label_<?= $answers->id ?>">回答 <?php echo $i; ?></label>
                                <button id="btRemoveA" class="bt-remove-answer" onclick="return removeAnswer(<?php echo $answers->id; ?>,'','', '', $('#answer_<?php echo $answers->id ?>'))"> 削除します </button>     
                                <textarea id="content_answer_<?= $answers->id ?>" class="form-control" rows="10" name="answers[<?= $answers->id ?>]"><?= $answers->content ?></textarea>           
                                
                                <script>
                                    CKEDITOR.replace('content_answer_<?= $answers->id ?>',{                              
                                        contentsCss : '', ///yii1/web/css/interview.css
                                        allowedContent : true,
                                        enterMode : CKEDITOR.ENTER_BR,
                                    });
                                </script>
                                
                                </div>
                                <?php
                                $i++;
                            }
                        }
                        else
                        { ?>
                                <script type="text/javascript">
                                    createAnswer();             
                                </script>
                <?php } ?>

            </div>    
                <button type="button" onclick="createAnswer()">新しい答えを追加</button>
                <br />
            
            
        </div>
        
        </div>

        <br />
        
        <div class="form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', '作ります') : Yii::t('app', '更新'), array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')) ?>
            
        </div>   
        </div>
        
    </div>
</div>
<?php $this->endWidget(); ?>


<?php
    $ids = $model->id;
    $cate_model = QuestionCategory::model()->find("id_question = '".$ids."'");
    $coun_model = QuestionCountry::model()->find("id_question = '".$ids."'");
?>

<script>
    $('document').ready(function(){
        
        <?php if (count($cate_model) > 0) {?>
            var id_category = <?php echo $cate_model->id_category; ?>;
            document.getElementById("check_category_"+id_category).checked = true;

        <?php }; ?>

        <?php if(count($coun_model) > 0){ ?>
            var id_country = <?php echo $coun_model->id_country; ?>;
            document.getElementById("check_country_"+id_country).checked = true;
        <?php } ?>
        
    });
</script>


