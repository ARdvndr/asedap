<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        if ($this->input->post()) {
            if ($this->Login_model->login()) {
                $this->session->set_flashdata('sukses', 'Berhasil Login');
                redirect(base_url('Dashboard'));
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Tidak Cocok.');
            }
        }

        $this->load->view('pages/login');
    }
}
