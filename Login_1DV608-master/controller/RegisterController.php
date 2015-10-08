<?php

class RegisterController {


	/**
	*$var \model\ControllerModel $registerModel
	*$var \view\ControllerView $registerView
	*/
	private $registerModel;
	private $registerView;
	/**
	*	@param \model\ControllerModel $registerModel
	* 	@param \view\ControllerView $registerView
	*/

	public function __construct(RegisterModel $registerModel, RegisterView $registerView) {
		$this->registerModel = $registerModel;
		$this->registerView = $registerView;
	}





		public function validateMessage($user, $password, $passwordRepeat) {
			$message = "";
		if (strlen($user) < 3) { // If password is shorter than 6
			$message .= "Username has too few characters, at least 3 characters.";
		}
		if(strlen($password) < 6) {
			$message .= "Password has too few characters, at least 3 characters.";
		}
		$this->registerModel->setMessage($message);

	}

}