<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keluarga extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->Login_model->isNotLogin()) redirect(base_url());
        
    }
    

    public function index()
    {
        $data['keluarga'] = $this->Keluarga_model->getAll();
        $this->Pages_model->getPage('pages/keluarga/index', $data);
    }

    public function tambah()
    {
        $this->Pages_model->getPage('pages/keluarga/tambah');
    }
    
    public function ubah($id = null)
    {
        $data['keluarga'] = $this->Keluarga_model->getById($id);
        $this->Pages_model->getPage('pages/keluarga/ubah', $data);
    }
    
    public function simpan()
    {
        if ($this->Keluarga_model->simpan()) {
            $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        redirect('keluarga');
    }
    
    public function update()
    {
        if ($this->Keluarga_model->update()) {
            $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah');
        }
        redirect('keluarga');
    }

    public function hapus($id = null)
    {
        if ($this->Keluarga_model->hapus($id)) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        redirect('keluarga');
    }
}
