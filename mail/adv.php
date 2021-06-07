<?php
ini_set("display_errors", "On");
header('Access-Control-Allow-Origin:*');
mb_language("Ja");
mb_internal_encoding("utf8");

$to = "contact-adv@jawhm.or.jp";
        
$postalCode = @$_POST['postal_code_province'] . @$_POST['postal_code_house'];
$phoneNumber = @$_POST['first_number_phone'] . "-" . @$_POST['midle_number_phone'] . "-" . @$_POST['last_number_phone'];

$subject = "お問い合わせフォーム";

$body  = '';
$body .= '日本ワーキングホリデー協会です。';
$body .= chr(10);
$body .= 'お問い合わせフォームの内容：';
$body .= chr(10);
$body .= chr(10);
$body .= '企業名：　' . @$_POST['company_name'];
$body .= chr(10);
if (@$_POST['rd_company_name'] != "") {
    $body .= '企業名（ヨミ）：　' . @$_POST['rd_company_name'];
    $body .= chr(10);
}
$body .= '企業種別：　' . @$_POST['type_company'];
$body .= chr(10);
$body .= 'ご担当者名：';
$body .= chr(10);
$body .= '      （姓）:' . @$_POST['surname'];
$body .= chr(10);
$body .= '      （名）:' . @$_POST['firstname'];
$body .= chr(10);
if ((@$_POST['rd_surname'] != "") || (@$_POST['rd_firstname'] != "")) {
    $body .= 'ご担当者名（ヨミ）：';
    $body .= chr(10);
    $body .= '      （姓）:' . @$_POST['rd_surname'];
    $body .= chr(10);
    $body .= '      （名）:' . @$_POST['rd_firstname'];
    $body .= chr(10);
}
if ($postalCode != "") {
    $body .= '郵便番号：　' . $postalCode;
    $body .= chr(10);
    $body .= 'ご住所：　' . @$_POST['address'];
    $body .= chr(10);
}
$body .= 'お電話番号：　' . $phoneNumber;
$body .= chr(10);
$body .= 'メールアドレス：　' . @$_POST['mail'];
$body .= chr(10);
$body .= 'ご希望の連絡方法：';
foreach (@$_POST['type_contact'] as $key => $contact) {
    $body .= chr(10);
    $body .= "      　" . $contact;
}
$body .= chr(10);
$body .= 'お問い合わせ内容：　' . @$_POST['txt_inquiry'];
$body .= chr(10);

$from = mb_encode_mimeheader(mb_convert_encoding("日本ワーキングホリデー協会","JIS"))."<info@jawhm.or.jp>";

mb_send_mail($to,$subject,$body,"From:".$from);

?>