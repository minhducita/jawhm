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
	   //$protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 5)) == 'https://' ? 'https://' : 'http://';
	    //return $protocol . $_SERVER['SERVER_NAME'] . '';
	    if($_SERVER['HTTPS']){
			return 'https://' . $_SERVER['SERVER_NAME'] . '';
		} else {
			return 'http://' . $_SERVER['SERVER_NAME'] . '';
		}
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
		$html .= baseUrl() . '/images/jawhm.gif';
		$html .=<<<EOF
		'>
		<p>フランスワーキングホリデービザ申請添削サポートに関する確認事項となります。</br>
					ビザの規定に違反する、また虚偽の申請があった場合、メンバーサポートの対象外となります。</br>
					尚、ビザの発給に関して申請の却下など大きなリスクが伴う可能性があります。
					</p>
		<div style='border: 3px solid #000;padding: 10px;margin: 0;font-size: 11px;'>
					<ol style='padding: 0 15px;'>
						<li>
							フランスのワーキングホリデービザは就労目的のビザではないことを十分に理解していますか？　(はい　/　いいえ)
							<p>
EOF;
							$html .= $variable['qt1_input'] == '1' ? "はい" : "いいえ";
							
							$html .=<<<EOF
							</p>
						</li>
						<li>
							フランスワーキングホリデー渡航前に現地の仕事を確定（内定）していますか？　(はい　/　いいえ)
							<p>注意）仕事を事前に確定されている方のビザサポートは規定に反するため原則お受けしておりません  </p>
							<p>
EOF;
							$html .= $variable['qt18_input'] == '1' ?  "はい" : "いいえ";
							
							$html .=<<<EOF
							</p>
						</li>
						<li>
							フランスにて専門職のお仕事を探す予定はありますか？　(はい　/　いいえ)
							<p>注意）専門職のお仕事を希望される場合、ビザの審査が厳しくなる傾向があります。</p>
							<p>
EOF;
							$html .= $variable['qt3_input'] == '1' ? $variable['qt3_text'] : "いいえ";
			
							$html .=<<<EOF
							</p>
						</li>
						<li>
                            フランスワーキングホリデービザ申請（予約）日から渡航予定日の期間は、
                            <p>１か月以上、３か月以内ですか？<p>
                            <p>注意）渡航１か月を切った申請の場合、渡航までにビザの発給が間に合わないリスクが高まります。</p>
						<div style="float: left; width: 50%">
EOF;
						$html .= $variable['qt4_input'] == '1' ? $variable['check_in_year4']."年 ".$variable['check_in_month4']."月 ".$variable['check_in_day4']."日" : "いいえ";
						$html .=<<<EOF
					
						</div>
						</li>
				
						<li>
							今までにビザに問題があったこと(ビザ却下、入国拒否、強制送還等)はありますか？(はい　/　いいえ)
							<p>はいの場合：その詳細</p>
							<p>
EOF;
							$html .= $variable['qt5_input'] == '1' ? $variable['qt5_text'] : "いいえ";
							
							$html .=<<<EOF
							</p>
						</li>
						<li>
							フランス入国日から１年間有効な海外留学保険に加入済（予定）ですか？(はい　/　いいえ) 
							<p>※クレジット付帯保険は不可</p>
							<p>
EOF;
							$html .= $variable['qt6_input'] == '1' ?  "はい" : "いいえ";
							$html .=<<<EOF
							</p>
						</li>
						<li>
							ビザ申請日から１か月以内に発行された自身名義の《残高証明書》を取得（予定）していますか？   (はい　/　いいえ) 
							<p>
EOF;
							$html .= $variable['qt7_input'] == '1' ?  "はい" : "いいえ";
							$html .=<<<EOF
							</p>
						</li>
						<li>
							ビザ申請日から１か月以内に発行され、かつ《健康である/渡航に関して健康に支障がない》と一筆記載がある《健康診断書》を取得（予定）していますか？   (はい　/　いいえ) 
							<p>
EOF;
							$html .= $variable['qt8_input'] == '1' ?  "はい" : "いいえ";
							$html .=<<<EOF
							</p>
						</li>
							<li>
							ビザ申請日から３か月以内の日程でフランス渡航日を確定していますか？ (はい　/　いいえ)
							<p>9月１５日渡航の場合、６月１６日以降の申請日を指定できます。<p>
						
EOF;
						$html .= $variable['qt9_input'] == '1' ? $variable['check_in_year9']."年 ".$variable['check_in_month9']."月 ".$variable['check_in_day9']."日" : "いいえ";
						$html .=<<<EOF
					</p>
						</li>
						<li>
							フランスの滞在先の住所を確定していますか？（短期間でも可能）(はい　/　いいえ)
							<p>注意）ホームステイ先、ホテルの住所など。ご友人宅の住所や実際に滞在しない住所は推奨しません。</p>
							<p>
EOF;
							$html .= $variable['qt10_input'] == '1' ? $variable['qt10_text'] : "いいえ";
							$html .=<<<EOF
							</p>
							<p>滞在先をどのようにするか詳細をご入力ください</p>
						</li>
						<li>
							フランスに滞在しているご家族はいらっしゃいますか？ (はい　/　いいえ)
							<p>
EOF;
							$html .= $variable['qt11_input'] == '1' ? $variable['qt11_text'] : "いいえ";
							$html .=<<<EOF
							</p>
						</li>
						<li>
							過去にフランスに３か月以上滞在したことはありますか？もしくは２回以上の渡航歴がありますか？
							<p>
EOF;
					$html .= $variable['qt12_input'] == '1' ? "ビザの種類：&nbsp;" . $variable['qt12_text1'] . "</br>" : "いいえ ". "</br>" ;
												
					$html .= $variable['qt12_input'] == '1' ? "期間：&nbsp;" . $variable['check_in_year12']."年 ".$variable['check_in_month12']."月 ".$variable['check_in_day12']."日"."&nbsp;&nbsp; ~ &nbsp;&nbsp;" : "";

					$html .= $variable['qt12_input'] == '1' ? $variable['check_in_year121']."年 ".$variable['check_in_month121']."月 ".$variable['check_in_day121']."日"."</br>" : "";

					$html .= $variable['qt12_input'] == '1' ? "回数：&nbsp;" . $variable['qt12_text2'] . "</br>" : "". "</br>";

					$html .= $variable['qt12_input'] == '1' ? "滞在理由：&nbsp;" . $variable['qt12_text3'] : "いいえ". "</br>";
						
							$html .=<<<EOF
							</p>
						</li>
					
							<li>
							滞在目的が《就労》以外となる内容で記入しましたか？ (はい　/　いいえ)
							<p>また、ワーキングホリデービザは就労目的のビザでないことを理解していますか？</p>
							<p>
EOF;
							$html .= $variable['qt13_input'] == '1' ?  "はい" : "いいえ";
							$html .=<<<EOF
							</p>
						</li>
						
						<li>
							協会のビザ添削サポートはビザの発給を保証するものでないことを理解していますか？ (はい　/　いいえ)
							<p>
EOF;
							$html .= $variable['qt14_input'] == '1' ?  "はい" : "いいえ";
							$html .=<<<EOF
							</p>
						</li>
						<li>
							ビザ申請書の提出は東京の在日フランス大使館にオンライン予約後、 
							<p>
EOF;
							$html .= $variable['qt15_input'] == '1' ? $variable['qt15_text'] : "いいえ";
							$html .=<<<EOF
							</p>
						</li>
						
						<li>
							フランスワーキングホリデービザ申請のために必要な書類・申請書を過不足なく揃え、申請用/ご自身保管用にA4サイズのコピーをとっていますか？（必要性を理解していますか？）(はい　/　いいえ)
							<p>
EOF;
							$html .= $variable['qt16_input'] == '1' ? "はい" : "いいえ";
							$html .=<<<EOF
							</p>
						</li>
						<li>
							以上の確認事項に関して不適当な内容、もしくは虚偽の申請があった場合、ビザの発給に関してリスクが発生する可能性があることを理解していますか？ (はい　/　いいえ)
							<p>
EOF;
							$html .= $variable['qt17_input'] == '1' ? "はい" : "いいえ";
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

	//echo $html; exit;

	// Create PDF
	$code_name = $variable['code_name'];
	$code_random = date('Ymdhms');
	
	$name = 'download/francevisa/'.$code_name.'_'.$code_random.".pdf";

	$mpdf->SetTitle('France VISA CheckSheet ');
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
	<body style=' font-size: 13px; font-family: area'>
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

		<ol>
						<li>
						フランスのワーキングホリデービザは就労目的のビザではないことを十分に理解していますか？　(はい　/　いいえ)
							<p>
EOF;
							$html_for_mail .= $variable['qt1_input'] == '1' ? "はい" : "いいえ";
							
							$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
						フランスワーキングホリデー渡航前に現地の仕事を確定（内定）していますか？　(はい　/　いいえ)
						<p>注意）仕事を事前に確定されている方のビザサポートは規定に反するため原則お受けしておりません  </p>
							<p>
EOF;
							$html_for_mail .= $variable['qt18_input'] == '1' ?  "はい" : "いいえ";
							
						$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
						フランスにて専門職のお仕事を探す予定はありますか？　(はい　/　いいえ)
						<p>注意）専門職のお仕事を希望される場合、ビザの審査が厳しくなる傾向があります。</p>
							<p>
EOF;
							$html_for_mail .= $variable['qt3_input'] == '1' ? $variable['qt3_text'] : "いいえ";
			
							$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
						フランスワーキングホリデービザ申請（予約）日から渡航予定日の期間は、
                            <p>１か月以上、３か月以内ですか？<p>
                            <p>注意）渡航１か月を切った申請の場合、渡航までにビザの発給が間に合わないリスクが高まります。</p>
							<p>
EOF;
							$html_for_mail .= $variable['qt4_input'] == '1' ? $variable['check_in_year4']."年 ".$variable['check_in_month4']."月 ".$variable['check_in_day4']."日" : "いいえ";
							
							$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
						今までにビザに問題があったこと(ビザ却下、入国拒否、強制送還等)はありますか？(はい　/　いいえ)
						<p>はいの場合：その詳細</p>
							<p>
EOF;
							$html_for_mail .= $variable['qt5_input'] == '1' ? $variable['qt5_text'] : "いいえ";
							
							$html_for_mail .=<<<EOF
							</p>
						</li>
						<li>
						フランス入国日から１年間有効な海外留学保険に加入済（予定）ですか？(はい　/　いいえ) 
						<p>※クレジット付帯保険は不可</p>
							<p>
EOF;
							$html_for_mail .= $variable['qt6_input'] == '1' ?  "はい" : "いいえ";
							$html_for_mail .=<<<EOF
							</p>
						</li>
					
						<li>
						ビザ申請日から１か月以内に発行された自身名義の《残高証明書》を取得（予定）していますか？   (はい　/　いいえ) 
							<p>
EOF;
				$html_for_mail .= $variable['qt7_input'] == '1' ?  "はい" : "いいえ";
				$html_for_mail .=<<<EOF
									</p>
									</li>
								
						<li>
						ビザ申請日から１か月以内に発行され、かつ《健康である/渡航に関して健康に支障がない》と一筆記載がある《健康診断書》を取得（予定）していますか？   (はい　/　いいえ) 
							<p>
EOF;
								$html_for_mail .= $variable['qt8_input'] == '1' ?  "はい" : "いいえ";
										$html_for_mail .=<<<EOF
										</p>
									</li>
									
								
									<li>
									ビザ申請日から３か月以内の日程でフランス渡航日を確定していますか？ (はい　/　いいえ)
									<p>9月１５日渡航の場合、６月１６日以降の申請日を指定できます。<p> 
									<p>
EOF;
	$html_for_mail .= $variable['qt9_input'] == '1' ? $variable['check_in_year9']."年 ".$variable['check_in_month9']."月 ".$variable['check_in_day9']."日" : "いいえ";
				$html_for_mail .=<<<EOF
										</p>
									</li>
									
							
									<li>
									フランスの滞在先の住所を確定していますか？（短期間でも可能）(はい　/　いいえ)
									<p>注意）ホームステイ先、ホテルの住所など。ご友人宅の住所や実際に滞在しない住所は推奨しません。</p>
									<p>
EOF;
	$html_for_mail .= $variable['qt10_input'] == '1' ? $variable['qt10_text'] : "いいえ";
										$html_for_mail .=<<<EOF
										</p>
										<p>滞在先をどのようにするか詳細をご入力ください</p>
									</li>
									<li>
									フランスに滞在しているご家族はいらっしゃいますか？ (はい　/　いいえ)
									<p>
EOF;
	$html_for_mail .= $variable['qt11_input'] == '1' ? $variable['qt11_text'] : "いいえ";
										$html_for_mail .=<<<EOF
										</p>
									</li>
									<li>
									過去にフランスに３か月以上滞在したことはありますか？もしくは２回以上の渡航歴がありますか？
								<p>
EOF;
	$html_for_mail .= $variable['qt12_input'] == '1' ? "ビザの種類：&nbsp;" . $variable['qt12_text1'] . "</br>" : "いいえ ". "</br>" ;
							
	$html_for_mail .= $variable['qt12_input'] == '1' ? "期間：&nbsp;" . $variable['check_in_year12']."年 ".$variable['check_in_month12']."月 ".$variable['check_in_day12']."日"."&nbsp;&nbsp; ~ &nbsp;&nbsp;" : "";

	$html_for_mail .= $variable['qt12_input'] == '1' ? $variable['check_in_year121']."年 ".$variable['check_in_month121']."月 ".$variable['check_in_day121']."日"."</br>" : "";

	$html_for_mail .= $variable['qt12_input'] == '1' ? "回数：&nbsp;" . $variable['qt12_text2'] . "</br>" : "". "</br>";

	$html_for_mail .= $variable['qt12_input'] == '1' ? "滞在理由：&nbsp;" . $variable['qt12_text3'] : "いいえ". "</br>";
										$html_for_mail .=<<<EOF
										</p>
									</li>
									<li>
									滞在目的が《就労》以外となる内容で記入しましたか？ (はい　/　いいえ)
									<p>また、ワーキングホリデービザは就労目的のビザでないことを理解していますか？</p>
									<p>
EOF;
$html_for_mail .= $variable['qt13_input'] == '1' ?  "はい" : "いいえ";
										$html_for_mail .=<<<EOF
										</p>
									</li>
									
									<li>
									協会のビザ添削サポートはビザの発給を保証するものでないことを理解していますか？ (はい　/　いいえ)
									<p>
EOF;
$html_for_mail .= $variable['qt14_input'] == '1' ?  "はい" : "いいえ";
										$html_for_mail .=<<<EOF
										</p>
									</li>
								
									<li>
									ビザ申請書の提出は東京の在日フランス大使館にオンライン予約後、
									<p>
EOF;
$html_for_mail .= $variable['qt15_input'] == '1' ? $variable['qt15_text'] : "いいえ";
										$html_for_mail .=<<<EOF
										</p>
									</li>
									
									<li>
									フランスワーキングホリデービザ申請のために必要な書類・申請書を過不足なく揃え、申請用/ご自身保管用にA4サイズのコピーをとっていますか？（必要性を理解していますか？）(はい　/　いいえ) 
									<p>
EOF;
$html_for_mail .= $variable['qt16_input'] == '1' ? "はい" : "いいえ";
										$html_for_mail .=<<<EOF
										</p>
									</li>
									<li>
									以上の確認事項に関して不適当な内容、もしくは虚偽の申請があった場合、ビザの発給に関してリスクが発生する可能性があることを理解していますか？ (はい　/　いいえ)
									<p>
EOF;
$html_for_mail .= $variable['qt17_input'] == '1' ? "はい" : "いいえ";
										$html_for_mail .=<<<EOF
										</p>
									</li>
					</ol>
								
EOF;

	// Start send mail
	$subject_original = 'JizenkakuninShinkokusho['. $variable['code_name'] .']';
	$subject_condition = 'France VISA CheckSheet';
	$message = $html_for_mail;
	$file = file_get_contents('download/francevisa/' . $code_name . '_' . $code_random . '.pdf');
	$encoded_file = chunk_split(base64_encode($file));
	$attachments[] = array(
	    'name' => $code_name . '_' . $code_random . '.pdf', // Set file name
	    'data' => $encoded_file, // File data
	    'type' => 'application/pdf', // Type
	    'encoding' => 'base64' // Content transfer encoding
	);

	//(!isNullOrEmptyString($variable['qt1_text']) || !isNullOrEmptyString($variable['qt2_text']) || !isNullOrEmptyString($variable['qt3_text']) || !isNullOrEmptyString($variable['qt4_text']) || !isNullOrEmptyString($variable['qt5_text']) || !isNullOrEmptyString($variable['qt6_text'])) {
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
		} else {
			//sendMail('sodan@jawhm.or.jp', $message, $subject_condition, $attachments);
		}
	//}
	
	//sendMail("meminfo@jawhm.or.jp", $message, $subject_original, $attachments, 1);
	//sendMail("meminfo@jawhm.or.jp", $message, $subject_original, $attachments, 1);
	sendMail('meminfo@jawhm.or.jp', $message, $subject_condition, $attachments); 
	header('Location: '.baseUrl().$self.'&result=yes');
	
	function sendMail($email = "", $text = "", $subject = "", $attachments = array(), $cc = 0) 
	{
	    if(!$email || !$text) {
	        return false;
	    }
	    $headers   = array();
	    //$headers[] = "To: {$email}";
		//if($cc == 1){
			//$headers[] = "From: Japan Association for Working Holiday Makers <info@jawhm.or.jp>". "\r\n" .
			//"CC: meminfo@jawhm.or.jp";
		//}else{
			$headers[] = "From: Japan Association for Working Holiday Makers <info@jawhm.or.jp>";
		//}
	    
	    $headers[] = "Reply-To: Japan Association for Working Holiday Makers <info@jawhm.or.jp>";
	    // $headers[] = "Subject: {$subject}";
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