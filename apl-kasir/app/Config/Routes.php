<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::login');

$routes->get('/register', 'User::formRegistrasi');
$routes->post('/register', 'User::registrasi');

$routes->get('/login', 'User::login');
$routes->post('/login', 'User::login');

$routes->get('/logout', 'User::logout');

$routes->get('/dashboard-admin', 'User::dashboardAdmin', ['filter' => 'otentifikasi']);

$routes->get('/data-user', 'User::dataUser');
$routes->get('/edit-user/(:num)', 'User::edit/$1');
$routes->post('simpan-edit', 'User::simpanEdit');
$routes->delete('/user/(:num)', 'User::delete/$1');

$routes->get('/profile', 'User::profile');

$routes->get('/data-kategori', 'Kategori::dataKategori');
$routes->get('/tambah-kategori', 'Kategori::tambahKategori');
$routes->post('/simpan-kategori', 'Kategori::simpanKategori');
$routes->get('/edit-kategori/(:num)', 'Kategori::edit/$1');
$routes->post('update-kategori', 'Kategori::simpanEdit');
$routes->post('/hapus-kategori/(:num)', 'Kategori::delete/$1');
$routes->get('/cek-kategori-digunakan/(:segment)', 'Kategori::cek_keterkaitan_data/$1');

$routes->get('/data-satuan', 'Satuan::dataSatuan');
$routes->get('/tambah-satuan', 'Satuan::tambahSatuan');
$routes->post('/simpan-satuan', 'Satuan::simpanSatuan');
$routes->get('/edit-satuan/(:num)', 'Satuan::edit/$1');
$routes->post('/update-satuan/(:num)', 'Satuan::simpanEdit/$1');
$routes->post('/hapus-satuan/(:num)', 'Satuan::delete/$1');
$routes->get('/cek-satuan-digunakan/(:segment)', 'Satuan::cek_keterkaitan_data/$1');

$routes->get('/data-produk', 'Produk::dataProduk');
$routes->get('/tambah-produk', 'Produk::tambahProduk');
$routes->post('/simpan-produk', 'Produk::simpanProduk');
$routes->get('/edit-produk/(:num)', 'Produk::edit/$1');
$routes->post('/update-produk/(:num)', 'Produk::simpanEdit/$1');
$routes->delete('/produk/(:num)', 'Produk::delete/$1');

$routes->get('/transaksi-penjualan','Penjualan::index',['filter'=>'otentifikasi']);
$routes->post('/transaksi-penjualan','Penjualan::simpanPenjualan',['filter'=>'otentifikasi']);
$routes->get('/pembayaran','Penjualan::simpanPembayaran',['filter'=>'otentifikasi']);

$routes->get('/laporan', 'Laporan::dataStok');
$routes->get('/pdf/generate', 'PdfController::generate');
// $routes->get('/penjualan', 'Laporan::dataPenjualan');
// $routes->get('/pdf/generate-penjualan', 'PdfController::generatePenjualan');

