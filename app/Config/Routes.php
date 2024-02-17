<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//produkpenjualan
$routes->get('/produk', 'Produk::index');
$routes->get('/produk/tampil', 'Produk::ambilSemua');
$routes->get('/produk/edit', 'Produk::edit');
$routes->post('/produk/simpan', 'Produk::simpan');
$routes->post('/produk/update', 'Produk::update');
$routes->post('/produk/simpan', 'Produk::simpan');
$routes->post('/produk/delete', 'Produk::delete');
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');

//pelanggan
$routes->get('/pelanggan', 'Pelanggan::all');
$routes->get('pelanggan/show', 'Pelanggan::showw');
$routes->get('pelanggan/edit', 'Pelanggan::edit2');
$routes->post('pelanggan/simpan', 'Pelanggan::save');
$routes->post('pelanggan/update', 'Pelanggan::update2');
$routes->post('pelanggan/simpan', 'Pelanggan::save');
$routes->post('pelanggan/delete', 'Pelanggan::delete2');

//user
$routes->get('/register', 'Register::index'); 
$routes->get('/user/show', 'Register::ambilSemua'); 
$routes->post('/user/simpan', 'Register::simpan'); 
$routes->get('/user/edit', 'Register::edit'); 
$routes->post('/user/update', 'Register::update'); 
$routes->post('/user/delete', 'Register::delete');

//penjualan
$routes->get('/penjualan', 'Penjualan::index');
$routes->get('/penjualan/tampil', 'Penjualan::ambilSemua');
$routes->post('/penjualan/simpan', 'Penjualan::simpan');

// detailpenjualan
$routes->post('/checkout', 'DetailPenjualan::index'); 
$routes->post('/detailpenjualan', 'DetailPenjualan::index');