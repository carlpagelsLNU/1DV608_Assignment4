<?php
session_start();
date_default_timezone_set('Europe/Stockholm');
//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('model/LoginModel.php');
require_once('model/RegisterModel.php');
require_once('model/User.php');
require_once('model/UserDAL.php');
require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Initiate models
$loginModel = new LoginModel();
$registerModel = new RegisterModel();
$user = new User();
$userDAL = new UserDAL();

// Initiate views
$dt = new DateTimeView();
$lv = new LayoutView();
$l = new LoginView();
$rv = new RegisterView();

// Initiate Controllers
$loginCtrl = new LoginController($loginModel, $l);
$registerCtrl = new RegisterController($registerModel, $rv);

$lv->render($loginModel->signedIn(), $l, $dt, $rv);


