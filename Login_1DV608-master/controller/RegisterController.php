<?php

class RegisterController {


	/**
	*$var \model\ControllerModel $registerModel
	*$var \view\ControllerView $registerView
	*/
	private $registerModel;
	private $registerView;
	private $registerBoolean = false;
	/**
	*	@param \model\ControllerModel $registerModel
	* 	@param \view\ControllerView $registerView
	*/

	public function __construct(RegisterModel $registerModel, RegisterView $registerView) {
		$this->registerModel = $registerModel;
		$this->registerView = $registerView;
	}


		public function validateMessage($user, $password, $passwordRepeat) {
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
			if(!$newUser->exists($user)) {
				$newUser->registerNewUser($newUser);
			}
			else {
				$message .= " User already exists.";
			}
		}
		

			$this->registerModel->setMessage($message);
		}
		

	}