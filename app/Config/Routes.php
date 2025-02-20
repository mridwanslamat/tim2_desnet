<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('/auth', 'AuthController::auth');
$routes->post('/auth', 'AuthController::auth');
$routes->get('/logout', 'AuthController::logout');

// Halaman admin
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'AdminController::index');
    $routes->get('addnewproject', 'AdminController::addNewProject');
    $routes->post('addnewproject', 'AdminController::store');
    $routes->get('history', 'AdminController::historyProject');
    $routes->get('history/updateproject/(:num)', 'AdminController::updateHistoryProject/$1');
    $routes->put('history/updateproject/save', 'AdminController::updateHistoryProject');
    $routes->get('download/(:num)', 'AdminController::download/$1');
    $routes->get('history/document/(:num)', 'AdminController::docsHistory/$1');
});

// Halaman project manager
$routes->group('project-manager', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'ProjectManagerController::index');
    $routes->get('addnewproject', 'ProjectManagerController::addNewProject');
    $routes->post('addnewproject', 'ProjectManagerController::store');
    $routes->get('listproject', 'ProjectManagerController::listProject');
    $routes->get('manageproject', 'ProjectManagerController::manageProject');
    $routes->get('history', 'ProjectManagerController::historyProject');
    $routes->get('history/updateproject/(:num)', 'ProjectManagerController::updateHistoryProject/$1');
    $routes->put('history/updateproject/save', 'ProjectManagerController::updateHistoryProject');
    $routes->get('download/(:num)', 'ProjectManagerController::download/$1');
    $routes->get('history/document/(:num)', 'ProjectManagerController::docsHistory/$1');

    // Fitur
    $routes->get('manageproject/(:num)', 'ProjectManagerController::manageProject/$1');
    $routes->post('manageproject/save', 'ProjectManagerController::saveFeatures');
    $routes->post('manageproject/update/(:num)', 'ProjectManagerController::updateFeature/$1');
    $routes->get('manageproject/delete/(:num)', 'ProjectManagerController::deleteFeature/$1');
    $routes->get('manageproject/feature-uat/(:num)', 'ProjectManagerController::featureUAT/$1');
    $routes->put('manageproject/feature-uat', 'ProjectManagerController::featureUAT');

    // Generate UAT
    $routes->get('generate-pdf/(:num)', 'ProjectManagerController::generatePDF/$1');
});