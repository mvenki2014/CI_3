<?php

defined('BASEPATH') or exit('No direct script access allowed');

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
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|   $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|   $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|       my-controller/my-method -> my_controller/my_method
*/

$route['cs-admin'] = _ADMIN__FOLDER_NAME . '/signin';



/*$route['shop/payment'] = 'payment/ccavRequestHandler';
$route['shop/ccavResponseHandler'] = 'payment/ccavResponseHandler';*/

$route['api/(:any)'] = 'api/user/$1';
$route['api/(:any)/(:any)'] = 'api/user/$1/$2';
$route['api/(:any)/(:any)/(:any)'] = 'api/user/$1/$2/$3';
$route['api/(:any)/(:any)/(:any)/(:any)'] = 'api/user/$1/$2/$3/$4';

//$route['customer/signin'] = 'user/signin';
//$route['dealer/signin'] = 'user/signin';
//$route['supplier/signin'] = 'user/signin';

//$route['customer/signin/(:any)'] = 'user/signin/$1';
//$route['dealer/signin/(:any)'] = 'user/signin/$1';
//$route['supplier/signin/(:any)'] = 'user/signin/$1';

//$route['customer/signup'] = 'user/customer_signup';
//$route['customer/signup/(:any)'] = 'user/customer_signup/$1';
//$route['dealer/signup'] = 'user/mlm_signup';
//$route['dealer/signup/(:any)'] = 'user/mlm_signup/$1';
//$route['supplier/signup'] = 'user/supplier_signup';
//$route['supplier/signup/(:any)'] = 'user/supplier_signup/$1';

// Pages
$route['about-rajesh-agency'] = 'webpage/about';
$route['terms-and-conditions'] = 'webpage/terms';
$route['terms-and-conditions-dealer'] = 'webpage/terms/dealer';
$route['terms-and-conditions-supplier'] = 'webpage/terms/supplier';
$route['contact-us'] = 'webpage/contact';
$route['faq'] = 'webpage/faq';
$route['maintenance'] = 'webpage/maintenance';

$route["customer/signin"] = "webpage/customersignin";
$route['customer/signin/(:any)'] = 'webpage/customersignin/$1';
$route["customer/forgotpassword"] = "webpage/customerforgotpassword";
$route["customer/signup"] = "webpage/customersignup";
$route['customer/signup/(:any)'] = 'webpage/customersignup/$1';

$route["dealer/signin"] = "webpage/dealersignin";
$route['dealer/signin/(:any)'] = 'webpage/dealersignin/$1';
$route["dealer/forgotpassword"] = "webpage/dealerforgotpassword";
$route["dealer/signup"] = "webpage/dealersignup";
$route['dealer/signup/(:any)'] = 'webpage/dealersignup/$1';

$route["supplier/signin"] = "webpage/suppliersignin";
$route['supplier/signin/(:any)'] = 'webpage/suppliersignin/$1';
$route["supplier/forgotpassword"] = "webpage/supplierforgotpassword";
$route["supplier/signup"] = "webpage/suppliersignup";
$route['supplier/signup/(:any)'] = 'webpage/suppliersignup/$1';


$route['rs-admin/track/edi-logs'] = 'rs-admin/TransactionsLog/ediLogs';
$route['rs-admin/ecom-express/pincode-list'] = 'rs-admin/EcomExpressTracking/pincodesList';
$route['rs-admin/ecom-express/dashboard'] = 'rs-admin/EcomExpressTracking/dashboard';
$route['rs-admin/track/api/pincode/dt-list'] = 'rs-admin/EcomExpressTracking/pincodesDataTable';
$route['rs-admin/track/api/pincode/dt-change-status'] = 'rs-admin/EcomExpressTracking/pincodeChangeStatus';
$route['rs-admin/ecom-express/awb-numbers'] = 'rs-admin/EcomExpressTracking/awbNumbersList';
$route['rs-admin/track/api/awb-numbers/dt-list'] = 'rs-admin/EcomExpressTracking/awbNumbersDataTable';
$route['track/api/pincode/list'] = 'rs-admin/EcomExpressTracking/apiPincodesList';
$route['track/api/pincode/list/(:num)/(:num)'] = 'rs-admin/EcomExpressTracking/apiPincodesList/$1/$2';
$route['track/api/pincode/sync'] = 'rs-admin/EcomExpressTracking/apiPincodesSync';
$route['track/api/awb/(:any)'] = 'rs-admin/EcomExpressTracking/trackAWB/$1';
$route['track/api/fetch/awb'] = 'rs-admin/EcomExpressTracking/fetchawb';
$route['track/api/fetch/awb/(:any)'] = 'rs-admin/EcomExpressTracking/fetchawb/$1';
$route['track/api/create-shipment/(:any)'] = 'Ecom_REST_API/createShipment/$1';
$route['cron/api/distribute'] = 'Ecom_REST_API/DistributeAmount';
$route['fetch/pdf/(:any)/(:any)'] = 'Ecom_REST_API/gen_pdf/$1/$2';
$route['fetch/pdf/non-order/(:any)/(:any)'] = 'Ecom_REST_API/non_order_gen_pdf/$1/$2';
$route['rs-admin'] = 'rs-admin/dashboard';
$route['cron/failed-orders'] = 'cron/failedOrders';

global $DB_ROUTES;
if (!empty($DB_ROUTES)) {
    $route = array_merge($route, $DB_ROUTES);
}

//$route['default_controller'] = 'webpage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
$route['logs'] = "logViewerController/index";
