<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthMiddleWareController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->isAuth()) {
            redirect(base_url('AppController/logout'));
        }
    }
    private final function isAuth(): bool
    {
        return $this->session->has_userdata('otp_verified');
    }
}
