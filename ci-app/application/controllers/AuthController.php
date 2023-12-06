<?php

class AuthController extends AuthMiddleWareController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * User Home page method.
     * Displays the user home page and includes session data.
     */
    public final function userHome(): void
    {
        $this->data['session'] = $this->session->userdata();
        self::YH_theme('user_home');
    }

    public final function addPatient(): void
    {
        $this->data['session'] = $this->session->userdata();
        self::YH_theme('add_patient');
    }

    public final function chooseDoctor(): void
    {
        self::YH_theme('choose_doctor');
    }

    /**
     * Session Display method.
     * Displays all session data for debugging purposes.
     */
    public final function sess()
    {
        da($this->session->all_userdata());
    }
}
