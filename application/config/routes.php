<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/view';
$route['estimate'] = 'pages/estimate';
$route['estimate/(:any)'] = 'pages/estimate/$1';
$route['contact'] = 'pages/contact';
$route['(:any)'] = 'pages/view/$1';

$route['cars'] = 'cars/index';
$route['cars/(:any)'] = 'cars/index/$1';

$route['settings'] = 'settings/index';
$route['settings/(:any)'] = 'settings/index/$1';

$route['users'] = 'users/index';
$route['users/(:any)'] = 'users/index/$1';

$route['status'] = 'status/index';
$route['status/(:any)'] = 'status/index/$1';

$route['clients'] = 'clients/index';
$route['clients/(:any)'] = 'clients/index/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
