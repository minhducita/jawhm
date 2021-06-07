<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');

class SeminarController extends Zend_Controller_Action {
    private $model;

    /**
     *
     */
    public function init() {
        if(empty($_SERVER['HTTPS'])) {
            $base = 'http://';
        } else {
            $base = 'https://';
        }
        $base .= $_SERVER['HTTP_HOST'];
        $root_dir = dirname(dirname(__FILE__)) . '/';
        require_once ($root_dir . 'models/SeminarModel.php');
        $this->model = new SeminarModel ();
        initPage($this, '/application/modules/', 'client');
        $withoutList = array();
        without_loginchk($this, $withoutList, $base);
    }

    public function indexAction() {
        $this->view->title = 'セミナー予約確認';
    }

    public function bookingAction() {
        $reserve = $this->model->reserveCheck(array('entrylist', 'event_list', 'memlist'), $_SESSION['mem_id']);
        $iphone = isIphone();

        if ($iphone) {
            $this->view->iphone = 1;
        } else {
            $this->view->iphone = 0;
        }
        $this->view->reserve = $reserve;
        $this->view->username = $_SESSION['mem_name'];
        $this->view->title = 'お客様予約セミナー確認';
    }

    public function seminardetailAction() {
        $params = $this->getRequest ()->getParams ();
        $info = $this->model->detail('event_list', $params['id']);

        $this->view->info = $info;
    }

    public function historyAction() {
        $seminar = $this->model->history(array('entrylist', 'event_list', 'memlist'), $_SESSION['crm_id']);

        if (!is_null($seminar)) {
            $paginator = Zend_Paginator::factory ($seminar);
            $paginator->setItemCountPerPage(5);
            $paginator->setCurrentPageNumber($this->_getParam('page'));
            $pages = $paginator->getPages();
            $pageArray = get_object_vars($pages);

            $this->view->pages = $pageArray;
            $this->view->seminar = $paginator->getIterator();
        } else {
            $this->view->pages = null;
            $this->view->seminar = $seminar;
        }

        $this->view->title = '過去に参加されたセミナー一覧';
    }

    public function onlineAction() {
        $seminar_temp = $this->model->online(array('event_list'));
        $time_prev = null;
        $title_prev = null;
        $is_same_time = false;
        $is_same_title = false;
        $seminar = array();

        foreach($seminar_temp as $array) {
            if ($time_prev === $array['starttime']) {
                $is_same_time = true;
            }
            $time_prev = $array['starttime'];

            if ($title_prev === $array['k_title1']) {
                $is_same_title = true;
            }
            $prev_title = $array['k_title1'];

            if (!$is_same_time && !$is_same_title) {
                $seminar[] = $array;
            }
            $is_same_time = false;
            $is_same_title = false;

        }


        $this->view->json = 1;
        $this->view->seminar = $seminar;

        $url = 'https://api.ustream.tv/json/channel/7765095/getinfo';
        $json = file_get_contents($url,true);
        $ust = Zend_Json::decode($json);

        $this->view->ust_url = $ust['results']['url'];
        $this->view->status = $ust['results']['status'];
        $this->view->title = 'ワーホリセミナー';
        $this->view->index = 1;
    }

    public function addcalendarAction() {
        $params = $this->getRequest ()->getParams ();

        $const = new MypageConst();

        $seminar = $this->model->getSeminar('event_list', $params['id']);
        $sDateTime = $seminar['starttime'];
        $eDateTime = $seminar['endtime'];
        $summary = $seminar['k_title1'];
        $address = $const::$OFFICE_ADDRESS[$seminar['place']];
        $description = $seminar['k_desc1'];
        $url = $const::$OFFICE_ACCESS[$seminar['place']];

        $this->addioscalendar($this, $sDateTime, $eDateTime, $summary, $address, $description, $url);
    }

    public function seminarjoinAction() {
        $now = new DateTime();

        $seminar = $this->model->getCurrentSeminar('event_list', $now->format('Y-m-d H:i:s'));
        $this->model->insertJoinSeminar('entrylist', $seminar);
    }

    private function addioscalendar($parent, $sDateTime, $eDateTime, $summary, $address, $description, $url) {
        $filename = 'calender.ics';

        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);

        $start = new DateTime($sDateTime);
        $startdate = $this->dateToCal($start->format('U'));
        $end = new DateTime($eDateTime);
        $enddate = $this->dateToCal($end->format('U'));
        $date = new DateTime();
        $now = $date->format('H:i:s');

        $parent->view->uid = md5(uniqid(mt_rand(), true)) . "@jawhm.or.jp";
        $parent->view->datetime = $now;
        $parent->view->datestart = $startdate;
        $parent->view->dateend = $enddate;
        $parent->view->summary = $this->escapeString($summary);
        $parent->view->address = $this->escapeString($address);
        $parent->view->description = $this->escapeString($description);
        $parent->view->url = $this->escapeString($url);
    }

    private function dateToCal($timestamp) {
        return gmdate('Ymd\THis\Z', $timestamp);
    }

    // Escapes a string of characters
    private function escapeString($string) {
        return preg_replace('/([\,;])/','\\\$1', $string);
    }
}