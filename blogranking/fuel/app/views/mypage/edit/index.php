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
<title>ユーザー管理画面-情報編集| 日本ワーキング・ホリデー協会</title>
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
<script type="text/javascript">
jQuery.validator.setDefaults({
    submitHandler: function()	{
        submit();
    }
});

jQuery().ready(function() {
    jQuery("#editForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
						 email2: {
                required: true,
                email: true,
								equalTo: "#email"
            },
            pass: {
                required: false,
                minlength: 6
            },
            pass2: {
                required: false,
                minlength: 6,
                equalTo: "#pass"
            },
            handlename: "required",
            blogtitle: "required",
            blogurl: "required",
            blogdesc: {
                required: true,
								maxlength: 100
						},
						freetext: {
								maxlength: 200
						},
            category1: "required",
						category2: "required",
						category3: "required",
						ratio1: "required",
						ratio2: "required",
						ratio3: "required",
        },
        messages: {
            email: "<br/>メールアドレスを入力してください",
						email2: {
								required: "<br/>メールアドレスを再度入力してください",
								equalTo: "<br/>上記のメールアドレスと異なります。確認してください。"
						},
						pass: {
                required: "<br/>パスワードを入力してください",
                minlength: "<br/>パスワードは6文字以上で設定してください"
            },
            pass2: {
                required: "<br/>パスワードを再度入力してください",
                minlength: "<br/>パスワードは6文字以上で設定してください",
                equalTo: "<br/>上記のパスワードと異なります。確認してください。"
            },
            handlename: "<br/>ハンドルネームを入力してください",
            blogtitle: "<br/>ブログタイトルを入力してください",
            blogurl: "<br/>ブログURLを入力してください",
            blogdesc: {
							required: "<br/>サイト紹介文を入力してください",
							maxlength: "<br />サイト紹介文は50文字以内で設定してください",
						},
						freetext: {
							maxlength: "<br />サイト紹介文は200文字以内で設定してください",
							},
            category1: "<br />(要選択)",
						category2: "<br />(要選択)",
						category3: "<br />(要選択)",
						ratio1: "<br />%を設定してください",
						ratio2: "<br />%を設定してください",
						ratio3: "<br />%を設定してください"
        }
    });

});
</script>
<script>
jQuery(function(){
jQuery(".focus").focus(function(){
  if(this.getAttribute("pre") == "1"){
this.setAttribute("pre","0")
jQuery(this).val("").css("color","#000000");
  }
});
jQuery(".tooltip img").hover(function() {
jQuery(this).next("div").animate({opacity: "show", top: "0"}, "fast");}, function() {
       jQuery(this).next("div").animate({opacity: "hide", top: "0"}, "fast");
});
});
function fncClearFields()	{
var obj = document.getElementsByClassName("focus");
for (idx=0; idx<obj.length; idx++)	{
if (obj[idx].getAttribute("pre") == "1")	{
obj[idx].value = "";
}
}
}
</script>

<link rel="stylesheet" href="/calendar_module/css/cal_module.css" />

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
    <h2><img id="topBnr" src="/assets/img/mypage/topbnr_mypage2.png" alt="ユーザー管理画面-情報編集" /></h2>
    <nav>
    	<ul>
    		<li id="nav1"><a href="<?php echo SYSTEM_ROOT_PATH?>/mypage/top/">マイページトップ</a></li>
        <li id="nav2"><a href="<?php echo SYSTEM_ROOT_PATH?>/mypage/edit/" class="active">情報編集</a></li>
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
      			<li><a href="/">ワーキング・ホリデー（ワーホリ）協会 </a><span>　&gt;　</span></li><li>ユーザー管理画面-情報編集</li>
      		</ul>
      	</div><!-- / #breadCrumb -->

        <section>
        	<h3><?php echo $blog[DB_COLUMN_BLOG_PROFILE_HANDLE]?>さんの登録情報</h3>
        	<?php if(isset($emailerror)) { ?><font color="red">そのメールアドレスは登録済みです</font><?php }?>
        	<?php if(isset($proferror)) { ?><font color="red">プロフィール画像は縦横200px、1MB以内のJPEG画像を使用してください</font><?php }?>
          <form action="<?php echo SYSTEM_ROOT_PATH?>/mypage/edit/confirm" method="post" id="editForm" enctype="multipart/form-data">
          	<input type="hidden" name="act" value="s1">
            <input type="hidden" name="kyoten" value="">
            <table class="mypageTable">
              <tr>
                <th>メールアドレス</th><td><input type="text" class="w400" name="email" id="email" value="<?php echo (isset($email) ? $email : $blog[DB_COLUMN_BLOG_MAILADDRESS]); ?>"><span class="notes1">例：info@blogmura.jp</span><p class="notes2">※ログインIDとなります。携帯メールアドレスはご利用いただけません。</p></td>
              </tr>
              <tr>
                <th>メールアドレス(確認用)</th><td><input type="text" name="email2" class="w400" value="<?php echo (isset($email2) ? $email2 : $blog[DB_COLUMN_BLOG_MAILADDRESS]);?>"></td>
              </tr>
              <tr>
                <th>パスワード<p class="redTxt" >※変更時のみご入力ください</p></font></th><td><input type="password" id="pass" class="w200" name="pass" maxlength="16"><p class="notes2">※半角英数　6文字以上　16文字以内</p></td>
              </tr>
              <tr>
                <th>パスワード(確認用)<p class="redTxt">※変更時のみご入力ください</p></th><td><input type="password" class="w200" name="pass2" maxlength="16"></td>
              </tr>
            </table>

            <p class="font14 mgb30">▼ここから下のエリアは公開される情報にとなります。<br><br><span class="red">（必須）</span>とあるものは必ず入力お願いします。<br>また、<span class="red">(必須)</span>の無い項目は入力しなければ公開されません。</p>

            <table class="mypageTable2">
              <tr>
                <th>ハンドル名 <p class="redTxt">（必須）</p></th><td><input type="text" class="w300" name="handlename" maxlength="25" value="<?php echo (isset($handlename) ? $handlename : $blog[DB_COLUMN_BLOG_PROFILE_HANDLE]);?>"><p class="notes2">※全角 25文字以内</p></td>
                <td rowspan="15" class="rowImg">現在のプロフィール画像<?php
                    if(basename($img_path) != "prof"){
                        echo '<img src="'.$img_path.'" width="200" alt="">';
                    }else{
                        echo "<br>設定されていません";
                    }
                ?></td>
              </tr>
              <tr>
                <th>ブログタイトル <p class="redTxt">（必須）</p></th><td><input type="text" class="w300" name="blogtitle" maxlength="25" value="<?php echo (isset($blogtitle) ? $blogtitle : $blog["title"]);?>"　maxlength="25"><p class="notes2">※全角 25文字以内</p></td>
              </tr>
              <tr>
                <th>ブログURL<p class="redTxt">（必須）</p></th><td><input type="text" class="w300" name="blogurl" value="<?php echo (isset($blogurl) ? $blogurl : $blog["url"]);?>"></td>
              </tr>
              <tr>
                <th>ブログRSS</th><td><input type="text" class="w300" name="blogrss" value="<?php echo (isset($blogrss) ? $blogrss : $blog[DB_COLUMN_BLOG_PROFILE_RSS]);?>"><p class="notes2 red">※ RSSに慣れていない方は入力しなくても大丈夫です。</p></td>
              </tr>
              <tr>
                <th>サイト紹介文<p class="redTxt">（必須）</p></th><td><textarea name="blogdesc" rows="5"><?php echo (isset($blogdesc) ? $blogdesc : $blog["message"]);?></textarea><p class="notes2">※全角 50文字以内</p></td>
              </tr>
              <tr>
                <th>参加カテゴリー<p class="redTxt">（必須）</p></th>
                    <td>
                      <select name="category" id="category">
                          <?php
                            foreach ($ctg as $val){
                            	if(isset($category) && $category == $val[DB_COLUMN_CATEGORY_ID]) {
                            		echo '<option value="'.$val[DB_COLUMN_CATEGORY_ID].'" selected>'.$val[DB_COLUMN_CATEGORY_NAME].'</option>';
                            	} else if($blog[DB_COLUMN_BLOG_CATEGORY] == $val[DB_COLUMN_CATEGORY_ID]){
                                    echo '<option value="'.$val[DB_COLUMN_CATEGORY_ID].'" selected>'.$val[DB_COLUMN_CATEGORY_NAME].'</option>';
                                }else{
                                    echo '<option value="'.$val[DB_COLUMN_CATEGORY_ID].'">'.$val[DB_COLUMN_CATEGORY_NAME].'</option>';
                                }
                            }
                          ?>
                      </select>
                    </td>
              </tr>
              <tr>
<!--                <th>お誕生日から世代を<br>判別します。</th>
                <td>
                	<select name="year" class="w80">
                  	<option value="">-</option>
                    <option value="">1900</option>
                  </select>
                  <label for="year" class="radioLabel">年</label>

                	<select name="month" class="w50">
                  	<option value="">-</option>
                    <option value="">1</option>
                  </select>
                  <label for="month" class="radioLabel">月</label>

                	<select name="day" class="w50">
                  	<option value="">-</option>
                    <option value="">12</option>
                  </select>
                  <label for="day" class="radioLabel">日</label>
                </td>
              </tr>
              <tr>-->
                <th>性別</th>
                <td>
                  <?php
				if(isset($gender)) {
					if($gender == 0){
						echo <<<HERE
                  <input type="radio" name="gender" value="off" checked>　非公開　
                  <input type="radio" name="gender" value="0" >　男性　
                  <input type="radio" name="gender" value="1" >　女性　
HERE;
					}else{
						if($gender == 0){
							echo <<<HERE
                  <input type="radio" name="gender" value="off" >　非公開　
                  <input type="radio" name="gender" value="0" checked>　男性　
                  <input type="radio" name="gender" value="1">　女性　
HERE;
						}else{
							echo <<<HERE
                  <input type="radio" name="gender" value="off" >　非公開　
                  <input type="radio" name="gender" value="0" >　男性　
                  <input type="radio" name="gender" value="1" checked>　女性　
HERE;
						}
					}
				} else {
                    if($blog[DB_COLUMN_BLOG_PROFILE_GENDER_FLAG] == 0){
                        echo <<<HERE
                  <input type="radio" name="gender" value="off" checked>　非公開　
                  <input type="radio" name="gender" value="0" >　男性　
                  <input type="radio" name="gender" value="1" >　女性　
HERE;
                    }else{
                        if($blog[DB_COLUMN_BLOG_PROFILE_GENDER] == 0){
                        echo <<<HERE
                  <input type="radio" name="gender" value="off" >　非公開　
                  <input type="radio" name="gender" value="0" checked>　男性　
                  <input type="radio" name="gender" value="1">　女性　
HERE;
                        }else{
                        echo <<<HERE
                  <input type="radio" name="gender" value="off" >　非公開　
                  <input type="radio" name="gender" value="0" >　男性　
                  <input type="radio" name="gender" value="1" checked>　女性　
HERE;
                        }
                    }
				}
                  ?>
                </td>
              </tr>
              <tr>
                <th>プロフィール画像<p class="redTxt">縦横200pxの、正方形画像を使用してください</p></th>
                <td><input type="file" name="img"></td>
              </tr>
            </table>
          </section>
          <input type="submit" id="btnConfirm">
         </form>
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

