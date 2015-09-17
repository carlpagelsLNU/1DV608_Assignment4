<?php


class Login {

	public function __construct () {
		
	}

	public function validateMessage($user, $password) {
		$message = '';
		if(strlen($user) < 1) {
			$message = 'Username is missing';
			return $message;
		}
		else if (strlen($password) < 1) {
			$message = 'Password is missing';
			return $message;
		}
		else {
			return $message;
		}
	}
}