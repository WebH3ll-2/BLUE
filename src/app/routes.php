<?php

// Static pages routes
$router->addRoute('', ['controller' => 'Index', 'action' => 'home']);
$router->addRoute('about', ['controller' => 'Index', 'action' => 'about']);
$router->addRoute('register', ['controller' => 'Index', 'action' => 'register']);

// Routes in main controllers/ folder (Namespace \Controllers)
$router->addRoute('{controller}/{action}');
$router->addRoute('{controller}/{action}/{id:\d+}');
$router->addRoute('{controller}/{id:\d+}/{action}');

// Routes for api controllers (Namespace \Controllers\API)
$router->addRoute('api/{controller}', ['namespace' => 'API']);
$router->addRoute('api/{controller}/{action}', ['namespace' => 'API']);

// Static Routes for users rest api
$router->addRoute('api/users/{id:\d+}', ['namespace' => 'API', 'controller' => 'Users', 'action' => 'getUserById']);
$router->addRoute('api/users/me/bookmark', ['namespace' => 'API', 'controller' => 'Users', 'action' => 'getMyBookmark']);
$router->addRoute('api/users/me/reviews', ['namespace' => 'API', 'controller' => 'Users', 'action' => 'getMyReviews']);

// Static Routes for reviews rest api
$router->addRoute('api/reviews/{id:\d+}', ['namespace' => 'API', 'controller' => 'Reviews', 'action' => 'processReviewWithId']);
$router->addRoute('api/reviews/{id:\d+}/images', ['namespace' => 'API', 'controller' => 'Reviews',  'action' => 'uploadImage']);
$router->addRoute('api/reviews/{id:\d+}/comments', ['namespace' => 'API', 'controller' => 'Reviews',  'action' => 'replyComment']);
$router->addRoute('api/reviews/{id:\d+}/like', ['namespace' => 'API', 'controller' => 'Reviews',  'action' => 'likeReview']);

$router->setParams(getUri());
