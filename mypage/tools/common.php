<?php
require_once (dirname (dirname (__FILE__)) . '/tools/MypageConst.php');
require_once ('tools/BaseModel.php');
require_once ('tools/MypageConst.php');
require_once ('library/Custom/Mobile_Detect.php');

function initPage($parent, $module, $mode){
    if(empty($_SERVER['HTTPS'])) {
        $base = 'http://';
    } else {
        $base = 'https://';
    }
    $base .= $_SERVER['HTTP_HOST'];
    Zend_Session::start();

    header("X-Content-Type-Options: nosniff");
    setlocale(LC_ALL, 'ja_JP.UTF-8');
    $root_dir = dirname(dirname(__FILE__));
    $CLIENT_TEMPLATE = $root_dir . '/themes/layout/';

    $const = new MypageConst();
    $scr_id = $const::$MYPAGE_SCREEN_ID['JavaScript'];
    $msg_tbl = 'mypage_message';
    if (!isset($_SESSION['language'])) {
        $_SESSION['language'] = 'ja';
    }
    $message = getScreenMessage($msg_tbl, $scr_id, $_SESSION['language']);
    $parent->view->jsmsg = Zend_Json::encode($message);

    switch($mode) {
        case 'client':
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user'] === 'client') {
                    $select = '';
                    $parent->view->client = 1;
                } else {
                    $select = 'staff';
                    $parent->view->auth_cd = $_SESSION['auth_cd'];
                    $parent->view->client = 0;
                }
            } else {
                $select = '';
                $parent->view->client = 1;
            }
            break;

        case 'staff':
            $select = 'staff';
            if (array_key_exists('auth_cd', $_SESSION))	{
                $parent->view->auth_cd = $_SESSION['auth_cd'];
            } else{
                $parent->view->auth_cd = null;
            }
            break;

        case 'school':
            $select = 'school';

            $req = $parent->getRequest();
            $controllerName = $req->getControllerName();

            if (schoolcheck()) {
                $adapter = dbadapter ();
                $params = dbconnect ();

                $db = Zend_Db::factory ( $adapter, $params );
                $sql = new Zend_Db_Select ( $db );
                $sql_select = array('mypage_school_contact_id');
                $sql_where = "receiver_id = '". $_SESSION['school_id'] . "' and updated_on > '" . $_SESSION['last_login_date'] . "'";
                $sql = $db->select ();
                $sql->from ( 'mypage_school_contact', $sql_select );
                $sql->where($sql_where);
                $result = $db->fetchAll($sql);
                $rows = count ($result);

                $parent->view->controller = $controllerName;
                $parent->view->rows = $rows;
            }
            break;

        case 'kotaro':
            $select = 'staff';
            $parent->view->auth_cd = 130;
            break;

        default:
            $select = '';
    }

    if ($select === 'school' && array_key_exists('school_id', $_SESSION))	{
        $parent->view->school_name = $_SESSION['school_name'];
    }

    $smp = smpcheck();
    if ($smp) {
        $parent->view->smp = 1;
    } else {
        $parent->view->smp = 0;
    }

    $parent->view->header = $CLIENT_TEMPLATE . $select . 'header.tpl';
    $parent->view->footer = $CLIENT_TEMPLATE . $select . 'footer.tpl';
    $parent->view->base = $base;
    $parent->view->modal = $CLIENT_TEMPLATE . 'modal.tpl';
    if (isset($_SESSION['progress_level'])) {
        $parent->view->progress = $_SESSION['progress_level'];
    } else {
        $parent->view->progress = null;
    }

    if (isset($_SESSION['abroad'])) {
        $parent->view->abroad_flag = '1';
    } else {
        $parent->view->abroad_flag = '0';
    }
}

function without_loginchk($parent, $actionList, &$base) {
    $req = $parent->getRequest();
    $action = $req->getActionName();
    if(!in_array($action, $actionList)) {
        if(!logincheck()){
            header("Location: $base/mypage/index/login");
        }
    }

}

function logincheck() {
    if (array_key_exists('mem_id', $_SESSION))	{
        if ($_SESSION['mem_id'] <> '') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function without_stafflogin($parent, $actionList, $base, $client) {
    $req = $parent->getRequest();
    $action = $req->getActionName();
    if(!in_array($action, $actionList)) {
        $req = $parent->getRequest();
        $actionName = $req->getActionName();
        if(!staffcheck()){
            header("Location: $base/mypage/staff/index/login");
        }
        if ($client == true) {
            if (!clientcheck()){
                header("Location: $base/mypage/staff/client/noclient");
            }
        }
    }
}

function without_authrity($parent, $actionList, $base) {
    $req = $parent->getRequest();
    $action = $req->getActionName();
    if(!in_array($action, $actionList)) {
        $req = $parent->getRequest();
        if(!authcheck()){
            header("Location: $base/mypage/staff/index/index");
        }
    }
}

function staffcheck() {
    if (array_key_exists('staff_cd', $_SESSION))	{
        if ($_SESSION['staff_cd'] <> '') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function authcheck() {
    if ($_SESSION['auth_cd'] >= 130) {
        return true;
    } else {
        return false;
    }
}

function without_loginschool($parent, $actionList, $base) {
    $req = $parent->getRequest();
    $action = $req->getActionName();
    if(!in_array($action, $actionList)) {
        $req = $parent->getRequest();
        $actionName = $req->getActionName();
        if(!schoolcheck()){
            header("Location: $base/mypage/school/index/login");
            return false;
        }
    }
    return true;
}

function schoolcheck() {
    if (array_key_exists('school_id', $_SESSION)) {
        if ($_SESSION['school_id'] <> '') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function without_loginkotaro($parent, $actionList, $base) {
    $req = $parent->getRequest();
    $action = $req->getActionName();
    if(!in_array($action, $actionList)) {
        $req = $parent->getRequest();
        $actionName = $req->getActionName();
        if(!kotarocheck()){
            header("Location: $base/mypage/kotaro/index/login");
            return false;
        }
    }
    return true;
}

function kotarocheck() {
    if (array_key_exists('school_id', $_SESSION)) {
        if ($_SESSION['school_id'] <> '') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function dateCheck($item, $is_time) {
    if (! empty($item)) {
        // check date format
        $temp_item = str_replace('T', ' ', $item);
        if (strpos($temp_item, '.') === false) {
            $temp2_item = array($temp_item);
        } else {
            $temp2_item = explode('.', $temp_item);
        }

        $temp3_item = explode(':', $temp2_item[0]);
        if($is_time) {
            $item = $temp3_item[0] . ':' . $temp3_item[1];
            $preg = preg_match('/^[0-9]{4}[\/|-][0-9]{1,2}[\/|-][0-9]{1,2} [0-9]{1,2}[\:?][0-9]{1,2}$/', $item);
        } else {
            $preg = preg_match('/^[0-9]{4}[\/|-][0-9]{1,2}[\/|-][0-9]{1,2}$/', $item);
        }

        if (!$preg) {
            $message = '入力フォーマットが正しくありません。';
            return $message;
        } else {
            // check date suitabillty
            $date = preg_split("/[ ]/", $item);
            list($year, $momth, $day) = preg_split("/[\/,-]/", $date[0]);
            if (! checkdate($momth, $day, $year)) {
                $message = '日付部の入力値が対象外です。';
                return $message;
            }
            if($is_time == true) {
                $flag = true;
                list($hour, $min) = preg_split("/[\:]/", $date[1]);
                if ($hour < 0 || $hour > 23){
                    $flag = false;
                }
                if ($min < 0 || $min > 59){
                    $flag = false;
                }
                if (!$flag) {
                    $message = '時刻部の入力値が対象外です。';
                    return $message;
                }
            }
        }
        return null;
    }
    return null;
}

function smpcheck() {
    $detect = new Mobile_Detect;
    $ua = $detect->isMobile();
    return $ua;
}

function isIphone() {
    $detect = new Mobile_Detect;
    $ua = $detect->isiPhone();
    return $ua;
}

function select_sqlserver($table, $select, $where, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'select',
                            'table' => $table,
                            'select' => $select,
                            'where' => $where
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
    $j_content = json_decode($content);
    $branchs = explode(',', $select);
    $branch = trim($branchs[0]);
    $i = 0;
    $is_first = true;
    $items = array();
    if($content != '') {
        foreach($j_content as $row) {
            if ($row[0] === $branch) {
                if ($is_first === false) {
                    $i++;
                } else {
                    $is_first = false;
                }
            }
            $items[$i][$row[0]] = $row[1];
        }
    }
    return $items;
}

function update_sqlserver($table, $update, $where, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'update',
                            'table' => $table,
                            'update' => $update,
                            'where' => $where,
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
    $content = str_replace(array("null"), '"null"', $content);
    $j_content = json_decode($content);
    return $j_content;
}

function insert_sqlserver($table, $insert, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'insert',
                            'table' => $table,
                            'insert' => $insert
                    )),
            )
    ));
    $content = file_get_contents($url, false, $context);
    $content = str_replace(array("null"), '"null"', $content);
    $j_content = json_decode($content);
    return $j_content;
}

function sortselect_sqlserver($table, $select, $where, $sort, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'sortselect',
                            'table' => $table,
                            'select' => $select,
                            'where' => $where,
                            'sort' => $sort
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
    $j_content = json_decode($content);
    $branchs = explode(',', $select);
    $branch = trim($branchs[0]);
    $items = array();
    $i = 0;
    $is_first = true;
    if($content != '') {
        foreach($j_content as $row) {
            if ($row[0] === $branch) {
                if ($is_first === false) {
                    $i++;
                } else {
                    $is_first = false;
                }
            }
            $items[$i][$row[0]] = $row[1];
        }
    }
    return $items;
}

function delete_sqlserver($table, $where, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'delete',
                            'table' => $table,
                            'where' => $where
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
    return $content;
}

function searcbdir($crmid, $list, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => self::PWD,
                            'command' => 'searcbdir',
                            'search_dir' => 'files',
                            'client_no' => $crmid,
                            'list' => $list
                    )),

            )
    ));

    $content = file_get_contents($url, false, $context2);
    $content = str_replace(array("null"), '"null"', $content);
    $j_content = json_decode($content);
    $items = array();
    if($content != '') {
        foreach($j_content as $row) {
                $items += array($row[0] => $row[1]);
        }
    }
    return $items;
}
function joinselect_sqlserver($table, $select, $where, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'joinselect',
                            'table' => $table,
                            'select' => $select,
                            'where' => $where
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
    if($content != '') {
        $j_content = json_decode($content);
        $branchs = explode(',', $select);
        $tmp_branch = explode('.', $branchs[0]);
        $branch = trim($tmp_branch[1]);
        $items = array();
        $is_first = true;
        $i = 0;
        if (isset($j_content)) {
            foreach($j_content as $row) {
                if ($row[0] === $branch) {
                    if ($is_first === false) {
                        $i++;
                    } else {
                        $is_first = false;
                    }
                }
                $items[$i][$row[0]] = $row[1];
            }
        }
    } else {
        $items = array();
    }

    return $items;
}

function latest_joinselect_sqlserver($table, $select, $where, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'lastjoinselect',
                            'table' => $table,
                            'select' => $select,
                            'where' => $where
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
    $content = str_replace(array("null"), '"null"', $content);
    $j_content = json_decode($content);
    $items = array();
    if (isset($j_content)) {
            foreach($j_content as $row) {
                if ($row[0] === $branch) {
                    if ($is_first === false) {
                        $i++;
                    } else {
                        $is_first = false;
                    }
                }
                $items[$i][$row[0]] = $row[1];
            }
        }
    return $items;
}

function joinsortselect_sqlserver($table, $select, $where, $sort, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'joinsortselect',
                            'table' => $table,
                            'select' => $select,
                            'where' => $where,
                            'sort' => $sort
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
    $j_content = json_decode($content);
    $items = array();
    if ($content != '') {
        $branchs = explode(',', $select);
        $tmp_branch = explode('.', $branchs[0]);
        $branch = trim($tmp_branch[1]);
        $items = array();
        $is_first = true;
        $i = 0;
        if (isset($j_content)) {
            foreach($j_content as $row) {
                if ($row[0] === $branch) {
                    if ($is_first === false) {
                        $i++;
                    } else {
                        $is_first = false;
                    }
                }
                $items[$i][$row[0]] = $row[1];
            }
        }
    } else {
        $items = array();
    }

    return $items;
}

function getmaxnumber_sqlserver($table, $select, $where, $group, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'getmaxnumber',
                            'table' => $table,
                            'select' => $select,
                            'where' => $where,
                            'group' => $group
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
    $content = str_replace(array("null"), '"null"', $content);
    $j_content = json_decode($content);
    $items = array();
    if($content != '') {
        foreach($j_content as $row) {
            if(is_object($row)) {
                array_push($items, get_object_vars($row));
            }
        }
    }
    return $items;
}

function getimage($abroad, $file_name, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'getimage',
                            'abroad_no' => $abroad,
                            'file_name' => $file_name
                    )),
            )
    ));
    return file_get_contents($url, false, $context);
}

function setimage($abroad, $file_name, $comment, $file_class, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'setimage',
                            'abroad_no' => $abroad,
                            'file_class' => $file_class,
                            'file_name' => $file_name,
                            'comment' => $comment,
                            'type' => 'img'
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
}

function deleteimage($abroad, $file_name, $file_class, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'deleteimage',
                            'abroad_no' => $abroad,
                            'file_class' => $file_class,
                            'file_name' => $file_name,
                            'comment' => $comment,
                            'type' => 'img'
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
}

function setfile($abroad, $file_name, $comment, $file_class, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'setfile',
                            'abroad_no' => $abroad,
                            'file_class' => $file_class,
                            'file_name' => $file_name,
                            'comment' => $comment
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
}

function setclientfile($abroad, $file_name, $comment, $file_class, $url, $pass) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pass,
                            'command' => 'setclientfile',
                            'abroad_no' => $abroad,
                            'file_class' => $file_class,
                            'file_name' => $file_name,
                            'comment' => $comment
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
}

function webmail_list($table, $select, $where, $cipher_number, $cipher, $url, $pwd) {
    $context = stream_context_create(array(
            'http' => array(
                    'method' => 'POST',
                    'header' => implode('\r\n', array(
                            'Content-Type: application/x-www-form-urlencoded',
                    )),
                    'content' => http_build_query(array(
                            'pwd' => $pwd,
                            'command' => 'cipher_select',
                            'table' => $table,
                            'select' => $select,
                            'where' => $where,
                            'cipher_number' => $cipher_number,
                            'cipher' => $cipher
                    )),
            )
    ));

    $content = file_get_contents($url, false, $context);
    $j_content = json_decode($content);
    $items = array();
    foreach($j_content as $row) {
        if(is_object($row)) {
            array_push($items, get_object_vars($row));
        }
    }

    return $items;
}
function action_log($action, $content, $login_id) {
    require_once 'BaseModel.php';
    $bm = new BaseModel();
    if(!isset($_SESSION['mem_id'])) {
        $item = $bm->getInfo('clientlist', 'member_id', array('login_id', $login_id), null);
        $member_id = $item['member_id'];
    } else {
        $member_id = $_SESSION['mem_id'];
    }

    $data = array('member_id' => $member_id,
            'action_content' => $content,
            'action_datetime' => null,
            'created_on' => date('c'),
            'action_from' => $action,
            'connection_ip' => $_SERVER["REMOTE_ADDR"]
    );

    $result = $bm->insert('client_activity_log', $data);
}

function action_log_failed($action, $content, $login_id) {
    require_once 'BaseModel.php';
    $bm = new BaseModel();

    $data = array('member_id' => $login_id,
            'action_from' => $action,
            'connection_ip' => $_SERVER["REMOTE_ADDR"],
            'action_content' => $content
    );

    $result = $bm->insert('client_activity_log', $data);
}

function getCrmid($table, $member_id) {
    require_once 'BaseModel.php';
    $bm = new BaseModel();
    $select = array('crmid');
    $where = array('id', $member_id);
    $result = $bm->getInfo($table, $select, $where, null);

    return $result;
}

function getRandomString($nLengthRequired = 8){
    $sCharList = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
    mt_srand();
    $sRes = "";
    for($i = 0; $i < $nLengthRequired; $i++)
        $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
    return $sRes;
}

function clientcheck() {
    if (array_key_exists('crm_id', $_SESSION))	{
        if ($_SESSION['crm_id'] <> '') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function sortlist($params, $parent, $url, $pass) {
    if(empty($_SERVER['HTTPS'])) {
        $http = 'http://';
    } else {
        $http = 'https://';
    }

    $base = $http.$_SERVER["HTTP_HOST"].'/mypage';

    $down = "down";
    $up = "up";
    $unsorted = "unsorted";
    $down_img = $base."/themes/images/down.png";
    $up_img = $base."/themes/images/up.png";
    $unsorted_img = $base."/themes/images/unsorted.png";

    // init
    $parent->view->sortkey0 = $unsorted;
    $parent->view->order0 = $unsorted_img;
    $parent->view->sortkey1 = $unsorted;
    $parent->view->order1 = $unsorted_img;
    $parent->view->sortkey2 = $unsorted;
    $parent->view->order2 = $unsorted_img;
    $parent->view->sortkey3 = $unsorted;
    $parent->view->order3 = $unsorted_img;

    if (array_key_exists('sortkey', $params)) {
        $sort_key = $params['sortkey'];
    } else {
        $sort_key = null;
    }

    if (array_key_exists('order', $params)) {
        $order_key = $params['order'];
    } else {
        $order_key = null;
    }

    // create order param
    $parent->view->sortkey = $sort_key;
    $parent->view->orderkey = $order_key;

    switch($sort_key){
        case 'policy_number':
            if($order_key === 'ASC'){
                $parent->view->sortkey0 = $up;
                $parent->view->order0 = $up_img;
            } else {
                $parent->view->sortkey0 = $down;
                $parent->view->order0 = $down_img;
            }
            break;

        case 'agency_name':
            if($order_key === 'ASC'){
                $parent->view->sortkey1 = $up;
                $parent->view->order1 = $up_img;
            } else {
                $parent->view->sortkey1 = $down;
                $parent->view->order1 = $down_img;
            }
            break;

        case 'policy_owner':
            if($order_key === 'ASC'){
                $parent->view->sortkey2 = $up;
                $parent->view->order2 = $up_img;
            } else {
                $parent->view->sortkey2 = $down;
                $parent->view->order2 = $down_img;
            }
            break;

        case 'error_message':
            if($order_key === 'ASC'){
                $parent->view->sortkey3 = $up;
                $parent->view->order3 = $up_img;
            } else {
                $parent->view->sortkey3 = $down;
                $parent->view->order3 = $down_img;
            }
            break;

        default:
            break;
    }

    $table = 'T_INSURANCE_ERROR';
    $select = 'policy_number, policy_owner, client_no, study_abroad_no, agency_code, error_message, error_comment';
    $where['policy_number'] = array('column' => 'policy_number',
                                    'value' => 0,
                                    'comp' => 'ni',
                                    'andor' => 'null');
    if (!is_null($sort_key) && !is_null($order_key)) {
        $sort = array($sort_key => $order_key);
    } else {
        $sort = array();
    }


    $items = sortselect_sqlserver($table, $select, $where, $sort, $url, $pass);
    $parent->view->items = $items;
}

function writeEmail($toName, $fromMailAddress, $toMailAddress, $subject, $body) {
    $fromName = '一般社団法人日本ワーキングホリデー協会';

    $mailCharset = 'iso-2022-jp';
    $sourceCharset = 'UTF-8';

    /****************************
     * DO NOT EDIT THIS COMPLICATED EMCODING
    *  OTHERWISE, IT WILL BE CORRUPTION OF SENDER OR SOMETING ELSE.
    ****************************/
    // encoding UTF8->iso-2022-jp
    $fromName = mb_convert_encoding($fromName, $mailCharset, $sourceCharset);
    $toName = mb_convert_encoding($toName, $mailCharset, $sourceCharset);
    $subject = mb_convert_encoding($subject, $mailCharset, $sourceCharset);
    $body = mb_convert_encoding($body, $mailCharset, $sourceCharset);
    // authenticate settings
    $authConfig = array(
            'qdsn' => 'mail1.jawhm.net',
            'ssl' => 'tls',
            'port' => 587,
            'user' => 'smtpuser@jawhm.net',
            'password' => '303pittst124trave986'
            );

    // send server settings
    //$transport = new Zend_Mail_Transport_Smtp('192.168.11.98');   // test enviroment

    require_once 'Zend/Mail/Transport/Sendmail.php';
    require_once 'Zend/Mail.php';

    // internal_encoding UTF8->JIS
    mb_internal_encoding("JIS");

    // preparing to send email
    $mail = new Zend_Mail($mailCharset);
    $mail->setHeaderEncoding(Zend_Mime::ENCODING_BASE64);
    $mail->setFrom($fromMailAddress, mb_encode_mimeheader($fromName), 'JIS', 'B');
    $mail->addTo($toMailAddress, mb_encode_mimeheader($toName), 'JIS', 'B');
    $mail->addBcc($fromMailAddress);
    $mail->setSubject($subject);
    $mail->setBodyText($body);
    $mail->addHeader('Content-Type', 'text/plain; charset=iso-2022-jp');
    $mail->addHeader('Content-Transfer-Encoding', '7bit');
    try {
        $mail->send();
    } catch (Zend_Exception $ze) {
        echo '失敗';
        echo $ze;
    }

}

function showlist($params, $searchKey, $sortKey, $pagename, $parent) {
    $const = new MypageConst();
    $pass = $const::$SQL_SERVER['PASSWORD'];
    $url = $const::$SQL_SERVER['URL'];
    if(empty($_SERVER['HTTPS'])) {
        $base = 'http://';
    } else {
        $base = 'https://';
    }
    $base .= $_SERVER['HTTP_HOST'];
    $ua = smpcheck();
    $target = explode("/", $pagename);

    if (!$ua) {
        $down = "down";
        $up = "up";
        $unsorted = "unsorted";
        $down_img = $base."/mypage/themes/images/down.png";
        $up_img = $base."/mypage/themes/images/up.png";
        $unsorted_img = $base."/mypage/themes/images/unsorted.png";

        // init
        for($n=0; $n<count($sortKey); $n++) {
            $tmp_sort = 'sortkey' . $n;
            $tmp_order = 'order' . $n;

            $parent->view->$tmp_sort = $unsorted;
            $parent->view->$tmp_order = $unsorted_img;
        }

    } else {
        $parent->view->sort = '';
        $parent->view->order = '';
    }

    // is paginatorView?
    if (array_key_exists('page', $params)) {
        $nextpage = explode("/", $params['page']);
        $j = 0;
        if ($pagename === 'school/client/list') {
            $max_number = count($searchKey)+2;
        } else {
            $max_number = count($searchKey)+1;
        }
        for($i=1; $i<$max_number; $i++) {
            if ($nextpage[$i] != 'null') {
                ${$searchKey[$j]['key']} = $nextpage[$i];
                if (!is_null($searchKey[$j]['etc'])) {
                    $i++;
                }

            } else {
                if (!is_null($searchKey[$j]['etc'])) {
                    $i++;
                }
                ${$searchKey[$j]['key']} = null;
            }
            $j++;
        }

        if ($target[1] != 'school') {
            $i = $i - 1;
            $i++;

            if($nextpage[$i] != 'null') {
                $sort_key = $nextpage[$i];
            } else {
                $sort_key = null;
            }

            $i++;
            if($nextpage[$i] != 'null') {
                $order_key = $nextpage[$i];
            } else {
                $order_key = null;
            }
        } else {
            $sort_key = null;
        }

    // just search or sort(if first search key is exist, it seems to be search or sort.
    } else if (isset($params[$searchKey[0]['key']])) {
        for($k=0; $k<count($searchKey); $k++) {
            if (array_key_exists($searchKey[$k]['key'], $params)) {
                ${$searchKey[$k]['key']} = $params[$searchKey[$k]['key']];
                $_SESSION[$searchKey[$k]['key']] = $params[$searchKey[$k]['key']];
            } else {
                ${$searchKey[$k]['key']} = null;
            }
        }

        if(array_key_exists('sortkey', $params)) {
            $sort_key = $params['sortkey'];
        } else {
            $sort_key = null;
        }
        if(array_key_exists('order', $params)) {
            $order_key = $params['order'];
        } else {
            $order_key = null;
        }
    // for example, first time to search.
    } else {
        $i = 0;
        foreach($searchKey as $key) {
            if (array_key_exists($key['key'], $params) === false) {
                ${$searchKey[$i]['key']} = null;
            } else {
                if ($params[$key['key']] != '') {
                    ${$searchKey[$i]['key']} = $params[$key['key']];
                } else {
                    ${$searchKey[$i]['key']} = null;
                }
            }
            $i++;
        }
        $sort_key = null;
        $order_key = null;
    }

    // create order param
    if (is_null($sort_key)) {
        $sortkey = null;

    } else {
        $sortkey = $sort_key . ' ' . $order_key;
        $parent->view->sortkey = $sort_key;
        $parent->view->orderkey = $order_key ;

        $m = 0;

        if (!$ua) {
            foreach($sortKey as $key) {
                if ($sort_key === $key){
                    $tmp_sort = 'sortkey' . $m;
                    $tmp_order = 'order' . $m;

                    if($order_key == 'DESC'){
                        $parent->view->$tmp_sort = $down;
                        $parent->view->$tmp_order = $down_img;
                    } else {
                        $parent->view->$tmp_sort = $up;
                        $parent->view->$tmp_order = $up_img;
                    }
                    break;
                }
                $m++;
            }
        }
    }

    // is search target client or seminar?
    $andflag = false;

    if ($target[1] === 'client') {
        $where = array();
        $parPage = 10;
    } else if ($target[1] === 'seminar') {
        $where = '';
        $parPage = 12;
    } else if ($target[1] === 'school') {
        $where = '';
        $parPage = 5;
    }

    foreach($searchKey as $key) {
        if (!is_null(${$key['key']}) && ${$key['key']} != '') {
            switch($key['type']) {
                case 'client_equal':
                    if ($andflag) {
                        $andor = "and";
                    } else {
                        $andor = 'null';
                    }

                    $where[] = array('column' => $key['column'],
                            'value' => ${$key['key']},
                            'comp' => '=',
                            'andor' => $andor
                    );
                    $andflag = true;
                    break;

                case 'client_item':
                    if ($andflag) {
                        $andor = "and";
                    } else {
                        $andor = 'null';
                    }

                    $items = explode(':', ${$key['key']});
                    $where[] = array('column' => 'T_ENTRY_DETAILS.school_no',
                            'value' => $items[0],
                            'comp' => '=',
                            'andor' => $andor
                    );

                    $where[] = array('column' => "T_ENTRY_DETAILS.item",
                            'value' => str_replace(',', ' ', $items[1]),
                            'comp' => '=',
                            'andor' => 'and'
                    );

                    $andflag = true;
                    break;

                case 'client_name':
                    if ($andflag) {
                        $andor = "and";
                    } else {
                        $andor = 'null';
                    }

                    $where[] = array('column' => 'M_顧客基本情報.氏名',
                            'value' => '%' . ${$key['key']} . '%',
                            'comp' => 'like',
                            'andor' => $andor
                    );

                    $where[] = array('column' => 'M_顧客基本情報.フリガナ',
                            'value' => '%' . ${$key['key']} . '%',
                            'comp' => 'like',
                            'andor' => 'or'
                    );

                    $where[] = array('column' => "M_顧客基本情報.ラストネーム + ' ' + M_顧客基本情報.ファーストネーム",
                            'value' => '%' . ${$key['key']} . '%',
                            'comp' => 'like',
                            'andor' => 'or'
                    );

                    $andflag = true;
                    break;

                case 'client_entry_status':
                    if ($andflag) {
                        $andor = "and";
                    } else {
                        $andor = 'null';
                    }

                    $today = date('Y\-m\-d 00:00:00');
                    switch (${$key['key']}) {
                        case 0:
                            $where[] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                            'value' => $today,
                            'comp' => '>',
                            'andor' => $andor
                            );
                            break;

                        case 1:
                            $where[] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                            'value' => $today,
                            'comp' => '<=',
                            'andor' => $andor
                            );

                            $where[] = array('column' => 'DATEADD(week, T_ENTRY_DETAILS.weeks, T_ENTRY_DETAILS.entrance_date)',
                                    'value' => $today,
                                    'comp' => '>=',
                                    'andor' => 'and'
                            );
                            break;

                        case 2:
                            $where['sotugyou'] = array('column' => 'DATEADD(week, T_ENTRY_DETAILS.weeks, T_ENTRY_DETAILS.entrance_date)',
                            'value' => $today,
                            'comp' => '<',
                            'andor' => $andor
                            );

                            break;

                        default:
                            echo 'n';
                            break;
                    }

                    $andflag = true;
                    break;

                case 'client_entrance_date':
                    if ($andflag) {
                        $andor = "and";
                    } else {
                        $andor = 'null';
                    }

                    if ($key['etc'] == 0) {
                        $comp = ">=";
                    } else {
                        $comp = "<=";
                    }

                    $where[] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                            'value' => ${$key['key']},
                            'comp' => $comp,
                            'andor' => $andor
                    );

                    $andflag = true;
                    break;

                case 'seminar_like':
                    if ($andflag) {
                        $where = $where . " and ";
                    }

                    $where = $where . $key['column'] . " LIKE '%" . ${$key['key']} . "%'" ;
                    $andflag = true;
                    break;

                case 'seminar_equal':
                    if ($andflag) {
                        $where = $where . " and ";
                    }

                    $where = $where . $key['column'] . " = '" . ${$key['key']} . "'";
                    $andflag = true;
                    break;

                case 'seminar_after':
                    if ($andflag) {
                        $where = $where . " and ";
                    }

                    $where = $where . $key['column'] . " >= '" . ${$key['key']} . " 00:00:00'";
                    $andflag = true;
                    break;

                case 'seminar_before':
                    if ($andflag) {
                        $where = $where . " and ";
                    }

                    $where = $where . $key['column'] . " <= '" . ${$key['key']} . " 23:00:00'";
                    $andflag = true;
                    break;

                default:
                    break;
            }
        }
    }

    // execute search
    if ($target[1] === 'client') {
        $table['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => null);
        $table['M_顧客基本情報'] = array('table' => 'M_顧客基本情報', 'column' => 'お客様番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'client_no');
        $table['M_学校'] = array('table' => 'M_学校', 'column' => '学校番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');
        $select = "T_ENTRY_DETAILS.study_abroad_no, T_ENTRY_DETAILS.weeks, T_ENTRY_DETAILS.entrance_date,
                T_ENTRY_DETAILS.school_no, T_ENTRY_DETAILS.item, T_ENTRY_DETAILS.memo, M_顧客基本情報.氏名,
                M_顧客基本情報.ラストネーム, M_顧客基本情報.ファーストネーム,
                M_学校.短縮学校名";
        if ($andflag) {
            $andor = "and";
        } else {
            $andor = 'null';
        }

        $where[] = array('column' => 'T_ENTRY_DETAILS. comm_division',
                'value' => 0,
                'comp' => '<>',
                'andor' => $andor
        );

        $range_table = 'mypage_school_range';
        $school_numbers = $parent->model->getRange($range_table, $_SESSION['school_id']);

        $is_first = true;
        foreach($school_numbers as $no) {
            if($is_first) {
                $andor = 'and';
                $is_first = false;
            } else {
                $andor = 'or';
            }
            $where[] = array('column' => 'T_ENTRY_DETAILS.school_no',
                    'value' => $no['school_no'],
                    'comp' => '=',
                    'andor' => $andor
            );
        }

        $items = joinsortselect_sqlserver($table, $select, $where, $sortkey, $url, $pass);

    } else if($target[1] === 'seminar') {
        $base_table = array(array('event_list', 'id'));
        $join_table = array(array('entrylist', 'seminarid', 'seminarid'));
        $command = null;

        if ($sort_key != 'number') {
            $seminars = $parent->model->getSearchSeminar($base_table, $join_table, $where, $sortkey, $command);
        } else {
            $sortkey = null;
            $seminars = $parent->model->getSearchSeminar($base_table, $join_table, $where, $sortkey, $command);
        }

        $pre_id = null;
        $target_seminar = array();
        foreach($seminars as $seminar) {
            if ($seminar['id'] != $pre_id) {
                $target_seminar[] = $seminar;
                $pre_id = $seminar['id'];
            }
        }

        $join_numbers = $parent->model->seminarJoin(array('entrylist'), $target_seminar);

        $max_number = count($target_seminar);
        for($i=0; $i<$max_number; $i++) {
            $is_match = false;
            foreach ($join_numbers as $join_number) {
                if ($target_seminar[$i]['id'] == $join_number['seminarid']) {
                    $items[] = array($target_seminar[$i], $join_number);
                    $is_match = true;
                    break;
                }
            }
            if ($is_match == false) {
                $items[] = array($target_seminar[$i], array('number' => 0));
            }

        }
        if ($sort_key === 'number') {
            if ($order_key === 'ASC') {
                $order = SORT_ASC;
            } else {
                $order = SORT_DESC;
            }

            foreach($items as $key=>$value){
                $number[$key]=$value[1]["number"];
            }
            array_multisort($number, $order, $items);
        }
    } else if ($target[1] === 'school') {
        $table = 'mypage_seminar_proposal';
        $sortkey = null;

        $items = $parent->model->getSearchProposal($table, $where, $sortkey);
    }

    if (isset($nextpage[0])) {
        $pagenumber = $nextpage[0];
    } else {
        $pagenumber = 0;
    }

    if (isset($items)) {
        $paginator = Zend_Paginator::factory ($items);

        // set maximum items to be displayed in a page
        $paginator->setItemCountPerPage($parPage);
        $paginator->setCurrentPageNumber($pagenumber);
        $pages = $paginator->getPages();
        $pageArray = get_object_vars($pages);

        $parent->view->pages = $pageArray;
        $parent->view->items = $paginator->getIterator();
        $parent->view->pagename = $pagename;

        foreach($searchKey as $key) {
            $parent->view->$key['page'] = ${$key['key']};
        }
    } else {
        $parent->view->pages = null;
        $parent->view->items = null;
        $parent->view->pagename = null;

        foreach($searchKey as $key) {
            $parent->view->$key['page'] = null;
        }
    }
}

function getScreenMessage($table, $screen_id, $lang) {
    $select = array('message');
    $where = "mypage_screen_id = '$screen_id' and language = '$lang'";
    $sort = 'message_screen_id asc';

    $bm = new BaseModel();
    $result = $bm->searchList($table, $where, $select, $sort);

    return $result;
}

function headerLang($parent, $table) {
    $const = new MypageConst();
    $head_id = $const::$MYPAGE_SCREEN_ID['トップメニュー'];
    $side_id = $const::$MYPAGE_SCREEN_ID['サイドメニュー'];
    $head_msg = getScreenMessage($table, $head_id, $_SESSION['language']);
    $side_msg = getScreenMessage($table, $side_id, $_SESSION['language']);
    $parent->view->head_msg = $head_msg;
    $parent->view->side_msg = $side_msg;
}

function getFromAddress($client_no) {
    $const = new MypageConst();
    $pass = $const::$SQL_SERVER['PASSWORD'];
    $url = $const::$SQL_SERVER['URL'];

    $table['base'] = array('table' => 'Q_顧客拠点', 'column' => 'null');
    $table['office_base'] = array('table' => 'M_拠点', 'column' => '拠点コード',
            'ontable' => 'Q_顧客拠点', 'oncolumn' => '担当拠点コード');

    $select = "M_拠点.拠点メールアドレス";
    $where['client_no'] = array('column' => 'Q_顧客拠点.お客様番号',
            'value' => $client_no,
            'comp' => '=',
            'andor' => 'null');

    $items = joinselect_sqlserver($table, $select, $where, $url, $pass);
    return $items;
}

function getBase($client_no) {
    $const = new MypageConst();
    $pass = $const::$SQL_SERVER['PASSWORD'];
    $url = $const::$SQL_SERVER['URL'];

    $table = 'Q_顧客拠点';
    $select = "担当拠点コード";
    $where['client_no'] = array('column' => 'お客様番号',
            'value' => $client_no,
            'comp' => '=',
            'andor' => 'null');

    $items = select_sqlserver($table, $select, $where, $url, $pass);
    $baseCD = $items[0][0];
    switch($baseCD) {
        case 'KT':
        case 'TR':
        case 'FP':
        case 'ZZ':
            $office = 'tokyo';
            break;

        case 'KO':
        case 'OR':
            $office = 'osaka';
            break;

        case 'KF':
        case 'FK':
            $office = 'fukuoka';
            break;

        case 'KN':
            $office = 'nagoya';
            break;

        case 'KY':
        case 'YA':
            $office = 'toyama';
            break;

        case 'KK':
        case 'OK':
            $office = 'okinawa';
            break;

        default:
            $office = 'tokyo';
            break;
    }

    return $office;
}

function getMailList($client_no) {
    $const = new MypageConst();
    $pass = $const::$SQL_SERVER['PASSWORD'];
    $url = $const::$SQL_SERVER['URL'];
    $table = 'M_顧客メール情報';
    $select = "メールアドレス";
    $where['client_no'] = array('column' => 'お客様番号',
            'value' => $client_no,
            'comp' => '=',
            'andor' => 'null');
    $where['pre_departure'] = array('column' => '出発前連絡',
            'value' => 1,
            'comp' => '=',
            'andor' => 'AND');

    $email_list = select_sqlserver($table, $select, $where, $url, $pass);
    return $email_list;
}

function sendEmail($item, $items, $body_message, $use_keyemail, $email_list, $email, $subject) {
    $body = $item[0][1] . $body_message;

    if ($use_keyemail) {
        writeEmail($item[0][1], $items[0][0], $email['email'], $subject, $body);
    } else {
        foreach ($email_list as $email) {
            writeEmail($item[0][1], $items[0][0], $email[0], $subject, $body);
        }
    }
}