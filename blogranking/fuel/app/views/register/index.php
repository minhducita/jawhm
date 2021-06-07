<?php ini_set('error_reporting',0); ?>
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
<title>ブログランキング登録 | 日本ワーキング・ホリデー協会</title>
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
<script type="text/javascript">
jQuery.validator.setDefaults({
    submitHandler: function()	{
        fm.submit();
    }
});

jQuery().ready(function() {
    jQuery("#signupForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            blogtitle: "required",
            blogurl: "required",
            blogdesc: {required : true, maxlength:50},
            category: "required",
            handlename: "required",
            gender: "required",
            address_publication: "required",
            agree: "required"
        },
        messages: {
            email: "<br/>メールアドレスを入力してください",
						password: {
                required: "<br/>パスワードを入力してください",
                minlength: "<br/>パスワードは6文字以上で設定してください"
            },
            confirm_password: {
                required: "<br/>パスワードを再度入力してください",
                minlength: "<br/>パスワードは6文字以上で設定してください",
                equalTo: "<br/>上記のパスワードと異なります。確認してください。"
            },
            blogtitle: "<br/>ブログタイトルを入力してください",
            blogurl: "<br/>ブログURLを入力してください",
            blogdesc: {
							required: "<br/>サイト紹介文を入力してください",
							maxlength: "<br />サイト紹介文は50文字以内で設定してください"
						},
            category: "(要選択)",
            handlename: "<br/>ハンドルネームを入力してください",
            gender: "(要選択)",
            address_publication: "(要選択)",

            agree: "メンバー登録するには、メンバー規約への同意及びプライバシーポリシーをご確認頂く必要があります。<br/>"
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
    <div style="height:50px;"></div>
    <img id="top-mainimg" src="/assets/img/legi-topbanner.jpg" alt="" width="970" height="170" />
  </div><!-- / #header -->


  <div id="contentsbox">
  	<div id="contentsbox-top">
  		<div id="contentsbox-top-left"><div id="contentsbox-top-right"></div><!-- / #contentsbox-top-right --></div><!-- / #contentsbox-top-left -->
  	</div><!-- / #contentsbox-top -->

  	<div id="contentswide">
    	<div id="maincontentwide">
  			<p style="margin:20px 20px 0px 30px; padding: 5px 0 5px 10px; font-size:11pt; font-weight:bold; background-color:aqua; color:navy;">ランキング登録の手順</p>
        <div style="margin:10px 0 0 30px;">
          <table id="currentStep">
            <tr>
              <td><img src="/assets/img/now.gif"></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
          <div class="stepBox">STEP1　情報の入力</div><!-- / #stepBox1 -->
          <table id="stepDetail">
            <tr>
              <td><span>●</span>ランキング登録に必要な情報をご入力いただきます。入力漏れがある場合は、エラーの内容が表示されます。</td>
              <td><span>●</span>入力いただいた情報に間違いがないかご確認して頂きます。</td>
              <td><span>●</span>登録完了です。</td>
            </tr>
          </table>
        </div>

  			<div style="padding-left:30px; float:clear;">
          <p class="title_bar">お客様情報をご入力下さい<span style="font-size:8pt; font-weight:normal; color:black;"><img src="/assets/img/hissu.gif">は必須項目です</span></p>

          <?php if(isset($errors) && count($errors)) {?>
          <?php foreach($errors as $e) { ?>
          <p class="title_bar" style="background-color:white;border:0px"><font color="red"><?php echo $e;?></font></p>
          <?php } ?>
          <?php } ?>

          <form name="fm" class="cmxform" id="signupForm" method="post" action="<?php echo SYSTEM_ROOT_PATH?>/register/confirm" onsubmit="fncClearFields();">
            <input type="hidden" name="act" value="s1">
            <input type="hidden" name="kyoten" value="">

            <table class="entrytable">
              <tr>
              <td class="td_flag"><img src="/assets/img/hissu.gif"></td>
              <td class="td_tag">メールアドレス<br>(ログインID)</td>
              <td class="td_method">[半角英数字]</td>
              <td class="td_input">
                <input id="email" name="email" size="36" maxlength="80"  class="focus" pre="0" value="<?php echo $email;?>"/>
                &nbsp;
                <span class="tooltip">
                  <img style="cursor:pointer;" src="/assets/img/hatena.gif" />
                  <div class="tooltipmsg">
                    ※ログイン用のメールアドレスとなります<br/>
                    ※携帯電話でのメールアドレスをご使用の場合、<br/>　jawhm.or.jpドメインからのメールを受信できるように設定を確認してください<br/>
                    ※次のようなメールアドレスはご利用いただけません。<br/>
                    　１．メールアドレスの @ の直前にピリオド (.) がある<br/>
                    　２． @ より前でピリオドが連続する<br/>
                    　恐れ入りますが、他のメールアドレスでご登録ください。<br/>
                  </div><br/>
                </span>
                <span class="sample">例） mail@jawhm.or.jp</span>
                <div class="postcode">※ご確認のメールをお送りしますので、連絡可能なメールアドレスを入力してください。</div>
              </td>
            </tr>
            <tr>
              <td class="td_flag"><img src="/assets/img/hissu.gif"></td>
              <td class="td_tag">パスワード</td>
              <td class="td_method">[半角英数字]</td>
              <td class="td_input">
                <div class="postcode">※登録後、メンバー専用ページへのログインの際に必要となります。<br/></div>
                <input id="password" name="password" type="password" maxlength="20" />
                &nbsp;
                <span class="tooltip">
                  <img style="cursor:pointer;" src="/assets/img/hatena.gif" />
                  <div class="tooltipmsg">※メンバー専用ページにログインする際のパスワードとなります。<br/></div>
                </span>
                <div class="postcode">※半角英数字６～２０文字で入力してください。</div>
                <input id="confirm_password" name="confirm_password" type="password" maxlength="20" />
                <div class="postcode">※確認の為、同じパスワードを入力してください。</div>
              </td>
            </tr>
            <tr>
              <td class="td_flag"><img src="/assets/img/hissu.gif"></td>
              <td class="td_tag">ブログタイトル</td>
              <td class="td_method"></td>
              <td class="td_input">
                <table class="dummy">
                  <tr><td style="vertical-align:top;"><input id="blogtitle" name="blogtitle" size="36"  class="focus" pre="0" maxlength="25" value="<?php echo $blogtitle;?>"/></td></tr>
                </table>
              </td>
            </tr>
            <tr>
              <td class="td_flag"><img src="/assets/img/hissu.gif"></td>
              <td class="td_tag">ブログURL</td>
              <td class="td_method"></td>
              <td class="td_input">
                <table class="dummy">
                  <tr><td style="vertical-align:top;"><input id="blogurl" name="blogurl" size="50" class="focus" pre="0"  value="<?php echo $blogurl;?>"/></td></tr>
                </table>
              </td>
            </tr>
            <tr>
              <td class="td_flag"></td>
              <td class="td_tag">ブログRSS</td>
              <td class="td_method"></td>
              <td class="td_input">
                <table class="dummy">
                  <tr><td style="vertical-align:top;"><input id="blogrss" name="blogrss" size="50" class="focus" pre="0"  value="<?php echo $blogrss;?>"/></td></tr>
                </table>
              </td>
            </tr>
            <tr>
              <td class="td_flag"><img src="/assets/img/hissu.gif"></td>
              <td class="td_tag">サイト紹介文</td>
              <td class="td_method"></td>
              <td class="td_input">
                <table class="dummy">
                  <tr>
                    <td style="vertical-align:top;">
                      <textarea name="blogdesc" id="blogdesc" cols="30" rows="10"><?php echo $blogdesc;?></textarea>
                      <p class="txtNote">※ 全角 50文字以内。サイトの内容をできるだけ詳しく具体的に。<br>読者が検索しそうなキーワード（単語）もたくさんまぜてください</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td class="td_flag"><img src="/assets/img/hissu.gif"></td>
              <td class="td_tag">参加カテゴリ</td>
              <td class="td_method"></td>
              <td class="td_input">
                <table class="dummy">
                  <tr>
                    <td style="vertical-align:top;">
                      <select name="category" id="category">
                          <?php
                            foreach ($ctg as $val){
                                echo '<option value="'.$val[DB_COLUMN_CATEGORY_ID].'"'.($category == $val ? 'selected' : '').'>'.$val[DB_COLUMN_CATEGORY_NAME].'</option>';
                            }
                          ?>
                      </select>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td class="td_flag"><img src="/assets/img/hissu.gif"></td>
              <td class="td_tag">ハンドル名</td>
              <td class="td_method"></td>
              <td class="td_input">
                <table class="dummy">
                  <tr><td style="vertical-align:top;"><input id="handlename" name="handlename" size="36"  maxlength="25"  class="focus" pre="0"  value="<?php echo $handlename;?>"/></td></tr>
                </table>
              </td>
            </tr>
            <tr>
              <td class="td_flag"><img src="/assets/img/hissu.gif"></td>
              <td class="td_tag">性別</td>
              <td class="td_method"></td>
              <td class="td_input">
               	<select name="gender_flg">
               		<option value="yes" <?php if(!isset($gender_flg) || $gender_flg != 'no') echo 'selected'; ?>>公開</option>
               		<option value="no" <?php if($gender_flg == 'no') echo 'selected'; ?>>非公開</option>
               	</select>&nbsp;
                <input type="radio" id="gender_male" value="m" name="gender" validate="required:true"  <?php if($gender == 'm') echo 'checked'; ?>/>男性 &nbsp;&nbsp;
                <input type="radio" id="gender_female" value="f" name="gender" <?php if(!isset($gender) || $gender != 'm') echo 'checked'; ?>/>女性
                <label for="gender" class="error">性別を選択してください</label>
              </td>
            </tr>
            <tr>
              <td class="td_flag" rowspan="2"><img src="/assets/img/hissu.gif"></td>
              <td class="td_tag" rowspan="2">生年月日</td>
              <td class="td_method" rowspan="2"></td>
              <td class="td_input">
                <input type="radio" id="address_publication" name="bday_publication" value="true" <?php if($bday_publication == 'true') echo 'checked'; ?>>公開
                <select id="y" name="year">
<?php
$max = 100;
for($i = 0;$i < $max;$i++) {
	$y = date('Y')-$i;
	echo '<option value="'.$y.'"'.($y == $year ? ' selected':'').'>'.$y.'</option>';
}
?>

                </select>年
                <select id="m" name="month">
<?php
for($i = 1;$i <= 12;$i++) {
	echo '<option value="'.$i.'"'.($i == $month ? ' selected':'').'>'.$i.'</option>';
}
?>
                </select>月
                <select id="d" name="day">
<?php
for($i = 1;$i <= 31;$i++) {
	echo '<option value="'.$i.'"'.($i == $day ? ' selected':'').'>'.$i.'</option>';
}
?>
                </select>日
                <img src="/assets/img/icon_calendar.gif" id="select_date_calendar_icon"/>
                &nbsp;
                <span class="tooltip">
                  <img style="cursor:pointer;" src="/assets/img/hatena.gif" />
                  <div class="tooltipmsg">※カレンダーアイコンをクリックして簡単に選択して頂くこともできます。</div>
                </span>
              </td>
            </tr>
            <tr>
              <td class="td_input"><input type="radio" id="address_publication" name="bday_publication" value="false" <?php if(!isset($bday_publication) || $bday_publication != 'true') echo 'checked'; ?>>非公開</td>
            </tr>
            <tr>
              <td class="td_flag"></td>
              <td class="td_tag">プロフィール画像</td>
              <td class="td_method"></td>
              <td class="td_input">イメージ写真は、ご登録完了後、マイページからご登録いただけます。</td>
            </tr>
            </table>
            <input type="submit" value="次へ >>" class="btnSubmit" />
          </form>
  			</div>

  <script type="text/javascript">
  SelectCalendar.createOnLoaded({yearSelect: 'y',
  monthSelect: 'm',
  daySelect: 'd'
  },
  {
  startYear: 1970,
  endYear: 2012,
  lang: 'ja',
  triggers: ['select_date_calendar_icon']
  });
  </script>
  </div> <!-- END maincontentwide -->
  </div><!-- END contentswide -->
  </div><!-- END contentsbox -->


  <div id="footer">
  <div id="footer-box">
  <div id="copyright">Copyright© JAPAN Association for Working Holiday Makers All right reserved.</div>
  </div>
  </div>

</body>
</html>

