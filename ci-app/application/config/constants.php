<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', true);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// Display Row Limit
defined('TBL__ROW_LIMIT')   or define('TBL__ROW_LIMIT', 500); // highest

// Admin
defined('_ADMIN__FOLDER_NAME')      or define('_ADMIN__FOLDER_NAME', 'rs-admin');
defined('_ADMIN__SESSION_PREFIX')   or define('_ADMIN__SESSION_PREFIX', 'RSA');
defined('_RECORD_SAVED_MESSAGE')    or define('_RECORD_SAVED_MESSAGE', 'New Record Saved Successfully.');
defined('_DB_ERROR')                or define('_DB_ERROR', 'You are entered record is not saved. Please contact server admin.');
defined('_RECORD_DELETED_MESSAGE')  or define('_RECORD_DELETED_MESSAGE', 'Record deleted Successfully.');
defined('_RECORD_UPDATE_MESSAGE')   or define('_RECORD_UPDATE_MESSAGE', 'Record updated Successfully.');

// Front End URL

// Respsoce
defined('HTTP_OK')  or define('HTTP_OK', '200');
defined('HTTP_NOT_FOUND')   or define('HTTP_NOT_FOUND', '404');
defined('HTTP_BAD_REQUEST') or define('HTTP_BAD_REQUEST', '400');
defined('HTTP_SEE_OTHER')   or define('HTTP_SEE_OTHER', '303');


defined('SITE_HOME_STATE')  or define('SITE_HOME_STATE', 'MAHARASHTRA');


/* TABLE NAMES*/
defined("ADMIN_USERS_TABLE")                or define("ADMIN_USERS_TABLE", 'rs_admin_users');
defined("ADMIN_SETTINGS_TABLE")             or define("ADMIN_SETTINGS_TABLE", 'rs_admin_setting');

defined("CART_TABLE")                       or define("CART_TABLE", 'rs_cart');
defined("CATEGORIES_TABLE")                 or define("CATEGORIES_TABLE", 'rs_categories');
defined("COUNTRIES_TABLE")                  or define("COUNTRIES_TABLE", 'rs_countries');
defined("CUSTOMER_TABLE")                   or define("CUSTOMER_TABLE", 'rs_customer');

defined("GST_TABLE")                        or define("GST_TABLE", 'rs_gst');

defined("MEASUREMENT_NAME_TABLE")           or define("MEASUREMENT_NAME_TABLE", 'rs_measurement_name');
defined("MEASUREMENT_VALUES_TABLE")         or define("MEASUREMENT_VALUES_TABLE", 'rs_measurement_values');

defined("MLM_TABLE")                        or define("MLM_TABLE", 'rs_mlm');
defined("MLM_BLOCK_LOG_TABLE")              or define("MLM_BLOCK_LOG_TABLE", 'rs_mlm_blovk_log');
defined("MLM_EMAIL_TABLE")                  or define("MLM_EMAIL_TABLE", 'rs_mlm_email');
defined("MLM_MARGIN_SETTINGS_TABLE")        or define("MLM_MARGIN_SETTINGS_TABLE", "rs_mlm_margin_settings");
defined("MLM_OCCUPATION_TABLE")             or define("MLM_OCCUPATION_TABLE", 'rs_mlm_occupation');
defined("MLM_REFFERAL_AMOUNT_TABLE")        or define("MLM_REFFERAL_AMOUNT_TABLE", 'rs_mlm_referal_amt');
defined("MLM_SETTINGS_TABLE")               or define("MLM_SETTINGS_TABLE", 'rs_mlm_settings');
defined("MLM_SIGNUP_PAYMENT_TABLE")         or define("MLM_SIGNUP_PAYMENT_TABLE", 'rs_mlm_signup_payment');
defined("MLM_URL_AMOUNT_TABLE")             or define("MLM_URL_AMOUNT_TABLE", 'rs_mlm_url_amt');
defined("MLM_WALLET_ORDER_LOG_TABLE")       or define("MLM_WALLET_ORDER_LOG_TABLE", 'rs_mlm_wallet_order_log');
defined("MLM_WALLET_TRANSFER_TABLE")        or define("MLM_WALLET_TRANSFER_TABLE", 'rs_mlm_wallettransfer');

defined("ORDER_TABLE")                      or define("ORDER_TABLE", 'rs_order');
defined("ORDER_DETAILS_TABLE")              or define("ORDER_DETAILS_TABLE", 'rs_order_details');
defined("ORDER_SUPPLIER_CANCEL_LOG_TABLE")  or define("ORDER_SUPPLIER_CANCEL_LOG_TABLE", 'rs_order_supplier_cancel_log');
defined("WALLET_ORDER_LOG_TABLE")           or define("WALLET_ORDER_LOG_TABLE", 'rs_wallet_order_log');

defined("PRODUCT_MEASUREMENT_TABLE")        or define("PRODUCT_MEASUREMENT_TABLE", 'rs_product_measurement');
defined("PRODUCTS_TABLE")                   or define("PRODUCTS_TABLE", 'rs_products');

defined("SETTINGS_TABLE")                   or define("SETTINGS_TABLE", 'rs_settings');
defined("SHIPPING_ADDRESS_TABLE")           or define("SHIPPING_ADDRESS_TABLE", 'rs_shipping_address');
defined("STATE_LIST_TABLE")                 or define("STATE_LIST_TABLE", 'rs_state_list');
defined("STOCK_TABLE")                      or define("STOCK_TABLE", 'rs_stock');
defined("SUPPLIER_TABLE")                   or define("SUPPLIER_TABLE", 'rs_supplier');
defined("SUPPLIER_BLOCK_TABLE")             or define("SUPPLIER_BLOCK_TABLE", 'rs_supplier_block_log');
defined("SUPPLIER_SHOP_TYPES_TABLE")        or define("SUPPLIER_SHOP_TYPES_TABLE", 'rs_supplier_shop_types');
defined("SUPPLIER_SIGNUP_PAYMENT_TABLE")    or define("SUPPLIER_SIGNUP_PAYMENT_TABLE", 'rs_supplier_signup_payment');
defined("SUPPLIER_TCS_TRANSACTIONS_TABLE")  or define("SUPPLIER_TCS_TRANSACTIONS_TABLE", 'rs_supplier_tcs_transactions');
defined("SUPPLIER_TRANSACTIONS_TABLE")      or define("SUPPLIER_TRANSACTIONS_TABLE", 'rs_supplier_transactions');
defined("SMS_LOG_TABLE")                    or define("SMS_LOG_TABLE", 'rs_sms_log');

defined("TRANSACTIONS_TABLE")               or define("TRANSACTIONS_TABLE", 'rs_transactions');

defined("VIDOES_TABLE")                     or define("VIDEOS_TABLE", 'rs_videos');

defined("WITHDRAWALS_TABLE")                or define("WITHDRAWALS_TABLE", 'rs_withdrawals');
defined("WITHDRAWALS_TDS_TABLE")            or define("WITHDRAWALS_TDS_TABLE", 'rs_withdrawals_tds');
defined("WITHDRAWALS_WALLET_TRANSER_TABLE") or define("WITHDRAWALS_WALLET_TRANSER_TABLE", 'rs_withdrawals_wallet_transfer');



/* TABLE NAMES WITH OUT RS*/
defined("RS_ADMIN_USERS_TABLE")                or define("RS_ADMIN_USERS_TABLE", 'admin_users');
defined("RS_ADMIN_SETTINGS_TABLE")             or define("RS_ADMIN_SETTINGS_TABLE", 'admin_setting');

defined("RS_CART_TABLE")                       or define("RS_CART_TABLE", 'cart');
defined("RS_CATEGORIES_TABLE")                 or define("RS_CATEGORIES_TABLE", 'categories');
defined("RS_COUNTRIES_TABLE")                  or define("RS_COUNTRIES_TABLE", 'countries');
defined("RS_CUSTOMER_TABLE")                   or define("RS_CUSTOMER_TABLE", 'customer');

defined("RS_GST_TABLE")                        or define("RS_GST_TABLE", 'gst');

defined("RS_MEASUREMENT_NAME_TABLE")           or define("RS_MEASUREMENT_NAME_TABLE", 'measurement_name');
defined("RS_MEASUREMENT_VALUES_TABLE")         or define("RS_MEASUREMENT_VALUES_TABLE", 'measurement_values');

defined("RS_MLM_TABLE")                        or define("RS_MLM_TABLE", 'mlm');
defined("RS_MLM_BLOCK_LOG_TABLE")              or define("RS_MLM_BLOCK_LOG_TABLE", 'mlm_blovk_log');
defined("RS_MLM_EMAIL_TABLE")                  or define("RS_MLM_EMAIL_TABLE", 'mlm_email');
defined("RS_MLM_MARGIN_SETTINGS_TABLE")        or define("RS_MLM_MARGIN_SETTINGS_TABLE", "mlm_margin_settings");
defined("RS_MLM_OCCUPATION_TABLE")             or define("RS_MLM_OCCUPATION_TABLE", 'mlm_occupation');
defined("RS_MLM_REFFERAL_AMOUNT_TABLE")        or define("RS_MLM_REFFERAL_AMOUNT_TABLE", 'mlm_referal_amt');
defined("RS_MLM_SETTINGS_TABLE")               or define("RS_MLM_SETTINGS_TABLE", 'mlm_settings');
defined("RS_MLM_SIGNUP_PAYMENT_TABLE")         or define("RS_MLM_SIGNUP_PAYMENT_TABLE", 'mlm_signup_payment');
defined("RS_MLM_URL_AMOUNT_TABLE")             or define("RS_MLM_URL_AMOUNT_TABLE", 'mlm_url_amt');
defined("RS_MLM_WALLET_ORDER_LOG_TABLE")       or define("RS_MLM_WALLET_ORDER_LOG_TABLE", 'mlm_wallet_order_log');
defined("RS_MLM_WALLET_TRANSFER_TABLE")        or define("RS_MLM_WALLET_TRANSFER_TABLE", 'mlm_wallettransfer');

defined("RS_ORDER_TABLE")                      or define("RS_ORDER_TABLE", 'order');
defined("RS_ORDER_DETAILS_TABLE")              or define("RS_ORDER_DETAILS_TABLE", 'order_details');
defined("RS_ORDER_SUPPLIER_CANCEL_LOG_TABLE")  or define("RS_ORDER_SUPPLIER_CANCEL_LOG_TABLE", 'order_supplier_cancel_log');
defined("RS_WALLET_ORDER_LOG_TABLE")           or define("RS_WALLET_ORDER_LOG_TABLE", 'wallet_order_log');

defined("RS_PRODUCT_MEASUREMENT_TABLE")        or define("RS_PRODUCT_MEASUREMENT_TABLE", 'product_measurement');
defined("RS_PRODUCTS_TABLE")                   or define("RS_PRODUCTS_TABLE", 'products');

defined("RS_SETTINGS_TABLE")                   or define("RS_SETTINGS_TABLE", 'settings');
defined("RS_SHIPPING_ADDRESS_TABLE")           or define("RS_SHIPPING_ADDRESS_TABLE", 'shipping_address');
defined("RS_STATE_LIST_TABLE")                 or define("RS_STATE_LIST_TABLE", 'state_list');
defined("RS_STOCK_TABLE")                      or define("RS_STOCK_TABLE", 'stock');
defined("RS_SUPPLIER_TABLE")                   or define("RS_SUPPLIER_TABLE", 'supplier');
defined("RS_SUPPLIER_BLOCK_TABLE")             or define("RS_SUPPLIER_BLOCK_TABLE", 'supplier_block_log');
defined("RS_SUPPLIER_SHOP_TYPES_TABLE")        or define("RS_SUPPLIER_SHOP_TYPES_TABLE", 'supplier_shop_types');
defined("RS_SUPPLIER_SIGNUP_PAYMENT_TABLE")    or define("RS_SUPPLIER_SIGNUP_PAYMENT_TABLE", 'supplier_signup_payment');
defined("RS_SUPPLIER_TCS_TRANSACTIONS_TABLE")  or define("RS_SUPPLIER_TCS_TRANSACTIONS_TABLE", 'supplier_tcs_transactions');
defined("RS_SUPPLIER_TRANSACTIONS_TABLE")      or define("RS_SUPPLIER_TRANSACTIONS_TABLE", 'supplier_transactions');
defined("RS_SMS_LOG_TABLE")                    or define("RS_SMS_LOG_TABLE", 'sms_log');

defined("RS_TRANSACTIONS_TABLE")               or define("RS_TRANSACTIONS_TABLE", 'transactions');

defined("RS_VIDOES_TABLE")                     or define("RS_VIDEOS_TABLE", 'videos');

defined("RS_WITHDRAWALS_TABLE")                or define("RS_WITHDRAWALS_TABLE", 'withdrawals');
defined("RS_WITHDRAWALS_TDS_TABLE")            or define("RS_WITHDRAWALS_TDS_TABLE", 'withdrawals_tds');
defined("RS_WITHDRAWALS_WALLET_TRANSER_TABLE") or define("RS_WITHDRAWALS_WALLET_TRANSER_TABLE", 'withdrawals_wallet_transfer');

defined("RS_ECOM_PINCODE_TABLE") or define("RS_ECOM_PINCODE_TABLE", 'rs_ecom_pincodes');
defined("RS_ECOM_AWB_TABLE") or define("RS_ECOM_AWB_TABLE", 'rs_ecom_awb');
defined("RS_EDI_TRANSACTIONS_TABLE") or define("RS_EDI_TRANSACTIONS_TABLE", 'rs_edi_transactions');
defined("RS_ECOM_REQUEST_DATA_TABLE") or define("RS_ECOM_REQUEST_DATA_TABLE", 'rs_ecom_request_data');
defined("RS_ORDER_STATUS") or define("RS_ORDER_STATUS", 'rs_order_status');
defined("RS_ORDER_SHIPPING_CHARGES") or define("RS_ORDER_SHIPPING_CHARGES", 'rs_order_shipping_charges');
defined("RS_CALL_CENTER_NUMBERS") or define("RS_CALL_CENTER_NUMBERS", 'rs_call_center_numbers');

/***** ECOM EXPRESS API *****/
defined('ECOM_EXP_ENV') or define('ECOM_EXP_ENV', 'live');

if (ECOM_EXP_ENV === 'TEST') {
    defined('ECOM_EXP_API_ENV') or define('ECOM_EXP_API_ENV', 'clbeta');
    defined('ECOM_EXP_UNAME') or define('ECOM_EXP_UNAME', 'sparsspvtltd441462_temp');
    defined('ECOM_EXP_PWD') or define('ECOM_EXP_PWD', 'tiyoDbGcfcfc');
} else {
    defined('ECOM_EXP_API_ENV') or define('ECOM_EXP_API_ENV', 'api');
    defined('ECOM_EXP_UNAME') or define('ECOM_EXP_UNAME', 'SPARSSE-STORESPRIVATELIMITED788555');
    defined('ECOM_EXP_PWD') or define('ECOM_EXP_PWD', '7kHGJmMWn6');
}
defined('ECOM_EXP_API_URL') or define('ECOM_EXP_API_URL', "https://" . ECOM_EXP_API_ENV . ".ecomexpress.in");
defined('ECOM_EXP_PINCODE_SERVICEABLE') or define('ECOM_EXP_PINCODE_SERVICEABLE', ECOM_EXP_API_URL . '/apiv2/pincodes/');
defined('ECOM_EXP_FETCH_AWB') or define('ECOM_EXP_FETCH_AWB', ECOM_EXP_API_URL . '/apiv2/fetch_awb/');
defined('ECOM_EXP_SHIP_TRACK') or define('ECOM_EXP_SHIP_TRACK', ECOM_EXP_API_URL . '/track_me/api/mawbd/');
defined('ECOM_EXP_FMANFEST_AWB') or define('ECOM_EXP_FMANFEST_AWB', ECOM_EXP_API_URL . '/apiv2/manifest_awb/');
defined('ECOM_EXP_RMANFEST_AWB') or define('ECOM_EXP_RMANFEST_AWB', ECOM_EXP_API_URL . '/apiv2/manifest_awb_rev_v2/');
defined('ECOM_EXP_NDR_API') or define('ECOM_EXP_NDR_API', ECOM_EXP_API_URL . '/apiv2/ndr_resolutions/');
defined('ECOM_EXP_SHIP_CANCEL') or define('ECOM_EXP_SHIP_CANCEL', ECOM_EXP_API_URL . '/apiv2/cancel_awb/');
defined('ECOM_EXP_RATE_CALC') or define('ECOM_EXP_RATE_CALC', 'https://ratecard.ecomexpress.in/services/rateCalculatorAPI/');
defined('ECOM_EXP_PUSH') or define('ECOM_EXP_PUSH', 'https://Customerportal.com');
defined('ECOM_EXP_ADDITIONAL_SHIPPING_FEE_PERCENT') or define('ECOM_EXP_ADDITIONAL_SHIPPING_FEE_PERCENT', 20);

/***** ECOM EXPRESS API End *****/

/***
 * CC AVENUE
 *
 * ---- TEST ----
 * URL:http://www.localhost/sparss
 * access_code:    AVMV04JA12CE85VMEC
 * Working key:    4EAED874C8982D898F81185130947516
 *
 * URL:https://sparss.com/dev
 * access_code:    AVOA03HG30AC07AOCA
 * Working key:    A1DB71730F3001200ECAD2D640A35FD0
 *
 *
 * ---- PROD ----
 * URL:https://sparss.com/dev
 * access_code:    AVDG93HF16CL45GDLC
 * Working key:    3B37B0A25161DE42AB896A422FE40677
 ***/

// Define the CC Avenue environment if not already defined
defined('CC_AVENUE_ENV') or define('CC_AVENUE_ENV', 'TEST');

// Local keys for testing
$testKeys = [
    'acc_code' => 'AVMV04JA12CE85VMEC',
    'wk_key' => '4EAED874C8982D898F81185130947516',
];

// Override test keys if the server name matches "sparss.com"
if (strpos($_SERVER['SERVER_NAME'], "sparss.com") !== false) {
    $testKeys['acc_code'] = 'AVOA03HG30AC07AOCA';
    $testKeys['wk_key'] = 'A1DB71730F3001200ECAD2D640A35FD0';
}

if (CC_AVENUE_ENV === 'TEST') {
    $apiEnv = 'test';
    $accCode = $testKeys['acc_code'];
    $wkKey = $testKeys['wk_key'];
} else {
    $apiEnv = 'secure';
    $accCode = 'AVDG93HF16CL45GDLC';
    $wkKey = '3B37B0A25161DE42AB896A422FE40677';
}

// Define the CC Avenue API environment, account code, and working key
defined('CC_AVENUE_API_ENV') or define('CC_AVENUE_API_ENV', $apiEnv);
defined('CC_AVENUE_ACC_CODE') or define('CC_AVENUE_ACC_CODE', $accCode);
defined('CC_AVENUE_WK_KEY') or define('CC_AVENUE_WK_KEY', $wkKey);
defined('CC_AVENUE_MERCHANT_ID') or define('CC_AVENUE_MERCHANT_ID', 260162);

/**
 *
 * Products images paths
 **/

defined('TEMP_UPLOAD_PATH') or define('TEMP_UPLOAD_PATH', './uploads/');
defined('PRODUCT_FILES_UPLOAD_PATH') or define('PRODUCT_FILES_UPLOAD_PATH', './public/products/');
defined('CAT_FILES_UPLOAD_PATH') or define('CAT_FILES_UPLOAD_PATH', './public/categories/');
defined("RS_PRODUCT_MEDIA") or define("RS_PRODUCT_MEDIA", 'rs_product_media');
defined("RS_PRODUCTS")                   or define("RS_PRODUCTS", 'rs_products');
defined("RS_PRODUCT_MEASUREMENT")        or define("RS_PRODUCT_MEASUREMENT", 'rs_product_measurement');
defined("RS_MEASUREMENT_MARGIN_HISTORY")        or define("RS_MEASUREMENT_MARGIN_HISTORY", 'rs_measurement_margin_history');
defined("RS_ORDER_SHIPPING_CHARGES_WALLET")        or define("RS_ORDER_SHIPPING_CHARGES_WALLET", 'rs_shipping_charges_wallet');
defined("RS_ORDER_MASTER")        or define("RS_ORDER_MASTER", 'rs_orders_master');
defined("RS_ADMIN_HOLD_WALLET")        or define("RS_ADMIN_HOLD_WALLET", 'rs_admin_hold_wallet');
defined("RS_ORDERS")        or define("RS_ORDERS", 'rs_orders');
defined("GST_PERCENT")        or define("GST_PERCENT", 18);
defined("GST_SHIPPING_CHARGES_CORRECTION_PERCENT") or define("GST_SHIPPING_CHARGES_CORRECTION_PERCENT", 15.254237);
defined("RS_WALLETS_TRANSACTIONS_LOG")        or define("RS_WALLETS_TRANSACTIONS_LOG", 'rs_wallets_transactions_log');
defined("RS_BANKS")        or define("RS_BANKS", 'rs_banks');
defined("RS_USER_BANKS_DETAILS")        or define("RS_USER_BANKS_DETAILS", 'rs_user_bank_details');
defined("RS_ADMIN_GLOABAL_SETTINGS")        or define("RS_ADMIN_GLOABAL_SETTINGS", 'rs_admin_global_settings');
// defined("REF_URL_DEALER_ID")        OR define("REF_URL_DEALER_ID", '0');
defined('REF_URL_DEALER_PER') or define('REF_URL_DEALER_PER', '5');
defined("RS_SITE_CONFIG") or define("RS_SITE_CONFIG", 'rs_site_config');
defined("PAYMENT_WAITING_TIME") or define("PAYMENT_WAITING_TIME", 20); //it's in minutes

//********** ---- Order status Types ---- ***********************//
defined("ORDER_CANCEL") or define("ORDER_CANCEL", 4);
defined("ORDER_RETURNED") or define("ORDER_RETURNED", 6);
defined("ORDER_DELIVERED") or define("ORDER_DISPATCHED", 2);
defined("ORDER_PENDING") or define("ORDER_PENDING", 0);
defined("ORDER_COMPLETED") or define("ORDER_COMPLETED", 1);
defined("ORDER_DELIVERED") or define("ORDER_DELIVERED", 2);

//********** ---- Order Types ---- ***********************//
defined("STORE_PICKUP_ORDER") or define("STORE_PICKUP_ORDER", 1);
defined("ONLINE_ORDER") or define("ONLINE_ORDER", 0);

//********** ---- Order Wallet Types ---- ***********************//
defined("C_ADMIN_ORDER_COMPLETION_NON_FREE_SHIPPING_CHARGES") or define("C_ADMIN_ORDER_COMPLETION_NON_FREE_SHIPPING_CHARGES", 'C_ADMIN_ORDER_COMPLETION_NON_FREE_SHIPPING_CHARGES');
defined("D_SUPPLIER_ORDER_COMPLETION_NON_FREE_SHIPPING_CHARGES") or define("D_SUPPLIER_ORDER_COMPLETION_NON_FREE_SHIPPING_CHARGES", 'D_SUPPLIER_ORDER_COMPLETION_NON_FREE_SHIPPING_CHARGES');
defined("D_SUPPLIER_TRANSFER_FROM_ADMIN_LOGIN") or define("D_SUPPLIER_TRANSFER_FROM_ADMIN_LOGIN", 'D_SUPPLIER_TRANSFER_FROM_ADMIN_LOGIN');
defined("C_SUPPLIER_TRANSFER_FROM_ADMIN_LOGIN_TO_DEALER") or define("C_SUPPLIER_TRANSFER_FROM_ADMIN_LOGIN_TO_DEALER", 'C_SUPPLIER_TRANSFER_FROM_ADMIN_LOGIN_TO_DEALER');
defined("C_SUPPLIER_TRANSFER_FROM_ADMIN_LOGIN_TO_CUSTOMER") or define("C_SUPPLIER_TRANSFER_FROM_ADMIN_LOGIN_TO_CUSTOMER", 'C_SUPPLIER_TRANSFER_FROM_ADMIN_LOGIN_TO_CUSTOMER');
defined("D_ADMIN_TO_SUPPLIER_TRANSFER") or define("D_ADMIN_TO_SUPPLIER_TRANSFER", 'D_ADMIN_TO_SUPPLIER_TRANSFER');
defined("C_ADMIN_TO_SUPPLIER_TRANSFER") or define("C_ADMIN_TO_SUPPLIER_TRANSFER", 'C_ADMIN_TO_SUPPLIER_TRANSFER');
defined("D_ADMIN_TO_DEALER_TRANSFER") or define("D_ADMIN_TO_DEALER_TRANSFER", 'D_ADMIN_TO_DEALER_TRANSFER');
defined("C_ADMIN_TO_DEALER_TRANSFER") or define("C_ADMIN_TO_DEALER_TRANSFER", 'C_ADMIN_TO_DEALER_TRANSFER');
defined("D_ADMIN_TO_CUSTOMER_TRANSFER") or define("D_ADMIN_TO_CUSTOMER_TRANSFER", 'D_ADMIN_TO_CUSTOMER_TRANSFER');
defined("C_ADMIN_TO_CUSTOMER_TRANSFER") or define("C_ADMIN_TO_CUSTOMER_TRANSFER", 'C_ADMIN_TO_CUSTOMER_TRANSFER');
defined("C_ADMIN_SUPPLIER_JOINING") or define("C_ADMIN_SUPPLIER_JOINING", 'C_ADMIN_SUPPLIER_JOINING');
defined("C_ADMIN_DEALER_JOINING") or define("C_ADMIN_DEALER_JOINING", 'C_ADMIN_DEALER_JOINING');
/********** ---- Order Wallet Types End ---- ***********************/

/********** ---- Dynamic Invoice Constants ---- ***********************/
defined('INVOICE_CONFIG_PATH') or define('INVOICE_CONFIG_PATH', '/public/profile/');
defined('INVOICE_ALLOWED_TYPES') or define('INVOICE_ALLOWED_TYPES', 'gif|jpg|png|jpeg');
