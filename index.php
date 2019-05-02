<?php

define('DS', DIRECTORY_SEPARATOR);
define('FS', '/');
define('ROOT', dirname(__FILE__));

require_once('config/config.php');



function autoload($className) {
	if (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
		require_once(ROOT . DS . 'core' . DS . $className . '.php');
	}
	else if (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php')) {
		require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php');
	}
	else if (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php')) {
		require_once(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php');
	}
}


spl_autoload_register('autoload');
session_start();

if (!Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
	Users::loginUserFromCookie();
}

Router::route();


?>


