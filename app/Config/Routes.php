<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Modules\Home\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);



/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


$routes->group('kategori', ['namespace' => 'App\Modules\Kategori\Controllers'], function ($routes) {
	$routes->get('/', 'Kategori::index', ['as' => 'kategori']);
	$routes->get('edit', 'Kategori::edit_modal', ['as' => 'modal_edit_kategori']);
});


$routes->group('jenis', ['namespace' => 'App\Modules\Jenis\Controllers'], function ($routes) {
	$routes->get('/', 'Jenis::index', ['as' => 'jenis']);
	$routes->get('edit', 'Jenis::edit_modal', ['as' => 'modal_edit_jenis']);
});


$routes->group('produk', ['namespace' => 'App\Modules\Produk\Controllers'], function ($routes) {
	$routes->get('/', 'Produk::index', ['as' => 'produk']);
	// $routes->get('edit', 'Jenis::edit_modal', ['as' => 'modal_edit_jenis']);
});

$routes->group('reseller', ['namespace' => 'App\Modules\Reseller\Controllers'], function ($routes) {
	$routes->get('/', 'Reseller::index', ['as' => 'reseller']);
	$routes->get('edit', 'Reseller::edit_modal', ['as' => 'modal_edit_reseller']);
});

$routes->group('transaksi', ['namespace' => 'App\Modules\Transaksi\Controllers'], function ($routes) {
	$routes->get('out', 'Transaksi::keluar', ['as' => 'transaksi-out']);
	$routes->get('in', 'Transaksi::masuk', ['as' => 'transaksi-in']);
});



/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
