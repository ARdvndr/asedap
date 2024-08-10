<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TempatController extends CI_Controller
{

  public function __construct()
  {
      parent::__construct();
      if ($this->AdminModel->isNotLogin()) redirect('admin/login');
  }


  public function index()
  {
      $this->load->view('backend/pages/v_tempat');
  }


  public function getAll()
  {
      echo $this->TempatModel->getAll();
  }

  public function add()
  {
      if ($this->TempatModel->add()) {
          $this->session->set_flashdata('success', 'Berhasil Menambah Data');
      } else {
          $this->session->set_flashdata('error', 'Gagal Menambah Data');
      }
      redirect('admin/tempat');
  }

  public function update()
  {
      if ($this->TempatModel->update()) {
          $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
      } else {
          $this->session->set_flashdata('error', 'Gagal Mengubah Data');
      }
      redirect('admin/tempat');
  }

  public function delete($id = null)
  {
      if ($this->TempatModel->delete($id)) {
          $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
      } else {
          $this->session->set_flashdata('error', 'Gagal Menghapus Data');
      }
      redirect('admin/tempat');
  }
}