<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<?php 
	//rj test session destroy
	session_destroy(); 
?>


<?php 
	//edit
	if (isset($_GET['wc'])) {
 	//unset($_GET['wc'];
?>

<div id="wc">
<p id="p_detail"><span style="color: red;">コメントの投稿に失敗しました。</span><br/>入力した画像内のテキストが一致していません。</p>
</div>

<?php
	}
?>


<?php
	//edit
	session_start();
	if (isset($_GET['y'])) {
	//unset($_GET['y'];
?>

<div id="comment_posted">
	<p id="p_big">コメントの投稿が完了しました。</p>
	<p id="p_detail">いただいたコメントは内容の承認後、一覧に表示されます。<br/>
	恐れ入りますが、今しばらくお待ちください。</p>
</div>

<?php
	}
?>


<div id="comments" class="comments-area"  >

	<?php // You can start editing here -- including this comment! ?>
	<a href="#" class="btn_com_d"><img src="<?php echo network_home_url(); ?>wp-content/uploads/2014/09/imgComment.jpg" /></a>
	
		<?php 
	
		$comment_args   = array( 'title_reply'=>'',

		'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' =>
			'<p class="comment-form-author"><label for="author">' . __( '名前', 'domainreference' ) .' '.( $req ? '<span class="required">*</span>' : '' ). '</label> 
			 
			<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' /></p>',

		  'email' =>
			'<p class="comment-form-email"><label for="email">' . __( 'メールアドレス', 'domainreference' ) . ' '.( $req ? '<span class="required">*</span>' : '' ) .'</label> 
			
			<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' required/></p>',

		  'url' =>'' ) ),

			'comment_field' => '<p>' .

						'<label for="comment">' . __( 'メッセージ' ) . '</label>' .

						'<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" ></textarea>' .

						'</p>',

			'comment_notes_after' => '',
				'label_submit' => 'コメントする',
				
			);
	
	
	comment_form($comment_args); ?>
	



	
	
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
		</h2>
		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'twentytwelve_comment', 'style' => 'ol' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?>
			</div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'twentytwelve' ); ?></p>
		
		<?php endif; ?>

	<?php endif; // have_comments() ?>


</div><!-- #comments .comments-area -->