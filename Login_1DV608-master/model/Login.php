<?php

session_start();

class Login {
	private $message = '';
	private $user = '';
	private $password = '';
	public function __construct () {
		if(!isset($_SESSION['signedIn']))
			$_SESSION['signedIn'] = false;
	}

	public function validateMessage($user, $password) {
		if(strlen($user) < 1) {
			$this->setMessage('Username is missing');

		}
		else if (strlen($password) < 1) {
			$this->setMessage('Password is missing');
		}
		else if($user == 'Admin' && $password == 'Password') {
				$this->setMessage("Welcome");
				$_SESSION['signedIn'] = true;
			}
		else if($user != 'Admin' || $password != 'Password') {
			$this->setMessage('Wrong name or password');
		}
		else {
			$this->setMessage('');
			$this->setPassword($password);
			$this->setUser($user);
		}
	}

	public function logout() {
		$_SESSION['signedIn'] = false;
		session_destroy();
		$this->setMessage('Bye bye!');
	}

	public function signedIn() {
		if(isset($_SESSION['signedIn']))
			if($_SESSION['signedIn'])
				return true;
			return false;
	}
	private function setMessage($message) {
		$this->message = $message;
	}
	public function getMessage() {
		return $this->message;
	}
	private function setUser($user) {
		$this->user = $user;
	}
	public function getUser() {
		return $this->user;
	}
	private function setPassword($password) {
		$this->password = $password;
	}
	public function getPassword() {
		return $this->password;
	}
	
}