<?php
class LayoutView {

  private static $registerLink = "register";

  public function render($isLoggedIn, LoginView $v, DateTimeView $dtv, RegisterView $rv) {
    $ret = $v->response(); // set the return message for logged in status first
    $lm = new LoginModel();
    $isLoggedIn = $lm->signedIn();
    $returnMessageRegister = $rv->response();
    $returnMessageLogin = $v->response();
    ?>
    
    <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          <?php 
          if($this->isRegisterClicked())
            echo $rv->getLoginLink();
          else if(!$isLoggedIn)
            echo $rv->getRegLink();
          if($isLoggedIn)
            echo "<h2>Logged in</h2>";
          else 
            echo "<h2>Not logged in</h2>"
          ?>
         <div class="container">
         <?php 
              if($this->isRegisterClicked())
                echo $returnMessageRegister;
              else 
                echo $returnMessageLogin;

              echo $dtv->show();
         ?>
          </div>
         </body>
      </html>
      <?php
  }

  public function isRegisterClicked() {
    return isset($_GET[self::$registerLink]);
  }

}