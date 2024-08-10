<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TempatModel extends CI_Model
{
    private $table = "tempat";

    public function get()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getTempatById($id)
    {
        return $this->db->where('id_tempat', $id)->get($this->table)->result_array();
    }

    public function getAll()
    {
        $data = $this->db
            ->get($this->table)
            ->result();

        $resJson = array();
        $no = 1;

        if ($data) {
            foreach ($data as $d) {
                $id = $d->id_tempat;
                $nama = $d->nama_tempat;
                $foto = $d->foto_tempat;
                $resJson[] = array(
                    "no" => $no++,
                    "id" => $id,
                    "nama" => $nama,
                    "image" => "<image src='" . base_url("assets/img/tempat/$foto") . "' height=80 />",
                    "deskripsi" => $d->deskripsi,
                    "aksi" => '
                        <a class="btn btn-link btn-sm text-warning ubahTempat" data-toggle="modal" data-target="#modal-ubah"> 
                            Edit <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="deleteTempat(`' . $id . '`,`' . $nama . '`)" class="btn btn-link btn-sm text-danger" >
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
        $q = $this->db->query("SELECT MAX(RIGHT(id_tempat ,3)) AS id_max FROM tempat");
        $id = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->id_max) + 1;
                $id = sprintf("%03s", $tmp);
            }
        } else {
            $id = "001";
        }
        return "T" . $id;
    }

    public function getImg($filename)
    {
        $config['upload_path'] = './assets/img/tempat/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 5000;
        $config['max_width'] = 6000;
        $config['max_height'] = 6000;
        $config['file_name'] = $filename;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
    }

    public function add()
    {
        $post = $this->input->post();
        $nama = $post["nama"];

        $this->getImg($nama);

        if (!$this->upload->do_upload('foto')) {
            echo $this->upload->display_errors();
        } else if ($this->upload->do_upload('foto')) {
            $data = array('upload_data' => $this->upload->data());
            $this->foto_tempat = $data['upload_data']['file_name'];
        }

        $this->id_tempat = $this->getId();
        $this->nama_tempat = $nama;
        $this->deskripsi = $post['deskripsi'];
        return $this->db->insert($this->table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $id = $post["id"];
        $nama = $post["nama"];

        $this->getImg($nama);

        if (!$this->upload->do_upload('foto')) {
            echo $this->upload->display_errors();
        } else if ($this->upload->do_upload('foto')) {
            $data = array('upload_data' => $this->upload->data());
            $this->foto_tempat = $data['upload_data']['file_name'];
        }

        $this->nama_tempat = $nama;
        $this->deskripsi = $post['deskripsi'];
        return $this->db->update($this->table, $this, array('id_tempat' => $id));
    }

    public function delete($id)
    {
        $this->chkImg($id);
        return $this->db->delete($this->table, array('id_tempat' => $id));
    }

    public function chkImg($id)
    {
        $data = $this->db
            ->select('foto_tempat')
            ->where('id_tempat', $id)
            ->get($this->table)
            ->result_array();

        $file_name = $data[0]['foto_tempat'];

        $chk = $this->db
            ->where('foto_tempat', $file_name)
            ->get($this->table)
            ->result_array();

        $path = './assets/img/tempat/' . $file_name;

        if (count($chk) == 1 && $file_name != 'default.jpg') {
            unlink($path);
        }
    }
}
