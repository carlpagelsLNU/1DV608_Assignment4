<?php

class RegisterModel {
	private $message = '';

	public function __construct () {
	}

	public function setMessage($message) {
		$this->message = $message;
	}
	public function getMessage() {
		return $this->message;
	}

}