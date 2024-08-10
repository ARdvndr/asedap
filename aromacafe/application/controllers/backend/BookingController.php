<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BookingController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->AdminModel->isNotLogin()) redirect('admin/login');
    }

    public function index()
    {
        $this->load->view('backend/pages/v_booking');
    }

    public function getApprove()
    {
        echo $this->BookingModel->getApprove();
    }

    public function getPending()
    {
        echo $this->BookingModel->getPending();
    }

    public function getRiwayat()
    {
        echo $this->BookingModel->getRiwayat();
    }

    public function approve($id)
    {
        if ($this->BookingModel->approve($id)) {
            $this->session->set_flashdata('success', 'Berhasil Menyetujui Pemesanan');
        } else {
            $this->session->set_flashdata('error', 'Gagal Menyetujui Pemesanan');
        }
        redirect('admin/booking');
    }

    public function batal($id)
    {
        if ($this->BookingModel->batal($id)) {
            $this->session->set_flashdata('success', 'Berhasil Membatalkan Pemesanan');
        } else {
            $this->session->set_flashdata('error', 'Gagal Membatalkan Pemesanan');
        }
        redirect('admin/booking');
    }
}
