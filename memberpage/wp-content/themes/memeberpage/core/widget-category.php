<?php
/*** add css and js ***/
function add_style_admin(){
    wp_register_style( 'chosen_css', get_template_directory_uri() . '/css/admin/chosen.css');
    wp_enqueue_style( 'chosen_css' );
}
add_action('admin_head','add_style_admin');
function addSideBar(){
	$sidebar1 = array(
            'name'=> __('Category All Post','memperpage'),
            'id'  => 'category-sidebar',
            'description'=>__('Category All Post','memperpage'),
            'class' => 'category-sidebar',
            'before_title'=>'<h3 class="wigget_title">',
            'after_title'=>'</h3>',
    );
    register_sidebar($sidebar1);
}
add_action('init',"addSideBar");
function add_js_admin(){
    wp_register_script( 'chosen_js', get_template_directory_uri() . '/js/admin/chosen.jquery.js' );
    wp_enqueue_script( 'chosen_js' );

    wp_register_script( 'lynam_custome_admin_js', get_template_directory_uri() . '/js/admin/lynam_custome_admin.js' );
    wp_enqueue_script( 'lynam_custome_admin_js' );
}
//* short title *//
function _short_string($string="",$after = '', $length) {
    $string_short = explode(' ',$string,$length);
    if (count($string_short)>=$length) {
        array_pop($string_short);
        $string_short = implode(" ",$string_short). $after;
    } else {
        $string_short = implode(" ",$string_short);
    }
    return $string_short;
}
/**** Class widget index ****/
if(!class_exists('widget_category_all_post')){
    class widget_category_all_post extends WP_Widget{
        function __construct(){
            parent::__construct (
                'widget_category_all_post', // id của widget
                __('category view all','memperpage'), // tên của widget
                array(
                    'description' => __('view category and post','memperpage') // mô tả
                )
            );
        }
        function form($instance){
            /*add js css trong form*/
            add_action('admin_footer','add_js_admin');
            global $wpdb;
            $list_category = $wpdb->get_results('SELECT * FROM wp_terms as t,wp_term_taxonomy as tt WHERE tt.taxonomy = "category" AND tt.term_id = t.term_id');
            if(!empty($instance['lynam_category_id']) and $instance['lynam_category_id'] != 'null'){
                $instance['lynam_category_id']  = json_decode($instance['lynam_category_id']);
                /* Biện dịch lại từ json*/
                $type_show    = (array) json_decode($instance['lynam_type_show']);
                foreach($type_show as $i=>$v){
                    $list_type_show[$i] = $v;
                }
                /*phan trang trong từ khu category*/
                $limit_category    = (array) json_decode($instance['lynam_limit_category_home']);
                foreach($limit_category as $i=>$v){
                    $list_limit_category[$i] = $v;
                }
                $list_id_category = implode(",",$instance['lynam_category_id']);
                if(!empty($list_id_category)){
                    $result = $wpdb->get_results('SELECT * FROM wp_terms where term_id IN ('.$list_id_category.')');
                    if($result){
                        foreach($instance['lynam_category_id'] as $v){
                            foreach($result as $item){
                                if($item->term_id == $v){
                                    $result_view[] = $item;
                                    break;
                                }
                            }
                        }
                    }
                }
            }else{
                $instance['lynam_category_id'] = "";
            }

            $str_option = "<option> ------ ".__('Please chosen category')."----- </option>";
            foreach($list_category as $item){
                $str_option .= '<option value="'.$item->term_id.'">'.$item->name.'</option>';
            }
            echo '<p><label>'.__('Catrgory Chosen:').'</label></p><select class="category_chosen" name="category_chosen">'.$str_option.'</select><button class="add_category">'.__('Add','lynam').'</button>';
            echo '<p><b>'.__("List Category Chosen").'</b></p><div class="list_category_chosen">';
            if(!empty($result_view)){
                $defaul_limit = 10;
                foreach($result_view as $item){
                   $limit_type = !empty($list_limit_category[$item->term_id])?$list_limit_category[$item->term_id]:5;
                   echo '<p> <input class="cate_id" type="hidden" name="lynam_category_id[]" value="'.$item->term_id.'" >-- '.$item->name.' <a class="delete_cate" href="" style="float: right"> delete </a> ';
                   echo "<select name='lynam_type_show[".$item->term_id."]'>";
                   echo (!empty($list_type_show[$item->term_id]) and $list_type_show[$item->term_id] ==2)?"<option value='1' >Dạng cột</option><option selected value=2> Dạng dòng </option>":"<option selected value='1' >Dạng cột</option><option  value=2>Dạng dòng </option>";
                   echo '</select>';
                   echo '<input value="'.$limit_type.'" style="width:50px" name="lynam_limit_category_home['.$item->term_id.']">';
                   echo "</p>";
                }
            }
            echo '</div>';
            ?>
            <script>
                jQuery("document").ready(function(){
                    jQuery(".category_chosen").chosen();
                    jQuery(".chosen-container").next(".chosen-container").remove();// xoa div
                    jQuery(".add_category").off("click");
                    jQuery(".add_category").on("click",function(){
                        $err = 0;
                        var $value = jQuery(this).parents("form").find("select").val();
                        var $title = jQuery(this).parents("form").find("select").find("option:selected").html();
                        var $category_k = jQuery(this).parents("form").find("select").val();
                        jQuery(this).parents("form").find(".list_category_chosen").find(".cate_id").each(function(){
                            if($value == jQuery(this).val()){
                                $err = 1;
                            }
                        });
                        if($err == 0) {
                            jQuery(this).parents("form").find(".list_category_chosen").append("<p><input class='cate_id' type='hidden' name='lynam_category_id[]'  value='" + $value + "'>-- " + $title + " <a class='delete_cate' href='' style='float: right'> delete </a>  <select name='lynam_type_show["+$category_k+"]'><option value='1'>Dạng cột</option><option value='2'>Dạng dòng </option></select><input type='text' style='width:50px' value='5' name='lynam_limit_category_home["+$category_k+"]' ></p>");
                            jQuery(".delete_cate").off("click");
                            jQuery(".delete_cate").on("click",function(){
                                if(confirm("<?php _e('you may want to remove','lynam') ?>"))
                                    jQuery(this).parent("p").remove();
                                return false;
                            });
                        }else{
                            alert("<?php _e('Data already exists','lynam') ?>");
                        }
                        return false;
                    });
                    jQuery(".delete_cate").off("click");
                    jQuery(".delete_cate").on("click",function(){
                        if(confirm("<?php _e('you may want to remove','lynam') ?>"))
                            jQuery(this).parent("p").remove();
                        return false;
                    });

                });
            </script>
            <?php
            //Tạo biến riêng cho giá trị mặc định trong mảng $default
            //$title = $instance['category_id'] ;
            //Hiển thị form trong option của widget

           // echo "<p>".__('Category id','lynam')."</p> <input class='widefat' type='hidden' name='".$this->get_field_name('category_id')."' value='".$title."' /><br>eg. 1,2,3,4";
            //echo '<p>'.__('Category choosen','lynam').' <p><div class="list_chosen">  </div>';
        }
        function update($new_instance,$old_instance){
            parent::update( $new_instance, $old_instance );
            $instance = $old_instance;

            $instance['lynam_category_id'] = json_encode($_POST['lynam_category_id']);
            $instance['lynam_type_show']   = json_encode($_POST['lynam_type_show']);
            $instance['lynam_limit_category_home']   = json_encode($_POST['lynam_limit_category_home']);
            $instance['category_id'] = strip_tags($new_instance['category_id']);
            return $instance;
        }
        function widget($args, $instance){
            global $wpdb;
            //add css va js
            $url_theme = get_template_directory_uri();
            $list_type_show_json = (array)json_decode($instance["lynam_type_show"]);

            foreach($list_type_show_json as $i => $v){
                $list_type_show[$i] = $v;
            }
            $total = 0;
            $list_limit_category_home_json = (array)json_decode($instance["lynam_limit_category_home"]);
            foreach($list_limit_category_home_json as $ilimit => $vlimit){
                $list_limit_category_home[$ilimit] = (int)($vlimit);
            }
			/*
            wp_register_style('jquery-ui-style', $url_theme . "/css/jquery-ui.css");
            wp_enqueue_style('jquery-ui-style');

            wp_register_script('jquery-ui-js', $url_theme . "/js/jquery-ui.js");
            wp_enqueue_script('jquery-ui-js');*/

            $list_unset = ""; // xoa nhung tin bi trung
            // xu ly khi wiget nhan duoc
            extract($args);
            if(!empty($instance['lynam_category_id'])){
                $instance['lynam_category_id'] = json_decode($instance['lynam_category_id']);
				if(!empty($instance['lynam_category_id'])){
					$result = $wpdb->get_results("SELECT *  FROM wp_terms Where term_id IN (".implode(",",$instance['lynam_category_id']).")");
					if($result && !empty($instance['lynam_category_id'])){
						foreach($instance['lynam_category_id'] as $v){
							foreach($result as $item){
								if($item->term_id == $v){
									$result_category[] = $item;
									break;
								}
							}
						}
					}
				}else{
					$result_category = $wpdb->get_results("SELECT t.*  FROM wp_terms as t , wp_term_taxonomy as tt WHERE tt.taxonomy = 'category' AND tt.term_id = t.term_id ORDER BY term_id DESC");
				}
		?>
                <?php $i=0; foreach($result_category as $item){
                    $where_not_in = ($list_unset)?" AND post.ID NOT IN(".trim($list_unset,",").")":"";
                    $limit =  $list_limit_category_home[$item->term_id];
					$query_limit = !empty($instance['lynam_category_id'])?'limit '.$limit:"";
				    $result_post  = $wpdb->get_results('SELECT post.*,cat.term_taxonomy_id as cate FROM  wp_term_relationships as cat INNER JOIN  wp_posts as post ON post.id = cat.object_id  Where post.post_status = "publish" '.$where_not_in.' AND cat.term_taxonomy_id = '.$item->term_id.' ORDER BY post.ID DESC '.$query_limit);
                    if(!empty($result_post)){
						$i++;$j=0;
						if($i == 1){
							$num = "";
						}elseif($i == 3){
							$num = 3;
							$i = 0;
						}else{
							$num = $i;
						}
                    ?>
						<div class="section nobroder">
							<img class='line_cat' src="<?php echo get_template_directory_uri()?>/images/catologytoptitle<?php echo $num?>.png">
							<h2 class='new-sec-title catologyh2'>
								<img src="<?php echo get_template_directory_uri()?>/images/catologyiconi<?php echo $num?>.png">
								<span><a href="<?php echo get_category_link($item->term_id)?>"> <?php echo $item->name ?></a></span>
							</h2>
							<div class="clear"></div>
							<div class="catology">
								<?php foreach($result_post as $sub_item){
                                    $j++;
									$url_image = get_the_post_thumbnail($sub_item->ID,'thumbnail');
                                    $list_unset .= ",".$sub_item->ID;
                                    $except = $this->get_excerpt_by_id($sub_item->ID);
									$except = mb_substr($except,0,150);
                                    $time_post = strtotime(get_the_date('',$sub_item->ID));
                                    $custom_feild = get_post_custom($sub_item->ID);
                                    $price_bds    = ($custom_feild['price_bds'][0])?number_format($custom_feild['price_bds'][0],0,',',".")." VNĐ":"Liên hệ Hotline";
                                    $address_bds  = ($custom_feild['address_bds'][0])?"Khu vực cấm thành phố hcm".$custom_feild['address_bds'][0]:"Hiện đang cập nhật";
                                ?>
									<div class="tabcatology flex">
										<?php if($j == 1 and !empty($url_image)){ echo $url_image; }?>
										<div class='catologyright'>
											<h3> <a href="<?php echo get_permalink($sub_item->ID)?>">
											<img class="img_title_ico" src="<?php echo get_template_directory_uri()?>/images/title-ico.png">
											<span><?php echo $sub_item->post_title?></span>
											</a> </h3>
											<span class="titlecalender"><b>日付:</b> <?php echo date("Y",$time_post)."年".date("m",$time_post)."月".date("d",$time_post)."日"?></span>
											<p class='text01'><?php echo $except?></p>
										</div>
									</div>
								<?php }?>
							</div>
						</div>	
                <?php } }?>
       <?php } }
        function get_excerpt_by_id($post_id){
            $the_post = get_post($post_id); //Gets post ID
            $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
            $excerpt_length = 35; //Sets excerpt length by word count
            $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
            $words = explode(' ', $the_excerpt, $excerpt_length + 1);
            if(count($words) > $excerpt_length) :
                array_pop($words);
                array_push($words, '…');
                $the_excerpt = implode(' ', $words);
            endif;
            $the_excerpt = '<p>' . $the_excerpt . '</p>';
            return $the_excerpt;
        }
        function get_list_category(){
            global $wpdb;
            $result = $wpdb->get_results('SELECT * FROM wp_terms');
            return $result;
        }
    }
}
// wiget
if(!function_exists('memberpage_set_widget')){
    function memberpage_set_widget(){
        register_widget('widget_category_all_post');
    }
    add_action( 'widgets_init', 'memberpage_set_widget' );
}