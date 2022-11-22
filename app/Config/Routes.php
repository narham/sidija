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
$routes->setDefaultController('AuthController');
// $routes->setDefaultController('Home');
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

// Routes Auth Login
$routes->get('/', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');

// Routes Admin Dashboard
$routes->get('/admin', 'AdminController::index');

// Routes Siswa
$routes->get('/siswa', 'SiswaController::index');
$routes->get('/siswa/add', 'SiswaController::add');
$routes->get('/siswa/edit/(:num)', 'SiswaController::edit/$1');
$routes->get('/siswa/delete/(:num)', 'SiswaController::delete/$1');
$routes->post('/siswa/save', 'SiswaController::save');
$routes->post('/siswa/update/(:num)', 'SiswaController::update/$1');

// routes User
$routes->get('/user', 'UserController::index');
$routes->get('/user/add', 'UserController::add');
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');
$routes->get('/user/edit/(:num)', 'UserController::edit/$1');
$routes->post('/user/save', 'UserController::save');
$routes->post('/user/update/(:num)', 'UserController::update/$1');

// routes Absen
$routes->get('/absen', 'AbsenController::index');
$routes->get('/absen/apel/pagi', 'AbsenController::absen_apel_pagi');
$routes->post('/absen/pagi/save', 'AbsenController::save_apel_pagi');
$routes->get('/absen/apel/malam', 'AbsenController::absen_apel_malam');
$routes->post('/absen/malam/save', 'AbsenController::save_apel_malam');
$routes->get('/absen/makan', 'AbsenController::makan');
$routes->get('/absen/makan/pagi', 'AbsenController::makan_pagi');
$routes->post('/absen/makan/pagi/save', 'AbsenController::save_makan_pagi');
$routes->get('/absen/makan/siang', 'AbsenController::makan_siang');
$routes->post('/absen/makan/siang/save', 'AbsenController::save_makan_siang');
$routes->get('/absen/makan/malam', 'AbsenController::makan_malam');
$routes->post('/absen/makan/malam/save', 'AbsenController::save_makan_malam');
// $routes->post('/absen/save', 'AbsenController::index');

// Routes Kelas
$routes->get('/kelas', 'KelasController::index');
$routes->get('/kelas/add', 'KelasController::add');
$routes->post('/kelas/save', 'KelasController::save');
$routes->get('/kelas/edit/(:num)', 'KelasController::edit/$1');
$routes->get('/kelas/delete/(:num)', 'KelasController::delete/$1');
$routes->get('/kelas/(:num)', 'KelasController::kelas_by_id/$1');
$routes->post('/kelas/update/(:num)', 'KelasController::update/$1');

//  Routes PIKET
$routes->get('/piket', 'PiketController::index');
$routes->post('/piket/save', 'PiketController::save_piket');
$routes->get('/piket/jaga', 'PiketController::jaga');
$routes->post('/piket/jaga/save', 'PiketController::save_jaga');
// $routes->get('/apel/pagi', 'ApelController::apelpagi');
// $routes->get('/apel/pagi/save', 'ApelController::save_apel_pagi');
// $routes->get('/apel/malam', 'ApelController::apelmalam');

// routes Jaga
$routes->get('/jaga', 'JagaController::index');
$routes->get('/jaga', 'JagaController::index');

// Routes Logbook
$routes->get('/logbook', 'LogController::index');
$routes->post('/logbook/save', 'LogController::save');

// Routes Laporan
$routes->get('/laporan', 'LaporanController::index');
$routes->get('/laporan/piket', 'LaporanController::index');
$routes->get('/laporan/jaga', 'LaporanController::index');
$routes->get('/laporan/apel', 'LaporanController::lap_apel');
$routes->get('/laporan/makan', 'LaporanController::lap_makan');
// $routes->get('/laporan/apel/pagi', 'LaporanController::index');
// $routes->get('/laporan/apel/malam', 'LaporanController::index');
// $routes->get('/laporan/makan/pagi', 'LaporanController::index');
// $routes->get('/laporan/makan/siang', 'LaporanController::index');
// $routes->get('/laporan/makan/malam', 'LaporanController::index');


// $routes->get('/', 'PdfController::index');
$routes->match(['get', 'post'], 'laporan/print', 'LaporanController::generatePDF');
$routes->match(['get', 'post'], 'laporan/apel', 'LaporanController::lap_apel');
$routes->match(['get', 'post'], 'laporan/makan', 'LaporanController::lap_makan');



// Impor file excel data siswa
$routes->get('/import/siswa', 'ImportExcel::index');
$routes->post('/import/siswa/upload', 'ImportExcel::importFile');

// Routes Prodi
$routes->get('/prodi', 'ProdiController::index');
$routes->get('/prodi/add', 'ProdiController::add');
$routes->post('/prodi/save', 'ProdiController::save');
$routes->get('/prodi/edit/(:num)', 'ProdiController::edit/$1');
$routes->get('/prodi/delete/(:num)', 'ProdiController::delete/$1');
$routes->post('/prodi/update/(:num)', 'ProdiController::update/$1');



// $routes->get('/', 'Home::index');

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