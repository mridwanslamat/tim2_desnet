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
$routes->get('/admin/dashboard', 'AdminController::index', ['filter' => 'auth']);
$routes->get('/admin/addnewproject', 'AdminController::addNewProject', ['filter' => 'auth']);
$routes->post('/admin/addnewproject', 'AdminController::store', ['filter' => 'auth']);

$routes->get('/project-manager/dashboard', 'ProjectManagerController::index', ['filter'=>'auth']);
$routes->get('/project-manager/listproject', 'ProjectManagerController::listProject', ['filter'=>'auth']);
$routes->get('/project-manager/manageproject', 'ProjectManagerController::manageProject', ['filter'=>'auth']);