<?php 

mb_language("Ja");
mb_internal_encoding("utf8");
$method_email = 'smtp'; //or 'mail' to use mailsend normal

define( "dateSet", date('Y-m-d', strtotime('-2 day')));
$dateBefore = dateSet.' 00:00:00';
$dateAfter  = dateSet.' 23:59:59';

define( "tomorow", date('Y-m-d', strtotime('+1 day')));
define( "twoweek", date('Y-m-d', strtotime('+14 day')));
define( "end_of_7_day_first", date('Y-m-d', strtotime('+7 day')));
define( "begin_of_7_day_last", date('Y-m-d', strtotime('+8 day')));
//echo end_of_7_day_first."----------".begin_of_7_day_last; exit;

	function check_another_seminar( $DB, $ent )
	{
		//$query = "SELECT entry.id\n";
		$query = "SELECT *\n";
		$query .= "FROM entrylist AS entry LEFT JOIN event_list AS event ON entry.seminarid = event.id\n";
		$query .= "WHERE entry.stat IN(0,1,2) AND entry.email = '".$ent[email]."' AND event.k_use = 1\n";
		$query .= "AND event.hiduke >= '".dateSet."'\n";

		$stt = $DB->query( $query );
		//$count = $stt->rowCount();

		if( $stt->rowCount() > 0)
		{
			return 1;
		}
		else 
			return 0;
	};
	function get_email_template($DB, $keycd )
	{
		if(!$keycd){
			echo "ERROR: cannot define keycd!";
			return false;
		}

		$sql = "SELECT * FROM mailtext WHERE keycd = '".$keycd."' LIMIT 0,1";
		$res = $DB->query( $sql );
		$row = $res->fetch(PDO::FETCH_ASSOC);
		return $row;
	};
	function convert_to_text( $val )
	{
		$val = stripslashes($val);
		$val = strip_tags($val);
		if( mb_strlen($val) > 400){
			$val = mb_substr($val, 0, 400).'...';
		}
		return $val;
	};
	function convert_datestring( $day )
	{
		setlocale(LC_ALL, "ja_JP.utf8"); 
		$date_format = "%Y年%m月%d日 (%a曜日)";    
		
		$day = strtotime($day);

		return strftime($date_format, $day);
	};
	function object_random( $object, $num ){
		if(count($object) <= 1) return $object;

		$n_choose = array();
		$a_choose = array_rand($object, $num);

		if( $num > 1 ){
			foreach($a_choose as $k=>$v){
				foreach($object as $i=>$j){
					if($v == $i){
						$n_choose[$v] = $j;
					}
				}
			}
		}
		else {
			foreach($object as $i=>$j){
				if($a_choose == $i){
					$n_choose[$a_choose] = $j;
				}
			}
		}
		
		return $n_choose;
	};

	function get_random_same_day( $inputs ){
		if(count($inputs) <= 1) return $inputs;
		$a = array();
		$b = array();
		$output = array();
		$arrdupp = array_unique($inputs);
		$arrdupp = array_values($arrdupp);
		for( $i=0; $i <= count($arrdupp); $i++){
			foreach($inputs as $k => $v){
				if($v == $arrdupp[$i]){
					$a[$i][$k] = $v;
				}
			}
		}
		for( $u=0; $u < count($a); $u++ ){
			$b[] = object_random($a[$u], 1);
		}
		foreach($b as $key => $val){
			foreach($val as $k => $v){
				$output[$k] = $v;
			}
		}
		return $output;
	}

	function find_recommend_seminar( $DB, $ent )
	{
		$query  =  "SELECT id, hiduke, place, k_title1, k_title2, k_desc1, k_desc2\n";
		$query .= "FROM event_list \n";
		$query .= "WHERE place = '".$ent[place]."'\n";
		$query .= "AND k_use = 1\n";
		$query .= "AND (hiduke >= '".tomorow."' AND hiduke <= '".twoweek."')\n";
		$query .= "AND hiduke != ".$ent['hiduke_of_cancel']."\n";
		
		//if( $ent['k_desc2'] == "初心者" ||  $ent['k_desc2'] == "プランニング" || $ent['k_desc2'] == "渡航相談会"){
		if( strpos($ent['k_desc2'], "初心者") !== FALSE || strpos($ent['k_desc2'], "プランニング") !== FALSE || strpos($ent['k_desc2'], "渡航相談会") !== FALSE){
			$query .= "AND k_desc2 LIKE '%".$ent['k_desc2']."%' \n";
		} else
			$query .= "AND k_desc2 NOT LIKE '%初心者%' AND k_desc2 NOT LIKE '%プランニング%' AND k_desc2 NOT LIKE '%渡航相談会%' \n";

		$stt = $DB->query( $query );
		$numsmnr = $stt->rowCount();

		if( $numsmnr > 0)
		{
			while($row = $stt->fetch(PDO::FETCH_ASSOC))
			{
				$row['datestring'] = convert_datestring($row['hiduke']);
				//$seminar[] = $row;
				$seminar[$row['id']] = array(
					'id'        => $row['id'],
					'hiduke'    => $row['hiduke'],
					'place'     => $row['place'],
					'k_title1'  => $row['k_title1'],
					'k_title2'  => $row['k_title2'],
					'k_desc1'   => convert_to_text($row['k_desc1']),
					'k_desc2'   => $row['k_desc2'],
					'datestring' => convert_datestring($row['hiduke'])
				);

				$source_to_handel[$row['id']] = $row['hiduke'];

			}; //end while
			# STEP.5 ###################
			//START find hiduke not duplicate
			$dupes = array();

			natcasesort($source_to_handel);
			reset($source_to_handel);
		
			$old_key   = NULL;
			$old_value = NULL;
			foreach ($source_to_handel as $key => $value) {
				if ($value === NULL) { continue; }
				if (strcasecmp($old_value, $value) === 0) {
					$dupes[$old_key] = $old_value;
					$dupes[$key]     = $value;
				}
				$old_value = $value;
				$old_key   = $key;
			}
			
			$newarray = array_diff($source_to_handel, $dupes);

			$unique   = get_random_same_day($dupes); //@minhquyen -- update20190528
			
			$arraynotdup = $newarray + $unique;
			natcasesort($arraynotdup);
			reset($arraynotdup);

			//end-hiduke not duplicate
			//priority a same day
			$hiduke_of_cancel = strtotime( $ent['hiduke_of_cancel'] );
			$hiduke_of_first_week = $hiduke_of_cancel + 604800;
			$hiduke_of_last_week = $hiduke_of_cancel + 1209600;
			$aof = array(); // array of first
			$aor = array(); //array of remain

			foreach( $arraynotdup as $k => $v ){
				if(strtotime($v) != $hiduke_of_first_week && strtotime($v) != $hiduke_of_last_week){
					$aor[$k] = $v;
				}
				else {
					$aof[$k] = $v;
				}
			}
			$firstweek = array();
			$lastweek = array();
			if(count($aof) == 2){
				foreach( $aor as $k=>$v ){
					if(strtotime($v) <= strtotime(end_of_7_day_first)){
						$firstweek[$k] = $v;
					}
					elseif( strtotime($v) >= strtotime(begin_of_7_day_last)){
						$lastweek[$k] = $v;
					}
				}
				if( count($firstweek) >= 2 && count($lastweek) >= 2 ){
					$firstweek = object_random($firstweek, 2);
					$lastweek  = object_random($lastweek, 2);
				}
				else if( count($firstweek) >= 2 && count($lastweek) == 1 ){
					$firstweek = object_random($firstweek, 2);
				}
				else if( count($firstweek) >= 2 && count($lastweek) == 0 ){
					$firstweek = object_random($firstweek, 1);
				}
				else if( count($firstweek) == 1 && count($lastweek) >= 2 ){
					$lastweek = object_random($lastweek, 2);
				}
				else if( count($firstweek) == 0 && count($lastweek) >= 2 ){
					$lastweek = object_random($lastweek, 1);
				}
			}
			else if(count($aof) == 1){
				foreach($aof as $aofc){
					if(strtotime($aofc) <= strtotime(end_of_7_day_first)){ //seminar uu tien [cung ngay seminar huy] thuoc tuan dau tien
						foreach( $aor as $k=>$v ){
							if(strtotime($v) <= strtotime(end_of_7_day_first)){
								$firstweek[$k] = $v;
							}
							elseif( strtotime($v) >= strtotime(begin_of_7_day_last)){
								$lastweek[$k] = $v;
							}
						}
						if(count($firstweek) >= 2 && count($lastweek) >= 3){
							$firstweek = object_random($firstweek, 2);
							$lastweek  = object_random($lastweek, 3);
						}
						else if(count($firstweek) >= 2 && count($lastweek) == 2){
							$firstweek = object_random($firstweek, 2);
						}
						else if(count($firstweek) >= 2 && count($lastweek) == 1){
							$firstweek = object_random($firstweek, 1);
						}
						else if(count($firstweek) >= 2 && count($lastweek) == 0){
							$firstweek = array();
						}
						else if(count($firstweek) == 1 && count($lastweek) >= 3){
							$lastweek  = object_random($lastweek, 3);
						}
						else if(count($firstweek) == 1 && count($lastweek) == 0){
							$firstweek  = array();
						}
						else if(count($firstweek) == 0 && count($lastweek) >= 2){
							$lastweek  = object_random($lastweek, 2);
						}
					}
					else { //seminar uu tien [cung ngay seminar huy] thuoc tuan thu 2
						foreach( $aor as $k=>$v ){
							if(strtotime($v) <= strtotime(end_of_7_day_first)){
								$firstweek[$k] = $v;
							}
							elseif( strtotime($v) >= strtotime(begin_of_7_day_last)){
								$lastweek[$k] = $v;
							}
						}
						if(count($firstweek) >= 3 && count($lastweek) >= 2){
							$firstweek = object_random($firstweek, 3);
							$lastweek  = object_random($lastweek, 2);
						}
						else if(count($firstweek) == 2 && count($lastweek) >= 2){
							$lastweek  = object_random($lastweek, 2);
						}
						else if(count($firstweek) == 1 && count($lastweek) >= 2){
							$lastweek  = object_random($lastweek, 1);
						}
						else if(count($firstweek) == 0 && count($lastweek) >= 2){
							$lastweek = array();
						}
						else if(count($firstweek) >= 3 && count($lastweek) == 1){
							$firstweek  = object_random($firstweek, 3);
						}
						else if(count($firstweek) == 0 && count($lastweek) == 1){
							$lastweek  = array();
						}
						else if(count($firstweek) >= 2 && count($lastweek) == 0){
							$firstweek  = object_random($firstweek, 2);
						}
					}
				}
				
			}
			else if(count($aof) == 0){
				foreach( $aor as $k=>$v ){
					if(strtotime($v) <= strtotime(end_of_7_day_first)){
						$firstweek[$k] = $v;
					}
					elseif( strtotime($v) >= strtotime(begin_of_7_day_last)){
						$lastweek[$k] = $v;
					}
				}
				if( count($firstweek) >= 3 && count($lastweek) >=3   ){
					$firstweek = object_random($firstweek, 3);
					$lastweek  = object_random($lastweek, 3);
				}
				else if( count($firstweek) >= 3 && count($lastweek) == 2){
					$firstweek = object_random($firstweek, 3);
				}
				else if( count($firstweek) >= 3 && count($lastweek) == 1){
					$firstweek = object_random($firstweek, 2);
				}
				else if( count($firstweek) >= 3 && count($lastweek) == 0){
					$firstweek = object_random($firstweek, 1);
				}
				else if( count($firstweek) == 2 && count($lastweek) >= 3){
					$lastweek = object_random($lastweek, 3);
				}
				else if( count($firstweek) == 1 && count($lastweek) >= 3){
					$lastweek = object_random($lastweek, 2);
				}
				else if( count($firstweek) == 0 && count($lastweek) >= 3){
					$lastweek = object_random($lastweek, 1);
				}
				else if( count($firstweek) == 2 && count($lastweek) == 0){
					$firstweek = object_random($firstweek, 1);
				}
				else if( count($firstweek) == 0 && count($lastweek) == 2){
					$lastweek = object_random($lastweek, 1);
				}
			}

			$res = $aof + $firstweek + $lastweek;
			##################### end #
			
			$data = array();
			foreach($res as $key=>$var ){
				foreach($seminar as $i=>$j){
					if($key == $i){
						$data[$key] = $j;
					}
				}
			}
			return $data;
			
		}
		else 
			return 0;
	};

	function sendMail($email = "", $title = "", $text = "", $cc = 0) 
	{
	    if(!$email || !$text) {
			echo "loi";
	        return false;
	    }
	    $headers   = array();
	    //$headers[] = "To: {$email}";
		if($cc != 0){
			$headers[] = $title. "\r\n" .
			"CC: ".$cc;
		}else{
			$headers[] = $title;
		}
	    
	    //$headers[] = "Reply-To: Japan Association for Working Holiday Makers <info@jawhm.or.jp>";
	    //$headers[] = "Subject: {$subject}";
	    $headers[] = "X-Mailer: PHP/" . phpversion();
	    $headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/html; charset=UTF-8";

	    //$generated = date('jS M Y H:i:s');
	    $subject = 'Default Subject';
		$message = $text;
		
	    return mail($email, $subject, $message, implode("\r\n", $headers));
	};

	try 
		{
			//init database
			$ini = parse_ini_file('../../../bin/pdo_mail_list.ini', FALSE);
				
			$DB = new PDO($ini['dsn'], $ini['user'], $ini['password']);
			$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$DB->query('SET CHARACTER SET utf8');

			//STEP-1: Initial Information

			$query  =  "SELECT entry.upddate, entry.id AS entry_id, entry.email, entry.seminarid, entry.namae\n";
			$query  .=  ",event.k_desc2, event.place, event.id AS event_id, event.hiduke AS hiduke_of_cancel\n";
			$query .= "FROM entrylist AS entry LEFT JOIN event_list AS event ON entry.seminarid = event.id\n";
			$query .= "WHERE event.free = 0 and entry.stat = 6\n";
			$query .= "and entry.email = 'masaki@tora-tora.net'\n";
			$query .= "and ( '".$dateBefore."' <= entry.upddate and entry.upddate <= '".$dateAfter."')";

			$stt = $DB->query( $query );

			while($row = $stt->fetch(PDO::FETCH_ASSOC))
			{
				$entry[] = $row;
			}
			echo "<b style='color: red'>#results for STEP1: have ".count($entry)."</b><br>";
			print_r($entry);
			echo "<hr>";

			foreach( $entry as $ent)
			{
				//STEP2: check if set another seminar
				if(check_another_seminar( $DB, $ent ) == 1)
				{
					echo "# ".$ent['entry_id']." have booked another seminar!, next!\n";
					continue; // if have booked, then jump next record to handle
				}
				else
				{
					//STEP3+4: conform case || Find a recommend of cancel serminar
					$recommend_list = find_recommend_seminar( $DB, $ent );
					if( $recommend_list==0 ){
						echo "not have recommend seminar!";
						continue;
					};
					//html for seminar
					$html = "";
					foreach( $recommend_list as $k=>$v ){
						$html .= $v['datestring']."<br>";
						$html .= $v['k_title1']."<br><br>";
						$html .= $v['k_desc1']."<br><br>";
						$html .= "ご予約はこちらから<br><a href='https://www.jawhm.or.jp/s/go/".$v[id]."'>https://www.jawhm.or.jp/s/go/".$v['id']."</a><br>";
						$html .= "------------------------------<br><br>";
					}
					//get Email template
					$emailTemplate = get_email_template($DB, 'mail_sem_osusume');

					$emailFrom = $emailTemplate['text1']; //info@jawhm.or.jp
					$emailTo   = $ent['email'];
					$cc        = "meminfo@jawhm.or.jp";
					$emailTitle = $emailTemplate['text2'];
					$emailBody = $emailTemplate['text3'];
					$emailFooter = $emailTemplate['text4'];

					//replace VALUE for EMAIL template
					
					$vars = array(
						'namae' => $ent['namae'],
						'body'  => $html
					);
					foreach( $vars as $key => $replace ){
						$emailBody = str_ireplace( '{{' . $key . '}}', $replace, $emailBody );
					};
					$emailBody .= $emailFooter;

					#send Email here..
					if($method_email == 'smtp'){
						
						require '../../doc/PHPMailerv2/PHPMailerAutoload.php';
						$mail = new PHPMailer;

						$mail->isSMTP();
						// 0 = off (for production use)
						// 1 = client messages
						// 2 = client and server messages
						$mail->SMTPDebug = 0;
						//$mail->Debugoutput = 'html';
						$mail->Host = 'smtp.gmail.com';
						$mail->Port = 465;
						$mail->SMTPSecure = 'ssl';
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
						$mail->addAddress($emailTo, $ent['namae']);
						//$mail->addAddress('dung.jawhm@gmail.com', $ent['namae']);
						$mail->AddCC($cc);

						$mail->Subject = $emailTitle;
						$mail->Body    = $emailBody;

						if (!$mail->send()) {
							echo "Mailer Error: " . $mail->ErrorInfo;
						} else {
							echo "Message sent!";
						}
						
					}
					else{
						//if(sendMail('minhquyen.jawhm@gmail.com', $emailTitle, $emailBody, $cc="keyjumi@gmail.com")){
							//echo "thanh cong";
						//}else{
							//echo "bi loi";
						//}
					}
				}
			}

		} 
		catch (PDOException $e) 
		{
			die($e->getMessage());
		};
		
?>