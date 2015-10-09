<?php

class LoginController {

	/**
	*$var \model\loginModel $loginModel
	*$var \view\LoginView $loginView
	*/
	private $loginModel;
	private $loginView;
	private $userDal;
	/**
	*	@param \model\LoginModel $loginModel
	* 	@param \view\LoginView $loginView
	*	@param \mode\UserDAL $userDal
	*/

	public function __construct(LoginModel $loginModel, LoginView $loginView, UserDAL $userDal) {
		$this->loginModel = $loginModel;
		$this->loginView = $loginView;
		$this->userDal = $userDal;
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
			$this->loginView->setSessionMessage('Username is missing');
		}
		else if (strlen($password) < 1) { // If password is empty
			$this->loginView->setSessionMessage('Password is missing');
		}
		else if($this->userDal->getPassword($user) == $password) { // If username and password are correct
				$this->loginView->setSessionMessage("Welcome");
				$this->loginView->setSessionTrue();
			}
		else if($this->userDal->getPassword($user) != $password) { // If either username or password is incorrect
			$this->loginView->setSessionMessage('Wrong name or password');
		}
		else {
			$this->loginView->setSessionMessage('');
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