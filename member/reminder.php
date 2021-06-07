<?php
/*
 * reminder.php
 * 会員登録からN週間がすぎても入金が行われないメンバーへの催促メールを送るモジュールです
 */
header('Content-Type: text/html; charset=utf-8');

define(INTERVAL, 14);

mb_language("Ja");
mb_internal_encoding("utf8");

ini_set("display_errors", "On");

// ＤＢ接続
$ini = parse_ini_file(__DIR__ . '/../../bin/pdo_mail_list.ini', FALSE);
echo 'start<br>';

//メール内容を取得
$subject = "subject";
$body = "body";
try {
    $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query('SET CHARACTER SET utf8');
    $stt = $db->prepare("SELECT text2, text3 FROM mailtext WHERE keycd like 'remind_mail'");
    $stt->execute();
    while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
        $subject = $row["text2"];
        $body = $row["text3"];
    }
} catch (Exception $ex) {
    echo 'メール内容取得エラー';
    exit();
}

$ini = parse_ini_file(__DIR__ . '/../../bin/pdo_member.ini', FALSE);
//メール送信
try {
    $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query('SET CHARACTER SET utf8');
    $stt = $db->prepare("SELECT email, namae, indate, state, id, mailcheck FROM memlist WHERE state = 1 and indate = (CURRENT_DATE() - interval ".INTERVAL." day) order by indate DESC");
    $stt->execute();
    while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
        echo $row["email"]." ".$row["namae"]." ".$row["indate"]." ".$row["state"]."　>>メールを送ります<br>";
        $to = $row["email"];
        $from = mb_encode_mimeheader(mb_convert_encoding("日本ワーキングホリデー協会", "JIS")) . "<info@jawhm.or.jp>";
        $header = "From: " . $from;
        $header .= "\n";
        $header .= "Bcc: toiawase@jawhm.or.jp";

        $email = $row["email"];
        $userid = $row["id"];
        $mailcheck = $row["mailcheck"];
        $url = "http://member.jawhm.or.jp/mem2/payment.php?act=s3&userid=$userid&email=$email&mailcheck=$mailcheck";
        $message = str_replace("{{url}}", $url, $body);

        $message = str_replace("{{name}}", $row["namae"], $message);
        $result = mb_send_mail($to, $subject, $message, $header);
        if($result){
            echo "メール送信成功 |";
        }
        echo $subject." | ".$message."<br>";
    }
} catch (Exception $ex) {
    echo 'メール送信エラー';
    exit();
}
