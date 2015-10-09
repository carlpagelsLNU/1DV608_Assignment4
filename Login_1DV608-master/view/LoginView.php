<?php
class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private static $sessionMessage;
	private static $sessionUser;
	private static $registerBoolean;

	public function __construct() {
		self::$sessionMessage = "Message::RegisterMessage";
		self::$sessionUser = "User::RegisterMessage";
		self::$registerBoolean = "registerBoolean::RegisterMessage";
	}



	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {
		$loginModel = new LoginModel();
		$loginView = new LoginView();
		$loginController = new LoginController($loginModel, $loginView);

		if(isset($_POST['LoginView::Login'])) { // Check if login button has been pressed
				$user = $_POST['LoginView::UserName']; // Set name to whatever has been filled in the name box
				$password = $_POST['LoginView::Password']; // Set password to whatever has been filled in the password box
				$this->setSessionUser($user);
				$loginController->validateMessage($user, $password);	
		}
		else {
			$user = $loginController->getUser();
		}
		if($loginController->isSignedIn()) {
			$response = $this->generateLogoutButtonHTML($loginModel->getMessage());
		}
		else {
			if(isset($_SESSION[self::$registerBoolean])) {
				if($_SESSION[self::$registerBoolean]) {
					$user = $this->getSessionUser();
					$response = $this->generateLoginFormHTML("Registered new user. ", $user);
					$_SESSION[self::$registerBoolean] = false;
				}
				else
					$response = $this->generateLoginFormHTML($this->getSessionMessage(), $this->getSessionUser());
			}
			else
			$response = $this->generateLoginFormHTML($this->getSessionMessage(), $this->getSessionUser());
		}
		if($loginController->isSignedIn()) {
			if(isset($_POST['LoginView::Logout'])) {
				$this->setSessionUser("");
				$this->setSessionMessage("");
				$loginController->logout();
				$response = $this->generateLoginFormHTML($loginModel->getMessage(), $loginController->getUser());
			}
		}
		
	return $response;
	}
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message, $user) {
		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $user . '" />
					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}	
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
	}
	public function getSessionMessage() {
		if(isset($_SESSION[self::$sessionMessage])){
			$message = $_SESSION[self::$sessionMessage];
			return $message;
		}
			return "";
	}
	public function getSessionUser() {
		if(isset($_SESSION[self::$sessionUser])){
			$user = $_SESSION[self::$sessionUser];
			return $user;
		}
			return "";
	}
	public function setSessionMessage($message) {
		$_SESSION[self::$sessionMessage] = $message;
	}
	public function setSessionUser($user) {
		$_SESSION[self::$sessionUser] = $user;
	}

	public function setUser($user){
		$this->user = $user;
	}
	public function setMessage($message) {
		$this->message = $message;
	}

	public function setSessionTrue() {
		$_SESSION['signedIn'] = true;
	}
	public function setRegisterTrue() {
		$_SESSION[self::$registerBoolean] = true;
	}
	
}