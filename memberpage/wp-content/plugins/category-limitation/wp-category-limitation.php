<?php
/*
Plugin Name: Category Limitation
Plugin URI: http://www.is-p.cc/wordpress/plug-in/category-limit/364
Description: 記事編集のカテゴリーを限定させるプラグイン
Version: 2.3.1
Author: IS Planning
Author URI: http://www.is-p.cc/
*/

/*
 Copyright (C) 2008-2011 IS Planning (email : info@is-p.cc)
 This program is licensed under the GNU GPL.
*/

/* =====================================================
 WordPressに処理の追加
===================================================== */

$is_cat_limit = new CategoryLimitation();

// カテゴリー制限
add_filter('get_terms', array($is_cat_limit, 'get_terms_category_limit'), 1000);

//管理画面でプラグイン設定メニューを追加
add_action('admin_menu', array($is_cat_limit, 'Add_CategoryLimitation_Menu'), 1001);

//保存前にカテゴリーをチェック
add_filter('category_save_pre', array($is_cat_limit, 'checkCategoryLimit'));

// カテゴリーの階層表示維持のチェック
add_action( 'admin_head', array($is_cat_limit, 'remove_default_categories_box') );
add_action( 'admin_menu', array($is_cat_limit, 'add_custom_categories_box') );


/* =====================================================
 クラスの定義
===================================================== */
class CategoryLimitation {

const ISP_OPTION_NAME = "isp_cat_limit_options";
const ISP_OPTION_SET_NAME = "isp_cat_limit_set_options";
const ISP_HIDDEN_NAME = 'isp_submit_hidden';
const ISP_DEFAULT_MARK = 'default_';

var $setdata;
var $err_msg;
var $checked_ontop;
var $ispCLOptions;
var $ispCLOptionsDB;


//
// コンストラクタ
//
function CategoryLimitation() {
	$this->setdata = array();
	$this->err_msg = "";
	$this->checked_ontop = false;

}


/* ---------------------------------------
 カテゴリ限定処理
--------------------------------------- */
//
// カテゴリー限定処理
// ( get_termsのフィルターフック用関数 )
//
function get_terms_category_limit($obj) {
	// 呼び出し元の関数を取得
	$fnc = array();
	$traces = debug_backtrace();
	foreach($traces as $debug) {
		if($debug['function']) array_push($fnc, $debug['function']);
	}

	// クイック投稿、投稿編集の場合にカテゴリーを制限する
	if(in_array("wp_terms_checklist", $fnc)) {
		$limitid = array();
		$cat = array();
		$selected_cats = false;

		//設定データを取得
		$this->Get_CategoryLimitOpitions();

		//ユーザーIDを取得
		global $user_ID;
		get_currentuserinfo();

		//投稿IDを取得
		global $post_ID;

		//制限するカテゴリIDを取得
		foreach($this->setdata as $key => $value) {
			if($value[0] == $user_ID) {
				$limitid = $value[1];
			}
		}
		if(count($limitid) > 0) {
			foreach($limitid as $include) {
				for($i=0; $i<count($obj); $i++) {
					if(!empty($obj[$i]->term_id) && $obj[$i]->term_id == $include) {
						array_push($cat, $obj[$i]);
						break;
					}
				}
			}
			$obj = $cat;
		}
	}

	return $obj;
}


// 既存のカテゴリーボックスを削除
function remove_default_categories_box() {
	remove_meta_box('categorydiv', 'post', 'side');
}

// オリジナルのカテゴリーボックスを追加
function add_custom_categories_box() {
	add_meta_box('customcategorydiv', 'カテゴリー', array($this, 'custom_post_categories_meta_box'), 'post', 'side', 'low', array( 'taxonomy' => 'category' ));
}

/**
 * Display post categories form fields.
 *
 * @since 2.6.0
 * wp-admin/includes/meta-boxes.php 315行～371行のコピー(wp3.1.2)
 * 変更箇所：　$checked_ontopの変更（カテゴリーの階層表示を維持を確認）
 *             $taxonomyが"category"の場合、li.hide-if-no-js , div#category-pop の出力をしない
 *
 * @param object $post
 */
function custom_post_categories_meta_box( $post, $box ) {
	$defaults = array('taxonomy' => 'category');
	if ( !isset($box['args']) || !is_array($box['args']) )
		$args = array();
	else
		$args = $box['args'];
	extract( wp_parse_args($args, $defaults), EXTR_SKIP );
	$tax = get_taxonomy($taxonomy);

	// 階層表示維持の確認
	$checked_ontop = get_option(self::ISP_OPTION_SET_NAME);
	if(empty($checked_ontop)) $checked_ontop = "no";
	$this->checked_ontop = ($checked_ontop == "yes") ? false : true;

	?>
	<div id="taxonomy-<?php echo $taxonomy; ?>" class="categorydiv">
		<ul id="<?php echo $taxonomy; ?>-tabs" class="category-tabs">
			<li class="tabs"><a href="#<?php echo $taxonomy; ?>-all" tabindex="3"><?php echo $tax->labels->all_items; ?></a></li>
			<?php if( $taxonomy != "category") : ?><li class="hide-if-no-js"><a href="#<?php echo $taxonomy; ?>-pop" tabindex="3"><?php _e( 'Most Used' ); ?></a></li><?php endif; ?>
		</ul>

	<?php if( $taxonomy != "category") : ?>
		<div id="<?php echo $taxonomy; ?>-pop" class="tabs-panel" style="display: none;">
			<ul id="<?php echo $taxonomy; ?>checklist-pop" class="categorychecklist form-no-clear" >
				<?php $popular_ids = wp_popular_terms_checklist($taxonomy); ?>
			</ul>
		</div>
	<?php endif; ?>

		<div id="<?php echo $taxonomy; ?>-all" class="tabs-panel">
			<?php
				$name = ( $taxonomy == 'category' ) ? 'post_category' : 'tax_input[' . $taxonomy . ']';
				echo "<input type='hidden' name='{$name}[]' value='0' />"; // Allows for an empty term set to be sent. 0 is an invalid Term ID and will be ignored by empty() checks.
			?>
			<ul id="<?php echo $taxonomy; ?>checklist" class="list:<?php echo $taxonomy?> categorychecklist form-no-clear">
				<?php $popular_ids = NULL; wp_terms_checklist($post->ID, array( 'taxonomy' => $taxonomy, 'popular_cats' => $popular_ids, 'checked_ontop' => $this->checked_ontop ) ) ?>
			</ul>
		</div>
	<?php if ( current_user_can($tax->cap->edit_terms) ) : ?>
			<div id="<?php echo $taxonomy; ?>-adder" class="wp-hidden-children">
				<h4>
					<a id="<?php echo $taxonomy; ?>-add-toggle" href="#<?php echo $taxonomy; ?>-add" class="hide-if-no-js" tabindex="3">
						<?php
							/* translators: %s: add new taxonomy label */
							printf( __( '+ %s' ), $tax->labels->add_new_item );
						?>
					</a>
				</h4>
				<p id="<?php echo $taxonomy; ?>-add" class="category-add wp-hidden-child">
					<label class="screen-reader-text" for="new<?php echo $taxonomy; ?>"><?php echo $tax->labels->add_new_item; ?></label>
					<input type="text" name="new<?php echo $taxonomy; ?>" id="new<?php echo $taxonomy; ?>" class="form-required form-input-tip" value="<?php echo esc_attr( $tax->labels->new_item_name ); ?>" tabindex="3" aria-required="true"/>
					<label class="screen-reader-text" for="new<?php echo $taxonomy; ?>_parent">
						<?php echo $tax->labels->parent_item_colon; ?>
					</label>
					<?php wp_dropdown_categories( array( 'taxonomy' => $taxonomy, 'hide_empty' => 0, 'name' => 'new'.$taxonomy.'_parent', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => '&mdash; ' . $tax->labels->parent_item . ' &mdash;', 'tab_index' => 3 ) ); ?>
					<input type="button" id="<?php echo $taxonomy; ?>-add-submit" class="add:<?php echo $taxonomy ?>checklist:<?php echo $taxonomy ?>-add button category-add-sumbit" value="<?php echo esc_attr( $tax->labels->add_new_item ); ?>" tabindex="3" />
					<?php wp_nonce_field( 'add-'.$taxonomy, '_ajax_nonce-add-'.$taxonomy, false ); ?>
					<span id="<?php echo $taxonomy; ?>-ajax-response"></span>
				</p>
			</div>
		<?php endif; ?>
	</div>
	<?php
}


/* ---------------------------------------
 管理者用
--------------------------------------- */
//
// 設定パネルにメニュー追加
//
function Add_CategoryLimitation_Menu() {
	if(function_exists('add_options_page')) {

		//管理メニューを追加
		$mypage = add_options_page('Category Limitation Options', 'Category Limitation', 'level_8', __FILE__, array($this, 'CategoryLimitation_GUI'));

		//JavaScriptファイルを追加
		wp_enqueue_script('wp_car_info_regist', get_bloginfo('wpurl') . '/wp-content/plugins/category-limitation/wp-category-limitation.js');

		//JavaScriptファイルを追加
		add_action("admin_head", array($this, 'Add_CategoryLimitationCSS'));
	}
}


//
// JavaScriptファイルを登録
//
function Add_CategoryLimitationJS() {
	wp_enqueue_script('category_limitation', get_bloginfo('wpurl') . '/wp-content/plugins/category-limitation/wp-category-limitation.js');
}


//
// CSSファイルを登録
//
function Add_CategoryLimitationCSS() {
	$isp_css = '<link rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/category-limitation/css/wp-category-limitation.css" type="text/css" />';
	print $isp_css;
}

//
// 管理パネルの作成
//
function CategoryLimitation_GUI() {
	$bfirst = true;

	//POST変数が送信された場合
	if(isset($_POST[self::ISP_HIDDEN_NAME]) && $_POST[self::ISP_HIDDEN_NAME] == 'Y') {
		//データの取得
		foreach( $_POST as $key => $value) {
			if( preg_match('/_post_category/', $key) ) {
				$id = str_replace('_post_category', '', $key);
				if( $bfirst ) {
					$this->myOptions = $id . '=';
				} else {
					$this->myOptions .= '&' . $id . '=';
				}
				// デフォルト値を取得
				$default = 0;
				if(isset($_POST[$id."_default_category"])) {
					$default = $_POST[$id."_default_category"];
				}

				$bfirst = true;
				foreach( $value as $catIds ) {
					$catId = ($default == $catIds) ? self::ISP_DEFAULT_MARK.$catIds : $catIds;

					if( $bfirst ) {
						$this->myOptions .= $catId;
						$bfirst = false;
					} else {
						$this->myOptions .= ',' . $catId;
					}
				}
			}
		}

		//
		//データの保存
		//ID=default_x,x,x&ID=x,x,default_x&...形式で保存
		//
		update_option( self::ISP_OPTION_NAME, $this->myOptions );

		// クイック投稿の設定を保存
		$this->checked_ontop = $_POST["no_checked_ontop"];
		update_option( self::ISP_OPTION_SET_NAME, $this->checked_ontop );

		echo '<div class="updated"><p><strong>';
		_e('Options saved.');
		echo '</strong></p></div>';
	}

	//設定値呼び出し
	$this->Get_CategoryLimitOpitions();

	$y_htm = ' checked="checked"';
	$n_htm = ' checked="checked"';
	if($this->checked_ontop == "yes") {
		$n_htm = '';
	} else {
		$y_htm = '';
	}

?>

<!-- 設定フォーム -->
<div class="wrap">
<h2>Category Limitation</h2>
<p>記事の作成、編集画面で選択できるカテゴリを限定させます。選択を全て外すと全てのカテゴリが表示されます。</p>
<form name="t_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="<?php echo self::ISP_HIDDEN_NAME; ?>" value="Y" />
<p id="isp-checked_ontop">
カテゴリーの階層表示を維持しますか？（親カテゴリーが選択されていない場合は無視されます）<br />
<label for="ct_yes"><input type="radio" name="no_checked_ontop" id="ct_yes" value="yes"<?php echo $y_htm; ?> /> はい</label>　
<label for="ct_no"><input type="radio" name="no_checked_ontop" id="ct_no" value="no"<?php echo $n_htm; ?> /> いいえ</label><br />
</p>
<p class="submit"><input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" /></p>
<?php
// 管理者を除いたユーザーを取得
global $wpdb;
$authors = $wpdb->get_results("SELECT ID, display_name from $wpdb->users WHERE user_login <> 'admin' ORDER BY ID");

// カテゴリーを取得
$categories = (array) get_terms('category', array('get' => 'all'));

if ( empty($walker) || !is_a($walker, 'Walker') ) $walker = new Walker_Category_Checklist;

// 設定画面の作成
foreach((array) $authors as $author) :

	$selected_cats = array();

	$user_info = get_userdata($author->ID);

	//user_levelの無いもの(購読者？)は処理しない
	if(!empty($user_info->user_level)) {

		//設定値を取得
		foreach($this->setdata as $value) {
			if($value[0] == $author->ID) {
				$selected_cats = $value[1];
				break;
			}
		}

		// カテゴリーリストの取得
		$cat = call_user_func_array(array(&$walker, 'walk'), array($categories, 0, array('taxonomy' => 'category', 'selected_cats' => $selected_cats, 'walker' => $walker, 'popular_cats' => array(), 'checked_ontop' => false)));
		// IDの付加
		$cat = str_replace("post_category", $author->ID."_post_category", $cat);

		// デフォルト設定用リスト
		if(count($selected_cats) > 0) {
			$default_cat = '<select name="'.$author->ID.'_default_category" id="'.$author->ID.'_default_category">';
			foreach($selected_cats as $cat_id) {
				if($value[2] == $cat_id) {
					$default_cat .= '<option selected="selected" value="'.$cat_id.'">'.get_cat_name($cat_id).'</option>';
				} else {
					$default_cat .= '<option value="'.$cat_id.'">'.get_cat_name($cat_id).'</option>';
				}
			}
			$default_cat .= '</select>';
		} else {
			$default_cat = '<select disabled="disable"><option value="">更新後、利用可能</option></select>';
		}
?>

<div class="isp-category-layer radius-and-shadow">
<h3><?php echo $author->display_name; ?></h3>
<ul class="isp-category-list">
	<?php echo $cat; ?>
</ul>
<p>デフォルト：<br />
<?php echo $default_cat; ?>
</p>
</div>

<?php } endforeach; ?>

<p class="submit clear"><input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" /></p>
</form>
</div>
<!-- 設定フォーム-end -->

<?php

}


/* ---------------------------------------
 関数
--------------------------------------- */
/*
 制限されているカテゴリが選択されている場合は削除
*/
function checkCategoryLimit( $cats ) {
	// 設定値を取得
	$this->Get_CategoryLimitOpitions();

	$new_cats = array();
	$limitid = array();
	$default = 0;
	global $user_ID;

	//制限するカテゴリIDを取得
	foreach($this->setdata as $value) {
		if($value[0] == $user_ID) {
			$limitid = $value[1];
			$default = $value[2];
		}
	}

	if(count($limitid) > 0) {
		foreach($cats as $cat) {
			if(in_array($cat, $limitid)) {
				// 選択されているカテゴリが許可されている場合
				$new_cats[] = $cat;
			}
		}
	} else {
		$new_cats = $cats;
	}

	// カテゴリーが選択されていない場合
	if(count($new_cats) == 0 && $default > 0) {
		$new_cats[] = $default;
	}

	return $new_cats;
}


/*
 設定値を取得
 データが無い場合は初期化
 $setdata[i][0] = user_id
 $setdata[i][1] = 表示するカテゴリID（カンマ区切り）
*/
function Get_CategoryLimitOpitions() {

	//設定初期値を作成
	$this->ispCLOptions = "";

	//設定データを取得
	$this->ispCLOptionsDB = get_option(self::ISP_OPTION_NAME);
	$options = get_option(self::ISP_OPTION_SET_NAME);

	//設定データが無い場合、wp_optionsテーブルにデータ追加
	if(empty($this->ispCLOptionsDB)) {
		add_option(self::ISP_OPTION_NAME, $this->ispCLOptions);
		$this->ispCLOptionsDB = $this->ispCLOptions;
	}

	if(empty($options)) {
		add_option(self::ISP_OPTION_SET_NAME, $this->checked_ontop);
	} else {
		$this->checked_ontop = $options;
	}

	$limitList = explode("&", $this->ispCLOptionsDB);

	//設定値を配列に読み込んでおく
	foreach ($limitList as $value) {
		$list = trim($value);
		list($id, $limit) = explode("=", $list);
		$cat_ids = explode(",", $limit);
		// デフォルトの検索
		$count = count($cat_ids);
		$default = 0;
		for($i=0; $i<$count; $i++) {
			if(strstr($cat_ids[$i], self::ISP_DEFAULT_MARK)) {
				$cat_ids[$i] = str_replace(self::ISP_DEFAULT_MARK, "", $cat_ids[$i]);
				$default = $cat_ids[$i];
			}
		}
		if($default === 0) $default = $cat_ids[0];
		array_push($this->setdata, array($id, $cat_ids, $default));
	}

}

}

?>
