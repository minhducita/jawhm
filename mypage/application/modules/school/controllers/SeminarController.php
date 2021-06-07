<?php
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/tools/common.php');
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/tools/tools.php');
require_once (dirname ( dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ) . '/tools/MypageConst.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/kana2roma.php');

class School_SeminarController extends Zend_Controller_Action {
    public $model;

    /**
     */
    public function init() {
        $const = new MypageConst ();
        $this->pass = $const::$SQL_SERVER ['PASSWORD'];
        $this->url = $const::$SQL_SERVER ['URL'];
        $this->msg_tbl = 'mypage_message';

        if (empty ( $_SERVER ['HTTPS'] )) {
            $this->base = 'http://';
        } else {
            $this->base = 'https://';
        }
        $this->base .= $_SERVER ['HTTP_HOST'];
        $root_dir = dirname ( dirname ( __FILE__ ) ) . '/';
        require_once ($root_dir . 'models/SeminarModel.php');
        $this->model = new SeminarModel ();
        initPage ( $this, '/application/modules/', 'school' );
        $withoutList = array ();
        without_loginschool ( $this, $withoutList, $this->base );
        headerLang ( $this, $this->msg_tbl );
    }

    /**
     * index
     */
    public function indexAction() {
        $range_table = 'mypage_school_range';
        $school_numbers = $this->model->getRange ( $range_table, $_SESSION ['school_id'] );

        $pre_name = null;
        $school_names = array ();
        foreach ( $school_numbers as $key => $value ) {
            if ($value != $pre_name) {
                $school_names [] = $value;
                $pre_name = $value;
            }
        }

        $this->view->school_names = $school_names;
        $this->view->datetimepicker = 1;

        if (isset ( $_SESSION ['search_school_name'] )) {
            $this->view->search_school_name = $_SESSION ['search_school_name'];
        } else {
            $this->view->search_school_name = null;
        }

        if (isset ( $_SESSION ['search_place'] )) {
            $this->view->search_place = $_SESSION ['search_place'];
        } else {
            $this->view->search_place = null;
        }

        if (isset ( $_SESSION ['search_start_date'] )) {
            $this->view->search_start_date = $_SESSION ['search_start_date'];
        } else {
            $this->view->search_start_date = null;
        }

        if (isset ( $_SESSION ['search_end_date'] )) {
            $this->view->search_end_date = $_SESSION ['search_end_date'];
        } else {
            $this->view->search_end_date = null;
        }

        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['セミナー情報検索'];
        $message = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );

        $scr_id = $const::$MYPAGE_SCREEN_ID ['セミナー情報検索結果'];
        $result_message = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );

        $brd_id = $const::$MYPAGE_SCREEN_ID ['パンくずリスト'];
        $bread_message = getScreenMessage ( $this->msg_tbl, $brd_id, $_SESSION ['language'] );
        $this->view->brd_msg = $bread_message;

        $this->view->msg = $message;
        $this->view->brd_msg = $bread_message;
        $this->view->rst_msg = $result_message;
        $this->view->lang = $_SESSION['language'];
        $this->view->title = 'セミナー情報検索';
    }
    public function seminarsearchAction() {
        $params = $this->getRequest ()->getParams ();

        $this->view->params = $params;
    }
    public function listAction() {
        $params = $this->getRequest ()->getParams ();

        $searchKey = array (
                array (
                        'key' => 'search_school_name',
                        'type' => 'seminar_like',
                        'column' => 'event_list.k_title1',
                        'etc' => null,
                        'page' => 'searchschool_name'
                ),
                array (
                        'key' => 'search_place',
                        'type' => 'seminar_equal',
                        'column' => 'event_list.place',
                        'etc' => null,
                        'page' => 'searchplace'
                ),
                array (
                        'key' => 'search_start_date',
                        'type' => 'seminar_after',
                        'column' => 'starttime',
                        'etc' => null,
                        'page' => 'searchstart_date'
                ),
                array (
                        'key' => 'search_end_date',
                        'type' => 'seminar_before',
                        'column' => 'starttime',
                        'etc' => null,
                        'page' => 'searchend_date'
                )
        );

        $sortKey = array (
                'starttime',
                'k_title1',
                'number'
        );

        $pagename = 'school/seminar/list';

        showlist ( $params, $searchKey, $sortKey, $pagename, $this );

        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['セミナー情報検索結果'];
        $message = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );

        $this->view->msg = $message;
    }
    public function resetAction() {
        unset($_SESSION ['search_school_name']);
        unset($_SESSION ['search_place']);
        unset($_SESSION ['search_start_date']);
        unset($_SESSION ['search_end_date']);
    }
    public function detailAction() {
        $params = $this->getRequest ()->getParams ();
        if ($_SESSION ['seminar_id'] == '') {
            $_SESSION ['seminar_id'] = $params ['seminar'];
        } else {
            if (array_key_exists ( 'seminar', $params )) {
                $_SESSION ['seminar_id'] = $params ['seminar'];
            }
        }

        $seminar = $this->model->seminarInfo ( 'event_list', $_SESSION ['seminar_id'] );
        $join_member = $this->model->seminarMember ( 'entrylist', $_SESSION ['seminar_id'] );

        $roma = new kana2roma();
        foreach($join_member as &$member) {
            $member['roma'] = $roma->conv($member['furigana']);
        }
        $join_number = $this->model->seminarJoin ( 'entrylist', array (
                array (
                        'id' => $_SESSION ['seminar_id']
                )
        ) );

        if (isset($join_number [0] ['number'])) {
            $number = $join_number [0] ['number'];
        } else {
            $number = 0;
        }

        $check_base = array ();
        foreach ( $join_member as $member2 ) {
            if (empty ( $member2 ['kyomi'] )) {
                $check_base [] = $member2 ['customid'];
            }
        }

        if (is_null ( $check_base )) {
            $table = 'M_顧客基本情報';
            $select = "お客様番号, 出発予定日, 予定国";

            $is_first = true;
            foreach ( $check_base as $crmid ) {
                if ($is_first) {
                    $andor = null;
                    $is_first = false;
                } else {
                    $andor = 'or';
                }
                $where [] = array (
                        'column' => 'お客様番号',
                        'value' => $crmid ['customid'],
                        'comp' => '=',
                        'andor' => $andor
                );
            }

            $base_info = select_sqlserver ( $table, $select, $where, $this->url, $this->pass );

            $n = count ( $base_info );

            for($i = 0; $i > $n; $i ++) {
                foreach ( $join_member as $member ) {
                    if ($member ['customid'] === $base_info [0]) {
                        $member ['jiki'] = $base_info [1];
                        $member ['kyomi'] = $base_info [2];
                        break;
                    }
                }
            }
        }

        $paginator = Zend_Paginator::factory ( $join_member );
        $paginator->setItemCountPerPage ( 10 );
        $paginator->setCurrentPageNumber ( $this->_getParam ( 'page' ) );
        $pages = $paginator->getPages ();
        $pageArray = get_object_vars ( $pages );

        $root_dir = dirname ( dirname ( __FILE__ ) );

        $pages = $this->getRequest ()->getParams ();

        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['セミナー情報詳細'];
        $message = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );

        $brd_id = $const::$MYPAGE_SCREEN_ID ['パンくずリスト'];
        $bread_message = getScreenMessage ( $this->msg_tbl, $brd_id, $_SESSION ['language'] );
        $this->view->brd_msg = $bread_message;

        $this->view->msg = $message;

        $this->view->memolist = $root_dir . '/views/seminar/memolist.tpl';
        $this->view->seminar_info = $seminar;
        $this->view->pages = $pageArray;
        $this->view->members = $paginator->getIterator ();
        $this->view->lists = $join_member;
        $this->view->number = $number;
        $this->view->school_name = $_SESSION ['school_name'];
        $this->view->title = 'セミナー情報詳細';
    }
    public function memolistAction() {
        $params = $this->getRequest ()->getParams ();

        $memo_table = 'mypage_client_memo';
        $module = 'seminar';

        $memo = $this->model->getMemos ( $memo_table, $params ['crm_id'], $module );
        if (isset ( $params ['page'] )) {
            $next_page = $params ['page'];
        } else {
            $next_page = null;
        }

        $paginator = Zend_Paginator::factory ( $memo );
        $paginator->setItemCountPerPage ( 5 );
        $paginator->setCurrentPageNumber ( $next_page );
        $pages = $paginator->getPages ();
        $pageArray = get_object_vars ( $pages );

        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['セミナー情報詳細'];
        $message = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );

        $this->view->msg = $message;
        $this->view->pages = $pageArray;
        $this->view->items = $paginator->getIterator ();
        $this->view->crm_id = $params ['crm_id'];

    }

    public function changememoAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION ['crm_id'] = $params ['crm_id'];
        if ($params ['id'] != 'new') {
            $table = 'mypage_client_memo';

            $contact = $this->model->getMemo ( $table, $params ['id'] );
            $id = $contact ['mypage_client_memo_id'];
            $memo = $contact;
        } else {
            $memo = null;
            $id = 'new';
        }

        $_SESSION ['mypage_client_memo_id'] = $id;

        $this->view->memo = $memo ['memo'];
        $tokenHandler = new Custom_Auth_Token ();
        $this->view->token = $tokenHandler->getToken ( 'seminar_memo' );

        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['参加者メモ入力'];
        $message = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );

        $this->view->msg = $message;
    }
    public function editmemoAction() {
        $params = $this->getRequest ()->getParams ();
        $table = 'mypage_client_memo';

        $token = $params ['token'];
        $tag = $params ['action_tag'];
        $tokenHandler = new Custom_Auth_Token ();
        if (! $tokenHandler->validateToken ( $token, $tag )) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if (empty ( $params ['memo_seminar'] ) || mb_strlen ( $params ['memo_seminar'] ) > 500) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if (isset($_SESSION ['mypage_client_memo_id'])) {
            if ($_SESSION ['mypage_client_memo_id'] === 'new') {
                $table_mem = 'memlist';
                $mem_id = $this->model->getMemID ( $table_mem, $_SESSION ['crm_id'] );
                $result = $this->model->insertMemo ( $table, $params, $mem_id ['id'] );
                $status = 'new';
            } else {
                $result = $this->model->updateMemo ( $table, $params );
                $status = 'edit';
            }

            $this->writeEmail($this, $status, $params['memo_seminar'], $_SESSION['mypage_client_memo_id']);
            unset ( $_SESSION ['mypage_client_memo_id'] );

            $memo_table = 'T_顧客履歴';
            $memo_insert = array (
                    'お客様番号' => $_SESSION ['crm_id'],
                    '日付' => date ( 'Y-m-d G:i:s' ),
                    '問合せ方法' => 'セミナー',
                    '内容' => $params ['memo_seminar']
            );

            $ret = insert_sqlserver ( $memo_table, $memo_insert, $this->url, $this->pass );
        }

        $const = new MypageConst ();
        $scr_id = $const::$MYPAGE_SCREEN_ID ['参加者メモ入力完了'];
        $message = getScreenMessage ( $this->msg_tbl, $scr_id, $_SESSION ['language'] );

        $this->view->msg = $message;
    }

    public function memodelconfirmAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['mypage_client_memo_id'] = $params['id'];
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['参加者メモ削除確認'];
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

        if (isset($_SESSION ['mypage_client_memo_id'])) {
            $table = 'mypage_client_memo';
            $result = $this->model->deleteMemo($table, $_SESSION['mypage_client_memo_id']);
            $this->writeEmail($this, 'delete', $params['memo'], $_SESSION['mypage_client_memo_id']);
            unset ($_SESSION['mypage_client_memo_id']);
            unset ($_SESSION['crm_id']);
        }

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['参加者メモ削除完了'];
        $message = getScreenMessage($this->msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->msg = $message;
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

}
