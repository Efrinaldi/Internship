<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'UserController::index');
$routes->get('/', 'UserController::index');
$routes->post('/login_api', 'UserController::login');
$routes->add('/logout', 'UserController::logout');


$routes->post('/auth', 'UserController::auth');
$routes->post('/reg', 'UserController::authregister');

$routes->group('', ['filter' => 'loginFilter'], function ($routes) {
    $routes->get('/register', 'RegisterController::index');
    $routes->get('/admin', 'Home::admin');
    $routes->get('/dashboard', 'Home::dashboard');
    $routes->get('/request', 'Home::request');
    $routes->get('/user', 'Home::user');
    $routes->get('/order', 'Home::order');
    $routes->get('/history', 'Home::history');
    $routes->get('/process', 'Home::process');
    $routes->get('/driver', 'Home::driver');
    $routes->get('/history_approve', 'Home::history_approve');
    $routes->get('/history_reject', 'Home::history_reject');
    $routes->get('/pick_driver/(:segment)', 'OrderController::show_order/$1');
    $routes->add('/insert_order/(:segment)', 'OrderController::insert_order/$1');
    $routes->get('/order/(:segment)', 'OrderController::order/$1');
    $routes->get('/order_driver/(:segment)', 'OrderController::order_driver/$1');
    $routes->get('/showOrder/(:segment)', 'OrderController::showOrder/$1');
    $routes->get('/getMobil', 'DriverController::getMobil');
    $routes->get('/login_api', 'UserController::login');
    $routes->get('/getUser', 'UserController::get_user');
    $routes->post('send-notification', 'NotificationController::send');
    $routes->get('/getOrder/(:segmen)', 'OrderController::order/$1');
    $routes->post('/insertOrder', 'OrderController::post_order');
    $routes->post('/requestOrder', 'OrderController::request_order');
    $routes->post('/insertMobil', 'CarController::post_order');
    $routes->post('/insertStatus', 'DriverController::insert_status');
    $routes->add('/updateToken/(:segment)', 'UserController::update_token/$1');
    $routes->add('/updatePlatNomor/(:segment)', 'DriverController::update_plat/$1');
    $routes->get('approve/(:num)', 'OrderController::approve_order/$1');
    $routes->get('reject/(:num)', 'OrderController::reject_order/$1');
});
















/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}