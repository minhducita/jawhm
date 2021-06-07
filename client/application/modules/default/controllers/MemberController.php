<?php
require_once 'Zend/Json.php';
require_once (dirname (dirname (dirname (dirname (dirname(__FILE__))))) . '/tools/common.php');
class MemberController extends Zend_Controller_Action {
	public $model;

	/**
	 *
	 */
	public function init() {
		$root_dir = dirname(dirname(__FILE__)) . '/';
		require_once ($root_dir . 'models/MemberModel.php');
		$this->model = new MemberModel ();
		initPage($this, '/application/modules/');
	}

	public function indexAction() {
		if(!logincheck ('index', $this)){
			$this->_helper->redirector('login', 'index');
		}
		
		$this->view->title = htmlspecialchars('会員情報変更', ENT_QUOTES);
	}

	public function emailAction() {
		if(!logincheck ('index', $this)){
			$this->_helper->redirector('login', 'index');
		}
		
		$id = $_SESSION['mem_id'];
		$list = $this->model->myMail('emaillist', $id);

		$this->view->list = $list;
		$this->view->title = htmlspecialchars('メールアドレス変更', ENT_QUOTES);
	}

	public function changeemailAction() {
		$params = $this->getRequest ()->getParams ();
		if(!logincheck ('index', $this)){
			$this->_helper->redirector('login', 'index');
		}
		
		if (is_null($params['email_id'])) {
			$email_addr = null;
		} else {
			$email = $this->model->getEmail('emaillist', $params['email_id']);
			$email_addr = $email['email'];
		}

		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('editemail');
		$this->view->email = $email_addr;
	}
	
	public function deleteemailAction() {
		$params = $this->getRequest ()->getParams ();
		if(!logincheck ('index', $this)){
			$this->_helper->redirector('login', 'index');
		}
		
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('deleteemail');
		$this->view->email_id = $params['email_id'];
	}
	
	public function delcmpemailAction() {
		$params = $this->getRequest ()->getParams ();
		if(!logincheck ('index', $this)){
			$this->_helper->redirector('login', 'index');
		}
		
		$token = $params['token'];
		$tag = $params['action_tag'];
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}
		
		$checkmail = $this->model->getEmail('emaillist', $params['email_id']);
		if ($checkmail['member_id'] != $_SESSION['mem_id']) {
			return $this->_forward ( 'emaildeleteerror', 'index', 'error' );
		}
		
		$this->model->delete('emaillist', $params['email_id'], $_SESSION['mem_id']);
	}
	
	public function emailconfirmAction() {
		$params = $this->getRequest ()->getParams ();

		$token = $params['token'];
		$tag = $params['action_tag'];
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}
		
		$temp_registry = $this->model->tempRegist('emaillist', $params, $_SESSION['mem_id']);
		if(!$temp_registry) {
			return $this->_forward ( 'error', 'index', 'error' );
		}
		
		$this->writeEmail($params, $this);
		$this->view->title = htmlspecialchars('メールアドレス変更登録', ENT_QUOTES);
	}
	
	public function mailauthAction() {
		$params = $this->getRequest ()->getParams ();
		$registry = $this->model->emailRegist('emaillist', $params, $_SESSION['mem_id']);
		
		if(!$registry) {
			return $this->_forward ( 'noemail', 'index', 'error' );
		}
		
		$this->view->title = htmlspecialchars('メールアドレス承認完了', ENT_QUOTES);
		
	}
	
	public function changekeyAction() {
		$params = $this->getRequest ()->getParams ();
		if(!logincheck ('index', $this)){
			$this->_helper->redirector('login', 'index');
		}
		
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('changekey');
		$this->view->email_id = $params['email_id'];
	}
	
	public function chkcmpkeyAction() {
		$params = $this->getRequest ()->getParams ();
		if(!logincheck ('index', $this)){
			$this->_helper->redirector('login', 'index');
		}
	
		$token = $params['token'];
		$tag = $params['action_tag'];
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}
	
		$result = $this->model->keychange('emaillist', $params['email_id'], $_SESSION['mem_id']);
		if(!$result) {
			return $this->_forward ( 'keychangeerror', 'index', 'error' );
		} 
	}
	
	public function delemailAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('delemail');
		$this->view->sugest = null;
	}
	
	public function suggestionAction() {
		$params = $this->getRequest ()->getParams ();
		
		$result = $this->model->keyword('emaillist', $params['inp']);
		
		$return = '';
		$is_first = true;
		foreach($result as $array) {
			foreach($array as $key => $value){
				if(!$is_first) {
					$return .= ',';
				} else {
					$is_first = false;
				}
				$return .= "'".$value."'";
			}
		}
		
		echo "[$return]";
	}
	
	public function deleteunconfirmAction() {
		$params = $this->getRequest ()->getParams ();
		$token = $params['token'];
		$tag = $params['action_tag'];
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}
		
		$result = $this->model->deleteunconfirm('emaillist', $params['target_email']);
	}
	
	public function emailresendAction() {
		$tokenHandler = new Custom_Auth_Token;
		$this->view->token = $tokenHandler->getToken('editemail');
	}
	
	public function unconfirmcheckAction() {
		$params = $this->getRequest ()->getParams ();
		
		$result = $this->model->unconfirmcheck('emaillist', $params['resend_email']);
		if(!isset($result['email'])) {
			return $this->_forward ( 'emaildeleteerror', 'index', 'error' );
		}
		
		$this->view->email = $params['resend_email'];
		$this->view->token = $params['token'];
	}
	
	public function resendAction() {
		$params = $this->getRequest ()->getParams ();
		
		$token = $params['token'];
		$tag = $params['action_tag'];
		$tokenHandler = new Custom_Auth_Token();
		if (!$tokenHandler->validateToken($token,$tag)) {
			return $this->_forward ( 'modalerrorcsrf', 'index', 'error' );
		}
		
		$this->writeEmail($params, $this);
		
	}
	
	private function writeEmail($params, $parent) {
		$client_info = $parent->model->getClient('memlist', $_SESSION['mem_id']);
		$name = $client_info['namae'];
		$email = $params['change_email'];
		$url = "http://192.168.11.137/client/member/mailauth?email=$email";
		
		$fromName = '一般社団法人日本ワーキングホリデー協会';
		$fromMailAddress = 'info@jawhm.or.jp';
		$toName = $name;
		$toMailAddress = $email;
		$subject = 'メールアドレス変更確認です';
		$body = '日本ワーキングホリデー協会です。';
		$body .= chr(10);
		$body .= 'メールアドレス変更を承りました。';
		$body .= chr(10);
		$body .= 'メール認証を完了するために、以下のリンクからJAWHMにログインしてください。';
		$body .= chr(10);
		$body .= $url;
		$body .= chr(10);
		$body .= 'メール認証は、上記のリンクにてログインするまで完了しません。';
		$body .= chr(10);
		$body .= 'このメールにお心当たりのない方は、お手数ですが当メールの破棄をお願いします。';
		
		$mailCharset = 'iso-2022-jp';
		$sourceCharset = 'UTF-8';
		
		/****************************
		 * DO NOT EDIT THIS COMPLICATED EMCODING
		*  OTHERWISE, IT WILL BE CORRUPTION OF SENDER OR SOMETING ELSE.
		****************************/
		
		// encoding UTF8->iso-2022-jp
		$fromName = mb_convert_encoding($fromName, $mailCharset, $sourceCharset);
		$toName = mb_convert_encoding($toName, $mailCharset, $sourceCharset);
		$subject = mb_convert_encoding($subject, $mailCharset, $sourceCharset);
		$body = mb_convert_encoding($body, $mailCharset, $sourceCharset);
		
		// authenticate settings
		$authConfig = array(
				'ssl' => 'tls',
				'port' => 25);
		
		// send server settings
		$transport = new Zend_Mail_Transport_Smtp('192.168.11.98');
		
		require_once 'Zend/Mail/Transport/Sendmail.php';
		require_once 'Zend/Mail.php';
		
		// internal_encoding UTF8->JIS
		mb_internal_encoding("JIS");
		
		// preparing to send email
		$mail = new Zend_Mail($mailCharset);
		$mail->setHeaderEncoding(Zend_Mime::ENCODING_BASE64);
		$mail->setFrom($fromMailAddress, mb_encode_mimeheader($fromName), 'JIS', 'B');
		$mail->addTo($toMailAddress, mb_encode_mimeheader($toName), 'JIS', 'B');
		$mail->setSubject($subject);
		$mail->setBodyText($body);
		$mail->addHeader('Content-Type', 'text/plain; charset=iso-2022-jp');
		$mail->addHeader('Content-Transfer-Encoding', '7bit');
		
		try {
			$mail->send($transport);
		} catch (Zend_Exception $ze) {
			echo '失敗';
			echo $ze;
		}
		
	}
}