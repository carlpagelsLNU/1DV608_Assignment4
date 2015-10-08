<?php

class User {
	
	private $name;
	private $password;
	private $userDal;


	public function __construct($name, $password) {
		$this->name = $name;
		$this->password = $password;
		$this->userDal = new UserDAL();
	}

	public function registerNewUser($user) {
		return $this->userDal->registerUser($user->getName(), $user->getPassword());
	}

	public function getName() {
		return $this->name;
	}
	public function getPassword() {
		return $this->password;
	}

	public function exists($user) {
		return $this->userDal->exists($user);
	}
}