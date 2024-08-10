<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->Login_model->isNotLogin()) redirect(base_url());
    }

    public function index()
    {
        $data['keluarga'] = $this->Penilaian_model->getKeluarga();
        $data['kriteria'] = $this->Kriteria_model->getAll();
        $this->Pages_model->getPage('pages/penilaian/index', $data);
    }

    public function tambah()
    {
        $data['keluarga'] = $this->Keluarga_model->getAll();
        $data['kriteria'] = $this->Kriteria_model->getAll();
        $this->Pages_model->getPage('pages/penilaian/tambah', $data);
    }

    public function ubah($id = null)
    {
        $data['keluarga'] = $this->Keluarga_model->getById($id);
        $data['kriteria'] = $this->Kriteria_model->getAll();
        $this->Pages_model->getPage('pages/penilaian/ubah', $data);
    }

    public function simpan()
    {
        if ($this->Penilaian_model->simpan()) {
            $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        redirect('Penilaian');
    }

    public function update()
    {
        if ($this->Penilaian_model->update()) {
            $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah');
        }
        redirect('Penilaian');
    }

    public function hapus($id = null)
    {
        if ($this->Penilaian_model->hapus($id)) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        redirect('Penilaian');
    }

    public function hitung()
    {
        $hasil = $this->Penilaian_model->hitung();

        $data['kriteria'] = $this->Kriteria_model->getAll();
        $data['alternatif'] = $hasil['alternatif'];
        $data['solusi'] = $hasil['solusi'];

        $this->Pages_model->getPage('pages/penilaian/hasil', $data);
    }
}
