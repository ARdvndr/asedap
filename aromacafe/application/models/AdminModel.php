<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
  private $table = "admin";

  public function login()
  {
    $post = $this->input->post();

    $admin = $this->db
      ->where('username', $post["username"])
      ->where('password', md5($post["password"]))
      ->get($this->table)
      ->row();

    if ($admin) {
      $data = array(
        'admin_logged' => $admin,
      );

      $this->session->set_userdata($data);
      return true;
    }

    return false;
  }

  public function isNotLogin()
  {
    return $this->session->userdata('admin_logged') == null;
  }
}
