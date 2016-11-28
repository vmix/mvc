<?php

	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', dirname(dirname(__FILE__)));

	require_once (ROOT . DS . 'lib' . DS . 'init.php');

	$router = new Router($_SERVER['REQUEST_URI']);

	echo "<pre>";
	print_r('Роут: ' . $router->getRoute() . '<br>');
	print_r('Язык: ' . $router->getLanguage() . '<br>');
	print_r('Контроллер: ' . $router->getController() . '<br>');
	print_r('Метод: ' . $router->getMethodPrefix() . $router->getAction() . '<br>');
	echo "Параметры: ";
	print_r($router->getParams());