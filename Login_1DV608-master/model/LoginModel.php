<?php
class LoginModel {
	private $message = '';
	private $user = '';
	private $password = '';
	public function __construct () {
	}
	
	public function signedIn() {
		if(isset($_SESSION['signedIn']))
			if($_SESSION['signedIn'])
				return true;
			return false;
	}
	public function setMessage($message) {
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