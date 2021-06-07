<div class="question-create">
    <h1>Create Question: </h1>   
    <?php
        echo $this->renderPartial('jn_form', array(
            'model' => $model,
            'category_parents' => $category_parents,
            'countries' => $countries
        ))
    ?>
</div>
