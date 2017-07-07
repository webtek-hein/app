<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['Login/logout'] = 'login/index';
$route['(:any)/logout'] = 'login/logout';
$route['logout'] = 'login/logout';

//$route['Login'] = 'dashboard';

$route['default_controller'] = 'login';
$route['admin/(:any)'] = '';
$route['custodian/dashboard'] = '';
$route['department_head/dashboard'] = '';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
