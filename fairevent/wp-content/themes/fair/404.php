<!DOCTYPE html>
<html lang="en">
<head>
    <!-- template -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="ワーキングホリデー,ワーホリ,留学,セミナー,海外,語学学校" />
    <title>日本ワーキング・ホリデー協会 | 404 page not found</title>

    <link href="<?php echo get_template_directory_uri(); ?>/assets/404/css/styles.css" rel="stylesheet" />
    
</head>
<body>
    <div class="wrapper">
    	<?php $host = 'http://'.$_SERVER['HTTP_HOST'].'/';  ?>
        <header>
            <h2>日本ワーキング・ホリデー協会</h2>
        </header>
        <section class="content">
           <div class="content404">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/404/images/icon.png" alt="icon">
                <div class="text06">
                    <P>We seem to have lost this page, try one of these instead</P>
                    <span>お探しのURLが見つかりません</span>
                </div>
                <div class="btn-backhome"><a href="<?php echo home_url(); ?>">トップページへ戻る</a></div>
            </div>
        </section>
        
        <footer>
            <div>
               
                <a class="btn" href="<?php echo $host; ?>"><span>協会本サイトへ</span>
                
            </a>
            </div>
            <p>
                一般社団法人 日本ワーキングホリデー協会（JAWHM）<br>
                Copyright© JAPAN Association for Working Holiday Makers<br>
                All right reserved.
            </p>
        </footer>
    </div>
</body>
</html>

