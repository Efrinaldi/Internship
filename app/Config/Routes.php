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
$routes->get('/login', 'UserController::index');
$routes->get('/', 'UserController::index');
$routes->post('/login_api', 'UserController::login');
$routes->add('/logout', 'UserController::logout');
$routes->post('/auth', 'UserController::auth');
$routes->post('/reg', 'UserController::authregister');
$routes->post('/auth_register_driver', 'RegisterController::auth_register_driver');
$routes->get('/register', 'RegisterController::index');
$routes->group('api', function ($routes) {
    $routes->get('showAllOrderUser/(:segment)', 'OrderController::show_order_user/$1');
    $routes->post('login_api', 'UserController::login');
    $routes->post('approveReimburse', 'OrderController::updateStatusReimburse');
    $routes->post('uploadKeterangan', 'OrderController::uploadKeterangan');
    $routes->get('detailReimburse/(:segment)', 'OrderController::detail_reimburse/$1');
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
    $routes->post('uploadImage', 'OrderController::uploadImage');
    $routes->post('uploadKeterangan', 'OrderController::uploadKeterangan');
    $routes->post('uploadDeskripsi', 'OrderController::uploadImage');
    $routes->post('send-notification', 'NotificationController::send');
    $routes->get('getOrder/(:segment)', 'OrderController::order/$1');
    $routes->post('insertOrder', 'OrderController::post_order');
    $routes->post('changeNumber/(:segment)', 'UserController::changeNumber/$1');
    $routes->post('insertMobil', 'CarController::post_order');
    $routes->post('changePassword/(:any)', 'UserController::changePassword/$1');
    $routes->post('insertStatus', 'DriverController::insert_status');
    $routes->add('updateToken/(:segment)', 'UserController::update_token/$1');
    $routes->add('updatePlatNomor/(:segment)', 'DriverController::update_plat/$1');
    $routes->get('detailOrder/(:segment)', 'OrderController::detail_order/$1');
    $routes->get('showUser/(:segment)', 'UserController::showUser/$1');
    $routes->get('viewPassword', 'userController::view_password');
    $routes->post('insertPengemudi/(:segment)', 'OrderController::insert_pengemudi/$1');
});

$routes->group('', ['filter' => 'loginFilter'], function ($routes) {
    $routes->get('/register', 'RegisterController::index');
    $routes->get('/register_driver', 'RegisterController::register_driver');
    $routes->get('/homes', 'Home::homes');
    $routes->get('/admin', 'Home::admin');
    $routes->get('/list_user', 'UserController::list_user');
    $routes->get('/otorisator', 'Home::otorisator');
    $routes->get('/dashboard', 'Home::dashboard');
    $routes->get('/request', 'Home::request');
    $routes->get('/user', 'Home::user');
    $routes->get('/list_car', 'Home::list_car');
    $routes->get('/order', 'Home::order');
    $routes->get('/history', 'Home::history');
    $routes->get('/history_supervisor', 'Home::history');
    $routes->get('/process', 'Home::process');
    $routes->get('/driver', 'Home::driver');
    $routes->get('/history_approve', 'Home::history_approve');
    $routes->get('/history_reject', 'Home::history_reject');
    $routes->post('/change_user/(:segment)', 'UserController::change_user/$1');
    $routes->get('/history_supervisor_approve', 'Home::history_supervisor_approve');
    $routes->get('/history_supervisor_reject', 'Home::history_supervisor_reject');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
