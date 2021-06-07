<?php
@session_start();
if(isset($_POST['pc']))
	$_SESSION['pc'] = $_POST['pc'];

/**
Template Name: Golden Book
*/
	function is_mobile () 
	{
		$useragents = array(
			'iPhone',         // Apple iPhone
			'iPod',           // Apple iPod touch
			'iPad',           // Apple iPad touch
			'Android',        // 1.5+ Android
			'dream',          // Pre 1.5 Android
			'CUPCAKE',        // 1.5+ Android
			'blackberry9500', // Storm
			'blackberry9530', // Storm
			'blackberry9520', // Storm v2
			'blackberry9550', // Storm v2
			'blackberry9800', // Torch
			'webOS',          // Palm Pre Experimental
			'incognito',      // Other iPhone browser
			'webmate'         // Other iPhone browser
		);
		
		$pattern = '/'.implode('|', $useragents).'/i';
		return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
	}
	//post numbers
	if(is_mobile() && $_SESSION['pc'] !='on')
		$showpost=10;
	else
		$showpost=19;
	
	//retrieve info page
	if ( have_posts() ) : while ( have_posts() ) :  the_post();
	
		list($part1, $part2) = explode(" ", get_the_title());

		$page_info = array(	'title'		=> '<font color="#f6bb47">'.$part1.'</font>&nbsp;'.$part2,
							'content' 	=> get_the_content(),
							);
	 endwhile;
	 
	 endif; 			

 	//Retrieve the post of the category GoldenBook in a array
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args= array(
		'showposts'	=> $showpost,
		'category_name' => 'golden-book', // Change these category SLUGS to suit your use.
		'paged'			=> $paged
	);
	
	//while getting parameters
	if(isset($_GET['filter']))
	{
		$args['s'] = htmlspecialchars($_GET['filter']);
	}
	query_posts($args);
	
	$listid = array();
	$listpost = array();
	$i=0;
	if ( have_posts() ) : while ( have_posts() ) :  the_post();

			$country = '';
			$gender = '';
	
			$listid[$i] = get_the_ID();
			
			//check the country of the post 
			if(substr_count(get_the_title(), '写真') > 0)
			{
				$country = '-photo';
				$title_without_countryname = remove_country_name('写真', get_the_title());
			}
			elseif(substr_count(get_the_title(), 'オーストラリア') > 0)
			{
				$country = '-au';
				$title_without_countryname = remove_country_name('オーストラリア', get_the_title());
			}
			elseif(substr_count(get_the_title(), 'カナダ') > 0)
			{
				$country = '-ca';
				$title_without_countryname = remove_country_name('カナダ', get_the_title());
			}
			elseif(substr_count(get_the_title(), 'ニュージーランド') > 0)
			{
				$country = '-nz';
				$title_without_countryname = remove_country_name('ニュージーランド', get_the_title());
			}
			elseif(substr_count(get_the_title(), 'イギリス') > 0)
			{
				$country = '-uk';
				$title_without_countryname = remove_country_name('イギリス', get_the_title());
			}
			elseif(substr_count(get_the_title(), 'フランス') > 0)
			{
				$country = '-fr';
				$title_without_countryname = remove_country_name('フランス', get_the_title());
			}
			elseif(substr_count(get_the_title(), 'ドイツ') > 0)
			{
				$country = '-de';
				$title_without_countryname = remove_country_name('ドイツ', get_the_title());
			}
			elseif(substr_count(get_the_title(), 'デンマーク') > 0)
			{
				$country = '-dk';
				$title_without_countryname = remove_country_name('デンマーク', get_the_title());
			}
			else
				$title_without_countryname = get_the_title();
				
			
			//check gender
			if(substr_count($title_without_countryname, '男') > 0)
			{
				//check if there is also female gender
				if(substr_count($title_without_countryname, '女') > 0)
					$gender = 'both';
				else
					$gender = 'male';
			}
			elseif(substr_count($title_without_countryname, '女') > 0)
				$gender = 'female';
				
			//remove gender
			$newtitle = remove_gender_name($title_without_countryname);
			
			//construct gender block if exist
			if($gender != '')
			{
				$gender = '<span class="'.$gender.'-gender"></span>';
			}
			
			$listpost[$i] = array( 	'id' 		=> get_the_ID(),
									'title'		=> get_the_title(),
									'newtitle'	=> $newtitle,
									'title_without_countryname'	=> $title_without_countryname,
									'country'	=> $country,
									'gender'	=> $gender,
									'content' 	=> get_the_content_with_formatting()
								);				
			$i++;			 
		endwhile;
	endif;
	
	$result = $i;
?>
<?php
//For mobile, we use common header	
if(is_mobile() && $_SESSION['pc'] !='on') : 
	
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->no_cache=true;

$header_obj->title_page=wp_title('',false);

$header_obj->fncMenuHead_h1text =  wp_title('',false);

$header_obj->add_css_files = '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/goldenbook-mobile.css" />';

$header_obj->display_header();
?>
	<div id="maincontent">
    	  <?php echo $header_obj->breadcrumbs(); ?>
<?php
else : ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php 	
		wp_title( '|', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		?>
</title>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script type='text/javascript' src='http://www.jawhm.or.jp/ja/wp-content/plugins/lightbox-gallery/js/jquery.colorbox.js?ver=3.4'></script>
<script type='text/javascript' src='http://www.jawhm.or.jp/ja/wp-content/plugins/lightbox-gallery/js/jquery.dimensions.js?ver=3.4'></script>
<script type='text/javascript' src='http://www.jawhm.or.jp/ja/wp-content/plugins/lightbox-gallery/js/jquery.bgiframe.js?ver=3.4'></script>
<script type='text/javascript' src='http://www.jawhm.or.jp/ja/wp-content/plugins/lightbox-gallery/js/jquery.tooltip.js?ver=3.4'></script>
<script type='text/javascript' src='http://www.jawhm.or.jp/ja/wp-content/plugins/lightbox-gallery/lightbox-gallery.js?ver=3.4'></script>

<script type="text/javascript">
$(document).ready(function(){
	
	$(".content-box").hide();
	$("#<?php echo $listid[0]; ?>").show(); //show first element
	$("#title<?php echo $listid[0]; ?>").addClass('selected'); //show first element
	<?php
	//list of possibility hide/show for each link
	foreach($listpost as $value)
	{ ?>
		$("#link<?php echo $value['id']; ?>").click(function(){
		<?php
			for($i=0;$i<count($listid);$i++)
			{
				if($listid[$i]== $value['id'])
				{ ?>
					$(".content-box").hide();
					$(".titlename").removeClass('selected');
					$("#<?php echo $listid[$i]; ?>").show();
					$("#title<?php echo $value['id']; ?>").addClass('selected');
			<?php
					break;
				}
			}
			?>
		});
		
	<?php
	} ?>
});

</script>
<link rel="stylesheet" type="text/css" href="http://www.jawhm.or.jp/ja/wp-content/plugins/lightbox-gallery/lightbox-gallery.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/goldenbook.css" />
</head>
<body>
<?php endif; ?>
	<div id="content">
		
		 <?php if(!is_mobile() || $_SESSION['pc'] =='on') wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu' ) ); ?>
         
        <div id="left-box">
        <?php if(is_mobile() && $_SESSION['pc'] !='on') :?>
            <h2 class="sec-title">Golden Book</h2>
            <div id="filter-top">
                <ul>
                    <li><a class="ALL" href="/ja/golden-book" title="ALL">ALL</a></li>
                    <li><a class="AUS" href="/ja/golden-book?filter=オーストラリア" title="AUS">AUS</a></li>
                    <li><a class="CAN" href="/ja/golden-book?filter=カナダ" title="CAN">CAN</a></li>
                    <li><a class="NZL" href="/ja/golden-book?filter=ニュージーランド" title="NZL">NZL</a></li>
                    <li><a class="GBR" href="/ja/golden-book?filter=イギリス" title="GBR">GBR</a></li>
                    <li><a class="DEU" href="/ja/golden-book?filter=ドイツ" title="DEU">DEU</a></li>
                    <li><a class="FRA" href="/ja/golden-book?filter=フランス" title="FRA">FRA</a></li>
                    <li><a class="DNK" href="/ja/golden-book?filter=デンマーク" title="DNK">DNK</a></li>
                </ul>
            </div>
        <?php else :?>
            <h2 id="notebook-title"><?php echo $page_info['title']; ?></h2>
        <?php endif; ?>
            <div id="links">
				<?php
                if(!empty($page_info['content']))
                    echo '<p>'.$page_info['content'].'</p>';
                
                // no result
				if($result == 0)
					echo '<p>今までメッセージがありません</p>';
					
				//dipslay list of Post title of the categeory
                foreach($listpost as $value)
                {
                    if(is_mobile() && $_SESSION['pc'] !='on')
						$index='place'.$value['id'];
					else
						$index=$value['title'];

					echo '
                    <a id="link'.$value['id'].'" href="#'.$index.'" class="list-post'.$value['country'].'" title="'.$value['title'].'"><span id="title'.$value['id'].'" class="titlename">'.$value['newtitle'].'</span>'.$value['gender'].'</a>
                    ';
    
                } ?>

            </div>
            
            <div class="navigation">
                <?php previous_posts_link('Next Entries &gt;&gt;') ?>
                <?php next_posts_link('&lt;&lt; Previous Entries') ?>
               <?php if($result >= $showpost) echo '<span id="girouette"></span>'; ?>
            </div>
        	
        </div>
        
        <div id="right-box">
        
			<?php
			//dipslay list of Post title of the categeory
			foreach($listpost as $value)
			{
				if(is_mobile() && $_SESSION['pc'] !='on'):
				     $addtoindex='place';
					 $display_title = $value['title_without_countryname'];
				else:
					 $addtoindex='';
					 
					 if(substr_count($value['title'], '写真') > 0)
					 	$display_title = $value['title_without_countryname'];
					 else
					 	$display_title = $value['title'];
						
				endif;
				
				echo '
				<div class="content-box" id="'.$addtoindex.$value['id'].'">'
				.'<h3 class="map'.$value['country'].'">'.$display_title.'</h3>'
				.$value['content']				
				.'</div>
				
				';
				
				if(is_mobile() && $_SESSION['pc'] !='on'): ?>
                  <div class="top-move">
                    <p><a href="#header">▲ページのＴＯＰへ</a></p>
                  </div>
                <?php
				endif;

			} ?>
        </div>
        
        <?php if(is_mobile() && $_SESSION['pc'] !='on'):?>
            <div class="navigation">
                <?php previous_posts_link('Next Entries &gt;&gt;') ?>
                <?php next_posts_link('&lt;&lt; Previous Entries') ?>
            </div>
        <?php endif;?>
  

	</div>
     <?php if((is_mobile() && $_SESSION['pc'] !='on' && $result >0) || !is_mobile() || $_SESSION['pc'] =='on' ):?>
    <div id="filter">
    	<ul>
            <li><a class="ALL" href="/ja/golden-book" title="ALL">ALL</a></li>
            <li><a class="AUS" href="/ja/golden-book?filter=オーストラリア" title="AUS">AUS</a></li>
            <li><a class="CAN" href="/ja/golden-book?filter=カナダ" title="CAN">CAN</a></li>
            <li><a class="NZL" href="/ja/golden-book?filter=ニュージーランド" title="NZL">NZL</a></li>
            <li><a class="GBR" href="/ja/golden-book?filter=イギリス" title="GBR">GBR</a></li>
            <li><a class="DEU" href="/ja/golden-book?filter=ドイツ" title="DEU">DEU</a></li>
            <li><a class="FRA" href="/ja/golden-book?filter=フランス" title="FRA">FRA</a></li>
            <li><a class="DNK" href="/ja/golden-book?filter=デンマーク" title="DNK">DNK</a></li>
        </ul>
    </div>
     <?php endif;?>

    <div id="logo"></div>

<?php get_footer(); ?>