<?php

/**
 * Front controller
 *
 * PHP version 5.4
 */

/*
 * Twig
 */
//require_once dirname(__DIR__) . '/vendor/twig/twig/lib/Twig/Autoloader.php';


// instead of including libraries one by one manually we can include them using Composer autoloader
require '../vendor/autoload.php';

Twig_Autoloader::register();



/**
 * Autoloader
 */
/*spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});
*/

/**
  * Error and Exception handling
  */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core::\Error:ExceptionHandler');


/**
 * Routing
 */
// require '../Core/Router.php';

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{id:\d+}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
    
// Display the routing table
echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>';


// Match the requested route


$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for URL '$url'";
}
