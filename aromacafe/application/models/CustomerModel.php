<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CustomerModel extends CI_Model
{
    private $table = "customer";

    public function getAll()
    {
        $data = $this->db
            ->get($this->table)
            ->result();

        $resJson = array();
        $no = 1;

        if ($data) {
            foreach ($data as $d) {
                $id = $d->id_customer;
                $nama = $d->nama;
                $jkel = '';
                if ($d->jkel == 'L') {
                    $jkel = 'Laki-Laki';
                } else {
                    $jkel = 'Perempuan';
                }
                $resJson[] = array(
                    "no" => $no++,
                    "id" => $id,
                    "nama" => $nama,
                    "alamat" => $d->alamat,
                    "tlp" => $d->tlp,
                    "jkel" => $d->jkel,
                    "txtjkel" => $jkel,
                    "email" => $d->email,
                    "aksi" => '
                    <a class="btn btn-link btn-sm text-warning ubahCustomer" data-toggle="modal" data-target="#modal-ubah"> 
                        Edit <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="deleteCustomer(`' . $id . '`,`' . $nama . '`)" class="btn btn-link btn-sm text-danger" >
                        Hapus <i class="fas fa-trash"></i>
                    </a>',
                );
            }
        } else {
            $resJson = [];
        }

        $response = array(
            "data" => $resJson,
        );

        return json_encode($response);
    }

    public function getId()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_customer ,4)) AS id_max FROM $this->table");
        $id = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->id_max) + 1;
                $id = sprintf("%04s", $tmp);
            }
        } else {
            $id = "0001";
        }
        return "C" . $id;
    }

    public function register($data = [])
    {
        $data['id_customer'] = $this->getId();
        return $this->db->insert($this->table, $data);
    }

    public function login($data = [])
    {
        return $this->db
            ->select('id_customer, nama, email, password')
            ->where([
                'email' => $data['email'],
                'password' => $data['password']
            ])
            ->get($this->table)->result_array();
    }


    public function update()
    {
        $post = $this->input->post();

        $this->nama = $post['nama'];
        $this->alamat = $post['alamat'];
        $this->tlp = $post['tlp'];
        $this->jkel = $post['jkel'];
        $this->email = $post['email'];

        if ($post['password'] != 'nan') {
            $this->password = md5($post['password']);
        }

        return $this->db->update($this->table, $this, array('id_customer' => $post["id"]));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('id_customer' => $id));
    }
}
