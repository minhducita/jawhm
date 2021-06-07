<?php
require(dirname(__FILE__).'/../_includes/functions.php');
require(dirname(__FILE__).'/../_includes/Category.php');
require(dirname(__FILE__).'/../_includes/FeedBack.php');
$feedModel = new FeedBack;
$categoryArr  = $feedModel->getAllCategories();
if (!empty($categoryArr)) {
    foreach ($categoryArr as $item) {
        $category[$item['category_name']] = $item['category_name'];
    }
}
$errors    = array();
if (strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $action = isset($_POST['act']) ? strtolower($_POST['act']) : '';
    unset($_POST['act']);
    $params = $_POST;

    switch ($action) {
        case 'search':
            $result = array();
            $request_search = array();
            $_keyword = '';
                $_keyword = $keywords = $params['keyword'];
                unset($params['keyword']);
                $keywords = rtrim($keywords);
                $keywords = str_replace(',', ' ', $keywords);
                $keywords = str_replace('  ', ' ', $keywords);
                $keywords = htmlspecialchars($keywords);
                $keywords = explode(' ', $keywords);
                if (count($keywords) > 1) {
                    foreach ($keywords as $keyword) {
                        $params['comment'][] = rtrim($keyword);
                    }
                } else {
                    $params['comment'] = $keywords[0];
                }
                $result = $feedModel->search($params);

            $request_search = $params;
            $request_search['keyword'] = $_keyword;
        break;

        case 'create':
            if (isAjaxRequest()) {
            if ($params['comment'] == '') {
                $errors['comment'] = 'Comment can not be blank.';
            }
            if (isset($params['cat_other']) && $params['cat_other'] == '') {
                $errors['category'] = 'Category Other can not be blank.';
            } elseif (isset($params['category_name']) && $params['category_name'] == '') {
                $errors['category'] = 'Category can not be blank.';
            }
            if (empty($errors)) {
                if (!empty($params['comment'])) {
                    $params['comment'] = str_replace("\r\n", "<br/>", $params['comment']);
                }
                if(isset($params['cat_other'])) {
                    $params['category_name'] = $params['cat_other'];
                }
                if ($feedModel->insert($params)) {
                    $request_create = array();
                        echo json_encode(array('status' => 1, 'act' => 'create'));exit;
                }  else {
                        echo json_encode(array('status' => 0, 'act' => 'create'));
                    $errors['create'] = 'Have error!Please try again.';
                        exit;
                }
            } else {
                $request_create = $params;
            }
            }


        break;

        case 'update':
            if (isAjaxRequest()) {
            if ($params['comment'] == '') {
                $errors['comment'] = 'Comment can not be blank.';
            }

            if (isset($params['category_name'])){
                if($params['category_name'] == ''){
                    $errors['category'] = 'Category can not be blank.';
                }
            }
            if (empty($errors)) {
                if (!empty($params['comment'])) {
                    $params['comment'] = str_replace("\r\n", "<br/>", $params['comment']);
                }
                if ($feedModel->update($params)) {
                        echo json_encode(array('status' => 1, 'act' => 'update'));exit;
                }  else {
                        echo json_encode(array('status' => 0, 'act' => 'update'));
                    $errors['create'] = 'Have error!Please try again.';
                        exit;
                }
            }
            }
        break;
        case 'find_by_id':
            if (isAjaxRequest()) {
                if (isset($_POST['id'])) {
                    $result = $feedModel->find('id=:id', array(':id'=> (int) $_POST['id']));
                    if (!empty($result[0])) {
                    echo json_encode($result[0]);exit;
    }
                }
            }
        break;
    }

}

