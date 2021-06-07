<?php
	define('WP_USE_THEMES', false);
	require(dirname(dirname(__FILE__)) . '/wp-load.php');
	$select = "SELECT terms.";
	//$list = $wpdb->get_results("SELECT * FROM wp_terms");
	$location_menu= $_GET["locationMenu"];
	$repone = array("success"=>'error',"data"=>"");
	if(!empty($location_menu)){
		$select = "SELECT col4.ID, col4.post_title";
		$from = " FROM wp_terms as col1,
				  wp_term_taxonomy as col2, 
				  wp_term_relationships as col3 , 
				  wp_posts as col4 ";
		$where = " WHERE 
			col1.slug = '".$location_menu."' and
			col1.term_id = col2.term_id and
			col2.term_taxonomy_id = col3.term_taxonomy_id and
			col3.object_id = col4.ID
		";
		$order_by = " ORDER BY col4.menu_order ASC";
		$groupby  = ' GROUP BY col4.ID ';
		$repone["data"] = $wpdb->get_results($select.$from.$where.$groupby.$order_by);
		if(!empty($repone["data"])){
			$where_in .= "";
			foreach ($repone["data"] as $k =>$item){
				$where_in .= $item->ID.",";
			}
			$where_in = "(".trim($where_in,",").")";
			$query   = "select post_id,meta_key,meta_value from wp_postmeta WHERE post_id IN $where_in";
			$listpostmeta = $wpdb->get_results($query);
			$metapost = "";
			foreach($listpostmeta as $item){
				$metapost[$item->post_id][$item->meta_key] = $item->meta_value;	
			}
			foreach ($repone["data"] as $k =>$item){
				
				if($metapost[$item->ID]['_menu_item_object']== "custom"){
					// custom link
					$repone["data"][$k]->post_title = $item->post_title;
					$repone["data"][$k]->perlink = $metapost[$item->ID]['_menu_item_url'];
				}else{
					//not custom link
					$post = get_post($metapost[$item->ID]['_menu_item_object_id']);
					$repone["data"][$k]->post_title = !empty($item->post_title)?$item->post_title:$post->post_title;
					$repone["data"][$k]->perlink  = get_page_link($metapost[$item->ID]['_menu_item_object_id']);
				}
			}
			$repone['success'] = 'ok';
		}
	}
	echo json_encode($repone);exit;	
?>