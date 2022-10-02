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
//$routes->setAutoRoute(false);

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
 * Custom Routes Locale Routings
 * --------------------------------------------------------------------
 */
// $routes->get('locale/(:any)', 'Home::locale/$1');

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
// $routes->get('test', 'AuthController::test');

/*
 * --------------------------------------------------------------------
 * Routes Groups User Routings
 * --------------------------------------------------------------------
 */
$routes->group('user', function ($routes) {
    $routes->get('/', 'UserController::index', ['filter' => 'auth']);
    $routes->get('profile/(:num)', 'UserController::show/$1', ['filter' => 'auth']);
    $routes->get('info/(:num)', 'UserController::edit/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'UserController::update/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Categories Routings
 * --------------------------------------------------------------------
 */
$routes->group('category', function ($routes) {
    $routes->get('/', 'CategoryController::index', ['filter' => 'auth']);
    $routes->get('add', 'CategoryController::new', ['filter' => 'auth']);
    $routes->post('create', 'CategoryController::create', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'CategoryController::show/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'CategoryController::update/$1', ['filter' => 'auth']);
    // $routes->get('delete/(:num)', 'CategoryController::delete/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups SubCategories Routings
 * --------------------------------------------------------------------
 */
$routes->group('subcat', function ($routes) {
    $routes->get('/', 'SubcatController::index', ['filter' => 'auth']);
    $routes->get('add', 'SubcatController::new', ['filter' => 'auth']);
    $routes->post('create', 'SubcatController::create', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'SubcatController::show/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'SubcatController::update/$1', ['filter' => 'auth']);
    // $routes->get('delete/(:num)', 'SubcatController::delete/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Authors Routings
 * --------------------------------------------------------------------
 */
$routes->group('author', function ($routes) {
    $routes->get('/', 'AuthorController::index', ['filter' => 'auth']);
    $routes->get('add', 'AuthorController::new', ['filter' => 'auth']);
    $routes->post('create', 'AuthorController::create', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'AuthorController::show/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'AuthorController::update/$1', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'AuthorController::delete/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Books Routings
 * --------------------------------------------------------------------
 */
$routes->group('book', function ($routes) {
    $routes->get('/', 'BookController::index', ['filter' => 'auth']);
    $routes->get('add', 'BookController::new', ['filter' => 'auth']);
    $routes->post('create', 'BookController::create', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'BookController::show/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'BookController::update/$1', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'BookController::delete/$1', ['filter' => 'auth']);
    $routes->post('upload/(:num)', 'BookController::upload/$1', ['filter' => 'auth']);
    $routes->post('sub', 'BookController::sub', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Sharh Routings
 * --------------------------------------------------------------------
 */
$routes->group('sharh', function ($routes) {
    $routes->get('/', 'SharhController::index', ['filter' => 'auth']);
    $routes->get('add', 'SharhController::new', ['filter' => 'auth']);
    $routes->post('create', 'SharhController::create', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'SharhController::show/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'SharhController::update/$1', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'SharhController::delete/$1', ['filter' => 'auth']);
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
