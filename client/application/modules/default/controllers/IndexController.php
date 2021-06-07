<?php
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/library/Custom/Auth/TwitterOAuth.php');
require_once ('Zend/Json.php');
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');

class IndexController extends Zend_Controller_Action {
	private $model;
	private $clinet_id;
	private $client_secret;
	private $Gcallback_url;
	private $app_id;
	private $app_secret;
	private $Fcallback_url;
	private $consumer_key;
	private $consumer_secret;
	private $Tcallback_url;
	private $base;

	/**
	 *
	 */
	public function init() {
		$root_dir = dirname(dirname(__FILE__)) . '/';
		require_once ($root_dir . 'models/IndexModel.php');
		$this->model = new IndexModel ();
		initPage($this, '/application/modules/');

		// oauth settings
		$this->client_id = '182149785228-rablaq2c5gti1di4cboh3v50iltf967b.apps.googleusercontent.com';
		$this->client_secret = '1MOfNANIYXi1_1AHTw2FNTZL';
		$this->Gcallback_url = 'http://www.jawhm.or.jp/client/index/googleauth';
		$this->app_id = '336197919869623';
		$this->app_secret = 'a5ca7430a48f029eb5b820be6d418d36';
		$this->Fcallback_url = 'http://192.168.11.137/client/index/facebookauth';
		$this->consumer_key = 'UDv79uqGdGqt21QZoA05EdC02';
		$this->consumer_secret = 'ezkXHbUSgeyN9fG4Qo8G44ZGtQAjzglbc2kHClWGElr1aEnpmr';
		$this->Tcallback_url = 'http://192.168.11.137/client/index/twitterauth';
		$this->base = 'http://'.$_SERVER["HTTP_HOST"].'/client/';
	}

	/**
	 * index
	 */
	public function indexAction() {
		if(!logincheck ('index', $this)){
			$this->_forward('login');
		}
		$this->view->current_achievement = 8;
		$this->view->total_achievement = 13;
		$this->view->percent = 60;
		$this->view->next_step = 'プレテスト受験';
		$this->view->title = 'ユーザーインデックス';
	}

	public function loginAction() {
		// google configuration
		$baseURL = 'https://accounts.google.com/o/oauth2/auth?';
		$scope = array(
				'https://www.googleapis.com/auth/userinfo.profile', // 基本情報(名前とか画像とか)
				'https://www.googleapis.com/auth/userinfo.email',   // メールアドレス
		);

		$authURL = $baseURL . 'scope=' . urlencode(implode(' ', $scope)) .
		'&redirect_uri=' . urlencode($this->Gcallback_url) .
		'&response_type=code' .
		'&client_id=' . $this->client_id;

		$this->view->google = $authURL;
		
		// facebook configuration
		$Fauth_url = 'http://www.facebook.com/dialog/oauth?client_id=' .
				$this->app_id . '&redirect_uri=' . urlencode($this->Fcallback_url);
		
		$this->view->facebook = $Fauth_url;

		// twitter configuration
		$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
		$request_token = $connection->getRequestToken($this->Tcallback_url);
		// save to session (use after authenticate)
		$_SESSION['request_token']=$token= $request_token ['oauth_token'];
		$_SESSION['request_token_secret'] =  $request_token ['oauth_token_secret'];

		$url = $connection->getAuthorizeURL($token);

		$this->view->twitter = $url;
		$this->view->title = htmlspecialchars('ログイン画面', ENT_QUOTES);
	}

	public function authAction() {
		$result = Auth($this);
		$this->view->title = htmlspecialchars('ログイン', ENT_QUOTES);
		$this->view->result = htmlspecialchars($result, ENT_QUOTES);
	}

	public function googleauthAction() {
		$params = $this->getRequest ()->getParams ();

		// is authrized?
		if (isset($params['code'])){
			$base_url = 'https://accounts.google.com/o/oauth2/token';

			$gparams = array(
					'code' => $params['code'],
					'client_id' => $this->client_id,
					'client_secret' => $this->client_secret,
					'redirect_uri' => $this->Gcallback_url,
					'grant_type'    => 'authorization_code'
			);

			$ci = curl_init();
			curl_setopt($ci, CURLOPT_USERAGENT, 'GoogleOAuth');
			curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
			curl_setopt($ci, CURLOPT_TIMEOUT, 30);
			curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ci, CURLOPT_HTTPHEADER, array('Expect:'));
			curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ci, CURLOPT_HEADER, FALSE);

			curl_setopt($ci, CURLOPT_POST, TRUE);
			curl_setopt($ci, CURLOPT_POSTFIELDS, $gparams);

			curl_setopt($ci, CURLOPT_URL, $base_url);
			$responsej = curl_exec($ci);
			curl_close ($ci);
			$response = Zend_Json::decode($responsej);

			if(array_key_exists('error', $response)){
				return $this->_forward ( 'errorlogin', 'index', 'error' );
			}
			
			$access_token = $response['access_token'];

			$user_info = Zend_Json::decode(
					file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?'.
							'access_token=' . $access_token)
			);

			$login_id = $user_info['id'];
			$login_info = $this->model->clientGet('clientlist', $user_info, $login_id);
			if(is_null($login_info)){
                $result = $this->model->clientInsert('clientlist', $user_info, 'google');
				$client_maxid = $this->model->getid ('clientlist', 'client_id');
				
				return header("Location: firstonly?client_id=$client_maxid&login_type=google");
			} else {
				$this->model->clientUpdate('clientlist', $user_info, 'google');
				$_SESSION['mem_id'] = $login_info['member_id'];
				$_SESSION['mem_name'] = $login_info['client_name'];
				return $this->_helper->redirector('index');
			}
		} else {
			exit('ログインしてください。');
		}

	}
	
	public function facebookauthAction() {
		$params = $this->getRequest ()->getParams ();
		
		// is authrized?
		if (isset($params['code'])){
			$token_url = 'https://graph.facebook.com/oauth/access_token?client_id='.
					$this->app_id . '&redirect_uri=' . urlencode($this->Fcallback_url) . '&client_secret='.
					$this->app_secret . '&code=' . $params['code'];
			
			$access_token = file_get_contents($token_url);
			
			$user_json = file_get_contents('https://graph.facebook.com/me?' . $access_token);
			$user_info = Zend_Json::decode($user_json);
			
			$login_id = $user_info['id'];
			$login_info = $this->model->clientGet('clientlist', $user_info, $login_id);
			if(is_null($login_info)){
				$result = $this->model->clientInsert('clientlist', $user_info, 'facebook');
				$client_maxid = $this->model->getid ('clientlist', 'client_id');
			
				return header("Location: firstonly?client_id=$client_maxid&login_type=facebook");
			} else {
				$this->model->clientUpdate('clientlist', $user_info, 'facebook');
				$_SESSION['mem_id'] = $login_info['member_id'];
				$_SESSION['mem_name'] = $login_info['client_name'];
				return $this->_helper->redirector('index');
			}	
		}else{
			exit('ログインしてください。');
		}
		
	}

	public function twitterauthAction() {
		$params = $this->getRequest ()->getParams ();

		// is authrized?
		if (isset($params['oauth_verifier'])){
			$auth = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $_SESSION['request_token'], $_SESSION['request_token_secret']);
			$access_token = $auth->getAccessToken($params['oauth_verifier']);

			$login_id = $access_token['user_id'];
			$login_info = $this->model->clientGet('clientlist', $access_token, $login_id);
			if(is_null($login_info)){
				$result = $this->model->clientInsert('clientlist', $access_token, 'twitter');
				$client_maxid = $this->model->getid ('clientlist', 'client_id');
			
				return header("Location: firstonly?client_id=$client_maxid&login_type=twitter");
			} else {
				$this->model->clientUpdate('clientlist', $access_token, 'twitter');
				$_SESSION['mem_id'] = $login_info['member_id'];
				$_SESSION['mem_name'] = $login_info['client_name'];
				return $this->_helper->redirector('index');
			}
		}else{
			exit('ログインしてください。');
		}

	}
	
	public function firstonlyAction() {
		$params = $this->getRequest ()->getParams ();
		
		$tokenHandler = new Custom_Auth_Token;
		$this->view->client_id = $params['client_id'];
		$this->view->token = $tokenHandler->getToken('firstonly');
		$this->view->title = 'メンバー情報更新';
	}
	
	public function emailcheckAction() {
		$params = $this->getRequest()->getParams();
		
		$token = $params['token'];
		$tag = $params['action_tag'];
		
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'errorcsrf', 'index', 'error' );
		}
		$client = $this->model->emailCheck('memlist', $params['email']);
		if($client) {
			$result = 1;
		} else {
			$result = 0;
		}

		$this->view->member_id = Zend_Json::encode($client['id']);
		$this->view->client_name = Zend_Json::encode($client['namae']);
		$this->view->result = $result; 
	}

	public function clientinsertAction() {
		$params = $this->getRequest()->getParams();
		$result = $this->model->memberidRegistration('clientlist', $params['client_id'], $params['member_id'], $params['client_name']); 
		$_SESSION['mem_id'] = $params['member_id'];
		$_SESSION['mem_name'] = $params['client_name'];
        $this->view->result = $result;
        $this->view->base = $this->base;
	}
	
	public function logoutAction() {
		$_SESSION['mem_id'] = '';
		$_SESSION['mem_name'] = '';
	}
}
?>
