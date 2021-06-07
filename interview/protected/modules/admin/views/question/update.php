<div class="question-update">
    <h1>更新 質問: <?php echo ' ' . $model->title ?></h1>   
    <?php        
        echo $this->renderPartial('jn_form', array(
            'model' => $model, 
            'category_parents' => $category_parents, 
            'countries' => $countries
        ));
    ?>
</div>
