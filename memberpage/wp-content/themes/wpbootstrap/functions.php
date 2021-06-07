<?php 

// WordPressの管理画面ログインURLを変更する
define( 'LOGIN_CHANGE_PAGE', 'jalogin.php' );
add_action( 'login_init', 'login_change_init' );
add_filter( 'site_url', 'login_change_site_url', 10, 4 );
add_filter( 'wp_redirect', 'login_change_wp_redirect', 10, 2 );
// 指定以外のログインURLは403エラーにする
if ( ! function_exists( 'login_change_init' ) ) {
  function login_change_init() {
    if ( !defined( 'LOGIN_CHANGE' ) || sha1( 'ma2m32AX2kW29321' ) != LOGIN_CHANGE ) {
      status_header( 403 );
      exit;
    }
  }
}
// ログイン済みか新設のログインURLの場合はwp-login.phpを置き換える
if ( ! function_exists( 'login_change_site_url' ) ) {
  function login_change_site_url( $url, $path, $orig_scheme, $blog_id ) {
    if ( $path == 'wp-login.php' &&
      ( is_user_logged_in() || strpos( $_SERVER['REQUEST_URI'], LOGIN_CHANGE_PAGE ) !== false ) )
      $url = str_replace( 'wp-login.php', LOGIN_CHANGE_PAGE, $url );
    return $url;
  }
}
// ログアウト時のリダイレクト先の設定
if ( ! function_exists( 'login_change_wp_redirect' ) ) {
  function login_change_wp_redirect( $location, $status ) {
    if ( strpos( $_SERVER['REQUEST_URI'], LOGIN_CHANGE_PAGE ) !== false )
      $location = str_replace( 'wp-login.php', LOGIN_CHANGE_PAGE, $location );
    return $location;
  }
}





add_filter( 'show_admin_bar', '__return_false' );

 // The site name
function site_name() {
	return '/blog/';
}


/* change image url in posts */

function domain_shortcode() {
    if ( preg_match( '|^https?://[^/]+|', get_option( 'home' ), $m ) ) {
        $domain = $m[0] . '/blog';
    } else {
        $domain = '';
    }
    return $domain;
}
add_shortcode( 'domain', 'domain_shortcode' );

/* end of change image url in posts */
/* -------------------------------- */
 
 
/**
 * Image Thumbnails
 */
function image_thumbnail($img_link, $container_height, $container_width, $size_type, $view) {
	include(locate_template('../twentytwelve/thumbnail_formula.php'));
	
	return $thumb_css;
}
/**
 * End of Image Thumbnails
 */

/* redirect after posting comment */
add_filter('comment_post_redirect', 'redirect_after_comment');
function redirect_after_comment($location)
{
	global $wpdb;
	
	$newurl = substr($location, 0, strpos($location, "#comment")); //remove repeat values on url
	return $newurl . '?y=p/#comment_posted';
}
/* end of redirecting after posting comment */
/* ---------------------------------------- */

/* Site Color, Font Color and Header Images */
function custom_site_settings($b_id) {
	$triangle_color = array();
	$font_color = array();
	$header_image = array();
	
	include(locate_template('../twentytwelve/triangle_title_setting.php'));
	
	// check values
	$t_color = $triangle_color[$b_id];
	$f_color = $font_color[$b_id];
	
	if ($triangle_color[$b_id] == '') {
		$t_color = $triangle_color[0];
	}
	if ($font_color[$b_id] == '') {
		$f_color = $font_color[0];
	}
	
	return array($t_color, $f_color);
}
/* ---------------------------------------- */


/* remove special characters from tag link */

function tag_link( $the_link ) {
	$the_link2 = str_replace(' ', '-', $the_link);
	$the_link2 = str_replace("'", "", $the_link2);
	
	return $the_link2;
}

/* --------------------------------------- */


/* Site Header Images */
function site_header_img($site_name, $b_id, $p_id) {
	include(locate_template('header-image-settings.php'));
	
	if ($header_bg == '') {
		$header_bg = $default_header_bg;
	}
	
	$header_img = '<img src="' . $site_name . $header_bg . '">';
	
	return $header_img;
}
/* ------------------ */


/* Triangle Name */
function triangle_name($b_id, $p_id) {
	$s_id = array();
	$s_name = array();
	$triangle_name = array();
	
	include(locate_template('../twentytwelve/triangle_title_setting.php'));
	
	$s_count = 0;
	$the_name = '';
	
	if ($b_id <= 6) { // English Blogs
		if ($b_id == 2) { // Australia Blog
			$s_list = $australia_school;
		}
		if ($b_id == 3) { // Canada Blog
			$s_list = $canada_school;
		}
		if ($b_id == 4) { // New Zealand Blog
			$s_list = $new_zealand_school;
		}
		if ($b_id == 5) { // United Kingdom Blog
			$s_list = $united_kingdom_school;
		}
		if ($b_id == 6) { // World Wide Blog
			$s_list = $world_school;
		}
		
		foreach ($s_list as $k => $v) {
			if ($k % 2 == 0) {
				$s_id[] = ((int) $v);
			}
			else {
				$s_name[] = $v;
			}
		}
		
		foreach ($s_id as $s_id2) {
			if ($s_id2 == $p_id) {
				$the_name = $s_name[$s_count];
				break;
			}
			
			$s_count++;
		}
		
		unset($s_id);
		unset($s_name);
	} else { // Japan Blog
		
		
		$the_name = $triangle_name[$b_id - 7];
	}
	
	return $the_name;
}
/* ------------- */

 
/**
 * Replace [No Image] Image
 */
function catch_that_image($site_name, $b_id, $p_id) {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
		$school_no_img = '';
		include(locate_template('../twentytwelve/no_image.php'));
		
		if ($default == 0) {
			if ($school_no_img == '') {
				$school_no_img = $default_img;
			}
		}
		if ($default == 1) {
			$school_no_img = $default_img;
		}
			
		$first_img = $site_name . $school_no_img;
		
		//$first_img = $first_img . "'); background-size: 100% 285%;";
  }
	
	$second_img = str_replace('[domain]', $site_name, $first_img);
	
	$first_img = $second_img;
	
  return $first_img;
}
/**
 * End of Replacing [No Image] Image
 */
 
 
if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<?php if ( '0' != $comment->comment_approved ) : ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<ul>
				<?php 
					echo '<li>'.get_avatar( $comment, 44 ).'</li>';
					printf( '<li><cite><b class="fn">%1$s</b> %2$s</cite></li>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? /*'<span>' . __( 'Post author', 'twentytwelve' ) . '</span>'*/'' : ' '
					); 
				?>
				</ul>
					<div class="inner_comment"> 
						<section class="comment-content comment">
							<?php comment_text(); ?>
							<?php //edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
						</section><!-- .comment-content -->
			
				<?php
					/* printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);  */
						printf( '<time datetime="%2$s">%3$s</time>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							/* translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
						);
				?>
					</div>
			</header><!-- .comment-meta -->
	<?php endif; ?>
			<?php
					/* printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);  */
					
			?>
			
			
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<!-- <article id="comment-<?php comment_ID(); ?>" class="comment">
					<p class="comment-awaiting-moderation"><?php _e( 'コメント1件を受け付けました。承認後ページに表示されます。', 'twentytwelve' ); ?></p> -->
			<?php endif; ?>

			

			<!--div class="reply">
				<?php //comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;




function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> 次の記事', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( '前の記事 <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

/* "a very generalized solution for array sorting" by Jon */
/* http://stackoverflow.com/questions/96759/how-do-i-sort-a-multidimensional-array-in-php */

function make_comparer() {
    // Normalize criteria up front so that the comparer finds everything tidy
    $criteria = func_get_args();
    foreach ($criteria as $index => $criterion) {
        $criteria[$index] = is_array($criterion)
            ? array_pad($criterion, 3, null)
            : array($criterion, SORT_ASC, null);
    }

    return function($first, $second) use (&$criteria) {
        foreach ($criteria as $criterion) {
            // How will we compare this round?
            list($column, $sortOrder, $projection) = $criterion;
            $sortOrder = $sortOrder === SORT_DESC ? -1 : 1;

            // If a projection was defined project the values now
            if ($projection) {
                $lhs = call_user_func($projection, $first[$column]);
                $rhs = call_user_func($projection, $second[$column]);
            }
            else {
                $lhs = $first[$column];
                $rhs = $second[$column];
            }

            // Do the actual comparison; do not return if equal
            if ($lhs < $rhs) {
                return 1 * $sortOrder; // original: return -1 * $sortOrder;
            }
            else if ($lhs > $rhs) {
                return -1 * $sortOrder; // original: return 1 * $sortOrder;
            }
        }

        return 0; // tiebreakers exhausted, so $first == $second
    };
}

/* end of array sorting */
/* -------------------- */


/**
 * Call layout-php.php
 * by Joseph B.
 */
wp_enqueue_style('dynamic-css',
                 admin_url('admin-ajax.php').'?action=dynamic_css',
                 $deps,
                 $ver,
                 $media);
function dynaminc_css() {
  require(get_template_directory().'/layout-php.php');
  exit;
}
add_action('wp_ajax_dynamic_css', 'dynaminc_css');
add_action('wp_ajax_nopriv_dynamic_css', 'dynaminc_css');

/**
 * end of layout-php.php call
 * --------------------------
 */

/* Numbered Pagination */
function numeric_pagination($prev_text, $next_text) {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		//$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		//$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		$prev_link = get_previous_posts_link();
		$prev_link2 = str_replace('Previous Page', $prev_text, $prev_link);
		printf( '<li>%s</li>' . "\n", $prev_link2 );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		$next_link = get_next_posts_link();
		$next_link2 = str_replace('Next Page', $next_text, $next_link);
		printf( '<li>%s</li>' . "\n", $next_link2 );

	echo '</ul></div>' . "\n";

}
/* End of Numbered Pagination */
/* -------------------------- */


function do_googleMaps($atts, $content = null) {
 extract(shortcode_atts(array(
 "width" => '640',
 "height" => '480',
 "src" => ''
 ), $atts));
 return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed" ></iframe>';
}
add_shortcode("googlemap", "do_googleMaps");




/* comment validation */

function comment_validation_init() {
if(is_single() && comments_open() ) { ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('#commentform').validate({
 
rules: {
  author: {
    required: true,
    minlength: 2
  },
 
  email: {
    required: true,
    email: true
  },
 
  comment: {
    required: true,
    minlength: 2
  }
},
 
messages: {
  author: "この項目は必須項目です。",
  email: "入力したメールアドレスの形式が不正、または未入力です。",
  comment: "この項目は必須項目です。"
},
 
errorElement: "div",
errorPlacement: function(error, element) {
  element.before(error);
}
 
});
});
</script>
<?php
}
}
add_action('wp_footer', 'comment_validation_init');

/* end of comment validation */
/* ------------------------- */


/* Exclude pages form search */
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');
/* end of excluding pages from search */
/* ---------------------------------- */


?>





