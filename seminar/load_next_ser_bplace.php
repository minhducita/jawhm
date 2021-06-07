<?php

require_once('include/mobile_function.php');
require_once ('include/where_condition_new.php');

ini_set('session.bug_compat_42', 0);
ini_set('session.bug_compat_warn', 0);

session_start();

$use_area = false;

$fullari = false;

//retrieve data sent by the seminar menu
$retrieved_data = array('last_msg_id' => $_POST['last_msg_id'],
    'last_msg_date' => $_POST['last_msg_date'],
    'type' => $_POST['para1'],
    'value' => $_POST['para2'],
    'date' => $_POST['date'],
    'citybutton' => $_SESSION['para3'],
    'extra' => $_SESSION['para4']
);

//set date format from 2012-10-03 to '2012-10-3'
list($yy, $mm, $dd) = explode('-', $retrieved_data['last_msg_date']);
$format_last_date = date('Ynj', mktime(0, 0, 0, $mm, $dd, $yy));

//get limit from last msg id and set MSQL limit

list($last_id_number, $last_limit) = explode('-', $retrieved_data['last_msg_id']);

//	$last_limit = $last_limit + 5;

$SQL_limit = 'LIMIT ' . $last_limit . ',' . DEFAULT_SEMINAR_COUNT;

//print_r($retrieved_data);
//echo $SQL_limit.'<br />';
// イベント読み込み
$cal = array();

try {
    $ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
    $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query('SET CHARACTER SET utf8');



    // SQL Keywords
    $where_place = '';

    //where_country Where_know keywords
    $where_country = ' ( 1=0';
    $where_know = ' ( 1=0';

    if ($retrieved_data['type'] == 'country') {
        $where_country .= where_country($retrieved_data['value']);
        $where_know .= where_know($retrieved_data['extra']);
    } elseif ($retrieved_data['type'] == 'know') {
        $where_country .= where_country($retrieved_data['extra']);
        $where_know .= where_know($retrieved_data['value']);
    }

    $where_country .= ' ) ';
    $where_know .= ' ) ';


    //place keyword
    if ($retrieved_data['type'] == 'place')
        $chosen_place = $retrieved_data['value'];
    elseif ($retrieved_data['type'] != 'place' && !empty($retrieved_data['citybutton']))
        $chosen_place = $retrieved_data['citybutton'];
    else
        $chosen_place = 'tokyo';

    $date = $retrieved_data['date'];
    
    $where_place = ' ( place = \'' . $chosen_place . '\' or k_desc2 like \'%' . $chosen_place . '%\' ) ';

    $stt = $db->prepare('SELECT * FROM place WHERE area = :place ');
    $stt->bindValue(':place', $chosen_place);
    $stt->execute();
    $place_list = array();
    while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
        $place_list[] = $row;
    }
    if (empty($place_list) or $use_area == false) {
        $stt = $db->prepare('SELECT * FROM place WHERE place = :place ');
        $stt->bindValue(':place', $chosen_place);
        $stt->execute();
        $place_info = $stt->fetch();
        $searchplus = "";
        if (!empty($place_info['searchplus'])) {
            $searchplus = ' or  k_title1 like \'%' . $place_info['name'] . '%\'';
        }
        $where_place = '(place = \'' . $chosen_place . '\' or k_desc2 like \'%' . $chosen_place . '%\' ' . $searchplus . ' ) ';
    } else {
        $wheres = array();
        foreach ($place_list as $info) {
            $searchplus = "";
            if (!empty($info['searchplus'])) {
                $searchplus = ' or  k_title1 like \'%' . $info['name'] . '%\'';
            }
            $wheres[] = '(place = \'' . $info['place'] . '\' or k_desc2 like \'%' . $info['place'] . '%\' ' . $searchplus . ' ) ';
        }
        $where_place = '( ' . implode(" or ", $wheres) . ' )';
    }


    //create keyword chaine
    $keyword = '';
    if ($where_place <> '')
        $keyword .= ' and ' . $where_place;

    if ($where_country != ' ( 1=0 ) ')
        $keyword .= ' and ' . $where_country;

    if ($where_know <> ' ( 1=0 ) ')
        $keyword .= ' and ' . $where_know;

    //echo $keyword;
    //display free or member seminar
    $free_query = "";
    $free = 0;
    if ($retrieved_data['value'] == 'member') {
        $free_query = " AND free = 1 ";
        $free = 1;
    }
    //else
    //$free=0;
    $addfullsql = "";

    //本日以降の全てのセミナーが満席だった場合
    $completelyFull = false;
    $sql = 'SELECT count(*) as num FROM event_list WHERE k_use = 1 ' . $free_query . ' AND hiduke >= DATE_SUB(CURDATE(),INTERVAL 0 DAY) ' . $keyword . ' AND k_stat != 2 AND booking < pax ORDER BY hiduke, starttime, id ';
    $rs = $db->query($sql);
    while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
        if ($row['num'] < 1) {
            $completelyFull = true;
        }
    }
    if (@$_POST['isFull'] == '1' || $completelyFull) {
        
    } else {
        $addfullsql = ' AND k_stat != 2 AND booking < pax';
    }

//        $sql = 'SELECT id, hiduke, year(hiduke) as yy, month(hiduke) as mm, day(hiduke) as dd, date_format(starttime, \'%c月%e日 (%a) %k:%i\') as start, date_format(starttime, \'%k:%i\') as starttime, title, memo, place, k_use, k_title1, k_desc1, k_desc2, k_stat, free, pax, booking, group_color, indicated_option, broadcasting, country_code FROM event_list WHERE k_use = 1 '.$free_query.' AND hiduke >= DATE_SUB(CURDATE(),INTERVAL 0 DAY) ' . $keyword . $addfullsql . ' ORDER BY hiduke, starttime, id '.$SQL_limit;
    $sql = 'SELECT id, hiduke, year(hiduke) as yy, month(hiduke) as mm, day(hiduke) as dd, date_format(starttime, \'%c月%e日 (%a) %k:%i\') as start, date_format(starttime, \'%k:%i\') as starttime, title, memo, place, k_use, k_title1, k_desc1, k_desc2, k_stat, free, pax, booking, group_color, indicated_option, broadcasting, country_code FROM event_list WHERE k_use = 1 ' . $free_query . ' AND DATE_FORMAT(hiduke, "%Y-%m-%d") = "' . $date . '" '  . $keyword . $addfullsql . ' ORDER BY hiduke, starttime, id ' . $SQL_limit;
    //sql query
    $rs = $db->query($sql);

    $cnt = 0;
    while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
        $cnt++;
        $year = $row['yy'];
        $month = $row['mm'];
        $day = $row['dd'];

        $start = $row['start'] . '～';
        $start = mb_ereg_replace('Mon', '月', $start);
        $start = mb_ereg_replace('Tue', '火', $start);
        $start = mb_ereg_replace('Wed', '水', $start);
        $start = mb_ereg_replace('Thu', '木', $start);
        $start = mb_ereg_replace('Fri', '金', $start);
        $start = mb_ereg_replace('Sat', '土', $start);
        $start = mb_ereg_replace('Sun', '日', $start);

        //$japanese_city_name = translate_city($row['place']);

        $japanese_city_name = "";
        if ($row['place'] == 'event') {
            $japanese_city_name = translate_city($row['k_desc2']);
            if (empty($japanese_city_name)) {
                $japanese_city_name = translate_city($row['place']);
            }
        } else {
            $japanese_city_name = translate_city($row['place']);
        }

        $title = $start . '&nbsp;' . $row['k_title1'];

        $c_desc = $row['k_desc1'];

        if ($row['k_stat'] == 1) {
            if ($row['booking'] >= $row['pax'])
                $c_img = '[満席です。キャンセル待ち可能です]';
            else
                $c_img = '[残席わずかです。ご予約はお早めに]';
        }
        elseif ($row['k_stat'] == 2)
            $c_img = '[満席です]';
        else {
            if ($row['booking'] >= $row['pax']) {
                $c_img = '[満席です。キャンセル待ち可能です]';
            } else {
                if ($row['booking'] >= $row['pax'] / 3)
                    $c_img = '[残席わずかです。ご予約はお早めに]';
                else
                    $c_img = '';
            }
        }

        if ($c_img <> '')
            $c_img = '<p class="last-seat">' . $c_img . '</p>';

        //check flag
        if (!empty($row['country_code']))
            $flag = '<span class="flag ' . $row['country_code'] . '"></span>';
        else
            $flag = '';

        //Check if live or not
        if ($row['broadcasting'] != 0)
            $icon_live = '<span class="broadcast"></span>';
        else
            $icon_live = '';

        //Check the option statut 
        switch ($row['indicated_option']) {
            case 0:
                $indication = '';
                break;
            case 1:
                $indication = '<span class="osusume"></span>';
                break;
            case 2:
                $indication = '<span class="shinchyaku"></span>';
                break;
        }

        //get color groupe or set gray if empty
        if ($row['group_color'] == '')
            $color_group = '#999';
        else
            $color_group = $row['group_color'];

        //Set the selected day class only for 'Place'
        if ($_SESSION['para1'] == 'place' && $_SESSION['para2'] == $chosen_place && !empty($_SESSION['para6'])) {
            if ($row['id'] == $_SESSION['para6'])
                $class_selected_day = ' selected_day';
            else
                $class_selected_day = '';
        } else
            $class_selected_day = '';

        $just_one = false;
        // message to display
        //$hidden_block = "";
        $hidden_block = "not-full";
        if (preg_match('/満席です/i', $c_img)) {
            $hidden_block = "full-seminar";
        }
        $cal[$year . $month . $day] .= '<img src="images/sa01.jpg">';
        $c_msg = '<div id="' . $row['id'] . '-' . ($last_limit + $cnt) . '" class="message_box ' . $hidden_block . '" data-role="collapsible" style="background-color:white;">';
        $c_msg .= '<h3 class="time-place-seminar" style="border:0px;">' . $c_img;
        $c_msg .= $flag . $row['starttime'] . '～　' . $japanese_city_name . '会場&nbsp;' . $icon_live . $indication . '<br/>';
        $c_msg .= $row['k_title1'] . '</h3>';

        $add_area = '';
        if ($use_area && $row['place'] != $chosen_place) {
            $add_area = '/area';
        }
        if ($row['free'] && $_SESSION['mem_id'] == '') {
            $c_msg .= '<div onclick="window.open(\'/seminar/ser/login/' . $row['id'] . '\',\'_self\')" alt="' . $row['hiduke'] . '" class="message_link' . $class_selected_day . '">';
        } else {
            $c_msg .= '<div onclick="window.open(\'/seminar/ser/id/' . $row['id'] . $add_area . '\',\'_self\')" alt="' . $row['hiduke'] . '" class="message_link' . $class_selected_day . '">';
        }


        $c_msg .= '<div class="detail">' . nl2br($c_desc) . '';
        $c_msg .= '<br/><button value="ご予約はこちら">　　ご予約はこちら　　</button><br/>';
        $c_msg .= '<br/></div>';
        $c_msg .= '</div></div>';

        $cal_msg[$year . $month . $day] .= $c_msg;


        if (empty($cal_cnt[$year . $month . $day]))
            $cal_cnt[$year . $month . $day] = count_number_of_seminar($keyword, $row['hiduke'], $free);

        if (empty($cal_iconlist[$year . $month . $day]))
            $cal_iconlist[$year . $month . $day] = icon_list_of_the_day($keyword, $row['hiduke'], $free);

        if (empty($cal_flaglist[$year . $month . $day]))
            $cal_flaglist[$year . $month . $day] = flag_list_of_the_day($keyword, $row['hiduke'], $free);
    }

    $fullSql = 'SELECT id, hiduke, year(hiduke) as yy, month(hiduke) as mm, day(hiduke) as dd, date_format(starttime, \'%c月%e日 (%a) %k:%i\') as start, date_format(starttime, \'%k:%i\') as starttime, title, memo, place, k_use, k_title1, k_desc1, k_desc2, k_stat, free, pax, booking, group_color, indicated_option, broadcasting, country_code FROM event_list WHERE k_use = 1 ' . $free_query . ' AND hiduke >= DATE_SUB(CURDATE(),INTERVAL 0 DAY) ' . $keyword . ' ORDER BY hiduke, starttime, id ' . $SQL_limit;
    $notFullSql = 'SELECT id, hiduke, year(hiduke) as yy, month(hiduke) as mm, day(hiduke) as dd, date_format(starttime, \'%c月%e日 (%a) %k:%i\') as start, date_format(starttime, \'%k:%i\') as starttime, title, memo, place, k_use, k_title1, k_desc1, k_desc2, k_stat, free, pax, booking, group_color, indicated_option, broadcasting, country_code FROM event_list WHERE k_use = 1 ' . $free_query . ' AND hiduke >= DATE_SUB(CURDATE(),INTERVAL 0 DAY) ' . $keyword . ' AND k_stat != 2 AND booking < pax  ORDER BY hiduke, starttime, id ' . $SQL_limit;

    $fullrs = $db->query($fullSql);
    $notfullrs = $db->query($notFullSql);

    $fullResult = $fullrs->fetchAll();
    $notFullResult = $notfullrs->fetchAll();

    $fullItem = array_pop($fullResult);
    $notFullItem = array_pop($notFullResult);

    if ($fullItem['id'] != $notFullItem['id'] || count($fullResult) != count($notFullResult)) {
        $fullari = true;
    }
    if ($completelyFull) {
        $fullari = false;
    }
} catch (PDOException $e) {
    die($e->getMessage());
}

//Avoid to keep loading while no more content are available but the last count was 5!
//create then a last line with 0 as attribute

if ($cnt == 0) {
    echo '<p style="display:none;" class="title-date" title="0"></p>';
} else {
    calendar_list($format_last_date);
    if ($fullari) {
        echo '<p style="display: none;" id="fullari"></p>';
    }
}
