<?php
/* Short and sweet */
require($_SERVER['DOCUMENT_ROOT'].'/api/core/helpers/helpers.php');
require($_SERVER['DOCUMENT_ROOT'].'/api/core/base/Api.php');
$post = array();
try {
	$post = get($_SERVER['HTTP_HOST'].'/memberpage/api/post.php');
    $post = json_decode($post, true);
    respone($post);
} catch (Exception $e) {
    respone(array(), 500);
}
?>
