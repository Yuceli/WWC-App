<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = urldecode($uri);
// $configs = parse_ini_file('app/config/config.ini');
$configs = include 'app/config/app.php';
$requested = $configs['app_path'].$uri;
if ($uri !== '/' and file_exists($requested))
{
	if(substr($requested, -4) == '.php' and substr($requested, -4) == '.ini'){
        header('Location: /');
    }
	return false;
}
require_once 'index.php';
