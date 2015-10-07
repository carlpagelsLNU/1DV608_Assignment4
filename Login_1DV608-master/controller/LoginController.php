<?php

class LoginController {

	/**
	*$var \model\loginModel $loginModel
	*/
	private $loginModel;

	/**
	*	@param \model\LoginModel $loginModel
	*/

	public function __construct(LoginModel $loginModel) {
		$this->loginModel = $loginModel;
	}
	

	/**
	* Check if user is signed in using method in LoginModel
	*/
	public function isSignedIn() {
		return $this->loginModel->signedIn();
	}

}