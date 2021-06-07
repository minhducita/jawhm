<?php
require_once('include/header-footer.php');

$new_obj = new HeaderFooter();
$new_obj->frontpage = true;

$new_obj->add_js_files = '<script type="text/javascript" src="js/jquery.js"></script>
<script src="/eng/js/fbwall/jquery.neosmart.fb.wall.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		$("#facebookwall").fbWall({ id:"257122891001724",accessToken:"158074594262625|uB3Xinq5YJPu2UurVFfo9dT28vw"});
	});
</script>
';
$new_obj->add_css_files='<link href="/eng/js/fbwall/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css" />';

$new_obj->add_footer_js_files='<script src="http://www.job-board.info/api/api.php?action=getJobs&type=0&category=0&count=5&random=1&days_behind=7&response=js" type="text/javascript"></script>
<script type="text/javascript">showJobs("jobber-container", "jobber-list");</script>';

$new_obj->display_header();
?>
	    			<div class="top-sec01">
                    
	    				<h2 class="title">Information</h2>
                        
						<div style="margin-top:30px;">&nbsp;</div>

						Welcome to Web-page of Japan Association for Working Holiday Makers.<br/>&nbsp;<br/>

						<div style="font-size:14pt;">Do you know Jobboard??</div>
                        
                        <div style="margin-left:30px; padding: 10px 0 5px 15px; border-left:3px solid navy;">
			    	Jobboard is a job posting board that anyone can use for free.
			    	It is part of the job support program for foreigners, provided by Japan Association for Working Holiday Makers (JAWHM).
			    	Jobboard mainly targets working holiday makers that are looking for a job. 
		 	    	Anyone can post, view and check job information for free on Jobboard.
			    	You don't need to register personal information, or create your own account.
				You can contact the recuitment publisher directly through Jobboard.
				You can search jobs by categories, such as industries, work period, region etc.
				Working holiday makers that are looking for work in Japan, feel free to make use of Jobboard.
			    <br/>&nbsp;<br/>
                            Here is a link to Jobboard: <b><a target="_blank" href="http://www.job-board.info/">Let's check it!!</a></b><br/>
                        </div>

                        <div style="font-size:12pt; margin-top:10px;">Recent Offers</div>
                        <div id="jobber-container" style="margin-left:30px; padding: 10px 0 5px 15px; border-left:3px solid navy;"></div>

                        <div style="margin-left:30px; padding: 10px 0 5px 15px;">
                        	<u><a target="_blank" href="http://www.job-board.info/">Check other offers!!</a></u><br/>
                        </div>

                        <div class="top-sec01">
                            <h2 class="green-title">PICK UP</h2>

                            <div style="margin-top:20px;">&nbsp;</div>

                            <div id="fb-root"></div>
							<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4&appId=406032382880241";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                            
							<!--<div class="fb-like" style="margin-left:30px;" data-href="http://www.facebook.com/JapanWorkingHoliday?ref=ts" data-send="true" data-width="400" data-show-faces="true" data-font="arial"></div>-->

							<!--<div id="facebookwall" style="width:640px; m-->
                                                        <div style="margin-top:20px;" class="fb-page" data-href="http://www.facebook.com/JapanWorkingHoliday" data-width="640" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="http://www.facebook.com/JapanWorkingHoliday"><a href="http://www.facebook.com/JapanWorkingHoliday">日本ワーキングホリデー協会　</a></blockquote></div></div></div>

						</div>
	  				</div>
<?php $new_obj->display_footer(); ?>

