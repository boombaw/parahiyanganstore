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
$routes->get('/', 'Home::index', ['as' => 'dashboard', 'filter' => 'ceklogin']);

$routes->group('login', ['namespace' => 'App\Modules\Auth\Controllers'], function($routes){
	$routes->get("/", "Auth::login", ["as" => "login"]);
	$routes->post('auth', "Auth::auth");
});

$routes->group('logout', ['namespace' => 'App\Modules\Auth\Controllers'], function($routes){
	$routes->get("/", "Auth::logout", ["as" => "logout"]);
});


/*$routes->group('kategori', ['namespace' => 'App\Modules\Kategori\Controllers'], function ($routes) {
	$routes->get('/', 'Kategori::index', ['as' => 'kategori']);
	$routes->get('load', 'Kategori::load_table', ['as' => 'kategori_datatable']);
	$routes->get('edit/(:num)', 'Kategori::edit_modal/$1', ['as' => 'modal_edit_kategori']);
	$routes->post('store', 'Kategori::store', ['as' => 'store_kategori']);
	$routes->put('update', 'Kategori::update');
	$routes->delete('delete', 'Kategori::delete');
});*/


/*$routes->group('jenis', ['namespace' => 'App\Modules\Jenis\Controllers'], function ($routes) {
	$routes->get('/', 'Jenis::index', ['as' => 'jenis']);
	$routes->get('load', 'Jenis::load_table', ['as' => 'jenis_datatable']);
	$routes->get('edit/(:num)', 'Jenis::edit_modal/$1', ['as' => 'modal_edit_jenis']);
	$routes->post('store', 'Jenis::store', ['as' => 'store_jenis']);
	$routes->put('update', 'Jenis::update');
	$routes->delete('delete', 'Jenis::delete');
});


$routes->group('produk', ['namespace' => 'App\Modules\Produk\Controllers'], function ($routes) {
	$routes->get('/', 'Produk::index', ['as' => 'produk']);
	$routes->get('load', 'Produk::load_table', ['as' => 'produk_datatable']);
	$routes->get('edit/(:num)', 'Produk::edit_modal/$1');
	$routes->get('jenis-produk', 'Produk::load_jenis');
	$routes->get('search', 'Produk::search');
	$routes->post('store', 'Produk::store');
	$routes->put('update', 'Produk::update');
	$routes->delete('delete', 'Produk::delete');
});*/

$routes->group('reseller', ['namespace' => 'App\Modules\Reseller\Controllers'], function ($routes) {
	$routes->get('/', 'Reseller::index', ['as' => 'reseller']);
	$routes->get('load', 'Reseller::load_table', ['as' => 'reseller_datatable']);
	$routes->get('edit', 'Reseller::edit_modal', ['as' => 'modal_edit_reseller']);
	$routes->post('store', 'Reseller::store');
	$routes->get('edit/(:num)', 'Reseller::edit_modal/$1');
	$routes->put('update', 'Reseller::update');
	$routes->delete('delete', 'Reseller::delete');
});

$routes->group('transaksi', ['namespace' => 'App\Modules\Transaksi\Controllers', 'filter' => 'ceklogin'], function ($routes) {
	$routes->get('out', 'Transaksi::keluar', ['as' => 'transaksi-out']);
	$routes->get('out/load', 'Transaksi::transaksi_keluar_load');
	$routes->post('out/store', 'Transaksi::transaksi_keluar_store');
	$routes->get('out/(:num)', 'Transaksi::transaksi_keluar_edit/$1');
	$routes->delete('out/delete', 'Transaksi::transaksi_keluar_delete');
	// $routes->get('in', 'Transaksi::masuk', ['as' => 'transaksi-in']);
	// $routes->get('in/load', 'Transaksi::transaksi_masuk_load');
	// $routes->post('in/store', 'Transaksi::transaksi_masuk_store');
	// $routes->get('reseller', 'Transaksi::masuk_reseller', ['as' => 'transaksi-in-reseller']);
	
});

$routes->group('laporan', ['namespace' => 'App\Modules\Laporan\Controllers', 'filter' => 'ceklogin'], function ($routes){
	$routes->group('rekap', function($routes){
		$routes->get('/', 'Laporan::rekap_sales', ['as' => 'laporan-rekap']);
		$routes->get('print', 'Laporan::print_excel');
	});
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
