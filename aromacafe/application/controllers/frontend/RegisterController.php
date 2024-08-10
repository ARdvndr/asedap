<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RegisterController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customerModel');
    }

    public function index()
    {
        $this->load->view('frontend/pages/register/index.php');
    }

    public function newUser()
    {
        // TODO: Validation
        $input = $this->input->post();

        $validated = [
            'nama' => $input['nama'],
            'alamat' => $input['alamat'],
            'tlp' => $input['msisdn'],
            'jkel' => $input['gender'],
            'email' => $input['email'],
            'password' => md5($input['password']),
        ];

        $request = $this->customerModel->register($validated);

        if($request){
            redirect('login');

        }
    }
}
