<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CustomerController extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->AdminModel->isNotLogin()) redirect('admin/login');
    }
    

    public function index()
    {
        $this->load->view('backend/pages/v_customer');
    }

    public function getAll()
    {
        echo $this->CustomerModel->getAll();
    }

    public function add()
    {
        $post = $this->input->post();

        $validated = [
            'nama' => $post['nama'],
            'alamat' => $post['alamat'],
            'tlp' => $post['tlp'],
            'jkel' => $post['jkel'],
            'email' => $post['email'],
            'password' => md5($post['password']),
        ];

        $request = $this->CustomerModel->register($validated);

        if($request){
            $this->session->set_flashdata('success', 'Berhasil Menambah Data');
        } else {
            $this->session->set_flashdata('error', 'Gagal Menambah Data');
        }
        redirect('admin/customer');
    }

    public function update()
    {
        if($this->CustomerModel->update()){
            $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
        } else {
            $this->session->set_flashdata('error', 'Gagal Mengubah Data');
        }
        redirect('admin/customer');
    }

    public function delete($id = null)
    {
        if ($this->CustomerModel->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
        } else {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data');
        }
        redirect('admin/customer');
    }
}
