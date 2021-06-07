<?php
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_EditController extends Zend_Controller_Action {
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
        require_once ($root_dir . 'models/EditModel.php');
        $this->model = new EditModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array('login', 'auth', 'logout', 'noclient');
        $is_client = false;
        without_stafflogin($this, $withoutList, $base, $is_client);
        if ($_SESSION['auth_cd'] < 130) {
            //return $this->_forward ( 'authorityerror', 'index', 'error' );
            header("Location: $base/mypage/error/index/authorityerror");
        }
        $withoutAuth = array();
        without_authrity($this, $withoutAuth, $base);

    }

    /**
     * index
     */
    public function indexAction() {
        $list = $this->model->getContent('staff_comment');

        $title = array();
        $describe = array();
        $mail_tokyo = array();
        $mail_osaka = array();
        $mail_fukuoka = array();
        $mail_nagoya = array();
        $mail_toyama = array();
        $mail_okinawa = array();
        $i = 0;

        foreach($list as $array) {
            foreach($array as $key => $value) {
                switch($key) {
                    case 'base':
                        $base = $value;
                        break;

                    case 'content_type':
                        switch($value) {
                            /*
                            case 'title':
                                $title[] = $array;
                                break;

                            case 'diecribe':
                                $describe[] = $array;
                                break;
*/
                            case 'mail':
                            case 'period':
                                switch($base) {
                                    case 'tokyo':
                                        $mail_tokyo[] = $array;
                                        break;

                                    case 'osaka':
                                        $mail_osaka[] = $array;
                                        break;

                                    case 'fukuoka':
                                        $mail_fukuoka[] = $array;
                                        break;

                                    case 'nagoya':
                                        $mail_nagoya[] = $array;
                                        break;

                                    case 'toyama':
                                        $mail_toyama[] = $array;
                                        break;

                                    case 'okinawa':
                                        $mail_okinawa[] = $array;
                                        break;
                                }


                            default:
                                break;
                        }
                }
            }
        }

        //$this->view->item_title = $title;
        //$this->view->describe = $describe;
        $this->view->tokyo = $mail_tokyo;
        $this->view->osaka = $mail_osaka;
        $this->view->fukuoka = $mail_fukuoka;
        $this->view->nagoya = $mail_nagoya;
        $this->view->toyama = $mail_toyama;
        $this->view->okinawa = $mail_okinawa;
        $this->view->office_cd = $_SESSION['office_cd'];
        $this->view->title = '留学手続き状況・メールテンプレート編集';

    }

    public function changecommentAction() {
        $params = $this->getRequest ()->getParams ();
        $target = $this->model->changecontent('staff_comment', $params['id']);

        $this->view->item = $target['comment_content'];
        $this->view->comment_id = $params['id'];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('staff_comment');
    }

    public function editcommentAction() {
        $params = $this->getRequest ()->getParams ();
        $staff = $_SESSION['staff_cd'];

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['comment_content'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        $result = $this->model->editComment('staff_comment', $params, $staff);
        unset($_SESSION['mypage_step_chart_id']);
    }

    public function stepchartAction() {
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

        $this->view->items = $list;
        $this->view->item_title = $title;
        $this->view->title = 'ステップチャート編集';
    }

    public function changechartstatusAction() {
        $params = $this->getRequest ()->getParams ();
        $item = $this->model->getChartStatus('mypage_step_chart', $params['id']);

        $_SESSION['mypage_step_chart_id'] = $params['id'];
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('stepchart');
        $this->view->item = $item;
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

    public function schoollistAction() {
        $schools = $this->model->getSchool('mypage_school_memlist');

        $this->view->title = '学校担当者様一覧';
        $this->view->schools = $schools;
    }

    public function changeschoolAction() {
        $params = $this->getRequest ()->getParams ();
        if (isset($params['id'])) {
            $item = $this->model->getCharge('mypage_school_memlist', $params['id']);

            $_SESSION['mypage_school_memlist_id'] = $params['id'];
        } else {
            $item = null;
        }
        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('schoolchange');
        $this->view->item = $item;
    }

    public function editschoolAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if (empty($params['school_id']) || empty($params['school_name']) || empty($params['school_full_name'])
            || empty($params['charge_name']) || empty($params['email'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if (isset($_SESSION['mypage_school_memlist_id'])) {
            $this->model->updateSchool('mypage_school_memlist', $params);
            unset($_SESSION['mypage_school_memlist_id']);
        } else {
            $ndc = $this->model->IDDuplicateCheck ('mypage_school_memlist', 'school_id', $params ['school_id']);
            if (!$ndc) {
                return $this->_forward ( 'errorduplicate', 'index', 'error' );
            }

            $this->model->insertSchool('mypage_school_memlist', $params);
            $new_id = $this->model->getMaxID ('mypage_school_memlist', 'mypage_school_memlist_id');
            $change_password = $this->model->resetPassword('mypage_school_memlist', $new_id);

            $fromName = '一般社団法人日本ワーキングホリデー協会';
            $fromMailAddress = 'school@jawhm.or.jp';
            $toName = $params['charge_name'];
            $toMailAddress = $params['email'];
            $subject = '新しいパスワードをお送りします';
            $body = '日本ワーキングホリデー協会です。';
            $body .= chr(10);
            $body .= chr(10);
            $body .= '学校様専用ページへのログインに必要なパスワードの発行を承りました。';
            $body .= chr(10);
            $body .= '新しいパスワード（１２桁）は、以下の通りとなります。';
            $body .= chr(10);
            $body .= chr(10);
            $body .= 'パスワード [ '.$change_password.' ]';
            $body .= chr(10);
            $body .= chr(10);
            $body .= 'なお、ログイン後、新しいパスワードに変更することをお勧めいたします。';

            writeEmail($toName, $fromMailAddress, $toMailAddress, $subject, $body);
        }
    }

    public function chargelistAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['school_id'] = $params['school'];
        $_SESSION['school_name'] = $params['name'];

        $ids = $this->model->getCharges('mypage_school_range', $params['school']);
        if(!empty($ids)) {
            $table = 'M_学校';
            $select = "学校番号, 国, 地域";

            $is_first = true;
            $andor = 'null';
            foreach($ids as $id1) {
                $where[] = array('column' => '学校番号',
                        'value' => $id1['school_no'],
                        'comp' => 'like',
                        'andor' => $andor);

                if ($is_first) {
                    $is_first = false;
                    $andor = ' or ';
                }
            }

            $schools = select_sqlserver($table, $select, $where, $this->url, $this->pass);
            $items = array();
            foreach($ids as $id2) {
                foreach($schools as $school) {
                    if($school[0] === $id2['school_no']){
                        $items[] = array_merge($id2, $school);
                        break;
                    }
                }
            }
        } else {
            $items = null;
        }

        $this->view->items = $items;
    }

    public function changechargeAction() {
        $params = $this->getRequest ()->getParams ();
        $_SESSION['range_id'] = $params['range_id'];

        $ranges = $this->model->getCharges('mypage_school_range', $_SESSION['school_id']);

        $table = 'M_学校';
        $select = "学校番号, 国, 地域";
        if (isset($ranges['school_no'])) {
            $is_first = true;
            $andor = 'null';
            foreach($ranges as $no) {
                $where[] = array('column' => '学校番号',
                        'value' => $no['school_no'],
                        'comp' => 'like',
                        'andor' => $andor);

                if ($is_first) {
                    $is_first = false;
                    $andor = ' or ';
                }
            }

        } else {
            $where['school_name'] = array('column' => '学校番号',
                    'value' => $_SESSION['school_name'],
                    'comp' => 'like',
                    'andor' => 'null');
        }

        $items = select_sqlserver($table, $select, $where, $this->url, $this->pass);

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('charge');
        $this->view->items = $items;
    }

    public function editchargeAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        if ($_SESSION['range_id'] === 'new') {
            $this->model->insertCharge('mypage_school_range', $params);
        } else {
            $this->model->updateCharge('mypage_school_range', $params);
        }
    }

    public function deleteschoolconfirmAction() {
        $params = $this->getRequest ()->getParams ();
        $item = $this->model->getCharge('mypage_school_memlist', $params['id']);

        $_SESSION['mypage_school_memlist_id'] = $params['id'];

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('deleteschool');
        $this->view->item = $item;
    }

    public function deleteschoolAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }
        $result = $this->model->deleteSchool('mypage_school_memlist');

        unset($_SESSION['mypage_school_memlist_id']);
    }

    public function airportAction() {
        $items = $this->model->getAirport('take_off_place');

        $this->view->items = $items;
        $this->view->title = '空港名一覧';
    }

    public function changeairportAction() {
        $params = $this->getRequest ()->getParams ();
        if (isset($params['id'])) {
            $item = $this->model->getAirportInfo('take_off_place', $params['id']);
            $_SESSION['take_off_place_id'] = $params['id'];
            $this->view->item = $item;
        } else {
            $_SESSION['take_off_place_id'] = null;
            $this->view->item = null;
        }

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('editairport');
    }

    public function editairportAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }

        // input check
        if(empty($params['country_name']) || empty($params['japanese_name']) ||
            empty($params['hiragana']) || empty($params['english_name'])) {
            return $this->_forward ( 'inputerror', 'index', 'error' );
        }

        if (!is_null($_SESSION['take_off_place_id'])) {
            $result = $this->model->updateAirport('take_off_place', $params);
            unset($_SESSION['mypage_message_id']);
        } else {
            $result = $this->model->insertAirport('take_off_place', $params);
        }
    }

    public function deleteairportconfirmAction() {
        $params = $this->getRequest ()->getParams ();
        $item = $this->model->getAirportInfo('take_off_place', $params['id']);

        $_SESSION['take_off_place_id'] = $params['id'];

        $tokenHandler = new Custom_Auth_Token;
        $this->view->token = $tokenHandler->getToken('deleteairport');
        $this->view->item = $item;
    }

    public function deleteairportAction() {
        $params = $this->getRequest ()->getParams ();

        $token = $params['token'];
        $tag = $params['action_tag'];
        $tokenHandler = new Custom_Auth_Token();
        if (!$tokenHandler->validateToken($token,$tag)) {
            return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
        }
        $result = $this->model->deleteAirport('take_off_place');

        unset($_SESSION['take_off_place_id']);
    }
}
?>
