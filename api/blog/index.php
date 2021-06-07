<?php
/* Short and sweet */
require($_SERVER['DOCUMENT_ROOT'].'/api/core/helpers/helpers.php');
require($_SERVER['DOCUMENT_ROOT'].'/api/core/base/Api.php');
$blog_post = array();
if (isset($_GET['blog_id'])) {
    try {
        $blog_id = (int) $_GET['blog_id'];
        $blog_post = get($_SERVER['HTTP_HOST'].'/blog/api/', array('blog_id' => $blog_id));
        $blog_post = json_decode($blog_post, true);
        respone($blog_post);
    } catch (Exception $e) {
        respone(array(), 500);
    }
} else {
    respone(array(), 404, null);
}
?>
