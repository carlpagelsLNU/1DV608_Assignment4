<?php


class Login {
	private $message = '';
	private $user = '';
	private $password = '';
	private $signedIn = false;
	public function __construct () {
	}

	public function validateMessage($user, $password) {
		if(strlen($user) < 1) {
			$this->setMessage('Username is missing');

		}
		else if (strlen($password) < 1) {
			$this->setMessage('Password is missing');
		}
		else if($user == 'Admin' && $password == 'Password') {
				$this->setSignInTrue();
				$this->setMessage("Welcome");
			}
			else if($user =! 'Admin' || $password != 'Password') {
				$this->setMessage('Wrong name or password');
			}
		else {
			$this->setMessage('');
			$this->setPassword($password);
			$this->setUser($user);

		}
	}

	private function setSignInTrue() {
		$this->signedIn = true;
	}
	public function signedIn() {
		return $this->signedIn;
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