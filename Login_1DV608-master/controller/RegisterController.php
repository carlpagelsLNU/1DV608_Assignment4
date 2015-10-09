<?php

class RegisterController {


	/**
	*$var \model\ControllerModel $registerModel
	*$var \view\ControllerView $registerView
	*/
	private $registerModel;
	private $registerView;
	private $registerBoolean = false;
	private static $sessionMessage;
	private static $sessionUser;
	/**
	*	@param \model\ControllerModel $registerModel
	* 	@param \view\ControllerView $registerView
	*	@param registerBoolean $registerBoolean
	*	@param sessionMesssage $sessionMessage
	*	@param sessionName $sessionName
	*/

	public function __construct(RegisterModel $registerModel, RegisterView $registerView) {
		self::$sessionMessage = "Message::RegisterMessage";
		self::$sessionUser = "User::RegisterMessage";
		$this->registerModel = $registerModel;
		$this->registerView = $registerView;
	}


		public function validateMessage($user, $password, $passwordRepeat) {
			$loginView = new LoginView();
			$newUser = new User($user, $password);
			$message = "";
		if (strlen($user) > 3) { // If user is shorter than 3
				if(strlen($password) < 6){
					$message .= " Password has too few characters, at least 6 characters.";
				}
				else
					$this->registerBoolean = true;
		}
		else {
			$message .= "Username has too few characters, at least 3 characters.";
		}
		if(strlen($password) < 6) { // if password is shorter than 6
			$message .= " Password has too few characters, at least 6 characters.";
		}
		else if(!ctype_alnum($user)) {
			$message .= "Username contains invalid characters.";
		}
		else if($password != $passwordRepeat) { // is passwords don't match
			$message .= " Passwords do not match.";
		}
		if($this->registerBoolean){
			if(ctype_alnum($user)) // Check for html tags in username
				if($password == $passwordRepeat) // Check if password match
					if(!$newUser->exists($user)) { // Check if the user exists
						$newUser->registerNewUser($newUser); // Create user
						//Set user
						$loginView->setSessionMessage("Registered new user.");
						$loginView->setRegisterTrue();
						//Set message
						$loginView->setSessionUser($user);
						// Return to login form
						$link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        				header("Location: $link");
					}
					else {
						$message .= " User exists, pick another username.";
					}
		}
			$this->registerModel->setMessage($message);
		}
		

	}