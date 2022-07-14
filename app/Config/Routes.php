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
$routes->post('/reg', 'UserController::authregister');
$routes->get('/register', 'RegisterController::index');


$routes->group('api', function ($routes) {
    $routes->get('showAllOrderUser/(:segment)', 'OrderController::show_order_user/$1');
    $routes->post('login_api', 'userController::login');
    $routes->post('insertOrder', 'OrderController::post_order');
    $routes->post('insertStatus', 'DriverController::insert_status');
    $routes->get('order/(:segment)', 'OrderController::order/$1');
    $routes->get('showAllOrderUser/(:segment)', 'OrderController::show_order_user/$1');
    $routes->get('showAllOrderDriver/(:segment)', 'OrderController::show_order_driver/$1');
    $routes->post('insertPengemudi/(:segment)', 'OrderController::insert_pengemudi/$1');
    $routes->get('order_driver/(:segment)', 'OrderController::order_driver/$1');
    $routes->get('detailOrder/(:segment)', 'OrderController::detail_order/$1');
    $routes->get('showUser/(:segment)', 'userController::showUser/$1');
    $routes->get('detailDriver/(:segment)', 'OrderController::detail_driver/$1');
    $routes->get('getMobil', 'DriverController::getMobil');
    $routes->add('updatePlatNomor/(:segment)', 'DriverController::update_plat/$1');
    $routes->add('updateToken/(:segment)', 'UserController::update_token/$1');
    $routes->get('getUser', 'userController::get_user');
    $routes->post('uploadImage', 'ReimburseController::uploadImage');
    $routes->post('send-notification', 'NotificationController::send');
    $routes->get('getOrder/(:segmen)', 'OrderController::order/$1');
    $routes->post('insertOrder', 'OrderController::post_order');
    $routes->post('changeNumber/(:segment)', 'userController::changeNumber/$1');
    $routes->post('insertMobil', 'CarController::post_order');
    $routes->post('changePassword/(:any)', 'userController::changePassword/$1');
    $routes->post('insertStatus', 'DriverController::insert_status');
    $routes->add('updateToken/(:segment)', 'UserController::update_token/$1');
    $routes->add('updatePlatNomor/(:segment)', 'DriverController::update_plat/$1');
    $routes->get('detailOrder/(:segment)', 'OrderController::detail_order/$1');
    $routes->get('showUser/(:segment)', 'userController::showUser/$1');
    $routes->get('viewPassword', 'userController::view_password');
    $routes->post('insertPengemudi/(:segment)', 'OrderController::insert_pengemudi/$1');
});

$routes->group('', ['filter' => 'loginFilter'], function ($routes) {
    $routes->get('/register', 'RegisterController::index');
    $routes->get('/homes', 'Home::homes');
    $routes->get('/admin', 'Home::admin');
    $routes->get('/otorisator', 'Home::otorisator');
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
    $routes->get('status_unavailable/(:num)', 'DriverController::status_unavailable/$1');
    $routes->get('status_available/(:num)', 'DriverController::status_available/$1');

    $routes->post('/addReimburse/(:segment)/(:segment)', 'ReimburseController::insert_image_reimburse/$1/$2');
    $routes->group('reimburse', function ($routes) {
        $routes->get('/', 'ReimburseController::index', ['filter' => 'isAdmin']);
        $routes->get('approve', 'ReimburseController::approve', ['filter' => 'isAdmin']);
        $routes->get('edit/(:any)', 'ReimburseController::edit/$1', ['filter' => 'isAdmin']);
        $routes->add('export', 'ReimburseController::export', ['filter' => 'isAdmin']);
        $routes->post('update/(:any)', 'ReimburseController::update/$1', ['filter' => 'isAdmin']);
        $routes->post('delete/(:any)', 'ReimburseController::delete/$1', ['filter' => 'isAdmin']);
        $routes->post('delete_inDriver/(:any)', 'ReimburseController::delete_inDriver/$1', ['filter' => 'isDriver']);
        $routes->get('list', 'ReimburseController::list', ['filter' => 'isDriver']);
        $routes->get('add_reimburse/(:any)', 'ReimburseController::add_reimburse/$1', ['filter' => 'isDriver']);
        $routes->post('store_reimburse/(:any)', 'ReimburseController::store_reimburse/$1', ['filter' => 'isDriver']);
        $routes->post('postReimburse/(:any)', 'ReimburseController::post_reimburse/$1', ['filter' => 'isDriver', 'authFilter']);
    });
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
