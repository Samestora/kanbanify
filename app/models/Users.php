<?php

class Users extends Model {
	private $_isLoggedIn, $_sessionName, $_cookieName, $_confirm;
	public static $currentLoggedInUser = null;
	public $id,$username,$password;
  
	
	public function __construct($user='') {  
		$table = 'users';
		parent::__construct($table);
		$this->_sessionName = CURRENT_USER_SESSION_NAME;
		$this->_cookieName = REMEMBER_ME_COOKIE_NAME;
	
		//only used in currentUser() method
		if ($user != '') {
			if (is_int($user)) {
				//AAA
				$u = $this->_db->findFirst('users', ['conditions'=>'id = ?', 'bind'=>[$user]], 'Users');
			} else {
				$u = $this->_db->findFirst('users', ['conditions'=>'username = ?', 'bind'=>[$user]], 'Users');
			};
			
			if ($u) {
				foreach ($u as $key => $val) {
					$this->$key = $val;
				}
			}
		}
	}
	

	
	public function findByUsername($username) {
		$user = $this->findFirst(['conditions' => "username = ?", 'bind'=>[$username]], 'Users');
		return $user;		 
	}
	
	
	public static function currentUser() {
		if (!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)) {
			$u = new Users((int) Session::get(CURRENT_USER_SESSION_NAME));
			self::$currentLoggedInUser = $u;
		}
		return self::$currentLoggedInUser;
	}
	
														 
			
	public function login($rememberMe=false) {
		Session::set($this->_sessionName, $this->id);
		if ($rememberMe) {
			$hash = md5(uniqid() + rand(0, 100));
			$user_agent = Session::uagent_no_version();
			Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
			$fields = ['session'=>$hash, 'user_agent'=>$user_agent, 'user_id'=>$this->id];
			//delete old user session
			$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
			//new session
			$this->_db->insert('user_sessions', $fields);
		}
	}
				
	
	
	public static function loginUserFromCookie() {
		$userSession = UserSessions::getFromCookie();
		if ($userSession && $userSession->user_id != '') {
			$user = new self((int)$userSession->user_id);
			if ($user) {
				$user->login();
			}
			return $user;
		}
		return;
	}
	
	
	
	
	public function logout($rememberMe=false) {
		$userSession = UserSessions::getFromCookie();
		if ($userSession) $userSession->delete($userSession->id);
		Session::delete(CURRENT_USER_SESSION_NAME);
		if (Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
			Cookie::delete(REMEMBER_ME_COOKIE_NAME);
		}
		self::$currentLoggedInUser = null;
		return true;
	}
	
	
	public function validate() {
		if ($this->username == '') {
			$this->addErrorMessage('fill in username');
		}
		if ($this->password == '') {
			$this->addErrorMessage('fill in password');
		}
		if ($this->password !== $this->getConfirm()) {
			$this->addErrorMessage('password do not match');
		}
	}
	
	
	public function setConfirm($value){
    $this->_confirm = $value;
  }

  public function getConfirm(){
    return $this->_confirm;
  }
	
}









