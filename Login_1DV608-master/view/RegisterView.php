<?php

class RegisterView {
	private static $messageId = 'RegisterView::Message';
	private static $name = 'RegisterView::UserName';
	private static $password = 'RegisterView::Password';
	private static $passwordRepeat = 'RegisterView::PasswordRepeat';
	private static $register = 'RegisterView::Register';
  private $keepUser = '';
	private $registerLink = 'register';
	private $backToLogin = 'backToLogin';
	private $message = '';

	  public function response() {
        $registerModel = new registerModel();
        $registerController = new registerController($registerModel, $this);
        if(isset($_POST['RegisterView::Register'])) {
          
          $user = $_POST['RegisterView::UserName'];
          $this->keepUser = $user; // Remove all html tags from user

          $password = $_POST['RegisterView::Password'];
          $passwordRepeat = $_POST['RegisterView::PasswordRepeat'];
          $registerController->validateMessage($user, $password, $passwordRepeat);

        }
        $response = $this->renderRegisterForm($registerModel->getMessage(), $this->getUser());
          return $response;


    }

    public function renderRegisterForm($message, $user) {
      return '
            <h2>Register new user</h2>
            <form method="post">
                <fieldset>
                    <legend>Register a new user - Write username and password</legend>
                    <p id="' . self::$messageId . '">' . $message . '</p>
                    <label for="' . self::$name . '">Username :</label>
                    <input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . strip_tags($user) . '" />
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

  private function getUser() {
    return $this->keepUser;
  }
  public function setUser($user) {
    $this->keepUser = $user;
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