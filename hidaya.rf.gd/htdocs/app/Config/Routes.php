<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->get('test', 'Home::test');


/*
 * --------------------------------------------------------------------
 * Custom Routes My Auth Routings
 * --------------------------------------------------------------------
 */
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::secure');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::auth');
$routes->get('logout', 'AuthController::logout');
$routes->get('recover', 'AuthController::recover');
$routes->post('recover', 'AuthController::password');
$routes->get('change/password', 'AuthController::pass', ['filter' => 'auth']);
$routes->post('change/password/(:num)', 'AuthController::change/$1', ['filter' => 'auth']);

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
    $routes->get('jamiat', 'AdminController::jamiat', ['filter' => 'auth']);
    $routes->get('jamia/(:any)', 'AdminController::jamia/$1', ['filter' => 'auth']);
    $routes->get('nationality', 'AdminController::nationality', ['filter' => 'auth']);
    $routes->get('nat/(:any)', 'AdminController::nat/$1', ['filter' => 'auth']);
    $routes->get('search/(:any)/(:any)', 'AdminController::search/$1/$2', ['filter' => 'auth']);
    $routes->get('users', 'AdminController::users', ['filter' => 'auth']);
    $routes->get('mushrifuna', 'AdminController::mushrifuna', ['filter' => 'auth']);
    $routes->get('add-mushrif/(:num)', 'AdminController::addMushrif/$1', ['filter' => 'auth']);
    $routes->get('judud', 'AdminController::judud', ['filter' => 'auth']);
    $routes->get('activate/(:num)', 'AdminController::activate/$1', ['filter' => 'auth']);
    $routes->post('activate-all', 'AdminController::activateAll', ['filter' => 'auth']);
    // $routes->get('add', 'AdminController::add', ['filter' => 'auth']);
    $routes->get('show/(:num)', 'AdminController::show/$1', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'AdminController::delete/$1', ['filter' => 'auth']);
    // $routes->post('upload/(:num)', 'AdminController::update/$1', ['filter' => 'auth']);
    // $routes->get('zip/(:any)', 'AdminController::zip/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Mushrif Routings
 * --------------------------------------------------------------------
 */
$routes->group('mushrif', function ($routes) {
    $routes->get('/', 'MushrifController::index', ['filter' => 'auth']);
    $routes->get('users', 'MushrifController::users', ['filter' => 'auth']);
    $routes->get('judud', 'MushrifController::judud', ['filter' => 'auth']);
    $routes->get('user/(:num)', 'MushrifController::user/$1', ['filter' => 'auth']);
    $routes->get('activate/(:num)', 'MushrifController::activate/$1', ['filter' => 'auth']);
    $routes->get('active/(:num)', 'MushrifController::active/$1', ['filter' => 'auth']);
    // $routes->get('users/(:any)/(:any)', 'MushrifController::users/$1/$2', ['filter' => 'auth']);
    // $routes->get('edit/(:num)', 'MushrifController::show/$1', ['filter' => 'auth']);
    // $routes->get('delete/(:num)', 'MushrifController::delete/$1', ['filter' => 'auth']);
    // $routes->post('upload/(:num)', 'MushrifController::update/$1', ['filter' => 'auth']);
    // $routes->get('zip/(:any)', 'MushrifController::zip/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Umrah Routings
 * --------------------------------------------------------------------
 */
$routes->group('umrah', function ($routes) {
    $routes->get('/', 'UmrahController::index', ['filter' => 'auth']);
    $routes->get('create', 'UmrahController::create', ['filter' => 'auth']);
    $routes->get('show/(:num)', 'UmrahController::show/$1', ['filter' => 'auth']);
    // $routes->get('edit/(:num)', 'UmrahController::edit/$1', ['filter' => 'auth']);
    // $routes->post('upload/(:num)', 'UmrahController::update/$1', ['filter' => 'auth']);
    // $routes->post('done', 'UmrahController::done', ['filter' => 'auth']);
    // $routes->get('link', 'UmrahController::link', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Setting Routings
 * --------------------------------------------------------------------
 */
$routes->group('set', function ($routes) {
    $routes->get('/', 'SettingController::index', ['filter' => 'auth']);
    $routes->get('add', 'SettingController::add', ['filter' => 'auth']);
    $routes->post('create', 'SettingController::create', ['filter' => 'auth']);
    $routes->get('show/(:num)', 'SettingController::show/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'SettingController::edit/$1', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'SettingController::delete/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Tanfidh Routings
 * --------------------------------------------------------------------
 */
$routes->group('tanfidh', function ($routes) {
    $routes->get('/', 'TanfidhController::index', ['filter' => 'auth']);
    $routes->get('add', 'TanfidhController::add', ['filter' => 'auth']);
    $routes->post('create', 'TanfidhController::create', ['filter' => 'auth']);
    $routes->get('show', 'TanfidhController::show', ['filter' => 'auth']);
    $routes->post('edit', 'TanfidhController::edit', ['filter' => 'auth']);
    // $routes->get('delete/(:num)', 'TanfidhController::delete/$1', ['filter' => 'auth']);
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
