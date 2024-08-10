<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pages_model extends CI_Model
{

    public function getPage($url, $data = null)
    {

        $this->load->view('partial/header');
        $this->load->view($url, $data);
        $this->load->view('partial/footer');
    }
}
