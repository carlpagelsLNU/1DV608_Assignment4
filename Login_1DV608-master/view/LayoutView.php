<?php
class LayoutView {

  private $register = 'register';
  public function render($isLoggedIn, LoginView $v, DateTimeView $dtv) {
    $ret = $v->response(); // set the return message for logged in status first
    $lm = new LoginModel();
    $isLoggedIn = $lm->signedIn();
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderRegisterUser($isLoggedIn) . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $ret. '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }

  private function renderRegisterUser($isLoggedIn) {
    if ($isLoggedIn) {
      return '';
    }
    else {
      return "<a href='?" . $this->register . "'>Register a new user</a>";
    }
  }

  public function registerClicked() {
    return isset($_POST[$this->register]);
  }

}