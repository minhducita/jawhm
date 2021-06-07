<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mailsystem/mem/php/fnc_dbopen.php';
require(dirname(__FILE__) . '/_includes/functions.php');
require(dirname(__FILE__) . '/_includes/FeedBack.php');
if (isAjaxRequest()) {
    $feedback = new FeedBack();
    $category = @$_POST['category'];
    $sort = 'RAND()';
    if (!empty($_POST['sort'])) {
        if (isset($_POST['sort']['type']) && in_array(strtoupper($_POST['sort']['type']), array('RAND', 'ASC', 'DESC'))) {
            $type = strtoupper($_POST['sort']['type']);
            if ($type == 'RAND') {
                $sort = 'RAND()';
            } else {
                if (isset($_POST['sort']['column']) && in_array($_POST['sort']['column'], array('createdDate', 'id'))) {
                    $column = $_POST['sort']['column'];
                    $sort = "`{$column}` {$type}";
                }
            }
        }
    }
    $feedbackResult = $feedback->find('`onShow` = :onShow AND `category_name`= :cat_name ORDER BY '.$sort.' LIMIT 20', array(':onShow'=>1, ':cat_name'=> $category));
    if (!empty($feedbackResult)) {
        ?>
        <div class="als-viewport">
                <?php
                foreach($feedbackResult as $i => $item) {
                ?>
                    <div class="als-item">
                        <p><?php  echo $item['comment']?></p>
                    </div>
                <?php
                }
                ?>
            </div>
    <?php
    }}
die;
?>