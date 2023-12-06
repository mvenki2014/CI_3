<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

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
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

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
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*
|--------------------------------------------------------------------------
| API Endpoints
|--------------------------------------------------------------------------
|
| API calls information
|
|    It provides API documentation about all api calls
|       https://yhws.yashodahospital.com:8021/Service.asmx
*/
defined('API_HOST_URL') or define('API_HOST_URL', 'https://yhws.yashodahospital.com:8021/Service.asmx');
defined('API_TEST') or define('API_TEST', '/HelloWorld');
defined('API_GET_DOCTORS') or define('API_GET_DOCTORS', '/GetDoctors');
defined('API_APP_DISCROVE') or define('API_APP_DISCROVE', '/AppDiscrove');

defined('MSG91_AUTH_KEY') or define('MSG91_AUTH_KEY', '345051AJ1qzyS2gr5f8eb02cP1');
defined('MSG91_OTP_TEMPLATE_ID') or define('MSG91_OTP_TEMPLATE_ID', '62f0f41b6223d729ea572af2');
defined('MSG91_API_HOST') or define('MSG91_API_HOST', 'https://control.msg91.com');

defined('WHATSAPP_AUTH_TOKEN') or define('WHATSAPP_AUTH_TOKEN', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJ5YXNob2Rhd2hhdHNhcHAiLCJleHAiOjI0NDQ0NzQyMzd9.U_DOOSRO11QtTtSiwy1EZx5t0kXvDL9-q3wPGNmhIxmt4_q8WuVeSnl4BGkMTpSoydePG-PbyOHrgeLzeL-AlA');

defined('MAILGUN_KEY') or define('MAILGUN_KEY', 'key-2607d5dba251df5f7e674ef2a9ee5f3d');
defined('YH_EMAIL_SERVER') or define('YH_EMAIL_SERVER', 'mailgun.yashodahospitals.com');
defined('YH_ADMIN_EMAIL') or define('YH_ADMIN_EMAIL', 'yashodaonlineappts@gmail.com');
defined('YH_INFO_EMAIL') or define('YH_INFO_EMAIL', 'info@yashodamail.com');

defined('YH_BRANCH_LOCATION_ID') or define('YH_BRANCH_LOCATION_ID', 1); // 1 and 6 Secunderabad
defined('YH_BRANCH_LOCATION_NAME') or define('YH_BRANCH_LOCATION_NAME', 'SECUNDERABAD');


/*
|--------------------------------------------------------------------------
| GOOGLE RECAPTCHA
|--------------------------------------------------------------------------
|
| API calls information
|
|    It provides Security to api calls to avoid bot attacks
|
*/

defined('v3_G_RECAP_SITE_KEY') or define('v3_G_RECAP_SITE_KEY', '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI');
defined('v3_G_RECAP_SECRET_KEY') or define('v3_G_RECAP_SECRET_KEY', '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');
defined('v3_G_RECAP_VERIFY_LINK') or define('v3_G_RECAP_VERIFY_LINK', 'https://www.google.com/recaptcha/api/siteverify');


/*
|--------------------------------------------------------------------------
| PAY-U Payment
|--------------------------------------------------------------------------
|
| Sensitive Payment information
*
|  PAY-U Sandbox Information
|
*/
$PAYU = [
    'DEV' => [
        'MERCHANT_KEY' => 'ZlXobS',
        'MERCHANT_SALT' => 'z63nrbj24OfhHSgIk0QGK9BtbCyuxu2P',
        'URL' => 'https://test.payu.in/merchant/postservice.php'
    ],
    'SANDBOX' => [
        'MERCHANT_KEY' => 'n9OZsE',
        'MERCHANT_SALT' => '5a31azQHhSinqqBt67kIkBqleuyv2AlC',
        'MERCHENT_ID' => '8245286',
        'URL' => 'https://test.payu.in/merchant/postservice.php'
    ],
    'PROD' => [
        'MERCHANT_KEY' => '2Rtzl1',
        'MERCHANT_SALT' => 'hJoS8bhxtkoeOABskbHAOIbXrvY1ieKJ',
        'URL' => 'https://info.payu.in/merchant/postservice.php?form=2'
    ],
];

defined('PAYU_BASE_URL') or define('PAYU_BASE_URL', 'https://secure.payu.in');
defined('PAYU_ENV') or define('PAYU_ENV', 'SANDBOX'); //[DEV, SANDBOX, PROD]
defined('PAYU') or define('PAYU', $PAYU);
//defined('PAYU_MERCHANT_KEY') or define('PAYU_MERCHANT_KEY', 'ZlXobS');
//defined('PAYU_MERCHANT_SALT') or define('PAYU_MERCHANT_SALT', 'z63nrbj24OfhHSgIk0QGK9BtbCyuxu2P');
//defined('PAYU_CLIENT_ID') or define('PAYU_SUCCESS_URL', '8945aeb0d72cbce43da905a4e84afc936005542445162dae5edb91154ae3be8d');
//defined('PAYU_CLIENT_SEC') or define('PAYU_CLIENT_SEC', '005857fd65c79f874af928d24cada12716447a0e4bf9856b1ac09472162ad73d');

defined('PAYU_SUCCESS_URL') or define('PAYU_SUCCESS_URL', 'PayU/success');
defined('PAYU_FAILURE_URL') or define('PAYU_FAILURE_URL', 'PayU/failure');
