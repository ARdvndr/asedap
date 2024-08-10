<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PaketController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AdminModel->isNotLogin()) redirect('admin/login');
  }


  public function index()
  {
    $this->load->view('backend/pages/v_paket');
  }

  public function getAll()
  {
    echo $this->PaketModel->getAll();
  }

  public function add()
  {
    if ($this->PaketModel->add()) {
      $this->session->set_flashdata('success', 'Berhasil Menambah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menambah Data');
    }
    redirect('admin/paket');
  }

  public function update()
  {
    if ($this->PaketModel->update()) {
      $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Mengubah Data');
    }
    redirect('admin/paket');
  }

  public function delete($id = null)
  {
    if ($this->PaketModel->delete($id)) {
      $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menghapus Data');
    }
    redirect('admin/paket');
  }

  public function detail($id = null)
  {
    $data['paket'] = $this->PaketModel->getById($id);
    $data['makanan'] = $this->MakananModel->getArray();
    $this->load->view('backend/pages/v_detail', $data);
  }

  public function addDetail($id = null)
  {
    if ($this->PaketModel->addDetail($id)) {
      $this->session->set_flashdata('success', 'Berhasil Menyimpan Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menyimpan Data');
    }
    redirect('admin/paket');
  }
}
