<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->Login_model->isNotLogin()) redirect(base_url());
    }

    public function index()
    {
        $data['kriteria'] = $this->Kriteria_model->getAll();
        $this->Pages_model->getPage('pages/kriteria/index', $data);
    }

    public function tambah()
    {
        $this->Pages_model->getPage('pages/kriteria/tambah');
    }
    
    public function ubah($id = null)
    {
        $data['kriteria'] = $this->Kriteria_model->getById($id);
        $this->Pages_model->getPage('pages/kriteria/ubah', $data);
    }
    
    public function simpan()
    {
        if ($this->Kriteria_model->simpan()) {
            $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        redirect('Kriteria');
    }
    
    public function update()
    {
        if ($this->Kriteria_model->update()) {
            $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah');
        }
        redirect('Kriteria');
    }

    public function hapus($id = null)
    {
        if ($this->Kriteria_model->hapus($id)) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        redirect('Kriteria');
    }

    public function ubahBobot()
    {
        $data['kriteria'] = $this->Kriteria_model->getAll();
        $this->Pages_model->getPage('pages/kriteria/ubah_bobot', $data);
    }
    
    public function simpanBobot()
    {
        $this->Kriteria_model->simpanBobot();
    }

    public function ubahParameter($id)
    {
        $data['kriteria'] = $this->Kriteria_model->getById($id);
        $data['parameter'] = $this->Kriteria_model->getParameter($id);
        $this->Pages_model->getPage('pages/kriteria/ubah_parameter', $data);
    }
    
    public function simpanParameter($id)
    {
        if ($this->Kriteria_model->simpanParameter($id)) {
            $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        redirect('Kriteria');
    }
}
