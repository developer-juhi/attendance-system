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

// ==================================================================================================
//User route start User Side 
// ==================================================================================================


$route['user-login'] = 'ApiController/user_login';
$route['in-time'] = 'ApiController/attendance_in';
$route['out-time'] = 'ApiController/attendance_out';
$route['history'] = 'ApiController/history';
$route['seles-reposrting'] = 'ApiController/seles_reposrting';


// ==================================================================================================
//User  route over User Slide
// ==================================================================================================


// ==================================================================================================

// ==================================================================================================
/* Admin API start*/
// ==================================================================================================

$route['admin-login'] = 'LoginController';
$route['login-check'] = 'LoginController/loginCheck';
$route['logout'] = 'LoginController/logout';
$route['change-password'] = 'ChangepasswordController/index';
$route['change-password-save'] = 'ChangepasswordController/save';
// ==================================================================================================
/* Admin API over */


// ==================================================================================================
/* Admin dashboard start */
// ==================================================================================================
$route['report-insentive'] = 'ReportController/report_insentive';
$route['report-attendance'] = 'ReportController/report_attendance';
$route['report-sale'] = 'ReportController/report_sale';

$route['report-insentive-data'] = 'ReportController/report_insentive_data';
$route['report-attendance-data'] = 'ReportController/report_attendance_data';
$route['report-sale-data'] = 'ReportController/report_sale_data';
$route['report-user-get'] = 'ReportController/user_get';
// ==================================================================================================
/* Admin dashboard over */
// ==================================================================================================







// ==================================================================================================
/* Admin dashboard start */
// ==================================================================================================
$route['dashboard'] = 'AdminController/index';
// ==================================================================================================
/* Admin dashboard over */
// ==================================================================================================


// ==================================================================================================
/* Start Admin company */
// ==================================================================================================

$route['company'] = 'CompanyController/list';
$route['company-register'] = 'CompanyController/add';
$route['company-register-save'] = 'CompanyController/save';
$route['company-fetch'] = 'CompanyController/data';
$route['company-delete'] = 'CompanyController/delete'; 
$route['company-update?(.+)'] = 'CompanyController/edit';
$route['company-save'] = 'CompanyController/saveEdit';

// ==================================================================================================
// Over admin company
// ==================================================================================================

// ==================================================================================================
/* Start user company */
// ==================================================================================================

$route['user'] = 'UserController/list';
$route['user-register'] = 'UserController/add';
$route['user-register-save'] = 'UserController/save';
$route['user-fetch'] = 'UserController/data';
$route['user-delete'] = 'UserController/delete'; 
$route['user-update?(.+)'] = 'UserController/edit';
$route['user-save'] = 'UserController/saveEdit';



$route['user-check'] = 'ForgetpasswordController/user_check_email';
$route['user-check-save'] = 'ForgetpasswordController/user_check_email_save';

$route['user-change-password'] = 'ForgetpasswordController/user_change_password';
$route['user-password-save'] = 'ForgetpasswordController/user_change_password_save';

// ==================================================================================================
// Over user company
// ==================================================================================================
// ==================================================================================================
/* Start sale company */
// ==================================================================================================

$route['sale'] = 'SaleController/list';
$route['sale-register'] = 'SaleController/add';
$route['sale-register-save'] = 'SaleController/save';
$route['sale-fetch'] = 'SaleController/data';
$route['sale-delete'] = 'SaleController/delete'; 
$route['sale-update?(.+)'] = 'SaleController/edit';
$route['sale-save'] = 'SaleController/saveEdit';
$route['user-get'] = 'SaleController/user_get';

// ==================================================================================================
// Over sale company
// ==================================================================================================

// ==================================================================================================
/* Start incentive company */
// ==================================================================================================

$route['incentive'] = 'IncentiveController/list';
$route['incentive-register'] = 'IncentiveController/add';
$route['incentive-register-save'] = 'IncentiveController/save';
$route['incentive-fetch'] = 'IncentiveController/data';
$route['incentive-delete'] = 'IncentiveController/delete'; 
$route['incentive-update?(.+)'] = 'IncentiveController/edit';
$route['incentive-save'] = 'IncentiveController/saveEdit';
$route['incentive-get'] = 'IncentiveController/user_get';

// ==================================================================================================
// Over incentive company
// ==================================================================================================



// ==================================================================================================
/* Start Admin attendance */
// ==================================================================================================

$route['attendance'] = 'AttendanceController/list';
$route['attendance-register'] = 'AttendanceController/add';
$route['attendance-register-save'] = 'AttendanceController/save';
$route['attendance-fetch'] = 'AttendanceController/data';


// ==================================================================================================
/* Start Admin attendance */
// ==================================================================================================



//custome route over Admin Slide
// ==================================================================================================


$route['default_controller'] = 'AdminController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

