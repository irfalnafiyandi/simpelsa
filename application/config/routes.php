<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['forgetpassword'] = 'Home/forgetpassword';
$route['laporan'] = 'Home/laporan';
$route['about'] = 'Home/about';
$route['laporanlist'] = 'Home/laporanlist';
$route['laporanlistdetail/(:any)'] = 'Home/laporanlistdetail/$1';
$route['getlaporan'] = 'Home/laporanget';
$route['login/proses'] = 'Home/loginprocess';
$route['register/proses'] = 'Home/registerprocess';
$route['laporan/proses'] = 'Home/laporanproses';
$route['logout'] = 'Home/logout';

$route['code/(:any)/(:any)'] = 'Home/updatepelapor/$1/$2';


$route['admin'] = 'Admin';
$route['loginadmin'] = 'Admin/loginprocess';
$route['adminlogout'] = 'Admin/logout';
$route['adminchangepassword'] = 'Admin/adminchangepassword';
$route['adminchangepasswordstore'] = 'Admin/adminchangepasswordstore';

$route['adminlist'] = 'Admin/adminlist';
$route['adminadd'] = 'Admin/adminadd';
$route['adminedit/(:any)'] = 'Admin/adminedit/$1';
$route['admindelete/(:any)'] = 'Admin/deleteadmin/$1';
$route['adminstore'] = 'Admin/adminstore';
$route['adminupdate'] = 'Admin/adminupdate';


$route['laporansampah'] = 'Admin/laporansampah';
$route['laporandelete/(:any)'] = 'Admin/laporandelete/$1';
$route['laporandetail/(:any)'] = 'Admin/laporandetail/$1';
$route['tolaklaporan/(:any)'] = 'Admin/tolaklaporan/$1';
$route['laporanverifikasi/(:any)'] = 'Admin/laporanverifikasi/$1';
$route['laporanverifikasiupdate'] = 'Admin/laporanverifikasiupdate';
$route['laporanupdatestatus/(:any)'] = 'Admin/laporanupdatestatus/$1';
$route['laporanupdatestatusupdate'] = 'Admin/laporanupdatestatusupdate';

$route['cetaklaporan'] = 'Admin/cetaklaporan';
$route['cetaklaporanstore'] = 'Admin/cetaklaporanstore';

$route['pelaporlist'] = 'Admin/pelapor';
$route['pelaporlistedit/(:any)'] = 'Admin/pelaporedit/$1';
$route['pelaporlistdelete/(:any)'] = 'Admin/pelapordelete/$1';
$route['pelaporupdate'] = 'Admin/pelaporupdate';
