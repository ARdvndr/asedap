<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MakananModel extends CI_Model
{
  private $table = "makanan";

  public function getAll()
  {
    $data = $this->db
      ->get($this->table)
      ->result();

    $resJson = array();
    $no = 1;

    if ($data) {
      foreach ($data as $d) {
        $id = $d->id_makanan;
        $nama = $d->nama_makanan;
        $foto = $d->foto_makanan;
        $resJson[] = array(
          "no" => $no++,
          "id" => $id,
          "nama" => $nama,
          "jenis" => $d->jenis_makanan,
          "image" => "<image src='" . base_url("assets/img/makanan/$foto") . "' height=80 />",
          "aksi" => '
                    <a class="btn btn-link btn-sm text-warning ubahMakanan" data-toggle="modal" data-target="#modal-ubah"> 
                        Edit <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="deleteMakanan(`' . $id . '`,`' . $nama . '`)" class="btn btn-link btn-sm text-danger" >
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

  public function getArray()
  {
    $data = $this->db
      ->order_by('nama_makanan')
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function getId()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(id_makanan ,3)) AS id_max FROM makanan");
    $id = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int)$k->id_max) + 1;
        $id = sprintf("%03s", $tmp);
      }
    } else {
      $id = "001";
    }
    return "M" . $id;
  }

  public function getImg($filename)
  {
    $config['upload_path'] = './assets/img/makanan/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 500;
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
    $namafile = str_replace(' ', '', $nama);

    $this->getImg($namafile);

    if (!$this->upload->do_upload('foto')) {
      echo $this->upload->display_errors();
    } else if ($this->upload->do_upload('foto')) {
      $data = array('upload_data' => $this->upload->data());
      $this->foto_makanan = $data['upload_data']['file_name'];
    }

    $this->id_makanan = $this->getId();
    $this->nama_makanan = $nama;
    $this->jenis_makanan = $post["jenis"];
    return $this->db->insert($this->table, $this);
  }

  public function update()
  {
    $post = $this->input->post();
    $id = $post["id"];
    $nama = $post["nama"];
    $namafile = str_replace(' ', '', $nama);

    $this->getImg($namafile);

    if (!$this->upload->do_upload('foto')) {
      echo $this->upload->display_errors();
    } else if ($this->upload->do_upload('foto')) {
      $data = array('upload_data' => $this->upload->data());
      $this->foto_makanan = $data['upload_data']['file_name'];
    }

    $this->nama_makanan = $nama;
    $this->jenis_makanan = $post["jenis"];
    return $this->db->update($this->table, $this, array('id_makanan' => $id));
  }

  public function delete($id)
  {
    $this->chkImg($id);
    return $this->db->delete($this->table, array('id_makanan' => $id));
  }

  public function chkImg($id)
  {
    $data = $this->db
      ->select('foto_makanan')
      ->where('id_makanan', $id)
      ->get($this->table)
      ->result_array();

    $file_name = $data[0]['foto_makanan'];

    $chk = $this->db
      ->where('foto_makanan', $file_name)
      ->get($this->table)
      ->result_array();

    $path = './assets/img/makanan/' . $file_name;

    if (count($chk) == 1 && $file_name != 'default.jpg') {
      unlink($path);
    }
  }
}
