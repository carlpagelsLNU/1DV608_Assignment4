<?php
class LoginModel {
	private $message = '';
	private $user = '';
	private $password = '';
	public function __construct () {
	}
	
	public function signedIn() {
		if(isset($_SESSION['signedIn']))
				return true;
			return false;
	}
	public function logout() {
		$this->setMessage('Bye bye!');
		//$_SESSION['signedIn'] = false;
		unset($_SESSION['signedIn']);
	}
	public function setMessage($message) {
		$this->message = $message;
	}
	public function getMessage() {	
		return $this->message;
	}
	public function setUser($user) {
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