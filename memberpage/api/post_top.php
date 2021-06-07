<?php
define('WP_USE_THEMES', false);
require(dirname(dirname(__FILE__)) . '/wp-load.php');
function get_excerpt($content){
	$the_excerpt = $content; //Gets post_content to be used as a basis for the excerpt
	$excerpt_length = 35; //Sets excerpt length by word count
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
	$words = explode(' ', $the_excerpt, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '…');
		$the_excerpt = implode(' ', $words);
	endif;
	$the_excerpt = '<p>' . strip_tags($the_excerpt). '</p>';
	return $the_excerpt;
}
$limit 		= ($_GET['perpage'])?$_GET['perpage']:3;
$posttype 	= ($_GET['posttype'])?$_GET['posttype']:"post";

$query = "SELECT post_title,ID,post_content,post_date,post_excerpt FROM wp_posts WHERE post_type='".$posttype."' AND post_status = 'publish' ORDER BY ID DESC limit ".$limit;
$result = $wpdb->get_results($query);
$repone = array("success"=>'error',"data"=>"");
if(!empty($result)){
	foreach($result as $k => $v){
		if(!empty($result[$k]->post_excerpt)){
			$result[$k]->post_excerpt = htmlentities($result[$k]->post_excerpt,ENT_QUOTES | ENT_IGNORE, "UTF-8");
		}else{
			$result[$k]->excerpt = get_excerpt($result[$k]->post_content);
			$result[$k]->excerpt = htmlentities($result[$k]->excerpt,ENT_QUOTES | ENT_IGNORE, "UTF-8");
		}
		$result[$k]->url =  get_permalink($v->ID);
		$result[$k]->url_image = get_the_post_thumbnail($v->ID,'thumbnail');
		$result[$k]->post_content = htmlentities($result[$k]->post_content);
	}
	$repone = array(
		'success'=>'ok',
		'data'	 =>$result
	);
}
echo json_encode($repone);exit;
?>
