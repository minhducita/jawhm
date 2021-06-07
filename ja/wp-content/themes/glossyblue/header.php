<?php



nocache_headers();



require_once '../include/header.php';
require_once '../seminar_module/seminar_module.php';

$config = array(
    'view_mode' => 'list',
    'dummy_mode' => 'on'
);
$sm = new SeminarModule($config);

$header_obj = new Header();



$header_obj->no_cache=true;



$header_obj->title_page=wp_title('',false);



$header_obj->description_page='アクセス：オーストラリア・ニュージーランド・カナダを初めとしたワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="http://www.jawhm.or.jp/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />

<div style="position:absolute; top:157px; left:600px;">

	<a href="/seminar/seminar.php"><img src="/images/menu/seminar_top_off.png"></a>

</div>';

$header_obj->fncMenuHead_h1text =  wp_title('',false);

$header_obj->fncFacebookMeta_function = true;

$header_obj->add_css_files = '<link rel="stylesheet" href="'.get_bloginfo('stylesheet_url').'" type="text/css" />

<link rel="stylesheet" href="'.get_template_directory_uri().'/editor-style.css" type="text/css" />
<link rel="stylesheet" href="/css/jawhm-form.css" type="text/css" />
';

$header_obj->add_js_files .= $sm->get_add_js();

if($header_obj->computer_use() === false && $_SESSION['pc'] !='on')

	$header_obj->add_css_files .= '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/mobile-style.css" type="text/css" />';



$header_obj->display_header();

include('../calendar_module/mod_event_horizontal.php');





?>

	<div id="maincontent">

    	  <?php echo $header_obj->breadcrumbs(); ?>

