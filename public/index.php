<?php

/**
 *
 * Public file for the Bingo Framework
 * Adding routes for the various controllers and views happens here 
 * 
 * @package The Bingo Framework
 * @author Lochemem Bruno Michael
 *
 */

/**
 *
 * Automatically load the classes in framework environment
 *	
 */

spl_autoload_register(function ($class){
	//replace the directory separator with a forward slash
	$root = str_replace('\\', '/', dirname(__DIR__));
	$file = $root . '/' . str_replace('\\', '/', $class) . '.php';
	if (is_readable($file)) {
		require $root . '/' . str_replace('\\', '/', $class) . '.php';
	}
});

/**
 *
 * Set the error and exception handler classes
 * @see Core/Error.php
 *
 */

set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

$router->addRoute("", ['controller' => 'Home', 'action' => 'index']);

$router->addRoute("posts", ['controller' => 'Posts', 'action' => 'index']);

$router->addRoute('{controller}/{action}');

$router->addRoute('{controller}/{id:\d+}/{action}');

$router->addRoute('{controller}/{name:\w+}/{action}');

$router->addRoute('{controller}/{name:\w+}/{id:\d+}/{action}');

$router->addRoute('admin/{controller}/{action}', ['namespace' => 'Admin']);

$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);