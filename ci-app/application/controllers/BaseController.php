<?php
defined('BASEPATH') or exit('No direct script access allowed');

use App\Libraries\APIMiddleWare;

/**
 * Class BaseController
 *
 * The `BaseController` class is an extension of the CodeIgniter CI_Controller class.
 * It serves as the base controller for your application, providing common functionality
 * such as setting up middleware and rendering views.
 *
 * @package App\Controllers
 */
class BaseController extends CI_Controller
{
    /**
     * @var array $data Holds data that is passed to views for rendering.
     */
    public array $data;

    /**
     * @var APIMiddleWare $apiMiddleware Instance of the APIMiddleWare class for handling API-related tasks.
     */
    protected APIMiddleWare $apiMiddleware;

    /**
     * Constructor method for the BaseController class.
     * Initializes the $data array and sets up the API middleware.
     */
    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        self::setAPIMiddleWare();
    }

    /**
     * Private method to set up the API middleware.
     * Instantiates the APIMiddleWare class and assigns it to the $apiMiddleware property.
     */
    private final function setAPIMiddleWare(): void
    {
        $this->apiMiddleware = new APIMiddleWare();
    }

    /**
     * Protected method to render views using the YH theme.
     * Takes a page name as a parameter and loads the specified view.
     *
     * @param string $pageName The name of the page to be rendered.
     */
    protected final function YH_theme(string $pageName): void
    {
        $this->data['pageName'] = $pageName;
        $this->load->view('include/layout', $this->data);
    }
}
