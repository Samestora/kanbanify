<?php


class Router {
	
	private static function parseUrl() {
		if (isset($_GET['url'])) {
			return $url = explode('/', rtrim($_GET['url'], '/'));
		}
		return '';
	}
	
	
	public static function route() {
		$url = self::parseUrl();
		
		$controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]).'Controller' : DEFAULT_CONTROLLER.'Controller';
		$controllerName = str_replace('Controller', '', $controller);

		if ($url) array_shift($url);
		
		$action = (isset($url[0]) && $url[0] != '') ? $url[0].'Action' : DEFAULT_ACTION.'Action';
		$actionName = (isset($url[0]) && $url[0] != '') ? $url[0] : DEFAULT_ACTION;
		
		if ($url) array_shift($url);
		
		$params = ($url != '') ? $url : [];
		
		$dispatch = new $controller($controllerName, $action);
		
		if (method_exists($controller, $action)) {
			call_user_func_array([$dispatch, $action], $params);
		} else {
			die('That method does not exist in "'.$controllerName.'" Controller');
		}
		
		
	}
	
	
	
	public static function redirect($location) {
		if (!headers_sent()) {
			header('location: ' . SROOT . $location);
			exit();
		}
	}
		
	
	
}