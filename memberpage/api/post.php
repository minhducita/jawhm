<?php
define('WP_USE_THEMES', false);
require(dirname(dirname(__FILE__)) . '/wp-load.php');
?>
<?php
$args = array(
        'post_type' => 'post',
        'orderby' => 'date',
    );
$myposts = query_posts($args);
die(json_encode($myposts));
?>
