<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'Dashboard';
$route['create-checksheet'] = 'Checksheet/create';
$route['add-new-checksheet'] = 'Checksheet/create_new';
$route['preview'] = 'Checksheet/preview_sheet';
$route['download-sheet'] = 'Checksheet/download_sheet';
$route['checksheet-list'] = 'Checksheet';
$route['logout'] = 'Dashboard/logout';
