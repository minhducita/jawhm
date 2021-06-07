<?php
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/school/models/IndexModel.php');

class Error_IndexController extends Zend_Controller_Action {
    private $base;

    public function init() {
        if(empty($_SERVER['HTTPS'])) {
            $this->base = 'http://';
        } else {
            $this->base = 'https://';
        }
        $this->base .= $_SERVER['HTTP_HOST'];
    }

    public function errorAction() {
    }

    public function loginfailedAction() {
        $this->view->base = $this->base;
        $this->view->title = 'ログイン失敗';
    }

    public function schoolloginfailedAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['ログイン失敗'];
        $msg_tbl = 'mypage_message';
        $message = getScreenMessage($msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->base = $this->base;
        $this->view->msg = $message;
        $this->view->title = 'ログイン失敗';
    }

    public function errorloginAction() {
    }

    public function erroremailAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['パスワードリセット失敗'];
        $msg_tbl = 'mypage_message';
        $message = getScreenMessage($msg_tbl, $scr_id, $_SESSION['language']);

        $this->view->base = $this->base;
        $this->view->msg = $message;
    }

    public function errorcsrfAction() {
    }

    public function inputerrorAction() {
        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['パスワード変更失敗'];
        $msg_tbl = 'mypage_message';
        $message = getScreenMessage($msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;
    }

    public function inputpageerrorAction() {
    }

    public function lengtherrorAction() {
        $params = $this->getRequest ()->getParams ();
        $this->view->column = $params['column'];
        $this->view->length = $params['length'];

        $const = new MypageConst();
        $scr_id = $const::$MYPAGE_SCREEN_ID['パスワード変更失敗'];
        $msg_tbl = 'mypage_message';
        $message = getScreenMessage($msg_tbl, $scr_id, $_SESSION['language']);
        $this->view->msg = $message;
    }

    public function noemailAction() {
    }

    public function alreadyemailAction() {
    }

    public function emaildeleteerrorAction() {
    }

    public function emailresenderrorAction() {
    }

    public function keychangeerrorAction() {
    }

    public function modalerrorcsrfAction() {
    }

    public function nofileAction() {

    }

    public function modalmessageAction() {
        $params = $this->getRequest ()->getParams ();
        $this->view->message = $params['message'];
    }

    public function emailremindererrorAction() {

    }

    public function authorityerrorAction() {
        if(empty($_SERVER['HTTPS'])) {
            $base = 'http://';
        } else {
            $abase = 'https://';
        }
        $base .= $_SERVER['HTTP_HOST'];
        $this->view->base = $base;
    }

    public function loginstatuserrorAction() {
        $this->view->base = $this->base;
    }

    public function overuploadAction() {

    }

    public function alreadyuploadAction() {

    }

    public function errorpageloadAction() {

    }

    public function errorduplicateAction() {

    }

    public function surveyerrorAction() {

    }

    public function kotarologinfailedAction() {

    }
}