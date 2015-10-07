<?php

class LoginController {

	/**
	*$var \model\loginModel $loginModel
	*$var \view\LoginView $loginView
	*/
	private $loginModel;
	private $loginView;
	/**
	*	@param \model\LoginModel $loginModel
	* 	@param \view\LoginView $loginView
	*/

	public function __construct(LoginModel $loginModel, LoginView $loginView) {
		$this->loginModel = $loginModel;
		$this->loginView = $loginView;
	}
	
	/**
	* Check if user is signed in using method in LoginModel
	*/
	public function isSignedIn() {
		return $this->loginModel->signedIn();
	}
	/*
	* User LoginModel's function for validating a user
	*/
	public function validateMessage($user, $password) {
		if(strlen($user) < 1) { // If username is empty
			$this->loginModel->setMessage('Username is missing');
		}
		else if (strlen($password) < 1) { // If password is empty
			$this->loginModel->setMessage('Password is missing');
		}
		else if($user == 'Admin' && $password == 'Password') { // If username and password are correct
				$this->loginModel->setMessage("Welcome");
				$this->loginView->setSessionTrue();
			}
		else if($user != 'Admin' || $password != 'Password') { // If either username or password is incorrect
			$this->loginModel->setMessage('Wrong name or password');
		}
		else {
			$this->loginModel->setMessage('');
			$this->loginView->setPassword($password);
			$this->loginView->setUser($user);
		}
	}

	/*
	* Get User from LoginModel
	*/
	public function getUser() {
		return $this->loginModel->getUser();
	}
	/*
	* Logout using method in LoginModel
	*/
	public function logout() {
		$this->loginModel->logout();
	}

}