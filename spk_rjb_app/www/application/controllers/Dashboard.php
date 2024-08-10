<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->Login_model->isNotLogin()) redirect(base_url('Login'));
    }

    public function index()
    {
        $this->Pages_model->getPage('pages/V_Dashboard');
    }
}
