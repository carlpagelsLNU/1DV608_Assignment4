<?php

class RegisterView {
	private static $messageId = 'RegisterView::Message';
	private static $name = 'RegisterView::UserName';
	private static $password = 'RegisterView::Password';
	private static $passwordRepeat = 'RegisterView::PasswordRepeat';
	private static $register = 'RegisterView::Register';
	private $registerLink = 'register';
	private $backToLogin = 'backToLogin';
	private $message = '';

	  public function response() {
        return '
            <h2>Register new user</h2>
            <form method="post">
                <fieldset>
                    <legend>Register a new user - Write username and password</legend>
                    <p id="' . self::$messageId . '">' . $this->message . '</p>
                    <label for="' . self::$name . '">Username :</label>
                    <input type="text" id="' . self::$name . '" name="' . self::$name . '" value="" />
                    <br>
                    <label for="' . self::$password . '">Password :</label>
                    <input type="password" id="' . self::$password . '" name="' . self::$password . '" />
                    <br>
                    <label for="' . self::$passwordRepeat . '">Repeat password :</label>
                    <input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />
                    <br>
                    <input type="submit" name="' . self::$register . '" value="Register"/>
                </fieldset>
            </form>
        ';
    }

  public function renderBackToLogin() {
    return "<a href='?" . $this->backToLogin . "'>Back to Login</a>";
  }

  public function getLoginLink() {
  	return "<a href='?'>Back to login</a>";
  }

  public function getRegLink() {
  	return "<a href='?" . $this->registerLink . "'>Register a new user</a>";
  }
	
}