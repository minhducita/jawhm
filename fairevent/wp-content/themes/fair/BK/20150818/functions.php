<?php

include_once(dirname(__FILE__) . '/MyTheme_Customize.php');
include_once(dirname(__FILE__) . '/cpt_acf_definitions.php');

function jquery() {
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'jquery');

//固定ページの自動生成
function create_pages_and_setting() {
	if ( 'page' === get_option('show_on_front') ) {
		return;
	} else {
		if ( get_page_by_path('seminar') === null &&  get_page_by_path('school') === null &&  get_page_by_path('faq') === null &&  get_page_by_path('access') === null ) {
			$seminar = wp_insert_post(
				array(
					'post_title'   => 'seminar',
					'post_name'    => 'seminar',
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				)
			);
			$school = wp_insert_post(
				array(
					'post_title'   => 'school',
					'post_name'    => 'school',
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				)
			);
			$faq = wp_insert_post(
				array(
					'post_title'   => 'faq',
					'post_name'    => 'faq',
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				)
			);
			$access = wp_insert_post(
				array(
					'post_title'   => 'access',
					'post_name'    => 'access',
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				)
			);
		}
	}
}
add_action('after_setup_theme', 'create_pages_and_setting');