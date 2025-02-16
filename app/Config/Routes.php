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
$routes->get('/admin/history', 'AdminController::historyProject', ['filter'=>'auth']);
$routes->get('/admin/history/updateproject/(:num)', 'AdminController::updateHistoryProject/$1', ['filter'=>'auth']);
$routes->put('/admin/history/updateproject/save', 'AdminController::updateHistoryProject', ['filter'=>'auth']);

$routes->get('/project-manager/dashboard', 'ProjectManagerController::index', ['filter'=>'auth']);
$routes->get('/project-manager/addnewproject', 'ProjectManagerController::addNewProject', ['filter'=>'auth']);
$routes->post('/project-manager/addnewproject', 'ProjectManagerController::store', ['filter' => 'auth']);
$routes->get('/project-manager/listproject', 'ProjectManagerController::listProject', ['filter'=>'auth']);
$routes->get('/project-manager/manageproject', 'ProjectManagerController::manageProject', ['filter'=>'auth']);
$routes->get('/project-manager/history', 'ProjectManagerController::historyProject', ['filter'=>'auth']);
$routes->get('/project-manager/history/updateproject/(:num)', 'ProjectManagerController::updateHistoryProject/$1', ['filter'=>'auth']);
$routes->put('/project-manager/history/updateproject/save', 'ProjectManagerController::updateHistoryProject', ['filter'=>'auth']);

// Fitur
$routes->get('/project-manager/manageproject/(:num)', 'ProjectManagerController::manageProject/$1');
$routes->post('/project-manager/manageproject/save', 'ProjectMAnagerController::saveFeatures');
$routes->post('/project-manager/manageproject/update/(:num)', 'ProjectManagerController::updateFeature/$1');
$routes->get('/project-manager/manageproject/delete/(:num)', 'ProjectManagerController::deleteFeature/$1');
$routes->get('/project-manager/manageproject/feature-uat/(:num)', 'ProjectManagerController::featureUAT/$1');
$routes->put('/project-manager/manageproject/feature-uat', 'ProjectManagerController::featureUAT');