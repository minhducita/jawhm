<?php 
if(!function_exists("create_custom_post_type")){
	function create_custom_post_type(){
		$label = array(
			'name'=> 'メンバーＴＯＰ',
			'singular_name'=> 'メンバーＴＯＰ'
		);
		$args = array(
			'labels'=>$label,
			"description"=>'show Post api',
			'support'=>array(
				'title',
				'editor',
				'excerpt',
				'author',
				'thumbnail',
				'comments',
				'trackbacks',
				'revisions',
				'custom-fields'
			),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 3,	
			'menu_icon' => '',
			'can_export' => true,	
			'has_archive' => true,
			'exclude_from_search' => false,	
			'publicly_queryable' => true,
			'capability_type' => 'post'
		);
		register_post_type('post_api',$args);
	}
	add_action('init','create_custom_post_type');
}
