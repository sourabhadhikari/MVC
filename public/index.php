<?php

/**
 * Front controller
 *
 * PHP version 5.4
 */

/**
 * Routing
 */
// require '../Core/Router.php';

// require '../App/Controllers/Posts.php';

//autoloader function

spl_autoload_register(function($class){
    $root = dirname(__DIR__); //get the parent directory
    $file = $root.'/'.str_replace('\\','/',$class).'.php';
    if(is_readable($file)){
        require $root.'/'.str_replace('\\','/',$class).'.php';
    }
});

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('addPost', ['controller' => 'AddPost', 'action' => 'index']);
$router->add('category', ['controller' => 'Category', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('admin/{controller}/{action}',['namespace'=>'Admin']);
$router->add('{controller}/{id:\d+}/{action}');

    
// // Display the routing table
// echo '<pre>';
// //var_dump($router->getRoutes());
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo '</pre>';


// // Match the requested route
// $url = $_SERVER['QUERY_STRING'];

// if ($router->match($url)) {
//     echo '<pre>';
//     var_dump($router->getParams());
//     echo '</pre>';
// } else {
//     echo "No route found for URL '$url'";
// }
// echo $_SERVER['QUERY_STRING'] ;
$router->dispatch($_SERVER['QUERY_STRING']);