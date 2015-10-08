<?php

Class UserDAL {
	
	public function __construct() {
	}


	public function registerUser($name, $password) {
		if(file_exists('./data/' . addslashes($name)))
			return false;
		else {
			file_put_contents('./data/' . addslashes($name), serialize($password));
			return true;
		}
	}

	public function exists($user) {
		if(file_exists('./data/' . addslashes($user)))
			return true;
		return false;
	}
}