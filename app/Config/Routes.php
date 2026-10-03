<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('tasks', 'Tasks::index');
$routes->post('tasks/(:num)/toggle', 'Tasks::toggle/$1');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'About::index');
