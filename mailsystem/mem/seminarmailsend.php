<?php
/**
 * SEND MAIL
 * User: nguyentuananh2985@gmail.com
 * Time: 3:17 PM
 */
require_once 'php/fnc_dbopen.php';//db jawhm_mail_list
date_default_timezone_set('Asia/Tokyo');

/*-- array translate --*/
$arr_place = array ('tokyo', 'osaka', 'nagoya', 'fukuoka', 'sendai', 'toyama', 'okinawa', 'event');
$arr_place_j = array('東京', '大阪', '名古屋', '福岡', '仙台', '富山', '沖縄', 'その他イベント');

$date_now = date('Y-m-d');
$time_now = date('H:i');
$date_now_f = DateTime::createFromFormat('Y-m-d', $date_now);
$date_f_c = $date_now_f->modify('+1 days');
$date_hiduke = $date_f_c->format('Y-m-d');
try {
    $sql = ' SELECT id, date_format(hiduke,\'%Y/%m/%d\') as hiduke, date_format(hiduke,\'%W\') as w, date_format(starttime,\'%H:%i\') as sttime, ';
    $sql .= ' date_format(starttime,\'%Y-%m-%d %H:%i\') as starttime, date_format(endtime,\'%Y-%m-%d %H:%i\') as endtime, ';
    $sql .= ' place, k_title1, broadcasting, tantousha_name, tantousha_mail ';
    $sql .= ' FROM event_list ';
    $sql .= ' WHERE (k_use = 1 OR schoolap = 1 OR new = 1) AND tantousha_name <> "" AND tantousha_mail <> "" AND hiduke = "' . $date_hiduke . '" ';
    $sql .= ' GROUP BY k_title1, starttime, endtime, tantousha_mail ';//name mail similar
    $stt = $db->prepare($sql);
    $stt->execute();
    $sm_x = 1;
	
    if ($stt->rowCount() > 0) {
        while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
            $el_id = $row['id'];
            $el_hiduke = $row['hiduke'];
            $el_hiduke_week = $row['w'];
            $el_sttime = $row['sttime'];//h:i -> compare time semminar before
            $el_starttime = $row['starttime'];//Y-m-d H:i compare seminar before
            $el_endtime = $row['endtime'];//Y-m-d H:i
            $el_title1 = $row['k_title1'];
            $el_tantousha_name = $row['tantousha_name'];
			
            $el_tantousha_mail = $row['tantousha_mail'];
            $el_place = $row['place'];
            $el_broadcasting = $row['broadcasting'];

            /*-- translate place english -> japanese  {{開催都市}} --*/
            $el_place_j = '';
            for ($i = 0; $i < count($arr_place); $i++) {
                if ($el_place == $arr_place[$i]) {
                    $el_place_j = $arr_place_j[$i];
                }
            }
			
            /*-- get time seminar before and title before {{前セミナー開始時刻}} --*/
            $sql_cp = ' SELECT DISTINCT date_format(starttime,\'%H:%i\') as sttime, k_title1 ';
            $sql_cp .= ' FROM event_list ';
            $sql_cp .= ' WHERE (k_use = 1 OR schoolap = 1 OR new = 1) AND hiduke = "' . $date_hiduke . '" AND id <> ' . $el_id . ' AND place = "' . $el_place . '" ';
            $sql_cp .= ' AND date_format(endtime,\'%Y-%m-%d %H:%i\') = "' . $el_starttime . '" ';
            $stt_cp = $db->prepare($sql_cp);
            $stt_cp->execute();
            $el_sttime_cp = '';
            $el_k_title_cp = '';
            while ($row_cp = $stt_cp->fetch(PDO::FETCH_ASSOC)) {
                $el_sttime_cp = $row_cp['sttime'];//H:i
                $el_k_title_cp = $row_cp['k_title1'];//title before
            }
			
            /*-- seminar CC   {{中継案内}} -> ④中継について 当日は {{、○○}}との中継となりますためご協力をお願い申し上げます。 --*/
            $sql_scc = ' SELECT place ';
            $sql_scc .= ' FROM event_list ';
            $sql_scc .= ' WHERE hiduke = "' . $date_hiduke . '" ';
//            $sql_scc .= ' WHERE tantousha_name <> "" AND tantousha_mail <> "" AND hiduke = "' . $date_hiduke . '" ';
            $sql_scc .= ' AND id <> ' . $el_id . ' AND k_title1 = "' . $el_title1 . '" AND place <> "' . $el_place . '" ';
            $sql_scc .= ' AND date_format(starttime,\'%Y-%m-%d %H:%i\') = "' . $el_starttime . '" AND date_format(endtime,\'%Y-%m-%d %H:%i\') = "' . $el_endtime . '" ';
            $stt_scc = $db->prepare($sql_scc);
            $stt_scc->execute();
            if ($stt_scc->rowCount() > 0) {//seminar CC - có vị trí khác nhau -> broadcasting = 1 or = 0
                $el_place_scc_j = '';
                while ($row_scc = $stt_scc->fetch(PDO::FETCH_ASSOC)) {
                    $el_place_scc = $row_scc['place'];
                    //translate -> place different
                    for ($i = 0; $i < count($arr_place); $i++) {
                        if ($el_place_scc == $arr_place[$i]) {
                            $el_place_scc_j .= '、' . $arr_place_j[$i];
                        }
                    }
                }
                $el_place_scc_different = '④中継について
当日は' . $el_place_scc_j . ' との中継となりますためご協力をお願い申し上げます。';//\n textarea
            } else if($el_broadcasting == 1){//không có seminar CC - broadcasting = 1 (checked 中継 trong event_list them su kien)
                $el_place_scc_different = '④中継について
当日は との中継となりますためご協力をお願い申し上げます。';//\n textarea
            } else $el_place_scc_different = '';//không có seminar CC - broadcasting = 0;
			
            /*--list person register event {{参加予定者リスト}} --*/
            $sql_l = ' SELECT kyomi, namae, furigana, jiki ';
            $sql_l .= ' FROM entrylist ';
            $sql_l .= ' WHERE seminarid = ' . $el_id . ' AND stat BETWEEN 0 AND 1 ';
            $stt_l = $db->prepare($sql_l);
            $stt_l->execute();
            if ($stt_l->rowCount() > 0) {
                $et_x = 1;
                $et_list = '';
                while ($row_l = $stt_l->fetch(PDO::FETCH_ASSOC)) {
                    $et_list .= $et_x++ . '. ';
                    $et_list .= $row_l['namae'] . ' (';
                    //$et_list .= $row_l['furigana'] . ')  様  /  ';
					$et_list .= $row_l['furigana'] . ')  ';
                    if($row_l['furigana'] != ''){
                        require_once './change_language_ja.php';
                        $et_list .= toRomaji($row_l['furigana']).'  ';
                    }
                    $et_list .= '様  /  ';
                    $et_list .= $row_l['kyomi'] . '  / ';//countries
                    $et_list .= $row_l['jiki'] . '
';//\n in textarea
                }
            } else $et_list = 'まだ予約はありません';//not person register event
	
            //get mailtext -> send mail
            $sql_m = "SELECT text2, text3 FROM mailtext WHERE keycd like 'seminar_mail'";
            $stt_m = $db->prepare($sql_m);
            $stt_m->execute();
			
            while ($row_m = $stt_m->fetch(PDO::FETCH_ASSOC)) {
                $subject_r = $row_m["text2"];
                $body_r = $row_m["text3"];
				
                require_once 'admin_mail.php';

                //title array mail
                $find_subject_r = array($ch_tantousha_name, $ch_place, $ch_hiduke, $ch_hiduke_week);
                $replace_subject_r = array('' . $el_tantousha_name . '', '' . $el_place_j . '', '' . $el_hiduke . '', '' . $el_hiduke_week . '');

                //content array mail
                //set variable time $ch_before_sttime = '';
                $ch_association = '';
                $el_association = '';
                if (strpos($body_r, $ch_before_sttime) == '' || $el_sttime_cp == '') {
                    $ch_association = '当協会による';
                    $el_association = '';
                }
                $find_body_r = array($ch_tantousha_name, $ch_hiduke, $ch_hiduke_week, $ch_before_sttime, $ch_title_before, $ch_affter_sttime, $ch_title1, $ch_place_different,
                    $ch_et_list, $ch_association);
                $replace_body_r = array('' . $el_tantousha_name . '', '' . $el_hiduke . '', '' . $el_hiduke_week . '', '' . $el_sttime_cp . '', '' . $el_k_title_cp . '', '' . $el_sttime . '', '' . $el_title1 . '', '' . $el_place_scc_different . '',
                    '' . $et_list . '', '' . $el_association . '');

                $check_subject_r = strposa($subject_r, $find_subject_r);//find array name in datasql
                $check_body_r = strposa($body_r, $find_body_r);//find array name in datasql

                //check tìm kiếm tên
                if ($check_subject_r !== false && $check_body_r !== false) {
                    $output_subject_r = str_replace($find_subject_r, $replace_subject_r, $subject_r, $position_subject_r);
                    $output_body_r = str_replace($find_body_r, $replace_body_r, $body_r, $position_body_r);
					$output_body_r = str_replace('「」','',$output_body_r);
                    /*
                    ********************************************************************************
                    Send email system
                    ********************************************************************************
                    */
                    $to = $el_tantousha_mail;//send mail to
                    $from = $from_email;//from
                    $bcc = $bcc_email;

                    //$sender = $el_tantousha_name;//name title send mail
					$sender = "日本ワーキングホリデー協会";//name title send mail
					
                    send_mail(1, $to, $from, $sender, $output_subject_r, $output_body_r, $bcc);

                    echo($sm_x++ . '. Send mail successful to ' . $el_tantousha_mail . '<br/>');
                    echo('Bcc mail successful to ' . $bcc . '<br/>');
                    /*
                    ********************************************************************************
                    End send email system
                    ********************************************************************************
                    */
                } else {
                    echo "Not find name '[$find_subject_r]' in '[$subject_r]' title";
                    echo "Not find name '[$find_body_r]' in '[$body_r]' body";
                }
            }
        }
    } else {
        echo 'No seminars to send mail!.';
    }
} catch (PDOException $e) {
    die($e->getMessage());
}

//check find name in array
function strposa($haystack, $needle, $offset = 0)
{
    if (!is_array($needle)) $needle = array($needle);
    foreach ($needle as $query) {
        if (strpos($haystack, $query, $offset) !== false) return true;
    }
    return false;
}

//check sendmail
function send_mail($type, $to, $from, $sender = "", $subject, $text, $bcc = "", $cc = "", $encoding = "UTF-8")
{
    $headers = '';

    if ($type == 0) {
        //JIS
        mb_language("Ja");

        $text = mb_convert_encoding($text, "JIS", $encoding);
    } else {
        //UTF-8
        mb_language("uni");
        $headers = "Mime-Version: 1.0\n";
        $headers .= "Content-Type: text/plain;charset=UTF-8\n";
    }

    // JIS mã hóa
    $subject = "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($subject, "JIS", $encoding)) . "?=";
    if ($sender != "") {
        $sender = "=?ISO-2022-JP?B?" . base64_encode(mb_convert_encoding($sender, "JIS", $encoding)) . "?=";
    }
    $opt1 = $headers;

    // From
    $opt1 .= "From: ";
    if ($sender != "") {
        $opt1 .= $sender . "<";
    }
    $opt1 .= $from;
    if ($sender != "") {
        $opt1 .= ">";
    }
    $opt1 .= "\r\n";

    // Cc
    if ($cc != "") {
        $opt1 .= "Cc: " . $cc . "\r\n";
    }

    // Bcc
    if ($bcc != "") {
        $opt1 .= "Bcc: " . $bcc . "\r\n";
    }

    $opt2 = "-f$from";

    mail($to, $subject, $text, $opt1, $opt2);

    return 0;
}

require_once 'php/fnc_dbclose.php';