<?php

/**

 * Mobile version of displaying content

 */

	global $post;

	

	$site_name = site_name();

	

	$eng = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

	$jap = array('（日）', '（月）', '（火）', '（水）', '（木）', '（金）', '（土）');

	

	for ($x=0; $x<=count($eng); $x++) {

		if (get_post_time('l') == $eng[$x]) {

			$det = $jap[$x];

			break;

		}

	}

	

	$post_date = '<p class="date">' . get_post_time('Y年m月d日') . ' ' . $det . '</p>';

	

	$posttags = get_the_tags(get_the_ID());

	if ($posttags) {

		foreach($posttags as $tag) {

			//$taggy[] = $tag->slug;

			$taggy[] = tag_link($tag->name);

			$taggy_name[] = $tag->name;

		}

	} //else {

		//$taggy[] = $tag->slug;

		//$taggy_name[] = $tag->name;

	//}

	

	$get_permalink = get_permalink();

	

	$title = '<p class="title"><a href="' . $get_permalink . '">' . get_the_title() . '</a></p>';

	

	//$post_content =  $post->post_content;

	//$post_content = str_replace('[domain]', $site_name, $post_content);

	

	global $post;

	$categories = get_the_category($post->ID);

	

	$cat_link = get_category_link($categories[0]->term_id );

	$cat_name = $categories[0]->cat_name;

	

	$post_category = '<a href="' . $cat_link . '">' . $cat_name . '</a>';
	
	function getBaseUrl() {
		$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
		$host = $_SERVER['HTTP_HOST'];
		$baseurl = $protocol . $host;
		return $baseurl;
	}

	function get_first_image() {
		global $post;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches[1][0];
		if (empty($first_img)) {
			$picture = site_url() . '/wp-content/uploads/2016/12/facebook_picture.jpg';
		} else {
			if (!preg_match("~^(?:f|ht)tps?://~i", $first_img)) {
		        $picture = getBaseUrl() . $first_img;
		    } else {
		    	$picture = $first_img;
		    }
		}
		return $picture;
	}

?>

<div class="hero-unit content" id="content_test">

	<div class="title_n_date">

		<?php

			//edit

			echo $post_date;

			echo $title;

		?>

	</div>

	<ul style="list-style: none; display: inline-block;">
	    <li style="float:left; margin-right: 10px;">
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
			}(document, "script", "twitter-wjs"));</script>
	    	<a class="twitter-share-button" href="<?php echo get_permalink();?>" data-size="default" data-lang="ja">Tweet</a>
	    </li>
	    <li style="float:left; margin-right: 10px;">
			<script>
			    function fbs_click() {
			        u = '<?php echo get_permalink();?>';
			        title = '<?php echo get_the_title();?>';
			        picture = '<?php echo get_first_image();?>';
			        window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(u) + '&title=' + encodeURIComponent(title) + '&picture=' + encodeURIComponent(picture),
			            'sharer',
			            'toolbar=0,status=0,width=626,height=436');
			        return false;
			    }
			</script>

			<a rel="nofollow" href="http://www.facebook.com/share.php?u=<?php echo get_permalink();?>" onclick="return fbs_click()" target="_blank">
				<img style="height: 21px;" src="<?php echo site_url(); ?>/wp-content/uploads/2016/10/facebook_share.png">
			</a>
	
		</li>
	</ul>

	<div class="post_content">

		<?php

			//echo $post_content;

			the_content();

		?>

	</div>

	<ul style="list-style: none; padding-bottom: 5px; display: table; margin: 0 auto;">
	    <li style="float:left; margin-right: 10px;">
	    	<a class="twitter-share-button" href="<?php echo get_permalink();?>" data-size="default" data-lang="ja">Tweet</a>
	    </li>
		<li style="float:left;">
			<a rel="nofollow" href="http://www.facebook.com/sharer/sharer.php?u=someurl" onclick="return fbs_click()" target="_blank" class="">
				<img style="height: 21px;" src="<?php echo site_url(); ?>/wp-content/uploads/2016/10/facebook_share.png">
			</a>
		</li>
	</ul>
	<ul style="list-style: none; padding-bottom: 10px; display: table; margin: 0 auto;">
	    <li style="float:left;">
			<div class="g-plusone-share-button"><div class="g-plusone" data-annotation="none" data-size="medium" data-href="<?php echo get_permalink();?>"></div></div>
			<script type="text/javascript">
				window.___gcfg = {lang: 'ja'};
				(function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				})();
			</script>
	    </li>
	    <li style="float:left;"><span><iframe id="mixi-check-iframe6705" src="http://plugins.mixi.jp/static/public/share_button.html?u=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2Fitem%2F767&amp;k=cfafbb1420faea1fadebf4b94984f1850f920c14&amp;b=button-1" frameborder="0" scrolling="no" allowtransparency="true" style="overflow: hidden; border: 0px; height: 20px; width: 60px; margin: 0 10px;"></iframe></span>
	        <script type="text/javascript" src="http://static.mixi.jp/js/share.js"></script>
	    </li>
	</ul>

	<div class="tags">

		<p>カテゴリ ： <?php echo $post_category; ?></p>

		<p>タグ ： 

			<?php

				$nummy = 0;

				foreach($taggy as $taggy2) {

					if($nummy > 0) {

						echo ' / ';

					}

					echo '<a href="' . network_home_url() .'search/tag/?tag='. $taggy2 .'">';

					

					echo $taggy_name[$nummy];

					

					echo '</a>';

					

					$nummy++;

				}

			?>

		</p>

	</div>
	
	<?php

	$tag_list = implode("", $taggy_name);
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
				        	<span class="name-jp">' . $name . 'の情報をもっと詳しく</span>
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

	?>

</div>