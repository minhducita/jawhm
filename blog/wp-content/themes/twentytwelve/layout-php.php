<?php

	header('Content-type: text/css');

	$css_options = get_option('website_css');

	

	//unset($footer_color);

	//$b_id = footer_color();

	//$fc = custom_site_settings($blog_id);

?>



/* Change Footer BG Color */

#footer, #footer-box {

	//background-color: <?php echo $fc[0]; ?>;

}

/* End of Changing Footer BG Color */

/* ------------------------------- */







/* Main Top Slider Page */

ol.bjqs-markers li.active-marker a, ol.bjqs-markers li a:hover {

	background: url(<?php echo network_home_url(); ?>wp-content/uploads/2014/09/pagination.png) no-repeat;

	background-position: 0px -13px;

}

ul.bjqs{position:relative; list-style:none;padding:0;margin:0;overflow:hidden; display:none;}

li.bjqs-slide{position:absolute; display:none;}

ul.bjqs-controls{list-style:none;margin:0;padding:0;z-index:9999; position: relative; bottom: 133px;}

ul.bjqs-controls.v-centered li a{position:absolute;}

ul.bjqs-controls.v-centered li.bjqs-next a{right:0;

font-size: 0px;

height: 30px;

width: 31px;

background: url(<?php echo network_home_url(); ?>wp-content/uploads/2014/09/next.png) no-repeat;

margin-top: 98px;

margin-right: 3px;

background-size: 100% 100%;

}

ul.bjqs-controls.v-centered li.bjqs-prev a{left: 0;

font-size: 0px;

height: 30px;

width: 31px;

background: url(<?php echo network_home_url(); ?>wp-content/uploads/2014/09/prev.png) no-repeat;

margin-top: 98px;

margin-left: 3px;

background-size: 100% 100%;

}



.bjqs li{

	/* margin-left:2px; */

}

ol.bjqs-markers li a{

	background: url(<?php echo network_home_url(); ?>wp-content/uploads/2014/09/pagination.png) no-repeat;

}



/* End of Main Top Slider Page */





/* static navi */



#area-blog-globalmenu #blog-globalmenu-list li a.gl {

	color: white;

	padding: 0 5px;

	font-weight: bold;

	

}



#area-blog-globalmenu #blog-globalmenu-list li#nav_li-01,

#area-blog-globalmenu #blog-globalmenu-list li#nav_li-02 {

	border-left: #4D80A8 1px solid;

}



#area-blog-globalmenu #blog-globalmenu-list li#nav_li-02 {

	border-right: #4D80A8 1px solid;

}



/* 

#area-blog-globalmenu #blog-globalmenu-list li#nav_li-01 a {

	width: 211px;

	background: url("<?php echo network_home_url(); ?>wp-content/uploads/2014/10/navigation.png") no-repeat 0 0;

}



#area-blog-globalmenu #blog-globalmenu-list li#nav_li-02 a {

	width: 196px;

	background: url("<?php echo network_home_url(); ?>wp-content/uploads/2014/10/navigation.png") no-repeat -211px 0;

}



#area-blog-globalmenu #blog-globalmenu-list li#nav_li-03 a {

	width: 99px;

	background: url("<?php echo network_home_url(); ?>wp-content/uploads/2014/10/navigation.png") no-repeat -407px 0;

}



#area-blog-globalmenu #blog-globalmenu-list li#nav_li-04 a {

	width: 77px;

	background: url("<?php echo network_home_url(); ?>wp-content/uploads/2014/10/navigation.png") no-repeat -506px 0;

}



#area-blog-globalmenu #blog-globalmenu-list li#nav_li-05 a {

	width: 87px;

	background: url("<?php echo network_home_url(); ?>wp-content/uploads/2014/10/navigation.png") no-repeat -583px 0;

}



#area-blog-globalmenu #blog-globalmenu-list li#nav_li-06 a {

	width: 75px;

	background: url("<?php echo network_home_url(); ?>wp-content/uploads/2014/10/navigation.png") no-repeat -670px 0;

}



#area-blog-globalmenu #blog-globalmenu-list li#nav_li-07 a {

	width: 127px;

	background: url("<?php echo network_home_url(); ?>wp-content/uploads/2014/10/navigation.png") no-repeat -745px 0;

}



#area-blog-globalmenu #blog-globalmenu-list li#nav_li-08 a {

	width: 89px;

	background: url("<?php echo network_home_url(); ?>wp-content/uploads/2014/10/navigation.png") no-repeat -872px 0;

} */



/* End of Navigation */



/* main top page */



.box_notice p {

	/* background: url('<?php echo network_home_url(); ?>wp-content/uploads/2014/10/notice_title.png') top center no-repeat; */

}

#code2 {

	background: #f6f6f6;

	height: 100%;

	text-align: center;

	padding-top: 37px;

	padding-bottom: 40px;

}

.box_choice {

	background: url('<?php echo network_home_url(); ?>wp-content/uploads/2014/10/sub_content_title_bg.jpg') top left repeat-x;

	height: 50px;

	margin-bottom: 10px;

}



.box_new_entry, .sub_box_new_entry {

	background: url('<?php echo network_home_url(); ?>wp-content/uploads/2014/10/header2.png') top left no-repeat;

	padding-top: 50px;

	margin-top: 10px;

	margin-bottom: 30px;

}



/* end of main top page */



/* post page */



/* .site-content-wrapper {

	padding-top: 210px;

	margin-top: 15px;

	background: transparent url('<?php echo network_home_url(); ?>wp-content/uploads/2014/10/post_header.jpg') top center no-repeat;

	border-top-left-radius: 1em;

	border-top-right-radius: 1em;

} */



.head_content_wrapper{

	margin-top: 15px;

	background: transparent url('<?php echo network_home_url(); ?>wp-content/uploads/2014/10/post_header.jpg') top center no-repeat;

	border-top-left-radius: 1em;

	border-top-right-radius: 1em;

	display:table;

	height:224px;

	width:100%;

}



/* end of post page */



/* sidebar */



#secondary #searchsubmit{

	background: url('<?php echo network_home_url(); ?>wp-content/uploads/2014/11/search_icon.jpg') no-repeat;

	border-left: none;

	border-radius: 0;

	line-height: 1.5em;

	margin: 2px 0;

	float: left;

	width: 39px;

	height: 30px;

	font-size: 0;

	background-position: 10px;

}



/* end of sidebar */







/* mobile version - slider */



.slick-prev { 

	background: url(<?php echo network_home_url(); ?>wp-content/uploads/2014/09/prev.png) no-repeat;

	background-size: 100%;

}

.slick-next { 

	background: url(<?php echo network_home_url(); ?>wp-content/uploads/2014/09/next.png) no-repeat;

	background-size: 100%;

}

.slick-dots li.slick-active, .slick-dots li button:hover, .slick-dots li button:focus {

	background: url(<?php echo network_home_url(); ?>wp-content/uploads/2014/09/pagination.png) no-repeat;

	background-position: 0px -13px;

}

.slick-dots li, .slick-dots li button {

	background: url(<?php echo network_home_url(); ?>wp-content/uploads/2014/09/pagination.png) no-repeat;

}



/* end of mobile version - slider */







/* Japanese Blog Site */



.jp-search form input#searchsubmit {

	background: #fff url(<?php echo network_home_url(); ?>wp-content/uploads/2014/11/search_icon.jpg) center center no-repeat;

}



ul.categories li:before {

	display: inline-block;

	width: 10px !important;

	height: 10px !important;

	content: "";

	background: url(<?php echo network_home_url();?>wp-content/uploads/2014/12/blue-triangle.jpg) no-repeat 0 0;

	background-size: 100%;

	float: left;

	margin: 5px 5px 5px 0;

	/* opacity: 0.4; */

}



div.navi-top div.nav-previous,

div.navi-bottom div.nav-previous {

	background: url(<?php echo network_home_url();?>wp-content/uploads/2014/12/arrow-prev.png) no-repeat left center;

}



div.navi-top div.nav-next,

div.navi-bottom div.nav-next {

	background: url(<?php echo network_home_url();?>wp-content/uploads/2014/12/arrow-next1.png) no-repeat right center;

}



/* End of Japanese Blog Site */

/* ------------------------- */