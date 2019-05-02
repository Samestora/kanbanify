<?php

class HomeController extends Controller {
	
	public function __construct($controllerName, $action) {
		parent::__construct($controllerName, $action);
		
	}

	
	public function indexAction($name='') {
		$this->view->render('home/index');
	}
	
}