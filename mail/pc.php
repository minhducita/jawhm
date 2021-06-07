﻿<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page = 'メール会員';
$header_obj->description_page = '語学学校（海外・国内）：オーストラリア・ニュージーランド・カナダを初めとしたワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。';
$header_obj->keywords_page = 'オーストラリア,ニュージーランド,カナダ,カナダ,韓国,フランス,ドイツ,イギリス,アイルランド,デンマーク,台湾,香港,ビザ,取得,方法,申請,手続き,渡航,外務省,厚生労働省,最新,ニュース,大使館';
$header_obj->add_js_files = '<script type="text/javascript" src="/js/jquery.corner.js"></script>
<script type="text/javascript">
$(function () {
	$("#div_mail").corner();
});</script>';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'メール会員募集中';

$header_obj->display_header();

$sec_title = "メール会員";
if(isset($_GET['m'])){
    $sec_title = "配信停止フォーム";
}
?>
<div id="maincontent">
    <?php echo $header_obj->breadcrumbs(); ?>

    <h2 class="sec-title"><?php echo $sec_title ?></h2>
    <div id="sitemapbox">

        <?php
//ini_set( "display_errors", "On");

        mb_language("Ja");
        mb_internal_encoding("utf8");

        $act = @$_POST['act'];
        $vcheck = @$_GET['u'];
        if ($vcheck == '') {
            $vcheck = @$_POST['vcheck'];
        }
        $chkmail = @$_GET['m'];
        if ($chkmail == '') {
            $chkmail = @$_POST['chkmail'];
        }

        $msg = '';
        if ($act == 'upd') {
            $vname1 = @$_POST['vname1'];
            if ($vname1 == '') {
                $vname1 = 'ワーホリ';
            }

            $vsend = @$_POST['vsend'];
            $riyu = @$_POST['riyu'];
            if (mb_strlen($riyu) == "") {
//                $msg = 'エラー：お名前は２０文字以内で入力してください。';
                $msg = 'エラー：メール会員退会理由を選択してください。';
            } else {
                try {
                    $ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
                    $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $db->query('SET CHARACTER SET utf8');
//                    $sql = 'UPDATE maillist SET haihai = 1, vname1 = :vname1 , vsend = :vsend , vstat = :vstat , udate = :udate WHERE vcheck = :vcheck';
                    $sql = 'UPDATE maillist SET haihai = 1, vname1 = :vname1, vsend = 0 , riyu = :riyu , vstat = :vstat , udate = :udate WHERE vcheck = :vcheck';
                    $stt2 = $db->prepare($sql);
                    $stt2->bindValue(':vcheck', $vcheck);
                    $stt2->bindValue(':vname1', $vname1);
                    $stt2->bindValue(':riyu', $riyu);
                    //$stt2->bindValue(':vsend', 0);
                    $stt2->bindValue(':vstat', '登録');
                    $stt2->bindValue(':udate', date('Y/m/d'));
                    $stt2->execute();

                    // メアドでの一括更新
//                    $sql = 'UPDATE maillist SET haihai = 1, vsend = :vsend , vstat = :vstat , udate = :udate WHERE vmail = :vmail';
                    $sql = 'UPDATE maillist SET haihai = 1 , vstat = :vstat , udate = :udate, vsend = 0 WHERE vmail = :vmail';
                    $stt2 = $db->prepare($sql);
                    //$stt2->bindValue(':vsend', 0);
                    $stt2->bindValue(':vstat', '登録');
                    $stt2->bindValue(':udate', date('Y/m/d'));
                    $stt2->bindValue(':vmail', $chkmail);
                    $stt2->execute();

                    $db = NULL;
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
                $msg = '登録内容を変更しました。';
            }
        }

        if ($msg != '') {
            ?>
            <div id="msg" class="short-msg">
                <?php print $msg; ?>
            </div>
            <script>
                var tim = null;
                var wid = 500;
                tim = setTimeout('fnc_msg()', 3000);
                function fnc_msg() {
                    clearTimeout(tim);
                    tim = setTimeout('fnc_msg_2()', 20);
                }
                function fnc_msg_2() {
                    clearTimeout(tim);
                    wid = wid - 30;
                    if (wid <= 0) {
                        document.getElementById('msg').style.display = 'none';
                    } else {
                        document.getElementById('msg').innerHTML = '';
                        document.getElementById('msg').style.width = wid + 'px';
                        tim = setTimeout('fnc_msg_2()', 20);
                    }
                }
            </script>

            <?php
        }

        try {
            $ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
            $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->query('SET CHARACTER SET utf8');
            $stt = $db->prepare('SELECT vmail, vname1, vsend, vstat FROM maillist WHERE vcheck = :vcheck');
            $stt->bindValue(':vcheck', $vcheck);
            $stt->execute();
            $idx = 0;
            while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                $idx++;
                if (md5($row['vmail']) == @$_GET['m']) {
                    $chkmail = $row['vmail'];
                }
            }
            $db = NULL;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        try {
            $ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
            $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->query('SET CHARACTER SET utf8');
            $stt = $db->prepare('SELECT vmail, vname1, vsend, vstat FROM maillist WHERE vcheck = :vcheck AND vmail = :chkmail');
            $stt->bindValue(':chkmail', $chkmail);
            $stt->bindValue(':vcheck', $vcheck);
            $stt->execute();
            $idx = 0;
            while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                $idx++;

                if ($row['vstat'] == '仮登録') {
                    ?>
                    <p>お名前を入力して、登録ボタンを押して下さい。</p>
                    <?php
                } else {
                    ?>
                    <p>登録内容を修正して、登録ボタンを押してください。</p>
                    <?php
                }
                ?>

                <p>&nbsp;</p>
                <form action="./pc.php" method="POST">
                    <table class="mailtable">
                        <tr>
                            <td class="mailtable-label">登録メールアドレス</td>
                            <td class="mailtable-data">
                                <input style="border: none; background-color: transparent; width: 100%;" class="readonly-text" type="text" size="20" maxlength="20" value="<?php print $row['vmail']; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="mailtable-label">メール会員退会理由</td>
                            <td class="mailtable-data">
                                <select id="riyu" name="riyu">
                                    <option value="">選択してください</option>
                                    <option value="メルマガの配信頻度が多い">メルマガの配信頻度が多い</option>
                                    <option value="内容がおもしろくない">内容がおもしろくない</option>
                                    <option value="メルマガの内容が合わない">メルマガの内容が合わない</option>
                                    <option value="別のサービスを利用することになった">別のサービスを利用することになった</option>
                                    <option value="ワーホリ・留学に行く予定がなくなった">ワーホリ・留学に行く予定がなくなった</option>
                                    <option value="もう出発する/出発したので必要なくなった">もう出発する/出発したので必要なくなった</option>
                                    <option value="サイトを訪問する時間がない">サイトを訪問する時間がない</option>
                                    <option value="その他">その他</option>
                                </select>
                            </td>
                        </tr>
                        <!--<tr>-->
                            <!--<td class="mailtable-label">お名前（ニックネーム可）</td>-->
                            <!--<td class="mailtable-data">-->
                                <!--<input id="onamae" name="vname1" type="text" size="20" maxlength="20" value="<?php // print $row['vname1']; ?>"> さん</td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td class="mailtable-label">配信状態</td>-->
                            <!--<td class="mailtable-data">-->
                                <?php
//                                if ($row['vstat'] == '登録') {
//                                    if ($row['vsend'] == '1') {
//                                        print '<input type="radio" name="vsend" value="1" checked>配信　';
//                                        print '<input type="radio" name="vsend" value="0">配信停止';
//                                    } else {
//                                        print '<input type="radio" name="vsend" value="1">配信　';
//                                        print '<input type="radio" name="vsend" value="0" checked>配信停止';
//                                    }
//                                } else {
//                                    print '仮登録';
//                                    print '<input type="hidden" name="vsend" value="1">';
//                                }
                                ?>
                            <!--</td>-->
                        <!--</tr>-->
                        <tr>
                            <td colspan="2" style="text-align:center;">
                                <input type="hidden" name="act" value="upd">
                                <input type="hidden" name="vstat" value="<?php print $row['vstat']; ?>">
                                <input type="hidden" name="vname1" value="<?php print htmlspecialchars($row['vname1']); ?>">
                                <input type="hidden" name="chkmail" value="<?php print htmlspecialchars($row['vmail']); ?>">
                                <input type="hidden" name="vcheck" value="<?php print $vcheck; ?>">
                                <input type="submit" value="配信停止" style="width:80px; height:30px;">
                            </td>
                        </tr>
                    </table>
                </form>

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>【ご注意】</p>
                <p>システムの都合上、配信状態を「配信停止」に変更した後、４８時間程度はメールが送信されてしまう可能性があります。恐れ入りますがご了承ください。</p>
                <p>&nbsp;<br/>また、メールアドレスの変更は出来ません。<br/>変更する場合は、配信停止をした後、<a target="_blank" href="/mail">こちらの手順</a>で新しいメールアドレスを登録してください。</p>
                <p></p>
                <p></p>
                <?php
            }

            $db = NULL;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        if ($idx == 0) {
            ?>
            <p>メール会員になりませんか？</p>
            <p>&nbsp;</p>
            <p>各国のビザ情報、現地情報、セミナー情報、その他ワーキングホリデーに役立つ情報をメールで配信します。<br /><br /></p>

            <p>登録料・年会費等は一切不要です。<img src="../images/qr-reg.gif" style="float:right;"></p>
            <p>登録方法は簡単です</p>
            <p>　　１． reg@jawhm.or.jp に空メールを送信してください。</p>
            <p>　　２． 登録用のＵＲＬが送られてくるので、お名前を登録してください。</p>
            <p>　　　　 以上で完了です。</p>

            <p>
                <br />
                【ご注意：携帯で登録される方へ】<br/>
            		　　ＵＲＬが記載されたメールをお送りしますので、<br/>
            		　　ＰＣメールの拒否設定等を行っている場合は、解除してから空メールをお送りください。<br/>
            		　　また、ドメイン規制を行っている場合は、 jawhm.or.jp のドメインを許可してください。<br/>
            </p>

            <?php
        }
        ?>

        <div style="height:10px;">&nbsp;</div>
    </div>

    <script>
        function fnc_onlinesemi() {
            obj = document.getElementById('mailad');
            if (obj.value == '') {
                alert('メールアドレスを入力してください');
                obj.focus();
                return false;
            }
            if (!obj.value.match(/^[A-Za-z0-9]+[\w-]+@[\w\.-]+\.\w{2,}$/)) {
                alert("メールアドレスをご確認ください。");
                obj.focus();
                return false;
            }
            return true;
        }
    </script>

    <!--<h2 id="onlinesemi" class="sec-title">オンラインセミナーに参加</h2>-->
    <div id="sitemapbox">
        <!--<p>-->
            <!--日本ワーキング・ホリデー協会のセミナーをネット上で見ることが出来ます。<br/>-->
            <!--オンラインセミナーの開催日程は、<a href="../seminar.html">無料セミナー情報</a>をご確認ください。<br/>-->
        <!--</p>-->
        <?php
        if ($act == 'onlinesemi') {
            
            function getRandomString($nLengthRequired = 8) {
                $sCharList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
                mt_srand();
                $sRes = "";
                for ($i = 0; $i < $nLengthRequired; $i++)
                    $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
                return $sRes;
            }

            $vmail = @$_POST['mailad'];
            if ($vmail == '') {
                $msg = 'メールアドレスが不正です。';
            } else {
                try {
                    $ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
                    $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $db->query('SET CHARACTER SET utf8');
                    $stt = $db->prepare('SELECT vcheck FROM semilist WHERE vmail = "' . $vmail . '"');
                    $stt->execute();
                    $idx = 0;
                    while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                        $idx++;
                        $vcheck = $row['vcheck'];
                    }
                    $db = NULL;
                } catch (PDOException $e) {
                    die($e->getMessage());
                }

                if ($idx > 0) {
                    // 更新
                    try {
                        $ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
                        $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $db->query('SET CHARACTER SET utf8');
                        $sql = 'UPDATE semilist SET udate = :udate WHERE vmail = :vmail';
                        $stt2 = $db->prepare($sql);
                        $stt2->bindValue(':vmail', $vmail);
                        $stt2->bindValue(':udate', date('Y/m/d'));
                        $stt2->execute();
                        $db = NULL;
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                } else {
                    // 追加
                    $vcheck = getRandomString(30);
                    try {
                        $ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
                        $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $db->query('SET CHARACTER SET utf8');
                        $sql = 'INSERT INTO semilist (vmail, cdate, udate, itimes, vcheck) VALUES (:vmail, :cdate, :udate, :itimes, :vcheck)';
                        $stt2 = $db->prepare($sql);
                        $stt2->bindValue(':vmail', $vmail);
                        $stt2->bindValue(':cdate', date('Y/m/d'));
                        $stt2->bindValue(':udate', date('Y/m/d'));
                        $stt2->bindValue(':itimes', '0');
                        $stt2->bindValue(':vcheck', $vcheck);
                        $stt2->execute();
                        $db = NULL;
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                }

                $subject = "オンラインセミナーの情報をお送りします";

                $body = '';
                $body .= '日本ワーキングホリデー協会です。';
                $body .= chr(10);
                $body .= chr(10);
                $body .= 'オンラインセミナーへの御参加ありがとうございます。';
                $body .= chr(10);
                $body .= '次のＵＲＬのページを開いてセミナーをお聞きください。';
                $body .= chr(10);
                $body .= chr(10);
                $body .= 'http://www.jawhm.or.jp/semi/?u=' . $vcheck . '&m=' . md5($vmail);
                $body .= chr(10);
                $body .= chr(10);
                $body .= '◆このメールに覚えが無い場合◆';
                $body .= chr(10);
                $body .= '他の方がメールアドレスを間違えた可能性があります。';
                $body .= chr(10);
                $body .= 'お手数ですが、 info@jawhm.or.jp までご連絡頂ければ幸いです。';
                $body .= chr(10);
                $body .= '';
                $from = mb_encode_mimeheader(mb_convert_encoding("日本ワーキングホリデー協会", "JIS")) . "<info@jawhm.or.jp>";
                mb_send_mail($vmail, $subject, $body, "From:" . $from);

                $msg = 'ご指定のメールアドレスにＵＲＬを送信しました。';
            }

            if ($msg != '') {
                ?>
                <div id="msg" class="short-msg">
                    <?php print $msg; ?>
                </div>
                <script>
                    var tim = null;
                    var wid = 500;
                    tim = setTimeout('fnc_msg()', 3000);
                    function fnc_msg() {
                        clearTimeout(tim);
                        tim = setTimeout('fnc_msg_2()', 20);
                    }
                    function fnc_msg_2() {
                        clearTimeout(tim);
                        wid = wid - 30;
                        if (wid <= 0) {
                            document.getElementById('msg').style.display = 'none';
                        } else {
                            document.getElementById('msg').innerHTML = '';
                            document.getElementById('msg').style.width = wid + 'px';
                            tim = setTimeout('fnc_msg_2()', 20);
                        }
                    }
                </script>

                <?php
            }
        }
        ?>
        <!--<div class="yellowblock">-->

            <!--<p>こちらのサービスは、現在、メンバー登録済みの方向けのサービスとなっております。</p>-->
            <!--<p><a href="/mem">メンバー登録はこちらからお願いいたします。</a></p>-->

            <!--
                                    <p>オンラインセミナーへの参加方法</p>
                                    <p>　　１． 以下のフォームに、あなたのメールアドレスを入力してください。</p>
                                    <p>　　２． オンラインセミナー表示用のＵＲＬを、ご指定のメールアドレスに送信致しますので、</p>
                                    <p>　　　　 受信したメールの内容を確認してください。</p>
                                    <p>&nbsp;</p>
            
                                    <div id="div_mail" style="border:2px solid orange; padding: 5px 20px 5px 20px; width:420px;">
                                            <form action="./pc.php#onlinesemi" method="post" onsubmit="return fnc_onlinesemi();" style="font-size:10pt;">
                                                    メールアドレス&nbsp;&nbsp;
                                                    <input type="text" value="" size="40" id="mailad" name="mailad">
                                                    <input type="submit" value="送信" style="width:80px;">
                                                    <input type="hidden" name="act" value="onlinesemi">
                                            </form>
                                    </div>
                                    <p>&nbsp;</p>
                                    <p>
                                            【ご注意】<br/>
				　　オンラインセミナーは、携帯からご覧いただくことは出来ません。<br/>
				　　ＰＣのメールアドレスをご利用ください。<br/>
                                    </p>
            -->
        <!--</div>-->

        <div style="height:10px;">&nbsp;</div>
    </div>

    <div class="top-move">
        <p><a href="#header">▲ページのＴＯＰへ</a></p>
    </div>
    <div class="advbox03"><p>108</p></div>	  
    <div class="advbox03"><p>109</p></div>	  
</div>
</div>
</div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>
