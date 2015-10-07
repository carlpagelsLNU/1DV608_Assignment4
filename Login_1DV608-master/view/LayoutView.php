<?php
class LayoutView {

  private $register = 'register';

  public function render($isLoggedIn, LoginView $v, DateTimeView $dtv) {
    $ret = $v->response(); // set the return message for logged in status first
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderRegisterUser() . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $ret. '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($_SESSION['signedIn']) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }

  private function renderRegisterUser() {
    if ($_SESSION['signedIn']) {
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