<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/MypageConst.php');

class Staff_TalkController extends Zend_Controller_Action {
    private $model;
    private $base;

    /**
     *
     */
    public function init() {
        $const = new MypageConst();
        $this->pass = $const::$SQL_SERVER['PASSWORD'];
        $this->sqlurl = $const::$SQL_SERVER['URL'];
        $this->mailurl = $const::$CRM_MYSQL['URL'];
        $this->mail = $const::$CRM_MYSQL['PASSWORD'];
        $this->cipher = $const::$CRM_MYSQL['CIPHER'];

        if(empty($_SERVER['HTTPS'])) {
            $this->base = 'http://';
        } else {
            $this->base = 'https://';
        }
        $this->base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/TalkModel.php');
        $this->model = new TalkModel ();
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array('reply');
        $is_client = false;
        without_stafflogin($this, $withoutList, $this->base, $is_client);
    }

    public function indexAction() {
        $message = $this->model->getOriginalMsg('talklist', $_SESSION['mem_id']);
        $name = $this->model->getName('memlist', $_SESSION['mem_id']);

        $this->view->items = $message;
        $this->view->name = $name;
        $this->view->json = 0;
        $this->view->title = '一言相談リスト';
    }

    public function unansweredAction() {
        $office_cd = $_SESSION['office_cd'];

        $table = 'M_拠点';
        $select = "拠点コード";
        $where['office_cd'] = array('column' => 'オフィスコード',
                'value' => $office_cd,
                'comp' => '=',
                'andor' => 'null');

        $base_codes = select_sqlserver($table, $select, $where, $this->sqlurl, $this->pass);
        $message = $this->model->getUnanswered('talklist');
        foreach($message as $array) {
            foreach($array as $key => $value) {
                if ($key === 'base_code') {
                    foreach($base_codes as $code) {
                        if ($value === $code[0]) {
                            $is_select = true;
                            break;
                        } else {
                            $is_select = false;
                        }
                    }
                }
            }
            if ($is_select) {
                $items[] = $array;
            }
        }

        $subject = '一言相談';

        $this->view->items = $items;
        $this->view->title = '未返信一言相談リスト(自拠点)';
    }

    public function replyAction() {
        $params = $this->getRequest ()->getParams ();

        $test_table = 'd_mail';
        $test_select = 'SUBJECT, BODY';
        $test_where['kg_cd'] = array('column' => 'KG_CD',
                'value' => 'jawhm',
                'comp' => '=',
                'andor' => 'null');
        $test_where['mail_no'] = array('column' => 'mail_no',
                'value' => str_replace('mail', '', $params['mail_no']),
                'comp' => '=',
                'andor' => 'AND');
        $cipher_number = array(0, 1);

        $context = stream_context_create(array(
                'http' => array(
                        'method' => 'POST',
                        'header' => implode('\r\n', array(
                                'Content-Type: application/x-www-form-urlencoded',
                        )),
                        'content' => http_build_query(array(
                                'pwd' => $this->pass,
                                'command' => 'cipher_select',
                                'table' => $test_table,
                                'select' => $test_select,
                                'where' => $test_where,
                                'cipher_number' => $cipher_number,
                                'cipher' => $this->cipher
                        )),
                )
        ));

        $content = file_get_contents($this->mailurl, false, $context);
        $j_content = json_decode($content);
        $items = array();
        foreach($j_content as $row) {
            if(is_object($row)) {
                array_push($items, get_object_vars($row));
            }
        }

        $body = $items[0]['BODY'];
        $ans_content = trim(strstr($body, '-------- Original Message --------', true));
        /* check same body content
         * it called from mail system twice, second time, do not send email for client.
        */
        $original_body = $this->model->getMsg('talklist', $params);

        $subject = $items[0]['SUBJECT'];
        switch ($subject) {
            // for school
            case preg_match('/^.*\[school\].*$/u', $subject) == 1:
                if ($original_body['ans_content'] != $ans_content) {
                    if (preg_match('/^.*\[.*&gt;$/', $subject) == 1) {
                        preg_match('/&lt;.*&gt;/', $subject , $match);
                        $school_id = $match;
                        $school_id = str_replace('&lt;', '', str_replace('&gt;', '', $match[0]));
                        $result = $this->model->insTunagari(array('mypage_school_memlist', 'mypage_school_contact'), $ans_content, $school_id);
                        $subject = 'つながり';
                    }
                    $this->writeEmail($this, $items, $params, $subject, $school_id, 'school');
                }
                break;
            // for client
            case preg_match('/^.*[A-Z]{2}[0-9]{4}-[0-9]{3}.*$/', $subject) == 1:
                if ($original_body['ans_content'] != $ans_content) {
                    $result = $this->model->editMsg('talklist', $params, $ans_content);
                    $subject = '一言相談';
                    $this->writeEmail($this, $items, $params, $subject, null, 'client');
                }
                break;
            default:
                break;

        }

    }

    private function writeEmail($parent, $items, $params, $title, $id, $target) {
        if ($target === 'client') {
            $client_no = $params['client_no'];

            $client = $this->model->getName('memlist', $client_no);
            $name = $client['namae'];
            $member_id = $client['id'];
            $email_list = $this->model->getEmail('emaillist', $member_id);
            foreach($email_list as $list) {
                if ($list['key_flag'] == 1) {
                    $email = $list['email'];
                    break;
                }
            }
        } else {
            $data = $this->model->getSchoolMail('mypage_school_memlist', $id);
            $email = $data['email'];
            $name = $data['charge_name'];
        }

        $fromName = '一般社団法人日本ワーキングホリデー協会';
        $fromMailAddress = 'mypage_talk@jawhm.or.jp';
        $toName = $name;
        $toMailAddress = $email;
        $subject = 'スタッフから'.$title.'の返信が届きました';

        $pre_body = $items[0]['BODY'];
        $separate = explode('-------- Original Message --------', $pre_body);
        $reply = $separate[0];
        $sep = '-------- Original Message --------';
        $original = $separate[1];

        $body = $reply;
        $body .= chr(10);
        $body .= chr(10);
        $body .= 'このメールは送信専用です。';
        $body .= chr(10);
        $body .= 'こちらのメールに返信されないようお願いします。';
        $body .= chr(10);
        $body .= chr(10);
        $body .= $sep;
        $body .= chr(10);
        $body .= chr(10);
        $body .= $original;
        writeEmail($toName, $fromMailAddress, $toMailAddress, $subject, $body);
    }
}