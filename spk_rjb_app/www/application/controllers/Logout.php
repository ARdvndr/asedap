<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->sess_destroy();
        redirect(base_url('Logout/alert'));
    }

    public function alert()
    {
        $this->session->set_flashdata('sukses', 'Berhasil Logout');
        redirect(base_url('Login'));
    }
}
