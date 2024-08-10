<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

    if (!($this->AdminModel->isNotLogin())) redirect('admin/dashboard');
    if ($this->input->post()) {
      if ($this->AdminModel->login()) {
        $this->session->set_flashdata('success', 'Berhasil Login');
        redirect(base_url('admin/dashboard'));
      } else {
        $this->session->set_flashdata('error', 'Username dan Password Tidak Cocok.');
      }
    }

    $this->load->view('backend/pages/v_login');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('admin/login');
  }
}
