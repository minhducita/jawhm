<?php
    function null2zero($val){
        return ($val == "" || $val == NULL)? 0 : $val;
    }
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--▼facebook OGP▼-->
<meta property="og:title" content="ワーキングホリデー・留学の事なら日本ワーキングホリデー協会" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.jawhm.or.jp/register.php" />
<meta property="og:image" content="http://www.jawhm.or.jp/images/fb-image.jpg" />
<meta property="og:site_name" content="日本ワーキング・ホリデー協会" />
<meta property="og:locale" content="ja_JP" />
<meta property="og:description" content="ワーキングホリデー・留学の事なら日本ワーキングホリデー協会。無料セミナー、毎日開催中！！" />
<!--▲facebook OGP▲-->
<link rel="shortcut icon" href="http://www.jawhm.or.jp/images/favicon.ico" type="image/x-icon" />
<title>ユーザー管理画面-マイページトップ| 日本ワーキング・ホリデー協会</title>
<meta name="keywords" content="ワーキングホリデー,ワーホリ,オーストラリア,ニュージーランド,カナダ,カナダ,韓国,フランス,ドイツ,イギリス,アイルランド,デンマーク,台湾,香港,ビザ,取得,方法,申請,手続き,渡航,外務省,厚生労働省,最新,ニュース,大使館" />
<meta name="description" content="メンバー登録：オーストラリア・ニュージーランド・カナダを初めとしたワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。" />
<meta name="author" content="Japan Association for Working Holiday Makers" />
<meta name="dcterms.rightsHolder" content="Japan Association for Working Holiday Makers" />
<link href="mailto:info@jawhm.or.jp" rel="help" title="Information contact"  />
<link rel="Author" href="mailto:info@jawhm.or.jp" title="E-mail address" />
<link rel="index" href="/index.html"  type="text/html" title="日本ワーキングホリデー協会" />
<link id="calendar_style" href="/assets/css/simple.css" media="screen" rel="Stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css"  href="/assets/css/conbini_logo.css" />
<link rel="stylesheet" type="text/css"  href="/assets/css/memberscript.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/screen.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/blog.css" />

<link href="/assets/css/base.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/headhootg-nav.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/contents.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/menu.css" rel="stylesheet" type="text/css" />
<link href="/assets/js/feedback/contactable.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://www.taglog.jp/taglog-aio.js"></script>
<script type="text/javascript">
taglog.init("https://www.jawhm.or.jp/");
taglog.loadingTimeMonitor.start();
</script>
<script src="/assets/js/jquery-easing.js" type="text/javascript" ></script>
<script src="/assets/js/scroll.js" type="text/javascript" ></script>
<script src="/assets/js/img-rollover.js" type="text/javascript"></script>
<script src="/assets/js/google-analytics.js" type="text/javascript"></script>
<script src="/assets/js/prototype.js" type="text/javascript"></script>
<script src="/assets/js/ajaxzip2/ajaxzip2.js" charset="UTF-8"></script>
<script src="/assets/js/effects.js" type="text/javascript"></script>
<script src="/assets/js/protocalendar.js" type="text/javascript"></script>
<script src="/assets/js/lang_ja.js" type="text/javascript"></script>
<script src="/assets/js/jquery.js" type="text/javascript"></script>
<script src="/assets/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery.noConflict();
</script>
<link rel="stylesheet" href="/assets/css/cal_module.css" />

<!--[if lte IE 8 ]>
  <link rel="stylesheet" href="/calendar_module/css/cal_module_ie.css" />
<![endif]-->
</head>

<body>
  <div id="header">
    <div id="header_left">
    	<h1 id="logotext">日本ワーキングホリデー協会にメンバー登録しよう！！</h1>
    	<div id="topimg"><a href="/" title="一般社団法人日本ワーキング・ホリデー協会"><img src="/assets/img/h1-logo.jpg" alt="日本ワーキングホリデー協会" /></a></div><!-- / #topimg -->
    </div><!-- / #header_left -->
    <div id="header_right"><a href="<?php echo SYSTEM_ROOT_PATH?>/mypage/top/logout"><img src="/assets/img/mypage/btn_logout_control.png" alt="ユーザー管理画面からログアウト"></a></div>
    <h2><img id="topBnr" src="/assets/img/mypage/topbnr_mypage1.png" alt="ユーザー管理画面-マイページトップ" /></h2>
    <nav>
    	<ul>
    		<li id="nav1"><a href="<?php echo SYSTEM_ROOT_PATH?>/mypage/top/" class="active">マイページトップ</a></li>
        <li id="nav2"><a href="<?php echo SYSTEM_ROOT_PATH?>/mypage/edit/">情報編集</a></li>
        <li id="nav3"><a href="<?php echo SYSTEM_ROOT_PATH?>/mypage/drawal/">退会</a></li>
    	</ul>
    </nav>
  </div><!-- / #header -->


  <div id="contentsbox">
  	<div id="contentsbox-top">
  		<div id="contentsbox-top-left"><div id="contentsbox-top-right"></div><!-- / #contentsbox-top-right --></div><!-- / #contentsbox-top-left -->
  	</div><!-- / #contentsbox-top -->

  	<div id="contentswide" class="myPage">
    	<div id="maincontentwide">
      	<div id="breadCrumb">
      		<ul>
      			<li><a href="/">ワーキング・ホリデー（ワーホリ）協会 </a><span>　&gt;　</span></li><li>ユーザー管理画面-マイページトップ</li>
      		</ul>
      	</div><!-- / #breadCrumb -->

        <section>
        	<h3><?php echo $blog[DB_COLUMN_BLOG_PROFILE_HANDLE];?>さんのステータス</h3>
          <table class="mypageTable">
          	<tr>
          		<th>審査状況</th><td><div class="situation">
                            <?php
                            switch ($blog[DB_COLUMN_BLOG_STATUS]){
                                case BLOG_STATUS_IN:
                                    echo "IN待ち";
                                    break;
                                case BLOG_STATUS_FIRST_REVIEW:
                                    echo "審査中";
                                    break;
                                case BLOG_STATUS_OK:
                                    echo "審査OK";
                                    break;
                                case BLOG_STATUS_NG:
                                    echo "審査NG";
                                    $sys_root = SYSTEM_ROOT_PATH;
                                    echo <<<HERE
             	<tr>
          		<th>再審査</th>
          		<td>
                <div id="judgingBtn"><a href="{$sys_root}/mypage/top/retry"><img src="/assets/img/mypage/btn_judging.jpg" alt="再審査を依頼する"></a></div>
              </td>
          	</tr>
HERE;
                                    break;
                                case BLOG_STATUS_RE_REVIEW:
                                    echo "再審査中";
                                    break;

                                default:
                                    break;
                            }
                            ?>
                        </div></td>
          	</tr>
          </table>
        </section>

        <section>
        	<h3><?php echo $blog[DB_COLUMN_BLOG_PROFILE_HANDLE];?>さんの登録情報</h3>
          <table class="mypageTable">
          	<tr>
          		<th>ブログ名</th><td><?php echo $blog[DB_COLUMN_BLOG_TITLE];?></td>
          	</tr>
          	<tr>
          		<th>URL</th><td><?php echo $blog[DB_COLUMN_BLOG_URL];?></td>
          	</tr>
          	<tr>
          		<th>プロフィールページ</th><td><a href="<?php echo ROOT_URL.SYSTEM_ROOT_PATH;?>/prof/<?php echo $blog[DB_COLUMN_BLOG_ID];?>" target="_blank"><?php echo ROOT_URL.SYSTEM_ROOT_PATH;?>/prof/<?php echo $blog[DB_COLUMN_BLOG_ID];?></a></td>
          	</tr>
          	<tr>
          		<th>掲載情報</th>
          		<td>
              	<table id="shareTable">
                	<tr>
                		<th>リンクするURL</th><td><?php echo $ctg_info[DB_COLUMN_CATEGORY_OUT_URL]?></td>
                	</tr>
                	<tr>
                		<th>バナー</th>
                		<td>
                                    <?php
                                        $banner_path = "/assets/img/uploaded/banner/";
                                        foreach (glob(CATEGORY_BANNER_IMG_DIR.$blog[DB_COLUMN_BLOG_CATEGORY]."*") as $val){
                                                 $banner_path .= basename($val);
                                                 break;
                                        }
                                    ?>
                    	<img src="<?php echo $banner_path?>" alt="<?php echo $ctg_info[DB_COLUMN_CATEGORY_NAME]?>">
                      <p>※↑の画像をコピーしてお使いください。</p>
                    </td>
                	</tr>
                </table>
              </td>
          	</tr>
          </table>
        </section>

        <?php
            if($blog[DB_COLUMN_BLOG_STATUS] != BLOG_STATUS_OK){
            echo <<<HERE
		  </div><!-- END maincontentwide -->
  </div><!-- END contentswide -->
  </div><!-- END contentsbox -->


  <div id="footer">
  <div id="footer-box">
  <div id="copyright">Copyright© JAPAN Association for Working Holiday Makers All right reserved.</div>
  </div>
  </div>

</body>
</html>
HERE;
            exit();
            }
        ?>

        <section>
        	<h3><?php echo $blog[DB_COLUMN_BLOG_PROFILE_HANDLE];?>さんの人気ランキング</h3>
          <table id="rankingTable">
          	<tr>
          		<th>
                        <?php
                            if($sort == "out"){
                                echo '<a href="?out_sort=false">IN順</a>/OUT順';
                            }else{
                                echo 'IN順/<a href="?out_sort=true">OUT順</a>';
                            }
                        ?>
                        </th>

                        <?php if (trim($rank['update_datetime']) == '') $rank['update_datetime'] = $rank['insert_datetime']; ?>

          		<th><?php echo date('n/j',strtotime('-1 day',strtotime(substr($rank['update_datetime'],0,8)))); ?></th>
          		<th><?php echo date("n/j",strtotime('-2 day',strtotime(substr($rank['update_datetime'],0,8))));?></th>
          		<th><?php echo date("n/j",strtotime('-3 day',strtotime(substr($rank['update_datetime'],0,8))));?></th>
          		<th><?php echo date("n/j",strtotime('-4 day',strtotime(substr($rank['update_datetime'],0,8))));?></th>
          		<th><?php echo date("n/j",strtotime('-5 day',strtotime(substr($rank['update_datetime'],0,8))));?></th>
          		<th><?php echo date("n/j",strtotime('-6 day',strtotime(substr($rank['update_datetime'],0,8))));?></th>
          		<th><?php echo date("n/j",strtotime('-7 day',strtotime(substr($rank['update_datetime'],0,8))));?></th>
          		<th>全参加数</th>

<!--
          		<th>今日</th>
          		<th><?php echo date("n/j",strtotime("-1 day"));?></th>
          		<th><?php echo date("n/j",strtotime("-2 day"));?></th>
          		<th><?php echo date("n/j",strtotime("-3 day"));?></th>
          		<th><?php echo date("n/j",strtotime("-4 day"));?></th>
          		<th><?php echo date("n/j",strtotime("-5 day"));?></th>
          		<th><?php echo date("n/j",strtotime("-6 day"));?></th>
          		<th>全参加数</th>
-->
          	</tr>
            <tr>
            	<th>ランキング</th>
            	<td><?php echo $self_rank[0];?>位</td>
            	<td><?php echo $self_rank[1];?>位</td>
            	<td><?php echo $self_rank[2];?>位</td>
            	<td><?php echo $self_rank[3];?>位</td>
            	<td><?php echo $self_rank[4];?>位</td>
            	<td><?php echo $self_rank[5];?>位</td>
            	<td><?php echo $self_rank[6];?>位</td>
            	<td><?php echo $all_blogs;?>サイト</td>
            </tr>
            <tr>
            	<th>INポイント</th>
                <?php
                    $sum_in = 0;
                    for($i=1; $i<8; ++$i){
                        $val = null2zero($rank[DB_COLUMN_RANKING_IN_PREFIX."0".$i]);
                        $sum_in += $val;
                        echo "<td>". $val . "</td>";
                    }
                    echo "<td>". $sum_in . "/週</td>";
                ?>
            </tr>
            <tr>
            	<th>OUTポイント</th>
                <?php
                    $sum_out = 0;
                    for($i=1; $i<8; ++$i){
                        $val = null2zero($rank[DB_COLUMN_RANKING_OUT_PREFIX."0".$i]);
                        $sum_out += $val;
                        echo "<td>". $val . "</td>";
                    }
                    echo "<td>". $sum_out . "/週</td>";
                ?>
            </tr>
          </table>
        </section>
		  </div><!-- END maincontentwide -->
  </div><!-- END contentswide -->
  </div><!-- END contentsbox -->


  <div id="footer">
  <div id="footer-box">
  <div id="copyright">Copyright© JAPAN Association for Working Holiday Makers All right reserved.</div>
  </div>
  </div>

</body>
</html>

