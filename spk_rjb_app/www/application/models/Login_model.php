<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    private $table = "user";

    public function login()
    {
        $post = $this->input->post();
        $user = $this
            ->db
            ->where('username', $post["username"])
            ->where('password', md5($post['password']))
            ->get($this->table)
            ->row();

        if ($user) {
            $data = array(
                'user_logged' => $user
            );

            $this->session->set_userdata($data);
            return true;
        }

        return false;
    }
    
    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') == null;
    }
}
