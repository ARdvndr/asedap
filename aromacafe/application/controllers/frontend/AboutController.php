<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AboutController extends CI_Controller
{

    public function index()
    {
        // $data['paket'] = $this->paketModel->get()['paket'];
        // $data['jenis'] = $this->paketModel->get()['jenis'];
        // $data['tempat'] = $this->tempatModel->get();
        // $data['background'] = 'assets/images/bg-header.jpg';
        $this->load->view('frontend/pages/about/index');
    }
}
