<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keluarga_model extends CI_Model
{
    private $table = "keluarga";

    public function getAll()
    {
        $data = $this->db
            ->get($this->table)
            ->result_array();

        return $data;
    }

    public function getById($id)
    {
        $data = $this->db
            ->where('id_kel', $id)
            ->get($this->table)
            ->row_array();

        return $data;
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->nama_kel = $post["nama"];
        $this->tgl_lahir = $post["tgl_lahir"];
        $this->jk_kel = $post["jenis"];
        $this->alamat_kel = $post["alamat"];

        return $this->db->insert($this->table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama_kel = $post["nama"];
        $this->tgl_lahir = $post["tgl_lahir"];
        $this->jk_kel = $post["jenis"];
        $this->alamat_kel = $post["alamat"];

        return $this->db->update($this->table, $this, array('id_kel' => $post["id"]));
    }

    public function hapus($id)
    {
        return $this->db->delete($this->table, array('id_kel' => $id));
    }
}