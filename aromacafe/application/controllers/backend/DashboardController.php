<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AdminModel->isNotLogin()) redirect('admin/login');
  }


  public function index()
  {
    $this->load->view('backend/pages/index');
  }
}
