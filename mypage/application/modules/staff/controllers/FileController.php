<?php
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_FileController extends Zend_Controller_Action {
    public $model;

    /**
     *
     */
    public function init() {
        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->url = $const::$SQL_SERVER['URL'];

        if(empty($_SERVER['HTTPS'])) {
            $base = 'http://';
        } else {
            $base = 'https://';
        }
        $base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/FileModel.php');
        $this->model = new FileModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array();
        $is_client = false;
        without_stafflogin($this, $withoutList, $base, $is_client);
        if ($_SESSION['auth_cd'] < 130) {
            header("Location: $base/mypage/error/index/authorityerror");
        }
        $withoutAuth = array();
        without_authrity($this, $withoutAuth, $base);

    }

    /**
     * index
     */
    public function indexAction() {
        $params = $this->getRequest ()->getParams ();
        if ($_SESSION['abroad'] == '') {
            $_SESSION['abroad'] = $params['abroad'];
        }

        $table['base'] = array('table' => 'T_ATTACH_FILE', 'column' => null);
        $table['M_CLASS'] = array('table' => 'M_CLASS', 'column' => 'class',
                'ontable' => 'T_ATTACH_FILE', 'oncolumn' => 'file_class');
        $select = 'T_ATTACH_FILE.branch_no, T_ATTACH_FILE.file_name, T_ATTACH_FILE.insert_date, M_CLASS.class, M_CLASS.class_name,
                   T_ATTACH_FILE.client_perusal, T_ATTACH_FILE.school_perusal';
        $where['abroad_no'] = array('column' => 'T_ATTACH_FILE.study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['division'] = array('column' => 'M_CLASS.division',
                'value' => 1,
                'comp' => '=',
                'andor' => 'and');
        $where['cpp_application'] = array('column' => 'M_CLASS.class',
                'value' => 102,
                'comp' => '!=',
                'andor' => 'and');
        $where['cpp_confirm_form'] = array('column' => 'M_CLASS.class',
                'value' => 103,
                'comp' => '!=',
                'andor' => 'and');
        $where['cpp_confirm_img'] = array('column' => 'M_CLASS.class',
                'value' => 104,
                'comp' => '!=',
                'andor' => 'and');
        $where['cpp_submit'] = array('column' => 'M_CLASS.class',
                'value' => 105,
                'comp' => '!=',
                'andor' => 'and');
        $items = joinselect_sqlserver($table, $select, $where, $this->url, $this->pass);

        // matching file class from SQL Server
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['お客様関連ファイル'];
        $message = $this->model->getClassName('mypage_message', 11, 'ja');

        $this->view->msg = $message;

        $this->view->items = $items;
        $this->view->title = 'お客様ファイルリスト';

    }

    public function applyschoolAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['branch_no'] = $params['branch'];

        $this->view->filename = $params['name'];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('applyschool');
    }

    public function applyedAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        $table = 'T_ATTACH_FILE';

        $where['abroad'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['branch'] = array('column' => 'branch_no',
                'value' => $_SESSION['branch_no'],
                'comp' => '=',
                'andor' => 'and');

        $update = array('school_perusal' => 1);
        $ret = update_sqlserver($table, $update, $where, $this->url, $this->pass);
        unset($_SESSION['branch_no']);
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
        $content =  file_get_contents($this->url, false, $context2);
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
    }

    public function clientuploadAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('clientupload');
    }

    public function clientprocessAction() {
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
        $split = explode(' ', $file_name);

        $table = 'T_ATTACH_FILE';
        $select = "comment";
        $where['study_abroad_no'] = array('column' => 'study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['file_class'] = array('column' => 'file_class',
                'value' => $params['attach_class'],
                'comp' => '=',
                'andor' => 'AND');
        $where['comment'] = array('column' => 'comment',
                'value' => $split[0],
                'comp' => 'like',
                'andor' => 'AND');

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);
        $number = count($items) + 1;

        switch($params['attach_class']) {
            case 23:
                $type = 'LoA';
                $comment = $split[0] . $number;
                break;

            case 24:
                $type = 'CoE';
                $comment = $split[0] . $number;
                break;

            case 25:
                $type = 'HS情報';
                $comment = $split[0] . $number;
                break;

            case 26:
                $type = 'PIC情報';
                $comment = $split[0] . $number;
                break;

            case 96:
                $type = '学校願書';
                $comment = $split[0] . $number;
                break;

            case 98:
                $type = 'ホームステイ申込書';
                $comment = $type;
                break;

            default:
                $type = '';
                $comment = 'null';
                break;
        }

        $file_class = $params['attach_class'];
        $ret = setclientfile($_SESSION['abroad'], $file_name, $comment, $file_class, $this->url, $this->pass);

        unlink($uploadPath . $_SESSION['abroad']);

        $table2 = 'M_顧客基本情報';
        $select2 = "お客様番号, 氏名";
        $where2['client_no'] = array('column' => 'お客様番号',
                'value' => $_SESSION['crm_id'],
                'comp' => '=',
                'andor' => 'null');

        $info = select_sqlserver($table2, $select2, $where2, $this->url, $this->pass);
        $this->alertMail($this, $info, $type);
    }

    public function fileuploadAction() {
        $params = $this->getRequest ()->getParams ();

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('fileupload');
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
            case 97:
                $title = '入力済み願書';
                $comment = $title;
                break;

            default:
                $title = '';
                $comment = 'null';
                break;
        }

        $file_class = $params['attach_class'];
        $ret = setfile($_SESSION['abroad'], $file_name, $comment, $file_class, $this->url, $this->pass);

        unlink($uploadPath . $_SESSION['abroad']);

        $table['base'] = array('table' => 'T_ENTRY_DETAILS', 'column' => 'null');
        $table['attach'] = array('table' => 'T_ATTACH_FILE', 'column' => 'study_abroad_no',
                                'ontable' => 'T_ENTRY_DETAILS', 'oncolumn' => 'study_abroad_no');
        $select = "T_ENTRY_DETAILS.school_no";
        $where['study_abroad_no'] = array('column' => 'T_ENTRY_DETAILS.study_abroad_no',
                'value' => $_SESSION['abroad'],
                'comp' => '=',
                'andor' => 'null');
        $where['comment'] = array('column' => 'T_ATTACH_FILE.file_class',
                'value' => 97,
                'comp' => '=',
                'andor' => 'and');
        $sort = 'T_ATTACH_FILE.branch_no desc';

        $info = joinsortselect_sqlserver($table, $select, $where, $sort, $this->url, $this->pass);

        $this->writeSchoolEmail($this, $info, $title);
    }

    public function editchartAction() {
        $params = $this->getRequest ()->getParams ();
        $id = $_SESSION['mypage_step_chart_id'];

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if ($params['separate_flag'] == 1 && $params['detail_flag'] == 1) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if ($params['separate_flag'] == 1 || $params['detail_flag'] == 1) {
            if(empty($params['separate_number'])) {
                return $this->_forward ( 'inputerror', 'index', 'error' );
            }

            if (!ctype_digit($params['separate_number'])) {
                return $this->_forward ( 'inputerror', 'index', 'error' );
            }

        }

        if(empty($params['description'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $result = $this->model->editChart('mypage_step_chart', $params);
        unset($_SESSION['mypage_step_chart_id']);
    }

    public function deletechartconfirmAction() {
        $params = $this->getRequest ()->getParams ();

        $item = $this->model->getChartStatus('mypage_step_chart', $params['id']);

        $_SESSION['mypage_step_chart_id'] = $params['id'];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('deletechart');
        $this->view->item = $item;
    }

    public function deletechartAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }
        $result = $this->model->deleteChart('mypage_step_chart');

        unset($_SESSION['mypage_step_chart_id']);
    }

    public function createchartstatusAction() {
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('createchart');
    }

    public function newchartstatusAction() {
        $params = $this->getRequest ()->getParams ();
        $id = $_SESSION['mypage_step_chart_id'];

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check

        if ($params['separate_flag'] == 1 && $params['detail_flag'] == 1) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if ($params['separate_flag'] == 1 || $params['detail_flag'] == 1) {
            if(empty($params['separate_number'])) {
                return $this->_forward ( 'inputerror', 'index', 'error' );
            }

            if (!ctype_digit($params['separate_number'])) {
                return $this->_forward ( 'inputerror', 'index', 'error' );
            }

        }

        if(empty($params['description']) || empty($params['major_item'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $result = $this->model->createChart('mypage_step_chart', $params);
    }

    public function nextstepAction() {
        $items = $this->model->getNextStep('mypage_next_step');
        $list = $this->model->getStepChart('mypage_step_chart');

        $title = array('');
        $i = 1;
        $pre_title = null;

        foreach($list as $array) {
            if ($array['major_item'] != $pre_title) {
                $title[$i] = $array['major_item'];
                $pre_title = $array['major_item'];
                $i++;
            }
        }

        $this->view->items = $items;
        $this->view->item_title = $title;
        $this->view->title = '次のステップ編集';
    }

    public function changestepAction() {
        $params = $this->getRequest ()->getParams ();
        $item = $this->model->getStep('mypage_next_step', $params['id']);

        $_SESSION['mypage_next_step_id'] = $params['id'];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('nextstep');
        $this->view->item = $item;
    }

    public function editstepAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['step_name'])) {
                    return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if (isset($_SESSION['mypage_next_step_id'])) {
            $result = $this->model->updateStep('mypage_next_step', $params);
        } else {
            $result = $this->model->insertStep('mypage_next_step', $params);
        }
        unset($_SESSION['mypage_next_step_id']);
    }

    public function deletestepconfirmAction() {
        $params = $this->getRequest ()->getParams ();
        $item = $this->model->getStep('mypage_next_step', $params['id']);
        $_SESSION['mypage_next_step_id'] = $params['id'];

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('deletestep');
        $this->view->item = $item;
        $this->view->previous = null;
    }

    public function deletestepAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }
        $result = $this->model->deleteStep('mypage_next_step');

        unset($_SESSION['mypage_next_step_id']);
    }

    public function schoollangAction() {
        $lang = 'ja';
        $items = $this->model->getLang('mypage_message', $lang);

        $languages = $this->model->getLangs('mypage_message');
        $screen = $this->model->getScr('mypage_message');

        $this->view->items = $items;
        $this->view->langs = $languages;
        $this->view->screen = $screen;
        $this->view->title = '言語修正';
    }

    public function langsearchAction() {
        $params = $this->getRequest ()->getParams ();

        if (!isset($params['mypage_screen_name'])) {
            $screen = null;
        } else {
            $screen = $params['mypage_screen_name'];
        }

        $items = $this->model->searchScr('mypage_message', $params['language'], $screen);
        $previous = array('language' => $params['language'],
                          'screen_name' => $params['mypage_screen_name']
        );

        $languages = $this->model->getLangs('mypage_message');
        $screen = $this->model->getScr('mypage_message');

        $this->view->items = $items;
        $this->view->previous = $previous;
        $this->view->langs = $languages;
        $this->view->screen = $screen;
    }

    public function changelangAction() {
        $params = $this->getRequest ()->getParams ();
        $item = $this->model->getMessage('mypage_message', $params['id']);

        $_SESSION['mypage_message_id'] = $params['id'];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('language');
        $this->view->item = $item;
    }

    public function editlangAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['message'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $result = $this->model->updateLang('mypage_message', $params);
        unset($_SESSION['mypage_message_id']);
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
        $body_message .= $type . 'がお客様のマイページにアップロードされました。';
        $body_message .= chr(10);
        $body_message .= 'マイページよりご確認をお願いします。';
        $body_message .= chr(10);
        $body_message .= 'https://www.jawhm.or.jp/mypage/';
        $subject = $info[0][1].'様'. $type . 'が届きました['.$info[0][0].']';

        sendEmail($info, $items, $body_message, $use_keyemail, $email_list, $email, $subject);
    }

    private function writeSchoolEmail($parent, $info, $title) {
        $data = $this->model->getSchoolMail('mypage_school_memlist', $info[0]['school_no']);
        $email = $data[0]['email'];
        $name = $data[0]['charge_name'];

        $fromName = '一般社団法人日本ワーキングホリデー協会';
        $fromMailAddress = 'school@jawhm.or.jp';
        $toName = $name;
        $toMailAddress = $email;
        $subject = $title.'のアップロードが行われました。';

        $body = $name . 'さま';
        $body .= chr(10);
        $body .= chr(10);
        $body .= '学校様マイページにて' . $_SESSION['mem_name'] . 'さまの' . $title . 'のアップロードが行われました。';
        $body .= chr(10);
        $body .= '以下のアドレスよりログイン後、ご確認をお願いします。';
        $body .= chr(10);
        $body .= chr(10);
        $body .= 'https://www.jawhm.or.jp/mypage/school/';
        $body .= chr(10);
        $body .= chr(10);
        $body .= '一般社団法人日本ワーキングホリデー協会';
        writeEmail($toName, $fromMailAddress, $toMailAddress, $subject, $body);
    }

}
?>
