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
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Custom Routes My Auth Routings
 * --------------------------------------------------------------------
 */
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::secure');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::auth');
$routes->get('recover', 'AuthController::recover');
$routes->post('recover', 'AuthController::password');
$routes->get('change/password', 'AuthController::pass', ['filter' => 'auth']);
$routes->post('change/password/(:num)', 'AuthController::change/$1', ['filter' => 'auth']);
$routes->get('logout', 'AuthController::logout');
$routes->get('email', 'AuthController::my');

/*
 * --------------------------------------------------------------------
 * Routes Groups User Routings
 * --------------------------------------------------------------------
 */
$routes->group('user', function ($routes) {
    $routes->get('/','UserController::index', ['filter' => 'auth']);
    $routes->get('profile/(:num)', 'UserController::show/$1', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'UserController::edit/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'UserController::update/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Image Routings
 * --------------------------------------------------------------------
 */
$routes->group('image', function ($routes) {
    $routes->get('/', 'ImageController::index', ['filter' => 'auth']);
    $routes->get('edit/(:num)/(:any)', 'ImageController::imgShow/$1/$2', ['filter' => 'auth']);
    $routes->post('upload/(:num)', 'ImageController::update/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Admin Routings
 * --------------------------------------------------------------------
 */
$routes->group('admin', function ($routes) {
    $routes->get('/', 'AdminController::index', ['filter' => 'auth']);
    $routes->get('view', 'AdminController::new', ['filter' => 'auth']);
    $routes->get('mushrif', 'AdminController::mushrif', ['filter' => 'auth']);
    $routes->get('add', 'AdminController::add', ['filter' => 'auth']);
    $routes->get('users/(:any)/(:any)', 'AdminController::users/$1/$2', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'AdminController::show/$1', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'AdminController::delete/$1', ['filter' => 'auth']);
    // $routes->post('upload/(:num)', 'AdminController::update/$1', ['filter' => 'auth']);
    $routes->get('zip/(:any)', 'AdminController::zip/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Umrah Routings
 * --------------------------------------------------------------------
 */
$routes->group('umrah', function ($routes) {
    $routes->get('/', 'UmrahController::index', ['filter' => 'auth']);
    $routes->post('new', 'UmrahController::create', ['filter' => 'auth']);
    $routes->get('edited/(:num)', 'UmrahController::show/$1', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'UmrahController::edit/$1', ['filter' => 'auth']);
    $routes->post('upload/(:num)', 'UmrahController::update/$1', ['filter' => 'auth']);
    $routes->post('done', 'UmrahController::done', ['filter' => 'auth']);
    $routes->get('link', 'UmrahController::link', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Setting Routings
 * --------------------------------------------------------------------
 */
// $routes->group('set', function ($routes) {
//     $routes->get('/', 'SettingController::index', ['filter' => 'auth']);
    // $routes->get('view', 'SettingController::new', ['filter' => 'auth']);
    // $routes->get('edit/(:num)', 'SettingController::show/$1', ['filter' => 'auth']);
    // $routes->get('delete/(:num)', 'SettingController::delete/$1', ['filter' => 'auth']);
    // $routes->post('upload/(:num)', 'SettingController::update/$1', ['filter' => 'auth']);
// });

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
