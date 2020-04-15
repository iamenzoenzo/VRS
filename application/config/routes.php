<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/view';

$route['estimate'] = 'pages/estimate';

$route['contact'] = 'pages/contact';

$route['cars'] = 'cars/index';

$route['settings'] = 'settings/index';

$route['users'] = 'users/index';

$route['status'] = 'status/index';

$route['clients'] = 'clients/index';
//$route['clients/(:any)'] = 'clients/index/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
