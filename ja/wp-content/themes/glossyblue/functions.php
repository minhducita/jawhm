<?php
/**
 functions and definitions
 */

// Enable menu
add_theme_support( 'menus' );

// ADD ID TO NAVIGATION LINKS
//----------------------------
add_filter('next_posts_link_attributes', 'next_posts_link_id');
add_filter('previous_posts_link_attributes', 'previous_posts_link_id');

function next_posts_link_id() {
    return 'class="next-posts-link"';
}

function previous_posts_link_id() {
    return 'class="previous-posts-link"';
}

// GET CONTENT WITH HTML FORMAT
//------------------------------
function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '')
{
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

// RETURN TITLE WITHOUT COUNTRY
//-----------------------------
function remove_country_name($countryname,$title)
{
	$title_without_countryname = str_replace($countryname, '',$title);
	//replace japanese space by normal space
	$title_without_countryname = str_replace("　", " ", $title_without_countryname);
	//remove whitespace from the beginning and end
	$title_without_countryname = trim($title_without_countryname, " ");
	return $title_without_countryname;
}

// RETURN TITLE WITHOUT GENDER
//-----------------------------
function remove_gender_name($title)
{
	//construct all possibility array
	$list_to_remove = array('女性/男性','男性/女性','女性・男性', '男性・女性', '男性', '女性');
	$title_without_gender = str_replace($list_to_remove, '', $title);
	
	//replace japanese space by normal space
	$title_without_gender = str_replace("　", " ", $title_without_gender);
	
	//remove whitespace from the beginning and end
	$title_without_gender = trim($title_without_gender, " ");
	
	//remove the parentheses
	$title_without_gender = str_replace(array('（）','（ ）'), '', $title_without_gender);
	
	//remove extra whitespace (more than 2 in the row)
	//$title_without_gender = preg_replace('/\s{2,}/', ' ', $title_without_gender);
	
	return $title_without_gender;
}
?>