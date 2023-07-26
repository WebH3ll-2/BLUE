<?php


// Static pages routes
$router->addRoute('', ['controller' => 'Index', 'action' => 'home']);
$router->addRoute('about', ['controller' => 'Index', 'action' => 'about']);


// Routes in main controllers/ folder (Namespace \Controllers)
$router->addRoute('{controller}/{action}');
$router->addRoute('{controller}/{action}/{id:\d+}');
$router->addRoute('{controller}/{id:\d+}/{action}');


// Routes for api controllers (Namespace \Controllers\API)
$router->addRoute('api/{controller}', ['namespace' => 'API']);
$router->addRoute('api/{controller}/{action}', ['namespace' => 'API']);
$router->addRoute('api/{controller}/{action}/{id:\d+}', ['namespace' => 'API']);

$router->setParams(getUri());
