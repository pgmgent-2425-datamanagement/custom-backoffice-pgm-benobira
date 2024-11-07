<?php

// Create a new Router instance ✅
$router->setNamespace('\App\Controllers');

// Home route ✅
$router->get('/', 'HomeController@index');

// Users Routes ✅
$router->get('/users', 'UserController@index'); // List users
$router->get('/users/edit/(\d+)', 'UserController@edit'); // Edit user form
$router->post('/users/edit/(\d+)', 'UserController@edit'); // Handle user edit submission
$router->get('/users/delete/(\d+)', 'UserController@delete'); // Delete user

// Reservations Routes ✅
$router->get('/reservations', 'ReservationController@index'); // List reservations
$router->get('/reservations/add', 'ReservationController@add'); // Add reservation form
$router->post('/reservations/add', 'ReservationController@add'); // Handle add reservation submission
$router->get('/reservations/edit/(\d+)', 'ReservationController@edit'); // Edit reservation form
$router->post('/reservations/edit/(\d+)', 'ReservationController@edit'); // Handle reservation edit submission
$router->get('/reservations/delete/(\d+)', 'ReservationController@delete'); // Delete reservation

// Tables Routes ✅
$router->get('/tables', 'TableController@index'); // List tables
$router->get('/tables/add', 'TableController@add'); // Add table form
$router->post('/tables/add', 'TableController@add'); // Handle add table submission
$router->get('/tables/edit/(\d+)', 'TableController@edit'); // Edit table form
$router->post('/tables/edit/(\d+)', 'TableController@edit'); // Handle table edit submission
$router->get('/tables/delete/(\d+)', 'TableController@delete'); // Delete table

// Menus Routes ✅
$router->get('/menus', 'MenuController@index'); // List menus
$router->get('/menus/add', 'MenuController@add'); // Add menu form
$router->post('/menus/add', 'MenuController@add'); // Handle add menu submission
$router->get('/menus/edit/(\d+)', 'MenuController@edit'); // Edit menu form
$router->post('/menus/edit/(\d+)', 'MenuController@edit'); // Handle menu edit submission
$router->get('/menus/delete/(\d+)', 'MenuController@delete'); // Delete menu

// Filemanager Routes ✅
$router->get('/filemanager', 'FilemanagerController@index'); // List files
$router->get('/filemanager/add', 'FilemanagerController@add'); // Add file form
$router->post('/filemanager/add', 'FilemanagerController@add'); // Handle add file submission
$router->get('/filemanager/add/(.*)', 'FilemanagerController@add'); // Add file form
$router->post('/filemanager/add/(.*)', 'FilemanagerController@add'); // Handle add file submission
$router->get('/filemanager/delete/(.*)', 'FilemanagerController@delete'); // Delete file
$router->get('/filemanager/(.*)', 'FilemanagerController@index'); // List files in a folder