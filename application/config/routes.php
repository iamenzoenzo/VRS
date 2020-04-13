<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['cars'] = 'cars/cars';
$route['settings'] = 'settings/index';
$route['users'] = 'users/index';
$route['status'] = 'status/index';
$route['clients'] = 'clients/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
