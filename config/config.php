<?php


define('DEFAULT_CONTROLLER', 'Home');
define('DEFAULT_ACTION', 'index');

define('SITE_TITLE', 'Kanban App');
define('DEFAULT_LAYOUT', 'default');
//project_name must match name of the root folder of this project on your machine
define('PROJECT_NAME', 'kanban-app-php-mvc');




define('DB_HOST', 'localhost');
define('DB_NAME', 'kanban_app_php_mvc');
define('DB_USER', 'root');
define('DB_PASSWORD', 'admin');






$site_root_end = strpos($_SERVER['REQUEST_URI'], PROJECT_NAME) + strlen(PROJECT_NAME) + 1;
$site_root = substr($_SERVER['REQUEST_URI'], 0, $site_root_end);
define('SROOT', $site_root);


define('CURRENT_USER_SESSION_NAME', 'gfdFDGdfgddfFHHs');   //session name for logged in user
define('REMEMBER_ME_COOKIE_NAME', 'DSFFDGdf44fd3dflkjIO6'); //cookie name for logged in user remember me
define('REMEMBER_ME_COOKIE_EXPIRY', 604800);    //time in seconds for remember me cookie to live (30 days)
