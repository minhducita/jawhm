<?php
ini_set( 'display_errors', 0 );
// 一般メニュー読み込み
require 'php/fnc_menu.php';
set_time_limit(0);

$subject_r = "件名";
$body_r = "本文";
$message = "";

if(isset($_POST["subject"])){
    $subject_r = $_POST["subject"];
    $body_r = $_POST["body"];
    try {
        $sql = "UPDATE mailtext SET text2 = '".$subject_r."', text3 = '".$body_r."' where keycd = 'remind_mail'";
        $stt = $db->prepare($sql);
        $stt->execute();
        $message = "<p>メール内容を更新しました。</p>";
    } catch (Exception $ex) {}
}else{
    try {
        $sql = "SELECT text2, text3 FROM mailtext WHERE keycd like 'remind_mail'";
        $stt = $db->prepare($sql);
        $stt->execute();
        while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
            $subject_r = $row["text2"];
            $body_r = $row["text3"];
        }
    } catch (Exception $ex) {}
}


$body_title[] .= '会員登録　未入金者向けリマインダーメール　編集画面';
$action = $url_base."main/remindmail";
$body[] .= <<<EOF
        <form method="POST" action="$action">
            件名：<br />
            <input type="text" name="subject" size="80" maxlength="255" value="$subject_r"/><br />
            本文：<br />
            {{name}}で仮会員の名前を挿入できます。<br/>
            <textarea name="body" cols="80" rows="20">$body_r</textarea>
            <br />
            <input type="submit" name="submit" value="保存" />
	</form>
        $message
EOF;
