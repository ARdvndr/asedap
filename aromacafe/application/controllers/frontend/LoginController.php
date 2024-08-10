<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customerModel');
        
    }

    public function index()
    {
        $this->load->view('frontend/pages/login/index.php');
    }

    public function doLogin()
    {
        // TODO: Validation
        $input = $this->input->post();

        $validated = [
            'email' => $input['email'],
            'password' => md5($input['password'])
        ];

        $request = $this->customerModel->login($validated);

        if(count($request) > 0){
            $user_data = [
                'user_id' => $request[0]['id_customer'],
                'name' => $request[0]['nama'],
                'login' => true,
            ];

            $this->session->set_userdata($user_data);

            redirect('home');
        }

    }

    public function logout()
    {
        $this->session->unset_userdata($this->session->userdata());
        $this->session->sess_destroy();

        return redirect('home');
        
    }
}
