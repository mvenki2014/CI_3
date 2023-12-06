<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class AppController
 *
 * The `AppController` class handles various aspects of your application,
 * including API requests, rendering pages, and managing user sessions.
 *
 * @package App\Controllers
 */
class AppController extends BaseController
{
    /**
     * Constructor method for the AppController class.
     * Initializes the API handler instance by calling the parent constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Default method to redirect to the landing page.
     * Redirects to the `landing` method.
     */
    public final function index(): void
    {
        redirect(base_url('AppController/landing'));
    }

    /**
     * Landing page method.
     * Displays the landing page of your application.
     */
    public final function landing(): void
    {
		$x = $this->db->db_connect();
		var_dump($x); exit;
        self::YH_theme('landing');
    }

    /**
     * API Index method.
     * Displays a default API response indicating that the API is working perfectly.
     */
    public final function apiIndex(): void
    {
        $this->apiMiddleware->successResponseBuilder([], 'API Working Perfect');
    }

    /**
     * Mobile Verification page method.
     * Displays the mobile verification page of your application.
     */
    public final function mobileVerification(): void
    {
        self::YH_theme('mobile_verification');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo 'logout'; exit;
    }
}
