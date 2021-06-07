<?php
require_once ('Zend/Json.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/tools.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class School_ClientController extends Zend_Controller_Action {
    public $model;

    public function init() {
        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];
        $this->msg_tbl = 'mypage_message';

        if(empty($_SERVER['HTTPS'])) {
            $this->base = 'http://';
        } else {
            $this->base = 'https://';
        }
        $this->base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/ClientModel.php');
        $this->model = new ClientModel ();
        initPage($this, '/application/modules/', 'school');
        $withoutList = array();
        without_loginschool($this, $withoutList, $this->base);
        headerLang($this, $this->msg_tbl);
    }

    /**
     * index
     */
    public function indexAction() {
        $range_table = 'mypage_school_range';
        $school_numbers = $this->model->getRange($range_table, $_SESSION['school_id']);

        $table = 'M_コース契約';
        $select = "学校番号, 商品番号, 商品名, 掲載メモ";
        $where[] = array('column' => 'コミッション区分',
                'value' => 1,
                'comp' => '=',
                'andor' => 'null');

        $is_first = true;
        foreach($school_numbers as $no) {
            if($is_first) {
                $andor = 'and';
                $is_first = false;
            } else {
                $andor = 'or';
            }
            $where[] = array('column' => '学校番号',
                    'value' => $no['school_no'],
                    'comp' => '=',
                    'andor' => $andor
            );
        }

        $pre_item = null;
        $items = array();
        $courses = select_sqlserver($table, $select, $where, $this->url, $this->pass);
        foreach($courses as $item) {
            if ($item[2] != $pre_item) {
                $items[] = array('school' => $item[0],
                                 'item' => $item[2]);
                $pre_item = $item[2];
            }
        }

        $school_table = 'M_学校';
        $school_select = "日本語名";

        $is_first = true;
        foreach($school_numbers as $no) {
            if($is_first) {
                $is_first = false;
            } else {
                $andor = 'or';
            }
            $school_where[$no['school_no']] = array('column' => '学校番号',
                    'value' => $no['school_no'],
                    'comp' => '=',
                    'andor' => $andor
            );
        }

        $school_names = select_sqlserver($school_table, $school_select, $school_where, $this->url, $this->pass);
        $this->view->school_names = $school_names;
        $this->view->items = $items;
        $this->view->datetimepicker = 1;

        if (isset($_SESSION['search_school_name'])) {
            $this->view->search_school_name = $_SESSION['search_school_name'];
        } else {
            $this->view->search_school_name = null;
        }

        if (isset($_SESSION['search_course'])) {
            $this->view->search_course = $_SESSION['search_course'];
        } else {
            $this->view->search_course = null;
        }

        if (isset($_SESSION['search_name'])) {
            $this->view->search_name = $_SESSION['search_name'];
        } else {
            $this->view->search_name = null;
        }

        if (isset($_SESSION['search_entry_status'])) {
            $this->view->search_entry_status = $_SESSION['search_entry_status'];
        } else {
            $this->view->search_entry_status = null;
        }

        if (isset($_SESSION['search_entrance_date'])) {
            $this->view->search_entrance_date = $_SESSION['search_entrance_date'];
        } else {
            $this->view->search_entrance_date = null;
        }

        if (isset($_SESSION['search_entrance_timing'])) {
            $this->view->search_entrance_timing = $_SESSION['search_entrance_timing'];
        } else {
            $this->view->search_entrance_timing = null;
        }

        if (isset($_SESSION['search_entrance_timing'])) {
            $this->view->search_entrance_timing = $_SESSION['search_entrance_timing'];
        } else {
            $this->view->search_entrance_timing = null;
        }

        if (isset($_SESSION['search_week'])) {
            $this->view->search_week = $_SESSION['search_week'];
        } else {
            $this->view->search_week = null;
        }

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様情報検索'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様情報検索結果'];
        $result_message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $brd_id = $const::$MYPAGE_SCREEN_ID['パンくずリスト'];
        $bread_message = getScreenMessage($this->msg_tbl, $brd_id, $_SESSION['language']);
        $this->view->brd_msg = $bread_message;

        $this->view->msg = $message;
        $this->view->brd_msg = $bread_message;
        $this->view->rst_msg = $result_message;
        $this->view->lang = $_SESSION['language'];
        $this->view->title = 'お客様情報検索';
    }

    public function clientsearchAction() {
        $params = $this->getRequest ()->getParams ();

        $this->view->params = $params;
        $this->view->resultsort = dirname ( dirname ( __FILE__ ) ) . '/views/client/resultsort.tpl';
    }

    public function listAction() {
        $params = $this->getRequest ()->getParams ();

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様情報検索結果'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        // consider about search_entrance_timing for after page 2
        if (array_key_exists('page', $params)) {
            $nextpage = explode("/", $params['page']);
            $entrance_timing = $nextpage[6];
        } else {
            if (isset($params['search_entrance_timing'])) {
                $entrance_timing = $params['search_entrance_timing'];
            } else {
                $entrance_timing = null;
            }
        }

        $searchKey = array(
                array('key' => 'search_school_name', 'type' => 'client_equal', 'column' => 'M_学校.日本語名', 'page' => 'searchschool_name', 'etc' => null),
                array('key' => 'search_item', 'type' => 'client_item', 'column' => 'T_ENTRY_DETAILS.school_no', 'page' => 'searchitem',  'etc' => null),
                array('key' => 'search_name', 'type' => 'client_name', 'column' => 'M_顧客基本情報.氏名', 'page' => 'searchname',  'etc' => null),
                array('key' => 'search_entry_status', 'type' => 'client_entry_status', 'column' => 'T_ENTRY_DETAILS.entrance_date', 'page' => 'searchentry_status',  'etc' => null),
                array('key' => 'search_entrance_date', 'type' => 'client_entrance_date', 'column' => 'T_ENTRY_DETAILS.entrance_date', 'page' => 'searchentrance_date',  'etc' => $entrance_timing),
                array('key' => 'search_week', 'type' => 'client_equal', 'column' => 'T_ENTRY_DETAILS.weeks', 'page' => 'searchweek', 'etc' => null)
        );

        $sortKey = array(
                '短縮学校名',
                'フリガナ',
                'item',
                'weeks',
                'entrance_date'
        );
        $pagename = 'school/client/list';

        $_SESSION['search_entrance_timing'] = $entrance_timing;

        showList($params, $searchKey, $sortKey, $pagename, $this);
        $this->view->searchentrance_timing = $entrance_timing;
        $this->view->msg = $message;
    }

    public function resetAction() {
        unset($_SESSION['search_school_name']);
        unset($_SESSION['search_item']);
        unset($_SESSION['search_name']);
        unset($_SESSION['search_entry_status']);
        unset($_SESSION['search_entrance_date']);
        unset($_SESSION['search_entrance_timing']);
        unset($_SESSION['search_week']);
    }

    public function detailAction() {
        $params = $this->getRequest ()->getParams ();
        if ($_SESSION['abroad'] == '') {
            $_SESSION['abroad'] = $params['abroad'];
            $_SESSION['school_no'] = $params['school_no'];
        } else {
            if (array_key_exists('abroad', $params)) {
                $_SESSION['abroad'] = $params['abroad'];
                $_SESSION['school_no'] = $params['school_no'];
            } else {
                $_SESSION['abroad'] == $_SESSION['abroad'];
                $_SESSION['school_no'] = $_SESSION['school_no'];
            }
        }

        $file_type = 94; // passport
        $range_table = 'mypage_school_range';

        // get basic informartion
        $school_numbers = $this->model->getRange($range_table, $_SESSION['school_id']);

        $table_base['base'] = array('table' => 'T_ENTRY', 'column' => 'null');
        $table_base['T_ENTRY_DETAILS'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'study_abroad_no',
                                        'ontable' => 'T_ENTRY', 'oncolumn' => 'study_abroad_no');
        $table_base['M_SCHOOL'] = array('table' => 'M_学校', 'column' => '学校番号',
                                    'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'school_no');
        $table_base['M_info'] = array('table' => 'M_顧客基本情報', 'column' => 'お客様番号',
                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'client_no');

        $select_base = "T_ENTRY.client_no, T_ENTRY.leave_date, T_ENTRY.arrival_date,  T_ENTRY_DETAILS.memo,
                T_ENTRY_DETAILS.entry_class, T_ENTRY_DETAILS.entrance_date, T_ENTRY_DETAILS.weeks,
                M_学校.日本語名, M_学校.短縮国名, M_顧客基本情報.氏名,
                M_顧客基本情報.ラストネーム, M_顧客基本情報.ファーストネーム, M_顧客基本情報.性別";
        $where_base[] = array('column' => 'T_ENTRY.study_abroad_no',
                                            'value' => $_SESSION['abroad'],
                                            'comp' => '=',
                                            'andor' => 'null');
        $where_base[] = array('column' => 'T_ENTRY_DETAILS.school_no',
                                            'value' => $_SESSION['school_no'],
                                            'comp' => '=',
                                            'andor' => 'AND');
        $where_base[] = array('column' => 'T_ENTRY_DETAILS.comm_division',
                                            'value' => 0,
                                            'comp' => '<>',
                                            'andor' => 'AND');
        $where_base[] = array('column' => 'T_ENTRY_DETAILS.entrance_date',
                                            'value' => 'null',
                                            'comp' => 'ni',
                                            'andor' => 'AND');

        $base = joinselect_sqlserver($table_base, $select_base, $where_base, $this->url, $this->pass);

        // get passport
        $table = 'T_ATTACH_FILE';
        $select = "file_name";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['file_class'] = array('column' => 'file_class',
                'value' => $file_type,
                'comp' => '=',
                'andor' => 'AND');
        $where['school_perusal'] = array('column' => 'school_perusal',
                'value' => 1,
                'comp' => '=',
                'andor' => 'AND');

        $passport_items = select_sqlserver($table, $select, $where, $this->url, $this->pass);
        if (!empty($passport_items)) {
            $file_name = $passport_items[0]['file_name'];
            $type = substr(strrchr($file_name, '.'), 1);
            if($type === 'jpg') {
                $ext = 'jpeg';
            } else {
                $ext = $type;
            }

            $image = getimage($_SESSION['abroad'], $file_name, $this->url, $this->pass);

            $this->view->passport = 'data:image/'.$ext.';base64,' . $image;
        } else {
            $this->view->passport = null;
        }

        // flight information
        $entrance_date = $base[0]['entrance_date'];

        $table2 = 'T_SC_customer_flight';
        $select2 = 'ID,flight_number,departure_place,departure_time,destination_place,destination_time';
        $where2['contract_number'] = array('column' => 'contract_number',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where2['departure_time'] = array('column' => 'departure_time',
                'value' => $entrance_date,
                'comp' => '<=',
                'andor' => 'AND');

        $flight_items = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);

        $table3 = 'T_VISA';
        $select3 = "branch_no, visa_type, visa_number, passport_number, expected_entrance_date, expected_return_date, arrival_date, visa_expiry_date, account_no, taxfilenumber";
        $where3['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where3['delete_flag'] = array('column' => 'delete_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'AND'
        );

        $visa_items = select_sqlserver($table3, $select3, $where3, $this->url, $this->pass);
        if(count($visa_items) > 0) {
            $visa = $visa_items[0];
        } else {
            $visa = null;
        }

        $table4 = 'T_CLIENT_INSURANCE';
        $select4 = 'branch_no, provider_name, insurance_type, policy_number, policy_owner, line, line_english, insured_date_st, insured_date_ed, division, division_english, deposit_amount';
        $where4['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where4['delete_flag'] = array('column' => 'delete_flag',
                'value' => 0,
                'comp' => '=',
                'andor' => 'AND');
        $insurance_items = select_sqlserver($table4, $select4, $where4, $this->url, $this->pass);
        if(count($insurance_items) > 0) {
            $insurance = $insurance_items[0];
        } else {
            $insurance = null;
        }

        // key rename event's date
        $key_rename = array();
        $n = 0;
        $leave_date = $base[0]['leave_date'];
        foreach($base as $array) {
            foreach($array as $key => $value) {
                switch($key) {
                    // set T_ENTRY information
                    case 'entrance_date':
                        $key_rename[$n]['event_date'] = str_replace('00:00:00.000', '23:59:59.999', $value);
                        break;

                        // other informartion
                    default:
                        $key_rename[$n][$key] = $value;
                }
            }
            $n++;
        }

        $m = 0;
        foreach($flight_items as $array) {
            $flights[$m]['entry_class'] = 9;
            foreach ($array as $key => $val) {
                switch($key) {
                    // set T_ENTRY information
                    case 'departure_time':
                        $flights[$m]['event_date'] = $val;
                        break;

                        // other informartion
                    default:
                        $flights[$m][$key] = $val;
                }
            }
            $m++;
        }

        if (empty($flights)) {
            $lists = array_merge($key_rename);
        } else {
            $lists = array_merge($key_rename, $flights);
        }

        foreach ($lists as $key => $value) {
            $class_sort[$key] = $value['entry_class'];
            $date_sort[$key] = $value['event_date'];
        }
        array_multisort($date_sort, SORT_ASC, $class_sort, SORT_DESC, $lists);

        // get client's basic information
        $client_no = $base[0]['client_no'];
        $_SESSION['crm_id'] = $client_no;

        $email_table = 'M_顧客メール情報';
        $email_select = 'メールアドレス';
        $email_where['client_no'] = array('column' => 'お客様番号',
                'value' => $client_no,
                'comp' => '=',
                'andor' => 'null');
        $email_where['arrival'] = array('column' => '出発後連絡',
                'value' => 1,
                'comp' => '=',
                'andor' => 'and');

        $email_items = select_sqlserver($email_table, $email_select, $email_where, $this->url, $this->pass);
        if(count($email_items) > 0) {
            $email = $email_items[0];
        } else {
            $email = null;
        }

        $address_table = 'M_顧客住所';
        $address_select = '電話番号１, 住所１, 住所２, 住所３, 住所４';
        $address_where['client_no'] = array('column' => 'お客様番号',
                'value' => $client_no,
                'comp' => '=',
                'andor' => 'null');
        $address_where['arrival'] = array('column' => '住所種類',
                'value' => '留学先',
                'comp' => '=',
                'andor' => 'and');

        $address_items = select_sqlserver($address_table, $address_select, $address_where, $this->url, $this->pass);
        if(count($address_items) > 0) {
            $address = $address_items[0];
        } else {
            $address = null;
        }

        $family_table = 'M_顧客住所';
        $family_select = '電話番号１';
        $family_where['client_no'] = array('column' => 'お客様番号',
                'value' => $client_no,
                'comp' => '=',
                'andor' => 'null');
        $family_where['arrival'] = array('column' => '住所種類',
                'value' => '実家',
                'comp' => '=',
                'andor' => 'and');

        $family_items = select_sqlserver($family_table, $family_select, $family_where, $this->url, $this->pass);
        if(count($family_items) > 0) {
            $family = $family_items[0];
        } else {
            $family = null;
        }

        $memo_table = 'mypage_client_memo';
        $module = 'client';
        $contact_school = $this->model->getContact($memo_table, $client_no, $module);
        if (isset($contact_school[0]['mem_id'])) {
            $_SESSION['mem_id'] = $contact_school[0]['mem_id'];
        }

        $paginator = Zend_Paginator::factory($contact_school);
        $paginator->setItemCountPerPage(5);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $pages = $paginator->getPages();
        $pageArray = get_object_vars($pages);

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様情報詳細'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $brd_id = $const::$MYPAGE_SCREEN_ID['パンくずリスト'];
        $bread_message = getScreenMessage($this->msg_tbl, $brd_id, $_SESSION['language']);
        $this->view->msg = $message;
        $this->view->brd_msg = $bread_message;

        $this->view->base_info = $base[0];
        $this->view->flight = $flight_items;
        $this->view->visa = $visa;
        $this->view->insurance = $insurance;
        $this->view->email = $email;
        $this->view->address = $address;
        $this->view->family = $family;
        $this->view->items = $lists;
        $this->view->pages = $pageArray;
        $this->view->contact_school = $paginator->getIterator();
        $this->view->school_name = $_SESSION['school_name'];
        $this->view->face = 1;
        $this->view->lang = $_SESSION['language'];
        $this->view->title = 'お客様情報詳細';
    }

    public function getpassportAction() {
        // get passport
        $file_type = 94; // passport
        $table = 'T_ATTACH_FILE';
        $select = "file_name";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['file_class'] = array('column' => 'file_class',
                'value' => $file_type,
                'comp' => '=',
                'andor' => 'AND');

        $passport_items = select_sqlserver($table, $select, $where, $this->url, $this->pass);
        if (!empty($passport_items)) {
            $file_name = $passport_items[0]['file_name'];
            $type = substr(strrchr($file_name, '.'), 1);
            if($type === 'jpg') {
                $ext = 'jpeg';
            } else {
                $ext = $type;
            }

            $image = getimage($_SESSION['abroad'], $file_name, $this->url, $this->pass);

            $this->view->passport = 'data:image/'.$ext.';base64,' . $image;
        }
    }

    public function changecontactAction() {
        $params = $this->getRequest ()->getParams ();
        if ($params['id'] != 'new') {
            $table = 'mypage_client_memo';

            $contact = $this->model->getMemo($table, $params['id']);
            $id = $contact['mypage_client_memo_id'];
            $memo = $contact;

        } else {
            $memo = null;
            $id = 'new';
        }

        $_SESSION['mypage_client_memo_id'] = $id;

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様メモ入力'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->msg = $message;
        $this->view->memo = $memo['memo'];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('client_contact');
    }

    public function editcontactAction() {
        $params = $this->getRequest ()->getParams ();
        $table = 'mypage_client_memo';

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        if(empty($params['memo']) || mb_strlen($params['memo']) > 300) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if ($_SESSION['mypage_client_memo_id'] === 'new') {
            $table_mem = 'memlist';
            $mem_id = $this->model->getMemID($table_mem, $_SESSION['crm_id']);
            $result = $this->model->insertMemo($table, $params, $mem_id['id']);
            $id = $this->model->getCurrentID($table, 'mypage_client_memo_id');
            $status = 'new';

        } else {
            $result = $this->model->updateMemo($table, $params);
            $status = 'edit';
        }

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様メモ入力完了'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->msg = $message;

        $this->writeEmail($this, $status, $params['memo'], $_SESSION['mypage_client_memo_id']);

        $memo_table = 'T_顧客履歴';
        $memo_insert = array (
                'お客様番号' => $_SESSION ['crm_id'],
                '日付' => date ( 'Y-m-d G:i:s' ),
                '問合せ方法' => '学校連絡',
                '内容' => $params ['memo']
        );

        $ret = insert_sqlserver ( $memo_table, $memo_insert, $this->url, $this->pass );

        unset ($_SESSION['mypage_client_memo_id']);
        unset ($_SESSION['crm_id']);
    }

    public function memodelconfirmAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['mypage_client_memo_id'] = $params['id'];
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様メモ削除確認'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->msg = $message;

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('clientmemodelete');
        $this->view->memo = $params['memo'];
    }

    public function deletememoAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $table = 'mypage_client_memo';
        $result = $this->model->deleteMemo($table, $_SESSION['mypage_client_memo_id']);
        $this->writeEmail($this, 'delete', $params['memo'], $_SESSION['mypage_client_memo_id']);
        unset ($_SESSION['mypage_client_memo_id']);
        unset ($_SESSION['crm_id']);

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様メモ削除完了'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->msg = $message;
    }

    public function fileuploadAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('fileupload');

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['ファイルアップロード'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->msg = $message;
    }

    public function fileprocessAction() {
        $params = $this->getRequest ()->getParams ();
        $uploadPath = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/';
        $adapter = new Zend_File_Transfer_Adapter_Http ();
        $adapter->setDestination ( $uploadPath );

        if (! $adapter->receive ()) {
            $messages = $adapter->getMessages ();
            echo implode ( "\n", $messages );
        }

        $file_name = $adapter->getFileName (null, false);
        rename($uploadPath.$file_name, $uploadPath.$_SESSION['abroad']);

        switch($params['attach_class']) {
            case 21:
                $comment = 'INVOICE(WH)';
                break;

            case 22:
                $comment = 'INVOICE(お客様)';
                break;

            case 23:
                $comment = 'LOA';
                break;

            case 24:
                $comment = 'COE';
                break;

            case 100:
                $comment = 'ホームステイ資料';
                break;

            case 26:
                $comment = 'ピックアップ情報';
                $is_mail = true;
                break;

            default:
                $comment = null;
                break;
        }

        $file_class = $params['attach_class'];
        $ret = setfile($_SESSION['abroad'], $file_name, $comment, $file_class, $this->url, $this->pass);

        unlink($uploadPath . $_SESSION['abroad']);

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['アップロード成功'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        switch ($params['attach_class']) {
            case 23:
                $table = 'M_顧客基本情報';
                $select = "お客様番号, 氏名";
                $where['client_no'] = array('column' => 'お客様番号',
                        'value' => substr($_SESSION['abroad'], 0, 10),
                        'comp' => '=',
                        'andor' => 'null');

                $info = select_sqlserver($table, $select, $where, $this->url, $this->pass);
                $type = 'LoA';
                $this->alertMail($this, $info, $type);
                break;

            case 100:
                $table = 'M_顧客基本情報';
                $select = "お客様番号, 氏名";
                $where['client_no'] = array('column' => 'お客様番号',
                        'value' => substr($_SESSION['abroad'], 0, 10),
                        'comp' => '=',
                        'andor' => 'null');

                $info = select_sqlserver($table, $select, $where, $this->url, $this->pass);
                $type = 'ホームステイ情報';
                $this->alertMail($this, $info, $type);
                break;
        }

        $this->view->msg = $message;
    }

    public function filelistAction() {
        $table['base'] = array('table' => 'T_ATTACH_FILE', 'column' => null);
        $table['M_CLASS'] = array('table' => 'M_CLASS', 'column' => 'class',
                'ontable' => 'T_ATTACH_FILE', 'oncolumn' => 'file_class');
        $select = 'T_ATTACH_FILE.branch_no, T_ATTACH_FILE.file_name,
                T_ATTACH_FILE.comment, T_ATTACH_FILE.insert_date,
                M_CLASS.class, M_CLASS.class_name';
        $where['abroad_no'] = array('column' => 'T_ATTACH_FILE.study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['division'] = array('column' => 'M_CLASS.division',
                'value' => 1,
                'comp' => '=',
                'andor' => 'and');
        $where['school_perusal'] = array('column' => 'T_ATTACH_FILE.school_perusal',
                'value' => 1,
                'comp' => '=',
                'andor' => 'and');
        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);

        // matching file class from SQL Server
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様関連ファイル'];
        $message = $this->model->getClassName($this->msg_tbl, $scr_id, $_SESSION['language']);

        $brd_id = $const::$MYPAGE_SCREEN_ID['パンくずリスト'];
        $bread_message = getScreenMessage($this->msg_tbl, $brd_id, $_SESSION['language']);

        $this->view->msg = $message;
        $this->view->brd_msg = $bread_message;

        $this->view->items = $items;
        $this->view->school_name = $_SESSION['school_name'];
        $this->view->title = 'お客様ファイルリスト';
    }

    public function getfileAction() {
        $params = $this->getRequest ()->getParams ();
        $table = 'T_ATTACH_FILE';
        $select = "file_name";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['branch_no'] = array('column' => 'branch_no',
                'value' => $params['branch_no'],
                'comp' => '=',
                'andor' => 'AND');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);
        if(!isset($items[0]['file_name'])) {
            return $this->_forward ( 'nofile', 'index', 'error' );
        }
        $_SESSION['file_name'] = $items[0]['file_name'];

        $context2 = stream_context_create(array(
                'http' => array(
                        'method' => 'POST',
                        'header' => implode('\r\n', array(
                                'Content-Type: application/x-www-form-urlencoded',
                        )),
                        'content' => http_build_query(array(
                                'pwd' => $this->pass,
                                'command' => 'getfile',
                                'abroad_no' => $_SESSION['abroad'],
                                'file_name' => $_SESSION['file_name']
                        )),
                )
        ));
        $content = file_get_contents($this->url, false, $context2);
        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/';
        $fp=fopen($write_path . $_SESSION['abroad'].$_SESSION['file_name'], "w");
        fwrite($fp, $content);
        fclose($fp);
    }

    public function showfileAction() {
        $write_path = dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/data/';

        header('Content-Length: ' . filesize ( $write_path.$_SESSION['abroad'].$_SESSION['file_name'] ) );
        header('Content-Type: application/octet-stream');
        header('Content-disposition: attachment; filename="' . $_SESSION['abroad'].$_SESSION['file_name']. '"');
        readfile($write_path.$_SESSION['abroad'].$_SESSION['file_name']);
        unlink($write_path.$_SESSION['abroad'].$_SESSION['file_name']);
        unset($_SESSION['file_name']);
    }

    private function writeEmail($parent, $status, $message, $id) {
        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $charge_name = $this->model->getChargeName('mypage_school_memlist', $_SESSION['school_id']);
        $toName = '一般社団法人日本ワーキングホリデー協会';
        $toMailAddress = 'school@jawhm.or.jp';

        $client_info = $this->model->getClientInfo('memlist', $_SESSION['crm_id']);
        if ($status === 'new') {
            $subject = $_SESSION['school_name'].' '.$charge_name['charge_name'].'様から'.$client_info['namae'].'様のメモを作成しました<school>['.$_SESSION['crm_id'].']('.$id.')';
        } else if ($status === 'edit') {
            $subject = $_SESSION['school_name'].' '.$charge_name['charge_name'].'様が'.$client_info['namae'].'様のメモを編集しました<school>['.$_SESSION['crm_id'].']('.$id.')';
        } else {
            $subject = $_SESSION['school_name'].' '.$charge_name['charge_name'].'様が'.$client_info['namae'].'様のメモを削除しました<school>['.$_SESSION['crm_id'].']('.$id.')';
        }
        $body = $message;

        writeEmail($toName, $fromMailAddress, $toMailAddress, $subject, $body);
    }

    private function alertMail($parent, $info, $type) {
        $use_keyemail = false;
        $email_list = getMailList($info[0][0]);
        // if pre_departure check is  off, use login email address
        if (empty($email_list)) {
            $use_keyemail = true;
            $email = $this->model->getEmail('memlist', $info[0][0]);
        } else {
            $email = null;
        }

        $office = getBase($info[0][0]);

        $items = getFromAddress($info[0][0]);
        $body_message = $info[0][1].'様';
        $body_message .= chr(10);
        $body_message .= '学校より' . $type . 'が届きました。';
        $body_message .= chr(10);
        $body_message .= 'マイページ「出発前」よりご確認をお願いします。';
        $body_message .= chr(10);
        $body_message .= 'https://www.jawhm.or.jp/mypage/';
        $subject = $info[0][1].'様'. $type . 'が届きました['.$info[0][0].']';

        sendEmail($info, $items, $body_message, $use_keyemail, $email_list, $email, $subject);
    }

}
