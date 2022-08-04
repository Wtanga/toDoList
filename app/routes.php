<?php

use Framework\Routing\Route;
use Framework\Routing\Router;


Router::addRoute(new Route('', 'TodosController@index', Route::METHOD_GET));
Router::addRoute(new Route('/login', 'UserController@login', Route::METHOD_GET));
Router::addRoute(new Route('/logout', 'UserController@logout', Route::METHOD_GET));
Router::addRoute(new Route('user/adminpanel', 'UserController@index', Route::METHOD_GET));
Router::addRoute(new Route('user/authentication', 'UserController@authentication', Route::METHOD_POST));
Router::addRoute(new Route('user/complete/{task_id}', 'UserController@complete', Route::METHOD_POST));
Router::addRoute(new Route('user/editText/{task_id}', 'UserController@editText', Route::METHOD_POST));
Router::addRoute(new Route('todos/create', 'TodosController@addTask', Route::METHOD_POST));


