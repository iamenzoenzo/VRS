<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['cars'] = 'cars/cars';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
