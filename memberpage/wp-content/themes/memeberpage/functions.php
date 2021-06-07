<?php
define('THEME_URL',get_template_directory()); // ???ng d?n themes. l?u y ph?i la ???ng d?n tuy?t ??i
define('THEME_URI',get_template_directory_uri()); // ???ng d?n themes. l?u y ph?i la ???ng d?n tuy?t ??i
define('CORE',THEME_URL."/core");
require_once(CORE."/init.php");

if(!function_exists('member_theme_setup')){
	function memberpage_theme_setup(){
		// add menubar
		register_nav_menu('primary-menu',__('Primary Menu','memberpage'));
	}
	add_action('init','memberpage_theme_setup');
}
if(!function_exists('memberpage_style')) {
	function memberpage_style(){
		wp_register_style('style',THEME_URI."/style.css");
        wp_enqueue_style ('style');
		
		//$detect = new Mobile_Detect;
		//$detect_tool = new Mobile_Detect_Tool; // tool chrome
		//$check_mobile = $detect_tool->computer_use();
		//if($detect -> isMobile || $check_mobile === false){
			wp_register_style('style_mobile',THEME_URI."/css/style_mobile.css");
			wp_enqueue_style ('style_mobile');
		//}
		
		wp_register_style('new_contents',THEME_URI."/css/new_contents.css");
        wp_enqueue_style ('new_contents');
		
		wp_register_style('cal_module',THEME_URI."/css/cal_module.css");
        wp_enqueue_style ('cal_module');
		
		wp_register_style('menu',THEME_URI."/css/menu.css");
        wp_enqueue_style ('menu');
		
		wp_register_script ('jQuery',THEME_URI."/js/jquery-1.12.1.min.js");
		wp_enqueue_script  ('jQuery');
		
		wp_register_script ('memberpagejs',THEME_URI."/js/memberpage.js");
		wp_enqueue_script  ('memberpagejs');
	}
	add_action('wp_enqueue_scripts','memberpage_style');
}
if(!function_exists('memberpage_logo')) {
	// get logo
	function memberpage_logo(){
		$header_img = get_header_image();
		if ($header_img) {
			echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home"><img src="' . esc_url($header_img) . '" height="' . esc_attr(get_custom_header()->height) . '" width="' . esc_attr(get_custom_header()->width) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>' . "\n";
		}else{
			echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home">' . "\n";
			echo '<h1 class="logo-name">' . esc_attr(get_bloginfo('name')) . '</h1>' . "\n";
			echo '<h2 class="logo-desc">' . esc_attr(get_bloginfo('description')) . '</h2>' . "\n";
			echo '</a>';
		} 
	}
}
if(!function_exists("memberpage_banner")){
	function memberpage_banner(){
		$page 	= @get_page();
		if($page->post_name == 'memberservice'){
			$image = "<img src='".THEME_URI."/images/banner-mem.png' id='top-mainimg' height='170' width='970'>";
		}else{
			$image = "<img src='".THEME_URI."/images/banner_top.png' id='top-mainimg' height='170' width='970'>";
		}
		return $image;
	}
}
if(!function_exists("register_menu")){
	function register_my_menus() {
		register_nav_menus(
			array(
				'menu-left' => __( 'Menu Left' ),
			)
		);
	}
	add_action( 'init', 'register_my_menus' );
}
if(!function_exists('member_menu')){
     function member_menu($menu){
         $menu_fix = array(
             'theme_location' => $menu,
             'container' => 'nav',
             'container_class' => $menu,
             'items_wrap'      => '<ul id="%1$s" class="%2$s nav navbar-nav navbar-right sf-menu">%3$s</ul>',
         );
         wp_nav_menu($menu_fix);
     }
}
/*paging_nav*/
if(!function_exists('paging_nav')){
	function paging_nav() {
		global $wp_query, $wp_rewrite;
		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links(array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $wp_query->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( 'Previous', 'lynam' ),
			'next_text' => __( 'Next', 'lynam' ),
		) );
		if ($links) :?>
			<div class="clear"></div>
			<nav class="navigation paging-navigation" role="navigation">
				<div class="pagination loop-pagination">
					<?php echo $links; ?>
				</div><!-- .pagination -->
			</nav><!-- .navigation -->
		<?php
		endif;

	}
}
if(!function_exists("query_article")){
	function query_article($query){
		if($query->is_archive){
			$query->set('post_type_not_in','post_api');
		}
	}
}
add_filter('pre_get_posts','query_article');
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}
?>