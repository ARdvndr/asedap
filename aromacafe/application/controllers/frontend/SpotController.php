<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SpotController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tempatModel');
        
    }

    public function detail($id)
    {
        $data['tempat'] = $this->tempatModel->getTempatById($id);
        $this->load->view('frontend/pages/spot/index', $data);
    }
}
