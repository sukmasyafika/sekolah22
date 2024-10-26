<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
// utama
$routes->get('/', 'Pages::index');

// admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/index', 'Admin::index');
$routes->get('/admin/(:num)', 'Admin::detail/$1');
// kalo ada yg akses admin lalu yg di link adalah numerik maka arahkan ke cotroller admin masuk ke method detail ambil angkanya / id

// user
// $routes->get('/user', 'User::index', ['filter' => 'role:user']);
// $routes->get('/user/index', 'User::index', ['filter' => 'role:user']);

// tenaga
// create
$routes->get('/tenaga/create', 'Tenaga::create');
// edit
$routes->get('/tenaga/edit/(:segment)', 'Tenaga::edit/$1');
// hapus
$routes->delete('tenaga/(:num)', 'Tenaga::delete/$1');
// detail tenaga kerja
$routes->get('/tenaga/(:any)', 'Tenaga::detail/$1');

// siswa
$routes->get('/admin/siswa', 'Siswa::index');
$routes->get('/siswa/(:any)', 'Siswa::detail/$1');

// berita
$routes->get('/berita/create', 'Berita::create');
$routes->get('/berita/edit/(:segment)', 'Berita::edit/$1');
$routes->delete('berita/(:num)', 'Berita::delete/$1');
$routes->get('/berita/(:any)', 'Berita::detail/$1');
