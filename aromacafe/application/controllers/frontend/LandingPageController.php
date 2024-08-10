<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LandingPageController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tempatModel');
        $this->load->model('paketModel');
    }

    public function index()
    {
        $data['paket'] = $this->paketModel->get()['paket'];
        $data['jenis'] = $this->paketModel->get()['jenis'];
        $data['tempat'] = $this->tempatModel->get();
        $data['background'] = 'assets/images/bg-header.jpg';
        $this->load->view('frontend/landing-page', $data);
    }
}
