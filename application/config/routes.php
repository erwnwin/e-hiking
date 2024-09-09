<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'depan/Home';


$route['home'] = 'depan/home';

// akses admin
$route['dashboard'] = 'admin/dashboard';
$route['profil'] = 'admin/profil';

// barang
$route['barang'] = 'admin/barang';
$route['barang/create'] = 'admin/barang/create';
$route['barang/store'] = 'admin/barang/save';
$route['barang/detail/(:num)'] = 'admin/barang/detail/$1';
$route['barang/detail/(:num)'] = 'admin/barang/detail/$1';
// $route['barang/store-image'] = 'admin/barang/save';

// kategori
$route['kategori'] = 'admin/kategori';
$route['kategori/create'] = 'admin/kategori/create';
$route['kategori/store'] = 'admin/kategori/store';


// users
$route['users'] = 'admin/users';
$route['users/create'] = 'admin/users/create';
$route['users/store'] = 'admin/users/store';

// info apps
$route['info-apps'] = 'admin/Info_app';

// login
$route['logout'] = 'depan/login/logout';
$route['login'] = 'depan/login';
$route['login/authenticate'] = 'depan/login/authenticate';

// register
$route['register'] = 'depan/register';
$route['register/act'] = 'depan/register/act';

// lupa-password
$route['lupa-password'] = 'depan/forgot_password';
$route['lupa-password/kirim-link-reset'] = 'depan/forgot_password/kirim_email_reset';
$route['update-password'] = 'depan/forgot_password/reset_password';


// laporan
$route['laporan-penyewaan'] = 'admin/Laporan/Laporan_penyewaan';
$route['laporan-denda'] = 'admin/Laporan/Laporan_denda';
$route['laporan-naive-bayes'] = 'admin/Laporan/Laporan_naive_bayes';

// penyewaan
$route['form-penyewaan'] = 'cart';
$route['form-penyewaan/checkout'] = 'cart/checkout';
$route['status-penyewaan'] = 'penyewaan/status_penyewaan';
$route['status-pengembalian'] = 'pengembalian/status_pengembalian';
$route['pembayaran'] = 'pembayaran/pembayaran';
$route['denda'] = 'pembayaran/denda';

// penyewaan
$route['penyewaan'] = 'admin/penyewaan/penyewaan';
$route['penyewaan/update-status'] = 'admin/penyewaan/penyewaan/update_status';
$route['penyewaan/detail/(:any)'] = 'admin/penyewaan/penyewaan/detail/$1';

// pengembalian
$route['pengembalian'] = 'admin/pengembalian/pengembalian';

// 
$route['payment-done'] = 'admin/pembayaran/pay_done';
$route['payment-fine'] = 'admin/pembayaran/pay_fine';



// admin
$route['laporan-naive-bayes'] = 'admin/laporan/laporan_naive_bayes';
// $route['cart/add_to_cart'] = 'cart/add_to_cart';
// $route['cart/get_cart'] = 'cart/get_cart';
// $route['cart/checkout'] = 'cart/checkout';
// $route['cart/process_initial_payment'] = 'cart/process_initial_payment';
// $route['cart/process_final_payment'] = 'cart/process_final_payment';
// $route['cart/remove_from_cart'] = 'cart/remove_from_cart';


$route['404_override'] = 'Error_page';
$route['translate_uri_dashes'] = FALSE;
