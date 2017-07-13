<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['Login/logout'] = 'login/index';
$route['logout'] = 'login/logout';
$route['(:any)/login'] = 'login/logout';

//$route['Login'] = 'dashboard';

$route['default_controller'] = 'login';
$route['(:any)/dashboard'] = '';
$route['(:any)/increaselog'] = 'increaselog';
$route['(:any)/decreaselog'] = 'decreaselog';
$route['(:any)/returnlog'] = 'returnlog';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
