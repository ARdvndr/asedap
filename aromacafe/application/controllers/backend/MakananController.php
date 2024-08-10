<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MakananController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->AdminModel->isNotLogin()) redirect('admin/login');
    }


    public function index()
    {
        $this->load->view('backend/pages/v_makanan');
    }


    public function getAll()
    {
        echo $this->MakananModel->getAll();
    }

    public function add()
    {
        if ($this->MakananModel->add()) {
            $this->session->set_flashdata('success', 'Berhasil Menambah Data');
        } else {
            $this->session->set_flashdata('error', 'Gagal Menambah Data');
        }
        redirect('admin/makanan');
    }

    public function update()
    {
        if ($this->MakananModel->update()) {
            $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
        } else {
            $this->session->set_flashdata('error', 'Gagal Mengubah Data');
        }
        redirect('admin/makanan');
    }

    public function delete($id = null)
    {
        if ($this->MakananModel->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
        } else {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data');
        }
        redirect('admin/makanan');
    }
}
