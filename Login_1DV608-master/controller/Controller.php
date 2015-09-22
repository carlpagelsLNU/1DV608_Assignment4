<?php


//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('model/Login.php');

class Controller {

private $v;
private $dtv;
private $lv;
private $l;

	public function __construct() {
		//CREATE OBJECTS OF THE VIEWS
		$this->v = new LoginView();
		$this->dtv = new DateTimeView();
		$this->lv = new LayoutView();
		$this->l = new Login();
	}

	public function start() {
		if(!isset($_SESSION['signedIn']))
		$_SESSION['signedIn'] = false;
		$this->lv->render($this->l->signedIn(), $this->v, $this->dtv);
	}
	}
