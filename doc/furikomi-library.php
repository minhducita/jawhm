<?php

require_once '../include/header.php';
$header_obj = new Header();
mb_language("Ja");
mb_internal_encoding("utf8");

$variable = $_POST;
$photo_flat = 0;
$email_method = 'MFC'; // or 'MFC'

$self = $variable['self'];
$qt_input = $variable['qt1_input'] == 0 ? 'いいえ' : 'はい';
//print_r($variable);

function baseUrl() {
    $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 5)) == 'https://' ? 'https://' : 'http://';
    return $protocol . $_SERVER['SERVER_NAME'] . '/';
}

function isNullOrEmptyString($str)
{
    return (!isset($str) || trim($str) === '');
}

function sendMail($email = "", $text = "", $subject = "", $attachments = array(), $cc = 0) 
{
    if(!$email || !$text) {
        return false;
    }
    $headers   = array();
    //$headers[] = "To: {$email}";
    if($cc == 1){
        $headers[] = "From: Japan Association for Working Holiday Makers <info@jawhm.or.jp>". "\r\n" .
        "CC: jizenshinkokusho@jawhm.or.jp";
    }else{
        $headers[] = "From: Japan Association for Working Holiday Makers <info@jawhm.or.jp>";
    }
    
    //$headers[] = "Reply-To: Japan Association for Working Holiday Makers <info@jawhm.or.jp>";
    // $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/" . phpversion();
    $headers[] = "MIME-Version: 1.0";
    if(!empty($attachments)) {
        $boundary = md5(time());
        $headers[] = "Content-type: multipart/mixed; boundary=\"" . $boundary . "\"";
        // Have attachment, different content type and boundary required.
    } else {
        $boundary = md5(time());
        $headers[] = "Content-type: multipart/mixed; boundary=\"" . $boundary . "\"";
    }
    $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>CAPS Consortium</title>
            <style>table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }</style>
        </head>
        <body style="font-family: arial;" width="100%">
            [text]
        </body>
    </html>';
    $generated = date('jS M Y H:i:s');
    $subject = ($subject ? $subject : 'Default Subject');
    $message = $text;
    if(!empty($attachments)) {
        $output   = array();
        $output[] = "--" . $boundary;
        $output[] = "Content-type: text/html; charset=\"iso-8859-1\"";
        $output[] = "Content-Transfer-Encoding: 7bit";
        $output[] = "";
        $output[] = $message;
        $output[] = "";
        foreach($attachments as $attachment) {
            $output[] = "--" . $boundary;
            $output[] = "Content-Type: " . $attachment['type'] . "; name=\"" . $attachment['name'] . "\";";
            if(isset($attachment['encoding'])) {
                $output[] = "Content-Transfer-Encoding: " . $attachment['encoding'];
            }
            $output[] = "Content-Disposition: attachment;";
            $output[] = "";
            $output[] = $attachment['data'];	 
            //$output[] = $attachment['imgup'];
            $output[] = "--1a2a3a--";

        }
        return mb_send_mail($email, $subject, implode("\r\n", $output), implode("\r\n", $headers));
    } else {
        $output   = array();
        $output[] = "--" . $boundary;
        $output[] = "Content-type: text/html; charset=\"iso-8859-1\"";
        $output[] = "Content-Transfer-Encoding: 7bit";
        $output[] = "";
        $output[] = $message;
        $output[] = "";
        return mb_send_mail($email, $subject, implode("\r\n", $output), implode("\r\n", $headers));
    }
}

if (isNullOrEmptyString($variable['short_name']) || isNullOrEmptyString($variable['code_name'])) {
    die();
}

if($variable['qt1_input'] == '0'){
	if (isset($_FILES['imgfile']) && $_FILES['imgfile']['size'] != ""){
        $sourcePath =  $_FILES['imgfile']['tmp_name']; // Storing source path of the file in a variable
        $filename  = basename($_FILES['imgfile']['name']);
		$targetPath = 'uploadimg/'.$filename; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath);
        $photo_flat = 1;
    }
}else{
    if (isset($_FILES['imgfile2']) && $_FILES['imgfile2']['size'] != ""){

        $sourcePath =  $_FILES['imgfile2']['tmp_name']; // Storing source path of the file in a variable
        $filename  = basename($_FILES['imgfile2']['name']);
        $targetPath = 'uploadimg/'.$filename; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath);
        $photo_flat = 1;
    }
}

$html_for_mail = <<<EOF
	
	<html>
	<head>
		<META content='text/html; charset=iso-ISO 639' http-equiv=Content-Type>
		<meta http-equiv='Content-Language' content='ja'>
	</head>
	<body style='width: 595px; font-size: 13px; font-family: area'>
	<style>
		ol, ul { text-align: justify; 
		}
		li p{padding: 0px 0px 0px 0px; margin-top: 5px}
		.lista { list-style-type: upper-roman; }
		.listb{ list-style-type: decimal; font-family: sans-serif; color: blue; font-weight: bold; font-style: italic; font-size: 19pt; }
		.listc{ list-style-type: upper-alpha; padding-left: 25mm; }
		.listd{ list-style-type: lower-alpha; color: teal; line-height: 2; }
		.liste{ list-style-type: disc; }
		.listarabic { direction: rtl; list-style-type: arabic-indic; font-family: sjis; padding-right: 40px;}
	</style>
		<div>お客様番号： <b>{$variable['code_name']}</b></div>
        <div>本人名義での振込： <b>{$qt_input}</b></div>
EOF;
    if($variable['qt1_input'] == 0) {
    $html_for_mail .= <<<EOF
        <div>振込名義人名：<b>{$variable['qt2_text']}</b></div>
EOF;
    }
    if($photo_flat == 1){
        $html_for_mail .= <<<EOF
        <div>添付写真：<b>有り</b></div>
EOF;
    } else {
        $html_for_mail .= <<<EOF
        <div>添付写真：<b>無し</b></div>
EOF;
    }
//echo $html_for_mail; exit;

if($email_method == "MFC"){
    //$subject_original = 'JizenkakuninShinkokusho['. $variable['code_name'] .']';
	$subject_condition = '振込連絡があ利用りました ['. $variable['code_name'] .']';
    $message = $html_for_mail;

    if($photo_flat == 1){
        $file = file_get_contents($targetPath);
        
        //$sendimg = file_get_contents('download/' . $targetPath);
        $encoded_file = chunk_split(base64_encode($file));
        $attachments[] = array(
            'name' => $filename, // Set file name
            'data' => $encoded_file, // File data
            'type' => 'image/jpg', // Type
            'encoding' => 'base64',// Content transfer encoding
            'fileAttach' => $encoded_file
        );
    }
    else {
        $attachments = array();
    }
    //$attachments = array();
	
    if ($variable['short_name'] == 'KT') {
        sendMail('sodan@jawhm.or.jp', $message, $subject_condition, $attachments);
    } elseif ($variable['short_name'] == 'KO') {
        sendMail('sodan-osaka@jawhm.or.jp', $message, $subject_condition, $attachments);
    } elseif ($variable['short_name'] == 'KN') {
        sendMail('sodan-nagoya@jawhm.or.jp', $message, $subject_condition, $attachments);
    } elseif ($variable['short_name'] == 'KF') {
        sendMail('sodan-fukuoka@jawhm.or.jp', $message, $subject_condition, $attachments);
    } elseif ($variable['short_name'] == 'KK') {
        sendMail('sodan-okinawa@jawhm.or.jp', $message, $subject_condition, $attachments);
    } else {
        sendMail('sodan@jawhm.or.jp', $message, $subject_condition, $attachments);
    }
    //sendMail("minhquyen123@gmail.com", $message, $subject_condition, $attachments);
	//sendMail("sodan@jawhm.or.jp", $message, $subject_original, $attachments, 1);
	header('Location: '.baseUrl().$self.'&result=yes');
}
else if( $email_method == "SMTP" ){

}

function sendMail_smpt($mailTo, $message, $title, $subject){
    require '/PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $mail->isSMTP();
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //$mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "minhquyen.jawhm@gmail.com";
    $mail->Password = "M!nhQuy3n";
    $mail->CharSet = "UTF-8";
    $mail->isHTML(true);
    //Set who the message is to be sent from
    $mail->setFrom($emailFrom, 'Japan Association for Working Holiday Makers');

    //Set an alternative reply-to address
    $mail->addReplyTo($emailFrom, 'Japan Association for Working Holiday Makers');

    //Set who the message is to be sent to
    //$mail->addAddress($emailTo, $ent['namae']);
    $mail->addAddress('minhquyen123@gmail.com', $ent['namae']);
    $mail->AddCC($cc);

    $mail->Subject = $emailTitle;
    $mail->Body    = $emailBody;

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}

?>