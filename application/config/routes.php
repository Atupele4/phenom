<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['client/(:any)'] = 'client/index/$1';
$route['cases/(:any)/(:any)'] = 'cases/index/$1/$2';
$route['data_entry/enter/(:any)'] = 'data_entry/enter/$1';
$route['data_entry/enter_case'] = 'data_entry/enter_case';
$route['data_entry/company'] = 'data_entry/company';
$route['data_entry/enter_logo'] = 'data_entry/enter_logo';
$route['data_entry/enter_client'] = 'data_entry/enter_client';
$route['data_entry/delete_case/(:any)/(:any)'] = 'data_entry/delete_case/$1/$2';
/*update*/
$route['update_data/client/(:any)'] = 'update_data/client/$1';
$route['update_data/cases/(:any)/(:any)'] = 'update_data/cases/$1/$2';
$route['data_entry/update_client/(:any)'] = 'data_entry/update_client/$1';
$route['data_entry/update_case/(:any)'] = 'data_entry/update_case/$1';
$route['data_entry/update_company'] = 'data_entry/update_company';
$route['data_entry/update_password'] = 'data_entry/update_password';
$route['data_entry/status/(:any)'] = 'data_entry/status/$1';

$route['data_entry/delete_client/(:any)'] = 'data_entry/delete_client/$1';

$route['pages/member/(:any)/(:any)'] = 'pages/member/$1/$1';
 
$route['pages/give_more_data'] = 'pages/give_more_data';
$route['pages/delete_id'] = 'pages/delete_id';
$route['pages/delete_client'] = 'pages/delete_client';

$route['createpdf/pdf/(:any)'] = 'createpdf/pdf/$1';
$route['createpdf/cases/(:any)'] = 'createpdf/cases/$1';
$route['createpdf/client'] = 'createpdf/client';
$route['createpdf/closed'] = 'createpdf/closed';
$route['createpdf/open'] = 'createpdf/open';
$route['createpdf/pending'] = 'createpdf/pending';
$route['createpdf/balance_search/(:any)/(:any)'] = 'createpdf/balance_search/$1/$2';

$route['pages/filter/(:any)'] = 'pages/filter/$1';
$route['pages/pending'] = 'pages/pending';
  
$route['pages/logout'] = 'pages/logout/';
 
$route['search/balance'] = 'search/balance';

$route['profile'] = 'profile/index';
$route['profile/backup'] = 'profile/backup';


$route['pages/(:any)'] = 'pages/footy/$1';
$route['verifylogin'] = 'verifylogin';
$route['search'] = 'search/index';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';

/* End of file routes.php */
/* Location: ./application/config/routes.php */