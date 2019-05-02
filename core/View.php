<?php

class View {
	private $_siteTitle = SITE_TITLE, $_layout = DEFAULT_LAYOUT, $_pageTitle, $_head, $_body, $_outputBuffer;
	
	
	public function render($viewName) {
		//replace '/' with DS. windows DS = '\'. Cater for Different OS.
		$viewArr = explode('/', $viewName);
		$viewString = implode(DS, $viewArr);
		if (file_exists(ROOT. DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
			include(ROOT. DS . 'app' . DS . 'views' . DS . $viewString . '.php');
			include(ROOT. DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');
		} else {
			die('The view "' . $viewName . '" does not exist.');
		}
	}
	
	
	public function renderModal($viewName) {
		//replace '/' with DS. windows DS = '\'. Cater for Different OS.
		$viewArr = explode('/', $viewName);
		$viewString = implode(DS, $viewArr);
		if (file_exists(ROOT. DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
			include(ROOT. DS . 'app' . DS . 'views' . DS . $viewString . '.php');
		} else {
			die('The modal "' . $viewName . '" does not exist.');
		}
	}
	
	public function start($type) {
		$this->_outputBuffer = $type;
		ob_start();
	}
	
	
	public function end() {
		if ($this->_outputBuffer == 'head') {
			$this->_head = ob_get_clean();
			//H::dnd($this->_head);
		} else if ($this->_outputBuffer == 'body') {
			$this->_body = ob_get_clean();
			//H::dnd($this->_body);
		} else {
			die('You must first run the start method');
		}
	}
	
	
	public function content($type) {
		if ($type == 'head') {
			return $this->_head;
		} else if ($type == 'body') {
			return $this->_body;
		}
		return false;
	}
	
		
	public function setLayout($path) {
		$this->_layout = $path;
	}
		

	
	public function setPageTitle($title) {
		$this->_pageTitle = $title;
	}
	
	
	public function getPageTitle() {
		return $this->_pageTitle;
	}
	
	
	
	public function partial($group, $partial){
		include(ROOT . DS . 'app' . DS . 'views' . DS . $group . DS . 'partials' . DS . $partial . '.php');
	}
	
	
}














