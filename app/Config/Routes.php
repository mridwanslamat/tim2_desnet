<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('/auth', 'AuthController::auth');
$routes->post('/auth', 'AuthController::auth');
$routes->get('/logout', 'AuthController::logout');

// Halaman admin dan project manager
$routes->get('/admin', 'AdminController::index', ['filter' => 'auth']);
$routes->get('/project-manager', 'ProjectManagerController::index', ['filter'=>'auth']);
