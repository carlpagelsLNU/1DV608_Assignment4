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
				$loginController->validateMessage($user, $password);	
		}
		else {
			$user = $loginController->getUser();
		}
		if($loginController->isSignedIn()) {
			$response = $this->generateLogoutButtonHTML($loginModel->getMessage());
		}
		else {
			$response = $this->generateLoginFormHTML($loginModel->getMessage(), $user);
		}
		if($loginController->isSignedIn()) {
			if(isset($_POST['LoginView::Logout'])) {
				$loginController->logout();
				$response = $this->generateLoginFormHTML($loginModel->getMessage(), $user);
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
	public function setSessionTrue() {
		$_SESSION['signedIn'] = true;
	}
	
}