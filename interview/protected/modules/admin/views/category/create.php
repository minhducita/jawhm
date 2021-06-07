<?php
$this->breadcrumbs = array('Category' => array('category/index'), 'Create',);
?>

<div class="category-create">

    <h1>カテゴリーを作成します</h1>   
    <?php
    echo $this->renderPartial('_form', array(
        'model' => $model, 'parent' => $parent,
    ))
    ?>

</div>
