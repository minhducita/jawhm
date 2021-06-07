<?php

	require_once '../include/header.php';
	$header_obj = new Header();
	mb_language("Ja");
	mb_internal_encoding("utf8");
	//plugin render to PDF
	include('./dompdf/mpdf.php');
	
	$mpdf = new mPDF('','A4',10,'sun-exta');
	// instantiate and use the dompdf class
	//$dompdf = new DOMPDF();

	$variable = $_POST; 
	
	$self = $variable['self'];
	//print_r($variable);

	function baseUrl() {
	    $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 5)) == 'https://' ? 'https://' : 'http://';
	    return $protocol . $_SERVER['SERVER_NAME'] . '/';
	}

	function isNullOrEmptyString($str)
    {
    	return (!isset($str) || trim($str) === '');
    }

    if (isNullOrEmptyString($variable['short_name']) || isNullOrEmptyString($variable['code_name'])) {
    	die();
    }
	
	$html =<<<EOF
	
	<html>
	<head>
		<META content='text/html; charset=iso-ISO 639' http-equiv=Content-Type>
		<meta http-equiv='Content-Language' content='ja'>
	</head>
	<body style='width: 595px; font-size: 11px; font-family: area'>
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
		<img src='
EOF;
		$html .= baseUrl() . 'images/jawhm.gif';
		$html .=<<<EOF
		'>
		<p>この申告書は海外渡航、また渡航のお手続きがスムーズに進むよう、以下の内容を事前にご申告いただくための書類です。 手続きにあたり、大使館・移民局・手配先(語学学校、ホームステイ先、現地オフィス)等に事前申告が必要な事項もございますので、正確にご記入ください。また手続き、手配にあたり、関係機関への申告が必要な場合には、当協会よりいただいた情報を共有することがございますので、ご了承くださいませ。</p>
		<div style='border: 3px solid #000;padding: 10px;margin: 0;font-size: 11px;'>
					<ol style='padding: 0 10px;'>
						<li>
							現在治療中の病気、または心や身体の健康面で不安なことはありますか？　(はい　/　いいえ)
							<p>はいの場合：その詳細、また主治医からの診断結果があれば、それについてもご記入ください。</p>
							<p>
EOF;
							$html .= $variable['qt1_input'] == '1' ? $variable['qt1_text'] : "いいえ";
							
							$html .=<<<EOF
							</p>
						</li>
						<li>
							今までに病気・手術・入院などの経験はありますか？　(はい　/　いいえ)
							<p>はいの場合：その詳細　(時期/病名/現在の症状等) </p>
							<p>
EOF;
							$html .= $variable['qt2_input'] == '1' ? $variable['qt2_text'] : "いいえ";
							
						$html .=<<<EOF
							</p>
						</li>
						<li>
							今までに犯罪歴または逮捕歴はありますか？　(はい　/　いいえ)
							<p>はいの場合：その詳細　(時期/内容等)</p>
							<p>
EOF;
							$html .= $variable['qt3_input'] == '1' ? $variable['qt3_text'] : "いいえ";
			
							$html .=<<<EOF
							</p>
						</li>
						<li>
							今までに海外で3か月以上滞在されたことはありますか？　(はい　/　いいえ)
							<p>はいの場合：国と期間をご記入ください </p>
							<p>
EOF;
							$html .= $variable['qt4_input'] == '1' ? $variable['qt4_text'] : "いいえ";
							
							$html .=<<<EOF
							</p>
						</li>
						<li>
							今までにビザに問題があったこと(ビザ却下、入国拒否、強制送還等)はありますか？　(はい　/　いいえ)
							<p>はいの場合：その詳細</p>
							<p>
EOF;
							$html .= $variable['qt5_input'] == '1' ? $variable['qt5_text'] : "いいえ";
							
							$html .=<<<EOF
							</p>
						</li>
						<li>
							その他、気になることがありますか？  (はい　/　いいえ) 
							<p>
EOF;
							$html .= $variable['qt6_input'] == '1' ? $variable['qt6_text'] : "いいえ";
							$html .=<<<EOF
							</p>
						</li>
					</ol>
				</div>
				<div style='border: 1px solid #000;padding: 10px;margin: 10px 0;font-size: 11px;'>
					
					<p>(1)	上記の内容に相違ありません。</p>
					<p>(2)	以下の内容に同意します</p>
					<p>
						<p>・必要がある場合には、当協会より関係機関に情報を提供します。 </p>
						<p>・虚無の申告があった際には手配をお断りすることがありますが、その際の返金はいたしかねます。</p>
						<p>・今まで、反社会的勢力に該当しないこと、かつ、将来にあたっても該当しないことを確約し、違反した場合、当協会及びその他機関・団体・会社等との取引が無条件かつ一方的に解約されても異議を申しません。また、当協会や関係機関等に損害が生じた場合、いっさいを私の責任とします。</p>
						<p>・ご申告いただきました内容により決定いたしました判断(ビザの発給、語学学校の受け入れ等)につきましては、 当協会では一切の責任を負いかねます。</p>
					</p>
					<div>
						<div style="float: left; width: 50%">
EOF;
						$html .= $variable['check_in_year']."年 ".$variable['check_in_month']."月 ".$variable['check_in_day']."日 <span style='text-decoration:underline'>".$variable['check_in_ct']."</span>";
						
					$html .=<<<EOF
					
						</div>
						
					</div>
					<div style="height: 10px; width: 100%; clear: both"></div>
					
				</div>
				<div style="marfin-top: 20px">
						<p>なお、ご入力いただきました内容は個人情報保護方針(プライバシーポリシー）に基づき、お取り扱いいたします。長面をご一読ください</p>
						<p>協会使用欄</p>
						<table style="border: 1px solid #000;width: 100%; font-size:13px">
							<tr>
								<td width="30%" style="border-right: 1px solid #000;">
									担当者 (1)
									<div style="padding-top: 10px; padding-bottom: 20px">
										&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;日
									</div>
								</td>
								<td width="30%" style="border-right: 1px solid #000;">
									担当者 (2)
									<div style="padding-top: 10px; padding-bottom: 20px">
										&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;日
									</div>
								</td>
								<td style="text-align: center">
									<b>{$variable['code_name']}</b>
								</td>
							<tr>
						</table>
				</div>
	</html>
EOF;

	// Create PDF
	$code_name = $variable['code_name'];
	$code_random = date('Ymdhms');
	
	$name = 'download/'.$code_name.'_'.$code_random.".pdf";

	$mpdf->SetTitle('Jizen pdf file');
	$mpdf->WriteHTML($html);

	$mpdf->Output($name,'F');//I = browser, F = save, D = download
	//$mpdf->Output($name,'D');//I = browser, F = save, D = download
	// END PDF
	$dateCreate = date('Y-m-d h:i:s');
	$ipClient = $_SERVER['REMOTE_ADDR'];
	$dateCheckIn = $variable['check_in_year']."-".$variable['check_in_month']."-".$variable['check_in_day'];
	
	if (!isNullOrEmptyString($variable['qt1_text']) || !isNullOrEmptyString($variable['qt2_text']) || !isNullOrEmptyString($variable['qt3_text']) || !isNullOrEmptyString($variable['qt4_text']) || !isNullOrEmptyString($variable['qt5_text']) || !isNullOrEmptyString($variable['qt6_text'])) {
		$status = "NG";
	}else{
		$status = "OK";
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
		<p><strong>以下の通り、事前確認事項申告書が提出されました。</strong></p>
		<div>お客様番号： <b>{$variable['code_name']}</b></div>
		<div>担当拠点： <b>{$variable['short_name']}</b></div> 
		<div>記入日時： <b>{$dateCreate} </b></div>
		<div>処理ＩＰ： <b>{$ipClient}</b> </div>
		<div>お客様日付： <b>{$dateCheckIn}</b> </div>
		<div>お客様名前: <b>{$variable['check_in_ct']}</b></div>
		<div>総合判定： <b>{$status}</b></div>

		<ol style='padding: 0 10px;'>
						<li>
							現在治療中の病気、または心や身体の健康面で不安なことはありますか？　(はい　/　いいえ)
							<p>はいの場合：その詳細、また主治医からの診断結果があれば、それについてもご記入ください。</p>
							<p>
EOF;
							$html_for_mail .= $variable['qt1_input'] == '1' ? $variable['qt1_text'] : "いいえ";
							
							$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
							今までに病気・手術・入院などの経験はありますか？　(はい　/　いいえ)
							<p>はいの場合：その詳細　(時期/病名/現在の症状等) </p>
							<p>
EOF;
							$html_for_mail .= $variable['qt2_input'] == '1' ? $variable['qt2_text'] : "いいえ";
							
						$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
							今までに犯罪歴または逮捕歴はありますか？　(はい　/　いいえ)
							<p>はいの場合：その詳細　(時期/内容等)</p>
							<p>
EOF;
							$html_for_mail .= $variable['qt3_input'] == '1' ? $variable['qt3_text'] : "いいえ";
			
							$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
							今までに海外で3か月以上滞在されたことはありますか？　(はい　/　いいえ)
							<p>はいの場合：国と期間をご記入ください </p>
							<p>
EOF;
							$html_for_mail .= $variable['qt4_input'] == '1' ? $variable['qt4_text'] : "いいえ";
							
							$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
							今までにビザに問題があったこと(ビザ却下、入国拒否、強制送還等)はありますか？　(はい　/　いいえ)
							<p>はいの場合：その詳細</p>
							<p>
EOF;
							$html_for_mail .= $variable['qt5_input'] == '1' ? $variable['qt5_text'] : "いいえ";
							
							$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
							その他、気になることがありますか？  (はい　/　いいえ) 
							<p>
EOF;
							$html_for_mail .= $variable['qt6_input'] == '1' ? $variable['qt6_text'] : "いいえ";
							$html_for_mail .=<<<EOF
							</p>
						</li>
					</ol>
					<p></p>
			<p><strong>以上</strong></p>
EOF;

	// Start send mail
	$subject_original = 'JizenkakuninShinkokusho['. $variable['code_name'] .']';
	$subject_condition = '[Attention] JizenkakuninShinkokusho['. $variable['code_name'] .']';
	$message = $html_for_mail;
	$file = file_get_contents('download/' . $code_name . '_' . $code_random . '.pdf');
	$encoded_file = chunk_split(base64_encode($file));
	$attachments[] = array(
	    'name' => $code_name . '_' . $code_random . '.pdf', // Set file name
	    'data' => $encoded_file, // File data
	    'type' => 'application/pdf', // Type
	    'encoding' => 'base64' // Content transfer encoding
	);
	
	if (!isNullOrEmptyString($variable['qt1_text']) || !isNullOrEmptyString($variable['qt2_text']) || !isNullOrEmptyString($variable['qt3_text']) || !isNullOrEmptyString($variable['qt4_text']) || !isNullOrEmptyString($variable['qt5_text']) || !isNullOrEmptyString($variable['qt6_text'])) {
		if ($variable['short_name'] == 'KT') {
			sendMail('sodan@jawhm.or.jp', $message, $subject_condition, $attachments);
		} elseif ($variable['short_name'] == 'KO') {
			sendMail('sodan-osaka@jawhm.or.jp', $message, $subject_condition, $attachments);
		} elseif ($variable['short_name'] == 'KN') {
			sendMail('sodan-nagoya@jawhm.or.jp', $message, $subject_condition, $attachments);
		} elseif ($variable['short_name'] == 'KF') {
			sendMail('sodan-fukuoka@jawhm.or.jp', $message, $subject_condition, $attachments);
		} elseif ($variable['short_name'] == 'KK') {
			sendMail('sodan@jawhm.or.jp, sodan-okinawa@jawhm.or.jp', $message, $subject_condition, $attachments);
		} elseif ($variable['short_name'] == 'KY') {
			sendMail('sodan@jawhm.or.jp, sodan-hokuriku@jawhm.or.jp', $message, $subject_condition, $attachments);
		} else {
			sendMail('sodan@jawhm.or.jp', $message, $subject_condition, $attachments);
		}
	}
	sendMail("meminfo@jawhm.or.jp", $message, $subject_original, $attachments, 1);
	
	header('Location: '.baseUrl().$self.'&result=yes');
	
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
	    
	    $headers[] = "Reply-To: Japan Association for Working Holiday Makers <info@jawhm.or.jp>";
	    //$headers[] = "Subject: {$subject}";
	    $headers[] = "X-Mailer: PHP/" . phpversion();
	    $headers[] = "MIME-Version: 1.0";
	    if(!empty($attachments)) {
	        $boundary = md5(time());
	        $headers[] = "Content-type: multipart/mixed; boundary=\"" . $boundary . "\"";
	        // Have attachment, different content type and boundary required.
	    } else {
	        $headers[] = "Content-type: text/html; charset=UTF-8";
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
	    $message = $html;
	    $message = str_replace("[text]", $text, $message);
	    if(!empty($attachments)) {
	        $output   = array();
	        $output[] = "--" . $boundary;
	        $output[] = "Content-type: text/html; charset=\"utf-8\"";
	        $output[] = "Content-Transfer-Encoding: 8bit";
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
	            $output[] = "";
	        }
	        return mail($email, $subject, implode("\r\n", $output), implode("\r\n", $headers));
	    } else {
	        return mail($email, $subject, $message, implode("\r\n", $headers));
	    }
	}
	// End send mail
?>