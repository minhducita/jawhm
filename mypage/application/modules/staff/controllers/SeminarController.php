<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');

class Staff_SeminarController extends Zend_Controller_Action {
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
        initPage($this, '/application/modules/', 'staff');
        $withoutList = array('online');
        $is_client = true;
        without_loginchk($this, $withoutList, $base, $is_client);
    }

    public function indexAction() {
        $this->view->title = 'セミナー予約確認';
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
}