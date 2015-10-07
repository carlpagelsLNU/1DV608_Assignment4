<?php
session_start();
date_default_timezone_set('Europe/Stockholm');
//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('model/LoginModel.php');
require_once('model/RegisterModel.php');
require_once('model/User.php');
require_once('model/UserDAL.php');
require_once('controller/Controller.php');
require_once('controller/LoginController.php');
require_once('controller/RegisterController');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Initiate models
$loginModel = new LoginModel();
$registerModel = new RegisterModel();
$user = new User();
$userDAL = new UserDAL();

// Initiate Controllers
$mainCtrl = new Controller();
$loginCtrl = new LoginController();
$registerCtrl = new RegisterController();

// Initiate views
$dt = new DateTimeView();
$lv = new LayoutView();
$l = new LoginView();


