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
|	https://codeigniter.com/user_guide/general/routing.html
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

// Default 404
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Frontend Routes
$route['default_controller'] = 'defaultController';
$route['login'] = 'frontend/LoginController';
$route['login/do-login'] = 'frontend/LoginController/doLogin';
$route['logout'] = 'frontend/LoginController/logout';
$route['register'] = 'frontend/RegisterController';
$route['register/new-user'] = 'frontend/RegisterController/newUser';
$route['home'] = 'frontend/LandingPageController';
$route['spot/detail/(:any)'] = 'frontend/SpotController/detail/$1';
$route['menu/detail/(:any)'] = 'frontend/MenuController/detail/$1';
$route['booking'] = 'frontend/BookingController';
$route['booking/spot/(:any)'] = 'frontend/BookingController/index/$1';
$route['booking/process'] = 'frontend/BookingController/doBooking';
$route['booking/history'] = 'frontend/BookingController/history';
$route['booking/payment'] = 'frontend/BookingController/payment';
$route['about'] = 'frontend/AboutController';
// $route['user/profile'] = 'frontend/UserController/profile';
// $route['user/history'] = 'frontend/UserController/history';

// Backend Routes
$route['admin'] = 'backend/AdminController';
$route['admin/login'] = 'backend/LoginController';
$route['admin/logout'] = 'backend/LoginController/logout';
$route['admin/dashboard'] = 'backend/DashboardController';

$route['admin/makanan'] = 'backend/MakananController';
$route['admin/makanan/add'] = 'backend/MakananController/add';
$route['admin/makanan/update'] = 'backend/MakananController/update';
$route['admin/makanan/delete/(:any)'] = 'backend/MakananController/delete/$1';

$route['admin/paket'] = 'backend/PaketController';
$route['admin/paket/add'] = 'backend/PaketController/add';
$route['admin/paket/update'] = 'backend/PaketController/update';
$route['admin/paket/delete/(:any)'] = 'backend/PaketController/delete/$1';

$route['admin/paket/detail/(:any)'] = 'backend/PaketController/detail/$1';
$route['admin/paket/addDetail/(:any)'] = 'backend/PaketController/addDetail/$1';

$route['admin/tempat'] = 'backend/TempatController';
$route['admin/tempat/add'] = 'backend/TempatController/add';
$route['admin/tempat/update'] = 'backend/TempatController/update';
$route['admin/tempat/delete/(:any)'] = 'backend/TempatController/delete/$1';

$route['admin/customer'] = 'backend/CustomerController';
$route['admin/customer/add'] = 'backend/CustomerController/add';
$route['admin/customer/update'] = 'backend/CustomerController/update';
$route['admin/customer/delete/(:any)'] = 'backend/CustomerController/delete/$1';

$route['admin/booking'] = 'backend/BookingController';
$route['admin/booking/approve/(:any)'] = 'backend/BookingController/approve/$1';
$route['admin/booking/batal/(:any)'] = 'backend/BookingController/batal/$1';
