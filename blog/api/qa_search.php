<?php
error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );
$keyword = isset($_POST['keyword']) ? strtolower($_POST['keyword']) : '';
if( !$keyword || $keyword === ''){
	return;
}

//$keyword = $_GET['keyword'];
require(dirname(dirname(__FILE__)) . '/wp-load.php');

function get_first_image($str_img = '', $urlblog = '') {
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $str_img, $matches);
	$first_img = $matches[1][0];

	if(preg_match('/[domain]/',$first_img)){
		$url = explode('/',$urlblog);
		$urlf = 'https://jawhm.bluecloudvn.com/blog/'.$url[4];
		$first_img = str_replace('[domain]',$urlf,$first_img);
	}

	if (empty($first_img)) {
		$first_img = '';
	}
	return $first_img;
}

$keyword = trim($keyword);

if( preg_match('/、/',$keyword)){
	$arr_key = explode( '、',$keyword);
}else if( preg_match('/　/',$keyword)){
	$arr_key = explode( '　',$keyword);
}else if( preg_match('/ /',$keyword)){
	$arr_key = explode(' ',$keyword);
} else if( preg_match('/,/',$keyword)){
	$arr_key = explode(',',$keyword );
}

$where = "AND 1=1 AND ";

if(!is_array($arr_key)){
	$where .= "(wp_16_posts.post_title LIKE '%$keyword%' OR wp_16_posts.post_content LIKE '%$keyword%') ";
}
else {
	$count = count($arr_key);
	$where .= "(";
	foreach($arr_key as $k => $v){
		$v = trim($v);
		$where .= "((wp_16_posts.post_title LIKE '%$v%') OR (wp_16_posts.post_content LIKE '%$v%')) ";
		if( $count > 1 && $k < ($count-1) )
	    	$where .= "AND ";
		
	}
	$where .= ") ";
}

$querystr = "
    SELECT wp_16_posts.ID, wp_16_posts.post_title, wp_16_posts.post_content, wp_16_posts.post_author, wp_16_posts.post_date, wp_16_posts.guid, wp_16_postmeta.meta_value 
    FROM wp_16_posts, wp_16_postmeta 
    WHERE (wp_16_posts.ID = wp_16_postmeta.post_id AND wp_16_postmeta.meta_key LIKE 'permalink') 
    AND wp_16_posts.post_status = 'publish' 
	AND wp_16_posts.post_type = 'post' 
";
$querystr .= $where;
$querystr .= "
	GROUP BY wp_16_posts.ID 
	ORDER BY wp_16_posts.post_date DESC 
	LIMIT 0,30
 ";

$pageposts = $wpdb->get_results($querystr, OBJECT);
if($pageposts){
	$results = array();

	if ($pageposts){
		foreach($pageposts as $post){
			$results[$post->ID]['post_id']    = $post->ID;
			$results[$post->ID]['post_title'] = mb_substr($post->post_title, 0, 50);
			$results[$post->ID]['post_content'] = mb_substr(strip_tags($post->post_content), 0, 70);
			$results[$post->ID]['post_date']  = $post->post_date;
			$results[$post->ID]['post_author']  = $post->post_author;

			//$url = str_replace("jawhm.bluecloud.tokyo", "jawhm.bluecloudvn.com", $post->meta_value);
			$results[$post->ID]['url']  = $post->meta_value;
			$results[$post->ID]['thump_images'] = get_first_image($post->post_content, $post->meta_value);

			//Bgin get category
			$eng = array('Australia', 'Canada', 'Europe', 'Newzealand', 'World', );
			$piece = explode('/', $url);
			$blog_name_eng = ucfirst($piece[4]);
			$p_id = $piece[6];
			foreach($eng as $eng1) {
				if($blog_name_eng == $eng1) {
					$blog_name = $piece[5];
					$p_id = $piece[7];
					break;
				}
			}
			$guid = $post->guid;
			$guid = explode('//', $guid);
			$aa = explode('.', $guid[1]);
			///echo $blog_id."----";
			$blog_id = $aa[0];

			if($blog_id > 6){
				$blog_name = triangle_name($blog_id, 0);
				if ($blog_name == '') {
					$blog_name = get_bloginfo('name');
				}
			}
			$setting = custom_site_settings($blog_id);

			$colorz = $setting[0];

			$results[$post->ID]['category'] = strtoupper($blog_name);
			$results[$post->ID]['s_color'] = $colorz;
		}
	}
	echo json_encode($results); exit;
}
else {
	echo json_encode(array()); exit;
}

?>