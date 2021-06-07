<?php
$seminar =false;
$name_pages =$this->param;

// $dk = Options::find()->where(['name_pages' =>$name_pages])->one();
// $options =Options::model()->
$options = Options::model()->find('name_pages=:name_pages', array('name_pages'=>$name_pages));


if (empty($options)) 
{       

    $options =Options::model()->find('name_pages=:name_pages', array('name_pages'=>'main'));
    $seminar =true;
}



require_once __DIR__ . '/../../../../include/header.php';

/*echo "
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KKVVF9Q');</script>
<!-- End Google Tag Manager -->
";

*/

$header_obj = new Header();

$header_obj->fncFacebookMeta_function = true;

$header_obj->description_page = $options->description;
$header_obj->keywords_page = $options->keyword;
$header_obj->fncMenuHead_imghtml = "<img id=top-mainimg src='$options->imghtml' alt width=970 height=170 />";
$header_obj->fncMenuHead_h1text = $options->h1text;
$header_obj->title_page = $options->title;


$header_obj->display_header();

?>
<link href="/interview/css/qa.css" rel="stylesheet" type="text/css" />
<link href="/interview/css/searchqa.css" rel="stylesheet" type="text/css" />
<!--JN:css of blog-->
<link href="/interview/css/blog.css?version=20190807" rel="stylesheet" type="text/css" />
<?php
if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') {
    ?>
    <link href="/css/interview_mobile.css" rel="stylesheet" type="text/css" />
    <?php
} else {
    ?>
    <link href="/css/interview.css" rel="stylesheet" type="text/css" />
    <?php
}
?>

<div id="maincontent">
    <!--JN:add-->
    <!--<div id="topic-path"><div id="text-home"><a href="/" target="_self">ワーキング・ホリデー（ワーホリ）協会</a>&nbsp;&gt;&nbsp;ワーキングホリデー協定国別・よくある質問</div></div>-->     
    <!--JN:end-->
    <div id="topic-path" class="abcdef">
        <div id="text-home">
            <?php //echo $this->params['interview_name']; ?>
            <?php
                //JN:change
                if(isset($this->breadcrumbs)){//JN:...
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'homeLink' => '<a href="/" target="_self">ワーキング・ホリデー（ワーホリ）協会</a>',
                        'links' => $this->breadcrumbs,
                        'tagName' => 'span',
                        'separator' => '>',
                        'inactiveLinkTemplate' => '<span>{label}</span>',
                        'activeLinkTemplate' => '<span><a href="{url}">{label}</a></span>',
                    ));
                }
                
                //JN:end
            ?>
        </div>    
    </div>
    <?php echo $content; ?>
</div>
</div>
</div>
</div>

<?php fncMenuFooter($header_obj->footer_type); ?>
<?php
//JN:start:add js 1609061454
//$header_obj->display_js();
//JN:end
?>


</body>

<!-- Google Tag Manager (noscript) -->


<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKVVF9Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>


<!-- End Google Tag Manager (noscript) -->




<script>
// hide form search in page qa_aus.html
$(document).ready(function(){
 
        var a = $(location).attr('pathname');
      if(a=='/qa_aus.html')
      {
        $('.frame-qa').css('display','none');
        $('.qa-nbox1 .qa-ntitle').css('display','none');
      }

   
});

</script>


</html>