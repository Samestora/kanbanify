<?php

class Controller {
	
	protected $_controllerName, $_action;
	public $view, $request;
	
	public function __construct($controllerName, $action) {
		$this->_controllerName = $controllerName;
		$this->_action = $action;
		$this->view = new View();
	}
	
	
	
}