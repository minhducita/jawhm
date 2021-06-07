<?php

/**

 * The default template for displaying content

 *

 * Used for both single and index/archive/search.

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */

?>



	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>

		<div class="featured-post">

			<?php _e( 'Featured post', 'twentytwelve' ); ?>

		</div>

		<?php endif; ?>

		<div class="entry-header-div">

			<header class="entry-header">

				<?php if ( ! post_password_required() && ! is_attachment() ) :

					the_post_thumbnail();

				endif; ?>



				<?php //if ( is_single() ) : ?>

				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

				<?php

					$eng = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

					$jap = array('（日）', '（月）', '（火）', '（水）', '（木）', '（金）', '（土）');



					for ($x=0; $x<=count($eng); $x++) {

						if (get_post_time('l') == $eng[$x]) {

							$det = $jap[$x];

							break;

						}

					}



					echo '<span class="post_date">' . get_post_time('Y年m月d日') . ' ' . $det . '</span>';

				 ?>

				<?php //else : ?>

				<!-- <h1 class="entry-title">

					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>

				</h1> -->

				<?php //endif; // is_single() ?>

				<?php if ( comments_open() ) : ?>

					<div class="comments-link">

						<?php //comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>

					</div><!-- .comments-link -->

				<?php endif; // comments_open() ?>

			</header><!-- .entry-header -->

		</div>



		<?php if ( is_search() ) : // Only display Excerpts for Search ?>

		<div class="entry-summary">

			<?php the_excerpt(); ?>

		</div><!-- .entry-summary -->

		<?php else : ?>

		<div class="entry-content" style="clear: both;">

			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>

		</div><!-- .entry-content -->

		<?php endif; ?>



		<br />



		<footer class="entry-meta">

			<?php //twentytwelve_entry_meta(); ?>

			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>

			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>

				<div class="author-info">

					<div class="author-avatar">

						<?php

						/** This filter is documented in author.php */

						$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );

						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );

						?>

					</div><!-- .author-avatar -->

					<div class="author-description">

						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>

						<p><?php the_author_meta( 'description' ); ?></p>

						<div class="author-link">

							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">

								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>

							</a>

						</div><!-- .author-link	-->

					</div><!-- .author-description -->

				</div><!-- .author-info -->

			<?php endif; ?>

		</footer><!-- .entry-meta -->



<ul style="margin-bottom: 50px;">

              <li style="float:left; padding-right: 10px">
              		<script>window.twttr = (function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0],
						    t = window.twttr || {};
						  if (d.getElementById(id)) return t;
						  js = d.createElement(s);
						  js.id = id;
						  js.src = "https://platform.twitter.com/widgets.js";
						  fjs.parentNode.insertBefore(js, fjs);
						 
						  t._e = [];
						  t.ready = function(f) {
						    t._e.push(f);
						  };
						 
						  return t;
						}(document, "script", "twitter-wjs"));
					</script>
			    	<a class="twitter-share-button" href="<?php echo get_permalink();?>" data-size="default" data-lang="ja">Tweet</a>
              </li>

              <li style="float:left;">

<div class="fb-like fb_iframe_widget" data-width="150" data-layout="button_count" data-show-faces="false" data-send="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=238241179566629&amp;href=https%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=150"><span style="vertical-align: bottom; width: 102px; height: 20px;"><iframe name="f179cf19e" width="150px" height="1000px" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/plugins/like.php?app_id=238241179566629&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F2_ZudbRXWRs.js%3Fversion%3D41%23cb%3Df2ec973c7c%26domain%3Dwww.jawhm.or.jp%26origin%3Dhttp%253A%252F%252Fwww.jawhm.or.jp%252Ff25c2aa0f8%26relation%3Dparent.parent&amp;href=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=150" style="border: none; visibility: visible; width: 102px; height: 20px;" class=""></iframe></span></div>

<!--

<div class="fb-like" data-href="http://www.jawhm.or.jp/blog/australia/selc/item/767" data-width="100" data-layout="button_count" data-show-faces="false" data-send="false"></div>

-->

</li>

<li style="float:left;"><div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 38px; height: 24px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="5" scrolling="no" style="position: static; top: 0px; width: 38px; margin: 0px 5px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I0_1414054330506" name="I0_1414054330506" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;annotation=none&amp;hl=ja&amp;origin=http%3A%2F%2Fwww.jawhm.or.jp&amp;url=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2F&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.DLHD_KHnzEo.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCP0jl0v_G73AKlamVx-jxzhp_zNxQ#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1414054330506&amp;parent=http%3A%2F%2Fwww.jawhm.or.jp&amp;pfname=&amp;rpctoken=12348549" data-gapiattached="true" title="+1"></iframe></div></li>

<li style="float:left;"><span><iframe id="mixi-check-iframe6705" src="http://plugins.mixi.jp/static/public/share_button.html?u=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2Fitem%2F767&amp;k=cfafbb1420faea1fadebf4b94984f1850f920c14&amp;b=button-1" frameborder="0" scrolling="no" allowtransparency="true" style="overflow: hidden; border: 0px; height: 20px; width: 60px; margin: 0 10px;"></iframe></span>



<script type="text/javascript" src="http://static.mixi.jp/js/share.js"></script>

            </li></ul>



<?php 

	global $post;

	$categories = get_the_category($post->ID);

	$posttags = get_the_tags(get_the_ID());

	$my_var = get_comments_number( $post->ID );

	if ($posttags) {

		foreach($posttags as $tag) {									

			$cat_link = get_category_link($categories[0]->term_id );

			$cat_name = $categories[0]->cat_name;

			$taggy[] = $tag->slug;

			$taggy_name[] = $tag->name;

		}

	} else {

		// foreach($posttags as $tag) {									

			$cat_link = get_category_link($categories[0]->term_id );

			$cat_name = $categories[0]->cat_name;

			$taggy[] = $tag->slug;

			$taggy_name[] = $tag->name;

		// }

	}

					

	echo 'カテゴリ ： <a href="'.$cat_link.'">'.$cat_name.'</a> コメント ： '. $my_var .'件';

	

	echo '<table class="a_tag"><tr><td class="tag1">タグ ： </td><td class="tag2">';

	

	$nummy = 0;

	foreach($taggy as $taggy2) {

		if($nummy > 0) {

			echo ', ';

		}

		echo '<a href="' . network_home_url() .'search/tag/?tag='. $taggy2 .'">';

		

		echo $taggy_name[$nummy];;

		

		echo '</a>';

		

		$nummy++;

	}

	echo '</td></tr></table>';

	//echo '<div class="a_tag">タグ ： <a href="' . get_home_url() .'/tag/'. $taggy .'">' .$taggy .'</a></div>';

	$tag_list = implode("", $taggy_name);
	if (!function_exists('echoHTML')) {
		function echoHTML($name = null, $code = null, $slug = null, $checked = 1)
		{
			echo '<ul class="list-country">
					<li id="li-aus">
					    <dl class="dl-country-title clearfix">
					        <dt>
					        	<img src="https://www.jawhm.or.jp/country/images/' . ($slug == 'hun' ? $slug . '_flag' : 'flag-' . $slug) . '.jpg" width="51" height="33">
					        </dt>
					        <dd class="dd-pc clearfix">
					        	<span>' . $name . 'の情報をもっと詳しく</span>
					        </dd>
					        <dd class="dd-sp clearfix">
					        	<span>' . $code . '</span><span class="name-jp">' . $name . 'の情報をもっと詳しく</span>
					        </dd>
					    </dl>
					    <div class="list-country-content">
					        <div class="all-btn">
					            <div class="btn">
					                <a href="/country/' . $code . '/" target="_blank">
					                    <img src="https://www.jawhm.or.jp/country/images/btn-' . $slug . '-country.png" alt="' . $name . '">
					                </a>
					            </div>
					            <div class="btn">
					                <a href="/visa/v-' . $slug . '.html" target="_blank">
					                    <img src="https://www.jawhm.or.jp/country/images/btn-' . $slug . '-visa.png" alt="' . $name . '">
					                </a>
					            </div>
					            <div class="btn">
					                <a href="/blog/search/tag/?tag=' . $name . '" target="_blank">
					                    <img src="https://www.jawhm.or.jp/country/images/btn-' . $slug . '-' . ($slug == 'aus' ? '' : 'b') . 'log.png" alt="' . $name . '">
					                </a>
					            </div>
					            <div class="clearfix"></div>
					        </div>
					        <div class="sp-all-btn">
					            <div class="btn">
					                <a href="/country/' . $code . '/">
					                    <img src="https://www.jawhm.or.jp/country/images/icon-country.png">
					                    <p>' . $name . '
					                        <br>をもっと詳しく知りたい人はこちらへ！</p>
					                </a>
					            </div>
					            <div class="btn">
					                <a href="/visa/v-' . $slug . '.html">
					                    <img src="https://www.jawhm.or.jp/country/images/icon-visa.png">
					                    <p>' . $name . 'の
					                        <br>ビザ情報を知りたい人はこちらへ！</p>
					                </a>
					            </div>
					            <div class="btn">
					                <a href="/blog/search/tag/?tag=' . $name . '">
					                    <img src="https://www.jawhm.or.jp/country/images/icon-blog.png">
					                    <p>' . $name . '
					                        <br>に関するブログ記事はこちらから！</p>
					                </a>
					            </div>
					            <div class="clearfix"></div>
					        </div>
					        <a href="/seminar/seminar.php?navigation=1&amp;month=' . date('m') . '&amp;year=' . date('Y') . '&amp;place_name=&amp;checked_countryname=,' . $checked . '&amp;checked_know=,0" target="_blank" class="country-morebtn btn-seminar display-PC">' . $name . '無料セミナー</a>
					        <a href="/seminar/ser/country/aus" target="_blank" class="country-morebtn btn-seminar display-SP">' . $name . '無料セミナー</a>
					    </div>
					</li>
				</ul>';
		}
	}
	// Old
	/*if ($tag_list !== '') {
		if (strpos($tag_list, 'オーストラリア') !== false) {// Australia
			echoHTML('オーストラリア', 'australia', 'aus', 1);
		} elseif (strpos($tag_list, 'カナダ') !== false) {// Canada
			echoHTML('カナダ', 'canada', 'can', 3);
		} elseif (strpos($tag_list, 'ニュージーランド') !== false) {// New Zealand
			echoHTML('ニュージーランド', 'newzealand', 'nz', 2);
		} elseif (strpos($tag_list, 'イギリス') !== false) {// Anh
			echoHTML('イギリス', 'unitedkingdom', 'uk', 6);
		} elseif (strpos($tag_list, 'フランス') !== false) {// Pháp
			echoHTML('フランス', 'france', 'fra', 5);
		} elseif (strpos($tag_list, 'ドイツ') !== false) {// Đức
			echoHTML('ドイツ', 'germany', 'deu', 7);
		} else {}
	}*/
	// New
	if ($tag_list !== '') {
		$total = 0;
		if (strpos($tag_list, 'オーストラリア') !== false && ($total < 2)) {// Australia 1
			$total++;
			echoHTML('オーストラリア', 'australia', 'aus', 1);
		} 
		if (strpos($tag_list, 'カナダ') !== false && ($total < 2)) {// Canada 2
			$total++;
			echoHTML('カナダ', 'canada', 'can', 3);
		} 
		if (strpos($tag_list, 'ニュージーランド') !== false && ($total < 2)) {// New Zealand 3
			$total++;
			echoHTML('ニュージーランド', 'newzealand', 'nz', 2);
		} 
		if (strpos($tag_list, 'イギリス') !== false && ($total < 2)) {// Anh 4
			$total++;
			echoHTML('イギリス', 'unitedkingdom', 'uk', 6);
		} 
		if (strpos($tag_list, 'フランス') !== false && ($total < 2)) {// Pháp 5
			$total++;
			echoHTML('フランス', 'france', 'fra', 5);
		} 
		if (strpos($tag_list, 'ドイツ') !== false && ($total < 2)) {// Đức 6
			$total++;
			echoHTML('ドイツ', 'germany', 'deu', 7);
		}
		if (strpos($tag_list, 'アイルランド') !== false && ($total < 2)) {// Ireland 7
			$total++;
			echoHTML('アイルランド', 'ireland', 'ire', 7);
		}
		if (strpos($tag_list, 'デンマーク') !== false && ($total < 2)) {// Đan Mạch 8
			$total++;
			echoHTML('デンマーク', 'denmark', 'dnk', 7);
		}
		if (strpos($tag_list, 'ノルウェー') !== false && ($total < 2)) {// Na Uy 9
			$total++;
			echoHTML('ノルウェー', 'norway', 'nor', 7);
		}
		if (strpos($tag_list, '香港') !== false && ($total < 2)) {// Hồng Kông 10
			$total++;
			echoHTML('香港', 'hongkong', 'hkg', 7);
		}
		if (strpos($tag_list, '台湾') !== false && ($total < 2)) {// Đài Loan 11
			$total++;
			echoHTML('台湾', 'taiwan', 'ywn', 7);
		}
		if (strpos($tag_list, '韓国') !== false && ($total < 2)) {// Hàn Quốc 12
			$total++;
			echoHTML('韓国', 'southkorea', 'kor', 7);
		}
		if (strpos($tag_list, 'ポーランド') !== false && ($total < 2)) {// Ba Lan 13
			$total++;
			echoHTML('ポーランド', 'poland', 'pol', 7);
		}
		if (strpos($tag_list, 'ポルトガル') !== false && ($total < 2)) {// Bồ Đào Nha 14
			$total++;
			echoHTML('ポルトガル', 'portugal', 'por', 7);
		}
		if (strpos($tag_list, 'スロバキア') !== false && ($total < 2)) {// Slovakia 15
			$total++;
			echoHTML('スロバキア', 'slovakia', 'svk', 7);
		}
		if (strpos($tag_list, 'オーストリア') !== false && ($total < 2)) {// Áo 16
			$total++;
			echoHTML('オーストリア', 'austria', 'aut', 7);
		}
		if (strpos($tag_list, 'ハンガリー') !== false && ($total < 2)) {// Hungary 17
			$total++;
			echoHTML('ハンガリー', 'hungary', 'hun', 7);
		}
		if (strpos($tag_list, 'スペイン') !== false && ($total < 2)) {// Tây Ban Nha 18
			$total++;
			echoHTML('スペイン', 'spain', 'esp', 7);
		}
	}
?>

	</article><!-- #post -->