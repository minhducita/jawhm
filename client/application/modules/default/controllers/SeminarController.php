<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class SeminarController extends Zend_Controller_Action {
	public $model;

	/**
	 *
	 */
	public function init() {
		$root_dir = dirname(dirname(__FILE__)) . '/';
		require_once ($root_dir . 'models/SeminarModel.php');
		$this->model = new SeminarModel ();
		initPage($this, '/application/modules/');
		if(!logincheck ('index', $this)){
			$this->_helper->redirector('login', 'index');
		}
	}
	
	public function indexAction() {
		$this->view->title = htmlspecialchars('セミナー予約確認', ENT_QUOTES);
	}
	
	public function bookingAction() {
		$reserve = $this->model->reserveCheck(array('entrylist', 'event_list', 'memlist'), $_SESSION['mem_id']);
		$this->view->reserve = $reserve;
		$this->view->title = htmlspecialchars('お客様予約セミナー確認', ENT_QUOTES);
	}
	
	public function seminardetailAction() {
		$params = $this->getRequest ()->getParams ();
		$info = $this->model->detail('event_list', $params['id']);
		
		$this->view->info = $info;
	}
	
	public function historyAction() {
		$seminar = $this->model->history(array('entrylist', 'event_list', 'memlist'), $_SESSION['mem_id']);
		
		$paginator = Zend_Paginator::factory ($seminar);
		$paginator->setItemCountPerPage(5);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$pages = $paginator->getPages();
		$pageArray = get_object_vars($pages);
		
		$this->view->pages = $pageArray;
		$this->view->seminar = $paginator->getIterator();
		$this->view->title = htmlspecialchars('過去に参加されたセミナー一覧', ENT_QUOTES);
	}
	
	public function onlineAction() {
		$seminar_temp = $this->model->online(array('event_list'));
		$time_prev = null;
		$title_prev = null;
		$is_same_time = false;
		$is_same_title = false;
		$seminar = array();
		
		foreach($seminar_temp as $key => $value) {
			switch($key) {
				case 'starttime':
					if ($time_prev === $value) {
						$is_same_time = true;
					}
					$time_prev = $value;
					break;
				case 'k_title1':
					if ($title_prev === $value) {
						$is_same_title = true;
					}
					$prev_title = $value;
					break;
			}
			
			if (!$is_same_time || !$is_same_title) {
				$seminar = array($key => $value);
			}
			$is_same_time = false;
			$is_same_title = false;
			
		}
		
		$this->view->seminar = $seminar;
		
		$url = 'http://api.ustream.tv/json/channel/7765095/getinfo';
		$json = file_get_contents($url,true);
		$ust = Zend_Json::decode($json);
		
		$this->view->ust_url = $ust['results']['url'];
		$this->view->status = $ust['results']['status'];
		$this->view->title = htmlspecialchars('ワーホリセミナー', ENT_QUOTES);
	}
}