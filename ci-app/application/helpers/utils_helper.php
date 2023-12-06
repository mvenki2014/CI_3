<?php
// print array in json format
if (!function_exists('da')) {
    function da($array, bool $printPre = false, bool $log = false)
    {
        if ($log) {
            log_message('error', date('d-m-Y H:i:s') . json_encode($array, 128));
            return;
        }
        if ($printPre) {
            echo '<pre>';
        }
        echo json_encode((array)$array, 128);
        exit();
    }
}
if (!function_exists('lastQuery')) {
    function lastQuery(bool $log = false)
    {
        $CI = &get_instance();
        $query = $CI->db->last_query();
        if ($log) {
            return $query;
        }
        echo $query;
        exit();
    }
}

if (!function_exists('generate_random_id')) {
    function generate_random_id($length = 6): int
    {
        return mt_rand(pow(10, $length - 1), pow(10, $length) - 1);
    }
}

if (!function_exists('sha512')) {
    function sha512(array $param): string
    {
        return hash("sha512", implode('|', $param));
    }
}

if (!function_exists('printDateTime')) {
    function printDateTime(string $dateTime): string
    {
        return DateTime::createFromFormat('d-M-Y H:i', $dateTime)->format('jS M, Y | g:i A');
    }
}

/**
 * Retrieves the branch based on the location to final API.
 *
 * @return string The branch name.
 */
if (!function_exists('getLocationByBranchId')) {
    function getLocationByBranchId($locationId): string
    {
        switch ($locationId) {
            case '1':
            case '6':
                return 'Secunderabad';
            case '2':
            case '5':
                return 'Somajiguda';
            case '3':
                return 'Malakpet';
            case '9':
                return 'Hitec City';
            default:
                return '';
        }
    }
}
